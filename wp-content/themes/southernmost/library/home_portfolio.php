
 			<?php $bloggerid = get_page_with_template('page_portfolio'); ?>
 			
 			<?php if( $bloggerid ) { ?>
 			
 			<div class="portfolio-info">
	        
	        	
	        	<?php query_posts('post_type=page&p='.$bloggerid); if(have_posts()) : while(have_posts()) : the_post(); ?>
	       
	        	<?php the_content(); ?>	        	
	        	
	        	<?php endwhile; endif; wp_reset_query(); ?>	
	        
	        </div>
	        
	         <?php } ?>
	         
	         
	         <div class="portfolio-container">
	         	
	         	
	         	
	         		<?php 

	         		$my_query = new WP_Query('post_type=project&posts_per_page=12'); if(have_posts()) : while($my_query->have_posts()) : $my_query->the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>



	         	<div class="portfol">
	         	
	         		<div class="holster">
					
						<a href="<?php the_permalink(); ?>" class="dropanchor"></a>
						
						<div class="groove" style="background-image: url(<?php echo $imgsrc[0]; ?>);">
						
						</div>
						
						<div class="hip">
							
							<h1><?php the_title(); ?></h1>
							
						</div>
						
					
					</div>
					
	         	</div>
	      
	      
	      		<?php endwhile; endif; wp_reset_query(); ?>	

	         </div>							

				
				<?php $bloggers = get_page_with_template('page_portfolio');
				  $bloggersurl= get_permalink($bloggers);	
				?>
		        
		        <?php if($bloggers) { ?>
	
				 <div class="moreposts last">
					<a href="<?php echo $bloggersurl; ?>?paged=2" class="letsgo"><i class="flaticon-expand22"></i></a>
				</div>
				
				<?php } ?>