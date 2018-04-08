<?php



add_action( 'admin_menu', 'altp_admin_settings');
function altp_admin_settings(){

  add_menu_page( 'Pizzeria Ajustes', 'Ajustes Tema', 'administrator', 'pizzeria_settings', 'altp_pizzeria_menu_settings','', 20 );
  add_submenu_page( 'pizzeria_settings', 'Reservas', 'Reservas', 'administrator', 'pizzeria_reservations', 'altp_pizzeria_reservations' );

  add_action('admin_init','altp_register_options');

}

function altp_register_options(){
  register_setting( 'altp_pizzeria_info', 'altp_pizzeria_address' );
  register_setting( 'altp_pizzeria_info', 'altp_pizzeria_tel' );

  register_setting( 'altp_pizzeria_gmaps', 'altp_pizzeria_gmap_latitude' );
  register_setting( 'altp_pizzeria_gmaps', 'altp_pizzeria_gmap_longitude' );
  register_setting( 'altp_pizzeria_gmaps', 'altp_pizzeria_gmap_zoom' );
  register_setting( 'altp_pizzeria_gmaps', 'altp_pizzeria_gmap_apikey' );
}

function altp_pizzeria_menu_settings(){
  $active_tab='';

  if(isset($_GET['tab']) && $_GET['tab']== 'gmaps'){
    $active_tab = 'gmaps';
  }else {
    $active_tab = 'theme';
  }
  //Share variable with templates
  include (locate_template( 'admin-parts/theme-settings.php') );

}



?>
