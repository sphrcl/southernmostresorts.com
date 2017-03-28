	<section id="intro" class="cover" style="background-image: url(<?php if(get_option('misfit_single_image')) { echo get_option('misfit_single_image'); } else { ?><?php bloginfo('template_url'); ?>/images/bans/23.jpg<?php } ?>); ">
    
    <div class="superhead homebase">
    
    	<header data-fade="550" data-slow-scroll="3">
    	
    		<div class="headoc">
    			
    			<?php if(get_option('misfit_lineone')) { ?>
    			
    				<h1><?php echo get_option('misfit_lineone'); ?></h1>
    			
    			<?php } elseif(get_option('misfit_linetwoimage')) { ?>
    		
    				<img class="overlogo" src="<?php echo get_option('misfit_linetwoimage'); ?>" alt="<?php echo get_custom_image_thumb_alt_text(get_option('misfit_linetwoimage')); ?>" />
    		
    			<?php } ?>
    			
    			<?php if(get_option('misfit_linetwo')) { ?>
    			
    				<h4><?php echo get_option('misfit_linetwo'); ?></h4>
    			
    			<?php } ?>
    			
    			<?php if(get_option('misfit_linethree')) { ?>
    			
    				<p><?php echo get_option('misfit_linethree'); ?></p>
    			
    			<?php } ?>
    			
    			
    		
    		</div>
    			        		
    	</header>
    
    </div> 
    
    <div class="leftwall"></div> 
    <div class="rightwall"></div> 
    
	</section>