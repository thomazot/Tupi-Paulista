<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zot
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#2b449c">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <?php $image = get_field('imagem_capa');  ?>
        <?php if($image[0] != "" ){ ?>
            <meta property="og:image" content="<?php echo $image[0]; ?>"  >
        <?php } else { ?>
            <meta property="og:image" content="logo.png"  >

        <?php } ?>
        <meta property="og:image:width" content="3523" >
        <meta property="og:image:height" content="2372" >
        <meta property="og:url" content="<?php echo the_permalink(); ?>"  >
        <meta property="og:title" content="<?php echo the_title(); ?>"  >
        <meta property="og:site_name" content="Reges - Dracena" />
        <meta property="og:description" content="" >
        <meta property="fb:app_id" content="" >
        <meta property="fb:admins" content="" >

    <?php endwhile; wp_reset_query(); ?>

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <link href="//fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="wrapper">
    <section class="search" id="search">
        <div class="search__container">
            <?php get_search_form() ?>
            <button type="button" class="button button--close" aria-controls="search"> Fechar </button>
        </div>
    </section>
	<header id="header" class="header">

        <section class="header__topbar">
            <div class="header--container">
                <div class="header__phone">
                    Fones: <strong><?php echo get_theme_mod('phone'); ?></strong>
                </div>

                <div class="customer">

                    <div class="customer__item customer__item--facebook">
                        <a data-icon="facebook" class="customer__link" href="<?php echo get_theme_mod('facebook'); ?>" target="_blank" title="Facebook">
                            Facebook
                        </a>
                    </div>
                    <div class="customer__item customer__item--teacher">
                        <a class="customer__link" href="<?php echo get_theme_mod('areaprofessor'); ?>" target="_blank" title="Área do professor">
                            Área do professor
                        </a>
                    </div>
                    <div class="customer__item customer__item--student">
                        <a class="customer__link" href="<?php echo get_theme_mod('areaaluno'); ?>" target="_blank" title="Área do aluno">
                            Área do aluno
                        </a>
                    </div>
                    <div class="customer__item customer__item--search">
                        <button type="button" class="button button--search" aria-controls="search">Busca</button>
                    </div>
                </div>
            </div>
        </section>

		<section class="header__headbar">
            <div class="header--container">
                <?php zot_custom_logo(); ?>
                <div class="header__navbar">
                    <button type="button" aria-controls="menu" class="button button--navbar">Menu</button>
                    <?php zotMenu(); ?>
                </div>
            </div>
        </section>

	</header><!-- #masthead -->
