<?php

/**
 * Theme setup.
 */
function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'tailpress_setup' );

/**
 * Add jQuery
 */

add_action( 'init', 'true_jquery_register' );
 
function true_jquery_register() {
	if ( !is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', ( 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' ), false, null, true );
		wp_enqueue_script( 'jquery' );
	}
}

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(),'0.117' );
	wp_enqueue_script( 'tailpress', tailpress_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

	global $wp_version;
	if ( $wp_version !== '4.7.1' ) {
	   return $data;
	}
  
	$filetype = wp_check_filetype( $filename, $mimes );
  
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
  
  }, 10, 4 );
  
  function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );
  
  function fix_svg() {
	echo '<style type="text/css">
		  .attachment-266x266, .thumbnail img {
			   width: 100% !important;
			   height: auto !important;
		  }
		  </style>';
  }
  add_action( 'admin_head', 'fix_svg' );

  /* remove '...' (3 dots) filter */

  remove_filter( 'the_content', 'wptexturize' );

  /* Hide Author of the Page from Snippet */

add_filter( 'oembed_response_data', 'disable_embeds_filter_oembed_response_data_' );
function disable_embeds_filter_oembed_response_data_( $data ) {
    unset($data['author_url']);
    unset($data['author_name']);
    return $data;
}

  /* NFT Page */

  add_action( 'init', 'rewrite_rule_my' );
  function rewrite_rule_my(){
	  add_rewrite_rule( '^(nft)/([^/]*)/?', 'index.php?pagename=$matches[1]&token=$matches[2]', 'top' );
	  add_rewrite_tag( '%token%', '([^&]+)' );
  }

    /* API Page */

	add_action( 'init', 'rewrite_rule_api' );
	function rewrite_rule_api(){
		add_rewrite_rule( '^(api)/([^/]*)/?', 'index.php?pagename=$matches[1]&api=$matches[2]', 'top' );
		add_rewrite_tag( '%api%', '([^&]+)' );
	}

	/* SVG MENU */

	function find_replace_tw_svg( $items, $args ) {
		$items = str_replace(
			'%TW_SVG%',
			'<svg width="58" height="47" viewBox="0 0 58 47" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M57.7797 5.6298C55.7162 6.51872 53.3578 7.11135 50.9995 7.40766C53.3578 5.92612 55.4214 3.55568 56.3058 0.888928C53.9474 2.37046 51.5891 3.25938 48.6411 3.85199C46.5776 1.48154 43.3348 0 40.092 0C33.6066 0 28.3003 5.33351 28.3003 11.8522C28.3003 12.7412 28.3003 13.6301 28.5951 14.519C18.8668 13.9264 10.023 9.18548 4.12711 2.07413C3.24272 3.85197 2.65313 5.92612 2.65313 8.00026C2.65313 12.1485 4.71671 15.7042 7.95945 17.7784C5.89588 17.7784 4.12711 17.1858 2.65313 16.2968C2.65313 21.9267 6.78025 26.9638 12.0866 27.8528C11.2022 28.1491 10.023 28.1491 8.84384 28.1491C7.95946 28.1491 7.36986 28.1491 6.48547 27.8528C7.95945 32.5937 12.3814 36.1493 17.6877 36.1493C13.5606 39.4087 8.54904 41.1865 2.94795 41.1865C2.06356 41.1865 1.17918 41.1866 0 40.8903C5.3063 44.1496 11.497 46.2238 18.2773 46.2238C40.0921 46.2238 51.8838 28.1491 51.8838 12.4449V10.9633C54.2422 10.0744 56.3058 8.00025 57.7797 5.6298Z" fill="#BFA084"/>
			</svg>',
			$items
		);
	
		return $items;
	}
	add_filter( 'wp_nav_menu_items', 'find_replace_tw_svg', 10, 2 );