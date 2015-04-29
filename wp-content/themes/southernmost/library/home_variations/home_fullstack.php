<section id="intro" class="sagers notrans">
    
    
   
    
   <div id="copystackers" class="tall hpstacks" style="background: #ddd;">
	
		
	        <?php $pagename = get_option('misfit_primeone');
					$page = get_page_by_title($pagename);
					$featured_id =  $page->ID;
					
	    	query_posts(
				
				array(
					'post_type' => 'page',
					'p' => $featured_id,
					'posts_per_page' => 1
				)
		
			); if(have_posts()) : while(have_posts()) : the_post(); ?>
			<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
			
			<?php $banner = get_post_meta($post->ID, 'misfit_bannerimage',true); ?>
		
		
		<div class="stellar">
    		<div class="totality" style="background-image: url(<?php if($banner) { echo $banner; } else { echo $imgsrc[0]; } ?>);">
    		
    				    	
    	
    		</div>
    		
    		<a style="" href="<?php the_permalink(); ?>"></a>

    		<h1 class="solidarity" style="right: auto; text-align: left; left: 40px; bottom: 10%;"><?php the_title(); ?></h1>
    	</div>
	
	<?php endwhile; endif; wp_reset_query(); ?>	
		
		
	
	
	</div> <!-- end copystackers -->
    
    
    <div id="stackers">
    
    	<div class="bigstack">
	        		
	        <div class="portfoliocontainer">
	         
	         	
	         	
	         	<!-- div class portfolio item -->
	         	
	         	
	         	<?php $pagename = get_option('misfit_secondone');
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
			         	
			         	
			         	<div class="portfolio-item">
			         	
			         		
			         	
			         		<a href="<?php the_permalink(); ?>">
			         		
			         		
			         		</a>
			         		
			         		<div class="portimg" style="background-image: url(<?php if($banner) { echo $banner; } else { echo $imgsrc[0]; } ?>);"></div>
			         		
			         		<h3><?php if(get_post_meta($post->ID, 'misfit_shorttitle', true)) { echo get_post_meta($post->ID, 'misfit_shorttitle', true); } else { the_title(); } ?></h3>
			         		
			  
			         	</div>
			         	
			         	<!-- div class portfolio item -->
			         	<?php endwhile; endif; wp_reset_query(); ?>	
	         	
	         	<!-- div class portfolio item -->
	         	

	        	
	       </div>
	       
	       </div>
	       
	       
	       
	       <div class="halfstacks">
	       
	    	 <div class="portfoliocontainer">
	         
	         	
	         	
	         	<!-- div class portfolio item -->
	         	
	         	
	         	<?php $pagename = get_option('misfit_terone');
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
			         	
			         	
			         	<div class="portfolio-item">
			         	
			         		
			         	
			         		<a href="<?php the_permalink(); ?>">
			         		
			         		
			         		</a>
			         		
			         		<div class="portimg" style="background-image: url(<?php if($banner) { echo $banner; } else { echo $imgsrc[0]; } ?>);"></div>
			         		
			         		<h3><?php if(get_post_meta($post->ID, 'misfit_shorttitle', true)) { echo get_post_meta($post->ID, 'misfit_shorttitle', true); } else { the_title(); } ?></h3>
			         		
			  
			         	</div>
			         	
			         
			         	<?php endwhile; endif; wp_reset_query(); ?>	
	         	        	
	         	
	         	<!-- div class portfolio item -->

	         	
	         	
	         	<?php $pagename = get_option('misfit_quatone');
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
			       
			         	
			         	<div class="portfolio-item">
			         	
			         		
			         	
			         		<a href="<?php the_permalink(); ?>">
			         		
			         		
			         		</a>
			         		
			         		<div class="portimg" style="background-image: url(<?php if($banner) { echo $banner; } else { echo $imgsrc[0]; } ?>);"></div>
			         		
			         		<h3><?php if(get_post_meta($post->ID, 'misfit_shorttitle', true)) { echo get_post_meta($post->ID, 'misfit_shorttitle', true); } else { the_title(); } ?></h3>
			         		
			  
			         	</div>
	
			         	<?php endwhile; endif; wp_reset_query(); ?>	
	         	
	         	<!-- div class portfolio item -->
	         	   
		       
	       </div>
	
        </div>

    			        
    </div>
    
    <div class="clear"></div>
    
   
    <div class="leftwall"></div> 
    <div class="rightwall"></div> 
    
</section>
