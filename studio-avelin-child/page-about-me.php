<?php
/**
 * Studio Avelin — Über mich (Ich-Marke).
 *
 * Uses the exact Studio Avelin header and footer matching the homepage and legal pages.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_home          = trailingslashit( home_url( '/' ) );
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

<a class="sa-skip" href="#sa-main">Zum Inhalt springen</a>

<?php get_template_part( 'parts/sa-header' ); ?>

<main class="sa-main" id="sa-main" style="padding-top: 3.5rem; padding-bottom: 5rem;">
	<div class="sa-about-container">
		<div class="sa-about-grid">

			<!-- LEFT COLUMN -->
			<div class="sa-about-col-left">
				<span class="sa-about-eyebrow">ÜBER MICH</span>

				<h1 class="sa-about-hero-headline">
					<?php echo wp_kses_post( 'Hi, ich bin <span class="sa-lime-text">Michael</span>.' ); ?>
				</h1>

				<div class="sa-about-intro">
					<p>
						Design mit Haltung, für Marken, die mehr sind als eine Website. Ich bin Designer
						und Gründer von Studio Avelin und arbeite mit kleinen, inhabergeführten Marken –
						von der Personenmarke bis zum eigenen Laden.
					</p>
					<p>
						Keine Agentur mit vielen Zwischenstationen, sondern ein direkter Ansprechpartner:
						von der Positionierung über das Design bis zur Sichtbarkeit. Design ist mein
						Handwerk – und Branding, SEO und digitale Sichtbarkeit gehören für mich genauso dazu.
					</p>
					<p>
						Fokussierung und ein Gespür fürs Wesentliche ziehen sich durch alles, was ich tue –
						auch abseits der Arbeit, ob beim Laufen, auf Reisen oder beim Lesen. Mehr davon im
						<a class="sa-lime-text" href="<?php echo esc_url( $sa_home . 'journal/' ); ?>">Journal</a>.
					</p>
				</div>

				<!-- VALUES ROW -->
				<div class="sa-about-values">
					<div class="sa-about-value-item">
						<div class="sa-about-value-icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
								<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
								<polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
								<line x1="12" y1="22.08" x2="12" y2="12"></line>
							</svg>
						</div>
						<div class="sa-about-value-text">
							<span>Marke, Design &amp; Sichtbarkeit</span>
							<span>von Anfang an zusammen gedacht</span>
						</div>
					</div>

					<div class="sa-about-value-item">
						<div class="sa-about-value-icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
								<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
							</svg>
						</div>
						<div class="sa-about-value-text">
							<span>Direkte Zusammenarbeit</span>
							<span>mit einem festen Ansprechpartner</span>
						</div>
					</div>

					<div class="sa-about-value-item">
						<div class="sa-about-value-icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
								<circle cx="12" cy="12" r="10"></circle>
								<circle cx="12" cy="12" r="6"></circle>
								<circle cx="12" cy="12" r="2"></circle>
							</svg>
						</div>
						<div class="sa-about-value-text">
							<span>Fokussierung</span>
							<span>und ein Gespür fürs Wesentliche</span>
						</div>
					</div>

					<div class="sa-about-value-item">
						<div class="sa-about-value-icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
								<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
							</svg>
						</div>
						<div class="sa-about-value-text">
							<span>Design mit Substanz</span>
							<span>durchdacht statt dekorativ</span>
						</div>
					</div>
				</div>

				<!-- PRIMARY CTA BUTTON -->
				<div class="sa-about-cta-wrapper">
					<a class="sa-about-cta-btn" href="<?php echo esc_url( $sa_home . 'work/' ); ?>">
						<span>PROJEKTE ANSEHEN</span>
						<span class="sa-about-cta-arrow">&rarr;</span>
					</a>
					<a class="sa-about-cta-link" href="<?php echo esc_url( $sa_home . 'services/' ); ?>">
						LEISTUNGEN ENTDECKEN <span aria-hidden="true">&rarr;</span>
					</a>
				</div>

				<!-- PRACTICE -->
				<div class="sa-about-skills-section">
					<span class="sa-about-skills-label">WAS ICH MACHE &amp; WIE ICH ARBEITE</span>
					<div class="sa-about-skills-grid">
						<div class="sa-about-skills-col">
							<h4>MARKE &amp; DESIGN</h4>
							<ul>
								<li>Positionierung &amp; Tonalität</li>
								<li>Visuelle Identität</li>
								<li>Interface-Design</li>
								<li>Designsysteme</li>
							</ul>
						</div>

						<div class="sa-about-skills-col">
							<h4>WEBSITES &amp; UMSETZUNG</h4>
							<ul>
								<li>Individuelle Websites</li>
								<li>Landingpages &amp; Portfolios</li>
								<li>Frontend-Entwicklung</li>
								<li>WordPress</li>
							</ul>
						</div>

						<div class="sa-about-skills-col">
							<h4>SICHTBARKEIT</h4>
							<ul>
								<li>Technisches SEO</li>
								<li>Content-Empfehlungen</li>
								<li>Performance-Review</li>
								<li>GEO-Check (KI-Suche)</li>
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
								alt="Porträt von Michael, dem Designer hinter Studio Avelin"
								loading="eager"
							/>
						<?php else : ?>
							<div class="sa-about-portrait-placeholder">
								<span>MICHAEL</span>
							</div>
						<?php endif; ?>
					</div>

					<div class="sa-about-vertical-name" aria-hidden="true">
						<span>MICHAEL</span>
					</div>
				</div>

				<!-- AVAILABLE FOR PANEL -->
				<div class="sa-about-focus-panel">
					<div class="sa-about-focus-header">
						<svg class="sa-about-focus-star" viewBox="0 0 24 24" fill="none" stroke="currentColor">
							<path d="M12 2L14.5 9.5L22 12L14.5 14.5L12 22L9.5 14.5L2 12L9.5 9.5L12 2Z" fill="#C7F000" stroke="#C7F000"></path>
						</svg>
						<span>VERFÜGBAR FÜR</span>
					</div>
					<ul class="sa-about-focus-list">
						<li>Branding- und Website-Projekte</li>
						<li>Personenmarken mit Design-Anspruch</li>
						<li>Kleine, ästhetikgetriebene Betriebe</li>
						<li>Langfristige Begleitung</li>
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
