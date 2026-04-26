/**
 * AFRO ARTIST HUB - Application JavaScript V4
 * 40 outils IA pour artistes & agents afro dans le monde
 * Design: 2Advanced Studios Light Mode - Afro-Futurisme de Luxe
 */

// Configuration
const API_PROXY_URL = 'mistral_proxy.php';

// Données des 40 outils (4 catégories x 10 outils)
const toolsData = [
    // ===== CATÉGORIE: AGENT & MANAGEMENT (10) =====
    { id: 'contract_gen', categorie: 'agent', emoji: '📜', titre: 'Contrat IA', sous_titre: 'Rédaction de contrats blindés (Cession, Management).', color: '#D4AF37' },
    { id: 'clause_analyser', categorie: 'agent', emoji: '🔍', titre: 'Analyseur de Clauses', sous_titre: 'Détecte les pièges dans les contrats que l\'on te propose.', color: '#D4AF37' },
    { id: 'fee_estimator', categorie: 'agent', emoji: '💰', titre: 'Estimateur de Cachets', sous_titre: 'Calcule ta valeur réelle selon le marché mondial.', color: '#D4AF37' },
    { id: 'rider_gen', categorie: 'agent', emoji: '🎛️', titre: 'Rider Technique', sous_titre: 'Génère tes besoins scène et logistique pro.', color: '#D4AF37' },
    { id: 'nego_coach', categorie: 'agent', emoji: '🤝', titre: 'Coach Négociation', sous_titre: 'Simule une négo pour obtenir de meilleures avances.', color: '#D4AF37' },
    { id: 'career_roadmap', categorie: 'agent', emoji: '🗺️', titre: 'Plan de Carrière', sous_titre: 'Stratégie sur 5 ans pour passer d\'indé à Major.', color: '#D4AF37' },
    { id: 'tour_planner', categorie: 'agent', emoji: '✈️', titre: 'Optimiseur de Tournée', sous_titre: 'Logistique et routing entre Afrique et Europe.', color: '#D4AF37' },
    { id: 'brand_pitch', categorie: 'agent', emoji: '💎', titre: 'Pitch Sponsoring', sous_titre: 'Convaincs les marques de luxe ou tech de te sponsoriser.', color: '#D4AF37' },
    { id: 'crisis_mgnt', categorie: 'agent', emoji: '🚨', titre: 'Gestion de Crise', sous_titre: 'Rédige tes communiqués en cas de bad buzz.', color: '#D4AF37' },
    { id: 'scouting_report', categorie: 'agent', emoji: '📈', titre: 'Rapport de Potentiel', sous_titre: 'Analyse ton positionnement face à la concurrence.', color: '#D4AF37' },

    // ===== CATÉGORIE: CRÉATION & STORYTELLING (10) =====
    { id: 'bio_pro', categorie: 'creation', emoji: '✍️', titre: 'Biographie Impériale', sous_titre: 'Récit de vie percutant pour la presse internationale.', color: '#C1684E' },
    { id: 'lyrics_doctor', categorie: 'creation', emoji: '🎵', titre: 'Lyrics Doctor', sous_titre: 'Améliore tes textes en gardant ton argot et ton âme.', color: '#C1684E' },
    { id: 'concept_album', categorie: 'creation', emoji: '🎨', titre: 'Concept d\'Album', sous_titre: 'Crée un univers narratif autour de ton projet.', color: '#C1684E' },
    { id: 'video_script', categorie: 'creation', emoji: '🎬', titre: 'Scénario de Clip', sous_titre: 'Storyboards textuels pour clips Afro-futuristes.', color: '#C1684E' },
    { id: 'naming_tool', categorie: 'creation', emoji: '🏷️', titre: 'Générateur de Noms', sous_titre: 'Trouve ton nom de scène ou titre d\'album.', color: '#C1684E' },
    { id: 'social_content', categorie: 'creation', emoji: '📱', titre: 'Calendrier Social', sous_titre: '30 jours de posts TikTok/Insta pour ton lancement.', color: '#C1684E' },
    { id: 'storytelling_heritage', categorie: 'creation', emoji: '🌍', titre: 'Heritage Story', sous_titre: 'Incorpore tes racines culturelles dans ton marketing.', color: '#C1684E' },
    { id: 'collab_finder', categorie: 'creation', emoji: '🤝', titre: 'Idées Collabs', sous_titre: 'Suggère des duos parfaits selon ton style sonore.', color: '#C1684E' },
    { id: 'press_kit', categorie: 'creation', emoji: '📦', titre: 'Générateur d\'EPK', sous_titre: 'Structure complète pour ton dossier de presse.', color: '#C1684E' },
    { id: 'interview_prep', categorie: 'creation', emoji: '🎤', titre: 'Prépa Interview', sous_titre: 'Questions/Réponses pour ne jamais être pris de court.', color: '#C1684E' },

    // ===== CATÉGORIE: BUSINESS & MONÉTISATION (10) =====
    { id: 'album_launch', categorie: 'business', emoji: '🚀', titre: 'Plan de Sortie', sous_titre: 'Check-list J-90 avant ton lancement mondial.', color: '#2E8B57' },
    { id: 'merch_strategy', categorie: 'business', emoji: '👕', titre: 'Design de Merch', sous_titre: 'Idées de produits dérivés culturels et rentables.', color: '#2E8B57' },
    { id: 'tax_diaspora', categorie: 'business', emoji: '🧾', titre: 'Fiscalité Diaspora', sous_titre: 'Conseils pour déclarer tes revenus multi-pays.', color: '#2E8B57' },
    { id: 'crowdfunding_pro', categorie: 'business', emoji: '🎁', titre: 'Campagne de Dons', sous_titre: 'Rédige ta page Kickstarter ou Ulule.', color: '#2E8B57' },
    { id: 'budget_music', categorie: 'business', emoji: '📊', titre: 'Budget Prévisionnel', sous_titre: 'Estime les coûts de ton prochain EP.', color: '#2E8B57' },
    { id: 'playlist_pitch', categorie: 'business', emoji: '🎧', titre: 'Pitch Edito Spotify', sous_titre: 'Texte pour convaincre les curateurs de playlists.', color: '#2E8B57' },
    { id: 'publishing_rights', categorie: 'business', emoji: '🪙', titre: 'Audit d\'Édition', sous_titre: 'Vérifie si tu touches bien toutes tes royalties.', color: '#2E8B57' },
    { id: 'investor_deck', categorie: 'business', emoji: '🏦', titre: 'Pitch Investisseurs', sous_titre: 'Pour lever des fonds auprès de Business Angels.', color: '#2E8B57' },
    { id: 'sync_licensing', categorie: 'business', emoji: '📺', titre: 'Cible Synchro', sous_titre: 'Quelles séries/films correspondent à ta musique ?', color: '#2E8B57' },
    { id: 'ads_copywriter', categorie: 'business', emoji: '📣', titre: 'Copywriter Pub', sous_titre: 'Textes pour tes publicités Instagram et YouTube.', color: '#2E8B57' },

    // ===== CATÉGORIE: JURIDIQUE & PROTECTION (10) =====
    { id: 'copyright_world', categorie: 'juridique', emoji: '©️', titre: 'Protection Œuvres', sous_titre: 'Guide pour protéger tes morceaux mondialement.', color: '#1d1d1f' },
    { id: 'nda_gen', categorie: 'juridique', emoji: '🔒', titre: 'Générateur de NDA', sous_titre: 'Protège tes idées avant de les partager en studio.', color: '#1d1d1f' },
    { id: 'sample_clearance', categorie: 'juridique', emoji: '📻', titre: 'Aide au Sample', sous_titre: 'Lettre type pour demander l\'autorisation d\'un sample.', color: '#1d1d1f' },
    { id: 'partnership_deal', categorie: 'juridique', emoji: '🤝', titre: 'Accord d\'Association', sous_titre: 'Pour les groupes qui veulent définir les parts de chacun.', color: '#1d1d1f' },
    { id: 'gdpr_music', categorie: 'juridique', emoji: '🛡️', titre: 'Données Fans', sous_titre: 'Mets ton site en conformité pour ta mailing list.', color: '#1d1d1f' },
    { id: 'dispute_resolution', categorie: 'juridique', emoji: '⚖️', titre: 'Médiation Conflit', sous_titre: 'Rédige une solution amiable pour un litige.', color: '#1d1d1f' },
    { id: 'trademark_check', categorie: 'juridique', emoji: '🆔', titre: 'Dépôt de Marque', sous_titre: 'Conseils pour protéger ton nom de scène (INPI/OAPI).', color: '#1d1d1f' },
    { id: 'remix_contract', categorie: 'juridique', emoji: '🔄', titre: 'Contrat de Remix', sous_titre: 'Définis les droits pour un remixeur.', color: '#1d1d1f' },
    { id: 'work_for_hire', categorie: 'juridique', emoji: '👷', titre: 'Contrat Prestataire', sous_titre: 'Pour tes graphistes, photographes et beatmakers.', color: '#1d1d1f' },
    { id: 'exit_strategy', categorie: 'juridique', emoji: '🚪', titre: 'Clause de Sortie', sous_titre: 'Comment quitter proprement un label ou un manager.', color: '#1d1d1f' }
];

