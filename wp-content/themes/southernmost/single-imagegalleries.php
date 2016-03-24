<?php 

	get_header(); 

	$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");

?>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/nivo/nivo-lightbox.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/nivo/themes/default/default.css" type="text/css" />
<script src="<?php bloginfo('template_url'); ?>/js/nivo/nivo-lightbox.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

	    if ($.fn.nivoLightbox) {
	        $('.lightbox').nivoLightbox();
	    }

	});
</script>

<div id="topbanner">

	<?php if(get_post_meta($post->ID,'misfit_banner_title',true)) { ?><div class="banner-title"><h2><?php echo get_post_meta($post->ID,'misfit_banner_title',true); ?></h2></div><?php } ?>

	<div class="static-banner" style="background-image: url('<?php echo tt($imgsrc[0],1400,755); ?>')"></div>

	<?php if(get_post_meta($post->ID,'misfit_banner_title',true)) { ?><div class="topbanner-overlay"></div><?php } ?>

</div>

<ul class="page-nav">

	<?php 
				
		// $ancestors = get_post_ancestors($post->ID);
		// $parents = $ancestors[0];
		$this_post = $post->ID;
		$query_gallery_single = new wp_query(array(
			'post_type' => 'imagegalleries',
			'posts_per_page'=> 6,	
		)); 
		$count = 1;

		if($query_gallery_single->have_posts()) : while($query_gallery_single->have_posts()) : $query_gallery_single->the_post(); 

	?>

		<li <?php if( $this_post == $post->ID ) { echo ' class="current"'; } ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	
	
	<?php $count++; endwhile; endif; wp_reset_query(); ?>	
			
</ul>
	
