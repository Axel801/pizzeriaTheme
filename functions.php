<?php

require get_template_directory().'/inc/admin-options.php';
require get_template_directory().'/inc/shortcodes.php';
require get_template_directory().'/inc/database-reservations.php';
require get_template_directory().'/inc/logic-reservations.php';


add_action( 'after_setup_theme', 'alpt_setup');
function alpt_setup(){
  //Sizes Images
  add_image_size( 'nosotros', 437, 291, true);
  add_image_size( 'especialidades', 768, 515, true);
  add_image_size( 'especialidades_portrait', 435, 526, true);

  //Override the sizes of thumbnails proposed by WordPress
  update_option( 'thumbnail_size_w', 253 );//Ancho
  update_option( 'thumbnail_size_h', 164 );//Alto
  //Allow dynamic titles
  add_theme_support( 'title-tag' );
  //Allow post thumbnails
  add_theme_support( 'post-thumbnails' );
  //Allow customize the logo whith a size
  add_theme_support( 'custom-logo',array('height'=>200,'width'=>280));
}


add_action( 'admin_enqueue_scripts','alpt_styles_admin' );
function alpt_styles_admin(){
  wp_register_style('fontawesome', get_template_directory_uri().'/css/fontawesome-all.css', array(),'5.0.9');
  wp_register_style('sweetAlert', get_template_directory_uri().'/css/sweetalert2.min.css', array(),'7.12.13');
  wp_register_style('style', get_template_directory_uri().'/style.css', array('fontawesome'),'1.0');

  wp_enqueue_style( 'fontawesome');
  wp_enqueue_style( 'sweetAlert');
  wp_enqueue_style( 'style');


  wp_register_script( 'admin-scripts', get_template_directory_uri().'/js/admin-scripts.js',  array('jquery'), '1.0.0', true );
  wp_register_script( 'sweetAlertJS', get_template_directory_uri().'/js/sweetalert2.js',  array('jquery'), '1.0.0', true );

  wp_enqueue_script('jquery');
  wp_enqueue_script('sweetAlertJS');
  wp_enqueue_script('admin-scripts');


  wp_localize_script( 'admin-scripts', 'url_delete', array('ajaxurl'=>admin_url( 'admin-ajax.php')) );


}

add_action( 'wp_enqueue_scripts', 'alpt_styles');
function alpt_styles(){
  //Register <Styles></Styles>
  wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(),'4.0.0');
  wp_register_style('fontawesome', get_template_directory_uri().'/css/fontawesome-all.css', array(),'5.0.9');
  wp_register_style( 'gFonts','https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900',  array(), '1.0.0');
  wp_register_style('lightbox', get_template_directory_uri().'/css/lightbox.css', array(),'2.10.0');
  wp_register_style('style', get_template_directory_uri().'/style.css', array('bootstrap'),'1.0');

  wp_enqueue_style( 'bootstrap');
  wp_enqueue_style( 'fontawesome');
  wp_enqueue_style( 'google_fonts');
  wp_enqueue_style( 'lightbox');
  wp_enqueue_style( 'style');

  //Register JavaScript

  $apiKey = esc_html( get_option( 'altp_pizzeria_gmap_apikey' ) );

  wp_register_script( 'bootrstrapJS', get_template_directory_uri().'/js/bootstrap.min.js',  array('jquery'), '4.0.0', true );
  wp_register_script( 'gMaps', 'https://maps.googleapis.com/maps/api/js?key='.$apiKey.'&callback=initMap', array(), '', true );
  wp_register_script( 'lightboxJS', get_template_directory_uri().'/js/lightbox.js',  array('jquery'), '2.10.0', true );
  wp_register_script( 'scripts', get_template_directory_uri().'/js/scripts.js',  array('bootrstrapJS','jquery'), '1.0.0', true );
  wp_register_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js',  array(), '2.0', false );

  wp_enqueue_script('jquery' );
  wp_enqueue_script('recaptcha');
  wp_enqueue_script('gMaps');
  wp_enqueue_script('bootrstrapJS');
  wp_enqueue_script('lightboxJS');
  wp_enqueue_script('scripts');

  //Share WP options to scripts.js
  wp_localize_script(
    'scripts',
    'settings',
    array(
      'latitude'=>get_option('altp_pizzeria_gmap_latitude' ),
      'longitude'=>get_option('altp_pizzeria_gmap_longitude'),
      'zoom'=>get_option('altp_pizzeria_gmap_zoom')
    )
  );

}

