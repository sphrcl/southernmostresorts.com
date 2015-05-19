<?php
$categories = get_categories('hide_empty=0&orderby=name');
$taxers = get_terms('location', 'orderby=name&hide_empty=0');
$proptype = get_terms('propertytype', 'orderby=name&hide_empty=0');
$pages_array = get_pages('hide_empty=0');
$terms = array();
$site_pages = array();
$wp_cats = array();
$type = array();

foreach ($pages_array as $pagg) {
	$site_pages[$pagg->ID] = htmlspecialchars($pagg->post_title);
	$pages_ids[] = $pagg->ID;
}

foreach ($taxers as $taxers_list ) {
       $terms[] = $taxers_list->name;
}

foreach ($proptype as $typeall ) {
       $type[] = $typeall->name;
}

foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}

array_unshift($wp_cats, "Select a category"); 
array_unshift($terms, "Select a Location"); 
array_unshift($type, "Select a Type"); 

$prefix = 'misfit';

$numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9+');
$pagetypes = array('Default Full', 'Top Banner', 'Top Banner w/Side(R)', 'Top Banner w/Side(L)', 'Top Banner w/Full(L)', 'Top Banner w/Full(R)', 'Scrolling Gallery', 'Side Gallery(R)', 'Side Gallery(L)','Side Banner(L)', 'Side Banner(R)', 'Intro w/Side Banner(L)', 'Intro w/Side Banner(R)','Intro w/Side Gallery(L)', 'Intro w/Side Gallery(R)');

$meta_boxel = array(
	'id' => 'CUSTOM FIELDS',
	'title' => 'Additional Variations for Your Page Layout',
	// 'page' => determines where the custom field is supposed to show up.
	// here it is desplaying Testimonials, but other options are
	// page or post
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
 		
 		array( 
              "name" => "Subtitle",
	          "desc" => "",
	          "id" => $prefix."_subtitle",
	          "type" => "text",
	          "std" => ""
              )
 		,

 		array( 
              "name" => "External booking link",
	          "id" => $prefix."_external_booking",
	          "type" => "text",
	          "std" => ""
        	  )
 		,	
		
		array( 
              "name" => "Information Sheet",
	          "desc" => "upload your pdf",
	          "id" => $prefix."_infosheet",
	          "type" => "upload_file",
	          "std" => ""
        	  )
 		,
 		
 		array( 
              "name" => "Dimensions",
	          "desc" => "exampple 32'x20'",
	          "id" => $prefix."_dimensions",
	          "type" => "text",
	          "std" => ""
              )
 		,	
 		
 		array( 
              "name" => "Square Feet",
	          "desc" => "exampple 640",
	          "id" => $prefix."_sqft",
	          "type" => "text",
	          "std" => ""
              )
 		,	

 		array( 
              "name" => "Height",
	          "desc" => "exampple 8'x 14'",
	          "id" => $prefix."_height",
	          "type" => "text",
	          "std" => ""
              )
 		,	

 		array( 
              "name" => "Capacity Seating: Reception",
	          "desc" => "",
	          "id" => $prefix."_reception",
	          "type" => "text",
	          "std" => ""
              )
 		,	
		array( 
              "name" => "Capacity Seating: Banquet",
	          "desc" => "",
	          "id" => $prefix."_banquet",
	          "type" => "text",
	          "std" => ""
              )
 		,	
		array( 
              "name" => "Capacity Seating: Theature",
	          "desc" => "",
	          "id" => $prefix."_theatre",
	          "type" => "text",
	          "std" => ""
              )
       	)
);






	wp_enqueue_style('color-picker', get_template_directory_uri().'/options/colorpicker.css');
wp_enqueue_script('color-picker', get_template_directory_uri().'/options/js/colorpicker.js', array('jquery'));




