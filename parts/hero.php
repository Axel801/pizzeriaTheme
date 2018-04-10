<?php while(have_posts()):the_post(); ?>
  <section class="hero bgimage position-relative d-flex flex-column justify-content-center align-items-center" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)">

    <h1 class="text-white font-weight-bold"><?php is_front_page() ? bloginfo( 'description' ) : the_title(); ?></h1>
    <p class="text-white lead"><?php echo is_front_page() ? get_the_content() :  ''; ?></p>
    <?php $url = get_page_by_title('Sobre Nosotros'); ?>
    <?php if(is_front_page()): ?>
      <a class="btn btn-lg btn-brand-secondary text-white mt-2" href="<?php echo get_permalink($url->ID); ?>">Leer más</a>
    <?php endif; ?>
  </section>
<?php endwhile; ?>
