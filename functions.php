<?php

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


add_action( 'wp_enqueue_scripts', 'alpt_styles');

function alpt_styles(){
  //Register Styles
  wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(),'4.0.0');
  wp_register_style('fontawesome', get_template_directory_uri().'/css/font-awesome.css', array(),'4.7.0');
  wp_register_style( 'gFonts','https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900',  array(), '1.0.0');
  wp_register_style('style', get_template_directory_uri().'/style.css', array('bootstrap'),'1.0');

  wp_enqueue_style( 'bootstrap');
  wp_enqueue_style( 'fontawesome');
  wp_enqueue_style( 'google_fonts');
  wp_enqueue_style( 'style');


  //Register JavaScript

  wp_register_script( 'bootrstrapJS', get_template_directory_uri().'/js/bootstrap.min.js',  array('jquery'), '4.0.0', true );
  wp_register_script( 'scripts', get_template_directory_uri().'/js/scripts.js',  array('bootrstrapJS','jquery'), '1.0.0', true );

  wp_enqueue_script('jquery' );
  wp_enqueue_script('bootrstrapJS');
  wp_enqueue_script('scripts');

}


add_action('init','alpt_menus');
function alpt_menus(){
  register_nav_menus(array(
    'header-menu'=> __('Header Menu', 'al_pizzeriaTheme'),
    'social-menu'=> __('Social Menu', 'al_pizzeriaTheme'),
  ));

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
    $class = 'li-color-header-menu no-text-decoration mx-2';
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
    $classes[] = 'nav-item text-uppercase font-weight-bold my-3';
  }
  return $classes;}

  ?>
