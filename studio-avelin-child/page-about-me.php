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

$sa_home         = trailingslashit( sa_child_language_url( sa_child_language() ) );
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

<a class="sa-skip" href="#sa-main"><?php echo esc_html( sa_child_text( 'Zum Inhalt springen', 'Skip to content' ) ); ?></a>

<?php get_template_part( 'parts/sa-header' ); ?>

<!-- ========================= MAIN CONTENT ========================= -->
<main class="sa-main" id="sa-main" style="padding-top: 3.5rem; padding-bottom: 5rem;">
	<div class="sa-about-container">
		<div class="sa-about-grid">

			<!-- LEFT COLUMN -->
			<div class="sa-about-col-left">
				<span class="sa-about-eyebrow"><?php echo esc_html( sa_child_text( 'ÜBER MICH', 'ABOUT ME' ) ); ?></span>

				<h1 class="sa-about-hero-headline">
					<?php echo wp_kses_post( sa_child_text( 'Hi, ich bin <span class="sa-lime-text">Michael</span>.', 'hi, i’m <span class="sa-lime-text">Michael</span>.' ) ); ?>
				</h1>

				<div class="sa-about-intro">
					<p>
						<?php echo wp_kses_post( sa_child_text( 'Ich bin Designer und Entwickler hinter Studio Avelin. Ich gestalte visuelle Identitäten, Websites und digitale Produkte &ndash; und setze sie auch technisch um.', 'I’m the designer and developer behind Studio Avelin. I create visual identities, websites and digital products — and build them too.' ) ); ?>
					</p>
					<p>
						<?php echo esc_html( sa_child_text( 'Ich arbeite direkt mit Kunden und Projektpartnern – von der ersten Idee bis zum fertigen Ergebnis. Die Zusammenarbeit bleibt persönlich, transparent und gut überschaubar.', 'I work directly with clients and collaborators, from the first idea to the finished result. The collaboration stays personal, transparent and focused.' ) ); ?>
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
							<span><?php echo esc_html( sa_child_text( 'Design + Entwicklung', 'Design + development' ) ); ?></span>
							<span><?php echo esc_html( sa_child_text( 'gemeinsam gedacht', 'developed together' ) ); ?></span>
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
							<span><?php echo esc_html( sa_child_text( 'Direkte Zusammenarbeit', 'Direct collaboration' ) ); ?></span>
							<span><?php echo esc_html( sa_child_text( 'mit festen Ansprechpartnern', 'with one point of contact' ) ); ?></span>
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
							<span><?php echo esc_html( sa_child_text( 'Solide Systeme', 'Solid systems' ) ); ?></span>
							<span><?php echo esc_html( sa_child_text( 'sorgfältige Details', 'careful details' ) ); ?></span>
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
							<span><?php echo esc_html( sa_child_text( 'Für den Alltag gemacht', 'Made for everyday use' ) ); ?></span>
							<span><?php echo esc_html( sa_child_text( 'auf Dauer angelegt', 'built to last' ) ); ?></span>
						</div>
					</div>
				</div>

				<!-- PRIMARY CTA BUTTON -->
				<div class="sa-about-cta-wrapper">
					<a class="sa-about-cta-btn" href="<?php echo esc_url( $sa_home . 'work/' ); ?>">
						<span><?php echo esc_html( sa_child_text( 'PROJEKTE ANSEHEN', 'VIEW MY WORK' ) ); ?></span>
						<span class="sa-about-cta-arrow">&rarr;</span>
					</a>
					<a class="sa-about-cta-link" href="<?php echo esc_url( $sa_home . 'services/' ); ?>">
						<?php echo esc_html( sa_child_text( 'LEISTUNGEN ENTDECKEN', 'EXPLORE SERVICES' ) ); ?> <span aria-hidden="true">&rarr;</span>
					</a>
				</div>

				<!-- PRACTICE -->
				<div class="sa-about-skills-section">
					<span class="sa-about-skills-label"><?php echo esc_html( sa_child_text( 'WAS ICH MACHE & WIE ICH ARBEITE', 'WHAT I DO & HOW I WORK' ) ); ?></span>
					<div class="sa-about-skills-grid">
						<!-- COL 1 -->
						<div class="sa-about-skills-col">
							<h4><?php echo esc_html( sa_child_text( 'DESIGN & IDENTITÄT', 'DESIGN & IDENTITY' ) ); ?></h4>
							<ul>
								<li><?php echo esc_html( sa_child_text( 'Visuelle Identitäten', 'Visual identities' ) ); ?></li>
								<li><?php echo esc_html( sa_child_text( 'Interface-Design', 'Interface design' ) ); ?></li>
								<li><?php echo esc_html( sa_child_text( 'Typografie', 'Typography' ) ); ?></li>
								<li><?php echo esc_html( sa_child_text( 'Designsysteme', 'Design systems' ) ); ?></li>
							</ul>
						</div>

						<!-- COL 2 -->
						<div class="sa-about-skills-col">
							<h4><?php echo esc_html( sa_child_text( 'WEBSITES & PRODUKTE', 'WEBSITES & PRODUCTS' ) ); ?></h4>
							<ul>
								<li><?php echo esc_html( sa_child_text( 'Websites', 'Websites' ) ); ?></li>
								<li><?php echo esc_html( sa_child_text( 'Digitale Produkte', 'Digital products' ) ); ?></li>
								<li><?php echo esc_html( sa_child_text( 'Frontend-Entwicklung', 'Frontend development' ) ); ?></li>
								<li>WordPress</li>
							</ul>
						</div>

						<!-- COL 3 -->
						<div class="sa-about-skills-col">
							<h4><?php echo esc_html( sa_child_text( 'PROZESS', 'PROCESS' ) ); ?></h4>
							<ul>
								<li><?php echo esc_html( sa_child_text( 'Direkt und partnerschaftlich', 'Direct and collaborative' ) ); ?></li>
								<li><?php echo esc_html( sa_child_text( 'Design und Code zusammen gedacht', 'Design and code together' ) ); ?></li>
								<li><?php echo esc_html( sa_child_text( 'Klare Systeme und Entscheidungen', 'Clear systems and decisions' ) ); ?></li>
								<li><?php echo esc_html( sa_child_text( 'Nachvollziehbare Schritte', 'Practical, visible steps' ) ); ?></li>
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
								alt="<?php echo esc_attr( sa_child_text( 'Porträt von Michael Fiebus, der Person hinter Studio Avelin', 'Portrait of Michael Fiebus, the person behind Studio Avelin' ) ); ?>"
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
						<span><?php echo esc_html( sa_child_text( 'VERFÜGBAR FÜR', 'AVAILABLE FOR' ) ); ?></span>
					</div>
					<ul class="sa-about-focus-list">
						<li><?php echo esc_html( sa_child_text( 'Marken- und Identitätsprojekte', 'Brand and identity projects' ) ); ?></li>
						<li><?php echo esc_html( sa_child_text( 'Websites und digitale Produkte', 'Websites and digital products' ) ); ?></li>
						<li><?php echo esc_html( sa_child_text( 'Ausgewählte Kooperationen', 'Selected collaborations' ) ); ?></li>
						<li><?php echo esc_html( sa_child_text( 'Langfristige Partnerschaften', 'Long-term partnerships' ) ); ?></li>
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
