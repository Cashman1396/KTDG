<?php

function  KTDG_themes() {
   //Bootstrap
   wp_enqueue_style('bootstrap5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css');
   wp_enqueue_script( 'boot5-js','https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js','','',true );

   //Slick
   wp_enqueue_style( 'slick-css',  get_stylesheet_directory_uri() . '/inc/slick/slick.css', array());
   wp_enqueue_style( 'slick-theme-css',  get_stylesheet_directory_uri() . '/inc/slick/slick-theme.css' );
   wp_enqueue_script( 'slick-js',  get_stylesheet_directory_uri() . '/inc/slick/slick.js', array( 'jquery' ), '1.8.4', TRUE );
   wp_enqueue_script( 'slick-init',   get_stylesheet_directory_uri() . '/inc/slick/slick-init.js', array( 'slick-js' ), '1.0.0',  TRUE );


   //Style
   wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );



}


add_action( 'wp_enqueue_scripts', 'KTDG_themes' );


function setup_projects_cpt(){
    $labels = array(
        'name' => _x('Projects', 'post type general name'),
        'singular_name' => _x('Project', 'post type singular name'),
        'add_new' => _x('Add New', 'Project'),
        'add_new_item' => __('Add New Project'),
        'edit_item' => __('Edit Project'),
        'new_item' => __('New Project'),
        'all_items' => __('All Projects'),
        'view_item' => __('View Project'),
        'search_items' => __('Search Projects'),
        'not_found' => __('No Projects Found'),
        'not_found_in_trash' => __('No Projects found in the trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Projects'
        );
    $args = array(
        'labels' => $labels,
        'description' => 'My Projects',
        'rewrite' => array('slug' => 'projects'),
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive' => true,
        'taxonomies' => array('category'),
        'menu_icon' => 'dashicons-admin-multisite', //Find the appropriate dashicon here: https://developer.wordpress.org/resource/dashicons/
        );
    register_post_type('projects', $args);
}
add_action('init', 'setup_projects_cpt');


function register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' )
       )
     );
   }
   add_action( 'init', 'register_my_menus' );

?>