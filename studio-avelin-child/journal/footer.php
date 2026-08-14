<?php
/** Journal-specific footer. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$home_url = trailingslashit( home_url( '/' ) );
?>
<footer class="sa-journal-footer">
	<div class="sa-journal-footer__main">
		<div class="sa-journal-footer__brand">
			<p class="sa-journal-footer__mark">A<span>/</span></p>
			<p class="sa-journal-footer__name"><?php esc_html_e( 'Studio Avelin Journal', 'studio-avelin-child' ); ?></p>
			<p class="sa-journal-footer__tagline"><?php esc_html_e( 'Design. Code. Create.', 'studio-avelin-child' ); ?></p>
		</div>
		<nav class="sa-journal-footer__nav" aria-label="<?php esc_attr_e( 'Studio and social links', 'studio-avelin-child' ); ?>">
			<ul>
				<li><a href="<?php echo esc_url( $home_url ); ?>"><?php esc_html_e( 'Studio Avelin', 'studio-avelin-child' ); ?> <span aria-hidden="true">↗</span></a></li>
				<li><a href="https://www.instagram.com/studio_avelin" target="_blank" rel="noopener noreferrer">Instagram <span aria-hidden="true">↗</span></a></li>
			</ul>
		</nav>
		<nav class="sa-journal-footer__nav" aria-label="<?php esc_attr_e( 'Legal links', 'studio-avelin-child' ); ?>">
			<ul>
				<li><a href="<?php echo esc_url( $home_url . 'impressum/' ); ?>"><?php esc_html_e( 'Impressum', 'studio-avelin-child' ); ?></a></li>
				<li><a href="<?php echo esc_url( $home_url . 'datenschutzerklaerung/' ); ?>"><?php esc_html_e( 'Datenschutzerklärung', 'studio-avelin-child' ); ?></a></li>
			</ul>
		</nav>
	</div>
	<div class="sa-journal-footer__bottom">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Studio Avelin</p>
	</div>
</footer>
