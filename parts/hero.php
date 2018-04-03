<?php while(have_posts()):the_post(); ?>
  <section class="bgimage position-relative d-flex flex-column justify-content-center align-items-center" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)">
    <div class="z-index-1">
      <h1 class="text-white"><?php bloginfo( 'description' ); ?></h1>
      <?php $url = get_page_by_title('Sobre Nosotros'); ?>
      <a class="btn btn-lg btn-brand-secondary text-white mt-2" href="<?php echo get_permalink($url->ID); ?>">Leer más</a>
    </div>
  </section>
<?php endwhile; ?>
