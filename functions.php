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

	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(),'0.115' );
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

	function find_replace_my_fancy_svg( $items, $args ) {
		$items = str_replace(
			'%DAPP_SVG%',
			'<svg width="50" height="25" viewBox="0 0 50 25" fill="none" xmlns="http://www.w3.org/2000/svg">
			 <rect x="0.378906" width="49.2568" height="24.5439" rx="12.272" fill="#997B5F"/>
			 <path d="M18.1343 16.6602C18.1831 17.3438 18.2197 17.9093 18.2441 18.3569C18.2767 18.8045 18.297 19.1626 18.3052 19.4312C18.3133 19.5614 18.3174 19.6794 18.3174 19.7852C18.3174 19.8828 18.3133 19.9845 18.3052 20.0903C18.297 20.1961 18.2808 20.2775 18.2563 20.3345C18.2319 20.3996 18.1994 20.4443 18.1587 20.4688C17.939 20.6234 17.6501 20.7007 17.292 20.7007C17.2757 20.7007 17.1699 20.7007 16.9746 20.7007C16.7793 20.7007 16.5718 20.6152 16.3521 20.4443C16.3032 20.4036 16.2625 20.3589 16.23 20.3101C16.2056 20.2612 16.1852 20.188 16.1689 20.0903C16.1527 19.9845 16.1364 19.834 16.1201 19.6387C16.1038 19.4352 16.0876 19.1626 16.0713 18.8208C16.0387 18.3569 16.0021 17.8727 15.9614 17.3682C15.9289 16.8555 15.8963 16.416 15.8638 16.0498C15.8312 15.6755 15.8068 15.4761 15.7905 15.4517C15.7824 15.4517 15.6766 15.4598 15.4731 15.4761C15.2778 15.4842 15.0337 15.5005 14.7407 15.5249C14.4478 15.5412 14.1548 15.5615 13.8618 15.5859C13.577 15.6104 13.3328 15.6348 13.1294 15.6592L12.5557 15.708L12.4824 17.2095C12.4417 18.1535 12.3929 18.8818 12.3359 19.3945C12.2871 19.8991 12.2098 20.2612 12.104 20.481C11.9982 20.7007 11.8517 20.8512 11.6646 20.9326C11.4448 21.0303 11.1193 21.0872 10.688 21.1035C10.5903 21.1117 10.4967 21.1157 10.4072 21.1157C10.1061 21.1157 9.85791 21.0832 9.6626 21.0181C9.20687 20.839 8.9139 20.5379 8.78369 20.1147C8.69417 19.7567 8.63721 19.1138 8.61279 18.186C8.60465 17.7873 8.60059 17.3722 8.60059 16.9409C8.60059 16.3713 8.61279 15.6632 8.63721 14.8169C8.66976 13.9705 8.73486 13.1364 8.83252 12.3145C9.05225 10.5811 9.39404 9.00228 9.85791 7.57812C10.3218 6.15397 10.8223 5.14079 11.3594 4.53857C11.8721 4.01774 12.4946 3.67594 13.2271 3.51318C13.4956 3.45622 13.7601 3.42773 14.0205 3.42773C14.4681 3.42773 14.8994 3.51318 15.3145 3.68408C15.8516 3.87126 16.2829 4.34326 16.6084 5.1001C16.9421 5.8488 17.2188 7.12646 17.4385 8.93311C17.6663 10.7316 17.8983 13.3073 18.1343 16.6602ZM15.6196 14.1699C15.6278 14.1536 15.6318 14.113 15.6318 14.0479C15.6318 13.8932 15.6034 13.5718 15.5464 13.0835C15.4976 12.5952 15.4121 11.9523 15.29 11.1548C15.1761 10.3491 15.054 9.57601 14.9238 8.83545C14.7936 8.09489 14.6797 7.53337 14.582 7.15088C14.4681 6.69515 14.3786 6.39404 14.3135 6.24756C14.2809 6.15804 14.2484 6.11328 14.2158 6.11328C14.1995 6.11328 14.1833 6.12956 14.167 6.16211C14.11 6.25977 14.0246 6.51204 13.9106 6.91895C13.7967 7.32585 13.6787 7.7653 13.5566 8.2373C13.4427 8.70117 13.3613 9.07145 13.3125 9.34814C13.2148 9.89339 13.1009 10.6502 12.9707 11.6187C12.8405 12.5789 12.755 13.3154 12.7144 13.8281L12.6533 14.5117H13.1416C13.2799 14.5117 13.4468 14.5036 13.6421 14.4873C13.8374 14.471 14.0124 14.4548 14.167 14.4385C15.0459 14.3083 15.5301 14.2188 15.6196 14.1699Z" fill="#C9D6E3"/>
			 <path d="M29.8164 8.43262C29.9466 8.986 30.0117 9.57601 30.0117 10.2026C30.0117 10.8293 29.9466 11.3826 29.8164 11.8628C28.9212 14.5321 27.1146 16.0661 24.3965 16.4648L23.957 16.5137L23.896 17.9785C23.8716 18.5889 23.8431 19.0609 23.8105 19.3945C23.7861 19.7201 23.7495 19.9561 23.7007 20.1025C23.6519 20.2409 23.5868 20.3385 23.5054 20.3955C23.2612 20.5664 22.9072 20.6844 22.4434 20.7495C22.2725 20.7739 22.1097 20.7861 21.9551 20.7861C21.6784 20.7861 21.4261 20.7536 21.1982 20.6885C20.7262 20.5583 20.4495 20.4036 20.3682 20.2246C20.2786 20.0863 20.2135 19.4434 20.1729 18.2959C20.1403 17.1403 20.124 15.2848 20.124 12.7295C20.124 7.30957 20.2135 4.46533 20.3926 4.19678C20.4251 4.07471 20.478 3.97705 20.5513 3.90381C20.6245 3.83057 20.7425 3.75326 20.9053 3.67188C21.0273 3.60677 21.1453 3.56201 21.2593 3.5376C21.3813 3.50505 21.5522 3.4847 21.772 3.47656C21.9998 3.46029 22.3335 3.44808 22.7729 3.43994C23.2124 3.4318 23.5542 3.4318 23.7983 3.43994C24.0425 3.43994 24.25 3.45622 24.4209 3.48877C24.5918 3.51318 24.7993 3.55794 25.0435 3.62305C27.5174 4.32292 29.1084 5.92611 29.8164 8.43262ZM27.436 10.0439V9.90967C27.436 9.38883 27.3872 8.92904 27.2896 8.53027C27.1919 8.12337 27.0007 7.65137 26.7158 7.11426C26.4798 6.66667 26.1543 6.23128 25.7393 5.80811C25.3242 5.38493 24.9092 5.05941 24.4941 4.83154C24.3395 4.75016 24.2052 4.68506 24.0913 4.63623C23.9937 4.60368 23.9326 4.5874 23.9082 4.5874H23.896V4.67285C23.896 4.72168 23.896 4.81934 23.896 4.96582C23.9041 5.10417 23.9163 5.30762 23.9326 5.57617C23.9489 5.87728 23.9652 6.53239 23.9814 7.5415C23.9977 8.55062 24.0059 9.6818 24.0059 10.9351C24.0059 13.8729 24.0384 15.3418 24.1035 15.3418C24.1279 15.3418 24.1849 15.3215 24.2744 15.2808C24.3721 15.2401 24.4779 15.1912 24.5918 15.1343C26.4391 14.1821 27.3872 12.4854 27.436 10.0439Z" fill="#C9D6E3"/>
			 <path d="M41.2178 8.43262C41.348 8.986 41.4131 9.57601 41.4131 10.2026C41.4131 10.8293 41.348 11.3826 41.2178 11.8628C40.3226 14.5321 38.516 16.0661 35.7979 16.4648L35.3584 16.5137L35.2974 17.9785C35.2729 18.5889 35.2445 19.0609 35.2119 19.3945C35.1875 19.7201 35.1509 19.9561 35.1021 20.1025C35.0532 20.2409 34.9881 20.3385 34.9067 20.3955C34.6626 20.5664 34.3086 20.6844 33.8447 20.7495C33.6738 20.7739 33.5111 20.7861 33.3564 20.7861C33.0798 20.7861 32.8275 20.7536 32.5996 20.6885C32.1276 20.5583 31.8509 20.4036 31.7695 20.2246C31.68 20.0863 31.6149 19.4434 31.5742 18.2959C31.5417 17.1403 31.5254 15.2848 31.5254 12.7295C31.5254 7.30957 31.6149 4.46533 31.7939 4.19678C31.8265 4.07471 31.8794 3.97705 31.9526 3.90381C32.0259 3.83057 32.1439 3.75326 32.3066 3.67188C32.4287 3.60677 32.5467 3.56201 32.6606 3.5376C32.7827 3.50505 32.9536 3.4847 33.1733 3.47656C33.4012 3.46029 33.7349 3.44808 34.1743 3.43994C34.6138 3.4318 34.9556 3.4318 35.1997 3.43994C35.4438 3.43994 35.6514 3.45622 35.8223 3.48877C35.9932 3.51318 36.2007 3.55794 36.4448 3.62305C38.9188 4.32292 40.5098 5.92611 41.2178 8.43262ZM38.8374 10.0439V9.90967C38.8374 9.38883 38.7886 8.92904 38.6909 8.53027C38.5933 8.12337 38.402 7.65137 38.1172 7.11426C37.8812 6.66667 37.5557 6.23128 37.1406 5.80811C36.7256 5.38493 36.3105 5.05941 35.8955 4.83154C35.7409 4.75016 35.6066 4.68506 35.4927 4.63623C35.395 4.60368 35.334 4.5874 35.3096 4.5874H35.2974V4.67285C35.2974 4.72168 35.2974 4.81934 35.2974 4.96582C35.3055 5.10417 35.3177 5.30762 35.334 5.57617C35.3503 5.87728 35.3665 6.53239 35.3828 7.5415C35.3991 8.55062 35.4072 9.6818 35.4072 10.9351C35.4072 13.8729 35.4398 15.3418 35.5049 15.3418C35.5293 15.3418 35.5863 15.3215 35.6758 15.2808C35.7734 15.2401 35.8792 15.1912 35.9932 15.1343C37.8405 14.1821 38.7886 12.4854 38.8374 10.0439Z" fill="#C9D6E3"/>
			 </svg>',
			$items
		);
	
		return $items;
	}
	add_filter( 'wp_nav_menu_items', 'find_replace_my_fancy_svg', 10, 2 );