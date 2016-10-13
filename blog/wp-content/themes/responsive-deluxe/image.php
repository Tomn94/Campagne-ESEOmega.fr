<?php get_header(); ?>

		<!-- Content -->
        <section class="col-md-12 content-container">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
        <article <?php post_class( 'card' ) ?> id="post-<?php the_ID(); ?>">

			<h2><?php the_title(); ?></h2>
			
            <div class="entry">
            <?php $full_size = wp_get_attachment_image_src( get_the_ID(), 'full' ); ?>
            <a href="<?php echo $full_size[0]; ?>" class="colorbox">
            <?php echo wp_get_attachment_image( get_the_ID(), 'large' ); ?>
            </a>
            </div>
            <hr>
            <?php comments_template(); ?>
		</article>

        <?php endwhile; endif; ?>
        </section>

<?php get_footer(); ?>