<?php
/**
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Almasi
 */

get_header(); ?>

<div class="container">
	<div class="row" role="main">
        <div class="span12">
	    <?php do_action( 'almasi_before_forums' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
        <?php do_action( 'almasi_after_forums' ); ?>
		</div>
	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
