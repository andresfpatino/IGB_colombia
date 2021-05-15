<?php

// Disable Gutemberg
add_filter('use_block_editor_for_post', '__return_false', 10);

// Disable scripts emoji
require_once(dirname(__FILE__).'/functions/disable_scripts_emoji.php');

// Style - Scripts 
require_once(dirname(__FILE__).'/functions/wp_enqueue_scripts.php');

// BLOG POSTS 
require_once(dirname(__FILE__).'/shortcodes/shortcode_blog.php');

// Custom size images
require_once(dirname(__FILE__).'/functions/add_image_sizes.php');

// Get directory JS
function loadDirectory() { ?>
    <script type="text/javascript"> var theme_directory = "<?php echo get_stylesheet_directory_uri() ?>"; </script> <?php
} 
add_action('wp_head', 'loadDirectory'); 

// Removes menu WooCommerce
function wpdocs_remove_menus(){
	remove_menu_page( 'woocommerce' );
}
add_action( 'admin_menu', 'wpdocs_remove_menus' );

// Marcas Shortcode 
require_once(dirname(__FILE__).'/shortcodes/query_marcas.php');

// Lineas Shortcode 
require_once(dirname(__FILE__).'/shortcodes/query_lineas.php');

// Get Name term shortcode
require_once(dirname(__FILE__).'/shortcodes/term_name.php');

// Products loop
require_once(dirname(__FILE__).'/shortcodes/product_loop.php');
require_once(dirname(__FILE__).'/shortcodes/product_loop_repuestos.php');
require_once(dirname(__FILE__).'/shortcodes/product_loop_style_tabs.php');