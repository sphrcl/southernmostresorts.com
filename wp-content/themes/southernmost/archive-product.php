<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>


	<div class="curtains">

	

	    	
	
	<!-- home scrollables  -->
	
	    <section id="blogroller">	
	    
 			
 			
 			<div class="cat-info">
	        
	        	
	        	<?php $pid = get_option( 'woocommerce_shop_page_id' ); query_posts(array('post_type' => 'page', 'p' => $pid )); if(have_posts()) : while(have_posts()) : the_post(); ?>
	        	
	        	<h1><?php the_title(); ?></h1>
	       
	        	<?php the_content(); ?>	        	
	        	
	        	<?php endwhile; endif; wp_reset_query(); ?>	
	        
	        </div>
	        
	         
	         <div class="portfolio-container">
	         
	         
	         
						<?php $postcount=1; if ( have_posts() ) : ?>
						<!-- woocommerce product loop -->
						
						<?php while ( have_posts() ) : the_post();
						
						$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
						
						if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

						global $product, $woocommerce_loop;
						
						// Store loop count we're currently on
						if ( empty( $woocommerce_loop['loop'] ) )
							$woocommerce_loop['loop'] = 0;
						
						// Store column count for displaying the grid
						if ( empty( $woocommerce_loop['columns'] ) )
							$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
						
						// Ensure visibility
						if ( ! $product || ! $product->is_visible() )
							return;
						
						// Increase loop count
						$woocommerce_loop['loop']++;
						
						// Extra post classes
						$classes = array();
						if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
							$classes[] = 'first';
						if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
							$classes[] = 'last';
						
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
									
										<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

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
	      
	      		<?php $postcount++;  endwhile;  ?>	
			
			
			<div class="clear"></div>			
			</div>	
			
					

                    <div class="catmo moreposts">
					   	
                       <?php next_posts_link('' .   __(' <i class="flaticon-expand22"></i>' , 'cebolang')) ?>
                       <?php previous_posts_link( __('<i class="flaticon-expand22 flipped"></i> ', 'cebolang') .  '') ?>
                        <div class="clear"></div>
                   
				</div>
				
				<?php else : ?>
				<p class="none"><?php if(!get_previous_posts_link()) { _e('Nothing More Found','misfitlang'); } else { _e('View More Posts','misfitlang'); } ?></p>
				
				<div class="clear"></div>			
			</div>	
				 <?php endif; wp_reset_query(); ?>
					
      		<!-- home extra footer  -->
			<?php include(TEMPLATEPATH . '/library/superfooter.php'); ?>	
			
			
			
	    </section>	   
	    
	    
	 
	 </div><!-- end curtains -->


<?php get_footer('shop'); ?>