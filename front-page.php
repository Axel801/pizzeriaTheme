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
      <div class="info-plato text-white">
        <h3 class="mt-4 mb-4"><?php the_title(  ) ?></h3>
        <p class="mb-2"><?php echo get_the_content() ?></p>
        <p class="precio"><?php the_field('precio') ?></p>
        <a href="<?php the_permalink() ?>" class="btn btn-lg btn-brand-primary">Leer Más</a>
      </div>
    </div>
  <?php endwhile;wp_reset_postdata(); ?>
</div>
</div>
<section class="contenido-inicio container-fluid bgimage" style="background-image:url(<?php echo get_template_directory_uri().'/img/bg-ingredientes.jpg' ?>)">
  <div class="container">
    <div class="row pt-5 pb-5">
      <div class="col-12 col-md-6 text-left">
        <?php the_field('contenido') ?>
        <a class="btn btn-brand-secondary btn-lg " href="<?php echo get_permalink($url->ID); ?>">Leer más</a>
      </div>
      <div class="col-12 col-md-6">
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
<div class="container mt-3">
  <h2 class="text-center color-brand font-weight-bold mb-4">Galería de imagenes</h2>
  <div class="row">

    <?php
    $page = get_page_by_path( 'galeria', $output = OBJECT, $post_type = 'page' );
    $gallery = get_post_gallery( $page->ID, false );
    $ids = explode(',',$gallery['ids']);
    ?>

    <?php for($i=0;$i<count($ids);$i++): ?>
      <div class="col-12 col-sm-6 col-lg-3 text-center mb-4">
        <?php
        $imageFull = wp_get_attachment_image_src( intval($ids[$i]), 'full' );
        $imageSmall = wp_get_attachment_image_src( intval($ids[$i]), 'thumbnail' );
        ?>
        <a href="<?php echo $imageFull[0]; ?>" data-lightbox="gallery">
          <img src="<?php echo $imageSmall[0]; ?>" class="img-fluid" alt="Gallery image" />
        </a>
      </div>
    <?php endfor; ?>


  </div>
</div>

<section class="container-fluid bgimage mt-4 mb-4" style="background-image:url(<?php echo get_template_directory_uri().'/img/bg-ingredientes.jpg' ?>)">
  <div class="row">
    <div class="col-12 col-md-6" id="map">

    </div>
    <div class="col-12 col-md-6">
      <h2 class="mt-5 mb-3 text-white text-center font-weight-bold">Realiza una reserva</h2>
      <form class="reservations pt-3 pr-lg-5">
        <input type="text" class="mb-3 form-control" name="name" placeholder="Nombre" required>
        <input type="datetime-local" name="fecha" placeholder="Fecha" required class="mb-3 form-control">
        <input type="email" class="mb-3 form-control" name="correo" placeholder="Correo" required>
        <input type="tel" name="telefono" placeholder="Télefono" class="mb-3 form-control" required>
        <textarea class="mb-3 form-control" name="mensaje" placeholder="Mensaje" required></textarea>
        <div class="mb-3 g-recaptcha" data-sitekey="6Lc1Uh4UAAAAAJDEU6T1EXn-Wx1mswNu0zc3YtGS"></div>
        <div class="text-left">
          <input type="submit" name="enviar" class="mb-3 btn btn-brand-primary btn-lg ">
        </div>
        <input type="hidden" value="1" name="oculto">
      </form>
    </div>
  </div>
</section>

<?php get_footer(); ?>
