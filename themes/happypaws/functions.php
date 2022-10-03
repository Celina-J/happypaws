<?php

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


function add_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css', false );
    wp_enqueue_style( 'navbar-style', get_stylesheet_directory_uri() . '/styles/navbar.css', false );
    wp_enqueue_style( 'footer-style', get_stylesheet_directory_uri() . '/styles/footer.css', false );
    wp_enqueue_style( 'checkout-style', get_stylesheet_directory_uri() . '/styles/checkout.css', false );
    wp_enqueue_style( 'cart-style', get_stylesheet_directory_uri() . '/styles/cart.css', false );
    wp_enqueue_script( 'navbar-script', get_template_directory_uri() . '/js/navbar.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'add_scripts' );


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
            'navigate-footer-menu' => 'Navigate Footer Menu',
            'info-footer-menu' => 'Info Footer Menu',
        )
    ); 
}
add_action( 'init', 'register_menus' );

//Checkout

function ace_hide_shipping_title( $label ) {
	$pos = strpos( $label, ': ' );
	return substr( $label, ++$pos );
}
add_filter( 'woocommerce_cart_shipping_method_full_label', 'ace_hide_shipping_title' );



