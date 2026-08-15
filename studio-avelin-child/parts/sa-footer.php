<?php
/**
 * Studio Avelin global footer component.
 *
 * Premium editorial footer matching the Studio Avelin design system.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_home_url = trailingslashit( home_url( '/' ) );
?>

<footer class="sa-front-footer" id="sa-footer">
	<div class="sa-footer-container">

		<!-- SPACIOUS TWO-PART MAIN AREA -->
		<div class="sa-footer-main">

			<!-- LEFT SIDE: BRAND & LARGE EDITORIAL STATEMENT -->
			<div class="sa-footer-left">
				<div class="sa-footer-brand">
					<span class="sa-brand__dot" aria-hidden="true"></span>
					<span class="sa-footer-brand-name">Studio Avelin</span>
				</div>

				<h2 class="sa-footer-statement">
					<span class="sa-stmt-dark">Design. Code.</span>
					<span class="sa-stmt-outline">Create.</span>
				</h2>
			</div>

			<!-- RIGHT SIDE: THREE NAVIGATION COLUMNS -->
			<div class="sa-footer-nav-cols">

				<!-- COLUMN 1: EXPLORE -->
				<div class="sa-footer-col">
					<span class="sa-footer-col-label">EXPLORE</span>
					<ul class="sa-footer-links">
						<li><a href="<?php echo esc_url( $sa_home_url . 'work/' ); ?>">Work</a></li>
						<li><a href="<?php echo esc_url( $sa_home_url . 'about-me/' ); ?>">About</a></li>
						<li><a href="<?php echo esc_url( $sa_home_url . 'experiments/' ); ?>">Experiments</a></li>
						<li><a href="<?php echo esc_url( $sa_home_url . 'journal/' ); ?>">Journal</a></li>
					</ul>
				</div>

				<!-- COLUMN 2: LEGAL -->
				<div class="sa-footer-col">
					<span class="sa-footer-col-label">LEGAL</span>
					<ul class="sa-footer-links">
						<li><a href="<?php echo esc_url( $sa_home_url . 'datenschutzerklaerung/' ); ?>">Datenschutzerkl&auml;rung</a></li>
						<li><a href="<?php echo esc_url( $sa_home_url . 'impressum/' ); ?>">Impressum</a></li>
					</ul>
				</div>

				<!-- COLUMN 3: SOCIAL -->
				<div class="sa-footer-col">
					<span class="sa-footer-col-label">SOCIAL</span>
					<ul class="sa-footer-links">
						<li>
							<a href="https://www.instagram.com/studio_avelin" target="_blank" rel="noopener noreferrer">
								Instagram
							</a>
						</li>
						<li>
							<a href="https://github.com/studio-avelin" target="_blank" rel="noopener noreferrer">
								GitHub
							</a>
						</li>
					</ul>
				</div>

			</div>
		</div>

		<!-- DIVIDER WITH SHORT LIME SEGMENT SIGNATURE -->
		<div class="sa-footer-divider-wrap">
			<div class="sa-footer-divider">
				<span class="sa-footer-lime-segment"></span>
			</div>
		</div>

		<!-- BOTTOM AREA: THREE-PART BALANCED ROW -->
		<div class="sa-footer-bottom">
			<div class="sa-footer-bottom-left">
				&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Studio Avelin
			</div>

			<div class="sa-footer-bottom-center">
				Independent digital studio &middot; Germany
			</div>

			<div class="sa-footer-bottom-right">
				<a href="mailto:hello@studio-avelin.com" class="sa-footer-email-link">
					hello@studio-avelin.com
				</a>
			</div>
		</div>

	</div>
</footer>
