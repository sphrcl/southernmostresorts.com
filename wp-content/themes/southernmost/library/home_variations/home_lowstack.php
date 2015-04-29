  	 <section id="intro" class="pagers homepagebanner">
	        
	        
	        
	  		<div class="bannercontainer">

		        <?php 

		        	$pagename = get_option('misfit_primetwo');
					$page = get_page_by_title($pagename);
					$featured_id =  $page->ID;
						
			    	query_posts(
						
						array(
							'post_type' => 'page',
							'p' => $featured_id,
							'posts_per_page' => -1
						)
				
					); if(have_posts()) : while(have_posts()) : the_post(); 

				?>

				<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
				
				<?php $banner = get_post_meta($post->ID, 'misfit_bannerimage',true); ?>
			         
		       <div class="banneracross pagelength" style="background-image: url(<?php if($banner) { echo $banner; } else { echo $imgsrc[0]; } ?>); border-bottom: 0;">	  
		      
		       		<a style="" href="<?php the_permalink(); ?>"></a>
		       		
		       </div>

		       <h1 class="solidarity"><?php the_title(); ?></h1>	      
		       
		       <?php endwhile; endif; wp_reset_query(); ?>	

	       </div>
	       
		  <div class="portfolio-container">
	         	
	         	
	         							
	         
			     <?php

			     	$pagename = get_option('misfit_secondtwo');
					$page = get_page_by_title($pagename);
					$featured_id =  $page->ID;
							
			    	query_posts(
						
						array(
							'post_type' => 'page',
							'p' => $featured_id,
							'posts_per_page' => -1
						)
				
					); 

					if(have_posts()) : while(have_posts()) : the_post(); 

					$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
					$banner = get_post_meta($post->ID, 'misfit_bannerimage',true);

				?>
	       
		         	<!-- div class portfolio item -->        	
		         	<div class="portfol">
	         	
		         		<div class="holster">
						
							<a href="<?php the_permalink(); ?>" class="dropanchor"></a>
							
							<div class="groove" style="background-image: url(<?php if($banner) { echo $banner; } else { echo $imgsrc[0]; } ?>);">
							
							</div>
							
							<div class="hip">
								
								<h1><?php if(get_post_meta($post->ID, 'misfit_shorttitle', true)) { echo get_post_meta($post->ID, 'misfit_shorttitle', true); } else { the_title(); } ?></h1>
								
							</div>
							
						
						</div>
						
		         	</div>
		         	
		         	
		         	
	         	
	         	<!-- div class portfolio item -->
	         	<?php endwhile; endif; wp_reset_query(); ?>	
	         	
				<?php 

	         	   $pagename = get_option('misfit_tertwo');
					$page = get_page_by_title($pagename);
					$featured_id =  $page->ID;
							
			    	query_posts(
					
					array(
						'post_type' => 'page',
						'p' => $featured_id,
						'posts_per_page' => -1
					)
		
					); if(have_posts()) : while(have_posts()) : the_post(); 

				?>

				<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
				
				<?php $banner = get_post_meta($post->ID, 'misfit_bannerimage',true); ?>
	       
	         	<!-- div class portfolio item -->
	         	
	         	
	         		<div class="portfol">
	         	
		         		<div class="holster">
						
							<a href="<?php the_permalink(); ?>" class="dropanchor"></a>
							
							<div class="groove" style="background-image: url(<?php if($banner) { echo $banner; } else { echo $imgsrc[0]; } ?>);">
							
							</div>
							
							<div class="hip">
								
								<h1><?php if(get_post_meta($post->ID, 'misfit_shorttitle', true)) { echo get_post_meta($post->ID, 'misfit_shorttitle', true); } else { the_title(); } ?></h1>
								
							</div>
							
						
						</div>
						
		         	</div>
	         	
	         	<!-- div class portfolio item -->
	         	<?php endwhile; endif; wp_reset_query(); ?>	
	         	
	         	
	         	
	         	   <?php $pagename = get_option('misfit_quattwo');
				$page = get_page_by_title($pagename);
				$featured_id =  $page->ID;
						
		    	query_posts(
					
					array(
						'post_type' => 'page',
						'p' => $featured_id,
						'posts_per_page' => -1
					)
			
				); if(have_posts()) : while(have_posts()) : the_post(); ?>
				<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
				
				<?php $banner = get_post_meta($post->ID, 'misfit_bannerimage',true); ?>
	       
	         	<!-- div class portfolio item -->
	         	
	         	<div class="portfol">
	         	
		         		<div class="holster">
						
							<a href="<?php the_permalink(); ?>" class="dropanchor"></a>
							
							<div class="groove" style="background-image: url(<?php if($banner) { echo $banner; } else { echo $imgsrc[0]; } ?>);">
							
							</div>
							
							<div class="hip">
								
								<h1><?php if(get_post_meta($post->ID, 'misfit_shorttitle', true)) { echo get_post_meta($post->ID, 'misfit_shorttitle', true); } else { the_title(); } ?></h1>
								
							</div>
							
						
						</div>
						
		         	</div>
	         	
	         	<!-- div class portfolio item -->
	         	<?php endwhile; endif; wp_reset_query(); ?>	
	         	
	  			<div class="clear"></div>
			
	         	
	         </div>	
	               
	        <div class="leftwall"></div> 
    		<div class="rightwall"></div> 
    		
	    </section>
