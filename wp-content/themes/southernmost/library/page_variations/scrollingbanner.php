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
	  
	  	<div id="in-intro" class="cover caro">
	    
		  <div class="banneracross carousello">	    
	       
	       		<a href="#" id="previousSlide"><i class="fa fa-angle-left"></i></a>
				<a href="#" id="nextSlide"><i class="fa fa-angle-right"></i></a>
					
	       
	       		
   				<div class="hip floatingstyle">
					
					<h3><?php the_time('F j, Y'); ?></h3>
					<h1><?php the_title(); ?></h1>
					
					
				</div>
	       		
	       		<div class = 'responsiveHeight'>
		
					<div class = 'inner'>
						
						<div class = 'topslide'>
						
							<div class = 'slider'>
					                  	
								<?php
									              
							    $gallery = get_post_gallery_images( $post->ID );
							
							
							                        
							    foreach( $gallery as $image ) {// Loop through each image in each gallery
							        $image_list .= '<img src="' . str_replace('-150x150','',$image) . '" alt="' . get_the_title() . '">';
							    }                  
							    echo $image_list;
							                     
							?>	            		
				        </div>
					
					</div>
					
				</div>
			
			</div>
	       
	       </div>
		    
		    <div class="leftwall"></div> 
		    <div class="rightwall"></div> 
		    
			</div>
			
	       
       <div class="pagecontent<?php if(get_post_type() == "page") { ?> interiorpage<?php } ?>">
       
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
			     
			     <h1 class="bigheading" style="max-width: 80%; margin: auto;"><?php the_title(); ?></h1>	 
	       		
	       		
	       		
	       		
	       		<?php if(get_post_meta($post->ID, 'misfit_youtube', $single = true) || get_post_meta($post->ID, 'misfit_vimeo', $single = true))  { ?> 
	       		
	       			<div class="video-container">
						
						<?php if(get_post_meta($post->ID, 'misfit_youtube', $single = true)) { ?>
									
						<iframe width="720" height="394" src="http://www.youtube.com/embed/<?php echo get_post_meta($post->ID, 'cebo_youtube', $single = true); ?>" allowfullscreen></iframe>
						
						<?php } elseif(get_post_meta($post->ID, 'misfit_vimeo', $single = true)) { ?>

						<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta($post->ID, 'misfit_vimeo', $single = true); ?>" width="720" height="394"></iframe>
		
						<?php } ?>
						
						
					</div>
	       		
	       		<?php } ?>
	       		
	       		<div class="postcopy">
		       		
		       	
		       		
		       		<?php the_content(); ?>
		       		
		       								
					<div class="clear"></div>
					
					
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
						
						<?php endwhile; endif; wp_reset_query(); ?>	
					
					</div>	
						
	       					
	       		</div>
	       		
	       <div class="clear"></div>
	      
	      <?php if(is_cart() || is_checkout() || is_account_page()) { } else { ?>	
	       <?php comments_template(); ?>
	      <?php } ?>
	      
	       </div>	
	       
	       <div class="leftwall"></div> 
    	   <div class="rightwall"></div> 
	        
	    </section>