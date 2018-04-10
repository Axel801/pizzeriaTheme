<?php
/*
* Template Name: Menu Page
*/
?>
<?php get_header(); ?>
<?php get_template_part( 'parts/hero') ;?>
<div class="container box-top">



  <?php while (have_posts()) : the_post(); ?>

    <p class="text-center lead"><?php echo get_the_content() ?></p>

  <?php endwhile; ?>

  <h3 class="font-weight-bold mt-4 color-brand ml-lg-2">Pizzas</h3>

  <div class="row">
    <?php
    $args = array(
      'post_type'=>'platos',
      'posts_per_page'=>-1,
      'orderby'=> 'title',
      'order'=>'ASC',
      'category_name'=> 'pizza'
    );
    $pizzas = new WP_Query($args);
    while($pizzas->have_posts()): $pizzas->the_post();
    ?>
    <div class="col-sm-6 mb-4">
      <?php the_post_thumbnail( 'especialidades',['class'=>'img-fluid'] ) ?>
      <h4 class="font-weight-bold my-2 pl-3"><?php the_title()?> <span class="float-right color-brand-secondary"><?php the_field('precio') ?></span></h4>
      <div class="py-3 px-2 ml-3 border-top">
        <?php the_content(); ?>
      </div>
    </div>
  <?php endwhile;wp_reset_postdata(); ?>
</div>

<h3 class="font-weight-bold mt-4 color-brand ml-lg-2">Otros</h3>
<div class="row">
  <?php
  $args = array(
    'post_type'=>'platos',
    'posts_per_page'=>-1,
    'orderby'=> 'title',
    'order'=>'ASC',
    'category_name'=> 'otros'
  );
  $pizzas = new WP_Query($args);
  while($pizzas->have_posts()): $pizzas->the_post();
  ?>
  <div class="col-sm-6 mb-4">
    <?php the_post_thumbnail( 'especialidades',['class'=>'img-fluid'] ) ?>
    <h4 class="font-weight-bold my-2 pl-3"><?php the_title()?> <span class="float-right color-brand-secondary"><?php the_field('precio') ?></span></h4>
    <div class="py-3 px-2 ml-3 border-top">
      <?php the_content(); ?>
    </div>
  </div>
<?php endwhile;wp_reset_postdata(); ?>
</div>

</div>
<?php get_footer(); ?>
