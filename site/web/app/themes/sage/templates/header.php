<?php use Roots\Sage\Titles; ?>

<header class="banner header clearfix" role="banner">
    <div class="container">
        <a class="brand" href="<?= esc_url(home_url('/')); ?>">
            <img class="header__logo" src="<?= get_template_directory_uri(); ?>/dist/images/tailsup-logo.png">
        </a>
    </div>
    <div class="header__heading-group">
        <?php
        if (is_front_page()) : ?>
            <h1 class="header__organisation-name">Organisation name to go here</h1>
            <p class="header__organisation-tagline">Organisation name to go here</p>
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
