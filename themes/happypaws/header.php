<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div class="navigation-container">

    <?php
    wp_nav_menu(
      array(
        'theme_location' => 'left-main-menu'
      )
    );
?>

<div class="site-title-navbar">
    <h1><a><?= get_bloginfo('name');?></a></h1>
</div>

<?php
    wp_nav_menu(
      array(
        'theme_location' => 'right-main-menu'
      )
    );
    ?>
  </div>
