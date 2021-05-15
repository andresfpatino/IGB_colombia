<?php  // [products-style-tabs]

function products_style_tabs( $attr ) {
    ob_start();
 
    $lineas    = get_terms([
        'taxonomy'    => 'product_cat',
        'hide_empty'  => true,
        'parent'      =>  get_queried_object_id()
    ]);
?>

    <div class="produc-style-tabs">
		<ul class="tabs">
			<?php foreach ( $lineas as $linea ) : ?>  
				<li>
					<a href="#<?php echo $linea->slug; ?>">
						<?php $cat_thumb_id = get_woocommerce_term_meta( $linea->term_id, 'thumbnail_id', true ); $shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'full' ); ?>
						<img class="thumb-tab" src="<?php echo $shop_catalog_img[0]; ?>">
						<h3 class="term-name"> <?php echo $linea->name; ?> </h3>
					</a>
				</li> 
			<?php endforeach; ?>
		</ul>
		<div class="tab_container">
			<?php 
				foreach ( $lineas as $linea ) : 
					$argsProducts = array(
					'post_type' => 'product',
					'post_status'    => 'publish',
					'order' => 'DESC',
					'posts_per_page' => -1,
					'tax_query'      => array( array(
						'taxonomy'   => 'product_cat',
						'field'      => 'term_id',
						'terms'      => $linea->term_id,
					) )
				);
				$loop = new WP_Query( $argsProducts );				
			?>
			
			<div class="tab_content" id="<?php echo $linea->slug; ?>">
				<div class="list_products">
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
						<div class="prod prod-<?php echo get_queried_object()->slug; ?>">
							<?php 							
								$terms = get_the_terms( $post->ID, 'product_cat');
								$color = '';
								foreach ( $terms as $term ) { 
									$color = get_field('color_de_marca', $term); 
								}	
							?>
							<img class="prod_thumbnail" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">						
							<div class="prod_wrap" style="background-color: <?php echo $color; ?>">
								<a href="<?php  echo $image[0]; ?>" class="prod_plus">	
									<h2 class="prod_title"><?php the_title(); ?> </h2>	
									<img class="ico" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/plus.png'; ?>">
								</a>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
			
			<?php endforeach; ?>
			
		</div>	
	</div>

    <?php wp_reset_postdata();
    $output = ob_get_clean(); return $output; 
   
}
add_shortcode( 'products-style-tabs', 'products_style_tabs' );      