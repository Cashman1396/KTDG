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




   function custom_taxonomy($plural = '', $singular = '', $slug = '', $article = '', $post_types = '', $showAdmin = false)
{
    $plural = htmlentities($plural);
    $singular = htmlentities($singular);

    $labels = [
        'name' => _x($plural, 'Taxonomy General Name'),
        'singular_name' => _x($singular, 'Taxonomy Singular Name'),
        'menu_name' => __($plural),
        'all_items' => __('All ' . strtolower($plural)),
        'parent_item' => null,
        'parent_item_colon' => null,
        'new_item_name' => __('New ' . strtolower($singular)),
        'add_new_item' => __('Add new ' . strtolower($singular)),
        'edit_item' => __('Edit ' . strtolower($singular)),
        'update_item' => __('Update ' . strtolower($singular)),
        'separate_items_with_commas' => __('Separate ' . strtolower($plural) . ' with commas'),
        'search_items' => __('Search ' . strtolower($plural)),
        'add_or_remove_items' => __('Add or remove ' . strtolower($plural)),
        'choose_from_most_used' => __('Choose from the most used ' . strtolower($plural)),
    ];

    $rewrite = [
        'slug' => $slug,
        'with_front' => true,
        'has_archive' => true,
        'hierarchical' => true,
    ];

    $args = [
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => $showAdmin,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'query_var' => $slug,
        'rewrite' => $rewrite,
    ];

    register_taxonomy($slug, $post_types, $args);
}

function register_taxonomies()
{
    custom_taxonomy('Categories', 'Category', 'category-cause', 'the', ['causes'], true);
    custom_taxonomy('Ages', 'Age', 'age-cause', 'the', ['causes'], true);
    custom_taxonomy('Type', 'Type', 'type-cause', 'the', ['causes'], true);
}

add_action('init', 'register_taxonomies');


class CSS_Menu_Maker_Walker extends Walker {
  var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
  function start_lvl( &$output, $depth = 0, $args = array() ) {
  $indent = str_repeat("\t", $depth);
  $output .= "\n$indent<ul>\n";
  }
  function end_lvl( &$output, $depth = 0, $args = array() ) {
  $indent = str_repeat("\t", $depth);
  $output .= "$indent</ul>\n";
  }
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
  global $wp_query;
  $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
  $class_names = $value = ''; 
  $classes = empty( $item->classes ) ? array() : (array) $item->classes;
  /* Add active class */
   if(in_array('current-menu-item', $classes)) {
   $classes[] = 'active';
   unset($classes['current-menu-item']);
   }
  /* Check for children */
  
  $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 3, 'meta_key' => '_menu_item_parent', 'meta_value' => $item->ID));
  if (!empty($children)) {
   $classes[] = 'has-sub';
  }
  $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
  $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
  $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
  $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
  $output .= $indent . '<li' . $id . $value . $class_names .'>';
  $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
  $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
   $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
   $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
  $item_output = $args->before;
  $item_output .= '<a'. $attributes .'><span>';
  $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
   $item_output .= '</span></a>';
  $item_output .= $args->after;
   $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
  function end_el( &$output, $item, $depth = 0, $args = array() ) {
  $output .= "</li>\n";
   }}

?>