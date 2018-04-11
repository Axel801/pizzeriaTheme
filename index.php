<?php get_header(); ?>
<?php
$page_blog = get_option('page_for_posts');
$image = get_post_thumbnail_id( $page_blog );
$image = wp_get_attachment_image_src( $image, 'full' );
?>
<section class="hero bgimage position-relative d-flex flex-column justify-content-center align-items-center" style="background-image:url(<?php echo $image[0] ?>)">
  <h1 class="text-white font-weight-bold"><?php echo get_the_title($page_blog); ?></h1>
</section>

<div class="container box-top">
  <div class="row pt-5">
    <div class="col-lg-8">
      <?php while(have_posts()):the_post(); ?>
        <article class="post mb-5">
          <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail( 'especialidades', array('class'=>'img-fluid')) ?>
          </a>
          <header class="my-4 ">
            <div class="float-left time mr-3">

              <?php echo the_time('d') ?>
              <span class="d-block text-uppercase"><?php echo the_time('M') ?></span>

            </div>
            <div class="">
              <h2><?php the_title(); ?></h2>
              <p class="text-uppercase"><i class="fas fa-user mr-2"></i><?php the_author(); ?></p>
            </div>
          </header>
          <section>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink() ?>" class="btn btn-lg btn-brand-primary px-5">Leer Más</a>
          </section>

        </article>

      <?php endwhile; ?>

    </div>

    <?php get_sidebar(); ?>

  </div>


</div>
<?php get_footer(); ?>