<div class="innerpage wrapper">
	<div id="pagecontent">

		<div class="container">

			<ul class="gallery-list">
				
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
								
					<?php if(get_the_title() == "Webcam")  { ?>
					
						<div class="webcamblock">
					
							<div class="bigcam">
							
								<!-- <div id="HTMLBlock1854" class="HTMLBlock">
									
									<script language="JavaScript"> 
										// <!-- Cut from here to the end of image display comment -->
										
								<!--		// <!-- Note: If you do not see a JavaScript below in the view source window you must -->
								<!--		// <!-- first save the html file from your browser, then open the saved -->
								<!--		// <!-- file in a text editor, for instance Notepad.-->
								<!--		// Set the BaseURL to the url of your Web server

										var BaseURL = "http://162.251.177.90/";
										var BaseURLFF = "http://root:pass@162.251.177.90/";
																			
										// DisplayWidth & DisplayHeight specifies the displayed width & height of the image.
										// You may change these numbers, the effect will be a stretched or a shrunk image
										var DisplayWidth = "704";
										var DisplayHeight = "480";
										// This is the path to the image generating file inside the camera itself
										var File = "axis-cgi/mjpg/video.cgi?resolution=704x480";
										// No changes required below this point
										var output = "";
										if ((navigator.appName == "Microsoft Internet Explorer") &&
										(navigator.platform != "MacPPC") && (navigator.platform != "Mac68k"))
										{
										// If Internet Explorer under Windows then use ActiveX
										output = '<OBJECT ID="Player1" width='
										output += DisplayWidth;
										output += ' height=';
										output += DisplayHeight;
										output += ' CLASSID="CLSID:DE625294-70E6-45ED-B895-CFFA13AEB044" ';
										output += 'CODEBASE="';
										output += BaseURL;
										output += 'activex/AMC.cab#version=5,3,20,0">';
										output += '<PARAM NAME="MediaURL" VALUE="';
										output += BaseURL;
										output += File + '">';
										output += '<param name="MediaType" value="mjpeg-unicast">';
										output += '<param name="ShowStatusBar" value="0">';
										output += '<param name="ShowToolbar" value="0">';
										output += '<param name="AutoStart" value="1">';
										output += '<param name="StretchToFit" value="1">';
										output += '<param name="wmode" value="transparent">';
										// Remove the // for the ptz settings below to use the code for click-in-image. // output += '<param name="PTZControlURL" value="';
										// output += BaseURL;
										// output += '/axis-cgi/com/ptz.cgi?camera=1">';
										// output += '<param name="UIMode" value="ptz-relative">'; // or "ptz-absolute"
										output += '<BR><B>Axis Media Control</B><BR>';
										output += 'The AXIS Media Control, which enables you ';
										output += 'to view live image streams in Microsoft Internet';
										output += ' Explorer, could not be registered on your computer.';
										output += '<BR></OBJECT>';
										} else {
										// If not IE for Windows use the browser itself to display
										theDate = new Date();
										output = '<IMG SRC="';
										output += BaseURLFF;
										output += File;
										output += '&dummy=' + theDate.getTime().toString(10);
										output += '" HEIGHT="';
										output += DisplayHeight;
										output += '" WIDTH="';
										output += DisplayWidth;
										output += '" ALT="Camera Image">';
										}
										document.write(output);
										document.Player1.MediaUsername = "root"
										document.Player1.MediaPassword = "s0cks"
										document.Player1.ToolbarConfiguration = "play,+snapshot,+fullscreen"
										// Remove the // below to use the code for Motion Detection. // document.Player.UIMode = "MDConfig";
										// document.Player.MotionConfigURL = "/axis-cgi/operator/param.cgi?ImageSource=0"
										// document.Player.MotionDataURL = "/axis-cgi/motion/motiondata.cgi";
									</script>
									
									<p>SOUTHERNMOST POOL LIVE WEB CAM</p>

								</div>

							</div> -->
										
										
							<div class="smallcams">

								<div id="HTMLBlock2075" class="HTMLBlock">

									<script language="JavaScript"> 

										//<!-- Cut from here to the end of image display comment -->
									
										// <!-- Note: If you do not see a JavaScript below in the view source window you must -->
										// <!-- first save the html file from your browser, then open the saved -->
										// <!-- file in a text editor, for instance Notepad.-->
										// Set the BaseURL to the url of your Web server

										var BaseURL = "http://162.251.177.85/";
										var BaseURLFF = "http://root:pass@162.251.177.85/";
																		
										// DisplayWidth & DisplayHeight specifies the displayed width & height of the image.
										// You may change these numbers, the effect will be a stretched or a shrunk image
										var DisplayWidth = "400";
										var DisplayHeight = "300";
										// This is the path to the image generating file inside the camera itself
										var File = "axis-cgi/mjpg/video.cgi?resolution=704x480";
										// No changes required below this point
										var output = "";
										if ((navigator.appName == "Microsoft Internet Explorer") &&
										(navigator.platform != "MacPPC") && (navigator.platform != "Mac68k"))
										{
										// If Internet Explorer under Windows then use ActiveX
										output = '<OBJECT ID="Player5" width='
										output += DisplayWidth;
										output += ' height=';
										output += DisplayHeight;
										output += ' CLASSID="CLSID:DE625294-70E6-45ED-B895-CFFA13AEB044" ';
										output += 'CODEBASE="';
										output += BaseURL;
										output += 'activex/AMC.cab#version=5,3,20,0">';
										output += '<PARAM NAME="MediaURL" VALUE="';
										output += BaseURL;
										output += File + '">';
										output += '<param name="MediaType" value="mjpeg-unicast">';
										output += '<param name="ShowStatusBar" value="0">';
										output += '<param name="ShowToolbar" value="0">';
										output += '<param name="AutoStart" value="1">';
										output += '<param name="StretchToFit" value="1">';
										output += '<param name="wmode" value="transparent">';
										// Remove the // for the ptz settings below to use the code for click-in-image. // output += '<param name="PTZControlURL" value="';
										// output += BaseURL;
										// output += '/axis-cgi/com/ptz.cgi?camera=1">';
										// output += '<param name="UIMode" value="ptz-relative">'; // or "ptz-absolute"
										output += '<BR><B>Axis Media Control</B><BR>';
										output += 'The AXIS Media Control, which enables you ';
										output += 'to view live image streams in Microsoft Internet';
										output += ' Explorer, could not be registered on your computer.';
										output += '<BR></OBJECT>';
										} else {
										// If not IE for Windows use the browser itself to display
										theDate = new Date();
										output = '<IMG SRC="';
										output += BaseURLFF;
										output += File;
										output += '&dummy=' + theDate.getTime().toString(10);
										output += '" HEIGHT="';
										output += DisplayHeight;
										output += '" WIDTH="';
										output += DisplayWidth;
										output += '" ALT="Camera Image">';
										}
										document.write(output);
										document.Player5.MediaUsername = "webcam"
										document.Player5.MediaPassword = "#Tuweb&1"
										document.Player5.ToolbarConfiguration = "play,+snapshot,+fullscreen"
										// Remove the // below to use the code for Motion Detection. // document.Player.UIMode = "MDConfig";
										// document.Player.MotionConfigURL = "/axis-cgi/operator/param.cgi?ImageSource=0"
										// document.Player.MotionDataURL = "/axis-cgi/motion/motiondata.cgi";
										//<!-- End of image display part  -->

									</script>
																				
									<p>PINEAPPLE POOL LIVE WEB CAM</p>

								</div>
										
								<div id="HTMLBlock2077" class="HTMLBlock">
										
									<script language="JavaScript"> 
										//<!-- Cut from here to the end of image display comment -->
									<!--	// <!-- Note: If you do not see a JavaScript below in the view source window you must -->
									<!--	// <!-- first save the html file from your browser, then open the saved -->
									<!--	// <!-- file in a text editor, for instance Notepad.-->
									<!--	// Set the BaseURL to the url of your Web server

										var BaseURL = "http://162.251.177.84/";
										var BaseURLFF = "http://root:pass@162.251.177.84/";
																			
										// DisplayWidth & DisplayHeight specifies the displayed width & height of the image.
										// You may change these numbers, the effect will be a stretched or a shrunk image
										var DisplayWidth = "400";
										var DisplayHeight = "300";
										// This is the path to the image generating file inside the camera itself
										var File = "axis-cgi/mjpg/video.cgi?resolution=704x480";
										// No changes required below this point
										var output = "";
										if ((navigator.appName == "Microsoft Internet Explorer") &&
										(navigator.platform != "MacPPC") && (navigator.platform != "Mac68k"))
										{
										// If Internet Explorer under Windows then use ActiveX
										output = '<OBJECT ID="Player3" width='
										output += DisplayWidth;
										output += ' height=';
										output += DisplayHeight;
										output += ' CLASSID="CLSID:DE625294-70E6-45ED-B895-CFFA13AEB044" ';
										output += 'CODEBASE="';
										output += BaseURL;
										output += 'activex/AMC.cab#version=5,3,20,0">';
										output += '<PARAM NAME="MediaURL" VALUE="';
										output += BaseURL;
										output += File + '">';
										output += '<param name="MediaType" value="mjpeg-unicast">';
										output += '<param name="ShowStatusBar" value="0">';
										output += '<param name="ShowToolbar" value="0">';
										output += '<param name="AutoStart" value="1">';
										output += '<param name="StretchToFit" value="1">';
										output += '<param name="wmode" value="transparent">';
										// Remove the // for the ptz settings below to use the code for click-in-image. // output += '<param name="PTZControlURL" value="';
										// output += BaseURL;
										// output += '/axis-cgi/com/ptz.cgi?camera=1">';
										// output += '<param name="UIMode" value="ptz-relative">'; // or "ptz-absolute"
										output += '<BR><B>Axis Media Control</B><BR>';
										output += 'The AXIS Media Control, which enables you ';
										output += 'to view live image streams in Microsoft Internet';
										output += ' Explorer, could not be registered on your computer.';
										output += '<BR></OBJECT>';
										} else {
										// If not IE for Windows use the browser itself to display
										theDate = new Date();
										output = '<IMG SRC="';
										output += BaseURLFF;
										output += File;
										output += '&dummy=' + theDate.getTime().toString(10);
										output += '" HEIGHT="';
										output += DisplayHeight;
										output += '" WIDTH="';
										output += DisplayWidth;
										output += '" ALT="Camera Image">';
										}
										document.write(output);
										document.Player3.MediaUsername = "webcam"
										document.Player3.MediaPassword = "#Tuweb&1"
										document.Player3.ToolbarConfiguration = "play,+snapshot,+fullscreen"
										// Remove the // below to use the code for Motion Detection. // document.Player.UIMode = "MDConfig";
										// document.Player.MotionConfigURL = "/axis-cgi/operator/param.cgi?ImageSource=0"
										// document.Player.MotionDataURL = "/axis-cgi/motion/motiondata.cgi";
										// <!-- End of image display part  -->
									</script>
									
									<p>OCEANFRONT TANNING BEACH AND PRIVATE PIER</p>

								</div> 
									
									
									
							</div>
									
									
							<div class="clear"></div>

						</div>
							
					<?php } else { ?>
					
						<?php
							$galleryImages = get_post_gallery_imagess(); 
							$imagesCount = count($galleryImages); 
					    ?>
						           
		        		<?php if ($imagesCount > 0) : ?>
		              	<?php for ($i = 0; $i < $imagesCount; $i++): ?>
		                <?php if (!empty($galleryImages[$i])) :?>
						                  		
							<a class="lightbox" href="<?php echo $galleryImages[$i]['full'][0]; ?>" data-lightbox-gallery="<?php echo $post->post_name; ?>"><img src="<?php echo tt($galleryImages[$i]['full'][0],240,220); ?>" alt="Southernmost Gallery Image"></a>
					
						<?php endif; endfor; endif; ?>
						
						
					<?php } ?>
					
				<?php endwhile; endif; wp_reset_query(); ?>	

			</ul>	

			<?php 
				$galleryinfo = get_the_ID();

				if ($galleryinfo == 1099){ ?>

				<p><br /><br />Wanting to add extra sizzle to your stay? Choose from our list of special gifts to make your visit at the Southernmost Beach Resort extraordinary!</p>

				<p>Please call us at <a href="tel:1800-354-4455">800-354-4455</a>, or <a href="mailto:guestrelations@southernmostresorts.com">email</a> us directly to add any of the above items to your stay. For more information and prices, click <a href="http://www.southernmostbeachresort.com/hotel-amenities/add-ons/">here.</a></p>

			 <?php } ?>			

		</div>

	</div>

</div> <!-- #wrapper -->

</div>

<?php get_footer(); ?>