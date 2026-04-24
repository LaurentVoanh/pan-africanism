<?php
/**
 * mistral_proxy.php — PAN-AFRICA VISION
 * Proxy Mistral AI · Projets de développement africain 2030
 *
 * Reçoit : POST { "prompt": "...", "outil": "..." }
 * Renvoie : { "success": true, "result": "..." }
 *         ou { "success": false, "error": "..." }
 */

// ─── Configuration ─────────────────────────────────────────────────────────────

$MISTRAL_KEYS = [
    '5qaRTtretRake',
    'o3rG1trehytu',
    'vEzQMtreruXkF',
];

define('MISTRAL_ENDPOINT', 'https://api.mistral.ai/v1/chat/completions');
define('MISTRAL_MODEL',    'mistral-large-2512');
define('MAX_TOKENS',       2048);
define('TEMPERATURE',      0.8);
define('RATE_LIMIT',       30);
define('LOG_FILE',         __DIR__ . '/logs/proxy.log');
define('CACHE_DIR',        __DIR__ . '/cache/');

// ─── Headers ───────────────────────────────────────────────────────────────────

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('X-Content-Type-Options: nosniff');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(204); exit; }
if ($_SERVER['REQUEST_METHOD'] !== 'POST')    { fail('Méthode non autorisée.'); }

// ─── Init dossiers ─────────────────────────────────────────────────────────────

foreach ([dirname(LOG_FILE), CACHE_DIR] as $d) {
    if (!is_dir($d)) mkdir($d, 0755, true);
}

session_start();

// ─── Helpers ───────────────────────────────────────────────────────────────────

function ok(string $result): void {
    echo json_encode(['success' => true, 'result' => $result]);
    exit;
}

function fail(string $msg, int $code = 400): void {
    http_response_code($code);
    echo json_encode(['success' => false, 'error' => $msg]);
    exit;
}

function log_msg(string $level, string $msg): void {
    $line = sprintf("[%s] [%s] [%s] %s\n",
        date('Y-m-d H:i:s'), strtoupper($level),
        $_SERVER['REMOTE_ADDR'] ?? '-', $msg
    );
    @file_put_contents(LOG_FILE, $line, FILE_APPEND | LOCK_EX);
}

function client_ip(): string {
    foreach (['HTTP_CF_CONNECTING_IP','HTTP_X_FORWARDED_FOR','REMOTE_ADDR'] as $k) {
        if (!empty($_SERVER[$k])) return explode(',', $_SERVER[$k])[0];
    }
    return '0.0.0.0';
}

// ─── Rate limiting ─────────────────────────────────────────────────────────────

function rate_limit(string $ip): void {
    $f   = CACHE_DIR . 'rl_' . md5($ip) . '.json';
    $now = time();
    $d   = file_exists($f) ? (json_decode(file_get_contents($f), true) ?? []) : [];

    if (empty($d['w']) || $now - $d['w'] > 60) {
        $d = ['c' => 0, 'w' => $now];
    }
    $d['c']++;
    file_put_contents($f, json_encode($d), LOCK_EX);

    if ($d['c'] > RATE_LIMIT) {
        log_msg('warn', "Rate limit IP $ip");
        fail('Trop de requêtes. Attendez 1 minute.', 429);
    }
}

// ─── Rotation clés API ─────────────────────────────────────────────────────────

function pick_key(array $keys): string {
    if (!isset($_SESSION['ki'])) $_SESSION['ki'] = 0;
    $key = $keys[$_SESSION['ki'] % count($keys)];
    $_SESSION['ki'] = ($_SESSION['ki'] + 1) % count($keys);
    return $key;
}

// ─── Appel Mistral ─────────────────────────────────────────────────────────────

function call_mistral(string $prompt, string $apiKey): string {
    $payload = json_encode([
        'model'       => MISTRAL_MODEL,
        'max_tokens'  => MAX_TOKENS,
        'temperature' => TEMPERATURE,
        'messages'    => [
            [
                'role'    => 'system',
                'content' => "Tu es un visionnaire stratégique de PAN-AFRICA VISION, une coalition internationale d'associés engagés dans le développement de l'Afrique de demain. Tu es afrocentré, ambitieux, tourné vers 2030 et au-delà. Tu travailles avec des investisseurs, architectes, scientifiques, artistes et leaders de la diaspora africaine et des partenaires internationaux. Tes réponses portent sur des méga-projets immobiliers, scientifiques, culturels et technologiques qui transformeront l'Afrique. Tu proposes toujours des projets immenses, visionnaires, réalistes mais audacieux. Réponds toujours en français, de manière professionnelle, structurée, inspirante et ambitieuse. Utilise un ton à la fois stratégique et enthousiasmant. Mentionne les impacts pour les populations africaines, la diaspora, et le rayonnement international. Chaque projet que tu proposes doit être un projet de civilisation.",
            ],
            [
                'role'    => 'user',
                'content' => $prompt,
            ],
        ],
    ]);

    $ch = curl_init(MISTRAL_ENDPOINT);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $payload,
        CURLOPT_HTTPHEADER     => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey,
        ],
        CURLOPT_TIMEOUT        => 60,
        CURLOPT_SSL_VERIFYPEER => true,
    ]);

    $resp     = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err      = curl_error($ch);
    curl_close($ch);

    if ($err) throw new RuntimeException('Erreur réseau cURL : ' . $err);

    $data = json_decode($resp, true);
    if (!$data) throw new RuntimeException('Réponse JSON invalide de Mistral.');

    if ($httpCode !== 200) {
        $msg = $data['message'] ?? ($data['error']['message'] ?? 'Erreur inconnue');
        throw new RuntimeException("Mistral API $httpCode : $msg");
    }

    return $data['choices'][0]['message']['content'] ?? '';
}

// ─── Traitement ────────────────────────────────────────────────────────────────

$ip   = client_ip();
$body = json_decode(file_get_contents('php://input'), true);

if (!$body || json_last_error() !== JSON_ERROR_NONE) {
    fail('Corps JSON invalide.');
}

$prompt = trim($body['prompt'] ?? '');
$outil  = trim($body['outil']  ?? 'inconnu');

if (empty($prompt)) {
    fail('Le champ "prompt" est requis.');
}

if (mb_strlen($prompt) > 8000) {
    fail('Prompt trop long (max 8000 caractères).');
}

rate_limit($ip);

global $MISTRAL_KEYS;
$apiKey = pick_key($MISTRAL_KEYS);

try {
    log_msg('info', "Outil: $outil | IP: $ip | Chars: " . mb_strlen($prompt));
    $result = call_mistral($prompt, $apiKey);
    log_msg('info', "OK | Outil: $outil | " . mb_strlen($result) . " chars");
    ok($result);
} catch (RuntimeException $e) {
    log_msg('error', $e->getMessage() . " | Outil: $outil");
    fail($e->getMessage(), 502);
}
