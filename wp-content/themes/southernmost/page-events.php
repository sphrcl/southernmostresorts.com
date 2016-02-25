<?php 

	/* Template Name: Events */

	 

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header(); ?>

	<?php wp_reset_query(); if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' ); ?>
		<?php $imglink = $image[0]; ?>
	<?php endif; ?>
		
	<?php if(get_option('misfit_events_page_featured_image')) { ?>
		<div class="scrollery">
									
						<img src="<?php echo get_option('misfit_events_page_featured_image1'); ?>">
							
						<img src="<?php echo get_option('misfit_events_page_featured_image2'); ?>">
						
						<img src="<?php echo get_option('misfit_events_page_featured_image3'); ?>">														
		</div>
	<?php } else { ?>
		<div id="eventheader" style="background-image: url('http://www.gateshotelkeywest.com/wp-content/uploads/2015/02/Jump-In1.jpg');"></div>
	<?php } ?>

	<?php if ( has_post_thumbnail() && 1 == $day['total_events'] ) : ?>
    	<div class="tribe-events-event-thumb"><?php echo get_the_post_thumbnail( $post->ID, array(90,90) );?></div>
	<?php endif; ?>
	
	<!--<div class="block-top"></div>-->
	
	<div id="wrapper">
		<div class="container">
			<div class="content">
			
				<h1 class="title pagetitle">Events</h1>
			</div>
		</div>
	</div>

	<div id="tribe-events-pg-template">
		<?php tribe_events_before_html(); ?>
		<?php tribe_get_view(); ?>
		<?php tribe_events_after_html(); ?>
	</div> <!-- #tribe-events-pg-template -->
<?php get_footer(); ?>