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

$sa_home = trailingslashit( home_url( '/' ) );
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

<a class="sa-skip" href="#sa-main">Zum Inhalt springen</a>

<?php get_template_part( 'parts/sa-header' ); ?>

<main class="sa-main" id="sa-main">
	<div class="sa-shell">
		<div class="sa-legal-content" style="max-width: 52rem; margin-inline: auto;">
			<?php
			get_template_part( 'patterns/datenschutz' );
			?>
		</div>
	</div>
</main>

<?php get_template_part( 'parts/sa-footer' ); ?>

<?php wp_footer(); ?>
</body>
</html>
