<?php

// Theme Setup
function responsive_deluxe_setup() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 765, 400, true );
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );
    load_theme_textdomain( 'responsive-deluxe', get_template_directory() . '/languages' );
    register_nav_menus( array( 'primary' => 'Primary Menu' ) );
}
add_action( 'after_setup_theme', 'responsive_deluxe_setup' );

// Load scripts and styles
function responsive_deluxe_load_styles() {
    wp_enqueue_style( 'lato', '//fonts.googleapis.com/css?family=Lato:400,700,400italic' );
    wp_enqueue_style( 'slabo', '//fonts.googleapis.com/css?family=Slabo+27px' );
    wp_enqueue_style( 'fa', get_template_directory_uri() .  '/css/font-awesome.css' );
    wp_enqueue_style( 'rd-style', get_stylesheet_uri() );
    wp_enqueue_style( 'css-style', get_template_directory_uri() .  '/css/style.css' );
    wp_enqueue_style( 'css-custom', get_template_directory_uri() .  '/css/custom.css' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() .  '/js/bootstrap.js', array( 'jquery' ) );
    wp_enqueue_script( 'js-custom', get_template_directory_uri() .  '/js/custom.js' );
}
add_action( 'wp_enqueue_scripts', 'responsive_deluxe_load_styles' );

if ( ! isset( $content_width ) ) $content_width = 765;

// Declare sidebar widget zone
function responsive_deluxe_widgets(){
    register_sidebar(array(
        'name' => __( 'Sidebar Widgets', 'responsive-deluxe' ),
        'id' => 'sidebar-widgets',
        'description' => __( 'These are widgets for the sidebar.', 'responsive-deluxe' ),
        'before_widget' => '<div id="%1$s" class="card widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
    register_sidebar(array(
        'name' => __( 'Footer Widgets', 'responsive-deluxe' ),
        'id' => 'footer-widgets',
        'description' => __( 'These are widgets for the footer.', 'responsive-deluxe' ),
        'before_widget' => '<div id="%1$s" class="col-md-4 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}
add_action( 'widgets_init', 'responsive_deluxe_widgets' );

function responsive_deluxe_pagination() {
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links(array(
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_next' => false,
        'type' => 'array',
        'prev_next' => TRUE,
        'prev_text' => '&larr; ' . __( 'Previous', 'responsive-deluxe' ),
        'next_text' => __( 'Next', 'responsive-deluxe' ) . ' &rarr;',
            ));
    if (is_array($pages)) {
        $current_page = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<ul class="pagination">';
        foreach ($pages as $i => $page) {
            //$page = str_replace($big, '%#%', esc_url(get_pagenum_link($big)))
            if ($current_page == 1 && $i == 0) {
                echo "<li class='active'>$page</li>";
            } else {
                if ($current_page != 1 && $current_page == $i) {
                    echo "<li class='active'>$page</li>";
                } else {
                    echo "<li>$page</li>";
                }
            }
        }
        echo '</ul>';
    }
}

function responsive_deluxe_custom_comments($comment, $args, $depth) {
    $isByAuthor = false;

    if ($comment->comment_author_email == get_the_author_meta('email')) {
        $isByAuthor = true;
    }

    $GLOBALS['comment'] = $comment;
    ?>

    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="media<?php if ($isByAuthor) {' author'; } ?>">
            <div class="media-left comment-author vcard">
    		<?php echo get_avatar($comment->comment_author_email, 64); ?>
            </div>

            <div class="media-body">
    			<?php if ($comment->comment_approved == '0') : ?>
                    <em><?php _e('Your comment is awaiting moderation.', 'responsive-deluxe') ?></em>
                    <br />
                <?php endif; ?>

                <cite class="comment-name"><?php comment_author(); ?></cite> <?php edit_comment_link(__('(Edit)', 'responsive-deluxe'), '  ', '') ?><br />
    			<div class="text-muted"><span class="fa fa-clock-o"></span>&nbsp; <?php comment_date(); ?></div>
                
				<?php comment_text() ?>

                <div class="reply">
    				<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>

            </div>
        </div>
    <?php
}

// Theme Options
include get_template_directory() . '/inc/theme-options.php';

// Social Widget
include get_template_directory() . '/inc/deluxe-social.php';

?>