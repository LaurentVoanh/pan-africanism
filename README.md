Le projet **PAN-AFRICA VISION 2030** est un portail interactif et prestigieux conçu pour simuler et concevoir des méga-projets de développement à l'échelle du continent africain pour l'horizon 2030. Le projet combine un design "Luxe & Futuriste" avec la puissance de l'IA générative pour offrir une expérience immersive.

Voici les détails approfondis du projet et de ses options :

### 1. Les Outils de Vision IA (Options du Portail)
Le portail propose quatre outils spécialisés utilisant l'IA Mistral pour générer des concepts détaillés :

* **🏙️ Générateur de Cité Futuriste** : Permet de concevoir des villes intelligentes en choisissant la région (ex: Lagos, Nairobi, Dakar), la superficie (de 500 à 50 000 hectares) et le concept directeur (Hub IA, Éco-cité, Zone industrielle).
* **🔬 Hub Scientifique & Spatial** : Projette des infrastructures de recherche de classe mondiale (IA, Génomique, Agence Spatiale) à l'échelle nationale, régionale ou continentale.
* **🏛️ Musée & Pôle Culturel** : Crée des concepts d'institutions culturelles (Musée Panafricain, Bibliothèque Universelle) en définissant une direction architecturale (Afro-futuriste, Néo-traditionnel, High-tech).
* **⚡ Projet Énergie Continent** : Dimensionne des infrastructures énergétiques massives (Solaire au Sahara, Hydrogène vert, Barrages) en ciblant des capacités allant de 500 MW à plus de 100 GW.

### 2. Architecture Technique & Sécurité
Le projet utilise une structure robuste pour garantir performance et sécurité :
* **Proxy Sécurisé (`mistral_proxy.php`)** : Ce script agit comme un rempart. Il contient les clés API Mistral côté serveur pour éviter qu'elles ne soient exposées dans le navigateur de l'utilisateur. Il gère également le **Rate Limiting** (limité à 30 requêtes) pour éviter les abus.
* **Système de Prompting Dynamique** : Chaque option choisie par l'utilisateur est injectée dans un "prompt" sophistiqué qui force l'IA à adopter un rôle précis (urbaniste, ingénieur en chef, directeur artistique) et à structurer sa réponse avec des sections comme la vision, l'impact économique, et le calendrier 2025-2035.

### 3. Design System & Expérience Utilisateur
L'interface est conçue pour évoquer le pouvoir et l'avenir de l'Afrique :
* **Identité Visuelle** : Palette de couleurs nommée "Noir Nuit", "Or Africain", "Vert Savane" et "Rouge Latérite".
* **Interactivité Haute Fidélité** : Utilisation d'un curseur personnalisé qui réagit aux survols, d'un fond animé via Canvas dans la section Hero, et de typographies élégantes (*Cormorant Garamond* pour le prestige et *Syne* pour la modernité).
* **Responsive Design** : Le portail est entièrement optimisé pour mobile, avec une adaptation des grilles et la désactivation du curseur personnalisé sur les écrans tactiles.

### 4. Fonctionnalités de Contact et Leads
Au-delà de la simulation IA, le projet intègre un tunnel de conversion :
* **Gestion des Leads** : Un formulaire de contact permet aux utilisateurs de soumettre des demandes. Les données sont sauvegardées localement et un numéro de référence unique (ex: PAV-K8J2...) est généré pour chaque demande.
* **Simulation d'Engagement** : Le système simule une attente de 72h pour un retour d'un "associé", renforçant l'aspect exclusif et professionnel de la plateforme.

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
