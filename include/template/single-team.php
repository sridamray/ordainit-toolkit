<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  ordainit-toolkit
 */
get_header(); 


$od_team_designation = function_exists('get_field') ? get_field('od_team_designation') : '';
$od_team_phone = function_exists('get_field') ? get_field('od_team_phone') : '';
$od_team_email = function_exists('get_field') ? get_field('od_team_email') : '';
$od_team_location = function_exists('get_field') ? get_field('od_team_location') : '';
$od_team_location_url = function_exists('get_field') ? get_field('od_team_location_url') : '';
$od_team_twitter_url = function_exists('get_field') ? get_field('od_team_twitter_url') : '';
$od_team_instagram_url = function_exists('get_field') ? get_field('od_team_instagram_url') : '';
$od_team_pinterest_url = function_exists('get_field') ? get_field('od_team_pinterest_url') : '';
$od_team_fb_url = function_exists('get_field') ? get_field('od_team_fb_url') : '';
$od_team_button_text = function_exists('get_field') ? get_field('od_team_button_text') : '';
$od_team_button_url = function_exists('get_field') ? get_field('od_team_button_url') : '';
$od_team_skills = function_exists('get_field') ? get_field('od_team_skills') : '';
$od_team_skill_tille = function_exists('get_field') ? get_field('od_team_skill_tille') : '';
$od_team_short_description = function_exists('get_field') ? get_field('od_team_short_description') : '';


