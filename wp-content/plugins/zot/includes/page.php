<?php

include_once 'functions.php';

function zotPage($slug_page)
{
    $slug = slug($slug_page);
    $query = new WP_Query(array(
        'post_type' => 'page',
        'pagename' => $slug_page
    ));

    if ($query->have_posts()):
    ?>
    <article class="page page--<?php echo $slug; ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="page__container">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php
            $title          = get_the_title();
            $content        = get_field('short_description');
            $galleries      = get_field('galleries');
            $link           = get_the_permalink();
            $video          = get_field('video');
            ?>

            <?php if($galleries): ?>
                <?php foreach( $galleries as $gallery): ?>
                <?php
                $images = get_field('galeria', $gallery->ID);
                ?>
                <div class="page__galleries page-galleries">
                    <div class="page-galleries__item">
                        <?php echo wp_get_attachment_image( get_field('imagem_capa', $gallery->ID), 'large' ); ?>
                    </div>
                    <?php foreach( $images as $image ): ?>
                    <div class="page-galleries__item">
                        <?php echo wp_get_attachment_image( $image['ID'], 'medium' ); ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="page__main">
                <h1 class="page__title"><?php echo $title; ?></h1>
                <div class="page__text"><?php echo $content; ?></div>
                <div class="page__actions">
                    <a class="page__link page__link--more" href="<?php echo $link; ?>">saiba mais</a>
                </div>

                <?php if($video): ?>
                <div class="page__video">
                    <?php echo $video; ?>
                </div>
                <?php endif ?>
            </div>

        <?php endwhile; ?>
        </div>
    </article>
    <?php
    endif;
    wp_reset_query();
}