<?php
/**
 * AFRO ARTIST HUB - Page Principale
 * 20 outils IA pour artistes & agents afro dans le monde
 * Palette: Noir ébène · Or Kente · Rouge Ubuntu · Vert Malachite
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AFRO ARTIST HUB | 20 Outils IA pour Artistes & Agents Afro</title>
    <meta name="description" content="Plateforme IA dédiée aux artistes et agents de la musique afro-diasporique. 20 outils professionnels : contrats, création, business, juridique.">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <div class="logo">AFRO ARTIST HUB</div>
            <ul class="nav-links">
                <li><a href="#vision">Vision</a></li>
                <li><a href="#tools">Outils</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <canvas id="heroCanvas"></canvas>
        <div class="hero-content">
            <h1>AFRO ARTIST HUB</h1>
            <p class="hero-subtitle">
                20 outils IA propulsant les carrières des artistes & agents de la musique afro-diasporique
            </p>
            
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">20</span>
                    <span class="stat-label">Outils IA Spécialisés</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Artistes Accompagnés</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">4</span>
                    <span class="stat-label">Catégories Expertes</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Support IA Disponible</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Section -->
    <section id="vision" class="vision">
        <div class="vision-container">
            <span class="section-tag">NOTRE MISSION</span>
            <h2>L'Excellence Artistique Afro, Propulsée par l'IA</h2>
            <div class="vision-text">
                <p>
                    <strong>AFRO ARTIST HUB</strong> est la première plateforme intelligente conçue exclusivement pour 
                    les artistes et agents de la musique afro-diasporique. De Lagos à London, d'Abidjan à Atlanta, 
                    de Johannesburg à Paris, nous outillons la nouvelle génération de talents afro avec une suite 
                    complète de 20 outils IA spécialisés.
                </p>
                <br>
                <p>
                    Notre mission : démocratiser l'accès à l'expertise professionnelle de l'industrie musicale. 
                    Que vous soyez artiste émergent Afrobeats, producteur Amapiano, manager de talent Afro-fusion, 
                    ou agent booking international, nos outils couvrent tous les aspects de votre carrière :
                    <strong>négociation de contrats, création artistique, stratégie business, protection juridique</strong>.
                </p>
                <br>
                <p>
                    Propulsé par les modèles Mistral AI les plus avancés (mistral-large-2512, mistral-medium, 
                    labs-mistral-small-creative, magistral-medium-2509), chaque outil intègre un savoir-faire 
                    métier pointu, spécifiquement entraîné pour les réalités du marché musical afro contemporain.
                </p>
            </div>
        </div>
    </section>

    <!-- Tools Section -->
    <section id="tools" class="tools">
        <div class="tools-container">
            <div class="tools-header">
                <span class="section-tag">SUITE PROFESSIONNELLE</span>
                <h2>Les 20 Outils IA</h2>
                <p style="color: var(--gray); max-width: 600px; margin: 0 auto;">
                    Quatre catégories expertes pour couvrir tous les aspects de votre carrière artistique
                </p>
            </div>

            <!-- Filters -->
            <div class="filters">
                <button class="filter-btn active" data-filter="all">Tous (20)</button>
                <button class="filter-btn" data-filter="agent">🎖️ Agent (6)</button>
                <button class="filter-btn" data-filter="creation">🎨 Création (6)</button>
                <button class="filter-btn" data-filter="business">💼 Business (5)</button>
                <button class="filter-btn" data-filter="juridique">⚖️ Juridique (3)</button>
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
                    <select id="subject" name="subject" style="width: 100%; padding: 1rem; background: var(--ebony); border: 1px solid rgba(255,255,255,0.2); color: var(--white); font-family: var(--font-tech);">
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
                    <h4>Outils</h4>
                    <ul>
                        <li><a href="#tools" data-filter="agent">Agent & Management</a></li>
                        <li><a href="#tools" data-filter="creation">Création & Contenu</a></li>
                        <li><a href="#tools" data-filter="business">Business & Tournée</a></li>
                        <li><a href="#tools" data-filter="juridique">Juridique & Droits</a></li>
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
                    propulsé par Mistral AI • Design System Ébène/Kente/Ubuntu/Malachite
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="app.js"></script>
</body>
</html>
