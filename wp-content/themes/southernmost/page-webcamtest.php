<?php 

/* 

Template Name: Webcam Test 

*/

get_header(); ?>

<?php 
	if(have_posts()) : while(have_posts()) : the_post(); 
	$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
?>

	<div id="topbanner">

		<!-- <div class="flexslider topbanner">
			<ul class="slides">
				<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/topbanner4.jpg);">

				</li>
				<li style="background-image: url(<?php bloginfo ('template_url'); ?>/images/topbanner4.jpg);">

				</li>
			</ul>
		</div> -->

		<div class="static-banner" style="background-image: url('<?php echo tt($imgsrc[0],1400,755); ?>')"></div>

		<div class="topbanner-overlay"></div>

	</div>
		
	<div class="innerpage wrapper specials_page">
        <?php                        
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('
                <p id="breadcrumbs">','</p>
                ');
            }
        ?>  
		<div id="pagecontent">

			<div class="container">

				<div class="contenttitle">

					<h1 class="title"><?php the_title(); ?></h1>
                     <?php if(get_post_meta($post->ID,'misfit_subtitle')) : ?>
					   <h2 class="subtitle"><?php echo get_post_meta($post->ID,'misfit_subtitle',true); ?></h2>
                    <?php endif; ?>
				</div>

				<div class="socialmedia">
					<ul>
						<li><a href="<?php echo get_option('misfit_facebook'); ?>" target="_blank" aria-label="link to southernmost facebook page"><i class="fa fa-facebook"></i></a></li>
						<li><a href="<?php echo get_option('misfit_twitter'); ?>" target="_blank" aria-label="link to southernmost twitter page"><i class="fa fa-twitter"></i></a></li>
						<li><a href="<?php echo get_option('misfit_youtube'); ?>" target="_blank" aria-label="link to southernmost youtube page"><i class="fa fa-youtube-play"></i></a></li>
						<li><a href="<?php echo get_option('misfit_instagram'); ?>" target="_blank" aria-label="link to southernmost instagram page"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>

				<div class="content">
					
					<?php the_content(); ?>
					
					
					
					<div id="HTMLBlock947" class="HTMLBlock"></div>			
					  
					  
					  
					  
					  <div class="thumbnails"> 
					  	<div class="bottom_border">	
					  	</div> 
					  </div>

					<div class="clearfix"></div>


				<div style="background-color:#">
					<div class="main_content">
						
						
					


											<div id="HTMLBlock1854" class="HTMLBlock">
												
												
												
														<SCRIPT LANGUAGE="JavaScript"> 
														<!-- Cut from here to the end of image display comment -->
														
																							<!-- Note: If you do not see a JavaScript below in the view source window you must -->
																							<!-- first save the html file from your browser, then open the saved -->
																							<!-- file in a text editor, for instance Notepad.-->
																							// Set the BaseURL to the url of your Web server
														
																							var BaseURL = "//66.184.211.231/";
																							var BaseURLFF = "//root:pass@66.184.211.231/";
																							
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
														document.Player1.MediaPassword = "pass"
														document.Player1.ToolbarConfiguration = "play,+snapshot,+fullscreen"
														// Remove the // below to use the code for Motion Detection. // document.Player.UIMode = "MDConfig";
														// document.Player.MotionConfigURL = "/axis-cgi/operator/param.cgi?ImageSource=0"
														// document.Player.MotionDataURL = "/axis-cgi/motion/motiondata.cgi";
												</SCRIPT>
											</div>
											
											
<div id="HTMLBlock2075" class="HTMLBlock">
<SCRIPT LANGUAGE="JavaScript"> 
<!-- Cut from here to the end of image display comment -->

									<!-- Note: If you do not see a JavaScript below in the view source window you must -->
									<!-- first save the html file from your browser, then open the saved -->
									<!-- file in a text editor, for instance Notepad.-->
									// Set the BaseURL to the url of your Web server

									var BaseURL = "//72.243.112.72/";
									var BaseURLFF = "//root:pass@72.243.112.72/";
									
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
									<!-- End of image display part  -->
										</SCRIPT>
</div>



<div id="HTMLBlock2077" class="HTMLBlock">

<SCRIPT LANGUAGE="JavaScript"> 
<!-- Cut from here to the end of image display comment -->

									<!-- Note: If you do not see a JavaScript below in the view source window you must -->
									<!-- first save the html file from your browser, then open the saved -->
									<!-- file in a text editor, for instance Notepad.-->
									// Set the BaseURL to the url of your Web server

									var BaseURL = "//72.243.112.71/";
									var BaseURLFF = "//root:pass@72.243.112.71/";
									
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
									<!-- End of image display part  -->
										</SCRIPT>
</div>	
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
				</div>

			</div>

		</div>

	</div>

<?php endwhile; endif; wp_reset_query(); ?>	

</div> <!-- #wrapper -->

<?php get_footer(); ?>