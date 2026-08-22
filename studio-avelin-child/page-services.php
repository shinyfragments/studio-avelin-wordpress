<?php
/**
 * Studio Avelin — Services page template.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_home = trailingslashit( sa_child_language_url( sa_child_language() ) );
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

<a class="sa-skip" href="#sa-main"><?php echo esc_html( sa_child_text( 'Zum Inhalt springen', 'Skip to content' ) ); ?></a>

<?php get_template_part( 'parts/sa-header' ); ?>

<main class="sa-main" id="sa-main">
	<div class="sa-about-container">

		<section class="sa-services-page-hero">
			<div>
				<span class="sa-about-eyebrow"><?php echo esc_html( sa_child_text( 'LEISTUNGEN', 'SERVICES' ) ); ?></span>
				<h1 class="sa-about-hero-headline">
					<?php echo wp_kses_post( sa_child_text( 'Websites, die <span class="sa-lime-text">gut aussehen</span> und gut funktionieren.', 'Websites that <span class="sa-lime-text">look good</span> and work well.' ) ); ?>
				</h1>
				<div class="sa-services-page-hero__intro">
					<p>
						<?php echo esc_html( sa_child_text( 'Studio Avelin gestaltet und entwickelt individuelle Websites für Selbstständige und kleine Unternehmen.', 'Studio Avelin designs and builds custom websites for independent professionals and small businesses.' ) ); ?>
					</p>
					<p>
						<?php echo wp_kses_post( sa_child_text( 'Von Struktur und Inhalt über das Design bis zur technischen Umsetzung bleibt alles in einem abgestimmten Prozess &ndash; vom ersten Gespräch bis zum Launch.', 'From structure and content to design and development, everything stays connected &mdash; from the first conversation to launch.' ) ); ?>
					</p>
				</div>
			</div>

			<aside class="sa-services-page-note">
				<span class="sa-services-page-note__line" aria-hidden="true"></span>
				<p><?php echo esc_html( sa_child_text( 'Ein kleines, unabhängiges Studio.', 'A small, independent practice.' ) ); ?></p>
				<p><?php echo esc_html( sa_child_text( 'Direkte Zusammenarbeit.', 'Direct collaboration.' ) ); ?></p>
				<p><?php echo esc_html( sa_child_text( 'Ein Ansprechpartner für Design und Entwicklung.', 'One point of contact for design and development.' ) ); ?></p>
			</aside>
		</section>

		<section class="sa-services-page-offers" aria-labelledby="sa-services-page-offers-title">
			<div class="sa-services-page-section-head">
				<span class="sa-about-eyebrow"><?php echo esc_html( sa_child_text( 'WOBEI ICH HELFEN KANN', 'WHAT I CAN HELP WITH' ) ); ?></span>
				<h2 id="sa-services-page-offers-title"><?php echo esc_html( sa_child_text( 'Die passende Website für deine Arbeit.', 'The right website for the work you do.' ) ); ?></h2>
			</div>

			<div class="sa-services-page-list">
				<article class="sa-services-page-service">
					<span class="sa-services-page-service__number">01</span>
					<div class="sa-services-page-service__main">
						<h3><?php echo esc_html( sa_child_text( 'Individuelle Websites', 'Custom Websites' ) ); ?></h3>
						<p><?php echo esc_html( sa_child_text( 'Eine vollständige Website, abgestimmt auf deine Arbeit, deine Zielgruppe und deine Ziele. Struktur und Gestaltung entstehen passend zum Projekt.', 'A complete website shaped around your work, your audience and your goals. Its structure and design are developed specifically for the project.' ) ); ?></p>
					</div>
					<ul class="sa-services-page-service__details">
						<li><?php echo esc_html( sa_child_text( 'Struktur und inhaltliche Richtung', 'Structure and content direction' ) ); ?></li>
						<li><?php echo esc_html( sa_child_text( 'Visuelles Design und responsive Layouts', 'Visual design and responsive layouts' ) ); ?></li>
						<li><?php echo esc_html( sa_child_text( 'Frontend-Entwicklung und Launch', 'Frontend development and launch' ) ); ?></li>
					</ul>
				</article>

				<article class="sa-services-page-service">
					<span class="sa-services-page-service__number">02</span>
					<div class="sa-services-page-service__main">
						<h3><?php echo esc_html( sa_child_text( 'Landingpages & Portfolios', 'Landing Pages & Portfolios' ) ); ?></h3>
						<p><?php echo esc_html( sa_child_text( 'Ein kompakter digitaler Auftritt für eine Person, eine Dienstleistung, ein Produkt oder einen Launch – leicht verständlich und mit einem eigenständigen Charakter.', 'A compact digital presence for a person, service, product or launch — easy to understand and distinctive enough to remember.' ) ); ?></p>
					</div>
					<ul class="sa-services-page-service__details">
						<li><?php echo esc_html( sa_child_text( 'Klare Seitenführung und Botschaft', 'Clear page flow and messaging' ) ); ?></li>
						<li><?php echo esc_html( sa_child_text( 'Individuelle visuelle Richtung', 'Individual visual direction' ) ); ?></li>
						<li><?php echo esc_html( sa_child_text( 'Ein einfacher Weg zur Kontaktaufnahme', 'A simple path to contact or conversion' ) ); ?></li>
					</ul>
				</article>

				<article class="sa-services-page-service">
					<span class="sa-services-page-service__number">03</span>
					<div class="sa-services-page-service__main">
						<h3><?php echo esc_html( sa_child_text( 'WordPress & redaktionelle Systeme', 'WordPress & Editorial Systems' ) ); ?></h3>
						<p><?php echo esc_html( sa_child_text( 'Individuelle WordPress-Systeme für Websites, Journals und wachsende Inhalte – so aufgebaut, dass sie auch nach dem Launch einfach zu bedienen bleiben.', 'Custom WordPress systems for websites, journals and growing content — built to remain easy to use after launch.' ) ); ?></p>
					</div>
					<ul class="sa-services-page-service__details">
						<li><?php echo esc_html( sa_child_text( 'Individuelle WordPress-Umsetzung', 'Custom WordPress implementation' ) ); ?></li>
						<li><?php echo esc_html( sa_child_text( 'Sinnvolle Inhaltsstrukturen', 'Useful content structures' ) ); ?></li>
						<li><?php echo esc_html( sa_child_text( 'Einfache Pflege und Übergabe', 'Simple editing and handover' ) ); ?></li>
					</ul>
				</article>

				<article class="sa-services-page-service">
					<span class="sa-services-page-service__number">04</span>
					<div class="sa-services-page-service__main">
						<h3><?php echo esc_html( sa_child_text( 'Website-Optimierung & laufende Betreuung', 'Website Refinement & Ongoing Care' ) ); ?></h3>
						<p><?php echo esc_html( sa_child_text( 'Gezielte Verbesserungen für bestehende Websites, wenn die Grundlage stimmt, aber Design, Bedienbarkeit oder Performance noch besser werden können.', 'Targeted improvements for existing websites when the foundation works but the design, usability or performance can be better.' ) ); ?></p>
					</div>
					<ul class="sa-services-page-service__details">
						<li><?php echo esc_html( sa_child_text( 'Verfeinerung von Design und Abständen', 'Design and spacing refinement' ) ); ?></li>
						<li><?php echo esc_html( sa_child_text( 'Verbesserungen an Bedienbarkeit und Performance', 'Usability and performance improvements' ) ); ?></li>
						<li><?php echo esc_html( sa_child_text( 'Kleine, bewusste Iterationen', 'Small, deliberate iterations' ) ); ?></li>
					</ul>
				</article>
			</div>
		</section>

		<section class="sa-services-process" aria-labelledby="sa-services-process-title">
			<div class="sa-services-process__intro">
				<span class="sa-about-eyebrow"><?php echo esc_html( sa_child_text( 'DER PROZESS', 'THE PROCESS' ) ); ?></span>
				<h2 id="sa-services-process-title"><?php echo esc_html( sa_child_text( 'Ein klarer Weg zur fertigen Website.', 'A clear process from idea to launch.' ) ); ?></h2>
				<p><?php echo esc_html( sa_child_text( 'Du arbeitest vom Anfang bis zum Ende direkt mit mir. Gemeinsam klären wir die Anforderungen, treffen die wichtigen Entscheidungen und bringen die Website Schritt für Schritt bis zum Launch.', 'You work directly with me from start to finish. Together we define the requirements, make the important decisions and move the website forward step by step.' ) ); ?></p>
			</div>

			<ol class="sa-services-process__steps">
				<li><span>01</span><strong><?php echo esc_html( sa_child_text( 'Verstehen', 'Understand' ) ); ?></strong><p><?php echo esc_html( sa_child_text( 'Deine Arbeit, Zielgruppe, Ziele und den tatsächlichen Umfang des Projekts.', 'Your work, audience, goals and the real scope of the project.' ) ); ?></p></li>
				<li><span>02</span><strong><?php echo esc_html( sa_child_text( 'Strukturieren', 'Structure' ) ); ?></strong><p><?php echo esc_html( sa_child_text( 'Inhalte, Hierarchie und einen klaren Weg durch die Website.', 'Content, hierarchy and a clear path through the website.' ) ); ?></p></li>
				<li><span>03</span><strong><?php echo esc_html( sa_child_text( 'Gestalten & entwickeln', 'Design & Build' ) ); ?></strong><p><?php echo esc_html( sa_child_text( 'Design und technische Umsetzung entstehen gemeinsam statt nacheinander.', 'Design and development move forward together rather than as separate stages.' ) ); ?></p></li>
				<li><span>04</span><strong><?php echo esc_html( sa_child_text( 'Verfeinern & veröffentlichen', 'Refine & Launch' ) ); ?></strong><p><?php echo esc_html( sa_child_text( 'Zum Schluss werden Details, mobile Darstellung und Performance geprüft und alles sauber übergeben.', 'Finally, the details, mobile experience and performance are checked before a clean handover.' ) ); ?></p></li>
			</ol>
		</section>

		<section class="sa-services-fit" aria-labelledby="sa-services-fit-title">
			<div>
				<span class="sa-about-eyebrow"><?php echo esc_html( sa_child_text( 'GUTE ZUSAMMENARBEIT', 'A GOOD FIT' ) ); ?></span>
				<h2 id="sa-services-fit-title"><?php echo esc_html( sa_child_text( 'Persönliche Zusammenarbeit ohne unnötige Umwege.', 'Personal collaboration without unnecessary layers.' ) ); ?></h2>
			</div>
			<div class="sa-services-fit__body">
				<p><?php echo esc_html( sa_child_text( 'Diese Arbeitsweise passt gut, wenn dir eine verlässliche Abstimmung, gutes Design und der direkte Kontakt zur umsetzenden Person wichtig sind.', 'This way of working is a good fit if you value reliable communication, strong design and direct contact with the person doing the work.' ) ); ?></p>
				<ul>
					<li><?php echo esc_html( sa_child_text( 'Du brauchst eine neue Website mit einem klaren Zweck.', 'You need a new website with a clear purpose.' ) ); ?></li>
					<li><?php echo esc_html( sa_child_text( 'Design und Entwicklung sollen zusammengehören.', 'You want design and development to feel connected.' ) ); ?></li>
					<li><?php echo esc_html( sa_child_text( 'Du bevorzugst eine enge, praktische Zusammenarbeit.', 'You prefer a close, practical collaboration.' ) ); ?></li>
					<li><?php echo esc_html( sa_child_text( 'Details sind dir wichtig, ohne den Prozess unnötig kompliziert zu machen.', 'You care about details without making the process complicated.' ) ); ?></li>
				</ul>
			</div>
		</section>

		<section class="sa-services-contact">
			<span class="sa-about-eyebrow"><?php echo esc_html( sa_child_text( 'PROJEKT STARTEN', 'START A PROJECT' ) ); ?></span>
			<h2><?php echo esc_html( sa_child_text( 'Du hast etwas im Kopf?', 'Have something in mind?' ) ); ?></h2>
			<p><?php echo esc_html( sa_child_text( 'Erzähl mir, woran du arbeitest, was die Website leisten soll und wo du gerade stehst.', 'Tell me what you are working on, what the website should do and where you are right now.' ) ); ?></p>
			<a href="mailto:hello@studio-avelin.com">HELLO@STUDIO-AVELIN.COM <span aria-hidden="true">&rarr;</span></a>
		</section>

	</div>
</main>

<?php get_template_part( 'parts/sa-footer' ); ?>

<?php wp_footer(); ?>
</body>
</html>
