<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @package webmatrix
 */

?>
<!-- HTML Header Starts -->
<!DOCTYPE html>
<!-- WP Language Attributes -->
<html <?php language_attributes(); ?>> 

<head>
    <!-- WP Charset Function -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="preconnect" href="../../../fonts.googleapis.com/index.html">
    <link rel="preconnect" href="../../../fonts.gstatic.com/index.html" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <!-- WP Title Function -->
    <?php 
    $site_title = get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description' ); 
    ?>
    
    <title><?php echo $site_title; ?> | <?php echo $site_description; ?></title>

<?php wp_head(); ?>    
</head>
<body <?php body_class(); ?>>

<!-- Preloader -->

<?php include( get_template_directory() . '/partials/_preloader.php' ); ?>

<!--Preloader End -->

<!-- Header Starts -->

<header>
    <div class="home-three-header">
        
        <!-- Top Header Starts -->

        <?php include( get_template_directory() . '/partials/header/_topheader.php' ); ?>

        <!-- Top Header Ends -->


        <!-- Mobile Menu Area Starts -->

        <?php include( get_template_directory() . '/partials/mobilenav/_mobilenav.php' ); ?>

        <!-- Mobile Menu Area Ends -->


        <!-- Main Menu Area Starts -->

        <?php include( get_template_directory() . '/partials/header/navbar.php' ); ?>

        <!-- Main Menu Area Ends -->


    </div>
</header>

<!-- Header Ends -->


<!-- HTML Header End -->