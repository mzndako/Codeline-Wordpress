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

