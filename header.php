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

      <div class="col-md-12 col-lg-7  text-center text-lg-right">
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
          'menu_id'=>'social-menu',
          'link_before'=>'<span class="sr-only">',
          'link_after'=>'</span>'
        );
        wp_nav_menu($args);
        ?>

        <div class="address text-center text-lg-right">
          <p class="lead"><?php echo esc_html( get_option( 'altp_pizzeria_address' ) ); ?></p>
          <p class="h3 lead">Telefono: <?php echo esc_html( get_option( 'altp_pizzeria_tel' ) );?></p>
        </div>
      </div>
    </div>
  </nav>
</header>
<nav class="navbar navbar-expand-lg navbar-light bg-brand border-top mt-3 pb-lg-0">
  <span class="text-uppercase text-white font-weight-bold d-block d-lg-none">MENÚ</span>
  <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php
  $args = array(
    'theme_location'=>'header-menu',
    'menu_class'=> 'text-center navbar-nav w-100 justify-content-center',
    'container_class'=>'collapse navbar-collapse mt-2 mt-lg-0',
    'container_id'=> 'navbarNav',
    'link_before'=>'',
    'link_after'=>''
  );
  wp_nav_menu($args);
  ?>

</nav>
