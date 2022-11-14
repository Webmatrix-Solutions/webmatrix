<?php 
/**
 * Theme Core & Custom Functions
 * 
 * @package webmatrix
 */

function webmatrix_theme_core_functions() {

    /**
     * Add title tag Support
     */
    add_theme_support( 'title-tag' );

    /**
     * Add automatic feed links support
     */
    add_theme_support( 'automatic-feed-links' );

    /**
     * Add Post Formats Support
     */
    $post_formats = array('aside','image','gallery','video','audio','link','quote','status');
    add_theme_support( 'post-formats', $post_formats);

    /**
     * Add Post Thumbnails
     */
    add_theme_support( 'post-thumbnails' );

    /**
     * HTML 5 Supporrt
     */
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

    /**
     * Custom Logo Support
     */
    $logo_supports = array(
        'height'      => 86,
        'width'       => 196,
        'flex-height' => true,
        'flex-width'  => true,
    );
    add_theme_support( 'custom-logo', $logo_supports );

} 

add_action('after_setup_theme', 'webmatrix_theme_core_functions');

/**
 * Adding Theme Options Panel Menu
 */

function register_theme_option_panel_menu() {
	add_menu_page(
		__( 'Theme Options Panel', 'theme-options' ), // page_title 
		'Theme Panel', // menu title
		'manage_options', // capability
		'theme-panel-options.php', // menu page
		'theme_panel_options_callback', // callback
        'dashicons-menu', // dashicons
		99 // menu postion priority
	);
}
add_action( 'admin_menu', 'register_theme_option_panel_menu' );

