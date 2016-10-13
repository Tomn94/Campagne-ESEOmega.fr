<?php
/**
 * The template for displaying search forms in almasi
 *
 * @package almasi
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'almasi' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search - Type & Hit Enter &hellip;', 'placeholder', 'almasi' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'almasi' ); ?>">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'almasi' ); ?>">
</form>
