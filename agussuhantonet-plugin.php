<?php
/*
Plugin Name: Site Plugin for agussuhanto.net
Description: Site specific code changes for agussuhanto.net
*/

/*
* Creating a function to create course post type
*/
function courses_custom_post_type() {
 
    // Set UI labels for course
    $labels = array(
        'name'                => _x( 'Courses', 'Post Type General Name', 'agussuhantonet' ),
        'singular_name'       => _x( 'Course', 'Post Type Singular Name', 'agussuhantonet' ),
        'menu_name'           => __( 'Courses', 'agussuhantonet' ),
        'parent_item_colon'   => __( 'Parent Course', 'agussuhantonet' ),
        'all_items'           => __( 'All Courses', 'agussuhantonet' ),
        'view_item'           => __( 'View Course', 'agussuhantonet' ),
        'add_new_item'        => __( 'Add New Course', 'agussuhantonet' ),
        'add_new'             => __( 'Add New', 'agussuhantonet' ),
        'edit_item'           => __( 'Edit Course', 'agussuhantonet' ),
        'update_item'         => __( 'Update Course', 'agussuhantonet' ),
        'search_items'        => __( 'Search Course', 'agussuhantonet' ),
        'not_found'           => __( 'Not Found', 'agussuhantonet' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'agussuhantonet' ),
    );
         
    // Set other options for course
    $args = array(
        'label'               => __( 'Courses', 'agussuhantonet' ),
        'description'         => __( 'Course content type', 'agussuhantonet' ),
        'labels'              => $labels,
        'rewrite'             => array( 'slug' => 'course' ),
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', 'post-formats', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'course_category', 'post_tag' ),
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
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
        
    // Registering your Custom Post Type
    register_post_type( 'course', $args );
}
     
/* Hook into the 'init' action */
add_action( 'init', 'courses_custom_post_type', 0 );

/*
* Creating a function to create course_category taxonomy
*/
function create_course_category_taxonomy() {

	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Course Categories', 'taxonomy general name', 'agussuhantonet' ),
		'singular_name'     => _x( 'Course Category', 'taxonomy singular name', 'agussuhantonet' ),
		'search_items'      => __( 'Search Course Categories', 'agussuhantonet' ),
		'all_items'         => __( 'All Course Categories', 'agussuhantonet' ),
		'parent_item'       => __( 'Parent Course Category', 'agussuhantonet' ),
		'parent_item_colon' => __( 'Parent Course Category:', 'agussuhantonet' ),
		'edit_item'         => __( 'Edit Course Category', 'agussuhantonet' ),
		'update_item'       => __( 'Update Course Category', 'agussuhantonet' ),
		'add_new_item'      => __( 'Add New Course Category', 'agussuhantonet' ),
		'new_item_name'     => __( 'New Course Category Name', 'agussuhantonet' ),
		'menu_name'         => __( 'Course Categories', 'agussuhantonet' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
        'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'course-category' ),
	);

    register_taxonomy( 'course_category', array( 'course' ), $args );
}

/* Hook into the 'init' action */
add_action( 'init', 'create_course_category_taxonomy', 0 );