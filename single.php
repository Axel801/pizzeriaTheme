<?php get_header(); ?>
<?php get_template_part( 'parts/hero') ;?>

<div class="box-top container px-5">
  <?php while (have_posts()) : the_post(); ?>
    <article class="post">
      <header class="clearfix">
        <div class="float-left time mr-3">
          <?php echo the_time('d') ?>
          <span class="d-block text-uppercase"><?php echo the_time('M') ?></span>
        </div>
        <div class="pt-5">
          <p class="text-uppercase"><i class="fas fa-user mr-2"></i><?php the_author(); ?></p>
        </div>
      </header>
      <main class="post-text">
        <?php the_content(); ?>
      </main>
    </article>

  <?php endwhile; ?>
</div>

<?php get_footer(); ?>
