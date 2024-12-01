<?php


// Woocommerce Wishlist & Compare List Shortcode

// Add to Wishlist

// Handle AJAX request to update wishlist
function update_wishlist() {
    // Check if user is logged in
    if (!is_user_logged_in()) {
        wp_send_json_error('User is not logged in.');
    }

    // Get the current user ID
    $user_id = get_current_user_id();
    
    // Get the posted data
    $wishlist = isset($_POST['wishlist']) ? $_POST['wishlist'] : array();
   

    // Update the user's wishlist in user meta
    update_user_meta($user_id, 'wishlist', $wishlist);

    // Send a success response
    wp_send_json_success('Wishlist updated successfully.');
}

// Register AJAX actions for both logged-in users
add_action('wp_ajax_update_wishlist', 'update_wishlist');




function display_wishlist_products() {
    if (!is_user_logged_in()) {
        return '<p>You need to be logged in to view your wishlist.</p>';
    }

    $user_id = get_current_user_id();
    $wishlist = get_user_meta($user_id, 'wishlist', true);

    if (!$wishlist || empty($wishlist)) {
        return '<p>No products in wishlist.</p>';
    }

    $args = array(
        'post_type' => 'product',
        'post__in'  => $wishlist,
        'posts_per_page' => -1
    );

    $query = new WP_Query($args);

    ob_start();
    ?>

    <div id="wishlist-products" class="wishlist-items">
       <div class="container">
        <div class="row">
             <?php
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                global $product;
                $product_id = get_the_ID();
                ?>

                <div  class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30 wow itfadeUp"  data-wow-duration=".9s" data-wow-delay=".3s">
                    <div class="it-shop-item p-relative">
                        <div class="remove">
                        <form class="remove-wishlist-form" data-product-id="<?php echo esc_attr($product_id, 'medito'); ?>" method="POST">
                            <button type="submit" class="remove-from-wishlist"><?php echo esc_html('Remove', 'medito');?></button>
                        </form>
                        </div>
                        <div class="it-shop-thumb fix p-relative">
                            <?php echo woocommerce_get_product_thumbnail(); ?>
                        </div>
                        <div class="it-shop-content text-center">
                            <h3 class="it-shop-title">
                                <a href="<?php the_permalink(); ?>" class="hover-anim"><?php the_title(); ?></a>
                            </h3>
                            <div class="it-shop-price"><?php echo od_kses($product->get_price_html(), 'medito'); ?></div>
                            <?php echo woocommerce_template_loop_add_to_cart();?>

                        </div>
                    </div>
                </div>

                
                <?php
            }
        }
        ?>
        </div>
       </div>
    </div>

    <?php
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('wishlist_view', 'display_wishlist_products');








// Function to pass the wishlist page URL dynamically by searching for the shortcode in page content
function get_wishlist_page_url() {
    // Query to find the page containing the wishlist shortcode
    $pages = get_posts(array(
        'post_type'   => 'page',
        'post_status' => 'publish',
        's'           => '[wishlist_view]', // Searching for the shortcode in the content
    ));

    // Check if we have any pages containing the shortcode
    if ($pages && isset($pages[0])) {
        $wishlist_page_url = get_permalink($pages[0]->ID); // Get the URL of the first matching page
    } else {
        $wishlist_page_url = ''; // Fallback if no page found
    }

    // Pass the URL to JavaScript
    if ($wishlist_page_url) {
        echo '<script type="text/javascript">
                var wishlistPageUrl = "' . esc_url($wishlist_page_url) . '";
              </script>';
    }
}

add_action('wp_footer', 'get_wishlist_page_url');


// Remove From Wishlist Page

function remove_from_wishlist() {
    // Check if user is logged in
    if (!is_user_logged_in()) {
        wp_send_json_error('User is not logged in.');
        return;
    }

    // Get the current user ID
    $user_id = get_current_user_id();

    // Get the product ID from the request
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;

    // Get the current wishlist
    $wishlist = get_user_meta($user_id, 'wishlist', true);

    // Remove the product from the wishlist if it exists
    if (($key = array_search($product_id, $wishlist)) !== false) {
        unset($wishlist[$key]);
        // Update the user's wishlist
        update_user_meta($user_id, 'wishlist', $wishlist);

        wp_send_json_success('Product removed from wishlist.');
    } else {
        wp_send_json_error('Product not found in wishlist.');
    }
}
add_action('wp_ajax_remove_from_wishlist', 'remove_from_wishlist');



// Handle Product Compare Function


// Handle AJAX request to update wishlist
function update_comparelist() {
    // Check if user is logged in
    if (!is_user_logged_in()) {
        wp_send_json_error('User is not logged in.');
    }

    // Get the current user ID
    $user_id = get_current_user_id();
    
    // Get the posted data
    $comparelist = isset($_POST['compare']) ? $_POST['compare'] : array();
   

    // Update the user's wishlist in user meta
    update_user_meta($user_id, 'compare', $comparelist);

    // Send a success response
    wp_send_json_success('Comparelist updated successfully.');
}

// Register AJAX actions for both logged-in users
add_action('wp_ajax_update_comparelist', 'update_comparelist');




