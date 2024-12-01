<?php

// namespace ordainit-toolkit\Widgets;

// use Elementor\Controls_Manager;
// use Elementor\Group_Control_Base;
// use Elementor\REPEA;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Get All Post Types
 */
function od_get_post_types()
{

    $od_cpts = get_post_types(array('public' => true, 'show_in_nav_menus' => true), 'object');
    $od_exclude_cpts = array('elementor_library', 'attachment');
    foreach ($od_exclude_cpts as $exclude_cpt) {
        unset($od_cpts[$exclude_cpt]);
    }
    $post_types = array_merge($od_cpts);
    foreach ($post_types as $type) {
        $types[$type->name] = $type->label;
    }
    return $types;
}

/**
 * Get all types of post.
 */
function od_get_all_types_post($post_type)
{

    $posts_args = get_posts(array(
        'post_type' => $post_type,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'posts_per_page' => 20,
    ));

    $posts = array();

    if (!empty($posts_args) && !is_wp_error($posts_args)) {
        foreach ($posts_args as $post) {
            $posts[$post->ID] = $post->post_title;
        }
    }

    return $posts;
}

/**
 * Get all Pages
 */
if (!function_exists('od_get_all_pages')) {
    function od_get_all_pages()
    {

        $page_list = get_posts(array(
            'post_type' => 'page',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 20,
        ));

        $pages = array();

        if (!empty($page_list) && !is_wp_error($page_list)) {
            foreach ($page_list as $page) {
                $pages[$page->ID] = $page->post_title;
            }
        }

        return $pages;
    }
}

/**
 * Post Settings Parameter
 */
function od_get_post_settings($settings)
{
    foreach ($settings as $key => $value) {
        $post_args[$key] = $value;
    }
    $post_args['post_status'] = 'publish';

    return $post_args;
}

/**
 * Get Post Thumbnail Size
 */
function od_get_thumbnail_sizes()
{
    $sizes = get_intermediate_image_sizes();
    foreach ($sizes as $s) {
        $ret[$s] = $s;
    }
    return $ret;
}

/**
 * Post Orderby Options
 */
function od_get_orderby_options()
{
    $orderby = array(
        'ID' => 'Post ID',
        'author' => 'Post Author',
        'title' => 'Title',
        'date' => 'Date',
        'modified' => 'Last Modified Date',
        'parent' => 'Parent Id',
        'rand' => 'Random',
        'comment_count' => 'Comment Count',
        'menu_order' => 'Menu Order',
    );
    return $orderby;
}

/**
 * Get Post Categories
 */
function od_get_categories($taxonomy)
{
    $terms = get_terms(array(
        'taxonomy' => $taxonomy,
        'hide_empty' => true,
    ));
    $options = array();
    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            $options[$term->slug] = $term->name;
        }
    }
    return $options;
}

/**
 * Get all Pages
 */
if (!function_exists('od_get_pages')) {
    function od_get_pages()
    {

        $page_list = get_posts(array(
            'post_type' => 'page',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 20,
        ));

        $pages = array();

        if (!empty($page_list) && !is_wp_error($page_list)) {
            foreach ($page_list as $page) {
                $pages[$page->ID] = $page->post_title;
            }
        }

        return $pages;
    }
}

/**
 * Get a translatable string with allowed html tags.
 *
 * @param string $level Allowed levels are basic and intermediate
 * @return string
 */
function od_get_allowed_html_desc($level = 'basic')
{
    if (!in_array($level, ['basic', 'intermediate', 'advance'])) {
        $level = 'basic';
    }

    $tags_str = '<' . implode('>,<', array_keys(od_get_allowed_html_tags($level))) . '>';
    return sprintf(__('This input field has support for the following HTML tags: %1$s', 'ordainit-toolkit'), '<code>' . esc_html($tags_str) . '</code>');
}

/**
 * Get a list of all the allowed html tags.
 *
 * @param string $level Allowed levels are basic and intermediate
 * @return array
 */
