	<?php if(get_post_type() == "page"|| get_post_type() == "page") {  } else { ?>
	<div class="progress-indicator">
		<svg>
			<g>
				<circle cx="0" cy="0" r="20" stroke="black" class="animated-circle" transform="translate(50,50) rotate(-90)"  />
			</g>
			<g>
				<circle cx="0" cy="0" r="38" transform="translate(50,50) rotate(-90)"  />
			</g>
		</svg>
		<div class="progress-count"></div>
	</div>	
	<?php } ?>
	
	<section id="intro" class="sagers notrans leftbanner">
	        
     <?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
     
     
	        <div id="copystackers-full" class="tall rightside" style="  margin-right: 40px; margin-left: 0;">
	    	
	    	
	    	<div class="pagecontent sidegallery<?php if(get_post_type() == "page") { ?> interiorpage<?php } ?>">
	       
	       
	       
	       		<div class="contentcontainer" style="">	
	       			
	       			
	       			<?php if(is_cart() || is_checkout() || is_account_page()) { } else { ?>				
			     	<h2 class="subheading">
	       			<?php _e('w', 'misfitlang'); ?>: <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta('display_name'); ?></a> 
	       			
	       			<?php if(get_post_meta($post->ID, 'misfit_imagecredit', $single = true)) { ?>&nbsp;&bull;
			       			
	       			<?php _e('p', 'misfitlang'); ?>: <?php if(get_post_meta($post->ID, 'misfit_imagecreditlink', $single = true)) { ?>
	       			
	       			<a href="<?php echo get_post_meta($post->ID, 'misfit_imagecreditlink', $single = true); ?>" target="_blank">
	       			
	       			<?php } ?>
	       			
	       			<?php echo get_post_meta($post->ID, 'misfit_imagecredit', $single = true); ?>&nbsp;
	       			
	       			<?php if(get_post_meta($post->ID, 'misfit_imagecreditlink', $single = true)) { ?></a>
	       			
	       			<? } ?><? } ?></h2>		       			
			       	<?php } ?>		
			     
			     	<h1 class="bigheading"><?php the_title(); ?></h1>	 
	       		
	       		
	       		<!-- ==========>> HIDDEN MOBILE HEADER  <<========= -->
	       			
	       			
	       			<?php $banner = get_post_meta($post->ID, 'misfit_bannerimage',true); ?>
	       
	       			
	
	       			<img class="mobileheader mobileadd"<?php if($banner) { ?> src="<?php echo $banner; ?>"<?php } else { ?> src="<?php echo $imgsrc[0]; ?>"<?php } ?> alt="<?php the_title(); ?>" />  	        	
	        			        
	       			  		
		       		
					
					
	       				       		
		       		<div class="postcopy">
			       		
			       		
		       		
			       		<?php the_content(); ?>							
						
						
						<?php if(get_post_type() == "page") {  } else { ?>
						
						
						<div class="authorsection">
							
							<p class="date"><?php echo the_time("n.j.y"); ?></p>
							
							<p class="authortag"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta('display_name'); ?></a>. <?php the_author_meta('description'); ?></p>
							
							<div class="taggers">
							
						<?php if(get_post_type() == "project") { ?>
						
							<?php $project_terms = wp_get_object_terms($post->ID, 'type'); if(!empty($project_terms)) { if(!is_wp_error( $project_terms )) { echo ''; $count = 0; foreach($project_terms as $term){ if($count > 0) { echo ', '; } echo '<a href="'.get_term_link($term->slug, 'type'). '">'.$term->name. '</a>';  $count++; }  } } ?>
							
							<?php } else { ?>
							
							<?php $project_terms = wp_get_object_terms($post->ID, 'category'); if(!empty($project_terms)) { if(!is_wp_error( $project_terms )) { echo ''; $count = 0; foreach($project_terms as $term){ if($count > 0) { echo ', '; } echo '<a href="'.get_term_link($term->slug, 'category'). '">'.$term->name. '</a>';  $count++; }  } } ?>

							<?php } ?>
						
							<div class="clear"></div>
							
							<div class="socialbox" style="padding-top: 20px;">
							
								<a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>&via=<?php echo get_option('misfit_twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>

								<a href="http://www.facebook.com/sharer.php?s= 100&amp;p[title]=<?php the_title(); ?>&amp;p[url]=<?php the_permalink(); ?>&amp;p[images][0]=<?php echo $imgsrc[0]; ?>&amp;p[summary]=<?php echo excerpt(30); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
									
								<?php 

									$perm = get_permalink(); 
									$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
									$regex = '/(?<!href=["\'])http:\/\//'; 
									$regio = '/(?<!href=["\'])http:\/\//'; 
									$perm = preg_replace($regio, '', $perm); 
									$img = preg_replace($regex, '', $img); 

								?>

								<a class="pin" href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2F<?php echo $perm; ?>&media=<?php echo $imgsrc[0]; ?>&description=<?php echo excerpt(30); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>

					
							</div>
						
						</div>
		       					       		
			       		</div><!-- end authorsection -->
			       		
			       		
			       		 
			       		 
			       		 <?php } ?>
			       								
						<div class="clear"></div>
	       
	       				</div>	<!-- end postcopy -->
					</div><!-- end contentcontainer -->	
				<?php if(is_cart() || is_checkout() || is_account_page()) { } else { ?>	
				<?php comments_template(); ?>
				<?php } ?>
				
	       	</div>	 <!-- end content -->
	  	</div> <!-- end copystackers -->
	         <?php $banner = get_post_meta($post->ID, 'misfit_bannerimage',true); ?>
	       
	    
	        
	        <div id="stackers-full" class="leftside" style="margin-left: 40px;">
	        
	        	<div class="totality" style="background-image: url(<?php if($banner) { echo $banner; } else { echo $imgsrc[0]; } ?>);">
	        	
	        	
	        	
	        	</div>
	        	
	        			        
	        </div>
	        
	        
	       
	        
	        
	        <div class="clear"></div>
	        
	    	       <?php endwhile; endif; wp_reset_query(); ?>	
	               
	         <div class="leftwall"></div> 
	    <div class="rightwall"></div> 
	        
	    </section>