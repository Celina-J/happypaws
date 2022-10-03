<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div class="navigation-container">
    <div class="navigation-content">
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'left-main-menu'
        )
      );
      ?>

      <div class="site-title-navbar">
        <h1><a href="/"><?= get_bloginfo('name'); ?></a></h1>
      </div>

      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'right-main-menu'
        )
      );
      ?>
    </div>
  </div>