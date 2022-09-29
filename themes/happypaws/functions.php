<?php

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

function add_style_script() {
    wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css', false );
}
add_action( 'wp_enqueue_scripts', 'add_style_script' );


function google_fonts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Montserrat&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'google_fonts' );


//Navigationsbar

function register_menus() { 
    register_nav_menus(
        array(
            'right-main-menu' => 'Right Main Menu',
            'left-main-menu' => 'Left Main Menu',
            'footer-menu' => 'Footer Menu',
        )
    ); 
}
add_action( 'init', 'register_menus' );

//$navbar_cart = wp_get_nav_menu_items('top-menu')[8]->title;

