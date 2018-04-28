<?php
include_once('advanced-custom-fields/acf.php');
define( 'ACF_LITE', true );
add_action( 'acf/init', 'altp_acf');
function altp_acf(){
  if(function_exists("register_field_group")){
    register_field_group(array (
    'id' => 'acf_about-us',
    'title' => 'About Us',
    'fields' => array (
    array (
    'key' => 'field_5acc91a4eca54',
    'label' => 'Image 1',
    'name' => 'image_1',
    'type' => 'image',
    'instructions' => 'Sube una imagen',
    'required' => 1,
    'save_format' => 'id',
    'preview_size' => 'thumbnail',
    'library' => 'all',
    ),
    array (
    'key' => 'field_5acc926eeca57',
    'label' => 'Text 1',
    'name' => 'text_1',
    'type' => 'wysiwyg',
    'required' => 1,
    'default_value' => '',
    'toolbar' => 'full',
    'media_upload' => 'yes',
    ),
    array (
    'key' => 'field_5acc924beca56',
    'label' => 'Image 2',
    'name' => 'image_2',
    'type' => 'image',
    'instructions' => 'Sube una imagen',
    'required' => 1,
    'save_format' => 'id',
    'preview_size' => 'thumbnail',
    'library' => 'all',
    ),
    array (
    'key' => 'field_5acc92eeeca59',
    'label' => 'Text 2',
    'name' => 'text_2',
    'type' => 'wysiwyg',
    'required' => 1,
    'default_value' => '',
    'toolbar' => 'full',
    'media_upload' => 'yes',
    ),
    array (
    'key' => 'field_5acc924aeca55',
    'label' => 'Image 3',
    'name' => 'image_3',
    'type' => 'image',
    'instructions' => 'Sube una imagen',
    'required' => 1,
    'save_format' => 'id',
    'preview_size' => 'thumbnail',
    'library' => 'all',
    ),
    array (
    'key' => 'field_5acc92eeeca58',
    'label' => 'Text 3',
    'name' => 'text_3',
    'type' => 'wysiwyg',
    'required' => 1,
    'default_value' => '',
    'toolbar' => 'full',
    'media_upload' => 'yes',
    ),
    ),
    'location' => array (
    array (
    array (
    'param' => 'page',
    'operator' => '==',
    'value' => '37',
    'order_no' => 0,
    'group_no' => 0,
    ),
    ),
    ),
    'options' => array (
    'position' => 'normal',
    'layout' => 'default',
    'hide_on_screen' => array (
    ),
    ),
    'menu_order' => 0,
    ));
    register_field_group(array (
    'id' => 'acf_inicio',
    'title' => 'Inicio',
    'fields' => array (
    array (
    'key' => 'field_5ac8f563bb7a5',
    'label' => 'Contenido',
    'name' => 'contenido',
    'type' => 'wysiwyg',
    'instructions' => 'Introduzca los datos que quiere que aparezcan en la sección de la mitad de la página',
    'required' => 1,
    'default_value' => '',
    'toolbar' => 'full',
    'media_upload' => 'yes',
    ),
    array (
    'key' => 'field_5ac8f5aabb7a6',
    'label' => 'Imagen',
    'name' => 'imagen',
    'type' => 'image',
    'instructions' => 'Agregue la imagen que aparecerá al lado del Contenido',
    'required' => 1,
    'save_format' => 'id',
    'preview_size' => 'thumbnail',
    'library' => 'all',
    ),
    ),
    'location' => array (
    array (
    array (
    'param' => 'page',
    'operator' => '==',
    'value' => '33',
    'order_no' => 0,
    'group_no' => 0,
    ),
    ),
    ),
    'options' => array (
    'position' => 'normal',
    'layout' => 'default',
    'hide_on_screen' => array (
    ),
    ),
    'menu_order' => 0,
    ));
    register_field_group(array (
    'id' => 'acf_platos',
    'title' => 'Platos',
    'fields' => array (
    array (
    'key' => 'field_5ac7f6dd1dd88',
    'label' => 'Precio',
    'name' => 'precio',
    'type' => 'text',
    'instructions' => 'Introduzca el precio del plato',
    'default_value' => '',
    'placeholder' => '',
    'prepend' => '',
    'append' => '',
    'formatting' => 'none',
    'maxlength' => '',
    ),
    ),
    'location' => array (
    array (
    array (
    'param' => 'post_type',
    'operator' => '==',
    'value' => 'platos',
    'order_no' => 0,
    'group_no' => 0,
    ),
    ),
    ),
    'options' => array (
    'position' => 'normal',
    'layout' => 'default',
    'hide_on_screen' => array (
    ),
    ),
    'menu_order' => 0,
    ));
  }

}


 ?>
