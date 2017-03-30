<section id="intro" class="cover">
         
    	
    <a id="prevslide" class="load-item"><i class="fa fa-angle-left"></i></a>
	<a id="nextslide" class="load-item"><i class="fa fa-angle-right"></i></a>
	
	<div class="slide-major<?php if(get_option('misfit_slideimage')) { ?> imageinside<?php } ?><?php if(get_option('misfit_removeanimations') == "true") { ?> noanim<?php } ?>">
	
		<?php if(get_option('misfit_slideimage')) { ?>
			
		<img class="overlogo" src="<?php echo get_option('misfit_slideimage'); ?>" alt="<?php echo get_custom_image_thumb_alt_text(get_option('misfit_slideimage')); ?>" />
		
		<?php } else { ?>

		<div id="slidecaption"></div>
		
		<?php } ?>
		
		
	</div>
	
    <div class="leftwall"></div> 
    <div class="rightwall"></div> 
    
</section>