<?php
/**

 Functions
 
 */
 
 
//.................. BASIC FUNCTIONS .................. //

/* language include.*/
$lang = TEMPLATEPATH . '/languages';
load_theme_textdomain('cebolang', $lang);

//.................. BASIC FUNCTIONS .................. //

/* Below is an include to default custom fields for the posts.*/
include(TEMPLATEPATH . '/library/simple_functions.php');


/* Include Super Furu Custom Options Panel*/
require_once(TEMPLATEPATH .  '/options/options_panel.php');


 /* ................. CUSTOM POST TYPES .................... */
/* Below is an include to a default custom post type.*/
include(TEMPLATEPATH . '/library/post_types.php');

 /* ................. SOME OPTIONS FOR POSTS .................... */
/* Below is an include to a few options for your posts.*/
include(TEMPLATEPATH . '/options/single-options.php');
include(TEMPLATEPATH . '/options/page-options.php');
include(TEMPLATEPATH . '/options/activities-options.php');
include(TEMPLATEPATH . '/options/dining-options.php');
include(TEMPLATEPATH . '/options/amenities-options.php');
include(TEMPLATEPATH . '/options/available-packages-repeatable-fields.php');



 /* ................. SOME OPTIONS FOR PROJECTS .................... */
/* Below is an include to a few options for your projects.*/
include(TEMPLATEPATH . '/options/project-options.php'); 


 /* ................. CUSTOM FIELDS .................... */
/* Below is an include to a few options for your projects.*/
include(TEMPLATEPATH . '/library/custom_fields.php'); 



/* .................. SHORTCODES ...…… */
/* Below is an include to default custom fields for the posts.*/
include(TEMPLATEPATH . '/library/shortcodes.php');


/* .................. SHORTCODES ...…… */
/* Below is an include to default custom fields for the posts.*/
include(TEMPLATEPATH . '/library/widgets.php');


 /* ................. ADDITIONAL INFO FOR SHORTCODES .................... */
/* Below is an include to a few options for your projects.*/

define( 'SS_BASE_DIR', TEMPLATEPATH . '/' );
define( 'SS_BASE_URL', get_template_directory_uri() . '/' );

function tt($image,$width,$height){
	return bloginfo('template_url') . "/library/thumb.php?src=$image&w=$width&h=$height";
}

function is_subpage() {
	global $post;
	if ( is_page() && $post->post_parent ) {
		return $post->post_parent;          
	} else { return false; }
}

if ( !function_exists('ss_framework_admin_scripts') ) {

	// Backend Scripts
	function ss_framework_admin_scripts( $hook ) {

		if( $hook == 'post.php' || $hook == 'post-new.php' ) {
			wp_register_script( 'tinymce_scripts', SS_BASE_URL . 'library/tinymce/js/scripts.js', array('jquery'), false, true );
			wp_enqueue_script('tinymce_scripts');
		}

	}
	add_action('admin_enqueue_scripts', 'ss_framework_admin_scripts');
	
}



// register widget
add_action('widgets_init', 'ctUp_ads_widget');
function ctUp_ads_widget() {
	register_widget( 'ctUp_ads' );
}

// add admin scripts
add_action('admin_enqueue_scripts', 'ctup_wdscript');
function ctup_wdscript() {
	wp_enqueue_media();
	wp_enqueue_script('ads_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);
}

add_action('wpseo_head', 'wpSEO_relNextPrev', 21);
function wpSEO_relNextPrev() {

	// HOMEPAGE: remove rel next
	if ( is_front_page() && is_home() ) {
		add_filter( 'wpseo_next_rel_link', '__return_false' );
	}

}

// widget class
class ctUp_ads extends WP_Widget {

	function ctUp_ads() {
		$widget_ops = array('classname' => 'ctUp-ads');
		$this->WP_Widget('ctUp-ads-widget', 'Image Upload', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args);

		// widget content
		echo $before_widget;
?>

	<a href="#">
		<img src="<?php echo esc_url($instance['image_uri']); ?>" />
	</a>

<?php
		echo $after_widget;

	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['text'] = strip_tags( $new_instance['text'] );
		$instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
		return $instance;
	}

	function form($instance) {
?>

	<p>
		<label for="<?php echo $this->get_field_id('text'); ?>">Text</label><br />
		<input type="text" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>" value="<?php echo $instance['text']; ?>" class="widefat" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('image_uri'); ?>">Image</label><br />

		<?php
			if ( $instance['image_uri'] != '' ) :
				echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
			endif;
		?>

		<input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>" style="margin-top:5px;">

		<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="Upload Image" style="margin-top:5px;" />
	</p>

<?php
	}
} ?>