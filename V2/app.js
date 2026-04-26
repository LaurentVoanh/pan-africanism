/**
 * app.js — AFRO ARTIST AGENT PORTAL
 * Portail pour agents d'artistes afro · Diaspora artistique · Industrie culturelle
 * IA Mistral · Stratégies de carrière · Booking · Production · Expansion internationale
 */

'use strict';

const PROXY_URL = './mistral_proxy.php';

// ===== OUTILS IA AGENT ARTISTE =====
const OUTILS = [
  {
    id: 1,
    icon: '🎤',
    titre: 'Stratégie de Carrière Artiste',
    desc: 'Développe une stratégie complète de développement de carrière pour un artiste afro : positionnement, cible, roadmap, partenariats.',
    champs: [
      { id: 'style', label: 'Style musical / Artistique', type: 'select', opts: ['Afrobeats', 'Amapiano', 'Rap FR/EN', 'R&B Afro', 'Coupé-Décalé', 'Bongo Flava', 'Gospel Afro', 'Jazz Afro-contemporain', 'Pop Africaine', 'Electro Afro'] },
      { id: 'origine', label: 'Origine / Base', type: 'select', opts: ['Nigeria — Lagos', 'France — Paris', 'USA — Atlanta/NYC', 'UK — Londres', "Côte d'Ivoire — Abidjan", 'Sénégal — Dakar', 'Cameroun — Douala', 'RD Congo — Kinshasa', 'Diaspora — Autre'] },
      { id: 'niveau', label: 'Niveau actuel', type: 'select', opts: ['Émergent — 0-10K abonnés', 'En croissance — 10-100K', 'Établi — 100K-1M', 'Star confirmée — 1M+'] },
      { id: 'objectif', label: 'Objectif principal', type: 'select', opts: ['Signature label international', 'Tournée européenne', 'Collaboration majeure', 'Monétisation streaming', 'Expansion diaspora', 'Lancement album'] },
    ],
    prompt: d => `Tu es un manager artistique expert de AFRO ARTIST AGENT. Développe une stratégie complète de carrière pour un artiste afro de style "${d.style}", basé à ${d.origine}, niveau "${d.niveau}", avec pour objectif "${d.objectif}".
Structure la réponse ainsi :
1. POSITIONNEMENT & IDENTITÉ (USP, storytelling, image de marque)
2. ANALYSE DU MARCHÉ CIBLE (audience, concurrents directs, opportunités)
3. STRATÉGIE DE CONTENU (release plan, formats, plateformes prioritaires)
4. DÉVELOPPEMENT DIGITAL (social media, community management, growth hacking)
5. BOOKING & LIVE (stratégie de concerts, festivals cibles, tournées)
6. PARTENARIATS & COLLABORATIONS (featurings, brands deals, sync licensing)
7. ROADMAP 12-24 MOIS (jalons clés, KPIs à atteindre)
8. BUDGET ESTIMATIF & ROI ATTENDU
Sois précis, actionnable et ambitieux. Ce plan doit propulser l'artiste vers le niveau supérieur.`
  },
  {
    id: 2,
    icon: '📊',
    titre: 'Analyse Marché & Tendances',
    desc: 'Analyse les tendances du marché musical afro dans une région donnée : opportunités, concurrents, stratégies gagnantes.',
    champs: [
      { id: 'region', label: 'Région cible', type: 'select', opts: ['Afrique de l\'Ouest', 'Afrique Centrale', 'Afrique de l\'Est', 'Europe Francophone', 'Europe Anglophone', 'Amérique du Nord', 'Caraïbes', 'Monde Arabe'] },
      { id: 'genre', label: 'Genre musical', type: 'select', opts: ['Afrobeats', 'Amapiano', 'Rap', 'R&B', 'Dancehall', 'Afro-Pop', 'Gospel', 'Instrumental Afro'] },
      { id: 'focus', label: 'Focus analyse', type: 'select', opts: ['Streaming & Charts', 'Live & Festivals', 'Social Media & Viral', 'Brand Deals & Sponsors', 'Sync & Licensing'] },
    ],
    prompt: d => `Tu es un analyste musical senior de AFRO ARTIST AGENT. Réalise une analyse approfondie du marché "${d.genre}" en région "${d.region}", focus "${d.focus}".
Inclus :
1. ÉTAT DU MARCHÉ (taille, croissance, acteurs majeurs, chiffres clés)
2. TENDANCES LOURDES 2025-2027 (ce qui monte, ce qui décline)
3. ARTISTES DE RÉFÉRENCE (top 5, leurs stratégies gagnantes)
4. OPPORTUNITÉS IDENTIFIÉES (niches, audiences sous-servies, gaps du marché)
5. PLATEFORMES CLÉS (où concentrer les efforts : Spotify, Apple Music, YouTube, TikTok, etc.)
6. STRATÉGIES GAGNANTES (tactiques concrètes observées sur le terrain)
7. RECOMMANDATIONS POUR UN ARTISTE AFRO (comment percer sur ce marché)
Sois data-driven, précis et orienté action.`
  },
  {
    id: 3,
    icon: '🎬',
    titre: 'Concept Clip & Visuel',
    desc: 'Génère un concept complet de clip vidéo ou contenu visuel pour un artiste afro : direction artistique, storyboard, budget.',
    champs: [
      { id: 'ambiance', label: 'Ambiance visuelle', type: 'select', opts: ['Afro-futuriste high-tech', 'Street urbain authentique', 'Luxe & Glamour', 'Traditionnel revisité', 'Minimaliste arty', 'Festival énergique'] },
      { id: 'lieu', label: 'Lieu de tournage', type: 'select', opts: ['Lagos — Nigeria', 'Abidjan — Côte d\'Ivoire', 'Paris — France', 'Londres — UK', 'Atlanta — USA', 'Dakar — Sénégal', 'Douala — Cameroun', 'Johannesburg — RSA'] },
      { id: 'budget', label: 'Budget production', type: 'select', opts: ['5K-15K USD — Low budget créatif', '20K-50K USD — Production standard', '60K-150K USD — Haut de gamme', '200K+ USD — Blockbuster'] },
      { id: 'titre', label: 'Titre de la chanson', type: 'text', ph: 'Ex: "Sunset Vibes", "Lagos Night"...' },
    ],
    prompt: d => `Tu es un directeur artistique et réalisateur de AFRO ARTIST AGENT. Conçois un concept complet de clip vidéo pour "${d.titre}", ambiance "${d.ambiance}", tournage à ${d.lieu}, budget ${d.budget}.
Développe :
1. CONCEPT GÉNÉRAL & THÈME (quelle histoire raconte-t-on ?)
2. DIRECTION ARTISTIQUE (palette couleurs, styling, décors, accessoires)
3. STORYBOARD DÉTAILLÉ (séquence par séquence : intro, couplets, refrain, pont, outro)
4. CASTING & FIGURATION (nombre de personnes, profils, costumes)
5. PLAN DE TOURNAGE (jours nécessaires, équipe technique, matériel)
6. POST-PRODUCTION (effets spéciaux, étalonnage, VFX, délais)
7. BUDGET DÉTAILLÉ (pré-prod, tournage, post, contingence)
8. STRATÉGIE DE SORTIE (teasing, premiere, promotion cross-plateformes)
Sois créatif, cinématographique et adapté au code culturel afro-contemporain.`
  },
  {
    id: 4,
    icon: '💼',
    titre: 'Négociation Contrat & Deal',
    desc: 'Prépare une stratégie de négociation pour un contrat artistique : label, booking, publishing, sponsoring.',
    champs: [
      { id: 'type', label: 'Type de contrat', type: 'select', opts: ['Contrat d\'enregistrement (Label)', 'Contrat de booking / Management', 'Contrat d\'édition (Publishing)', 'Sponsor / Brand Deal', 'Licence de synchronisation', 'Distribution digitale'] },
      { id: 'niveau', label: 'Niveau de l\'artiste', type: 'select', opts: ['Émergent — Premier deal', 'Intermédiaire — Déjà des streams', 'Confirmé — Chiffres solides', 'Star — Pouvoir de négociation'] },
      { id: 'enjeu', label: 'Point de négociation clé', type: 'select', opts: ['Pourcentage royalties', 'Advance payment', 'Durée engagement', 'Propriété masters', 'Territoires couverts', 'Clause de sortie'] },
    ],
    prompt: d => `Tu es un avocat spécialisé entertainment et négociateur de AFRO ARTIST AGENT. Prépare une stratégie de négociation complète pour un "${type}" avec un artiste de niveau "${d.niveau}", point critique "${d.enjeu}".
Structure :
1. COMPREHENSION DU DEAL (contexte, parties prenantes, enjeux)
2. STANDARDS DU MARCHÉ (ce qui se fait pour ce type de contrat et niveau)
3. POINTS FORTS DE L'ARTISTE (leviers de négociation, valeur apportée)
4. CLAUSES CRITIQUES À NÉGOCIER (détail des points à défendre)
5. STRATÉGIE DE NÉGOCIATION (approche, arguments, concessions possibles)
6. RED FLAGS À ÉVITER (clauses abusives, pièges courants)
7. CHECKLIST AVANT SIGNATURE (due diligence, vérifications)
8. ALTERNATIVES SI BLOCKAGE (plan B, autres options)
Sois rigoureux, protecteur des intérêts de l'artiste et pragmatique.`
  },
  {
    id: 5,
    icon: '🌍',
    titre: 'Expansion Internationale',
    desc: 'Construis une stratégie d'expansion internationale pour un artiste afro souhaitant percer sur un nouveau marché.',
    champs: [
      { id: 'origine', label: 'Marché actuel', type: 'select', opts: ['Nigeria', 'France', 'Côte d\'Ivoire', 'Sénégal', 'Cameroun', 'RD Congo', 'UK', 'USA'] },
      { id: 'cible', label: 'Marché cible', type: 'select', opts: ['USA', 'UK', 'France', 'Brésil', 'Monde Arabe', 'Asie', 'Reste de l\'Afrique', 'Caraïbes'] },
      { id: 'style', label: 'Style musical', type: 'select', opts: ['Afrobeats', 'Amapiano', 'Rap', 'R&B', 'Afro-Pop', 'Gospel', 'Autre'] },
      { id: 'budget', label: 'Budget expansion', type: 'select', opts: ['Bootstrap — <10K USD', 'Sérieux — 10-50K USD', 'Major — 50-200K USD', 'Illimité — Backing label'] },
    ],
    prompt: d => `Tu es un stratège international de AFRO ARTIST AGENT. Construis une stratégie d'expansion du marché "${d.origine}" vers "${d.cible}" pour un artiste "${d.style}" avec budget "${d.budget}".
Développe :
1. ANALYSE DU MARCHÉ CIBLE (taille, culture musicale, gatekeepers, médias)
2. ADAPTATION DU POSITIONNEMENT (faut-il adapter le son, l'image, le message ?)
3. STRATÉGIE DE PENETRATION (par où commencer : digital, live, radio, TV ?)
4. PARTENAIRES LOCAUX RECOMMANDÉS (label, distributeur, booker, PR, radio)
5. CALENDRIER DE LANCEMENT (phases, releases, événements clés)
6. BUDGET ALLOCATION (répartition par poste : marketing, prod, voyage, team locale)
7. KPIS DE SUCCÈS (streams, followers, bookings, presse — objectifs réalistes)
8. RISQUES & MITIGATION (obstacles probables et comment les contourner)
Sois concret, opérationnel et inspirant.`
  },
  {
    id: 6,
    icon: '📱',
    titre: 'Stratégie Social Media',
    desc: 'Élabore une stratégie social media complète pour un artiste afro : contenus, calendrier, growth, monétisation.',
    champs: [
      { id: 'platforme', label: 'Plateforme principale', type: 'select', opts: ['Instagram', 'TikTok', 'YouTube', 'Twitter/X', 'Facebook', 'Snapchat', 'Multi-plateforme'] },
      { id: 'contenu', label: 'Type de contenu', type: 'select', opts: ['Behind the scenes', 'Performance live', 'Challenges/Trends', 'Storytelling perso', 'Collabs/Cameos', 'Éducatif/Making-of'] },
      { id: 'frequence', label: 'Fréquence de publication', type: 'select', opts: ['Daily — Tous les jours', '3-4x/semaine', 'Hebdo — 1-2x/semaine', 'Ponctuel — Releases uniquement'] },
    ],
    prompt: d => `Tu es un social media manager expert musique afro de AFRO ARTIST AGENT. Élabore une stratégie "${d.platforme}" pour un artiste afro, contenu "${d.contenu}", fréquence "${d.frequence}".
Inclus :
1. AUDIENCE CIBLE (persona, comportements, horaires de connexion)
2. LIGNE ÉDITORIALE (ton, formats, charte visuelle, hashtags)
3. CALENDRIER ÉDITORIAL TYPE (semaine type avec idées de posts)
4. STRATÉGIE DE CROISSANCE (organic + paid, collaborations, trends)
5. ENGAGEMENT & COMMUNITY (comment animer, répondre, fidéliser)
6. MONÉTISATION POSSIBLE (brand deals, affiliate, tips, exclusivités)
7. OUTILS RECOMMANDÉS (scheduling, analytics, creation tools)
8. KPIS À SUIVRE (métriques clés et objectifs mensuels)
Sois pratique, créatif et aligné avec les codes des réseaux sociaux actuels.`
  },
  {
    id: 7,
    icon: '🎵',
    titre: 'Release Plan Single/Album',
    desc: 'Crée un plan de release complet pour un single ou album : teasing, distribution, promo, playlisting.',
    champs: [
      { id: 'format', label: 'Format', type: 'select', opts: ['Single', 'EP (4-6 titres)', 'Album (10+ titres)', 'Double single', 'Feat majeur'] },
      { id: 'delai', label: 'Date de sortie', type: 'select', opts: ['ASAP — 2-4 semaines', '1-2 mois', '3-4 mois', '6 mois+ (campagne longue)'] },
      { id: 'budget', label: 'Budget promo', type: 'select', opts: ['Organic — <5K USD', 'Light — 5-15K USD', 'Medium — 15-50K USD', 'Heavy — 50K+ USD'] },
      { id: 'titre', label: 'Titre du projet', type: 'text', ph: 'Ex: "Midnight Dreams", "Lagos Sessions"...' },
    ],
    prompt: d => `Tu es un chef de projet discographique de AFRO ARTIST AGENT. Crée un release plan complet pour "${d.titre}", format "${d.format}", sortie dans "${d.delai}", budget promo "${d.budget}".
Structure :
1. TIMELINE COMPLÈTE (J-90 à J+90, toutes les étapes clés)
2. TEASING & PRE-SAVE (stratégie d'anticipation, snippets, visuels)
3. DISTRIBUTION DIGITALE (DSPs prioritaires, pitch playlists, timing)
4. CONTENU VISUEL (clip, lyric video, visualizers, photoshoot)
5. PRESSE & MÉDIAS (communiqué, interviews, reviews, blogs cibles)
6. PLAYLISTING STRATEGY (playlists éditoriales, user-generated, algorithmiques)
7. SOCIAL MEDIA CAMPAIGN (contenus spécifiques release, ads, influenceurs)
8. LIVE & ÉVÉNEMENTS (release party, performances, showcases)
9. POST-RELEASE (sustain momentum, remixes, secondes vagues)
Sois exhaustif, calibré et orienté résultats.`
  },
  {
    id: 8,
    icon: '🤝',
    titre: 'Pitch Deck Artiste',
    desc: 'Génère un pitch deck professionnel pour présenter un artiste à des labels, bookers, sponsors ou investisseurs.',
    champs: [
      { id: 'nom', label: 'Nom artistique', type: 'text', ph: 'Ex: Afro King, Luna Wave...' },
      { id: 'style', label: 'Style / Genre', type: 'select', opts: ['Afrobeats', 'Amapiano', 'Rap', 'R&B', 'Afro-Pop', 'Gospel', 'Electro Afro', 'Mixte'] },
      { id: 'objectif', label: 'Objectif du pitch', type: 'select', opts: ['Signature label', 'Booking festival', 'Sponsor brand', 'Investissement projet', 'Partenariat management', 'Sync licensing'] },
      { id: 'stats', label: 'Chiffres clés', type: 'text', ph: 'Ex: 500K streams/mois, 100K Instagram...' },
    ],
    prompt: d => `Tu es un expert en pitching artistique de AFRO ARTIST AGENT. Génère un pitch deck complet pour l'artiste "${d.nom}", style "${d.style}", objectif "${d.objectif}", stats "${d.stats}".
Structure en slides :
SLIDE 1 — ACCROCHE (hook, USP, chiffre choc)
SLIDE 2 — L'ARTISTE (bio courte, identité, storytelling)
SLIDE 3 — LE SON (description musicale, influences, comparaisons)
SLIDE 4 — LES CHIFFRES (streams, followers, engagements, croissance)
SLIDE 5 — LES RÉUSSITES (highlights, milestones, presse, awards)
SLIDE 6 — LE PROJET ACTUEL (release en cours, upcoming)
SLIDE 7 — LA DEMANDE (ce qu'on cherche, pourquoi maintenant)
SLIDE 8 — L'OPPORTUNITÉ (ROI, vision long terme, win-win)
SLIDE 9 — CONTACT & NEXT STEPS
Ton : professionnel, percutant, adapté à l'industrie musicale internationale.`
  },
];

