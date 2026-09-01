<?php
/**
 * Studio Avelin — standalone homepage template (Ich-Marke).
 *
 * This template deliberately does NOT call get_header() or get_footer():
 * the Twenty Twenty-Four block header/footer must not appear on the homepage.
 * The custom flat Studio Avelin header and footer live directly below.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_home          = trailingslashit( home_url( '/' ) );
$sa_portrait_path = get_stylesheet_directory() . '/assets/img/portrait.jpg';
$sa_has_portrait  = file_exists( $sa_portrait_path );
$sa_portrait      = add_query_arg(
	'ver',
	$sa_has_portrait ? filemtime( $sa_portrait_path ) : SA_CHILD_VERSION,
	get_stylesheet_directory_uri() . '/assets/img/portrait.jpg'
);

/** The three offer levels, shown as cards directly under the hero. */
$sa_arc = array(
	array(
		'title' => 'Aus Haltung wird Marke.',
		'text'  => 'Klarheit über Positionierung, Zielgruppe und Tonalität – das Fundament für alles, was folgt.',
	),
	array(
		'title' => 'Aus Marke wird Design.',
		'text'  => 'Eine Website, die trägt, was deine Marke ausmacht – individuell gestaltet, klar geführt, sauber umgesetzt.',
	),
	array(
		'title' => 'Aus Design wird Sichtbarkeit.',
		'text'  => 'Begleitung, die bleibt: SEO, Content und Performance im Blick, damit gefunden wird, was gut gemacht ist.',
	),
);

/** A small, honest selection of work for the homepage. The full list lives on /work/. */
$sa_projects = array(
	array(
		'name'  => 'Hawaiimassage zu Hause',
		'meta'  => 'Kundenprojekt · Website',
		'text'  => 'Eine ruhige, warme Website für mobile Massagen zu Hause – klare Angebotsübersicht, viel Raum für Bild und Text.',
		'url'   => $sa_home . 'work/hawaiimassage/',
	),
	array(
		'name'  => 'Portfolio Page – MONROE',
		'meta'  => 'Kundenprojekt · Landingpage',
		'text'  => 'Eine warme, zurückhaltende Portfolio- und Landingpage, die Persönlichkeit, Angebot und einen einfachen Weg zum Kontakt zusammenbringt.',
		'url'   => $sa_home . 'work/monroe-toyparty-landingpage/',
	),
	array(
		'name'  => 'STAN',
		'meta'  => 'Eigenes Produkt · App',
		'text'  => 'Eine ruhige Notiz-App, die Ideen, Bereiche, Notizen und Tags an einem Ort zusammenhält.',
		'url'   => $sa_home . 'work/stan/',
	),
);

$sa_journal_posts = new WP_Query(
	array(
		'post_type'           => 'sa_journal',
		'post_status'         => 'publish',
		'posts_per_page'      => 3,
		'orderby'             => 'date',
		'order'               => 'DESC',
		'no_found_rows'       => true,
		'ignore_sticky_posts' => true,
	)
);
$sa_journal_marks = array( 'process', 'webwork', 'notes' );

/**
 * Inline SVG marks for journal covers without a featured image.
 *
 * @param string $kind Mark key.
 */
function sa_mark( $kind ) {
	switch ( $kind ) {
		case 'process':
			?>
			<svg class="sa-mark" viewBox="0 0 120 120" aria-hidden="true">
				<path d="M20 84 C 44 84, 44 36, 68 36 S 92 60, 100 52"
					fill="none" stroke="#3D3D3D" stroke-width="1.5" opacity="0.6" />
				<circle cx="20" cy="84" r="4" fill="#3D3D3D" />
				<circle cx="68" cy="36" r="6" fill="#c7f000" />
				<path d="M20 100 H100" stroke="#3D3D3D" opacity="0.25" />
			</svg>
			<?php
			break;

		case 'webwork':
			?>
			<svg class="sa-mark" viewBox="0 0 120 120" aria-hidden="true">
				<rect x="18" y="26" width="84" height="60" fill="none" stroke="#3D3D3D" opacity="0.45" />
				<path d="M18 40 H102" stroke="#3D3D3D" opacity="0.35" />
				<rect x="26" y="50" width="30" height="26" fill="#e6e6e3" />
				<rect x="62" y="50" width="32" height="5" fill="#3D3D3D" opacity="0.4" />
				<rect x="62" y="62" width="24" height="5" fill="#3D3D3D" opacity="0.25" />
				<rect x="62" y="74" width="28" height="5" fill="#c7f000" />
			</svg>
			<?php
			break;

		default:
			?>
			<svg class="sa-mark" viewBox="0 0 120 120" aria-hidden="true">
				<rect x="24" y="24" width="72" height="72" fill="none" stroke="#3D3D3D" opacity="0.4" />
				<path d="M24 60 H96 M60 24 V96" stroke="#3D3D3D" opacity="0.25" />
				<circle cx="60" cy="60" r="18" fill="none" stroke="#3D3D3D" opacity="0.5" />
				<circle cx="78" cy="42" r="6" fill="#c7f000" />
			</svg>
			<?php
			break;
	}
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'sa-front' ); ?>>
<?php wp_body_open(); ?>

