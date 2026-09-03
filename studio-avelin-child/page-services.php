<?php
/**
 * Studio Avelin — Leistungen.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_home = trailingslashit( home_url( '/' ) );

$sa_offers = array(
	array(
		'title'    => 'Individuelle Websites',
		'text'     => 'Eine vollständige Website, abgestimmt auf deine Arbeit, deine Zielgruppe und deine Ziele. Struktur und Gestaltung entstehen passend zum Projekt.',
		'included' => array(
			'Struktur und inhaltliche Richtung',
			'Visuelles Design und responsive Layouts',
			'Frontend-Entwicklung und Launch',
		),
	),
	array(
		'title'    => 'Landingpages & Portfolios',
		'text'     => 'Ein kompakter digitaler Auftritt für eine Person, eine Dienstleistung, ein Produkt oder einen Launch – leicht verständlich und mit einem eigenständigen Charakter.',
		'included' => array(
			'Klare Seitenführung und Botschaft',
			'Individuelle visuelle Richtung',
			'Ein einfacher Weg zur Kontaktaufnahme',
		),
	),
	array(
		'title'    => 'WordPress & redaktionelle Systeme',
		'text'     => 'Individuelle WordPress-Systeme für Websites, Journals und wachsende Inhalte – so aufgebaut, dass sie auch nach dem Launch einfach zu bedienen bleiben.',
		'included' => array(
			'Individuelle WordPress-Umsetzung',
			'Sinnvolle Inhaltsstrukturen',
			'Einfache Pflege und Übergabe',
		),
	),
	array(
		'title'    => 'Optimierung, Betreuung & Beratung',
		'text'     => 'Gezielte Verbesserungen für bestehende Websites, wenn die Grundlage stimmt – und auf Wunsch laufende Betreuung: Beratung zu Inhalten, Sichtbarkeit und Marketing.',
		'included' => array(
			'Verfeinerung von Design, Abständen und Performance',
			'Beratung zu Inhalten, SEO und Sichtbarkeit',
			'Persönliche Betreuung, auch nach dem Launch',
		),
	),
);

$sa_process = array(
	array( 'Verstehen', 'Deine Arbeit, Zielgruppe, Ziele und den tatsächlichen Umfang des Projekts.' ),
	array( 'Strukturieren', 'Inhalte, Hierarchie und einen klaren Weg durch die Website.' ),
	array( 'Gestalten & entwickeln', 'Design und technische Umsetzung entstehen gemeinsam statt nacheinander.' ),
	array( 'Verfeinern & veröffentlichen', 'Zum Schluss werden Details, mobile Darstellung und Performance geprüft und alles sauber übergeben.' ),
);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( array( 'home', 'sa-front', 'sa-page', 'sa-page--services' ) ); ?>>
<?php wp_body_open(); ?>

<a class="sa-skip" href="#sa-main">Zum Inhalt springen</a>

<?php get_template_part( 'parts/sa-header' ); ?>

<main class="sa-main" id="sa-main">
	<div class="sa-about-container">

		<section class="sa-services-page-hero sa-reveal">
			<div>
				<span class="sa-about-eyebrow">LEISTUNGEN</span>
				<h1 class="sa-about-hero-headline">
					<?php echo wp_kses_post( 'Websites, die <span class="sa-lime-text">gut aussehen</span> und gut funktionieren.' ); ?>
				</h1>
				<div class="sa-services-page-hero__intro">
					<p>
						Studio Avelin gestaltet und entwickelt individuelle Websites für Selbstständige und
						kleine Unternehmen.
					</p>
					<p>
						Von Struktur und Inhalt über das Design bis zur technischen Umsetzung bleibt alles in
						einem abgestimmten Prozess &ndash; vom ersten Gespräch bis zum Launch und, auf Wunsch,
						darüber hinaus.
					</p>
				</div>
			</div>

			<aside class="sa-services-page-note">
				<span class="sa-services-page-note__line" aria-hidden="true"></span>
				<p>Ein kleines, unabhängiges Studio.</p>
				<p>Direkte Zusammenarbeit, persönliche Betreuung.</p>
				<p>Ein Ansprechpartner für Design, Entwicklung und Beratung.</p>
			</aside>
		</section>

		<section class="sa-services-page-offers" aria-labelledby="sa-services-page-offers-title">
			<div class="sa-services-page-section-head sa-reveal">
				<span class="sa-about-eyebrow">WOBEI ICH HELFEN KANN</span>
				<h2 id="sa-services-page-offers-title">Die passende Website für deine Arbeit.</h2>
			</div>

			<div class="sa-services-page-list sa-stagger">
				<?php foreach ( $sa_offers as $index => $offer ) : ?>
					<article class="sa-services-page-service sa-reveal">
						<span class="sa-services-page-service__number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<div class="sa-services-page-service__main">
							<h3><?php echo esc_html( $offer['title'] ); ?></h3>
							<p><?php echo esc_html( $offer['text'] ); ?></p>
						</div>
						<ul class="sa-services-page-service__details">
							<?php foreach ( $offer['included'] as $item ) : ?>
								<li><?php echo esc_html( $item ); ?></li>
							<?php endforeach; ?>
						</ul>
					</article>
				<?php endforeach; ?>
			</div>
		</section>

		<section class="sa-services-process" aria-labelledby="sa-services-process-title">
			<div class="sa-services-process__intro sa-reveal">
				<span class="sa-about-eyebrow">DER PROZESS</span>
				<h2 id="sa-services-process-title">Ein klarer Weg zur fertigen Website.</h2>
				<p>Du arbeitest vom Anfang bis zum Ende direkt mit mir. Gemeinsam klären wir die
					Anforderungen, treffen die wichtigen Entscheidungen und bringen die Website
					Schritt für Schritt bis zum Launch.</p>
			</div>

			<ol class="sa-services-process__steps sa-stagger">
				<?php foreach ( $sa_process as $index => $step ) : ?>
					<li class="sa-reveal">
						<span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<strong><?php echo esc_html( $step[0] ); ?></strong>
						<p><?php echo esc_html( $step[1] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ol>
		</section>

		<section class="sa-services-fit" aria-labelledby="sa-services-fit-title">
			<div class="sa-reveal">
				<span class="sa-about-eyebrow">GUTE ZUSAMMENARBEIT</span>
				<h2 id="sa-services-fit-title">Persönliche Zusammenarbeit ohne unnötige Umwege.</h2>
			</div>
			<div class="sa-services-fit__body sa-reveal">
				<p>Diese Arbeitsweise passt gut, wenn dir eine verlässliche Abstimmung, gutes Design
					und der direkte Kontakt zur umsetzenden Person wichtig sind.</p>
				<ul>
					<li>Du brauchst eine neue Website mit einem klaren Zweck.</li>
					<li>Design und Entwicklung sollen zusammengehören.</li>
					<li>Du bevorzugst eine enge, praktische Zusammenarbeit.</li>
					<li>Details sind dir wichtig, ohne den Prozess unnötig kompliziert zu machen.</li>
				</ul>
			</div>
		</section>

		<section class="sa-services-contact sa-reveal">
			<span class="sa-about-eyebrow">PROJEKT STARTEN</span>
			<h2>Du hast etwas im Kopf?</h2>
			<p>Erzähl mir, woran du arbeitest, was die Website leisten soll und wo du gerade stehst.</p>
			<a href="<?php echo esc_url( $sa_home . 'contact/' ); ?>">PROJEKT ANFRAGEN <span aria-hidden="true">&rarr;</span></a>
		</section>

	</div>
</main>

<?php get_template_part( 'parts/sa-footer' ); ?>

<?php wp_footer(); ?>
</body>
</html>
