<?php
$args = isset($args_galeria) ? $args_galeria : array(
    'post_status' => 'publish',
    'post_type' => 'galeria',
    'showposts'=> 3,
    'order' => 'asc'
);

$my_query = new WP_Query($args);
if( $my_query->have_posts() ):
    $count = 0;
    while ($my_query->have_posts()) : $my_query->the_post();
        $title          = get_the_title();
        $image          = get_field('imagem_capa');
        $link           = get_the_permalink();

?>
    <article class="gallery" role="article" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="gallery__container">
            <?php if($image): ?>
                <figure class="gallery__image">
                    <a href="<?php echo $link; ?>">
                        <?php echo wp_get_attachment_image($image, 'medium'); ?>
                    </a>
                </figure>
            <?php endif ?>
            <div class="gallery__header">
                <h2 class="gallery__name">
                    <?php echo $title; ?>
                </h2>
            </div>
        </div>
    </article>
<?php

    endwhile;
    wp_reset_query();
endif;