// ===== PROJETS ARTISTES =====
const PROJETS = [
  {
    id: 1,
    titre: 'AFROBEATS GLOBAL TOUR',
    cat: 'Tournée · International',
    desc: 'Première tournée mondiale d\'un artiste afrobeats émergent : 15 villes, 3 continents, production premium.',
    budget: '2.5M USD',
    pays: 'Multiple',
    type: 'live',
    featured: true,
    bg: 'linear-gradient(135deg, #1a0a28 0%, #2a1a3a 50%, #0d1a2a 100%)',
    emoji: '🎤',
  },
  {
    id: 2,
    titre: 'LABEL INDÉ AFRO ELECTRO',
    cat: 'Label · Production',
    desc: 'Création d\'un label indépendant spécialisé electro afro : signing, production, distribution globale.',
    budget: '800K USD',
    pays: 'France',
    type: 'business',
    featured: false,
    bg: 'linear-gradient(135deg, #0a1a28 0%, #1a3a4a 100%)',
    emoji: '🏢',
  },
  {
    id: 3,
    titre: 'ACADÉMIE ARTISTES AFRO',
    cat: 'Formation · Talent',
    desc: 'Centre de formation pour jeunes artistes afro : coaching, production, marketing, legal.',
    budget: '1.2M USD',
    pays: 'Côte d\'Ivoire',
    type: 'education',
    featured: false,
    bg: 'linear-gradient(135deg, #2a1a0a 0%, #3a2a1a 100%)',
    emoji: '🎓',
  },
  {
    id: 4,
    titre: 'FESTIVAL DIASPORA MUSIC',
    cat: 'Événement · Culture',
    desc: 'Festival annuel réunissant artistes afro et diaspora : 3 jours, 50K visiteurs, partnerships majeurs.',
    budget: '3M USD',
    pays: 'UK',
    type: 'event',
    featured: false,
    bg: 'linear-gradient(135deg, #1a2a0a 0%, #2a3a1a 100%)',
    emoji: '🎪',
  },
  {
    id: 5,
    titre: 'PLATEFORME STREAMING AFRO',
    cat: 'Tech · Digital',
    desc: 'Platforme de streaming dédiée à la musique afro : catalogue exclusif, discovery, creator tools.',
    budget: '5M USD',
    pays: 'Nigeria',
    type: 'tech',
    featured: false,
    bg: 'linear-gradient(135deg, #0a2a1a 0%, #1a3a2a 100%)',
    emoji: '📲',
  },
  {
    id: 6,
    titre: 'STUDIO ENREGISTREMENT LAGOS',
    cat: 'Infrastructure · Prod',
    desc: 'Studio d\'enregistrement haut de gamme à Lagos : équipements world-class, residential program.',
    budget: '1.8M USD',
    pays: 'Nigeria',
    type: 'infrastructure',
    featured: false,
    bg: 'linear-gradient(135deg, #2a0a1a 0%, #3a1a2a 100%)',
    emoji: '🎛️',
  },
];

