/**
 * app.js — PAN-AFRICA VISION
 * Projets de développement africain 2030
 * IA Mistral · Vision panafricaine · Méga-projets
 */

'use strict';

const PROXY_URL = './mistral_proxy.php';

// ===== OUTILS IA VISION 2030 =====
const OUTILS = [
  {
    id: 1,
    icon: '🏙️',
    titre: 'Générateur de Cité Futuriste',
    desc: 'Conçoit un concept complet de ville intelligente africaine pour 2030 : architecture, infrastructures, énergie, population cible.',
    champs: [
      { id: 'pays', label: 'Pays / Région', type: 'select', opts: ['Nigeria — Lagos', 'Kenya — Nairobi', 'Sénégal — Dakar', "Côte d'Ivoire — Abidjan", 'Égypte — Le Caire', 'Éthiopie — Addis-Abeba', 'Rwanda — Kigali', 'Afrique du Sud — Johannesburg', 'Ghana — Accra', 'Maroc — Casablanca', 'RD Congo — Kinshasa', 'Tanzanie — Dar es Salaam'] },
      { id: 'superficie', label: 'Superficie visée', type: 'select', opts: ['500 ha — Quartier innovant', '2 000 ha — Ville satellite', '10 000 ha — Nouvelle ville', '50 000 ha — Métropole régionale'] },
      { id: 'concept', label: 'Concept directeur', type: 'select', opts: ['Hub technologique & IA', 'Éco-cité zéro carbone', 'Cité culturelle panafricaine', 'Zone franche industrielle', 'Campus scientifique & spatial', 'Cité médicale & santé globale'] },
      { id: 'budget', label: 'Enveloppe budgétaire estimée', type: 'select', opts: ['500M – 2Mds USD', '2 – 10Mds USD', '10 – 50Mds USD', '50Mds+ USD (mégaprojet d\'État)'] },
    ],
    prompt: d => `Tu es un urbaniste visionnaire de PAN-AFRICA VISION. Génère un concept complet de cité futuriste africaine en 2030 pour la région "${d.pays}", superficie ${d.superficie}, concept directeur "${d.concept}", enveloppe ${d.budget}. 
Structure la réponse ainsi :
1. NOM DE LA CITÉ (invente un nom symbolique panafricain)
2. VISION (3 phrases inspirantes)
3. ARCHITECTURE & URBANISME (zones, bâtiments emblématiques, style architectural afro-futuriste)
4. INFRASTRUCTURES CLÉS (transport, énergie, eau, numérique)
5. IMPACT ÉCONOMIQUE & SOCIAL (emplois créés, PIB généré, attractivité internationale)
6. CALENDRIER 2025–2035 (phases de réalisation)
7. PARTENAIRES STRATÉGIQUES RECOMMANDÉS
Sois ambitieux, précis et inspirant. Ce projet doit marquer l'histoire de l'Afrique.`
  },
  {
    id: 2,
    icon: '🔬',
    titre: 'Hub Scientifique & Spatial',
    desc: 'Conçoit un centre de recherche ou agence spatiale africaine : disciplines, équipements, partenariats internationaux, impact continental.',
    champs: [
      { id: 'pays', label: 'Pays hôte', type: 'select', opts: ['Nigeria', 'Kenya', 'Sénégal', 'Maroc', 'Éthiopie', 'Rwanda', 'Égypte', 'Afrique du Sud'] },
      { id: 'domaine', label: 'Domaine scientifique', type: 'select', opts: ['Agence Spatiale Africaine', 'Centre IA & Data Science', 'Institut Médical & Génomique', 'Laboratoire Énergie Solaire', 'Centre Océanographie & Climat', 'Institut Agricole & Biotechnologies'] },
      { id: 'echelle', label: 'Échelle du projet', type: 'select', opts: ['National — 1 pays', 'Régional — sous-région', 'Continental — Union Africaine', 'International — partenariat mondial'] },
    ],
    prompt: d => `Tu es un directeur scientifique de PAN-AFRICA VISION. Conçois un hub scientifique de classe mondiale en ${d.pays} pour le domaine "${d.domaine}" à l'échelle ${d.echelle}.
Inclus :
1. NOM & ACRONYME (symbolique panafricain)
2. MISSION & VISION 2030
3. INFRASTRUCTURE (bâtiments, équipements, campus)
4. PROGRAMME SCIENTIFIQUE (5 axes de recherche prioritaires)
5. FORMATION & TALENTS (objectif nombre de chercheurs africains formés)
6. PARTENARIATS (universités, agences, entreprises internationales)
7. BUDGET & FINANCEMENT (sources : UA, diaspora, investissement privé, coopération)
8. IMPACT CONTINENTAL ATTENDU
Réponds de façon visionnaire et détaillée.`
  },
  {
    id: 3,
    icon: '🏛️',
    titre: 'Musée & Pôle Culturel',
    desc: 'Projette un musée panafricain ou pôle culturel majeur : architecture, collections, rayonnement, modèle économique.',
    champs: [
      { id: 'type', label: 'Type d\'institution', type: 'select', opts: ['Grand Musée Panafricain', 'Cité des Arts & Cultures', 'Centre du Patrimoine Africain', 'Festival & Campus Créatif', 'Bibliothèque Universelle Africaine', 'Musée des Sciences & Techniques'] },
      { id: 'ville', label: 'Ville / Pays', type: 'select', opts: ['Dakar, Sénégal', 'Accra, Ghana', 'Addis-Abeba, Éthiopie', 'Nairobi, Kenya', 'Lagos, Nigeria', 'Abidjan, Côte d\'Ivoire', 'Le Caire, Égypte', 'Kigali, Rwanda'] },
      { id: 'archi', label: 'Direction architecturale', type: 'select', opts: ['Afro-futuriste inspiré du vernaculaire', 'Contemporain minimaliste & durables', 'Néo-traditionnel revisité', 'High-tech immersif & numérique'] },
    ],
    prompt: d => `Tu es un directeur artistique de PAN-AFRICA VISION. Conçois le concept complet d'un(e) "${d.type}" à ${d.ville}, architecture "${d.archi}".
Développe :
1. NOM & IDENTITÉ (symbolique africaine puissante)
2. CONCEPT CURATORIAL (quelle histoire raconte-t-il ?)
3. ARCHITECTURE (description de l'édifice, espaces emblématiques, intégration urbaine)
4. COLLECTIONS & PROGRAMMES (permanents, temporaires, performances, résidences)
5. ATTRACTIVITÉ INTERNATIONALE (tourisme culturel, diaspora, rayonnement mondial)
6. MODÈLE ÉCONOMIQUE (billetterie, mécénat, e-commerce culturel, NFT patrimoine)
7. IMPACT IDENTITAIRE pour la jeunesse africaine et la diaspora
Sois lyrique, précis et inspirant. Ce lieu doit devenir un symbole.`
  },
  {
    id: 4,
    icon: '⚡',
    titre: 'Projet Énergie Continent',
    desc: 'Dimensionne un projet d'infrastructure énergétique continentale : solaire, hydroélectrique, géothermique, réseau panafricain.',
    champs: [
      { id: 'type', label: 'Type d\'énergie', type: 'select', opts: ['Méga-centrale solaire (Sahara)', 'Barrage hydroélectrique régional', 'Géothermie (Rift Est-Africain)', 'Réseau électrique panafricain', 'Hydrogène vert africain', 'Nucléaire civil — 1ère centrale africaine'] },
      { id: 'region', label: 'Zone géographique', type: 'select', opts: ['Afrique du Nord', 'Afrique de l\'Ouest', 'Afrique Centrale', 'Afrique de l\'Est', 'Afrique Australe', 'Continental — UA'] },
      { id: 'puissance', label: 'Capacité cible', type: 'select', opts: ['500 MW — Régional', '2 GW — Multi-pays', '10 GW — Sous-continental', '100 GW+ — Continental'] },
    ],
    prompt: d => `Tu es un ingénieur en chef et stratège de PAN-AFRICA VISION. Conçois un méga-projet énergétique "${d.type}" en zone ${d.region}, capacité cible ${d.puissance}.
Structure :
1. NOM DU PROJET (symbolique, puissant)
2. DESCRIPTION TECHNIQUE (infrastructure, technologie, dimensionnement)
3. ZONES D'IMPLANTATION RECOMMANDÉES (pourquoi ces sites)
4. IMPACT ÉNERGÉTIQUE (nombre de foyers alimentés, industries activées)
5. MODÈLE DE FINANCEMENT (obligataire panafricain, banques de développement, PPP)
6. GOUVERNANCE (qui gère, comment, bénéfices partagés)
7. CALENDRIER 2025–2035
8. IMPACT SUR L'INDUSTRIALISATION DE L'AFRIQUE
Sois précis, chiffré et visionnaire.`
  },
  {
    id: 5,
    icon: '🚀',
    titre: 'Stratégie Investissement Diaspora',
    desc: 'Construit une stratégie d'investissement sur mesure pour la diaspora africaine souhaitant contribuer à un grand projet.',
    champs: [
      { id: 'origine', label: 'Région d\'origine', type: 'select', opts: ['Diaspora Afrique Ouest (France, UK, USA)', 'Diaspora Afrique Est (UK, Canada, Gulf)', 'Diaspora Afrique Nord (France, Espagne)', 'Diaspora Afrique Centrale (Belgique, France)', 'Diaspora Afrique Australe (UK, Australie)', 'Panafricaine — toutes régions'] },
      { id: 'secteur', label: 'Secteur cible', type: 'select', opts: ['Immobilier & Villes nouvelles', 'Technologie & IA', 'Agriculture & Agroalimentaire', 'Santé & Biotechnologies', 'Culture & Industries créatives', 'Infrastructure & Énergie'] },
      { id: 'montant', label: 'Capacité d\'investissement', type: 'select', opts: ['5 000 – 50 000 USD', '50 000 – 500 000 USD', '500K – 5M USD', '5M+ USD (investisseur institutionnel)'] },
    ],
    prompt: d => `Tu es un stratège financier de PAN-AFRICA VISION, expert en mobilisation de la diaspora africaine. Construis une stratégie d'investissement complète pour la ${d.origine}, secteur "${d.secteur}", capacité ${d.montant}.
Inclus :
1. ANALYSE DU POTENTIEL (pourquoi ce secteur, pourquoi maintenant)
2. VÉHICULES D'INVESTISSEMENT RECOMMANDÉS (fonds, obligations diaspora, SIIC africaine, co-investissement)
3. PROJETS CONCRETS 2025–2030 dans lesquels investir
4. STRUCTURE JURIDIQUE & FISCALE (protection de l'investisseur diaspora)
5. RENDEMENTS ATTENDUS & RISQUES (horizon 5, 10 ans)
6. IMPACT DOUBLE : retour financier + impact développement Afrique
7. COMMENT REJOINDRE PAN-AFRICA VISION comme associé investisseur
Ton : professionnel, ambitieux, rassembleur.`
  },
  {
    id: 6,
    icon: '🌾',
    titre: 'Agropole & Food Valley',
    desc: 'Conçoit une zone agro-industrielle intégrée : production, transformation, logistique, export — pour nourrir l'Afrique et le monde.',
    champs: [
      { id: 'pays', label: 'Pays / Zone', type: 'select', opts: ['Éthiopie — Vallée du Rift', 'Nigeria — Middle Belt', "Côte d'Ivoire — Centre", 'Zambie — Copperbelt', 'Mali — Delta intérieur', 'Mozambique — Corridor Nacala', 'Tanzanie — Southern Highlands', 'Sénégal — Vallée du fleuve'] },
      { id: 'filiere', label: 'Filière prioritaire', type: 'select', opts: ['Céréales & Légumineuses', 'Cacao & Café premium', 'Élevage & Dairy', 'Horticulture & Fruits tropicaux', 'Aquaculture & Pêche', 'Oléagineux & Biomatériaux'] },
      { id: 'superficie', label: 'Zone cultivée', type: 'select', opts: ['10 000 ha', '100 000 ha', '500 000 ha', '1 million ha+'] },
    ],
    prompt: d => `Tu es un expert en développement agro-industriel de PAN-AFRICA VISION. Conçois une Agropole intégrée en ${d.pays}, filière "${d.filiere}", superficie ${d.superficie}.
Développe :
1. NOM & CONCEPT (vision de souveraineté alimentaire africaine)
2. MODÈLE DE PRODUCTION (agriculture de précision, irrigation, semences améliorées)
3. INFRASTRUCTURE DE TRANSFORMATION (usines, silos, chaîne du froid, labs qualité)
4. LOGISTIQUE & EXPORT (corridors, ports, routes, rail)
5. MODÈLE INCLUSIF (small farmers, coopératives, femmes, jeunesse)
6. MARCHÉS CIBLES (marché africain + export Asie, Europe, Moyen-Orient)
7. IMPACT : emplois, PIB, sécurité alimentaire
8. PARTENARIATS TECHNOLOGIQUES & FINANCIERS
Sois précis, innovant et porteur d'une vision de puissance africaine.`
  },
  {
    id: 7,
    icon: '🏥',
    titre: 'Cité Médicale Africaine',
    desc: 'Projette un pôle hospitalier et de recherche médicale de classe mondiale en Afrique, formant les médecins du continent.',
    champs: [
      { id: 'pays', label: 'Pays hôte', type: 'select', opts: ['Sénégal', 'Rwanda', 'Kenya', 'Ghana', 'Maroc', 'Cameroun', 'Nigeria', 'Éthiopie'] },
      { id: 'specialite', label: 'Spécialité principale', type: 'select', opts: ['Oncologie & Médecine de précision', 'Cardiologie & Chirurgie vasculaire', 'Pédiatrie & Maternité', 'Médecine tropicale & Épidémiologie', 'Neurologie & Neurosciences', 'Centre Génomique Africain'] },
      { id: 'capacite', label: 'Capacité', type: 'select', opts: ['500 lits — Hôpital régional', '2 000 lits — CHU national', '5 000 lits — Pôle continental', 'Campus médical complet (hôpital + université + recherche)'] },
    ],
    prompt: d => `Tu es directeur médical et stratège de PAN-AFRICA VISION. Conçois une Cité Médicale Africaine en ${d.pays}, spécialisée "${d.specialite}", capacité "${d.capacite}".
Structure :
1. NOM & SYMBOLE (hommage à un médecin ou héros africain)
2. VISION MÉDICALE (quelle révolution sanitaire pour l'Afrique)
3. ARCHITECTURE DU CAMPUS (hôpital, centre de recherche, école de médecine, logements)
4. PROGRAMME MÉDICAL (protocoles, technologies, IA médicale, télémédecine)
5. FORMATION (nombre de médecins & infirmiers africains formés par an)
6. ATTRACTIVITÉ (patients Afrique + diaspora + médical tourism)
7. FINANCEMENT (partenariats publics-privés, assurances, UAM, philanthropie africaine)
8. IMPACT : réduction de la fuite médicale et mortalité évitable
Sois précis, humain et ambitieux.`
  },
  {
    id: 8,
    icon: '🌐',
    titre: 'Pitch Deck Projet 2030',
    desc: 'Génère un pitch deck structuré pour présenter votre méga-projet à des investisseurs internationaux ou institutions africaines.',
    champs: [
      { id: 'nom', label: 'Nom du projet', type: 'text', ph: 'Ex: Horizon City, SahelSolar, AfrikaSpace...' },
      { id: 'secteur', label: 'Secteur', type: 'select', opts: ['Immobilier & Ville nouvelle', 'Énergie & Infrastructure', 'Santé & Médecine', 'Culture & Tourisme', 'Agriculture & Agro-industrie', 'Technologie & IA', 'Science & Espace'] },
      { id: 'pays', label: 'Pays', type: 'select', opts: ['Nigeria', 'Kenya', 'Sénégal', "Côte d'Ivoire", 'Égypte', 'Éthiopie', 'Rwanda', 'Afrique du Sud', 'Ghana', 'Maroc', 'RD Congo', 'Tanzanie', 'Autre pays africain'] },
      { id: 'budget', label: 'Budget total', type: 'text', ph: 'Ex: 500M USD, 2Mds USD...' },
    ],
    prompt: d => `Tu es un expert en levée de fonds et pitching de PAN-AFRICA VISION. Génère un pitch deck complet pour le projet "${d.nom}" dans le secteur "${d.secteur}" au ${d.pays}, budget total ${d.budget}.
Structure en slides :
SLIDE 1 — ACCROCHE (phrase d'impact, chiffre clé)
SLIDE 2 — LE PROBLÈME QU'ON RÉSOUT (contexte africain, urgence)
SLIDE 3 — LA SOLUTION (le projet, son unicité)
SLIDE 4 — MARCHÉ ADRESSABLE (TAM/SAM/SOM africain et global)
SLIDE 5 — MODÈLE ÉCONOMIQUE (revenus, rentabilité, horizon ROI)
SLIDE 6 — ROADMAP 2025–2035 (phases clés)
SLIDE 7 — ÉQUIPE & GOUVERNANCE
SLIDE 8 — IMPACT (ESG, ODD, souveraineté africaine)
SLIDE 9 — DEMANDE INVESTISSEUR (montant, utilisation des fonds)
SLIDE 10 — VISION (phrase finale mémorable)
Ton : professionnel, percutant, adapté à des investisseurs anglophones et francophones.`
  },
];

