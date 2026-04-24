<?php
/**
 * PAN-AFRICA VISION — index.php (tout-en-un)
 * CSS + JS + HTML dans un seul fichier
 * Uploadez UNIQUEMENT ce fichier sur votre serveur
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PAN-AFRICA VISION — L'Afrique de Demain 2030</title>
<meta name="description" content="Coalition internationale pour le développement de l'Afrique 2030. Méga-projets immobiliers, scientifiques, culturels et technologiques.">
<link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🌍</text></svg>">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,500;0,600;0,700;1,300;1,600&family=Syne:wght@400;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<style>
/* ============================================================
   PAN-AFRICA VISION — Design System
   Palette : Noir Nuit · Or Africain · Vert · Rouge
   ============================================================ */
:root{
  --noir:#080808;--noir-d:#030303;--noir-c:#0f0f0f;--noir-b:#1a1a1a;--noir-l:#151515;
  --blanc:#faf8f3;--blanc-d:#c8c2b4;
  --or:#c8960c;--or-v:#e4aa18;--or-p:#f0d080;--or-g:rgba(200,150,12,.18);
  --vert:#1a7a4a;--rouge:#b03020;
  --gris:#3a3a3a;--gris-m:#252525;
  --tr:.45s cubic-bezier(.22,1,.36,1);
  --fd:'Cormorant Garamond',Georgia,serif;
  --fb:'Syne',sans-serif;
  --r:3px;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth;font-size:16px}
body{font-family:var(--fb);font-weight:400;color:var(--blanc-d);background:var(--noir);overflow-x:hidden;-webkit-font-smoothing:antialiased}

/* CURSOR */
.cursor{position:fixed;width:10px;height:10px;background:var(--or);border-radius:50%;pointer-events:none;z-index:99999;transition:transform .15s,opacity .3s;transform:translate(-50%,-50%)}
.cursor-ring{position:fixed;width:36px;height:36px;border:1px solid rgba(200,150,12,.5);border-radius:50%;pointer-events:none;z-index:99998;transition:transform .35s,width .3s,height .3s;transform:translate(-50%,-50%)}
@media(max-width:768px){.cursor,.cursor-ring{display:none}body{cursor:auto}}

/* NAVBAR */
#nav{padding:22px 0;z-index:1000;border-bottom:1px solid transparent;transition:all var(--tr)}
#nav.scrolled{background:rgba(8,8,8,.96);backdrop-filter:blur(24px);padding:14px 0;border-bottom:1px solid var(--noir-b)}
.brand{font-family:var(--fd);font-size:1.3rem;font-weight:700;color:var(--blanc)!important;text-decoration:none;display:flex;align-items:center;gap:10px;letter-spacing:.03em}
.brand-mark{width:34px;height:34px;background:var(--or);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.1rem;flex-shrink:0}
.brand-sub{font-family:var(--fb);font-size:.62rem;font-weight:700;letter-spacing:.25em;text-transform:uppercase;color:var(--blanc-d);display:block;line-height:1;margin-top:2px}
.brand-gold{color:var(--or)}
.nav-lnk{font-family:var(--fb);font-size:.75rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--blanc-d)!important;transition:color .2s;padding:6px 0!important;position:relative}
.nav-lnk::after{content:'';position:absolute;bottom:0;left:0;width:0;height:1px;background:var(--or);transition:width .3s}
.nav-lnk:hover{color:var(--or)!important}
.nav-lnk:hover::after{width:100%}
.reg-sel{background:rgba(255,255,255,.04);border:1px solid var(--noir-b);border-radius:var(--r);overflow:hidden;display:flex}
.reg-btn{background:transparent;border:none;padding:7px 12px;font-size:.7rem;font-weight:700;color:var(--blanc-d);cursor:pointer;transition:all .2s;font-family:var(--fb);letter-spacing:.05em}
.reg-btn.on,.reg-btn:hover{background:var(--or);color:#000!important}

/* BUTTONS */
.btn-or{background:var(--or);color:#000;border:none;padding:13px 30px;font-size:.78rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;border-radius:var(--r);transition:all .3s;cursor:pointer;text-decoration:none;display:inline-flex;align-items:center;gap:9px;font-family:var(--fb)}
.btn-or:hover{background:var(--or-v);color:#000;transform:translateY(-3px);box-shadow:0 10px 40px rgba(200,150,12,.35)}
.btn-ghost{background:transparent;color:var(--blanc);border:1px solid rgba(200,150,12,.35);padding:13px 30px;font-size:.78rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;border-radius:var(--r);transition:all .3s;cursor:pointer;text-decoration:none;display:inline-flex;align-items:center;gap:9px;font-family:var(--fb)}
.btn-ghost:hover{background:rgba(200,150,12,.1);border-color:var(--or);color:var(--or);transform:translateY(-3px)}

/* HERO */
.hero{position:relative;min-height:100vh;overflow:hidden;background:var(--noir-d);display:flex;align-items:center}
#hcanvas{position:absolute;inset:0;z-index:0;width:100%;height:100%}
.hero-ov{position:absolute;inset:0;background:radial-gradient(ellipse at 60% 50%,rgba(200,150,12,.05) 0%,transparent 65%),linear-gradient(180deg,rgba(3,3,3,.2) 0%,rgba(3,3,3,.75) 100%);z-index:1}
.hero-ct{position:relative;z-index:2;width:100%;padding:140px 0 90px}
.hlabel{display:inline-flex;align-items:center;gap:10px;background:rgba(200,150,12,.08);border:1px solid rgba(200,150,12,.2);border-radius:40px;padding:6px 18px 6px 8px;margin-bottom:34px}
.hlabel-dot{width:8px;height:8px;background:var(--or);border-radius:50%;animation:pdot 2s infinite}
@keyframes pdot{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.5;transform:scale(1.4)}}
.hlabel span{font-size:.7rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--or)}
.htitle{font-family:var(--fd);font-size:clamp(3rem,7vw,6.8rem);font-weight:600;line-height:1.0;color:var(--blanc);letter-spacing:-.02em;margin-bottom:28px}
.htitle em{font-style:italic;color:var(--or);font-weight:300}
.htitle .hyr{display:block;font-size:.2em;font-family:var(--fb);font-weight:800;letter-spacing:.4em;text-transform:uppercase;color:var(--or);margin-bottom:.4em}
.hsub{font-size:clamp(.9rem,1.6vw,1.1rem);color:var(--blanc-d);line-height:1.85;max-width:540px;margin-bottom:44px}
.hctas{display:flex;gap:14px;flex-wrap:wrap;margin-bottom:72px}
.hstats{display:flex;align-items:center;gap:44px;flex-wrap:wrap;padding-top:44px;border-top:1px solid var(--noir-b)}
.stat-n{font-family:var(--fd);font-size:2.6rem;font-weight:600;color:var(--blanc);line-height:1}
.stat-sf{color:var(--or);font-family:var(--fd);font-size:1.3rem;font-weight:600}
.stat-l{font-size:.68rem;color:var(--gris);letter-spacing:.14em;text-transform:uppercase;font-weight:700;margin-top:3px}
.stat-div{width:1px;height:52px;background:var(--noir-b)}
.scroll-i{position:absolute;bottom:36px;left:50%;transform:translateX(-50%);z-index:3;display:flex;flex-direction:column;align-items:center;gap:8px;color:rgba(255,255,255,.2);font-size:.62rem;font-weight:700;letter-spacing:.25em;text-transform:uppercase}
.scroll-l{width:1px;height:48px;background:linear-gradient(to bottom,rgba(200,150,12,.5),transparent);animation:sa 2s ease infinite}
@keyframes sa{0%{opacity:1;transform:scaleY(1) translateY(0)}100%{opacity:0;transform:scaleY(.3) translateY(18px)}}

/* TICKER */
.ticker{background:var(--noir-d);border-top:1px solid var(--noir-b);border-bottom:1px solid var(--noir-b);padding:16px 0;overflow:hidden}
.tk-track{display:flex;align-items:center;gap:44px;white-space:nowrap;animation:tk 32s linear infinite;flex-shrink:0}
@keyframes tk{from{transform:translateX(0)}to{transform:translateX(-50%)}}
.tk-track span{font-size:.68rem;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--gris)}
.tk-track span:hover{color:var(--or)}
.tk-sep{color:var(--or)!important;font-size:.45rem}

/* SECTION BASE */
.sec{padding:100px 0}
.stag{display:inline-flex;align-items:center;gap:10px;font-size:.68rem;font-weight:700;letter-spacing:.25em;text-transform:uppercase;color:var(--or);margin-bottom:18px}
.stag::before{content:'';width:28px;height:1px;background:var(--or)}
.stitle{font-family:var(--fd);font-size:clamp(2.2rem,4vw,3.8rem);font-weight:600;line-height:1.1;color:var(--blanc);letter-spacing:-.02em}
.stitle em{font-style:italic;color:var(--or);font-weight:300}

/* MANIFESTO */
.mani{background:var(--noir-c);border-top:1px solid var(--noir-b);border-bottom:1px solid var(--noir-b);position:relative;overflow:hidden}
.mani::before{content:'AFRICA';position:absolute;top:50%;left:-20px;transform:translateY(-50%);font-family:var(--fd);font-size:20vw;font-weight:700;color:rgba(200,150,12,.025);pointer-events:none;white-space:nowrap;line-height:1}
.mquote{font-family:var(--fd);font-size:clamp(1.5rem,2.8vw,2.4rem);font-weight:300;font-style:italic;line-height:1.45;color:var(--blanc);border-left:3px solid var(--or);padding-left:34px}
.mauth{font-size:.75rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--or);margin-top:22px;padding-left:34px}
.pillars{display:flex;flex-direction:column;gap:16px}
.pillar{display:flex;align-items:center;gap:18px;padding:18px 22px;background:rgba(200,150,12,.04);border:1px solid rgba(200,150,12,.1);border-radius:var(--r);transition:all .3s}
.pillar:hover{background:rgba(200,150,12,.08);border-color:rgba(200,150,12,.25);transform:translateX(8px)}
.pillar-ico{font-size:1.7rem;flex-shrink:0}
.pillar strong{display:block;color:var(--blanc);font-size:.88rem;font-weight:700;margin-bottom:3px}
.pillar span{font-size:.78rem;color:var(--blanc-d)}

