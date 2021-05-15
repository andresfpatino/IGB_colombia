<?php  // [blog-igb per-page="9"]

function shortcode_blog_igb($atts){ 
       
    $arg_Post = array(
        'post_type'      => 'post',
        'publish_status' => 'published',
        'posts_per_page' => $atts['per-page'],		
    );
    $queryPosts = new WP_Query($arg_Post);    
    ob_start();	

	if($queryPosts->have_posts()) : ?>
	
    <div class="igb-blog-list">	
		<?php while($queryPosts->have_posts()) : $queryPosts->the_post() ; ?>													
			<div class="igb-bl-item">	
				<div class="igb-bli-inner">
                    <div class="igb-post-image"> 
                        <a href="<?php the_permalink(); ?>" itemprop="url" title="<?php the_title(); ?>">
                            <?php the_post_thumbnail('igb_blog'); ?>
                        </a>
                    </div> 
                    <div class="igb-bli-content">
                        <div class="igb-bli-info">
                            <time itemprop="dateCreated" class="igb-post-info-date entry-date" datetime="<?php echo get_the_date('c'); ?>">
                                <?php echo get_the_date('F j \d\e Y');  ?>
                            </time>
                        </div>
                        <h4 class="igb-post-title" itemprop="name"> 
                            <a href="<?php the_permalink(); ?>" itemprop="url" title="<?php the_title(); ?>"><?php the_title(); ?> </a>
                        </h4> 
                        <div class="igb-post-read-more-button">
                            <a href="<?php the_permalink(); ?>" class="igb-post-btn" itemprop="url">
                                <span class="igb-btn-predefined-line-holder">
                                    <span class="igb-btn-text"> <?php echo _e('Leer más','IGB'); ?> </span>
                                    <span class="igb-btn-line"></span>
                                </span>
                            </a>
                        </div>
                        <span class="igb-post-angle one"></span>
                        <span class="igb-post-angle two"></span>
                        <span class="igb-post-angle three"></span>
                        <span class="igb-post-angle four"></span>
                    </div>                      
                </div>
			</div>
		<?php endwhile; wp_reset_postdata();  ?>				
	</div>
    <?php endif; $output_string = ob_get_contents(); ob_end_clean(); return $output_string; 
} 
add_shortcode( 'blog-igb', 'shortcode_blog_igb' ); 