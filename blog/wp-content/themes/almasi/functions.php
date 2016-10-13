<?php
/**
 * almasi functions and definitions
 *
 * @package almasi
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 780; /* pixels */

if ( ! function_exists( 'almasi_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function almasi_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on almasi, use a find and replace
	 * to change 'almasi' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'almasi', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'almasi-full-width', 1380, 770, true );
	add_image_size( 'almasi-page-feature', 1230, 500, true ); //(cropped)
	add_image_size( 'almasi-post-feature', 280, 180, true ); //(cropped)
	add_image_size( 'almasi-post-standard', 940, 500, true ); //(cropped)
	add_image_size( 'almasi-recentpost-thumb', 372, 176, true ); //(cropped)

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'almasi' ),
		'secondary' => __( 'Secondary Menu', 'almasi' ),
		'social' => __( 'Social Menu', 'almasi' ),
		'footer' => __( 'Footer Menu', 'almasi' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
	
	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'almasi_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );
	
	// Add support for featured content.
	$layout = get_theme_mod( 'featured_content_layout' );
    $max_posts = get_theme_mod( 'num_posts_' . $layout, 2 );
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'almasi_get_featured_posts',
		'max_posts' => $max_posts,
	) );

}
endif; // almasi_setup
add_action( 'after_setup_theme', 'almasi_setup' );


/**
 * Getter function for Featured Content Plugin.
 *
 * @since Almasi 1.0
 *
 * @return array An array of WP_Post objects.
 */
