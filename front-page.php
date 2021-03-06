<?php get_header(); ?>
<?php get_template_part( 'parts/hero') ;?>
<div class="container box-top">

  <h2 class="text-center color-brand font-weight-bold mb-4">Nuestras especialidades</h2>
  <div class="row especialidades">
    <?php
    $args= array(
      'posts_per_page'=>3,
      'orderby'=>'rand',
      'post_type' => 'platos'
    );
    $platos = new WP_Query($args);
    while($platos->have_posts()): $platos->the_post();
    ?>
    <div class="col-12 col-md-12 col-lg-4 mb-4">
      <?php the_post_thumbnail('especialidades_portrait',array('class'=>'img-fluid')) ?>
      <div class="info-plato text-white d-flex flex-column justify-content-center align-items-center px-3">
        <h3 class="mt-4 mb-4"><?php the_title(  ) ?></h3>
        <p class="mb-2"><?php echo get_the_content() ?></p>
        <p class="precio"><?php the_field('precio') ?></p>
      </div>
    </div>
  <?php endwhile;wp_reset_postdata(); ?>
</div>
</div>
<section class="contenido-inicio container-fluid bgimage" style="background-image:url(<?php echo get_template_directory_uri().'/img/bg-ingredientes.jpg' ?>)">
  <div class="container">
    <div class="row pt-5 pb-5">
      <div class="col-12 col-md-6 text-center text-md-left">
        <?php the_field('contenido') ?>
        <a class="btn btn-brand-secondary btn-lg " href="<?php echo get_permalink($url->ID); ?>">Leer más</a>
      </div>
      <div class="col-12 col-md-6 mt-3 mt-md-0">
        <?php
        $attachment_id = get_field('imagen');
        $size = "full"; // (thumbnail, medium, large, full or custom size)
        $image = wp_get_attachment_image_src( $attachment_id, $size );
        ?>
        <img src="<?php echo $image[0];?>" alt="" class="img-fluid">
      </div>
    </div>
  </div>
</section>
<div class="container mt-3 d-none d-md-block">
  <h2 class="text-center color-brand font-weight-bold mb-4">Galería de imagenes</h2>


  <?php
  $url = get_page_by_path( 'galeria');
  echo get_post_gallery( $url->ID );
  ?>



</div>

<section class="container-fluid bgimage mt-0 mt-md-4 mb-4" style="background-image:url(<?php echo get_template_directory_uri().'/img/bg-ingredientes.jpg' ?>)">
  <div class="row">
    <div class="col-12 col-md-6 d-none d-md-block" id="map">

    </div>
    <div class="col-12 col-md-6">
      <h2 class="mt-5 mb-3 text-white text-center font-weight-bold">Realiza una reserva</h2>
      <?php get_template_part( 'parts/form-reserva') ;?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
