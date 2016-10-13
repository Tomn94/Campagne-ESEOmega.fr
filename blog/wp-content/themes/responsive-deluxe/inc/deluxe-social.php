<?php

class DeluxeSocial extends WP_Widget {

    function DeluxeSocial() {
        $widget_ops = array('classname' => 'DeluxeSocial', 'description' => 'Deluxe Social');
        $this->WP_Widget('DeluxeSocial', 'Deluxe Social', $widget_ops);
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        return $instance;
    }
    
    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => ''));
        $title = $instance['title'];
    ?>
          <p><label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php _e( 'Title', 'responsive-deluxe'); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
        <?php
    }
    
    function social(){
        // Output the Social Icons
        $social_icons = "<ul class='deluxe-social'>";
        
        $options = get_option( 'deluxe_theme_options' );
        
        if ($options['fb'] !== '') {
            $social_icons .= "<li><a class='deluxe-social-icon fb' href='"
                . esc_url( $options['fb'] ) .
                "'><i class='fa fa-facebook'></i></a></li>";
        }
        if ($options['twitter'] !== '') {
            $social_icons .= "<li><a class='deluxe-social-icon twitter' href='"
                . esc_url( $options['twitter'] ) .
                "'><i class='fa fa-twitter'></i></a></li>";
        }
        if ($options['linkedin'] !== '') {
            $social_icons .= "<li><a class='deluxe-social-icon linkedin' href='"
                . esc_url( $options['linkedin'] ) .
                "'><i class='fa fa-linkedin'></i></a></li>";
        }
        if ($options['youtube'] !== '') {
            $social_icons .= "<li><a class='deluxe-social-icon youtube' href='"
                . esc_url( $options['youtube'] ) .
                "'><i class='fa fa-youtube'></i></a></li>";
        }
        if ($options['insta'] !== '') {
            $social_icons .= "<li><a class='deluxe-social-icon insta' href='"
                . esc_url( $options['insta'] ) .
                "'><i class='fa fa-instagram'></i></a></li>";
        }
        if ($options['tumblr'] !== '') {
            $social_icons .= "<li><a class='deluxe-social-icon tumblr' href='"
                . esc_url( $options['tumblr'] ) .
                "'><i class='fa fa-tumblr'></i></a></li>";
        }
        if ($options['gplus'] !== '') {
            $social_icons .= "<li><a class='deluxe-social-icon gplus' href='"
                . esc_url( $options['gplus'] ) .
                "'><i class='fa fa-google-plus'></i></a></li>";
        }
        if ($options['pinterest'] !== '') {
            $social_icons .= "<li><a class='deluxe-social-icon pinterest' href='"
                . esc_url( $options['pinterest'] ) .
                "'><i class='fa fa-pinterest'></i></a></li>";
        }
        if ($options['vimeo'] !== '') {
            $social_icons .= "<li><a class='deluxe-social-icon vimeo' href='"
                . esc_url( $options['vimeo'] ) .
                "'><i class='fa fa-vimeo-square'></i></a></li>";
        }
        $social_icons .= "</ul>";
        
        echo $social_icons;

    }

    function widget($args, $instance) {
        extract($args, EXTR_SKIP);

        echo $before_widget;
        $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

        if (!empty($title))
            echo $before_title . $title . $after_title;;

        // Output the widget content here
        $this->social();
        echo $after_widget;
    }

}

add_action('widgets_init', create_function('', 'return register_widget("DeluxeSocial");'));

?>