// ===== PROJETS 2030 =====
const PROJETS = [
  {
    id: 1,
    titre: 'HORIZON CITY — Sénégal',
    cat: 'Immobilier · Smart City',
    desc: 'Nouvelle capitale économique de 500 000 habitants, zéro carbone, 100% connectée. Dakar 2030.',
    budget: '14 Mds USD',
    pays: 'Sénégal',
    type: 'immobilier',
    featured: true,
    bg: 'linear-gradient(135deg, #0a1628 0%, #1a3a2a 50%, #0d1a0a 100%)',
    emoji: '🏙️',
  },
  {
    id: 2,
    titre: 'SAHEL SOLAR — Mali · Niger · Burkina',
    cat: 'Énergie · Continental',
    desc: 'Plus grande centrale solaire du monde : 50 GW pour alimenter 200 millions d\'Africains.',
    budget: '80 Mds USD',
    pays: 'Sahel',
    type: 'energie',
    featured: false,
    bg: 'linear-gradient(135deg, #1a0a00 0%, #3a2000 100%)',
    emoji: '⚡',
  },
  {
    id: 3,
    titre: 'AFRIKASPACE — Kenya',
    cat: 'Science · Spatial',
    desc: 'Premier centre de lancement de satellites africain. Nairobi comme Houston de l\'Afrique.',
    budget: '6 Mds USD',
    pays: 'Kenya',
    type: 'science',
    featured: false,
    bg: 'linear-gradient(135deg, #00001a 0%, #0a001a 100%)',
    emoji: '🚀',
  },
  {
    id: 4,
    titre: 'GRAND MUSÉE PANAFRICAIN — Ghana',
    cat: 'Culture · Identité',
    desc: 'Le plus grand musée du monde dédié aux civilisations africaines. Accra, cœur du monde.',
    budget: '2 Mds USD',
    pays: 'Ghana',
    type: 'culture',
    featured: false,
    bg: 'linear-gradient(135deg, #1a0a0a 0%, #2a1500 100%)',
    emoji: '🏛️',
  },
  {
    id: 5,
    titre: 'VICTORIA AGROPOLE — Éthiopie',
    cat: 'Agriculture · Industrie',
    desc: '1 million d\'hectares de terres transformées. Nourrir l\'Afrique et exporter vers le monde.',
    budget: '9 Mds USD',
    pays: 'Éthiopie',
    type: 'agriculture',
    featured: false,
    bg: 'linear-gradient(135deg, #001a05 0%, #0a2000 100%)',
    emoji: '🌾',
  },
  {
    id: 6,
    titre: 'UBUNTU MEDICAL CITY — Rwanda',
    cat: 'Santé · Recherche',
    desc: 'Campus médical de 5 000 lits + université + centre génomique. Kigali capitale médicale.',
    budget: '4 Mds USD',
    pays: 'Rwanda',
    type: 'sante',
    featured: false,
    bg: 'linear-gradient(135deg, #0a001a 0%, #00101a 100%)',
    emoji: '🏥',
  },
];

