<?php
/**
 * Custom Widget for displaying specific post formats
 *
 * Displays posts from Aside, Quote, Video, Audio, Image, Gallery, and Link formats.
 *
 * @link http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 *
 * @subpackage Almasi
 * @since Almasi 1.0
 */

class Almasi_Ephemera_Widget extends WP_Widget {

	/**
	 * The supported post formats.
	 *
	 * @access private
	 * @since Almasi 1.0
	 *
	 * @var array
	 */
	private $formats = array( 'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery' );

	/**
	 * Pluralized post format strings.
	 *
	 * @access private
	 * @since Almasi 1.0
	 *
	 * @var array
	 */
	private $format_strings;

	/**
	 * Constructor.
	 *
	 * @since Almasi 1.0
	 *
	 * @return Almasi_Ephemera_Widget
	 */
	public function __construct() {
		parent::__construct( 'widget_almasi_ephemera', __( 'Almasi Ephemera', 'almasi' ), array(
			'classname'   => 'widget_almasi_ephemera',
			'description' => __( 'Use this widget to list your recent Aside, Quote, Video, Audio, Image, Gallery, and Link posts', 'almasi' ),
		) );

		/*
		 * @todo http://core.trac.wordpress.org/ticket/23257: Add plural versions of Post Format strings
		 */
		$this->format_strings = array(
			'aside'   => __( 'Asides',    'almasi' ),
			'image'   => __( 'Images',    'almasi' ),
			'video'   => __( 'Videos',    'almasi' ),
			'audio'   => __( 'Audio',     'almasi' ),
			'quote'   => __( 'Quotes',    'almasi' ),
			'link'    => __( 'Links',     'almasi' ),
			'gallery' => __( 'Galleries', 'almasi' ),
		);
	}

