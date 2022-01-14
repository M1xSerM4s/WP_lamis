<?php 

add_filter('show_admin_bar', '__return_false');

remove_action('wp_head',             'print_emoji_detection_script', 7 );
remove_action('admin_print_scripts', 'print_emoji_detection_script' );
remove_action('wp_print_styles',     'print_emoji_styles' );
remove_action('admin_print_styles',  'print_emoji_styles' );

remove_action('wp_head', 'wp_resource_hints', 2 ); //remove dns-prefetch
remove_action('wp_head', 'wp_generator'); //remove meta name="generator"
remove_action('wp_head', 'wlwmanifest_link'); //remove wlwmanifest
remove_action('wp_head', 'rsd_link'); // remove EditURI
remove_action('wp_head', 'rest_output_link_wp_head');// remove 'https://api.w.org/
remove_action('wp_head', 'rel_canonical'); //remove canonical
remove_action('wp_head', 'wp_shortlink_wp_head', 10); //remove shortlink
remove_action('wp_head', 'wp_oembed_add_discovery_links'); //remove alternate

add_action( 'wp_enqueue_scripts', function () {
    $directoryUri = get_template_directory_uri();

    wp_dequeue_style( 'wp-block-library' );
    wp_deregister_script( 'wp-embed' );

	wp_enqueue_style( 'normalize', $directoryUri . '/assets/css/normalize.css');
	wp_enqueue_style( 'all-min-css', $directoryUri . '/assets/css/all.min.css');
	wp_enqueue_style( 'slick-theme', $directoryUri . '/assets/lib/slick/slick-theme.css');
	wp_enqueue_style( 'slick', $directoryUri . '/assets/lib/slick/slick.css');
	wp_enqueue_style( 'bootstrap-min-css', 'https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css');
	wp_enqueue_style( 'animate-min-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');
	wp_enqueue_style( 'style', $directoryUri . '/assets/css/style.css');
	wp_enqueue_style( 'rs-menu-form', $directoryUri . '/assets/css/rs-menu-form.css');

    wp_deregister_script( 'jquery');
	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', [], 'null', true);

	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js', array('jquery'), 'null', true);
	wp_enqueue_script( 'wow', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array('jquery'), 'null', true);
	wp_enqueue_script( 'slick', $directoryUri . '/assets/lib/slick/slick.min.js', array('jquery'), 'null', true);
	wp_enqueue_script( 'script', $directoryUri . '/assets/js/script.js', array('jquery'), 'null', true);
});

add_action( 'after_setup_theme', 'theme_support' );
function theme_support() {
	register_nav_menu( 'menu_header', 'Меню в шапке' );
}

add_theme_support('custom-logo');

add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	else
		$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext'] = $type_and_ext['type'] = false;
		}

	}

	return $data;
}

?>