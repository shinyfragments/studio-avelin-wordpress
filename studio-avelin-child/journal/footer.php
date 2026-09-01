<?php
/** Journal-specific footer. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$home_url = trailingslashit( home_url( '/' ) );
?>
<footer class="sa-journal-footer">
	<div class="sa-journal-footer__main">
		<div class="sa-journal-footer__brand">
			<p class="sa-journal-footer__mark">A<span>/</span></p>
			<p class="sa-journal-footer__name">Studio Avelin Journal</p>
			<p class="sa-journal-footer__tagline">Ein Einblick in die Person hinter Studio Avelin.</p>
		</div>
		<nav class="sa-journal-footer__nav" aria-label="Studio- und Social-Links">
			<ul>
				<li><a href="<?php echo esc_url( $home_url ); ?>">Studio Avelin</a></li>
				<li><a href="https://www.instagram.com/studio_avelin" target="_blank" rel="noopener noreferrer">Instagram</a></li>
			</ul>
		</nav>
		<nav class="sa-journal-footer__nav" aria-label="Rechtliche Links">
			<ul>
				<li><a href="<?php echo esc_url( $home_url . 'impressum/' ); ?>">Impressum</a></li>
				<li><a href="<?php echo esc_url( $home_url . 'datenschutzerklaerung/' ); ?>">Datenschutzerklärung</a></li>
			</ul>
		</nav>
	</div>
	<div class="sa-journal-footer__bottom">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Studio Avelin</p>
	</div>
</footer>
