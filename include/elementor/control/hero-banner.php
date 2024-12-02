<?php

use Elementor\Controls_Manager;

// layout Panel
$this->start_controls_section(
    'od_layout',
    [
        'label' => esc_html__('Design Layout', 'ordainit-toolkit'),
    ]
);
$this->add_control(
    'od_design_style',
    [
        'label' => esc_html__('Select Layout', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'layout-1' => esc_html__('Layout 1', 'ordainit-toolkit'),
            'layout-2' => esc_html__('Layout 2', 'ordainit-toolkit'),
            'layout-3' => esc_html__('Layout 3', 'ordainit-toolkit'),
        ],
        'default' => 'layout-1',
    ]
);

$this->end_controls_section();

$this->start_controls_section(
    'od_section_content',
    [
        'label' => __('Title & Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Title', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_subtitle',
    [
        'label' => __('Subtitle', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Subtitle', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_description',
    [
        'label' => __('Description', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => esc_html__('OD Description', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);





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
