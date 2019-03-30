<?php
include_once "functions.php";

function zotBanner($local='Home')
{
    $slug = slug($local);

    $query = new WP_Query(array(
        'numberposts' => -1,
        'post_status' => 'publish',
        'post_type' => 'banner',
        'meta_key' => 'local',
        'meta_value' => $local,
        'order' => 'desc'
    ));

    if ($query->have_posts()):
        ?>
        <section class="banner banner--<?php echo $slug; ?>" role="banner">
            <div data-carousel="banner" class="banner__container">
            <?php
            while ($query->have_posts()) : $query->the_post();

                $title = get_the_title();
                $image = get_field('image');
                $link = get_field('link');

            ?>

            <div class="banner__item">
                <?php if ($link): ?>
                <a class="banner__link" href="<?php echo $link; ?>">
                <?php endif; ?>

                    <img class="banner__img" src="<?php echo $image; ?>" alt="<?php echo $title ?>"/>

                <?php if ($link): ?>
                </a>
                <?php endif; ?>

            </div>
            <?php endwhile; ?>
            </div>
        </section>
    <?php
    endif;
    wp_reset_query();
}