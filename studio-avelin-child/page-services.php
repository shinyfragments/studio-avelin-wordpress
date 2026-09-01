<?php
/**
 * Studio Avelin — Leistungen (3-Ebenen-Angebot).
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_home = trailingslashit( home_url( '/' ) );

$sa_offers = array(
	array(
		'title'    => 'Website-Projekt',
		'text'     => 'Deine Website ist oft der erste Eindruck deiner Marke. Ich gestalte sie individuell, klar geführt und technisch sauber umgesetzt – kein Baukasten, sondern ein Auftritt mit eigener Handschrift.',
		'included' => array(
			'Individuelles Design-Konzept',
			'Klare Nutzerführung',
			'Technische Umsetzung',
			'SEO-Grundstruktur',
			'Persönliche Begleitung während des gesamten Projekts',
		),
	),
	array(
		'title'    => 'Branding-Projekt',
		'text'     => 'Bevor eine Website entsteht, muss klar sein, wofür deine Marke steht. Gemeinsam schärfen wir Positionierung, Zielgruppe und Tonalität – daraus entsteht ein Design-Konzept, das das trägt.',
		'included' => array(
			'Positionierung & Zielgruppendefinition',
			'Tonalität',
			'Design-Konzept',
			'Aufbau eines Reporting-Rahmens',
		),
	),
	array(
		'title'    => 'Langfristige Begleitung',
		'text'     => 'Ich verschwinde nach dem Projekt nicht. Als Sparringspartner behalte ich deine Sichtbarkeit im Blick – SEO, Content, Performance.',
		'included' => array(
			'SEO-Check und technisches SEO',
			'Content-Empfehlungen (auf Wunsch inkl. Texten)',
			'Performance-Review',
			'GEO-Check',
			'Social-Media-Beratung',
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
					<?php echo wp_kses_post( 'Von der <span class="sa-lime-text">Haltung</span> bis zur Sichtbarkeit.' ); ?>
				</h1>
				<div class="sa-services-page-hero__intro">
					<p>
						Ich begleite kleine, inhabergeführte Marken persönlich – von der Positionierung
						über das Design bis zur Sichtbarkeit.
					</p>
					<p>
						Verkauft wird kein Leistungspaket von der Stange, sondern Haltung, Designgespür
						und ein direkter Ansprechpartner: ich.
					</p>
				</div>
			</div>

			<aside class="sa-services-page-note">
				<span class="sa-services-page-note__line" aria-hidden="true"></span>
				<p>Ein kleines, unabhängiges Studio.</p>
				<p>Direkte Zusammenarbeit.</p>
				<p>Ein Ansprechpartner für Marke, Design und Sichtbarkeit.</p>
			</aside>
		</section>

		<section class="sa-services-page-offers" aria-labelledby="sa-services-page-offers-title">
			<div class="sa-services-page-section-head sa-reveal">
				<span class="sa-about-eyebrow">DREI EBENEN</span>
				<h2 id="sa-services-page-offers-title">Das passende Angebot für deine Marke.</h2>
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

			<p class="sa-services-page-offers__note sa-reveal">
				Branding-Projekt und langfristige Begleitung greifen ineinander: das Branding-Projekt
				baut den Reporting-Rahmen auf, die Begleitung nutzt und interpretiert ihn laufend.
			</p>
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
					<li>Deine Person oder deine Marke ist der Kern deines Angebots.</li>
					<li>Marke, Design und Sichtbarkeit sollen zusammengehören.</li>
					<li>Du entscheidest selbst, ohne Marketing-Team dazwischen.</li>
					<li>Details sind dir wichtig, ohne den Prozess unnötig kompliziert zu machen.</li>
				</ul>
			</div>
		</section>

		<section class="sa-services-contact sa-reveal">
			<span class="sa-about-eyebrow">PROJEKT BESPRECHEN</span>
			<h2>Du hast etwas im Kopf?</h2>
			<p>Erzähl mir, woran du arbeitest, was die Website leisten soll und wo du gerade stehst.</p>
			<a href="<?php echo esc_url( $sa_home . 'contact/' ); ?>">PROJEKT BESPRECHEN <span aria-hidden="true">&rarr;</span></a>
		</section>

	</div>
</main>

<?php get_template_part( 'parts/sa-footer' ); ?>

<?php wp_footer(); ?>
</body>
</html>