// ===== ÉQUIPE =====
const TEAM = [
  { nom: 'Amina Diallo', role: 'Head of Talent', orig: 'Sénégal → Paris', avatar: '👩🏾‍💼', bio: 'Ex-Universal Music Africa. 15 ans A&R, scouting et développement artistique.' },
  { nom: 'Marcus Johnson', role: 'Booking Director', orig: 'Nigeria → Londres', avatar: '👨🏾‍💼', bio: 'Agent de tournée pour stars afrobeats. Réseau festivals internationaux.' },
  { nom: 'Sarah Koné', role: 'Digital Strategy', orig: 'Côte d\'Ivoire → Atlanta', avatar: '👩🏽‍💻', bio: 'Expert social media musique. Campagnes virales 100M+ vues.' },
  { nom: 'David Okonkwo', role: 'Legal & Business', orig: 'Nigeria → NYC', avatar: '👨🏿‍⚖️', bio: 'Avocat entertainment. Négociation contrats labels, publishing, sponsors.' },
];

// ===== DOM ELEMENTS =====
let cursor, cursorRing;

document.addEventListener('DOMContentLoaded', () => {
  initCursor();
  initNav();
  renderProjets();
  renderOutils();
  renderTeam();
  initFilters();
  initWizard();
  initContactForm();
  initHeroAnimation();
});

