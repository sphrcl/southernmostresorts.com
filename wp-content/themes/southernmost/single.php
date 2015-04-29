<?php 

/* 

Basic Single Post Template 

*/

get_header(); ?>


<div class="curtains">


	<?php if(get_post_meta($post->ID, 'misfit_pagetype', true) == "Intro w/Side Banner(R)" ) { ?>
	
		
		<?php include (TEMPLATEPATH . '/library/page_variations/intro_sidebanner.php'); ?>
		
	
	<?php } elseif(get_post_meta($post->ID, 'misfit_pagetype', true) == "Intro w/Side Banner(L)" ) { ?>
	
		
		<?php include (TEMPLATEPATH . '/library/page_variations/intro_sidebannerleft.php'); ?>
		
		
	<?php } elseif(get_post_meta($post->ID, 'misfit_pagetype', true) == "Top Banner" ) { ?>
		
		
		<?php include (TEMPLATEPATH . '/library/page_variations/topbanner.php'); ?>
		
	
	<?php } elseif(get_post_meta($post->ID, 'misfit_pagetype', true) == "Top Banner w/Side(R)" ) { ?>
	
		<?php include (TEMPLATEPATH . '/library/page_variations/topsider.php'); ?>
		
		
	<?php } elseif(get_post_meta($post->ID, 'misfit_pagetype', true) == "Top Banner w/Side(L)" ) { ?>
	
		<?php include (TEMPLATEPATH . '/library/page_variations/topsidel.php'); ?>
		
			
	<?php } elseif(get_post_meta($post->ID, 'misfit_pagetype', true) == "Top Banner w/Full(R)" ) { ?>
	
		
		<?php include (TEMPLATEPATH . '/library/page_variations/topsidebanner.php'); ?>

	
	<?php } elseif(get_post_meta($post->ID, 'misfit_pagetype', true) == "Top Banner w/Full(L)" ) { ?>
	
		
		<?php include (TEMPLATEPATH . '/library/page_variations/topsidelbanner.php'); ?>
	
	
	<?php } elseif(get_post_meta($post->ID, 'misfit_pagetype', true) == "Side Gallery(R)" ) { ?>
		
		
		<?php include (TEMPLATEPATH . '/library/page_variations/sidegallery.php'); ?>
		
	
	<?php } elseif(get_post_meta($post->ID, 'misfit_pagetype', true) == "Side Gallery(L)" ) { ?>
		
		
		<?php include (TEMPLATEPATH . '/library/page_variations/sidegalleryleft.php'); ?>
	
	
	<?php } elseif(get_post_meta($post->ID, 'misfit_pagetype', true) == "Intro w/Side Gallery(R)" ) { ?>
	
		
		<?php include (TEMPLATEPATH . '/library/page_variations/intro_sidegallery.php'); ?>
		
	
	<?php } elseif(get_post_meta($post->ID, 'misfit_pagetype', true) == "Intro w/Side Gallery(L)" ) { ?>
	
		
		<?php include (TEMPLATEPATH . '/library/page_variations/intro_sidegalleryleft.php'); ?>
	
	
	<?php } elseif(get_post_meta($post->ID, 'misfit_pagetype', true) == "Side Banner(R)" ) { ?>
	
		
		<?php include (TEMPLATEPATH . '/library/page_variations/sidebanner.php'); ?>
	
	<?php } elseif(get_post_meta($post->ID, 'misfit_pagetype', true) == "Side Banner(L)" ) { ?>
	
		
		<?php include (TEMPLATEPATH . '/library/page_variations/sidebannerleft.php'); ?>
	
	
	<?php } elseif(get_post_meta($post->ID, 'misfit_pagetype', true) == "Scrolling Gallery" ) { ?>
	
		
		<?php include (TEMPLATEPATH . '/library/page_variations/scrollingbanner.php'); ?>
		
	
	<?php } else { ?>

		<?php include (TEMPLATEPATH . '/library/page_variations/basefull.php'); ?>


	<?php } ?>
	
	
	
	<!-- home blog  -->
	<?php include(TEMPLATEPATH . '/library/relational_blog.php'); ?>		    

		  
 
	</div><!-- end curtains -->



<?php get_footer(); ?>