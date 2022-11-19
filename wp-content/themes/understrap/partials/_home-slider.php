<?php 
/**
 * Template - Main Slider Template on the Homepage
 * 
 * @package webmatrix
 */ 
?>

<!-- BANNER STARTS -->
<section id="banner">
        <div class="home-two-banner" style="background-image: url('<?php echo get_template_directory_uri() . '/images/home-banner-bg1.jpg' ?>'); background-position: center; background-size: cover; background-repeat: no-repeat;">
            <div class="banner-slide">

            <?php
                $args = array( 
                    'post_type' => 'sliders', 
                    'order' => 'ASC', 
                    'posts_per_page' => -1 
                );
                
                $sliderposts = get_posts( $args );
                
                foreach ( $sliderposts as $post ) : setup_postdata( $post );
                
                $slider_feature_image_id = get_post_thumbnail_id( get_the_ID() ); // get the featured image id for the post
                $slider_feature_image = wp_get_attachment_image_src( $slider_feature_image_id, 'full', false, '' ); // get the featured image
                $featured_img_alt_text = get_post_meta( get_post_thumbnail_id() ); // get the image meta data (Attributes)
                  
              ?>
                
                <div class="banner-content" >
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="home-banner-left-content">
                                    <div class="home-nanner-content-wrapper">
                                    <?php 
                                    $excerpt_background_image = get_field( 'excerpt_background_image' );
                                    if( !empty( $excerpt_background_image ) ) : ?>

                                        <div class="banner-subtitle" data-animation="fadeInUp" data-delay=".5s" style="background: url(<?php echo $excerpt_background_image; ?>); background-repeat: no-repeat; background-size: contain; background-position: left center;">
                                        <p><?php the_excerpt(); ?></p></div>

                                    <?php endif; ?>

                                        <?php the_content(); ?>
                                        
                                        <div class="home-banner-button">
                                            <a href="contact.html" class="banner-button" data-animation="fadeInUp" data-delay="1.5s">Discover More <i class="fa fa-angle-double-right"></i></a>
                                            <a href="blog.html" class="read-more-link" data-animation="fadeInUp" data-delay="1.5s">How It Works <i class="fa fa-angle-double-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-xl-6">
                                <div class="banner-right-image">
                                    <?php 
                                       echo '<img src="'. $slider_feature_image[0] .'" alt="'. $featured_img_alt_text['_wp_attachment_image_alt']['0'] .'">'; // Dsiplay image in frontend & Alt img text dynamically
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; 
                wp_reset_postdata();
            ?>                         
            </div>
        </div>
    </section>
    <!---- BANNER ENDS  ---->