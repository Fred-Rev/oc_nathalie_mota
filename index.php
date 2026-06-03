<?php get_header(); ?>

<main class="page-content">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <h1><?php the_title(); ?></h1>

        <div class="page-text">
            <?php the_content(); ?>
        </div>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>