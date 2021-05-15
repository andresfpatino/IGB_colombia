<?php 

function products_igb() { 

	ob_start();

	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	$args = array(
		'post_type' => 'product',
		'post_status'    => 'publish',
		'order' => 'DESC',
		'posts_per_page' => 9,
		//'numberposts' => -1,
		'paged' => $paged,
		'tax_query'      => array( array(
			'taxonomy'   => 'product_cat',
			'field'      => 'term_id',
			'terms'      => array( get_queried_object()->term_id ),
		) )
	);

	$loop = new WP_Query( $args ); ?>

		<?php if ( $loop->have_posts() ) : ?>
		
			<ul class="list_products">
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

				<?php 
					endwhile;
					// wp_reset_postdata();
				?>

			</ul>
		
		<?php
			// Pagination
			if (function_exists('wp_pagenavi')) {
				wp_pagenavi( array( 'query' => $loop ) );
			}	
		
		endif; 
	
		wp_reset_query();
	
		$output = ob_get_clean(); return $output; 
}
add_shortcode( 'product-loop', 'products_igb' );     


