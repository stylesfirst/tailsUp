<?php use Roots\Sage\Titles; ?>

<header class="banner header clearfix" role="banner">
  <?php
  if ( sizeof( WC()->cart->cart_contents) > 0 && !is_checkout() ) : ?>
    <div class="header__finish-message">
      It looks like you're applying for <?php echo sprintf (_n( '%d dog.', '%d dogs.', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?>
      <a class="header__apply-link" href="<?php echo WC()->cart->get_checkout_url(); ?>" title="<?php _e( 'Submit your application' ); ?>">
        Finish your application
      </a> or
      <a class="header__cancel-link" href="?empty-cart" title="<?php _e( 'Submit your application' ); ?>">
        Cancel
      </a>
    </div>
  <?php endif ?>

    <div class="container">
        <a class="brand" href="<?= esc_url(home_url('/')); ?>">
            <img class="header__logo" src="<?= get_template_directory_uri(); ?>/dist/images/tailsup-logo.png">
        </a>
    </div>
    <div class="header__heading-group">
        <?php
        if (is_front_page()) : ?>
            <h1 class="header__organisation-name">Organisation name here</h1>
            <p class="header__organisation-tagline">Organisation tagline here</p>
        <?php
        else : ?>
            <h1 class="header__page-heading"><?= Titles\title(); ?></h1>
        <?php
        endif; ?>
    </div>
    <nav role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </nav>
</header>
