<?php

function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');


function add_scripts()
{
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css', false);
    wp_enqueue_style('navbar-style', get_stylesheet_directory_uri() . '/styles/navbar.css', false);
    wp_enqueue_style('shop-style', get_stylesheet_directory_uri() . '/styles/shop.css', false);
    wp_enqueue_style('footer-style', get_stylesheet_directory_uri() . '/styles/footer.css', false);
    wp_enqueue_style('checkout-style', get_stylesheet_directory_uri() . '/styles/checkout.css', false);
    wp_enqueue_style('ACF-blocks-style', get_stylesheet_directory_uri() . '/styles/ACF-blocks.css', false);
    wp_enqueue_style('cart-style', get_stylesheet_directory_uri() . '/styles/cart.css', false);
    wp_enqueue_style('news-style', get_stylesheet_directory_uri() . '/styles/news.css', false);
    wp_enqueue_script('navbar-script', get_template_directory_uri() . '/js/navbar.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'add_scripts');


function google_fonts()
{
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Montserrat&display=swap', false);
}
add_action('wp_enqueue_scripts', 'google_fonts');


//Navigationsbar

function register_menus()
{
    register_nav_menus(
        array(
            'right-main-menu' => 'Right Main Menu',
            'left-main-menu' => 'Left Main Menu',
            'navigate-footer-menu' => 'Navigate Footer Menu',
            'info-footer-menu' => 'Info Footer Menu',
        )
    );
}
add_action('init', 'register_menus');

//Checkout

function ace_hide_shipping_title($label)
{
    $pos = strpos($label, ': ');
    return substr($label, ++$pos);
}
add_filter('woocommerce_cart_shipping_method_full_label', 'ace_hide_shipping_title');


function my_hide_shipping_when_free_is_available($rates)
{
    $free = array();
    foreach ($rates as $rate_id => $rate) {
        if ('free_shipping' === $rate->method_id) {
            $free[$rate_id] = $rate;
            break;
        }
    }
    return !empty($free) ? $free : $rates;
}
add_filter('woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100);


add_filter('woocommerce_show_page_title', 'bbloomer_hide_shop_page_title');

function bbloomer_hide_shop_page_title($title)
{
    if (is_shop()) $title = false;
    return $title;
}


add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init()
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // Register a block.
        acf_register_block_type(array(
            'name'              => 'homepage_visions',
            'title'             => __('Homepage visions'),
            'description'       => __('A custom homepage vision block.'),
            'render_template'   => 'template-parts/blocks/homepage_visions.php',
            'category'          => 'formatting',
            'icon'              => 'welcome-view-site',
            'keywords'          => array('homepage_visions')
        ));

        if (function_exists('acf_register_block_type')) {

            // Register a block.
            acf_register_block_type(array(
                'name'              => 'homepage_block2',
                'title'             => __('Homepage Block 2'),
                'description'       => __('A custom homepage vision block.'),
                'render_template'   => 'template-parts/blocks/homepage_block2.php',
                'category'          => 'formatting',
                'icon'              => 'welcome-view-site',
                'keywords'          => array('homepage_block2')
            ));
        }
    }
}

add_action('woocommerce_after_shop_loop', 'block2_homepage');
function block2_homepage() { ?>

    <h1>Hejsan från block2</h1>
    <?php include('template-parts/blocks/homepage_block2.php');
}

//En funktion jag hittade online som inkluderar content till valfri sida från en annan sida, post id är input
//Används i woocommerce filen
function cn_include_content($pid) {
	$thepageinquestion = get_post($pid);
	$content = $thepageinquestion->post_content;
	$content = apply_filters('the_content', $content);
	echo $content;
}




