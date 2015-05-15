<?php
/**
 * The template for displaying the footer.
 *
**/
?>



	<div id="footer">
		<div class="footaddress">Southernmost beach resort • 1319 Duval Street • Key West, FL 33040</div>

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
				<p>Sed id elementum eros. Integer egestas sit amet sem eu ultricies. Suspendisse ac ornare magna, vitae accumsan lectus. Nam nec tempus turpis, vel tincidunt orci.</p>

				<p>Nullam suscipit turpis eu urna consequat mattis et a diam. Nam diam elit, sagittis vitae mauris ac, luctus pellentesque ex.</p>
			</div>

		</div>

		<div class="footnav">
			<ul class="footernavigation">
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Site Map</a></li>
					<li><a href="#">Press</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Hotel Policies</a></li>
				</ul>
		</div>


	</div>


		<section class="rightnav">
			
			<div class="royalewrap"><a class="royale" href="#"><img src="<?php bloginfo ('template_url'); ?>/images/hamburger-close.png" alt="menu"/></a></div>

			<div class="spacer"></div>
			
			<div id="navmenumob">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ,  'container' => false, 'menu_class' => 'topnavigationmob' ) ); ?>
			</div>

		</section><!-- end right nav -->




	<div class="overlay">
			<a href="#" class="shutdown"></a>
		</div>


<div class="ressys">
	
	<div class="logo-white" style="text-align: center;">
		<img src="http://www.southernmostresorts.com.php53-24.ord1-1.websitetestlink.com/wp-content/themes/southernmost/images/logo-white.png" alt="*">
	</div>
			
	<a class="btn1" href="#">Close</a>
	<div class="whippapeal">
		<div class="formfields">
			<div class="reservationform">
				<form method="get" action="#" target="_blank">
				
					
					
					<input type="hidden"  id="arrival_date" name="arrivalDate" class="calendarsection" />
					<input type="hidden"  id="arv">


					<input type="hidden" id="departure_date" name="departureDate" class="calendarsection" />
					<input type="hidden" id="dep">


					<div class="calendars">
						<div class="datepicker"></div>
					</div>
					
					<div class="availbutton">
						<button class="button" type="submit">View Availability</button>
						<i class="shutdown fa fa-times"></i>
					</div>

				<!-- <a href="#" class="button" onclick="_gaq.push(['_trackEvent', 'Booking-widget', 'Search-now', 'Search dates with booking widget']);">Search Now</a>	 -->


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

		var owl = $("#owl");

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
	 
	});
</script>

</body>

</html>
<?php if ( get_option('misfit_tracking_code') <> "" ) { echo stripslashes(get_option('misfit_tracking_code')); } ?>
<?php wp_footer(); ?>		
</body>
</html>