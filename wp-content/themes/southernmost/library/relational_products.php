  <section id="portfolio">
	         
	         
	            <div class="portfolio-container">
	        
						<?php $postcount=1; 
						
						$args = array(
						'post_type' => 'product',
						'posts_per_page' => 3,
						'post__not_in' => array($post->ID)
						);
					$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) :
						while ( $loop->have_posts() ) : $loop->the_post();						
						$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
						
					
						
						?>
						
															
						<div class="portfol<?php if(!$imgsrc) { ?> noimage<?php } ?>"<?php if($wp_query->found_posts == 1) { ?> style="width: 100%"<?php } ?>>
						
						<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
						
						<?php if ( $product->is_on_sale() ) : ?>

							<div class="prodnotes"><?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . __( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?></div>
						
						<?php endif; ?>


							<div class="holster">
					
						<a href="<?php the_permalink(); ?>" class="dropanchor"></a>
						
						<div class="groove" style="background-image: url(<?php echo $imgsrc[0]; ?>);">
						
						</div>
						
						<div class="hip">
						<p class="auth">
									
										<?php

											global $product;
											
											if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' )
												return;
											
											$count   = $product->get_rating_count();
											$average = $product->get_average_rating();
											
											if ( $count > 0 ) : ?>
											
												<div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
													<div class="star-rating" title="<?php printf( __( 'Rated %s out of 5', 'woocommerce' ), $average ); ?>">
														<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
															<strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php _e( 'out of 5', 'woocommerce' ); ?>
														</span>
													</div>
													<a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer reviews', $count, 'woocommerce' ), '<span itemprop="ratingCount" class="count">' . $count . '</span>' ); ?>)</a>
												</div>
											
											<?php endif; ?>
									</p>
									
									
								
								
									<h2><?php	if ( ! defined( 'ABSPATH' ) ) {
										exit; // Exit if accessed directly
									}
									
									global $product;
									?>
									<?php echo $product->get_price_html(); ?>
									
										<meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
										<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
										<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" /></h2å>
							
									
									<h1><?php the_title(); ?></h1>
							
							
							
						</div>
						
					
					</div>
					
	         	</div>
	      
	      		<?php $postcount++;  endwhile; endif; wp_reset_query(); ?>	
			
			
			<div class="clear"></div>			
			</div>	

		
			
				        
			<div class="moreposts">
				
				<a href="<?php bloginfo('url');?>/?page_id=<?php echo get_option( 'woocommerce_shop_page_id' );  ?>" class="letsgo"><?php _e('View All','misfitlang'); ?></a>
				
			</div>
	
			
	  	<!-- super footer  -->
		<?php include(TEMPLATEPATH . '/library/superfooter.php'); ?>
	
	
	    </section>
