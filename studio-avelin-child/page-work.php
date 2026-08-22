<?php
/**
 * Studio Avelin — Work page template.
 *
 * Selected client work and independent Studio Avelin products.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_home        = function_exists( 'pll_home_url' )
	? trailingslashit( pll_home_url( sa_child_language() ) )
	: trailingslashit( home_url( '/' ) );
$sa_nav         = sa_child_nav_items( 'header' );
$sa_footer_nav = sa_child_nav_items( 'footer' );
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

<a class="sa-skip" href="#sa-main"><?php echo esc_html( sa_child_text( 'Zum Inhalt springen', 'Skip to content' ) ); ?></a>

<?php get_template_part( 'parts/sa-header' ); ?>

<!-- ========================= MAIN CONTENT ========================= -->
<main class="sa-main" id="sa-main">
	<div class="sa-about-container">

		<!-- HERO SECTION -->
		<section class="sa-exp-hero">
			<div class="sa-exp-hero__left">
				<span class="sa-about-eyebrow"><?php echo esc_html( sa_child_text( 'AUSGEWÄHLTE PROJEKTE', 'SELECTED WORK' ) ); ?></span>

				<h1 class="sa-about-hero-headline">
					<?php echo wp_kses_post( sa_child_text( 'Für <span class="sa-lime-text">echte Aufgaben</span> gestaltet.', 'Built for <span class="sa-lime-text">real use</span>.' ) ); ?>
				</h1>

				<div class="sa-about-intro" style="max-width: 650px;">
					<p>
						<?php echo wp_kses_post( sa_child_text( 'Eine Auswahl aus Kundenprojekten und eigenen digitalen Produkten.<br />Überschaubar im Umfang. Durchdacht in der Umsetzung. Gemacht für den Alltag.', 'A selection of client projects and independent digital products.<br />Focused in scope. Carefully made. Useful in everyday life.' ) ); ?>
					</p>
				</div>
			</div>

			<div class="sa-exp-hero__right">
				<div class="sa-exp-hero-note">
					<span class="sa-exp-lime-line" aria-hidden="true"></span>
					<p class="sa-exp-hero-note__text">
						<?php echo wp_kses_post( sa_child_text( 'Kundenprojekte und eigene Produkte.<br />Gestaltet, entwickelt und verfeinert<br />im direkten Austausch.', 'Client work and independent products.<br />Designed, built and refined<br />through direct collaboration.' ) ); ?>
					</p>
				</div>
			</div>
		</section>

		<!-- INDEX BAR -->
		<div class="sa-work-index-bar">
			<span><?php echo wp_kses_post( sa_child_text( 'PROJEKTE &middot; 01&mdash;04', 'PROJECTS &middot; 01&mdash;04' ) ); ?></span>
		</div>

		<!-- ================= PROJECT 01: FEATURED (STAN) ================= -->
		<section class="sa-work-featured-section">
			<div class="sa-work-featured-grid">

				<!-- LEFT: INFO -->
				<div class="sa-work-featured-info">
					<div class="sa-work-meta-top">
						<span class="sa-work-num">01</span>
						<span class="sa-work-status-tag sa-work-status-tag--live">
							<span class="sa-work-status-dot"></span> LIVE
						</span>
						<span class="sa-exp-card__eyebrow"><?php echo esc_html( sa_child_text( 'DIGITALES PRODUKT', 'DIGITAL PRODUCT' ) ); ?></span>
					</div>

					<h2 class="sa-work-title">STAN</h2>
					<span class="sa-work-fullname">Studio Avelin Notes</span>

					<h3 class="sa-work-tagline"><?php echo esc_html( sa_child_text( 'Ein ruhiger Ort für Ideen.', 'A calm place for ideas.' ) ); ?></h3>

					<p class="sa-work-desc">
						<?php echo esc_html( sa_child_text( 'STAN ist eine Notiz- und Denk-App für Ideen, Bereiche, Notizen und Tags. Sie reduziert Ablenkung, schafft Ordnung und gibt Gedanken einen festen Platz.', 'STAN is a notes and thinking app for ideas, spaces, notes and tags. It reduces distractions, creates structure and gives thoughts a place to stay.' ) ); ?>
					</p>

					<!-- DETAILS ROW -->
					<div class="sa-work-details-row">
						<div class="sa-work-detail-item">
							<span class="sa-work-detail-label"><?php echo esc_html( sa_child_text( 'TYP', 'TYPE' ) ); ?></span>
							<span class="sa-work-detail-val"><?php echo esc_html( sa_child_text( 'Persönliche Produktivitäts-App', 'Personal productivity app' ) ); ?></span>
						</div>
						<div class="sa-work-detail-item">
							<span class="sa-work-detail-label">FOCUS</span>
							<span class="sa-work-detail-val"><?php echo esc_html( sa_child_text( 'Notizen + Denken', 'Notes + thinking' ) ); ?></span>
						</div>
						<div class="sa-work-detail-item">
							<span class="sa-work-detail-label"><?php echo esc_html( sa_child_text( 'TECHNIK', 'BUILT WITH' ) ); ?></span>
							<span class="sa-work-detail-val">React / Supabase / Vercel</span>
						</div>
					</div>

					<div class="sa-work-cta-box" style="margin-top: 2rem;">
						<a class="sa-about-cta-btn" href="<?php echo esc_url( $sa_home . 'work/stan/' ); ?>">
							<span><?php echo esc_html( sa_child_text( 'PROJEKT ANSEHEN', 'VIEW PROJECT' ) ); ?></span>
							<span class="sa-about-cta-arrow">&rarr;</span>
						</a>
					</div>
				</div>

				<!-- RIGHT: PREVIEW -->
				<div class="sa-work-featured-preview">
					<div class="sa-work-browser-frame">
						<div class="sa-work-browser-bar">
							<span class="sa-work-browser-dot"></span>
							<span class="sa-work-browser-dot"></span>
							<span class="sa-work-browser-dot"></span>
							<span class="sa-work-browser-url">stan.studio-avelin.com</span>
						</div>
						<div class="sa-work-browser-content">
							<div class="sa-work-app-ui">
								<div class="sa-work-app-sidebar">
									<div class="sa-work-app-brand">STAN //</div>
									<div class="sa-work-app-menu">
										<span class="is-active">&bull; All Notes</span>
										<span>&bull; Ideas &amp; Thoughts</span>
										<span>&bull; Projects</span>
										<span>&bull; Archive</span>
									</div>
								</div>
								<div class="sa-work-app-main">
									<div class="sa-work-app-header">
										<span class="sa-work-app-search">Search notes...</span>
										<span class="sa-work-app-btn">+ New Note</span>
									</div>
									<div class="sa-work-app-cards">
										<div class="sa-work-note-card is-active">
											<h4>Minimal Design System</h4>
											<p>Keep interfaces calm and typography precise. Systems should stay out of the way...</p>
											<span class="sa-work-note-tag">#design #system</span>
										</div>
										<div class="sa-work-note-card">
											<h4>App Architecture 2026</h4>
											<p>Single-purpose tools with local-first sync and instant performance...</p>
											<span class="sa-work-note-tag">#code #tech</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>

		<!-- SECTION DIVIDER -->
		<div class="sa-work-divider"></div>

		<!-- ================= PROJECT 02: PORTFOLIO PAGE ================= -->
		<section class="sa-work-featured-section sa-work-client-section">
			<div class="sa-work-featured-grid">
				<div class="sa-work-featured-info">
					<div class="sa-work-meta-top">
						<span class="sa-work-num">02</span>
						<span class="sa-work-status-tag sa-work-status-tag--live"><span class="sa-work-status-dot"></span> LIVE</span>
						<span class="sa-exp-card__eyebrow"><?php echo esc_html( sa_child_text( 'KUNDENWEBSITE', 'CLIENT WEBSITE' ) ); ?></span>
					</div>
					<h2 class="sa-work-title">Portfolio Page</h2>
					<span class="sa-work-fullname">MONROE Toyparty Landingpage</span>
					<h3 class="sa-work-tagline"><?php echo esc_html( sa_child_text( 'Warm, diskret und einladend.', 'Warm, discreet and approachable.' ) ); ?></h3>
					<p class="sa-work-desc"><?php echo esc_html( sa_child_text( 'Eine Portfolio- und Landingpage für eine selbstständige MONROE-Beraterin. Gestaltung und Tonalität schaffen Vertrauen, die Struktur erklärt das Angebot und führt unkompliziert zur Kontaktaufnahme.', 'A portfolio and landing page for an independent MONROE consultant. The design and tone build trust, while the structure explains the offer and makes it easy to get in touch.' ) ); ?></p>
					<div class="sa-work-details-row">
						<div class="sa-work-detail-item"><span class="sa-work-detail-label"><?php echo esc_html( sa_child_text( 'TYP', 'TYPE' ) ); ?></span><span class="sa-work-detail-val"><?php echo esc_html( sa_child_text( 'Kunden-Landingpage', 'Client landing page' ) ); ?></span></div>
						<div class="sa-work-detail-item"><span class="sa-work-detail-label"><?php echo esc_html( sa_child_text( 'ROLLE', 'ROLE' ) ); ?></span><span class="sa-work-detail-val"><?php echo esc_html( sa_child_text( 'Design, Entwicklung, Textunterstützung', 'Design, development, copy support' ) ); ?></span></div>
						<div class="sa-work-detail-item"><span class="sa-work-detail-label">FOCUS</span><span class="sa-work-detail-val"><?php echo esc_html( sa_child_text( 'Identität, Klarheit, Kontakt', 'Identity, clarity, contact' ) ); ?></span></div>
					</div>
					<div class="sa-work-cta-box" style="margin-top: 2rem;">
						<a class="sa-about-cta-btn" href="<?php echo esc_url( $sa_home . 'work/monroe-toyparty-landingpage/' ); ?>"><span><?php echo esc_html( sa_child_text( 'PROJEKT ANSEHEN', 'VIEW PROJECT' ) ); ?></span><span class="sa-about-cta-arrow">&rarr;</span></a>
					</div>
				</div>
				<div class="sa-work-featured-preview">
					<div class="sa-work-browser-frame">
						<div class="sa-work-browser-bar"><span class="sa-work-browser-dot"></span><span class="sa-work-browser-dot"></span><span class="sa-work-browser-dot"></span><span class="sa-work-browser-url">LIVE PORTFOLIO PAGE</span></div>
						<div class="sa-work-browser-content sa-work-client-preview">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/project-portfolio-visual.svg' ); ?>" alt="Editorial portfolio website preview" loading="lazy" />
						</div>
					</div>
				</div>
			</div>
		</section>

		<div class="sa-work-divider"></div>

		<!-- ================= SECONDARY PROJECTS (03 + 04) ================= -->
		<section class="sa-work-secondary-section">
			<div class="sa-work-secondary-grid">

				<!-- PROJECT 03: StAT -->
				<article class="sa-work-sec-card">
					<div class="sa-work-sec-preview sa-work-sec-preview--dark">
						<div class="sa-work-stat-mockup">
							<div class="sa-work-stat-head">
								<span>StAT // TRAINING DASHBOARD</span>
								<span class="sa-lime-text">RUNNING &bull; STRENGTH</span>
							</div>
							<div class="sa-work-stat-body">
								<div class="sa-work-stat-stat">
									<span>WEEKLY DISTANCE</span>
									<strong>42.5 KM</strong>
								</div>
								<div class="sa-work-stat-stat">
									<span>PACE</span>
									<strong>4:45 /KM</strong>
								</div>
							</div>
						</div>
					</div>

					<div class="sa-work-sec-body">
						<div class="sa-work-meta-top">
							<span class="sa-work-num">03</span>
							<span class="sa-work-status-tag sa-work-status-tag--dev"><?php echo esc_html( sa_child_text( 'IN ENTWICKLUNG', 'IN DEVELOPMENT' ) ); ?></span>
							<span class="sa-exp-card__eyebrow"><?php echo esc_html( sa_child_text( 'DIGITALES PRODUKT', 'DIGITAL PRODUCT' ) ); ?></span>
						</div>

						<h2 class="sa-work-sec-title">StAT</h2>
						<span class="sa-work-fullname">Studio Avelin Training</span>

						<h3 class="sa-work-tagline"><?php echo esc_html( sa_child_text( 'Training ohne den Lärm.', 'Training, without the noise.' ) ); ?></h3>

						<p class="sa-work-desc">
							<?php echo esc_html( sa_child_text( 'Eine private Trainings-App zum Planen, Erfassen und Auswerten von Laufen, Krafttraining, Zielen und Strecken. Sie zeigt die Daten, die wirklich helfen – ohne endlose Fitnessmetriken.', 'A private training app for planning, tracking and reviewing running, strength work, goals and routes. It shows the data that is genuinely useful — without endless fitness metrics.' ) ); ?>
						</p>

						<div class="sa-work-sec-foot">
							<span class="sa-exp-card__meta">PRODUCT DESIGN &middot; DEVELOPMENT &middot; DATA</span>
							<span class="sa-exp-card__badge"><?php echo esc_html( sa_child_text( 'IN ARBEIT', 'IN PROGRESS' ) ); ?></span>
						</div>
					</div>
				</article>

				<!-- PROJECT 04: StAU -->
				<article class="sa-work-sec-card">
					<div class="sa-work-sec-preview sa-work-sec-preview--light">
						<div class="sa-work-stau-mockup">
							<div class="sa-work-stau-head">
								<span>StAU // TRAVEL JOURNAL</span>
								<span>TRIP #04</span>
							</div>
							<div class="sa-work-stau-body">
								<h4>Alpine Route &amp; Memories</h4>
								<p>Destinations, mountain trails and quiet stops along the way.</p>
								<div class="sa-work-stau-tags">
									<span>ROUTE</span>
									<span>MAPS</span>
									<span>PHOTOS</span>
								</div>
							</div>
						</div>
					</div>

					<div class="sa-work-sec-body">
						<div class="sa-work-meta-top">
							<span class="sa-work-num">04</span>
							<span class="sa-work-status-tag sa-work-status-tag--concept"><?php echo esc_html( sa_child_text( 'KONZEPT', 'CONCEPT' ) ); ?></span>
							<span class="sa-exp-card__eyebrow"><?php echo esc_html( sa_child_text( 'PRODUKTKONZEPT', 'PRODUCT CONCEPT' ) ); ?></span>
						</div>

						<h2 class="sa-work-sec-title">StAU</h2>
						<span class="sa-work-fullname">Studio Avelin Travel Planner</span>

						<h3 class="sa-work-tagline"><?php echo esc_html( sa_child_text( 'Reisen, die in Erinnerung bleiben.', 'Trips worth remembering.' ) ); ?></h3>

						<p class="sa-work-desc">
							<?php echo wp_kses_post( sa_child_text( 'Ein Konzept für Reiseplanung und Reisetagebuch, das Ziele, Ideen, Routen und Erinnerungen an einem Ort sammelt &ndash; von der ersten gespeicherten Idee bis zum Rückblick nach der Reise.', 'A travel planner and journal concept that brings destinations, ideas, routes and memories together — from the first saved idea to the reflections after the trip.' ) ); ?>
						</p>

						<div class="sa-work-sec-foot">
							<span class="sa-exp-card__meta">PRODUCT DESIGN &middot; UX &middot; CONCEPT</span>
							<span class="sa-exp-card__badge"><?php echo esc_html( sa_child_text( 'KONZEPT', 'CONCEPT' ) ); ?></span>
						</div>
					</div>
				</article>

			</div>
		</section>

		<!-- ================= MID-PAGE STATEMENT: THE APPROACH ================= -->
		<section class="sa-exp-process-section" style="margin-top: 5rem;">
			<span class="sa-about-eyebrow"><?php echo esc_html( sa_child_text( 'DER ANSATZ', 'THE APPROACH' ) ); ?></span>

			<h2 class="sa-exp-process-headline">
				<?php echo wp_kses_post( sa_child_text( 'klein anfangen. <span class="sa-lime-text">sinnvoll weiterbauen</span>.', 'start small. <span class="sa-lime-text">build what matters</span>.' ) ); ?>
			</h2>

			<p class="sa-exp-process-desc" style="max-width: 650px;">
				<?php echo wp_kses_post( sa_child_text( 'Ich entwickle digitale Produkte, die eine konkrete Aufgabe gut lösen.<br />Klein anfangen. Im Alltag testen. Sinnvoll weiterentwickeln.', 'I build digital products that solve a specific problem well.<br />Start small. Test in real use. Improve what matters.' ) ); ?>
			</p>

			<!-- PROCESS STEPS LINE -->
			<div class="sa-work-process-steps">
				<div class="sa-work-step"><span>01</span> <?php echo esc_html( sa_child_text( 'IDEE', 'IDEA' ) ); ?></div>
				<div class="sa-work-step-line"></div>
				<div class="sa-work-step"><span>02</span> STRUCTURE</div>
				<div class="sa-work-step-line"></div>
				<div class="sa-work-step"><span>03</span> DESIGN</div>
				<div class="sa-work-step-line"></div>
				<div class="sa-work-step"><span>04</span> <?php echo esc_html( sa_child_text( 'UMSETZUNG', 'BUILD' ) ); ?></div>
				<div class="sa-work-step-line"></div>
				<div class="sa-work-step"><span>05</span> <?php echo esc_html( sa_child_text( 'VERFEINERN', 'REFINE' ) ); ?></div>
			</div>
		</section>

		<!-- ================= FINAL CTA: SAY HELLO ================= -->
		<section class="sa-work-contact-section">
			<span class="sa-about-eyebrow"><?php echo esc_html( sa_child_text( 'SAG HALLO', 'SAY HELLO' ) ); ?></span>
			<h2 class="sa-work-contact-title"><?php echo esc_html( sa_child_text( 'Du hast eine Idee?', 'Have an idea?' ) ); ?></h2>
			<p class="sa-work-contact-sub"><?php echo esc_html( sa_child_text( 'Lass uns etwas Nützliches daraus machen.', 'Let’s make something useful.' ) ); ?></p>

			<div class="sa-work-contact-actions">
				<a class="sa-work-contact-link" href="<?php echo esc_url( $sa_home . 'contact/' ); ?>">
					HELLO@STUDIO-AVELIN.COM <span class="sa-exp-arrow">&rarr;</span>
				</a>
				<a class="sa-work-services-link" href="<?php echo esc_url( $sa_home . 'services/' ); ?>">
					<?php echo esc_html( sa_child_text( 'LEISTUNGEN ENTDECKEN', 'EXPLORE SERVICES' ) ); ?> <span aria-hidden="true">&rarr;</span>
				</a>
			</div>
		</section>

	</div>
</main>

<?php get_template_part( 'parts/sa-footer' ); ?>

<?php wp_footer(); ?>
</body>
</html>
