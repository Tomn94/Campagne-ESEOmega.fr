<?php
/*
Plugin Name: RSS Image Feed 
Plugin URI: http://wasistlos.waldemarstoffel.com/plugins-fur-wordpress/image-feed
Description: RSS Image Feed is not literally producing a feed of images but it adds the first image of the post to the normal feeds of your blog. Those images display even if you have the summary in the feed and not the content.
Version: 4.1.1
Author: Waldemar Stoffel
Author URI: http://www.waldemarstoffel.com
License: GPL3
Text Domain: rss-image-feed
*/

/*  Copyright 2011 - 2015 Waldemar Stoffel  (email : stoffel@atelier-fuenf.de)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/


/* Stop direct call */

defined('ABSPATH') OR exit;

if (!defined('RIF_PATH')) define( 'RIF_PATH', plugin_dir_path(__FILE__) );
if (!defined('RIF_BASE')) define( 'RIF_BASE', plugin_basename(__FILE__) );


# loading the framework
if (!class_exists('A5_Excerpt')) require_once RIF_PATH.'class-lib/A5_ExcerptClass.php';
if (!class_exists('A5_Image')) require_once RIF_PATH.'class-lib/A5_ImageClass.php';
if (!class_exists('A5_FormField')) require_once RIF_PATH.'class-lib/A5_FormFieldClass.php';
if (!class_exists('A5_OptionPage')) require_once RIF_PATH.'class-lib/A5_OptionPageClass.php';

#loading plugin specific class
if (!class_exists('RIF_Admin')) require_once RIF_PATH.'class-lib/RIF_AdminClass.php';

class Rss_Image_Feed {
	
	const language_file = 'rss-image-feed', version = '4.1';
	
	private static $options;
	
	function __construct(){
	
		/* hooking into the feed for content and excerpt */
	
		add_filter('the_excerpt_rss', array($this, 'add_image_excerpt'));
		add_filter('the_content_feed', array($this, 'add_image_content'));
		
		//Additional links on the plugin page
		add_filter('plugin_row_meta', array($this, 'register_links'), 10, 2);	
		add_filter('plugin_action_links', array($this, 'register_action_links'), 10, 2);
		
		add_filter('image_size_names_choose', array($this, 'rss_image_to_menu'));
	
		load_plugin_textdomain(self::language_file, false , basename(dirname(__FILE__)).'/languages');
		
		register_activation_hook(  __FILE__, array($this, 'install') );
		register_deactivation_hook(  __FILE__, array($this, 'uninstall') );
		
		if (is_multisite()) :
		
			$plugins = get_site_option('active_sitewide_plugins');
			
			if (isset($plugins[RIF_BASE])) :
		
				self::$options = get_site_option('rss_options');
				
				if (self::version != self::$options['version']) :
				
					self::$options['version'] = self::version;
					
					update_site_option('rss_options', self::$options);
				
				endif;
				
			else :
			
				$plugins = get_option('active_plugins');
				
				if (in_array(RIF_BASE, $plugins)) :
			
					self::$options = get_option('rss_options');
					
					if (self::version != self::$options['version']) :
					
						self::$options['version'] = self::version;
						
						update_option('rss_options', self::$options);
					
					endif;
				
				endif;
				
			endif;
			
		else:
		
			$plugins = get_option('active_plugins');
			
			if (in_array(RIF_BASE, $plugins)) :
			
				self::$options = get_option('rss_options');
				
				if (self::version != self::$options['version']) :
					
					self::$options['version'] = self::version;
					
					update_option('rss_options', self::$options);
				
				endif;
				
			endif;
		
		endif;
		
		add_image_size('rss-image', self::$options['image_size'], self::$options['image_size']);
		
		$RIF_Admin = new RIF_Admin(self::$options['sitewide']);
		
	}
	
