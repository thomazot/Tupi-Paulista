<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package zot
 */

/**
 *  Insert Scripts (Java Script) and Styles
 */
function zot_scripts_and_styles() {
	if (!is_admin()) {
		/**
		 *  Styles
		 */

		// 	style
		wp_register_style('theme-stylesheet', get_stylesheet_directory_uri() . '/assets/style.css', array(), '', 'all');
		wp_enqueue_style( 'theme-stylesheet' );

		/**
		 *  Javascript
		 */

		//  app
		wp_register_script( 'app', get_bloginfo( 'template_directory' ) .'/assets/scripts.js', array(), false, true );
		wp_enqueue_script( 'app' );

	}
}

add_action( 'wp_enqueue_scripts', 'zot_scripts_and_styles', 999 );

/**
 *  Insert Logo insert Painel
 */

function zot_setup_logo() {
	add_theme_support('custom-logo');
	add_image_size('zot-logo', 133, 130);
	add_theme_support('custom-logo', array( 'size' => 'custom-logo'));
}

add_action('after_setup_theme', 'zot_setup_logo');


/**
 *  Get Logo
 */

function zot_custom_logo() {
	// Try to retrieve the Custom Logo
	$output = '';
	if (function_exists('get_custom_logo'))
		$output = get_custom_logo();

	// Nothing in the output: Custom Logo is not supported, or there is no selected logo
	// In both cases we display the site's name
	if (empty($output))
		$output = '<a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';

//	if(is_front_page() && is_home())
	$output = '<h1 class="logo" id="logo">' . $output . '</h1>';
//	else
//		$output = '<p class="logo" id="logo">' . $output . '</p>';

	echo $output;
}