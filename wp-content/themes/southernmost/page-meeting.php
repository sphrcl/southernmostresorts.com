<?php 

/* Template Name: Meeting

*/
 get_header(); ?>


<div id="topbanner">

	
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	
	<div class="flexslider meetingslider">
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

</div>
<div class="wrapper">
	<div id="submenu">
		<ul class="subnavigation">
			<li class="current"><a href="#">Conference facilities</a></li>
			<li><a href="#">business getaway package</a></li>
			<li><a href="#">meeting enhancements</a></li>
			<li><a href="#">cateering menus</a></li>
			<li><a href="#">groups</a></li>
		</ul>
		</div>
	</div>

	<div id="pagecontent">

		<div class="container">

			<div class="contenttitle">

				<h1 class="title">Conference Facilities</h1>
				<h2 class="subtitle">Meetings or events:  Have them inside, poolside or beachside.</h2>

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

				<div class="three-fourth">
					<div style="padding-right:40px;">
					<!-- the_content(); -->
					<p>Our spacious interior meeting room has central air-conditioning, restrooms, blackout blinds, adjustable lights and dry erase board. Wi-FI Internet Access. To find out more contact Group Sales 305.293.6139.</p>

					<p>Meeting Equipment Rentals: Screens, overhead projectors, CD/VCR, Video Conferencing, flat screen television, surround sound, podium, flip charts, easels and pads, pens, pencils and note pads are available. Call for pricing of these individual items 305.295.6500. Download our Conference Center Information Sheet or Schedule Video Conferencing.</p>

					<p>Have your meeting poolside. The 2,488 square feet of outdoor space has a 6-foot privacy wall and seats up to 50 guests for a cocktail reception. We’ll even arrange your food service and catering needs.</p>

					<p>Or have it beachside. Whatever meeting or special event needs you have, we can plan it on South Beach at Southernmost Beach Café, located at the end of Duval on the Atlantic Ocean. For more information, contact sales and catering or call 305.295.6500.</p>
					</div>
				</div>

				<div class="one-fourth">
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p style="text-align:right;"><a class="button8" href="#">Request Proposal</a></p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
				</div>

				<div class="meetingdetails">

					<div class="mdetail mdetail1">
						<div class="mdbig">32’x20’</div>
						<div class="mdsmall">dimensions</div>
					</div>
					<div class="mdetail mdetail2">
						<div class="mdbig">640</div>
						<div class="mdsmall">sq. ft.</div>
					</div>
					<div class="mdetail mdetail3">
						<div class="mdbig">8’ to 14’</div>
						<div class="mdsmall">height</div>
					</div>
					<div class="mdetail mdetail4">
						Capacity Seating:<br/>
						Reception: 50<br/>
						Banquet: 48<br/>
						Theatre: 50
					</div>
				</div>
			</div>

		</div>

	</div>


</div> <!-- #wrapper -->


<?php get_footer(); ?>