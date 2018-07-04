<!DOCTYPE HTML>
<html <?php language_attributes( 'html' ); ?> >
<head>
    
    <style>.async-hide { opacity: 0 !important} </style>
    <script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
    h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
    (a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
    })(window,document.documentElement,'async-hide','dataLayer',4000,
    {'GTM-52R34D5':true});</script>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-52R34D5');</script>
	<!-- End Google Tag Manager -->

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
	<?php 
		if ( file_exists( dirname( __FILE__ ) . '/noindex.php' ) ) {
		    include( dirname( __FILE__ ) . '/noindex.php' );
		}
	?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="//gmpg.org/xfn/11" />
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if (get_option('misfit_custom_favicon')) { ?>
	
		<link rel="icon" href="<?php echo get_option('misfit_custom_favicon'); ?>" type="image/x-ico"/>
	
	<?php } ?>	
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('cebo_feedburner_url') <> "" ) { echo get_option('cebo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
	
	<!-- Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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

	<!-- Wanderful script -->
	<script id="gtsgig-boot" data-hotel-id="southernmostbeachresort" src="https://widgets.gtsgig.com/boot.js" async defer></script>

	<!-- NAVIS script -->
	<script language="javascript" src="//www.navistechnologies.info/JavascriptPhoneNumber/js.aspx?account=15278&jspass=84ajbd9wo80x2tb00sbo&dflt=8003544455"></script>
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

	<script type="application/ld+json">
		{
		"@context": "//schema.org",
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

	<script type='text/javascript'>
		var axel = Math.random() + '';
		var a = axel * 10000000000000;
		document.write('<img src="https://pubads.g.doubleclick.net/activity;dc_iu=/5349/DFPAudiencePixel;ord=' + a + ';dc_seg=475997594?" width=1 height=1 border=0 alt="ads"/>');
		</script>
		<noscript>
		<img src="https://pubads.g.doubleclick.net/activity;dc_iu=/5349/DFPAudiencePixel;ord=1;dc_seg=475997594?" width=1 height=1 border=0 alt="ads"/>
	</noscript>

	</head> 
	
	<body <?php body_class(); ?>>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-52R34D5"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<div id="wrapper" class="wrapper">
	
	<a href="#" class="closer" aria-label="close button"></a>
	
		<div id="header">
	
			<div class="logo">
				<a href="<?php bloginfo ('url'); ?>"><img src="<?php bloginfo ('template_url'); ?>/images/logo-footer.png" alt="Southernmost Header Logo"></a>
			</div>
	
			<div class="navigation">
				<div id="navmenu">
					
					<ul id="menu-top-navigation" class="topnavigation">
						<li>
							<a href="<?php bloginfo('url');?>/accomodations/">Accommodations</a>
							<div class="slidedown-nav">

								<div class="left">
									<span>Rooms</span>
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
											<a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><div class="slide-image" style="background-image: url(<?php echo tt($imgsrc[0],340,270); ?>);"></div></a>
											<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
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
									<span>Gallery</span>
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
											<a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><div class="slide-image" style="background-image: url(<?php echo tt($imgsrc[0],340,270); ?>);"></div></a>
											<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
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
									<span>Specials</span>
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
											<a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><div class="slide-image" style="background-image: url(<?php echo tt($imgsrc[0],340,270); ?>);"></div></a>
											<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
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
									<span>Restaurant & Bars</span>
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
											<a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><div class="slide-image" style="background-image: url(<?php echo tt($imgsrc[0],340,270); ?>);"></div></a>
											<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
										</div>
									<?php endwhile; endif; wp_reset_query(); ?>

								</div>

								<a class="btn prev3 right"><i class="fa fa-angle-left"></i></a>

							</div>
						</li>
					</ul>
					
				</div>

				<div class="mobileicon">
					<a href="tel:8003544455" aria-label="telephone number"><img src="//www.southernmostbeachresort.com/wp-content/uploads/2015/10/phoneiconmobile.png" alt="phoneicon mobile"></a>
				</div>
				
				<div class="hamburger">
					<a class="cheese" href="#"><img src="<?php bloginfo ('template_url'); ?>/images/hamburger-button.png" alt="menu"/></a>
				
				</div>
				<div class="phone">
					<img src="//www.southernmostbeachresort.com/wp-content/uploads/2015/10/phoneicon.png" alt="phoneicon"><span id="ptext"><a href="tel:8003544455"><span id="NavisTFN2" style="font-family:GothamBold;">(800)354-4455 </span></a></span>
				</div>

				<!-- NAVIS -->
						 <script type="text/javascript">
						 SetElementToNavisNCPhoneNumber("NavisTFN2");
						 </script>
					
				<!-- / NAVIS -->
			</div>
	
			<div class="reserve">
				<a class="button1" href="<?php echo get_option('misfit_booking_link'); ?>">reserve</a>
			</div>
	
		</div>
	