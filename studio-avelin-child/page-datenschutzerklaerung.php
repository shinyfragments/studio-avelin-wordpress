<?php
/**
 * Studio Avelin — Datenschutzerklärung page template.
 *
 * Uses the exact flat Studio Avelin header and footer matching the homepage.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_home        = trailingslashit( home_url( '/' ) );
$sa_nav         = sa_child_nav_items( 'header' );
$sa_footer_nav  = sa_child_nav_items( 'footer' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( array( 'home', 'sa-front', 'sa-page', 'sa-page--legal' ) ); ?>>
<?php wp_body_open(); ?>

<a class="sa-skip" href="#sa-main">Skip to content</a>

<header class="sa-front-header" id="sa-header">
	<div class="sa-front-header__inner">
		<a class="sa-brand" href="<?php echo esc_url( $sa_home ); ?>">
			<span class="sa-brand__dot" aria-hidden="true"></span>
			Studio Avelin
		</a>

		<button class="sa-nav-toggle" type="button" aria-expanded="false" aria-controls="sa-nav" data-sa-nav-toggle>
			<span class="sa-nav-toggle__bars" aria-hidden="true"></span>
			<span class="sa-nav-toggle__label">Menu</span>
		</button>

		<nav class="sa-nav" id="sa-nav" aria-label="Primary">
			<ul class="sa-nav__list">
				<?php foreach ( $sa_nav as $item ) : ?>
					<li class="sa-nav__item">
						<a class="sa-nav__link" href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav>
	</div>
</header>

<main class="sa-main" id="sa-main">
	<div class="sa-shell">
		<div class="sa-legal-content" style="max-width: 52rem; margin-inline: auto;">
			<?php
			get_template_part( 'patterns/datenschutz' );
			?>
		</div>
	</div>
</main>

<footer class="sa-front-footer" id="sa-footer">
	<div class="sa-shell">
		<div class="sa-front-footer__top">
			<div class="sa-front-footer__brand">
				<a class="sa-brand sa-brand--footer" href="<?php echo esc_url( $sa_home ); ?>">
					<span class="sa-brand__dot" aria-hidden="true"></span>
					Studio Avelin
				</a>
				<p class="sa-front-footer__tag">Design. Code. Create.</p>
			</div>

			<div class="sa-front-footer__cols">
				<div class="sa-front-footer__col">
					<h2 class="sa-front-footer__heading">Explore</h2>
					<ul>
						<?php foreach ( $sa_footer_nav as $item ) : ?>
							<li><a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="sa-front-footer__col">
					<h2 class="sa-front-footer__heading">Legal</h2>
					<ul>
						<li><a href="<?php echo esc_url( $sa_home . 'datenschutzerklaerung/' ); ?>">Datenschutzerkl&auml;rung</a></li>
						<li><a href="<?php echo esc_url( $sa_home . 'impressum/' ); ?>">Impressum</a></li>
					</ul>
				</div>

				<div class="sa-front-footer__col">
					<h2 class="sa-front-footer__heading">Social</h2>
					<ul>
						<li><a href="https://instagram.com/" target="_blank" rel="noopener noreferrer">Instagram</a></li>
						<li><a href="https://github.com/" target="_blank" rel="noopener noreferrer">GitHub</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="sa-front-footer__bottom">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Studio Avelin</p>
			<p><a href="mailto:hello@studio-avelin.com">hello@studio-avelin.com</a></p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
