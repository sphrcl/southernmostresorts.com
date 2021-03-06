<?php
/**
 * Custom Post Types
 *
 * @package WordPress
 * @subpackage cebo
 * @since Dream Home 1.0
 */
 
///////////////////////////////////////////////////////////////////////////// Custom Post Type

add_action('init', 'project_items');

function project_items()
{
  $labels = array(
    'name' => _x('Rooms', 'post type general name'),
    'singular_name' => _x('Room', 'post type singular name'),
    'add_new' => _x('Add New', 'Room'),
    'add_new_item' => __('Add New Room'),
    'edit_item' => __('Edit Room'),
    'new_item' => __('New Room'),
    'view_item' => __('View Room'),
    'search_items' => __('Search Rooms'),
    'not_found' =>  __('No Room found'),
    'not_found_in_trash' => __('No Room found in Trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'accommodations' ),
    'capability_type' => 'post',
    'menu_icon' => get_bloginfo('template_url').'/options/images/icon_project.png',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','custom-fields','editor','author','excerpt','comments','thumbnail')
  );
  register_post_type('rooms',$args);
}

//create taxonomy for project type

create_type_taxonomies();

include(TEMPLATEPATH . '/options/secondary-panel.php'); 

function create_type_taxonomies()
{
  // Taxonomy for Location
  $labels = array(
    'name' => _x( 'Room Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Room Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Room Types' ),
    'all_items' => __( 'All Room Types' ),
    'parent_item' => __( 'Parent Room Type' ),
    'parent_item_colon' => __( 'Parent Room Type:' ),
    'edit_item' => __( 'Edit Room Type' ),
    'update_item' => __( 'Update Room Type' ),
    'add_new_item' => __( 'Add New Room Type' ),
    'new_item_name' => __( 'New Room Type Name' ),
  ); 	

  register_taxonomy('roomtype', array('rooms'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'room-type' ),
  ));

}



add_action( 'init', 'creates_post_types' );
function creates_post_types() {
  register_post_type( 'imagegalleries',
    array(
      'labels' => array(
        'name' => __( 'Galleries' ),
        'singular_name' => __( 'Galleries' )
      ),
      'public' => true,
      'rewrite' => array('slug' => 'gallery'),
      'menu_icon' => get_bloginfo('template_url').'/options/images/icon_team.png',
      'supports' => array('title','custom-fields','editor','category','author','thumbnail')
    )
  );
}



add_action( 'init', 'createl_post_types' );
function createl_post_types() {
  register_post_type( 'samenities',
    array(
      'labels' => array(
        'name' => __( 'Amenities' ),
        'singular_name' => __( 'Amenities' )
      ),
      'public' => true,
      'rewrite' => array('slug' => 'hotel-amenities'),
      'menu_icon' => get_bloginfo('template_url').'/options/images/icon_team.png',
      'supports' => array('title','custom-fields','editor','category','author','thumbnail')
    )
 );
}

add_action( 'init', 'creater_post_types' );
function creater_post_types() {
  register_post_type( 'sspecials',
    array(
      'labels' => array(
        'name' => __( 'Specials' ),
        'singular_name' => __( 'Specials' )
      ),
      'public' => true,
      'rewrite' => array('slug' => 'specials'),
      'menu_icon' => get_bloginfo('template_url').'/options/images/icon_team.png',
      'supports' => array('title','custom-fields','editor','category','author','thumbnail')
    )
 );
}


add_action( 'init', 'createdr_post_types' );
function createdr_post_types() {
  register_post_type( 'smeets',
    array(
      'labels' => array(
        'name' => __( 'Meetings' ),
        'singular_name' => __( 'Meetings' )
      ),
      'public' => true,
      'rewrite' => array('slug' => 'meetings'),
      'menu_icon' => get_bloginfo('template_url').'/options/images/icon_team.png',
      'supports' => array('title','custom-fields','editor','category','author','thumbnail')
    )
 );
}



