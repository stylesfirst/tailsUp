<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

?>

<div class="col-sm-6 col-lg-3 dog-item">

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<a class="dog-item__link" href="<?php the_permalink(); ?>"></a>


  <?php
  if($dogGender = $product->get_attribute('gender') || $dogAge = $product->get_attribute('age')){ ?>
    <p class="dog-item__stats">
      <?php if($dogGender = $product->get_attribute('gender')){ ?>
        <span class="dog-item__gender">
          <?php echo $dogGender; ?> -
        </span>
      <?php } ?>
      <?php if($dogAge = $product->get_attribute('age')){ ?>
        <span class="dog-item__gender">
          <?php echo $dogAge; ?> years old
        </span>
      <?php } ?>
    </p>
  <?php } ?>

  <div class="dog-item__image">
    <?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
    ?>
  </div>
    <?php
			/**
			 * woocommerce_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );

			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
//			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>
  <?php if($dogState = $product->get_attribute('state')){ ?>
    <p class="dog-item__state">
      <?php echo $dogState; ?>
    </p>
  <?php } ?>
  <div class="dog-item__short-description">
    <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
  </div>
	<?php
		/**
		 * woocommerce_after_shop_loop_item hook
		 *
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
//		do_action( 'woocommerce_after_shop_loop_item' );

	?>

</div>
