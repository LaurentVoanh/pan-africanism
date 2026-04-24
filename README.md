Voici une documentation complète pour votre projet **PAN-AFRICA VISION 2030**.

---

# 🌍 PAN-AFRICA VISION 2030 — Portail IA

Ce projet est une plateforme vitrine et interactive dédiée au développement panafricain pour l'horizon 2030. Elle utilise l'intelligence artificielle (Mistral AI) pour générer des concepts visionnaires de cités futuristes, de hubs scientifiques et de stratégies énergétiques pour le continent africain.

## 📖 Concept IA et Portail PHP

Le projet repose sur une architecture **Proxy** sécurisée pour intégrer l'IA :

1.  **Le Portail (Frontend) :** Une interface moderne (HTML/CSS/JS) qui recueille les paramètres de l'utilisateur (pays, type de projet, budget).
2.  **Le Proxy PHP (`mistral_proxy.php`) :** Il sert d'intermédiaire sécurisé entre le navigateur de l'utilisateur et l'API de Mistral AI.
    * **Sécurité :** Il masque vos clés API (qui ne sont jamais visibles côté client).
    * **Contrôle :** Il gère le "Rate Limiting" (limitation du nombre de requêtes par IP) et la validation des données pour éviter les abus.
    * **Communication :** Il reçoit un prompt simplifié, l'enrichit avec des instructions "système" précises, et renvoie la réponse formatée de l'IA.

## 🔑 Obtenir une Clé API Mistral (Free Tier)

Pour faire fonctionner l'IA, vous devez obtenir une clé API gratuite :

1.  Rendez-vous sur la **[Mistral AI Console](https://console.mistral.ai/)**.
2.  Créez un compte ou connectez-vous.
3.  Allez dans la section **"API Keys"**.
4.  Cliquez sur **"Create new key"**. Mistral propose souvent des crédits gratuits lors de l'inscription pour tester leurs modèles (comme `mistral-large-latest`).
5.  Copiez cette clé et insérez-la dans le tableau `$MISTRAL_KEYS` au début du fichier `mistral_proxy.php`.

## 💻 Installation en local avec Laragon

1.  **Téléchargement :** Installez [Laragon](https://laragon.org/download/) si ce n'est pas déjà fait.
2.  **Placement des fichiers :**
    * Allez dans le dossier racine de Laragon (généralement `C:\laragon\www`).
    * Créez un dossier nommé `pan-africa-vision`.
    * Placez-y les fichiers : `index.php`, `mistral_proxy.php`, `app.js` et `style.css`.
3.  **Configuration des logs :**
    * Dans votre dossier `pan-africa-vision`, créez un sous-dossier nommé `logs`.
    * Assurez-vous que PHP a les droits d'écriture sur ce dossier pour que `proxy.log` puisse être généré.
4.  **Lancement :**
    * Démarrez Laragon et cliquez sur "Start All".
    * Ouvrez votre navigateur sur  `http://localhost/pan-africa-vision`.
5.  **Activation de cURL :** Le proxy utilise l'extension `php_curl`. Dans Laragon, vérifiez qu'elle est activée (Menu > PHP > Extensions > curl).

## 🛠️ Structure du Projet

* `index.php` : Page principale contenant la structure HTML et les sections du site.
* `style.css` : Design système "Luxe & Prestige" (Noir Nuit, Or Africain, Vert Savane).
* `app.js` : Logique frontend, gestion des formulaires et appels vers le proxy IA.
* `mistral_proxy.php` : Cœur logique serveur gérant les appels API et la sécurité.
