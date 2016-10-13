    <div class="navbar navbar-inverse navbar-static-top">
      <div class="navbar-inner">
        <div class="container">
		  <!-- Our menu needs to go here -->
			<?php wp_nav_menu( array(
	           'theme_location'	 => 'footer',
			   'container_class' => 'nav',
	           'menu_class'		 =>	'nav',
	           'depth'			 =>	1,
	           'fallback_cb'	 =>	false,
	           'walker'			 =>	new Almasi_Nav_Walker,
	           )); 
            ?>
        </div>
	  </div><!-- /.navbar-inner -->
	</div><!-- /.navbar -->
