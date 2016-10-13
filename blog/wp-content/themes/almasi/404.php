<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package almasi
 */

get_header(); ?>

<div class="container">
	<div class="row" role="main">
    <?php do_action( 'almasi_before_404' ); ?>
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'almasi' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'almasi' ); ?></p>

					<?php get_search_form(); ?>
					<?php do_action( 'almasi_after_404_searchform' ); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<?php if ( almasi_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					<div class="widget widget_categories">
						<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'almasi' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
					<?php endif; ?>
					<?php do_action( 'almasi_after_404_categories' ); ?>

					<?php
					/* translators: %1$s: smiley */
					$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'almasi' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>
					<?php do_action( 'almasi_after_404_archives' ); ?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
					<?php do_action( 'almasi_after_404_tags' ); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
    <?php do_action( 'almasi_after_404' ); ?>
	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>