// ===== DOM READY =====
document.addEventListener('DOMContentLoaded', () => {
  initCursor();
  initNavbar();
  initReveal();
  initTicker();
  renderProjets();
  initProjetFilters();
  renderOutils();
  initAiLabTools();
  initWizard();
  initContactForm();
  initCounters();
  initHeroParticles();
});

// ===== CURSEUR CUSTOM =====
function initCursor() {
  const cursor = document.querySelector('.cursor');
  const ring   = document.querySelector('.cursor-ring');
  if (!cursor || !ring) return;

  let mx = 0, my = 0, rx = 0, ry = 0;

  document.addEventListener('mousemove', e => {
    mx = e.clientX; my = e.clientY;
    cursor.style.left = mx + 'px';
    cursor.style.top  = my + 'px';
  });

  (function animRing() {
    rx += (mx - rx) * 0.12;
    ry += (my - ry) * 0.12;
    ring.style.left = rx + 'px';
    ring.style.top  = ry + 'px';
    requestAnimationFrame(animRing);
  })();

  document.querySelectorAll('a, button, .outil-card, .projet-card, .wizard-choice, .filter-btn').forEach(el => {
    el.addEventListener('mouseenter', () => {
      cursor.style.transform = 'translate(-50%, -50%) scale(2)';
      cursor.style.background = '#e4aa18';
      ring.style.width = '60px';
      ring.style.height = '60px';
      ring.style.borderColor = 'rgba(200,150,12,0.8)';
    });
    el.addEventListener('mouseleave', () => {
      cursor.style.transform = 'translate(-50%, -50%) scale(1)';
      cursor.style.background = 'var(--or)';
      ring.style.width = '36px';
      ring.style.height = '36px';
      ring.style.borderColor = 'rgba(200,150,12,0.5)';
    });
  });
}