	/**
	 * Output the HTML for this widget.
	 *
	 * @access public
	 * @since Almasi 1.0
	 *
	 * @param array $args     An array of standard parameters for widgets in this theme.
	 * @param array $instance An array of settings for this widget instance.
	 * @return void Echoes its output.
	 */
	public function widget( $args, $instance ) {
		$format = $instance['format'];
		$number = empty( $instance['number'] ) ? 2 : absint( $instance['number'] );
		$title  = apply_filters( 'widget_title', empty( $instance['title'] ) ? $this->format_strings[ $format ] : $instance['title'], $instance, $this->id_base );

		$ephemera = new WP_Query( array(
			'order'          => 'DESC',
			'posts_per_page' => $number,
			'no_found_rows'  => true,
			'post_status'    => 'publish',
			'post__not_in'   => get_option( 'sticky_posts' ),
			'tax_query'      => array(
				array(
					'taxonomy' => 'post_format',
					'terms'    => array( "post-format-$format" ),
					'field'    => 'slug',
					'operator' => 'IN',
				),
			),
		) );

		if ( $ephemera->have_posts() ) :
			$tmp_content_width  = $GLOBALS['content_width'];
			$GLOBALS['content_width'] = 370;

			echo $args['before_widget'];
			?>
			<h1 class="widget-title <?php echo esc_attr( $format ); ?>">
				<a class="entry-format" href="<?php echo esc_url( get_post_format_link( $format ) ); ?>"><?php echo $title; ?></a>
			</h1>
			<ol>

				<?php while ( $ephemera->have_posts() ) : $ephemera->the_post(); ?>
				<li>
				<article <?php post_class(); ?>>
					<div class="entry-content">
						<?php
							if ( has_post_format( 'gallery' ) ) :

								if ( post_password_required() ) :
									the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'almasi' ) );
								else :
									$images = array();

									$galleries = get_post_galleries( get_the_ID(), false );
									if ( isset( $galleries[0]['ids'] ) )
										$images = explode( ',', $galleries[0]['ids'] );

									if ( ! $images ) :
										$images = get_posts( array(
											'fields'         => 'ids',
											'numberposts'    => -1,
											'order'          => 'ASC',
											'orderby'        => 'menu_order',
											'post_mime_type' => 'image',
											'post_parent'    => get_the_ID(),
											'post_type'      => 'attachment',
										) );
									endif;

									$total_images = count( $images );

									if ( has_post_thumbnail() ) :
										$post_thumbnail = get_the_post_thumbnail();
									elseif ( $total_images > 0 ) :
										$image          = array_shift( $images );
										$post_thumbnail = wp_get_attachment_image( $image, 'post-thumbnail' );
									endif;

									if ( ! empty ( $post_thumbnail ) ) :
						?>
						<a href="<?php the_permalink(); ?>"><?php echo $post_thumbnail; ?></a>
						<?php endif; ?>
						<p class="wp-caption-text">
							<?php
								printf( _n( 'This gallery contains <a href="%1$s" rel="bookmark">%2$s photo</a>.', 'This gallery contains <a href="%1$s" rel="bookmark">%2$s photos</a>.', $total_images, 'almasi' ),
									esc_url( get_permalink() ),
									number_format_i18n( $total_images )
								);
							?>
						</p>
						<?php
								endif;

							else :
								the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'almasi' ) );
							endif;
						?>
					</div><!-- .entry-content -->

					<header class="entry-header">
						<div class="entry-meta">
							<?php
								if ( ! has_post_format( 'link' ) ) :
									the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
								endif;

								printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
									esc_url( get_permalink() ),
									esc_attr( get_the_date( 'c' ) ),
									esc_html( get_the_date() ),
									esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
									get_the_author()
								);

								if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
							?>
							<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'almasi' ), __( '1 Comment', 'almasi' ), __( '% Comments', 'almasi' ) ); ?></span>
							<?php endif; ?>
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->
				</article><!-- #post-## -->
				</li>
				<?php endwhile; ?>

			</ol>
			<a class="post-format-archive-link" href="<?php echo esc_url( get_post_format_link( $format ) ); ?>"><?php printf( __( 'More %s <span class="meta-nav">&rarr;</span>', 'almasi' ), $this->format_strings[ $format ] ); ?></a>
			<?php

			echo $args['after_widget'];

			// Reset the post globals as this query will have stomped on it.
			wp_reset_postdata();

			$GLOBALS['content_width'] = $tmp_content_width;

		endif; // End check for ephemeral posts.
	}

	/**
	 * Deal with the settings when they are saved by the admin.
	 *
	 * Here is where any validation should happen.
	 *
	 * @since Almasi 1.0
	 *
	 * @param array $new_instance New widget instance.
	 * @param array $instance     Original widget instance.
	 * @return array Updated widget instance.
	 */
	function update( $new_instance, $instance ) {
		$instance['title']  = strip_tags( $new_instance['title'] );
		$instance['number'] = empty( $new_instance['number'] ) ? 2 : absint( $new_instance['number'] );
		if ( in_array( $new_instance['format'], $this->formats ) ) {
			$instance['format'] = $new_instance['format'];
		}

		return $instance;
	}

	/**
	 * Display the form for this widget on the Widgets page of the Admin area.
	 *
	 * @since Almasi 1.0
	 *
	 * @param array $instance
	 * @return void
	 */
	function form( $instance ) {
		$title  = empty( $instance['title'] ) ? '' : esc_attr( $instance['title'] );
		$number = empty( $instance['number'] ) ? 2 : absint( $instance['number'] );
		$format = isset( $instance['format'] ) && in_array( $instance['format'], $this->formats ) ? $instance['format'] : 'aside';
		?>
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'almasi' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"></p>

			<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Number of posts to show:', 'almasi' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3"></p>

			<p><label for="<?php echo esc_attr( $this->get_field_id( 'format' ) ); ?>"><?php _e( 'Post format to show:', 'almasi' ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'format' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'format' ) ); ?>">
				<?php foreach ( $this->formats as $slug ) : ?>
				<option value="<?php echo esc_attr( $slug ); ?>"<?php selected( $format, $slug ); ?>><?php echo get_post_format_string( $slug ); ?></option>
				<?php endforeach; ?>
			</select>
		<?php
	}
}

