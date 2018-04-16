<?php
// the FUNCTIONS.PHP file
if ( ! function_exists( 'main_setup' ) ) :
function main_setup() {
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'main' ),
) );

add_theme_support( 'html5', array(
		'search-form',
		'gallery',
		'caption'
) );
}
endif;
add_action( 'after_setup_theme', 'main_setup' );
function main_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'main' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'main' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'main_widgets_init' );

// PORTFOLIO POST TYPE
function portfolio_post_type() {
// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Portfolio', 'Post Type General Name'),
		'singular_name'       => _x( 'Item', 'Post Type Singular Name'),
		'menu_name'           => __( 'Portfolio'),
		'parent_item_colon'   => __( 'Parent Item'),
		'all_items'           => __( 'All Items'),
		'view_item'           => __( 'View Item'),
		'add_new_item'        => __( 'Add New Item'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Item'),
		'update_item'         => __( 'Update Item'),
		'search_items'        => __( 'Search Portfolio'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash'),
	);

// Set other options for Custom Post Type

	$args = array(
		'label'               => __( 'portfolio'),
		'description'         => __( 'Airwave Portfolio'),
		'menu_icon'	=> 'dashicons-format-gallery',
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes', 'excerpt'),
		// You can associate this CPT with a taxonomy or custom taxonomy.
		'taxonomies'          => array( 'genres' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	// Registering your Custom Post Type
	register_post_type( 'portfolio', $args );
}
add_action( 'init', 'portfolio_post_type', 0 );
// END PORTFOLIO POST TYPE

// sequential post numbers
function increment_that_post($post_ID) {
     global $wpdb;
     if(!wp_is_post_revision($post_ID)) {
          $total_posts_query = new WP_Query(array('post_type' => 'post'));
          $total_posts = $total_posts_query->post_count;
          add_post_meta($post_ID, 'post_sequence', $total_posts++, true);
     }
}

add_action('publish_post', 'increment_that_post');