function display_compare_products() {
    if (!is_user_logged_in()) {
        return '<p>You need to be logged in to view your Comparelist.</p>';
    }

    $user_id = get_current_user_id();
    $comparelist = get_user_meta($user_id, 'compare', true);

    if (!$comparelist || empty($comparelist)) {
        return '<p>No products in Compare List.</p>';
    }

    $args = array(
        'post_type' => 'product',
        'post__in'  => $comparelist,
        'posts_per_page' => -1
    );

    $query = new WP_Query($args);

    ob_start();
    ?>

    <div id="compare-products" class="comparelist-items">
       <div class="container">
        <div class="row">
             <?php
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                global $product;
                $product_id = get_the_ID();
                ?>

                <div  class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30 wow itfadeUp"  data-wow-duration=".9s" data-wow-delay=".3s">
                    <div class="it-shop-item p-relative">
                        <div class="remove">
                        <form class="remove-compare-form" data-product-id="<?php echo esc_attr($product_id, 'medito'); ?>" method="POST">
                            <button type="submit" class="remove-from-compare"><?php echo esc_html('Remove', 'medito');?></button>
                        </form>
                        </div>
                        <div class="it-shop-thumb fix p-relative">
                            <?php echo woocommerce_get_product_thumbnail(); ?>
                        </div>
                        <div class="it-shop-content text-center">
                            <h3 class="it-shop-title">
                                <a href="<?php the_permalink(); ?>" class="hover-anim"><?php the_title(); ?></a>
                            </h3>
                            <div class="it-shop-price"><?php echo od_kses($product->get_price_html(), 'medito'); ?></div>
                            <?php echo woocommerce_template_loop_add_to_cart();?>

                        </div>
                    </div>
                </div>

                
                <?php
            }
        }
        ?>
        </div>
       </div>
    </div>

    <?php
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('comparelist_view', 'display_compare_products');








// Function to pass the wishlist page URL dynamically by searching for the shortcode in page content
function get_comparelist_page_url() {
    // Query to find the page containing the wishlist shortcode
    $pages = get_posts(array(
        'post_type'   => 'page',
        'post_status' => 'publish',
        's'           => '[comparelist_view]', // Searching for the shortcode in the content
    ));

    // Check if we have any pages containing the shortcode
    if ($pages && isset($pages[0])) {
        $comparelist_page_url = get_permalink($pages[0]->ID); // Get the URL of the first matching page
    } else {
        $comparelist_page_url = ''; // Fallback if no page found
    }

    // Pass the URL to JavaScript
    if ($comparelist_page_url) {
        echo '<script type="text/javascript">
                var ComparelistPageUrl = "' . esc_url($comparelist_page_url) . '";
              </script>';
    }
}

add_action('wp_footer', 'get_comparelist_page_url');


// Remove From Comparelist Page

function remove_from_comparelist() {
    // Check if the user is logged in
    if (!is_user_logged_in()) {
        wp_send_json_error('User is not logged in.');
        return;
    }

    // Get the current user ID
    $user_id = get_current_user_id();

    // Get the product ID from the request
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;

    if ($product_id === 0) {
        wp_send_json_error('Invalid product ID.');
        return;
    }

    // Get the current compare list (ensure it's an array)
    $comparelist = get_user_meta($user_id, 'compare', true);
    if (!is_array($comparelist)) {
        $comparelist = [];
    }

    // Check if the product exists in the compare list
    if (($key = array_search($product_id, $comparelist)) !== false) {
        // Remove the product
        unset($comparelist[$key]);

        // Reindex array and update user meta
        $comparelist = array_values($comparelist);
        update_user_meta($user_id, 'compare', $comparelist);

        wp_send_json_success('Product removed from Comparelist.');
    } else {
        wp_send_json_error('Product not found in Comparelist.');
    }
}
add_action('wp_ajax_remove_from_comparelist', 'remove_from_comparelist');
add_action('wp_ajax_nopriv_remove_from_comparelist', 'remove_from_comparelist'); // For non-logged in users



// Woocommerce Social Share Funcitons

function od_woocommerce_social_share() {
    if (is_product()) {
        // Get the current product URL and title
        $product_url = get_permalink();
        $product_title = get_the_title();

        // Ouodut the social buttons
        echo '<div class="it-shop-details__social">';

        // Facebook Share
        echo '<a href="htods://www.facebook.com/sharer/sharer.php?u=' . urlencode($product_url) . '" target="_blank">';
        echo '<i class="flaticon-facebook-app-symbol"></i>';
        echo '</a>';

        // Twitter Share
        echo '<a href="htods://twitter.com/intent/tweet?text=' . urlencode($product_title) . '&url=' . urlencode($product_url) . '" target="_blank">';
        echo '<i class="fa-brands fa-twitter"></i>';
        echo '</a>';

        // Pinterest Share
        echo '<a href="htods://pinterest.com/pin/create/button/?url=' . urlencode($product_url) . '&description=' . urlencode($product_title) . '" target="_blank">';
        echo '<i class="fa-brands fa-pinterest-p"></i>';
        echo '</a>';

        // Instagram (link only)
        echo '<a href="htods://www.instagram.com/" target="_blank">';
        echo '<i class="flaticon-instagram"></i>';
        echo '</a>';

        // LinkedIn Share
        echo '<a href="htods://www.linkedin.com/shareArticle?mini=true&url=' . urlencode($product_url) . '&title=' . urlencode($product_title) . '" target="_blank">';
        echo '<i class="fa-brands fa-linkedin-in"></i>';
        echo '</a>';

        echo '</div>';
    }
}
