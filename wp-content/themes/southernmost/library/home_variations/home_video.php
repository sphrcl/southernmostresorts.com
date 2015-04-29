    <section id="intro" class="cover">
	   
	   <?php if(get_option('misfit_ambient') == "false") { ?>

	   	<a id="big-video" href="#" class="mute"></a>
	   	
	   <?php } ?>
     
	        <div class="superhead">
	        
	        	<header data-fade="550" data-slow-scroll="3">
	        	
	        	<?php if(get_option('misfit_vidlineone')) { ?>
    			
    				<h1><?php echo get_option('misfit_vidlineone'); ?></h1>
    			
    			<?php } elseif(get_option('misfit_vidlinetwoimage')) { ?>
    		
    				<img class="overlogo" src="<?php echo get_option('misfit_vidlinetwoimage'); ?>" alt="<?php echo bloginfo('description'); ?>" />
    		
    			<?php } ?>
    			
    			<?php if(get_option('misfit_vidlinetwo')) { ?>
    			
    				<h4><?php echo get_option('misfit_vidlinetwo'); ?></h4>
    			
    			<?php } ?>
    			
    			<?php if(get_option('misfit_vidlinethree')) { ?>
    			
    				<p><?php echo get_option('misfit_vidlinethree'); ?></p>
    			
    			<?php } ?>
    			
		
	        	</header>
	        	
	        </div> 
			
	        <div class="leftwall"></div> 
    		<div class="rightwall"></div> 
	        
	    </section>
