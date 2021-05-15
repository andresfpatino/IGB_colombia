<?php 

function products_repuestos() { 

	ob_start();

	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
		'post_type' => 'product',
		'post_status'    => 'publish',
		'order' => 'DESC',
		'posts_per_page' => 9,
		'paged' => $paged,
		'tax_query'      => array( array(
			'taxonomy'   => 'product_cat',
			'field'      => 'term_id',
			'terms'      => array( get_queried_object()->term_id ),
		) )
	);

	$looptwo = new WP_Query( $args ); ?>

		<?php if ( $looptwo->have_posts() ) : ?>
		
			<div class="products-list">
				<?php while ( $looptwo->have_posts() ) : $looptwo->the_post(); ?>
				
					<div class="producto prod-<?php echo get_queried_object()->slug; ?>">
						<div class="prod_gallery">
							<div class="prod_gallery-wrap">
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $looptwo->post->ID ), 'single-post-thumbnail' );?>
								<div class="gallery_thumb">
									<img class="" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"> 
									<p class="title-thumbnail"> <?php echo get_post(get_post_thumbnail_id())->post_title;  ?> </p>
								</div>
								<?php global $product; $attachment_ids = $product->get_gallery_image_ids();
									foreach( $attachment_ids as $attachment_id ) : ?>
										<div class="gallery_thumb">
											<img alt="<?php the_title(); ?>" src=" <?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?> "> 
											<p class="title-thumbnail"> <?php echo get_the_title($attachment_id); ?> </p>
										</div>
									<?php endforeach; ?>	
							</div>
						</div>
						<div class="prod_info">
							<h2 class="prod_title"><?php the_title(); ?> </h2>	
							<p class="prod_description"> <?php echo get_the_excerpt(); ?> </p>
						</div>
					</div>

				<?php endwhile;  wp_reset_postdata(); ?>

			</div>
		<?php endif; 
		
		// Pagination
		if (function_exists('wp_pagenavi')) {
			wp_pagenavi( array( 'query' => $looptwo ) );
		}

		$output = ob_get_clean(); return $output; 
}
add_shortcode( 'product-loop-repuestos', 'products_repuestos' );     