/**
 * Adding Theme Options Menu Callback
*/

 function theme_panel_options_callback() { ?>
    <div>
        <h1><?php _e( 'Theme Options Panel', 'theme-options' ); ?></h1>
        <span><?php settings_errors(); ?></span>
        <form action="options.php" method="POST">
            <?php 
                settings_fields( 'section' );
                do_settings_sections( 'theme-panel-options.php' );
                submit_button();
            ?>
        </form>
    </div>
  <?php } 
  
  /**
   * Theme Options Settings Page
   */

    function theme_options_settings() {    
        /**
         * add main settings section 
         */
        add_settings_section( 
            'section', // id of settings section
            '', //title
            '', // callback function
            'theme-panel-options.php' // page
        );

        /**
         * add settings field for top-header-text
         */    
        add_settings_field(
            'top_header_text', // id of settings field
            'Top Header Text', // title of settings field
            'display_channel_name', // callback function for settings field
            'theme-panel-options.php', // page to display setting field
            'section' // default
        );
        
        // register the above setting
        register_setting( 'section', 'headerTopText' );

        /**
         * add settings field for header contact number 
         */
        add_settings_field(
            'header_phone_number', // id of settings field
            'Header Contact Number', // title of settings field
            'display_header_contact_number_callback', // callback function for settings field
            'theme-panel-options.php', // page to display setting field
            'section' // default
        );
        
        // register the above setting
        register_setting( 'section', 'headerContactNumber' );

        /**
         * add settings field for header quote button
         */
        add_settings_field(
            'header_quote_btn', // id of settings field
            'Header Quote Button', // title of settings field
            'display_header_quote_btn_callback', // callback function for settings field
            'theme-panel-options.php', // page to display setting field
            'section' // default
        );
        
        // register the above setting
        register_setting( 'section', 'headerQuoteBtn' );

        /**
         * add settings field for footer about us
         */
        add_settings_field(
            'footer_about_us', // id of settings field
            'Footer About Us', // title of settings field
            'display_footer_about_us_callback', // callback function for settings field
            'theme-panel-options.php', // page to display setting field
            'section' // default
        );
        
        // register the above setting
        register_setting( 'section', 'footerAboutUs' );

         /**
         * add settings field for footer contact information main text
         */
        add_settings_field(
            'footer_ci_main_text', // id of settings field
            'Footer Contact Information Main Text', // title of settings field
            'display_ci_main_text_callback', // callback function for settings field
            'theme-panel-options.php', // page to display setting field
            'section' // default
        );
        
        // register the above setting
        register_setting( 'section', 'footerCiMainText' );

        /**
         * add settings field for footer contact information address
         */
        add_settings_field(
            'footer_ci_address', // id of settings field
            'Footer Address', // title of settings field
            'display_ci_address_callback', // callback function for settings field
            'theme-panel-options.php', // page to display setting field
            'section' // default
        );
        
        // register the above setting
        register_setting( 'section', 'footerCiAddress' );

        /**
         * add settings field for footer contact information email id
         */
        add_settings_field(
            'footer_ci_email', // id of settings field
            'Footer Email ID', // title of settings field
            'display_ci_email_callback', // callback function for settings field
            'theme-panel-options.php', // page to display setting field
            'section' // default
        );
        
        // register the above setting
        register_setting( 'section', 'footerCiEmail' );

        /**
         * add settings field for footer contact information email id
         */
        add_settings_field(
            'footer_ci_phone_number', // id of settings field
            'Footer Phone Number', // title of settings field
            'display_ci_phone_number_callback', // callback function for settings field
            'theme-panel-options.php', // page to display setting field
            'section' // default
        );
        
        // register the above setting
        register_setting( 'section', 'footerCiPhoneNumber' );

        /**
         * add settings field for footer copyright text
         */
        add_settings_field(
            'footer_copyright_text', // id of settings field
            'Footer Copyright Text', // title of settings field
            'display_footer_copyright_callback', // callback function for settings field
            'theme-panel-options.php', // page to display setting field
            'section' // default
        );
        
        // register the above setting
        register_setting( 'section', 'footerCopyrightText' );

    }

    add_action( 'admin_init', 'theme_options_settings' );

    /**
     * Displaying callback for Top Header Text
     */

    function display_channel_name() { ?>
        <input type="text" name="headerTopText" value="<?php echo get_option( 'headerTopText' ); ?>" id="headerTopText" style="max-height: 200px !important; min-width: 500px !important"/>
    <?php }

    /**
     * Displaying callback for Top Header Phone Number
     */

    function display_header_contact_number_callback() { ?>
        <input type="text" name="headerContactNumber" value="<?php echo get_option( 'headerContactNumber' ); ?>" id="headerContactNumber" style="max-height: 200px !important; min-width: 500px !important"/>
    <?php }

    /**
     * Displaying callback for Top Header Quote Button
     */

    function display_header_quote_btn_callback() { ?>
        <input type="text" name="headerQuoteBtn" value="<?php echo get_option( 'headerQuoteBtn' ); ?>" id="headerQuoteBtn" style="max-height: 200px !important; min-width: 500px !important"/>
    <?php }

    /**
     * Displaying callback for Footer About Us
     */

    function display_footer_about_us_callback() { 
        
        //getting the option data from database
        $options = get_option('footerAboutUs');

        echo "<textarea type='text' name='footerAboutUs' id='footerAboutUs' style='min-width:500px; min-height: 100px;'>{$options}</textarea>";
    }

    /**
     * Displaying callback for Footer Contact Information Main Text
     */

    function display_ci_main_text_callback() { ?>
        <input type="text" name="footerCiMainText" value="<?php echo get_option( 'footerCiMainText' ); ?>" id="footerCiMainText" style="max-height: 200px !important; min-width: 500px !important"/>
    <?php }

    /**
     * Displaying callback for Footer Contact Information Address
     */

    function display_ci_address_callback() { ?>
        <input type="text" name="footerCiAddress" value="<?php echo get_option( 'footerCiAddress' ); ?>" id="footerCiAddress" style="max-height: 200px !important; min-width: 500px !important"/>
    <?php }

    /**
     * Displaying callback for Footer Contact Information Email ID
     */

    function display_ci_email_callback() { ?>
        <input type="text" name="footerCiEmail" value="<?php echo get_option( 'footerCiEmail' ); ?>" id="footerCiEmail" style="max-height: 200px !important; min-width: 500px !important"/>
    <?php }

     /**
     * Displaying callback for Footer Contact Information Phone Number
     */

    function display_ci_phone_number_callback() { ?>
        <input type="text" name="footerCiPhoneNumber" value="<?php echo get_option( 'footerCiPhoneNumber' ); ?>" id="footerCiPhoneNumber" style="max-height: 200px !important; min-width: 500px !important"/>
    <?php }

    /**
     * Displaying callback for Footer Copyright Text
     */

    function display_footer_copyright_callback() { ?>
        <input type="text" name="footerCopyrightText" value="<?php echo get_option( 'footerCopyrightText' ); ?>" id="footerCopyrightText" style="max-height: 200px !important; min-width: 500px !important"/>
    <?php }



?>