<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header">

    <div class="header-container">

        <!-- LOGO -->
        <div class="site-logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_NM.png" alt="Nathalie Mota">
            </a>
        </div>

        <!-- BURGER (AJOUT ICI) -->
        <button class="burger-menu" id="burger-toggle">
            ☰
        </button>

        <!-- NAV -->
        <nav class="main-nav">
            <?php
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => 'menu'
            ]);
            ?>
        </nav>

    </div>

</header>