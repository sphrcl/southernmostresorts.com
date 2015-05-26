<div id="maparea" style="width: 100%; height: 500px;"></div>

<ul id="toggles" class="page-nav">

	<?php 

		$this_post = $post->ID;
		$query_gallery_single = new wp_query(array(
			'post_type' => 'page',
			'post_parent' => $this_post,
			'posts_per_page'=> 6,
		)); 
		$count = 1;

		if($query_gallery_single->have_posts()) : while($query_gallery_single->have_posts()) : $query_gallery_single->the_post(); 

	?>

		<li class="<?php echo $post->post_name; ?>" <?php if( $count == 1 ) { echo ' class="current"'; } ?>><a class="linkerd active" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	
	
	<?php $count++; endwhile; endif; wp_reset_query(); ?>	
			
</ul>

<ul id="map-side-bar">

	<li style="display: none;" class="map-location" data-icon="<?php bloginfo ('template_url'); ?>/images/henry1.png" data-jmapping="{id: 2, point: {lat: 24.548293, lng: -81.796583}, category: 'amen', bounded: true, icon: '<?php bloginfo ('template_url'); ?>/images/map-marker.png'}">
		<a href="#" class="map-link us" rel="us">US</a>
		<div class="info-box">
			<h3>Good Ol USA</h3>
		</div>
	</li>
						      
	<?php 

		$counter = 500; query_posts(array(
			'post_type' => 'activities',
			'posts_per_page' => -1,
		)); 

		if(have_posts()) : while(have_posts()) : the_post(); $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); 

	?>

		<?php if(get_post_meta($post->ID, 'misfit_lat', true)) { ?>
	  
			<li class="map-location stater-<?php $shortkly =  get_post_meta($post->ID, 'misfit_statename', true); $strinklg = str_replace(' ', '', $shortkly); $strinklg = preg_replace('/[^A-Za-z0-9\-]/', '', $shortkly); echo $strinklg; ?>" data-jmapping="{id: <?php echo $counter; ?>, point: {lat: <?php echo get_post_meta($post->ID, 'misfit_lat', true); ?>, lng: <?php echo get_post_meta($post->ID, 'misfit_long', true); ?>}, category: 'place', bounded: false, icon: '<?php bloginfo ('template_url'); ?>/images/map-marker2.png'}">
		   
		    	<a href="#" class="map-link <?php $shorty =  get_post_meta($post->ID, 'misfit_neighborhood', true); $string = str_replace(' ', '', $shorty); echo $string; ?>" rel="<?php $shorty =  get_post_meta($post->ID, 'misfit_neighborhood', true); $string = str_replace(' ', '', $shorty); echo $string; ?>"><?php echo get_post_meta($post->ID, 'misfit_neighborhood', true); ?></a>

		        <div class="info-box">
		        	<span class="specialid">infocontainer</span>        	
			        <h3><?php the_title(); ?></h3>	        
		       	</div>
	       	
			</li>

	  <?php } ?>
  
  <?php $counter++; endwhile; endif; wp_reset_query(); ?>
  
  
</ul>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.5&sensor=false"></script>
<script src="<?php bloginfo ('template_url'); ?>/js/markermanager.js" type="text/javascript"></script>
<script src="<?php bloginfo ('template_url'); ?>/js/StyledMarker.js" type="text/javascript"></script>
<script src="<?php bloginfo ('template_url'); ?>/js/jquery.metadata.js" type="text/javascript"></script>
<script src="<?php bloginfo ('template_url'); ?>/js/jquery.jmapping.js" type="text/javascript"></script>

<script type="text/javascript">
	
	$(function() {

		var mapOptions = {
		    zoom: 15,
		    minZoom: 12,
		    scrollwheel: false,
			draggable: true,
		    center: new google.maps.LatLng(<?php echo get_option('misfit_mapcenter'); ?>),
		    mapTypeId: google.maps.MapTypeId.ROADMAP,
		    disableDefaultUI: false,
		    scaleControl: true
		};

		$('#maparea').jMapping({
			// force_zoom_level: 13,
			default_zoom_level: 15,
		    category_icon_options: function(category){
		      if (category.charAt(0).match(/[a-c]/i)){
		        return new google.maps.MarkerImage($(this).attr('data-icon'));
		      } else if (category.charAt(0).match(/[d-z]/i)){
		        return new google.maps.MarkerImage($(this).attr('data-icon'));
		      } else {
		        return new google.maps.MarkerImage($(this).attr('data-icon'));
		      }
		    },
		    map_config: mapOptions
		});

	});

</script>