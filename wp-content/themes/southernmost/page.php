<?php 

/* 

Basic Page Template 

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
        <?php                        
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('
                <p id="breadcrumbs">','</p>
                ');
            }
        ?>  
		<div id="pagecontent">

			<div class="container">

				<div class="contenttitle">

					<h1 class="title"><?php the_title(); ?></h1>
                     <?php if(get_post_meta($post->ID,'misfit_subtitle')) : ?>
					   <h2 class="subtitle"><?php echo get_post_meta($post->ID,'misfit_subtitle',true); ?></h2>
                    <?php endif; ?>
				</div>

				<div class="socialmedia">
					<ul>
						<?php if(get_option('misfit_facebook')) { ?><li><a href="<?php echo get_option('misfit_facebook'); ?>" target="_blank" aria-label="link to southernmost facebook page"><i class="fa fa-facebook"></i></a></li><?php } ?>
						<?php if(get_option('misfit_twitter')) { ?><li><a href="<?php echo get_option('misfit_twitter'); ?>" target="_blank" aria-label="link to southernmost twitter page"><i class="fa fa-twitter"></i></a></li><?php } ?>
						<?php if(get_option('misfit_youtube')) { ?><li><a href="<?php echo get_option('misfit_youtube'); ?>" target="_blank" aria-label="link to southernmost youtube page"><i class="fa fa-youtube-play"></i></a></li><?php } ?>
						<?php if(get_option('misfit_instagram')) { ?><li><a href="<?php echo get_option('misfit_instagram'); ?>" target="_blank" aria-label="link to southernmost instagram page"><i class="fa fa-instagram"></i></a></li><?php } ?>
						<?php if(get_option('misfit_google_plus')) { ?><li><a href="<?php echo get_option('misfit_google_plus'); ?>" target="_blank" aria-label="link to southernmost google plus page"><i class="fa fa-google-plus"></i></a></li><?php } ?>
						<?php if(get_option('misfit_tripadvisor')) { ?><li><a href="<?php echo get_option('misfit_tripadvisor'); ?>" target="_blank" aria-label="link to southernmost tripadvisor page"><i class="fa fa-tripadvisor"></i></a></li><?php } ?>
					</ul>
				</div>

				<div class="content">
					
					<?php the_content(); ?>

				</div>

			</div>

		</div>

	</div>

<?php endwhile; endif; wp_reset_query(); ?>	

</div> <!-- #wrapper -->

<?php get_footer(); ?>