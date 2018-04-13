<?php get_header(); ?>
<?php get_template_part( 'parts/hero') ;?>

<?php while (have_posts()) : the_post(); ?>


	<div class="container box-top">
		<div class="text-center post-text">

			<?php the_content() ?>

		</div>
	</div>



<?php endwhile; ?>



<?php get_footer(); ?>
