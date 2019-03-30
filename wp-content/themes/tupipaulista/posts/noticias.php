<?php
$args = isset($args_noticias) ? $args_noticias : array(
    'posts_per_page'    => 30,
    'paged'             => get_query_var('paged') ? get_query_var('paged') : 1,
    'post_status'       => 'publish',
    'post_type'         => 'Post',
    'showposts'         => 3,
    'order'             => 'asc'
);

$hasFotos = isset($fotos_noticias) ? $fotos_noticias : false;

$my_query = new WP_Query($args);
if( $my_query->have_posts() ):
    $count = 0;
    while ($my_query->have_posts()) : $my_query->the_post();
        $title          = get_the_title();
        $image          = get_field('imagem_capa');
        $description    = get_field('short_description');
        $data           = get_field('data');
        $link           = get_the_permalink();

?>
    <article class="news" role="article" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="news__container">

            <div class="news__header">
                <?php if($image && $count++ == 0 || $hasFotos): ?>
                    <figure class="news__image">
                        <?php echo wp_get_attachment_image($image, 'large'); ?>
                    </figure>
                <?php endif ?>
                <div class="news__title">
                    <?php echo $title; ?>
                    <div class="news__data"><?php echo $data; ?></div>
                </div>
            </div>
            <div class="news__main">
                <div class="news__short-description"><?php echo $description ?></div>
                <div class="news__actions">
                    <a class="news__link-more" href="<?php echo $link?>" class="<?php echo $title?>">leia mais</a>
                </div>
            </div>
        </div>
    </article>
<?php

    endwhile;

    $big = 999999999; // need an unlikely integer
    $paginate = paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $my_query->max_num_pages
    ) );

    if($paginate):
    ?>
        <section class="paginate"><?php echo $paginate; ?></section>
    <?php
    endif;

    wp_reset_query();
endif;