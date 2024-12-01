<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  ordainit-toolkit
 */
get_header(); 


$od_service_popup_image = function_exists( 'get_field' ) ? get_field( 'od_service_popup_image' ) : NULL;
$od_service_popup_video_url = function_exists( 'get_field' ) ? get_field( 'od_service_popup_video_url' ) : NULL;
$od_service_extra_text = function_exists( 'get_field' ) ? get_field( 'od_service_extra_text' ) : NULL;

?>

   <!-- service details area start -->
      <div class="it-sv-details__area fix pt-120 pb-90">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 order-1 order-lg-0">
                  <div class="it-sv-details__left it-common-sidebar it-blog-sidebar common_test_sidebar">
                    
                  <?php dynamic_sidebar('service-sidebar');?>
                  
                     
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 order-0 order-lg-1">
                  
                  <div class="it-sv-details__right">
                     <?php the_content(); ?>
                     
                  </div>

                    <div class="it-sv-details-content">
                     <?php if(!empty($od_service_popup_video_url)):?>
                        <div class="it-sv-details-thumb postbox-details-wrapper p-relative mb-35">
                           <img src="<?php echo esc_url($od_service_popup_image['url'], 'ordainit-toolkit');?>" alt="">
                           <a class="it-about-2-video-btn popup-video" href="<?php echo esc_url($od_service_popup_video_url, 'ordainit-toolkit');?>">
                              <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M8.08398 4.66237L0.917318 0.524694L0.917318 8.80005L8.08398 4.66237Z" fill="currentcolor"></path>
                              </svg>
                            </a>  
                        </div>
                        <?php endif;?>
                        <p><?php echo od_kses($od_service_extra_text, 'ordainit-toolkit');?></p>
                  </div>
                
               </div>
            </div>
         </div>
      </div>
      <!-- service details area end -->

      <!-- service-area-start -->
      <div class="it-service-area it-service-inner-style-2 it-service-inner-style-1 pb-120">
         <div class="container">
            <div class="it-service-top pb-80">
               <div class="row">
                  <div class="col-12">
                     <div class="it-service-wrap flex-wrap d-md-flex justify-content-between align-items-center">
                        <h4 class="it-section-title"><?php echo esc_html__('Related Services', 'ordainit-toolkit');?></h4>
                        <div class="it-arrow-box blog-style orange-style">
                           <button class="slider-prev">
                              <span>
                                 <svg width="21" height="12" viewBox="0 0 21 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                       d="M0.469669 6.53033C0.176777 6.23744 0.176777 5.76256 0.469669 5.46967L5.24264 0.696699C5.53553 0.403806 6.01041 0.403806 6.3033 0.696699C6.59619 0.989593 6.59619 1.46447 6.3033 1.75736L2.06066 6L6.3033 10.2426C6.59619 10.5355 6.59619 11.0104 6.3033 11.3033C6.01041 11.5962 5.53553 11.5962 5.24264 11.3033L0.469669 6.53033ZM21 6.75H1V5.25H21V6.75Z"
                                       fill="currentcolor" />
                                 </svg>
                              </span>
                           </button>
                           <button class="slider-next">
                              <span>
                                 <svg width="21" height="12" viewBox="0 0 21 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                       d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                       fill="currentcolor" />
                                 </svg>
                              </span>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-12">
                  <div class="it-service-slider-wrap">
                     <div class="swiper-container it-service-active">
                        <div class="swiper-wrapper">

                           <?php


                              $related_args = array(
                                 'post_type' => 'services',
                                 'posts_per_page' => -1, // Number of related members to show
                              );

                              $related_query = new WP_Query($related_args);

                              if ($related_query->have_posts()) {
                                 while ($related_query->have_posts()) {
                                       $related_query->the_post(); ?>

                           <div class="swiper-slide">
                              <div class="it-service-item text-center">
                                 <span class="it-service-icon mb-30">
                                    <img src="<?php the_post_thumbnail_url();?>" alt="">
                                 </span>
                                 <h4 class="it-service-title"><?php the_title();?></h4>
                                 <p class="mb-35"><?php echo wp_trim_words(get_the_content(), 9); ?></p>
                                 <div class="it-service-btn">
                                    <a href="<?php the_permalink();?>" class="it-btn-grey-sm orange-btn orange-btn">
                                       <?php echo esc_html__('Details', 'ordainit-toolkit');?>
                                       <i>
                                          <svg width="21" height="12" viewBox="0 0 21 12" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                                fill="currentcolor" />
                                          </svg>
                                       </i>
                                    </a>
                                 </div>
                              </div>
                           </div>
                           <?php
                                    }
                                    wp_reset_postdata();
                                 }
                         
                              ?>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
       </div>
      <!-- product-area-end --> 
  



<?php get_footer();  ?>