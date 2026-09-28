<?php
/*
Template Name: Page Embed
*/
get_header();
$img = get_stylesheet_directory_uri() . '/img';
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@300;500;700;800&family=IBM+Plex+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap">
<style>
:root{
  color-scheme: dark;
  --ground:#0d1112;
  --panel:#151b1c;
  --line:#253031;
  --ink:#e8efee;
  --muted:#8d9d9b;
  --teal:#FF0000;
  --teal-deep:#FF0000;
  --grey:#9aa3a6;
  --display:"Saira Condensed","Arial Narrow",Impact,sans-serif;
  --body:"IBM Plex Sans",system-ui,-apple-system,"Segoe UI",sans-serif;
  --mono:"IBM Plex Mono",ui-monospace,Menlo,Consolas,monospace;
}
*{box-sizing:border-box}
html{background:var(--ground)}
body{margin:0;background:var(--ground);color:var(--ink);font:400 16px/1.65 var(--body);-webkit-font-smoothing:antialiased}
.wrap{max-width:1240px;margin:0 auto;padding-inline:clamp(16px,4vw,48px)}
img{display:block;max-width:100%}
a{color:var(--teal)}
:focus-visible{outline:2px solid var(--teal);outline-offset:3px}

.eyebrow{font:500 12px/1 var(--mono);letter-spacing:.14em;text-transform:uppercase;color:var(--muted)}
.eyebrow b{color:var(--teal);font-weight:500}