	function register_links($links, $file) {
		
		if ($file == RIF_BASE) :
		
			$links[] = '<a href="http://wordpress.org/extend/plugins/rss-image-feed/faq/" target="_blank">'.__('FAQ', self::language_file).'</a>';
			$links[] = '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LLUFQDHG33XCE" target="_blank">'.__('Donate', self::language_file).'</a>';
		
		endif;
		
		return $links;
	
	}
	
	function register_action_links($links, $file) {
		
		if ($file == RIF_BASE) array_unshift($links, '<a href="'.admin_url('plugins.php?page=rss-image-feed').'">'.__('Settings', self::language_file).'</a>');
	
		return $links;
	
	}
	
	function rss_image_to_menu($sizes) {
		
		return array_merge($sizes, array('rss-image' => __('RSS Image', self::language_file)));
	
	}
	
	// Setting some default values
	
	function install() {
		
		$screen = get_current_screen();
		
		$defaults = array(
			'image_size' => 200,
			'force_excerpt' => false,
			'excerpt_size' => 3,
			'version' => self::version,
			'sitewide' => false,
			'cache' => array(), 
			'image_number' => false
		);
		
		if (is_multisite() && $screen->is_network) :
		
			$defaults['sitewide'] = true; 
		
			add_site_option('rss_options', $defaults);
		
		else : 
		
			add_option('rss_options', $defaults);
		
		endif;
		
	}
	
	// Deleting the option
	
	function uninstall() {
		
		$screen = get_current_screen();
		
		if (is_multisite() && $screen->is_network) :
		
			delete_site_option('rss_options');
		
		else :
		
			delete_option('rss_options');
		
		endif;
		
	}
	
	function add_image_excerpt($output){
		
		if (!is_feed()) return $output;
		
		if (true === self::$options['force_excerpt']) :
		
			$args = array(
				'content' => $output,
				'count' => self::$options['excerpt_size']
			); 
		
			$output = A5_Excerpt::text($args);
		
		endif;
		
		$output = $this->get_feed_image().$output;
		
		return $output;
	
	}
	
	function add_image_content($content){
		
		if (!is_feed()) return $content;
		
		$args = array(
			'content' => $content,
			'count' => 9999,
			'shortcode' => true,
			'format' => true,
			'links' => true
		);
		
		$imagetag = $this->get_feed_image();
		
		if (true === self::$options['force_excerpt']) $args['count'] = self::$options['excerpt_size'];
		
		$content = A5_Excerpt::text($args);
			
		return $imagetag.$content;
	
	}
	
	// extracting the first image of the post
	
	function get_feed_image() {
		
		$id = get_the_ID();
		
		$img_container = '';
		
		$rif_tags = A5_Image::tags(self::language_file);
		
		$rif_image_alt = $rif_tags['image_alt'];
		$rif_image_title = $rif_tags['image_title'];
		$rif_title_tag = $rif_tags['title_tag'];
		
		$args = array (
			'id' => $id,
			'option' => 'rss_options',
			'image_size' => 'rss-image',
			'multisite' => self::$options['sitewide']
		);
		
		if (self::$options['image_number']) $args['number'] = self::$options['image_number'];
		
		$rif_image_info = A5_Image::thumbnail($args);
		
		if ($rif_image_info) :
		
			$rif_thumb = $rif_image_info[0];
			
			$rif_width = $rif_image_info[1];
		
			$rif_height = ($rif_image_info[2]) ? ' height="'.$rif_image_info[2].'"' :'';
		
			$eol = "\r\n";
			$tab = "\t";
		
			$rif_img_tag = '<a href="'.get_permalink().'"><img title="'.$rif_image_title.'" src="'.$rif_thumb.'" alt="'.$rif_image_alt.'" width="'.$rif_width.'"'.$rif_height.' /></a>';
			
			$img_container=$eol.$tab.'<div>'.$eol.$tab.$rif_img_tag.$eol.$tab.'</div>'.$eol.$tab;
			
		endif;
		
		return $img_container;
		
	}
	
}

$Rss_Image_Feed = new Rss_Image_Feed;

?>