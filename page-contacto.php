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
        <h3 class="color-brand">Realiza tu reserva</h3>
        <?php get_template_part( 'parts/form-reserva') ;?>
      </div>

    </div>
  </div>



<?php endwhile; ?>



<?php get_footer(); ?>
