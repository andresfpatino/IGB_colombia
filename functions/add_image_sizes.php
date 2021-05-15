<?php 

function theme_support() {	
    add_image_size( 'igb_blog', 433, 330, true );   		
} 
add_action( 'after_setup_theme', 'theme_support' );

