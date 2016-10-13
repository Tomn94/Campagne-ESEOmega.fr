<?php get_header(); ?>

		<!-- Content -->
        <section class="col-md-8 content-container">
          
          <?php if (have_posts()) : ?>

			<h2 class="category-name text-danger"><?php _e( 'Search Results for', 'responsive-deluxe' ); ?> "<?php the_search_query(); ?>"</h2>

            <p class="category-description"><?php _e( 'Search for', 'responsive-deluxe' ); ?> "<?php the_search_query(); ?>"</p>

			<?php get_template_part('loop');  ?>
			
	<?php else : ?>

			<h2 class="category-name text-danger"><?php _e( 'Nothing found', 'responsive-deluxe' ); ?></h2>

	<?php endif; ?>
    
            <div class="text-center"><?php responsive_deluxe_pagination(); ?></div>
        </section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>