/* PROJETS */
.filt-bar{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:44px}
.filt{background:transparent;border:1px solid var(--noir-b);color:var(--blanc-d);padding:8px 18px;font-size:.7rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;border-radius:40px;cursor:pointer;transition:all .25s;font-family:var(--fb)}
.filt.on,.filt:hover{background:var(--or);color:#000;border-color:var(--or)}
.pgrid{display:grid;grid-template-columns:repeat(3,1fr);gap:2px}
.pcard{position:relative;overflow:hidden;background:var(--noir-c);cursor:pointer;transition:all .5s;aspect-ratio:3/4}
.pcard.feat{aspect-ratio:3/2;grid-column:span 2}
.pcard.hide{display:none}
.pbg{position:absolute;inset:0;background-size:cover;background-position:center;transition:transform .8s cubic-bezier(.22,1,.36,1);filter:brightness(.45)}
.pcard:hover .pbg{transform:scale(1.07);filter:brightness(.3)}
.pov{position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,.95) 0%,rgba(0,0,0,.25) 55%,transparent 100%);z-index:1}
.pcont{position:absolute;bottom:0;left:0;right:0;padding:26px;z-index:2;transition:transform .4s}
.pcard:hover .pcont{transform:translateY(-8px)}
.pcat{font-size:.62rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--or);margin-bottom:8px;display:flex;align-items:center;gap:7px}
.pcat::before{content:'';width:18px;height:1px;background:var(--or)}
.pcard h4{font-family:var(--fd);font-size:1.35rem;font-weight:600;color:var(--blanc);line-height:1.2;margin-bottom:8px}
.pmeta{display:flex;align-items:center;gap:12px;font-size:.7rem;color:var(--blanc-d);font-weight:600}
.pmeta .bgt{color:var(--or)}
.pdesc{font-size:.78rem;color:rgba(255,255,255,.45);margin-top:7px;line-height:1.6}
.pbtn{display:inline-flex;align-items:center;gap:7px;margin-top:14px;font-size:.7rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--or);background:transparent;border:none;cursor:pointer;padding:0;opacity:0;transform:translateY(8px);transition:all .3s .1s;font-family:var(--fb)}
.pcard:hover .pbtn{opacity:1;transform:translateY(0)}
@media(max-width:992px){.pgrid{grid-template-columns:repeat(2,1fr)}.pcard.feat{grid-column:span 2}}
@media(max-width:640px){.pgrid{grid-template-columns:1fr}.pcard.feat{grid-column:span 1;aspect-ratio:3/4}}

/* AI LAB */
.alab{background:var(--noir-c);border-top:1px solid var(--noir-b)}
.alab-hero{background:linear-gradient(135deg,rgba(200,150,12,.07) 0%,rgba(200,150,12,.02) 100%);border:1px solid rgba(200,150,12,.15);border-radius:var(--r);padding:48px;margin-bottom:52px;position:relative;overflow:hidden}
.alab-hero::before{content:'';position:absolute;top:-60px;right:-60px;width:280px;height:280px;border-radius:50%;background:radial-gradient(circle,rgba(200,150,12,.08),transparent 70%);pointer-events:none}
.abadge{display:inline-flex;align-items:center;gap:8px;background:rgba(200,150,12,.12);border:1px solid rgba(200,150,12,.3);border-radius:40px;padding:5px 14px;font-size:.66rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--or);margin-bottom:18px}
.abadge-dot{width:6px;height:6px;background:var(--or);border-radius:50%;animation:pdot 2s infinite}
.alab-hero h2{font-family:var(--fd);font-size:clamp(1.8rem,3vw,2.8rem);font-weight:600;color:var(--blanc);margin-bottom:14px}
.alab-hero p{color:var(--blanc-d);font-size:.92rem;line-height:1.85;max-width:580px}
.ogrid{display:grid;grid-template-columns:repeat(4,1fr);gap:2px}
@media(max-width:1200px){.ogrid{grid-template-columns:repeat(3,1fr)}}
@media(max-width:768px){.ogrid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:480px){.ogrid{grid-template-columns:1fr}}
.ocard{background:var(--noir);border:1px solid var(--noir-b);padding:26px 20px;cursor:pointer;transition:all .35s;position:relative;overflow:hidden}
.ocard::after{content:'';position:absolute;bottom:0;left:0;width:0;height:2px;background:var(--or);transition:width .3s}
.ocard:hover{background:var(--noir-l);border-color:rgba(200,150,12,.25);transform:translateY(-4px)}
.ocard:hover::after{width:100%}
.oico{font-size:1.7rem;display:block;margin-bottom:13px}
.ocard h6{font-size:.82rem;font-weight:700;color:var(--blanc);margin-bottom:6px;line-height:1.3}
.ocard p{font-size:.73rem;color:var(--gris);margin:0;line-height:1.6}
.oaccess{font-size:.6rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--vert);margin-top:11px;display:flex;align-items:center;gap:5px}
.oaccess::before{content:'●';font-size:.4rem}

/* TEAM */
.tgrid{display:grid;grid-template-columns:repeat(4,1fr);gap:2px;margin-top:56px}
@media(max-width:1200px){.tgrid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:576px){.tgrid{grid-template-columns:1fr}}
.tcard{padding:32px 24px;background:var(--noir-c);border:1px solid var(--noir-b);transition:all .35s;position:relative;overflow:hidden}
.tcard::before{content:'';position:absolute;top:0;left:0;width:100%;height:3px;background:var(--or);transform:scaleX(0);transform-origin:left;transition:transform .3s}
.tcard:hover{border-color:rgba(200,150,12,.2)}
.tcard:hover::before{transform:scaleX(1)}
.tavatar{width:64px;height:64px;border-radius:50%;background:var(--gris-m);display:flex;align-items:center;justify-content:center;font-size:1.9rem;margin-bottom:18px;border:2px solid var(--noir-b);transition:border-color .3s}
.tcard:hover .tavatar{border-color:var(--or)}
.tcard h5{font-family:var(--fd);font-size:1.1rem;font-weight:600;color:var(--blanc);margin-bottom:3px}
.trole{font-size:.67rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--or);margin-bottom:10px}
.torig{font-size:.72rem;color:var(--gris)}
.tbio{font-size:.78rem;color:var(--blanc-d);line-height:1.7;margin-top:13px;border-top:1px solid var(--noir-b);padding-top:13px}

