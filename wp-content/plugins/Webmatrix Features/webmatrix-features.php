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

/**
 * Function for Sliders CPT
 */

    if(get_option('cpt-sliders') == '1') {
        
		function webmatrix_sliders_cpt() {
			$labels = array(
				'name'                  => _x( 'Sliders', 'Post type general name', 'recipe' ),
				'singular_name'         => _x( 'sliders', 'Post type singular name', 'sliders' ),
				'menu_name'             => _x( 'Sliders', 'Admin Menu text', 'sliders' ),
				'name_admin_bar'        => _x( 'sliders', 'Add New on Toolbar', 'sliders' ),
				'add_new'               => __( 'Add New', 'sliders' ),
				'add_new_item'          => __( 'Add New sliders', 'sliders' ),
				'new_item'              => __( 'New sliders', 'sliders' ),
				'edit_item'             => __( 'Edit sliders', 'sliders' ),
				'view_item'             => __( 'View sliders', 'sliders' ),
				'all_items'             => __( 'All Sliders', 'sliders' ),
				'search_items'          => __( 'Search Sliders', 'sliders' ),
				'parent_item_colon'     => __( 'Parent Sliders:', 'sliders' ),
				'not_found'             => __( 'No Sliders found.', 'sliders' ),
				'not_found_in_trash'    => __( 'No Sliders found in Trash.', 'sliders' ),
				'featured_image'        => _x( 'sliders Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'sliders' ),
				'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'sliders' ),
				'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'sliders' ),
				'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'sliders' ),
				'archives'              => _x( 'sliders archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'sliders' ),
				'insert_into_item'      => _x( 'Insert into sliders', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'sliders' ),
				'uploaded_to_this_item' => _x( 'Uploaded to this sliders', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'sliders' ),
				'filter_items_list'     => _x( 'Filter Sliders list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'sliders' ),
				'items_list_navigation' => _x( 'Sliders list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'sliders' ),
				'items_list'            => _x( 'Sliders list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'sliders' ),
			);     
			$args = array(
				'labels'             => $labels,
				'description'        => 'sliders custom post type.',
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'sliders' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => 20,
				'menu_icon'          => 'dashicons-images-alt2',
				'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
				'taxonomies'         => array( 'category', 'post_tag' ),
				'show_in_rest'       => true
			);
			 
			register_post_type( 'sliders', $args );
		}

		add_action( 'init', 'webmatrix_sliders_cpt' );		
		
    }

/**
 * Function for Services CPT
 */

if(get_option('cpt-services') == '1') {
        
	function webmatrix_services_cpt() {
		$labels = array(
			'name'                  => _x( 'services', 'Post type general name', 'services' ),
			'singular_name'         => _x( 'Services', 'Post type singular name', 'services' ),
			'menu_name'             => _x( 'Services', 'Admin Menu text', 'services' ),
			'name_admin_bar'        => _x( 'services', 'Add New on Toolbar', 'services' ),
			'add_new'               => __( 'Add New', 'services' ),
			'add_new_item'          => __( 'Add New services', 'services' ),
			'new_item'              => __( 'New services', 'services' ),
			'edit_item'             => __( 'Edit services', 'services' ),
			'view_item'             => __( 'View services', 'services' ),
			'all_items'             => __( 'All services', 'services' ),
			'search_items'          => __( 'Search services', 'services' ),
			'parent_item_colon'     => __( 'Parent services:', 'services' ),
			'not_found'             => __( 'No services found.', 'services' ),
			'not_found_in_trash'    => __( 'No services found in Trash.', 'services' ),
			'featured_image'        => _x( 'services Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'services' ),
			'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'services' ),
			'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'services' ),
			'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'services' ),
			'archives'              => _x( 'services archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'services' ),
			'insert_into_item'      => _x( 'Insert into services', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'services' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this services', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'services' ),
			'filter_items_list'     => _x( 'Filter services list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'services' ),
			'items_list_navigation' => _x( 'services list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'services' ),
			'items_list'            => _x( 'services list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'services' ),
		);     
		$args = array(
			'labels'             => $labels,
			'description'        => 'services custom post type.',
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'services' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 20,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
			'taxonomies'         => array( 'category', 'post_tag' ),
			'show_in_rest'       => true
		);
		 
		register_post_type( 'services', $args );
	}

	add_action( 'init', 'webmatrix_services_cpt' );		
	
}

/**
 * Function for Gallery CPT
 */

if(get_option('cpt-gallery') == '1') {
        
	function webmatrix_gallery_cpt() {
		$labels = array(
			'name'                  => _x( 'gallery', 'Post type general name', 'gallery' ),
			'singular_name'         => _x( 'Gallery', 'Post type singular name', 'gallery' ),
			'menu_name'             => _x( 'Gallery', 'Admin Menu text', 'gallery' ),
			'name_admin_bar'        => _x( 'Gallery', 'Add New on Toolbar', 'gallery' ),
			'add_new'               => __( 'Add New', 'gallery' ),
			'add_new_item'          => __( 'Add New gallery', 'gallery' ),
			'new_item'              => __( 'New gallery', 'gallery' ),
			'edit_item'             => __( 'Edit gallery', 'gallery' ),
			'view_item'             => __( 'View gallery', 'gallery' ),
			'all_items'             => __( 'All gallery', 'gallery' ),
			'search_items'          => __( 'Search gallery', 'gallery' ),
			'parent_item_colon'     => __( 'Parent gallery:', 'gallery' ),
			'not_found'             => __( 'No gallery found.', 'gallery' ),
			'not_found_in_trash'    => __( 'No gallery found in Trash.', 'gallery' ),
			'featured_image'        => _x( 'gallery Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'gallery' ),
			'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'gallery' ),
			'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'gallery' ),
			'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'gallery' ),
			'archives'              => _x( 'gallery archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'gallery' ),
			'insert_into_item'      => _x( 'Insert into gallery', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'gallery' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this gallery', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'gallery' ),
			'filter_items_list'     => _x( 'Filter gallery list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'gallery' ),
			'items_list_navigation' => _x( 'gallery list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'gallery' ),
			'items_list'            => _x( 'gallery list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'gallery' ),
		);     
		$args = array(
			'labels'             => $labels,
			'description'        => 'gallery custom post type.',
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'gallery' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 20,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
			'taxonomies'         => array( 'category', 'post_tag' ),
			'show_in_rest'       => true
		);
		 
		register_post_type( 'gallery', $args );
	}

	add_action( 'init', 'webmatrix_gallery_cpt' );		
	
}

/**
 * Function for Testimonials CPT
 */

if(get_option('cpt-testimonials') == '1') {
        
	function webmatrix_testimonials_cpt() {
		$labels = array(
			'name'                  => _x( 'testimonials', 'Post type general name', 'testimonials' ),
			'singular_name'         => _x( 'Testimonials', 'Post type singular name', 'testimonials' ),
			'menu_name'             => _x( 'Testimonials', 'Admin Menu text', 'testimonials' ),
			'name_admin_bar'        => _x( 'Testimonials', 'Add New on Toolbar', 'testimonials' ),
			'add_new'               => __( 'Add New', 'testimonials' ),
			'add_new_item'          => __( 'Add New testimonials', 'testimonials' ),
			'new_item'              => __( 'New testimonials', 'testimonials' ),
			'edit_item'             => __( 'Edit testimonials', 'testimonials' ),
			'view_item'             => __( 'View testimonials', 'testimonials' ),
			'all_items'             => __( 'All testimonials', 'testimonials' ),
			'search_items'          => __( 'Search testimonials', 'testimonials' ),
			'parent_item_colon'     => __( 'Parent testimonials:', 'testimonials' ),
			'not_found'             => __( 'No testimonials found.', 'testimonials' ),
			'not_found_in_trash'    => __( 'No testimonials found in Trash.', 'testimonials' ),
			'featured_image'        => _x( 'testimonials Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'testimonials' ),
			'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'testimonials' ),
			'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'testimonials' ),
			'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'testimonials' ),
			'archives'              => _x( 'testimonials archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'testimonials' ),
			'insert_into_item'      => _x( 'Insert into testimonials', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'testimonials' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this testimonials', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'testimonials' ),
			'filter_items_list'     => _x( 'Filter testimonials list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'testimonials' ),
			'items_list_navigation' => _x( 'testimonials list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'testimonials' ),
			'items_list'            => _x( 'testimonials list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'testimonials' ),
		);     
		$args = array(
			'labels'             => $labels,
			'description'        => 'testimonials custom post type.',
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'testimonials' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 20,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
			'taxonomies'         => array( 'category', 'post_tag' ),
			'show_in_rest'       => true
		);
		 
		register_post_type( 'testimonials', $args );
	}

	add_action( 'init', 'webmatrix_testimonials_cpt' );		
	
}





 



?>