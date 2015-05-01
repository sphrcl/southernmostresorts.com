<?php 

/* Template Name: Specials

*/
 get_header(); ?>


<div id="topbanner">

	<div class="flexslider topbanner">
		<ul class="slides">
			<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/topbanner4.jpg);">

			</li>
			<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/topbanner4.jpg);">

			</li>
		</ul>
	</div>

	<div class="topbanner-overlay"></div>

</div>
	
<div class="innerpage wrapper specials_page">
	<div id="pagecontent">

		<div class="container">

			<div class="contenttitle">

				<h1 class="title">Specials and Packages</h1>
				<h2 class="subtitle">The most of everything</h2>

			</div>

			<div class="socialmedia">
				<ul>
					<li><a href="<?php echo get_option('misfit_facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
					<li><a href="<?php echo get_option('misfit_twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
					<li><a href="<?php echo get_option('misfit_youtube'); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
					<li><a href="<?php echo get_option('misfit_instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
				</ul>
			</div>

			<div class="content">
				<!-- the_content(); -->
			</div>

		</div>

	</div>

	<div id="specials_list">

		<div class="specialsbox" style="background-image: url(<?php bloginfo ('template_url'); ?>/images/specials1.jpg);">
			<div class="specialscontent">
				<div class="specialtitle">
					<h3>EARLY BOOKING BONUS</h3>
					<h4>Save up to 20% on weekdays and 10% on weekends</h4>
				</div>
				<div class="specialbuttons">
					<a class="button6" href="#">Book</a>
					<a class="button7" href="#">Details</a>
				</div>
			</div>
		</div>

		<div class="specialsbox" style="background-image: url(<?php bloginfo ('template_url'); ?>/images/specials2.jpg);">
			<div class="specialscontent">
				<div class="specialtitle">
					<h3>SEA OF LOVE</h3>
					<h4>Champagne, Advenure, and a sunset sail</h4>
				</div>
				<div class="specialbuttons">
					<a class="button6" href="#">Book</a>
					<a class="button7" href="#">Details</a>
				</div>
			</div>
		</div>

		<div class="specialsbox" style="background-image: url(<?php bloginfo ('template_url'); ?>/images/specials3.jpg);">
			<div class="specialscontent">
				<div class="specialtitle">
					<h3>HONEYMOON PACKAGE</h3>
					<h4>Champagne, rose petals, and signature bath robes</h4>
				</div>
				<div class="specialbuttons">
					<a class="button6" href="#">Book</a>
					<a class="button7" href="#">Details</a>
				</div>
			</div>
		</div>

		<div class="specialsbox" style="background-image: url(<?php bloginfo ('template_url'); ?>/images/specials4.jpg);">
			<div class="specialscontent">
				<div class="specialtitle">
					<h3>family package</h3>
					<h4>Save up to 20% on weekdays and 10% on weekends</h4>
				</div>
				<div class="specialbuttons">
					<a class="button6" href="#">Book</a>
					<a class="button7" href="#">Details</a>
				</div>
			</div>
		</div>


	</div>

</div> <!-- #wrapper -->


<?php get_footer(); ?>