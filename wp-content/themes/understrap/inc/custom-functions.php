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

    }

    add_action( 'admin_init', 'theme_options_settings' );


    function display_channel_name() { ?>
        <input type="text" name="headerTopText" value="<?php echo get_option( 'headerTopText' ); ?>" id="headerTopText" style="max-height: 200px !important; min-width: 500px !important"/>
    <?php }

    function display_header_contact_number_callback() { ?>
        <input type="text" name="headerContactNumber" value="<?php echo get_option( 'headerContactNumber' ); ?>" id="headerContactNumber" style="max-height: 200px !important; min-width: 500px !important"/>
    <?php }



?>