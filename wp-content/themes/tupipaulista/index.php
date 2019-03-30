<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zot
 */

get_header();
zotBanner('Home');
?>


<main id="main" class="main">

    <div class="main__container">
        <section class="home__institucional">
            <div class="home__container">
                <?php zotPage('instituicao'); ?>
            </div>
        </section>

        <div class="home__journal">
            <div class="home__container">
                <div class="home__column">
                    <section class="home__cursos">
                        <h1 class="title">Conheça nossos cursos</h1>
                        <?php include 'posts/curso.php'; ?>
                    </section>
                    <section class="home__news">
                        <h1 class="title">Últimas Notícias</h1>
                        <?php include 'posts/noticias.php'; ?>
                    </section>
                    <section class="home__facebook">
                        <h1 class="title">Acompanhe-nos</h1>
                        <?php echo get_theme_mod('facebook_page'); ?>
                    </section>
                </div>
            </div>
        </div>

        <div class="home__team-galleries">
            <div class="home__container">
                <section class="home__team">
                    <h1 class="title">Nossa Equipe</h1>
                    <div class="home__team--container">
                        <?php include 'posts/equipe.php'; ?>
                    </div>
                </section>
                <section class="home__galleries">
                    <h1 class="title">Galeria de Imagens</h1>
                    <div class="home__galleries--container">
                        <?php include 'posts/galeria.php'; ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main><!-- #main -->


<?php
get_footer();
