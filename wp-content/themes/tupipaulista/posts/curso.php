<?php
$args = isset($args_cursos) ? $args_cursos : array(
    'post_status' => 'publish',
    'post_type' => 'curso',
    'showposts'=> 2,
    'order' => 'asc'
);

$my_query = new WP_Query($args);
if( $my_query->have_posts() ):
    while ($my_query->have_posts()) : $my_query->the_post();
        $title          = get_the_title();
        $image          = get_field('imagem_capa');
        $description    = get_field('short_description');
        $duracao        = get_field('duracao');
        $link           = get_the_permalink();
        $color          = get_field('color');
        $background     = get_field('background');

?>
    <article class="curso" role="article" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="curso__container">
            <?php if($image): ?>
                <figure class="curso__image">
                    <?php echo wp_get_attachment_image($image, 'large'); ?>
                </figure>
            <?php endif ?>
            <div class="curso__header" style="background-color: <?php echo $background; ?>;color: <?php echo $color; ?>">
                <div class="curso__title"><?php echo $title; ?></div>
                <div class="curso__duration"><?php echo $duracao; ?></div>
            </div>
            <div class="curso__main">
                <div class="curso__short-description"><?php echo $description ?></div>
                <div class="curso__actions">
                    <a class="curso__link-more" style="background-color: <?php echo $background; ?>;color: <?php echo $color; ?>" href="<?php echo $link?>" class="<?php echo $title?>">saiba mais</a>
                </div>
            </div>
        </div>
    </article>
<?php

    endwhile;
    wp_reset_query();
endif;