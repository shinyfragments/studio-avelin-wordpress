<?php
/**
 * Studio Avelin — Projekte.
 *
 * Kundenprojekte und, klar davon getrennt, eigene digitale Produkte.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_home = trailingslashit( home_url( '/' ) );

$sa_clients = array(
	array(
		'name'  => 'Hawaiimassage zu Hause',
		'meta'  => 'Website · in Vorbereitung',
		'text'  => 'Eine ruhige, warme Website für mobile Wellnessmassagen zu Hause – klare Angebotsübersicht, viel Raum für Bild und Text.',
		'url'   => $sa_home . 'work/hawaiimassage/',
	),
	array(
		'name'  => 'Portfolio Page – MONROE',
		'meta'  => 'Landingpage · live',
		'text'  => 'Eine warme, diskrete Portfolio- und Landingpage für eine selbstständige MONROE-Beraterin – stilvoll, einladend und mit einem einfachen Weg zum Kontakt.',
		'url'   => $sa_home . 'work/monroe-toyparty-landingpage/',
	),
	array(
		'name'  => 'Doula Anja',
		'meta'  => 'Website · live',
		'text'  => 'Eine persönliche Website für eine Doula – Geburtsvorbereitung, Begleitung und Unterstützung nach einer Fehlgeburt, ruhig gestaltet und nah.',
		'url'   => $sa_home . 'work/doula-anja/',
	),
	array(
		'name'  => 'Bäckerei Curfs',
		'meta'  => 'Website · live',
		'text'  => 'Ein stilvoller digitaler Auftritt für eine kleine, handwerkliche Bäckerei – reduziert, ästhetikgetrieben und einfach zu pflegen.',
		'url'   => $sa_home . 'work/baeckerei-curfs/',
	),
);

$sa_products = array(
	array(
		'name'  => 'STAN',
		'meta'  => 'App · Live-MVP',
		'text'  => 'Eine ruhige Notiz- und Denk-App, die Ideen, Bereiche, Notizen und Tags an einem Ort zusammenhält.',
		'url'   => $sa_home . 'work/stan/',
	),
	array(
		'name'  => 'StAT',
		'meta'  => 'App · in Entwicklung',
		'text'  => 'Ein privates Trainingstagebuch für Laufen, Krafttraining, Ziele, Strecken und Fortschritte.',
		'url'   => $sa_home . 'work/stat/',
	),
	array(
		'name'  => 'StAU',
		'meta'  => 'Konzept',
		'text'  => 'Ein Konzept für Reiseplanung und Reisetagebuch, das Ideen, Routen und Erinnerungen an einem Ort sammelt.',
		'url'   => $sa_home . 'work/stau/',
	),
);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( array( 'home', 'sa-front', 'sa-page', 'sa-page--work' ) ); ?>>
<?php wp_body_open(); ?>

<a class="sa-skip" href="#sa-main">Zum Inhalt springen</a>

<?php get_template_part( 'parts/sa-header' ); ?>

<main class="sa-main" id="sa-main">
	<div class="sa-about-container">

		<section class="sa-exp-hero sa-reveal">
			<div class="sa-exp-hero__left">
				<span class="sa-about-eyebrow">PROJEKTE</span>
				<h1 class="sa-about-hero-headline">
					<?php echo wp_kses_post( 'Für <span class="sa-lime-text">echte Marken</span> gestaltet.' ); ?>
				</h1>
				<div class="sa-about-intro" style="max-width: 650px;">
					<p>
						Eine Auswahl aus Kundenprojekten und eigenen digitalen Produkten. Überschaubar im
						Umfang, durchdacht in der Umsetzung, gemacht für den Alltag.
					</p>
				</div>
			</div>
			<div class="sa-exp-hero__right">
				<div class="sa-exp-hero-note">
					<span class="sa-exp-lime-line" aria-hidden="true"></span>
					<p class="sa-exp-hero-note__text">
						Kundenprojekte und eigene Produkte.<br />
						Gestaltet, entwickelt und verfeinert<br />
						im direkten Austausch.
					</p>
				</div>
			</div>
		</section>

		<section class="sa-section" aria-labelledby="sa-work-clients-title">
			<div class="sa-section__head sa-stagger">
				<p class="sa-eyebrow sa-eyebrow--dot sa-reveal">Kundenprojekte</p>
				<h2 class="sa-section__title sa-reveal" id="sa-work-clients-title">Arbeiten mit kleinen, inhabergeführten Marken</h2>
			</div>

			<ul class="sa-projects sa-stagger">
				<?php foreach ( $sa_clients as $project ) : ?>
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
		</section>

		<section class="sa-section sa-section--products" aria-labelledby="sa-work-products-title">
			<div class="sa-section__head sa-stagger">
				<p class="sa-eyebrow sa-eyebrow--dot sa-reveal">Eigene Produkte</p>
				<h2 class="sa-section__title sa-reveal" id="sa-work-products-title">Design-Beispiele aus dem eigenen Studio</h2>
				<p class="sa-section__intro sa-reveal">
					Kleine digitale Produkte, an denen ich Gestaltung und Umsetzung ausprobiere – keine
					Produktlinie, sondern Beispiele für die Arbeitsweise.
				</p>
			</div>

			<ul class="sa-projects sa-projects--muted sa-stagger">
				<?php foreach ( $sa_products as $project ) : ?>
					<li class="sa-projects__item sa-reveal">
						<a class="sa-projects__link" href="<?php echo esc_url( $project['url'] ); ?>">
							<span class="sa-projects__meta"><?php echo esc_html( $project['meta'] ); ?></span>
							<h3 class="sa-projects__name"><?php echo esc_html( $project['name'] ); ?></h3>
							<p class="sa-projects__text"><?php echo esc_html( $project['text'] ); ?></p>
							<span class="sa-inline-cta">Projektnotiz lesen <span class="sa-btn__arrow" aria-hidden="true">&rarr;</span></span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</section>

		<section class="sa-work-contact-section sa-reveal">
			<span class="sa-about-eyebrow">SAG HALLO</span>
			<h2 class="sa-work-contact-title">Du hast etwas im Kopf?</h2>
			<p class="sa-work-contact-sub">Lass uns sprechen, ob und wie ich dich begleiten kann.</p>

			<div class="sa-work-contact-actions">
				<a class="sa-work-contact-link" href="<?php echo esc_url( $sa_home . 'contact/' ); ?>">
					PROJEKT BESPRECHEN <span class="sa-exp-arrow">&rarr;</span>
				</a>
				<a class="sa-work-services-link" href="<?php echo esc_url( $sa_home . 'services/' ); ?>">
					LEISTUNGEN ENTDECKEN <span aria-hidden="true">&rarr;</span>
				</a>
			</div>
		</section>

	</div>
</main>

<?php get_template_part( 'parts/sa-footer' ); ?>

<?php wp_footer(); ?>
</body>
</html>
