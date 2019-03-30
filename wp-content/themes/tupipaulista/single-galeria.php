<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package zot
 */

get_header();

$title =  $post->post_title ;
$content = apply_filters( 'the_content', $post->post_content );
?>
    <?php include_once 'inc/banner.php'; ?>


    <main id="main" class="main">

        <div class="main__container">
            <?php wp_custom_breadcrumbs(); ?>

            <div class="word-html">
                <h1 class="title"><?php echo $title ?></h1>
                <div class="data">
                    <span><?php the_field('data'); ?></span>
                </div>
                <?php echo $content; ?>
                <?php

                $image_ids = get_field('galeria', false, false);
                $shortcode = '[gallery ids="' . implode(',', $image_ids) . '"]';

                echo do_shortcode( $shortcode );

                ?>
            </div>
        </div>
    </main>

<?php
get_footer();