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

function add_custom_user_role() {

	$capabilities = array(
		'read'                   => true,  // Leggere i contenuti
		'edit_posts'             => true, // Modificare i propri articoli
		'delete_posts'           => false, // Eliminare i propri articoli
		'publish_posts'          => true, // Pubblicare i propri articoli
		'upload_files'           => true, // Caricare file multimediali
		'edit_others_posts'      => false, // Modificare gli articoli degli altri utenti
		'delete_others_posts'    => false, // Eliminare gli articoli degli altri utenti
		'edit_published_posts'   => true, // Modificare gli articoli pubblicati
		'delete_published_posts' => false, // Eliminare gli articoli pubblicati
		'manage_categories'      => false, // Gestire le categorie
		'manage_links'           => false, // Gestire i collegamenti
		'moderate_comments'      => false, // Moderare i commenti
		'unfiltered_html'        => false, // Inserire HTML non filtrato
		'edit_files'             => false, // Modificare i file del tema/plugin
		'edit_pages'             => false, // Modificare le pagine
		'read_private_pages'     => false, // Leggere le pagine private
		'edit_private_pages'     => false, // Modificare le pagine private
		'delete_private_pages'   => false, // Eliminare le pagine private
		'read_private_posts'     => false, // Leggere gli articoli privati
		'edit_private_posts'     => false, // Modificare gli articoli privati
		'delete_private_posts'   => false, // Eliminare gli articoli privati
		'edit_published_pages'   => false, // Modificare le pagine pubblicate
		'delete_published_pages' => false, // Eliminare le pagine pubblicate
		'delete_pages'           => false, // Eliminare le pagine
		'delete_others_pages'    => false, // Eliminare le pagine di altri utenti
		'delete_published_pages' => false, // Eliminare le pagine pubblicate
		'delete_private_pages'   => false, // Eliminare le pagine private
		'edit_others_pages'      => false, // Modificare le pagine degli altri utenti
		'edit_published_pages'   => false, // Modificare le pagine pubblicate
		'edit_theme_options'     => false, // Modificare le opzioni del tema
		'export'                 => false, // Esportare dati
		'import'                 => false, // Importare dati
		'install_plugins'        => false, // Installare plugin
		'install_themes'         => false, // Installare temi
		'manage_options'         => false, // Gestire le opzioni
		'publish_pages'          => false, // Pubblicare le pagine
		'publish_posts'          => false, // Pubblicare gli articoli
		'read'                   => false, // Leggere
		'read_private_pages'     => false, // Leggere le pagine private
		'read_private_posts'     => false, // Leggere gli articoli privati
		'switch_themes'          => false, // Cambiare tema
		'update_core'            => false, // Aggiornare il core di WordPress
		'update_plugins'         => false, // Aggiornare i plugin
		'update_themes'          => false, // Aggiornare i temi
		'upload_plugins'         => false, // Caricare plugin
		'upload_themes'          => false, // Caricare temi
		// Aggiungi altre capacità personalizzate qui...
	);

	
    add_role(
        'teacher', // Identificatore del ruolo
        'Teacher', // Nome visualizzato del ruolo
        $capabilities
    );
}
add_action('init', 'add_custom_user_role');


function get_recent_posts_markup($config = array()) {
    $defaults = array(
		'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC',
        // Altre impostazioni predefinite, se necessario
    );

    $args = array_merge($defaults, $config);

    $markup = '';

    $markup .= '<div class="container mx-auto py-10 px-4">';
    $markup .= '<div class="grid grid-cols-1 md:grid-cols-3 gap-4">';

    $recent_posts = new WP_Query($args);

    if ($recent_posts->have_posts()) {
        while ($recent_posts->have_posts()) {
            $recent_posts->the_post();

            $markup .= '<div class="flex flex-col bg-gray-100 rounded-lg overflow-hidden">';
            $markup .= '<a href="' . get_the_permalink() . '" class="block">';

			$post_id = get_the_ID(); // get the current post ID
			if (has_post_thumbnail($post_id)) { // check if the post has a thumbnail
				$thumbnail_url = get_the_post_thumbnail_url($post_id); // get the thumbnail URL
			} else {
				$thumbnail_url = ''; // set a default value if there's no thumbnail
			}

			if (has_post_thumbnail()) {
                $markup .= '<img src="' . $thumbnail_url . '" alt="' . get_the_title() . '" class="w-full h-auto" />';
            }

            $markup .= '</a>';
            $markup .= '<div class="p-4">';
            $markup .= '<a href="' . get_the_permalink() . '" class="block text-cyan-300 mt-3 mb-3">' . get_the_title() . '</a>';
            $markup .= '<p class="text-gray-500">' . wp_trim_words(get_the_excerpt(), 15, '...') . '</p>';
            $markup .= '</div>';
            $markup .= '</div>';
        }

        wp_reset_postdata();
    } else {
        $markup .= 'No posts found';
    }

    $markup .= '</div>';
    $markup .= '</div>';

    return $markup;
}


function add_featured_page_meta_box() {
    add_meta_box(
        'featured_page_meta_box',
        'Featured Page',
        'render_featured_page_meta_box',
        'page',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_featured_page_meta_box' );

function render_featured_page_meta_box( $post ) {
    $featured = get_post_meta( $post->ID, '_featured_page', true );
    wp_nonce_field( 'featured_page_nonce', 'featured_page_nonce' );
    ?>
    <label for="featured_page_checkbox">
        <input type="checkbox" id="featured_page_checkbox" name="featured_page_checkbox" value="1" <?php checked( $featured, '1' ); ?> />
        Mark as Featured Page
    </label>
    <?php
}

function save_featured_page_meta_box( $post_id ) {
    if ( ! isset( $_POST['featured_page_nonce'] ) || ! wp_verify_nonce( $_POST['featured_page_nonce'], 'featured_page_nonce' ) ) {
        return;
    }

    if ( isset( $_POST['featured_page_checkbox'] ) ) {
        update_post_meta( $post_id, '_featured_page', '1' );
    } else {
        delete_post_meta( $post_id, '_featured_page' );
    }
}
add_action( 'save_post', 'save_featured_page_meta_box' );