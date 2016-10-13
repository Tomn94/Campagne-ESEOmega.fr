</div>
<?php do_action( 'almasi_before_footer_nav' ); ?>
    <?php if ( has_nav_menu( 'footer' ) ) : // Check if there's a menu assigned to the 'social' location. ?>
        <?php get_template_part( 'nav-footer' ); 
    endif; // End check for menu. ?>
<?php do_action( 'almasi_after_footer_nav' ); ?>
<footer id="colophon" class="site-footer" role="contentinfo">
	<?php do_action( 'almasi_in_before_colophon' ); ?>
	<div class="container">
		<div class="site-info">
			<?php do_action( 'almasi_before_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'almasi' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'almasi' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'almasi' ), '<a href="http://www.wpstrapcode.com/blog/almasi" target="_blank" />Almasi</a>', 'WP Strap Code' ); ?>
		<?php do_action( 'almasi_after_credits' ); ?>
		</div><!-- .site-info -->
	</div>
<?php do_action( 'almasi_in_after_colophon' ); ?>
</footer><!-- #colophon -->
</div><!-- #page -->
<?php do_action( 'almasi_below_footer' ); ?>	
	<?php wp_footer(); ?>
	</body>
</html>