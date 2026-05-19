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
<?php wp_footer(); ?>
</body>
</html>