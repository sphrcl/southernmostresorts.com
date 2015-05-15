<!DOCTYPE HTML>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title>
		<?php global $page, $paged; wp_title( '|', true, 'right' ); bloginfo( 'name' );
	
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
	
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'cebolang' ), max( $paged, $page ) );
		?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if (get_option('cebo_custom_favicon') == '') { ?>
	
	<link rel="icon" href="<?php bloginfo ('template_url'); ?>/cebo_options/<?php bloginfo ('template_url'); ?>/images/admin_sidebar_icon.png" type="image/x-ico"/>
	
	<?php } else { ?>
	
	<link rel="icon" href="<?php echo get_option('cebo_custom_favicon'); ?>" type="image/x-ico"/>
	
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
	
	<?php
		/****************** DO NOT REMOVE **********************
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
		wp_head();
	?>
	</head> 
	
	<body <?php body_class(); ?>>	

	<div id="wrapper" class="wrapper">
	
	<a href="#" class="closer"></a>
	
		<div id="header">
	
			<div class="logo">
				<a href="<?php bloginfo ('url'); ?>"><img src="<?php bloginfo ('template_url'); ?>/images/logo.jpg" alt="Southernmost"></a>
			</div>
	
			<div class="navigation">
				<div id="navmenu">
					
					<ul id="menu-top-navigation" class="topnavigation">
						<li>
							<a href="/rooms/">Accommodations</a>
							<div class="slidedown-nav">

								<div class="left">
									<h3>Rooms</h3>
									<a href="#">See Availability</a>									
								</div>

								<a class="btn next right"><i class="fa fa-angle-right"></i></a>

								<div id="owl" class="right owl-carousel owl-theme">

									<?php 
										$query_slidedown_rooms = new wp_query(array(
											'post_type' => 'rooms',
											'posts_per_page' => -1
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
							<a href="/photo-gallery-2/">Gallery</a>
							<div class="slidedown-nav">

								<div class="left">
									<h3>Gallery</h3>
									<a href="#">See Availability</a>									
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
							<a href="/vacation-packages/">Specials</a>
							<div class="slidedown-nav">

								<div class="left">
									<h3>Specials</h3>
									<a href="#">See Availability</a>									
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
							<a href="/dining-2/">Dining</a>
							<div class="slidedown-nav">

								<div class="left">
									<h3>Dining</h3>
									<a href="#">See Availability</a>									
								</div>

								<a class="btn next3 right"><i class="fa fa-angle-right"></i></a>

								<div id="owl3" class="right owl-carousel owl-theme">

									<?php 
										$query_slidedown_gallery = new wp_query(array(
											'post_type' => 'dining',
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

								<a class="btn prev3 right"><i class="fa fa-angle-left"></i></a>

							</div>
						</li>
					</ul>
					
				</div>

				<div class="hamburger">
					<a class="cheese" href="#"><img src="<?php bloginfo ('template_url'); ?>/images/hamburger-button.png" alt="menu"/></a>
					
				</div>

			</div>
	
			<div class="reserve">
				<a class="button1" href="#">reserve</a>
			</div>
	
		</div>
	