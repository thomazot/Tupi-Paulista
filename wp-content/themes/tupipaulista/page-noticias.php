<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zot
 */

get_header(); ?>
<?php
while ( have_posts() ) : the_post(); ?>
    <?php include_once 'inc/banner.php'; ?>


    <main id="main" class="main">

        <div class="main__container">

            <?php
            $args_noticias = array(
                'posts_per_page'    => 10,
                'paged'             => get_query_var('paged') ? get_query_var('paged') : 1,
                'post_status'       => 'publish',
                'post_type'         => 'Post',
                'order'             => 'desc'
            );
            $fotos_noticias = true;
            include_once 'posts/noticias-page.php';

            ?>

        </div><!-- #primary -->

        <aside class="sticky message">
            <div class="message__container">
                <?php maislidos(); ?>
            </div>

        </aside>

    </main><!-- #main -->

<?php
endwhile; // End of the loop.
?>

<?php
get_footer();
