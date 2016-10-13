<?php
/**
 * Implement Custom Header functionality for Almasi
 *
 * @package Almasi
 * @since Almasi 1.0
 */

/**
 * Set up the WordPress core custom header settings.
 *
 * @since Almasi 1.0
 *
 * @uses almasi_admin_header_style()
 * @uses almasi_admin_header_image()
 */
function almasi_custom_header_setup() {
	/**
	 * Filter Almasi custom-header support arguments.
	 *
	 * @since Almasi 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type int    $width                  Width in pixels of the custom header image. Default 1260.
	 *     @type int    $height                 Height in pixels of the custom header image. Default 240.
	 *     @type bool   $flex_height            Whether to allow flexible-height header images. Default true.
	 *     @type string $admin_head_callback    Callback function used to style the image displayed in
	 *                                          the Appearance > Header screen.
	 *     @type string $admin_preview_callback Callback function used to create the custom header markup in
	 *                                          the Appearance > Header screen.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'almasi_custom_header_args', array(
		'header-text'            => false,
		'width'                  => 1260,
		'height'                 => 200,
		'flex-height'            => true,
		'admin-preview-callback' => 'almasi_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'almasi_custom_header_setup' );


if ( ! function_exists( 'almasi_admin_header_image' ) ) :
/**
 * Create the custom header image markup displayed on the Appearance > Header screen.
 *
 * @see almasi_custom_header_setup()
 *
 * @since Almasi 1.0
 */
function almasi_admin_header_image() {
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // almasi_admin_header_image
