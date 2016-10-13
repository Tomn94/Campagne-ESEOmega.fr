<?php get_header(); ?>

	<!-- Content -->
   <section class="col-md-8 content-container">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<article <?php post_class( 'card' ) ?> id="post-<?php the_ID(); ?>">

			<h2><?php the_title(); ?></h2>

			<div class="entry">

				<?php the_content(); ?>

			</div>
		<hr>
        <?php comments_template(); ?>
		</article>
		
		<?php endwhile; endif; ?>
        
        </section>
        
<?php get_sidebar(); ?>

<?php get_footer(); ?>