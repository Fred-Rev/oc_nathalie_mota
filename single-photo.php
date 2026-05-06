<?php get_header(); ?>

<main class="single-photo">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section class="single-photo-content">

            <!-- INFOS -->
            <div class="single-photo-info">

                <h1><?php the_title(); ?></h1>

                <p>
                    Référence :
                    <?php echo get_post_meta(get_the_ID(), 'reference', true); ?>
                </p>

                <p>
                    Type :
                    <?php echo get_post_meta(get_the_ID(), 'type', true); ?>
                </p>

                <p>
                    Catégorie :
                    <?php the_terms(get_the_ID(), 'categorie'); ?>
                </p>

                <p>
                    Format :
                    <?php the_terms(get_the_ID(), 'format'); ?>
                </p>

                <p>
                    Année :
                    <?php echo get_the_date('Y'); ?>
                </p>

                <button class="photo-contact-button"
                        data-ref="<?php echo get_post_meta(get_the_ID(), 'reference', true); ?>">
                    Contact
                </button>

            </div>

            <!-- IMAGE -->
            <div class="single-photo-image">

                <?php the_post_thumbnail('large'); ?>

            </div>

        </section>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>