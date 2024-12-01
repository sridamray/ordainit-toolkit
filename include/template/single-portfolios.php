<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  ordainit-toolkit
 */
get_header(); 


$od_portfolio_slider = function_exists( 'get_field' ) ? get_field( 'od_portfolio_slider' ) : NULL;
$od_portfolio_sidebar_title = function_exists( 'get_field' ) ? get_field( 'od_portfolio_sidebar_title' ) : NULL;
$od_portfolio_date = function_exists( 'get_field' ) ? get_field( 'od_portfolio_date' ) : NULL;
$od_portfolio_farmer = function_exists( 'get_field' ) ? get_field( 'od_portfolio_farmer' ) : NULL;
$od_portfolio_website = function_exists( 'get_field' ) ? get_field( 'od_portfolio_website' ) : NULL;
$od_portfolio_location = function_exists( 'get_field' ) ? get_field( 'od_portfolio_location' ) : NULL;
$od_portfolio_duration = function_exists( 'get_field' ) ? get_field( 'od_portfolio_duration' ) : NULL;
$od_portfolio_fb_url = function_exists( 'get_field' ) ? get_field( 'od_portfolio_fb_url' ) : NULL;
$od_portfolio_twiiter_url = function_exists( 'get_field' ) ? get_field( 'od_portfolio_twiiter_url' ) : NULL;
$od_portfolio_instagram_url = function_exists( 'get_field' ) ? get_field( 'od_portfolio_instagram_url' ) : NULL;
$od_portfolio_pinterest_url = function_exists( 'get_field' ) ? get_field( 'od_portfolio_pinterest_url' ) : NULL;
$od_portfolio_contact_form = function_exists( 'get_field' ) ? get_field( 'od_portfolio_contact_form' ) : NULL;



?>

<div class="it-pro-details-area pt-120 pb-120">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-4 order-1 order-lg-0">
                  <div class="it-pro-details-left">
                     <div class="it-pro-details-info mb-60">
                        <span><?php echo esc_html($od_portfolio_sidebar_title, 'ordainit-toolkit');?></span>
                        <ul>
                           <li>
                              <span>
                                 <?php echo esc_html__('Date:');?>
                                 <i><?php echo esc_html($od_portfolio_date, 'ordainit-toolkit');?></i>                                 
                              </span>
                           </li>
                           <li>
                              <span>
                                <?php echo esc_html__('Name:');?>
                                 <i><?php echo esc_html($od_portfolio_farmer, 'ordainit-toolkit');?></i>                                 
                              </span>
                           </li>
                           <li>
                              <span>
                              
                                 <span class="d-block"> <?php echo esc_html__('Website:');?></span>
                                 <a class="border-line-white d-inline-block" href="<?php echo esc_url($od_portfolio_website, 'ordainit-toolkit');?>"><?php echo esc_html($od_portfolio_website, 'ordainit-toolkit');?></a>                                   
                              </span>
                           </li>
                           <li>
                              <span>
                                  <?php echo esc_html__('Location:');?>
                                 <i><?php echo esc_html($od_portfolio_location, 'ordainit-toolkit');?></i>                                 
                              </span>
                           </li>
                           <li>
                              <span>
                                 <?php echo esc_html__('Duration:');?>
                                 <i><?php echo esc_html($od_portfolio_duration, 'ordainit-toolkit');?></i>
                              </span>
                           </li>
                           <li>
                              <div class="it-pro-details-social">
                                 <a href="<?php echo esc_url($od_portfolio_fb_url);?>"><i class="fa-brands fa-facebook-f"></i></a>
                                 <a href="<?php echo esc_url($od_portfolio_twiiter_url);?>"><i class="fa-brands fa-twitter"></i></a>
                                 <a href="<?php echo esc_url($od_portfolio_instagram_url);?>"><i class="fa-brands fa-instagram"></i></a>
                                 <a href="<?php echo esc_url($od_portfolio_pinterest_url);?>"><i class="fa-brands fa-pinterest-p"></i></a>
                              </div>
                           </li>
                        </ul>
                     </div>
                     <div class="it-signup-wrap">
                          <?php echo do_shortcode( '[contact-form-7  id="'.$od_portfolio_contact_form.'"]' ); ?> 
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-8 order-0 order-lg-1">
                  <div class="it-pro-details-right">
                     <div class="it-pro-details-tab-box mb-50">
                        <div class="it-pro-details__tab-content-box mb-30">
                           <div class="tab-content" id="nav-tabContent">
                              <?php 
                                 $i =0;
                                 foreach($od_portfolio_slider as $single_portfolio_item):
                                 $i++;
                                 $single_portfolio_item_img_url = $single_portfolio_item['od_slider_image'];
                              ?>
                              <div class="tab-pane fade  <?php echo ($i === 1) ? 'show active' : ''; ?> " id="nav-<?php echo esc_attr($i, 'ordainit-toolkit');?>" role="tabpanel" aria-labelledby="nav-<?php echo esc_attr($i, 'ordainit-toolkit');?>-tab">
                                 <div class="it-pro-details__tab-big-img">
                                    <img src="<?php echo esc_url($single_portfolio_item_img_url, 'ordainit-toolkit');?>" alt="">
                                 </div>
                              </div>
                              <?php endforeach; ?>
                              
                           </div>
                        </div>
                        <div class="it-pro-details__tab-btn-box">
                           <nav>
                              <div class="nav nav-tab justify-content-center" id="nav-tab" role="tablist">
                                 
                              <?php 
                                 $i =0;
                                 foreach($od_portfolio_slider as $single_portfolio_item2):
                                 $i++;
                                 $single_portfolio_item_img_url2 = $single_portfolio_item2['od_slider_image'];
                              ?>
                                 <button class="nav-links <?php echo ($i === 1) ? 'active' : ''; ?> " id="nav-<?php echo esc_attr($i, 'ordainit-toolkit');?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo esc_attr($i, 'ordainit-toolkit');?>" type="button" role="tab" aria-controls="nav-<?php echo esc_attr($i, 'ordainit-toolkit');?>" aria-selected="<?php echo ($i === 1) ? 'true' : 'false'; ?>">
                                    <img src="<?php echo esc_url($single_portfolio_item_img_url2, 'ordainit-toolkit');?>" alt="">
                                 </button>
                                 
                              <?php endforeach; ?>
                                 
                              </div>
                           </nav>
                        </div>
                     </div>
                     <?php the_content(); ?>
                  </div>
               </div>
            </div>
         </div>
      </div>

      
  
  



<?php get_footer();?>