// ===== CURSOR =====
function initCursor() {
  if (window.innerWidth <= 768) return;
  cursor = document.createElement('div');
  cursor.className = 'cursor';
  cursorRing = document.createElement('div');
  cursorRing.className = 'cursor-ring';
  document.body.appendChild(cursor);
  document.body.appendChild(cursorRing);

  document.addEventListener('mousemove', e => {
    cursor.style.left = e.clientX + 'px';
    cursor.style.top = e.clientY + 'px';
    cursorRing.style.left = e.clientX + 'px';
    cursorRing.style.top = e.clientY + 'px';
  });

  document.querySelectorAll('a, button, .pcard, .ocard, .tcard').forEach(el => {
    el.addEventListener('mouseenter', () => {
      cursor.style.transform = 'translate(-50%, -50%) scale(2.5)';
      cursorRing.style.transform = 'translate(-50%, -50%) scale(1.3)';
      cursorRing.style.width = '48px';
      cursorRing.style.height = '48px';
    });
    el.addEventListener('mouseleave', () => {
      cursor.style.transform = 'translate(-50%, -50%) scale(1)';
      cursorRing.style.transform = 'translate(-50%, -50%) scale(1)';
      cursorRing.style.width = '36px';
      cursorRing.style.height = '36px';
    });
  });
}