add_action( 'init', 'createds_post_types' );
function createds_post_types() {
  register_post_type( 'locations',
    array(
      'labels' => array(
        'name' => __( 'Locations' ),
        'singular_name' => __( 'Locations' )
      ),
      'public' => true,
      'rewrite' => array('slug' => '/activities/key-west'),
      'menu_icon' => get_bloginfo('template_url').'/options/images/icon_team.png',
      'supports' => array('title','custom-fields','editor','category','author','thumbnail')
    )
  );
}



add_action('init', 'dining_items');

function dining_items()
{
  $labels = array(
    'name' => _x('Dining', 'post type general name'),
    'singular_name' => _x('Dining', 'post type singular name'),
    'add_new' => _x('Add New', 'Dining'),
    'add_new_item' => __('Add New Dining'),
    'edit_item' => __('Edit Dining'),
    'new_item' => __('New Dining'),
    'view_item' => __('View Dining'),
    'search_items' => __('Search Dining'),
    'not_found' =>  __('No Dining found'),
    'not_found_in_trash' => __('No Dining found in Trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'key-west-restaurants' ),
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-carrot',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','custom-fields','editor','author','thumbnail','revisions')
  );
  register_post_type('dining',$args);
}


function add_custom_rewrite_rule() {


    if( ($current_rules = get_option('rewrite_rules')) ) {


        foreach($current_rules as $key => $val) {
            if(strpos($key, 'dining') !== false) {
                add_rewrite_rule(str_ireplace('dining', 'key-west-restaurants', $key), $val, 'top');   
            } // end if
        } // end foreach

    } // end if/else

    // ...and we flush the rules
    flush_rewrite_rules();

} // end add_custom_rewrite_rule
add_action('init', 'add_custom_rewrite_rule');

add_action('init', 'activity_items');

function activity_items()
{
  $labels = array(
    'name' => _x('Activities', 'post type general name'),
    'singular_name' => _x('Activity', 'post type singular name'),
    'add_new' => _x('Add New', 'Activity'),
    'add_new_item' => __('Add New Activity'),
    'edit_item' => __('Edit Activity'),
    'new_item' => __('New Activity'),
    'view_item' => __('View Activity'),
    'search_items' => __('Search Activities'),
    'not_found' =>  __('No Activity found'),
    'not_found_in_trash' => __('No Activity found in Trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'activities' ),
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-smiley',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','custom-fields','editor','author','thumbnail','revisions')
  );
  register_post_type('activities',$args);
}



create_activities_taxonomies();
function create_activities_taxonomies() {

	$labels = array(
		'name' => _x( 'Activity Type', 'taxonomy general name' ),
		'singular_name' => _x( 'Activity Type', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Activity Types' ),
		'all_items' => __( 'All Activity Types' ),
		'parent_item' => __( 'Parent Activity Type' ),
		'parent_item_colon' => __( 'Parent Activity Type:' ),
		'edit_item' => __( 'Edit Activity Type' ),
		'update_item' => __( 'Update Activity Type' ),
		'add_new_item' => __( 'Add New Activity Type' ),
		'new_item_name' => __( 'New Activity Type Name' ),
	); 	

	register_taxonomy('activity_type', array('activities'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'activity-type' ),
	));

}


create_loctype_taxonomies();
function create_loctype_taxonomies()
{
  // Taxonomy for Location
  $labels = array(
    'name' => _x( 'Location Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Location Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Location Types' ),
    'all_items' => __( 'All Location Types' ),
    'parent_item' => __( 'Parent Location Type' ),
    'parent_item_colon' => __( 'Parent Location Type:' ),
    'edit_item' => __( 'Edit Location Type' ),
    'update_item' => __( 'Update Location Type' ),
    'add_new_item' => __( 'Add New Location Type' ),
    'new_item_name' => __( 'New Location Type Name' ),
  );  

  register_taxonomy('loctype', array('locations'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'location-type' ),
  ));

}

?>