/* CONTACT */
.contact-sec{background:var(--noir-d);border-top:1px solid var(--noir-b)}
.cwrap{display:grid;grid-template-columns:1fr 1.6fr;gap:72px;align-items:start}
@media(max-width:992px){.cwrap{grid-template-columns:1fr;gap:44px}}
.cinfos{display:flex;flex-direction:column;gap:20px}
.ci-item{display:flex;gap:14px}
.ci-ico{width:40px;height:40px;background:rgba(200,150,12,.08);border:1px solid rgba(200,150,12,.15);border-radius:var(--r);display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0}
.ci-item strong{display:block;color:var(--blanc);font-size:.8rem;font-weight:700;margin-bottom:2px}
.ci-item span{color:var(--gris);font-size:.78rem}
.cform{background:var(--noir-c);border:1px solid var(--noir-b);border-radius:var(--r);padding:44px}
@media(max-width:576px){.cform{padding:24px 18px}}
.frow{display:grid;grid-template-columns:1fr 1fr;gap:14px}
@media(max-width:576px){.frow{grid-template-columns:1fr}}
.fgrp{margin-bottom:18px}
.fgrp label{display:block;font-size:.67rem;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--blanc-d);margin-bottom:7px}
.fctrl{width:100%;background:rgba(255,255,255,.03);border:1px solid var(--noir-b);color:var(--blanc);padding:13px 15px;font-size:.86rem;font-family:var(--fb);border-radius:var(--r);outline:none;transition:border-color .25s,background .25s}
.fctrl::placeholder{color:var(--gris)}
.fctrl:focus{border-color:var(--or);background:rgba(200,150,12,.03)}
.fctrl option{background:#111}

/* FOOTER */
footer{background:#020202;padding:88px 0 40px;border-top:1px solid #111}
.fbrand{font-family:var(--fd);font-size:1.9rem;font-weight:700;color:var(--blanc)}
.fbrand em{font-style:italic;color:var(--or)}
.fdesc{color:var(--gris);font-size:.82rem;line-height:1.8;margin-top:10px;max-width:290px}
.fsoc{display:flex;gap:9px;margin-top:22px}
.fsoc a{width:36px;height:36px;background:var(--noir-c);border:1px solid var(--noir-b);color:var(--gris);display:flex;align-items:center;justify-content:center;border-radius:var(--r);text-decoration:none;transition:all .2s}
.fsoc a:hover{background:var(--or);color:#000;border-color:var(--or)}
footer h5{color:var(--blanc);font-size:.68rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;margin-bottom:18px}
footer ul{list-style:none}
footer li{margin-bottom:9px}
footer a{color:var(--gris);font-size:.8rem;text-decoration:none;transition:color .2s}
footer a:hover{color:var(--or)}
.fbot{border-top:1px solid #111;padding-top:26px;margin-top:56px;display:flex;justify-content:space-between;flex-wrap:wrap;gap:8px;color:#282828;font-size:.72rem}

/* FAB */
.fab{position:fixed;bottom:30px;right:30px;z-index:999;background:var(--or);color:#000;border:none;border-radius:50px;padding:14px 24px;display:flex;align-items:center;gap:9px;font-size:.75rem;font-weight:700;font-family:var(--fb);letter-spacing:.1em;text-transform:uppercase;cursor:pointer;box-shadow:0 6px 32px rgba(200,150,12,.3);transition:all .3s}
.fab:hover{background:var(--or-v);transform:translateY(-3px) scale(1.03);box-shadow:0 14px 48px rgba(200,150,12,.45)}
@media(max-width:576px){.fab span{display:none}.fab{padding:17px;border-radius:50%}}

/* MODAL */
.modal-content{background:var(--noir-c);border:1px solid var(--noir-b);border-radius:var(--r);color:var(--blanc)}
.modal-header{border-bottom:1px solid var(--noir-b);padding:18px 26px}
.modal-body{padding:26px}
.modal-title{font-family:var(--fd);font-size:1.25rem;font-weight:600;color:var(--blanc)}

/* WIZARD */
.wiz{width:100%;max-width:700px;text-align:center}
.wstep{display:none}
.wstep.on{display:block}
.wico{font-size:3.2rem;margin-bottom:14px}
.wstep h3{font-family:var(--fd);font-size:1.9rem;font-weight:600;color:var(--blanc);margin-bottom:32px}
.wchoices{display:grid;grid-template-columns:repeat(auto-fit,minmax(140px,1fr));gap:14px}
.wch{background:var(--noir-c);border:1px solid var(--noir-b);color:var(--blanc);padding:26px 14px;border-radius:var(--r);cursor:pointer;transition:all .3s;font-family:var(--fb);display:flex;flex-direction:column;align-items:center;gap:9px;text-align:center}
.wch i{font-size:1.4rem;color:var(--or)}
.wch strong{font-size:.86rem;font-weight:700;display:block}
.wch small{font-size:.72rem;color:var(--gris)}
.wch:hover{background:var(--or);border-color:var(--or);color:#000}
.wch:hover i,.wch:hover small{color:rgba(0,0,0,.6)}
.winput{width:100%;background:var(--noir-l);border:1px solid var(--noir-b);color:var(--blanc);padding:13px 15px;font-size:.88rem;border-radius:var(--r);margin-bottom:11px;outline:none;font-family:var(--fb);transition:border-color .2s}
.winput:focus{border-color:var(--or)}
.winput::placeholder{color:var(--gris)}
.wbar{width:100%;height:2px;background:var(--noir-b);border-radius:2px;overflow:hidden;margin:22px 0 10px}
.wfill{height:100%;background:linear-gradient(90deg,var(--or),var(--or-v));width:0;transition:width .5s ease}
.wstatus{color:var(--gris);font-size:.8rem}
.wresult{background:var(--noir-l);border:1px solid var(--noir-b);border-left:3px solid var(--or);border-radius:var(--r);padding:22px;text-align:left;color:var(--blanc-d);font-size:.86rem;line-height:1.85;max-height:300px;overflow-y:auto;margin-top:18px}

/* OUTIL RESULT */
.ores{background:var(--noir);border:1px solid var(--noir-b);border-left:3px solid var(--or);border-radius:var(--r);padding:20px;font-size:.86rem;line-height:1.85;color:var(--blanc-d);white-space:pre-wrap;word-wrap:break-word}
.olead{background:rgba(200,150,12,.04);border:1px solid rgba(200,150,12,.15);border-radius:var(--r);padding:20px;margin-top:16px}
.olead h6{font-size:.82rem;font-weight:700;color:var(--blanc);margin-bottom:12px}

/* REVEAL */
.rv{opacity:0;transform:translateY(44px);transition:opacity .75s ease,transform .75s ease}
.rv.vis{opacity:1;transform:translateY(0)}
.d1{transition-delay:.1s}.d2{transition-delay:.22s}.d3{transition-delay:.34s}.d4{transition-delay:.46s}

/* SCROLLBAR */
::-webkit-scrollbar{width:4px}
::-webkit-scrollbar-track{background:var(--noir-d)}
::-webkit-scrollbar-thumb{background:var(--or);border-radius:2px}
</style>
</head>
<body>

<div class="cursor"></div>
<div class="cursor-ring"></div>

<!-- ═══════════════════════════════════════════════════════
     NAVBAR
═══════════════════════════════════════════════════════ -->
<nav id="nav" class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="brand navbar-brand" href="#">
      <div class="brand-mark">🌍</div>
      <div>
        <span>PAN-<span class="brand-gold">AFRICA</span></span>
        <span class="brand-sub">VISION · 2030</span>
      </div>
    </a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#nv">
      <span style="display:block;width:22px;height:1px;background:var(--blanc-d);margin:6px 0"></span>
      <span style="display:block;width:22px;height:1px;background:var(--blanc-d);margin:6px 0"></span>
    </button>
    <div class="collapse navbar-collapse" id="nv">
      <ul class="navbar-nav mx-auto gap-4">
        <li><a class="nav-lnk nav-link" href="#vision">Vision</a></li>
        <li><a class="nav-lnk nav-link" href="#projets">Projets</a></li>
        <li><a class="nav-lnk nav-link" href="#ailab">AI Lab</a></li>
        <li><a class="nav-lnk nav-link" href="#equipe">Équipe</a></li>
        <li><a class="nav-lnk nav-link" href="#contact">Contact</a></li>
      </ul>
      <div class="d-flex align-items-center gap-3 flex-wrap">
        <div class="reg-sel">
          <button class="reg-btn on">🌍 Afrique</button>
          <button class="reg-btn">🇫🇷 Diaspora EU</button>
          <button class="reg-btn">🇺🇸 Diaspora US</button>
        </div>
        <a href="#contact" class="btn-or" style="padding:10px 20px;font-size:.7rem">Devenir Associé</a>
      </div>
    </div>
  </div>
</nav>

<!-- ═══════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════ -->
<section class="hero" id="accueil">
  <canvas id="hcanvas"></canvas>
  <div class="hero-ov"></div>
  <div class="hero-ct">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="hlabel rv">
            <div class="hlabel-dot"></div>
            <span>Coalition Internationale · Actif depuis 2024</span>
          </div>
          <h1 class="htitle rv d1">
            <span class="hyr">L'AFRIQUE DE DEMAIN</span>
            Bâtir les<br><em>Civilisations</em><br>de 2030
          </h1>
          <p class="hsub rv d2">
            PAN-AFRICA VISION fédère une coalition d'investisseurs, d'architectes, de scientifiques et de leaders de la diaspora africaine pour concevoir et financer les méga-projets qui transformeront le continent.
          </p>
          <div class="hctas rv d3">
            <a href="#projets" class="btn-or"><i class="bi bi-globe-africa"></i>Explorer les projets</a>
            <button class="btn-ghost" data-bs-toggle="modal" data-bs-target="#mwiz"><i class="bi bi-stars"></i>Soumettre un projet</button>
          </div>
          <div class="hstats rv d4">
            <div>
              <div style="display:flex;align-items:baseline;gap:2px">
                <span class="stat-n" data-t="54">54</span><span class="stat-sf">+</span>
              </div>
              <div class="stat-l">Pays couverts</div>
            </div>
            <div class="stat-div"></div>
            <div>
              <div style="display:flex;align-items:baseline;gap:2px">
                <span class="stat-n" data-t="120">120</span><span class="stat-sf">Mds$</span>
              </div>
              <div class="stat-l">Pipeline projets</div>
            </div>
            <div class="stat-div"></div>
            <div>
              <div style="display:flex;align-items:baseline;gap:2px">
                <span class="stat-n" data-t="38">38</span>
              </div>
              <div class="stat-l">Associés actifs</div>
            </div>
            <div class="stat-div"></div>
            <div>
              <div style="display:flex;align-items:baseline;gap:2px">
                <span class="stat-n" data-t="2030">2030</span>
              </div>
              <div class="stat-l">Horizon cible</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="scroll-i"><span>Découvrir</span><div class="scroll-l"></div></div>
</section>

<!-- TICKER -->
<div class="ticker">
  <div style="display:flex;align-items:center">
    <div class="tk-track" id="tktrack">
      <span>IMMOBILIER</span><span class="tk-sep">✦</span>
      <span>SMART CITIES</span><span class="tk-sep">✦</span>
      <span>ÉNERGIE SOLAIRE</span><span class="tk-sep">✦</span>
      <span>AGROPOLES</span><span class="tk-sep">✦</span>
      <span>CITÉS MÉDICALES</span><span class="tk-sep">✦</span>
      <span>HUBS TECHNOLOGIQUES</span><span class="tk-sep">✦</span>
      <span>MUSÉES PANAFRICAINS</span><span class="tk-sep">✦</span>
      <span>CENTRES SPATIAUX</span><span class="tk-sep">✦</span>
      <span>INFRASTRUCTURES</span><span class="tk-sep">✦</span>
      <span>DIASPORA INVEST</span><span class="tk-sep">✦</span>
      <span>VISION 2030</span><span class="tk-sep">✦</span>
      <span>AFRIQUE FORTE</span><span class="tk-sep">✦</span>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════
     MANIFESTO / VISION
═══════════════════════════════════════════════════════ -->
<section class="mani sec" id="vision">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6 rv">
        <blockquote class="mquote">
          "L'Afrique ne sera pas développée de l'extérieur. Elle sera construite par ses fils et filles, avec l'ambition de ceux qui savent que le temps est venu."
        </blockquote>
        <p class="mauth">— PAN-AFRICA VISION, Manifeste Fondateur 2024</p>
        <div style="margin-top:44px">
          <div class="stag">Notre mission</div>
          <p style="color:var(--blanc-d);font-size:.9rem;line-height:1.9;margin-top:10px">
            Nous rassemblons la diaspora africaine, les investisseurs internationaux et les leaders du continent pour <strong style="color:var(--blanc)">financer, concevoir et réaliser</strong> les projets qui feront de l'Afrique la puissance du XXIe siècle.
          </p>
          <a href="#contact" class="btn-or" style="margin-top:26px"><i class="bi bi-person-plus"></i>Rejoindre la coalition</a>
        </div>
      </div>
      <div class="col-lg-6 rv d2">
        <div class="pillars">
          <div class="pillar"><span class="pillar-ico">🏗️</span><div><strong>Immobilier & Villes Nouvelles</strong><span>Cités intelligentes, zones économiques, logements durables pour 100M d'Africains</span></div></div>
          <div class="pillar"><span class="pillar-ico">🔬</span><div><strong>Science, Espace & Innovation</strong><span>Agences spatiales, centres IA, labs médicaux, universités de classe mondiale</span></div></div>
          <div class="pillar"><span class="pillar-ico">🎨</span><div><strong>Art, Culture & Identité</strong><span>Grands musées panafricains, festivals internationaux, industries créatives</span></div></div>
          <div class="pillar"><span class="pillar-ico">⚡</span><div><strong>Énergie & Infrastructure</strong><span>Solaire, hydroélectrique, réseau continental — souveraineté énergétique totale</span></div></div>
          <div class="pillar"><span class="pillar-ico">💰</span><div><strong>Finance & Investissement Diaspora</strong><span>Mobilisation de 100 milliards de la diaspora vers les projets structurants</span></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════
     PROJETS 2030
═══════════════════════════════════════════════════════ -->
<section class="sec" id="projets" style="background:var(--noir)">
  <div class="container">
    <div class="row align-items-end mb-5">
      <div class="col-lg-6 rv">
        <div class="stag">Méga-projets 2030</div>
        <h2 class="stitle">Les projets qui<br>changeront <em>l'Afrique</em></h2>
      </div>
      <div class="col-lg-6 rv d1">
        <div class="filt-bar justify-content-lg-end">
          <button class="filt on" data-f="all">Tous</button>
          <button class="filt" data-f="immo">Immobilier</button>
          <button class="filt" data-f="energie">Énergie</button>
          <button class="filt" data-f="science">Science</button>
          <button class="filt" data-f="culture">Culture</button>
          <button class="filt" data-f="agri">Agriculture</button>
          <button class="filt" data-f="sante">Santé</button>
        </div>
      </div>
    </div>
    <div class="pgrid" id="pgrid"></div>
    <div class="text-center mt-5 rv">
      <p style="color:var(--gris);font-size:.83rem;margin-bottom:18px">Vous avez un projet pour l'Afrique ?</p>
      <button class="btn-or" data-bs-toggle="modal" data-bs-target="#mwiz"><i class="bi bi-plus-circle"></i>Soumettre votre projet</button>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════
     AI VISION LAB
═══════════════════════════════════════════════════════ -->
<section class="alab sec" id="ailab">
  <div class="container">
    <div class="alab-hero rv">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <div class="abadge"><div class="abadge-dot"></div>IA Mistral · Vision Panafricaine</div>
          <h2>AI Vision Lab <em style="font-family:var(--fd);font-style:italic;color:var(--or)">2030</em></h2>
          <p>Notre intelligence artificielle spécialisée génère des concepts complets de méga-projets, des stratégies d'investissement et des visions de civilisation. Choisissez un outil et recevez en quelques secondes une analyse de niveau cabinet international.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <div style="font-size:4rem;opacity:.35;line-height:1">🤖</div>
          <div style="font-size:.65rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--or);margin-top:7px">Powered by Mistral AI</div>
        </div>
      </div>
    </div>
    <div class="ogrid" id="ogrid"></div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════
     ÉQUIPE
═══════════════════════════════════════════════════════ -->
<section class="sec" id="equipe" style="background:var(--noir)">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-lg-7 rv">
        <div class="stag">L'équipe internationale</div>
        <h2 class="stitle">Nos associés <em>bâtisseurs</em></h2>
      </div>
      <div class="col-lg-5 rv d1">
        <p style="color:var(--blanc-d);font-size:.87rem;line-height:1.85">PAN-AFRICA VISION est gouvernée par une coalition d'associés internationaux : ingénieurs, financiers, architectes, artistes et leaders communautaires unis par l'ambition d'un continent africain souverain et puissant.</p>
      </div>
    </div>
    <div class="tgrid">
      <?php
      $team=[
        ['🇸🇳','Amadou Diallo','Directeur Général','Dakar · Paris','Financier senior, ex-Goldman Sachs Africa. 20 ans d\'infrastructure en Afrique de l\'Ouest. Architecte de la coalition.'],
        ['🇰🇪','Amira Wanjiku','Directrice Innovation','Nairobi · Londres','Ingénieure en chef, spécialiste smart cities et IA appliquée. A piloté 3 projets urbains majeurs en Afrique de l\'Est.'],
        ['🇨🇮','Jean-Baptiste Koné','Directeur Immobilier','Abidjan · Dubaï','Promoteur immobilier, 15 ans de projets résidentiels et commerciaux premium en Afrique subsaharienne.'],
        ['🇳🇬','Chioma Okafor','Directrice Culturelle','Lagos · New York','Curatrice internationale, fondatrice de deux musées d\'art africain contemporain. Vision panafricaine radicale.'],
        ['🇲🇦','Yassine El Fassi','Directeur Énergie','Casablanca · Amsterdam','Expert énergies renouvelables, spécialiste solaire Sahara. A structuré 4 Mds$ de financements verts.'],
        ['🇷🇼','Grace Uwimana','Directrice Science','Kigali · Genève','Chercheuse en biotechnologies, ex-OMS. Pilote le programme Africa Science 2030 depuis le Rwanda.'],
        ['🇬🇭','Kwame Asante','Directeur Finance','Accra · Toronto','Gestionnaire de fonds diaspora, spécialiste obligataire africain. 800M$ mobilisés vers des projets d\'infrastructure.'],
        ['🇪🇹','Hana Bekele','Directrice Agriculture','Addis-Abeba · Paris','Agronome et économiste rurale. A supervisé des projets agro-industriels sur 500 000 ha en Afrique de l\'Est.'],
      ];
      foreach($team as $m): ?>
      <div class="tcard rv">
        <div class="tavatar"><?=$m[0]?></div>
        <h5><?=$m[1]?></h5>
        <div class="trole"><?=$m[2]?></div>
        <div class="torig">📍 <?=$m[3]?></div>
        <div class="tbio"><?=$m[4]?></div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center mt-5 rv">
      <p style="font-family:var(--fd);font-size:1.45rem;font-weight:300;font-style:italic;color:var(--blanc-d);max-width:560px;margin:0 auto 26px">"Rejoignez la coalition. L'Afrique a besoin de vous."</p>
      <a href="#contact" class="btn-or"><i class="bi bi-people"></i>Devenir associé PAN-AFRICA VISION</a>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════
     CONTACT
═══════════════════════════════════════════════════════ -->
<section class="contact-sec sec" id="contact">
  <div class="container">
    <div class="row mb-5">
      <div class="col-12 rv">
        <div class="stag">Rejoignez la coalition</div>
        <h2 class="stitle">Bâtissons <em>ensemble</em></h2>
      </div>
    </div>
    <div class="cwrap">
      <div class="cinfos rv">
        <p style="color:var(--blanc-d);font-size:.88rem;line-height:1.9;margin-bottom:24px">Investisseur, expert, membre de la diaspora ou institution — si vous partagez la vision d'une Afrique puissante et souveraine à l'horizon 2030, votre place est dans la coalition.</p>
        <div class="ci-item"><div class="ci-ico">🌍</div><div><strong>Siège International</strong><span>Paris · Londres · Nairobi · Dakar</span></div></div>
        <div class="ci-item"><div class="ci-ico">✉️</div><div><strong>Contact Direct</strong><span>coalition@pan-africa-vision.com</span></div></div>
        <div class="ci-item"><div class="ci-ico">📞</div><div><strong>Ligne Investisseurs</strong><span>+33 1 XX XX XX XX (FR) · +44 20 XX XX XX (UK)</span></div></div>
        <div class="ci-item"><div class="ci-ico">🤝</div><div><strong>Partenariats</strong><span>Union Africaine · BAD · IFC · Fonds Souverains</span></div></div>
        <div style="padding:22px;background:rgba(200,150,12,.05);border:1px solid rgba(200,150,12,.15);border-radius:var(--r);margin-top:8px">
          <div style="font-size:.66rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--or);margin-bottom:10px">Ticket d'entrée associé</div>
          <div style="font-family:var(--fd);font-size:2.1rem;font-weight:600;color:var(--blanc)">50K – 5M USD</div>
          <div style="font-size:.76rem;color:var(--gris);margin-top:3px">Selon le véhicule d'investissement</div>
        </div>
      </div>
      <div class="cform rv d2">
        <div style="margin-bottom:26px">
          <h3 style="font-family:var(--fd);font-size:1.55rem;font-weight:600;color:var(--blanc);margin-bottom:5px">Déposez votre candidature</h3>
          <p style="color:var(--gris);font-size:.8rem">Réponse garantie sous 72h par un associé senior.</p>
        </div>
        <form id="cform">
          <div class="frow">
            <div class="fgrp"><label>Prénom & Nom</label><input type="text" name="nom" class="fctrl" placeholder="Votre nom complet" required></div>
            <div class="fgrp"><label>Email</label><input type="email" name="email" class="fctrl" placeholder="email@domain.com" required></div>
          </div>
          <div class="frow">
            <div class="fgrp"><label>Pays de résidence</label><input type="text" name="pays" class="fctrl" placeholder="France, UK, Sénégal..."></div>
            <div class="fgrp"><label>Profil</label>
              <select name="profil" class="fctrl">
                <option>Investisseur Diaspora</option><option>Investisseur Institutionnel</option>
                <option>Expert / Consultant</option><option>Architecte / Ingénieur</option>
                <option>Entrepreneur Africain</option><option>Institution Publique</option><option>Autre</option>
              </select>
            </div>
          </div>
          <div class="fgrp"><label>Secteur d'intérêt</label>
            <select name="secteur" class="fctrl">
              <option>Immobilier & Villes nouvelles</option><option>Énergie & Infrastructure</option>
              <option>Santé & Médecine</option><option>Culture & Tourisme</option>
              <option>Agriculture & Agro-industrie</option><option>Technologie & IA</option>
              <option>Science & Espace</option><option>Tous les secteurs</option>
            </select>
          </div>
          <div class="fgrp"><label>Votre message</label>
            <textarea name="message" class="fctrl" rows="4" placeholder="Décrivez votre projet, votre capacité d'investissement ou la façon dont vous souhaitez contribuer..."></textarea>
          </div>
          <button type="submit" id="sbmit" class="btn-or w-100" style="justify-content:center">
            Envoyer ma candidature <i class="bi bi-arrow-right ms-2"></i>
          </button>
          <div id="cres" class="mt-3"></div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════
     FOOTER
═══════════════════════════════════════════════════════ -->
<footer>
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="fbrand">Pan-<em>Africa</em> Vision</div>
        <p class="fdesc">Coalition internationale pour le développement de l'Afrique de demain. Méga-projets 2030 · Immobilier · Science · Culture · Énergie.</p>
        <div class="fsoc">
          <a href="#"><i class="bi bi-linkedin"></i></a>
          <a href="#"><i class="bi bi-twitter-x"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-youtube"></i></a>
        </div>
      </div>
      <div class="col-6 col-lg-2">
        <h5>Secteurs</h5>
        <ul>
          <li><a href="#projets">Immobilier</a></li><li><a href="#projets">Énergie</a></li>
          <li><a href="#projets">Science & Space</a></li><li><a href="#projets">Culture & Art</a></li>
          <li><a href="#projets">Agriculture</a></li><li><a href="#projets">Santé</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2">
        <h5>Plateforme</h5>
        <ul>
          <li><a href="#projets">Projets 2030</a></li><li><a href="#ailab">AI Vision Lab</a></li>
          <li><a href="#equipe">Équipe</a></li><li><a href="#contact">Devenir Associé</a></li>
        </ul>
      </div>
      <div class="col-lg-4">
        <h5>Newsletter Vision 2030</h5>
        <p style="color:var(--gris);font-size:.78rem;margin-bottom:14px;line-height:1.7">Recevez les analyses de projets, les appels à investissement et les actualités de la coalition.</p>
        <div style="display:flex;gap:8px">
          <input type="email" class="fctrl" placeholder="Votre email" style="flex:1;padding:11px 13px;font-size:.8rem">
          <button class="btn-or" style="padding:11px 18px"><i class="bi bi-send"></i></button>
        </div>
        <div style="margin-top:22px;padding:16px;background:var(--noir-c);border:1px solid var(--noir-b);border-radius:var(--r)">
          <div style="font-size:.64rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--or);margin-bottom:7px">Prochain sommet</div>
          <div style="font-family:var(--fd);font-size:1.05rem;font-weight:600;color:var(--blanc)">PAN-AFRICA SUMMIT 2025</div>
          <div style="font-size:.75rem;color:var(--gris);margin-top:2px">📍 Kigali, Rwanda · Novembre 2025</div>
        </div>
      </div>
    </div>
    <div class="fbot">
      <span>© 2024–2025 PAN-AFRICA VISION. Tous droits réservés.</span>
      <span>Construit avec ambition pour l'Afrique 🌍</span>
    </div>
  </div>
</footer>

<!-- FAB -->
<button class="fab" data-bs-toggle="modal" data-bs-target="#mwiz">
  <i class="bi bi-stars"></i><span>Mon Projet 2030</span>
</button>

<!-- ═══════════════════════════════════════════════════════
     MODAL OUTIL IA
═══════════════════════════════════════════════════════ -->
<div class="modal fade" id="moutil" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="otitle">Outil IA</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="obody"></div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════
     MODAL WIZARD
═══════════════════════════════════════════════════════ -->
<div class="modal fade" id="mwiz" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content" style="background:var(--noir-d)">
      <div class="modal-header" style="border-color:var(--noir-b)">
        <div>
          <div style="font-size:.62rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--or)">AI WIZARD</div>
          <h5 class="modal-title">Votre Projet Africain 2030</h5>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body d-flex justify-content-center py-4">
        <div class="wiz">
          <!-- STEP 1 -->
          <div class="wstep on" id="ws1">
            <div class="wico">🌍</div>
            <h3>Quel type de projet ?</h3>
            <div class="wchoices">
              <button class="wch" data-n="ws2" data-ty="Immobilier & Ville nouvelle"><i class="bi bi-buildings"></i><strong>Immobilier</strong><small>Ville, quartier, résidentiel</small></button>
              <button class="wch" data-n="ws2" data-ty="Énergie & Infrastructure"><i class="bi bi-lightning"></i><strong>Énergie</strong><small>Solaire, barrage, réseau</small></button>
              <button class="wch" data-n="ws2" data-ty="Science & Innovation"><i class="bi bi-rocket"></i><strong>Science</strong><small>Lab, spatial, IA</small></button>
              <button class="wch" data-n="ws2" data-ty="Culture & Patrimoine"><i class="bi bi-palette"></i><strong>Culture</strong><small>Musée, art, festivals</small></button>
              <button class="wch" data-n="ws2" data-ty="Agriculture & Agro-industrie"><i class="bi bi-tree"></i><strong>Agriculture</strong><small>Agropole, irrigation</small></button>
              <button class="wch" data-n="ws2" data-ty="Santé & Médecine"><i class="bi bi-heart-pulse"></i><strong>Santé</strong><small>Hôpital, recherche</small></button>
            </div>
          </div>
          <!-- STEP 2 -->
          <div class="wstep" id="ws2">
            <div class="wico">📍</div>
            <h3>Dans quel pays ?</h3>
            <div class="wchoices">
              <button class="wch" data-n="ws3" data-py="Nigeria"><i class="bi bi-geo-alt"></i><strong>Nigeria</strong><small>Afrique de l'Ouest</small></button>
              <button class="wch" data-n="ws3" data-py="Kenya"><i class="bi bi-geo-alt"></i><strong>Kenya</strong><small>Afrique de l'Est</small></button>
              <button class="wch" data-n="ws3" data-py="Sénégal"><i class="bi bi-geo-alt"></i><strong>Sénégal</strong><small>Afrique de l'Ouest</small></button>
              <button class="wch" data-n="ws3" data-py="Éthiopie"><i class="bi bi-geo-alt"></i><strong>Éthiopie</strong><small>Corne de l'Afrique</small></button>
              <button class="wch" data-n="ws3" data-py="Maroc"><i class="bi bi-geo-alt"></i><strong>Maroc</strong><small>Afrique du Nord</small></button>
              <button class="wch" data-n="ws3" data-py="Afrique du Sud"><i class="bi bi-geo-alt"></i><strong>Afrique du Sud</strong><small>Afrique Australe</small></button>
              <button class="wch" data-n="ws3" data-py="Ghana"><i class="bi bi-geo-alt"></i><strong>Ghana</strong><small>Afrique de l'Ouest</small></button>
              <button class="wch" data-n="ws3" data-py="Rwanda"><i class="bi bi-geo-alt"></i><strong>Rwanda</strong><small>Afrique Centrale</small></button>
            </div>
          </div>
          <!-- STEP 3 -->
          <div class="wstep" id="ws3">
            <div class="wico">✍️</div>
            <h3>Décrivez votre vision</h3>
            <form id="wform" style="text-align:left">
              <div style="display:grid;grid-template-columns:1fr 1fr;gap:11px;margin-bottom:11px">
                <input class="winput" name="nom" placeholder="Votre prénom & nom" required>
                <input class="winput" type="email" name="email" placeholder="Votre email" required>
              </div>
              <textarea class="winput" name="desc" rows="4" placeholder="Décrivez votre projet : ambition, localisation précise, impact visé..." style="resize:none;width:100%"></textarea>
              <button type="submit" class="btn-or w-100 mt-2" style="justify-content:center"><i class="bi bi-stars"></i>Générer ma vision 2030</button>
            </form>
          </div>
          <!-- STEP 4 -->
          <div class="wstep" id="ws4">
            <div class="wico">⚡</div>
            <h3>Vision en cours...</h3>
            <div class="wbar"><div class="wfill" id="wfill"></div></div>
            <p class="wstatus" id="wstatus">Initialisation...</p>
            <div class="wresult" id="wresult" style="display:none"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════
     SCRIPTS
═══════════════════════════════════════════════════════ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
'use strict';

const PROXY = './mistral_proxy.php';

/* ── DONNÉES PROJETS ─────────────────────────────────── */
const PROJETS = [
  {t:'HORIZON CITY — Sénégal', cat:'Immobilier · Smart City', pays:'Sénégal', budget:'14 Mds USD', type:'immo', feat:true,  ico:'🏙️', c1:'#0a1628', c2:'#1a3a2a', desc:'Nouvelle capitale économique de 500 000 habitants, zéro carbone, 100% connectée. Dakar 2030.'},
  {t:'SAHEL SOLAR — Mali · Niger · Burkina', cat:'Énergie · Continental', pays:'Sahel', budget:'80 Mds USD', type:'energie', feat:false, ico:'⚡', c1:'#1a0a00', c2:'#3a2000', desc:'Plus grande centrale solaire du monde : 50 GW pour alimenter 200 millions d\'Africains.'},
  {t:'AFRIKASPACE — Kenya', cat:'Science · Spatial', pays:'Kenya', budget:'6 Mds USD', type:'science', feat:false, ico:'🚀', c1:'#00001a', c2:'#0a001a', desc:'Premier centre de lancement de satellites africain. Nairobi comme Houston de l\'Afrique.'},
  {t:'GRAND MUSÉE PANAFRICAIN — Ghana', cat:'Culture · Identité', pays:'Ghana', budget:'2 Mds USD', type:'culture', feat:false, ico:'🏛️', c1:'#1a0a0a', c2:'#2a1500', desc:'Le plus grand musée dédié aux civilisations africaines. Accra, cœur du monde.'},
  {t:'VICTORIA AGROPOLE — Éthiopie', cat:'Agriculture · Industrie', pays:'Éthiopie', budget:'9 Mds USD', type:'agri', feat:false, ico:'🌾', c1:'#001a05', c2:'#0a2000', desc:'1 million d\'hectares transformés. Nourrir l\'Afrique et exporter vers le monde.'},
  {t:'UBUNTU MEDICAL CITY — Rwanda', cat:'Santé · Recherche', pays:'Rwanda', budget:'4 Mds USD', type:'sante', feat:false, ico:'🏥', c1:'#0a001a', c2:'#00101a', desc:'Campus médical 5 000 lits + université + centre génomique. Kigali capitale médicale.'},
];

/* ── DONNÉES OUTILS ──────────────────────────────────── */
const OUTILS = [
  {
    id:1, ico:'🏙️', titre:'Générateur de Cité Futuriste', desc:'Conçoit un concept complet de ville intelligente africaine pour 2030.',
    champs:[
      {id:'pays',label:'Pays / Région',type:'sel',opts:['Nigeria — Lagos','Kenya — Nairobi','Sénégal — Dakar',"Côte d'Ivoire — Abidjan",'Éthiopie — Addis-Abeba','Rwanda — Kigali','Ghana — Accra','Maroc — Casablanca']},
      {id:'surf',label:'Superficie visée',type:'sel',opts:['500 ha — Quartier innovant','2 000 ha — Ville satellite','10 000 ha — Nouvelle ville','50 000 ha — Métropole régionale']},
      {id:'concept',label:'Concept directeur',type:'sel',opts:['Hub technologique & IA','Éco-cité zéro carbone','Cité culturelle panafricaine','Zone franche industrielle','Campus scientifique & spatial']},
      {id:'budget',label:'Enveloppe budgétaire',type:'sel',opts:['500M – 2Mds USD','2 – 10Mds USD','10 – 50Mds USD','50Mds+ USD']},
    ],
    prompt:d=>`Tu es un urbaniste visionnaire de PAN-AFRICA VISION. Génère un concept complet de cité futuriste africaine 2030 pour "${d.pays}", superficie ${d.surf}, concept "${d.concept}", budget ${d.budget}.
Structure :
1. NOM DE LA CITÉ (symbolique panafricain)
2. VISION (3 phrases inspirantes)
3. ARCHITECTURE & URBANISME (style afro-futuriste)
4. INFRASTRUCTURES CLÉS (transport, énergie, numérique)
5. IMPACT ÉCONOMIQUE & SOCIAL (emplois, PIB, attractivité)
6. CALENDRIER 2025–2035
7. PARTENAIRES STRATÉGIQUES
Sois ambitieux, précis et inspirant.`
  },
  {
    id:2, ico:'🔬', titre:'Hub Scientifique & Spatial', desc:'Conçoit un centre de recherche ou agence spatiale africaine de classe mondiale.',
    champs:[
      {id:'pays',label:'Pays hôte',type:'sel',opts:['Nigeria','Kenya','Sénégal','Maroc','Éthiopie','Rwanda','Égypte','Afrique du Sud']},
      {id:'dom',label:'Domaine scientifique',type:'sel',opts:['Agence Spatiale Africaine','Centre IA & Data Science','Institut Médical & Génomique','Laboratoire Énergie Solaire','Institut Agricole & Biotechnologies']},
      {id:'ech',label:'Échelle du projet',type:'sel',opts:['National — 1 pays','Régional — sous-région','Continental — Union Africaine']},
    ],
    prompt:d=>`Tu es un directeur scientifique de PAN-AFRICA VISION. Conçois un hub scientifique de classe mondiale en ${d.pays}, domaine "${d.dom}", échelle ${d.ech}.
Inclus :
1. NOM & ACRONYME symbolique
2. MISSION & VISION 2030
3. INFRASTRUCTURE (campus, équipements)
4. PROGRAMME SCIENTIFIQUE (5 axes de recherche)
5. FORMATION & TALENTS
6. PARTENARIATS internationaux
7. BUDGET & FINANCEMENT
8. IMPACT CONTINENTAL
Réponds de façon visionnaire et détaillée.`
  },
  {
    id:3, ico:'🏛️', titre:'Musée & Pôle Culturel', desc:'Projette un musée panafricain ou pôle culturel majeur de rayonnement mondial.',
    champs:[
      {id:'type',label:"Type d'institution",type:'sel',opts:['Grand Musée Panafricain','Cité des Arts & Cultures','Centre du Patrimoine Africain','Bibliothèque Universelle Africaine','Musée des Sciences & Techniques']},
      {id:'ville',label:'Ville / Pays',type:'sel',opts:['Dakar, Sénégal','Accra, Ghana','Addis-Abeba, Éthiopie','Nairobi, Kenya','Lagos, Nigeria',"Abidjan, Côte d'Ivoire",'Le Caire, Égypte','Kigali, Rwanda']},
      {id:'archi',label:'Direction architecturale',type:'sel',opts:['Afro-futuriste','Contemporain minimaliste','Néo-traditionnel revisité','High-tech immersif']},
    ],
    prompt:d=>`Tu es directeur artistique de PAN-AFRICA VISION. Conçois le concept complet d'un(e) "${d.type}" à ${d.ville}, architecture "${d.archi}".
Développe :
1. NOM & IDENTITÉ symbolique
2. CONCEPT CURATORIAL
3. ARCHITECTURE (espaces emblématiques)
4. COLLECTIONS & PROGRAMMES
5. ATTRACTIVITÉ INTERNATIONALE
6. MODÈLE ÉCONOMIQUE
7. IMPACT IDENTITAIRE pour la jeunesse africaine
Sois lyrique, précis et inspirant.`
  },
  {
    id:4, ico:'⚡', titre:'Projet Énergie Continent', desc:"Dimensionne un projet d'infrastructure énergétique continentale pour l'Afrique.",
    champs:[
      {id:'type',label:"Type d'énergie",type:'sel',opts:['Méga-centrale solaire (Sahara)','Barrage hydroélectrique régional','Géothermie (Rift Est-Africain)','Réseau électrique panafricain','Hydrogène vert africain']},
      {id:'reg',label:'Zone géographique',type:'sel',opts:["Afrique du Nord","Afrique de l'Ouest","Afrique Centrale","Afrique de l'Est","Afrique Australe","Continental — UA"]},
      {id:'puiss',label:'Capacité cible',type:'sel',opts:['500 MW — Régional','2 GW — Multi-pays','10 GW — Sous-continental','100 GW+ — Continental']},
    ],
    prompt:d=>`Tu es ingénieur en chef de PAN-AFRICA VISION. Conçois un méga-projet énergétique "${d.type}" en zone ${d.reg}, capacité ${d.puiss}.
Structure :
1. NOM DU PROJET symbolique
2. DESCRIPTION TECHNIQUE
3. ZONES D'IMPLANTATION recommandées
4. IMPACT ÉNERGÉTIQUE (foyers alimentés)
5. FINANCEMENT (obligataire panafricain, PPP)
6. GOUVERNANCE
7. CALENDRIER 2025–2035
8. IMPACT sur l'industrialisation africaine
Sois précis, chiffré et visionnaire.`
  },
  {
    id:5, ico:'🚀', titre:'Stratégie Investissement Diaspora', desc:"Construit une stratégie d'investissement pour la diaspora africaine souhaitant contribuer.",
    champs:[
      {id:'ori',label:"Région d'origine",type:'sel',opts:["Diaspora Afrique Ouest (France, UK, USA)","Diaspora Afrique Est (UK, Canada, Gulf)","Diaspora Afrique Nord (France, Espagne)","Diaspora Afrique Centrale (Belgique, France)","Panafricaine — toutes régions"]},
      {id:'sec',label:'Secteur cible',type:'sel',opts:['Immobilier & Villes nouvelles','Technologie & IA','Agriculture & Agroalimentaire','Santé & Biotechnologies','Culture & Industries créatives','Infrastructure & Énergie']},
      {id:'mnt',label:"Capacité d'investissement",type:'sel',opts:['5 000 – 50 000 USD','50 000 – 500 000 USD','500K – 5M USD','5M+ USD (institutionnel)']},
    ],
    prompt:d=>`Tu es stratège financier de PAN-AFRICA VISION. Construis une stratégie d'investissement pour la ${d.ori}, secteur "${d.sec}", capacité ${d.mnt}.
Inclus :
1. ANALYSE DU POTENTIEL
2. VÉHICULES D'INVESTISSEMENT recommandés
3. PROJETS CONCRETS 2025–2030
4. STRUCTURE JURIDIQUE & FISCALE
5. RENDEMENTS ATTENDUS & RISQUES
6. IMPACT DOUBLE (retour + développement Afrique)
7. COMMENT rejoindre PAN-AFRICA VISION
Ton : professionnel, ambitieux, rassembleur.`
  },
  {
    id:6, ico:'🌾', titre:'Agropole & Food Valley', desc:"Conçoit une zone agro-industrielle intégrée pour nourrir l'Afrique et le monde.",
    champs:[
      {id:'pays',label:'Pays / Zone',type:'sel',opts:["Éthiopie — Vallée du Rift","Nigeria — Middle Belt","Côte d'Ivoire — Centre","Zambie — Copperbelt","Tanzanie — Southern Highlands","Sénégal — Vallée du fleuve"]},
      {id:'fil',label:'Filière prioritaire',type:'sel',opts:['Céréales & Légumineuses','Cacao & Café premium','Élevage & Dairy','Horticulture & Fruits tropicaux','Aquaculture & Pêche']},
      {id:'sup',label:'Zone cultivée',type:'sel',opts:['10 000 ha','100 000 ha','500 000 ha','1 million ha+']},
    ],
    prompt:d=>`Tu es expert agro-industriel de PAN-AFRICA VISION. Conçois une Agropole intégrée en ${d.pays}, filière "${d.fil}", superficie ${d.sup}.
Développe :
1. NOM & CONCEPT
2. MODÈLE DE PRODUCTION (agriculture de précision)
3. INFRASTRUCTURE DE TRANSFORMATION
4. LOGISTIQUE & EXPORT
5. MODÈLE INCLUSIF (coopératives, femmes, jeunesse)
6. MARCHÉS CIBLES
7. IMPACT emplois, PIB, sécurité alimentaire
8. PARTENARIATS TECHNOLOGIQUES & FINANCIERS`
  },
  {
    id:7, ico:'🏥', titre:'Cité Médicale Africaine', desc:'Projette un pôle hospitalier et de recherche médicale de classe mondiale.',
    champs:[
      {id:'pays',label:'Pays hôte',type:'sel',opts:['Sénégal','Rwanda','Kenya','Ghana','Maroc','Cameroun','Nigeria','Éthiopie']},
      {id:'spe',label:'Spécialité principale',type:'sel',opts:['Oncologie & Médecine de précision','Cardiologie & Chirurgie','Pédiatrie & Maternité','Médecine tropicale & Épidémiologie','Neurologie & Neurosciences','Centre Génomique Africain']},
      {id:'cap',label:'Capacité',type:'sel',opts:['500 lits — Hôpital régional','2 000 lits — CHU national','5 000 lits — Pôle continental','Campus médical complet']},
    ],
    prompt:d=>`Tu es directeur médical de PAN-AFRICA VISION. Conçois une Cité Médicale en ${d.pays}, spécialité "${d.spe}", capacité "${d.cap}".
Structure :
1. NOM & SYMBOLE (hommage africain)
2. VISION MÉDICALE
3. ARCHITECTURE DU CAMPUS
4. PROGRAMME MÉDICAL (IA médicale, télémédecine)
5. FORMATION (médecins africains formés/an)
6. ATTRACTIVITÉ (medical tourism)
7. FINANCEMENT
8. IMPACT : réduction fuite médicale`
  },
  {
    id:8, ico:'🌐', titre:'Pitch Deck Projet 2030', desc:'Génère un pitch deck structuré pour présenter votre méga-projet à des investisseurs.',
    champs:[
      {id:'nom',label:'Nom du projet',type:'txt',ph:'Ex: Horizon City, SahelSolar, AfrikaSpace...'},
      {id:'sec',label:'Secteur',type:'sel',opts:['Immobilier & Ville nouvelle','Énergie & Infrastructure','Santé & Médecine','Culture & Tourisme','Agriculture','Technologie & IA','Science & Espace']},
      {id:'pays',label:'Pays',type:'sel',opts:['Nigeria','Kenya','Sénégal',"Côte d'Ivoire",'Égypte','Éthiopie','Rwanda','Afrique du Sud','Ghana','Maroc']},
      {id:'bdg',label:'Budget total',type:'txt',ph:'Ex: 500M USD, 2Mds USD...'},
    ],
    prompt:d=>`Tu es expert en levée de fonds de PAN-AFRICA VISION. Génère un pitch deck pour le projet "${d.nom}", secteur "${d.sec}", pays ${d.pays}, budget ${d.bdg}.
Structure en slides :
SLIDE 1 — ACCROCHE (phrase d'impact)
SLIDE 2 — LE PROBLÈME (contexte africain)
SLIDE 3 — LA SOLUTION (le projet, son unicité)
SLIDE 4 — MARCHÉ ADRESSABLE (TAM/SAM/SOM)
SLIDE 5 — MODÈLE ÉCONOMIQUE (revenus, ROI)
SLIDE 6 — ROADMAP 2025–2035
SLIDE 7 — ÉQUIPE & GOUVERNANCE
SLIDE 8 — IMPACT ESG & ODD
SLIDE 9 — DEMANDE INVESTISSEUR
SLIDE 10 — VISION (phrase finale mémorable)
Ton : percutant, professionnel, adapté à des investisseurs internationaux.`
  },
];

/* ── WIZARD STATE ─────────────────────────────────────── */
let W = {};

/* ── INIT ─────────────────────────────────────────────── */
document.addEventListener('DOMContentLoaded', () => {
  initCursor();
  initNav();
  initReveal();
  dupTicker();
  buildProjets();
  buildOutils();
  initFilters();
  initWizard();
  initContact();
  initCounters();
  initCanvas();
  initRegion();
});

/* ── CURSOR ───────────────────────────────────────────── */
function initCursor(){
  const c=document.querySelector('.cursor'),r=document.querySelector('.cursor-ring');
  if(!c||!r)return;
  let mx=0,my=0,rx=0,ry=0;
  document.addEventListener('mousemove',e=>{mx=e.clientX;my=e.clientY;c.style.left=mx+'px';c.style.top=my+'px'});
  (function a(){rx+=(mx-rx)*.12;ry+=(my-ry)*.12;r.style.left=rx+'px';r.style.top=ry+'px';requestAnimationFrame(a)})();
  document.querySelectorAll('a,button,.ocard,.pcard').forEach(el=>{
    el.addEventListener('mouseenter',()=>{c.style.transform='translate(-50%,-50%) scale(2.2)';c.style.background='#e4aa18';r.style.width='58px';r.style.height='58px'});
    el.addEventListener('mouseleave',()=>{c.style.transform='translate(-50%,-50%) scale(1)';c.style.background='var(--or)';r.style.width='36px';r.style.height='36px'});
  });
}

/* ── NAV ──────────────────────────────────────────────── */
function initNav(){
  const n=document.getElementById('nav');
  if(!n)return;
  const u=()=>window.scrollY>60?n.classList.add('scrolled'):n.classList.remove('scrolled');
  u();window.addEventListener('scroll',u,{passive:true});
}

/* ── REGION ───────────────────────────────────────────── */
function initRegion(){
  document.querySelectorAll('.reg-btn').forEach(b=>{
    b.addEventListener('click',()=>{document.querySelectorAll('.reg-btn').forEach(x=>x.classList.remove('on'));b.classList.add('on')});
  });
}

/* ── REVEAL ───────────────────────────────────────────── */
function initReveal(){
  const ob=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('vis');ob.unobserve(e.target)}}),{threshold:.08});
  document.querySelectorAll('.rv').forEach(el=>ob.observe(el));
}

/* ── TICKER ───────────────────────────────────────────── */
function dupTicker(){const t=document.getElementById('tktrack');if(t)t.innerHTML+=t.innerHTML}

/* ── CANVAS PARTICLES ─────────────────────────────────── */
function initCanvas(){
  const cv=document.getElementById('hcanvas');if(!cv)return;
  const ctx=cv.getContext('2d');
  let W=cv.offsetWidth,H=cv.offsetHeight;
  cv.width=W;cv.height=H;
  const pts=Array.from({length:70},()=>({x:Math.random()*W,y:Math.random()*H,r:Math.random()*1.4+.3,dx:(Math.random()-.5)*.25,dy:(Math.random()-.5)*.25,o:Math.random()*.55+.1}));
  (function d(){ctx.clearRect(0,0,W,H);pts.forEach(p=>{ctx.beginPath();ctx.arc(p.x,p.y,p.r,0,Math.PI*2);ctx.fillStyle=`rgba(200,150,12,${p.o})`;ctx.fill();p.x+=p.dx;p.y+=p.dy;if(p.x<0)p.x=W;if(p.x>W)p.x=0;if(p.y<0)p.y=H;if(p.y>H)p.y=0});requestAnimationFrame(d)})();
  window.addEventListener('resize',()=>{W=cv.offsetWidth;H=cv.offsetHeight;cv.width=W;cv.height=H});
}

/* ── COUNTERS ─────────────────────────────────────────── */
function initCounters(){
  const ob=new IntersectionObserver(es=>es.forEach(e=>{
    if(!e.isIntersecting)return;
    const el=e.target,tg=parseFloat(el.dataset.t);
    let cur=0;const step=tg/(1800/16);
    const t=setInterval(()=>{cur+=step;if(cur>=tg){cur=tg;clearInterval(t)}el.textContent=Math.floor(cur)},16);
    ob.unobserve(el);
  }),{threshold:.5});
  document.querySelectorAll('.stat-n[data-t]').forEach(c=>ob.observe(c));
}

/* ── PROJETS ──────────────────────────────────────────── */
function buildProjets(){
  const g=document.getElementById('pgrid');if(!g)return;
  g.innerHTML='';
  PROJETS.forEach(p=>{
    const d=document.createElement('div');
    d.className='pcard rv'+(p.feat?' feat':'');
    d.dataset.f=p.type;
    d.innerHTML=`
      <div class="pbg" style="background:linear-gradient(135deg,${p.c1} 0%,${p.c2} 100%)">
        <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;font-size:7rem;opacity:.06;user-select:none">${p.ico}</div>
      </div>
      <div class="pov"></div>
      <div class="pcont">
        <div class="pcat">${p.cat}</div>
        <h4>${p.t}</h4>
        <div class="pmeta"><span>📍 ${p.pays}</span><span class="bgt">💰 ${p.budget}</span></div>
        <p class="pdesc">${p.desc}</p>
        <button class="pbtn">Explorer le projet →</button>
      </div>`;
    g.appendChild(d);
  });
  reObserve(g);
}

/* ── OUTILS ───────────────────────────────────────────── */
function buildOutils(){
  const g=document.getElementById('ogrid');if(!g)return;
  g.innerHTML='';
  OUTILS.forEach(o=>{
    const d=document.createElement('div');
    d.className='ocard rv';d.dataset.oid=o.id;
    d.innerHTML=`<span class="oico">${o.ico}</span><h6>${o.titre}</h6><p>${o.desc}</p><span class="oaccess">Accès gratuit · IA Mistral</span>`;
    g.appendChild(d);
  });
  reObserve(g);
}

function reObserve(g){
  const ob=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('vis');ob.unobserve(e.target)}}),{threshold:.08});
  g.querySelectorAll('.rv').forEach(el=>ob.observe(el));
}

