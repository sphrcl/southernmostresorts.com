<?php

/* Template Name: Dining

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

<div class="innerpage wrapper specials_page dining">
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
					<?php if(get_option('misfit_twitter')) { ?><li><a href="<?php echo get_option('misfit_twitter'); ?>" target="_blank" aria-label="link to southernmost twiiter page"><i class="fa fa-twitter"></i></a></li><?php } ?>
					<?php if(get_option('misfit_youtube')) { ?><li><a href="<?php echo get_option('misfit_youtube'); ?>" target="_blank" aria-label="link to southernmost youtube page"><i class="fa fa-youtube-play"></i></a></li><?php } ?>
					<?php if(get_option('misfit_instagram')) { ?><li><a href="<?php echo get_option('misfit_instagram'); ?>" target="_blank" aria-label="link to southernmost instagram page"><i class="fa fa-instagram"></i></a></li><?php } ?>
					<?php if(get_option('misfit_google_plus')) { ?><li><a href="<?php echo get_option('misfit_google_plus'); ?>" target="_blank" aria-label="link to southernmost google plus page"><i class="fa fa-google-plus"></i></a></li><?php } ?>
					<?php if(get_option('misfit_tripadvisor')) { ?><li><a href="<?php echo get_option('misfit_tripadvisor'); ?>" target="_blank" aria-label="link to southernmost tripadvisor page"><i class="fa fa-tripadvisor"></i></a></li><?php } ?>
				</ul>
			</div>
			<div class="content">
				<p>
					<?php the_content(); ?>
				</p>
			</div>
		</div>

	</div>

	<div id="specials_list">

		<?php

			$dining = new WP_Query(array(
				'post_type' => 'dining',
				'posts_per_page' => -1
			));

			if ( $dining->have_posts() ) : while ( $dining->have_posts() ) : $dining->the_post(); 

				$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");

		?>

			<div class="specialsbox">

				<div class="specialswrap">

				<a href="<?php the_permalink(); ?>" class="dropanchor" aria-label="<?php the_title(); ?>"></a>

					<div class="specialsimg" style="background-image: url('<?php echo tt($imgsrc[0],1400,755); ?>');"></div>

					<div class="specialscontent">
						<div class="specialtitle">
							<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
						</div>
					</div>

				</div>

			</div>

		<?php endwhile; endif; wp_reset_postdata(); ?>

	</div>

</div>

</div> <!-- #wrapper -->


<?php get_footer(); ?>
