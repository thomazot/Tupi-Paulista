<?php
include_once 'functions.php';

function zotMenu($menu_name='Menu') {
    $locations  = wp_get_nav_menu_object($menu_name);
    $menu_id    = $locations->term_id;
    $menuitems  = wp_get_nav_menu_items( $menu_id, array( 'order' => 'DESC' ) );
    $name       = $locations->name;
    $slug       = slug($name);

    echo '<nav data-menu-name="'. $name. '" id="'. $slug .'" class="menu menu--'. $slug .'"><ul class="menu__container">';

    zotMenuItem($menuitems);

    echo '</ul></nav>';

}

function zotMenuItem($menuitems) {
    $count = 0;
    $submenu = false;

    foreach ( $menuitems as $item ):
        $title  = $item->title;
        $link   = $item->url;
        $slug   = slug($title);

        if ( !$item->menu_item_parent ):
            $parent_id = $item->ID;
        ?>

        <li class="menu__item menu__item--<?php echo $slug; ?>">
            <a data-menu-title="<?php echo $slug; ?>" href="<?php echo $link; ?>" class="menu__link">
                <?php echo $title; ?>
            </a>

        <?php endif; ?>
        <?php if ( $parent_id == $item->menu_item_parent ): ?>
            <?php if ( !$submenu ): $submenu = true; ?>
                <ul class="menu__sub">
            <?php endif; ?>
                    <li class="menu__item menu__item--<?php echo $slug; ?>">
                        <a data-menu-title="<?php echo $slug; ?>"  href="<?php echo $link; ?>" class="menu__link">
                            <?php echo $title; ?>
                        </a>
                    </li>
            <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
                </ul>
            <?php $submenu = false; endif; ?>

        <?php endif; ?>
        <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
        </li>
        <?php $submenu = false; endif; ?>

    <?php $count++; endforeach;
}