/* ── FILTERS ──────────────────────────────────────────── */
function initFilters(){
  document.querySelectorAll('.filt').forEach(b=>{
    b.addEventListener('click',()=>{
      document.querySelectorAll('.filt').forEach(x=>x.classList.remove('on'));b.classList.add('on');
      const f=b.dataset.f;
      document.querySelectorAll('.pcard').forEach(c=>{
        c.classList.toggle('hide',f!=='all'&&c.dataset.f!==f);
      });
    });
  });
  document.addEventListener('click',e=>{
    const oc=e.target.closest('.ocard');if(!oc)return;
    const id=parseInt(oc.dataset.oid);const o=OUTILS.find(x=>x.id===id);if(o)openOutil(o);
  });
}

/* ── OUTIL MODAL ──────────────────────────────────────── */
function openOutil(o){
  document.getElementById('otitle').textContent=o.ico+' '+o.titre;
  const ch=o.champs.map(c=>{
    const ctrl=c.type==='sel'
      ?`<select class="fctrl" id="c_${c.id}">${c.opts.map(x=>`<option style="background:#111">${x}</option>`).join('')}</select>`
      :`<input type="text" class="fctrl" id="c_${c.id}" placeholder="${c.ph||''}">`;
    return `<div class="fgrp"><label style="font-size:.65rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;color:var(--blanc-d);display:block;margin-bottom:6px">${c.label}</label>${ctrl}</div>`;
  }).join('');
  document.getElementById('obody').innerHTML=`
    <p style="color:var(--gris);font-size:.82rem;margin-bottom:22px;line-height:1.7">${o.desc}</p>
    ${ch}
    <button class="btn-or w-100" id="orun" style="justify-content:center"><i class="bi bi-cpu"></i>Générer la vision 2030</button>
    <div id="ores2" class="mt-4"></div>
    <div id="olead2" style="display:none" class="olead">
      <h6>📧 Recevoir le rapport complet PDF</h6>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:9px;margin-bottom:9px">
        <input type="text" class="fctrl" id="oln" placeholder="Votre nom">
        <input type="email" class="fctrl" id="ole" placeholder="Email professionnel">
      </div>
      <button class="btn-or w-100" id="oleadbtn" style="justify-content:center;font-size:.75rem">Recevoir le rapport <i class="bi bi-envelope ms-1"></i></button>
    </div>`;
  document.getElementById('orun').addEventListener('click',()=>runOutil(o));
  new bootstrap.Modal(document.getElementById('moutil')).show();
}

