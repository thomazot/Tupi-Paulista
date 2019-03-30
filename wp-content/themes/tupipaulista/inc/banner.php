<?php
$banner     = get_field('banner');
$background = get_field('banner_background');
$title      = get_field('banner_titulo');
$style      = '';

if(!$background) $background = '#1b3f9a';
if(!$title) $title = get_the_title();

?>
<section class="page__banner page-banner" style="--background: <?php echo $background; ?>" >
    <div class="page-banner__container">
        <h1 class="page-banner__title"><?php echo $title ?></h1>
        <?php if($banner): ?>
        <figure class="page-banner__image"  style="--background: <?php echo $background; ?>"><span style="background-image: url('<?php echo $banner ?>')"></span></figure>
        <?php endif; ?>
    </div>
</section>


