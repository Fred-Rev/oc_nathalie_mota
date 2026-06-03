<article class="photo-block">

    <?php
    $photo_id = get_the_ID();
    $photo_url = get_the_post_thumbnail_url($photo_id, 'large');
    $photo_title = get_the_title($photo_id);
    $photo_reference = get_post_meta($photo_id, 'reference', true);

    $categories = get_the_terms($photo_id, 'categorie');
    $category_name = $categories ? $categories[0]->name : '';
    ?>

    <?php the_post_thumbnail('medium_large'); ?>

    <div class="photo-overlay">

        <button class="photo-fullscreen"
                data-image="<?php echo esc_url($photo_url); ?>"
                data-title="<?php echo esc_attr($photo_title); ?>"
                data-reference="<?php echo esc_attr($photo_reference); ?>"
                data-category="<?php echo esc_attr($category_name); ?>">
            ⛶
        </button>

        <a class="photo-eye" href="<?php the_permalink(); ?>">
            👁
        </a>

        <div class="photo-overlay-info">
            <span><?php echo esc_html($photo_title); ?></span>
            <span><?php echo esc_html($category_name); ?></span>
        </div>

    </div>

</article>