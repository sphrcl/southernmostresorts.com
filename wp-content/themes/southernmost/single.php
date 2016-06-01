<?php 

/* 

Basic Single Post Template 

*/


get_header(); ?>


<?php if($post->ID==2579) { ?>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/nivo/nivo-lightbox.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/nivo/themes/default/default.css" type="text/css" />
<script src="<?php bloginfo('template_url'); ?>/js/nivo/nivo-lightbox.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

	    if ($.fn.nivoLightbox) {
	        $('.lightbox').nivoLightbox();
	    }

	});
</script>

<?php include( TEMPLATEPATH . '/library/activities-map.php'); ?>


 <div class="mapbox">

	<div id="maparea" style="width: 100%;"></div>
 

</div> 

 
	
<div class="innerpage wrapper specials_page">
	<div id="pagecontent">

		<div class="container">

			<div class="contenttitle">
				
				<?php 
					if(have_posts()) : while(have_posts()) : the_post(); 
					$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
				?>

				<h1 class="title"><?php the_title(); ?></h1>
				<h2 class="subtitle"><?php echo get_post_meta($post->ID,'misfit_shortname',true); ?></h2>
				
				<?php endwhile; endif; wp_reset_query(); ?>	

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
				<!-- the_content(); -->
				<?php the_content(); ?>	
			</div>

		</div>

	</div>

	<div id="specials_list">
	
	
	<?php 

			$dining = new WP_Query(array(
				'post_type' => 'locations',
				 'tax_query' => array(
			        array(
			            'taxonomy' => 'loctype',
			            'field' => 'slug',
			            'terms' => 'neighborhood-guide'
			       )),	
				'posts_per_page' => -1
			));

			if($dining->have_posts()) : while($dining->have_posts()) : $dining->the_post(); 
			$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");

		?>
		
		
		<div class="specialsbox" style="background-image: url(<?php echo tt($imgsrc[0],1400,755); ?>);">
		
			
			<div class="specialscontent">
				<div class="specialtitle">
					<h3><?php the_title(); ?></h3>
					<h4><?php echo excerpt(20); ?></h4>
				</div>
				<div class="specialbuttons">
				 
					<a class="button7" href="<?php the_permalink(); ?>">Details</a>
				</div>
			</div>
		</div>

		<?php endwhile; endif; wp_reset_query(); ?>	
		
		
		
	</div>
</div>


<?php
}else{ ?>

<?php 
	if(have_posts()) : while(have_posts()) : the_post(); 
	$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
?>


	<div id="topbanner">

		<div class="static-banner" style="background-image: url('<?php echo tt($imgsrc[0],1400,755); ?>')"></div>

		<div class="topbanner-overlay"></div>

	</div>
		
	<div class="innerpage wrapper specials_page">
		<div id="pagecontent">

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
					
					<?php the_content(); ?>

				</div>

			</div>

		</div>
			<!-- commented this out becuase it was shoowing up on specials 

					<div class="latest-posts">

						<h3>Latest Posts</h3>

						<div class="post-slider">

							<a class="btn next4 right"><i class="fa fa-angle-right"></i></a>
						
							<div id="owl4" class="right owl-carousel owl-theme">
						
								<?php 
									$query_blog_posts = new wp_query(array(
										'post_type' => 'post',
										'posts_per_page' => 6
									)); 
									if($query_blog_posts->have_posts()) : while($query_blog_posts->have_posts()) : $query_blog_posts->the_post();
									$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
							    ?>
									<div class="item">
										<a href="<?php the_permalink(); ?>"><div class="slide-image" style="background-image: url(<?php echo tt($imgsrc[0],340,270); ?>);"></div></a>
										<a class="slider-hover" href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
									</div>
								<?php endwhile; endif; wp_reset_query(); ?>
				
							</div>
				
							<a class="btn prev4 right"><i class="fa fa-angle-left"></i></a>

						</div>

					</div>
			-->
	</div>

<?php endwhile; endif; wp_reset_query(); ?>	

<?php } ?>



	</div> <!-- #wrapper -->


<?php get_footer(); ?>