// État de l'application
let currentFilter = 'all';
let activeModal = null;

// Initialisation
document.addEventListener('DOMContentLoaded', () => {
    initCanvas();
    renderTools();
    setupFilters();
    setupEventListeners();
    setupCustomCursor();
});

// Rendu des outils
function renderTools(filter = 'all') {
    const grid = document.getElementById('toolsGrid');
    if (!grid) return;
    
    grid.innerHTML = '';
    
    const filteredTools = filter === 'all' 
        ? toolsData 
        : toolsData.filter(tool => tool.categorie === filter);
    
    filteredTools.forEach(tool => {
        const card = document.createElement('div');
        card.className = 'outil-card';
        card.dataset.toolId = tool.id;
        card.dataset.categorie = tool.categorie;
        
        card.innerHTML = `
            <div class="outil-card-header">
                <span class="outil-emoji" style="color: ${tool.color}">${tool.emoji}</span>
                <span class="outil-categorie-tag">${tool.categorie}</span>
            </div>
            <h3 class="outil-titre">${tool.titre}</h3>
            <p class="outil-sous-titre">${tool.sous_titre}</p>
            <button class="outil-btn" onclick="openTool('${tool.id}')">
                <span>Utiliser l'outil</span>
                <span class="btn-arrow">→</span>
            </button>
        `;
        
        grid.appendChild(card);
    });
}

