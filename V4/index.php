<?php
/**
 * AFRO ARTIST HUB - Page Principale V4
 * Thème: 2Advanced Studios Light Mode - Afro-Futurisme de Luxe
 * Palette: Blanc Pur · Ivoire · Or Royal · Bronze · Lueurs Dorées
 * Design: HUD, Glassmorphism, Grilles de Précision, Typographie Mixte
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AFRO ARTIST HUB | Prends le contrôle de ton art. Nous gérons le reste.</title>
    <meta name="description" content="Plateforme IA dédiée aux artistes et agents de la musique afro-diasporique. 40 outils professionnels : contrats, création, business, juridique.">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=DM+Mono:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Custom Cursor -->
    <div class="custom-cursor"></div>
    <div class="cursor-dot"></div>

    <!-- Header -->
    <header>
        <nav>
            <div class="logo">AFRO ARTIST HUB</div>
            <ul class="nav-links">
                <li><a href="#vision">Vision</a></li>
                <li><a href="#tools">Outils</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">☰</button>
        </nav>
    </header>
    
    <!-- Hero Section -->
    <section class="hero">
        <canvas id="heroCanvas"></canvas>
        <div class="hero-content">
            <span class="hero-tag">PORTAIL INTERNATIONAL</span>
            <h1>L'Empire de ton Art commence ici.</h1>
            <p class="hero-subtitle">
                Ne sois plus seulement un talent, deviens une puissance. AfroArtistHub fusionne l'excellence créative de la diaspora avec l'intelligence artificielle la plus pointue pour briser les plafonds de verre mondiaux.
            </p>
            
            <div class="hero-cta">
                <a href="#tools" class="btn-primary">Découvrir les 40 Outils</a>
                <a href="#vision" class="btn-secondary">Notre Mission</a>
            </div>

            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">40</span>
                    <span class="stat-label">Outils IA Spécialisés</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Artistes Accompagnés</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">4</span>
                    <span class="stat-label">Secteurs de Puissance</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Support IA Disponible</span>
                </div>
            </div>
        </div>
        
        <!-- HUD Decorative Elements -->
        <div class="hud-circle hud-circle-1"></div>
        <div class="hud-circle hud-circle-2"></div>
        <div class="hud-line hud-line-1"></div>
        <div class="hud-line hud-line-2"></div>
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
