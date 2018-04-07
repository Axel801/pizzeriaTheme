
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
  <p class="lead">Calle Marqués de la Valdavia 76, 3ºB</p>
  <p class="lead">Telefono: 605477410</p>
</footer>
<?php wp_footer() ?>
</body>
</html>
