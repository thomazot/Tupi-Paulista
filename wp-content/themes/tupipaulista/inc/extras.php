<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package zot
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function zot_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'zot_body_classes' );

/**
 * Add Type SVG
 */
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');


function create_post_types() {

    $supports = array( 'title', 'editor' );

    // Cursos

    $labels = array(
        'name'                => __( 'Cursos', THEMENAME ),
        'singular_name'       => __( 'Curso', THEMENAME ),
        'add_new'             => __( 'Adicionar Novo', THEMENAME ),
        'add_new_item'        => __( 'Adicionar Novo Curso', THEMENAME ),
        'edit_item'           => __( 'Editar Curso', THEMENAME ),
        'new_item'            => __( 'Novo Curso', THEMENAME ),
        'all_items'           => __( 'Todos Cursos', THEMENAME ),
        'view_item'           => __( 'Ver Curso', THEMENAME ),
        'search_items'        => __( 'Pesquisar Cursos', THEMENAME ),
        'not_found'           => __( 'Nenhum Curso encontrada', THEMENAME ),
        'not_found_in_trash'  => __( 'Nenhum Curso no Lixo', THEMENAME ),
        'menu_name'           => __( 'Cursos', THEMENAME ),
    );

    $slug = get_theme_mod( 'curso_permalink' );
    $slug = ( empty( $slug ) ) ? 'curso' : $slug;

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => $slug ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => true,
        'menu_position'       => 4,
        'supports'            => $supports,
    );

    register_post_type( 'curso', $args );

    // Fim Cursos

    // Pos

    $labels = array(
        'name'                => __( 'Pos Graduação', THEMENAME ),
        'singular_name'       => __( 'Pos Graducação', THEMENAME ),
        'add_new'             => __( 'Adicionar Novo', THEMENAME ),
        'add_new_item'        => __( 'Adicionar Novo Pos Graduação', THEMENAME ),
        'edit_item'           => __( 'Editar Pos Graducação', THEMENAME ),
        'new_item'            => __( 'Novo Pos Graducação', THEMENAME ),
        'all_items'           => __( 'Todos Pos Graducação', THEMENAME ),
        'view_item'           => __( 'Ver Pos Graducação', THEMENAME ),
        'search_items'        => __( 'Pesquisar Pos Graducação', THEMENAME ),
        'not_found'           => __( 'Nenhum Pos Graducação encontrada', THEMENAME ),
        'not_found_in_trash'  => __( 'Nenhum Pos Graducação no Lixo', THEMENAME ),
        'menu_name'           => __( 'Pos Graducação', THEMENAME ),
    );

    $slug = get_theme_mod( 'posgraduacao_permalink' );
    $slug = ( empty( $slug ) ) ? 'posgraduacao' : $slug;

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => $slug ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => true,
        'menu_position'       => 4,
        'supports'            => $supports,
    );

    register_post_type( 'posgraduacao', $args );

    // Fim Pos

    // Galerias

    $labels = array(
        'name'                => __( 'Galerias', THEMENAME ),
        'singular_name'       => __( 'Galeria', THEMENAME ),
        'add_new'             => __( 'Adicionar Nova', THEMENAME ),
        'add_new_item'        => __( 'Adicionar Nova Galeria', THEMENAME ),
        'edit_item'           => __( 'Editar Galeria', THEMENAME ),
        'new_item'            => __( 'Nova Galeria', THEMENAME ),
        'all_items'           => __( 'Todas Galerias', THEMENAME ),
        'view_item'           => __( 'Ver Galeria', THEMENAME ),
        'search_items'        => __( 'Pesquisar Galeria', THEMENAME ),
        'not_found'           => __( 'Nenhuma Galeria encontrada', THEMENAME ),
        'not_found_in_trash'  => __( 'Nenhuma Galeria no Lixo', THEMENAME ),
        'menu_name'           => __( 'Galerias', THEMENAME ),
    );

    $slug = get_theme_mod( 'galeria_permalink' );
    $slug = ( empty( $slug ) ) ? 'Galeria' : $slug;

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => $slug ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 4,
        'supports'            => $supports,
    );

    register_post_type( 'galeria', $args );

    // Fim Galerias

    // Videos

    $labels = array(
        'name'                => __( 'Videos', THEMENAME ),
        'singular_name'       => __( 'Video', THEMENAME ),
        'add_new'             => __( 'Adicionar Novo', THEMENAME ),
        'add_new_item'        => __( 'Adicionar Novo Video', THEMENAME ),
        'edit_item'           => __( 'Editar Galeria', THEMENAME ),
        'new_item'            => __( 'Novo Video', THEMENAME ),
        'all_items'           => __( 'Todas Videos', THEMENAME ),
        'view_item'           => __( 'Ver Video', THEMENAME ),
        'search_items'        => __( 'Pesquisar Video', THEMENAME ),
        'not_found'           => __( 'Nenhuma Video encontrado', THEMENAME ),
        'not_found_in_trash'  => __( 'Nenhuma Video no Lixo', THEMENAME ),
        'menu_name'           => __( 'Videos', THEMENAME ),
    );

    $slug = get_theme_mod( 'video_permalink' );
    $slug = ( empty( $slug ) ) ? 'Video' : $slug;

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => $slug ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 4,
        'supports'            => $supports,
    );

    register_post_type( 'video', $args );

    // Fim Videos

    // Unidades
    $labels = array(
        'name'                => __( 'Unidades', THEMENAME ),
        'singular_name'       => __( 'Unidade', THEMENAME ),
        'add_new'             => __( 'Adicionar Unidade', THEMENAME ),
        'add_new_item'        => __( 'Adicionar Nova Unidade', THEMENAME ),
        'edit_item'           => __( 'Editar Unidade', THEMENAME ),
        'new_item'            => __( 'Nova Unidade', THEMENAME ),
        'all_items'           => __( 'Todas Unidades', THEMENAME ),
        'view_item'           => __( 'Ver Unidades', THEMENAME ),
        'search_items'        => __( 'Pesquisar Unidade', THEMENAME ),
        'not_found'           => __( 'Nenhuma Unidade encontrada', THEMENAME ),
        'not_found_in_trash'  => __( 'Nenhuma Unidade no Lixo', THEMENAME ),
        'menu_name'           => __( 'Unidade', THEMENAME ),
    );

    $slug = get_theme_mod( 'unidade_permalink' );
    $slug = ( empty( $slug ) ) ? 'Unidade' : $slug;

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => $slug ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 4,
        'supports'            => $supports,
    );

    register_post_type( 'unidade', $args );

    // Fim Unidades

    $supports = array( 'title', 'editor' );

    // Equipe

    $labels = array(
        'name'                => __( 'Equipes', THEMENAME ),
        'singular_name'       => __( 'Equipe', THEMENAME ),
        'add_new'             => __( 'Adicionar Novo', THEMENAME ),
        'add_new_item'        => __( 'Adicionar Novo Equipe', THEMENAME ),
        'edit_item'           => __( 'Editar Equipe', THEMENAME ),
        'new_item'            => __( 'Novo Equipe', THEMENAME ),
        'all_items'           => __( 'Todos Equipes', THEMENAME ),
        'view_item'           => __( 'Ver Equipe', THEMENAME ),
        'search_items'        => __( 'Pesquisar Equipes', THEMENAME ),
        'not_found'           => __( 'Nenhum Equipe encontrada', THEMENAME ),
        'not_found_in_trash'  => __( 'Nenhum Equipe no Lixo', THEMENAME ),
        'menu_name'           => __( 'Equipes', THEMENAME ),
    );

    $slug = get_theme_mod( 'Equipe_permalink' );
    $slug = ( empty( $slug ) ) ? 'Equipe' : $slug;

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => $slug ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => true,
        'menu_position'       => 4,
        'supports'            => $supports,
    );

    register_post_type( 'Equipe', $args );

    // Fim Equipes

}
add_action( 'init', 'create_post_types' );

