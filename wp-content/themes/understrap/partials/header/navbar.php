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
                                        <ul id="main-menu" class="menu">
                                            <li class="menu-item-has-children current-menu-ancestor current-menu-item">
                                                <a href="index.html" class="active">Web Design</i></a>
                                            </li>

                                            <li class="menu-item-has-children">
                                                <a href="javascript:void(0)">Website Development <i class="fa fa-angle-down"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="javascript:void(0)">Basic Website</a></li>
                                                    <li><a href="javascript:void(0)">Wordpress Development</a></li>
                                                    <li><a href="javascript:void(0)">Custom Application Development</a></li>
                                                    <li><a href="javascript:void(0)">Content Management System</a></li>
                                                    <li><a href="javascript:void(0)">Ecommerce Development</a></li>
                                                    <li><a href="javascript:void(0)">API Development</a></li>
                                                    <li><a href="javascript:void(0)">Application Maintenance</a></li>
                                                </ul>
                                            </li>

                                            <li class="menu-item-has-children">
                                                <a href="javascript:void(0)">Digital Marketing <i class="fa fa-angle-down"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="javascript:void(0)">Pay Per Click</a></li>
                                                    <li><a href="javascript:void(0)">Google Ads</a></li>
                                                    <li><a href="javascript:void(0)">Lead Generation</a></li>
                                                    <li><a href="javascript:void(0)">Social Media Optimization</a></li>
                                                    <li><a href="javascript:void(0)">Search Engine Optimization</a></li>
                                                    <li><a href="javascript:void(0)">Search Engine Marketing</a></li>
                                                    <li><a href="javascript:void(0)">Local SEO</a></li>
                                                </ul>
                                            </li>

                                            <li class="menu-item-has-children">
                                                <a href="javascript:void(0)">Packages</a>
                                            </li>

                                            <li class="menu-item-has-children">
                                                <a href="javascript:void(0)">Know More About Us</a>
                                            </li>
            
                                            <li><a href="javascript:void(0)">Reach Us</a></li>
            
                                            <li>
                                                <button class="btn primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><i class="fa-solid fa-magnifying-glass"></i></button>

                                                <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop">
                                                    <div class="offcanvas-header">
                                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                                    </div>
                                                    <div class="offcanvas-body">
                                                        <form>
                                                            <input type="search" placeholder="Search...">
                                                            <i class="fa-solid fa-magnifying-glass"></i>
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
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
                        <button type="button" class="top-get-a-quote" data-toggle="modal" data-target="#exampleModalCenter">Get a Quote&nbsp<i class="fa fa-angle-double-right"></i></button>
                        <ul class="header-buttons-wrapper wrd-list-style">
                            <li class="mobile-menu-trigger"><span></span><span></span><span></span></li>
                        </ul>
                    </div>
                </div>

                </div>
            </div>
        </div>

