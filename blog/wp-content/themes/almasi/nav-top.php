<?php  if ( has_nav_menu( 'primary' ) ) : // Check if there's a menu assigned to the 'social' location. ?>
<div class="navbar navbar-inverse navbar-static-top">
       <div class="navbar-inner">
        <div class="container">
            
			<!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
			<!-- Our menu needs to go here -->
			<?php wp_nav_menu( array(
	           'theme_location'	 => 'primary',
			   'container_class' => 'nav-collapse top-collapse',
	           'menu_class'		 =>	'nav',
	           'depth'			 =>	0,
	           'fallback_cb'	 =>	false,
	           'walker'			 =>	new Almasi_Nav_Walker,
	           )); 
            ?>
        </div>
		</div><!-- /.navbar-inner -->
	</div><!-- /.navbar -->
	<?php  endif; // End check for menu.
	if ( get_header_image() ) : ?>

	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>
	</div>
	
<?php endif; ?>

<div class="navbar navbar-static-top">
    <div class="navbar-inner top-menu">
        <div class="container">
            <a class="brand" href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><span><?php bloginfo( 'name' ); ?></span></a>

			<!-- Our menu needs to go here -->
			<?php wp_nav_menu( array(
	           'theme_location'	 => 'social',
			   'container'       => 'div',
			   'container_id'    => 'almasi-social',
			   'container_class' => 'menu',
	           'menu_class'		 =>	'nav pull-right',
	           'depth'			 =>	1,
			   'link_before'     => '<span class="screen-reader-text">',
			   'link_after'      => '</span>',
	           'fallback_cb'	 =>	false,
	           )); 
            ?>
				
        </div>
	</div><!-- /.navbar-inner -->
</div><!-- /.navbar -->