<?php
/*
* Template Name: Contact
*/
?>
<?php get_header(); ?>
<?php get_template_part( 'parts/hero') ;?>

<?php while (have_posts()) : the_post(); ?>


  <div class="container box-top contact-form">
    <div class="text-center post-text row">
      <div class="col-md-12 col-lg-6 offset-lg-6">
        <?php get_template_part( 'parts/form-reserva') ;?>
      </div>

    </div>
  </div>



<?php endwhile; ?>



<?php get_footer(); ?>