// ===== NAVBAR =====
function initNavbar() {
  const nav = document.getElementById('mainNav');
  if (!nav) return;

  const update = () => {
    if (window.scrollY > 60) {
      nav.classList.add('nav-scrolled');
      nav.classList.remove('nav-transparent');
    } else {
      nav.classList.remove('nav-scrolled');
      nav.classList.add('nav-transparent');
    }
  };

  update();
  window.addEventListener('scroll', update, { passive: true });

  // Region buttons
  document.querySelectorAll('.region-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.region-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    });
  });
}

// ===== SCROLL REVEAL =====
function initReveal() {
  const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('is-visible');
        obs.unobserve(e.target);
      }
    });
  }, { threshold: 0.08 });

  document.querySelectorAll('.reveal-up').forEach(el => obs.observe(el));
}

// ===== TICKER =====
function initTicker() {
  const track = document.querySelector('.ticker-track');
  if (!track) return;
  track.innerHTML += track.innerHTML;
}

// ===== HERO PARTICLES =====
function initHeroParticles() {
  const canvas = document.getElementById('heroCanvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');

  let W = canvas.offsetWidth;
  let H = canvas.offsetHeight;
  canvas.width = W;
  canvas.height = H;

  const particles = Array.from({ length: 80 }, () => ({
    x: Math.random() * W,
    y: Math.random() * H,
    r: Math.random() * 1.5 + 0.3,
    dx: (Math.random() - 0.5) * 0.3,
    dy: (Math.random() - 0.5) * 0.3,
    o: Math.random() * 0.6 + 0.1,
  }));

  function draw() {
    ctx.clearRect(0, 0, W, H);
    particles.forEach(p => {
      ctx.beginPath();
      ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
      ctx.fillStyle = `rgba(200, 150, 12, ${p.o})`;
      ctx.fill();
      p.x += p.dx;
      p.y += p.dy;
      if (p.x < 0) p.x = W;
      if (p.x > W) p.x = 0;
      if (p.y < 0) p.y = H;
      if (p.y > H) p.y = 0;
    });
    requestAnimationFrame(draw);
  }

  draw();

  window.addEventListener('resize', () => {
    W = canvas.offsetWidth;
    H = canvas.offsetHeight;
    canvas.width = W;
    canvas.height = H;
  });
}

