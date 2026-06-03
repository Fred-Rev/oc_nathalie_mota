<footer class="site-footer">

    <div class="container">
        <nav class="footer-nav">
            <?php
            wp_nav_menu([
                'theme_location' => 'footer-menu',
                'container' => false,
                'menu_class' => 'footer-menu'
            ]);
            ?>
        </nav>

        
    </div>

</footer>
<?php get_template_part('template-parts/modal-contact'); ?>

<div class="lightbox hidden">

    <button class="lightbox-close">✕</button>

    <button class="lightbox-prev">
    ⟵ <span>Précédente</span>
</button>

<button class="lightbox-next">
    <span>Suivante</span> ⟶
</button>
    <div class="lightbox-content">

        <img class="lightbox-image" src="" alt="">

        <div class="lightbox-info">

            <span class="lightbox-reference"></span>
            <span class="lightbox-category"></span>

        </div>

    </div>

    <button class="lightbox-next">⟶</button>

</div>
<?php wp_footer(); ?>
</body>
</html>