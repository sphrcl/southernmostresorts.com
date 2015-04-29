		<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
	       
	    <?php $banner = get_post_meta($post->ID, 'misfit_bannerimage',true); ?>
	    
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

		<section id="intro" class="sagers notrans">
	        
	        
	       
		  	<div id="in-intro" class="cover" style="background-image: url(<?php if($banner) { echo $banner; } else { echo $imgsrc[0]; } ?>); ">
	    
		    	<div class="superhead">
		    
			    	<header data-fade="550" data-slow-scroll="3">
			    	
			    		<div class="headoc">
			    			
			    			
			    			<h4 style="padding-bottom: 40px;"><?php the_time('F j, Y'); ?></h4>
			    			
			    			<h1><?php the_title(); ?></h1>
			    		    			
			    			<h4><?php the_author_meta('display_name'); ?></h4>
			    			
			    			
			    			
			    		
			    		</div>
			    			        		
			    	</header>
		    
			    </div> 
		    
		    <div class="leftwall"></div> 
		    <div class="rightwall"></div> 
		    
			</div>
			
			
	        
	       <div id="copystackers" class="tall">
	    		
	    		<div class="pagecontent sidegallery<?php if(get_post_type() == "page") { ?> interiorpage<?php } ?>">
	       
	       		   <div class="contentcontainer">	
	       		
	       				
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
	       			
	       			
	       			<?php $galleryImages = get_post_gallery_imagess(); 
							          $imagesCount = count($galleryImages);
	       			 ?>
	        		<?php if ($imagesCount > 0) : ?>
              		<?php for ($i = 0; $i < 1; $i++): ?>
                  	<?php if (!empty($galleryImages[$i])) :?>
	
	       			<img<?php if(get_post_meta($post->ID, 'misfit_imagecredit', $single = true)) { ?> style="margin-bottom: 55px;" <?php } ?> class="mobileheader mobileadd" src="<?php echo $galleryImages[$i]['full'][0];?>" alt="<?php the_title(); ?>" />  
	       			  		
		       		<?php endif; ?>
  					<?php endfor; ?>
					<?php endif; ?>
					
					
					
				
			       		
			       		
		       		   <div class="postcopy">
			       		
			       		
				       		 <?php
					        $gallery = get_post_gallery();
					
					        $content = strip_shortcode_gallery( get_the_content() );                                        
					        $content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $content ) ); 
					        echo $content;
					
					        ?>
				       		
				       		<div class="clear"></div>					
						
							
							
							<div class="mobileremove">
							
							<?php if(get_post_type() == "page") {  } else { ?>
							
							<div class="authorsection">
							
								<p class="date"><?php echo the_time("n.j.y"); ?></p>
								
								<p class="authortag"><?php the_author_meta('display_name'); ?>. <?php the_author_meta('description'); ?></p>
								
								<div class="taggers">
								
							<?php if(get_post_type() == "project") { ?>
						
							<?php $project_terms = wp_get_object_terms($post->ID, 'type'); if(!empty($project_terms)) { if(!is_wp_error( $project_terms )) { echo ''; $count = 0; foreach($project_terms as $term){ if($count > 0) { echo ', '; } echo '<a href="'.get_term_link($term->slug, 'type'). '">'.$term->name. '</a>';  $count++; }  } } ?>
							
							<?php } else { ?>
							
							<?php $project_terms = wp_get_object_terms($post->ID, 'category'); if(!empty($project_terms)) { if(!is_wp_error( $project_terms )) { echo ''; $count = 0; foreach($project_terms as $term){ if($count > 0) { echo ', '; } echo '<a href="'.get_term_link($term->slug, 'category'). '">'.$term->name. '</a>';  $count++; }  } } ?>

							<?php } ?>
							
								</div>
							
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
		       					       		
			       		
			       		 
			       		 
			       		 <?php } ?>
			       		 
			       		 </div>

			       		 			       		
						<div class="clear"></div>
					</div>	<!-- end postcopy -->
					
				</div><!-- end contentcontainer -->	
				<?php comments_template(); ?>
	       </div>	 <!-- end content -->
	  	
	  	</div> <!-- end copystackers -->
	        
	        
	        <div id="stackers">
	        	
	        	<div class="mobileremove ohimages">
					
					
					<ul class="imagestacks">
					
					<?php $galleryImages = get_post_gallery_imagess(); 
						  $imagesCount = count($galleryImages);
						  
	       			 ?>
	        		<?php if ($imagesCount > 0) : ?>
              		<?php for ($i = 0; $i < $imagesCount; $i++): ?>
                  	<?php if (!empty($galleryImages[$i])) :?>
                  	<?php $attachment_meta = wp_get_attachment($galleryImages[$i]['id']); ?>
                  		
                  					    	
					     <li style="background-image: url(<?php echo $galleryImages[$i]['full'][0];?>);">
					       		<i class="fa fa-arrows-alt"></i>
					       		<a class="" data-title="<?php echo $attachment_meta['caption']; ?>" data-lightbox="gallery" href="<?php echo $galleryImages[$i]['full'][0];?>"></a>
					       </li>
					
					
					
					<?php endif; ?>
  					<?php endfor; ?>
					<?php endif; ?>

					
					
					</ul>
					
					
					<div class="clear"></div>
					
				</div>
				
				
	        	<div class="mobileadd quietgallery">
					
					
								
					<?php $galleryImages = get_post_gallery_imagess(); 
							          $imagesCount = count($galleryImages);
	       			 ?>
	        		<?php if ($imagesCount > 0) : ?>
              		<?php for ($i = 0; $i < $imagesCount; $i++): ?>
                  	<?php if (!empty($galleryImages[$i])) :?>
                  	<?php if ($i < 1) continue; ?>
                  					    	
					        <div class="mobgall" style="background-image: url(<?php echo $galleryImages[$i]['full'][0];?>);"></div>
					
					
					
					<?php endif; ?>
  					<?php endfor; ?>
					<?php endif; ?>

					
					
					
					<div class="clear"></div>
					
				</div>
				
				
				<div class="mobileadd" style="background: #f1f1f1; padding: 50px 20px;">
							
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
							
								</div>
							
								<div class="clear"></div>
								
								
								<div class="socialbox" style="padding-top: 20px;">
							
						<a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>&via=<?php get_option('misfit_twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
						<a href="http://www.facebook.com/sharer.php?s= 100&amp;p[title]=<?php the_title(); ?>&amp;p[url]=<?php the_permalink(); ?>&amp;p[images][0]=<?php echo $imgsrc[0]; ?>&amp;p[summary]=<?php echo excerpt(30); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
							
						<?php $perm = get_permalink(); $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); $regex = '/(?<!href=["\'])http:\/\//'; $regio = '/(?<!href=["\'])http:\/\//'; $perm = preg_replace($regio, '', $perm); $img = preg_replace($regex, '', $img); ?><a class="pin" href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2F<?php echo $perm; ?>&media=http%3A%2F%2F<?php echo $img; ?>&description=<?php echo excerpt(30); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>

					
						</div>
							
							</div>
		       					       		
			       		<?php if(is_cart() || is_checkout() || is_account_page()) { } else { ?>	
			       		 <?php comments_template(); ?>
			       		 <?php } ?>
			       		 
			       		 
			       		 <?php } ?>
			       		 
			       		 </div>




		        
	        </div>
	        
	        <div class="clear"></div>
	        
	       <?php endwhile; endif; wp_reset_query(); ?>	
	               
        	<div class="leftwall"></div> 
    		<div class="rightwall"></div> 
	        
	    </section>
