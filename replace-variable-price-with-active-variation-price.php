<?php

/**
* Plugin Name:       Replace Variable Price With Active Variation Price
* Plugin URI:        https://woocopilot.com/plugins/replace-variable-price-with-active-variation-price/
* Description:       "Replace Variable Price With Active Variation Price" for WooCommerce displays the price of the selected product variation directly on the product page, streamlining the shopping experience and boosting conversion rates by eliminating price range confusion.
* Version:           1.0.0
* Requires at least: 6.5
* Requires PHP:      7.2
* Author:            WooCopilot
* Author URI:        https://woocopilot.com/
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:       replace-variable-price-with-active-variation-price
* Domain Path:       /languages
*/

/**
    Replace Variable Price With Active Variation Price is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 2 of the License, or
    any later version.

    Replace Variable Price With Active Variation Price is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Replace Variable Price With Active Variation Price. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */



defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/includes/class-admin-replace-variable-price-with-active-variation-price.php';
require_once __DIR__ . '/includes/class-replace-variable-price-with-active-variation-price.php';

/**
 * Initializing plugin.
 *
 * @since 1.0.0
 * @return object Plugin object.
 */
function replace_variable_price_with_active_variation_price() {
    return new Replace_Variable_Price_With_Active_Variation_Price(__FILE__, '1.0.0');
}
replace_variable_price_with_active_variation_price();
