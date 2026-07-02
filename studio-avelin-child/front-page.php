<?php
/**
 * Studio Avelin Front Page
 */

$sa_portrait_url = esc_url(get_stylesheet_directory_uri() . '/assets/img/portrait.jpg');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class('sa-front-page'); ?>>
<?php wp_body_open(); ?>

<header class="sa-front-header" aria-label="Studio Avelin homepage navigation">
  <div class="sa-front-header__inner">
    <a class="sa-front-brand" href="/" aria-label="Studio Avelin home">Studio Avelin</a>

    <nav class="sa-front-nav" aria-label="Primary navigation">
      <a href="#work">Work</a>
      <a href="/about-me/">About</a>
      <a href="/experiments/">Experiments</a>
      <a href="/journal/">Journal</a>
      <a href="#say-hello">Say Hello</a>
    </nav>

    <a class="sa-front-header__hello" href="#say-hello">Hello</a>
  </div>
</header>

<main id="primary" class="sa-front">
  <section id="top" class="sa-front-hero" aria-label="Introduction">
    <div class="sa-front-grid" aria-hidden="true"></div>
    <div class="sa-front__inner sa-front-hero__inner">
      <div class="sa-front-hero__content">
        <p class="sa-front-eyebrow sa-front-eyebrow--line" data-sa-reveal>Personal Studio &middot; Est. 2025</p>
        <p class="sa-front-kicker" data-sa-reveal>Design. Code. Create.</p>
        <h1 data-sa-reveal>
          Simple digital things.<br>
          Made with <span class="sa-front-highlight">care</span>.
        </h1>
        <div class="sa-front-hero__bottom" data-sa-reveal>
          <p>
            A personal space for small apps, visual ideas, experiments and notes on design, code and creative process.
          </p>
          <div class="sa-front-actions" aria-label="Intro actions">
            <a class="sa-front-button" href="#work">
              View Work
              <span aria-hidden="true">-&gt;</span>
            </a>
            <a class="sa-front-link" href="#say-hello">
              Say Hello
              <span aria-hidden="true">-&gt;</span>
            </a>
          </div>
        </div>
      </div>

      <div class="sa-front-scroll" aria-hidden="true">
        <span>Scroll</span>
        <span class="sa-front-scroll__line"></span>
      </div>
    </div>
  </section>

  <section id="work" class="sa-front-section sa-front-work" aria-labelledby="sa-work-title">
    <div class="sa-front__inner">
      <header class="sa-front-section-header" data-sa-reveal>
        <p class="sa-front-eyebrow">Selected Work</p>
        <h2 id="sa-work-title">A focused, growing collection.</h2>
        <p>
          Personal projects under the Studio Avelin umbrella. Small, useful, made with care.
        </p>
      </header>

      <ul class="sa-project-list" aria-label="Selected Studio Avelin projects">
        <li class="sa-project-item" data-sa-reveal>
          <a class="sa-project-card" href="/work/stan/" aria-label="STAN, Studio Avelin Notes">
            <div class="sa-project-card__visual" aria-hidden="true">
              <span class="sa-corner sa-corner--top"></span>
              <span class="sa-corner sa-corner--bottom"></span>
              <div class="sa-project-frame">
                <svg class="sa-project-svg" viewBox="0 0 800 450" role="img" aria-label="STAN notes app interface preview" preserveAspectRatio="xMidYMid meet">
                  <rect width="800" height="450" fill="var(--color-card)" />
                  <rect x="0" y="0" width="200" height="450" fill="var(--color-background)" />
                  <line x1="200" y1="0" x2="200" y2="450" stroke="currentColor" stroke-opacity="0.08" />
                  <g fill="currentColor">
                    <rect x="24" y="40" width="80" height="8" rx="1.5" fill-opacity="0.7" />
                    <rect x="24" y="78" width="140" height="5" rx="1" fill-opacity="0.18" />
                    <rect x="24" y="96" width="120" height="5" rx="1" fill-opacity="0.18" />
                    <rect x="24" y="114" width="150" height="5" rx="1" fill-opacity="0.18" />
                    <rect x="24" y="132" width="100" height="5" rx="1" fill-opacity="0.18" />
                  </g>
                  <rect x="16" y="156" width="172" height="22" fill="currentColor" fill-opacity="0.05" />
                  <rect x="24" y="165" width="6" height="6" fill="var(--color-accent)" />
                  <rect x="38" y="166" width="120" height="4" fill="currentColor" fill-opacity="0.55" />
                  <g fill="currentColor" fill-opacity="0.18">
                    <rect x="24" y="200" width="130" height="5" rx="1" />
                    <rect x="24" y="218" width="110" height="5" rx="1" />
                    <rect x="24" y="236" width="140" height="5" rx="1" />
                  </g>
                  <g transform="translate(240, 60)">
                    <rect width="240" height="14" rx="1" fill="currentColor" fill-opacity="0.85" />
                    <rect y="34" width="500" height="5" rx="1" fill="currentColor" fill-opacity="0.18" />
                    <rect y="48" width="460" height="5" rx="1" fill="currentColor" fill-opacity="0.18" />
                    <rect y="62" width="480" height="5" rx="1" fill="currentColor" fill-opacity="0.18" />
                    <rect y="76" width="300" height="5" rx="1" fill="currentColor" fill-opacity="0.18" />
                    <g transform="translate(0, 120)">
                      <g transform="translate(0, 0)">
                        <rect width="14" height="14" fill="none" stroke="currentColor" stroke-opacity="0.35" />
                        <rect x="22" y="4" width="260" height="6" fill="currentColor" fill-opacity="0.28" />
                      </g>
                      <g transform="translate(0, 30)">
                        <rect width="14" height="14" fill="none" stroke="currentColor" stroke-opacity="0.35" />
                        <rect x="22" y="4" width="220" height="6" fill="currentColor" fill-opacity="0.28" />
                      </g>
                      <g transform="translate(0, 60)">
                        <rect width="14" height="14" fill="none" stroke="currentColor" stroke-opacity="0.35" />
                        <rect x="22" y="4" width="190" height="6" fill="currentColor" fill-opacity="0.28" />
                      </g>
                      <g transform="translate(0, 90)">
                        <rect width="14" height="14" fill="var(--color-accent)" />
                        <path d="M3 7 L6 10 L11 4" stroke="var(--foreground)" stroke-width="1.5" fill="none" />
                        <rect x="22" y="4" width="180" height="6" fill="currentColor" fill-opacity="0.2" />
                      </g>
                    </g>
                  </g>
                </svg>
                <span class="sa-project-frame__label">STAN &middot; Preview</span>
              </div>
            </div>
            <div class="sa-project-card__body">
              <span class="sa-project-card__number">01</span>
              <div>
                <h3>STAN</h3>
                <p class="sa-project-card__name">Studio Avelin Notes</p>
                <p class="sa-status sa-status--live"><span aria-hidden="true"></span>Live</p>
                <p class="sa-project-card__text">A focused notes app for ideas, tasks and creative projects.</p>
                <span class="sa-project-card__more">Read more <span aria-hidden="true">-&gt;</span></span>
              </div>
            </div>
          </a>
        </li>

        <li class="sa-project-item" data-sa-reveal>
          <a class="sa-project-card sa-project-card--reverse" href="/work/stat/" aria-label="StAT, Studio Avelin Training">
            <div class="sa-project-card__visual" aria-hidden="true">
              <span class="sa-corner sa-corner--top"></span>
              <span class="sa-corner sa-corner--bottom"></span>
              <div class="sa-project-frame">
                <svg class="sa-project-svg" viewBox="0 0 800 450" role="img" aria-label="StAT training app interface preview" preserveAspectRatio="xMidYMid meet">
                  <rect width="800" height="450" fill="var(--color-card)" />
                  <g transform="translate(48, 50)">
                    <rect width="58" height="6" fill="currentColor" fill-opacity="0.75" />
                    <rect x="80" width="42" height="6" fill="currentColor" fill-opacity="0.18" />
                    <rect x="142" width="42" height="6" fill="currentColor" fill-opacity="0.18" />
                  </g>
                  <g transform="translate(48, 100)">
                    <line x1="0" y1="120" x2="600" y2="120" stroke="currentColor" stroke-opacity="0.12" />
                    <line x1="0" y1="80" x2="600" y2="80" stroke="currentColor" stroke-opacity="0.06" />
                    <line x1="0" y1="40" x2="600" y2="40" stroke="currentColor" stroke-opacity="0.06" />
                    <polyline fill="none" stroke="currentColor" stroke-opacity="0.6" stroke-width="1.5" points="0,95 80,72 160,85 240,55 320,60 400,32 480,40 560,18" />
                    <circle cx="560" cy="18" r="4" fill="var(--color-accent)" />
                    <circle cx="560" cy="18" r="9" fill="var(--color-accent)" fill-opacity="0.25" />
                  </g>
                  <g transform="translate(48, 270)">
                    <g transform="translate(0, 0)">
                      <rect width="120" height="5" fill="currentColor" fill-opacity="0.55" />
                      <rect y="12" width="600" height="8" fill="currentColor" fill-opacity="0.07" />
                      <rect y="12" width="460" height="8" fill="var(--color-accent)" />
                    </g>
                    <g transform="translate(0, 38)">
                      <rect width="100" height="5" fill="currentColor" fill-opacity="0.55" />
                      <rect y="12" width="600" height="8" fill="currentColor" fill-opacity="0.07" />
                      <rect y="12" width="360" height="8" fill="currentColor" fill-opacity="0.32" />
                    </g>
                    <g transform="translate(0, 76)">
                      <rect width="110" height="5" fill="currentColor" fill-opacity="0.55" />
                      <rect y="12" width="600" height="8" fill="currentColor" fill-opacity="0.07" />
                      <rect y="12" width="280" height="8" fill="currentColor" fill-opacity="0.32" />
                    </g>
                    <g transform="translate(0, 114)">
                      <rect width="90" height="5" fill="currentColor" fill-opacity="0.55" />
                      <rect y="12" width="600" height="8" fill="currentColor" fill-opacity="0.07" />
                      <rect y="12" width="200" height="8" fill="currentColor" fill-opacity="0.32" />
                    </g>
                  </g>
                </svg>
                <span class="sa-project-frame__label">StAT &middot; Preview</span>
              </div>
            </div>
            <div class="sa-project-card__body">
              <span class="sa-project-card__number">02</span>
              <div>
                <h3>StAT</h3>
                <p class="sa-project-card__name">Studio Avelin Training</p>
                <p class="sa-status"><span aria-hidden="true"></span>In Development</p>
                <p class="sa-project-card__text">A clean training app for planning, tracking and reviewing workouts.</p>
                <span class="sa-project-card__more">Read more <span aria-hidden="true">-&gt;</span></span>
              </div>
            </div>
          </a>
        </li>

        <li class="sa-project-item" data-sa-reveal>
          <a class="sa-project-card" href="/work/stau/" aria-label="StAU, Studio Avelin Urlaubsplaner">
            <div class="sa-project-card__visual" aria-hidden="true">
              <span class="sa-corner sa-corner--top"></span>
              <span class="sa-corner sa-corner--bottom"></span>
              <div class="sa-project-frame">
                <svg class="sa-project-svg" viewBox="0 0 800 450" role="img" aria-label="StAU vacation planner interface preview" preserveAspectRatio="xMidYMid meet">
                  <rect width="800" height="450" fill="var(--color-card)" />
                  <g transform="translate(48, 44)">
                    <rect width="160" height="11" fill="currentColor" fill-opacity="0.82" />
                    <rect y="22" width="92" height="5" fill="currentColor" fill-opacity="0.32" />
                    <g transform="translate(560, 0)">
                      <rect width="56" height="6" fill="currentColor" fill-opacity="0.22" />
                      <rect x="68" width="56" height="6" fill="currentColor" fill-opacity="0.22" />
                      <rect x="136" y="-2" width="56" height="10" fill="var(--color-accent)" />
                    </g>
                  </g>
                  <g transform="translate(48, 92)">
                    <rect width="704" height="160" fill="var(--color-background)" />
                    <rect width="704" height="160" fill="none" stroke="currentColor" stroke-opacity="0.1" />
                    <g stroke="currentColor" stroke-opacity="0.06">
                      <line x1="0" y1="0" x2="0" y2="160" />
                      <line x1="64" y1="0" x2="64" y2="160" />
                      <line x1="128" y1="0" x2="128" y2="160" />
                      <line x1="192" y1="0" x2="192" y2="160" />
                      <line x1="256" y1="0" x2="256" y2="160" />
                      <line x1="320" y1="0" x2="320" y2="160" />
                      <line x1="384" y1="0" x2="384" y2="160" />
                      <line x1="448" y1="0" x2="448" y2="160" />
                      <line x1="512" y1="0" x2="512" y2="160" />
                      <line x1="576" y1="0" x2="576" y2="160" />
                      <line x1="640" y1="0" x2="640" y2="160" />
                      <line x1="0" y1="0" x2="704" y2="0" />
                      <line x1="0" y1="40" x2="704" y2="40" />
                      <line x1="0" y1="80" x2="704" y2="80" />
                      <line x1="0" y1="120" x2="704" y2="120" />
                      <line x1="0" y1="160" x2="704" y2="160" />
                    </g>
                    <path d="M0 96 C 70 80, 140 110, 210 92 S 350 70, 430 100 S 580 130, 704 104" fill="none" stroke="currentColor" stroke-opacity="0.18" stroke-width="1" />
                    <path d="M90 168 Q152.5 110, 215 132 Q273.5 110, 332 188 Q393.5 120, 455 142 Q511.5 120, 568 198" fill="none" stroke="currentColor" stroke-opacity="0.55" stroke-width="1.25" stroke-dasharray="3 4" />
                    <g transform="translate(90, 168)">
                      <circle r="2.4" fill="currentColor" fill-opacity="0.75" />
                      <rect x="8" y="-3" width="25.2" height="5" fill="currentColor" fill-opacity="0.55" />
                    </g>
                    <g transform="translate(215, 132)">
                      <circle r="2.4" fill="currentColor" fill-opacity="0.75" />
                      <rect x="8" y="-3" width="21" height="5" fill="currentColor" fill-opacity="0.55" />
                    </g>
                    <g transform="translate(332, 188)">
                      <circle r="9" fill="var(--color-accent)" fill-opacity="0.25" />
                      <circle r="3.6" fill="var(--color-accent)" />
                      <rect x="8" y="-3" width="29.4" height="5" fill="currentColor" fill-opacity="0.55" />
                    </g>
                    <g transform="translate(455, 142)">
                      <circle r="2.4" fill="currentColor" fill-opacity="0.75" />
                      <rect x="8" y="-3" width="29.4" height="5" fill="currentColor" fill-opacity="0.55" />
                    </g>
                    <g transform="translate(568, 198)">
                      <circle r="2.4" fill="currentColor" fill-opacity="0.75" />
                      <rect x="8" y="-3" width="25.2" height="5" fill="currentColor" fill-opacity="0.55" />
                    </g>
                  </g>
                  <g transform="translate(48, 276)">
                    <g transform="translate(0, 0)">
                      <rect width="164" height="138" fill="var(--color-background)" stroke="currentColor" stroke-opacity="0.1" />
                      <rect x="10" y="10" width="144" height="64" fill="currentColor" fill-opacity="0.08" />
                      <line x1="10" y1="74" x2="154" y2="10" stroke="currentColor" stroke-opacity="0.12" />
                      <line x1="10" y1="10" x2="154" y2="74" stroke="currentColor" stroke-opacity="0.12" />
                      <rect x="10" y="84" width="34" height="4" fill="currentColor" fill-opacity="0.7" />
                      <rect x="10" y="96" width="96" height="6" fill="currentColor" fill-opacity="0.55" />
                      <rect x="10" y="112" width="120" height="3" fill="currentColor" fill-opacity="0.2" />
                      <rect x="10" y="120" width="96" height="3" fill="currentColor" fill-opacity="0.2" />
                    </g>
                    <g transform="translate(180, 0)">
                      <rect width="164" height="138" fill="var(--color-background)" stroke="currentColor" stroke-opacity="0.1" />
                      <rect x="10" y="10" width="144" height="64" fill="currentColor" fill-opacity="0.08" />
                      <line x1="10" y1="74" x2="154" y2="10" stroke="currentColor" stroke-opacity="0.12" />
                      <line x1="10" y1="10" x2="154" y2="74" stroke="currentColor" stroke-opacity="0.12" />
                      <rect x="10" y="84" width="34" height="4" fill="currentColor" fill-opacity="0.7" />
                      <rect x="10" y="96" width="78" height="6" fill="currentColor" fill-opacity="0.55" />
                      <rect x="10" y="112" width="120" height="3" fill="currentColor" fill-opacity="0.2" />
                      <rect x="10" y="120" width="96" height="3" fill="currentColor" fill-opacity="0.2" />
                      <rect x="144" y="84" width="10" height="10" fill="var(--color-accent)" />
                    </g>
                    <g transform="translate(360, 0)">
                      <rect width="164" height="138" fill="var(--color-background)" stroke="currentColor" stroke-opacity="0.1" />
                      <rect x="10" y="10" width="144" height="64" fill="currentColor" fill-opacity="0.08" />
                      <line x1="10" y1="74" x2="154" y2="10" stroke="currentColor" stroke-opacity="0.12" />
                      <line x1="10" y1="10" x2="154" y2="74" stroke="currentColor" stroke-opacity="0.12" />
                      <rect x="10" y="84" width="34" height="4" fill="currentColor" fill-opacity="0.7" />
                      <rect x="10" y="96" width="110" height="6" fill="currentColor" fill-opacity="0.55" />
                      <rect x="10" y="112" width="120" height="3" fill="currentColor" fill-opacity="0.2" />
                      <rect x="10" y="120" width="96" height="3" fill="currentColor" fill-opacity="0.2" />
                    </g>
                    <g transform="translate(540, 0)">
                      <rect width="164" height="138" fill="var(--color-background)" stroke="currentColor" stroke-opacity="0.1" />
                      <rect x="10" y="10" width="144" height="64" fill="currentColor" fill-opacity="0.08" />
                      <line x1="10" y1="74" x2="154" y2="10" stroke="currentColor" stroke-opacity="0.12" />
                      <line x1="10" y1="10" x2="154" y2="74" stroke="currentColor" stroke-opacity="0.12" />
                      <rect x="10" y="84" width="34" height="4" fill="currentColor" fill-opacity="0.7" />
                      <rect x="10" y="96" width="86" height="6" fill="currentColor" fill-opacity="0.55" />
                      <rect x="10" y="112" width="120" height="3" fill="currentColor" fill-opacity="0.2" />
                      <rect x="10" y="120" width="96" height="3" fill="currentColor" fill-opacity="0.2" />
                    </g>
                  </g>
                </svg>
                <span class="sa-project-frame__label">StAU &middot; Preview</span>
              </div>
            </div>
            <div class="sa-project-card__body">
              <span class="sa-project-card__number">03</span>
              <div>
                <h3>StAU</h3>
                <p class="sa-project-card__name">Studio Avelin Urlaubsplaner</p>
                <p class="sa-status"><span aria-hidden="true"></span>Concept</p>
                <p class="sa-project-card__text">A small, calm vacation and time-off planner.</p>
                <span class="sa-project-card__more">Read more <span aria-hidden="true">-&gt;</span></span>
              </div>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </section>

  <section id="about" class="sa-front-section sa-front-about" aria-labelledby="sa-about-title">
    <div class="sa-front__inner sa-front-about__grid">
      <div class="sa-front-about__media" data-sa-reveal>
        <figure class="sa-front-portrait">
          <img src="<?php echo $sa_portrait_url; ?>" alt="Portrait of Michael, the person behind Studio Avelin" width="1024" height="1024" loading="lazy">
        </figure>
        <div class="sa-about-mark" aria-hidden="true">
          <svg viewBox="0 0 200 200" role="img" aria-label="Studio Avelin abstract mark">
            <g stroke="currentColor" stroke-opacity="0.12">
              <line x1="20" y1="20" x2="20" y2="180" />
              <line x1="40" y1="20" x2="40" y2="180" />
              <line x1="60" y1="20" x2="60" y2="180" />
              <line x1="80" y1="20" x2="80" y2="180" />
              <line x1="100" y1="20" x2="100" y2="180" />
              <line x1="120" y1="20" x2="120" y2="180" />
              <line x1="140" y1="20" x2="140" y2="180" />
              <line x1="160" y1="20" x2="160" y2="180" />
              <line x1="180" y1="20" x2="180" y2="180" />
              <line x1="20" y1="20" x2="180" y2="20" />
              <line x1="20" y1="40" x2="180" y2="40" />
              <line x1="20" y1="60" x2="180" y2="60" />
              <line x1="20" y1="80" x2="180" y2="80" />
              <line x1="20" y1="100" x2="180" y2="100" />
              <line x1="20" y1="120" x2="180" y2="120" />
              <line x1="20" y1="140" x2="180" y2="140" />
              <line x1="20" y1="160" x2="180" y2="160" />
              <line x1="20" y1="180" x2="180" y2="180" />
            </g>
            <path d="M30 150 Q 100 30 170 150" fill="none" stroke="currentColor" stroke-opacity="0.55" stroke-width="1" />
            <circle cx="100" cy="100" r="44" fill="none" stroke="currentColor" stroke-opacity="0.35" />
            <line x1="100" y1="56" x2="100" y2="44" stroke="currentColor" stroke-opacity="0.5" />
            <line x1="100" y1="156" x2="100" y2="168" stroke="currentColor" stroke-opacity="0.5" />
            <circle cx="144" cy="68" r="4" fill="var(--color-accent)" />
            <circle cx="144" cy="68" r="10" fill="var(--color-accent)" fill-opacity="0.18" />
            <line x1="20" y1="180" x2="180" y2="180" stroke="currentColor" stroke-opacity="0.25" />
          </svg>
        </div>
      </div>

      <div class="sa-front-about__text" data-sa-reveal>
        <p class="sa-front-eyebrow">About</p>
        <h2 id="sa-about-title">
          Studio Avelin is my personal space for designing, building and exploring ideas, from small web apps to visual experiments and written notes.
        </h2>
        <a class="sa-front-link" href="/about-me/">
          More About Me
          <span aria-hidden="true">-&gt;</span>
        </a>
      </div>
    </div>
  </section>

  <section id="experiments" class="sa-front-section sa-front-experiments" aria-labelledby="sa-experiments-title">
    <div class="sa-front__inner">
      <header class="sa-front-section-header" data-sa-reveal>
        <p class="sa-front-eyebrow">Experiments</p>
        <h2 id="sa-experiments-title">Small things, tested in the open.</h2>
        <p>
          Concepts, prototypes, tests and visual studies. Not always finished, and that is the point.
        </p>
      </header>

      <ul class="sa-experiment-grid" aria-label="Studio Avelin experiments">
        <li data-sa-reveal>
          <a class="sa-experiment-card" href="/experiments/matrix/" aria-label="Matrix experiment">
            <div class="sa-thumb-box">
              <div class="sa-front-grid" aria-hidden="true"></div>
              <svg class="sa-thumb-svg" viewBox="0 0 60 60" aria-hidden="true">
                <g transform="translate(6, 0)">
                  <rect x="0" y="4" width="6" height="6" fill="currentColor" opacity="0.15" />
                  <rect x="0" y="13" width="6" height="6" fill="currentColor" opacity="0.23" />
                  <rect x="0" y="22" width="6" height="6" fill="currentColor" opacity="0.31" />
                  <rect x="0" y="31" width="6" height="6" fill="currentColor" opacity="0.39" />
                  <rect x="0" y="40" width="6" height="6" fill="currentColor" opacity="0.47" />
                  <rect x="0" y="49" width="6" height="6" fill="currentColor" opacity="0.55" />
                </g>
                <g transform="translate(18, 0)">
                  <rect x="0" y="4" width="6" height="6" fill="currentColor" opacity="0.23" />
                  <rect x="0" y="13" width="6" height="6" fill="currentColor" opacity="0.31" />
                  <rect x="0" y="22" width="6" height="6" fill="currentColor" opacity="0.39" />
                  <rect x="0" y="31" width="6" height="6" fill="currentColor" opacity="0.47" />
                  <rect x="0" y="40" width="6" height="6" fill="currentColor" opacity="0.55" />
                  <rect x="0" y="49" width="6" height="6" fill="currentColor" opacity="0.63" />
                </g>
                <g transform="translate(30, 0)">
                  <rect x="0" y="4" width="6" height="6" fill="currentColor" opacity="0.31" />
                  <rect x="0" y="13" width="6" height="6" fill="currentColor" opacity="0.39" />
                  <rect x="0" y="22" width="6" height="6" fill="currentColor" opacity="0.47" />
                  <rect x="0" y="31" width="6" height="6" fill="currentColor" opacity="0.55" />
                  <rect x="0" y="40" width="6" height="6" fill="currentColor" opacity="0.63" />
                  <rect x="0" y="49" width="6" height="6" fill="currentColor" opacity="0.71" />
                </g>
                <g transform="translate(42, 0)">
                  <rect x="0" y="4" width="6" height="6" fill="currentColor" opacity="0.39" />
                  <rect x="0" y="13" width="6" height="6" fill="currentColor" opacity="0.47" />
                  <rect x="0" y="22" width="6" height="6" fill="currentColor" opacity="0.55" />
                  <rect x="0" y="31" width="6" height="6" fill="currentColor" opacity="0.63" />
                  <rect x="0" y="40" width="6" height="6" fill="var(--color-accent)" />
                  <rect x="0" y="49" width="6" height="6" fill="currentColor" opacity="0.79" />
                </g>
                <g transform="translate(54, 0)">
                  <rect x="0" y="4" width="6" height="6" fill="currentColor" opacity="0.47" />
                  <rect x="0" y="13" width="6" height="6" fill="currentColor" opacity="0.55" />
                  <rect x="0" y="22" width="6" height="6" fill="currentColor" opacity="0.63" />
                  <rect x="0" y="31" width="6" height="6" fill="currentColor" opacity="0.71" />
                  <rect x="0" y="40" width="6" height="6" fill="currentColor" opacity="0.79" />
                  <rect x="0" y="49" width="6" height="6" fill="currentColor" opacity="0.85" />
                </g>
              </svg>
              <span>Prototype</span>
            </div>
            <div class="sa-experiment-card__body">
              <h3>Matrix</h3>
              <p>A typographic falling-character study, calm and monochrome with a single lime pulse.</p>
              <span>Open <span aria-hidden="true">-&gt;</span></span>
            </div>
          </a>
        </li>

        <li data-sa-reveal>
          <a class="sa-experiment-card" href="/experiments/avelin-signal-grid/" aria-label="Avelin Signal Grid experiment">
            <div class="sa-thumb-box">
              <div class="sa-front-grid" aria-hidden="true"></div>
              <svg class="sa-thumb-svg" viewBox="0 0 60 60" aria-hidden="true">
                <g fill="currentColor" opacity="0.35">
                  <circle cx="7" cy="7" r="1.4" /><circle cx="16" cy="7" r="1.4" /><circle cx="25" cy="7" r="1.4" /><circle cx="34" cy="7" r="1.4" /><circle cx="43" cy="7" r="1.4" /><circle cx="52" cy="7" r="1.4" />
                  <circle cx="7" cy="16" r="1.4" /><circle cx="16" cy="16" r="1.4" /><circle cx="25" cy="16" r="1.4" /><circle cx="34" cy="16" r="1.4" /><circle cx="43" cy="16" r="1.4" /><circle cx="52" cy="16" r="1.4" />
                  <circle cx="7" cy="25" r="1.4" /><circle cx="16" cy="25" r="1.4" /><circle cx="25" cy="25" r="1.4" /><circle cx="43" cy="25" r="1.4" /><circle cx="52" cy="25" r="1.4" />
                  <circle cx="7" cy="34" r="1.4" /><circle cx="16" cy="34" r="1.4" /><circle cx="25" cy="34" r="1.4" /><circle cx="34" cy="34" r="1.4" /><circle cx="43" cy="34" r="1.4" /><circle cx="52" cy="34" r="1.4" />
                  <circle cx="7" cy="43" r="1.4" /><circle cx="16" cy="43" r="1.4" /><circle cx="25" cy="43" r="1.4" /><circle cx="34" cy="43" r="1.4" /><circle cx="43" cy="43" r="1.4" /><circle cx="52" cy="43" r="1.4" />
                  <circle cx="7" cy="52" r="1.4" /><circle cx="16" cy="52" r="1.4" /><circle cx="25" cy="52" r="1.4" /><circle cx="34" cy="52" r="1.4" /><circle cx="43" cy="52" r="1.4" /><circle cx="52" cy="52" r="1.4" />
                </g>
                <circle cx="34" cy="25" r="2.4" fill="var(--color-accent)" />
              </svg>
              <span>Test</span>
            </div>
            <div class="sa-experiment-card__body">
              <h3>Avelin Signal Grid</h3>
              <p>A reactive grid that responds to small signals: cursor, rhythm, time of day.</p>
              <span>Open <span aria-hidden="true">-&gt;</span></span>
            </div>
          </a>
        </li>

        <li data-sa-reveal>
          <a class="sa-experiment-card" href="/experiments/poster-generator/" aria-label="Poster Generator experiment">
            <div class="sa-thumb-box">
              <div class="sa-front-grid" aria-hidden="true"></div>
              <svg class="sa-thumb-svg" viewBox="0 0 60 60" aria-hidden="true">
                <rect x="6" y="6" width="48" height="48" fill="none" stroke="currentColor" stroke-opacity="0.3" />
                <rect x="10" y="14" width="28" height="5" fill="currentColor" opacity="0.7" />
                <rect x="10" y="23" width="20" height="3" fill="currentColor" opacity="0.35" />
                <rect x="10" y="29" width="34" height="3" fill="currentColor" opacity="0.35" />
                <circle cx="42" cy="44" r="6" fill="var(--color-accent)" />
                <rect x="10" y="42" width="10" height="10" transform="rotate(-12 15 47)" fill="currentColor" opacity="0.85" />
              </svg>
              <span>Concept</span>
            </div>
            <div class="sa-experiment-card__body">
              <h3>Poster Generator</h3>
              <p>A small tool for generating simple typographic posters with controlled randomness.</p>
              <span>Open <span aria-hidden="true">-&gt;</span></span>
            </div>
          </a>
        </li>

        <li data-sa-reveal>
          <a class="sa-experiment-card" href="/experiments/" aria-label="Future experiments">
            <div class="sa-thumb-box">
              <div class="sa-front-grid" aria-hidden="true"></div>
              <svg class="sa-thumb-svg" viewBox="0 0 60 60" aria-hidden="true">
                <rect x="8" y="8" width="44" height="44" fill="none" stroke="currentColor" stroke-opacity="0.35" stroke-dasharray="3 3" />
                <circle cx="22" cy="30" r="1.6" fill="currentColor" opacity="0.5" />
                <circle cx="30" cy="30" r="1.6" fill="currentColor" opacity="0.5" />
                <circle cx="38" cy="30" r="1.6" fill="var(--color-accent)" />
              </svg>
              <span>Coming Soon</span>
            </div>
            <div class="sa-experiment-card__body">
              <h3>Future Experiments</h3>
              <p>Sketches, half-ideas and things still finding their shape.</p>
              <span>All experiments <span aria-hidden="true">-&gt;</span></span>
            </div>
          </a>
        </li>
      </ul>

      <div class="sa-front-section-link" data-sa-reveal>
        <a class="sa-front-link" href="/experiments/">All experiments <span aria-hidden="true">-&gt;</span></a>
      </div>
    </div>
  </section>

  <section id="journal" class="sa-front-section sa-front-journal" aria-labelledby="sa-journal-title">
    <div class="sa-front__inner">
      <div class="sa-front-section-split">
        <header class="sa-front-section-header" data-sa-reveal>
          <p class="sa-front-eyebrow">Journal</p>
          <h2 id="sa-journal-title">Notes from the studio.</h2>
          <p>Notes on design, code, webwork, process and small creative ideas.</p>
        </header>
        <a class="sa-front-link" href="/journal/" data-sa-reveal>Visit Journal <span aria-hidden="true">-&gt;</span></a>
      </div>

      <ul class="sa-journal-grid" aria-label="Recent journal teasers">
        <li data-sa-reveal>
          <a class="sa-journal-card" href="/journal/" aria-label="Building small creative tools">
            <div class="sa-journal-card__cover">
              <div class="sa-front-grid" aria-hidden="true"></div>
              <svg class="sa-journal-mark" viewBox="0 0 60 60" aria-hidden="true">
                <path d="M14 36 C 14 22, 46 22, 46 36" fill="none" stroke="currentColor" stroke-opacity="0.55" stroke-width="1.2" />
                <path d="M42 32 L46 36 L42 40" fill="none" stroke="currentColor" stroke-opacity="0.55" stroke-width="1.2" />
                <circle cx="14" cy="36" r="2.6" fill="var(--color-accent)" />
              </svg>
              <span class="sa-journal-card__category"><span aria-hidden="true"></span>Process</span>
              <span class="sa-journal-card__read">5 min read</span>
            </div>
            <div class="sa-journal-card__body">
              <h3>Building small creative tools</h3>
              <p>Why I keep returning to small, single-purpose tools, and what they teach about design, focus and craft.</p>
              <time datetime="2026-05-20">May 20, 2026</time>
            </div>
          </a>
        </li>

        <li data-sa-reveal>
          <a class="sa-journal-card" href="/journal/" aria-label="Why experiments belong on a personal website">
            <div class="sa-journal-card__cover">
              <div class="sa-front-grid" aria-hidden="true"></div>
              <svg class="sa-journal-mark" viewBox="0 0 60 60" aria-hidden="true">
                <path d="M22 22 L14 30 L22 38" fill="none" stroke="currentColor" stroke-opacity="0.55" stroke-width="1.2" />
                <path d="M38 22 L46 30 L38 38" fill="none" stroke="currentColor" stroke-opacity="0.55" stroke-width="1.2" />
                <line x1="33" y1="18" x2="27" y2="42" stroke="var(--color-accent)" stroke-width="1.4" />
              </svg>
              <span class="sa-journal-card__category"><span aria-hidden="true"></span>Webwork</span>
              <span class="sa-journal-card__read">6 min read</span>
            </div>
            <div class="sa-journal-card__body">
              <h3>Why experiments belong on a personal website</h3>
              <p>On showing the messy, unfinished and playful parts of the process, and why a personal site is the right home for them.</p>
              <time datetime="2026-04-12">April 12, 2026</time>
            </div>
          </a>
        </li>

        <li data-sa-reveal>
          <a class="sa-journal-card" href="/journal/" aria-label="Notes on designing Studio Avelin">
            <div class="sa-journal-card__cover">
              <div class="sa-front-grid" aria-hidden="true"></div>
              <svg class="sa-journal-mark" viewBox="0 0 60 60" aria-hidden="true">
                <rect x="14" y="14" width="26" height="32" fill="none" stroke="currentColor" stroke-opacity="0.4" />
                <line x1="18" y1="22" x2="34" y2="22" stroke="currentColor" stroke-opacity="0.4" />
                <line x1="18" y1="28" x2="36" y2="28" stroke="currentColor" stroke-opacity="0.4" />
                <line x1="18" y1="34" x2="30" y2="34" stroke="currentColor" stroke-opacity="0.4" />
                <rect x="36" y="38" width="10" height="10" fill="var(--color-accent)" />
              </svg>
              <span class="sa-journal-card__category"><span aria-hidden="true"></span>Studio Notes</span>
              <span class="sa-journal-card__read">4 min read</span>
            </div>
            <div class="sa-journal-card__body">
              <h3>Notes on designing Studio Avelin</h3>
              <p>Decisions, details and the thinking behind this personal space: bright, calm and intentionally simple.</p>
              <time datetime="2026-03-02">March 2, 2026</time>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </section>

  <section id="say-hello" class="sa-front-section sa-front-contact" aria-labelledby="sa-contact-title">
    <div class="sa-front__inner">
      <div class="sa-front-contact__content" data-sa-reveal>
        <p class="sa-front-eyebrow">Say Hello</p>
        <h2 id="sa-contact-title">
          For ideas, feedback, collaborations<br>
          or just a quick hello.
        </h2>
        <a class="sa-front-contact__email" href="mailto:hello@studio-avelin.com">
          hello@studio-avelin.com
          <span aria-hidden="true">-&gt;</span>
        </a>
        <nav class="sa-front-social" aria-label="Social links">
          <a href="https://instagram.com/" target="_blank" rel="noopener noreferrer">Instagram <span aria-hidden="true">&#8599;</span></a>
          <a href="https://github.com/" target="_blank" rel="noopener noreferrer">GitHub <span aria-hidden="true">&#8599;</span></a>
        </nav>
      </div>
    </div>
  </section>
</main>

<footer class="sa-front-footer" aria-label="Site footer">
  <div class="sa-front-footer__inner">
    <div class="sa-front-footer__brand">
      <p>Studio Avelin</p>
      <span>Design. Code. Create.</span>
    </div>

    <nav aria-label="Explore">
      <p>Explore</p>
      <a href="#work">Work</a>
      <a href="/about-me/">About</a>
      <a href="/experiments/">Experiments</a>
      <a href="/journal/">Journal</a>
      <a href="#say-hello">Contact</a>
    </nav>

    <nav aria-label="Legal">
      <p>Legal</p>
      <a href="/datenschutzerklaerung/">Datenschutzerkl&auml;rung</a>
      <a href="/impressum/">Impressum</a>
    </nav>

    <nav aria-label="Social">
      <p>Social</p>
      <a href="https://instagram.com/" target="_blank" rel="noopener noreferrer">Instagram</a>
      <a href="https://github.com/" target="_blank" rel="noopener noreferrer">GitHub</a>
    </nav>
  </div>

  <div class="sa-front-footer__bottom">
    <span>2026 Studio Avelin</span>
    <span><i aria-hidden="true"></i>Made with care.</span>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
