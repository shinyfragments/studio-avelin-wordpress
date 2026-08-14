<?php
/**
 * Studio Avelin — About Me page template.
 *
 * Uses the exact Studio Avelin header and footer matching the homepage and legal pages.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_home         = trailingslashit( home_url( '/' ) );
$sa_nav          = sa_child_nav_items( 'header' );
$sa_footer_nav   = sa_child_nav_items( 'footer' );
$sa_portrait     = get_stylesheet_directory_uri() . '/assets/img/portrait.jpg';
$sa_has_portrait = file_exists( get_stylesheet_directory() . '/assets/img/portrait.jpg' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( array( 'home', 'sa-front', 'sa-page', 'sa-page--about' ) ); ?>>
<?php wp_body_open(); ?>

<a class="sa-skip" href="#sa-main">Skip to content</a>

<?php get_template_part( 'parts/sa-header' ); ?>

<!-- ========================= MAIN CONTENT ========================= -->
<main class="sa-main" id="sa-main" style="padding-top: 3.5rem; padding-bottom: 5rem;">
	<div class="sa-about-container">
		<div class="sa-about-grid">

			<!-- LEFT COLUMN -->
			<div class="sa-about-col-left">
				<span class="sa-about-eyebrow">ABOUT ME</span>

				<h1 class="sa-about-hero-headline">
					hi, i’m <span class="sa-lime-text">Michael</span>.
				</h1>

				<div class="sa-about-intro">
					<p>
						Studio Avelin is my digital space for ideas, design and code.<br />
						I work at the intersection of design and development &mdash; building brands, products and projects that feel clear, functional and timeless.
					</p>
					<p>
						I’m interested in systems, details and the bigger picture.<br />
						I like projects that make sense, help people and have a strong visual identity.
					</p>
				</div>

				<!-- VALUES ROW -->
				<div class="sa-about-values">
					<!-- ITEM 1 -->
					<div class="sa-about-value-item">
						<div class="sa-about-value-icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
								<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
								<polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
								<line x1="12" y1="22.08" x2="12" y2="12"></line>
							</svg>
						</div>
						<div class="sa-about-value-text">
							<span>Design + Code</span>
							<span>under one roof</span>
						</div>
					</div>

					<!-- ITEM 2 -->
					<div class="sa-about-value-item">
						<div class="sa-about-value-icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
								<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
							</svg>
						</div>
						<div class="sa-about-value-text">
							<span>Strategic.</span>
							<span>Clear. Fast.</span>
						</div>
					</div>

					<!-- ITEM 3 -->
					<div class="sa-about-value-item">
						<div class="sa-about-value-icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
								<circle cx="12" cy="12" r="10"></circle>
								<circle cx="12" cy="12" r="6"></circle>
								<circle cx="12" cy="12" r="2"></circle>
							</svg>
						</div>
						<div class="sa-about-value-text">
							<span>Focus on quality,</span>
							<span>performance &amp; UX</span>
						</div>
					</div>

					<!-- ITEM 4 -->
					<div class="sa-about-value-item">
						<div class="sa-about-value-icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
								<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
							</svg>
						</div>
						<div class="sa-about-value-text">
							<span>Passion for</span>
							<span>digital products</span>
						</div>
					</div>
				</div>

				<!-- PRIMARY CTA BUTTON -->
				<div class="sa-about-cta-wrapper">
					<a class="sa-about-cta-btn" href="<?php echo esc_url( $sa_home . '#work' ); ?>">
						<span>VIEW MY WORK</span>
						<span class="sa-about-cta-arrow">&rarr;</span>
					</a>
				</div>

				<!-- SKILLS & TOOLS -->
				<div class="sa-about-skills-section">
					<span class="sa-about-skills-label">SKILLS &amp; TOOLS</span>
					<div class="sa-about-skills-grid">
						<!-- COL 1 -->
						<div class="sa-about-skills-col">
							<h4>DESIGN</h4>
							<ul>
								<li>Figma</li>
								<li>Photoshop</li>
								<li>Illustrator</li>
								<li>Typography</li>
							</ul>
						</div>

						<!-- COL 2 -->
						<div class="sa-about-skills-col">
							<h4>DEVELOPMENT</h4>
							<ul>
								<li>HTML / CSS / JS / TS</li>
								<li>React</li>
								<li>WordPress</li>
								<li>Supabase</li>
							</ul>
						</div>

						<!-- COL 3 -->
						<div class="sa-about-skills-col">
							<h4>TOOLS</h4>
							<ul>
								<li>VS Code</li>
								<li>Git &amp; GitHub</li>
								<li>Lovable</li>
								<li>Vercel</li>
							</ul>
						</div>

						<!-- COL 4 -->
						<div class="sa-about-skills-col">
							<h4>OTHER</h4>
							<ul>
								<li>SEO</li>
								<li>Performance</li>
								<li>Systems Thinking</li>
								<li>Clear Processes</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<!-- RIGHT COLUMN -->
			<div class="sa-about-col-right">
				<div class="sa-about-portrait-wrapper">
					<div class="sa-about-portrait-box">
						<?php if ( $sa_has_portrait ) : ?>
							<img
								class="sa-about-portrait-img"
								src="<?php echo esc_url( $sa_portrait ); ?>"
								width="800"
								height="900"
								alt="Portrait of Michael Fiebus, the person behind Studio Avelin"
								loading="eager"
							/>
						<?php else : ?>
							<div class="sa-about-portrait-placeholder">
								<span>MICHAEL FIEBUS</span>
							</div>
						<?php endif; ?>
					</div>

					<div class="sa-about-vertical-name" aria-hidden="true">
						<span>MICHAEL FIEBUS</span>
					</div>
				</div>

				<!-- MY FOCUS PANEL -->
				<div class="sa-about-focus-panel">
					<div class="sa-about-focus-header">
						<svg class="sa-about-focus-star" viewBox="0 0 24 24" fill="none" stroke="currentColor">
							<path d="M12 2L14.5 9.5L22 12L14.5 14.5L12 22L9.5 14.5L2 12L9.5 9.5L12 2Z" fill="#C7F000" stroke="#C7F000"></path>
						</svg>
						<span>MY FOCUS</span>
					</div>
					<ul class="sa-about-focus-list">
						<li>Web Design &amp; Development</li>
						<li>Digital Products &amp; Web Apps</li>
						<li>Branding &amp; Visual Identity</li>
						<li>Performance &amp; SEO</li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</main>

<?php get_template_part( 'parts/sa-footer' ); ?>

<?php wp_footer(); ?>
</body>
</html>
