<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
// Register the css stylesheet
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

/*
* Creating a function to create post type Films
*/
 
function films_post_type() {
 
// Set UI labels for Custom Post Type (Films)

    $labels = array(
        'name'                => _x( 'Films', 'Post Type General Name', 'unite' ),
        'singular_name'       => _x( 'Film', 'Post Type Singular Name', 'unite' ),
        'menu_name'           => __( 'Films', 'unite' ),
        'parent_item_colon'   => __( 'Parent Movie', 'unite' ),
        'all_items'           => __( 'All Films', 'unite' ),
        'view_item'           => __( 'View Film', 'unite' ),
        'add_new_item'        => __( 'Add New Film', 'unite' ),
        'add_new'             => __( 'Add New Film', 'unite' ),
        'edit_item'           => __( 'Edit Film', 'unite' ),
        'update_item'         => __( 'Update Film', 'unite' ),
        'search_items'        => __( 'Search Films', 'unite' ),
        'not_found'           => __( 'Not Found', 'unite' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'unite' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'movies', 'unite' ),
        'description'         => __( 'Movie news and reviews', 'unite' ),
        'labels'              => $labels, 
        'taxonomies'          => array( 'Genre', 'Country', 'Year', 'Actors' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
     
    // Registering the Custom Post Type (Films)
    register_post_type( 'Films', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'films_post_type', 0 );


function be_register_taxonomies() {
	$taxonomies = array(
		array(
			'slug'         => 'genre',
			'single_name'  => 'Genre',
			'plural_name'  => 'Genre',
			'post_type'    => 'films',
			'rewrite'      => array( 'slug' => 'department' ),
		),
		array(
			'slug'         => 'country',
			'single_name'  => 'Country',
			'plural_name'  => 'Countries',
			'post_type'    => 'films'
		),
		array(
			'slug'         => 'year',
			'single_name'  => 'Year',
			'plural_name'  => 'Years',
			'post_type'    => 'films',
		),
		array(
			'slug'         => 'actor',
			'single_name'  => 'Actor',
			'plural_name'  => 'Actors',
			'post_type'    => 'films',
		),
	);
	foreach( $taxonomies as $taxonomy ) {
		$labels = array(
			'name' => $taxonomy['plural_name'],
			'singular_name' => $taxonomy['single_name'],
			'search_items' =>  'Search ' . $taxonomy['plural_name'],
			'all_items' => 'All ' . $taxonomy['plural_name'],
			'parent_item' => 'Parent ' . $taxonomy['single_name'],
			'parent_item_colon' => 'Parent ' . $taxonomy['single_name'] . ':',
			'edit_item' => 'Edit ' . $taxonomy['single_name'],
			'update_item' => 'Update ' . $taxonomy['single_name'],
			'add_new_item' => 'Add New ' . $taxonomy['single_name'],
			'new_item_name' => 'New ' . $taxonomy['single_name'] . ' Name',
			'menu_name' => $taxonomy['plural_name']
		);
		
		$rewrite = isset( $taxonomy['rewrite'] ) ? $taxonomy['rewrite'] : array( 'slug' => $taxonomy['slug'] );
		$hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : true;
	
		register_taxonomy( $taxonomy['slug'], $taxonomy['post_type'], array(
			'hierarchical' => $hierarchical,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => $rewrite,
		));
	}
	
}

// Register all the four taxonomies
add_action( 'init', 'be_register_taxonomies' );



// Add the film post type to query
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );
 
function add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() ){
        $query->set( 'post_type', array( 'post', 'films' ) );
	}
    return $query;
}

