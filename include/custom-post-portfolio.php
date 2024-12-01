<?php
/**
 * 
 */
class OdPortfolioPost
{
	
	function __construct()
	{
		
		add_action('init', array($this, 'register_custom_post_type'));
        add_action('init', array($this, 'create_cat'));
        add_filter('template_include', array($this, 'portfolio_template_include'));
	}

	public function portfolio_template_include($template) {
		if (is_singular('portfolios')) {
			return $this->get_template('single-portfolios.php');
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
			'name'                  => esc_html_x('Portfolios', 'Post Type General Name', 'ordainit-toolkit'),
			'singular_name'         => esc_html_x('Portfolio', 'Post Type Singular Name', 'ordainit-toolkit'),
			'menu_name'             => esc_html__('Portfolio', 'ordainit-toolkit'),
			'name_admin_bar'        => esc_html__('Portfolio', 'ordainit-toolkit'),
			'archives'              => esc_html__('Item Archives', 'ordainit-toolkit'),
			'parent_item_colon'     => esc_html__('Parent Item:', 'ordainit-toolkit'),
			'all_items'             => esc_html__('All Items', 'ordainit-toolkit'),
			'add_new_item'          => esc_html__('Add New Portfolio', 'ordainit-toolkit'),
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
			'label'                 => esc_html__('Portfolio', 'ordainit-toolkit'),
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

		register_post_type('portfolios', $args);
	}

public function create_cat() {
		$labels = array(
			'name'                       => esc_html_x('Portfolio Categories', 'Taxonomy General Name', 'ordainit-toolkit'),
			'singular_name'              => esc_html_x('Portfolio Categories', 'Taxonomy Singular Name', 'ordainit-toolkit'),
			'menu_name'                  => esc_html__('Portfolio Categories', 'ordainit-toolkit'),
			'all_items'                  => esc_html__('All Portfolio Category', 'ordainit-toolkit'),
			'parent_item'                => esc_html__('Parent Item', 'ordainit-toolkit'),
			'parent_item_colon'          => esc_html__('Parent Item:', 'ordainit-toolkit'),
			'new_item_name'              => esc_html__('New Portfolio Category Name', 'ordainit-toolkit'),
			'add_new_item'               => esc_html__('Add New Portfolio Category', 'ordainit-toolkit'),
			'edit_item'                  => esc_html__('Edit Portfolio Category', 'ordainit-toolkit'),
			'update_item'                => esc_html__('Update Portfolio Category', 'ordainit-toolkit'),
			'view_item'                  => esc_html__('View Portfolio Category', 'ordainit-toolkit'),
			'separate_items_with_commas' => esc_html__('Separate items with commas', 'ordainit-toolkit'),
			'add_or_remove_items'        => esc_html__('Add or remove items', 'ordainit-toolkit'),
			'choose_from_most_used'      => esc_html__('Choose from the most used', 'ordainit-toolkit'),
			'popular_items'              => esc_html__('Popular Portfolio Category', 'ordainit-toolkit'),
			'search_items'               => esc_html__('Search Portfolio Category', 'ordainit-toolkit'),
			'not_found'                  => esc_html__('Not Found', 'ordainit-toolkit'),
			'no_terms'                   => esc_html__('No Portfolio Category', 'ordainit-toolkit'),
			'items_list'                 => esc_html__('Portfolio Category list', 'ordainit-toolkit'),
			'items_list_navigation'      => esc_html__('Portfolio Category list navigation', 'ordainit-toolkit'),
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

		register_taxonomy('portfolio-cat', 'portfolios', $args);
	}






}

new OdPortfolioPost();