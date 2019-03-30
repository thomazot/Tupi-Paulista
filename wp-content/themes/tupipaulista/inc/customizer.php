<?php
/**
 * zot Theme Customizer.
 *
 * @package zot
 */

/**
 * Remove Header Default WP
 */
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'remove_admin_login_header');

/**
 * Post per category
 */
/*function check_for_category_single_template( $t ) {
	foreach( (array) get_the_category() as $cat ) {

        $slug = $cat->slug;

        if(in_array($slug, ['evento', 'noticias']))
            if ( file_exists(TEMPLATEPATH . "/page-noticias-eventos.php") ) return TEMPLATEPATH . "/page-noticias-eventos.php";

//		if($cat->parent) {
//			$cat = get_category( (int) $cat->parent );
//			if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") ) return TEMPLATEPATH . "/single-{$cat->slug}.php";
//		}
	}
	return $t;
}*/

//add_filter('single_template', 'check_for_category_single_template');


//  Informaçoes adicionais
function zot_info_websites($customizer) {

    // Informaçoes
/*    $customizer->add_panel( 'info_websites', array(
        'title' => 'Informações Basicas',
        'description' => 'Informações extras',
        'priority' => 30,
    ) );*/

    //    -------- Contato
    /*$customizer->add_section( 'contact' , array(
        'title' => 'Contato',
        'priority' => 30,
        'panel' => 'info_websites',
    ) );*/

    //    -- Settings
    $customizer->add_setting('phone',
        array(
            'default' => ''
        )
    );

    //    -- Controls
    $customizer->add_control('phone_control',
        array(
            'label' => 'Telefone',
            'type' => 'text',
            'section' => 'title_tagline',
            'settings' => 'phone'
        )
    );

}

add_action( 'customize_register', 'zot_info_websites' );
