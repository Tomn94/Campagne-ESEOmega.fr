<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
        
<header id="main-header">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php
                    $options = get_option( 'deluxe_theme_options' );
                    if( !empty( $options['logo'] ) ) {
                        echo '<a class="navbar-logo" href=" ' . esc_url( home_url( '/' ) ) .  '"><img src="' . esc_url( $options['logo'] ) . '"></a>' ;
                    } else {
                        echo '<a class="navbar-brand" href=" ' . esc_url( home_url( '/' ) ) .  '">' . get_bloginfo('name') . '</a>' ;
                    }
                ?>
            </div>
            
            <?php
            if ( has_nav_menu( 'primary' )) {
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class' => 'nav navbar-nav navbar-right',
                    'container' => 'div',
                    'container_class' => 'navbar-collapse collapse navbar-responsive-collapse'
                ) );
            } else {
                wp_nav_menu( array(
                    'menu_class' => 'nav navbar-nav navbar-right',
                    'container' => 'div',
                    'container_class' => 'navbar-collapse collapse navbar-responsive-collapse'
                ) );
            }
            ?>

        </div>
    </nav>
</header>

<div class="container">

    <div class="row">