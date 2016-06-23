<?php

	/* Template Name: Activities Special Events */

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

<?php //include( TEMPLATEPATH . '/library/activities-map.php'); ?>


 <div class="mapbox">

	<div id="maparea" style="width: 100%;"></div>

	 <ul id="toggles" class="page-nav">

		<?php

			$this_post = $post->ID;
			$query_gallery_single = new wp_query(array(
				'post_type' => 'page',
				'post_parent' => $this_post,
				'posts_per_page'=> 6
			));
			$count = 1;

			if($query_gallery_single->have_posts()) : while($query_gallery_single->have_posts()) : $query_gallery_single->the_post();

		?>

			<li class="<?php echo $post->post_name; ?>" <?php if( $count == 1 ) { echo ' class="current"'; } ?>><a class="linkerd active" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>


		<?php $count++; endwhile; endif; wp_reset_query(); ?>

	</ul>

</div> 

<div id="topbanner">

	<div class="static-banner" style="background-image: url('<?php echo tt($imgsrc[0],1400,755); ?>')"></div>

	<div class="topbanner-overlay"></div>

</div>

 

<div class="innerpage wrapper">
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

			<ul class="post-list">

				<?php
					$query_activities = new wp_query(array(
						'post_type' => 'activities',
						'posts_per_page' => 10,
				        'post__not_in' => array(445,2579,1285)
					));
					if($query_activities->have_posts()) : while($query_activities->have_posts()) : $query_activities->the_post();
					$imgsrcs = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
			    ?>

	        		<li>

	        			<div class="post-image left" style="background-image: url('<?php echo tt($imgsrcs[0],550,330); ?>');" ><a href="<?php the_permalink(); ?>" class="dropanchor"></a></div>
	        			<div class="post-content right">
	        				<h3><?php the_title(); ?></h3>
	        				<p><?php echo excerpt(50); ?></p>

	        				<a class="button" href="<?php the_permalink(); ?>">Details</a>
	        			</div>

	        		</li>

				<?php endwhile; endif; wp_reset_query(); ?>

			</ul>

		</div>

	</div>
</div>

<?php endwhile; endif; wp_reset_query(); ?>

<?php //include( TEMPLATEPATH . '/library/super-map.php'); ?>

</div> <!-- #wrapper -->


<?php get_footer(); ?>
