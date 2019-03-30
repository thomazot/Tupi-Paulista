<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package zot
 */

get_header();

?>
    <main id="main" class="main">

        <div class="main__container">
            <section class="cursos">
				<header class="cursos__header">
					<h1 class="title">Todos os Cursos</h1>
				</header>
				<div class="cursos_main">
                    <div class="grid__three">
                        <?php
                            $args = array(
                                'post_status' => 'publish',
                                'post_type' => 'curso',
                                'order' => 'asc'
                            );
                            include('posts/curso.php');
                        ?>
                    </div>
				</div>
			</section>
        </div>
    </main>
<?php
get_footer();
