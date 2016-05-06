<!DOCTYPE HTML>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title>
		<?php global $page, $paged; wp_title( '|', true, 'right' ); //bloginfo( 'name' );
	
		// Add the blog description for the home/front page.
		// $site_description = get_bloginfo( 'description', 'display' );
		//if ( $site_description && ( is_home() || is_front_page() ) )
		//	echo " | $site_description";
	
		// Add a page number if necessary:
		//if ( $paged >= 2 || $page >= 2 )
		//	echo ' | ' . sprintf( __( 'Page %s', 'cebolang' ), max( $paged, $page ) );
		?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if (get_option('misfit_custom_favicon')) { ?>
	
		<link rel="icon" href="<?php echo get_option('misfit_custom_favicon'); ?>" type="image/x-ico"/>
	
	<?php } ?>	
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('cebo_feedburner_url') <> "" ) { echo get_option('cebo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
	
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo ('template_url'); ?>/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo ('template_url'); ?>/css/fonts.css">

	<link rel="stylesheet" type="text/css" href="<?php bloginfo ('template_url'); ?>/js/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo ('template_url'); ?>/js/owl-carousel/owl.theme.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo ('template_url'); ?>/js/owl-carousel/owl.transitions.css">
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo ('template_url'); ?>/css/flexslider.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	
	<!-- responsive style -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo ('template_url'); ?>/css/media.css">

	<!-- NAVIS script -->
	<script language="javascript" src="http://www.navistechnologies.info/JavascriptPhoneNumber/js.aspx?account=15278&jspass=84ajbd9wo80x2tb00sbo&dflt=8003544455"></script>
	<script language="javascript">ProcessNavisNCKeyword();</script>
	
	<?php
		/****************** DO NOT REMOVE **********************
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
		wp_head();
	?>

	<script> 

		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga'); 
		ga('create', 'UA-17032284-1', 'auto',{
			'allowLinker': true 
		}); ga('require', 'linker'); 
		ga('linker:autoLink', ['splitrockresort.reztrip.com','splitrockresort.reztripmobile.com']); 
		ga('send', 'pageview');

	</script>

	<script type="application/ld+json">
		{
		"@context": "http://schema.org",
		"@type": "NewsArticle",
		"headline": "Article headline",
		"alternativeHeadline": "The headline of the Article",
		"image": [
		"thumbnail1.jpg",
		"thumbnail2.jpg"
		],
		"datePublished": "2015-02-05T08:00:00+08:00",
		"description": "A most wonderful article",
		"articleBody": "The full body of the article"
		}
	</script>

	</head> 
	
	<body <?php body_class(); ?>>	

 <div id="overlay-back"></div>
<div class="close-image"><img src="<?php bloginfo ('template_url'); ?>/images/pop-close.png" alt="*"></div>
<div class="pops">
 <div class="white_pop"><img src="<?php bloginfo ('template_url'); ?>/images/poplogo.png" alt="*"> </div>
<div id="popup">
<script type="text/javascript" src="https://secure.opentable.com/frontdoor/default.aspx?rid=46771&restref=46771&bgcolor=F6F6F3&titlecolor=0F0F0F&subtitlecolor=0F0F0F&btnbgimage=https://secure.opentable.com/frontdoor/img/ot_btn_red.png&otlink=FFFFFF&icon=dark&mode=short&hover=1"></script>
<a href="http://www.opentable.com/southernmost-beach-cafe-reservations-key-west?rtype=ism&restref=46771" class="OT_ExtLink">Southernmost Beach Cafe (46771), Key West / Florida Keys Reservations</a>
</div>	
</div>	

	<div id="wrapper" class="wrapper">
	
	<a href="#" class="closer"></a>
	
		<div id="header">
	
			<div class="logo">
				<a href="<?php bloginfo ('url'); ?>"><img src="<?php bloginfo ('template_url'); ?>/images/logo-footer.png" alt="Southernmost"></a>
			</div>
	
			<div class="navigation">
				<div id="navmenu">
					
					<ul id="menu-top-navigation" class="topnavigation">
						<li>
							<a href="<?php bloginfo('url');?>/rooms/">Accommodations</a>
							<div class="slidedown-nav">

								<div class="left">
									<h3>Rooms</h3>
									<a href="<?php echo get_page_link(433); ?>">See All</a>									
								</div>

								<a class="btn next right"><i class="fa fa-angle-right"></i></a>

								<div id="owl" class="right owl-carousel owl-theme">

									<?php 
										$query_slidedown_rooms = new wp_query(array(
											'post_type' => 'page',
											'posts_per_page' => -1,
											'post__in' => array(1139,1142,1146,1153,1176),
											'orderby' => 'menu_order',
											'order'   => 'ASC'
										)); 
										if($query_slidedown_rooms->have_posts()) : while($query_slidedown_rooms->have_posts()) : $query_slidedown_rooms->the_post();
										$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
								    ?>
										<div class="item">
											<a href="<?php the_permalink(); ?>"><div class="slide-image" style="background-image: url(<?php echo tt($imgsrc[0],340,270); ?>);"></div></a>
											<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
										</div>
										
									<?php endwhile; endif; wp_reset_query(); ?>

								</div>

								<a class="btn prev right"><i class="fa fa-angle-left"></i></a>

							</div>
						</li>
						<li>
							<a href="<?php bloginfo('url');?>/photo-gallery/">Gallery</a>
							<div class="slidedown-nav">

								<div class="left">
									<h3>Gallery</h3>
								</div>

								<a class="btn next1 right"><i class="fa fa-angle-right"></i></a>

								<div id="owl1" class="right owl-carousel owl-theme">

									<?php 
										$query_slidedown_gallery = new wp_query(array(
											'post_type' => 'imagegalleries',
											'posts_per_page' => -1
										)); 
										if($query_slidedown_gallery->have_posts()) : while($query_slidedown_gallery->have_posts()) : $query_slidedown_gallery->the_post();
										$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
								    ?>
										<div class="item">
											<a href="<?php the_permalink(); ?>"><div class="slide-image" style="background-image: url(<?php echo tt($imgsrc[0],340,270); ?>);"></div></a>
											<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
										</div>
									<?php endwhile; endif; wp_reset_query(); ?>

								</div>

								<a class="btn prev1 right"><i class="fa fa-angle-left"></i></a>

							</div>
						</li>
						<li>
							<a href="<?php bloginfo('url');?>/vacation-packages/">Specials</a>
							<div class="slidedown-nav">

								<div class="left">
									<h3>Specials</h3>
								</div>

								<a class="btn next2 right"><i class="fa fa-angle-right"></i></a>

								<div id="owl2" class="right owl-carousel owl-theme">

									<?php 
										$query_slidedown_gallery = new wp_query(array(
											'post_type' => 'sspecials',
											'posts_per_page' => -1
										)); 
										if($query_slidedown_gallery->have_posts()) : while($query_slidedown_gallery->have_posts()) : $query_slidedown_gallery->the_post();
										$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
								    ?>
										<div class="item">
											<a href="<?php the_permalink(); ?>"><div class="slide-image" style="background-image: url(<?php echo tt($imgsrc[0],340,270); ?>);"></div></a>
											<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
										</div>
									<?php endwhile; endif; wp_reset_query(); ?>

								</div>

								<a class="btn prev2 right"><i class="fa fa-angle-left"></i></a>

							</div>
						</li>
						<li>
							<a href="<?php bloginfo('url');?>/key-west-restaurants/">Restaurant & Bars</a>
							<div class="slidedown-nav">

								<div class="left">
									<h3>Restaurant & Bars</h3>
								</div>

								<a class="btn next3 right"><i class="fa fa-angle-right"></i></a>

								<div id="owl3" class="right owl-carousel owl-theme">

									<?php 
										$query_slidedown_gallerys = new wp_query(array(
											'post_type' => 'dining',
											'posts_per_page' => -1
										)); 
										if($query_slidedown_gallerys->have_posts()) : while($query_slidedown_gallerys->have_posts()) : $query_slidedown_gallerys->the_post();
										$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
								    ?>
										<div class="item">
											<a href="<?php the_permalink(); ?>"><div class="slide-image" style="background-image: url(<?php echo tt($imgsrc[0],340,270); ?>);"></div></a>
											<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
										</div>
									<?php endwhile; endif; wp_reset_query(); ?>

								</div>

								<a class="btn prev3 right"><i class="fa fa-angle-left"></i></a>

							</div>
						</li>
					</ul>
					
				</div>

				<div class="mobileicon">
					<a href="tel:8003544455"><img src="http://www.southernmostbeachresort.com/wp-content/uploads/2015/10/phoneiconmobile.png"></a>
				</div>
				
				<div class="hamburger">
					<a class="cheese" href="#"><img src="<?php bloginfo ('template_url'); ?>/images/hamburger-button.png" alt="menu"/></a>
				
				</div>
				<div class="phone">
					<img src="http://www.southernmostbeachresort.com/wp-content/uploads/2015/10/phoneicon.png"><span id="ptext"><a href="tel:8003544455"><span id="NavisTFN2" style="font-family:GothamBold;">(800)354-4455 </span></a></span>
				</div>

				<!-- NAVIS -->
						 <script type="text/javascript">
						 SetElementToNavisNCPhoneNumber("NavisTFN2");
						 </script>
					
				<!-- / NAVIS -->
			</div>
	
			<div class="reserve">
				<a class="button1 opentable" href="javascript:void(0);">reserve</a>
			</div>
	
		</div>
	