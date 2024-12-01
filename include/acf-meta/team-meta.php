<?php

// Check if ACF is installed and activated
if (function_exists('acf_add_local_field_group')) {
    // Register ACF fields for the 'team' post type
    acf_add_local_field_group(array(
        'key' => 'od_group_team_meta',
        'title' => 'Team Member Details',
        'fields' => array(
            array(
                'key' => 'od_field_team_designation',
                'label' => 'Team Designation',
                'name' => 'od_team_designation',
                'type' => 'text',
                'default_value' => esc_html__('Talent Rider','ordainit-toolkit'),
            ),
            array(
                'key' => 'od_field_team_phone',
                'label' => 'Team Phone',
                'name' => 'od_team_phone',
                'type' => 'text',
                'default_value' =>esc_html__('008757845682','ordainit-toolkit'),
            ),
            array(
                'key' => 'od_field_team_email',
                'label' => 'Team Email',
                'name' => 'od_team_email',
                'type' => 'text',
                'default_value' =>esc_html__('mcssainfo@gmail.com','ordainit-toolkit'),
            ),
            array(
                'key' => 'od_field_team_location',
                'label' => 'Team Location',
                'name' => 'od_team_location',
                'type' => 'text',
                'default_value' =>esc_html__('Hudson, Wisconsin(WI), 54016','ordainit-toolkit'),
            ),
            array(
                'key' => 'od_field_team_location_url',
                'label' => 'Team Location URL',
                'name' => 'od_team_location_url',
                'type' => 'text',
                'default_value' =>esc_html__('#','ordainit-toolkit'),
            ),
            array(
                'key' => 'od_field_team_twitter_url',
                'label' => 'Twitter URL',
                'name' => 'od_team_twitter_url',
                'type' => 'text',
                'default_value' => esc_html__('#','ordainit-toolkit'),
            ),
            array(
                'key' => 'od_field_team_skype_id',
                'label' => 'Instagram URL',
                'name' => 'od_team_instagram_url',
                'type' => 'text',
                'default_value' => esc_html__('#','ordainit-toolkit'),
            ),
            array(
                'key' => 'od_field_team_linkedin_url',
                'label' => 'Pinterest URL',
                'name' => 'od_team_pinterest_url',
                'type' => 'text',
                'default_value' => esc_html__('#','ordainit-toolkit'),
            ),
            array(
                'key' => 'od_field_team_facebook_url',
                'label' => 'Facebook URL',
                'name' => 'od_team_fb_url',
                'type' => 'text',
                'default_value' =>esc_html__('#','ordainit-toolkit'),
            ),
            array(
                'key' => 'od_field_team_button_text',
                'label' => 'Button Text',
                'name' => 'od_team_button_text',
                'type' => 'text',
                'default_value' =>esc_html__('Contact Us','ordainit-toolkit'),
            ),
            array(
                'key' => 'od_field_team_button_text_url',
                'label' => 'Button URL',
                'name' => 'od_team_button_url',
                'type' => 'text',
                'default_value' =>esc_html__('#','ordainit-toolkit'),
            ),
            // Add more fields as needed
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'team',
                ),
            ),
        ),
    ));
    // Team Skill Repeater
    acf_add_local_field_group(array(
        'key' => 'od_group_team_skill',
        'title' => 'Team Member Skill',
        'fields' => array(
            array(
                'key' => 'od_field_team_skills',
                'label' => 'Skills',
                'name' => 'od_team_skills',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'od_field_skill_name',
                        'label' => 'Skill Name',
                        'name' => 'od_skill_name',
                        'type' => 'text',
                        'default_value' =>esc_html__('Engine Repairing','ordainit-toolkit'),
                    ),
                    array(
                        'key' => 'od_field_skill_percentage_number',
                        'label' => 'Skill Percentage Number',
                        'name' => 'od_skill_percentage_number',
                        'type' => 'text',
                        'default_value' =>esc_html__('90','ordainit-toolkit'),
                    ),
                ),
                'min' => 0,
                'layout' => 'table',
            ),
            
            array(
                'key' => 'od_field_team_skill_title',
                'label' => 'Title',
                'name' => 'od_team_skill_tille',
                'type' => 'text',
                'default_value' =>od_kses('Career guideline','ordainit-toolkit'),
            ),
            // Add more fields as needed
            array(
                'key' => 'od_field_team_skill_description',
                'label' => 'Short Descrition',
                'name' => 'od_team_short_description',
                'type' => 'textarea',
                'default_value' =>od_kses('Standard dummy text ever since the unknown printer took galley of scramble make a type specimen book has the been industr
<br> standard.','ordainit-toolkit'),
            ),
            // Add more fields as needed
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'team',
                ),
            ),
        ),
    ));
}