// =============================== Custom Widget for displaying Recent Posts ======================================
class Almasi_RecentPostWidget extends WP_Widget {
    /** constructor */

	function Almasi_RecentPostWidget() {
		$widget_ops = array(
		  'classname' => 'widget_almasi_recent_posts', 
		  'description' => __('Almasi - Recent Posts (Widescope Thumbs). Can be used for the sidebar and as an alternative to the Showcase Widget.','almasi') );
		$this->WP_Widget(
		  'almasi-recent-posts', __('Almasi - Recent Posts','almasi'), $widget_ops);
	}


  /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Almasi Recent Posts','almasi') : $instance['title']);
		$category = apply_filters('widget_category', $instance['category']);
		$showpost = apply_filters('widget_showpost', $instance['showpost']);
		$disabletitle = apply_filters('widget_disabletitle', isset($instance['disabletitle']));
		$disabledate = apply_filters('widget_disabledate', isset($instance['disabledate']));
		$disableexcerpt = apply_filters('widget_disabledate', isset($instance['disableexcerpt']));
		$disablethumb = apply_filters('widget_disablethumb', isset($instance['disablethumb']));
		$disablereadmore = apply_filters('widget_disablereadmore', isset($instance['disablereadmore']));
		$instance['category'] = esc_attr(isset($instance['category'])? $instance['category'] : "");
		global $wp_query;
        ?>
              <?php echo $before_widget; ?>
                  <?php if($disabletitle!="true") {?>
				  <div class="center-float">
				  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?></div>
                  <?php } ?>      
								<?php  if (have_posts()) : ?>
                                
                                <ul class="almasi-recent-post-widget">
									<?php $querycat = get_cat_name($category);?>
                                    <?php 
                                        if($showpost==""){$showpost=1;}
										$temp = $wp_query;
										$wp_query= null;
										$wp_query = new WP_Query();
										$wp_query->query("showposts=".$showpost."&category_name=" . $querycat);
										global $post;
                                    ?>
                                    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                                    <li>
																				
										<?php if($disablethumb!="true") {?>
                                        <a href="<?php the_permalink(); ?>">
										<?php
                                        $custom = get_post_custom($post->ID);
                                        $cf_thumb = (isset($custom["almasi_thumb"][0]))? $custom["almasi_thumb"][0] : "";
                                        
                                        if($cf_thumb!=""){
                                            $thumb = '<img src='. $cf_thumb .' alt="" width="77" height="77" class="frame"/>';
                                        }elseif(has_post_thumbnail($post->ID) ){
                                            $thumb = get_the_post_thumbnail($post->ID, 'almasi-recentpost-thumb', array('class' => 'frame'));
                                        }else{
                                            $thumb ="";
                                        }
                                        echo  $thumb;
                                        ?>
										</a>
										<?php } ?>
										<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                                        <?php if($disabledate!="true") {?>
                                        <span class="smalldate"><?php  the_time('M d, Y') ?></span>
										<?php } ?>
										<?php if($disableexcerpt!="true") {?>
										<p><?php echo almasi_recentpost_excerpt(); ?></p>
										<?php } ?>
										<?php if($disablereadmore!="true") {?>
										<p class="read-more button"><a href="<?php echo esc_url( get_permalink() ) ?>"><?php _e( 'Read The Full Article &raquo;', 'almasi'); ?></a></p>
										<?php } ?>
										<span class="clear"></span>
                                    </li>
                                    <?php endwhile; ?>
                                </ul>
                                
                                <?php $wp_query = null; $wp_query = $temp; wp_reset_postdata();?>
                                
								<?php endif; ?>

								
								
