<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/utils.php',                 // Utility functions
  'lib/init.php',                  // Initial theme setup and constants
  'lib/wrapper.php',               // Theme wrapper class
  'lib/conditional-tag-check.php', // ConditionalTagCheck class
  'lib/config.php',                // Configuration
  'lib/assets.php',                // Scripts and stylesheets
  'lib/titles.php',                // Page titles
  'lib/extras.php',                // Custom functions
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


//Remove quantity field
function wc_remove_all_quantity_fields( $return, $product ) {
  return true;
}
add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );

//Remove reviews tab
add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
function wcs_woo_remove_reviews_tab($tabs) {
  unset($tabs['reviews']);
  return $tabs;
}
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

//Change add to cart text
function woo_custom_cart_button_text() {
  return __( 'Apply to adopt', 'woocommerce' );
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +

add_filter( 'woocommerce_order_button_text', create_function( '', 'return "Submit application";' ) );

//Skip cart review page
function wc_redirect_to_checkout() {
  $checkout_url = WC()->cart->get_checkout_url();

  return $checkout_url;
}
add_filter( 'woocommerce_add_to_cart_redirect', 'wc_redirect_to_checkout' );

//Customise the checkout page
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
  $fields['billing']['billing_first_name']['label'] = 'Name';
  unset($fields['billing']['billing_last_name']);
  unset($fields['billing']['billing_company']);
  unset($fields['billing']['billing_country']);
  unset($fields['order']['order_comments']);

  return $fields;
}

function bd_rrp_price_html( $price, $product ) {
  $return_string = 'Adoption Fee: ' . $price;
  return $return_string;
}
add_filter( 'woocommerce_get_price_html', 'bd_rrp_price_html', 100, 2 );

add_filter( 'wc_add_to_cart_message', 'custom_add_to_cart_message' );
function custom_add_to_cart_message() {
  if ( get_option( 'woocommerce_cart_redirect_after_add' ) == 'yes' ) :
    $return_to  = apply_filters( 'woocommerce_continue_shopping_redirect', wp_get_referer() ? wp_get_referer() : home_url() );
    $message    = sprintf('<a href="%s" class="button wc-forward">%s</a>', $return_to, __( 'Continue Shopping', 'woocommerce' ) );
  else :
    $message = '';
  endif;
  return $message;
}

// check for empty-cart get param to clear the cart
add_action( 'init', 'woocommerce_clear_cart_url' );
function woocommerce_clear_cart_url() {

  if ( isset( $_GET['empty-cart'] ) ) {
    WC()->cart->empty_cart();
  }
}

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function organisation_customizer( $wp_customize ) {
  $wp_customize->add_section(
    'organisation_details',
    array(
      'title' => 'Organisation details',
      'description' => 'Information about your organisation.',
      'priority' => 10,
    )
  );
  $wp_customize->add_setting(
    'name_textbox',
    array(
      'default' => 'Organisation name',
      'sanitize_callback' => 'sanitize_text',
    )
  );
  $wp_customize->add_control(
    'name_textbox',
    array(
      'label' => 'Organisation Name',
      'section' => 'organisation_details',
      'type' => 'text',
    )
  );
  $wp_customize->add_setting(
    'tagline_textbox',
    array(
      'default' => 'Organisation tagline',
      'sanitize_callback' => 'sanitize_text',
    )
  );
  $wp_customize->add_control(
    'tagline_textbox',
    array(
      'label' => 'Organisation Tagline',
      'section' => 'organisation_details',
      'type' => 'text',
    )
  );
  $wp_customize->add_setting(
    'bio_textarea',
    array(
      'default' => 'Organisation bio',
      'sanitize_callback' => 'sanitize_text',
    )
  );
  $wp_customize->add_control(
    'bio_textarea',
    array(
      'label' => 'Organisation Bio',
      'section' => 'organisation_details',
      'type' => 'textarea',
    )
  );
  function sanitize_text( $input ) {
    return wp_kses_post( $input );
  }
}
add_action( 'customize_register', 'organisation_customizer' );

