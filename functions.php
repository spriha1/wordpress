<?php

/**
* 
* @method test_theme_load_stylesheets() 
* 
* @param void  
* @return void 
* Desc : This method loads stylesheets
*/

function test_theme_load_stylesheets() {
    wp_register_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), false, 'all' );
    wp_enqueue_style( 'bootstrap' );

    wp_register_style( 'style', get_template_directory_uri().'/style.css', array(), false, 'all' );
    wp_enqueue_style( 'style' );
}

// Hooking up the test_theme_load_stylesheets() function
add_action( 'wp_enqueue_scripts', 'test_theme_load_stylesheets' );

// /**
// * 
// * @method test_theme_include_jquery() 
// * 
// * @param void  
// * @return void 
// * Desc : This method adds jquery
// */

// function test_theme_include_jquery() {
//     wp_deregister_script( 'jquery' );
//     wp_enqueue_script( 'jquery', get_template_directory_uri().'/js/jquery-3.4.1.min.js', '', 1, true );
// }

// // Hooking up the include_jquery() function
// add_action( 'wp_enqueue_scripts', 'test_theme_include_jquery' ); 

/**
* 
* @method test_theme_loadjs() 
* 
* @param void  
* @return void 
* Desc : This method loads scripts
*/

function test_theme_loadjs() {
    wp_register_script( 'customjs', get_template_directory_uri().'/js/scripts.js', '', 1, true );
    wp_enqueue_script( 'customjs' );
}

// Hooking up the test_theme_loadjs() function
add_action( 'wp_enqueue_scripts', 'test_theme_loadjs' ); 

// Registering theme support
add_theme_support( 'menus' );

// Registering theme support
add_theme_support( 'post-thumbnails' );

// Registering nav bar
register_nav_menus(
    array(
        'top-menu'    => __('Top Menu', 'theme'),
        'footer-menu' => __('Footer Menu', 'theme'),
    )
);

// Registering a new image size
add_image_size( 'smallest', 300, 300, true );

// Registering a new image size
add_image_size( 'largest', 800, 800, true );

/**
* 
* @method test_theme_create_post_type() 
* 
* @param void  
* @return void 
* Desc : This method registers custom post type
*/

function test_theme_create_post_type() {
    register_post_type( 'movies',
        array(
            'labels'            => array(
                'name'          => __( 'Movies' ),
                'singular_name' => __( 'Movie' )
            ),
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array('slug' => 'movies'),
        )
    );
}

// Hooking up our function to theme setup
add_action( 'init', 'test_theme_create_post_type' );

/**
* 
* @method test_theme_custom_taxonomies() 
* 
* @param void  
* @return void 
* Desc : This method registers custom taxonomy
*/

function test_theme_custom_taxonomies() {
    register_taxonomy(
        'genre',
        'movies',
        array(
            'labels' => array(
                'name'          => 'Movie Genre',
                'add_new_item'  => 'Add New Movie Genre',
                'new_item_name' => "New Movie Type Genre"
            ),
            'show_ui'       => true,
            'hierarchical'  => true,
            'has_archive'   => true,
        )
    );
}

// Hooking up our function to theme setup
add_action( 'init', 'test_theme_custom_taxonomies');

/**
* 
* @method test_theme_load_widgets_init() 
* 
* @param void  
* @return void 
* Desc : This method registers sidebar for displaying widgets
*/

function test_theme_load_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}

// Hooking up our function to theme setup
add_action( 'widgets_init', 'test_theme_load_widgets_init' );