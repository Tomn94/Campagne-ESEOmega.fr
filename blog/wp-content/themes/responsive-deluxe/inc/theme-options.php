<?php

if ( basename( $_SERVER['PHP_SELF'] ) == basename( __FILE__ ) ) {
    die( __( 'Sorry, but you cannot access this page directly.', 'responsive-deluxe' ) );
}

add_action( 'admin_menu', 'responsive_deluxe_theme_options_submenu' ); 
add_action( 'wp_head', 'responsive_deluxe_custom_code' );
add_action( 'admin_enqueue_scripts', 'responsive_deluxe_options_enqeue_scripts');

//Registering Scripts & Styles for the Admin
function responsive_deluxe_options_enqeue_scripts() {
    if ( get_current_screen()->id == 'appearance_page_theme_options' ) {
        wp_enqueue_media();
        wp_register_script('deluxe-admin', get_template_directory_uri() . '/js/deluxe-admin.js');
        wp_enqueue_script('deluxe-admin');
    }
}

function responsive_deluxe_theme_options_submenu() {
	add_theme_page( __( 'Theme Options', 'responsive-deluxe' ), __( 'Theme Options', 'responsive-deluxe' ), 'edit_theme_options', 'theme_options', 'responsive_deluxe_theme_options_view');
}

function responsive_deluxe_custom_code() {
	$themeOptions = get_option( 'deluxe_theme_options' );
	echo wp_strip_all_tags( $themeOptions['header'] );
}

function responsive_deluxe_theme_options_meta_box(){
    register_setting( 'deluxe_theme_options', 'theme_options');
    ?>

<div class="inner-sidebar">
    <div class="postbox">
        <h3><span><?php _e( 'Need help?', 'responsive-deluxe' ); ?></span></h3>
        <hr />
        <div class="inside">
            <p><a target="_blank" href="http://brinidesigner.com/wordpress-themes/responsive-deluxe/"><?php _e( 'Read the documentation', 'responsive-deluxe' ); ?></a> <?php _e( 'to help you get started with Responsive Deluxe', 'responsive-deluxe' ); ?>.</p>
            <p><?php _e( 'Want to add a cool and modern portfolio to your website?', 'responsive-deluxe' ); ?> <a target="_blank" href="http://brinidesigner.com/wordpress-plugins/awesome-filterable-portfolio/"><?php _e( 'Download Awesome Filterable Portfolio', 'responsive-deluxe' ); ?></a> <br><strong><?php _e( 'It has been tested with the theme', 'responsive-deluxe' ); ?></strong></p>
        </div>
    </div>
</div>
    <!-- .inner-sidebar -->
<?php
}

