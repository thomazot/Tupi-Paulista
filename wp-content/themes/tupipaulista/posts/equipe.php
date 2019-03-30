<?php
$args = isset($args_equipes) ? $args_equipes : array(
    'post_status' => 'publish',
    'post_type' => 'equipe',
    'showposts'=> 3,
    'order' => 'asc'
);

$my_query = new WP_Query($args);
if( $my_query->have_posts() ):
    $count = 0;
    while ($my_query->have_posts()) : $my_query->the_post();
        $title          = get_the_title();
        $image          = get_field('imagem_capa');
        $office         = get_field('cargo');
        $link           = get_the_permalink();

?>
    <article class="team" role="article" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="team__container">
            <?php if($image): ?>
                <figure class="team__image">
                    <a href="<?php echo $link; ?>">
                        <?php echo wp_get_attachment_image($image, 'medium'); ?>
                    </a>
                </figure>
            <?php endif ?>
            <div class="team__header">
                <a href="<?php echo $link; ?>">
                    <h2 class="team__name">
                        <?php echo $title; ?>
                    </h2>
                    <span class="team__office">
                        <?php echo $office?>
                    </span>
                </a>
            </div>
        </div>
    </article>
<?php

    endwhile;
    wp_reset_query();
endif;