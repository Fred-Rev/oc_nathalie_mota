<?php get_header(); ?>

<main class="homepage">

    <section class="hero-home"
             style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/hero.webp');">
        <h1>Photographe Event</h1>
    </section>

    <section class="photo-filters">

        <div class="photo-filters-left">

            <div class="custom-select-wrapper">

                <?php
                $categories = get_terms([
                    'taxonomy' => 'categorie',
                    'hide_empty' => true
                ]);
                ?>

                <select id="filter-category" class="real-select">
                    <option value="">CATÉGORIES</option>

                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo esc_attr($category->slug); ?>">
                            <?php echo esc_html($category->name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <div class="custom-select" data-select="filter-category">
                    <button type="button" class="custom-select-trigger">
                        CATÉGORIES
                    </button>

                    <div class="custom-options">
                        <button type="button" data-value="">CATÉGORIES</button>

                        <?php foreach ($categories as $category) : ?>
                            <button type="button" data-value="<?php echo esc_attr($category->slug); ?>">
                                <?php echo esc_html($category->name); ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <div class="custom-select-wrapper">

                <?php
                $formats = get_terms([
                    'taxonomy' => 'format',
                    'hide_empty' => true
                ]);
                ?>

                <select id="filter-format" class="real-select">
                    <option value="">FORMATS</option>

                    <?php foreach ($formats as $format) : ?>
                        <option value="<?php echo esc_attr($format->slug); ?>">
                            <?php echo esc_html($format->name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <div class="custom-select" data-select="filter-format">
                    <button type="button" class="custom-select-trigger">
                        FORMATS
                    </button>

                    <div class="custom-options">
                        <button type="button" data-value="">FORMATS</button>

                        <?php foreach ($formats as $format) : ?>
                            <button type="button" data-value="<?php echo esc_attr($format->slug); ?>">
                                <?php echo esc_html($format->name); ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

        </div>

        <div class="photo-filters-right">

            <div class="custom-select-wrapper">

                <select id="filter-sort" class="real-select">
                    <option value="">TRIER PAR</option>
                    <option value="DESC">Plus récentes</option>
                    <option value="ASC">Plus anciennes</option>
                </select>

                <div class="custom-select" data-select="filter-sort">
                    <button type="button" class="custom-select-trigger">
                        TRIER PAR
                    </button>

                    <div class="custom-options">
                        <button type="button" data-value="">TRIER PAR</button>
                        <button type="button" data-value="DESC">Plus récentes</button>
                        <button type="button" data-value="ASC">Plus anciennes</button>
                    </div>
                </div>

            </div>

        </div>

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