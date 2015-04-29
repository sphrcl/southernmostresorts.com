
	    <section id="blogroller">
	   
	   <div class="relationalcontainer">
		
		
		<?php 
		$next_post = get_adjacent_post();  $nextid = $next_post->ID;

		$my_query = new WP_Query(
			array(
					
				//'paged' => $paged,
				'p' => $nextid,
				'posts_per_page' => 1
				
			)
		);

		if(have_posts()) :
	    while($my_query->have_posts()) : $my_query->the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
		
		<?php $after_post = get_adjacent_post();  $afterid = $after_post->ID; ?>
		
		
		<div class="<?php if(!$imgsrc){ ?>noimg <?php } ?>essay-half left"<?php if(get_post_meta($post->ID, 'misfit_bgcolor',true)) { ?> style="background-color: <?php echo get_post_meta($post->ID, 'misfit_bgcolor',true); ?>;"<?php } ?>>	
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

      	<?php endwhile; endif; wp_reset_query(); ?>	
      	
      	
      	<?php 
		

		$my_querys = new WP_Query(
			array(
					
				//'paged' => $paged,
				'p' => $afterid,
				'posts_per_page' => 1
				
			)
		);

		if(have_posts()) :
	    while($my_querys->have_posts()) : $my_querys->the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
		
		<?php $final_post = get_adjacent_post();  $finalid = $final_post->ID; ?>
		
		
		<div class="<?php if(!$imgsrc){ ?>noimg <?php } ?>essay-half right"<?php if(get_post_meta($post->ID, 'misfit_bgcolor',true)) { ?> style="background-color: <?php echo get_post_meta($post->ID, 'misfit_bgcolor',true); ?>;"<?php } ?>>	
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

      	<?php endwhile; endif; wp_reset_query(); ?>	
      	<div class="clear"></div>
      	<?php 
		

		$my_queryss = new WP_Query(
			array(
					
				//'paged' => $paged,
				'p' => $finalid,
				'posts_per_page' => 1
				
			)
		);

		if(have_posts()) :
	    while($my_queryss->have_posts()) : $my_queryss->the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
		
		<?php $final_post = get_adjacent_post();  $finalid = $final_post->ID; ?>
		
		
		<div class="<?php if(!$imgsrc){ ?>noimg <?php } ?>essay-whole"<?php if(get_post_meta($post->ID, 'misfit_bgcolor',true)) { ?> style="background-color: <?php echo get_post_meta($post->ID, 'misfit_bgcolor',true); ?>;"<?php } ?>>	
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

      	<?php endwhile; endif; wp_reset_query(); ?>	
      	
      	
      	
      	
      	
      	
      	
      	
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