/* HERO */
.hero{display:grid;grid-template-columns:1.05fr .95fr;gap:clamp(24px,4vw,64px);align-items:end;padding-block:clamp(32px,6vw,80px) clamp(40px,6vw,72px)}
.hero h1{font:800 clamp(64px,11vw,168px)/.84 var(--display);letter-spacing:-.01em;text-transform:uppercase;margin:18px 0 0}
.hero h1 .sub{display:block;font-weight:300;color:var(--teal);font-size:.46em;letter-spacing:.02em;line-height:1.05;margin-top:.25em}
.hero .lede{max-width:34em;color:#c9d4d2;font-size:clamp(16px,1.4vw,18px);margin:28px 0 0}
.hero figure{margin:0;position:relative}
.hero figure img{width:100%;aspect-ratio:4/5;object-fit:cover;object-position:50% 40%;border-radius:2px}
.hero figcaption{position:absolute;left:0;bottom:0;padding:10px 14px;background:rgba(13,17,18,.78);font:500 11px/1.3 var(--mono);letter-spacing:.1em;text-transform:uppercase;color:var(--ink)}

/* FICHE */
.fiche{display:grid;grid-template-columns:repeat(3,1fr);border-top:1px solid var(--line);border-bottom:1px solid var(--line)}
.fiche div{padding:22px 20px 22px 0}
.fiche div+div{padding-left:20px;border-left:1px solid var(--line)}
.fiche dt{font:500 11px/1 var(--mono);letter-spacing:.14em;text-transform:uppercase;color:var(--muted);margin-bottom:10px}
.fiche dd{margin:0;font:600 clamp(20px,2vw,26px)/1.15 var(--display);letter-spacing:.02em;text-transform:uppercase}

/* AVANT APRES */
.ba{padding-block:clamp(56px,8vw,112px)}
.ba h2,.chap h2,.final h2{overflow-wrap:break-word;hyphens:auto;font:700 clamp(38px,5.2vw,72px)/.92 var(--display);text-transform:uppercase;margin:14px 0 0;text-wrap:balance}
.ba-grid{display:grid;grid-template-columns:1fr 1fr;gap:clamp(8px,1.2vw,16px);margin-top:36px}
.ba-grid figure{margin:0;position:relative;overflow:hidden;background:var(--panel)}
.ba-grid img{width:100%;aspect-ratio:3/4;object-fit:cover}
.ba-grid .avant img{object-position:50% 60%;filter:saturate(.85)}
.tag{position:absolute;top:14px;left:14px;font:500 11px/1 var(--mono);letter-spacing:.14em;text-transform:uppercase;padding:8px 10px;background:var(--ground);color:var(--ink)}
.apres .tag{background:var(--swatch);color:var(--swatch-ink)}
.ba-note{display:grid;grid-template-columns:1fr 1fr;gap:clamp(8px,1.2vw,16px);margin-top:14px;color:var(--muted);font-size:14px}

/* SWATCH strip — the actual build palette */
.palette{display:flex;gap:0;margin-top:40px;border:1px solid var(--line)}
.palette div{flex:1;padding:14px 14px 12px;min-height:92px;display:flex;flex-direction:column;justify-content:flex-end;font:500 11px/1.35 var(--mono);letter-spacing:.08em;text-transform:uppercase}
.sw-grey{background:#a9adaf;color:#16191a}
.sw-teal{background:var(--swatch);color:var(--swatch-ink)}
.sw-carbon{background:linear-gradient(120deg,rgba(255,255,255,.14),rgba(255,255,255,0) 45%),repeating-linear-gradient(45deg,#15181a 0 6px,#2b2f31 6px 12px),#1a1d1e;color:#e8efee}
.sw-black{background:#101213;color:#e8efee}
.palette span{display:block;opacity:.7;margin-bottom:4px}

/* CHAPTERS */
.chap{padding-block:clamp(56px,8vw,104px);border-top:1px solid var(--line)}
.chap-head{display:grid;grid-template-columns:minmax(0,5fr) minmax(0,7fr);gap:clamp(24px,4vw,64px);align-items:start}
.num{font:800 clamp(72px,9vw,128px)/.8 var(--display);color:transparent;-webkit-text-stroke:1.5px var(--teal-deep);display:block}
.date{font:500 12px/1 var(--mono);letter-spacing:.1em;color:var(--teal);text-transform:uppercase;margin-top:18px;display:block}
.chap-head p{margin:0 0 1em;max-width:36em;color:#c9d4d2}
.chap-head ul{margin:0;padding:0;list-style:none;display:grid;gap:8px;max-width:36em}
.chap-head li{display:block;position:relative;padding-left:18px;color:var(--ink);font-size:15px}
.chap-head li::before{content:"";position:absolute;left:0;top:9px;width:8px;height:8px;background:var(--teal)}
.mosaic{display:grid;gap:clamp(6px,.8vw,10px);margin-top:clamp(28px,4vw,48px);grid-template-columns:repeat(12,1fr)}
.mosaic button{all:unset;cursor:zoom-in;position:relative;overflow:hidden;background:var(--panel);display:block}
.mosaic button:focus-visible{outline:2px solid var(--teal);outline-offset:2px}
.mosaic img{width:100%;height:100%;object-fit:cover;transition:transform .5s ease}
.mosaic button:hover img{transform:scale(1.035)}
.mosaic>.c3{grid-column:span 3;aspect-ratio:3/4}
.mosaic>.c4{grid-column:span 4;aspect-ratio:3/4}
.mosaic>.c6{grid-column:span 6;aspect-ratio:4/3}
.mosaic>.c6t{grid-column:span 6;aspect-ratio:3/4}
.mosaic>.c8{grid-column:span 8;aspect-ratio:4/3}
.mosaic>.c4w{grid-column:span 4;aspect-ratio:4/3}

/* FINAL */
.final{padding-block:clamp(64px,9vw,120px);border-top:1px solid var(--line);background:linear-gradient(180deg,var(--ground),#0f1718)}
.final-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:clamp(6px,.8vw,10px);margin-top:40px}
.final-grid>.big{grid-column:span 2;grid-row:span 2;aspect-ratio:auto}
.final-grid>.big img{position:absolute;inset:0}
.final-grid>button:not(.big){grid-column:span 1;aspect-ratio:3/4}
.final-lede{color:#c9d4d2;margin:14px 0 0;max-width:36em}
.final-grid>.s2{grid-column:span 2;aspect-ratio:3/4}
.detail-list{display:grid;grid-template-columns:repeat(3,1fr);gap:0;margin-top:48px;border-top:1px solid var(--line)}
.detail-list div{padding:22px 22px 0 0}
.detail-list div+div{padding-left:22px;border-left:1px solid var(--line)}
.detail-list h3{font:600 22px/1.1 var(--display);text-transform:uppercase;letter-spacing:.03em;margin:0 0 8px;color:var(--teal)}
.detail-list p{margin:0;color:#c9d4d2;font-size:15px}

.cta{padding-block:clamp(56px,8vw,96px);display:flex;flex-wrap:wrap;gap:24px;justify-content:space-between;align-items:end;border-top:1px solid var(--line)}
.cta p{font:700 clamp(32px,4.4vw,56px)/.95 var(--display);text-transform:uppercase;margin:0;max-width:15em;text-wrap:balance}
.cta p span{color:var(--teal)}
.cta small{display:block;color:var(--muted);font:400 15px/1.6 var(--body);text-transform:none;margin-top:14px;max-width:34em}
.credit{padding-block:24px 40px;color:var(--muted);font:400 12px/1.5 var(--mono);letter-spacing:.06em}

/* LIGHTBOX */
.lb{position:fixed;inset:0;z-index:50;background:rgba(6,9,10,.94);display:flex;align-items:center;justify-content:center;padding:calc(env(safe-area-inset-top,0px) + 56px) 16px calc(env(safe-area-inset-bottom,0px) + 56px)}
.lb[hidden]{display:none}
.lb img{max-height:100%;max-width:100%;object-fit:contain}
.lb button{all:unset;cursor:pointer;position:absolute;font:500 12px/1 var(--mono);letter-spacing:.14em;text-transform:uppercase;color:var(--ink);padding:14px 16px;background:rgba(21,27,28,.9)}
.lb button:focus-visible{outline:2px solid var(--teal)}
.lb .x{top:calc(env(safe-area-inset-top,0px) + 8px);right:8px}
.lb .p{left:8px;top:50%;transform:translateY(-50%)}
.lb .n{right:8px;top:50%;transform:translateY(-50%)}
.lb .cap{position:absolute;left:16px;bottom:calc(env(safe-area-inset-bottom,0px) + 18px);right:16px;text-align:center;font:400 13px/1.4 var(--body);color:var(--muted)}

@media (max-width:860px){
  .hero{grid-template-columns:1fr}
  .hero figure{order:-1}
  .hero figure img{aspect-ratio:4/4}
  .fiche{grid-template-columns:1fr}
  .fiche div+div{padding-left:0;border-left:0;border-top:1px solid var(--line)}
  .fiche div{padding-block:16px}
  .chap-head{grid-template-columns:1fr}
  .mosaic>.c3,.mosaic>.c4,.mosaic>.c4w{grid-column:span 6}.mosaic>.c6,.mosaic>.c6t,.mosaic>.c8{grid-column:span 12}
  .final-grid{grid-template-columns:1fr 1fr}
  .final-grid>.big{grid-column:span 2;grid-row:auto;aspect-ratio:3/4}
  .detail-list{grid-template-columns:1fr}
  .detail-list div+div{padding-left:0;border-left:0;border-top:1px solid var(--line);margin-top:22px}
  .palette{flex-wrap:wrap}.palette div{flex:1 1 50%}
}
@media (max-width:520px){
  .ba-grid,.ba-note{grid-template-columns:1fr}
  .ba-grid img{aspect-ratio:4/5}
}
@media (prefers-reduced-motion:reduce){.mosaic img{transition:none}}

/* COLOR CHOICE */
body.orange{--teal:#f37021;--teal-deep:#b4521c;--swatch:#f37021;--swatch-ink:#2a1004}
:root{--swatch:#81d8d0;--swatch-ink:#06231f}
.hero figure img{aspect-ratio:4/3;object-position:45% 60%}
.hero{align-items:center}
.hero h1{font-size:clamp(56px,8.5vw,124px)}
.choose{margin-top:32px;display:grid;gap:14px}
.opts{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;max-width:640px}
.opt{display:grid;align-content:start;gap:10px;padding:8px 8px 12px;border:1px solid var(--line);background:var(--panel);transition:border-color .2s}
.opt img{width:100%;aspect-ratio:4/3;object-fit:cover;object-position:50% 45%}
.opt-t{display:flex;align-items:center;gap:8px;font:600 17px/1.05 var(--display);text-transform:uppercase;letter-spacing:.03em;padding-inline:4px}
.opt-t i{width:14px;height:14px;display:block}
.opt small{font:400 11px/1 var(--mono);letter-spacing:.1em;text-transform:uppercase;color:var(--muted);padding-inline:4px}
.opt.is-on{border-color:var(--teal);box-shadow:inset 0 0 0 1px var(--teal)}
.opt:focus-visible{outline:2px solid var(--teal);outline-offset:3px}
.sim{display:none;margin:0;max-width:34em;font-size:14px;color:var(--muted);border-left:2px solid var(--teal);padding-left:12px}
body.orange .sim{display:block}
.mosaic img,.ba-grid img,.hero img{transition:opacity .25s}
@media (max-width:520px){.opt-sw{aspect-ratio:4/3;display:flex;align-items:flex-end;padding:8px;font:500 10px/1.2 var(--mono);letter-spacing:.1em;text-transform:uppercase}
.sw-or{background:linear-gradient(135deg,#f58a3f,#e2601a 60%,#b9480f);color:#2a1004}
.sw-any{background:conic-gradient(from 200deg,#81d8d0,#3d6fd6,#8a3fd1,#d8404a,#f37021,#f2c230,#81d8d0);color:#0d1112}
.sw-any span,.sw-or span{background:rgba(255,255,255,.75);padding:4px 6px}
.opt-t i.multi{background:conic-gradient(#81d8d0,#3d6fd6,#d8404a,#f37021,#f2c230,#81d8d0)}
@media (max-width:520px){.opts{grid-template-columns:1fr 1fr}.opts .opt:last-child{grid-column:span 2}.opts .opt:last-child .opt-sw{aspect-ratio:8/3}}
.opt small.devis{color:var(--teal);font-weight:500}
</style>


<main style="padding-top:100px">
  <div class="wrap">
    <header class="hero">
      <div>
        
        <h1>Yamaha T-MAX<span class="sub">Édition MANSORY <span class="cn">Bleu Tifany</span></span></h1>
        <p class="lede">Point de départ&nbsp;: un YAMAHA T-MAX de série, coloris Yamaha Ceramic Grey et noir mat. Il est entièrement démonté puis reconstruit dans l'atelier&nbsp;: carrosserie repeinte, habillage carbone brillant à filets assortis, carters moteur personnalisés et sellerie refaite sur mesure.</p>
        <div class="choose">
          <div class="eyebrow">Coloris de l'édition MANSORY</div>
          <div class="opts">
            <div class="opt is-on">
              <img src="<?= $img ?>/ext/tmax-ext-3090.jpg" alt="Le T-MAX édition MANSORY Bleu Tifany terminé">
              <span class="opt-t"><i style="background:#81d8d0"></i>Bleu Tifany</span>
              <small>Réalisé · présenté ici</small>
            </div>
            <div class="opt">
              <div class="opt-sw sw-or"><span>Photos à venir</span></div>
              <span class="opt-t"><i style="background:#f37021"></i>Orange Hermès</span>
              <small>Réalisation en préparation</small>
            </div>
            <div class="opt">
              <div class="opt-sw sw-any"><span>Votre teinte</span></div>
              <span class="opt-t"><i class="multi"></i>Couleur à la demande</span>
              <small>Carbone mat ou brillant</small>
              <small class="devis">Sur devis</small>
            </div>
          </div>
        </div>
      </div>
      <figure>
        <img src="<?= $img ?>/tmax-1311.jpg" alt="Le T-MAX de série, coloris Ceramic Grey et noir mat" fetchpriority="high">
        <figcaption>Le point de départ · Ceramic Grey et noir mat</figcaption>
      </figure>
    </header>

    <dl class="fiche">
      <div><dt>Véhicule</dt><dd>YAMAHA T-MAX 560</dd></div>
      <div><dt>Métiers</dt><dd>Peinture · Carbone · Sellerie</dd></div>
    </dl>

    <section class="ba" id="avant-apres">
      <div class="eyebrow">Avant / après</div>
      <h2>Du Ceramic Grey au <span class="cn">Bleu Tifany</span></h2>
      <div class="ba-grid">
        <figure class="avant"><img src="<?= $img ?>/sm/tmax-1315-crop.jpg" alt="Le T-MAX d'origine Ceramic Grey vu de face"><span class="tag">Avant</span></figure>
        <figure class="apres"><img src="<?= $img ?>/sm/tmax-2886-apres.jpg" alt="Le T-MAX terminé vu de face, bulle haute, Bleu Tifany et carbone brillant"><span class="tag">Après</span></figure>
      </div>
      <div class="ba-note"><span>Arrivée à l'atelier, coloris Yamaha Ceramic Grey et noir mat.</span><span>Terminé, bulle haute montée.</span></div>
      <div class="palette" aria-label="Palette de la transformation">
        <div class="sw-grey"><span>Origine Yamaha</span>Ceramic Grey</div>
        <div class="sw-black"><span>Origine Yamaha</span>Noir mat</div>
        <div class="sw-teal"><span>MANSORY</span><span class="cn">Bleu Tifany</span></div>
        <div class="sw-carbon"><span>MANSORY</span>Carbone brillant</div>
      </div>
    </section>
  </div>

  <section class="chap" id="origine">
    <div class="wrap">
      <div class="chap-head">
        <div><span class="num">01</span><h2>État d'origine</h2></div>
        <div>
          <p>Le scooter arrive en configuration série&nbsp;: carénages Ceramic Grey, parties basses noir mat, sellerie noire. Un tour photo complet sert de référence pour le remontage.</p>
        </div>
      </div>
      <div class="mosaic">
        <button class="c8" data-full="<?= $img ?>/tmax-1311.jpg" data-cap="Le T-MAX à son arrivée, trois-quarts avant"><img loading="lazy" src="<?= $img ?>/sm/tmax-1311.jpg" alt="T-MAX d'origine Ceramic Grey, trois-quarts avant"></button>
        <button class="c4w" data-full="<?= $img ?>/tmax-1319.jpg" data-cap="Profil droit d'origine"><img loading="lazy" src="<?= $img ?>/sm/tmax-1319.jpg" alt="Profil droit d'origine"></button>
      </div>
    </div>
  </section>

  <section class="chap" id="demontage">
    <div class="wrap">
      <div class="chap-head">
        <div><span class="num">02</span><h2>Démontage complet</h2></div>
        <div>
          <p>Chaque vis, agrafe et fixation est photographiée avant dépose. Le scooter est déshabillé jusqu'au cadre et monté sur pont pour libérer toute la carrosserie.</p>
          <ul>
            <li>Dépose des carénages, du tablier et des bas de caisse</li>
            <li>Démontage du masque avant et du bloc optique</li>
            <li>Visserie triée et repérée pour le remontage</li>
          </ul>
        </div>
      </div>
      <div class="mosaic">
        <button class="c4" data-full="<?= $img ?>/tmax-1384.jpg" data-cap="Masque avant avant dépose"><img loading="lazy" src="<?= $img ?>/sm/tmax-1384.jpg" alt="Masque avant avant dépose"></button>
        <button class="c4" data-full="<?= $img ?>/tmax-1387.jpg" data-cap="Optique et faisceau dégagés"><img loading="lazy" src="<?= $img ?>/sm/tmax-1387.jpg" alt="Optique et faisceau dégagés"></button>
        <button class="c4" data-full="<?= $img ?>/tmax-1874.jpg" data-cap="Le T-MAX mis à nu sur le pont"><img loading="lazy" src="<?= $img ?>/sm/tmax-1874.jpg" alt="Le T-MAX mis à nu sur le pont"></button>
        <button class="c3" data-full="<?= $img ?>/tmax-1343.jpg" data-cap="Repérage des fixations"><img loading="lazy" src="<?= $img ?>/sm/tmax-1343.jpg" alt="Repérage des fixations"></button>
        <button class="c3" data-full="<?= $img ?>/tmax-1362.jpg" data-cap="Visserie déposée"><img loading="lazy" src="<?= $img ?>/sm/tmax-1362.jpg" alt="Visserie déposée"></button>
        <button class="c3" data-full="<?= $img ?>/tmax-1389.jpg" data-cap="Dépose des bas de caisse"><img loading="lazy" src="<?= $img ?>/sm/tmax-1389.jpg" alt="Dépose des bas de caisse"></button>
        <button class="c3" data-full="<?= $img ?>/tmax-1872.jpg" data-cap="Cadre et moteur à nu"><img loading="lazy" src="<?= $img ?>/sm/tmax-1872.jpg" alt="Cadre et moteur à nu"></button>
      </div>
    </div>
  </section>

  <section class="chap" id="peinture">
    <div class="wrap">
      <div class="chap-head">
        <div><span class="num">03</span><h2>Préparation et peinture</h2></div>
        <div>
          <p>Les pièces Ceramic Grey sont poncées et préparées avant de passer en cabine. La carrosserie ressort en <span class="cn">Bleu Tifany</span>. Les petites pièces reçoivent un bi-ton noir et <span class="cn">Bleu Tifany</span>&nbsp;: écopes, entourage du contacteur et carters moteur.</p>
          <ul>
            <li>Ponçage et apprêt de toutes les pièces de carrosserie</li>
            <li>Mise en teinte <span class="cn">Bleu Tifany</span></li>
            <li>Carters moteur et écopes en noir avec inserts <span class="cn">Bleu Tifany</span></li>
          </ul>
        </div>
      </div>
      <div class="mosaic">
        <button class="c3" data-full="<?= $img ?>/tmax-1795.jpg" data-cap="Pièce d'origine en préparation"><img loading="lazy" src="<?= $img ?>/sm/tmax-1795.jpg" alt="Pièce d'origine en préparation"></button>
        <button class="c3" data-full="<?= $img ?>/tmax-1802.jpg" data-cap="Ponçage avant apprêt"><img loading="lazy" src="<?= $img ?>/sm/tmax-1802.jpg" alt="Ponçage avant apprêt"></button>
        <button class="c6" data-full="<?= $img ?>/tmax-1837.jpg" data-cap="Carrosserie peinte en Bleu Tifany, au séchage"><img loading="lazy" src="<?= $img ?>/sm/tmax-1837.jpg" alt="Carrosserie Bleu Tifany au séchage"></button>
        <button class="c4" data-full="<?= $img ?>/tmax-1885.jpg" data-cap="Écopes bi-ton noir et Bleu Tifany"><img loading="lazy" src="<?= $img ?>/sm/tmax-1885.jpg" alt="Écopes bi-ton"></button>
        <button class="c4" data-full="<?= $img ?>/tmax-1889.jpg" data-cap="Carter moteur noir à insert Bleu Tifany"><img loading="lazy" src="<?= $img ?>/sm/tmax-1889.jpg" alt="Carter moteur personnalisé"></button>
        <button class="c4" data-full="<?= $img ?>/tmax-1896.jpg" data-cap="Carter remonté sur le moteur"><img loading="lazy" src="<?= $img ?>/sm/tmax-1896.jpg" alt="Carter remonté sur le moteur"></button>
        <button class="c6t" data-full="<?= $img ?>/tmax-1943.jpg" data-cap="Flanc Bleu Tifany"><img loading="lazy" src="<?= $img ?>/sm/tmax-1943.jpg" alt="Flanc Bleu Tifany"></button>
        <button class="c6t" data-full="<?= $img ?>/tmax-1950.jpg" data-cap="Garde-boue avant Bleu Tifany"><img loading="lazy" src="<?= $img ?>/sm/tmax-1950.jpg" alt="Garde-boue avant Bleu Tifany"></button>
      </div>
    </div>
  </section>

  <section class="chap" id="carbone">
    <div class="wrap">
      <div class="chap-head">
        <div><span class="num">04</span><h2>Remontage et carbone</h2></div>
        <div>
          <p>La carrosserie <span class="cn">Bleu Tifany</span> reprend place sur le cadre, puis viennent les pièces en carbone brillant&nbsp;: masque avant, entourages d'optiques, flancs et plancher. Chaque pièce porte des filets <span class="cn">Bleu Tifany</span> qui prolongent les lignes de la carrosserie.</p>
          <ul>
            <li>Remontage des carénages peints</li>
            <li>Masque avant et entourages d'optiques en carbone brillant</li>
            <li>Flancs et plancher carbone brillant à filets <span class="cn">Bleu Tifany</span></li>
          </ul>
        </div>
      </div>
      <div class="mosaic">
        <button class="c4" data-full="<?= $img ?>/tmax-1960.jpg" data-cap="Premier remontage de la carrosserie Bleu Tifany"><img loading="lazy" src="<?= $img ?>/sm/tmax-1960.jpg" alt="Remontage de la carrosserie Bleu Tifany"></button>
        <button class="c4" data-full="<?= $img ?>/tmax-2730.jpg" data-cap="Flanc carbone brillant à filets Bleu Tifany"><img loading="lazy" src="<?= $img ?>/sm/tmax-2730.jpg" alt="Flanc carbone brillant à filets Bleu Tifany"></button>
        <button class="c4" data-full="<?= $img ?>/tmax-2727.jpg" data-cap="Entourage du contacteur en Bleu Tifany"><img loading="lazy" src="<?= $img ?>/sm/tmax-2727.jpg" alt="Entourage du contacteur"></button>
        <button class="c6" data-full="<?= $img ?>/tmax-2767.jpg" data-cap="Plancher carbone brillant en place"><img loading="lazy" src="<?= $img ?>/sm/tmax-2767.jpg" alt="Plancher carbone brillant en place"></button>
        <button class="c6" data-full="<?= $img ?>/tmax-2788.jpg" data-cap="Le T-MAX remonté sur le pont"><img loading="lazy" src="<?= $img ?>/sm/tmax-2788.jpg" alt="Le T-MAX remonté sur le pont"></button>
        <button class="c3" data-full="<?= $img ?>/tmax-2777.jpg" data-cap="Masque avant carbone brillant et entourages d'optiques"><img loading="lazy" src="<?= $img ?>/sm/tmax-2777.jpg" alt="Masque avant carbone brillant"></button>
        <button class="c3" data-full="<?= $img ?>/tmax-2750.jpg" data-cap="Faisceau et platine avant avant fermeture"><img loading="lazy" src="<?= $img ?>/sm/tmax-2750.jpg" alt="Platine avant"></button>
        <button class="c3" data-full="<?= $img ?>/tmax-2782.jpg" data-cap="Face avant habillée"><img loading="lazy" src="<?= $img ?>/sm/tmax-2782.jpg" alt="Face avant habillée"></button>
        <button class="c3" data-full="<?= $img ?>/tmax-2795.jpg" data-cap="Tablier et bas de caisse à filets"><img loading="lazy" src="<?= $img ?>/sm/tmax-2795.jpg" alt="Tablier et bas de caisse"></button>
      </div>
    </div>
  </section>

  <section class="chap" id="sellerie">
    <div class="wrap">
      <div class="chap-head">
        <div><span class="num">05</span><h2>Sellerie sur mesure</h2></div>
        <div>
          <p>La selle noire d'origine est entièrement dégarnie puis recouverte en bi-ton <span class="cn">Bleu Tifany</span> et noir. Le dosseret reçoit une surpiqûre losange, l'assise une bande centrale texturée et la signature MANSORY brodée.</p>
          <ul>
            <li>Dégarnissage complet de la selle et du dosseret</li>
            <li>Garnissage bi-ton, surpiqûres losange</li>
            <li>Broderie MANSORY sur le haut de l'assise</li>
          </ul>
        </div>
      </div>
      <div class="mosaic">
        <button class="c4" data-full="<?= $img ?>/tmax-2822.jpg" data-cap="Selle d'origine"><img loading="lazy" src="<?= $img ?>/sm/tmax-2822.jpg" alt="Selle noire d'origine"></button>
        <button class="c4" data-full="<?= $img ?>/tmax-2841.jpg" data-cap="Selle dégarnie"><img loading="lazy" src="<?= $img ?>/sm/tmax-2841.jpg" alt="Selle dégarnie"></button>
        <button class="c4" data-full="<?= $img ?>/tmax-2844.jpg" data-cap="Nouveau garnissage Bleu Tifany et noir"><img loading="lazy" src="<?= $img ?>/sm/tmax-2844.jpg" alt="Nouveau garnissage"></button>
        <button class="c6" data-full="<?= $img ?>/tmax-2847.jpg" data-cap="Assise terminée, surpiqûres losange"><img loading="lazy" src="<?= $img ?>/sm/tmax-2847.jpg" alt="Assise terminée"></button>
        <button class="c3" data-full="<?= $img ?>/tmax-2833.jpg" data-cap="Dosseret surpiqué losange"><img loading="lazy" src="<?= $img ?>/sm/tmax-2833.jpg" alt="Dosseret surpiqué"></button>
        <button class="c3" data-full="<?= $img ?>/tmax-2855.jpg" data-cap="Broderie MANSORY"><img loading="lazy" src="<?= $img ?>/sm/tmax-2855.jpg" alt="Broderie sur la selle"></button>
      </div>
    </div>
  </section>

  <section class="final" id="resultat">
    <div class="wrap">
      <div class="eyebrow">Le résultat</div>
      <h2>Sortie d'atelier</h2>
      <p class="final-lede">Le T-MAX terminé, photographié en extérieur devant l'atelier.</p>
      <div class="final-grid mosaic">
        <button class="big" data-full="<?= $img ?>/ext/tmax-ext-3097.jpg" data-cap="Profil devant l'atelier"><img loading="lazy" src="<?= $img ?>/ext/tmax-ext-3097.jpg" alt="Profil devant l'atelier"></button>
        <button data-full="<?= $img ?>/ext/tmax-ext-3079.jpg" data-cap="Face avant, bulle haute"><img loading="lazy" src="<?= $img ?>/ext/tmax-ext-3079.jpg" alt="Face avant, bulle haute"></button>
        <button data-full="<?= $img ?>/ext/tmax-ext-3066.jpg" data-cap="Devant l'atelier"><img loading="lazy" src="<?= $img ?>/ext/tmax-ext-3066.jpg" alt="Devant l'atelier"></button>
        <button data-full="<?= $img ?>/ext/tmax-ext-3087.jpg" data-cap="Trois-quarts avant sous l'auvent"><img loading="lazy" src="<?= $img ?>/ext/tmax-ext-3087.jpg" alt="Trois-quarts avant sous l'auvent"></button>
        <button data-full="<?= $img ?>/ext/tmax-ext-3090.jpg" data-cap="Trois-quarts avant, carbone et Bleu Tifany"><img loading="lazy" src="<?= $img ?>/ext/tmax-ext-3090.jpg" alt="Trois-quarts avant, carbone et Bleu Tifany"></button>
        <button data-full="<?= $img ?>/ext/tmax-ext-3072.jpg" data-cap="Profil droit"><img loading="lazy" src="<?= $img ?>/ext/tmax-ext-3072.jpg" alt="Profil droit"></button>
        <button data-full="<?= $img ?>/ext/tmax-ext-3074.jpg" data-cap="Trois-quarts arrière"><img loading="lazy" src="<?= $img ?>/ext/tmax-ext-3074.jpg" alt="Trois-quarts arrière"></button>
        <button data-full="<?= $img ?>/ext/tmax-ext-3095.jpg" data-cap="Profil gauche"><img loading="lazy" src="<?= $img ?>/ext/tmax-ext-3095.jpg" alt="Profil gauche"></button>
        <button data-full="<?= $img ?>/ext/tmax-ext-3083.jpg" data-cap="Flanc et plancher carbone"><img loading="lazy" src="<?= $img ?>/ext/tmax-ext-3083.jpg" alt="Flanc et plancher carbone"></button>
        <button data-full="<?= $img ?>/ext/tmax-ext-3077.jpg" data-cap="Trois-quarts avant en lumière naturelle"><img loading="lazy" src="<?= $img ?>/ext/tmax-ext-3077.jpg" alt="Trois-quarts avant en lumière naturelle"></button>
        <button data-full="<?= $img ?>/ext/tmax-ext-3084.jpg" data-cap="Vue basse, trois-quarts avant"><img loading="lazy" src="<?= $img ?>/ext/tmax-ext-3084.jpg" alt="Vue basse, trois-quarts avant"></button>
        <button data-full="<?= $img ?>/tmax-2872.jpg" data-cap="Masque avant carbone brillant, logo MANSORY"><img loading="lazy" src="<?= $img ?>/sm/tmax-2872.jpg" alt="Masque avant carbone brillant, logo MANSORY"></button>
        <button data-full="<?= $img ?>/ext/tmax-ext-3075.jpg" data-cap="Vue arrière"><img loading="lazy" src="<?= $img ?>/ext/tmax-ext-3075.jpg" alt="Vue arrière"></button>
      </div>
      <div class="detail-list">
        <div><h3>Peinture</h3><p>Carrosserie complète en <span class="cn">Bleu Tifany</span>, petites pièces en bi-ton noir et <span class="cn">Bleu Tifany</span>.</p></div>
        <div><h3>Carbone brillant</h3><p>Masque avant, entourages d'optiques, flancs et plancher à filets <span class="cn">Bleu Tifany</span>.</p></div>
        <div><h3>Sellerie</h3><p>Selle et dosseret regarnis, surpiqûres losange et broderie MANSORY.</p></div>
      </div>
    </div>
  </section>

  <div class="wrap">
    <div class="cta">
      <p>Un projet de <span>personnalisation</span>&nbsp;?<small>Peinture, carbone, sellerie&nbsp;: chaque véhicule est traité de A à Z dans notre atelier. Contactez-nous pour en parler.</small></p>
    </div>
    <div class="credit">Photos prises en atelier pendant le chantier · Yamaha et T-MAX sont des marques de Yamaha Motor · MANSORY est une marque de son propriétaire.</div>
  </div>
</main>

<div class="lb" id="lb" hidden role="dialog" aria-modal="true" aria-label="Photo agrandie">
  <img id="lb-img" alt="">
  <button class="x" id="lb-x">Fermer</button>
  <button class="p" id="lb-p" aria-label="Photo précédente">←</button>
  <button class="n" id="lb-n" aria-label="Photo suivante">→</button>
  <div class="cap" id="lb-cap"></div>
</div>

<script>
(function(){
  var items=[].slice.call(document.querySelectorAll('button[data-full]'));
  var lb=document.getElementById('lb'),img=document.getElementById('lb-img'),cap=document.getElementById('lb-cap'),i=0,last=null;
  function show(k){i=(k+items.length)%items.length;var b=items[i];img.src=b.dataset.full;img.alt=b.querySelector('img').alt;cap.textContent=b.dataset.cap+'  ·  '+(i+1)+' / '+items.length;}
  function open(k){last=document.activeElement;show(k);lb.hidden=false;document.body.style.overflow='hidden';document.getElementById('lb-x').focus();}
  function close(){lb.hidden=true;document.body.style.overflow='';if(last)last.focus();}
  items.forEach(function(b,k){b.addEventListener('click',function(){open(k)})});
  document.getElementById('lb-x').onclick=close;
  document.getElementById('lb-p').onclick=function(){show(i-1)};
  document.getElementById('lb-n').onclick=function(){show(i+1)};
  lb.addEventListener('click',function(e){if(e.target===lb)close()});
  document.addEventListener('keydown',function(e){if(lb.hidden)return;if(e.key==='Escape')close();if(e.key==='ArrowLeft')show(i-1);if(e.key==='ArrowRight')show(i+1);});
})();
</script>



<?php
get_footer();
