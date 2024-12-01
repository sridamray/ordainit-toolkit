<?php

class OdServicesPost 
{
	function __construct() {
		add_action('init', array($this, 'register_custom_post_type'));
        add_action('init', array($this, 'create_cat'));
        add_filter('template_include', array($this, 'services_template_include'));
	}


	
	public function services_template_include($template) {
		if (is_singular('services')) {
			return $this->get_template('single-services.php');
		}
		return $template;
	}
	
	public function get_template($template) {
		if ($theme_file = locate_template(array($template))) {
			$file = $theme_file;
		} else {
			$file = ORDAINIT_TOOLKIT_ADDONS_DIR . '/include/template/' . $template;
		}
		return apply_filters(__FUNCTION__, $file, $template);
	}



   
	
	public function register_custom_post_type() {
		$labels = array(
			'name'                  => esc_html_x('Services', 'Post Type General Name', 'ordainit-toolkit'),
			'singular_name'         => esc_html_x('Service', 'Post Type Singular Name', 'ordainit-toolkit'),
			'menu_name'             => esc_html__('Service', 'ordainit-toolkit'),
			'name_admin_bar'        => esc_html__('Service', 'ordainit-toolkit'),
			'archives'              => esc_html__('Item Archives', 'ordainit-toolkit'),
			'parent_item_colon'     => esc_html__('Parent Item:', 'ordainit-toolkit'),
			'all_items'             => esc_html__('All Items', 'ordainit-toolkit'),
			'add_new_item'          => esc_html__('Add New Service', 'ordainit-toolkit'),
			'add_new'               => esc_html__('Add New', 'ordainit-toolkit'),
			'new_item'              => esc_html__('New Item', 'ordainit-toolkit'),
			'edit_item'             => esc_html__('Edit Item', 'ordainit-toolkit'),
			'update_item'           => esc_html__('Update Item', 'ordainit-toolkit'),
			'view_item'             => esc_html__('View Item', 'ordainit-toolkit'),
			'search_items'          => esc_html__('Search Item', 'ordainit-toolkit'),
			'not_found'             => esc_html__('Not found', 'ordainit-toolkit'),
			'not_found_in_trash'    => esc_html__('Not found in Trash', 'ordainit-toolkit'),
			'featured_image'        => esc_html__('Featured Image', 'ordainit-toolkit'),
			'set_featured_image'    => esc_html__('Set featured image', 'ordainit-toolkit'),
			'remove_featured_image' => esc_html__('Remove featured image', 'ordainit-toolkit'),
			'use_featured_image'    => esc_html__('Use as featured image', 'ordainit-toolkit'),
			'insert_into_item'      => esc_html__('Insert into item', 'ordainit-toolkit'),
			'uploaded_to_this_item' => esc_html__('Uploaded to this item', 'ordainit-toolkit'),
			'items_list'            => esc_html__('Items list', 'ordainit-toolkit'),
			'items_list_navigation' => esc_html__('Items list navigation', 'ordainit-toolkit'),
			'filter_items_list'     => esc_html__('Filter items list', 'ordainit-toolkit'),
		);

		$args = array(
			'label'                 => esc_html__('Service', 'ordainit-toolkit'),
			'labels'                => $labels,
			'supports'              => array('title', 'editor', 'excerpt', 'thumbnail'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-shield',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);

		// Register the custom post type
		register_post_type('services', $args);

		// Register the custom taxonomy
		$taxonomy_labels = array(
			'name'                       => esc_html_x('Service Categories', 'Taxonomy General Name', 'ordainit-toolkit'),
			'singular_name'              => esc_html_x('Service Category', 'Taxonomy Singular Name', 'ordainit-toolkit'),
			'menu_name'                  => esc_html__('Service Categories', 'ordainit-toolkit'),
			'all_items'                  => esc_html__('All Service Categories', 'ordainit-toolkit'),
			'parent_item'                => esc_html__('Parent Category', 'ordainit-toolkit'),
			'parent_item_colon'          => esc_html__('Parent Category:', 'ordainit-toolkit'),
			'new_item_name'              => esc_html__('New Service Category Name', 'ordainit-toolkit'),
			'add_new_item'               => esc_html__('Add New Service Category', 'ordainit-toolkit'),
			'edit_item'                  => esc_html__('Edit Service Category', 'ordainit-toolkit'),
			'update_item'                => esc_html__('Update Service Category', 'ordainit-toolkit'),
			'view_item'                  => esc_html__('View Service Category', 'ordainit-toolkit'),
			'separate_items_with_commas' => esc_html__('Separate categories with commas', 'ordainit-toolkit'),
			'add_or_remove_items'        => esc_html__('Add or remove categories', 'ordainit-toolkit'),
			'choose_from_most_used'      => esc_html__('Choose from the most used', 'ordainit-toolkit'),
			'popular_items'              => esc_html__('Popular Categories', 'ordainit-toolkit'),
			'search_items'               => esc_html__('Search Categories', 'ordainit-toolkit'),
			'not_found'                  => esc_html__('Not Found', 'ordainit-toolkit'),
			'no_terms'                   => esc_html__('No Service Categories', 'ordainit-toolkit'),
			'items_list'                 => esc_html__('Service Category list', 'ordainit-toolkit'),
			'items_list_navigation'      => esc_html__('Service Category list navigation', 'ordainit-toolkit'),
		);

		$taxonomy_args = array(
			'labels'                     => $taxonomy_labels,
			'hierarchical'               => true, // Set to true for categories
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
		);

		register_taxonomy('services-cat', 'services', $taxonomy_args);
	}
	
	public function create_cat() {
		$labels = array(
			'name'                       => esc_html_x('Service Categories', 'Taxonomy General Name', 'ordainit-toolkit'),
			'singular_name'              => esc_html_x('Service Categories', 'Taxonomy Singular Name', 'ordainit-toolkit'),
			'menu_name'                  => esc_html__('Service Categories', 'ordainit-toolkit'),
			'all_items'                  => esc_html__('All Service Category', 'ordainit-toolkit'),
			'parent_item'                => esc_html__('Parent Item', 'ordainit-toolkit'),
			'parent_item_colon'          => esc_html__('Parent Item:', 'ordainit-toolkit'),
			'new_item_name'              => esc_html__('New Service Category Name', 'ordainit-toolkit'),
			'add_new_item'               => esc_html__('Add New Service Category', 'ordainit-toolkit'),
			'edit_item'                  => esc_html__('Edit Service Category', 'ordainit-toolkit'),
			'update_item'                => esc_html__('Update Service Category', 'ordainit-toolkit'),
			'view_item'                  => esc_html__('View Service Category', 'ordainit-toolkit'),
			'separate_items_with_commas' => esc_html__('Separate items with commas', 'ordainit-toolkit'),
			'add_or_remove_items'        => esc_html__('Add or remove items', 'ordainit-toolkit'),
			'choose_from_most_used'      => esc_html__('Choose from the most used', 'ordainit-toolkit'),
			'popular_items'              => esc_html__('Popular Service Category', 'ordainit-toolkit'),
			'search_items'               => esc_html__('Search Service Category', 'ordainit-toolkit'),
			'not_found'                  => esc_html__('Not Found', 'ordainit-toolkit'),
			'no_terms'                   => esc_html__('No Service Category', 'ordainit-toolkit'),
			'items_list'                 => esc_html__('Service Category list', 'ordainit-toolkit'),
			'items_list_navigation'      => esc_html__('Service Category list navigation', 'ordainit-toolkit'),
		);

		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
		);

		register_taxonomy('services-cat', 'services', array_merge($args, array(
			'hierarchical' => true,
			'show_in_menu' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => true,
			'show_in_rest' => true,
		)));
	}

	
}

new OdServicesPost();
