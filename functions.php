<?php

/**
 * Theme setup.
 */
function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
			'footer'  => __( 'Footer Menu', 'tailpress' ),
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
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
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
 * @param mixed   $item The current item.
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
 * @param mixed   $item The current item.
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

function new_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );

function register_secondary_menu() {
	register_nav_menu('secondary-menu',__( 'Secondary Menu' ));
}
add_action( 'init', 'register_secondary_menu' );


class Walker_Nav_Secondary extends Walker_Nav_menu {
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"hidden$submenu depth_$depth\">\n";
    }
}

// class Walker_Nav_Secondary_Sub extends Walker_Nav_menu {
// 	function start_lvl(&$output, $depth = 0, $args = array()) {
// 		$indent = str_repeat("\t", $depth);
// 		$submenu = ($depth > 0) ? ' sub-menu' : '';
// 		$output .= "\n$indent<ul class=\"hidden$submenu depth_$depth parent-{$args->walker->menu->ID}\">\n";
// 	}
// }
// class Walker_Nav_Secondary_Sub extends Walker_Nav_menu {
// 	function start_lvl(&$output, $depth = 0, $args = array()) {
// 		$indent = str_repeat("\t", $depth);
// 		$submenu = ($depth > 0) ? ' sub-menu block' : ' hidden';
// 		$output .= "\n$indent<ul class=\"$submenu depth_$depth\">\n";
// 	}
// }
class Walker_Nav_Secondary_Sub extends Walker_Nav_menu {
    function start_lvl(&$output, $depth = 0, $args = array()) {
        if ($depth > 0) { // Solo se è un submenu
            $indent = str_repeat("\t", $depth);
            $submenu = ' sub-menu';
            $output .= "\n$indent<ul class=\"$submenu depth_$depth\">\n";
        }
    }
}


function create_about_yy_post_type() {
    $labels = array(
        'name' => 'About Yantra Yoga Items',
        'singular_name' => 'Single Item in About Yantra Yoga page',
        'menu_name' => 'About Yantra Yoga Items',
        'name_admin_bar' => 'About Yantra Yoga',
    );

    $args = array(
        'labels' => $labels,
        'public' => false,  // Nasconde i contenuti dal frontend
        'show_ui' => true,
        'show_in_menu' => true,
        'supports' => array('title', 'editor', 'thumbnail'),  // Supporta titolo, editor e immagini
    );

    register_post_type('about_yantrayoga', $args);
}

add_action('init', 'create_about_yy_post_type');

add_filter('wp_is_application_passwords_available', '__return_false');