?>


      <div class="it-team-details-area pt-120 z-index-2">
         <div class="container">
            <div class="it-team-details-wrap" data-background="<?php echo ORDAINIT_TOOLKIT_ADDONS_URL;?>assets/dummy/inner/team-details/Bg.jpg">
               <div class="row">
                  <div class="col-xl-3 col-lg-3">
                     <div class="it-team-details-left">
                        <div class="it-team-details-left-thumb">
                           <img src="<?php the_post_thumbnail_url();?>" alt="">
                        </div>
                        <div class="it-team-details-left-social text-center">
                           <?php if(!empty($od_team_fb_url)):?>
                              <a href="<?php echo esc_url($od_team_fb_url, 'ordainit-toolkit');?>"><i class="fab fa-facebook-f"></i></a>
                           <?php endif;?>
                           <?php if(!empty($od_team_twitter_url)):?>
                           <a href="<?php echo esc_url($od_team_twitter_url, 'ordainit-toolkit');?>"><i class="fab fa-twitter"></i></a>
                            <?php endif;?>
                           <?php if(!empty($od_team_instagram_url)):?>
                           <a href="<?php echo esc_url($od_team_instagram_url, 'ordainit-toolkit');?>"><i class="fa-brands fa-instagram"></i></a>
                            <?php endif;?>
                           <?php if(!empty($od_team_pinterest_url)):?>
                           <a href="<?php echo esc_url($od_team_pinterest_url, 'ordainit-toolkit');?>"><i class="fa-brands fa-pinterest-p"></i></a>
                           <?php endif;?>
                        </div>
                        <div class="it-contact-inner-list mb-40">
                           <ul>
                              <?php if(!empty($od_team_phone)):?>
                              <li><span><i class="flaticon-phone-call"></i><a href="tel:<?php echo esc_attr($od_team_phone, 'ordainit-toolkit');?>"><?php echo esc_html($od_team_phone, 'ordainit-toolkit');?></a></span></li>
                              <?php endif;?>
                              <?php if(!empty($od_team_email)):?>
                              <li><span><i class="flaticon-email"></i><a href="mailto:<?php echo esc_attr($od_team_email, 'ordainit-toolkit');?>"><?php echo esc_html($od_team_email, 'ordainit-toolkit');?></a></span></li>
                              <?php endif;?>
                              <?php if(!empty($od_team_location_url)):?>
                              <li><span><i class="flaticon-location"></i><a href="<?php echo esc_url($od_team_location_url, 'ordainit-toolkit');?>" target="_blank"><?php echo esc_html($od_team_location, 'ordainit-toolkit');?></a></span></li>
                              <?php endif;?>
                           </ul>
                        </div>
                        <?php if(!empty($od_team_button_url)):?>
                        <div class="it-team-details-left-btn">
                           <a class="it-btn orange-bg" href="<?php echo esc_html($od_team_button_url, 'ordainit-toolkit');?>">
                              <?php echo esc_html($od_team_button_text, 'ordainit-toolkit');?>
                              <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                           </svg>
                           </a>
                        </div>
                        <?php endif;?>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9">
                     <div class="it-team-details-right">
                        <div class="it-team-details-right-title-box">
                           <h4><?php the_title();?></h4>
                           <span><?php echo esc_html($od_team_designation, 'ordainit-toolkit');?></span>
                          <?php the_content();?>
                        </div>
                        <div class="row">
                           <div class="col-xl-6">
                              <div class="it-team-details-right-content it-team-details-right-title-box mb-40">
                                 <h4><?php echo esc_html($od_team_skill_tille, 'ordainit-toolkit');?></h4>
                                 <p><?php echo od_kses($od_team_short_description, 'ordainit-toolkit');?>
                                 </p>
                              </div>
                           </div>
                           <div class="col-xl-6">
                              <div class="it-progress-bar-wrap inner-style">
                                 <?php foreach($od_team_skills as $skill):?>  
                                 <div class="it-progress-bar-item mb-10">
                                    <label><?php echo esc_html($skill['od_skill_name'], 'ordainit-toolkit');?></label>
                                    <div class="it-progress-bar">
                                       <div class="progress">
                                          <div class="progress-bar wow slideInLeft animated" data-wow-delay=".1s" data-wow-duration="2s" role="progressbar" data-width="<?php echo esc_attr($skill['od_skill_percentage_number'], 'ordainit-toolkit');?>%" aria-valuenow="<?php echo esc_attr($skill['od_skill_percentage_number'], 'ordainit-toolkit');?>" aria-valuemin="0" aria-valuemax="100" >
                                             <span><?php echo esc_attr($skill['od_skill_percentage_number'], 'ordainit-toolkit');?>%</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <?php endforeach; ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>


      <!-- Related Team Slider -->


      <div class="it-team-2-area it-team-inner-style-3 pt-160 pb-120 white-bg p-relative z-index-1">
         <div class="it-team-3-shape-2">
            <img src="assets/img/home-04/shape/team-shape-2.png" alt="">
         </div>
         <div class="container">
            <div class="it-team-top pb-70">
               <div class="row">
                  <div class="col-12">
                     <div class="it-team-wrap flex-wrap d-md-flex justify-content-between align-items-end">
                        <h4 class="it-section-title"><?php echo esc_html__('Related Members', 'ordainit-toolkit');?></h4>
                        <div class="it-arrow-box blog-style orange-style">
                           <button class="slider-prev" tabindex="0" aria-label="Previous slide" aria-controls="swiper-wrapper-7137a56077db2265">
                              <span>
                                 <svg width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.469669 6.53033C0.176777 6.23744 0.176777 5.76256 0.469669 5.46967L5.24264 0.696699C5.53553 0.403806 6.01041 0.403806 6.3033 0.696699C6.59619 0.989593 6.59619 1.46447 6.3033 1.75736L2.06066 6L6.3033 10.2426C6.59619 10.5355 6.59619 11.0104 6.3033 11.3033C6.01041 11.5962 5.53553 11.5962 5.24264 11.3033L0.469669 6.53033ZM21 6.75H1V5.25H21V6.75Z" fill="currentcolor"></path>
                                 </svg>
                              </span>
                           </button>
                           <button class="slider-next" tabindex="0" aria-label="Next slide" aria-controls="swiper-wrapper-7137a56077db2265">
                              <span>
                                 <svg width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="currentcolor"></path>
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
                  <div class="it-product-slider-wrap">
                     
                     <div class="swiper-container it-team-active">
                        <div class="swiper-wrapper">

                           <?php


                                 $related_args = array(
                                    'post_type' => 'team',
                                    'posts_per_page' => -1, // Number of related members to show
                                 );

                                 $related_query = new WP_Query($related_args);

                                 if ($related_query->have_posts()) {
                                    while ($related_query->have_posts()) {
                                          $related_query->the_post(); ?>
                                          <div class="swiper-slide">
                                             <div class="it-team-3-item">
                                                <div class="it-team-3-thumb p-relative">
                                                      <img src="<?php the_post_thumbnail_url();?>" alt="">
                                                      <div class="it-team-3-social">
                                                      <?php if(!empty($od_team_fb_url)):?>
                                                         <a href="<?php echo esc_url($od_team_fb_url, 'ordainit-toolkit');?>"><i class="fab fa-facebook-f"></i></a>
                                                      <?php endif;?>
                                                      <?php if(!empty($od_team_twitter_url)):?>
                                                      <a href="<?php echo esc_url($od_team_twitter_url, 'ordainit-toolkit');?>"><i class="fab fa-twitter"></i></a>
                                                      <?php endif;?>
                                                      <?php if(!empty($od_team_instagram_url)):?>
                                                      <a href="<?php echo esc_url($od_team_instagram_url, 'ordainit-toolkit');?>"><i class="fa-brands fa-instagram"></i></a>
                                                      <?php endif;?>
                                                      <?php if(!empty($od_team_pinterest_url)):?>
                                                      <a href="<?php echo esc_url($od_team_pinterest_url, 'ordainit-toolkit');?>"><i class="fa-brands fa-pinterest-p"></i></a>
                                                      <?php endif;?>
                                                      </div>
                                                </div>
                                                <div class="it-team-3-content">
                                                      <h4 class="it-team-3-title"><a class="border-line-black" href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                                      <span><?php echo esc_html(get_field('od_team_designation'), 'ordainit-toolkit');?></span>
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




   




<?php get_footer();  ?>