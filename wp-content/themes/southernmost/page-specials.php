<?php 

/* Template Name: Specials

*/
 get_header(); ?>


<div id="topbanner">


<?php 
	if(have_posts()) : while(have_posts()) : the_post(); 
	$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
?>

	<div class="static-banner" style="background-image: url('<?php echo tt($imgsrc[0],1400,755); ?>')"></div>

	<div class="topbanner-overlay"></div>


<?php endwhile; endif; wp_reset_query(); ?>	


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
					<li><a href="<?php echo get_option('misfit_facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
					<li><a href="<?php echo get_option('misfit_twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
					<li><a href="<?php echo get_option('misfit_youtube'); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
					<li><a href="<?php echo get_option('misfit_instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
				</ul>
			</div>

			<div class="content">
				<!-- the_content(); -->
			</div>

		</div>

	</div>

	<div id="specials_list">
	
	
	<?php 

			$dining = new WP_Query(array(					
				'post_type' => 'sspecials',
				'posts_per_page' => -1
			));

			if($dining->have_posts()) : while($dining->have_posts()) : $dining->the_post(); 
			$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");

		?>
		
		
		<div class="specialsbox" style="background-image: url(<?php echo tt($imgsrc[0],1400,755); ?>);">
		
			
			<div class="specialscontent">
				<div class="specialtitle">
					<h3><?php the_title(); ?></h3>
					<h4><?php echo get_post_meta($post->ID,'misfit_shortname',true); ?></h4>
				</div>
				<div class="specialbuttons">
					<a class="button6" href="<?php echo get_post_meta($post->ID,'misfit_reservation',true); ?>">Book</a>
					<a class="button7" href="<?php the_permalink(); ?>">Details</a>
				</div>
			</div>
		</div>

		<?php endwhile; endif; wp_reset_query(); ?>	
		
		
		
	</div>

</div> <!-- #wrapper -->


<?php get_footer(); ?>