// Setup des filtres
function setupFilters() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            currentFilter = btn.dataset.filter;
            renderTools(currentFilter);
        });
    });
}

// Ouverture d'un outil
function openTool(toolId) {
    const tool = toolsData.find(t => t.id === toolId);
    if (!tool) return;
    
    activeModal = tool;
    
    const modal = document.getElementById('toolModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalDescription = document.getElementById('modalDescription');
    const toolInput = document.getElementById('toolInput');
    const contextInput = document.getElementById('contextInput');
    const generateBtn = document.getElementById('generateBtn');
    const resultDiv = document.getElementById('resultDiv');
    const loadingDiv = document.getElementById('loadingDiv');
    const resultContent = document.getElementById('resultContent');
    
    if (!modal) return;
    
    modalTitle.textContent = `${tool.emoji} ${tool.titre}`;
    modalTitle.style.color = tool.color;
    modalDescription.textContent = tool.sous_titre;
    toolInput.placeholder = getPlaceholderForTool(toolId);
    contextInput.placeholder = 'Contexte optionnel (style musical, objectifs, contraintes...)';
    resultDiv.style.display = 'none';
    loadingDiv.style.display = 'none';
    toolInput.value = '';
    contextInput.value = '';
    
    generateBtn.onclick = () => executeTool(toolId);
    
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

// Placeholder dynamique selon l'outil
function getPlaceholderForTool(toolId) {
    const placeholders = {
        'contract_gen': 'Décris le type de contrat dont tu as besoin (cession, management, distribution...)',
        'clause_analyser': 'Colle la clause à analyser ou décris la situation...',
        'fee_estimator': 'Décris ton profil (streams, followers, marché, type de venue...)',
        'rider_gen': 'Décris ton show (type de venue, durée, formation, besoins spécifiques...)',
        'nego_coach': 'Décris ta situation de négociation (label, promoteur, sponsor...)',
        'career_roadmap': 'Décris ta situation actuelle et tes objectifs à 5 ans...',
        'tour_planner': 'Décris ton projet de tournée (régions, durée, niveau actuel...)',
        'brand_pitch': 'Décris ton profil et le type de marque que tu vises...',
        'crisis_mgnt': 'Décris la situation de crise et ton objectif de communication...',
        'scouting_report': 'Partage tes liens (musique, socials) pour analyse...',
        'bio_pro': 'Donne tes infos principales (nom, origines, style, achievements...)',
        'lyrics_doctor': 'Partage tes lyrics ou décris ce que tu veux améliorer...',
        'concept_album': 'Décris ton projet album (thème, ambiance, influences...)',
        'video_script': 'Décris ta chanson et l\'ambiance visuelle souhaitée...',
        'naming_tool': 'Décris ton style, tes influences, ce que tu veux évoquer...',
        'social_content': 'Décris ton lancement et tes objectifs réseaux sociaux...',
        'storytelling_heritage': 'Partage tes origines et comment les intégrer...',
        'collab_finder': 'Décris ton style et tes artistes de rêve...',
        'press_kit': 'Liste tes informations essentielles (bio, liens, stats...)',
        'interview_prep': 'Décris le type d\'interview et le média...',
        'album_launch': 'Décris ton projet et ta date de sortie visée...',
        'merch_strategy': 'Décris ton univers et tes idées de produits...',
        'tax_diaspora': 'Décris ta situation (pays de résidence, revenus...)',
        'crowdfunding_pro': 'Décris ton projet et ton objectif de financement...',
        'budget_music': 'Décris ton projet et les postes budgétaires...',
        'playlist_pitch': 'Décris ta musique et les playlists visées...',
        'publishing_rights': 'Pose ta question sur tes royalties et droits d\'édition...',
        'investor_deck': 'Décris ton projet et le type d\'investisseurs...',
        'sync_licensing': 'Décris ta musique et les types de productions visées...',
        'ads_copywriter': 'Décris ta campagne et tes objectifs publicitaires...',
        'copyright_world': 'Pose ta question sur la protection de tes œuvres...',
        'nda_gen': 'Décris la situation nécessitant un NDA...',
        'sample_clearance': 'Décris le sample et l\'œuvre originale...',
        'partnership_deal': 'Décris ton groupe et la répartition souhaitée...',
        'gdpr_music': 'Décris ton site et ta collecte de données...',
        'dispute_resolution': 'Décris le conflit et ton objectif de résolution...',
        'trademark_check': 'Décris ton nom de scène et ta zone géographique...',
        'remix_contract': 'Décris le projet de remix et les parties impliquées...',
        'work_for_hire': 'Décris la prestation et le prestataire...',
        'exit_strategy': 'Décris ta situation contractuelle actuelle...'
    };
    return placeholders[toolId] || 'Décrivez votre demande...';
}

// Exécution de l'outil IA
async function executeTool(toolId) {
    const toolInput = document.getElementById('toolInput');
    const contextInput = document.getElementById('contextInput');
    const generateBtn = document.getElementById('generateBtn');
    const loadingDiv = document.getElementById('loadingDiv');
    const resultDiv = document.getElementById('resultDiv');
    const resultContent = document.getElementById('resultContent');
    
    const userInput = toolInput.value.trim();
    const context = contextInput.value.trim();
    
    if (!userInput) {
        alert('Veuillez entrer une demande');
        return;
    }
    
    // UI updates
    generateBtn.disabled = true;
    generateBtn.textContent = 'Génération en cours...';
    loadingDiv.style.display = 'flex';
    resultDiv.style.display = 'none';
    
    try {
        const response = await fetch(API_PROXY_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                tool_id: toolId,
                user_input: userInput,
                context: context
            })
        });
        
        const data = await response.json();
        
        if (!response.ok || !data.success) {
            throw new Error(data.error || 'Erreur lors de la génération');
        }
        
        // Affichage du résultat formaté
        resultContent.innerHTML = formatResponse(data.response);
        resultDiv.style.display = 'block';
        
    } catch (error) {
        console.error('Error:', error);
        resultContent.innerHTML = `<div class="error-message">
            <strong>Erreur:</strong> ${error.message}<br><br>
            Veuillez réessayer ou vérifier votre connexion API.
        </div>`;
        resultDiv.style.display = 'block';
        
    } finally {
        generateBtn.disabled = false;
        generateBtn.textContent = 'Générer';
        loadingDiv.style.display = 'none';
    }
}

