
	<!-- javascript -->

<script type="text/javascript">
$(window).on('load', function(){
	$('#status').fadeOut();
	$('#preloader').delay(0).fadeOut('slow');
});
</script>

<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/jquery.mmenu.js"></script>
<script type="text/javascript">
	$(function() {
		var $menu = $('nav#menu'),
			$html = $('html, body');

		$menu.mmenu();
		$menu.find( 'li > a' ).on(
			'click',
			function()
			{
				var href = $(this).attr( 'href' );

				//	if the clicked link is linked to an anchor, scroll the page to that anchor 
				if ( href.slice( 0, 1 ) == '#' )
				{
					$menu.one(
						'closed.mm',
						function()
						{
							setTimeout(
								function()
								{
									$html.animate({
										scrollTop: $( href ).offset().top
									});	
								}, 10
							);	
						}
					);						
				}
			}
		);
	});
</script>
<?php if ( is_page_template('page_cs.php') ) { ?>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.counteverest.min.js"></script>

		<!-- Init Count Everest plugin -->
		<script>
			$(document).ready(function() {

				$(".countdown").countEverest({
					//Set your target date here!
					day: <?php echo get_option('misfit_day'); ?>,
					month: <?php echo get_option('misfit_month'); ?>,
					year: <?php echo get_option('misfit_year'); ?>,
					leftHandZeros: false,
					onChange: function() {
						drawCircle(document.getElementById('days'), this.days, 365);
						drawCircle(document.getElementById('hours'), this.hours, 24);
						drawCircle(document.getElementById('minutes'), this.minutes, 60);
						drawCircle(document.getElementById('seconds'), this.seconds, 60);
					}
				});

				function deg(v) {
					return (Math.PI/180) * v - (Math.PI/2);
				}

				function drawCircle(canvas, value, max) {
					var	circle = canvas.getContext('2d');
					
					circle.clearRect(0, 0, canvas.width, canvas.height);
					circle.lineWidth = 4;

					circle.beginPath();
					circle.arc(
							canvas.width / 2, 
							canvas.height / 2, 
							canvas.width / 2 - circle.lineWidth, 
							deg(0), 
							deg(360 / max * (max - value)), 
							false);
					circle.strokeStyle = '#ddd';
					circle.stroke();

					circle.beginPath();
					circle.arc(
							canvas.width / 2, 
							canvas.height / 2, 
							canvas.width / 2 - circle.lineWidth, 
							deg(0), 
							deg(360 / max * (max - value)), 
							true);
					circle.strokeStyle = '#888';
					circle.stroke();
				}
			});
		</script>
	<?php } ?>
    
    
    <?php if(is_home() && get_option('misfit_hometype') == "2") { ?>
	
	<!-- BigVideo Dependencies -->

    <script>window.jQuery || document.write('<script src="<?php bloginfo ('template_url'); ?>/js/jquery.min.js"><\/script>')</script>
	<script type="text/javascript">
	  jQuery(document).ready(function($) {
	    $(".scroll").click(function(event) {
	    event.preventDefault();
	    $('html,body').animate( { scrollTop:$(this.hash).offset().top } , 1000);
	    } );
	  } );
	</script>
    <script src="<?php bloginfo ('template_url'); ?>/js/jquery-ui.min.js"></script>
    <script src="http://vjs.zencdn.net/4.0/video.js"></script>
    <!-- BigVideo -->
    <script src="<?php bloginfo ('template_url'); ?>/js/bigvideo.js"></script>
    <!-- Demo -->
    <script>
	    $(function() {
            var BV = new $.BigVideo({useFlashForFirefox:false});
			BV.init();
			
			<?php if(get_option('misfit_ambient') == "true") { ?>
			
			
            if (Modernizr.touch) {
                BV.show('<?php echo get_option('misfit_vidfallback'); ?>');
            } else {
                BV.show('<?php echo get_option('misfit_mp4'); ?>',{ambient:true,altSource:'<?php echo get_option('misfit_ogg'); ?>'});
            }
            
            <?php } else { ?>
            
            if (Modernizr.touch) {
                BV.show('<?php echo get_option('misfit_vidfallback'); ?>');
            } else {
                BV.show('<?php echo get_option('misfit_mp4'); ?>',{doLoop:true, altSource:'<?php echo get_option('misfit_ogg'); ?>'});
            }
            
            BV.getPlayer().volume(.4)
			
			// Use this to toggle
			$('.mute').toggle(function(){
			     BV.getPlayer().volume(0);
			     $(this).addClass('muted');
			}, function() {
			     BV.getPlayer().volume(.4);
			     $(this).removeClass('muted');               
			});
			
			<?php } ?>
            
	    });
    </script>

	<?php } ?>

