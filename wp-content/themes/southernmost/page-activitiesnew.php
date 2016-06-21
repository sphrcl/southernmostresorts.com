<?php

	/* Template Name: Activities New */

	get_header();

	if(have_posts()) : while(have_posts()) : the_post();
	$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");

?>

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

	 <ul id="toggles" class="page-nav">

		<?php

			$this_post = $post->ID;
			$query_gallery_single = new wp_query(array(
				'post_type' => 'page',
				'post_parent' => $this_post,
				'posts_per_page'=> 6,
			));
			$count = 1;

			if($query_gallery_single->have_posts()) : while($query_gallery_single->have_posts()) : $query_gallery_single->the_post();

		?>

			<li class="<?php echo $post->post_name; ?>" <?php if( $count == 1 ) { echo ' class="current"'; } ?>><a class="linkerd active" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>


		<?php $count++; endwhile; endif; wp_reset_query(); ?>

	</ul>

</div> 

 
<div class="innerpage wrapper specials_page">
	<div id="pagecontent">

		<div class="container">

			<div class="post-meta-area">

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
					<p>
						<?php the_content(); ?>
					</p>
				</div>

			</div>

		 
		</div>

	</div>

		<div id="specials_list">


<?php $content1=get_page(445); 
	  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $content1->ID ), "Full");
  ?>	<a href="<?php echo get_the_permalink($content1->ID); ?>">
		<div class="specialsbox" style="background-image: url(<?php echo tt($imgsrc[0],1400,755); ?>);">
			
			<div class="specialscontent">
				<div class="specialtitle">
					<h3><?php echo $content1->post_title; ?> </h3>
					<h4><?php echo get_post_meta($content1->ID,'misfit_shortname',true); ?></h4>
				</div>
				 
			</div>
		</div>
         </a>
		
<?php //$content2=get_page(2579); 
      $content2=get_page(2488);
	  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $content2->ID ), "Full");
  ?>	<a href="<?php echo get_the_permalink($content2->ID); ?>">
		<div class="specialsbox" style="background-image: url(<?php echo tt($imgsrc[0],1400,755); ?>);">
			
			<div class="specialscontent">
				<div class="specialtitle">
					<h3><?php echo $content2->post_title; ?> </h3>
					<h4><?php echo get_post_meta($content2->ID,'misfit_shortname',true); ?></h4>
				</div>
				 
			</div>
		</div></a>
 		
<?php $content3=get_page(2486); 
	  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $content3->ID ), "Full");
  ?>	<a href="<?php echo get_the_permalink($content3->ID); ?>">
		<div class="specialsbox" style="background-image: url(<?php echo tt($imgsrc[0],1400,755); ?>);">
			
			<div class="specialscontent">
				<div class="specialtitle">
					<h3><?php echo $content3->post_title; ?> </h3>
					<h4><?php echo get_post_meta($content3->ID,'misfit_shortname',true); ?></h4>
				</div>
				 
			</div>
		</div></a>
  		
<?php $content4=get_page(1285); 
	  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $content4->ID ), "Full");
  ?>	<a href="<?php echo get_the_permalink($content4->ID); ?>">
		<div class="specialsbox" style="background-image: url(<?php echo tt($imgsrc[0],1400,755); ?>);">
			
			<div class="specialscontent">
				<div class="specialtitle">
					<h3>Events Calendar</h3>
					<h4><?php echo get_post_meta($content4->ID,'misfit_shortname',true); ?></h4>
				</div>
				 
			</div>
		</div></a>
 
		
		
	</div>
</div>

<?php endwhile; endif; wp_reset_query(); ?>

<?php //include( TEMPLATEPATH . '/library/super-map.php'); ?>

</div> <!-- #wrapper -->


<?php get_footer(); ?>
