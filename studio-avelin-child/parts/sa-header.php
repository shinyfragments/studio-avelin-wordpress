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

$sa_language = sa_child_language();
$sa_home_url = function_exists( 'pll_home_url' ) ? trailingslashit( pll_home_url( $sa_language ) ) : trailingslashit( home_url( '/' ) );
$request_uri = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );
$request_uri = preg_replace( '#^(?:de|en)/#', '', $request_uri );
$sa_labels = array(
	'home'     => sa_child_text( 'Startseite von Studio Avelin', 'Studio Avelin home' ),
	'work'     => sa_child_text( 'Projekte', 'Work' ),
	'services' => sa_child_text( 'Leistungen', 'Services' ),
	'about'    => sa_child_text( 'Über mich', 'About' ),
	'journal'  => 'Journal',
	'contact'  => sa_child_text( 'Kontakt', 'Contact' ),
	'menu'     => sa_child_text( 'Menü', 'Menu' ),
);

// Determine active page dynamically
$is_work        = ( 'work' === $request_uri || 0 === strpos( $request_uri, 'work/' ) );
$is_services    = ( 'services' === $request_uri );
$is_about       = ( 'about-me' === $request_uri || 'about' === $request_uri );
$is_journal     = ( 'journal' === $request_uri || 0 === strpos( $request_uri, 'journal/' ) );
$is_contact     = ( 'contact' === $request_uri || 'kontakt' === $request_uri );
?>

<header class="sa-front-header" id="sa-header">
	<div class="sa-front-header__inner">

		<!-- BRAND LOGO & NAME -->
		<a class="sa-brand" href="<?php echo esc_url( $sa_home_url ); ?>" aria-label="<?php echo esc_attr( $sa_labels['home'] ); ?>">
			<span class="sa-brand__mark" aria-hidden="true">A<span>/</span></span>
			<span class="sa-brand__name">Studio Avelin</span>
		</a>

		<!-- DESKTOP NAVIGATION WITH BASELINE & SLIDING INDICATOR -->
		<nav class="sa-front-nav" aria-label="Primary navigation" data-sa-nav>
			<ul class="sa-front-nav__list">
				<li class="sa-front-nav__item">
					<a class="sa-front-nav__link<?php echo $is_work ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'work/' ); ?>"><?php echo esc_html( $sa_labels['work'] ); ?></a>
				</li>
				<li class="sa-front-nav__item">
					<a class="sa-front-nav__link<?php echo $is_services ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'services/' ); ?>"><?php echo esc_html( $sa_labels['services'] ); ?></a>
				</li>
				<li class="sa-front-nav__item">
					<a class="sa-front-nav__link<?php echo $is_about ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'about-me/' ); ?>"><?php echo esc_html( $sa_labels['about'] ); ?></a>
				</li>
				<li class="sa-front-nav__item">
					<a class="sa-front-nav__link<?php echo $is_journal ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'journal/' ); ?>"><?php echo esc_html( $sa_labels['journal'] ); ?></a>
				</li>
				<li class="sa-front-nav__item">
					<a class="sa-front-nav__link<?php echo $is_contact ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'contact/' ); ?>"><?php echo esc_html( $sa_labels['contact'] ); ?></a>
				</li>
				<li class="sa-front-nav__item sa-language-switch" aria-label="<?php echo esc_attr( sa_child_text( 'Sprache wählen', 'Choose language' ) ); ?>">
					<a class="sa-language-switch__link<?php echo 'de' === $sa_language ? ' is-active' : ''; ?>" href="<?php echo esc_url( sa_child_language_url( 'de' ) ); ?>" hreflang="de">DE</a>
					<span aria-hidden="true">/</span>
					<a class="sa-language-switch__link<?php echo 'en' === $sa_language ? ' is-active' : ''; ?>" href="<?php echo esc_url( sa_child_language_url( 'en' ) ); ?>" hreflang="en">EN</a>
				</li>
			</ul>

			<!-- BASELINE & SLIDING LIME SEGMENT -->
			<div class="sa-nav-baseline" aria-hidden="true">
				<span class="sa-nav-baseline__indicator"></span>
			</div>
		</nav>

		<!-- MOBILE MENU TOGGLE BUTTON -->
		<button class="sa-nav-toggle" type="button" aria-expanded="false" aria-controls="sa-mobile-menu" aria-label="Toggle navigation menu" data-sa-nav-toggle>
			<span class="sa-nav-toggle__label"><?php echo esc_html( $sa_labels['menu'] ); ?></span>
		</button>

	</div>

	<!-- MOBILE DROPDOWN MENU -->
	<div class="sa-mobile-menu" id="sa-mobile-menu" aria-label="Mobile navigation" data-sa-mobile-menu>
		<ul class="sa-mobile-menu__list">
			<li>
				<a class="sa-mobile-menu__link<?php echo $is_work ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'work/' ); ?>"><?php echo esc_html( $sa_labels['work'] ); ?></a>
			</li>
			<li>
				<a class="sa-mobile-menu__link<?php echo $is_services ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'services/' ); ?>"><?php echo esc_html( $sa_labels['services'] ); ?></a>
			</li>
			<li>
				<a class="sa-mobile-menu__link<?php echo $is_about ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'about-me/' ); ?>"><?php echo esc_html( $sa_labels['about'] ); ?></a>
			</li>
			<li>
				<a class="sa-mobile-menu__link<?php echo $is_journal ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'journal/' ); ?>"><?php echo esc_html( $sa_labels['journal'] ); ?></a>
			</li>
			<li>
				<a class="sa-mobile-menu__link<?php echo $is_contact ? ' is-active' : ''; ?>" href="<?php echo esc_url( $sa_home_url . 'contact/' ); ?>"><?php echo esc_html( $sa_labels['contact'] ); ?></a>
			</li>
			<li class="sa-mobile-menu__language">
				<a class="sa-language-switch__link<?php echo 'de' === $sa_language ? ' is-active' : ''; ?>" href="<?php echo esc_url( sa_child_language_url( 'de' ) ); ?>" hreflang="de">DE</a>
				<span aria-hidden="true">/</span>
				<a class="sa-language-switch__link<?php echo 'en' === $sa_language ? ' is-active' : ''; ?>" href="<?php echo esc_url( sa_child_language_url( 'en' ) ); ?>" hreflang="en">EN</a>
			</li>
		</ul>
	</div>
</header>