// ===== NAVBAR SCROLL =====
function initNav() {
  const nav = document.getElementById('nav');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) nav.classList.add('scrolled');
    else nav.classList.remove('scrolled');
  });
}

// ===== RENDER PROJETS =====
function renderProjets() {
  const grid = document.getElementById('projetsGrid');
  if (!grid) return;
  grid.innerHTML = PROJETS.map(p => `
    <div class="pcard ${p.featured ? 'feat' : ''}" data-type="${p.type}">
      <div class="pbg" style="${p.bg || ''}"></div>
      <div class="pov"></div>
      <div class="pcont">
        <div class="pcat">${p.emoji} ${p.cat}</div>
        <h4>${p.titre}</h4>
        <div class="pmeta"><span class="bgt">${p.budget}</span><span>${p.pays}</span></div>
        <p class="pdesc">${p.desc}</p>
        <button class="pbtn">Découvrir <i class="bi bi-arrow-right"></i></button>
      </div>
    </div>
  `).join('');
}

// ===== RENDER OUTILS =====
function renderOutils() {
  const grid = document.getElementById('outilsGrid');
  if (!grid) return;
  grid.innerHTML = OUTILS.map(o => `
    <div class="ocard" onclick="openOutilModal(${o.id})">
      <div class="oico">${o.icon}</div>
      <h6>${o.titre}</h6>
      <p>${o.desc}</p>
      <div class="oaccess">Accès libre</div>
    </div>
  `).join('');
}

