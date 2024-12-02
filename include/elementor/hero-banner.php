<?php

namespace ordainit_toolkit\Widgets;

use Elementor\Widget_Base;

if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Hero_Banner extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'hero-banner';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Hero banner', 'ordainit-toolkit');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'od-icon';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['ordainit-toolkit'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends()
    {
        return ['ordainit-toolkit'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/hero-banner.php');
    }

    /**
     * Render the widget ouodut on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $od_title = $settings['od_title'];
        $od_subtitle = $settings['od_subtitle'];
        $od_description = $settings['od_description'];

?>
        <?php if ($settings['od_design_style']  == 'layout-2'): ?>

        <?php elseif ($settings['od_design_style']  == 'layout-3'): ?>


        <?php else: ?>


            <div class="it-hero-area it-hero-3 it-hero-3-space it-about-style-3 grey-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-7">
                            <div class="it-hero-content-wrap p-relative">
                                <div class="it-hero-title-box mb-30">
                                    <span class="it-section-subtitle wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">Hi there-----</span>
                                    <h3 class="it-slider-title text-black mb-20 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">Discover The Best Lovely Places</h3>
                                    <p class="wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam,</p>
                                </div>
                                <div class="it-hero-button-area d-flex align-items-center wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
                                    <div class="it-hero-action mr-20">
                                        <a href="discover.html" class="it-btn-primary">Discover More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5">
                            <div class="it-about-thumb-wrap it-hero-3-thumb-pl d-flex justify-content-center">
                                <div class="it-about-main-thumb z-index p-relative">
                                    <img src="assets/img/home-3/about/thumb/about-3-1.png" alt="">
                                    <span class="it-about-thumb-shape"></span>
                                    <div class="it-about-thumb-rocket d-none d-sm-block">
                                        <img src="assets/img/home-3/about/shape/rocket.png" alt="">
                                    </div>
                                    <div class="it-about-thumb-cloud-1 d-none d-sm-block">
                                        <span>
                                            <svg width="76" height="35" viewBox="0 0 76 35" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5"
                                                    d="M55.577 15.6124L55.625 16.2048L56.2004 16.0561C57.4421 15.7352 58.741 15.5659 60.0801 15.5659C68.5986 15.5659 75.5044 22.4383 75.5 30.9198V30.92C75.5 32.1525 75.351 33.35 75.0752 34.5H33.2708H12.7972H3.01171L12.1893 31.3663L12.5507 31.2429L12.5267 30.8618C12.5044 30.5066 12.4872 30.1652 12.4872 29.8183C12.4872 23.0399 16.6036 17.2192 22.4926 14.7016L22.7457 14.5934L22.7896 14.3216C24.0558 6.4866 30.8772 0.5 39.1069 0.5C47.7824 0.5 54.8915 7.15622 55.577 15.6124Z"
                                                    stroke="currentColor" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="it-about-thumb-cloud-2 d-none d-sm-block">
                                        <span>
                                            <svg width="76" height="35" viewBox="0 0 76 35" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5"
                                                    d="M55.577 15.6124L55.625 16.2048L56.2004 16.0561C57.4421 15.7352 58.741 15.5659 60.0801 15.5659C68.5986 15.5659 75.5044 22.4383 75.5 30.9198V30.92C75.5 32.1525 75.351 33.35 75.0752 34.5H33.2708H12.7972H3.01171L12.1893 31.3663L12.5507 31.2429L12.5267 30.8618C12.5044 30.5066 12.4872 30.1652 12.4872 29.8183C12.4872 23.0399 16.6036 17.2192 22.4926 14.7016L22.7457 14.5934L22.7896 14.3216C24.0558 6.4866 30.8772 0.5 39.1069 0.5C47.7824 0.5 54.8915 7.15622 55.577 15.6124Z"
                                                    stroke="currentColor" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>



        <script>
            "use strict";
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new Hero_Banner());
