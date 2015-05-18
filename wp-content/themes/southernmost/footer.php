<?php
/**
 * The template for displaying the footer.
 *
**/
?>



	<div id="footer">
		<div class="footaddress"><?php echo get_option('misfit_footer_address'); ?></div>

		<div class="footcolumn">
			<div class="footleft">

				<p>Sign up for our email newsletter for special offers</p>
				<div class="newsletter">
					<form name="" action="#" method="get">
						<input type="text" name="name" value="" placeholder="Your Name" >
						<input type="text" name="email" value="" placeholder="Your Email" >
						<input type="submit" value="Submit">
					</form>
				</div>

			</div>

			<div class="footmiddle">

				<div class="footerlogo">
					<a href="index.html"><img src="<?php bloginfo ('template_url'); ?>/images/logo-footer.png" alt="Southernmost"></a>
				</div>

				<div class="socialmedia">
					<ul>
						<li><a href="<?php echo get_option('misfit_facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="<?php echo get_option('misfit_twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li><a href="<?php echo get_option('misfit_youtube'); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
						<li><a href="<?php echo get_option('misfit_instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>

			<div class="footright">
				<?php echo get_option('misfit_footer_paragraph'); ?>
			</div>

		</div>

		<div class="footnav">
			<ul class="footernavigation">
				<?php wp_nav_menu( array( 'theme_location' => 'footer_nav' ,  'items_wrap' => '%3$s', 'container' => '', 'menu_class' => 'navitem' ) ); ?>
				<!-- <li><a href="#">Privacy Policy</a></li>
				<li><a href="#">Site Map</a></li>
				<li><a href="#">Press</a></li>
				<li><a href="#">Contact</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Hotel Policies</a></li> -->
			</ul>
		</div>


	</div>


		<section class="rightnav">
			
			<div class="royalewrap"><a class="royale" href="#"><img src="<?php bloginfo ('template_url'); ?>/images/hamburger-close.png" alt="menu"/></a></div>

			<div class="spacer"></div>
			
			<div id="navmenumob">
				<!-- <div class="slidedown-navmob">
					<ul class="slidedownlist">
						<li class="first"><a href="<?php bloginfo('url');?>/rooms/">Accommodations</a><span class="ibox pressroom"><i class="fa fa-plus"></i></span></li>
						<li><a href="<?php bloginfo('url');?>/photo-gallery-2/">Gallery</a><span class="ibox pressphot"><i class="fa fa-plus"></i></span></li>
						<li><a href="<?php bloginfo('url');?>/vacation-packages/">Specials</a><span class="ibox pressvaca"><i class="fa fa-plus"></i></span></li>
						<li class="last"><a href="<?php bloginfo('url');?>/dining-2/">Dining</a><span class="ibox pressdini"><i class="fa fa-plus"></i></span></li>
					</ul>
				</div> -->

				<?php wp_nav_menu( array( 'theme_location' => 'secondary' ,  'container' => false, 'menu_class' => 'topnavigationmob' ) ); ?>
			</div>

		</section><!-- end right nav -->
		
		<section class="secondrightnav">
			<div class="srnbox">
				<div class="srnlist">
					
					<ul class="pressroom">
						
						<?php 
							$query_slidedown_rooms = new wp_query(array(
								'post_type' => 'rooms',
								'posts_per_page' => -1
							)); 
							if($query_slidedown_rooms->have_posts()) : while($query_slidedown_rooms->have_posts()) : $query_slidedown_rooms->the_post();
							$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
						?>
						
						<li>
							<a href="<?php the_permalink(); ?>">
								<div style="background-image: url(<?php echo tt($imgsrc[0],320,240); ?>);"></div>
								<h3><?php the_title(); ?></h3>
							</a>
						</li>
						
						<?php endwhile; endif; wp_reset_query(); ?>
						
					</ul>
					
					<ul class="pressphot">
						
						<?php 
							$query_slidedown_gallery = new wp_query(array(
								'post_type' => 'imagegalleries',
								'posts_per_page' => -1
							)); 
							if($query_slidedown_gallery->have_posts()) : while($query_slidedown_gallery->have_posts()) : $query_slidedown_gallery->the_post();
							$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
						?>
						
						<li>
							<a href="<?php the_permalink(); ?>">
								<div style="background-image: url(<?php echo tt($imgsrc[0],320,240); ?>);"></div>
								<h3><?php the_title(); ?></h3>
							</a>
						</li>
						
						<?php endwhile; endif; wp_reset_query(); ?>
						
					</ul>
					
					<ul class="pressvaca">
						
						<?php 
							$query_slidedown_gallery = new wp_query(array(
								'post_type' => 'sspecials',
								'posts_per_page' => -1
							)); 
							if($query_slidedown_gallery->have_posts()) : while($query_slidedown_gallery->have_posts()) : $query_slidedown_gallery->the_post();
							$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
						?>
						
						<li>
							<a href="<?php the_permalink(); ?>">
								<div style="background-image: url(<?php echo tt($imgsrc[0],320,240); ?>);"></div>
								<h3><?php the_title(); ?></h3>
							</a>
						</li>
						
						<?php endwhile; endif; wp_reset_query(); ?>
						
					</ul>
					
					<ul class="pressdini">
						
						<?php 
							$query_slidedown_gallery = new wp_query(array(
								'post_type' => 'dining',
								'posts_per_page' => -1
							)); 
							if($query_slidedown_gallery->have_posts()) : while($query_slidedown_gallery->have_posts()) : $query_slidedown_gallery->the_post();
							$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
						?>
						
						<li>
							<a href="<?php the_permalink(); ?>">
								<div style="background-image: url(<?php echo tt($imgsrc[0],320,240); ?>);"></div>
								<h3><?php the_title(); ?></h3>
							</a>
						</li>
						
						<?php endwhile; endif; wp_reset_query(); ?>
						
					</ul>
				</div>
			</div>
		</section>




	<div class="overlay">
			<a href="#" class="shutdown"></a>
		</div>


<div class="ressys">
	
	<div class="logo-white" style="text-align: center;">
		<img src="<?php bloginfo('template_url'); ?>/images/logo-white.png" alt="Southernmost Beach Resort Key West Logo">
	</div>
			
	<a class="btn1" href="#">Close</a>
	<div class="whippapeal">
		<div class="formfields">
			<div class="reservationform">
				<form method="get" action="<?php echo get_option('misfit_booking_link'); ?>" target="_blank">
									
					<input type="hidden"  id="arrival_date" name="arrival_date" class="calendarsection" />
					<input type="hidden"  id="arv">

					<input type="hidden" id="departure_date" name="departure_date" class="calendarsection" />
					<input type="hidden" id="dep">


					<div class="calendars">
						<div class="datepicker"></div>
						<div class="datepickermob"></div>
					</div>
					
					<button class="button" type="submit">View Availability</button>

				</form>

			</div><!-- end reservation form -->

		</div><!-- end formfields form -->
	</div><!-- end whip appeal form -->


</div><!-- end ressys form -->









<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js'></script>

<!-- JavaScripts -->
<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/instafeed.min.js"></script>
<script type="text/javascript">
var userFeed = new Instafeed({
    get: 'user',
	template: '<div class="instabox"><a href="{{link}}"><img src="{{image}}" /><div class="instaimg" style="background-image:url({{image}});"></div></a></div>',
    resolution: 'low_resolution',
    userId: 421860270,
    limit: 5,
    accessToken: '5532366.467ede5.a35264fd4db5467e9535e37af9246a6b'
});
userFeed.run();

$(window).load(function() {
	$('.instabox').each(function(index) {
		var numbarray = ['one', 'two', 'three', 'four', 'five'];
		$(this).addClass(numbarray[index]);
	});
});
</script>
<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/general.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		var owl = $("#owl"),
			owl1 = $("#owl1"),
			owl2 = $("#owl2"),
			owl3 = $("#owl3")

		owl.owlCarousel({
			items : 3, //10 it
			itemsDesktop : [1000,2], //5 items between 1000px and 901px
			itemsDesktopSmall : [900,1], // betweem 900px and 601px
			itemsTablet: [600,1], //2 items between 600 and 0
			itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
			pagination: false,
		});

		$(".next").click(function(){
			owl.trigger('owl.next');
		})
		$(".prev").click(function(){
			owl.trigger('owl.prev');
		})

		owl1.owlCarousel({
			items : 3, //10 it
			itemsDesktop : [1000,2], //5 items between 1000px and 901px
			itemsDesktopSmall : [900,1], // betweem 900px and 601px
			itemsTablet: [600,1], //2 items between 600 and 0
			itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
			pagination: false,
		});

		$(".next1").click(function(){
			owl1.trigger('owl.next');
		})
		$(".prev1").click(function(){
			owl1.trigger('owl.prev');
		})

		owl2.owlCarousel({
			items : 3, //10 it
			itemsDesktop : [1000,2], //5 items between 1000px and 901px
			itemsDesktopSmall : [900,1], // betweem 900px and 601px
			itemsTablet: [600,1], //2 items between 600 and 0
			itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
			pagination: false,
		});

		$(".next2").click(function(){
			owl2.trigger('owl.next');
		})
		$(".prev3").click(function(){
			owl2.trigger('owl.prev');
		})

		owl3.owlCarousel({
			items : 3, //10 it
			itemsDesktop : [1000,2], //5 items between 1000px and 901px
			itemsDesktopSmall : [900,1], // betweem 900px and 601px
			itemsTablet: [600,1], //2 items between 600 and 0
			itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
			pagination: false,
		});

		$(".next3").click(function(){
			owl3.trigger('owl.next');
		})
		$(".prev3").click(function(){
			owl3.trigger('owl.prev');
		})
	 
	});
</script>

</body>

</html>
<?php if ( get_option('misfit_tracking_code') <> "" ) { echo stripslashes(get_option('misfit_tracking_code')); } ?>
<?php wp_footer(); ?>		
</body>
</html>