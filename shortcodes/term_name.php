<?php 

function title_shortcode() { 
    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );     
    echo $term->name;
}
add_shortcode( 'title', 'title_shortcode' );     