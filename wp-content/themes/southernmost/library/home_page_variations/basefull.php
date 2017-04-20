  <div class="pagecontent">
       
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
	       			
	       			<?php } ?><?php } ?></h2>		       			
			   <?php } ?>    			
			     
			     <h1 class="bigheading" style="max-width: 80%; margin: auto;"><?php the_title(); ?></h1>	 
	       			
			   
			   
	       		<?php if(get_post_meta($post->ID, 'misfit_youtube', $single = true) || get_post_meta($post->ID, 'misfit_vimeo', $single = true))  { ?> 
	       		
	       			<div class="video-container">
						
						<?php if(get_post_meta($post->ID, 'misfit_youtube', $single = true)) { ?>
									
						<iframe width="720" height="394" src="//www.youtube.com/embed/<?php echo get_post_meta($post->ID, 'cebo_youtube', $single = true); ?>" allowfullscreen></iframe>
						
						<?php } elseif(get_post_meta($post->ID, 'misfit_vimeo', $single = true)) { ?>

						<iframe src="//player.vimeo.com/video/<?php echo get_post_meta($post->ID, 'misfit_vimeo', $single = true); ?>" width="720" height="394"></iframe>
		
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

							<a href="//www.facebook.com/sharer.php?s= 100&amp;p[title]=<?php the_title(); ?>&amp;p[url]=<?php the_permalink(); ?>&amp;p[images][0]=<?php echo $imgsrc[0]; ?>&amp;p[summary]=<?php echo excerpt(30); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
								
							<?php 

								$perm = get_permalink(); 
								$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
								$regex = '/(?<!href=["\'])http:\/\//'; 
								$regio = '/(?<!href=["\'])http:\/\//'; 
								$perm = preg_replace($regio, '', $perm); 
								$img = preg_replace($regex, '', $img); 

							?>

							<a class="pin" href="//pinterest.com/pin/create/button/?url=http%3A%2F%2F<?php echo $perm; ?>&media=<?php echo $imgsrc[0]; ?>&description=<?php echo excerpt(30); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>

					
						</div>
						
					</div>
		       		
		      		<?php } ?>
		      		
				
				</div>	<!-- end post copy -->			
       					
       	</div><!-- end content container -->
       		
       	<div class="clear"></div>
       	<?php if(is_cart() || is_checkout() || is_account_page()) { } else { ?>	
       	  <?php comments_template(); ?>
       	<?php } ?>  
       
 </div>	