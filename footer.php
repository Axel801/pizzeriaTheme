
<footer class="border-top text-center pt-4 mt-4">
  <div class="footer-menu">
    <?php $args = array(
      'theme_location'=>'header-menu',
      'menu_class'=> 'd-flex d-row justify-content-center align-middle flex-wrap',
      'container_class'=>'',
      'container_id'=> '',
      'link_before'=>'',
      'link_after'=>'',
      'after'=>'<span class="separador"> | </span>'
    );
    wp_nav_menu($args);
    ?>
  </div>
  <p class="lead"><?php echo esc_html( get_option( 'altp_pizzeria_address' ) ); ?></p>
  <p class="lead">Telefono: <?php echo esc_html( get_option( 'altp_pizzeria_tel' ) );?></p>
</footer>
<?php wp_footer() ?>
</body>
</html>
