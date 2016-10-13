<?php
/**
 * almasi Theme Customizer
 *
 * @package almasi
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function almasi_customize_register( $wp_customize ) {
	
	// Add custom description to Colors and Background sections.
	$wp_customize->get_section( 'colors' )->description           = __( 'Background may only be visible on wide screens.', 'almasi' );
	$wp_customize->get_section( 'background_image' )->description = __( 'Background may only be visible on wide screens.', 'almasi' );
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			
	// Rename the label to "Site Title Color" because this only affects the site title in this theme.
	$wp_customize->get_control( 'header_textcolor' )->label = __( 'Site Title Color', 'almasi' );

	// Rename the label to "Display Site Title & Tagline" in order to make this option extra clear.
	$wp_customize->get_control( 'display_header_text' )->label = __( 'Display Site Title &amp; Tagline', 'almasi' );

	// Setting group for social icons
   $wp_customize->add_section( 'almasi_theme_notes' , array(
		'title'      => __('Almasi Theme Notes','almasi'),
		'description' => sprintf( __( 'Welcome & thank you for choosing Almasi as your site theme. In this section you\'ll find some helpful hints and tips to help you configure your site quickly and easily.
		<br/><br/> <b>Social Icons</b> are configurable via a custom menu. To set up your social profile visit the Appearance >><a href="%1$s"> Menu section</a>, enter your profile urls and add them to the "Social" Menu Location.
		<br/><br/><a href="%2$s" target="_blank" />View Theme Demo</a> | <a href="%3$s" target="_blank" />Get Theme Support</a> ', 'almasi' ), admin_url( '/nav-menus.php' ), esc_url('http://www.wpstrapcode.com/almasi/'), esc_url('http://wordpress.org/support/theme/almasi') ),
		'priority'   => 30,
   ) );
	
	$wp_customize->add_section( 'almasi_general_options' , array(
       'title'      => __('Almasi General Options','almasi'),
	   'description' => sprintf( __( 'Use the following settings to set Sitewide General options.', 'almasi' )),
       'priority'   => 31,
    ) );
	
	// Add the featured content section in case it's not already there.
	$wp_customize->add_section( 'featured_content', array(
		'title'       => __( 'Almasi Featured Content', 'almasi' ),
		'description' => sprintf( __( 'Use a <a href="%1$s">tag</a> to feature your posts. If no posts match the tag, <a href="%2$s">sticky posts</a> will be displayed instead.<br/><br/>You may have to refresh the screen for some of the changes to take effect within the Customizer view!', 'almasi' ), admin_url( '/edit.php?tag=featured' ), admin_url( '/edit.php?show_sticky=1' ) ),
		'priority'    => 32,
	) );
	   
    $wp_customize->add_section( 'almasi_fitvids_options' , array(
       'title'      => __('Almasi FitVids Options','almasi'),
	   'description' => sprintf( __( 'Use the following settings to set fitvids script options. Options are: Enable script, Set selector (Default is .post) and set custom selector (optional) for other areas like .sidebar or a custom section!', 'almasi' )),
       'priority'   => 33,
    ) );
	
	// Begin General Options Section
	$wp_customize->add_setting(
        'almasi_feed_excerpt_length', array(
		'sanitize_callback' => 'almasi_sanitize_integer',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
    'almasi_feed_excerpt_length',
    array(
        'type' => 'text',
		'default' => '85',
        'label' => __('Blog Feed Excerpt Length', 'almasi'),
        'section' => 'almasi_general_options',
		'priority' => 1,
        )
    );
	
	$wp_customize->add_setting(
        'almasi_recentpost_excerpt_length', array(
		'sanitize_callback' => 'almasi_sanitize_integer',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
    'almasi_recentpost_excerpt_length',
    array(
        'type' => 'text',
		'default' => '25',
        'label' => __('Recent Post Widget Excerpt Length', 'almasi'),
        'section' => 'almasi_general_options',
		'priority' => 2,
        )
    );
	
	
	// Add the featured content layout setting and control.
	$wp_customize->add_setting(
        'almasi_featured_section_visibility', array (
		'sanitize_callback' => 'almasi_sanitize_checkbox',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'almasi_featured_section_visibility',
    array(
        'type' => 'checkbox',
        'label' => __('Enable Featured Content Section?', 'almasi'),
        'section' => 'featured_content',
		'priority' => 1,
        )
    );
	
	$wp_customize->add_setting(
        'almasi_featured_layout', array (
		'sanitize_callback' => 'almasi_sanitize_checkbox',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'almasi_featured_layout',
    array(
        'type' => 'checkbox',
        'label' => __('Switch Featured Section To Boxed View?', 'almasi'),
        'section' => 'featured_content',
		'priority' => 2,
        )
    );
	
	$wp_customize->add_setting( 'featured_content_layout', array(
		'default'           => 'slider',
		'sanitize_callback' => 'almasi_sanitize_layout',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'featured_content_layout', array(
		'label'   => __( 'Layout', 'almasi' ),
		'section' => 'featured_content',
		'priority' => 3,
		'type'    => 'select',
		'choices' => array(
			'slider' => __( 'Slider', 'almasi' ),
			'grid'   => __( 'Grid',   'almasi' ),
		),
	) );
		
    $wp_customize->add_setting( 'num_posts_slider', array( 
	    'default' => 4,
        'sanitize_callback' => 'almasi_sanitize_integer',
		'capability' => 'edit_theme_options',		
	) );
	
	$wp_customize->add_control( 'num_posts_slider', array(
        'label' => __( 'Number of posts for slider', 'almasi'),
        'section' => 'featured_content',
		'priority' => 4,
        'settings' => 'num_posts_slider',
    ) );
	
	$wp_customize->add_setting( 'num_posts_grid', array( 
	    'default' => 4,
        'sanitize_callback' => 'almasi_sanitize_integer',
		'capability' => 'edit_theme_options',		
	) );
	
	$wp_customize->add_control( 'num_posts_grid', array(
        'label' => __( 'Number of posts for grid - multiple of 4 i.e 4, 8, 12', 'almasi'),
        'section' => 'featured_content',
		'priority' => 5,
        'settings' => 'num_posts_grid',
    ) );
	
	if ( get_theme_mod( 'almasi_featured_section_visibility' ) != 0 ) {
	$wp_customize->add_setting(
        'almasi_featured_visibility', array (
		'sanitize_callback' => 'almasi_sanitize_checkbox',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'almasi_featured_visibility',
    array(
        'type' => 'checkbox',
        'label' => __('Show Featured Posts In Blog Feed?', 'almasi'),
        'section' => 'featured_content',
		'priority' => 25,
        )
    );
	}
		
	// Begin Slider Options
	$wp_customize->add_setting(
        'almasi_enable_autoslide', array (
		'sanitize_callback' => 'almasi_sanitize_checkbox',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'almasi_enable_autoslide',
    array(
        'type'     => 'checkbox',
        'label'    => __('Set Slider to Auto Slide', 'almasi'),
        'section'  => 'featured_content',
		'priority' => 26,
        )
    );
	
	$wp_customize->add_setting( 'almasi_slider_transition', array(
		'default' => 'fade',
		'sanitize_callback' => 'almasi_sanitize_slider_transition',
		'capability' => 'edit_theme_options',
	) );

	
	$wp_customize->add_control( 'almasi_slider_transition', array(
    'label'   => __( 'Set Slider Transition', 'almasi' ),
    'section' => 'featured_content',
	'priority' => 27,
    'type'    => 'radio',
        'choices' => array(
            'fade' => __( 'Fade', 'almasi' ),
        	'slide' => __( 'Slide', 'almasi' ),
		),
    ));
	
	$wp_customize->add_setting(
        'almasi_slider_height',
    array(
        'default' => 450,
		'sanitize_callback' => 'almasi_sanitize_integer',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'almasi_slider_height',
    array(
        'label' => __('Set Slider max-height (numbers only!) - Default is 500!','almasi'),
        'section' => 'featured_content',
		'priority' => 28,
        'type' => 'text',
    ));
		
	// Add FitVids to site
    $wp_customize->add_setting(
        'almasi_fitvids_enable', array (
		'sanitize_callback' => 'almasi_sanitize_checkbox',
		'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'almasi_fitvids_enable',
    array(
        'type'     => 'checkbox',
        'label'    => __('Enable FitVids?', 'almasi'),
        'section'  => 'almasi_fitvids_options',
		'priority' => 1,
        )
    );
	
	$wp_customize->add_setting(
    'almasi_fitvids_selector',
    array(
        'default' => '.post',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
    'almasi_fitvids_selector',
    array(
        'label' => __('Enter a selector for FitVids - i.e. .post','almasi'),
        'section' => 'almasi_fitvids_options',
		'priority' => 2,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'almasi_fitvids_custom_selector',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
    'almasi_fitvids_custom_selector',
    array(
        'label' => __('Enter a custom selector for FitVids - i.e. .sidebar','almasi'),
        'section' => 'almasi_fitvids_options',
		'priority' => 3,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
        'almasi_theme_notice', array(
		'sanitize_callback' => 'sanitize_text_field' //Note: Since WordPress 4.0, input type 'hidden' is supported implicitly as variations of the 'text' input type hence the sanitization callback used!
	));
	
	$wp_customize->add_control(
    'almasi_theme_notice',
    array(
        'section' => 'almasi_theme_notes',
		'type'  => 'read-only',
    ));
}
add_action( 'customize_register', 'almasi_customize_register' );

/**
 * Sanitize the Featured Content layout value.
 *
 * @since Almasi 1.0
 *
 * @param string $layout Layout type.
 * @return string Filtered layout type (grid|slider).
 */
