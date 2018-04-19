<?php

add_action( 'init', 'altp_saveReservation' );
function altp_saveReservation(){
  if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['hiddenForm']== '1'){

    $captcha = $_POST['g-recaptcha-response'];
    $campos = array(
      'secret' =>get_option('altp_pizzeria_secret_key'),
      'response' => $captcha,
      'remoteip' => $_SERVER['REMOTE_ADDR']
    );

    $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($campos));

    $respuesta = json_decode( curl_exec($ch));
    if($respuesta->success){

      if(isset($_POST['enviarForm'])){

        global $wpdb;
        $tabla = $wpdb->prefix."reservations";

        $nombre = sanitize_text_field( $_POST['name']) ;
        $fecha = sanitize_text_field( $_POST['fecha']) ;
        $correo = sanitize_text_field( $_POST['correo']) ;
        $telefono = sanitize_text_field( $_POST['telefono']) ;
        $mensaje = sanitize_text_field( $_POST['mensaje']) ;

        $datos = array(
          'nombre'=>  $nombre,
          'fecha'=> $fecha,
          'correo'=> $correo,
          'telefono'=> $telefono,
          'mensaje'=> $mensaje
        );

        $formato = array(
          '%s',
          '%s',
          '%s',
          '%s',
          '%s'
        );

        $wpdb->insert($tabla,$datos, $formato);

        $url = get_page_by_path('gracias-por-su-reserva');
        wp_redirect( get_permalink( $url->ID ) );
        exit();
      }
    }
  }
}



//El hook es wp_ajax_"la funcion a realizar"
add_action( 'wp_ajax_altp_deleteReservation', 'altp_deleteReservation');
function altp_deleteReservation(){

  if(isset($_POST['tipo']) && $_POST['tipo'] == 'delete'){
    global $wpdb;
    $tabla = $wpdb->prefix . 'reservations';
    $id_registro = $_POST['id'];
    $resultado = $wpdb -> delete($tabla,array('id'=>$id_registro),array('%d'));
    if($resultado == 1){
      $respuesta = array(
        'response' => 1,
        'id'=>$id_registro
      );
    } else {
      $respuesta = array(
        'response' => 'error'
      );
    }

    die(json_encode( $respuesta ));
  }
  die();
}


?>