// ===== RENDER TEAM =====
function renderTeam() {
  const grid = document.getElementById('teamGrid');
  if (!grid) return;
  grid.innerHTML = TEAM.map(t => `
    <div class="tcard">
      <div class="tavatar">${t.avatar}</div>
      <h5>${t.nom}</h5>
      <div class="trole">${t.role}</div>
      <div class="torig">${t.orig}</div>
      <p class="tbio">${t.bio}</p>
    </div>
  `).join('');
}

// ===== FILTERS =====
function initFilters() {
  const btns = document.querySelectorAll('.filt');
  btns.forEach(b => {
    b.addEventListener('click', () => {
      btns.forEach(x => x.classList.remove('on'));
      b.classList.add('on');
      const f = b.dataset.filt;
      document.querySelectorAll('.pcard').forEach(c => {
        if (f === 'all' || c.dataset.type === f) c.classList.remove('hide');
        else c.classList.add('hide');
      });
    });
  });
}

// ===== OUTIL MODAL =====
function openOutilModal(id) {
  const outil = OUTILS.find(o => o.id === id);
  if (!outil) return;

  const modal = document.getElementById('outilModal');
  const title = document.getElementById('outilTitle');
  const desc = document.getElementById('outilDesc');
  const champs = document.getElementById('outilChamps');
  const resultDiv = document.getElementById('outilResult');
  const leadSection = document.getElementById('outilLead');

  title.innerHTML = `${outil.icon} ${outil.titre}`;
  desc.textContent = outil.desc;
  resultDiv.innerHTML = '';
  if (leadSection) leadSection.style.display = 'none';

  champs.innerHTML = outil.champs.map(c => {
    if (c.type === 'select') {
      return `
        <div class="mb-3">
          <label class="form-label small text-uppercase fw-bold" style="color:var(--or);font-size:.65rem;letter-spacing:.1em">${c.label}</label>
          <select class="form-select" id="champ_${c.id}" style="background:var(--noir);border-color:var(--noir-b);color:var(--blanc)">
            ${c.opts.map(opt => `<option value="${opt}">${opt}</option>`).join('')}
          </select>
        </div>
      `;
    } else if (c.type === 'text') {
      return `
        <div class="mb-3">
          <label class="form-label small text-uppercase fw-bold" style="color:var(--or);font-size:.65rem;letter-spacing:.1em">${c.label}</label>
          <input type="text" class="form-control" id="champ_${c.id}" placeholder="${c.ph || ''}" style="background:var(--noir);border-color:var(--noir-b);color:var(--blanc)">
        </div>
      `;
    }
  }).join('');

  document.getElementById('btnRunOutil').onclick = () => runOutilAI(outil);
  new bootstrap.Modal(modal).show();
}

