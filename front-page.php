<?php get_header(); ?>

<main class="homepage">

    <section class="hero-home"
         style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/hero.webp');">
        <h1>Photographe Event</h1>
    </section>

    <section class="photo-filters">
        <select id="filter-category">
            <option value="">Catégories</option>
        </select>

        <select id="filter-format">
            <option value="">Formats</option>
        </select>

        <select id="filter-sort">
            <option value="DESC">Plus récentes</option>
            <option value="ASC">Plus anciennes</option>
        </select>
    </section>

    <section class="home-gallery">
        <div class="home-gallery-grid" id="photo-list">

            <?php
            $photos = new WP_Query([
                'post_type' => 'photo',
                'posts_per_page' => 8,
                'orderby' => 'date',
                'order' => 'DESC'
            ]);

            if ($photos->have_posts()) :
                while ($photos->have_posts()) :
                    $photos->the_post();

                    get_template_part('template-parts/photo-block');

                endwhile;

                wp_reset_postdata();
            endif;
            ?>

        </div>

        <button id="load-more-photos" data-page="1">
            Charger plus
        </button>
    </section>

</main>

<?php get_footer(); ?>