<?php
add_action('after_setup_theme', 'altp_database');
function altp_database(){
    // WPDB nos da los métodos para trabajar con tablas
    global $wpdb;
    // Agregamos una versión
    global $altp_dbversion;
    $altp_dbversion = '1.0';

    // Obtenemos el prefijo
    $tabla = $wpdb->prefix . 'reservations';


    $charset_collate = $wpdb->get_charset_collate();


    $sql = "CREATE TABLE $tabla (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            nombre varchar(50) NOT NULL,
            fecha datetime NOT NULL,
            correo varchar(50) DEFAULT '' NOT NULL,
            telefono varchar(10) NOT NULL,
            mensaje longtext NOT NULL,
            PRIMARY KEY (id)
    ) $charset_collate; ";

    // Se necesita dbDelta para ejecutar el SQL y está en la siguiente dirección
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    // Agregamos la versión de la BD Para compararla con futuras actualizaciones
    add_option('altp_pizzeria_dbversion', $altp_dbversion);


    //Update
    $version_actual = get_option('altp_pizzeria_dbversion');


    if($altp_dbversion != $version_actual) {
          $tabla = $wpdb->prefix . 'reservations';

          // Aquí realizarias las actualizaciones
          $sql = "CREATE TABLE $tabla (
                  id mediumint(9) NOT NULL AUTO_INCREMENT,
                  nombre varchar(50) NOT NULL,
                  fecha datetime NOT NULL,
                  correo varchar(50) DEFAULT '' NOT NULL,
                  telefono varchar(10) NOT NULL,
                  mensaje longtext NOT NULL,
                  PRIMARY KEY (id)
          ) $charset_collate; ";
          require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
          dbDelta($sql);
          //Actualizamos a la versión actual en caso de que asi sea
          update_option('altp_pizzeria_dbversion', $altp_dbversion);
    }

}

// Función para comprobar que la versión instalada es igual a la base de datos nueva.
add_action('plugins_loaded', 'alt_pizzeriadb_revisar');
function alt_pizzeriadb_revisar(){
  global $altp_dbversion;
  if(get_site_option('altp_pizzeria_dbversion') != $altp_dbversion) {
      altp_database();
  }
}
