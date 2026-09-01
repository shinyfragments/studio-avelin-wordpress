<?php
/**
 * Studio Avelin global header component.
 *
 * Full-width minimal header with the A/ monogram, the "Studio Avelin" wordmark
 * with a lime accent dot, a baseline navigation with a sliding lime indicator,
 * a "Projekt besprechen" call to action and a mobile menu toggle.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_home_url = trailingslashit( home_url( '/' ) );
$request_uri = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );

// Determine the active page dynamically.
$is_work     = ( 'work' === $request_uri || 0 === strpos( $request_uri, 'work/' ) );
$is_services = ( 'services' === $request_uri );
$is_about    = ( 'about-me' === $request_uri || 'about' === $request_uri );
$is_journal  = ( 'journal' === $request_uri || 0 === strpos( $request_uri, 'journal/' ) );
$is_contact  = ( 'contact' === $request_uri || 'kontakt' === $request_uri );
?>

<header class="sa-front-header" id="sa-header">
	<div class="sa-front-header__inner">

		<!-- BRAND: A/ MONOGRAM + WORDMARK WITH LIME ACCENT DOT -->
		<a class="sa-brand" href="<?php echo esc_url( $sa_home_url ); ?>" aria-label="Startseite von Studio Avelin">
			<span class="sa-brand__mark" aria-hidden="true">A<span>/</span></span>
			<span class="sa-brand__name">Studio Avelin<span class="sa-brand__dot" aria-hidden="true"></span></span>
		</a>

		<!-- DESKTOP NAVIGATION WITH BASELINE & SLIDING INDICATOR -->
		<nav class="sa-front-nav" aria-label="Hauptnavigation" data-sa-nav>
			<ul class="sa-front-nav__list">
				<li class="sa-front-nav__item">
					<a class="sa-front-nav__link<?php echo $is_work ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'work/' ); ?>">Projekte</a>
				</li>
				<li class="sa-front-nav__item">
					<a class="sa-front-nav__link<?php echo $is_services ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'services/' ); ?>">Leistungen</a>
				</li>
				<li class="sa-front-nav__item">
					<a class="sa-front-nav__link<?php echo $is_about ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'about-me/' ); ?>">Über mich</a>
				</li>
				<li class="sa-front-nav__item">
					<a class="sa-front-nav__link<?php echo $is_journal ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'journal/' ); ?>">Journal</a>
				</li>
			</ul>

			<!-- BASELINE & SLIDING LIME SEGMENT -->
			<div class="sa-nav-baseline" aria-hidden="true">
				<span class="sa-nav-baseline__indicator"></span>
			</div>
		</nav>

		<a class="sa-nav-cta<?php echo $is_contact ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'contact/' ); ?>">
			Projekt besprechen <span class="sa-btn__arrow" aria-hidden="true">&rarr;</span>
		</a>

		<!-- MOBILE MENU TOGGLE BUTTON -->
		<button class="sa-nav-toggle" type="button" aria-expanded="false" aria-controls="sa-mobile-menu" aria-label="Menü umschalten" data-sa-nav-toggle>
			<span class="sa-nav-toggle__label">Menü</span>
		</button>

	</div>

	<!-- MOBILE DROPDOWN MENU -->
	<div class="sa-mobile-menu" id="sa-mobile-menu" aria-label="Mobile Navigation" data-sa-mobile-menu>
		<ul class="sa-mobile-menu__list">
			<li>
				<a class="sa-mobile-menu__link<?php echo $is_work ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'work/' ); ?>">Projekte</a>
			</li>
			<li>
				<a class="sa-mobile-menu__link<?php echo $is_services ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'services/' ); ?>">Leistungen</a>
			</li>
			<li>
				<a class="sa-mobile-menu__link<?php echo $is_about ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'about-me/' ); ?>">Über mich</a>
			</li>
			<li>
				<a class="sa-mobile-menu__link<?php echo $is_journal ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'journal/' ); ?>">Journal</a>
			</li>
			<li>
				<a class="sa-mobile-menu__link sa-mobile-menu__link--cta<?php echo $is_contact ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'contact/' ); ?>">Projekt besprechen</a>
			</li>
		</ul>
	</div>
</header>
