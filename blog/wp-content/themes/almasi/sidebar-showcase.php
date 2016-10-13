<?php
	/**
	 * The header widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'header-showcase1'  )
		&& ! is_active_sidebar( 'header-showcase2' )
		&& ! is_active_sidebar( 'header-showcase3'  )
		&& ! is_active_sidebar( 'header-showcase4'  )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
<?php do_action( 'almasi_before_showcase' ); ?>
<div id="supplementary" <?php almasi_header_sidebar_class(); ?>>
	<?php if ( is_active_sidebar( 'header-showcase1' ) ) : ?>
	<div id="first" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'header-showcase1' ); ?>
	</div><!-- #first .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'header-showcase2' ) ) : ?>
	<div id="second" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'header-showcase2' ); ?>
	</div><!-- #second .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'header-showcase3' ) ) : ?>
	<div id="third" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'header-showcase3' ); ?>
	</div><!-- #third .widget-area -->
	<?php endif; ?>
	
	<?php if ( is_active_sidebar( 'header-showcase4' ) ) : ?>
	<div id="fourth" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'header-showcase4' ); ?>
	</div><!-- #third .widget-area -->
	<?php endif; ?>
</div><!-- #supplementary -->
<?php do_action( 'almasi_after_showcase' ); ?>