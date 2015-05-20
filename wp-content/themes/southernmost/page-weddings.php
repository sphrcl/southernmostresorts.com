<?php 

/* Template Name: Weddings */
 get_header(); ?>


<div id="topbanner">



<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

	<div class="flexslider meetingslider">
	<h1 class="roomtits"><?php the_title(); ?></h1>
	<a class="button roomtitties" href="<?php echo get_post_meta($post->ID,'misfit_reservation',true); ?>">See Availability</a>
	  <ul class="slides">
	  
	  
		 <?php $galleryImages = get_post_gallery_imagess(); 
			           $imagesCount = count($galleryImages); ?>
			           
        		<?php if ($imagesCount > 0) : ?>
              	<?php for ($i = 0; $i < $imagesCount; $i++): ?>
                <?php if (!empty($galleryImages[$i])) :?>
                
				
				
				<li style="background-image: url(<?php echo $galleryImages[$i]['full'][0];?>);"></li>
				
				
				
				
				<?php endif; ?>
    			<?php endfor; ?>
				<?php endif; ?>		<!-- items mirrored twice, total of 12 -->
	  </ul>
	</div>
	<div class="flexslider meetingcarousel">
	  <ul class="slides">
		 <?php $galleryImages = get_post_gallery_imagess(); 
			           $imagesCount = count($galleryImages); ?>
			           
        		<?php if ($imagesCount > 0) : ?>
              	<?php for ($i = 0; $i < $imagesCount; $i++): ?>
                <?php if (!empty($galleryImages[$i])) :?>
                
				
				
				<li style="background-image: url(<?php echo $galleryImages[$i]['full'][0];?>);"></li>
				
				
				
				
				<?php endif; ?>
    			<?php endfor; ?>
				<?php endif; ?>
	  </ul>
	</div>
	<?php endwhile; endif; wp_reset_query(); ?>	
</div>

<ul class="page-nav">

	<?php 
				
		// $ancestors = get_post_ancestors($post->ID);
		// $parents = $ancestors[0];
		$this_post = $post->ID;
		$query_gallery_single = new wp_query(array(
			'post_parent' => $this_post,
			'post_type' => 'page',
			'posts_per_page'=> 6,	
		)); 
		$count = 1;

		if($query_gallery_single->have_posts()) : while($query_gallery_single->have_posts()) : $query_gallery_single->the_post(); 

	?>

		<li <?php if( $count == 1 ) { echo ' class="current"'; } ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	
	
	<?php $count++; endwhile; endif; wp_reset_query(); ?>	
			
</ul>

<div class="wrapper"><div id="submenu"></div></div>

<div id="pagecontent">
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	
	
	<div class="container">

		<div class="contenttitle">

			<h1 class="title"><?php the_title(); ?></h1>
			<h2 class="subtitle"><?php echo get_post_meta($post->ID,'misfit_subtitle',true); ?></h2>

		</div>

		<div class="socialmedia">
			<ul>
				<?php if(get_option('misfit_facebook')) { ?><li><a href="<?php echo get_option('misfit_facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php } ?>
				<?php if(get_option('misfit_twitter')) { ?><li><a href="<?php echo get_option('misfit_twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php } ?>
				<?php if(get_option('misfit_youtube')) { ?><li><a href="<?php echo get_option('misfit_youtube'); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li><?php } ?>
				<?php if(get_option('misfit_instagram')) { ?><li><a href="<?php echo get_option('misfit_instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php } ?>
				<?php if(get_option('misfit_google_plus')) { ?><li><a href="<?php echo get_option('misfit_google_plus'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php } ?>
				<?php if(get_option('misfit_tripadvisor')) { ?><li><a href="<?php echo get_option('misfit_tripadvisor'); ?>" target="_blank"><i class="fa fa-tripadvisor"></i></a></li><?php } ?>
			</ul>
		</div>

		<div class="content">
			<div class="left">
				<?php the_content(); ?>
			</div>
			<div class="right">
				<?php if(get_post_meta($post->ID,'misfit_external_booking',true)) { ?>
					<a class="button" style="position: relative; display: inline-block; padding: 20px; margin-right: 10px;" href="<?php echo get_post_meta($post->ID,'misfit_extenal_booking',true); ?>"><?php _e('Request proposal','theme-text'); ?></a>
				<?php } ?>
			</div>
		</div>

		<ul class="post-list">
				
			<?php 
				$query_activities = new wp_query(array(
					'post_parent' => $this_post,
					'post_type' => 'page',
					'posts_per_page' => 10
				)); 
				if($query_activities->have_posts()) : while($query_activities->have_posts()) : $query_activities->the_post();
				$imgsrcs = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
		    ?>
			           
        		<li class="flexslider">
        			
					<?php 
						$galleryImages = get_post_gallery_imagess(); 
						$imagesCount = count($galleryImages); 
					?>
					<?php if ($imagesCount > 1) { ?>
						<ul class="slides">
							<?php for ($i = 0; $i < $imagesCount; $i++): ?>
								<?php if (!empty($galleryImages[$i])) :?>

									<li style="background-image: url(<?php echo $galleryImages[$i]['full'][0];?>);"></li>

								<?php endif; ?>
							<?php endfor; ?>
						</ul>
					<?php } else { ?>

						<div class="post-image left" style="background-image: url('<?php echo tt($imgsrcs[0],550,330); ?>');" ><a href="<?php the_permalink(); ?>" class="dropanchor"></a></div>

					<?php } ?>

        			<div class="post-content right">
        				<h3><?php the_title(); ?></h3>
        				<p><?php echo excerpt(50); ?></p>

        				<a class="button" href="<?php the_permalink(); ?>">Details</a>

        			</div>

        		</li>
				
			<?php endwhile; endif; wp_reset_query(); ?>	

		</ul>

	</div>
	
	<?php endwhile; endif; wp_reset_query(); ?>	

</div>


</div> <!-- #wrapper -->


<?php get_footer(); ?>