<?php get_header(); ?>


<?php 
	if(have_posts()) : while(have_posts()) : the_post(); 
	$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
?>

	<div id="topbanner">

		<!-- <div class="flexslider topbanner">
			<ul class="slides">
				<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/topbanner4.jpg);">

				</li>
				<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/topbanner4.jpg);">

				</li>
			</ul>
		</div> -->

		<div class="static-banner" style="background-image: url('<?php echo tt($imgsrc[0],1400,755); ?>')"></div>

		<div class="topbanner-overlay"></div>

	</div>

	<?php endwhile; endif; wp_reset_query(); ?>	


<!-- 
<ul class="page-nav">

	<?php 
		$this_post = $post->ID;
		$query_gallery_single = new wp_query(array(
			'post_type' => 'smeets',
			'posts_per_page'=> 6,	
		)); 
		$count = 1;

		if($query_gallery_single->have_posts()) : while($query_gallery_single->have_posts()) : $query_gallery_single->the_post(); 
	?>

		<li <?php if( $this_post == $post->ID ) { echo ' class="current"'; } ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	
	
	<?php $count++; endwhile; endif; wp_reset_query(); ?>	
			
</ul>
-->
<div class="wrapper"><div id="submenu"></div>
    <?php                        
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('
            <p id="breadcrumbs">','</p>
            ');
        }
    ?>  
</div>

<div id="pagecontent">

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>	
	
	<div class="container">

		<div class="contenttitle">

			<h1 class="title"><?php the_title(); ?></h1>
			<h2 class="subtitle"><?php echo get_post_meta($post->ID,'misfit_subtitle',true); ?></h2>

		</div>

		<div class="socialmedia">
			<ul>
				<?php if(get_option('misfit_facebook')) { ?><?php if(get_option('misfit_facebook')) { ?><li><a href="<?php echo get_option('misfit_facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php } ?><?php } ?>
				<?php if(get_option('misfit_twitter')) { ?><?php if(get_option('misfit_twitter')) { ?><li><a href="<?php echo get_option('misfit_twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php } ?><?php } ?>
				<?php if(get_option('misfit_youtube')) { ?><?php if(get_option('misfit_youtube')) { ?><li><a href="<?php echo get_option('misfit_youtube'); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li><?php } ?><?php } ?>
				<?php if(get_option('misfit_instagram')) { ?><?php if(get_option('misfit_instagram')) { ?><li><a href="<?php echo get_option('misfit_instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php } ?><?php } ?>
				<?php if(get_option('misfit_google_plus')) { ?><li><a href="<?php echo get_option('misfit_google_plus'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php } ?>
				<?php if(get_option('misfit_tripadvisor')) { ?><li><a href="<?php echo get_option('misfit_tripadvisor'); ?>" target="_blank"><i class="fa fa-tripadvisor"></i></a></li><?php } ?>
			</ul>
		</div>

		<div class="content">
			<div class="left">
				<?php the_content(); ?>
			</div>
			<div class="right">

				<?php if(get_post_meta($post->ID,'misfit_infosheet',true)) { ?>
					<a target="_blank" class="button infosheet" style="position: relative; display: inline-block; padding: 20px; margin-right: 10px;" href="<?php echo get_post_meta($post->ID,'misfit_infosheet',true); ?>"><?php _e('Information Sheet','theme-text'); ?></a>
				<?php } ?>

				<?php if(get_post_meta($post->ID,'misfit_external_booking',true)) { ?>
					<a target="_blank" class="button" style="position: relative; display: inline-block; padding: 20px; margin-right: 10px;" href="<?php echo get_post_meta($post->ID,'misfit_extenal_booking',true); ?>"><?php _e('Request proposal','theme-text'); ?></a>
				<?php } ?>

			</div>
		</div>

		<div class="dimensions">

			<ul>
				<li>
					<h3><?php echo get_post_meta($post->ID,'misfit_dimensions',true); ?></h3>
					<span>Dimensions</span>
				</li>
				<li>
					<h3><?php echo get_post_meta($post->ID,'misfit_sqft',true); ?></h3>
					<span>SQ. FT.</span>
				</li>
				<li>
					<h3><?php echo get_post_meta($post->ID,'misfit_height',true); ?></h3>
					<span>Height</span>
				</li>
				<li>
					<?php if(get_post_meta($post->ID,'misfit_reception',true) || get_post_meta($post->ID,'misfit_banquet',true) || get_post_meta($post->ID,'misfit_theatre',true)) { ?>

						Capacity Seating:<br>
						<?php if(get_post_meta($post->ID,'misfit_reception',true)) { ?>Reception: <?php echo get_post_meta($post->ID,'misfit_reception',true); ?><br><?php } ?>
						<?php if(get_post_meta($post->ID,'misfit_banquet',true)) { ?>Banquet: <?php echo get_post_meta($post->ID,'misfit_banquet',true); ?><br><?php } ?>
						<?php if(get_post_meta($post->ID,'misfit_theatre',true)) { ?>Theatre: <?php echo get_post_meta($post->ID,'misfit_theatre',true); ?><?php } ?>

					<?php } ?>
				</li>
			</ul>

		</div>

	</div>
	
	<?php endwhile; endif; wp_reset_query(); ?>	

</div>


</div> <!-- #wrapper -->


<?php get_footer(); ?>