// Formatage de la réponse (markdown simple vers HTML)
function formatResponse(text) {
    if (!text) return '';
    
    // Échapper le HTML
    text = text.replace(/&/g, '&amp;')
               .replace(/</g, '&lt;')
               .replace(/>/g, '&gt;');
    
    // Titres
    text = text.replace(/^### (.*$)/gim, '<h3>$1</h3>');
    text = text.replace(/^## (.*$)/gim, '<h2>$1</h2>');
    text = text.replace(/^# (.*$)/gim, '<h1>$1</h1>');
    
    // Gras
    text = text.replace(/\*\*(.*)\*\*/gim, '<strong>$1</strong>');
    
    // Italique
    text = text.replace(/\*(.*)\*/gim, '<em>$1</em>');
    
    // Listes
    text = text.replace(/^\- (.*$)/gim, '<li>$1</li>');
    text = text.replace(/^\* (.*$)/gim, '<li>$1</li>');
    text = text.replace(/^\d+\. (.*$)/gim, '<li>$1</li>');
    
    // Wrap les listes
    text = text.replace(/(<li>.*<\/li>)/s, '<ul>$1</ul>');
    
    // Paragraphes
    text = text.replace(/\n\n/g, '</p><p>');
    text = '<p>' + text + '</p>';
    
    // Nettoyer les paragraphes vides
    text = text.replace(/<p>\s*<\/p>/g, '');
    text = text.replace(/<p>(<h[1-3]>)/g, '$1');
    text = text.replace(/(<\/h[1-3]>)<\/p>/g, '$1');
    text = text.replace(/<p>(<ul>)/g, '$1');
    text = text.replace(/(<\/ul>)<\/p>/g, '$1');
    
    return text;
}

// Fermeture du modal
function closeModal() {
    const modal = document.getElementById('toolModal');
    if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
        activeModal = null;
    }
}

// Copie du résultat
function copyResult() {
    const resultContent = document.getElementById('resultContent');
    if (resultContent) {
        const text = resultContent.innerText;
        navigator.clipboard.writeText(text).then(() => {
            const copyBtn = document.getElementById('copyBtn');
            if (copyBtn) {
                copyBtn.textContent = 'Copié!';
                setTimeout(() => {
                    copyBtn.textContent = 'Copier';
                }, 2000);
            }
        });
    }
}

// Menu mobile toggle
function toggleMobileMenu() {
    const navLinks = document.querySelector('.nav-links');
    if (navLinks) {
        navLinks.classList.toggle('active');
    }
}

// Setup des event listeners globaux
function setupEventListeners() {
    // Fermeture modal avec Echap
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
    
    // Fermeture modal au clic outside
    const modal = document.getElementById('toolModal');
    if (modal) {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });
    }
    
    // Formulaire de contact
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(contactForm);
            const data = Object.fromEntries(formData);
            
            // Simulation d'envoi
            alert('Merci pour votre message. Nous vous répondrons sous 48h.');
            contactForm.reset();
        });
    }
    
    // Smooth scroll pour les ancres
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
}

