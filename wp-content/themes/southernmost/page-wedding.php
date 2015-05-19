<?php 

	/* Template Name: Wedding2 */

	get_header(); 


?>






<div id="topbanner">



<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

	<div class="flexslider meetingslider">
	<h1 class="roomtits"><?php the_title(); ?></h1>
	<a class="button roomtitties" href="<?php echo get_post_meta($post->ID,'misfit_reservation',true); ?>">See Availability</a>
	  <ul class="slides">
	  
	  
		 <?php $galleryImages = get_post_gallery_imagess(); 
			           $imagesCount = count($galleryImages); ?>
			           
        		<?php if ($imagesCount > 0) : ?>
              	<?php for ($i = 0; $i < $imagesCount; $i++): ?>
                <?php if (!empty($galleryImages[$i])) :?>
                
				
				
				<li style="background-image: url(<?php echo $galleryImages[$i]['full'][0];?>);"></li>
				
				
				
				
				<?php endif; ?>
    			<?php endfor; ?>
				<?php endif; ?>		<!-- items mirrored twice, total of 12 -->
	  </ul>
	</div>
	<div class="flexslider meetingcarousel">
	  <ul class="slides">
		 <?php $galleryImages = get_post_gallery_imagess(); 
			           $imagesCount = count($galleryImages); ?>
			           
        		<?php if ($imagesCount > 0) : ?>
              	<?php for ($i = 0; $i < $imagesCount; $i++): ?>
                <?php if (!empty($galleryImages[$i])) :?>
                
				
				
				<li style="background-image: url(<?php echo $galleryImages[$i]['full'][0];?>);"></li>
				
				
				
				
				<?php endif; ?>
    			<?php endfor; ?>
				<?php endif; ?>
	  </ul>
	</div>
	<?php endwhile; endif; wp_reset_query(); ?>	
</div>
<div class="wrapper">
	
	<div id="pagecontent" style="padding: 40px 0 0 0;">
		
		
		
		<div class="container">

			<div class="contenttitle">
				
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<h1 class="title"><?php the_title(); ?></h1>
				<h2 class="subtitle"><?php echo get_post_meta($post->ID,'misfit_shortname',true); ?></h2>
				<?php endwhile; endif; wp_reset_query(); ?>	

			</div>

			<div class="socialmedia">
				<ul>
					<li><a href="<?php echo get_option('misfit_facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
					<li><a href="<?php echo get_option('misfit_twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
					<li><a href="<?php echo get_option('misfit_youtube'); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
					<li><a href="<?php echo get_option('misfit_instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
					<li><a href="http://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
				</ul>
			</div>

			<div class="content">
				
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<?php
			        $gallery = get_post_gallery();
			
			        $content = strip_shortcode_gallery( get_the_content() );                                        
			        $content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $content ) ); 
			        echo $content;
			
			        ?>
			     <?php endwhile; endif; wp_reset_query(); ?>	   
			        
			        
			       <ul class="post-list" style="padding: 30px 0 0 0;">
				
				
				<?php $thisid = $post->ID; ?>
				
				
				<?php 
					$query_activities = new wp_query(array(
						'post_parent' => $thisid, 'post_type' => 'page'
					)); 
					if($query_activities->have_posts()) : while($query_activities->have_posts()) : $query_activities->the_post();
					$imgsrcs = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 
			    ?>
				           
	        		<li>
	        			
	        			<div class="post-image left" style="background-image: url('<?php echo tt($imgsrcs[0],550,330); ?>');" ><a href="<?php the_permalink(); ?>" class="dropanchor"></a></div>
	        			<div class="post-content right">
	        				<h3><?php the_title(); ?></h3>
	        				<p><?php echo excerpt(70); ?></p>
	        				
	        				

	        			</div>

	        		</li>
					
				<?php endwhile; endif; wp_reset_query(); ?>	

			</ul>




			</div>

		</div>
		

	</div>


</div> <!-- #wrapper -->






<?php get_footer(); ?>