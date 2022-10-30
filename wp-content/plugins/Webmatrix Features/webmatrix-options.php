<?php 
/**
 * 
 * @package webmatrix
 */

 /**
  * execute code if someone try to acces the plugin file directly
  */

  if(! defined('ABSPATH')) die('Sorry! You cant access the file directly');

  /**
   * Registering Custom Plugin Menu Settings and Register Settings
   */

    function webmatrix_register_menu() {
        add_submenu_page(
            'themes.php',
            'Webmatrix Settings',
            'Webmatrix Settings',
            'manage_options',
            'webmatrix-theme-settings',
            'webmatrix_theme_settings_callback' 
        );
    }

    add_action('admin_menu', 'webmatrix_register_menu');

    /**
     * Registering Callback HTML for the above Menu
     */

    function  webmatrix_theme_settings_callback() { ?>
        
        <div class="wrap tab-content" id="ex1-content">
        
            <!-- Plugin Menu Heading -->
            <h2><?php _e('Webmatrix Theme Settings', 'webmatrix' ); ?></h2>

             <!-- Add Area Tab Panel for Plugin Page -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab-1">Customize WP Login Page</a></li>
                <li><a href="#tab-2">Custom Scripts Settings</a></li>
                <li><a href="#tab-3">Default Custom Post Types</a></li>
            </ul>

            <div class="container">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <!-- Option Form Starts for Custom Plugin -->
                        <form method="POST" action="options.php">
                        <?php settings_fields('webmatrix-settings'); ?>
                            <table class="form-table">
                              <!-- Options for Switching to Default Template -->
                                <tr valign="top">
                                    <th scope="row"><?php _e( 'Activate Default Template', 'webmatrix-settings' ); ?></th>
                                    <td>
                                        <label for="activate_template">
                                            <input type="checkbox" id="activate_template" class="activate_template" name="activate_template"
                                            value="1" <?php checked('1', get_option('activate_template') ); ?> /> <?php _e('Activate Default Template', 'webmatrix-settings')?>
                                            <p class="description"><?php  _e('By Clicking this checkbox, the default login page template will be activated', 'webmatrix-settings'); ?></p>
                                        </label>
                                    </td>
                                </tr> 
                                <!-- Options for Uploading Custom Logo Image -->
                                <tr valign="top">
                                    <th scope="row"><?php _e( 'Custom Logo Image Upload', 'webmatrix-settings' ); ?></th>
                                    <td>
                                        <label for="upload_custom_logo_img">
                                            <!-- Text Field for Showing the Image Upload Link -->
                                            <input id="upload_logo_img" type="text" name="upload_img" 
                                            value="<?php echo esc_url(get_option('upload_img') ); ?>" >
                                            <!-- Button for Uploading the Custom Logo Img -->
                                            <input id="upload_btn" type="button"
                                            value="<?php _e('Choose Image', 'webmatrix-settings'); ?>" class="button" />
                                            <!-- Description for the Input Fields -->
                                            <p class="description" <?php _e('Please Upload the Custom Logo Image From Here', 'webmatrix-settings'); ?>></p>
                                        </label>
                                    </td>
                                </tr>
                                <!-- Options for Uploading Custom Logo Image Redirection URL -->
                                <tr valign="top">
                                    <th scope="row"><?php _e('Custom Logo Redirect Link', 'webmatrix-settings'); ?></th>
                                    <td>
                                        <label for="logo_img_url">
                                            <input type="text" id="logo_img_url" name="logo_img_url"
                                            value="<?php echo esc_url(get_option( 'logo_img_url' ) ); ?>">
                                            <p class="description"><?php  _e('Please Upload the Redirect Link for Custom Logo', 'webmatrix-settings'); ?></p>
                                        </label>
                                    </td>
                                </tr>
                                 <!-- Options for Changing Background Colour -->
                                 <tr valign="top">
                                    <th scope="row"><?php _e('Change Background Colour', 'webmatrix-settings'); ?></th>
                                    <td>
                                        <label for="custom_bg_color">
                                            <input type="text" id="custom_bg_color" class="color-picker" name="custom_bg_color" 
                                            value="<?php echo esc_html(get_option('custom_bg_color')); ?>">
                                        </label>
                                        <p class="description"><?php  _e('Change Background Colour from this Pallette', 'webmatrix-settings'); ?></p>
                                    </td>
                                </tr>
                                <!-- Options for Hiding Language Switcher in Login Page -->
                                <tr valign="top">
                                    <th scope="row"><?php _e( 'Hide Language Switcher', 'webmatrix-settings' ); ?></th>
                                    <td>
                                        <label for="hide_lang_switcher">
                                            <input type="checkbox" id="hide_lang_switcher" class="hide_lang_switcher" name="hide_lang_switcher"
                                            value="1" <?php checked('1', get_option('hide_lang_switcher') ); ?> /> <?php _e('Hide Language Switcher', 'webmatrix-settings')?>
                                            <p class="description"><?php  _e('You can check this box to hide language switcher in the login page', 'webmatrix-settings'); ?></p>
                                        </label>
                                    </td>
                                </tr>
                                <!-- Options for Hiding Password Reset Link -->
                                <tr valign="top">
                                    <th scope="row"><?php _e( 'Remove Password Reset Option', 'webmatrix-settings' ); ?></th>
                                    <td>
                                        <label for="hide_pwd_reset_link">
                                            <input type="checkbox" id="hide_pwd_reset_link" class="hide_pwd_reset_link" name="hide_pwd_reset_link"
                                            value="1" <?php checked('1', get_option('hide_pwd_reset_link')); ?> /> <?php _e('Remove Password Reset Option', 'webmatrix-settings')?>
                                            <p class="description"><?php _e('You can check this box to hide password reset option in the login page', 'webmatrix-settings'); ?></p>
                                        </label>
                                    </td>
                                </tr>
                                <!-- Options for Adding Custom CSS -->
                                <tr valign="top">
                                    <th scope="row"><?php _e( 'Add Custom CSS', 'webmatrix-settings' ); ?></th>
                                    <td>
                                        <label for="custom_css">
                                            <textarea id="custom_css" name="custom_css" cols="70" rows="5"><?php echo esc_html(get_option('custom_css') ); ?></textarea>   
                                            <p class="description"><?php _e('Add Your Own Custom CSS to the wordpress dashboard.', 'webmatrix-settings'); ?></p>
                                        </label>    
                                    </td>
                                </tr> 
                            </table>
                            <!-- Save Changes Button -->
                            <p class="submit">
                                <input type="submit" class="button-primary" value="<?php _e('Save Changes', 'webmatrix-settings'); ?>">
                            </p> 
                        </form>
                    </div>
                </div>
            </div>

             <!-- Second Tab  -->
            <div id="tab-2" class="tab-pane">
               <div id="poststuff">
                   <div class="post-body-content">
                      <div class="postbox" style="background: none;">
                         <div class="inside">
                            <form name="dofollow" method="post" action="options.php" >
                                <?php settings_fields( 'webmatrix-global-header-footer-settings' ); ?>
                                
                                <!-- Header Script Code -->
                                <h3 class="hfs-header-labels" for="hfs-insert-header"><?php esc_html_e( 'Global Top Script', 'webmatrix-settings' ); ?></h3>
                                <p><?php esc_html_e( 'Included just before the closing </head> tag', 'webmatrix-settings' ); ?></p>
                                <textarea style="width: 100%;" name="hfs-insert-header" id="insert-header" cols="57" rows="10"><?php echo esc_html(get_option('hfs-insert-header')); ?></textarea>    
                                
                                <!-- Footer Script Code -->
                                <h3 class="hfs-footer-labels" for="hfs-insert-footer"><?php esc_html_e( 'Global Bottom Script', 'webmatrix-settings' ); ?></h3>
                                <p><?php esc_html_e('Included just before the closing </body> tag', 'webmatrix-settings' ); ?></p>
                                <textarea style="width: 100%;" name="hfs-insert-footer" id="insert-footer" cols="57" rows="10"><?php echo esc_html(get_option('hfs-insert-footer')); ?></textarea>
                                
                                <!-- Submit button for form -->
                                <p class="submit">
                                    <input type="submit" class="button button-primary" name="Submit" value="<?php esc_html_e('Save Settings', 'webmatrix-settings'); ?>"     />
                                </p>
                            </form>
                         </div>   
                      </div>  
                   </div> 
               </div>
            </div>

            <!-- Third Tab  -->
            <div id="tab-3" class="tab-pane">
                <form method="POST" action="options.php">
                    <?php settings_fields('webmatrix-cpt-settings'); ?>
                    <table class="form-table">
                        <!-- CPT for Sliders -->
                        <tr valign="top">
                            <th scope="row"><?php _e( 'Sliders or Banners Section', 'webmatrix-cpt-settings' ); ?></th>
                            <td>
                                <label for="cpt-sliders">
                                    <input type="checkbox" id="cpt-sliders" class="cpt-sliders" name="cpt-sliders"
                                        value="1" <?php checked('1', get_option('cpt-sliders') ); ?> /> <?php _e('Activate Sliders CPT', 'webmatrix-cpt-settings')?>
                                    <p class="description"><?php  _e('By Clicking this checkbox, sliders or banners post type will be activated', 'webmatrix-cpt-settings'); ?></p>
                                </label>
                            </td>
                        </tr> 
                        <!-- CPT for Services -->
                        <tr valign="top">
                            <th scope="row"><?php _e( 'Services Section', 'webmatrix-cpt-settings' ); ?></th>
                            <td>
                                <label for="cpt-services">
                                    <input type="checkbox" id="cpt-services" class="cpt-services" name="cpt-services"
                                        value="1" <?php checked('1', get_option('cpt-services') ); ?> /> <?php _e('Activate Services CPT', 'webmatrix-cpt-settings')?>
                                    <p class="description"><?php  _e('By Clicking this checkbox, services post type will be activated', 'webmatrix-cpt-settings'); ?></p>
                                </label>
                            </td>
                        </tr> 
                        <!-- CPT for Gallery -->
                        <tr valign="top">
                            <th scope="row"><?php _e( 'Gallery Section', 'webmatrix-cpt-settings' ); ?></th>
                            <td>
                                <label for="cpt-gallery">
                                    <input type="checkbox" id="cpt-gallery" class="cpt-gallery" name="cpt-gallery"
                                        value="1" <?php checked('1', get_option('cpt-gallery') ); ?> /> <?php _e('Activate Gallery CPT', 'webmatrix-cpt-settings')?>
                                    <p class="description"><?php  _e('By Clicking this checkbox, gallery post type will be activated', 'webmatrix-cpt-settings'); ?></p>
                                </label>
                            </td>
                        </tr> 
                        <!-- CPT for Testimonials -->
                        <tr valign="top">
                            <th scope="row"><?php _e( 'Testimonials Section', 'webmatrix-cpt-settings' ); ?></th>
                            <td>
                                <label for="cpt-testimonials">
                                    <input type="checkbox" id="cpt-testimonials" class="cpt-testimonials" name="cpt-testimonials"
                                        value="1" <?php checked('1', get_option('cpt-testimonials') ); ?> /> <?php _e('Activate Testimonials CPT', 'webmatrix-cpt-settings')?>
                                    <p class="description"><?php  _e('By Clicking this checkbox, testimonials post type will be activated', 'webmatrix-cpt-settings'); ?></p>
                                </label>
                            </td>
                        </tr> 
                    </table>
                        <!-- Submit button for form -->
                        <p class="submit">
                            <input type="submit" class="button button-primary" name="Submit" value="<?php esc_html_e('Save Settings', 'webmatrix-cpt-settings'); ?>"     />
                        </p>
                </form>
            </div>


    
        </div>
    <?php } 
    
    /**
     * Registering Custom Settings
     */

    function register_custom_settings() {
        
        // Regsitering Default Template Settings //
        register_setting('webmatrix-settings', 'activate_template', 'Custom_Magik_sanitisation');
        // Regsitering Default Template Settings //
        register_setting('webmatrix-settings', 'upload_img', 'esc_url_raw');
        // Regsitering Default Template Settings //
        register_setting('webmatrix-settings', 'logo_img_url', 'esc_url_raw' );
        // Regsitering Default Template Settings //
        register_setting('webmatrix-settings', 'custom_bg_color', 'Custom_Magik_BG_sanitisation');
        // Regsitering Default Template Settings //
        register_setting('webmatrix-settings', 'custom_css', 'Custom_Css_sanitisation');
        // Regsitering Default Template Settings //
        register_setting('webmatrix-settings', 'hide_lang_switcher', 'Custom_Magik_sanitisation');
        // Regsitering Default Template Settings //
        register_setting('webmatrix-settings', 'hide_pwd_reset_link', 'Custom_Magik_sanitisation');
        // Regsitering Default Template Settings //
        register_setting('webmatrix-global-header-footer-settings', 'hfs-insert-header', 'trim');
        // Regsitering Default Template Settings //
        register_setting('webmatrix-global-header-footer-settings', 'hfs-insert-footer', 'trim');
        // Regsitering Banners CPT //
        register_setting('webmatrix-cpt-settings', 'cpt-sliders', 'Custom_Magik_sanitisation');
        // Regsitering Services CPT //
         register_setting('webmatrix-cpt-settings', 'cpt-services', 'Custom_Magik_sanitisation');
        // Regsitering Gallery CPT //
        register_setting('webmatrix-cpt-settings', 'cpt-gallery', 'Custom_Magik_sanitisation');
        // Regsitering Testimonials CPT //
        register_setting('webmatrix-cpt-settings', 'cpt-testimonials', 'Custom_Magik_sanitisation');

    }
    
    add_action('init', 'register_custom_settings');

    /**
     * Input Fields Santizations for the above settings
     */

    /**
     * Field Sanitisation for Input boxes
     */
    function Custom_Magik_sanitisation($input)
    {   
        $input = sanitize_text_field($input);
        return $input;
    }

    /**
     * Field sanitisation for Custom BG Color
     */

    function Custom_Magik_BG_sanitisation($color)
    {
        if ('' === $color )
        return '';

        // 3 or 6 hex digits or empty string 
        if (preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color) )
        return $color;

        return null;
    }

    /**
     * Field sanitisation for Custom CSS
     */

    function Custom_Css_sanitisation($input)
    {
        $css_sanitisation_allowed_html = array();
        $input = wp_kses($input, $css_sanitisation_allowed_html);
        return $input;
    }

    /**
     *  Registering CSS & JS scripts for plugin settings page  
     */    

        // Enqueue the CSS File for Admin Panel //
        function enqueue_settings_ui_css() {
            wp_register_style( 'custom_wp_admin_css', plugins_url('assets/css/admin-area.css', __FILE__), false, '1.0.0' );
            wp_enqueue_style( 'custom_wp_admin_css' );
        }
        add_action( 'admin_enqueue_scripts', 'enqueue_settings_ui_css' );
        
        // Enqueue the JS File for Admin Panel //
        function enqueue_settings_ui_js() {
            wp_register_script( 'custom_wp_admin_js', plugins_url('assets/js/admin-area.js', __FILE__), false, '1.0.0' );
            wp_enqueue_script( 'custom_wp_admin_js' );
        }
        add_action( 'admin_enqueue_scripts', 'enqueue_settings_ui_js' );
    
        
    /**
     * Registering Plugin Internal CSS & JS for extra functionality
     */    

    function add_external_js( $hook_suffix ) 
    {
        // Enqueueing the WP-Color Picker Javascript file 
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('my-script-handle', plugins_url('assets/js/color-picker.js', __FILE__), array( 'wp-color-picker' ), '1.0.0', false, true);
    
        // Enqueing the WP Media Library JS //
        wp_enqueue_media();
        wp_register_script( '4d-magik-media-upload', plugins_url('assets/js/media-upload.js', __FILE__), array( 'jquery' ) );
        wp_enqueue_script( '4d-magik-media-upload' );
    
    }    
    add_action( 'admin_enqueue_scripts', 'add_external_js' );

    /**
     * Only include media uploader scripts and styles on custmize options page
     */
    if ( isset( $_GET['page'] ) && $_GET['page'] == '4d-magik/4d-magik-options.php' ) {
	add_action( 'admin_print_scripts', 'add_external_js' );
	// add_action( 'admin_print_styles', 'ca_admin_styles' );
}



?>