<?php

// Check if ACF is installed and activated
if (function_exists('acf_add_local_field_group')) {

   

    // portfolio Skill Repeater
    acf_add_local_field_group(array(
        'key' => 'od_group_service_meta',
        'title' => 'Service Extra Meta',
        'fields' => array(
           array(
                'key' => 'od_field_service_image',
                'label' => 'Popup Image',
                'name' => 'od_service_popup_image',
                'type' => 'image',
                'default_value' => ORDAINIT_TOOLKIT_ADDONS_URL .'assets/dummy/inner/service-details/details-3.jpg',
            ),
           array(
                'key' => 'od_field_service_url',
                'label' => 'Vide URL',
                'name' => 'od_service_popup_video_url',
                'type' => 'text',
                'default_value' => esc_html__('#', 'ordainit-toolkit'),
            ),
           array(
                'key' => 'od_field_service_extra_text',
                'label' => 'Extra Text',
                'name' => 'od_service_extra_text',
                'type' => 'textarea',
            ),
            
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'services',
                ),
            ),
        ),
    ));
  
}




