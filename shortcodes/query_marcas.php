<?php  

// [marca-llantas]
function shortcode_marcas_llantas( $atts ) {
    ob_start(); 
    $marca_llanta = get_terms( 'product_cat', array( 'hide_empty' => 0, 
                            'slug' => [ 'timsun', 'donin', 'powermax'], 
                            'exclude'  => 20,));  ?>    
    <div class="marcas_ibg llantas">
        <?php foreach ($marca_llanta as $llanta) : ?>    
            <div class="marcas_ibg-item marca-<?php echo $llanta->slug; ?>">
                <?php $cat_thumb_id = get_woocommerce_term_meta( $llanta->term_id, 'thumbnail_id', true ); $shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'full' ); ?>
                <div class="marcas_ibg-inner">
                    <div class="marcas_ibg-content">
                        <!-- Logo marca -->
                        <?php $logo_marca = get_field('logo_de_marca', $llanta);
                        if( !empty( $logo_marca ) ): ?> 
                            <a href="<?php echo get_term_link( $llanta->slug, $llanta->taxonomy ); ?>">
                                <img class="marcas_ibg-logo" src="<?php echo esc_url($logo_marca['url']); ?>" alt="" /> 
                            </a>
                        <?php endif; ?>
                        <!-- descripcion -->
                        <p class="marcas_ibg--description"> <?php  echo $llanta->description; ?> </p>
                        <!-- button -->
                        <a class="marcas_ibg-readmore" style="background-color:<?php the_field('color_de_marca', $llanta); ?>" href="<?php echo get_term_link( $llanta->slug, $llanta->taxonomy ); ?>"> Conoce más </a>
                        <!-- Thumb marca -->
                        <img class="marcas_ibg-imgcatalog" src="<?php echo $shop_catalog_img[0]; ?>">
                    </div>
                </div>
                <div class="marcas_ibg-angle --top"></div>
                <div class="marcas_ibg-angle --bottom"></div>
                <style type="text/css">
                    <?php echo '.marca-' . $llanta->slug; ?> .marcas_ibg-angle.--top::before,
                    <?php echo '.marca-' . $llanta->slug; ?> .marcas_ibg-angle.--bottom::after {
                        border-color: <?php the_field('color_de_marca', $llanta); ?>;
                    }
                </style>
            </div>      
        <?php endforeach;  wp_reset_query(); ?>
    </div>
    <?php $output = ob_get_clean(); return $output; 
}
add_shortcode( 'marca-llantas', 'shortcode_marcas_llantas' );      

// [marca-repuestos]
function shortcode_marcas_repuestos( $atts ) {
    ob_start(); 
    $marca_llanta = get_terms( 'product_cat', array( 'hide_empty' => 0, 
                            'slug' => [ 'revo', 'genui', 'scoot-parts', 'sukiparts', 'skyflow', 'apple-gasket'], 
                            'exclude'  => 20,));  ?>    
    <div class="marcas_ibg repuestos">
        <?php foreach ($marca_llanta as $llanta) : ?>    
            <div class="marcas_ibg-item marca-<?php echo $llanta->slug; ?>">
                <?php $cat_thumb_id = get_woocommerce_term_meta( $llanta->term_id, 'thumbnail_id', true ); $shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'full' ); ?>
                <div class="marcas_ibg-inner">
                    <div class="marcas_ibg-content">
                        <!-- Logo marca -->
                        <?php $logo_marca = get_field('logo_de_marca', $llanta);
                        if( !empty( $logo_marca ) ): ?> 
                            <a href="<?php echo get_term_link( $llanta->slug, $llanta->taxonomy ); ?>">
                                <img class="marcas_ibg-logo" src="<?php echo esc_url($logo_marca['url']); ?>" alt="" /> 
                            </a>
                        <?php endif; ?>
                        <!-- descripcion -->
                        <p class="marcas_ibg--description"> <?php  echo $llanta->description; ?> </p>
                        <!-- button -->
                        <a class="marcas_ibg-readmore" style="background-color:<?php the_field('color_de_marca', $llanta); ?>" href="<?php echo get_term_link( $llanta->slug, $llanta->taxonomy ); ?>"> Conoce más </a>
                        <!-- Thumb marca -->
                        <img class="marcas_ibg-imgcatalog" src="<?php echo $shop_catalog_img[0]; ?>">
                    </div>
                </div>
                <div class="marcas_ibg-angle --top"></div>
                <div class="marcas_ibg-angle --bottom"></div>
                <style type="text/css">
                    <?php echo '.marca-' . $llanta->slug; ?> .marcas_ibg-angle.--top::before,
                    <?php echo '.marca-' . $llanta->slug; ?> .marcas_ibg-angle.--bottom::after {
                        border-color: <?php the_field('color_de_marca', $llanta); ?>;
                    }
                </style>
            </div>      
        <?php endforeach;  wp_reset_query(); ?>
    </div>
    <?php $output = ob_get_clean(); return $output; 
}
add_shortcode( 'marca-repuestos', 'shortcode_marcas_repuestos' ); 