// ===== COMPTEURS ===== 
function initCounters() {
  const counters = document.querySelectorAll('.stat-num[data-target]');
  const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (!e.isIntersecting) return;
      const el = e.target;
      const target = parseFloat(el.dataset.target);
      const suffix = el.dataset.suffix || '';
      const isFloat = el.dataset.float === '1';
      let current = 0;
      const duration = 1800;
      const step = target / (duration / 16);
      const timer = setInterval(() => {
        current += step;
        if (current >= target) {
          current = target;
          clearInterval(timer);
        }
        el.textContent = isFloat ? current.toFixed(1) : Math.floor(current);
        if (suffix) el.nextElementSibling && (el.nextElementSibling.textContent = suffix);
      }, 16);
      obs.unobserve(el);
    });
  }, { threshold: 0.5 });
  counters.forEach(c => obs.observe(c));
}

// ===== PROJETS =====
function renderProjets() {
  const grid = document.getElementById('projetsGrid');
  if (!grid) return;

  grid.innerHTML = '';
  PROJETS.forEach(p => {
    const card = document.createElement('div');
    card.className = 'projet-card reveal-up' + (p.featured ? ' featured' : '');
    card.dataset.type = p.type;
    card.innerHTML = `
      <div class="projet-card-bg" style="background: ${p.bg}; font-size:8rem; display:flex; align-items:center; justify-content:center; color:rgba(255,255,255,0.06)">
        <span style="position:absolute; font-size:7rem; opacity:0.07; user-select:none">${p.emoji}</span>
      </div>
      <div class="projet-card-overlay"></div>
      <div class="projet-card-content">
        <div class="projet-cat">${p.cat}</div>
        <h4>${p.titre}</h4>
        <div class="projet-meta">
          <span>📍 ${p.pays}</span>
          <span class="budget">💰 ${p.budget}</span>
        </div>
        <p style="font-size:0.8rem; color:rgba(255,255,255,0.5); margin-top:8px; line-height:1.6">${p.desc}</p>
        <button class="projet-card-btn">Explorer le projet →</button>
      </div>
    `;
    grid.appendChild(card);
  });

  // Re-observe
  const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) { e.target.classList.add('is-visible'); obs.unobserve(e.target); }
    });
  }, { threshold: 0.08 });
  grid.querySelectorAll('.reveal-up').forEach(el => obs.observe(el));
}