function wp_custom_breadcrumbs() {

    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '/'; // delimiter between crumbs
    $home = 'Home'; // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb

    global $post;
    $homeLink = get_bloginfo('url');

    if (is_home() || is_front_page()) {

        if ($showOnHome == 1) echo '<div id="breadcrumb" class="breadcrumb"><a href="' . $homeLink . '">' . $home . '</a></div>';

    } else {

        echo '<div id="breadcrumb" class="breadcrumb"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
            echo $before . single_cat_title('', false) . $after;

        } elseif ( is_search() ) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;

        } elseif ( is_day() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;

        } elseif ( is_month() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;

        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;

        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                echo $cats;
                if ($showCurrent == 1) echo $before . get_the_title() . $after;
            }

        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;

        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

        } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo $before . get_the_title() . $after;

        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
            }
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

        } elseif ( is_tag() ) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;

        } elseif ( is_404() ) {
            echo $before . 'Error 404' . $after;
        }

        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo __('Page') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }

        echo '</div>';

    }
} // end wp_custom_breadcrumbs()

function get_video_thumbnail_uri( $video_uri ) {

    $thumbnail_uri = '';



    // determine the type of video and the video id
    $video = parse_video_uri( $video_uri );



    // get youtube thumbnail
    if ( $video['type'] == 'youtube' )
        $thumbnail_uri = 'http://img.youtube.com/vi/' . $video['id'] . '/hqdefault.jpg';

    // get vimeo thumbnail
    if( $video['type'] == 'vimeo' )
        $thumbnail_uri = get_vimeo_thumbnail_uri( $video['id'] );
    // get wistia thumbnail
    if( $video['type'] == 'wistia' )
        $thumbnail_uri = get_wistia_thumbnail_uri( $video_uri );
    // get default/placeholder thumbnail
    if( empty( $thumbnail_uri ) || is_wp_error( $thumbnail_uri ) )
        $thumbnail_uri = '';

    //return thumbnail uri
    return $thumbnail_uri;

}