async function runOutil(o){
  const btn=document.getElementById('orun'),res=document.getElementById('ores2');
  const d={};o.champs.forEach(c=>{const el=document.getElementById('c_'+c.id);if(el)d[c.id]=el.value});
  const prompt=o.prompt(d);
  btn.disabled=true;btn.innerHTML='<span class="spinner-border spinner-border-sm me-2"></span>Analyse panafricaine...';
  res.innerHTML='<div style="color:var(--gris);font-size:.8rem;padding:14px 0">🌍 Mistral AI analyse votre projet...</div>';
  try{
    const r=await fetch(PROXY,{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({prompt,outil:o.titre})});
    const j=await r.json();
    if(j.success){res.innerHTML=`<div class="ores">${esc(j.result).replace(/\n/g,'<br>')}</div>`;document.getElementById('olead2').style.display='block';setupLead(o.titre)}
    else res.innerHTML=`<div class="alert alert-warning small">⚠️ ${j.error||'Erreur API'}</div>`;
  }catch{
    res.innerHTML=`<div class="ores"><strong>🌍 Vision préliminaire — ${o.titre}</strong><br><br>PAN-AFRICA VISION a analysé vos paramètres. Ce projet s'inscrit dans les grandes ambitions du continent africain pour 2030.<br><br><em>⚠️ Connectez mistral_proxy.php pour les analyses complètes.</em></div>`;
    document.getElementById('olead2').style.display='block';setupLead(o.titre);
  }
  btn.disabled=false;btn.innerHTML='<i class="bi bi-cpu"></i>Relancer';
}

