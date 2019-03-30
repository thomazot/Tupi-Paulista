<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zot
 */

?>


	<footer id="footer" class="footer">
        <div class="footer__container">
            <?php if(get_theme_mod('footer_logo')): ?>
            <div class="footer__logo">
                <h2>
                    <a href="/">
                        <img src="<?php echo esc_url(get_theme_mod('footer_logo')); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                    </a>
                </h2>
            </div>
            <?php endif; ?>
            <div class="footer__infos">
                <div class="footer__info">

                    <div class="footer__address">
                        <?php echo get_theme_mod('address'); ?>
                    </div>
                    <div class="footer__phone">
                        <?php echo get_theme_mod('footer_phone'); ?>
                    </div>
                </div>

                <?php
                    zotMenu('Instituição');
                    zotMenu('Cursos');
                    zotMenu('Biblioteca');
                    zotMenu('Extra');
                ?>
            </div>
        </div>
	</footer><!-- #colophon -->

    <section class="copyright">
        <div class="copyright__container">
            Faculdade Convêniada a:
            <a href="//reges.com">Reges - Rede Gonzaga de Ensino Superior</a>
        </div>
    </section>
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