async function runOutilAI(outil) {
  const btn       = document.getElementById('btnRunOutil');
  const resultDiv = document.getElementById('outilResult');

  const data = {};
  outil.champs.forEach(c => {
    const el = document.getElementById('champ_' + c.id);
    if (el) data[c.id] = el.value;
  });

  const prompt = outil.prompt(data);

  btn.disabled = true;
  btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Analyse en cours...';
  resultDiv.innerHTML = `<div style="color:var(--gris);font-size:0.82rem;padding:16px 0">🎤 Mistral AI génère votre stratégie artistique...</div>`;

  try {
    const response = await fetch(PROXY_URL, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ prompt, outil: outil.titre })
    });
    const json = await response.json();

    if (json.success) {
      resultDiv.innerHTML = `<div class="outil-result-box">${escapeHtml(json.result).replace(/\n/g, '<br>')}</div>`;
      document.getElementById('outilLead').style.display = 'block';
      setupOutilLead(outil.titre);
    } else {
      resultDiv.innerHTML = `<div class="alert alert-warning small">⚠️ ${json.error || 'Erreur API. Réessayez.'}</div>`;
    }
  } catch (err) {
    resultDiv.innerHTML = `
      <div class="outil-result-box">
        <strong>🎤 Stratégie préliminaire — ${outil.titre}</strong><br><br>
        AFRO ARTIST AGENT a analysé vos paramètres. Cette stratégie s'inscrit dans les meilleures pratiques de l'industrie musicale afro.<br><br>
        <em>⚠️ Connectez mistral_proxy.php pour les analyses complètes et personnalisées.</em><br><br>
        Entrez votre email pour recevoir le rapport complet de notre équipe d'experts.
      </div>
    `;
    document.getElementById('outilLead').style.display = 'block';
    setupOutilLead(outil.titre);
  }

  btn.disabled = false;
  btn.innerHTML = '<i class="bi bi-cpu"></i>Relancer l\'analyse';
}

function setupOutilLead(outilNom) {
  const btn = document.getElementById('btnOutilLead');
  if (!btn) return;
  btn.addEventListener('click', () => {
    const nom   = document.getElementById('outilLeadNom').value;
    const email = document.getElementById('outilLeadEmail').value;
    if (!email) { alert('Veuillez entrer votre email.'); return; }
    btn.innerHTML = '⏳ Envoi en cours...';
    btn.disabled = true;
    setTimeout(() => {
      btn.innerHTML = '✅ Rapport envoyé à ' + email;
      saveLead({ nom, email, source: outilNom });
    }, 1500);
  });
}

// ===== WIZARD PROJET =====
function initWizard() {
  let wizardData = {};

  document.querySelectorAll('.wizard-choice').forEach(btn => {
    btn.addEventListener('click', () => {
      const nextId = btn.dataset.next;
      if (btn.dataset.type)  wizardData.type  = btn.dataset.type;
      if (btn.dataset.pays)  wizardData.pays  = btn.dataset.pays;

      document.querySelectorAll('.wizard-step').forEach(s => s.classList.remove('active'));
      document.getElementById(nextId)?.classList.add('active');
    });
  });

  const wizardForm = document.getElementById('wizardForm');
  if (wizardForm) {
    wizardForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      wizardData.nom         = wizardForm.nom.value;
      wizardData.email       = wizardForm.email.value;
      wizardData.description = wizardForm.description.value;

      document.querySelectorAll('.wizard-step').forEach(s => s.classList.remove('active'));
      document.getElementById('step4').classList.add('active');

      animateWizardLoading(wizardData);
    });
  }
}

