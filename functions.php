<?php

function theme_setup() {

    register_nav_menus([
        'main-menu' => 'Menu principal'
    ]);

    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'theme_setup');


function theme_assets() {

    // CSS principal
    wp_enqueue_style(
        'main-style',
        get_stylesheet_uri()
    );

    // Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap',
        false
    );

    // JS
    wp_enqueue_script(
        'main-script',
        get_template_directory_uri() . '/assets/js/scripts.js',
        [],
        false,
        true
    );
}

add_action('wp_enqueue_scripts', 'theme_assets');