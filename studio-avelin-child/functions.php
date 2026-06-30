<?php
/**
 * Studio Avelin Child Theme Assets
 */

function studio_avelin_child_enqueue_assets() {

    wp_enqueue_style(
        'studio-avelin-google-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Raleway:wght@300;400;500;600&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'studio-avelin-child-style',
        get_stylesheet_uri(),
        array('studio-avelin-google-fonts'),
        wp_get_theme()->get('Version')
    );

    $home_css_path = get_stylesheet_directory() . '/assets/css/home.css';

    if (file_exists($home_css_path)) {
        wp_enqueue_style(
            'studio-avelin-home',
            get_stylesheet_directory_uri() . '/assets/css/home.css',
            array('studio-avelin-child-style'),
            filemtime($home_css_path)
        );
    }

    $work_slider_path = get_stylesheet_directory() . '/js/sa-work-slider.js';

    if (file_exists($work_slider_path)) {
        wp_enqueue_script(
            'studio-avelin-work-slider',
            get_stylesheet_directory_uri() . '/js/sa-work-slider.js',
            array(),
            filemtime($work_slider_path),
            true
        );
    }

    $home_js_path = get_stylesheet_directory() . '/assets/js/home.js';

    if (file_exists($home_js_path)) {
        wp_enqueue_script(
            'studio-avelin-home',
            get_stylesheet_directory_uri() . '/assets/js/home.js',
            array(),
            filemtime($home_js_path),
            true
        );
    }
}

add_action('wp_enqueue_scripts', 'studio_avelin_child_enqueue_assets');
