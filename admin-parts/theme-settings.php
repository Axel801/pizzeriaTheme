<div class="container-fluid mt-3">
  <h3 class="lead font-weight-bold">Theme Settings</h3>
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link <?php if($active_tab =='theme' || $active_tab == '' ){ ?> active <?php } ?>"  href="?page=pizzeria_settings&tab=theme" >Settings Theme</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php if($active_tab =='gmaps'){ ?> active <?php } ?>" href="?page=pizzeria_settings&tab=gmaps" >Google Maps</a>
    </li>

  </ul>
  <form action="options.php" method="post">
    <div class="tab-content pt-3" id="myTabContent">
      <?php if($active_tab =='theme') {
        settings_fields( 'altp_pizzeria_info' );
        do_settings_sections( 'altp_pizzeria_info' );
        ?>

        <div class="tab-pane fade show active" >
          <div class="form-group row">
            <label for="direccion" class="col-sm-2 col-lg-1 col-form-label">Direccion</label>
            <div class="col-sm-10 col-lg-4">
              <input type="text" class="form-control" id="direccion" placeholder="Direccion" name="altp_pizzeria_address" value="<?php echo esc_attr( get_option('altp_pizzeria_address') ) ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="telefono" class="col-sm-2 col-lg-1 col-form-label">Telefono</label>
            <div class="col-sm-10 col-lg-4">
              <input type="text" class="form-control" id="telefono" placeholder="Telefono" name="altp_pizzeria_tel" value="<?php echo esc_attr( get_option('altp_pizzeria_tel') ) ?>">
            </div>
          </div>
        </div>
      <?php } ?>

      <?php if($active_tab =='gmaps') {
        settings_fields( 'altp_pizzeria_gmaps' );
        do_settings_sections( 'altp_pizzeria_gmaps' );
        ?>
        <div class="tab-pane fade show active">
          <div class="form-group row">
            <label for="latitud" class="col-sm-2 col-lg-1 col-form-label">Latitud</label>
            <div class="col-sm-10 col-lg-4">
              <input type="text" class="form-control" id="latitud" placeholder="Latitud" name="altp_pizzeria_gmap_latitude" value="<?php echo esc_attr( get_option('altp_pizzeria_gmap_latitude') ) ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="longitud" class="col-sm-2 col-lg-1 col-form-label">Longitud</label>
            <div class="col-sm-10 col-lg-4">
              <input type="text" class="form-control" id="longitud" placeholder="Longitud" name="altp_pizzeria_gmap_longitude" value="<?php echo esc_attr( get_option('altp_pizzeria_gmap_longitude') ) ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="zoom" class="col-sm-2 col-lg-1 col-form-label">Zoom</label>
            <div class="col-sm-10 col-lg-4">
              <input type="text" class="form-control" id="zoom" placeholder="Zoom" name="altp_pizzeria_gmap_zoom" value="<?php echo esc_attr( get_option('altp_pizzeria_gmap_zoom') ) ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="apiKey" class="col-sm-2 col-lg-1 col-form-label">API Key</label>
            <div class="col-sm-10 col-lg-4">
              <input type="text" class="form-control" id="apiKey" placeholder="API Key" name="altp_pizzeria_gmap_apikey" value="<?php echo esc_attr( get_option('altp_pizzeria_gmap_apikey') ) ?>">
            </div>
          </div>
        </div>
      <?php } ?>
      <?php submit_button(); ?>
    </div>
  </form>
</div>
