/**
 * AFRO ARTIST HUB - Application JavaScript V3
 * 24 outils IA pour artistes & agents afro dans le monde
 * Palette: Ocre · Terracotta · Jaune Solaire · Vert Émeraude
 */

// Configuration
const API_PROXY_URL = 'mistral_proxy.php';

// Données des 24 outils (ajout de 4 nouveaux outils Marketing)
const toolsData = [
    // ===== CATÉGORIE AGENT =====
    {
        id: 'contrat_ia',
        name: 'Contrat IA',
        category: 'agent',
        icon: '📜',
        description: 'Analyse intelligente de contrats musicaux',
        color: '#D4A04B'
    },
    {
        id: 'analyse_clause',
        name: 'Analyseur de Clauses',
        category: 'agent',
        icon: '🔍',
        description: 'Décryptage clause par clause',
        color: '#D4A04B'
    },
    {
        id: 'coach_negociation',
        name: 'Coach Négociation',
        category: 'agent',
        icon: '💼',
        description: 'Stratégies de négociation gagnantes',
        color: '#D4A04B'
    },
    {
        id: 'rider_technique',
        name: 'Rider Technique',
        category: 'agent',
        icon: '🎛️',
        description: 'Génération de riders professionnels',
        color: '#D4A04B'
    },
    {
        id: 'dossier_presse',
        name: 'Dossier de Presse',
        category: 'agent',
        icon: '📰',
        description: 'Création de dossiers presse percutants',
        color: '#D4A04B'
    },
    {
        id: 'estimateur_cachet',
        name: 'Estimateur de Cachets',
        category: 'agent',
        icon: '💰',
        description: 'Estimation réaliste de vos cachets',
        color: '#D4A04B'
    },
    
    // ===== CATÉGORIE CRÉATION =====
    {
        id: 'biographie_ia',
        name: 'Biographie IA',
        category: 'creation',
        icon: '✍️',
        description: 'Biographies artistiques captivantes',
        color: '#C1684E'
    },
    {
        id: 'pitch_label',
        name: 'Pitch Label',
        category: 'creation',
        icon: '🎯',
        description: 'Pitches convaincants pour labels',
        color: '#C1684E'
    },
    {
        id: 'strategie_album',
        name: 'Stratégie Album',
        category: 'creation',
        icon: '💿',
        description: 'Plans de sortie d\'album complets',
        color: '#C1684E'
    },
    {
        id: 'concept_clip',
        name: 'Concept Clip',
        category: 'creation',
        icon: '🎬',
        description: 'Concepts de clips vidéo créatifs',
        color: '#C1684E'
    },
    {
        id: 'lyrics_coach',
        name: 'Lyrics Coach',
        category: 'creation',
        icon: '🎤',
        description: 'Coaching écriture et songwriting',
        color: '#C1684E'
    },
    {
        id: 'epk_generator',
        name: 'EPK Generator',
        category: 'creation',
        icon: '📱',
        description: 'Electronic Press Kit complet',
        color: '#C1684E'
    },
    
    // ===== CATÉGORIE BUSINESS =====
    {
        id: 'plan_tournee',
        name: 'Plan de Tournée',
        category: 'business',
        icon: '🌍',
        description: 'Organisation de tournées internationales',
        color: '#2E8B57'
    },
    {
        id: 'budget_previsionnel',
        name: 'Budget Prévisionnel',
        category: 'business',
        icon: '📊',
        description: 'Budgets détaillés et projections',
        color: '#2E8B57'
    },
    {
        id: 'recherche_sponsors',
        name: 'Recherche Sponsors',
        category: 'business',
        icon: '🤝',
        description: 'Opportunités de partenariats',
        color: '#2E8B57'
    },
    {
        id: 'fiscal_diaspora',
        name: 'Fiscalité Diaspora',
        category: 'business',
        icon: '⚖️',
        description: 'Conseils fiscaux internationaux',
        color: '#2E8B57'
    },
    {
        id: 'strategie_merch',
        name: 'Stratégie Merch',
        category: 'business',
        icon: '👕',
        description: 'Stratégies de merchandising',
        color: '#2E8B57'
    },
    {
        id: 'investisseurs',
        name: 'Trouver Investisseurs',
        category: 'business',
        icon: '💎',
        description: 'Identifier et approcher des investisseurs',
        color: '#2E8B57'
    },
    
    // ===== CATÉGORIE JURIDIQUE =====
    {
        id: 'droits_auteur',
        name: 'Droits d\'Auteur',
        category: 'juridique',
        icon: '©️',
        description: 'Guide des droits et royalties',
        color: '#1d1d1f'
    },
    {
        id: 'analyse_nda',
        name: 'Analyseur NDA',
        category: 'juridique',
        icon: '🔒',
        description: 'Analyse d\'accords de confidentialité',
        color: '#1d1d1f'
    },
    {
        id: 'litige_mediation',
        name: 'Litige & Médiation',
        category: 'juridique',
        icon: '🕊️',
        description: 'Résolution de conflits musicaux',
        color: '#1d1d1f'
    },
    
    // ===== NOUVELLE CATÉGORIE MARKETING =====
    {
        id: 'social_media_strategy',
        name: 'Stratégie Social Media',
        category: 'marketing',
        icon: '📱',
        description: 'Plan de contenu réseaux sociaux',
        color: '#F4C430'
    },
    {
        id: 'playlist_pitching',
        name: 'Playlist Pitching',
        category: 'marketing',
        icon: '🎵',
        description: 'Stratégie de placement playlists',
        color: '#F4C430'
    },
    {
        id: 'fan_engagement',
        name: 'Fan Engagement',
        category: 'marketing',
        icon: '❤️',
        description: 'Stratégies pour engager ta communauté',
        color: '#F4C430'
    }
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
        : toolsData.filter(tool => tool.category === filter);
    
    filteredTools.forEach(tool => {
        const card = document.createElement('div');
        card.className = 'tool-card';
        card.dataset.toolId = tool.id;
        card.dataset.category = tool.category;
        card.style.borderColor = tool.color;
        
        card.innerHTML = `
            <div class="tool-icon" style="color: ${tool.color}">${tool.icon}</div>
            <h3 class="tool-name">${tool.name}</h3>
            <p class="tool-description">${tool.description}</p>
            <button class="tool-btn" onclick="openTool('${tool.id}')">
                Utiliser l'outil
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
    
    modalTitle.textContent = `${tool.icon} ${tool.name}`;
    modalTitle.style.color = tool.color;
    modalDescription.textContent = tool.description;
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
        'contrat_ia': 'Collez ou décrivez le contrat à analyser...',
        'analyse_clause': 'Entrez la clause spécifique à analyser...',
        'coach_negociation': 'Décrivez votre situation de négociation (label, promoteur, sponsor...)',
        'rider_technique': 'Décrivez votre show (type de venue, durée, formation...)',
        'dossier_presse': 'Donnez les infos principales sur l\'artiste (nom, style, achievements...)',
        'estimateur_cachet': 'Décrivez l\'artiste (streams, followers, marché, type de venue...)',
        'biographie_ia': 'Donnez les éléments biographiques de l\'artiste (origines, parcours, style...)',
        'pitch_label': 'Présentez l\'artiste et le label visé...',
        'strategie_album': 'Décrivez le projet album (genre, nombre de titres, features potentielles...)',
        'concept_clip': 'Décrivez la chanson et l\'ambiance souhaitée pour le clip...',
        'lyrics_coach': 'Partagez vos lyrics ou décrivez ce que vous voulez écrire...',
        'epk_generator': 'Listez les informations essentielles de l\'artiste...',
        'plan_tournee': 'Décrivez votre projet de tournée (régions, durée, niveau de l\'artiste...)',
        'budget_previsionnel': 'Décrivez votre projet et les postes budgétaires à prévoir...',
        'recherche_sponsors': 'Décrivez l\'artiste et le type de sponsors recherchés...',
        'fiscal_diaspora': 'Décrivez votre situation (pays de résidence, revenus, projets...)',
        'strategie_merch': 'Décrivez l\'artiste et vos objectifs merch...',
        'droits_auteur': 'Posez votre question sur les droits d\'auteur...',
        'analyse_nda': 'Collez ou décrivez le NDA à analyser...',
        'litige_mediation': 'Décrivez le conflit ou litige en cours...',
        'investisseurs': 'Décrivez votre projet et le type d\'investisseurs recherchés...',
        'social_media_strategy': 'Décrivez votre présence actuelle et vos objectifs réseaux sociaux...',
        'playlist_pitching': 'Décrivez votre musique et les playlists visées...',
        'fan_engagement': 'Décrivez votre communauté actuelle et vos objectifs d\'engagement...'
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
            
            // Génération référence unique
            const ref = 'AAH-' + Date.now().toString(36).toUpperCase();
            
            alert(`Merci! Votre référence: ${ref}\nNous vous contacterons sous 48h.`);
            contactForm.reset();
        });
    }
    
    // Smooth scroll pour les ancres
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                // Fermer le menu mobile si ouvert
                const navLinks = document.querySelector('.nav-links');
                if (navLinks && navLinks.classList.contains('active')) {
                    navLinks.classList.remove('active');
                }
            }
        });
    });
}

// Curseur personnalisé
function setupCustomCursor() {
    // Désactiver sur mobile
    if (window.innerWidth <= 768) return;
    
    const cursor = document.createElement('div');
    cursor.className = 'custom-cursor';
    document.body.appendChild(cursor);
    
    const cursorDot = document.createElement('div');
    cursorDot.className = 'cursor-dot';
    document.body.appendChild(cursorDot);
    
    document.addEventListener('mousemove', (e) => {
        cursor.style.left = e.clientX + 'px';
        cursor.style.top = e.clientY + 'px';
        cursorDot.style.left = e.clientX + 'px';
        cursorDot.style.top = e.clientY + 'px';
    });
    
    // Effet hover sur les éléments interactifs
    const interactiveElements = document.querySelectorAll('a, button, .tool-card, input, textarea');
    interactiveElements.forEach(el => {
        el.addEventListener('mouseenter', () => {
            cursor.classList.add('hover');
        });
        el.addEventListener('mouseleave', () => {
            cursor.classList.remove('hover');
        });
    });
}

// Animation canvas hero
function initCanvas() {
    const canvas = document.getElementById('heroCanvas');
    if (!canvas) return;
    
    const ctx = canvas.getContext('2d');
    let width = canvas.width = window.innerWidth;
    let height = canvas.height = 600;
    
    // Particules inspirées motifs africains - version claire
    const particles = [];
    const colors = ['#D4A04B', '#C1684E', '#F4C430', '#2E8B57'];
    
    class Particle {
        constructor() {
            this.reset();
        }
        
        reset() {
            this.x = Math.random() * width;
            this.y = Math.random() * height;
            this.size = Math.random() * 3 + 1;
            this.speedX = Math.random() * 0.5 - 0.25;
            this.speedY = Math.random() * 0.5 - 0.25;
            this.color = colors[Math.floor(Math.random() * colors.length)];
            this.opacity = Math.random() * 0.5 + 0.3;
        }
        
        update() {
            this.x += this.speedX;
            this.y += this.speedY;
            
            if (this.x < 0 || this.x > width || this.y < 0 || this.y > height) {
                this.reset();
            }
        }
        
        draw() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fillStyle = this.color;
            ctx.globalAlpha = this.opacity;
            ctx.fill();
        }
    }
    
    // Création des particules
    for (let i = 0; i < 80; i++) {
        particles.push(new Particle());
    }
    
    // Lignes connectées (inspiré motifs Kente)
    function drawConnections() {
        for (let i = 0; i < particles.length; i++) {
            for (let j = i + 1; j < particles.length; j++) {
                const dx = particles[i].x - particles[j].x;
                const dy = particles[i].y - particles[j].y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < 120) {
                    ctx.beginPath();
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.strokeStyle = '#D4A04B';
                    ctx.globalAlpha = (1 - distance / 120) * 0.2;
                    ctx.lineWidth = 0.5;
                    ctx.stroke();
                }
            }
        }
    }
    
    // Animation loop
    function animate() {
        ctx.clearRect(0, 0, width, height);
        
        // Gradient de fond clair
        const gradient = ctx.createLinearGradient(0, 0, width, height);
        gradient.addColorStop(0, '#ffffff');
        gradient.addColorStop(1, '#fafafa');
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, width, height);
        
        particles.forEach(p => {
            p.update();
            p.draw();
        });
        
        drawConnections();
        
        requestAnimationFrame(animate);
    }
    
    animate();
    
    // Resize handler
    window.addEventListener('resize', () => {
        width = canvas.width = window.innerWidth;
        height = canvas.height = 600;
        particles.forEach(p => p.reset());
    });
}

// Export pour accès global
window.openTool = openTool;
window.closeModal = closeModal;
window.copyResult = copyResult;
window.toggleMobileMenu = toggleMobileMenu;
