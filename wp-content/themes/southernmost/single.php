<?php 

/* 

Basic Single Post Template 

*/


get_header(); ?>

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
		
	<div class="innerpage wrapper specials_page">
		<div id="pagecontent">

			<div class="container">

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

		</div>

	</div> <!-- #wrapper -->

<?php endwhile; endif; wp_reset_query(); ?>	


<?php get_footer(); ?>
