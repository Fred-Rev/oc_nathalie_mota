<?php

function theme_setup() {

    register_nav_menus([
        'main-menu' => 'Menu principal',
        'footer-menu' => 'Menu footer'
    ]);

    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'theme_setup');


function theme_assets() {

    wp_enqueue_style(
        'main-style',
        get_stylesheet_uri()
    );

    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Poppins:wght@300;400;500&display=swap',
        [],
        null
    );

    wp_enqueue_script(
        'main-script',
        get_template_directory_uri() . '/assets/js/scripts.js',
        [],
        false,
        true
    );

    wp_enqueue_script(
        'lightbox-script',
        get_template_directory_uri() . '/assets/js/lightbox.js',
        [],
        false,
        true
    );

    wp_enqueue_script(
        'custom-selects-script',
        get_template_directory_uri() . '/assets/js/custom-selects.js',
        [],
        false,
        true
    );

    wp_localize_script(
        'main-script',
        'nathalie_ajax',
        [
            'ajax_url' => admin_url('admin-ajax.php')
        ]
    );
}

add_action('wp_enqueue_scripts', 'theme_assets');


function load_more_photos() {

    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;

    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $format = isset($_POST['format']) ? $_POST['format'] : '';
    $sort = isset($_POST['sort']) ? $_POST['sort'] : 'DESC';

    $args = [
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'paged' => $page,
        'orderby' => 'date',
        'order' => $sort
    ];

    $tax_query = [];

    if ($category) {
        $tax_query[] = [
            'taxonomy' => 'categorie',
            'field' => 'slug',
            'terms' => $category
        ];
    }

    if ($format) {
        $tax_query[] = [
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $format
        ];
    }

    if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :

        while ($query->have_posts()) :
            $query->the_post();

            get_template_part('template-parts/photo-block');

        endwhile;

        wp_reset_postdata();

    endif;

    wp_die();
}

add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');