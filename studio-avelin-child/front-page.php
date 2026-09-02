<?php
/**
 * Studio Avelin — standalone homepage template (Ich-Marke, elevated).
 *
 * Deliberately does NOT call get_header() / get_footer(): the flat Studio Avelin
 * header and footer live directly below and the Twenty Twenty-Four block chrome
 * must not appear on the homepage.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_home          = trailingslashit( home_url( '/' ) );
$sa_uri           = get_stylesheet_directory_uri();
$sa_portrait_path = get_stylesheet_directory() . '/assets/img/portrait.jpg';
$sa_has_portrait  = file_exists( $sa_portrait_path );
$sa_portrait      = add_query_arg(
	'ver',
	$sa_has_portrait ? filemtime( $sa_portrait_path ) : SA_CHILD_VERSION,
	$sa_uri . '/assets/img/portrait.jpg'
);

/** The three offer levels, shown as large statement rows under the hero. */
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

/** A small, honest selection of work for the homepage. Full list on /work/. */
$sa_projects = array(
	array(
		'name'  => 'Hawaiimassage zu Hause',
		'meta'  => 'Kundenprojekt · Website',
		'text'  => 'Eine ruhige, warme Website für mobile Wellnessmassagen zu Hause – klare Angebotsübersicht, viel Raum für Bild und Text.',
		'url'   => $sa_home . 'work/hawaiimassage/',
		'image' => '',
		'tint'  => 'warm',
	),
	array(
		'name'  => 'Portfolio Page – MONROE',
		'meta'  => 'Kundenprojekt · Landingpage',
		'text'  => 'Eine warme, zurückhaltende Portfolio- und Landingpage, die Persönlichkeit, Angebot und einen einfachen Weg zum Kontakt zusammenbringt.',
		'url'   => $sa_home . 'work/monroe-toyparty-landingpage/',
		'image' => $sa_uri . '/assets/img/project-portfolio-visual.svg',
		'tint'  => 'rose',
	),
	array(
		'name'  => 'STAN',
		'meta'  => 'Eigenes Produkt · App',
		'text'  => 'Eine ruhige Notiz- und Denk-App, die Ideen, Bereiche, Notizen und Tags an einem Ort zusammenhält.',
		'url'   => $sa_home . 'work/stan/',
		'image' => '',
		'tint'  => 'cool',
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

<a class="sa-skip" href="#work">Zum Inhalt springen</a>

<?php get_template_part( 'parts/sa-header' ); ?>

<main class="sa-main" id="sa-main">

	<!-- ============================ HERO ============================ -->
	<section class="sa-hero sa-hero--dark" id="top" aria-label="Einführung">
		<div class="sa-hero__grid">
			<div>
				<span class="sa-hero__eyebrow"><span aria-hidden="true"></span>Design-Studio · Ich-Marke</span>
				<h1 class="sa-hero__title">
					<span class="sa-rw"><span>Design, das deiner</span></span><br />
					<span class="sa-rw"><span>Marke <em>eine Stimme</em></span></span><br />
					<span class="sa-rw"><span>gibt.</span></span>
				</h1>
			</div>
			<div class="sa-hero__foot">
				<div>
					<p class="sa-hero__lead">Ich begleite dich persönlich – von der Positionierung bis zur Sichtbarkeit.</p>
					<span class="sa-hero__sig">Michael, Studio Avelin</span>
				</div>
				<a class="sa-btn sa-btn--lime" href="<?php echo esc_url( $sa_home . 'contact/' ); ?>">
					Projekt besprechen <span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
				</a>
			</div>
		</div>
		<div class="sa-hero__portrait" data-sa-parallax>
			<?php if ( $sa_has_portrait ) : ?>
				<img src="<?php echo esc_url( $sa_portrait ); ?>" alt="Porträt von Michael, dem Designer hinter Studio Avelin" width="900" height="1100" loading="eager" />
			<?php else : ?>
				<span class="sa-hero__portrait-fallback" aria-hidden="true">MICHAEL</span>
			<?php endif; ?>
		</div>
	</section>

	<!-- ============ VON DER HALTUNG BIS ZUR SICHTBARKEIT ============ -->
	<section class="sa-section" id="services" aria-labelledby="sa-arc-title">
		<div class="sa-shell">
			<span class="sa-sec-kicker sa-reveal">Von der Haltung bis zur Sichtbarkeit</span>
			<h2 class="sa-sec-title sa-reveal" id="sa-arc-title">Design, Marke und Sichtbarkeit – aus einer Hand.</h2>
			<div class="sa-arc">
				<?php foreach ( $sa_arc as $index => $step ) : ?>
					<div class="sa-arc__item sa-reveal">
						<span class="sa-arc__n"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<div>
							<h3 class="sa-arc__h"><?php echo esc_html( $step['title'] ); ?></h3>
							<p class="sa-arc__p"><?php echo esc_html( $step['text'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="sa-sec-foot sa-reveal">
				<a class="sa-textlink" href="<?php echo esc_url( $sa_home . 'services/' ); ?>">Leistungen entdecken <span aria-hidden="true">&rarr;</span></a>
			</div>
		</div>
	</section>

	<!-- ============================ WORK ============================ -->
	<section class="sa-section sa-section--tint" id="work" aria-labelledby="sa-work-title">
		<div class="sa-shell">
			<span class="sa-sec-kicker sa-reveal">Projekte</span>
			<h2 class="sa-sec-title sa-reveal" id="sa-work-title">Ausgewählte Projekte</h2>
			<p class="sa-sec-intro sa-reveal">Kundenprojekte und eigene Produkte – gestaltet, entwickelt und verfeinert im direkten Austausch.</p>

			<div class="sa-worklist">
				<?php foreach ( $sa_projects as $project ) : ?>
					<a class="sa-worklist__item sa-reveal" href="<?php echo esc_url( $project['url'] ); ?>">
						<div class="sa-worklist__media sa-worklist__media--<?php echo esc_attr( $project['tint'] ); ?>">
							<?php if ( $project['image'] ) : ?>
								<img src="<?php echo esc_url( $project['image'] ); ?>" alt="" loading="lazy" />
							<?php else : ?>
								<span class="sa-worklist__chrome" aria-hidden="true">
									<span></span><span></span><span></span>
								</span>
								<span class="sa-worklist__ph" aria-hidden="true"><?php echo esc_html( $project['name'] ); ?></span>
							<?php endif; ?>
						</div>
						<div class="sa-worklist__body">
							<span class="sa-worklist__meta"><?php echo esc_html( $project['meta'] ); ?></span>
							<h3 class="sa-worklist__name"><?php echo esc_html( $project['name'] ); ?></h3>
							<p class="sa-worklist__desc"><?php echo esc_html( $project['text'] ); ?></p>
							<span class="sa-worklist__link">Projekt ansehen <span aria-hidden="true">&rarr;</span></span>
						</div>
					</a>
				<?php endforeach; ?>
			</div>

			<div class="sa-sec-foot sa-reveal">
				<a class="sa-textlink" href="<?php echo esc_url( $sa_home . 'work/' ); ?>">Alle Projekte <span aria-hidden="true">&rarr;</span></a>
			</div>
		</div>
	</section>

	<!-- ============================ ABOUT ============================ -->
	<section class="sa-section" id="about" aria-labelledby="sa-about-title">
		<div class="sa-shell">
			<div class="sa-about2">
				<div class="sa-about2__media sa-reveal">
					<?php if ( $sa_has_portrait ) : ?>
						<img src="<?php echo esc_url( $sa_portrait ); ?>" alt="Porträt der Person hinter Studio Avelin" loading="lazy" width="800" height="1000" />
					<?php else : ?>
						<span class="sa-about2__ph" aria-hidden="true">MICHAEL</span>
					<?php endif; ?>
				</div>
				<div class="sa-about2__body sa-reveal d1">
					<span class="sa-sec-kicker">Über mich</span>
					<h2 class="sa-about2__h" id="sa-about-title">Design mit Haltung, für Marken, die mehr sind als eine Website.</h2>
					<p class="sa-about2__p">
						Ich bin Michael, Designer und Gründer von Studio Avelin. Ich arbeite mit kleinen,
						inhabergeführten Marken – von der Personenmarke bis zum eigenen Laden. Keine Agentur
						mit vielen Zwischenstationen, sondern ein direkter Ansprechpartner: von der
						Positionierung über das Design bis zur Sichtbarkeit.
					</p>
					<a class="sa-textlink" href="<?php echo esc_url( $sa_home . 'about-me/' ); ?>">Mehr über mich <span aria-hidden="true">&rarr;</span></a>
				</div>
			</div>
		</div>
	</section>

	<!-- =========================== JOURNAL =========================== -->
	<?php if ( $sa_journal_posts->have_posts() ) : ?>
	<section class="sa-section sa-section--tint" id="journal" aria-labelledby="sa-journal-title">
		<div class="sa-shell">
			<span class="sa-sec-kicker sa-reveal">Journal</span>
			<h2 class="sa-sec-title sa-reveal" id="sa-journal-title">Abseits der Arbeit</h2>
			<p class="sa-sec-intro sa-reveal">Kein Marketing-Blog – ein Einblick in die Person hinter Studio Avelin: Reisen, Training, Bücher.</p>

			<div class="sa-jrn">
				<?php while ( $sa_journal_posts->have_posts() ) : ?>
					<?php
					$sa_journal_posts->the_post();
					$sa_terms    = get_the_terms( get_the_ID(), 'sa_journal_category' );
					$sa_category  = ( $sa_terms && ! is_wp_error( $sa_terms ) ) ? $sa_terms[0]->name : 'Journal';
					$sa_excerpt  = get_the_excerpt();
					?>
					<a class="sa-jrn__item sa-reveal" href="<?php the_permalink(); ?>">
						<span class="sa-jrn__cat"><?php echo esc_html( $sa_category ); ?></span>
						<span class="sa-jrn__t"><?php the_title(); ?></span>
						<?php if ( $sa_excerpt ) : ?>
							<span class="sa-jrn__d"><?php echo esc_html( wp_trim_words( $sa_excerpt, 20, '…' ) ); ?></span>
						<?php endif; ?>
						<span class="sa-jrn__date"><?php echo esc_html( get_the_date( 'F Y' ) ); ?></span>
					</a>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>

			<div class="sa-sec-foot sa-reveal">
				<a class="sa-textlink" href="<?php echo esc_url( $sa_home . 'journal/' ); ?>">Alle Notizen <span aria-hidden="true">&rarr;</span></a>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<!-- ======================== ABSCHLUSS-CTA ======================== -->
	<section class="sa-section sa-section--dark sa-closing" id="contact" aria-labelledby="sa-closing-title">
		<div class="sa-shell">
			<span class="sa-sec-kicker sa-reveal">Projekt besprechen</span>
			<h2 class="sa-closing__h sa-reveal" id="sa-closing-title">Bereit?</h2>
			<p class="sa-closing__p sa-reveal">Ob erste Idee oder konkretes Projekt – lass uns sprechen, ob und wie ich dich begleiten kann.</p>
			<a class="sa-btn sa-btn--light sa-reveal" href="<?php echo esc_url( $sa_home . 'contact/' ); ?>">
				Projekt besprechen <span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
			</a>
			<div class="sa-closing__social sa-reveal">
				<span>Außerdem</span>
				<a href="https://www.instagram.com/studio_avelin" target="_blank" rel="noopener noreferrer">Instagram</a>
				<a href="https://github.com/studio-avelin" target="_blank" rel="noopener noreferrer">GitHub</a>
			</div>
		</div>
	</section>

</main>

<?php get_template_part( 'parts/sa-footer' ); ?>

<?php wp_footer(); ?>
</body>
</html>
