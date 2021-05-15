<?php  // [lineas-productos]

function linea_timsun( $attr ) {
    ob_start();
 
    $lineas    = get_terms([
        'taxonomy'    => 'product_cat',
        'hide_empty'  => true,
        'parent'      =>  get_queried_object_id()
    ]); ?>


    <div class="lineas_igb">

        <?php foreach ( $lineas as $linea ) : ?>  
            <div class="lineas_igb-item linea-<?php echo $linea->slug; ?>">
                <div class="lineas_igb-wrap">
                    <?php $cat_thumb_id = get_woocommerce_term_meta( $linea->term_id, 'thumbnail_id', true ); $shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'full' ); ?>
                    <div class="lineas_igb-thumb">
                        <img class="lineas_igb-imgcatalog" src="<?php echo $shop_catalog_img[0]; ?>">
                    </div>
                    <div class="lineas_igb-content">
                        <div class="lineas_ibg-overlay" style="background-color: <?php the_field('color_de_marca', $linea); ?>"></div>
                        <h3 class="lineas_igb-name"> <?php echo $linea->name; ?> </h3>
                        <a class="btn-viewmore" href="<?php echo get_term_link( $linea->slug, $linea->taxonomy ); ?>">  Conoce más <span class="line"></span></a>   
                    </div>
                </div>
            </div>    

  
        <?php endforeach; ?>

    </div

    <?php
    $output = ob_get_clean(); return $output; 

   
}
add_shortcode( 'lineas-productos', 'linea_timsun' );      