              <?php echo $after_widget; ?>
			 
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
		$instance['title'] = (isset($instance['title']))? $instance['title'] : "";
		$instance['category'] = (isset($instance['category']))? $instance['category'] : "";
		$instance['showpost'] = (isset($instance['showpost']))? $instance['showpost'] : "";
		$instance['disabletitle'] = (isset($instance['disabletitle']))? $instance['disabletitle'] : "";
		$instance['disabledate'] = (isset($instance['disabledate']))? $instance['disabledate'] : "";
		$instance['disableexcerpt'] = (isset($instance['disableexcerpt']))? $instance['disableexcerpt'] : "";
		$instance['disablethumb'] = (isset($instance['disablethumb']))? $instance['disablethumb'] : "";
		$instance['disablereadmore'] = (isset($instance['disablereadmore']))? $instance['disablereadmore'] : "";
					
        $title = esc_attr($instance['title']);
		$category = esc_attr($instance['category']);
		$showpost = esc_attr($instance['showpost']);
		$disabletitle = esc_attr($instance['disabletitle']);
		$disabledate = esc_attr($instance['disabledate']);
		$disableexcerpt = esc_attr($instance['disableexcerpt']);
		$disablethumb = esc_attr($instance['disablethumb']);
		$disablereadmore = esc_attr($instance['disablereadmore']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title:', 'almasi'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			
            <p><label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Select A Category:', 'almasi'); ?><br />
			<?php 
			$args = array(
			'selected'         => $category,
			'echo'             => 1,
			'name'             =>$this->get_field_name('category')
			);
			wp_dropdown_categories( $args );
			?>
			</label></p>
			
            <p><label for="<?php echo $this->get_field_id('showpost'); ?>"><?php _e('Number of Post to show:', 'almasi'); ?> <input class="widefat" id="<?php echo $this->get_field_id('showpost'); ?>" name="<?php echo $this->get_field_name('showpost'); ?>" type="text" value="<?php echo $showpost; ?>" /></label></p>
            
			<p><label for="<?php echo $this->get_field_id('disabletitle'); ?>"><?php _e('Hide Widegt Title:', 'almasi'); ?> 
			
			<?php if($instance['disabletitle']){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                            <input type="checkbox" name="<?php echo $this->get_field_name('disabletitle'); ?>" id="<?php echo $this->get_field_id('disabletitle'); ?>" value="true" <?php echo $checked; ?> />			</label></p>
            
            
            <p><label for="<?php echo $this->get_field_id('disablethumb'); ?>"><?php _e('Hide Thumbnail:', 'almasi'); ?> 
			
			<?php if($instance['disablethumb']){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                            <input type="checkbox" name="<?php echo $this->get_field_name('disablethumb'); ?>" id="<?php echo $this->get_field_id('disablethumb'); ?>" value="true" <?php echo $checked; ?> />			</label></p>
                            
            <p><label for="<?php echo $this->get_field_id('disabledate'); ?>"><?php _e('Hide Post Date:', 'almasi'); ?> 
			
			<?php if($instance['disabledate']){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                            <input type="checkbox" name="<?php echo $this->get_field_name('disabledate'); ?>" id="<?php echo $this->get_field_id('disabledate'); ?>" value="true" <?php echo $checked; ?> />			</label></p>              
            
			<p><label for="<?php echo $this->get_field_id('disableexcerpt'); ?>"><?php _e('Hide the Excerpt:', 'almasi'); ?>
			
			<?php if($instance['disableexcerpt']){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                            <input type="checkbox" name="<?php echo $this->get_field_name('disableexcerpt'); ?>" id="<?php echo $this->get_field_id('disableexcerpt'); ?>" value="true" <?php echo $checked; ?> />			</label></p>
		    
			<p><label for="<?php echo $this->get_field_id('disablereadmore'); ?>"><?php _e('Hide Readmore Button:', 'almasi'); ?>
			
			<?php if($instance['disablereadmore']){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                            <input type="checkbox" name="<?php echo $this->get_field_name('disablereadmore'); ?>" id="<?php echo $this->get_field_id('disablereadmore'); ?>" value="true" <?php echo $checked; ?> />			</label></p>
		
		<?php 
    }

} // class  Widget
?>