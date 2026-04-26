<?php
/**
 * AFRO ARTIST HUB - Page Principale V4.5
 * Thème: Bootstrap Panel Futuriste - Afro-Futurisme High-Tech
 * Palette: Noir Profond · Or Quantique · Bleu Cyber · Violet Nébuleuse
 * Design: Panels HUD, Glassmorphism, Grilles Holographiques, Animations Fluides
 * 40 OUTILS IA COMPLETS - Optimisé PC & Smartphone
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AFRO ARTIST HUB | 40 Outils IA pour Artistes & Agents</title>
    <meta name="description" content="Plateforme IA dédiée aux artistes et agents de la musique afro-diasporique. 40 outils professionnels : contrats, création, business, juridique.">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800&family=Rajdhani:wght@300;400;500;600;700&family=Audiowide&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Background Grid Animation -->
    <div class="bg-animation">
        <div class="grid-overlay"></div>
        <div class="scan-line"></div>
        <div class="floating-particles" id="particles"></div>
    </div>

    <!-- Custom Cursor -->
    <div class="custom-cursor"></div>
    <div class="cursor-dot"></div>

    <!-- Navigation Panel -->
    <nav class="navbar navbar-expand-lg fixed-top glass-panel">
        <div class="container-fluid px-3 px-lg-5">
            <a class="navbar-brand brand-logo" href="#">
                <span class="logo-icon"><i class="bi bi-cpu-fill"></i></span>
                <span class="logo-text">AFRO<span class="highlight">ARTIST</span>HUB</span>
            </a>
            
            <button class="navbar-toggler futuristic-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="toggler-line"></span>
                <span class="toggler-line"></span>
                <span class="toggler-line"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#vision"><i class="bi bi-eye-fill"></i> Vision</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tools"><i class="bi bi-grid-3x3-gap-fill"></i> Outils</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features"><i class="bi bi-stars"></i> Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact"><i class="bi bi-envelope-fill"></i> Contact</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a href="#tools" class="btn btn-neon">
                            <i class="bi bi-rocket-takeoff-fill"></i> Démarrer
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center">
        <canvas id="heroCanvas"></canvas>
        
        <div class="container position-relative z-index-1">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10">
                    <!-- Badge -->
                    <div class="hero-badge mb-4 animate-fade-in">
                        <span class="badge-icon"><i class="bi bi-lightning-charge-fill"></i></span>
                        <span>PORTAIL INTERNATIONAL IA</span>
                    </div>
                    
                    <!-- Main Title -->
                    <h1 class="hero-title mb-4 animate-slide-up">
                        L'<span class="gradient-text">Empire</span> de ton Art<br>commence ici.
                    </h1>
                    
                    <!-- Subtitle -->
                    <p class="hero-subtitle mb-5 animate-slide-up delay-1">
                        Ne sois plus seulement un talent, deviens une <strong class="highlight-text">puissance</strong>. 
                        AfroArtistHub fusionne l'excellence créative de la diaspora avec l'intelligence artificielle 
                        la plus pointue pour briser les plafonds de verre mondiaux.
                    </p>
                    
                    <!-- CTA Buttons -->
                    <div class="hero-cta mb-5 animate-slide-up delay-2">
                        <a href="#tools" class="btn btn-primary-glow me-3">
                            <i class="bi bi-grid-3x3-gap-fill"></i>
                            Découvrir les 40 Outils
                        </a>
                        <a href="#vision" class="btn btn-secondary-outline">
                            <i class="bi bi-play-circle-fill"></i>
                            Notre Mission
                        </a>
                    </div>
                    
                    <!-- Stats Panel -->
                    <div class="stats-panel glass-panel animate-scale-in delay-3">
                        <div class="row g-0">
                            <div class="col-6 col-md-3 stat-item border-end">
                                <div class="stat-number gradient-text">40</div>
                                <div class="stat-label">Outils IA</div>
                            </div>
                            <div class="col-6 col-md-3 stat-item border-end">
                                <div class="stat-number gradient-text">500+</div>
                                <div class="stat-label">Artistes</div>
                            </div>
                            <div class="col-6 col-md-3 stat-item border-end">
                                <div class="stat-number gradient-text">4</div>
                                <div class="stat-label">Secteurs</div>
                            </div>
                            <div class="col-6 col-md-3 stat-item">
                                <div class="stat-number gradient-text">24/7</div>
                                <div class="stat-label">Support IA</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- HUD Decorative Elements -->
        <div class="hud-element hud-ring-1"></div>
        <div class="hud-element hud-ring-2"></div>
        <div class="hud-element hud-corner tl"></div>
        <div class="hud-element hud-corner tr"></div>
        <div class="hud-element hud-corner bl"></div>
        <div class="hud-element hud-corner br"></div>
    </section>

    <!-- Vision Section -->
    <section id="vision" class="vision">
        <div class="vision-container">
            <span class="section-tag">NOTRE MISSION</span>
            <h2>Tu crées l'histoire, nous forgeons tes outils.</h2>
            <div class="vision-text">
                <p>
                    <strong>AFRO ARTIST HUB</strong> est la première plateforme intelligente conçue exclusivement pour 
                    les artistes et agents de la musique afro-diasporique. De Lagos à New York, d'Abidjan à Londres, 
                    nous donnons aux architectes de la culture Afro les moyens de dominer l'industrie.
                </p>
                <br>
                <p>
                    Ta musique n'a pas de frontières, tes revenus ne devraient pas en avoir non plus. 
                    Que vous soyez artiste émergent Afrobeats, producteur Amapiano, manager de talent Afro-fusion, 
                    ou agent booking international, nos 40 outils couvrent tous les aspects de votre carrière :
                    <strong>domination marché, génie créatif, armure juridique, operations logistiques</strong>.
                </p>
                <br>
                <p>
                    Propulsé par les modèles Mistral AI les plus avancés (mistral-large-2512, mistral-medium, 
                    labs-mistral-small-creative, magistral-medium-2509), chaque outil intègre un savoir-faire 
                    métier pointu, spécifiquement entraîné pour les réalités du marché musical afro contemporain.
                    Expertise OHADA pour l'Afrique, SACEM pour l'Europe, codes culturels Afro intégrés.
                </p>
            </div>
            
            <!-- Mission Cards -->
            <div class="mission-cards">
                <div class="mission-card">
                    <div class="mission-icon">🚀</div>
                    <h3>Domination Marché</h3>
                    <p>Stratégies business pour conquérir les marchés mondiaux</p>
                </div>
                <div class="mission-card">
                    <div class="mission-icon">🎨</div>
                    <h3>Génie Créatif</h3>
                    <p>Outils de création pour amplifier ton expression artistique</p>
                </div>
                <div class="mission-card">
                    <div class="mission-icon">⚖️</div>
                    <h3>Armure Juridique</h3>
                    <p>Protection legale blindée pour tes œuvres et revenus</p>
                </div>
                <div class="mission-card">
                    <div class="mission-icon">🌍</div>
                    <h3>Agent & Logistique</h3>
                    <p>Operations et management pour tournées internationales</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tools Section -->
    <section id="tools" class="tools">
        <div class="tools-container">
            <div class="tools-header">
                <span class="section-tag">SUITE PROFESSIONNELLE</span>
                <h2>Les 40 Outils IA</h2>
                <p style="color: var(--gray); max-width: 600px; margin: 0 auto;">
                    Quatre secteurs de puissance pour couvrir tous les aspects de votre carrière artistique
                </p>
            </div>

            <!-- Filters -->
            <div class="filters">
                <button class="filter-btn active" data-filter="all">Tous (40)</button>
                <button class="filter-btn" data-filter="business">🚀 Domination (10)</button>
                <button class="filter-btn" data-filter="creation">🎨 Créatif (10)</button>
                <button class="filter-btn" data-filter="juridique">⚖️ Juridique (10)</button>
                <button class="filter-btn" data-filter="agent">🌍 Agent (10)</button>
            </div>

            <!-- Tools Grid -->
            <div id="toolsGrid" class="tools-grid">
                <!-- Les outils seront générés dynamiquement par app.js -->
            </div>
        </div>
    </section>

    <!-- Tool Modal -->
    <div id="toolModal" class="modal-overlay">
        <div class="modal">
            <div class="modal-header">
                <h3 id="modalTitle" class="modal-title">Nom de l'Outil</h3>
                <button class="modal-close" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body">
                <p id="modalDescription" class="modal-description">Description de l'outil</p>
                
                <div class="input-group">
                    <label for="toolInput">Votre Demande</label>
                    <textarea id="toolInput" placeholder="Décrivez votre demande..."></textarea>
                </div>
                
                <div class="input-group">
                    <label for="contextInput">Contexte (optionnel)</label>
                    <input type="text" id="contextInput" placeholder="Style musical, objectifs, contraintes...">
                </div>
                
                <button id="generateBtn" class="generate-btn">Générer</button>
                
                <div id="loadingDiv" class="loading">
                    <div class="loading-spinner"></div>
                    <p class="loading-text">L'IA analyse votre demande...</p>
                </div>
                
                <div id="resultDiv" class="result">
                    <div id="resultContent" class="result-content"></div>
                    <div class="result-actions">
                        <button id="copyBtn" class="action-btn" onclick="copyResult()">Copier</button>
                        <button class="action-btn" onclick="closeModal()">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="contact-container">
            <span class="section-tag">CONTACT</span>
            <h2>Rejoignez la Révolution</h2>
            <p class="contact-intro">
                Vous êtes label, festival, institution culturelle ou investisseur ? 
                Discutons de partenariats stratégiques.
            </p>
            
            <form id="contactForm" class="contact-form">
                <div class="form-row">
                    <div class="input-group">
                        <label for="firstName">Prénom</label>
                        <input type="text" id="firstName" name="firstName" required>
                    </div>
                    <div class="input-group">
                        <label for="lastName">Nom</label>
                        <input type="text" id="lastName" name="lastName" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="input-group">
                        <label for="company">Structure / Label</label>
                        <input type="text" id="company" name="company">
                    </div>
                </div>
                
                <div class="input-group">
                    <label for="subject">Sujet</label>
                    <select id="subject" name="subject" style="width: 100%; padding: 1rem; background: #fafafa; border: 1px solid rgba(212, 175, 55, 0.3); color: #1a1a1a; font-family: var(--font-tech);">
                        <option value="">Sélectionnez un sujet</option>
                        <option value="partnership">Partenariat Commercial</option>
                        <option value="enterprise">Licence Entreprise</option>
                        <option value="integration">Intégration API</option>
                        <option value="press">Presse & Médias</option>
                        <option value="other">Autre</option>
                    </select>
                </div>
                
                <div class="input-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                
                <button type="submit" class="submit-btn">Envoyer la Demande</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4>AFRO ARTIST HUB</h4>
                    <p style="color: var(--gray); font-size: 0.9rem; line-height: 1.8;">
                        La plateforme de référence pour les professionnels de la musique afro-diasporique. 
                        Intelligence artificielle au service de l'excellence artistique.
                    </p>
                </div>
                
                <div class="footer-col">
                    <h4>Secteurs</h4>
                    <ul>
                        <li><a href="#tools" data-filter="business">Domination Marché</a></li>
                        <li><a href="#tools" data-filter="creation">Génie Créatif</a></li>
                        <li><a href="#tools" data-filter="juridique">Armure Juridique</a></li>
                        <li><a href="#tools" data-filter="agent">Agent & Logistique</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Ressources</h4>
                    <ul>
                        <li><a href="#" target="_blank">SACEM (France)</a></li>
                        <li><a href="#" target="_blank">CISAC International</a></li>
                        <li><a href="#" target="_blank">SAMRO (Afrique du Sud)</a></li>
                        <li><a href="#" target="_blank">MCSN (Nigéria)</a></li>
                        <li><a href="#" target="_blank">CNM - Centre National de la Musique</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Légal</h4>
                    <ul>
                        <li><a href="#">Conditions d'Utilisation</a></li>
                        <li><a href="#">Politique de Confidentialité</a></li>
                        <li><a href="#">Mentions Légales</a></li>
                        <li><a href="#">CGV Professionnels</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> AFRO ARTIST HUB. Tous droits réservés.</p>
                <p style="margin-top: 0.5rem; font-size: 0.8rem;">
                    propulsé par Mistral AI • Design System 2Advanced Light Mode
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="app.js"></script>
</body>
</html>
