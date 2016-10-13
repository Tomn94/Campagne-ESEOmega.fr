<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 		
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
    <?php wp_head(); ?>
  </head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<?php do_action( 'almasi_before_top_nav' );

get_template_part( 'nav-top' );

do_action( 'almasi_after_top_nav' ); ?>
<div class="clearfix"></div>

<?php if ( get_theme_mod( 'almasi_featured_section_visibility' ) != 0 ) {
if ( get_theme_mod( 'almasi_featured_layout' ) != 0 ) : ?>
<div class="container">
<?php
	if ( is_front_page() && almasi_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>
<?php do_action( 'almasi_before_secondary' ); ?>
<?php if ( has_nav_menu( 'secondary' ) ) : // Check if there's a menu assigned to the 'social' location. ?>
   <div class="clearfix"></div>
   <?php get_template_part( 'nav-sec' ); 
endif; // End check for menu. ?>
<?php do_action( 'almasi_after_secondary' ); ?>
</div>
<?php else : 
	if ( is_front_page() && almasi_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
do_action( 'almasi_before_secondary' );	
if ( has_nav_menu( 'secondary' ) ) : // Check if there's a menu assigned to the 'social' location. ?>
   <div class="clearfix"></div>
   <?php get_template_part( 'nav-sec' ); 
endif; // End check for menu.
do_action( 'almasi_after_secondary' );
endif; } else {
do_action( 'almasi_before_secondary' );
if ( has_nav_menu( 'secondary' ) ) : // Check if there's a menu assigned to the 'social' location. ?>
   <div class="clearfix"></div>
   <?php get_template_part( 'nav-sec' ); 
endif; // End check for menu.
do_action( 'almasi_after_secondary' );
} ?>


<div class="container">
<div id="showcase">
	<?php do_action( 'almasi_before_in_showcase' ); ?>
    <?php if ( is_front_page() ) : ?>
        <?php get_sidebar( 'showcase' ); ?>
	<?php endif; ?>
	<?php do_action( 'almasi_after_in_showcase' ); ?>
</div>
<div class="clearfix"></div>