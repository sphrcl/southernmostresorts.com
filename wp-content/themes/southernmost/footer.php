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
						<li><a href="http://facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="http://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li><a href="http://youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
						<li><a href="http://instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
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



			<div class="spacer"></div>

		</section><!-- end right nav -->


<!-- JavaScripts -->
<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/instafeed.min.js"></script>
<script type="text/javascript">
var userFeed = new Instafeed({
    get: 'user',
    resolution: 'low_resolution',
    userId: 421860270,
    limit: 5,
    accessToken: '5532366.467ede5.a35264fd4db5467e9535e37af9246a6b'
});
userFeed.run();
</script>
<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/general.js"></script>

</body>

</html>
<?php if ( get_option('misfit_tracking_code') <> "" ) { echo stripslashes(get_option('misfit_tracking_code')); } ?>
<?php wp_footer(); ?>		
</body>
</html>