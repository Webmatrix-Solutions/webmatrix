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





?>