function almasi_get_featured_posts() {
	/**
	 * Filter the featured posts to return in Almasi.
	 *
	 * @since Almasi 1.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'almasi_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @since Almasi 1.0
 *
 * @return bool Whether there are featured posts.
 */
function almasi_has_featured_posts() {
	return ! is_paged() && (bool) almasi_get_featured_posts();
}

/**
 * Register widgetized area and update sidebar with default widgets
 */
function almasi_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'Almasi_Ephemera_Widget' );
	register_widget( 'Almasi_RecentPostWidget' );
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'almasi' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Showcase One - Above Content.', 'almasi' ),
		'id' => 'header-showcase1',
		'description' => __( 'One of four above content showcase widget - ideal for use with the Almasi - Alternative Recent Posts widget', 'almasi' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Showcase Two - Above Content.', 'almasi' ),
		'id' => 'header-showcase2',
		'description' => __( 'One of four above content showcase widget - ideal for use with the Almasi - Alternative Recent Posts widget', 'almasi' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Showcase Three - Above Content', 'almasi' ),
		'id' => 'header-showcase3',
		'description' => __( 'One of four above content showcase widget - ideal for use with the Almasi - Alternative Recent Posts widget', 'almasi' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Showcase Four - Above Content.', 'almasi' ),
		'id' => 'header-showcase4',
		'description' => __( 'One of four above content showcase widget - use sparingly.', 'almasi' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'almasi_widgets_init' );

include(get_template_directory() . '/inc/almasi-page-showcase.php');

/**
 * Returns number of widgets in a widget position - used in the Header Showcase widget area.
 *
 * @since Almasi 1.0.0
 */
function almasi_header_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'header-showcase1' ) )
		$count++;

	if ( is_active_sidebar( 'header-showcase2' ) )
		$count++;

	if ( is_active_sidebar( 'header-showcase3' ) )
		$count++;
		
	if ( is_active_sidebar( 'header-showcase4' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
		case '4':
			$class = 'four';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}

// Almasi Custom Excerpt
function almasi_trim_excerpt($almasi_excerpt) {
  $raw_excerpt = $almasi_excerpt;
  if ( '' == $almasi_excerpt ) {
    $almasi_excerpt = get_the_content(''); // Original Content
    $almasi_excerpt = strip_shortcodes($almasi_excerpt); // Minus Shortcodes
    $almasi_excerpt = apply_filters('the_content', $almasi_excerpt); // Filters
    $almasi_excerpt = str_replace(']]>', ']]&gt;', $almasi_excerpt); // Replace
    
	if (get_theme_mod( 'almasi_feed_excerpt_length' )) :
		$feedlimit = get_theme_mod( 'almasi_feed_excerpt_length' );
	else :
		$feedlimit = '85';
	endif;
    $excerpt_length = apply_filters('excerpt_length', $feedlimit); // Length
    $almasi_excerpt = wp_trim_words( $almasi_excerpt, $excerpt_length );
    
    // Use First Video as Excerpt
    $postcustom = get_post_custom_keys();
    if ($postcustom){
      $i = 1;
      foreach ($postcustom as $key){
        if (strpos($key,'oembed')){
          foreach (get_post_custom_values($key) as $video){
            if ($i == 1){
              $almasi_excerpt = $video.$almasi_excerpt;
            }
          $i++;
          }
        }  
      }
    }
  }
  return apply_filters('almasi_trim_excerpt', $almasi_excerpt, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'almasi_trim_excerpt');

// Lets do a separate excerpt length for the alternative recent post widget
function almasi_recentpost_excerpt () {
	$theContent = trim(strip_tags(get_the_content()));
		$output = str_replace( '"', '', $theContent);
		$output = str_replace( '\r\n', ' ', $output);
		$output = str_replace( '\n', ' ', $output);
			if (get_theme_mod( 'almasi_recentpost_excerpt_length' )) :
			$limit = get_theme_mod( 'almasi_recentpost_excerpt_length' );
			else : 
			$limit = '15';
			endif;
			$content = explode(' ', $output, $limit);
			array_pop($content);
		$content = implode(" ",$content)."  ";
	return strip_tags($content, ' ');
}


/**
 * Register Lato Google font for Almasi.
 *
 * @since Almasi 1.0
 *
 * @return string
 */
function almasi_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'PT+Sans|Philosopher font: on or off', 'almasi' ) ) {
		//$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
		$font_url = esc_url(add_query_arg( 'family', urlencode( 'PT+Sans|Philosopher:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" ));
	}

	return $font_url;
}


/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Almasi 1.0
 *
 * @return void
 */
 
function almasi_ie_support_header() {
    echo '<!--[if lt IE 9]>'. "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>'. "\n";
    echo '<![endif]-->'. "\n";
}
add_action( 'wp_head', 'almasi_ie_support_header', 1 );

/**
 * Enqueue scripts and styles
 */
function almasi_scripts() {
	global $wp_styles;
	// Bump this when changes are made to bust cache
    $almasi_theme = wp_get_theme();
    $version = $almasi_theme->get( 'Version' );
	// CSS Scripts
    // Add Lato font, used in the main stylesheet.
	wp_enqueue_style( 'almasi-lato', almasi_font_url(), array(), null );
		
	wp_enqueue_style('almasi-style', get_template_directory_uri().'/css/style.css', false ,$version, 'all' );
	wp_enqueue_style('almasi-bootstrap', get_template_directory_uri().'/css/app.css', false ,$version, 'all' );
    wp_enqueue_style('almasi-responsive', get_template_directory_uri().'/css/app-responsive.css', false ,$version, 'all' );
	wp_enqueue_style('almasi-custom', get_template_directory_uri().'/css/custom.css', false ,$version, 'all' );
	wp_enqueue_style('almasi-theme', get_template_directory_uri().'/css/theme.css', false ,$version, 'all' );
	
	// Load style.css from child theme
    if (is_child_theme()) {
      wp_enqueue_style('almasi_child', get_stylesheet_uri(), false, $version, null);
    }
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    	
	wp_enqueue_script('bootstrap.min.js', get_template_directory_uri().'/js/app.js', array('jquery'),$version, true );
	
	wp_enqueue_script( 'almasi-bootstrapnav', get_template_directory_uri() . '/js/twitter-bootstrap-hover-dropdown.js', array(), $version, true );
    
	wp_enqueue_script('bootstrap.min.js', get_template_directory_uri().'/js/modernizr.custom.79639.js', array('jquery'),$version, false );
	
	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'almasi-ie', get_template_directory_uri() . '/css/ie.css', array( 'almasi-style' ), $version );
	wp_style_add_data( 'almasi-ie', 'conditional', 'lt IE 8' );
	
	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		wp_enqueue_script( 'almasi-slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ), $version, true );
		wp_localize_script( 'almasi-slider', 'featuredSliderDefaults', array(
			'prevText' => __( 'Previous', 'almasi' ),
			'nextText' => __( 'Next', 'almasi' )
		) );
	}
	
	wp_enqueue_script( 'almasi-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), $version, true );
	
}
add_action( 'wp_enqueue_scripts', 'almasi_scripts' );

if ( get_theme_mod( 'almasi_fitvids_enable' ) != 0 ) {

function almasi_fitvids_scripts() {
$version = '1.0.1';
wp_enqueue_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), $version, true );
} // end fitvids_scripts
add_action('wp_enqueue_scripts','almasi_fitvids_scripts', 20);
// selector script
function almasi_fitthem() { ?>
   	<script type="text/javascript">
   	jQuery(document).ready(function() {
   		jQuery('<?php echo get_theme_mod('almasi_fitvids_selector'); ?>').fitVids({ customSelector: '<?php echo stripslashes(get_theme_mod('almasi_fitvids_custom_selector')); ?>'});
   	});
   	</script>
<?php } // End selector script
add_action( 'wp_footer', 'almasi_fitthem', 210 );
}


/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since Almasi 1.0
 *
 * @return void
 */
function almasi_admin_fonts() {
	wp_enqueue_style( 'almasi-lato', almasi_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'almasi_admin_fonts' );


if ( !wp_is_mobile() ) {
  require get_template_directory() . '/inc/nav-menu-walker.php';
  } else {
  require get_template_directory() . '/inc/nav-mobile-walker.php';
}

// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Almasi 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function almasi_post_classes( $classes ) {
	if ( ! post_password_required() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'almasi_post_classes' );

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( get_theme_mod( 'almasi_featured_visibility' ) != 0 ||  get_theme_mod( 'almasi_featured_section_visibility' ) != 1 ) {
	function almasi_remove_pre_get_posts() {
	    remove_action( 'pre_get_posts', array( 'Featured_Content', 'pre_get_posts' ) );
    }
add_action( 'init', 'almasi_remove_pre_get_posts', 31 );
}
 
 
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}
