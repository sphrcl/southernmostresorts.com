<?php 

	/* Template Name: Amenities */

	get_header(); 


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
	<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
		
		<?php if(get_post_meta($post->ID,'misfit_banner_title',true)) { ?>
			<div class="banner-title"><h2><?php echo get_post_meta($post->ID,'misfit_banner_title',true); ?></h2></div>
		<?php } ?>
		
		<div class="static-banner short" style="background-image: url('<?php echo tt($imgsrc[0],1400,755); ?>')"></div>

		<?php if(get_post_meta($post->ID,'misfit_banner_title',true)) { ?>
			<div class="topbanner-overlay"></div>
		<?php } ?>
		
	<?php endwhile; endif; wp_reset_query(); ?>	

</div>

	
<div class="innerpage wrapper">
	<div id="pagecontent">
		<div class="container">
			
			<?php if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
				
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
					
					<div class="content">
						<?php the_content(); ?>
					</div>
				</div>
			
			<?php endwhile; endif; wp_reset_query(); ?>
			
			<ul id="toggle-view">				
				<?php 
					$query_amenities = new wp_query(array(
						'post_type' => 'samenities'
					)); 
					if($query_amenities->have_posts()) : while($query_amenities->have_posts()) : $query_amenities->the_post();
					$imgsrcs = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
			    ?>
					
					<li>
						<h3><?php the_title(); ?></h3>
						
						<div class="panel">
							
							<div class="halfsie">
								<?php the_content(); ?>
							</div>
							
							<div class="rhalfsie">
								<div class="prices">
									
									<?php
										$images = get_post_meta($post->ID, 'misfit_commalist', true);
										//check that we have a custom field
										
										if ($images != "") {
											
											// Separate our comma separated list into an array
											$images = explode(",", $images);
											//loop through our new array
											foreach ($images as $image) {
												echo '<p>' . $image . '</p>';
											}
										}
									?>
									
								</div>
							</div>
							
							<div class="clear"></div>
						
						</div>
					</li>
					
				<?php endwhile; endif; wp_reset_query(); ?>	
				
			</ul>
		</div>
	</div>
</div>

</div> <!-- #wrapper -->

<?php get_footer(); ?>