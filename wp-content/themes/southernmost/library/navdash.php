	<div id="header" class="mm-fixed-top">
		
		<a href="#menu"></a>
		
	</div>
			
			
	<div class="wrapper">
		
		
		<?php if(get_option('misfit_tradnav') == "true") { ?>
	
			
			<div class="basenav">
				
				<div class="basenavcontainer">
				
					<div class="hi">
					<a href="<?php bloginfo('url'); ?>">
					<img src="<?php if(get_option('misfit_logo')) { echo get_option('misfit_logo'); } else { ?><?php bloginfo ('template_url'); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('description'); ?>">
					</a>
					</div>
				
				
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ,  'container' => '', 'menu_class' => '' ) ); ?>
					
					
				</div>
			
			</div>
			
			
		<?php } else { ?>	
			
			
			<nav class="listless"> 
		
			      <div class="go"><a href="#"></a></div>
			   
			   </nav>
		
			<div class="dashboard">
		
						
			<div class="majorheading">
			
			
				<div class="welcomesec">
						
					
					
						<div class="hi" style="background-image: url(<?php if(get_option('misfit_logo')) { echo get_option('misfit_logo'); } else { ?><?php bloginfo ('template_url'); ?>/images/logo.png<?php } ?>);">
							<a style="display: block; height: 100%; width: 100%;" href="<?php bloginfo('url'); ?>"></a>
						</div>
					
						
						
					</div>
					
					<div class="socializer">
						
						<?php if(get_option('misfit_logotext')) { ?>
						
						<p><a href="<?php bloginfo('url'); ?>"><?php echo get_option('misfit_logotext'); ?></a></p>
						
						<?php } ?>
						
						<?php if(get_option('misfit_facebook')) { ?>
						<a href="http://facebook.com/<?php echo get_option('misfit_facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
						<?php } ?>
						<?php if(get_option('misfit_twitter')) { ?>
						<a href="http://twitter.com/<?php echo get_option('misfit_twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
						<?php } ?>
						<?php if(get_option('misfit_pinterest')) { ?>
						<a href="http://www.pinterest.com/<?php echo get_option('misfit_pinterest'); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
						<?php } ?>
						<?php if(get_option('misfit_dribbble')) { ?>
						<a href="https://dribbble.com/<?php echo get_option('misfit_dribbble'); ?>" target="_blank"><i class="fa fa-dribbble"></i></a>
						<?php } ?>
						<?php if(get_option('misfit_googleplus')) { ?>
						<a href="https://plus.google.com/+<?php echo get_option('misfit_googleplus'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
						<?php } ?>
						<?php if(get_option('misfit_instagram')) { ?>
						<a href="https://instagram.com/<?php echo get_option('misfit_instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a>	
						<?php } ?>
						
					</div>
					
					
					<div class="searchbox">
						
						<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
					
						        <input type="text" value="" name="s" id="s" placeholder="type it and find it" />
						        <button type="submit" id="searchsubmit"></button>
						 		<i class="fa fa-search"></i>
						 		
						</form>	
					
					</div>


			</div>
			
			
			
			<div class="fullbox">
			
				<div class="leftlist">

	
					<div id="dl-menu" class="dl-menuwrapper">
						
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ,  'container' => '', 'menu_class' => 'dl-menu scrolling' ) ); ?>
								
					</div><!-- end dl-menuwrapper -->
							
				</div>
				
				
				<div class="rightbox">
				
				
					<div class="rightcolumnone">
					
					
					<?php $my_query = new WP_Query('posts_per_page=1'); if(have_posts()) : while($my_query->have_posts()) : $my_query->the_post(); ?>
					<div class="blogshowcase">	
						
						<div class="inner">

							<a href="<?php the_permalink(); ?>">
							
								<h2><?php if(get_post_meta($post->ID, 'misfit_shorttitle', true)) { echo get_post_meta($post->ID, 'misfit_shorttitle', true); } else { the_title(); } ?></h2>
									
								<h4><?php echo excerpt(15); ?></h4>
								
								<p class="lowerlink"><?php if(get_option('misfit_onward')) { echo get_option('misfit_onward'); } else { _e('Read On', 'misfitlang'); } ?> </p>
								
							</a>
						
						</div>
						
					</div>
					<?php endwhile; endif; wp_reset_query(); ?>	
					
					
					<div class="showcase">
					
						<?php query_posts('post_type=project&posts_per_page=1'); if(have_posts()) : while(have_posts()) : the_post();  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
						
						<div class="portshowcase" style="background-image: url(<?php echo $imgsrc[0]; ?>);">
							<a href="<?php the_permalink(); ?>"></a>
	         				<h3><?php echo get_post_meta($post->ID, 'misfit_shorttitle', true); ?></h3>
						
						</div>
						<?php endwhile; endif; wp_reset_query(); ?>	
					</div>
					
					
					
					</div>
					
					
					
					<div class="bigcolumn">
						
						<div class="accordionarea">
						
						
							<div class="acc-container">
							
							<?php $pagename = get_option('misfit_tabone');
											$page = get_page_by_title($pagename);
											$featured_id =  $page->ID;
											
					            	query_posts(
				            			
				            			array(
				            				'post_type' => 'page',
				            				'p' => $featured_id,
				            				'posts_per_page' => -1
				            			)
				            	
				            		); if(have_posts()) : while(have_posts()) : the_post(); ?>
				            		<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
														
							<div class="acc-btn"><h1 class="selected"><?php the_title(); ?></h1></div>
							<div class="acc-content open">
							  <div class="acc-content-inner">
							 
							 
							 	<?php the_content(); ?>
							 								    
							    <div class="clear"></div>
							  </div>
							</div>
							
							
							<?php endwhile; endif; wp_reset_query(); ?>	
							
													
							
							
							<?php $pagename = get_option('misfit_tabtwo');
											$page = get_page_by_title($pagename);
											$featured_id =  $page->ID;
											
					            	query_posts(
				            			
				            			array(
				            				'post_type' => 'page',
				            				'p' => $featured_id,
				            				'posts_per_page' => -1
				            			)
				            	
				            		); if(have_posts()) : while(have_posts()) : the_post(); ?>
				            		<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
														
							<div class="acc-btn"><h1><?php the_title(); ?></h1></div>
							<div class="acc-content">
							  <div class="acc-content-inner">
							 
							 
							 	<?php the_content(); ?>
							 								    
							    <div class="clear"></div>
							  </div>
							</div>
							
							
							<?php endwhile; endif; wp_reset_query(); ?>	

							
								
							<div class="acc-btn"><h1><?php if(get_option('misfit_emailheading')) { echo get_option('misfit_emailheading'); } else { _e('Contact','misfitlang'); } ?></h1></div>
							<div class="acc-content">
							  <div class="acc-content-inner">
							    	
							    	
							    	<?php if(get_option('misfit_emailmessage')) { ?>
							    	
							    	 <p><?php echo get_option('misfit_emailmessage'); ?></p>
							    	 
							    	 <?php } ?>
							    	 
							    	 <div id="message" class="message"></div>
							    		<form method="post" action="<?php bloginfo('template_url'); ?>/library/contact.php" name="cform" id="cform" class="contacto cform sleek">
							    		
							    		<div class="leftyform">
							    			
							    			<input class="lilly" id="subjects" type="text" placeholder="<?php _e('Your Subject','misfitlang'); ?>" name="subjects" value="" />
							    			
							    			<textarea class="lonely" name="comments" placeholder="<?php _e('Your Message*','misfitlang'); ?>" id="commentlys"></textarea>
							    		
							    		
							    		</div>
							    		
							    		
							    		<div class="rightyform">
							    		
							    			
							    			<input class="lilly" id="name" type="text" placeholder="<?php _e('Your Name*','misfitlang'); ?>" name="name" value="" />
						
											<input class="lilly" id="email" type="text" placeholder="<?php _e('Your Email*','misfitlang'); ?>" name="email" value="" />
						
											<input class="lilly" type="hidden" name="subject" id="subject" value="<?php echo get_option('misfit_email'); ?>" />
											
											<input class="lilly" type="hidden" name="honeypot" id="honeypot" />
											
											<input class="lilly" type="text" style="display: none;" name="myemail" id="myemail" value="<?php echo get_option('misfit_email'); ?>" />
							    			
							    			 <input type="submit" name="send" value="Send Message" id="submit" class="button hang"/>
							    			
							    		
							    		</div>
							    	
							    		<div class="clear"></div>
							    	
							    	</form>
							    
							  </div>
							</div>




							</div>						
						
						</div>
						
						
						<div class="lowerhalves">
						
							<div class="rightcolumnone twittable">
							
								<a class="twithello" href="http://twitter.com/<?php echo get_option('misfit_twitter'); ?>">@<?php echo get_option('misfit_twitter'); ?></a>
						
						<div class="twittling">
						
						
							<div class="tweet">
			
			
								<div id="paging">
							      <div class="widget query"></div>
							      <!--<div class="controls">
							        <button class="prev" type="button" disabled>&larr;</button>
							        <span class="pagenum"></span>
							        <button class="next" type="button" disabled>&rarr;</button>
							      </div>-->
							    </div>
										
							
							</div>
			
						</div>	
						
						<a class="twitgoodbye" href="http://twitter.com/<?php echo get_option('misfit_twitter'); ?>"><i class="fa fa-twitter"></i></a>	
						
						
					        </div>
							<div class="rightcolumntwo">
							
								<div class="instalink"><a href="http://instagram.com/<?php echo get_option('misfit_instagram'); ?>"><i class="fa fa-instagram"></i></a></div>
						
									<div id="instafeed"></div>
						
						
									<div class="clear"></div>
							
							
					        </div>
						
						
						</div>
					
					
					</div>
				
				
				
				</div>
			
			
			
			</div>
					
		</div>
		
		
		<?php } ?>
