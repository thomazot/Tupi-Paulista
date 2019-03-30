<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package zot
 */

get_header(); ?>


    <main id="main" class="main">

        <div class="main__container">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>

		</div>
        <aside class="sticky message">
            <div class="message__container">
                <?php maislidos(); ?>
            </div>
        </aside>
    </main>

<?php
get_footer();
