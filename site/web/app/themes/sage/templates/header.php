<?php use Roots\Sage\Titles; ?>

<header class="banner header" role="banner">
    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
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
