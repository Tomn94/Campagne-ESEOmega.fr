<?php get_header(); ?>

		<!-- Content -->
        <section class="col-md-8 content-container">
          
          <?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h2 class="category-name text-danger"><?php _e( 'Category', 'responsive-deluxe' ); ?>: <?php single_cat_title(); ?></h2>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h2 class="category-name text-danger"><?php _e( 'Posts Tagged', 'responsive-deluxe' ); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h2 class="category-name text-danger"><?php _e( 'Archive for', 'responsive-deluxe' ); ?> <?php the_time('F jS, Y'); ?></h2>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h2 class="category-name text-danger"><?php _e( 'Archive for', 'responsive-deluxe' ); ?> <?php the_time('F, Y'); ?></h2>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h2 class="category-name text-danger"><?php _e( 'Archive for', 'responsive-deluxe' ); ?> <?php the_time('Y'); ?></h2>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h2 class="category-name text-danger"><?php _e( 'Author Archive', 'responsive-deluxe' ); ?></h2>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2 class="category-name text-danger"><?php _e( 'Blog Archives', 'responsive-deluxe' ); ?></h2>
			
			<?php } ?>
			<?php 
			$description = category_description();
			if ( $description != '' ) { ?>
            	<p class="category-description"><?php echo substr($description, 3, strlen($description)-8); ?></p>
			<?php } ?>
            
			<?php get_template_part('loop');  ?>
			
	<?php else : ?>

		<h2><?php _e( 'Nothing found', 'responsive-deluxe' ); ?></h2>

	<?php endif; ?>
    
            <div class="text-center"><?php responsive_deluxe_pagination(); ?></div>
        </section>
		

<?php get_sidebar(); ?>

<?php get_footer(); ?>