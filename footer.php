<footer class="site-footer">

   <div class="footer-content">

        <a href="<?php echo home_url('/mentions-legales'); ?>">
            Mentions légales
        </a>

        <a href="<?php echo get_privacy_policy_url(); ?>">
            Vie privée
        </a>

        <span>Tous droits réservés</span>

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

</div>
<?php wp_footer(); ?>
</body>
</html>