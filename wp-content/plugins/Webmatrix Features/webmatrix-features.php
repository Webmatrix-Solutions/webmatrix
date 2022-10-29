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

function my_plugin_action_links( $links ) {
   
    $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=settings') ) .'">Settings</a>';  
   
    return $links;
}

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'my_plugin_action_links' );



 



?>