
	    <section id="blogroller">
	   
	   <div class="relationalcontainer">
		
		
			<?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			
			$my_query = new WP_Query(
			array(
					
					'paged' => $paged,
					'post_type' => 'post', 
					'posts_per_page' => 3
					
				));
			if(have_posts()) :
		    $postcount=1;
		    $total = count($posts);
		    while($my_query->have_posts()) : $my_query->the_post();
		           
		        if( ($postcount % 2) == 0 ) $post_class = ' leftimg';
		        else $post_class = ' rightimg'; 
		        
		        $attachments = get_children(
				    array(
				        'post_type' => 'attachment',
				        'post_mime_type' => 'image',
				        'post_parent' => $post->ID
				    ));
				
				$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
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
				
				
				
				
			<?php $postcount++;  endwhile; endif; wp_reset_query(); ?>	
			
			
			<div class="clear"></div>			
			</div>
		
			
				<?php $blogger = get_page_with_template('page_blog');
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
