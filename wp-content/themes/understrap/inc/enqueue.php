<?php 
/**
 * Theme Scripts and Styles Enqueue File
 * 
 * @package webmatrix
 * 
 * Theme Main Style Files
 */

function adding_main_styles() {
    
    /**
    * Enqueue Google Fonts
    */
    wp_register_style( 'main-google-fonts', '//fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700&display=swap', array(), null);
    wp_enqueue_style('main-google-fonts');

    /**
     * Adding Font-awesome
     */
    wp_register_style( 'font-awesome',  get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css', array(), null);
    wp_enqueue_style('font-awesome');

    /**
     * Adding Slick CSS
     */
    wp_register_style( 'slick-css',  get_template_directory_uri() . '/css/slick.css', array(), null);
    wp_enqueue_style('slick-css');

    /**
     * Adding Slick Theme CSS
     */
    wp_register_style( 'slick-theme-css',  get_template_directory_uri() . '/css/slick-theme.css', array(), null);
    wp_enqueue_style('slick-theme-css');

    /**
     * Adding Main Style.css
     */
    wp_register_style( 'main-style',  get_template_directory_uri() . '/css/style.css', array(), null);
    wp_enqueue_style('main-style');

    /**
     * Adding Magnigic Popup.css
     */
    wp_register_style( 'magnific-popup',  get_template_directory_uri() . '/css/magnific-popup.css', array(), null);
    wp_enqueue_style('magnific-popup');

    /**
     * Adding Slick Nav Css
     */
    wp_register_style( 'slick-nav',  get_template_directory_uri() . '/css/slicknav.min.css', array(), null);
    wp_enqueue_style('slick-nav');

    /**
     * Adding Animate CSS
     */
    wp_register_style( 'animate',  get_template_directory_uri() . '/css/animate.css', array(), null);
    wp_enqueue_style('animate');

    /**
     * Adding Progree Circle css
     */
    wp_register_style( 'progress-circle',  get_template_directory_uri() . '/css/progresscircle.css', array(), null);
    wp_enqueue_style('progress-circle');

    /**
     * Adding Fontawesome Minified
     */
    wp_register_style( 'fontawesome-min',  get_template_directory_uri() . '/css/fontawesome.min.css', array(), null);
    wp_enqueue_style('fontawesome-min');

    /**
     * Adding Flaticon
     */
    wp_register_style( 'flaticon',  get_template_directory_uri() . '/fonts/flaticon/flaticon.css', array(), null);
    wp_enqueue_style('flaticon');

    /**
     * Adding Bootstrap Min
     */
    wp_register_style( 'bootstrap-min',  get_template_directory_uri() . '/css/bootstrap.min.css', array(), null);
    wp_enqueue_style('bootstrap-min');

    /**
     * Adding Custom Styles (Theme)
     */
    wp_register_style( 'custom',  get_template_directory_uri() . '/css/custom-styles/style.css', array(), null);
    wp_enqueue_style('custom');

    /**
     * Adding Responsive
     */
    wp_register_style( 'responsive',  get_template_directory_uri() . '/css/responsive.css', array(), null);
    wp_enqueue_style('responsive');

    /**
     * Adding Custom Styles (Webmatrix Custom)
     */
    wp_register_style( 'wmx-custom',  get_template_directory_uri() . '/css/custom-styles/custom.css', array(), null);
    wp_enqueue_style('wmx-custom');

}

add_action( 'wp_enqueue_scripts', 'adding_main_styles' ); 

/*******************
 ******************* Adding theme Main JS Files
 ********************/

function adding_main_js() {

    /**
     * Adding Jquery Min
     */

    wp_register_script ( 'jquery-min', get_template_directory_uri() . '/js/jquery.min.js', array( 'jquery' ), null );
    wp_enqueue_script ( 'jquery-min' );

    /**
     * Adding Progress circle 
     */

    wp_register_script ( 'progress-circle', get_template_directory_uri() . '/js/progresscircle.js', array(), null );
    wp_enqueue_script ( 'progress-circle' );

    /**
     * Adding jquery barfiller
     */

    wp_register_script ( 'jquery-barfiller', get_template_directory_uri() . '/js/jquery.barfiller.js', array(), null );
    wp_enqueue_script ( 'jquery-barfiller' );

     /**
     * Adding appear
     */

    wp_register_script ( 'appear', get_template_directory_uri() . '/js/appear.js', array(), null );
    wp_enqueue_script ( 'appear' );

     /**
     * Adding cascading divs min
     */

    wp_register_script ( 'cascadingdivs-min', get_template_directory_uri() . '/js/cascadingDivs.min.js', array(), null );
    wp_enqueue_script ( 'cascadingdivs-min' );

    
     /**
     * Adding jquery slicknav
     */

    wp_register_script ( 'jquery-slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array( 'jquery' ), null );
    wp_enqueue_script ( 'jquery-slicknav' );

    /**
     * Adding isotope package
     */

    wp_register_script ( 'isotope-package', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), null );
    wp_enqueue_script ( 'isotope-package' );

    /**
     * Adding bootstrap min
     */

    wp_register_script ( 'bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), null );
    wp_enqueue_script ( 'bootstrap-min' );

    /**
     * Adding counterup min
     */

    wp_register_script ( 'counterup-min', get_template_directory_uri() . '/js/counterup.min.js', array(), null );
    wp_enqueue_script ( 'counterup-min' );

    /**
     * Adding jquery waypoints
     */

    wp_register_script ( 'jquery-waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array( 'jquery' ), null );
    wp_enqueue_script ( 'jquery-waypoints' );

    /**
     * Adding wow min
     */

    wp_register_script ( 'wow-min', get_template_directory_uri() . '/js/wow.min.js', array(), null );
    wp_enqueue_script ( 'wow-min' );

    /**
     * Adding jquery magnific popup
     */

    wp_register_script ( 'jquery-magnific-popup-min', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array( 'jquery' ), null );
    wp_enqueue_script ( 'jquery-magnific-popup-min' );

    
    /**
     * Adding slick min
     */

    wp_register_script ( 'slick-min', get_template_directory_uri() . '/js/slick.min.js', array(), null );
    wp_enqueue_script ( 'slick-min' );

    /**
     * Adding main js
     */

    wp_register_script ( 'main', get_template_directory_uri() . '/js/main.js', array(), null );
    wp_enqueue_script ( 'main' );

} 

add_action( 'wp_enqueue_scripts', 'adding_main_js' );

?> 


