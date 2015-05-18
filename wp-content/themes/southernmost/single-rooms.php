<?php 

/* Template Name: Meeting

*/
 get_header(); ?>


<div id="topbanner">



<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

	<div class="flexslider meetingslider">
	<h1 class="roomtits"><?php the_title(); ?></h1>
	<a class="button roomtitties" href="<?php echo get_post_meta($post->ID,'misfit_reservation',true); ?>">See Availability</a>
	  <ul class="slides">
	  
	  
		 <?php $galleryImages = get_post_gallery_imagess(); 
			           $imagesCount = count($galleryImages); ?>
			           
        		<?php if ($imagesCount > 0) : ?>
              	<?php for ($i = 0; $i < $imagesCount; $i++): ?>
                <?php if (!empty($galleryImages[$i])) :?>
                
				
				
				<li style="background-image: url(<?php echo $galleryImages[$i]['full'][0];?>);"></li>
				
				
				
				
				<?php endif; ?>
    			<?php endfor; ?>
				<?php endif; ?>		<!-- items mirrored twice, total of 12 -->
	  </ul>
	</div>
	<div class="flexslider meetingcarousel">
	  <ul class="slides">
		 <?php $galleryImages = get_post_gallery_imagess(); 
			           $imagesCount = count($galleryImages); ?>
			           
        		<?php if ($imagesCount > 0) : ?>
              	<?php for ($i = 0; $i < $imagesCount; $i++): ?>
                <?php if (!empty($galleryImages[$i])) :?>
                
				
				
				<li style="background-image: url(<?php echo $galleryImages[$i]['full'][0];?>);"></li>
				
				
				
				
				<?php endif; ?>
    			<?php endfor; ?>
				<?php endif; ?>
	  </ul>
	</div>
	<?php endwhile; endif; wp_reset_query(); ?>	
</div>
<div class="wrapper">
	<div id="submenu">
		<!-- <ul class="subnavigation roomsub">
			<?php $thisid = $post->ID; ?>
			
			<?php query_posts('post_type=rooms&posts_per_page=-1'); if(have_posts()) : while(have_posts()) : the_post(); ?>
			
				<?php $otherid = $post->ID; ?>	
				
				<li<?php if($thisid == $otherid) { ?> class="current"<?php } ?>><a href="<?php the_permalink(); ?>"><?php echo get_post_meta($post->ID,'misfit_shortname',true); ?></a></li>
				
			<?php endwhile; endif; wp_reset_query(); ?>	
		</ul> -->
		</div>
	</div>

	<div id="pagecontent">
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		
		
		<div class="container">

			<div class="contenttitle">

				<h1 class="title"><?php the_title(); ?></h1>
				<h2 class="subtitle"><?php echo get_post_meta($post->ID,'misfit_shortname',true); ?>.</h2>

			</div>

			<div class="socialmedia">
				<ul>
					<li><a href="<?php echo get_option('misfit_facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
					<li><a href="<?php echo get_option('misfit_twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
					<li><a href="<?php echo get_option('misfit_youtube'); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
					<li><a href="<?php echo get_option('misfit_instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
					<li><a href="http://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
				</ul>
			</div>

			<div class="content">

				<?php
			        $gallery = get_post_gallery();			
			        $content = strip_shortcode_gallery( get_the_content() );                                        
			        $content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $content ) ); 
			        echo $content;
		        ?>
		        
		        <ul id="toggle-view">
		        	<li class="activated">
		        		<h3>Available Rates and Packages</h3>
		        		
		        		<div class="panel">

		        			<?php 
								$repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
								if( $repeatable_fields ) { foreach ( $repeatable_fields as $field ) { 
							?>

								<?php if ($field['url'] != '' || $field['description'] != '' || $field['namer'] != '') { ?>

									<div class="promo">				        			
				        				<h2><?php echo $field['namer']; ?></h2>				        				
				        				<p><?php echo $field['description']; ?></p>				        				
				        				<a class="button" href="<?php echo $field['url']; ?>">Reserve Now</a>
				        				<div class="clear"></div>					        				
				        			</div>

			        			<?php } ?>

							<?php } } ?>
		        						        		
		        		</div>
		        	</li>
		        </ul>
			        
			</div>

		</div>
		
		<?php endwhile; endif; wp_reset_query(); ?>	

	</div>


</div> <!-- #wrapper -->


<?php get_footer(); ?>