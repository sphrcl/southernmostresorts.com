  <section id="portfolio">
	         
	         
	          
	         <div class="portfolio-container">
	         
	         
	         <?php 
				$next_post = get_adjacent_post();  $nextid = $next_post->ID;
		
				$my_query = new WP_Query(
					array(
							
						//'paged' => $paged,
						'post_type' => 'project',
						'p' => $nextid,
						'posts_per_page' => 1
						
					)
				);
		
				if(have_posts()) :
			    while($my_query->have_posts()) : $my_query->the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
				
				<?php $after_post = get_adjacent_post();  $afterid = $after_post->ID; ?>
				
				
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
			
	         	
	         		
	         	<?php if($afterid = $post->ID) {  } else { ?>
					
				<?php 
					
					$my_querys = new WP_Query(
						array(
								
							//'paged' => $paged,
							'post_type' => 'project',
							'p' => $afterid,
							'posts_per_page' => 1
							
						)
					);
			
					if(have_posts()) :
				    while($my_querys->have_posts()) : $my_querys->the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
					
					<?php $final_post = get_adjacent_post();  $finalid = $final_post->ID; ?>
	         	
	         	
	         	
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
		        
	         	<?php } ?>
	         	
	         	
	         	<?php if($finalid = $post->ID) {  } else { ?>

	         	<?php 
		

					$my_queryss = new WP_Query(
						array(
								
							//'paged' => $paged,
							'post_type' => 'project',
							'p' => $finalid,
							'posts_per_page' => 1
							
						)
					);
			
					if(have_posts()) :
				    while($my_queryss->have_posts()) : $my_queryss->the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
					
					<?php $final_post = get_adjacent_post();  $finalid = $final_post->ID; ?>
	         	
	         	
	         	
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
	         	
	         	
	         	<?php } ?>
	         	
	         	<div class="clear"></div>
	         
	         
	         
        		</div>

		
			
				<?php $blogger = get_page_with_template('page_portfolio');
				  $bloggerurl = get_permalink($blogger);	
				?>
		        
			<?php if($blogger) { ?>
			        
			<div class="moreposts">
				
				<a href="<?php echo $bloggerurl; ?>" class="letsgo"><?php _e('View All','misfitlang'); ?></a>
				
			</div>
	
			<?php } ?>
				
				
	  	<!-- super footer  -->
		<?php include(TEMPLATEPATH . '/library/superfooter.php'); ?>
	
	
	    </section>