// Curseur personnalisé
function setupCustomCursor() {
    const cursor = document.querySelector('.custom-cursor');
    const cursorDot = document.querySelector('.cursor-dot');
    
    if (!cursor || !cursorDot) return;
    
    let mouseX = 0, mouseY = 0;
    let cursorX = 0, cursorY = 0;
    
    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
    });
    
    function animateCursor() {
        const speed = 0.15;
        cursorX += (mouseX - cursorX) * speed;
        cursorY += (mouseY - cursorY) * speed;
        
        cursor.style.left = cursorX + 'px';
        cursor.style.top = cursorY + 'px';
        cursorDot.style.left = mouseX + 'px';
        cursorDot.style.top = mouseY + 'px';
        
        requestAnimationFrame(animateCursor);
    }
    
    animateCursor();
    
    // Effet hover sur les éléments interactifs
    const interactiveElements = document.querySelectorAll('a, button, .tool-card, .outil-card');
    interactiveElements.forEach(el => {
        el.addEventListener('mouseenter', () => cursor.classList.add('hover'));
        el.addEventListener('mouseleave', () => cursor.classList.remove('hover'));
    });
}

// Animation Canvas Hero (effet particules connectées)
function initCanvas() {
    const canvas = document.getElementById('heroCanvas');
    if (!canvas) return;
    
    const ctx = canvas.getContext('2d');
    let particles = [];
    let animationId;
    
    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);
    
    class Particle {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.vx = (Math.random() - 0.5) * 0.5;
            this.vy = (Math.random() - 0.5) * 0.5;
            this.size = Math.random() * 2 + 1;
        }
        
        update() {
            this.x += this.vx;
            this.y += this.vy;
            
            if (this.x < 0 || this.x > canvas.width) this.vx *= -1;
            if (this.y < 0 || this.y > canvas.height) this.vy *= -1;
        }
        
        draw() {
            ctx.fillStyle = 'rgba(212, 175, 55, 0.5)';
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
        }
    }
    
    function initParticles() {
        particles = [];
        const particleCount = Math.min(100, Math.floor(canvas.width / 15));
        for (let i = 0; i < particleCount; i++) {
            particles.push(new Particle());
        }
    }
    
    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        particles.forEach((particle, index) => {
            particle.update();
            particle.draw();
            
            // Draw connections
            for (let j = index + 1; j < particles.length; j++) {
                const dx = particles[j].x - particle.x;
                const dy = particles[j].y - particle.y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < 150) {
                    ctx.strokeStyle = `rgba(212, 175, 55, ${0.1 * (1 - distance / 150)})`;
                    ctx.lineWidth = 0.5;
                    ctx.beginPath();
                    ctx.moveTo(particle.x, particle.y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.stroke();
                }
            }
        });
        
        animationId = requestAnimationFrame(animate);
    }
    
    initParticles();
    animate();
}
