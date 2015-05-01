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
    'rewrite' => array( 'slug' => 'room' ),
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

  register_taxonomy('type', array('project'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'portfolio-type' ),
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
      'rewrite' => array('slug' => 'meetingsevents'),
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
      'rewrite' => array('slug' => 'locations'),
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
    'rewrite' => array( 'slug' => 'dining' ),
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-carrot',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','custom-fields','editor','author','thumbnail','revisions')
  );
  register_post_type('dining',$args);
}



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


?>