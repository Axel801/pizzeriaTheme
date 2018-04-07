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
<?php get_footer(); ?>
