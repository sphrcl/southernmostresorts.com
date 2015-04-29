<?php
/**
		Attachment
 */

 get_header(); ?>



<div class="curtains">

 	
	 
	 <section id="intro" class="pagers">
        
       <div class="pagecontent<?php if(get_post_type() == "page") { ?> interiorpage<?php } ?>">
       
       		<div class="contentcontainer">
       		
       		
       			<div class="postcopy" style="min-height: 500px;">
	       		
	       		
	       								
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
  
						<?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "large"); ?>
      						<p class="attachment"><a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment"><img src="<?php echo $att_image[0];?>" style="width: 100%;" class="attachment-medium" alt="<?php $post->post_excerpt; ?>" /></a>
     						 </p>
						<?php else : ?>  
      							<a href="<?php echo wp_get_attachment_url($post->ID) ?>" title="<?php echo wp_specialchars( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo basename($post->guid) ?></a>  
						<?php endif; ?>  
      						
      						  
      					<?php if ( !empty($post->post_excerpt) ) the_excerpt() ?>
      					
						
						<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'cebolang' ) . '&after=</div>') ?>
							
														
						<?php endwhile; endif; wp_reset_query(); ?>	
			
					
	       						
       			</div>				
       					
       		</div>
       		
       		<div class="clear"></div>
       
       </div>	
        
	       <div class="leftwall"></div> 
    	   <div class="rightwall"></div> 
	        
	    </section>


 
	</div><!-- end curtains -->



    					
<?php get_footer(); ?>