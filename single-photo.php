<?php get_header(); ?>

<main class="single-photo">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section class="single-photo-content">

            <div class="single-photo-info">

                <h1><?php the_title(); ?></h1>

                <p>Référence : <?php echo get_post_meta(get_the_ID(), 'reference', true); ?></p>
                <p>
                Catégorie :
                <?php
                $categories = get_the_terms(get_the_ID(), 'categorie');
                if ($categories) {
                echo esc_html($categories[0]->name);
                }
                ?>
                </p>
                <p>
                Format :
                <?php
                $formats = get_the_terms(get_the_ID(), 'format');
                if ($formats) {
                echo esc_html($formats[0]->name);
                }
                ?>
                </p>
                <p>Type : <?php echo get_post_meta(get_the_ID(), 'type', true); ?></p>
                <p>Année : <?php echo get_the_date('Y'); ?></p>

            </div>

            <div class="single-photo-image">
                <?php the_post_thumbnail('large'); ?>
            </div>

        </section>

        <div class="photo-interactions">

            <div class="photo-contact">

                <p>Cette photo vous intéresse ?</p>

                <button class="photo-contact-button"
                        data-ref="<?php echo get_post_meta(get_the_ID(), 'reference', true); ?>">
                    Contact
                </button>

            </div>
        

            <div class="photo-navigation">

    <div class="photo-nav-thumbnail">

        <?php
        $next_post = get_next_post();

        if ($next_post && has_post_thumbnail($next_post->ID)) {
            echo get_the_post_thumbnail($next_post->ID, 'thumbnail');
        }
        ?>

    </div>

    <div class="photo-nav-arrows">

        <div class="photo-prev">
            <?php previous_post_link('%link', '⟵'); ?>
        </div>

        <div class="photo-next">
            <?php next_post_link('%link', '⟶'); ?>
        </div>

    </div>
</div>
</div>

        <section class="related-photos">

            <h2>Vous aimerez aussi</h2>

            <div class="related-photos-grid">

                <?php
                $categories = wp_get_post_terms(get_the_ID(), 'categorie');

                if ($categories) :

                    $category_ids = [];

                    foreach ($categories as $category) {
                        $category_ids[] = $category->term_id;
                    }

                    $related_query = new WP_Query([
                        'post_type' => 'photo',
                        'posts_per_page' => 2,
                        'post__not_in' => [get_the_ID()],
                        'tax_query' => [
                            [
                                'taxonomy' => 'categorie',
                                'field' => 'term_id',
                                'terms' => $category_ids
                            ]
                        ]
                    ]);

                    if ($related_query->have_posts()) :

                        while ($related_query->have_posts()) :
                            $related_query->the_post();

                            get_template_part('template-parts/photo-block');

                        endwhile;

                        wp_reset_postdata();

                    endif;

                endif;
                ?>

            </div>

        </section>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>