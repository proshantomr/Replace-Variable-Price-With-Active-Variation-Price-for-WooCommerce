<?php

defined( 'ABSPATH' ) || exit;

class Replace_Variation_Price_With_Active_Variation_Price_Admin {

    /**
     * Constructor for the Replace_Variation_Price_With_Active_Variation_Price_Admin class.
     *
     * Sets up the necessary hooks for enqueuing frontend assets and modifying the product price display.
     *
     * @since 1.0.0
     */
    public function __construct() {
        // Enqueue frontend scripts and styles
        add_action('wp_enqueue_scripts', array($this, 'enqueue_frontend_assets'));

        // Remove price from description
        add_filter('woocommerce_get_price_html', array($this, 'remove_price_from_description'), 10, 2);


    }

    /**
     * Enqueues frontend assets including CSS and JavaScript.
     *
     * This method adds custom JavaScript and CSS files to the frontend. The JavaScript file is
     * used to handle variation price changes, and the CSS file is used to hide the clear button.
     *
     * @since 1.0.0
     */
    public function enqueue_frontend_assets() {
        // Enqueue custom JavaScript for variation price change
        wp_enqueue_script('rvpwavp_frontend_script', RVPWAVP_PLUGIN_URL . 'assets/js/admin.js', array('jquery'), RVPWAVP_VERSION, true);

        // Enqueue custom CSS to hide clear button
        wp_enqueue_style('rvpwavp_frontend_style', RVPWAVP_PLUGIN_URL . 'assets/css/admin.css', array(), RVPWAVP_VERSION);
    }

    /**
     * Removes the price from the product description on single product pages.
     *
     * This method checks if the product is a variable product and whether the price is being
     * displayed in the product description. If so, it removes the price display.
     *
     * @param string $price The price HTML to be displayed.
     * @param WC_Product $product The product object.
     *
     * @return string The modified price HTML (or an empty string if the price should be removed).
     *
     * @since 1.0.0
     */
    public function remove_price_from_description($price, $product) {
        // Check if it's a variable product and we're on a single product page
        if (is_product() && $product->is_type('variable')) {
            // Check if price is being displayed in product description
            if (is_single() && has_shortcode(get_post_field('post_content', get_the_ID()), 'woocommerce_single_product')) {
                return ''; // Remove price display
            }
        }
        return $price;
    }
}


