<div class="wrap">
    <h1>Reservaciones</h1>

    <table class="wp-list-table widefat striped">
      <thead>
        <tr>
          <th class="manage-column">ID</th>
          <th class="manage-column">Nombre</th>
          <th class="manage-column">Fecha</th>
          <th class="manage-column">Correo</th>
          <th class="manage-column">Teléfono</th>
          <th class="manage-column">Mensaje</th>
          <th class="manage-column">Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        global $wpdb;
        $reservaciones = $wpdb->prefix.'reservations';
        //ARRAY_A es para que nos devuelva un array asociativo y no  uno de objetos
        //ARRAY_N es para que nos devuelva un array numerico
        $registros = $wpdb->get_results("SELECT * FROM $reservaciones",ARRAY_A);

        foreach ($registros as $registro) :
          ?>

          <tr>
            <td><?php echo $registro['id'] ?></td>
            <td><?php echo $registro['nombre'] ?></td>
            <td><?php echo $registro['fecha'] ?></td>
            <td><?php echo $registro['correo'] ?></td>
            <td><?php echo $registro['telefono'] ?></td>
            <td><?php echo $registro['mensaje'] ?></td>
            <td><a href="#" class="delete-register" data-reservations="<?php echo $registro['id'] ?>">Eliminar</a></td>
          </tr>

        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
