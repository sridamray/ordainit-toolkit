<?php

// Check if ACF is installed and activated
if (function_exists('acf_add_local_field_group')) {

    // Function to dynamically get contact form choices
   
     function get_od_contact_form(){
        if ( ! class_exists( 'WPCF7' ) ) {
            return;
        }
        $od_cfa         = array();
        $od_cf_args     = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
        $od_forms       = get_posts( $od_cf_args );
        $od_cfa         = ['0' => esc_html__( 'Select Form', 'ordainit-toolkit' ) ];
        if( $od_forms ){
            foreach ( $od_forms as $od_form ){
                $od_cfa[$od_form->ID] = $od_form->post_title;
            }
        }else{
            $od_cfa[ esc_html__( 'No contact form found', 'ordainit-toolkit' ) ] = 0;
        }
        return $od_cfa;
    }

    // portfolio Skill Repeater
    acf_add_local_field_group(array(
        'key' => 'od_group_portfolio_slider',
        'title' => 'Portfolio Slider',
        'fields' => array(
            array(
                'key' => 'od_field_portfolio_slider',
                'label' => 'Portfolio Slider',
                'name' => 'od_portfolio_slider',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'od_field_skill_image',
                        'label' => 'Slider Image',
                        'name' => 'od_slider_image',
                        'type' => 'image',
                        'return_format' => 'url', // Return the image URL
                        'preview_size' => 'medium', // Preview size
                    ),
                ),
                'min' => 0,
                'layout' => 'table',
            ),
            
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'portfolios',
                ),
            ),
        ),
    ));
    // Register ACF fields for the 'portfolio' post type
    acf_add_local_field_group(array(
        'key' => 'od_group_portfolio_meta',
        'title' => 'Portfolio Post Sidebar',
        'fields' => array(
            array(
                'key' => 'od_field_portfolio_sidebar_title',
                'label' => 'Title',
                'name' => 'od_portfolio_sidebar_title',
                'type' => 'text',
                'default_value' => esc_html__('project info:','ordainit-toolkit'),
            ),
            array(
                'key' => 'od_field_portfolio_sidebar_date',
                'label' => 'Date',
                'name' => 'od_portfolio_date',
                'type' => 'date_picker',
                'display_format' => 'd/m/Y', // Display format
                'default_value' => 'today', // Default value set to today's date
            ),
            array(
                'key' => 'od_field_portfolio_farmaer_name',
                'label' => 'Name',
                'name' => 'od_portfolio_farmer',
                'type' => 'text',
                'default_value' =>esc_html__('Ramiro Parsons','ordainit-toolkit'),
            ),
            array(
                'key' => 'od_field_portfolio_website',
                'label' => 'Website',
                'name' => 'od_portfolio_website',
                'type' => 'text',
                'default_value' =>esc_html__('https://website.com','ordainit-toolkit'),
            ),
            array(
                'key' => 'od_field_portfolio_location',
                'label' => 'Location',
                'name' => 'od_portfolio_location',
                'type' => 'text',
                'default_value' => esc_html__('Arizona, USA.','ordainit-toolkit'),
            ),
            array(
                'key' => 'od_field_portfolio_duration',
                'label' => 'Duration',
                'name' => 'od_portfolio_duration',
                'type' => 'text',
                'default_value' => esc_html__('06 Months','ordainit-toolkit'),
            ),
          
            array(
                'key' => 'od_field_portfolio_facebook_url',
                'label' => 'Facebook URL',
                'name' => 'od_portfolio_fb_url',
                'type' => 'text',
                'default_value' =>esc_html__('#','ordainit-toolkit'),
            ),  
            array(
                'key' => 'od_field_portfolio_twitter_url',
                'label' => 'Twitter URL',
                'name' => 'od_portfolio_twiiter_url',
                'type' => 'text',
                'default_value' => esc_html__('#','ordainit-toolkit'),
            ),
            array(
                'key' => 'od_field_portfolio_instagram_url',
                'label' => 'Instagram URL',
                'name' => 'od_portfolio_instagram_url',
                'type' => 'text',
                'default_value' => esc_html__('#','ordainit-toolkit'),
            ),
            array(
                'key' => 'od_field_portfolio_pinterest_url',
                'label' => 'Pinterest URL',
                'name' => 'od_portfolio_pinterest_url',
                'type' => 'text',
                'default_value' => esc_html__('#','ordainit-toolkit'),
            ),
            array(
                'key' => 'od_field_portfolio_contact_form',
                'label' => 'Contact Form',
                'name' => 'od_portfolio_contact_form',
                'type' => 'select',
                'choices' => get_od_contact_form(), // Use the dynamic function here
                'default_value' => 'form_1', // Default selected form
                'allow_null' => false,
                'multiple' => false,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'portfolios',
                ),
            ),
        ),
    ));
}




