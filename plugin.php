<?php

namespace ordainit_toolkit;

use ordainit_toolkit\PageSettings\Page_Settings;
use Elementor\Controls_Manager;


/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class OD_Core_Plugin
{

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance()
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Add Category
	 */

	public function od_core_elementor_category($manager)
	{
		$manager->add_category(
			'ordainit-toolkit',
			array(
				'title' => esc_html__('OD Widgets', 'ordainit-toolkit'),
				'icon' => 'eicon-banner',
			)
		);
	}





	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts()
	{
		wp_register_script('ordainit-toolkit', plugins_url('/assets/js/hello-world.js', __FILE__), ['jquery'], false, true);
	}

	/**
	 * Editor scripts
	 *
	 * Enqueue plugin javascripts integrations for Elementor editor.
	 *
	 * @since 1.2.1
	 * @access public
	 */
	public function editor_scripts()
	{
		add_filter('script_loader_tag', [$this, 'editor_scripts_as_a_module'], 10, 2);

		wp_enqueue_script(
			'ordainit-toolkit-editor',
			plugins_url('/assets/js/editor/editor.js', __FILE__),
			[
				'elementor-editor',
			],
			'1.2.1',
			true
		);
	}


	/**
	 * od_enqueue_editor_scripts
	 */
	function od_enqueue_editor_scripts()
	{
		wp_enqueue_style('od-element-addons-editor', ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/css/editor.css', null, '1.0');
	}





	/**
	 * Force load editor script as a module
	 *
	 * @since 1.2.1
	 *
	 * @param string $tag
	 * @param string $handle
	 *
	 * @return string
	 */
	public function editor_scripts_as_a_module($tag, $handle)
	{
		if ('ordainit-toolkit-editor' === $handle) {
			$tag = str_replace('<script', '<script type="module"', $tag);
		}

		return $tag;
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @param Widgets_Manager $widgets_manager Elementor widgets manager.
	 */
	public function register_widgets($widgets_manager)
	{
		// Its is now safe to include Widgets files
		foreach ($this->ordainit_toolkit_widget_list() as $widget_file_name) {
			require_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . "/{$widget_file_name}.php");
		}

		// tutor course widget
		if (function_exists('tutor')) {
			foreach ($this->ordainit_toolkit_widget_list_tutor() as $widget_file_name) {
				require_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . "/{$widget_file_name}.php");
			}
		}

		// Wpeventin
		if (class_exists('Wpeventin')) {
			foreach ($this->ordainit_toolkit_widget_list_events_etn() as $widget_file_name) {
				require_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . "/{$widget_file_name}.php");
			}
		}
	}





	public function ordainit_toolkit_widget_list()
	{
		return [
			'test',
			'hero-banner',
		];
	}


	// ordainit-toolkit_widget_list_tutor
	public function ORDAINIT_TOOLKIT_widget_list_tutor()
	{
		return [
			//'tutor-course',
			//'course-category'
		];
	}






	/**
	 * Add page settings controls
	 *
	 * Register new settings for a document page settings.
	 *
	 * @since 1.2.1
	 * @access private
	 */
	private function add_page_settings_controls()
	{
		require_once(__DIR__ . '/page-settings/manager.php');
		new Page_Settings();
	}


	/**
	 * Register controls
	 *
	 * @param Controls_Manager $controls_Manager
	 */

	public function register_controls(Controls_Manager $controls_Manager)
	{
		include_once(ORDAINIT_TOOLKIT_ADDONS_DIR . '/controls/odgradient.php');
		$odgradient = 'ordainit_toolkit\Elementor\Controls\Group_Control_ODGradient';
		$controls_Manager->add_group_control($odgradient::get_type(), new $odgradient());

		include_once(ORDAINIT_TOOLKIT_ADDONS_DIR . '/controls/odbggradient.php');
		$odbggradient = 'ordainit_toolkit\Elementor\Controls\Group_Control_ODBGGradient';
		$controls_Manager->add_group_control($odbggradient::get_type(), new $odbggradient());
	}




	public function od_add_custom_icons_tab($tabs = array())
	{

		// Append new icons
		$feather_icons = array(
			'feather-activity',
			'feather-airplay',
			'feather-alert-circle',
			'feather-alert-octagon',
			'feather-alert-triangle',
			'feather-align-center',
			'feather-align-justify',
			'feather-align-left',
			'feather-align-right',
		);

		$tabs['od-feather-icons'] = array(
			'name' => 'od-feather-icons',
			'label' => esc_html__('OD - Feather Icons', 'ordainit-toolkit'),
			'labelIcon' => 'od-icon',
			'prefix' => '',
			'displayPrefix' => 'od',
			'url' => ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/css/feather.css',
			'icons' => $feather_icons,
			'ver' => '1.0.0',
		);

		$feather_icons = array(
			'angle-up',
			'check',
			'times',
			'calendar',
			'language',
			'shopping-cart',
			'bars',
			'search',
			'map-marker',
			'arrow-right',
			'arrow-left',
			'arrow-up',
			'arrow-down',
			'angle-right',
			'angle-left',
			'angle-up',
			'angle-down',
			'phone',
			'users',
			'user',
			'map-marked-alt',
			'trophy-alt',
			'envelope',
			'marker',
			'globe',
			'broom',
			'home',
			'bed',
			'chair',
			'bath',
			'tree',
			'laptop-code',
			'cube',
			'cog',
			'play',
			'trophy-alt',
			'heart',
			'truck',
			'user-circle',
			'map-marker-alt',
			'comments',
			'award',
			'bell',
			'book-alt',
			'book-open',
			'book-reader',
			'graduation-cap',
			'laptop-code',
			'music',
			'ruler-triangle',
			'user-graduate',
			'microscope',
			'glasses-alt',
			'theater-masks',
			'atom'
		);

		$tabs['od-fontawesome-icons'] = array(
			'name' => 'od-fontawesome-icons',
			'label' => esc_html__('OD - Fontawesome Pro Light', 'ordainit-toolkit'),
			'labelIcon' => 'od-icon',
			'prefix' => 'fa-',
			'displayPrefix' => 'fal',
			'url' => ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/css/fontawesome-all.min.css',
			'icons' => $feather_icons,
			'ver' => '1.0.0',
		);

		return $tabs;
	}


	// campaign_template_fun
	public function campaign_template_fun($campaign_template)
	{

		if ((get_post_type() == 'campaign') && is_single()) {
			$campaign_template_file_path = __DIR__ . '/include/template/single-campaign.php';
			$campaign_template           = $campaign_template_file_path;
		}
		if ((get_post_type() == 'etn') && is_single()) {
			$campaign_template_file_path = __DIR__ . '/include/template/single-event.php';
			$campaign_template           = $campaign_template_file_path;
		}

		if (! $campaign_template) {
			return $campaign_template;
		}
		return $campaign_template;
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct()
	{

		// Register widget scripts
		add_action('elementor/frontend/after_register_scripts', [$this, 'widget_scripts']);

		// Register widgets
		add_action('elementor/widgets/register', [$this, 'register_widgets']);

		// Register editor scripts
		add_action('elementor/editor/after_enqueue_scripts', [$this, 'editor_scripts']);

		add_action('elementor/elements/categories_registered', [$this, 'od_core_elementor_category'], 1);

		// Register custom controls
		add_action('elementor/controls/controls_registered', [$this, 'register_controls']);

		add_filter('elementor/icons_manager/additional_tabs', [$this, 'od_add_custom_icons_tab']);

		// $this->od_add_custom_icons_tab();

		add_action('elementor/editor/after_enqueue_scripts', [$this, 'od_enqueue_editor_scripts']);

		add_filter('template_include', [$this, 'campaign_template_fun'], 99);

		$this->add_page_settings_controls();
	}
}

// Instantiate Plugin Class
OD_Core_Plugin::instance();
