<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Support for IOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri()?>/img/apple-touch-icon.png">
  <meta name="apple-mobile-web-app-title" content="La Pizzeria">

  <!-- Support for Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="theme-color" content="#a61206">
  <meta name="application-name" content="La Pizzeria">
  <link rel="icon" type="img/png" href="<?php echo get_template_directory_uri()?>/img/apple-touch-icon.png" sizes="180x180">

  <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>


  <header class="container-fluid">

    <nav class="row align-items-center">

      <div class="col-md-12 col-lg-3 offset-lg-4 text-center">
        <a href="<?php echo esc_url(home_url( '/' )); ?>" class="navbar-brand ">
          <?php
          $custom_logo_id = get_theme_mod( 'custom_logo' );
          $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
          ?>
          <img src="<?php echo $image[0]; ?>" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-12 col-lg-3 offset-lg-1 ">


        <?php
        $args = array(
          'theme_location'=>'social-menu',
          'menu_class'=> 'text-center text-lg-right list-inline align-self-center px-0',
          'container'=>'',
          'container_class'=>'',
          'container_id'=> '',
          'link_before'=>'<span class="sr-only">',
          'link_after'=>'</span>'
        );
        wp_nav_menu($args);
        ?>

        <div class="address text-center text-lg-right">
          <p class="h3 lead">Calle Marqués de la Valdavia 76, 3ºB</p>
          <p class="h3 lead">Telefono: 605477410</p>
        </div>
      </div>
    </div>
  </nav>
</header>