function initProjetFilters() {
  document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const filter = btn.dataset.filter;
      document.querySelectorAll('.projet-card').forEach(card => {
        if (filter === 'all' || card.dataset.type === filter) {
          card.classList.remove('hidden');
        } else {
          card.classList.add('hidden');
        }
      });
    });
  });
}

// ===== OUTILS AI LAB =====
function renderOutils() {
  const grid = document.getElementById('ailabGrid');
  if (!grid) return;

  grid.innerHTML = '';
  OUTILS.forEach(outil => {
    const card = document.createElement('div');
    card.className = 'outil-card reveal-up';
    card.dataset.id = outil.id;
    card.innerHTML = `
      <span class="outil-icon">${outil.icon}</span>
      <h6>${outil.titre}</h6>
      <p>${outil.desc}</p>
      <span class="outil-access">Accès gratuit · IA Mistral</span>
    `;
    grid.appendChild(card);
  });

  const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) { e.target.classList.add('is-visible'); obs.unobserve(e.target); }
    });
  }, { threshold: 0.1 });
  grid.querySelectorAll('.reveal-up').forEach(el => obs.observe(el));
}

function initAiLabTools() {
  document.addEventListener('click', e => {
    const card = e.target.closest('.outil-card');
    if (!card) return;
    const id = parseInt(card.dataset.id);
    const outil = OUTILS.find(o => o.id === id);
    if (!outil) return;
    openOutilModal(outil);
  });
}

