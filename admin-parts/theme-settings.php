<div class="wrap">
  <h1>Theme Settings</h1>
  <h2 class="nav-tab-wrapper">
    <a href="?page=pizzeria_settings&tab=theme" class="nav-tab <?php echo $active_tab == 'theme'? 'nav-tab-active':''?>">General Settings</a>
    <a href="?page=pizzeria_settings&tab=gmaps" class="nav-tab <?php echo $active_tab == 'gmaps'? 'nav-tab-active':''?>">Google Maps</a>
  </h2>
  <form action="options.php" method="post">

    <?php if($active_tab =='theme') {
      settings_fields( 'altp_pizzeria_info' );
      do_settings_sections( 'altp_pizzeria_info' );
      ?>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Direccion</th>
          <td><input type="text" class="form-control" id="direccion" placeholder="Direccion" name="altp_pizzeria_address" value="<?php echo esc_attr( get_option('altp_pizzeria_address') ) ?>"></td>
        </tr>
        <tr valign="top">
          <th scope="row">Telefono</th>
          <td><input type="text" class="form-control" id="telefono" placeholder="Telefono" name="altp_pizzeria_tel" value="<?php echo esc_attr( get_option('altp_pizzeria_tel') ) ?>"></td>
        </tr>
      </table>
    <?php } ?>

    <?php if($active_tab =='gmaps') {
      settings_fields( 'altp_pizzeria_gmaps' );
      do_settings_sections( 'altp_pizzeria_gmaps' );
      ?>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Latutid</th>
          <td><input type="text" class="form-control" id="latitud" placeholder="Latitud" name="altp_pizzeria_gmap_latitude" value="<?php echo esc_attr( get_option('altp_pizzeria_gmap_latitude') ) ?>"></td>
        </tr>
        <tr valign="top">
          <th scope="row">Longitud</th>
          <td><input type="text" class="form-control" id="longitud" placeholder="Longitud" name="altp_pizzeria_gmap_longitude" value="<?php echo esc_attr( get_option('altp_pizzeria_gmap_longitude') ) ?>"></td>
        </tr>
        <tr valign="top">
          <th scope="row">Zoom</th>
          <td><input type="text" class="form-control" id="zoom" placeholder="Zoom" name="altp_pizzeria_gmap_zoom" value="<?php echo esc_attr( get_option('altp_pizzeria_gmap_zoom') ) ?>"></td>
        </tr>
        <tr valign="top">
          <th scope="row">API Key</th>
          <td><input type="text" class="form-control" id="apiKey" placeholder="API Key" name="altp_pizzeria_gmap_apikey" value="<?php echo esc_attr( get_option('altp_pizzeria_gmap_apikey') ) ?>"></td>
        </tr>
      </table>
    <?php } ?>
    <?php submit_button(); ?>

  </form>
</div>
