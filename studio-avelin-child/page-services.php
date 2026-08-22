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
					<?php echo wp_kses_post( sa_child_text( 'Websites, mit <span class="sa-lime-text">Sorgfalt</span> gestaltet.', 'websites, shaped with <span class="sa-lime-text">care</span>.' ) ); ?>
				</h1>
				<div class="sa-services-page-hero__intro">
					<p>
						<?php echo esc_html( sa_child_text( 'Studio Avelin gestaltet und entwickelt fokussierte Websites für Selbstständige, kleine Unternehmen und Menschen mit einer klaren Idee.', 'Studio Avelin designs and builds focused websites for independent professionals, small businesses and people with a clear idea.' ) ); ?>
					</p>
					<p>
						<?php echo wp_kses_post( sa_child_text( 'Struktur, visuelle Richtung und Entwicklung bleiben in einem direkten Prozess &ndash; vom ersten Gespräch bis zum Launch.', 'Structure, visual direction and development stay in one direct process &mdash; from the first conversation to launch.' ) ); ?>
					</p>
				</div>
			</div>

			<aside class="sa-services-page-note">
				<span class="sa-services-page-note__line" aria-hidden="true"></span>
				<p><?php echo esc_html( sa_child_text( 'Ein kleines, unabhängiges Studio.', 'A small, independent practice.' ) ); ?></p>
				<p><?php echo esc_html( sa_child_text( 'Direkte Zusammenarbeit.', 'Direct collaboration.' ) ); ?></p>
				<p><?php echo esc_html( sa_child_text( 'Design und Entwicklung aus einer Hand.', 'Design and development in one place.' ) ); ?></p>
			</aside>
		</section>

		<section class="sa-services-page-offers" aria-labelledby="sa-services-page-offers-title">
			<div class="sa-services-page-section-head">
				<span class="sa-about-eyebrow"><?php echo esc_html( sa_child_text( 'WOBEI ICH HELFEN KANN', 'WHAT I CAN HELP WITH' ) ); ?></span>
				<h2 id="sa-services-page-offers-title"><?php echo esc_html( sa_child_text( 'Eine klare Website, aufgebaut um das, was zählt.', 'A clear website, built around what matters.' ) ); ?></h2>
			</div>

			<div class="sa-services-page-list">
				<article class="sa-services-page-service">
					<span class="sa-services-page-service__number">01</span>
					<div class="sa-services-page-service__main">
						<h3><?php echo esc_html( sa_child_text( 'Individuelle Websites', 'Custom Websites' ) ); ?></h3>
						<p><?php echo esc_html( sa_child_text( 'Eine vollständige Website, abgestimmt auf deine Arbeit, Zielgruppe und Ziele – mit einer eigens für das Projekt entwickelten Struktur und visuellen Richtung.', 'A complete website shaped around your work, audience and goals, with a structure and visual direction developed specifically for the project.' ) ); ?></p>
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
						<p><?php echo esc_html( sa_child_text( 'Ein fokussierter digitaler Auftritt für eine Person, Dienstleistung, ein Produkt oder einen Launch – klar verständlich und eigenständig genug, um im Gedächtnis zu bleiben.', 'A focused digital presence for a person, service, product or launch — clear enough to understand and distinct enough to remember.' ) ); ?></p>
					</div>
					<ul class="sa-services-page-service__details">
						<li><?php echo esc_html( sa_child_text( 'Klare Seitenführung und Botschaft', 'Clear page flow and messaging' ) ); ?></li>
						<li><?php echo esc_html( sa_child_text( 'Individuelle visuelle Richtung', 'Individual visual direction' ) ); ?></li>
						<li><?php echo esc_html( sa_child_text( 'Fokussierter Kontakt- oder Conversion-Weg', 'Focused contact or conversion path' ) ); ?></li>
					</ul>
				</article>

				<article class="sa-services-page-service">
					<span class="sa-services-page-service__number">03</span>
					<div class="sa-services-page-service__main">
						<h3><?php echo esc_html( sa_child_text( 'WordPress & redaktionelle Systeme', 'WordPress & Editorial Systems' ) ); ?></h3>
						<p><?php echo esc_html( sa_child_text( 'Individuelle Publishing-Systeme für Websites, Journals und wachsende Inhalte, die auch nach dem Launch unkompliziert nutzbar bleiben.', 'Custom publishing systems for websites, journals and evolving content that remain straightforward to use after launch.' ) ); ?></p>
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
						<p><?php echo esc_html( sa_child_text( 'Gezielte Verbesserungen für bestehende Websites, deren Grundlage funktioniert, bei denen Design, Nutzungserlebnis oder Performance aber Aufmerksamkeit brauchen.', 'Targeted improvements for an existing website when the foundation is useful but the design, experience or performance needs attention.' ) ); ?></p>
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
				<h2 id="sa-services-process-title"><?php echo esc_html( sa_child_text( 'Ein direkter Prozess.', 'One direct process.' ) ); ?></h2>
				<p><?php echo esc_html( sa_child_text( 'Du arbeitest durchgehend direkt mit mir. Wir klären, was die Website braucht, treffen die wichtigen Entscheidungen gemeinsam und entwickeln sie als zusammenhängendes Ganzes.', 'You work directly with me throughout. We define what the website needs, make the important decisions together and refine it as one coherent piece of work.' ) ); ?></p>
			</div>

			<ol class="sa-services-process__steps">
				<li><span>01</span><strong><?php echo esc_html( sa_child_text( 'Verstehen', 'Understand' ) ); ?></strong><p><?php echo esc_html( sa_child_text( 'Deine Arbeit, Zielgruppe, Ziele und den tatsächlichen Umfang des Projekts.', 'Your work, audience, goals and the real scope of the project.' ) ); ?></p></li>
				<li><span>02</span><strong><?php echo esc_html( sa_child_text( 'Strukturieren', 'Structure' ) ); ?></strong><p><?php echo esc_html( sa_child_text( 'Inhalte, Hierarchie und einen klaren Weg durch die Website.', 'Content, hierarchy and a clear path through the website.' ) ); ?></p></li>
				<li><span>03</span><strong><?php echo esc_html( sa_child_text( 'Gestalten & entwickeln', 'Design & Build' ) ); ?></strong><p><?php echo esc_html( sa_child_text( 'Visuelle Richtung und Entwicklung werden von Anfang an gemeinsam gedacht.', 'Visual direction and development shaped together from the start.' ) ); ?></p></li>
				<li><span>04</span><strong><?php echo esc_html( sa_child_text( 'Verfeinern & veröffentlichen', 'Refine & Launch' ) ); ?></strong><p><?php echo esc_html( sa_child_text( 'Details, responsives Verhalten, Performance und eine sorgfältige Übergabe.', 'Details, responsive behaviour, performance and a careful handover.' ) ); ?></p></li>
			</ol>
		</section>

		<section class="sa-services-fit" aria-labelledby="sa-services-fit-title">
			<div>
				<span class="sa-about-eyebrow"><?php echo esc_html( sa_child_text( 'GUTE ZUSAMMENARBEIT', 'A GOOD FIT' ) ); ?></span>
				<h2 id="sa-services-fit-title"><?php echo esc_html( sa_child_text( 'Klein genug, um persönlich zu bleiben. Strukturiert genug, um es richtig zu machen.', 'Small enough to stay personal. Structured enough to do it properly.' ) ); ?></h2>
			</div>
			<div class="sa-services-fit__body">
				<p><?php echo esc_html( sa_child_text( 'Diese Arbeitsweise passt gut, wenn dir klare Kommunikation, durchdachtes Design und der direkte Kontakt zur umsetzenden Person wichtig sind.', 'This way of working is a good fit when you value clear communication, thoughtful design and direct access to the person doing the work.' ) ); ?></p>
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
