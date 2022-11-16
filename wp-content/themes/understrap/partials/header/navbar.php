<?php 
/**
 * Template - Main Navbar Wrap
 * 
 * @package webmatrix
 */

$custom_logo_id = get_theme_mod( 'custom-logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id, 'full' ); 
?>

<div class="header-menu-bar">
            <div class="main-menu-area header-menu-area ">
                <div class="row m-0">
                    <div class="col-xl-2 p-0">
                        <div class="logo home-logo">
                            
                            <?php if (function_exists( 'the_custom_logo' ) ) { ?>
                                <a href="<?php echo get_site_url(); ?>">
                                    <?php echo '<img src="' . the_custom_logo() . '">'; ?>
                                </a>
                                
                                <?php } // end if statment
                                
                                else{
                                        echo '<h1>' . get_bloginfo('name') . '</h1>';  
                                
                                    } // end else statement
                           
                            ?>    
                        </div>
                    </div>

                    <div class="col-xl-7">
                        <div class="menu-bar home-menu-bar">
                            <div class="header-navigation-area">
                                <nav class="main-navigation">
                                    <div class="main-menu-container">
                                        <ul id="main-menu" class="menu"> <!-- Main Menu <ul> Starts -->
                                            
                                            <?php
                                                $header = array(
                                                    'theme_location'  => 'header_menu',
                                                    'container'       => '',
                                                    'container_class' => '',
                                                    'container_id'    => '', 
                                                    'menu_class'      => 'menu',
                                                    'menu_id'         => 'main-menu',
                                                    'echo'            => true,
                                                    'fallback_cb'     => '',
                                                    'before'          => '',
                                                    'after'           => '',
                                                    'link_before'     => '',
                                                    'link_after'      => '',
                                                    'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                                                    'depth'           => 2,
                                                    /*'walker'          => new wp_bootstrap_navwalker(),*/
                                                );
                                                wp_nav_menu( $header );
                                            ?>
                                        
                                        </ul> <!-- Main Menu <ul> Ends -->
                                    </div>
                                </nav>
                            </div>
            
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="header-buttons-area home-menu-button">
                        <div class="home-header-button">
                            <i class="fa-solid fa-phone-flip"></i>
                            <ul>
                                <li>Hotline</li>
                                <li><a href="tel:<?php echo get_option( 'headerContactNumber' )?>"><?php echo get_option( 'headerContactNumber' )?></a></li>
                            </ul>
                        </div>
                        <button type="button" class="top-get-a-quote" data-toggle="modal" data-target="#exampleModalCenter"><?php echo get_option( 'headerQuoteBtn' )?><i class="fa fa-angle-double-right"></i></button>
                        <ul class="header-buttons-wrapper wrd-list-style">
                            <li class="mobile-menu-trigger"><span></span><span></span><span></span></li>
                        </ul>
                    </div>
                </div>

                </div>
            </div>
        </div>