<script src = "<?php bloginfo ('template_url'); ?>/js/jquery.iosslider.js"></script>		
	<script type="text/javascript">
		$(window).load(function() {
		
			$('.topslide').iosSlider({ desktopClickDrag: true, scrollbar: true, scrollbarDrag: true, keyboardControls: true, scrollbarLocation: 'bottom', autoSlide: true, autoSlideTimer: 2000, navNextSelector: $('#nextSlide'), navPrevSelector: $('#previousSlide'), });
			
		});
	</script>
<?php if(get_option('misfit_instagramid')) { ?>
	    <script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/instafeed.min.js"></script>
<script type="text/javascript">
var userFeed = new Instafeed({
    get: 'user',
    resolution: 'low_resolution',
    userId: <?php echo get_option('misfit_instagramid'); ?>,
    limit: 1,
    accessToken: '<?php echo get_option('misfit_instagramtok'); ?>'
});
userFeed.run();
</script>
<?php } ?>
<script src="<?php bloginfo ('template_url'); ?>/js/jquery.dlmenu.js"></script>
<script>
	$(function() {
		$( '#dl-menu' ).dlmenu({
			animationClasses : { classin : 'dl-animate-in-5', classout : 'dl-animate-out-5' }
		});
	});
</script>
<?php if(get_option('misfit_consumer_key')) { ?>
	<script src="<?php bloginfo ('template_url'); ?>/twitter/jquery.tweet.js" type="text/javascript"></script>
	<script type="text/javascript">
	    	
	<?php $foo = get_bloginfo('template_url');
		  $blah = parse_url($foo); ?>
		jQuery(function($){
	        var options = {
	          username: "<?php echo get_option('misfit_twitter'); ?>",
		          modpath: '<?php echo $blah[path]; ?>/twitter/',
		          page: 1,
		          avatar_size: 32,
		          count: 1,
		          fetch: 5, // 1 + count
		          loading_text: "loading …"
	        };

	        var widget = $("#paging .widget"),
	          next = $("#paging .next"),
	          prev = $("#paging .prev");

	        var enable = function(el, yes) {
	          yes ? $(el).removeAttr('disabled') :
	                $(el).attr('disabled', true);
	        };

	        var stepClick = function(incr) {
	          return function() {
	            options.page = options.page + incr;
	            enable(this, false);
	            widget.tweet(options);
	          };
	        };

	        next.bind("checkstate", function() {
	          enable(this, widget.find("li").length == options.count)
	        }).click(stepClick(1));

	        prev.bind("checkstate", function() {
	          enable(this, options.page > 1)
	        }).click(stepClick(-1));

	        widget.tweet(options).bind("loaded", function() { next.add(prev).trigger("checkstate"); });
	      });
	      
	</script>

<?php } ?>
<?php if(get_option('misfit_hometype') == "4" || get_option('misfit_hometype') == "2" || is_page_template('hp_vid.php') ) { ?>
<script src="<?php bloginfo ('template_url'); ?>/js/curtain-short.js"></script><?php } else { ?> 
<script src="<?php bloginfo ('template_url'); ?>/js/curtain.js"></script><?php } ?>
<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/lightbox.min.js"></script>     
<script src="<?php bloginfo ('template_url'); ?>/js/view.js" type="text/javascript" charset="utf-8"></script>
<?php 

	if( 

		(is_home() && get_option('misfit_hometype') == "1") || 
		( is_page() && get_post_meta($post->ID, 'misfit_pagetype', true) == "Scrolling Gallery" ) ||
		( is_page() && is_page_template('hp_slide.php') )
	) { 

?>
<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/supersized.3.2.7.min.js"></script>
<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/supersized.shutter.min.js"></script>
<?php include (TEMPLATEPATH . '/js/images.php');?>
<?php } ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/library/jquery.contact.js"></script>
<script type="text/javascript" src="<?php bloginfo ('template_url'); ?>/js/execute.js"></script>
<script src="<?php bloginfo ('template_url'); ?>/js/jquery.sticky-kit.js"></script>
<script src="<?php bloginfo ('template_url'); ?>/js/stick.js"></script>