//Add Async and Defer gMaps
add_filter('script_loader_tag','add_async_defer', 10, 2);
function add_async_defer($tag,$handle){
  if('gMaps' !== $handle){
    return $tag;
  }
  return str_replace('src','async defer src',$tag);
}


add_action('init','alpt_menus');
function alpt_menus(){
  register_nav_menus(array(
    'header-menu'=> __('Header Menu', 'al_pizzeriaTheme'),
    'social-menu'=> __('Social Menu', 'al_pizzeriaTheme'),
  ));

}

add_action( 'widgets_init', 'altp_widgets');
function altp_widgets(){
  register_sidebar(array(
    'name'=>'Blog Sidebar',
    'id'=> 'blog_sidebar',
    'before_widget'=>'<div class="widget mb-4">',
    'after_widget'=>'</div>',
    'before_title'=>'<h3>',
    'after_title'=>'</h3>'
  ));
}

add_action( 'init','alpt_customPostTypeEspecialidades');
function alpt_customPostTypeEspecialidades() {
  $labels = array(
    'name'               => _x( 'Platos', 'al_pizzeriaTheme' ),
    'singular_name'      => _x( 'Platos', 'post type singular name', 'al_pizzeriaTheme' ),
    'menu_name'          => _x( 'Platos', 'admin menu', 'al_pizzeriaTheme' ),
    'name_admin_bar'     => _x( 'Platos', 'add new on admin bar', 'al_pizzeriaTheme' ),
    'add_new'            => _x( 'Añadir nuevo', 'plato', 'al_pizzeriaTheme' ),
    'add_new_item'       => __( 'Añadir nuevo plato', 'al_pizzeriaTheme' ),
    'new_item'           => __( 'Nuevo plato', 'al_pizzeriaTheme' ),
    'edit_item'          => __( 'Modificar lato', 'al_pizzeriaTheme' ),
    'view_item'          => __( 'Ver plato', 'al_pizzeriaTheme' ),
    'all_items'          => __( 'Todos los platos', 'al_pizzeriaTheme' ),
    'search_items'       => __( 'Buscar platos', 'al_pizzeriaTheme' ),
    'parent_item_colon'  => __( 'Parent Platos:', 'al_pizzeriaTheme' ),
    'not_found'          => __( 'No hay platos encontrados.', 'al_pizzeriaTheme' ),
    'not_found_in_trash' => __( 'No hay platos en la papelera', 'al_pizzeriaTheme' )
  );

  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Description.', 'al_pizzeriaTheme' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'platos' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 6,
    'show_in_rest'       => true,
    'rest_base'          => 'platos',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'supports'           => array( 'title', 'editor', 'thumbnail' ),
    'taxonomies'          => array( 'category' ),
  );
  register_post_type( 'platos', $args );
}


//Modificaciones para Bootstrap 4

//Add class to 'a' element menu
add_filter( 'nav_menu_link_attributes', 'alpt_add_class_menu_a', 10, 3 );
function alpt_add_class_menu_a( $atts, $item, $args ) {
  if($args->theme_location == 'social-menu'){
    $class = 'text-dark no-text-decoration mx-2';
    $atts['class'] = $class;
  }
  if($args->theme_location == 'header-menu'){
    $class = 'li-color-header-menu no-text-decoration align-middle';
    $atts['class'] = $class;
  }
  return $atts;
}
//Add class to 'li' element menu
add_filter('nav_menu_css_class','add_classes_on_li',1,3);
function add_classes_on_li($classes, $item, $args) {
  if($args->theme_location == 'social-menu'){
    $classes[] = 'list-inline-item';
  }
  if($args->theme_location == 'header-menu'){
    $classes[] = 'nav-item text-uppercase font-weight-bold py-3 px-5';
  }
  return $classes;
}

  ?>
