<?php get_header(); ?>


<div id="overlay-back"></div>
<div class="close-image"><img src="<?php bloginfo ('template_url'); ?>/images/pop-close.png" alt="*"></div>
<div class="pops">
 <div class="white_pop"><img src="<?php bloginfo ('template_url'); ?>/images/poplogo.png" alt="*"> </div>
<div id="popup">
<script type="text/javascript" src="https://secure.opentable.com/frontdoor/default.aspx?rid=46771&restref=46771&bgcolor=F6F6F3&titlecolor=0F0F0F&subtitlecolor=0F0F0F&btnbgimage=https://secure.opentable.com/frontdoor/img/ot_btn_red.png&otlink=FFFFFF&icon=dark&mode=short&hover=1"></script>
<a href="http://www.opentable.com/southernmost-beach-cafe-reservations-key-west?rtype=ism&restref=46771" class="OT_ExtLink">Southernmost Beach Cafe (46771), Key West / Florida Keys Reservations</a>
</div>	
</div>

<div id="topbanner">

		<div class="flexslider topbanner">
			<ul class="slides">
			
				
			<?php $pagename = get_option('misfit_sliderpage');
				  $page = get_page_by_title($pagename);
				  $featured_id =  $page->ID;
							
	               query_posts(
            			
            			array(
            				'post_type' => 'page',
            				'p' => $featured_id,
            				'posts_per_page' => -1
            			)
            	
            		); if(have_posts()) : while(have_posts()) : the_post(); ?>
	
				 <?php $galleryImages = get_post_gallery_imagess(); 
			           $imagesCount = count($galleryImages); ?>
			           
        		<?php if ($imagesCount > 0) : ?>
              	<?php for ($i = 0; $i < $imagesCount; $i++): ?>
                <?php if (!empty($galleryImages[$i])) :?>
				                  		
				                  		
				<li style="background-image: url(<?php echo $galleryImages[$i]['full'][0];?>);">

				</li>
				
				<?php endif; ?>
    			<?php endfor; ?>
				<?php endif; ?>
					
												
				<?php endwhile; endif; wp_reset_query(); ?>										
														
			</ul>
		</div>

		<div class="topbanner-overlay"></div>
		<!-- removed
		<div class="arrow bounce"></div>
		-->
		<div class="topbannercontent">
			<div class="logo-white">
				<img src="<?php bloginfo ('template_url'); ?>/images/logo-white.png" alt="*" />
			</div>
			<div class="reservenow">
				<!-- they want it to go to reztrip
				<a class="button2" href="<?php echo get_option('misfit_booking_link'); ?>">Reserve Now</a>
				-->
				<a class="button2" href="https://southernmostbeachresort.reztrip.com">Reserve Now</a>
			</div>
		</div>

	</div>

	<div id="welcome">

		<div class="container">
			
			<?php query_posts('post_type=page&p=11'); if(have_posts()) : while(have_posts()) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			<?php endwhile; endif; wp_reset_query(); ?>	

		</div>

		<div class="socialmedia">
			<ul>
				<?php if(get_option('misfit_facebook')) { ?><li><a href="<?php echo get_option('misfit_facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php } ?>
				<?php if(get_option('misfit_twitter')) { ?><li><a href="<?php echo get_option('misfit_twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php } ?>
				<?php if(get_option('misfit_youtube')) { ?><li><a href="<?php echo get_option('misfit_youtube'); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li><?php } ?>
				<?php if(get_option('misfit_instagram')) { ?><li><a href="<?php echo get_option('misfit_instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php } ?>
				<?php if(get_option('misfit_google_plus')) { ?><li><a href="<?php echo get_option('misfit_google_plus'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php } ?>
				<?php if(get_option('misfit_tripadvisor')) { ?><li><a href="<?php echo get_option('misfit_tripadvisor'); ?>" target="_blank"><i class="fa fa-tripadvisor"></i></a></li><?php } ?>
			</ul>
		</div>

		<div class="formfields">

				<div class="reservationform">

					<form method="get" action="<?php echo get_option('misfit_booking_link'); ?>">

						<input type="hidden" value="1" name="rooms">
						
						<span class="calsec">
							<input type="text" id="date" placeholder="ARRIVAL" class="calendarsection">
							<input type="hidden" id="arvv" name="arrival_date">
						</span>
						
						<span class="calsec">
							<input type="text" id="dater" placeholder="DEPARTURE" class="calendarsection">
							<input type="hidden" id="deptt" name="departure_date">
						</span>
						
						<span class="dropsec">
							<select name="rooms" id="rooms" class="halfsies">
								<option value="" disabled selected>Total ROOMS</option>
								<option value="1">1 Room</option>
								<option value="2">2 Rooms</option>
							</select>
						</span>

						<span class="dropsec">
							<select name="adults[]" id="guests" class="halfsies">
								<option value="" disabled selected>Total GUESTS</option>
								<option value="1">1 Guest</option>
								<option value="2">2 Guests</option>
								<option value="3">3 Guests</option>
								<option value="4">4 Guests</option>
							</select>
						</span>

						<button type="submit" class="button3">See Availability</button>

					</form>

				</div>

			</div>

	</div>

	<div id="rooms-section">

		<div class="flexslider roomslider">
		  <ul class="slides">
		  
		  <?php query_posts('post_type=rooms&posts_per_page=15'); if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
		  
			<li style="background-image: url(<?php echo $imgsrc[0]; ?>);">
				<div class="room-caption">
					<h3><?php the_title(); ?></h3>
					<?php if(get_post_meta($post->ID, 'misfit_reservation', true)) { ?>
						<a class="button4" href="<?php echo get_post_meta($post->ID, 'misfit_reservation', true); ?>">Reserve Now</a><br/>
					<?php } ?>
					
					<a class="button5" href="<?php the_permalink(); ?>">DETAILS</a>
				</div>
				<div class="room-linkopen">
					
					<h3><?php the_title(); ?></h3>
					
					<?php
						$content = get_the_content();
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]&gt;', $content);
						preg_match('/<ul[^>]*>(.*)<\/ul>/is', $content, $ulmatch);
						preg_match('/<p[^>]*>(.*)<\/p>/is', $content, $pmatch);
						$pmatch = preg_split('/\s+/', $pmatch[1]);
					?>
					
					<p>
						<?php for ($i = 0; $i < 35; $i++) { ?>
							<?php
								if ($i != 34) { echo $pmatch[$i] . " "; }
								else { echo $pmatch[$i] . "... "; }
							?>
						<?php } ?>
						<a href="<?php the_permalink(); ?>">Click to view room</a>
					</p>
					
					<!--
					<ul>
						<?php echo $ulmatch[1]; ?>
					</ul>
					-->
					<!--<?php //query_posts('post_type=page&p=912'); if(have_posts()) : while(have_posts()) : the_post(); ?>

						<p style="text-transform: uppercase;"><?php the_title(); ?></p>
						<?php the_content(); ?>

					<?php //endwhile; endif; wp_reset_query(); ?>	-->

					<?php $recent = new WP_Query('page_id=912');
						while ($recent->have_posts()) : $recent->the_post(); ?>
						    
						<p style="text-transform: uppercase;"><?php the_title(); ?></p>
												<?php the_content(); ?>
						<?php endwhile;
						wp_reset_postdata(); ?>	

					<div class="mobcloseme"><a class="button5 closeme">Close</a></div>
				</div>
			</li>
			
			<?php endwhile; endif; wp_reset_query(); ?>	
			
		  </ul>
		</div>
		<div class="flexslider roomcarousel">
		  <ul class="slides">
		  
		  	<?php query_posts('post_type=rooms&posts_per_page=15'); if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
		  
			<li>
			
			
			<?php if(get_post_meta($post->ID, 'misfit_shortname', true)) { ?>
			<div class="roomboom" style="background-image: url(<?php echo $imgsrc[0]; ?>);"></div>
			  <div class="flex-caption"><?php the_title(); ?> <!-- <?php echo get_post_meta($post->ID, 'misfit_shortname', true); ?> --></div>
			<?php } else { ?>
			<div class="roomboom" style="background-image: url(<?php echo $imgsrc[0]; ?>);"></div>
				 <div class="flex-caption"><?php the_title(); ?></div>
			<?php } ?>
			</li>
		
			<?php endwhile; endif; wp_reset_query(); ?>	
			
			<!-- items mirrored twice, total of 12 -->
		  </ul>
		</div>

	</div>

	<div id="discover">

		<h4>discover southernmost beach resort</h4>
		
		<?php if(get_option('misfit_discover')) { ?>
		
		<p class="disco"><?php echo get_option('misfit_discover'); ?></p>
		
		<?php } ?>

		<div class="flexslider discoverdining">
		
			<?php query_posts('post_type=page&p=27'); if(have_posts()) : while(have_posts()) : the_post(); ?>

			<h5 class="discovertext"><?php the_title(); ?></h5>
			
			<a href="<?php the_permalink(); ?>" class="dropanchor"></a>

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
				
			<?php endwhile; endif; wp_reset_query(); ?>
			
		</div>

		<div class="flexslider discoverweddings">
			
			
			<?php query_posts('post_type=page&p=100'); if(have_posts()) : while(have_posts()) : the_post(); ?>

			<h5 class="discovertext"><?php the_title(); ?></h5>
			
			<a href="<?php the_permalink(); ?>" class="dropanchor"></a>

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
				
			<?php endwhile; endif; wp_reset_query(); ?>

		</div>

	</div>

	<div id="instagram">
		<h4><a target="_blank" href="<?php echo get_option('misfit_instagram'); ?>">follow us on instagram</a></h4>

		<div id="instafeed"></div>

	</div>


</div> <!-- #wrapper -->






<?php get_footer(); ?>