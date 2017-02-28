<?php
/**
 * The template for displaying the footer.
 *
**/

	if ( file_exists( TEMPLATEPATH . '/library/Mobile_Detect.php' ) ) {

		require_once TEMPLATEPATH . '/library/Mobile_Detect.php';
		$detect = new Mobile_Detect;

		$mobile = $detect->isMobile(); 

	}

?>

	<div id="footer">
		<div class="footaddress"><?php echo get_option('misfit_footer_address'); ?></div>

		<div class="footcolumn">


			<div class="footleft">

				<p>Sign up for Special Offers from the Hotel</p>

				<div class="newsletter">
					<form id="eclubCheck" method="post" action="http://www.data2gold.com/cc3/safeandsecure.wow?6O521I55494X2X2G6G1O0L216R693Q5H3Z5E" class="eClub" target="_blank">
						<input id="firstname" type="text" size="40" name="FIRSTNAME" maxlength="40" placeholder="First Name" required="required">
						<input id="lastname" type="text" size="40" name="LASTNAME" maxlength="40" placeholder="Last Name" required="required">
						<input id="email" type="text" size="40" name="email" maxlength="150" placeholder="Email Address" required="required">
						<input id="form_submit" type="submit" value="Join Our List" />
						<input type="HIDDEN" name="PEA" value="" />
						<input type="HIDDEN" name="PEACC" value="" />
						<input type="HIDDEN" name="PEABC" value="" />
						<input type="HIDDEN" name="PEASUBJECT" value="LOOKUP" />
						<INPUT TYPE="HIDDEN" NAME="NewUser" VALUE="1">
						<INPUT TYPE="HIDDEN" NAME="PrThanksPage" VALUE="1">
						<INPUT TYPE="HIDDEN" NAME="ftpbox" VALUE="01613">
						<INPUT TYPE="HIDDEN" NAME="PRThanksTemplate" VALUE="ETHANKS">
						<input type="hidden" name="sys_formtype" value="eClub">
						<input type="hidden" name="hv_preftype" value="eClub" />
						<input type="hidden" name="ECWT" value="EWELCOME" />
					</form>
				</div>

			</div>

			<div class="footmiddle">

				<div class="footerlogo">
					<a href="http://www.southernmostbeachresort.com"><img src="<?php bloginfo ('template_url'); ?>/images/logo-footer.png" alt="Southernmost"></a>
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

			</div>

			<div class="footright">

				<?php echo get_option('misfit_footer_paragraph'); ?>

				<!-- NAVIS -->
				<div class="Phone">
					To book your stay, please call <span id="NavisTFN">(866) 999-9999</span>
					right now, and we’ll help you out.

					<script type="text/javascript">
						SetElementToNavisNCPhoneNumber("NavisTFN");
					</script>
				</div>

				<!-- / NAVIS -->

				<div class="conde_holder">
					 <div class="conde_image"><p><img  style="width:100%" src="<?php bloginfo('template_url'); ?>/images/Conde-Nast-Award.png"><p></div>
					 <div class="conde_desc"><p class="first_linec">Our Hotel has been selected to be in<br>Conde Nast Choice Award</p><p class="second_linec"><a href="http://www.cntraveler.com/vote">Vote and see the full list of hotels here ></a></p></div>
				</div>

			</div>

		</div>

		<div class="footnav">
			<ul class="footernavigation">
				<?php wp_nav_menu( array( 'theme_location' => 'footer_nav' ,  'items_wrap' => '%3$s', 'container' => '', 'menu_class' => 'navitem' ) ); ?>
			</ul>
		</div>

		<div class="footmentions">
			<a class="footmentions-condenast" target="_blank" href="http://www.cntraveler.com/"><img src="<?php bloginfo('template_url'); ?>/images/florida-keys-finalist.png"></a>
			<a class="footmentions-highgate" target="_blank" href="http:///www.highgate.com/"><img src="<?php bloginfo('template_url'); ?>/images/highgate-logo.png"></a>
		</div>

		<!-- <div class="save-the-children">
			
				<a href="https://goo.gl/OJexpZ" target="_blank"><img class="left" width="270px" src="http://www.southernmostbeachresort.com/wp-content/themes/southernmost/images/save-the-children-logo.png"></a>
				
				<p class="save">Southernmost Beach Resort Key West is a proud supporter of Save the Children, internationally recognized for giving children a healthy start, the opportunity to learn and protection from harm. To donate and make a difference in a child’s life, please click on the link below. 100% of your donation benefits Save the Children. Thank you for your support.</p>

				<a class="button" target="_blank" href="https://goo.gl/OJexpZ">donate today</a>
		</div> -->


	</div>


	<section class="rightnav">

		<div class="royalewrap">
			<a class="royale" href="#">Close Menu</a>
		</div>

		<div class="spacer"><img src="<?php bloginfo ('template_url'); ?>/images/logo-white.png" /></div>

		<div id="navmenumob">
			<div class="slidedown-navmob">
				<ul class="slidedownlist">
					<li class="first"><a href="<?php bloginfo('url');?>/rooms/">Accommodations</a><span class="ibox pressroom"><i class="fa fa-plus"></i></span></li>
					<li><a href="<?php bloginfo('url');?>/photo-gallery/">Gallery</a><span class="ibox pressphot"><i class="fa fa-plus"></i></span></li>
					<li><a href="<?php bloginfo('url');?>/vacation-packages/">Specials</a><span class="ibox pressvaca"><i class="fa fa-plus"></i></span></li>
					<li class="last"><a href="<?php bloginfo('url');?>/key-west-restaurants/">Dining</a><span class="ibox pressdini"><i class="fa fa-plus"></i></span></li>
				</ul>
			</div>

			<?php wp_nav_menu(array(
				'theme_location' => 'secondary',
				'container' => false,
				'menu_class' => 'topnavigationmob',
				'before' => '<div class="tnbox">',
				'after' => '</div>'
			)); ?>
		</div>

		<div class="socialmedia">
			<ul>
				<?php if(get_option('misfit_facebook')) { ?><li><div class="rnsm-fa"><a href="<?php echo get_option('misfit_facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></div></li><?php } ?>
				<?php if(get_option('misfit_twitter')) { ?><li><div class="rnsm-tw"><a href="<?php echo get_option('misfit_twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></div></li><?php } ?>
				<?php if(get_option('misfit_youtube')) { ?><li><div class="rnsm-yo"><a href="<?php echo get_option('misfit_youtube'); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></div></li><?php } ?>
				<?php if(get_option('misfit_instagram')) { ?><li><div class="rnsm-in"><a href="<?php echo get_option('misfit_instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></div></li><?php } ?>
				<?php if(get_option('misfit_google_plus')) { ?><li><div class="rnsm-go"><a href="<?php echo get_option('misfit_google_plus'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></div></li><?php } ?>
				<?php if(get_option('misfit_tripadvisor')) { ?><li><div class="rnsm-tr"><a href="<?php echo get_option('misfit_tripadvisor'); ?>" target="_blank"><i class="fa fa-tripadvisor"></i></a></div></li><?php } ?>
				<div class="clear"></div>
			</ul>
		</div>

	</section><!-- end right nav -->

	<section class="secondrightnav">
		<div class="srnbox">
			<div class="srnlist">

				<div class="srnclose"><i class="fa fa-close"></i></div>

				<ul class="activitiespress">

					<?php
						$content3 = get_page(2665);
						$imgsrc3 = wp_get_attachment_image_src( get_post_thumbnail_id( $content3->ID ), "Medium");
					?>

					<li>
						<a href="<?php echo get_the_permalink($content3->ID); ?>">
							<div style="background-image: url(<?php echo tt($imgsrc3[0],320,240); ?>);"></div>
							<span><?php echo get_post_meta($content3->ID,'misfit_banner_title',true); ?> </span>
						</a>
					</li>

					<?php
						$content1 = get_page(445); 
						$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $content1->ID ), "Medium");
					?>

					<li>
						<a href="<?php echo get_the_permalink($content1->ID); ?>">
							<div style="background-image: url(<?php echo tt($imgsrc[0],320,240); ?>);"></div>
							<span><?php echo get_post_meta($content1->ID,'misfit_venuename',true); ?></span>
						</a>
					</li>

					<?php
						$content2 = get_page(2579);
						$imgsrc2 = wp_get_attachment_image_src( get_post_thumbnail_id( $content2->ID ), "Medium");
					?>

					<li>
						<a href="<?php echo get_the_permalink($content2->ID); ?>">
							<div style="background-image: url(<?php echo tt($imgsrc2[0],320,240); ?>);"></div>
							<span><?php echo get_post_meta($content2->ID,'misfit_venuename',true); ?></span>
						</a>
					</li>

					<?php
						$content4 = get_page(1285); 
						$imgsrc4 = wp_get_attachment_image_src( get_post_thumbnail_id( $content4->ID ), "Medium");
					?>

					<li>
						<a href="<?php echo get_the_permalink($content4->ID); ?>">
							<div style="background-image: url(<?php echo tt($imgsrc4[0],320,240); ?>);"></div>
							<span><?php echo get_post_meta($content4->ID,'misfit_venuename',true); ?></span>
						</a>
					</li>

				</ul>

				<ul class="pressroom">

					<?php

						$query_slidedown_rooms = new wp_query(array(
							'post_type' => 'rooms',
							'posts_per_page' => -1
						));

						if ( $query_slidedown_rooms->have_posts() ) : while ( $query_slidedown_rooms->have_posts() ) : $query_slidedown_rooms->the_post();

							$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Medium");
					?>

					<li>
						<a href="<?php the_permalink(); ?>">
							<div style="background-image: url(<?php echo tt($imgsrc[0],320,240); ?>);"></div>
							<span><?php the_title(); ?></span>
						</a>
					</li>

					<?php endwhile; endif; wp_reset_postdata(); ?>

				</ul>

				<ul class="pressphot">

					<?php

						$query_slidedown_gallery = new wp_query(array(
							'post_type' => 'imagegalleries',
							'posts_per_page' => -1
						));

						if ( $query_slidedown_gallery->have_posts() ) : while ( $query_slidedown_gallery->have_posts() ) : $query_slidedown_gallery->the_post();

							$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Medium"); 
					?>

					<li>
						<a href="<?php the_permalink(); ?>">
							<div style="background-image: url(<?php echo tt($imgsrc[0],320,240); ?>);"></div>
							<span><?php the_title(); ?></span>
						</a>
					</li>

					<?php endwhile; endif; wp_reset_postdata(); ?>

				</ul>

				<ul class="pressvaca">

					<?php

						$query_slidedown_gallery = new wp_query(array(
							'post_type' => 'sspecials',
							'posts_per_page' => -1
						)); 

						if ( $query_slidedown_gallery->have_posts() ) : while ( $query_slidedown_gallery->have_posts() ) : $query_slidedown_gallery->the_post();

							$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Medium");
					?>

					<li>
						<a href="<?php the_permalink(); ?>">
							<div style="background-image: url(<?php echo tt($imgsrc[0],320,240); ?>);"></div>
							<span><?php the_title(); ?></span>
						</a>
					</li>

					<?php endwhile; endif; wp_reset_postdata(); ?>

				</ul>

				<ul class="pressdini">

					<?php

						$query_slidedown_gallery = new wp_query(array(
							'post_type' => 'dining',
							'posts_per_page' => -1
						));

						if ( $query_slidedown_gallery->have_posts() ) : while ( $query_slidedown_gallery->have_posts() ) : $query_slidedown_gallery->the_post();

							$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Medium"); 
					?>

					<li>
						<a href="<?php the_permalink(); ?>">
							<div style="background-image: url(<?php echo tt($imgsrc[0],320,240); ?>);"></div>
							<span><?php the_title(); ?></span>
						</a>
					</li>

					<?php endwhile; endif; wp_reset_postdata(); ?>

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

					<?php if($mobile) { ?>

						<form method="get" action="https://southernmostbeachresort.reztrip.com">
											
							<input type="hidden" id="propertyId" name="propertyId" class="calendarsection" value="729" />
							<input type="hidden" id="sub" name="sub" class="calendarsection" value="southernmostbeachresort" />
							<input type="hidden" id="locale" name="locale" class="calendarsection" value="en-us" />
							<input type="hidden" id="numChildren" name="children" class="calendarsection" value="0" />
							<input type="hidden" id="numAdults" name="adults" class="calendarsection" value="2" />

							<input type="hidden"  id="arrival_date" name="arrival_date" class="calendarsection" />
							<input type="hidden" id="departure_date" name="departure_date" class="calendarsection" />

							<div class="calendars">
								<div class="datepickermob"></div>
							</div>
							
							<button class="button" type="submit">View Availability</button>
							<div class="btn1 toosmall"><i class="fa fa-times"></i></div>

						</form>

					<?php } else { ?>

						<form method="get" action="<?php echo get_option('misfit_booking_link'); ?>">
										
							<input type="hidden" value="1" name="rooms">
							
							<input type="hidden"  id="arrival_date" name="arrival_date" class="calendarsection" />
							<input type="hidden" id="departure_date" name="departure_date" class="calendarsection" />

							<div class="calendars">
								<div class="datepicker"></div>
								<div class="datepickermoby"></div>
							</div>
							
							<button class="button" type="submit">View Availability</button>
							<div class="btn1 toosmall"><i class="fa fa-times"></i></div>

						</form>

					<?php } ?>

				</div><!-- end reservation form -->

			</div><!-- end formfields form -->
		</div><!-- end whip appeal form -->

	</div><!-- end ressys form -->




	<script type='text/javascript' src='<?php bloginfo ('template_url'); ?>/js/jqueryui/1.11.1/jquery-ui.min.js'></script>

	<!-- JavaScripts -->
	<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/instafeed.min.js"></script>
	<script type="text/javascript">
	var userFeed = new Instafeed({
		get: 'user',
		template: '<div class="instabox"><a href="{{link}}" target="_blank"><img src="{{image}}" /><div class="instaimg" style="background-image:url({{image}});"></div></a></div>',
		resolution: 'low_resolution',
		userId: 421860270,
		limit: 5,
		accessToken: '421860270.1677ed0.67c55b3e6a39474892da0645c289882f'
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

	<!-- Validation -->
	<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/additional-methods.min.js"></script>

	<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/general.js"></script>

	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/owl-carousel/owl.carousel.min.js"></script>
	<script type="text/javascript">

	function resizeIframe(iframe) {
		iframe.height = iframe.contentWindow.document.body.scrollHeight + "px";
	}

	$(document).ready(function() {

		var owl = $("#owl"),
			owl1 = $("#owl1"),
			owl2 = $("#owl2"),
			owl3 = $("#owl3"),
			owl4 = $("#owl4"),
			totalItems = $('#owl .item').length,
			totalItems1 = $('#owl1 .item').length,
			totalItems2 = $('#owl2 .item').length,
			totalItems3 = $('#owl3 .item').length;

		if(totalItems <= 3) { $('.btn.next, .btn.prev').hide() }
		if(totalItems1 <= 3) { $('.btn.next1, .btn.prev1').hide() }
		if(totalItems2 <= 3) { $('.btn.next2, .btn.prev2').hide() }
		if(totalItems3 <= 3) { $('.btn.next3, .btn.prev3').hide() }

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

		owl4.owlCarousel({
			items : 3, //10 it
			itemsDesktop : [1000,2], //5 items between 1000px and 901px
			itemsDesktopSmall : [900,1], // betweem 900px and 601px
			itemsTablet: [600,1], //2 items between 600 and 0
			itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
			pagination: false,
		});

		$(".next4").click(function(){
			owl4.trigger('owl.next');
		})
		$(".prev4").click(function(){
			owl4.trigger('owl.prev');
		})

	});

	$(document).ready(function(){

		$(".opentable").click(function(){

			$('#overlay-back').fadeIn(100,function(){
				$('#popup').show();
				$(".close-image").fadeIn(500);
				$('#overlay-back').fadeIn(500);
				$(".white_pop").fadeIn(500);
				$(".pops").fadeIn(500);
			});

		});

		$(".close-image").on('click', function() {

			$('#popup').hide();
			$(".close-image").fadeOut(500);
			$('#overlay-back').fadeOut(500);
			$(".white_pop").fadeOut(500);

		});

	});

	</script>

	<?php if ( get_option('misfit_tracking_code') <> "" ) { echo stripslashes(get_option('misfit_tracking_code')); } ?>

	<?php wp_footer(); ?>

</body>
</html>