<?php

/**
 *
 * Class RSS Image Feed Admin
 *
 * @ RSS Image Feed
 *
 * building admin page
 *
 */
class RIF_Admin extends A5_OptionPage {
	
	const language_file = 'rss-image-feed';
	
	static $options;
	
	function __construct($multisite) {
		
		add_action('admin_init', array($this, 'initialize_settings'));
		
		if (WP_DEBUG == true) add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
		
		if ($multisite) :
		
			add_action('network_admin_menu', array($this, 'add_site_admin_menu'));
				
			self::$options = get_site_option('rss_options');
				
		else :
			
			add_action('admin_menu', array($this, 'add_admin_menu'));
		
			self::$options = get_option('rss_options');
				
		endif;
		
	}
	
	/**
	 *
	 * Make debug info collapsable
	 *
	 */
	function enqueue_scripts($hook){
		
		if ($hook != 'plugins_page_rss-image-feed') return;
		
		wp_enqueue_script('dashboard');
		
		if (wp_is_mobile()) wp_enqueue_script('jquery-touch-punch');
		
	}
	
	/**
	 *
	 * Add options-page for single site
	 *
	 */
	function add_admin_menu() {
		
		add_plugins_page('RSS Image Feed', '<img alt="" src="'.plugins_url('rss-image-feed/img/a5-icon-11.png').'"> RSS Image Feed', 'administrator', 'rss-image-feed', array($this, 'build_options_page'));
		
	}
	
	/**
	 *
	 * Add menu page for multisite
	 *
	 */
	function add_site_admin_menu() {
		
		add_menu_page('RSS Image Feed', 'RSS Image Feed', 'administrator', 'rss-image-feed', array($this, 'build_options_page'), plugins_url('rss-image-feed/img/a5-icon-16.png'));
		
	}
	
	/**
	 *
	 * Actually build the option pages
	 *
	 */
	function build_options_page() {
		
		// this is only necessary if the plugin is activated for network
		
		if (@$_GET['action'] == 'update') :
		
			$input = $_POST['rss_options'];
			
			self::$options = $this->validate_options($input);
			
			update_site_option('rss_options', self::$options);
			
			$this->initialize_settings();
		
		endif;
		
		// the main options page begins here
		
		$eol = "\r\n";
		
		parent::open_page('Feed Images', __('http://wasistlos.waldemarstoffel.com/plugins-fur-wordpress/rss-image-feed', self::language_file), 'rss-image-feed', __('Plugin Support', self::language_file));
		
		_e('Define the size of the images and summary in your feed.', self::language_file);
		
		if (is_plugin_active_for_network(RIF_BASE)) settings_errors();
		
		$action = (is_plugin_active_for_network(RIF_BASE)) ? '?page=rss-image-feed&action=update' : 'options.php';
		
		parent::open_form($action);
		
		settings_fields('rss_options');
		do_settings_sections('new_image_settings');
		
		submit_button();
		
		if (WP_DEBUG === true) :
		
			self::open_tab();
			
			self::sortable('deep-down', self::debug_info(self::$options, __('Debug Info', self::language_file)));
		
			self::close_tab();
		
		endif;
		
		parent::close_page();
		
	}
	
	/**
	 *
	 * Initialize the admin screen of the plugin
	 *
	 */
	function initialize_settings() {
		
		register_setting('rss_options', 'rss_options', array($this, 'validate_options'));
		
		add_settings_section('image_rss_settings', __('RSS Settings', self::language_file), array($this, 'display_section'), 'new_image_settings');
		
		add_settings_field('image_size', __('Image Size:', self::language_file), array($this, 'display_imgsize'), 'new_image_settings', 'image_rss_settings');
		
		add_settings_field('image_number', __('Image Number:', self::language_file), array($this, 'display_imgnmbr'), 'new_image_settings', 'image_rss_settings');
		
		add_settings_field('force_excerpt', __('Force Excerpt:', self::language_file), array($this, 'display_force'), 'new_image_settings', 'image_rss_settings');
		
		add_settings_field('excerpt_size', __('Limit Excerpt:', self::language_file), array($this, 'display_excptsize'), 'new_image_settings', 'image_rss_settings');
	
	}
	
	function display_section() {
		
		self::tag_it(__('Change the size of the image and the excerpt here.', self::language_file), 'p');
	
	}
	
	function display_imgsize() {
		
		a5_number_field('image_size', 'rss_options[image_size]', self::$options['image_size'], __('Give here only the longest side of the image. The smaller side will be counted on displaying the image. There will be no cropping.', self::language_file), array('step' => 1));
		
	}
	
	function display_imgnmbr() {
		
		a5_text_field('image_number', 'rss_options[image_number]', self::$options['image_number'], sprintf(__('To use an image of the post instead of the post thumbnail, enter the number of that image. The word %s will bring the last image of the post.', self::language_file), '&#39;last&#39;'));
		
	}
	
	function display_force() {
		
		a5_checkbox('force_excerpt', 'rss_options[force_excerpt]', self::$options['force_excerpt'], __('Click, to limit the post content to a summary if the post doesn&#39;t have an excerpt.', self::language_file));
		
	}
	
	function display_excptsize() {
		
		a5_number_field('excerpt_size', 'rss_options[excerpt_size]', self::$options['excerpt_size'], __('How long should the summary of the article be? Enter the number of sentences here.', self::language_file), array('step' => 1));
		
	}
		
	function validate_options($input) {
		
		$newinput['image_size'] = trim($input['image_size']);
		$newinput['image_number'] = trim($input['image_number']);
		$newinput['force_excerpt'] = (isset($input['force_excerpt'])) ? true : false;
		$newinput['excerpt_size'] = trim($input['excerpt_size']);
		
			if(!is_numeric($newinput['image_size'])) :
			
				add_settings_error('rss_options', 'not-numeric-image-size', __('Please enter a numeric value for the image size.', self::language_file), 'error');
				
				$newinput['image_size'] = 200;
				
			endif;
			
			if(!is_numeric($newinput['excerpt_size'])) :
			
				add_settings_error('rss_options', 'not-numeric-excerpt-size', __('Please enter a numeric value for the excerpt length.', self::language_file), 'error');
				
				$newinput['excerpt_size'] = 3;
				
			endif;
			
			$newinput['excerpt_size'] = intval($newinput['excerpt_size']);
				
			if($newinput['image_size'] > 999) :
			
				add_settings_error('rss_options', 'too-large-image-size', __('Imagesize too large. Please choose a value smaller than 1000.', self::language_file), 'error');
				
				$newinput['image_size'] = 200;
				
			endif;
			
			$newinput['image_size'] = intval($newinput['image_size']);
			
			if ($newinput['image_size'] != self::$options['image_size']) add_image_size( 'rss-image', $newinput['image_size'], $newinput['image_size'] );
			
			if(!empty($newinput['image_number']) && !is_numeric($newinput['image_number'])) :
			
				$newinput['image_number'] = 'last';
				
			endif;
			
		self::$options['image_size'] = $newinput['image_size'];
		self::$options['force_excerpt'] = $newinput['force_excerpt'];
		self::$options['excerpt_size'] = $newinput['excerpt_size'];
		self::$options['image_number'] = $newinput['image_number'];
		
		return self::$options;
		
	}	

} // end of class

?>