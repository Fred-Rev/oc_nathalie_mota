<?php get_header(); ?>

<main class="single-photo">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section class="photo-content">

            <div class="photo-image">
                <?php the_post_thumbnail('large'); ?>
            </div>

            <div class="photo-info">
                <h1><?php the_title(); ?></h1>

                <p>Référence : <?php the_field('reference'); ?></p>
                <p>Type : <?php the_field('type'); ?></p>

                <p>Catégorie :
                    <?php the_terms(get_the_ID(), 'categorie'); ?>
                </p>

                <p>Format :
                    <?php the_terms(get_the_ID(), 'format'); ?>
                </p>

                <button id="open-modal">Contact</button>

            </div>

        </section>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>