function od_get_allowed_html_tags($level = 'basic')
{
    $allowed_html = [
        'b' => [],
        'i' => [
            'class' => [],
        ],
        'u' => [],
        'em' => [],
        'br' => [],
        'abbr' => [
            'title' => [],
        ],
        'span' => [
            'class' => [],
        ],
        'strong' => [],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
            'target' => [],
        ];
    }

    if ($level === 'advance') {
        $allowed_html['ul'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['ol'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['li'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
            'target' => [],
        ];
    }

    return $allowed_html;
}

function od_get_tag3()
{
    $html2 = '';
    if (has_tag()) {
        $html2 .= '<span class="it-blog-2-tag-title">';
        $html2 .= get_the_tag_list('', ' ', '');
        $html2 .= '</span>';
    }
    return $html2;
}

// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function od_kses($raw)
{

    $allowed_tags = array(
        'a'                         => array(
            'class'   => array(),
            'href'    => array(),
            'rel'  => array(),
            'title'   => array(),
            'target' => array(),
        ),
        'abbr'                      => array(
            'title' => array(),
        ),
        'b'                         => array(),
        'blockquote'                => array(
            'cite' => array(),
        ),
        'cite'                      => array(
            'title' => array(),
        ),
        'code'                      => array(),
        'del'                    => array(
            'datetime'   => array(),
            'title'      => array(),
        ),
        'dd'                     => array(),
        'div'                    => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'dl'                     => array(),
        'dt'                     => array(),
        'em'                     => array(),
        'h1'                     => array(),
        'h2'                     => array(),
        'h3'                     => array(),
        'h4'                     => array(),
        'h5'                     => array(),
        'h6'                     => array(),
        'i'                         => array(
            'class' => array(),
        ),
        'img'                    => array(
            'alt'  => array(),
            'class'   => array(),
            'height' => array(),
            'src'  => array(),
            'width'   => array(),
        ),
        'li'                     => array(
            'class' => array(),
        ),
        'ol'                     => array(
            'class' => array(),
        ),
        'p'                         => array(
            'class' => array(),
        ),
        'q'                         => array(
            'cite'    => array(),
            'title'   => array(),
        ),
        'span'                      => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'iframe'                 => array(
            'width'         => array(),
            'height'     => array(),
            'scrolling'     => array(),
            'frameborder'   => array(),
            'allow'         => array(),
            'src'        => array(),
        ),
        'strike'                 => array(),
        'br'                     => array(),
        'strong'                 => array(),
        'data-wow-duration'            => array(),
        'data-wow-delay'            => array(),
        'data-wallpaper-options'       => array(),
        'data-stellar-background-ratio'   => array(),
        'ul'                     => array(
            'class' => array(),
        ),
    );

    if (function_exists('wp_kses')) { // WP is here
        $allowed = wp_kses($raw, $allowed_tags);
    } else {
        $allowed = $raw;
    }

    return $allowed;
}

/**
 * Check elementor version
 *
 * @param string $version
 * @param string $operator
 * @return bool
 */
if (!function_exists('od_is_elementor_version')) {
    function od_is_elementor_version($operator = '<', $version = '2.6.0')
    {
        return defined('ELEMENTOR_VERSION') && version_compare(ELEMENTOR_VERSION, $version, $operator);
    }
}

/**
 * Render icon html with backward compatibility
 *
 * @param array $settings
 * @param string $old_icon_id
 * @param string $new_icon_id
 * @param array $attributes
 */
if (!function_exists('od_render_icon')) {
    function od_render_icon($settings = [], $old_icon_id = 'icon', $new_icon_id = 'selected_icon', $attributes = [])
    {
        // Check if its already migrated
        $migrated = isset($settings['__fa4_migrated'][$new_icon_id]);
        // Check if its a new widget without previously selected icon using the old Icon control
        $is_new = empty($settings[$old_icon_id]);

        $attributes['aria-hidden'] = 'true';

        if (od_is_elementor_version('>=', '2.6.0') && ($is_new || $migrated)) {
            \Elementor\Icons_Manager::render_icon($settings[$new_icon_id], $attributes);
        } else {
            if (empty($attributes['class'])) {
                $attributes['class'] = $settings[$old_icon_id];
            } else {
                if (is_array($attributes['class'])) {
                    $attributes['class'][] = $settings[$old_icon_id];
                } else {
                    $attributes['class'] .= ' ' . $settings[$old_icon_id];
                }
            }
            printf('<i %s></i>', \Elementor\Utils::render_html_attributes($attributes));
        }
    }
}


/**
 * Get all types of post.
 *
 * @param string $post_type
 *
 * @return array
 */
function get_post_list($post_type = 'any')
{
    return get_query_post_list($post_type);
}


/**
 * @param string $post_type
 * @param int $limit
 * @param string $search
 * @return array
 */
function get_query_post_list($post_type = 'any', $limit = -1, $search = '')
{
    global $wpdb;
    $where = '';
    $data = [];

    if (-1 == $limit) {
        $limit = '';
    } elseif (0 == $limit) {
        $limit = "limit 0,1";
    } else {
        $limit = $wpdb->prepare(" limit 0,%d", esc_sql($limit));
    }

    if ('any' === $post_type) {
        $in_search_post_types = get_post_types(['exclude_from_search' => false]);
        if (empty($in_search_post_types)) {
            $where .= ' AND 1=0 ';
        } else {
            $where .= " AND {$wpdb->posts}.post_type IN ('" . join(
                "', '",
                array_map('esc_sql', $in_search_post_types)
            ) . "')";
        }
    } elseif (!empty($post_type)) {
        $where .= $wpdb->prepare(" AND {$wpdb->posts}.post_type = %s", esc_sql($post_type));
    }

    if (!empty($search)) {
        $where .= $wpdb->prepare(" AND {$wpdb->posts}.post_title LIKE %s", '%' . esc_sql($search) . '%');
    }

    $query = "select post_title,ID  from $wpdb->posts where post_status = 'publish' $where $limit";
    $results = $wpdb->get_results($query);
    if (!empty($results)) {
        foreach ($results as $row) {
            $data[$row->ID] = $row->post_title;
        }
    }
    return $data;
}


/**
 * Get all elementor page templates
 *
 * @param null $type
 *
 * @return array
 */
function get_elementor_templates($type = null)
{
    $options = [];

    if ($type) {
        $args = [
            'post_type' => 'elementor_library',
            'posts_per_page' => -1,
        ];
        $args['tax_query'] = [
            [
                'taxonomy' => 'elementor_library_type',
                'field' => 'slug',
                'terms' => $type,
            ],
        ];

        $page_templates = get_posts($args);

        if (!empty($page_templates) && !is_wp_error($page_templates)) {
            foreach ($page_templates as $post) {
                $options[$post->ID] = $post->post_title;
            }
        }
    } else {
        $options = get_query_post_list('elementor_library');
    }

    return $options;
}



/**
 * Slugify
 */
if (!function_exists('od_slugify')) {
    function od_slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}


// Use the following code to get ride of autop (automatic <p> tag) and line breaking tag (<br> tag).
add_filter('wpcf7_autop_or_not', '__return_false');


//get course url from different lms plugins
function eduker_header_search_url()
{
    if (class_exists('SFWD_LMS')) {
        return esc_url(home_url('/courses'));
    } elseif (class_exists('LearnPress')) {
        return esc_url(home_url('/lp-courses'));
    } else {
        return esc_url(home_url('/courses'));
    }
}

/**************************************************
 * Start - Default hooks required for all templates
 *************************************************/

use Etn\Utils\Helper;

if (!function_exists('etn_after_single_event_meta_add_to_calendar')) {

    function etn_after_single_event_meta_add_to_calendar($single_event_id)
    {
        $event_options  = get_option("etn_event_options");
        if (isset($event_options["checked_hide_calendar_from_details"]) || Helper::get_child_events($single_event_id)) {
            return;
        }

?>
        <div class=" etn-widget etn-add-calender-url event__sidebar-widget white-bg mb-20">
            <?php

            do_action('etn_before_add_to_calendar_button');

            (new \Etn\Core\Calendar\Add_Calendar\Add_Calendar())->etn_add_to_google_calender_link($single_event_id);

            do_action('etn_after_add_to_calendar_button');
            ?>
        </div>
    <?php
    }
}






function od_service_init()
{

    /**
     * Service Sidebar
     */
    register_sidebar([
        'name'          => esc_html__('Service Sidebar', 'ordainit-toolkit'),
        'id'            => 'service-sidebar',
        'description'          => esc_html__('Set Your Service Widget', 'ordainit-toolkit'),
        'before_widget' => '<div id="%1$s" class="it-common-sidebar-widget it-blog-sidebar-widget service mb-55 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="it-blog-sidebar-title mb-35">',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init', 'od_service_init');



function get_share_buttons($url, $title)
{
    // Define the share URLs for different social networks
    $twitter_url = 'https://twitter.com/intent/tweet?text=' . urlencode($title) . '&url=' . urlencode($url);
    $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($url);
    $instagram_url = 'https://www.instagram.com/';

    $html = '<a href="' . $facebook_url . '" target="_blank" class="share-button facebook"><i class="fa-brands fa-facebook"></i></a>';
    $html .= '<a href="' . $instagram_url . '" target="_blank" class="share-button instagram"><i class="fa-brands fa-instagram"></i></a>';
    $html .= '<a href="' . $twitter_url . '" target="_blank" class="share-button twitter"><i class="fab fa-twitter"></i></a>';

    echo $html;
}



// Add Image For Service Category Code 
function add_service_category_image_field()
{
    ?>
    <div class="form-field term-group">
        <label for="service-category-image-id"><?php _e('Image', 'ordainit-toolkit'); ?></label>
        <input type="hidden" id="service-category-image-id" name="service-category-image-id" class="custom_media_url" value="">
        <div id="service-category-image-wrapper"></div>
        <p>
            <input type="button" class="button button-secondary service-category-image-upload" id="service-category-image-upload" value="<?php _e('Add Image', 'ordainit-toolkit'); ?>" />
            <input type="button" class="button button-secondary service-category-image-remove" id="service-category-image-remove" value="<?php _e('Remove Image', 'ordainit-toolkit'); ?>" />
        </p>
    </div>
<?php
}
add_action('services-cat_add_form_fields', 'add_service_category_image_field');

// Add image field to edit taxonomy term form
function edit_service_category_image_field($term)
{
    $image_id = get_term_meta($term->term_id, 'service-category-image-id', true);
?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="service-category-image-id"><?php _e('Image', 'ordainit-toolkit'); ?></label>
        </th>
        <td>
            <input type="hidden" id="service-category-image-id" name="service-category-image-id" class="custom_media_url" value="<?php echo $image_id; ?>">
            <div id="service-category-image-wrapper">
                <?php if ($image_id) { ?>
                    <?php echo wp_get_attachment_image($image_id, 'thumbnail'); ?>
                <?php } ?>
            </div>
            <p>
                <input type="button" class="button button-secondary service-category-image-upload" id="service-category-image-upload" value="<?php _e('Add Image', 'ordainit-toolkit'); ?>" />
                <input type="button" class="button button-secondary service-category-image-remove" id="service-category-image-remove" value="<?php _e('Remove Image', 'ordainit-toolkit'); ?>" />
            </p>
        </td>
    </tr>
<?php
}
add_action('services-cat_edit_form_fields', 'edit_service_category_image_field');



// Save image field
function save_service_category_image($term_id)
{
    if (isset($_POST['service-category-image-id']) && '' !== $_POST['service-category-image-id']) {
        $image = $_POST['service-category-image-id'];
        update_term_meta($term_id, 'service-category-image-id', $image);
    } else {
        update_term_meta($term_id, 'service-category-image-id', '');
    }
}
add_action('created_services-cat', 'save_service_category_image');
add_action('edited_services-cat', 'save_service_category_image');

function service_category_enqueue_media()
{
    wp_enqueue_media();
    wp_enqueue_script('service-category-script', get_template_directory_uri() . '/inc/js/service-category-script.js', array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'service_category_enqueue_media');



//This Funciton For Mega Menu code

// Add Custom Field to Menu Items
add_action('wp_nav_menu_item_custom_fields', 'add_custom_nav_fields', 10, 4);
function add_custom_nav_fields($item_id, $item, $depth, $args)
{
    // Get the saved value
    $custom_value = get_post_meta($item_id, '_menu_item_custom_field', true);

    // Get all posts of post type 'mega-menu'
    $mega_menu_posts = get_posts([
        'post_type' => 'mega-menu',
        'posts_per_page' => -1,
    ]);

?>
    <p class="description description-wide">
        <label for="edit-menu-item-custom-field-<?php echo esc_attr($item_id); ?>">
            <?php _e('Select Mega Menu Item'); ?><br>
            <select id="edit-menu-item-custom-field-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-custom-field" name="menu-item-custom-field[<?php echo esc_attr($item_id); ?>]">
                <option value=""><?php _e('Select a mega menu item'); ?></option>
                <?php foreach ($mega_menu_posts as $post): ?>
                    <option value="<?php echo esc_attr($post->ID); ?>" <?php selected($custom_value, $post->ID); ?>><?php echo esc_html($post->post_title); ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </p>
<?php
}

// Save Custom Field Value
add_action('wp_update_nav_menu_item', 'save_custom_nav_fields', 10, 3);
function save_custom_nav_fields($menu_id, $menu_item_db_id, $args)
{
    if (isset($_POST['menu-item-custom-field'][$menu_item_db_id])) {
        update_post_meta($menu_item_db_id, '_menu_item_custom_field', sanitize_text_field($_POST['menu-item-custom-field'][$menu_item_db_id]));
    } else {
        delete_post_meta($menu_item_db_id, '_menu_item_custom_field');
    }
}

// Ensure Custom Field is Available
add_filter('wp_setup_nav_menu_item', 'custom_nav_fields');
function custom_nav_fields($menu_item)
{
    $menu_item->custom_field = get_post_meta($menu_item->ID, '_menu_item_custom_field', true);
    return $menu_item;
}


// Menu Show on page By this code

function my_acf_load_menu_field_choices($field)
{
    // Reset choices
    $field['choices'] = array();

    // Add a placeholder choice
    $field['choices'][''] = 'Select Menu';

    // Get the menus
    $menus = get_terms('nav_menu', array('hide_empty' => true));

    // Add choices
    if ($menus) {
        foreach ($menus as $menu) {
            $field['choices'][$menu->name] = $menu->name;
        }
    }

    // Return the field
    return $field;
}

add_filter('acf/load_field/name=select_menu', 'my_acf_load_menu_field_choices');










// Select contact Form Team Area using Acf Pro

function acf_populate_contact_form_7_choices($field)
{
    // Get all Contact Form 7 forms
    $args = array(
        'post_type' => 'wpcf7_contact_form',
        'posts_per_page' => -1
    );

    $forms = get_posts($args);

    // Reset choices
    $field['choices'] = array();

    // Add 'No form selected' option
    $field['choices'][''] = 'No form selected';

    // Loop through forms and populate the choices
    if ($forms) {
        foreach ($forms as $form) {
            $field['choices'][$form->ID] = $form->post_title;
        }
    }

    return $field;
}
add_filter('acf/load_field/name=select_contact_form', 'acf_populate_contact_form_7_choices');



add_action('elementor/frontend/widget/before_render', function ($widget) {
    if ('accordion' === $widget->get_name()) {
        // Generate a unique ID for the accordion container
        $widget_id = $widget->get_id();
        $unique_accordion_id = 'accordionExample-' . $widget_id;

        // Add ID to accordion container
        $widget->add_render_attribute('_wrapper', 'id', $unique_accordion_id);
    }
}, 10, 1);


// RTL Functions

// Add an option for RTL
function medito_add_rtl_option()
{
    add_option('mcssa_rtl', 'off'); // Default value is 'off'
}
add_action('after_switch_theme', 'medito_add_rtl_option');

// Function to register the settings
function medito_register_settings()
{
    register_setting('medito_options_group', 'mcssa_rtl');
}
add_action('admin_init', 'medito_register_settings');


function mcssa_rtl_admin_page()
{
?>
    <div class="wrap">
        <h1><?php esc_html_e('RTL Settings', 'medito'); ?></h1>
        <form method="post" action="options.php">
            <?php settings_fields('medito_options_group'); ?>
            <label for="mcssa_rtl">
                <input type="checkbox" id="mcssa_rtl" name="mcssa_rtl" value="on" <?php checked('on', get_option('mcssa_rtl')); ?> />
                <?php esc_html_e('Enable RTL', 'medito'); ?>
            </label>
            <?php submit_button(); ?>
        </form>
    </div>
<?php
}

function medito_add_admin_menu()
{
    add_menu_page('RTL Settings', 'RTL Settings', 'manage_options', 'mcssa_rtl', 'mcssa_rtl_admin_page');
}
add_action('admin_menu', 'medito_add_admin_menu');
