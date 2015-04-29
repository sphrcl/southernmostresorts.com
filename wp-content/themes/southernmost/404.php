<?php 

/* 404 Page Template 

*/
 get_header(); ?>



<div class="curtains">

 	
	 
	 <section id="intro" class="pagers">
        
       <div class="pagecontent<?php if(get_post_type() == "page") { ?> interiorpage<?php } ?>">
       
       		<div class="contentcontainer">
       		
       		
       		

	       		
	       		<h2 class="subheading"><?php _e('Well, now...this is awkward','misfitlang'); ?></h2>		       			
			       			
			     
			     <h1 class="bigheading" style="max-width: 80%; margin: auto; font-size: 140px; line-height: 120px;"><?php _e("404","misfitlang"); ?></h1> 
	       		
	       		
	       		
	       		
	       		
	       		
	       		<div class="postcopy" style="min-height: 500px;">
		       		
		       	
		       		
		       			<p><?php _e('Sorry, friend, if you have found this page and it means the internet has failed you... or that you will have to try your search again. ', 'cebolang'); ?><?php _e('Head over to our ', 'cebolang'); ?><a href="<?php bloginfo('url'); ?>"><?php _e('home page ', 'cebolang'); ?></a><?php _e('or you can visit any of the links below.', 'cebolang'); ?></p><br>
		       		
		       	
		       		
		       		<div class="socializer" style="position: relative;">
							<ul>
								<?php if(get_option('misfit_facebook')) { ?>
								<li><a href="http://facebook.com/pursuitofeverything" target="_blank" class="flaticon-facebook51"></a></li>
								<?php } ?>
								<?php if(get_option('misfit_twitter')) { ?>
								<li><a href="http://twitter.com/cebocampbell" target="_blank" class="flaticon-twitter44"></a></li>
								<?php } ?>
								<?php if(get_option('misfit_dribbble')) { ?>
								<li><a href="https://dribbble.com/cebo" target="_blank" class="flaticon-dribbble14"></a></li>
								<?php } ?>
								<?php if(get_option('misfit_googleplus')) { ?>
								<li><a href="https://plus.google.com/+101368968681233125083" target="_blank" class="flaticon-google115"></a></li>
								<?php } ?>
								<?php if(get_option('misfit_instagram')) { ?>
								<li><a href="https://instagram.com/cebocampbell" target="_blank" class="flaticon-instagram7"></a></li>	
								<?php } ?>
								<?php if(get_option('misfit_behance')) { ?>
								<li style="margin-left: 8px;"><a href="https://behance.net/cebocampbell" target="_blank" class="flaticon-behance2"></a></li>												<?php } ?>
								
								
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