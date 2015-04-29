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
				
		 <div class="essay-container">
			
				<?php 
				
				
				        if(have_posts()) :
		       			$postcount=1;
		      			while(have_posts()) : the_post();

				$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
				global $wp_query; 
		        ?>
				
				<?php if( ($postcount % 3) == 0 ) { ?><div class="clear"></div><?php } ?>		
				
				<div class="<?php if(!$imgsrc){ ?>noimg <?php } ?><?php if( ($postcount % 3) == 0 ) { ?>essay-whole<?php } elseif(($postcount % 2) == 0 ) { ?>essay-half right<?php } else { ?>essay-half left<?php } ?>"<?php if(get_post_meta($post->ID, 'misfit_bgcolor',true)) { ?> style="background-color: <?php echo get_post_meta($post->ID, 'misfit_bgcolor',true); ?>;"<?php } ?>>
				
					<div class="holster">
					
						<a href="<?php the_permalink(); ?>" class="dropanchor"></a>
						
						<div class="groove" style="background-image: url(<?php echo $imgsrc[0]; ?>);">
						
						</div>
						
						<div class="hip">
							<h3><?php the_time('F j, Y'); ?></h3>
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