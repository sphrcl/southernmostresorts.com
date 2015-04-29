<?php 

/* Tag Template

*/

get_header(); ?>



	<div class="curtains">

	

	    	
	
	<!-- home scrollables  -->
	
	    <section id="blogroller">	
	    
	    
	    <div class="cat-info">
    
    		<h1 class="bigheading"><?php single_tag_title( '', true ); ?></h1>
	         <?php echo category_description(); ?>
	    
	    </div>
				
		  <div class="portfolio-container" style="border-top: none; border-bottom: 1px solid #ddd;">
			
				<?php 
				
				
				        if(have_posts()) :
		       			$postcount=1;
		      			while(have_posts()) : the_post();

				$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
				global $wp_query; 
		        ?>
				
				
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
				 <?php endif; ?>
					
      		<!-- home extra footer  -->
			<?php include(TEMPLATEPATH . '/library/superfooter.php'); ?>	
			
			
			
	    </section>	   
	    
	    
	 
	 </div><!-- end curtains -->


<?php get_footer(); ?>