<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header('events'); ?>

	<?php wp_reset_query(); if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' ); ?>
		<?php $imglink = $image[0]; ?>
	<?php endif; ?>
		
	<?php if(get_option('misfit_events_page_featured_image')) { ?>
		<div class="scrollery">
									
						<img src="<?php echo get_option('misfit_events_page_featured_image1'); ?>" alt="<?php echo get_custom_image_thumb_alt_text(get_option('misfit_events_page_featured_image1')); ?>">
							
						<img src="<?php echo get_option('misfit_events_page_featured_image2'); ?>" alt="<?php echo get_custom_image_thumb_alt_text(get_option('misfit_events_page_featured_image2')); ?>">
						
						<img src="<?php echo get_option('misfit_events_page_featured_image3'); ?>" alt="<?php echo get_custom_image_thumb_alt_text(get_option('misfit_events_page_featured_image3')); ?>">														
		</div>
	<?php } else { ?>
		<div id="eventheader" style="background-image: url('//www.gateshotelkeywest.com/wp-content/uploads/2015/02/Jump-In1.jpg');"></div>
	<?php } ?>

	<?php if ( has_post_thumbnail() && 1 == $day['total_events'] ) : ?>
    	<div class="tribe-events-event-thumb"><?php echo get_the_post_thumbnail( $post->ID, array(90,90) );?></div>
	<?php endif; ?>
	
	<!--<div class="block-top"></div>-->
	
 

	<div id="tribe-events-pg-template">
		<?php tribe_events_before_html(); ?>
		<?php tribe_get_view(); ?>
		<?php tribe_events_after_html(); ?>
	</div> <!-- #tribe-events-pg-template -->
<?php get_footer('events'); ?>