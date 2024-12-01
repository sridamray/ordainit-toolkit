<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'section_content',
    [
        'label' => __('Content hello', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
    ]
);

$this->add_control(
    'show_elements',
    [
        'label' => esc_html__('Show Elements', 'plugin-name'),
        'type' => Controls_Manager::SELECT2,
        'multiple' => true,
        'options' => [
            'title'  => esc_html__('Title', 'plugin-name'),
            'description' => esc_html__('Description', 'plugin-name'),
            'button' => esc_html__('Button', 'plugin-name'),
        ],
        'default' => ['title', 'description'],
    ]
);


// $service_cats = get_terms('project-categories', array('order' => 'DESC'));
// $cat_array = array( '' => 'Select One' );
// foreach($service_cats as $cat) {
//     $cat_array[$cat->slug] = $cat->name;
// }

/**
 * Get Post Categories
 */
// function od_get_categories($taxonomy)
// {
//     $terms = get_terms(array(
//         'taxonomy' => $taxonomy,
//         'hide_empty' => true,
//     ));
//     $options = array();
//     if (!empty($terms) && !is_wp_error($terms)) {
//         foreach ($terms as $term) {
//             $options[$term->slug] = $term->name;
//         }
//     }
//     return $options;
// }


// $this->add_control(
//     'category',
//     [
//         'label' => esc_html__('Include Categories', 'ordainit-toolkit'),
//         'description' => esc_html__('Select a category to include or leave blank for all.', 'ordainit-toolkit'),
//         'type' => Controls_Manager::SELECT2,
//         'multiple' => true,
//         'options' => od_get_categories('project-categories'),
//         'label_block' => true,
//     ]
// );

$this->end_controls_section();

$this->start_controls_section(
    'section_style',
    [
        'label' => __('Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'text_transform',
    [
        'label' => __('Text Transform', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'default' => '',
        'options' => [
            '' => __('None', 'ordainit-toolkit'),
            'uppercase' => __('UPPERCASE', 'ordainit-toolkit'),
            'lowercase' => __('lowercase', 'ordainit-toolkit'),
            'capitalize' => __('Capitalize', 'ordainit-toolkit'),
        ],
        'selectors' => [
            '{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
        ],
    ]
);

$this->end_controls_section();
