<?php 

/* Template Name: Dining

*/
 get_header(); ?>


<div id="topbanner">

	<div class="flexslider topbanner">

		<div class="banner-title"><h2><?php the_title(); ?></h2></div>
		
		<ul class="slides">

			<?php 
				$pagename = get_option('misfit_sliderpage');
				$page = get_page_by_title($pagename);
				$featured_id =  $page->ID;
							
				$query_dining = new wp_query(array(
					'post_type' => 'page',
					'p' => $featured_id,
					'posts_per_page' => -1
				)); 

				if($query_dining->have_posts()) : while($query_dining->have_posts()) : $query_dining->the_post(); 

					$galleryImages = get_post_gallery_imagess(); 
					$imagesCount = count($galleryImages); 
		    ?>
			           
        		<?php if ($imagesCount > 0) : ?>
              	<?php for ($i = 0; $i < $imagesCount; $i++): ?>
                <?php if (!empty($galleryImages[$i])) :?>
				                  		
				                  		
					<li style="background-image: url('<?php echo tt($galleryImages[$i]['full'][0],1400,755); ?>');"></li>
				
				<?php endif; endfor; endif; ?>
				
											
			<?php endwhile; endif; wp_reset_query(); ?>	

		</ul>
	</div>

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
					<li><a href="http://facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
					<li><a href="http://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
					<li><a href="http://youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
					<li><a href="http://instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
				</ul>
			</div>

		</div>

	</div>

	<div id="specials_list">

		<?php 

			$dining = new WP_Query(array(					
				'post_type' => 'dining',
				'posts_per_page' => -1
			));

			if($dining->have_posts()) : while($dining->have_posts()) : $dining->the_post(); 
			$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");

		?>

			<div class="specialsbox" style="background-image: url('<?php echo tt($imgsrc[0],1400,755); ?>');">
				<div class="specialscontent">
					<div class="specialtitle">
						<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
					</div>
				</div>
			</div>

		<?php endwhile; endif; wp_reset_query(); ?>	

	</div>

</div> <!-- #wrapper -->


<?php get_footer(); ?>