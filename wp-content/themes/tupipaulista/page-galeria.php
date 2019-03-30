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
            <h1 class="title">Galeria</h1>
            <div class="page__gallery">
            <?php
            $args_galeria = array(
                'posts_per_page'    => 10,
                'paged'             => get_query_var('paged') ? get_query_var('paged') : 1,
                'post_status'       => 'publish',
                'post_type'         => 'galeria',
                'order'             => 'desc'
            );
            include_once 'posts/galeria-page.php';
            ?>
            </div>

        </div><!-- #primary -->

        <aside class="sticky message">
            <div class="message__container">
                <?php include_once  "posts/mission.php"?>
                <?php include_once "posts/location.php"?>
            </div>

        </aside>

    </main><!-- #main -->

<?php
endwhile; // End of the loop.
?>

<?php
get_footer();
