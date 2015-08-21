<?php
/**
 * Review order table
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
?>
<?php
foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
  $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

  if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
    ?>
    <div class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
        <?php echo apply_filters('woocommerce_in_cart_product_thumbnail', $_product->get_image(), $cart_item, $cart_item_key); ?>
         <?php echo apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key) . '&nbsp;'; ?>
         <?php echo WC()->cart->get_item_data($cart_item); ?> 
    </div>
  <?php
  }
}
?>
