<?php

register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'cebo' ),
) );




register_nav_menus( array(
	'secondary' => __( 'Side Navigation', 'cebo' ),
) );


// Sidebar Activation



if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Footer Column 1',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>',
));


if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Footer Column 2',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>',
));

if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Footer Column 3',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>',
));


/* this is for the image grabber 

*/
// Pull an image/post ID from the media gallery
function sp_get_image_id($num = 0) {
	global $post;
	$children = get_children(array(
		'post_parent' => $post->ID,
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'orderby' => 'menu_order',
		'order' => 'ASC'
	));

	$count = 0;
    foreach ((array)$children as $key => $value) {
        $images[$count] = $value;
        $count++;
    }
	if(isset($images[$num]))
		return $images[$num]->ID;
	else
		return false;
}

// Pull an image URL from the media gallery
function sp_get_image($num = 0) {
	global $post;
	$children = get_children(array(
		'post_parent' => $post->ID,
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'orderby' => 'menu_order',
		'order' => 'ASC'
	));

	$count = 0;
    foreach ((array)$children as $key => $value) {
        $images[$count] = $value;
        $count++;
    }
	if(isset($images[$num]))
		return wp_get_attachment_url($images[$num]->ID);
	else
		return false;
}
/* Determine how many words are in an excerpt and what the (Read More) link looks like */

function new_excerpt_length($length) {
	return 70;
}
add_filter('excerpt_length', 'new_excerpt_length');

function new_excerpt_more($post) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

/* ==================================== */

if ( function_exists( 'add_theme_support' ) ) { // WP 2.9 Post Thumbnail Feature
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 115, 115, true ); // Normal Post Thumbnail
    add_image_size( 'featured-properties-thumbnail', 290, 200, true ); // Home Page Featured Property Thumbnail
    add_image_size( 'listing-photo-thumbnail', 110, 80, true ); // Property Listing Thumbnail
    add_image_size( 'archive-photo-thumbnail', 225, 150, true ); // Archive Listing Thumbnail
}

function get_page_with_template($template) {
	$pages = get_pages();
	foreach($pages as $p) {
		$meta = get_post_custom_values("_wp_page_template",$p->ID);
		if($meta[0] == $template.".php") {
			return $p->ID;
		}
	}
	return false;
}

function url_get_contents ($Url) {
    if (!function_exists('curl_init')){ 
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function feedFilter($query) {
	if ($query->is_feed) {
		add_filter('rss2_item', 'feedContentFilter');
		}
	return $query;
}
add_filter('pre_get_posts','feedFilter');
 
function feedContentFilter($item) {

	global $post;

	$args = array(
		'order'          => 'ASC',
		'post_type'      => 'attachment',
		'post_parent'    => $post->ID,
		'post_mime_type' => 'image',
		'post_status'    => null,
		'numberposts'    => 1,
	);
	$attachments = get_posts($args);
	if ($attachments) {
		foreach ($attachments as $attachment) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
			$mime = get_post_mime_type($attachment->ID);
		}
	}
	$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
	if ($imgsrc) {
		echo '<enclosure url="'.$imgsrc [0].'" length="" type="'.$mime.'"/>';
	} 
	return $item;
}


add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}


add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="gohead"';
}
function posts_link_attributes_2() {
    return 'class="gohead"';
}

function custom_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 18; //largest tag
	$args['smallest'] = 10; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'custom_tag_cloud_widget' );



if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "/wp-content/themes/southernmost/js/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}



// Removed shortcodes from the content
function  strip_shortcode_gallery( $content ) {
    preg_match_all( '/'. get_shortcode_regex() .'/s', $content, $matches, PREG_SET_ORDER );
    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if ($pos !== false)
                    return substr_replace( $content, '', $pos, strlen($shortcode[0]) );
            }
        }
    }
    return $content;
};

// Get attached images & spits out a list of them.
function nerdy_get_images($size = 'thumbnail', $limit = '0', $offset = '0') {
    global $post;
    $images = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
    if ($images) {
        $num_of_images = count($images);
        if ($offset > 0) : $start = $offset--; else : $start = 0; endif;
        if ($limit > 0) : $stop = $limit+$start; else : $stop = $num_of_images; endif;
        $i = 0;
        foreach ($images as $image) {
            if ($start <= $i and $i < $stop) {
            $img_title = $image->post_title;   // title.
            $img_description = $image->post_content; // description.
            $img_caption = $image->post_excerpt; // caption.
            $img_url = wp_get_attachment_url($image->ID); // url of the full size image.
            $preview_array = image_downsize( $image->ID, $size );
            $img_preview = $preview_array[0]; // thumbnail or medium image to use for preview.
            ?>
            <li>
                <a href="<?php echo $img_url; ?>"><img src="<?php echo $img_preview; ?>" alt="<?php echo $img_caption; ?>" title="<?php echo $img_title; ?>"></a>
            </li>
            <?php
            }
            $i++;
        }
    }
}

function get_post_gallery_imagess() {
    $attachment_ids = array();
    $pattern = get_shortcode_regex();
    $images = array();
    if (preg_match_all( '/'. $pattern .'/s', get_the_content(), $matches ) ) {
        //finds the "gallery" shortcode and puts the image ids in an associative array at $matches[3]
        $count = count($matches[3]);      //in case there is more than one gallery in the post.
        for ($i = 0; $i < $count; $i++){
            $atts = shortcode_parse_atts( $matches[3][$i] );
            if ( isset( $atts['ids'] ) ){
                $attachment_ids = explode( ',', $atts['ids'] );
                $attachementsCount = count($attachment_ids);
                if ($attachementsCount > 0){
                    for ($j = 0; $j < $attachementsCount ; $j++) { 
                        $image = array();
                        $attachmentId = intval($attachment_ids[$j]);
                        $image['id'] = $attachmentId;
                        $image['full'] = wp_get_attachment_image_src($attachmentId, 'full');
                        $image['medium'] = wp_get_attachment_image_src($attachmentId, 'medium');
                        $image['thumbnail'] = wp_get_attachment_image_src($attachmentId, 'thumbnail');
                        $image['captioner'] = wp_get_attachment_metadata($attachmentId, true);
                        array_push($images, $image);
                    }
                }
            }
        }
    }
    return $images;
}

add_filter('show_admin_bar', '__return_false');

function wp_get_attachment( $attachment_id ) {

$attachment = get_post( $attachment_id );
return array(
    'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
    'caption' => $attachment->post_excerpt,
    'description' => $attachment->post_content,
    'href' => get_permalink( $attachment->ID ),
    'src' => $attachment->guid,
    'title' => $attachment->post_title
);
}




?>