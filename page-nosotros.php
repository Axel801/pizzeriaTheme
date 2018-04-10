<?php
/*
* Template Name: About Us
*/
?>
<?php get_header(); ?>
<?php get_template_part( 'parts/hero') ;?>

<div class="container box-top">

  <div class="my-3 mx-4  content-page">
    <?php while (have_posts()) : the_post(); ?>

      <?php the_content(); ?>
      <div class="row about-us-boxes">
        <?php
        $idImage = get_field('image_1');
        $image = wp_get_attachment_image_src( $idImage, 'nosotros' );
        ?>
        <div class="px-0 py-0 col-12 col-md-6 col-lg-4 order-1">
          <img src="<?php echo $image[0] ?>" class="img-fluid w-100" alt="">
        </div>
        <div class="col-12 col-md-6 col-lg-4 order-2  d-flex align-items-center text-center text-white py-5 py-md-0">
          <?php the_field('text_1'); ?>
        </div>




        <?php
        $idImage = get_field('image_2');
        $image = wp_get_attachment_image_src( $idImage, 'nosotros' );
        ?>
        <div class="px-0 py-0 col-12 col-md-6 col-lg-4 order-3 order-md-4 order-lg-3">
          <img src="<?php echo $image[0] ?>" class="img-fluid w-100" alt="">
        </div>

        <div class="col-12 col-md-6 col-lg-4 order-4 order-md-3 order-lg-4 d-flex align-items-center text-center text-white py-5 py-md-0">
          <?php the_field('text_2'); ?>
        </div>






        <?php
        $idImage = get_field('image_3');
        $image = wp_get_attachment_image_src( $idImage, 'nosotros' );
        ?>
        <div class="px-0 py-0 col-12 col-md-6 col-lg-4 order-5">
          <img src="<?php echo $image[0] ?>" class="img-fluid w-100" alt="">
        </div>

        <div class="col-12 col-md-6 col-lg-4 order-6 d-flex align-items-center text-center text-white py-5 py-md-0">
          <?php the_field('text_3'); ?>
        </div>

      </div>
    <?php endwhile; ?>
  </div>

</div>




<?php get_footer(); ?>