async function animateWizardLoading(data) {
  const fill   = document.getElementById('loadingFill');
  const status = document.getElementById('loadingStatus');
  const result = document.getElementById('wizardResult');

  const steps = [
    [10,  '🎵 Analyse du profil artistique...'],
    [25,  '📊 Étude du marché et des opportunités...'],
    [45,  '🎯 Définition de la stratégie de carrière...'],
    [65,  '💡 Génération des recommandations...'],
    [80,  '📝 Rédaction du plan d\'action...'],
    [95,  '✨ Finalisation par l\'IA experte musique afro...'],
    [100, '🚀 Stratégie générée avec succès !'],
  ];

  for (const [pct, msg] of steps) {
    fill.style.width = pct + '%';
    status.textContent = msg;
    await sleep(700);
  }

  const prompt = `Tu es un expert stratégique de AFRO ARTIST AGENT. Génère une note de vision complète pour le projet musical "${data.description || 'projet artistique afro'}" de type "${data.type}" en/au ${data.pays}.
Format : synthèse professionnelle et inspirante de 250 mots avec :
— Nom symbolique proposé pour le projet
— Vision et impact sur la carrière artistique
— 3 piliers stratégiques (musical, digital, business)
— Partenaires potentiels (labels, bookers, médias, brands)
— Message final à l'artiste et à son équipe
Ton : dynamique, expert, orienté industrie musicale.`;

  try {
    const response = await fetch(PROXY_URL, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ prompt, outil: 'Wizard-AfroArtist' })
    });
    const json = await response.json();
    result.innerHTML = json.success
      ? escapeHtml(json.result).replace(/\n/g, '<br>')
      : getDemoWizardResult(data);
  } catch (e) {
    result.innerHTML = getDemoWizardResult(data);
  }

  saveLead(data);
}

function getDemoWizardResult(data) {
  return `<strong>🎵 Vision Préliminaire — ${(data.type || 'Projet').toUpperCase()} — ${data.pays || 'Afrique'}</strong><br><br>
Ce projet s'inscrit dans la dynamique de croissance de l'industrie musicale afro et de la diaspora.<br><br>
<strong>Piliers identifiés :</strong><br>
— Positionnement artistique fort et différenciant<br>
— Stratégie digitale multi-plateformes<br>
— Développement live et partenariats stratégiques<br><br>
<em>Connectez mistral_proxy.php pour une analyse complète générée par Mistral AI.</em><br><br>
<em>Un expert AFRO ARTIST AGENT vous contactera sous 72h à ${data.email || 'votre adresse email'} pour approfondir ce projet.</em>`;
}

// ===== CONTACT =====
function initContactForm() {
  const form = document.getElementById('contactForm');
  if (!form) return;

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const btn    = document.getElementById('submitContact');
    const result = document.getElementById('contactResult');
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Envoi en cours...';

    const data = Object.fromEntries(new FormData(form));
    saveLead(data);

    await sleep(1200);
    result.innerHTML = `<div style="background:rgba(200,150,12,0.08);border:1px solid rgba(200,150,12,0.25);color:var(--or);border-radius:3px;padding:16px;font-size:0.85rem">
      ✅ <strong>Message reçu !</strong> L'équipe AFRO ARTIST AGENT vous répond sous 72h. Réf : AAA-${Date.now().toString(36).toUpperCase()}
    </div>`;
    form.reset();
    btn.disabled = false;
    btn.innerHTML = 'Envoyer ma demande <i class="bi bi-arrow-right ms-2"></i>';
  });
}

// ===== UTILS =====
function sleep(ms) { return new Promise(r => setTimeout(r, ms)); }

function escapeHtml(str) {
  return String(str)
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;');
}

function saveLead(data) {
  try {
    const leads = JSON.parse(localStorage.getItem('aaa_leads') || '[]');
    leads.push({ ...data, ts: Date.now(), source: 'AFRO ARTIST AGENT' });
    localStorage.setItem('aaa_leads', JSON.stringify(leads));
  } catch(e) {}
}

// ===== HERO ANIMATION =====
function initHeroAnimation() {
  const canvas = document.getElementById('hcanvas');
  if (!canvas) return;
  
  // Simple particle animation
  const ctx = canvas.getContext('2d');
  let width, height;
  let particles = [];
  
  function resize() {
    width = canvas.width = window.innerWidth;
    height = canvas.height = window.innerHeight;
  }
  
  function createParticle() {
    return {
      x: Math.random() * width,
      y: Math.random() * height,
      vx: (Math.random() - 0.5) * 0.5,
      vy: (Math.random() - 0.5) * 0.5,
      r: Math.random() * 2 + 1,
      a: Math.random() * 0.5 + 0.2
    };
  }
  
  function init() {
    resize();
    particles = [];
    for (let i = 0; i < 80; i++) particles.push(createParticle());
  }
  
  function draw() {
    ctx.clearRect(0, 0, width, height);
    ctx.fillStyle = 'rgba(200, 150, 12, 0.8)';
    
    particles.forEach(p => {
      p.x += p.vx;
      p.y += p.vy;
      
      if (p.x < 0 || p.x > width) p.vx *= -1;
      if (p.y < 0 || p.y > height) p.vy *= -1;
      
      ctx.beginPath();
      ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
      ctx.globalAlpha = p.a;
      ctx.fill();
    });
    
    requestAnimationFrame(draw);
  }
  
  window.addEventListener('resize', resize);
  init();
  draw();
}