/**
 * Parse the video uri/url to determine the video type/source and the video id
 */
function parse_video_uri( $url ) {

    // Parse the url
    $parse = parse_url( $url );

    // Set blank variables
    $video_type = '';
    $video_id = '';

    // Url is http://youtu.be/xxxx
    if ( $parse['host'] == 'youtu.be' ) {

        $video_type = 'youtube';

        $video_id = ltrim( $parse['path'],'/' );

    }

    // Url is http://www.youtube.com/watch?v=xxxx
    // or http://www.youtube.com/watch?feature=player_embedded&v=xxx
    // or http://www.youtube.com/embed/xxxx
    if ( ( $parse['host'] == 'youtube.com' ) || ( $parse['host'] == 'www.youtube.com' ) ) {

        $video_type = 'youtube';

        parse_str( $parse['query'] );

        $video_id = $v;

        if ( !empty( $feature ) )
            $video_id = end( explode( 'v=', $parse['query'] ) );

        if ( strpos( $parse['path'], 'embed' ) == 1 )
            $video_id = end( explode( '/', $parse['path'] ) );

    }

    // Url is http://www.vimeo.com
    if ( ( $parse['host'] == 'vimeo.com' ) || ( $parse['host'] == 'www.vimeo.com' ) ) {

        $video_type = 'vimeo';

        $video_id = ltrim( $parse['path'],'/' );

    }
    $host_names = explode(".", $parse['host'] );
    $rebuild = ( ! empty( $host_names[1] ) ? $host_names[1] : '') . '.' . ( ! empty($host_names[2] ) ? $host_names[2] : '');
    // Url is an oembed url wistia.com
    if ( ( $rebuild == 'wistia.com' ) || ( $rebuild == 'wi.st.com' ) ) {

        $video_type = 'wistia';

        if ( strpos( $parse['path'], 'medias' ) == 1 )
            $video_id = end( explode( '/', $parse['path'] ) );

    }

    // If recognised type return video array
    if ( !empty( $video_type ) ) {

        $video_array = array(
            'type' => $video_type,
            'id' => $video_id
        );

        return $video_array;

    } else {

        return false;

    }

}


/* Takes a Vimeo video/clip ID and calls the Vimeo API v2 to get the large thumbnail URL.
*/
function get_vimeo_thumbnail_uri( $clip_id ) {
    $vimeo_api_uri = 'http://vimeo.com/api/v2/video/' . $clip_id . '.php';
    $vimeo_response = wp_remote_get( $vimeo_api_uri );
    if( is_wp_error( $vimeo_response ) ) {
        return $vimeo_response;
    } else {
        $vimeo_response = unserialize( $vimeo_response['body'] );
        return $vimeo_response[0]['thumbnail_large'];
    }

}
/**
 * Takes a wistia oembed url and gets the video thumbnail url.
 */
function get_wistia_thumbnail_uri( $video_uri ) {
    if ( empty($video_uri) )
        return false;
    $wistia_api_uri = 'http://fast.wistia.com/oembed?url=' . $video_uri;
    $wistia_response = wp_remote_get( $wistia_api_uri );
    if( is_wp_error( $wistia_response ) ) {
        return $wistia_response;
    } else {
        $wistia_response = json_decode( $wistia_response['body'], true );
        return $wistia_response['thumbnail_url'];
    }

}