function almasi_sanitize_layout( $layout ) {
	if ( ! in_array( $layout, array( 'slider', 'grid' ) ) ) {
		$layout = 'slider';
	}

	return $layout;
}

/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'almasi_sanitize_checkbox' ) ) :
	function almasi_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return 0;
		}
	}
endif;

/**
 * Sanitize dial select
 */
 if ( ! function_exists( 'almasi_sanitize_slider_transition' ) ) :
function almasi_sanitize_slider_transition( $transition ) {
	if ( ! in_array( $transition, array( 'slide', 'fade' ) ) ) {
		$transition = 'slide';
	}
	return $transition;
}
endif;

/**
 * Sanitize the Integer Input values.
 *
 * @since Almasi 1.0.1
 *
 * @param string $input Integer type.
 */
function almasi_sanitize_integer( $input ) {
	return absint( $input );
}

if ( get_theme_mod( 'almasi_slider_height' ) ) {
function almasi_slider_scripts() {
 
$overall_slider_height = esc_html( get_theme_mod( 'almasi_slider_height' ));
?>
    <style>
		.slider .featured-content .hentry {
			max-height: <?php echo $overall_slider_height; ?>px;
        }
	</style>
<?php }

add_action( 'wp_head', 'almasi_slider_scripts', 210 );
}

