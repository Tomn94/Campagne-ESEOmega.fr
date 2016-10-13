<?php get_header(); ?>

		<!-- Content -->
        <section class="col-md-8 content-container">
			<?php get_template_part('loop'); ?>
            <div class="text-center"><?php responsive_deluxe_pagination(); ?></div>
        </section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>