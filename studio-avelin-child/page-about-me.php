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
$sa_portrait_path = get_stylesheet_directory() . '/assets/img/portrait.jpg';
$sa_has_portrait  = file_exists( $sa_portrait_path );
$sa_portrait      = add_query_arg(
	'ver',
	$sa_has_portrait ? filemtime( $sa_portrait_path ) : SA_CHILD_VERSION,
	get_stylesheet_directory_uri() . '/assets/img/portrait.jpg'
);
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
						Studio Avelin is an independent design and development studio by Michael Fiebus. I create visual identities, websites and digital products &mdash; combining clear design, thoughtful systems and hands-on development.
					</p>
					<p>
						I work directly with clients and collaborators, from the first idea to the finished result. The process stays close, clear and deliberately small.
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
							<span>Design + development</span>
							<span>in one process</span>
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
							<span>Direct collaboration</span>
							<span>without detours</span>
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
							<span>Clear systems</span>
							<span>thoughtful details</span>
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
							<span>Built with purpose</span>
							<span>made to last</span>
						</div>
					</div>
				</div>

				<!-- PRIMARY CTA BUTTON -->
				<div class="sa-about-cta-wrapper">
					<a class="sa-about-cta-btn" href="<?php echo esc_url( $sa_home . 'work/' ); ?>">
						<span>VIEW MY WORK</span>
						<span class="sa-about-cta-arrow">&rarr;</span>
					</a>
				</div>

				<!-- PRACTICE -->
				<div class="sa-about-skills-section">
					<span class="sa-about-skills-label">WHAT I DO &amp; HOW I WORK</span>
					<div class="sa-about-skills-grid">
						<!-- COL 1 -->
						<div class="sa-about-skills-col">
							<h4>DESIGN &amp; IDENTITY</h4>
							<ul>
								<li>Visual identities</li>
								<li>Interface design</li>
								<li>Typography</li>
								<li>Design systems</li>
							</ul>
						</div>

						<!-- COL 2 -->
						<div class="sa-about-skills-col">
							<h4>WEBSITES &amp; PRODUCTS</h4>
							<ul>
								<li>Websites</li>
								<li>Digital products</li>
								<li>Frontend development</li>
								<li>WordPress</li>
							</ul>
						</div>

						<!-- COL 3 -->
						<div class="sa-about-skills-col">
							<h4>PROCESS</h4>
							<ul>
								<li>Direct and collaborative</li>
								<li>Design and code together</li>
								<li>Clear systems and decisions</li>
								<li>Small, deliberate iterations</li>
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
						<span>AVAILABLE FOR</span>
					</div>
					<ul class="sa-about-focus-list">
						<li>Brand and identity projects</li>
						<li>Websites and digital products</li>
						<li>Selected collaborations</li>
						<li>Long-term partnerships</li>
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