function responsive_deluxe_theme_options_view(){
?>
    <div class="wrap">
        <form method="post" action="">
            <h2><?php _e('Deluxe Options Page', 'responsive-deluxe'); ?></h2>
            <div class="metabox-holder has-right-sidebar">
                <?php responsive_deluxe_theme_options_meta_box(); ?>
                <div id="post-body">
                    <div id="post-body-content">
                            <?php
                            if (isset($_POST['options'])) {
                                $author = '';
                                if ( isset ($_POST['options']['author'] ) ) {
                                    $author = $_POST['options']['author'];
                                }
                                $sanitized_options = array(
                                    'logo' => esc_url( $_POST['options']['logo'] ),
                                    'header' => wp_strip_all_tags( $_POST['options']['header'] ),
                                    'author' => $author,
                                    'fb' => esc_url( $_POST['options']['fb'] ),
                                    'twitter' => esc_url( $_POST['options']['twitter'] ),
                                    'linkedin' => esc_url( $_POST['options']['linkedin'] ),
                                    'youtube' => esc_url( $_POST['options']['youtube'] ),
                                    'insta' => esc_url( $_POST['options']['insta'] ),
                                    'gplus' => esc_url( $_POST['options']['gplus'] ),
                                    'pinterest' => esc_url( $_POST['options']['pinterest'] ),
                                    'vimeo' => esc_url( $_POST['options']['vimeo'] ),
                                    'tumblr' => esc_url( $_POST['options']['tumblr'] ),
                                );
                                update_option('deluxe_theme_options', $sanitized_options);
                                ?>
                                <div id="setting-error-settings_updated" class="updated settings-error"> 
                                <p><strong><?php _e( 'Settings saved.', 'responsive-deluxe' ); ?></strong></p></div>
                        <?php
                            }
                            $options = get_option('deluxe_theme_options');
                            ?>
                        <div class="postbox">
                            <div class="inside">
                                <p><b style="font-size:18px; color: #0064FF;"><?php _e( 'Upload your logo', 'responsive-deluxe' ); ?></b></p><hr>
                                <p class="description"><?php _e( 'Upload a logo, otherwise your blog name will be shown', 'responsive-deluxe' ); ?></p>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td width="170px" valign="top"><b><?php _e('Logo', 'responsive-deluxe'); ?></b></td>
                                            <td valign="top">
                                                <input type="text" name="options[logo]" id="optionsLogoURL" size="75" value="<?php echo esc_url( $options['logo'] ); ?>">
                                                <input type="button" name="thumbnail" id="uploadBtn" class="button-secondary" value="<?php _e( 'Upload Logo', 'responsive-deluxe' ); ?>" />
                                            </td>
                                            <td valign="top"><?php if ( !empty( $options['logo'] ) ) { ?>
                                                <img src="<?php echo esc_url( $options['logo'] ); ?>" id="deluxeLogo">
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="inside">
                                <p><b style="font-size:18px; color: #0064FF;"><?php _e('Post View Page', 'responsive-deluxe'); ?></b></p><hr>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td valign="top"><input type="checkbox" name="options[author]" <?php if( !empty( $options['author'] ) ) { ?> checked="chechek" <?php } ?>><?php _e('Show author information on post view page', 'responsive-deluxe'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="inside">
                                <p><b style="font-size:18px; color: #0064FF;"><?php _e('Custom Code', 'responsive-deluxe'); ?></b></p><hr>
                                <p class="description"><?php _e( 'Add your custom scripts and styles in the following fields.', 'responsive-deluxe' ); ?></p>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td width="170px" valign="top"><b><?php _e('Add Custom Code', 'responsive-deluxe'); ?></b></td>
                                            <td><textarea name="options[header]" rows="10" cols="75"><?php echo esc_textarea( $options['header'] ); ?></textarea></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="inside">
                                <p><b style="font-size:18px; color: #0064FF;"><?php _e('Social Networks', 'responsive-deluxe'); ?></b></p><hr>
                                <p class="description"><?php _e( 'Please use the full URL to your social network pages.', 'responsive-deluxe' ); ?></p>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td width="170px"><?php _e('Facebook', 'responsive-deluxe'); ?></td>
                                            <td><input type="text" name="options[fb]" size="75" value="<?php echo esc_attr( $options['fb'] ); ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td><?php _e('Twitter', 'responsive-deluxe'); ?></td>
                                            <td><input type="text" name="options[twitter]" size="75" value="<?php echo esc_attr( $options['twitter'] ); ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td><?php _e('Linkedin', 'responsive-deluxe'); ?></td>
                                            <td><input type="text" name="options[linkedin]" size="75" value="<?php echo esc_attr( $options['linkedin'] ); ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td><?php _e('YouTube', 'responsive-deluxe'); ?></td>
                                            <td><input type="text" name="options[youtube]" size="75" value="<?php echo esc_attr( $options['youtube'] ); ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td><?php _e('Instagram', 'responsive-deluxe'); ?></td>
                                            <td><input type="text" name="options[insta]" size="75" value="<?php echo esc_attr( $options['insta'] ); ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td><?php _e('Google +', 'responsive-deluxe'); ?></td>
                                            <td><input type="text" name="options[gplus]" size="75" value="<?php echo esc_attr( $options['gplus'] ); ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td><?php _e('Pinterest', 'responsive-deluxe'); ?></td>
                                            <td><input type="text" name="options[pinterest]" size="75" value="<?php echo esc_attr( $options['pinterest'] ); ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td><?php _e('Vimeo', 'responsive-deluxe'); ?></td>
                                            <td><input type="text" name="options[vimeo]" size="75" value="<?php echo esc_attr( $options['vimeo'] ); ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td><?php _e('Tumblr', 'responsive-deluxe'); ?></td>
                                            <td><input type="text" name="options[tumblr]" size="75" value="<?php echo esc_attr( $options['tumblr'] ); ?>" /></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <input type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes', 'responsive-deluxe'); ?>" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php
}
?>
