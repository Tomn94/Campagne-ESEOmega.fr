<?php

get_header(); ?>
<div class="container">
<div class="row" role="main">
	<div class="span8">
	<?php do_action( 'almasi_before_home_content' ); ?>
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
            <?php if ( is_front_page() ) : ?>
			<?php get_template_part( 'content', 'home' ); ?>
			<?php else : ?>
				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>
            <?php endif; ?>
			<?php endwhile; ?>
			<?php do_action( 'almasi_before_home_pagination' ); ?>
			<?php almasi_pagination(); ?>
			<?php do_action( 'almasi_after_home_pagination' ); ?>

		<?php else : ?>
            
			<?php get_template_part( 'no-results', 'index' ); ?>
			
		<?php endif; ?>
    <?php do_action( 'almasi_after_home_content' ); ?>
	</div><!-- #content -->
	
		<div class="span4">
            <?php get_sidebar(); ?>
        </div>
</div>
</div>
<?php get_footer(); ?>