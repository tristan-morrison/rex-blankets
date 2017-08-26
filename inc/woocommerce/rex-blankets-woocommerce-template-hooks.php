<?php

/**
 * Rex Blankets WooCommerce hooks
 *
 * @package rex-blankets
 */

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// /* Single Product */
//   // move product title above image
//   add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 15);

?>
