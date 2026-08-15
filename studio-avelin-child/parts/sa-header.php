<?php
/**
 * Studio Avelin global header component.
 *
 * Full-width minimal header with custom A/ monogram logo, desktop baseline navigation,
 * dynamic sliding lime indicator, and mobile menu toggle.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sa_home_url = trailingslashit( home_url( '/' ) );
$request_uri = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );

// Determine active page dynamically
$is_work        = ( 'work' === $request_uri || 0 === strpos( $request_uri, 'work/' ) );
$is_services    = ( 'services' === $request_uri );
$is_about       = ( 'about-me' === $request_uri || 'about' === $request_uri );
$is_journal     = ( 'journal' === $request_uri || 0 === strpos( $request_uri, 'journal/' ) );
$is_contact     = false;
?>

<header class="sa-front-header" id="sa-header">
	<div class="sa-front-header__inner">

		<!-- BRAND LOGO & NAME -->
		<a class="sa-brand" href="<?php echo esc_url( $sa_home_url ); ?>" aria-label="Studio Avelin home">
			<span class="sa-brand__mark" aria-hidden="true">A<span>/</span></span>
			<span class="sa-brand__name">Studio Avelin</span>
		</a>

		<!-- DESKTOP NAVIGATION WITH BASELINE & SLIDING INDICATOR -->
		<nav class="sa-front-nav" aria-label="Primary navigation" data-sa-nav>
			<ul class="sa-front-nav__list">
				<li class="sa-front-nav__item">
					<a class="sa-front-nav__link<?php echo $is_work ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'work/' ); ?>">Work</a>
				</li>
				<li class="sa-front-nav__item">
					<a class="sa-front-nav__link<?php echo $is_services ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'services/' ); ?>">Services</a>
				</li>
				<li class="sa-front-nav__item">
					<a class="sa-front-nav__link<?php echo $is_about ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'about-me/' ); ?>">About</a>
				</li>
				<li class="sa-front-nav__item">
					<a class="sa-front-nav__link<?php echo $is_journal ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'journal/' ); ?>">Journal</a>
				</li>
				<li class="sa-front-nav__item">
					<a class="sa-front-nav__link<?php echo $is_contact ? ' is-active' : ''; ?>" href="mailto:hello@studio-avelin.com">Contact</a>
				</li>
			</ul>

			<!-- BASELINE & SLIDING LIME SEGMENT -->
			<div class="sa-nav-baseline" aria-hidden="true">
				<span class="sa-nav-baseline__indicator"></span>
			</div>
		</nav>

		<!-- MOBILE MENU TOGGLE BUTTON -->
		<button class="sa-nav-toggle" type="button" aria-expanded="false" aria-controls="sa-mobile-menu" aria-label="Toggle navigation menu" data-sa-nav-toggle>
			<span class="sa-nav-toggle__label">Menu</span>
		</button>

	</div>

	<!-- MOBILE DROPDOWN MENU -->
	<div class="sa-mobile-menu" id="sa-mobile-menu" aria-label="Mobile navigation" data-sa-mobile-menu>
		<ul class="sa-mobile-menu__list">
			<li>
				<a class="sa-mobile-menu__link<?php echo $is_work ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'work/' ); ?>">Work</a>
			</li>
			<li>
				<a class="sa-mobile-menu__link<?php echo $is_services ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'services/' ); ?>">Services</a>
			</li>
			<li>
				<a class="sa-mobile-menu__link<?php echo $is_about ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'about-me/' ); ?>">About</a>
			</li>
			<li>
				<a class="sa-mobile-menu__link<?php echo $is_journal ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'journal/' ); ?>">Journal</a>
			</li>
			<li>
				<a class="sa-mobile-menu__link<?php echo $is_contact ? ' is-active' : ''; ?>" href="mailto:hello@studio-avelin.com">Contact</a>
			</li>
		</ul>
	</div>
</header>