function openOutilModal(outil) {
  const modal = document.getElementById('modalOutil');
  document.getElementById('outilModalTitle').textContent = outil.icon + ' ' + outil.titre;

  const champsHTML = outil.champs.map(c => {
    if (c.type === 'select') {
      return `<div class="mb-3">
        <label style="font-size:0.7rem;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;color:var(--blanc-dim);display:block;margin-bottom:6px">${c.label}</label>
        <select class="form-select form-select-sm" id="champ_${c.id}" style="background:rgba(255,255,255,0.04);border:1px solid var(--noir-border);color:var(--blanc);border-radius:3px">
          ${c.opts.map(o => `<option style="background:#111">${o}</option>`).join('')}
        </select>
      </div>`;
    } else {
      return `<div class="mb-3">
        <label style="font-size:0.7rem;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;color:var(--blanc-dim);display:block;margin-bottom:6px">${c.label}</label>
        <input type="${c.type}" class="form-control form-control-sm" id="champ_${c.id}" placeholder="${c.ph || ''}" style="background:rgba(255,255,255,0.04);border:1px solid var(--noir-border);color:var(--blanc)">
      </div>`;
    }
  }).join('');

  document.getElementById('outilModalBody').innerHTML = `
    <p style="color:var(--gris);font-size:0.83rem;margin-bottom:24px;line-height:1.7">${outil.desc}</p>
    ${champsHTML}
    <button class="btn-or w-100" id="btnRunOutil" style="justify-content:center">
      <i class="bi bi-cpu"></i>Générer la vision 2030
    </button>
    <div id="outilResult" class="mt-4"></div>
    <div id="outilLead" class="outil-lead-form" style="display:none">
      <h6>📧 Recevoir le rapport complet (PDF 12 pages)</h6>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:10px">
        <input type="text" class="form-ctrl" id="outilLeadNom" placeholder="Votre nom">
        <input type="email" class="form-ctrl" id="outilLeadEmail" placeholder="Email professionnel">
      </div>
      <button class="btn-or w-100" id="btnOutilLead" style="justify-content:center;font-size:0.78rem">
        Recevoir le rapport complet <i class="bi bi-envelope"></i>
      </button>
    </div>
  `;

  document.getElementById('btnRunOutil').addEventListener('click', () => runOutilAI(outil));
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
  btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Vision 2030 en cours...';
  resultDiv.innerHTML = `<div style="color:var(--gris);font-size:0.82rem;padding:16px 0">🌍 Mistral AI analyse votre projet panafricain...</div>`;

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
        <strong>🌍 Vision préliminaire — ${outil.titre}</strong><br><br>
        PAN-AFRICA VISION a analysé vos paramètres. Ce projet s'inscrit dans les grandes ambitions du continent africain pour 2030.<br><br>
        <em>⚠️ Connectez mistral_proxy.php pour les analyses complètes et personnalisées.</em><br><br>
        Entrez votre email pour recevoir le rapport complet de 12 pages par notre équipe d'associés.
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
    [10,  '🌍 Identification du contexte géopolitique africain...'],
    [25,  '📊 Analyse du marché et des opportunités régionales...'],
    [45,  '🏗️ Structuration du concept de projet 2030...'],
    [65,  '💡 Génération des recommandations stratégiques...'],
    [80,  '📝 Rédaction de la note de vision...'],
    [95,  '✨ Finalisation par l\'IA panafricaine...'],
    [100, '🚀 Vision 2030 générée avec succès !'],
  ];

  for (const [pct, msg] of steps) {
    fill.style.width = pct + '%';
    status.textContent = msg;
    await sleep(700);
  }

  const prompt = `Tu es un stratège visionnaire de PAN-AFRICA VISION. Génère une note de vision complète pour le projet "${data.description || 'grand projet africain'}" de type "${data.type}" en/au ${data.pays}.
Format : synthèse professionnelle et inspirante de 250 mots avec :
— Nom symbolique proposé pour le projet
— Vision et impact continental
— 3 piliers stratégiques
— Partenaires potentiels (diaspora, États, investisseurs)
— Message final à la diaspora et aux leaders africains
Ton : ambitieux, afrocentré, professionnel.`;

  try {
    const response = await fetch(PROXY_URL, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ prompt, outil: 'Wizard-Vision2030' })
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
  return `<strong>🌍 Vision Préliminaire — ${(data.type || 'Projet').toUpperCase()} — ${data.pays || 'Afrique'}</strong><br><br>
Ce projet s'inscrit dans la dynamique de transformation du continent africain à l'horizon 2030.<br><br>
<strong>Piliers identifiés :</strong><br>
— Ancrage territorial fort et appropriation locale<br>
— Financement hybride : fonds diaspora + investissement institutionnel<br>
— Impact immédiat sur l'emploi qualifié et le transfert de compétences<br><br>
<em>Connectez mistral_proxy.php pour une analyse complète générée par Mistral AI.</em><br><br>
<em>Un associé PAN-AFRICA VISION vous contactera sous 72h à ${data.email || 'votre adresse email'} pour approfondir ce projet.</em>`;
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
      ✅ <strong>Message reçu !</strong> L'équipe PAN-AFRICA VISION vous répond sous 72h. Réf : PAV-${Date.now().toString(36).toUpperCase()}
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
    const leads = JSON.parse(localStorage.getItem('pav_leads') || '[]');
    leads.push({ ...data, ts: Date.now(), source: 'PAN-AFRICA VISION' });
    localStorage.setItem('pav_leads', JSON.stringify(leads));
  } catch(e) {}
}
