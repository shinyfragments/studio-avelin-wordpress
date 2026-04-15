<?php
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'studio-avelin-child-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );
});