<a class="sa-skip" href="#sa-main">Zum Inhalt springen</a>

<?php get_template_part( 'parts/sa-header' ); ?>

<main class="sa-main" id="sa-main">

	<!-- ============================ HERO ============================ -->
	<section class="sa-hero sa-hero--portrait" id="top" aria-label="Einführung">
		<span class="sa-hero__glow sa-hero__glow--a" aria-hidden="true"></span>

		<div class="sa-hero__inner sa-shell">
			<div class="sa-hero__content sa-stagger">
				<div class="sa-eyebrow-row sa-reveal">
					<span class="sa-rule" aria-hidden="true"></span>
					<span class="sa-eyebrow">Design-Studio · Ich-Marke</span>
				</div>

				<h1 class="sa-hero__title sa-reveal">
					Design, das deiner Marke<br />
					<span class="sa-lime-text">eine Stimme gibt.</span>
				</h1>

				<p class="sa-hero__lead sa-reveal">
					Ich begleite dich persönlich – von der Positionierung bis zur Sichtbarkeit.
				</p>

				<p class="sa-hero__signature sa-reveal">Michael, Studio Avelin</p>

				<div class="sa-hero__actions sa-reveal">
					<a class="sa-btn sa-btn--dark" href="<?php echo esc_url( $sa_home . 'contact/' ); ?>">
						<span class="sa-btn__text">Projekt besprechen</span>
						<span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
					</a>
					<a class="sa-link-lime" href="#work">
						Projekte ansehen <span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
					</a>
				</div>
			</div>

			<div class="sa-hero__portrait sa-reveal">
				<div class="sa-hero__portrait-frame">
					<?php if ( $sa_has_portrait ) : ?>
						<img class="sa-hero__portrait-img" src="<?php echo esc_url( $sa_portrait ); ?>"
							alt="Porträt von Michael, dem Designer hinter Studio Avelin"
							width="800" height="1000" loading="eager" />
					<?php else : ?>
						<div class="sa-hero__portrait-placeholder"><span>MICHAEL</span></div>
					<?php endif; ?>
					<span class="sa-hero__portrait-accent" aria-hidden="true"></span>
				</div>
				<span class="sa-hero__portrait-mark" aria-hidden="true">A<span>/</span></span>
			</div>
		</div>
	</section>

	<!-- ==================== VON DER HALTUNG BIS ZUR SICHTBARKEIT ==================== -->
	<section class="sa-section sa-arc" aria-labelledby="sa-arc-title">
		<div class="sa-shell">
			<div class="sa-section__head sa-stagger">
				<p class="sa-eyebrow sa-eyebrow--dot sa-reveal">Von der Haltung bis zur Sichtbarkeit</p>
				<h2 class="sa-section__title sa-reveal" id="sa-arc-title">Design, Marke und Sichtbarkeit – aus einer Hand.</h2>
			</div>

			<ul class="sa-arc__list sa-stagger">
				<?php foreach ( $sa_arc as $index => $step ) : ?>
					<li class="sa-arc__item sa-reveal">
						<span class="sa-arc__index"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<h3 class="sa-arc__title"><?php echo esc_html( $step['title'] ); ?></h3>
						<p class="sa-arc__text"><?php echo esc_html( $step['text'] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ul>

			<div class="sa-section__foot sa-reveal">
				<a class="sa-link-lime" href="<?php echo esc_url( $sa_home . 'services/' ); ?>">
					Leistungen entdecken <span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
				</a>
			</div>
		</div>
	</section>

	<!-- ============================ WORK ============================ -->
	<section class="sa-section" id="work" aria-labelledby="sa-work-title">
		<div class="sa-shell">
			<div class="sa-section__head sa-stagger">
				<p class="sa-eyebrow sa-eyebrow--dot sa-reveal">Projekte</p>
				<h2 class="sa-section__title sa-reveal" id="sa-work-title">Ausgewählte Projekte</h2>
				<p class="sa-section__intro sa-reveal">
					Kundenprojekte und eigene Produkte – gestaltet, entwickelt und verfeinert im direkten Austausch.
				</p>
			</div>

			<ul class="sa-projects sa-stagger">
				<?php foreach ( $sa_projects as $project ) : ?>
					<li class="sa-projects__item sa-reveal">
						<a class="sa-projects__link" href="<?php echo esc_url( $project['url'] ); ?>">
							<span class="sa-projects__meta"><?php echo esc_html( $project['meta'] ); ?></span>
							<h3 class="sa-projects__name"><?php echo esc_html( $project['name'] ); ?></h3>
							<p class="sa-projects__text"><?php echo esc_html( $project['text'] ); ?></p>
							<span class="sa-inline-cta">Projekt ansehen <span class="sa-btn__arrow" aria-hidden="true">&rarr;</span></span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>

			<div class="sa-section__foot sa-reveal">
				<a class="sa-link-lime" href="<?php echo esc_url( $sa_home . 'work/' ); ?>">
					Alle Projekte <span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
				</a>
			</div>
		</div>
	</section>

	<!-- ============================ ABOUT ============================ -->
	<section class="sa-section" id="about" aria-labelledby="sa-about-title">
		<div class="sa-shell">
			<div class="sa-about sa-stagger">
				<div class="sa-about__media sa-reveal">
					<div class="sa-about__frame">
						<?php if ( $sa_has_portrait ) : ?>
							<img class="sa-about__img" src="<?php echo esc_url( $sa_portrait ); ?>"
								alt="Porträt der Person hinter Studio Avelin" loading="lazy"
								width="800" height="800" />
						<?php else : ?>
							<div class="sa-about__graphic">
								<svg viewBox="0 0 320 320" aria-hidden="true">
									<rect width="320" height="320" fill="#f8f8f8" />
									<g stroke="#3D3D3D" opacity="0.12">
										<path d="M0 80 H320 M0 160 H320 M0 240 H320" />
										<path d="M80 0 V320 M160 0 V320 M240 0 V320" />
									</g>
									<circle cx="160" cy="160" r="80" fill="none" stroke="#3D3D3D" opacity="0.45" />
									<circle cx="216" cy="120" r="14" fill="#c7f000" />
								</svg>
							</div>
						<?php endif; ?>
					</div>
					<div class="sa-about__mark" aria-hidden="true">
						<span class="sa-about__mark-logo">A<span>/</span></span>
						<span class="sa-about__mark-name">Studio Avelin</span>
					</div>
				</div>

				<div class="sa-about__body sa-reveal">
					<p class="sa-eyebrow sa-eyebrow--dot">Über mich</p>
					<h2 class="sa-about__title" id="sa-about-title">
						Design mit Haltung, für Marken, die mehr sind als eine Website.
					</h2>
					<p class="sa-about__text">
						Ich bin Michael, Designer und Gründer von Studio Avelin. Ich arbeite mit kleinen,
						inhabergeführten Marken – von der Personenmarke bis zum eigenen Laden. Keine Agentur
						mit vielen Zwischenstationen, sondern ein direkter Ansprechpartner: von der
						Positionierung über das Design bis zur Sichtbarkeit.
					</p>
					<a class="sa-link-lime" href="<?php echo esc_url( $sa_home . 'about-me/' ); ?>">
						Mehr über mich <span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- =========================== JOURNAL =========================== -->
	<section class="sa-section" id="journal" aria-labelledby="sa-journal-title">
		<div class="sa-shell">
			<div class="sa-section__head-row">
				<div class="sa-section__head sa-stagger">
					<p class="sa-eyebrow sa-eyebrow--dot sa-reveal">Journal</p>
					<h2 class="sa-section__title sa-reveal" id="sa-journal-title">Abseits der Arbeit</h2>
					<p class="sa-section__intro sa-reveal">
						Kein Marketing-Blog – ein Einblick in die Person hinter Studio Avelin: Reisen,
						Training, Bücher.
					</p>
				</div>
				<a class="sa-link-lime sa-reveal" href="<?php echo esc_url( $sa_home . 'journal/' ); ?>">
					Alle Notizen <span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
				</a>
			</div>

			<?php if ( $sa_journal_posts->have_posts() ) : ?>
			<ul class="sa-journal sa-stagger">
				<?php $sa_journal_index = 0; ?>
				<?php while ( $sa_journal_posts->have_posts() ) : ?>
					<?php
					$sa_journal_posts->the_post();
					$sa_journal_terms    = get_the_terms( get_the_ID(), 'sa_journal_category' );
					$sa_journal_category = ( $sa_journal_terms && ! is_wp_error( $sa_journal_terms ) ) ? $sa_journal_terms[0]->name : 'Journal';
					$sa_journal_excerpt  = get_the_excerpt();
					$sa_journal_mark     = $sa_journal_marks[ $sa_journal_index % count( $sa_journal_marks ) ];
					$sa_journal_index++;
					?>
					<li class="sa-journal__item sa-reveal">
						<a class="sa-journal__link" href="<?php the_permalink(); ?>">
							<div class="sa-journal__cover<?php echo has_post_thumbnail() ? ' sa-journal__cover--image' : ''; ?>">
								<span class="sa-grid-bg" aria-hidden="true"></span>
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'large', array( 'class' => 'sa-journal__image', 'loading' => 'lazy' ) ); ?>
								<?php else : ?>
									<?php sa_mark( $sa_journal_mark ); ?>
								<?php endif; ?>
								<span class="sa-journal__cat">
									<span class="sa-journal__cat-dot" aria-hidden="true"></span>
									<?php echo esc_html( $sa_journal_category ); ?>
								</span>
								<span class="sa-journal__read"><?php echo esc_html( sa_journal_reading_time() ); ?> Min. Lesezeit</span>
								<span class="sa-journal__sweep" aria-hidden="true"></span>
							</div>
							<h3 class="sa-journal__title"><span><?php the_title(); ?></span></h3>
							<?php if ( $sa_journal_excerpt ) : ?>
								<p class="sa-journal__excerpt"><?php echo esc_html( $sa_journal_excerpt ); ?></p>
							<?php endif; ?>
							<span class="sa-journal__date"><?php echo esc_html( get_the_date() ); ?></span>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
			<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
	</section>

	<!-- ======================== ABSCHLUSS-CTA ======================== -->
	<section class="sa-section sa-contact" id="contact" aria-labelledby="sa-contact-title">
		<span class="sa-contact__glow" aria-hidden="true"></span>
		<div class="sa-shell">
			<div class="sa-stagger sa-contact__inner">
				<p class="sa-eyebrow sa-eyebrow--dot sa-reveal">Projekt besprechen</p>
				<h2 class="sa-contact__title sa-reveal" id="sa-contact-title">Bereit?</h2>

				<p class="sa-contact__intro sa-reveal">
					Ob erste Idee oder konkretes Projekt – lass uns sprechen, ob und wie ich dich begleiten kann.
				</p>

				<a class="sa-contact__mail sa-reveal" href="<?php echo esc_url( $sa_home . 'contact/' ); ?>">
					<span class="sa-contact__mail-text">Projekt besprechen</span>
					<span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
				</a>

				<div class="sa-contact__social sa-reveal">
					<span class="sa-contact__social-label">Außerdem</span>
					<a class="sa-link-lime" href="https://www.instagram.com/studio_avelin" target="_blank" rel="noopener noreferrer">
						Instagram
					</a>
					<a class="sa-link-lime" href="https://github.com/studio-avelin" target="_blank" rel="noopener noreferrer">
						GitHub
					</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_template_part( 'parts/sa-footer' ); ?>

<?php wp_footer(); ?>
</body>
</html>