//dequeue/enqueue scripts
function almasi_featured_content_scripts() {
$almasi_theme = wp_get_theme();
$version = $almasi_theme->get( 'Version' );
if ( get_theme_mod( 'almasi_enable_autoslide' ) != 0 &&  get_theme_mod( 'featured_content_layout' ) == 'slider' ) {

if ( is_front_page() ) :
    wp_dequeue_script( 'almasi-slider' );

    wp_enqueue_script( 'almasi-flexslider', get_template_directory_uri() . '/js/flexslider/jquery.flexslider-min.js', array( 'jquery', ), $version, true );
    wp_localize_script( 'almasi-flexslider', 'featuredSliderDefaults', array(
        'prevText' => __( 'Previous', 'almasi' ),
        'nextText' => __( 'Next', 'almasi' )
    ) );

if ( get_theme_mod( 'almasi_slider_transition' ) ==  'slide' ) :
    wp_enqueue_script( 'almasi-slider-slide', get_template_directory_uri() . '/js/flexslider/slider-slide.js', array( 'jquery', ), $version, true );

elseif ( get_theme_mod( 'almasi_slider_transition' ) == 'fade' ) :
    wp_enqueue_script( 'almasi-slider-fade', get_template_directory_uri() . '/js/flexslider/slider-fade.js', array( 'jquery', ), $version, true );

endif;

endif;
} elseif ( get_theme_mod( 'featured_content_layout' ) == 'slider' ) {
    wp_enqueue_script( 'almasi-slider-fade', get_template_directory_uri() . '/js/flexslider/slider-default.js', array( 'jquery', ), $version, true );
}
}
add_action( 'wp_enqueue_scripts' , 'almasi_featured_content_scripts' , 210 );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function almasi_customize_preview_js() {
	// Bump this when changes are made to bust cache
    $almasi_theme = wp_get_theme();
    $version = $almasi_theme->get( 'Version' );
	wp_enqueue_script( 'almasi_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), $version, true );
}
add_action( 'customize_preview_init', 'almasi_customize_preview_js' );
