<?php 
/**
 * Webmatrix Features
 *
 * @package           webmatrix
 * @author            Abir
 * @copyright         2022 Webmatrix Solutions
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Webmatrix Features
 * Plugin URI:        https://wmxsolutions.com/
 * Description:       This plugin will implement all the basic features of the website,
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Abir
 * Author URI:        https://wmxsolutions.com
 * Text Domain:       webmatrix
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://wmxsolutions.com/webmatrix-features/
 */

/**
 * Inlcuding Plugin Options File
 */

require_once 'webmatrix-options.php';

/**
 * Code for Not execuding direct access to plugin files
 */

 if(! defined('ABSPATH')) die('Sorry! You cant access the file directly');

/**
 * Showing the Settings option of plugin page
*/

function magik_plugin_settings_option( $links ) {
	$links[] = '<a href="'. esc_url( get_admin_url(null, 'themes.php?page=webmatrix-theme-settings') ) .'">Settings</a>';  
	return $links;
 }
 
 add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'magik_plugin_settings_option' );

/**
 * Function for Custom Logo Img Upload
 */

function upload_img() {
	if ( get_option( 'upload_img' ) != '' ) {
		echo '<style>.login h1 a { background-image: url("' . esc_url ( get_option( 'upload_img' ) ) . '"); background-size: contain; width: 320px; }</style>';
	} 
}

add_action('login_head', 'upload_img');

/**
 * Function for Redirecting URL of Custom Logo Img
 */

function logo_img_url($url) {
    if ( get_option( 'logo_img_url' ) != '' ) {
		return esc_url( get_option( 'logo_img_url' ) );
	} else {
		return esc_url( get_bloginfo( 'url' ) ); 
	}
}

add_filter('login_headerurl', 'logo_img_url');

/**
 * Function for chnage of custom background color 
 */

function custom_bg_color() {
    if (get_option('custom_bg_color') != '' ) {
        echo '<style>body { background-color: ' . esc_html(get_option( 'custom_bg_color' ) ) . '!important; } </style>';
    }
}

add_action('login_head', 'custom_bg_color');

/**
 * Function for applying Custom css 
 */

function custom_css() {
    if ( get_option( 'custom_css' ) != '' ) {
        echo '<style>'. strip_tags( get_option( 'custom_css' ) ) . '</style>';
    }
}

add_action('login_head', 'custom_css');

/**
 * Function for remove the Language Switcher from the wordpress Admin Login Page
 */

function hide_lang_switcher(){
    if  (get_option( 'hide_lang_switcher' ) == '1'){
        add_filter( 'login_display_language_dropdown', '__return_false' );
    }
}

add_action('init', 'hide_lang_switcher');

/**
 * Function for Remove the PWD Reset Link from the Admin Login Page
 */

function hide_pwd_reset_link($text) {
    
    if (get_option('hide_pwd_reset_link') == '1') {
        
        function remove_lostpassword_text ( $text ) {
            if ($text == 'Lost your password?') {$text = '';}
                   return $text;
            }
        
        function disable_password_reset(){
            return false;
        }
      
        add_filter('allow_password_reset', 'disable_password_reset');    
        add_filter( 'gettext', 'remove_lostpassword_text' );
        
        
    }
}

add_filter('init', 'hide_pwd_reset_link');

function possibly_redirect(){ 
    if (isset( $_GET['action'] )){  
        if ( in_array( $_GET['action'], array('lostpassword', 'retrievepassword') ) ) {
            wp_redirect( '/wp-login.php' ); exit;
        }
    }
}

add_action('init','possibly_redirect'); 

/**
 * Function for Activating the Default Template
 */

function activate_template() {
    if(get_option('activate_template') == '1') {
        include_once "login-template/default-template.php";
    }
    else{
        echo '<style>body.login { background-color: #f0f0f1 !important; } </style>';
    }    
}

add_filter('login_head', 'activate_template');

/**
 * Function for Global header Script
 */

function change_header() {
    $meta = get_option('hfs-insert-header', '');
    if ($meta != '') {
        echo $meta, "\n";
    }

    $shfs_post_meta = get_post_meta( get_the_ID(), '_inpost_header_script' , TRUE );
    if ( is_singular() && $shfs_post_meta != '' ) {
        echo $shfs_post_meta['synth_header_script'], "\n";
    }
}

add_action('wp_head', 'change_header');

/**
 *  Function for Global Footer Script
 */

function change_footer() {  
    if (!is_admin() && !is_feed() && !is_robots() && !is_trackback()) {
        $text = get_option('hfs-insert-footer', '');
        $text = convert_smilies($text);
        $text = do_shortcode($text);

        if ($text != '') {
            echo $text, "\n";
        }
    }
}

add_action('wp_footer', 'change_footer');  





 



?>