<?php 

	get_header(); 

	$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");

?>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/nivo/nivo-lightbox.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/nivo/themes/default/default.css" type="text/css" />
<script src="<?php bloginfo('template_url'); ?>/js/nivo/nivo-lightbox.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

	    if ($.fn.nivoLightbox) {
	        $('.lightbox').nivoLightbox();
	    }

	});
</script>

<div id="topbanner">

	<?php if(get_post_meta($post->ID,'misfit_banner_title',true)) { ?><div class="banner-title"><h2><?php echo get_post_meta($post->ID,'misfit_banner_title',true); ?></h2></div><?php } ?>

	<div class="static-banner" style="background-image: url('<?php echo tt($imgsrc[0],1400,755); ?>')"></div>

	<?php if(get_post_meta($post->ID,'misfit_banner_title',true)) { ?><div class="topbanner-overlay"></div><?php } ?>

</div>

<ul class="page-nav">

	<?php 
				
		// $ancestors = get_post_ancestors($post->ID);
		// $parents = $ancestors[0];
		$this_post = $post->ID;
		$query_gallery_single = new wp_query(array(
			'post_type' => 'imagegalleries',
			'posts_per_page'=> 6,	
		)); 
		$count = 1;

		if($query_gallery_single->have_posts()) : while($query_gallery_single->have_posts()) : $query_gallery_single->the_post(); 

	?>

		<li <?php if( $this_post == $post->ID ) { echo ' class="current"'; } ?>>
			<a href="<?php the_permalink(); ?>"><?php if( $this_post == $post->ID ) echo '<h1>' ?><?php the_title(); ?><?php if( $this_post == $post->ID ) echo '</h1>' ?></a>
		</li>
	
	
	<?php $count++; endwhile; endif; wp_reset_query(); ?>	
			
</ul>
	
<div class="innerpage wrapper">
	<div id="pagecontent">

		<div class="container">

			<ul class="gallery-list">
				
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
								
					<?php if(get_the_title() == "Webcam")  { ?>
					
						<div class="webcamblock">
					
							<div class="bigcam">
								<iframe src="https://www.youtube.com/embed/QHjVJt8MARA?autoplay=1" frameborder="0" allowfullscreen></iframe>
							</div>

							<div class="smallcams">
								<iframe src="https://www.youtube.com/embed/eNCwj35OwmI?autoplay=1" frameborder="0" allowfullscreen></iframe>
								<iframe src="https://www.youtube.com/embed/se9t8P6g0ko?autoplay=1" frameborder="0" allowfullscreen></iframe>
							</div>

							<div class="clear"></div>

						</div>
							
					<?php } else { ?>
					
						<?php
							$galleryImages = get_post_gallery_imagess(); 
							$imagesCount = count($galleryImages); 
					    ?>
						           
		        		<?php if ($imagesCount > 0) : ?>
		              	<?php for ($i = 0; $i < $imagesCount; $i++): ?>
		                <?php if (!empty($galleryImages[$i])) :?>
						                  		
							<a class="lightbox" href="<?php echo $galleryImages[$i]['full'][0]; ?>" data-lightbox-gallery="<?php echo $post->post_name; ?>"><img src="<?php echo tt($galleryImages[$i]['full'][0],240,220); ?>" alt="<?php echo $galleryImages[$i]['alt']; ?>"></a>
					
						<?php endif; endfor; endif; ?>
						
						
					<?php } ?>
					
				<?php endwhile; endif; wp_reset_query(); ?>	

			</ul>	

			<?php 
				$galleryinfo = get_the_ID();

				if ($galleryinfo == 1099){ ?>

				<p><br /><br />Wanting to add extra sizzle to your stay? Choose from our list of special gifts to make your visit at the Southernmost Beach Resort extraordinary!</p>

				<p>Please call us at <a href="tel:1800-354-4455">800-354-4455</a>, or <a href="mailto:guestrelations@southernmostresorts.com">email</a> us directly to add any of the above items to your stay. For more information and prices, click <a href="//www.southernmostbeachresort.com/hotel-amenities/add-ons/">here.</a></p>

			 <?php } ?>			

		</div>

	</div>

</div> <!-- #wrapper -->

</div>

<?php get_footer(); ?>