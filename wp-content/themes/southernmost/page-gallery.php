<?php 

	/* Template Name: Gallery */

	get_header(); 

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

	<div class="banner-title"><h2><?php echo get_post_meta($post->ID,'misfit_banner_title',true); ?></h2></div>

	<div class="static-banner" style="background-image: url('<?php echo tt($imgsrc[0],1400,755); ?>')"></div>

	<div class="topbanner-overlay"></div>

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

		<li <?php if( $count == 1 ) { echo ' class="current"'; } ?>>
			<a href="<?php the_permalink(); ?>"><?php if( $count == 1 ) echo '<h1>' ?><?php the_title(); ?><?php if( $count == 1 ) echo '</h1>' ?></a>
		</li>
	
	
	<?php $count++; endwhile; endif; wp_reset_query(); ?>	
			
</ul>
	
<div class="innerpage wrapper">
    <?php                        
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('
            <p id="breadcrumbs">','</p>
            ');
        }
    ?>  
	<div id="pagecontent">

		<div class="container">

			<ul class="gallery-list">
				
				<?php 
					$pagename = get_option('misfit_sliderpage');
					$page = get_page_by_title($pagename);
					$featured_id =  $page->ID;
					$query_gallery = new wp_query(array(
						'post_type' => 'page',
						'p' => $featured_id,
						'posts_per_page' => -1
					)); 

					if($query_gallery->have_posts()) : while($query_gallery->have_posts()) : $query_gallery->the_post(); 

						$galleryImages = get_post_gallery_imagess(); 
						$imagesCount = count($galleryImages); 
			    ?>
				           
	        		<?php if ($imagesCount > 0) : ?>
	              	<?php for ($i = 0; $i < $imagesCount; $i++): ?>
	                <?php if (!empty($galleryImages[$i])) :?>
					                  		
						<a class="lightbox" href="<?php echo $galleryImages[$i]['full'][0]; ?>" data-lightbox-gallery="<?php echo $post->post_name; ?>"><img src="<?php echo tt($galleryImages[$i]['full'][0],240,220); ?>" alt="<?php echo $galleryImages[$i]['alt']; ?>"></a>
					
					<?php endif; endfor; endif; ?>
					
				<?php endwhile; endif; wp_reset_query(); ?>	

			</ul>			

		</div>

	</div>
</div>

</div> <!-- #wrapper -->


<?php get_footer(); ?>