<?php
/**
 * Studio Avelin — 404, in the elevated design language.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

status_header( 404 );
nocache_headers();

$sa_home = trailingslashit( home_url( '/' ) );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="robots" content="noindex, follow" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( array( 'sa-front', 'sa-page', 'sa-page--404' ) ); ?>>
<?php wp_body_open(); ?>

<a class="sa-skip" href="#sa-main">Zum Inhalt springen</a>

<?php get_template_part( 'parts/sa-header' ); ?>

<main class="sa-main" id="sa-main">
	<div class="sa-shell">
		<section class="sa-phero sa-reveal">
			<span class="sa-sec-kicker">Fehler 404</span>
			<h1 class="sa-phero__h">Diese Seite gibt es <span class="sa-lime-text">nicht (mehr)</span>.</h1>
			<p class="sa-phero__lede">
				Vielleicht wurde die Seite verschoben oder der Link ist veraltet.
				Von hier kommst du weiter:
			</p>
			<div class="sa-404__links">
				<a class="sa-btn sa-btn--lime" href="<?php echo esc_url( $sa_home ); ?>">
					Zur Startseite <span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
				</a>
				<a class="sa-textlink" href="<?php echo esc_url( $sa_home . 'work/' ); ?>">Projekte <span aria-hidden="true">&rarr;</span></a>
				<a class="sa-textlink" href="<?php echo esc_url( $sa_home . 'services/' ); ?>">Leistungen <span aria-hidden="true">&rarr;</span></a>
				<a class="sa-textlink" href="<?php echo esc_url( $sa_home . 'contact/' ); ?>">Kontakt <span aria-hidden="true">&rarr;</span></a>
			</div>
		</section>
	</div>
</main>

<?php get_template_part( 'parts/sa-footer' ); ?>

<?php wp_footer(); ?>
</body>
</html>