function setupLead(tit){
  const b=document.getElementById('oleadbtn');if(!b)return;
  b.addEventListener('click',()=>{
    const e=document.getElementById('ole').value;if(!e)return;
    b.innerHTML='⏳ Envoi...';b.disabled=true;
    setTimeout(()=>{b.innerHTML='✅ Rapport envoyé à '+e;saveLead({email:e,source:tit})},1400);
  });
}

/* ── WIZARD ───────────────────────────────────────────── */
function initWizard(){
  document.querySelectorAll('.wch').forEach(b=>{
    b.addEventListener('click',()=>{
      if(b.dataset.ty)W.ty=b.dataset.ty;
      if(b.dataset.py)W.py=b.dataset.py;
      document.querySelectorAll('.wstep').forEach(s=>s.classList.remove('on'));
      document.getElementById(b.dataset.n)?.classList.add('on');
    });
  });
  document.getElementById('wform')?.addEventListener('submit',async e=>{
    e.preventDefault();
    W.nom=e.target.nom.value;W.email=e.target.email.value;W.desc=e.target.desc.value;
    document.querySelectorAll('.wstep').forEach(s=>s.classList.remove('on'));
    document.getElementById('ws4').classList.add('on');
    await runWizard();
  });
}

async function runWizard(){
  const fill=document.getElementById('wfill'),st=document.getElementById('wstatus'),res=document.getElementById('wresult');
  const steps=[[10,'🌍 Analyse du contexte géopolitique...'],[28,'📊 Étude des opportunités régionales...'],[48,'🏗️ Structuration du concept...'],[68,'💡 Recommandations stratégiques...'],[85,'📝 Rédaction de la note de vision...'],[100,'✨ Vision 2030 prête !']];
  for(const[p,m]of steps){fill.style.width=p+'%';st.textContent=m;await sl(700)}
  const prompt=`Tu es stratège visionnaire de PAN-AFRICA VISION. Génère une note de vision complète pour le projet "${W.desc||'grand projet africain'}", type "${W.ty||'développement'}" en ${W.py||'Afrique'}.
Inclus : nom symbolique proposé, vision et impact continental, 3 piliers stratégiques, partenaires potentiels, message final à la diaspora.
Format : synthèse de 250 mots, ton ambitieux, afrocentré, professionnel.`;
  try{
    const r=await fetch(PROXY,{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({prompt,outil:'Wizard-Vision2030'})});
    const j=await r.json();
    res.innerHTML=j.success?esc(j.result).replace(/\n/g,'<br>'):demoWiz();
  }catch{res.innerHTML=demoWiz()}
  res.style.display='block';
  saveLead(W);
}

