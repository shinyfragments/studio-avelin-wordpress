<?php
/**
 * Studio Avelin Child — theme setup and asset loading.
 *
 * @package studio-avelin-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'SA_CHILD_VERSION' ) ) {
	define( 'SA_CHILD_VERSION', '1.0.0' );
}

/**
 * Basic theme supports. Twenty Twenty-Four already declares most of these,
 * but the child theme keeps them explicit so nothing depends on parent order.
 */
function sa_child_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'sa_child_setup' );

/**
 * Preconnect to the Google Fonts hosts so the webfonts arrive early.
 *
 * @param array  $urls          URLs to print.
 * @param string $relation_type Relation type.
 * @return array
 */
function sa_child_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.googleapis.com',
		);
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'sa_child_resource_hints', 10, 2 );

/**
 * Enqueue styles and scripts.
 *
 * Order matters: parent style, Google Fonts, child style, then the
 * homepage-only stylesheet and script.
 */
function sa_child_enqueue_assets() {
	$theme_dir = get_stylesheet_directory();
	$theme_uri = get_stylesheet_directory_uri();

	// Google Fonts — Inter + Poppins + Raleway.
	wp_enqueue_style(
		'sa-google-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@200;300;400;500&family=Raleway:wght@300;400;500;600&display=swap',
		array(),
		null
	);

	// Parent theme stylesheet (Twenty Twenty-Four is a block theme; this is a no-op
	// when the file is absent, so it is guarded).
	if ( file_exists( get_template_directory() . '/style.css' ) ) {
		wp_enqueue_style(
			'sa-parent-style',
			get_template_directory_uri() . '/style.css',
			array(),
			SA_CHILD_VERSION
		);
	}

	// Child theme stylesheet — global brand tokens.
	wp_enqueue_style(
		'sa-child-style',
		$theme_uri . '/style.css',
		array( 'sa-google-fonts' ),
		SA_CHILD_VERSION
	);

	// Inner pages (About Me, etc.): shared chrome styles + page styles, no hero JS.
	if ( ! is_front_page() && is_page() ) {
		$home_css = $theme_dir . '/assets/css/home.css';
		wp_enqueue_style(
			'sa-home',
			$theme_uri . '/assets/css/home.css',
			array( 'sa-child-style' ),
			file_exists( $home_css ) ? (string) filemtime( $home_css ) : SA_CHILD_VERSION
		);

		$pages_css = $theme_dir . '/assets/css/pages.css';
		wp_enqueue_style(
			'sa-pages',
			$theme_uri . '/assets/css/pages.css',
			array( 'sa-home' ),
			file_exists( $pages_css ) ? (string) filemtime( $pages_css ) : SA_CHILD_VERSION
		);
	}

	// Homepage-only assets.
	if ( is_front_page() ) {
		$css_path = $theme_dir . '/assets/css/home.css';
		wp_enqueue_style(
			'sa-home',
			$theme_uri . '/assets/css/home.css',
			array( 'sa-child-style' ),
			file_exists( $css_path ) ? (string) filemtime( $css_path ) : SA_CHILD_VERSION
		);

		$js_path = $theme_dir . '/assets/js/home.js';
		wp_enqueue_script(
			'sa-home',
			$theme_uri . '/assets/js/home.js',
			array(),
			file_exists( $js_path ) ? (string) filemtime( $js_path ) : SA_CHILD_VERSION,
			true
		);

		// Optional work slider — only loaded when the file actually exists.
		$slider_path = $theme_dir . '/js/sa-work-slider.js';
		if ( file_exists( $slider_path ) ) {
			wp_enqueue_script(
				'sa-work-slider',
				$theme_uri . '/js/sa-work-slider.js',
				array(),
				(string) filemtime( $slider_path ),
				true
			);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'sa_child_enqueue_assets' );

/**
 * Drop the parent theme's global block styles on the homepage. The custom
 * template supplies its own layout and does not need block-theme chrome.
 */
function sa_child_dequeue_block_noise() {
	if ( ! is_front_page() ) {
		return;
	}

	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'classic-theme-styles' );
	wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'sa_child_dequeue_block_noise', 100 );

/**
 * Remove the WordPress admin bar margin hack on the homepage so the hero can
 * really occupy the full viewport height for logged-in editors.
 */
function sa_child_front_page_body_class( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'sa-front-body';
	}

	return $classes;
}
add_filter( 'body_class', 'sa_child_front_page_body_class' );

/**
 * Site-wide cleanup: emoji scripts and the WP generator tag add nothing here.
 */
function sa_child_head_cleanup() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
}
add_action( 'init', 'sa_child_head_cleanup' );

/**
 * Studio Avelin navigation used by the header and the footer.
 *
 * @param string $context Either 'header' or 'footer'.
 * @return array
 */
function sa_child_nav_items( $context = 'header' ) {
	$home = trailingslashit( home_url( '/' ) );

	if ( 'footer' === $context ) {
		return array(
			array(
				'label' => 'Work',
				'url'   => $home . '#work',
			),
			array(
				'label' => 'About',
				'url'   => $home . '#about',
			),
			array(
				'label' => 'Experiments',
				'url'   => $home . 'experiments/',
			),
			array(
				'label' => 'Journal',
				'url'   => $home . 'journal/',
			),
		);
	}

	// On the homepage the anchors stay local; elsewhere they point back home.
	$prefix = is_front_page() ? '' : $home;

	return array(
		array(
			'label' => 'Work',
			'url'   => $prefix . '#work',
		),
		array(
			'label' => 'About',
			'url'   => $prefix . '#about',
		),
		array(
			'label' => 'Experiments',
			'url'   => $home . 'experiments/',
		),
		array(
			'label' => 'Journal',
			'url'   => $home . 'journal/',
		),
		array(
			'label' => 'Contact',
			'url'   => 'mailto:hello@studio-avelin.com',
		),
	);
}

/**
 * Route legal pages (Datenschutz, Impressum) to their custom Studio Avelin PHP templates
 * so they use the exact flat Studio Avelin header & footer matching the homepage.
 */
function sa_child_legal_template_include( $template ) {
	if ( is_page() ) {
		$slug = get_post_field( 'post_name', get_post() );
		if ( 'datenschutzerklaerung' === $slug || 'datenschutz' === $slug ) {
			$php_template = get_stylesheet_directory() . '/page-datenschutzerklaerung.php';
			if ( file_exists( $php_template ) ) {
				return $php_template;
			}
		}
		if ( 'about-me' === $slug || 'about' === $slug ) {
			$php_template = get_stylesheet_directory() . '/page-about-me.php';
			if ( file_exists( $php_template ) ) {
				return $php_template;
			}
		}
		if ( 'impressum' === $slug ) {
			$php_template = get_stylesheet_directory() . '/page-impressum.php';
			if ( file_exists( $php_template ) ) {
				return $php_template;
			}
		}
	}
	return $template;
}
add_filter( 'template_include', 'sa_child_legal_template_include', 99 );

