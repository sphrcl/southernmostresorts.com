<?php if(get_option('misfit_hometype') == "1" ) { ?>
	
		
	<?php include (TEMPLATEPATH . '/library/home_variations/home_slider.php'); ?>
	
	
<?php } elseif(get_option('misfit_hometype') == "2" ) { ?>

	
	<?php include (TEMPLATEPATH . '/library/home_variations/home_video.php'); ?>
	
	
<?php } elseif(get_option('misfit_hometype') == "3" ) { ?>

	
	<?php include (TEMPLATEPATH . '/library/home_variations/home_full.php'); ?>
	
	
<?php } elseif(get_option('misfit_hometype') == "4" ) { ?>
	
	<?php include (TEMPLATEPATH . '/library/home_variations/home_fullstack.php'); ?>
	
	
<?php } elseif(get_option('misfit_hometype') == "5" ) { ?>

	
	<?php include (TEMPLATEPATH . '/library/home_variations/home_lowstack.php'); ?>
	

<?php } else { ?>


	<?php include (TEMPLATEPATH . '/library/home_variations/home_base.php'); ?>

<?php } ?>