function demoWiz(){
  return`<strong>🌍 Vision Préliminaire — ${(W.ty||'Projet').toUpperCase()} — ${W.py||'Afrique'}</strong><br><br>Ce projet s'inscrit dans la dynamique de transformation du continent africain à l'horizon 2030.<br><br><strong>Piliers identifiés :</strong><br>— Ancrage territorial fort et appropriation locale<br>— Financement hybride : fonds diaspora + investissement institutionnel<br>— Impact immédiat sur l'emploi qualifié et le transfert de compétences<br><br><em>Connectez mistral_proxy.php pour une analyse complète par Mistral AI.<br>Un associé vous contactera sous 72h à ${W.email||'votre email'}.</em>`;
}

/* ── CONTACT ──────────────────────────────────────────── */
function initContact(){
  document.getElementById('cform')?.addEventListener('submit',async e=>{
    e.preventDefault();
    const btn=document.getElementById('sbmit'),res=document.getElementById('cres');
    btn.disabled=true;btn.innerHTML='<span class="spinner-border spinner-border-sm me-2"></span>Envoi...';
    saveLead(Object.fromEntries(new FormData(e.target)));
    await sl(1200);
    res.innerHTML=`<div style="background:rgba(200,150,12,.08);border:1px solid rgba(200,150,12,.25);color:var(--or);border-radius:3px;padding:15px;font-size:.83rem">✅ <strong>Message reçu !</strong> L'équipe PAN-AFRICA VISION vous répond sous 72h. Réf : PAV-${Date.now().toString(36).toUpperCase()}</div>`;
    e.target.reset();btn.disabled=false;btn.innerHTML='Envoyer ma candidature <i class="bi bi-arrow-right ms-2"></i>';
  });
}

/* ── UTILS ────────────────────────────────────────────── */
const sl=ms=>new Promise(r=>setTimeout(r,ms));
const esc=s=>String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
function saveLead(d){try{const a=JSON.parse(localStorage.getItem('pav')||'[]');a.push({...d,ts:Date.now()});localStorage.setItem('pav',JSON.stringify(a))}catch{}}
</script>
</body>
</html>