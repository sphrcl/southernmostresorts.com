<?php get_header(); ?>




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
		<div class="arrow bounce"></div>

		<div class="topbannercontent">
			<div class="logo-white">
				<img src="<?php bloginfo ('template_url'); ?>/images/logo-white.png" alt="*" />
			</div>
			<div class="reservenow">
				<a class="button2" href="#">Reserve Now</a>
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
				<li><a href="http://facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
				<li><a href="http://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
				<li><a href="http://youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
				<li><a href="http://instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
			</ul>
		</div>

		<div class="formfields">

				<div class="reservationform">

					<form method="get" action="https://reztrip.com/search?">

						<span class="calsec">
							<input type="text" id="date" name="date" placeholder="SELECT DATES" class="calendarsection">
							<input type="hidden" id="arv">
						</span>

						<span class="dropsec">
							<select name="rooms[]" id="rooms" class="halfsies">
								<option value="" disabled selected>NUMBER OF ROOMS</option>
								<option value="1">1 Room</option>
								<option value="2">2 Rooms</option>
								<option value="3">3 Rooms</option>
								<option value="4">4 Rooms</option>
							</select>
						</span>

						<span class="dropsec">
							<select name="guests[]" id="guests" class="halfsies">
								<option value="" disabled selected>NUMBER OF GUESTS</option>
								<option value="1">1 Guest</option>
								<option value="2">2 Guests</option>
								<option value="3">3 Guests</option>
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
		  
		  <?php query_posts('post_type=rooms'); if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
		  
			<li style="background-image: url(<?php echo $imgsrc[0]; ?>);">
				<div class="room-caption">
					<h3><?php the_title(); ?></h3>
					<?php if(get_post_meta($post->ID, 'cebo_reservation', true)) { ?>
						<a class="button4" href="<?php echo get_post_meta($post->ID, 'cebo_reservation', true); ?>">Reserve Now</a><br/>
					<?php } ?>
					<a class="button5" href="<?php the_permalink(); ?>">DETAILS</a>
				</div>
			</li>
			
			<?php endwhile; endif; wp_reset_query(); ?>	
			
			<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/roomthumb2.jpg);">
				<div class="room-caption">
					<h3>One King</h3>
					<a class="button4" href="#">Reserve Now</a><br/>
					<a class="button5" href="#">DETAILS</a>
				</div>
			</li>
			<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/roomthumb3.jpg);">
				<div class="room-caption">
					<h3>Two Queen</h3>
					<a class="button4" href="#">Reserve Now</a><br/>
					<a class="button5" href="#">DETAILS</a>
				</div>
			</li>
			<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/roomthumb4.jpg);">
				<div class="room-caption">
					<h3>Deluxe King</h3>
					<a class="button4" href="#">Reserve Now</a><br/>
					<a class="button5" href="#">DETAILS</a>
				</div>
			</li>
			<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/roomthumb5.jpg);">
				<div class="room-caption">
					<h3>Junior Suite</h3>
					<a class="button4" href="#">Reserve Now</a><br/>
					<a class="button5" href="#">DETAILS</a>
				</div>
			</li>
			<!-- items mirrored twice, total of 12 -->
		  </ul>
		</div>
		<div class="flexslider roomcarousel">
		  <ul class="slides">
		  
		  	<?php query_posts('post_type=rooms'); if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
		  
			<li style="background-image: url(<?php echo $imgsrc[0]; ?>);">
			<?php if(get_post_meta($post->ID, 'cebo_reservation', true)) { ?>
			  <div class="flex-caption"><?php echo get_post_meta($post->ID, 'cebo_reservation', true); ?></div>
			<?php } else { ?>
				 <div class="flex-caption"><?php the_title(); ?></div>
			<?php } ?>
			</li>
		
			<?php endwhile; endif; wp_reset_query(); ?>	
			
			
			<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/roomthumb2.jpg);">
			  <div class="flex-caption">One King</div>
			</li>
			<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/roomthumb3.jpg);">
			  <div class="flex-caption">Two Queen</div>
			</li>
			<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/roomthumb4.jpg);">
			  <div class="flex-caption">Deluxe King</div>
			</li>
			<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/roomthumb5.jpg);">
			  <div class="flex-caption">Junior Suite</div>
			</li>
			<!-- items mirrored twice, total of 12 -->
		  </ul>
		</div>

	</div>

	<div id="discover">

		<h4>discover southernmost beach resort</h4>

		<div class="flexslider discoverdining">

			<h5 class="discovertext">Dining</h5>

			<ul class="slides">
				<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/dining1.jpg);">

				</li>
				<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/dining2.jpg);">

				</li>
				<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/dining3.jpg);">

				</li>
			</ul>

		</div>

		<div class="flexslider discoverweddings">

			<h5 class="discovertext">Weddings</h5>

			<ul class="slides">
				<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/wedding1.jpg);">

				</li>
				<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/wedding2.jpg);">

				</li>
				<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/wedding3.jpg);">

				</li>
			</ul>

		</div>

	</div>

	<div id="instagram">
		<h4><a href="#">follow us on instagram</a></h4>

		<div id="instafeed"></div>

	</div>


</div> <!-- #wrapper -->






<?php get_footer(); ?>