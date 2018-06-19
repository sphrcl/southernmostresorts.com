<?php

/* 404 Page Template

*/
 get_header(); ?>



<div class="curtains">



	 <section id="intro" class="pagers">
	 	<div id="topbanner">
			<div class="static-banner" style="background-image: url('//www.southernmostbeachresort.com/wp-content/uploads/2015/04/southernmost-hotel-key-west-home-banner2.jpg')"></div>
			<div class="topbanner-overlay"></div>
		</div>

       <div class="pagecontent<?php if(get_post_type() == "page") { ?> interiorpage<?php } ?>">

       		<div class="contentcontainer">



						<div id="pagecontent">
							<div class="container">
								<div class="contenttitle"></br>


			     				<h1 class="title"><?php _e("404","misfitlang"); ?></h1>

								</div>



								<div class="content">
	       					<!-- <div class="postcopy" style="min-height: 300px;"> -->

		       				<p><?php _e('Sorry, friend, if you have found this page and it means the internet has failed you... or that you will have to try your search again. ', 'cebolang'); ?><?php _e('Head over to our ', 'cebolang'); ?><a href="<?php bloginfo('url'); ?>"><?php _e('home page ', 'cebolang'); ?></a><?php _e('or you can visit any of the links below.', 'cebolang'); ?></p><br>
								</div>
							</div>
						</div>
					</div>
					<!-- </div> -->
		       		<div class="socializer" style="position: relative;">
							<ul>
								<?php if(get_option('misfit_facebook')) { ?>
								<li><a href="//facebook.com/pursuitofeverything" target="_blank" class="flaticon-facebook51" aria-label="link to pursuit to everything facebook page"></a></li>
								<?php } ?>
								<?php if(get_option('misfit_twitter')) { ?>
								<li><a href="//twitter.com/cebocampbell" target="_blank" class="flaticon-twitter44" aria-label="link to instagram page"></a></li>
								<?php } ?>
								<?php if(get_option('misfit_dribbble')) { ?>
								<li><a href="https://dribbble.com/cebo" target="_blank" class="flaticon-dribbble14" aria-label="link to dribble page"></a></li>
								<?php } ?>
								<?php if(get_option('misfit_googleplus')) { ?>
								<li><a href="https://plus.google.com/+101368968681233125083" target="_blank" class="flaticon-google115" aria-label="link to google plus page"></a></li>
								<?php } ?>
								<?php if(get_option('misfit_instagram')) { ?>
								<li><a href="https://instagram.com/cebocampbell" target="_blank" class="flaticon-instagram7" aria-label="link to instagram page"></a></li>
								<?php } ?>
								<?php if(get_option('misfit_behance')) { ?>
								<li style="margin-left: 8px;"><a href="https://behance.net/cebocampbell" target="_blank" class="flaticon-behance2" aria-label="link to behance page"></a></li>												<?php } ?>


							<span style="display: block;" class="clear"></span>
							</ul>

					<div class="clear"></div>




	       		</div>
	       	</div>

	       <div class="clear"></div>

	       <?php comments_template(); ?>

	       </div>

	       <div class="leftwall"></div>
    	   <div class="rightwall"></div>

	    </section>



	</div><!-- end curtains -->



<?php get_footer(); ?>
