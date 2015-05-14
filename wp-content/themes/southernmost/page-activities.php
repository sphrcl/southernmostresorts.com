<?php 

	/* Template Name: Activities */

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

<div id="topbanner">

	<?php if(get_post_meta($post->ID,'misfit_banner_title',true)) { ?><div class="banner-title"><h2><?php echo get_post_meta($post->ID,'misfit_banner_title',true); ?></h2></div><?php } ?>

	<div class="static-banner short" style="background-image: url('<?php echo tt($imgsrc[0],1400,755); ?>')"></div>

	<?php if(get_post_meta($post->ID,'misfit_banner_title',true)) { ?><div class="topbanner-overlay"></div><?php } ?>

</div>

 <ul class="page-nav">

	<?php 
				
		// $ancestors = get_post_ancestors($post->ID);
		// $parents = $ancestors[0];
		$this_post = $post->ID;
		$query_gallery_single = new wp_query(array(
			'post_type' => 'activities',
			'posts_per_page'=> 6,	
		)); 
		$count = 1;

		if($query_gallery_single->have_posts()) : while($query_gallery_single->have_posts()) : $query_gallery_single->the_post(); 

	?>

		<li <?php if( $count == 1 ) { echo ' class="current"'; } ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	
	
	<?php $count++; endwhile; endif; wp_reset_query(); ?>	
			
</ul> 
	
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
						<li><a href="<?php echo get_option('misfit_facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="<?php echo get_option('misfit_twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li><a href="<?php echo get_option('misfit_youtube'); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
						<li><a href="<?php echo get_option('misfit_instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>

			</div>

			<ul class="post-list">
				
				<?php 
					$query_activities = new wp_query(array(
						'post_type' => 'activities',
						'posts_per_page' => 10
					)); 
					if($query_activities->have_posts()) : while($query_activities->have_posts()) : $query_activities->the_post();
					$imgsrcs = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
			    ?>
				           
	        		<li>
	        			
	        			<div class="post-image left" style="background-image: url('<?php echo tt($imgsrcs[0],550,330); ?>');"); ><a href="<?php the_permalink(); ?>" class="dropanchor"></a></div>
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
</div> <!-- #wrapper -->
<?php endwhile; endif; wp_reset_query(); ?>	


<?php get_footer(); ?>