/* ----------------------------------------------- DONT TOUCH BELOW UNLESS YOU KNOW WHAT YOU'RE DOING */
add_action('admin_menu', 'mythemes_add_boxel');
// Add meta boxel
function mythemes_add_boxel() {
	global $meta_boxel;
	foreach ( array( 'smeets' ) as $page )
	add_meta_box($meta_boxel['id'], $meta_boxel['title'], 'mythemes_show_boxel', $page, $meta_boxel['context'], 			$meta_boxel['priority']);
}
// Callback function to show fields in meta boxel
function mythemes_show_boxel() {
	global $meta_boxel, $post;
	// Use nonce for verification
	
	echo '

	<script type="text/javascript">			
			
jQuery(document).ready(function() {
 
    var formfield;
 
    /* user clicks button on custom field, runs below code that opens new window */
    jQuery(".upload_image_button").click(function() {
        formfield = jQuery(this).prev("input"); //The input field that will hold the uploaded file url
        tb_show("","media-upload.php?TB_iframe=true");
 
        return false;
 
    });

    window.old_tb_remove = window.tb_remove;
    window.tb_remove = function() {
        window.old_tb_remove(); // calls the tb_remove() of the Thickbox plugin
        formfield=null;
    };
 
 
    window.original_send_to_editor = window.send_to_editor;
    window.send_to_editor = function(html){
        if (formfield) {
            fileurl = jQuery("img",html).attr("src");
            jQuery(formfield).val(fileurl);
            tb_remove();
        } else {
            window.original_send_to_editor(html);
        }
    };

			
						
				 jQuery("#color_picker").children("div").css("backgroundColor", "#ff0000");    
				 jQuery("#color_picker").ColorPicker({
					color: "#ff0000",
					onShow: function (colpkr) {
						jQuery(colpkr).fadeIn(500);
						return false;
					},
					onHide: function (colpkr) {
						jQuery(colpkr).fadeOut(500);
						return false;
					},
					onChange: function (hsb, hex, rgb) {
						//jQuery(this).css("border","1px solid red");
						jQuery("#color_picker").children("div").css("backgroundColor", "#" + hex);
						jQuery("#color_picker").next("input").attr("value","#" + hex);
						
					}
				  });
			  
		 
		});
		
		</script>
		
		';
		
	echo '<input type="hidden" name="mythemes_meta_boxel_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	echo '<table class="form-table">';
	foreach ($meta_boxel['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		echo '<tr>',
				'<td class="boxeler" style="border-bottom: 1px solid #DFDFDF; box-shadow: 0 1px 0 #FFFFFF; width: 100%; padding-bottom: 20px;">';
		switch ($field['type']) {
			
			
			case 'text':
				echo '<div style="font-weight: bold; padding: 5px 0;" class="title">' ,$field['name'], '</div><div style="font-style: italic; font-size: 12px; color: #a2a2a2;" class="descriptive">', $field['desc'], '</div>', '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" />';
				break;
			
			
			case 'color':
				echo '<div style="font-weight: bold;" class="title">' ,$field['name'], '</div><div style="font-style: italic; font-size: 12px; color: #a2a2a2;"class="descriptive">', $field['desc'], '</div>', '<div id="color_picker" class="colorSelector"></div></div></div><input class="of-color" name="'. $field['id'] .'" id="'. $field['id'] .'" type="text" value="', $meta ? $meta : $field['std'], '" />';
				break;
							
				
			case 'upload':
				echo '<div style="font-weight: bold;" class="title">' ,$field['name'], '</div><div style="font-style: italic; font-size: 12px; color: #a2a2a2;"class="descriptive">', $field['desc'], '</div>', '<input type="text" class="upload_image" name="', $field['id'], '" id="', $field['id'], '"  value="', $meta ? $meta : $field['std'], '" size="30" style="width: 100%; padding: 10px;" /><input class="upload_image_button button button-primary button-large" style="margin-top: 10px;" type="button" value="Upload Image" />';
				break;

			case 'upload_file':
				echo '<div style="font-weight: bold;" class="title">' ,$field['name'], '</div><div style="font-style: italic; font-size: 12px; color: #a2a2a2;"class="descriptive">', $field['desc'], '</div>', '<input type="text" class="upload_image" name="', $field['id'], '" id="', $field['id'], '"  value="', $meta ? $meta : $field['std'], '" size="30" style="width: 100%; padding: 10px;" /><input class="upload_image_button button button-primary button-large" style="margin-top: 10px;" type="button" value="Upload File" />';
				break;
			
			case 'textarea':
				echo '<div class="title">' ,$field['name'], '</div><div class="descriptive">', $field['desc'], '</div>', '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:47%">', $meta ? $meta : $field['std'], '</textarea>';
				break;
			case 'select':
				echo '<div class="title">' ,$field['name'], '</div><div class="descriptive">', $field['desc'], '</div>', '<select name="', $field['id'], '" id="', $field['id'], '">';
				
				foreach ($field['options'] as $option) {
					echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
					
				}
				echo '</select>';
				break;
			case 'radio':
				echo '<div style="font-weight: bold;" class="title">' ,$field['name'], '</div><div style="font-style: italic; font-size: 12px; color: #a2a2a2; margin-bottom: 6px;" class="descriptive">', $field['desc'], '</div>';
				$i = 1;
				$url = get_bloginfo('template_url');
				echo '<div class="imagecontainer">';
				foreach ($field['options'] as $option) {
					echo '
					<label class="fb" for="fb1">
					<input type="radio" name="', $field['id'], '" class="', $field['id'], '-',$i,'" value="', $option, '"', $meta == $option ? ' checked="checked"' : '', ' />
					<img src="'. $url . '/options/images/' .$i . '.png">
					<br>
					', $option,'
  					<br>
  					<span>
  						<h3>Helpful Info</h3>
  						<p>If you are using a gallery layout, please use the "Add Media" button, create a gallery and insert it anywhere into the page/post.<br>If you are using a banner (left or top), upload the banner image in the field below or paste in a video ID.<br>**all thumbnails are from the featured image**</p>
  					</span></label>';
					$i++;
				}
				echo '<div class="clear"></div></div>';
				break;
			case 'checkbox':
				echo '<div style="font-weight: bold;" class="title">' ,$field['name'], '</div><div style="font-style: italic; font-size: 11px; color: #a2a2a2;" class="descriptive">', $field['desc'], '</div>', '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
				break;
		}
		echo 	'<td>',
			'</tr>';
	}
	
	echo '</table>';
}

add_action('save_post', 'mythemes_save_data');
// Save data from meta boxel
function mythemes_save_data($post_id) {
	global $meta_boxel;	
	// verify nonce
	if (!wp_verify_nonce($_POST['mythemes_meta_boxel_nonce'], basename(__FILE__))) {
		return $post_id;
	}
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {		return $post_id;
	}
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	foreach ($meta_boxel['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];		
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}
?>