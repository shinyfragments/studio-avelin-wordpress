<?php
/**
 * Studio Avelin — Work page template.
 *
 * Product-focused and deliberate presentation of Studio Avelin's core digital products:
 * 01 STAN (Live), 02 StAT (In Development), 03 StAU (Concept).
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_home        = trailingslashit( home_url( '/' ) );
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

<a class="sa-skip" href="#sa-main">Skip to content</a>

<?php get_template_part( 'parts/sa-header' ); ?>

<!-- ========================= MAIN CONTENT ========================= -->
<main class="sa-main" id="sa-main">
	<div class="sa-about-container">

		<!-- HERO SECTION -->
		<section class="sa-exp-hero">
			<div class="sa-exp-hero__left">
				<span class="sa-about-eyebrow">SELECTED WORK</span>

				<h1 class="sa-about-hero-headline">
					built with <span class="sa-lime-text">purpose</span>.
				</h1>

				<div class="sa-about-intro" style="max-width: 650px;">
					<p>
						A small collection of digital products, tools and ideas designed and built under the Studio Avelin umbrella.<br />
						Small in scope. Clear in purpose. Made to be useful.
					</p>
				</div>
			</div>

			<div class="sa-exp-hero__right">
				<div class="sa-exp-hero-note">
					<span class="sa-exp-lime-line" aria-hidden="true"></span>
					<p class="sa-exp-hero-note__text">
						Independent projects.<br />
						Designed, built and refined<br />
						one idea at a time.
					</p>
				</div>
			</div>
		</section>

		<!-- INDEX BAR -->
		<div class="sa-work-index-bar">
			<span>PROJECTS &middot; 01&mdash;03</span>
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
						<span class="sa-exp-card__eyebrow">DIGITAL PRODUCT</span>
					</div>

					<h2 class="sa-work-title">STAN</h2>
					<span class="sa-work-fullname">Studio Avelin Notes</span>

					<h3 class="sa-work-tagline">A focused space for ideas.</h3>

					<p class="sa-work-desc">
						STAN is a focused notes and thinking app for collecting ideas, spaces, notes and tags. Designed to keep things simple: fewer distractions, clear structure and a calm place for thoughts that should not get lost.
					</p>

					<!-- DETAILS ROW -->
					<div class="sa-work-details-row">
						<div class="sa-work-detail-item">
							<span class="sa-work-detail-label">TYPE</span>
							<span class="sa-work-detail-val">Personal productivity app</span>
						</div>
						<div class="sa-work-detail-item">
							<span class="sa-work-detail-label">FOCUS</span>
							<span class="sa-work-detail-val">Notes + thinking</span>
						</div>
						<div class="sa-work-detail-item">
							<span class="sa-work-detail-label">BUILT WITH</span>
							<span class="sa-work-detail-val">React / Supabase / Vercel</span>
						</div>
					</div>

					<div class="sa-work-cta-box" style="margin-top: 2rem;">
						<a class="sa-about-cta-btn" href="<?php echo esc_url( $sa_home . 'work/stan/' ); ?>">
							<span>VIEW PROJECT</span>
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

		<!-- ================= SECONDARY PROJECTS (02 + 03) ================= -->
		<section class="sa-work-secondary-section">
			<div class="sa-work-secondary-grid">

				<!-- PROJECT 02: StAT -->
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
							<span class="sa-work-num">02</span>
							<span class="sa-work-status-tag sa-work-status-tag--dev">IN DEVELOPMENT</span>
							<span class="sa-exp-card__eyebrow">DIGITAL PRODUCT</span>
						</div>

						<h2 class="sa-work-sec-title">StAT</h2>
						<span class="sa-work-fullname">Studio Avelin Training</span>

						<h3 class="sa-work-tagline">Training, without the noise.</h3>

						<p class="sa-work-desc">
							A private training app for planning, tracking and reviewing running, strength, goals, routes and progress. Built around useful data, clear routines and a calm overview instead of endless fitness metrics.
						</p>

						<div class="sa-work-sec-foot">
							<span class="sa-exp-card__meta">PRODUCT DESIGN &middot; DEVELOPMENT &middot; DATA</span>
							<span class="sa-exp-card__badge">IN PROGRESS</span>
						</div>
					</div>
				</article>

				<!-- PROJECT 03: StAU -->
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
							<span class="sa-work-num">03</span>
							<span class="sa-work-status-tag sa-work-status-tag--concept">CONCEPT</span>
							<span class="sa-exp-card__eyebrow">PRODUCT CONCEPT</span>
						</div>

						<h2 class="sa-work-sec-title">StAU</h2>
						<span class="sa-work-fullname">Studio Avelin Travel Planner</span>

						<h3 class="sa-work-tagline">Trips worth remembering.</h3>

						<p class="sa-work-desc">
							A calm travel planning and trip journal concept for collecting destinations, ideas, routes and memories in one place. Designed around the complete trip &mdash; from the first saved idea to the memories that remain afterwards.
						</p>

						<div class="sa-work-sec-foot">
							<span class="sa-exp-card__meta">PRODUCT DESIGN &middot; UX &middot; CONCEPT</span>
							<span class="sa-exp-card__badge">CONCEPT</span>
						</div>
					</div>
				</article>

			</div>
		</section>

		<!-- ================= MID-PAGE STATEMENT: THE APPROACH ================= -->
		<section class="sa-exp-process-section" style="margin-top: 5rem;">
			<span class="sa-about-eyebrow">THE APPROACH</span>

			<h2 class="sa-exp-process-headline">
				small scope. <span class="sa-lime-text">strong ideas</span>.
			</h2>

			<p class="sa-exp-process-desc" style="max-width: 650px;">
				I like building focused digital products around a clear purpose.<br />
				Start small. Make it useful. Refine what matters.
			</p>

			<!-- PROCESS STEPS LINE -->
			<div class="sa-work-process-steps">
				<div class="sa-work-step"><span>01</span> IDEA</div>
				<div class="sa-work-step-line"></div>
				<div class="sa-work-step"><span>02</span> STRUCTURE</div>
				<div class="sa-work-step-line"></div>
				<div class="sa-work-step"><span>03</span> DESIGN</div>
				<div class="sa-work-step-line"></div>
				<div class="sa-work-step"><span>04</span> BUILD</div>
				<div class="sa-work-step-line"></div>
				<div class="sa-work-step"><span>05</span> REFINE</div>
			</div>
		</section>

		<!-- ================= FINAL CTA: SAY HELLO ================= -->
		<section class="sa-work-contact-section">
			<span class="sa-about-eyebrow">SAY HELLO</span>
			<h2 class="sa-work-contact-title">Have an idea?</h2>
			<p class="sa-work-contact-sub">Let’s make something useful.</p>

			<a class="sa-work-contact-link" href="mailto:hello@studio-avelin.com">
				HELLO@STUDIO-AVELIN.COM <span class="sa-exp-arrow">&rarr;</span>
			</a>
		</section>

	</div>
</main>

<?php get_template_part( 'parts/sa-footer' ); ?>

<?php wp_footer(); ?>
</body>
</html>
