<?php

/* ---------------------------------------------------------------------- */
/*	Columns
/* ---------------------------------------------------------------------- */

	/* -------------------------------------------------- */
	/*	One half
	/* -------------------------------------------------- */

	function scribe_one_half_sc( $atts, $content = null ) {

		return '<div class="column_one_half">' . do_shortcode( $content ) . '</div>';

	}
	add_shortcode('one_half', 'scribe_one_half_sc');

	/* -------------------------------------------------- */
	/*	One half last
	/* -------------------------------------------------- */

	function scribe_one_half_last_sc( $atts, $content = null ) {

		return '<div class="column_one_half final">' . do_shortcode( $content ) . '</div><div class="clear"></div>';

	}
	add_shortcode('one_half_last', 'scribe_one_half_last_sc');

	/* -------------------------------------------------- */
	/*	One third
	/* -------------------------------------------------- */

	function scribe_one_third_sc( $atts, $content = null ) {

		return '<div class="column_one_third">' . do_shortcode( $content ) . '</div>';

	}
	add_shortcode('one_third', 'scribe_one_third_sc');

	/* -------------------------------------------------- */
	/*	One third last
	/* -------------------------------------------------- */

	function scribe_one_third_last_sc( $atts, $content = null ) {

		return '<div class="column_one_third final">' . do_shortcode( $content ) . '</div><div class="clear"></div>';

	}
	add_shortcode('one_third_last', 'scribe_one_third_last_sc');

	/* -------------------------------------------------- */
	/*	One fourth
	/* -------------------------------------------------- */

	function scribe_one_fourth_sc( $atts, $content = null ) {

		return '<div class="column_one_fourth">' . do_shortcode( $content ) . '</div>';

	}
	add_shortcode('one_fourth', 'scribe_one_fourth_sc');

	/* -------------------------------------------------- */
	/*	One fourth last
	/* -------------------------------------------------- */

	function scribe_one_fourth_last_sc( $atts, $content = null ) {

		return '<div class="column_one_fourth final">' . do_shortcode( $content ) . '</div><div class="clear"></div>';

	}
	add_shortcode('one_fourth_last', 'scribe_one_fourth_last_sc');

	/* -------------------------------------------------- */
	/*	Two third
	/* -------------------------------------------------- */

	function scribe_two_third_sc( $atts, $content = null ) {

		return '<div class="column_two_thirds">' . do_shortcode( $content ) . '</div>';

	}
	add_shortcode('two_third', 'scribe_two_third_sc');

	/* -------------------------------------------------- */
	/*	Two third last
	/* -------------------------------------------------- */

	function scribe_two_third_last_sc( $atts, $content = null ) {

		return '<div class="column_two_thirds final">' . do_shortcode( $content ) . '</div><div class="clear"></div>';

	}
	add_shortcode('two_third_last', 'scribe_two_third_last_sc');

	/* -------------------------------------------------- */
	/*	Three fourth
	/* -------------------------------------------------- */

	function scribe_three_four_sc( $atts, $content = null ) {

		return '<div class="column_three_fourths">' . do_shortcode( $content ) . '</div>';

	}
	add_shortcode('three_fourth', 'scribe_three_four_sc');

	/* -------------------------------------------------- */
	/*	Three fourth last
	/* -------------------------------------------------- */

	function scribe_three_fourth_last_sc( $atts, $content = null ) {

		return '<div class="column_three_fourths final">' . do_shortcode( $content ) . '</div><div class="clear"></div>';

	}
	add_shortcode('three_fourth_last', 'scribe_three_fourth_last_sc');

	/* -------------------------------------------------- */
	/*	Button
	/* -------------------------------------------------- */

	function scribe_button_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'url'    => '',
			'target' => '_self',
			'size'   => '',
			'color'  => '',
			'arrow'  => ''
		), $atts ) );

		$output = '<a class="button '. esc_attr( $size ) . ' " href="' . esc_url( $url ) . '" target="' . esc_attr( $target ) . '">';

		if( $arrow && $arrow == 'left' )
			$output .= '<span class="arrow ' . esc_attr( $arrow ) . '">&laquo;</span> ';

		$output .= $content;

		if( $arrow && $arrow == 'right' )
			$output .= ' <span class="arrow">&raquo;</span>';

		$output .= '</a>';

		return $output;
	
	}
	add_shortcode('button', 'scribe_button_sc');

	/* -------------------------------------------------- */
	/*	Dropcap
	/* -------------------------------------------------- */

	function scribe_dropcap_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'style' => ''
		), $atts ) );

		return '<span class="dropcap ' . esc_attr( $style ) . '">' . $content . '</span>';

	}
	add_shortcode('dropcap', 'scribe_dropcap_sc');

	/* -------------------------------------------------- */
	/*	Info box
	/* -------------------------------------------------- */

	function scribe_infobox_sc( $atts, $content = null ) {

		return '<div class="infobox">' . do_shortcode( $content ) . '</div>';

	}
	add_shortcode('infobox', 'scribe_infobox_sc');

	/* -------------------------------------------------- */
	/*	List
	/* -------------------------------------------------- */

	function scribe_list_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'icon'  => '',
			'style' => ''
		), $atts ) );

		return '<div class="' . esc_attr( $icon ) . ' ' . esc_attr( $style ) . '">' . $content . '</div>';

	}
	add_shortcode('list', 'scribe_list_sc');

	/* -------------------------------------------------- */
	/*	Quote
	/* -------------------------------------------------- */

	function scribe_quote_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'author' => '',
			'type'   => ''
		), $atts ) );

		$output = '<blockquote class="' . esc_attr( $type ) . '">';

		$output .= '<p>' . $content . '</p>';

		if( $author )
			$output .= '<p class="blockquote_cite">' . esc_attr( $author ) . '</p>';

		$output .= '</blockquote>';

		return $output;

	}
	add_shortcode('quote', 'scribe_quote_sc');
	
	
	
	
	/* -------------------------------------------------- */
	/*	Full Width Banner Image
	/* -------------------------------------------------- */

	function scribe_banner_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'image' => '',
			'title'   => '',
		), $atts ) );
		
				
			
			
			
		$output = '</div></div><div class="fullbanner" style="background-image: url(' . esc_attr( $image ) . ');">';

		$output .= '<div class="fullbanner-overlay"><h1>' . esc_attr( $title )  . '</h1>';
		$output .= '<p>' . $content .'</p>';

		$output .= '</div></div><div class="continuecontainer"><div class="postcopy">';

		return $output;

	}
	add_shortcode('fullbanner', 'scribe_banner_sc');
	
	
	
	/* -------------------------------------------------- */
	/*	Video Embed
	/* -------------------------------------------------- */

	function scribe_video_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'youtube' => '',
			'vimeo'   => '',
		), $atts ) );
		
				
			
			
			
		$output = '</div><div class="videobox"><div class="video-container">';
		
		if( $youtube )
			$output .= '<iframe width="720" height="394" src="//www.youtube.com/embed/'. esc_attr( $youtube )  .'" allowfullscreen></iframe>';
			
		if($vimeo)	
			$output .= '<iframe src="//player.vimeo.com/video/'. esc_attr( $vimeo )  .'" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
		
		if($content)
			$output .= ''. $content  .'';

		$output .= '</div></div><div class="postcopy">';

		return $output;

	}
	add_shortcode('video', 'scribe_video_sc');

	/* -------------------------------------------------- */
	/*	Lightbox
	/* -------------------------------------------------- */

	function scribe_lightbox_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'type'      => 'single-image',
			'full'      => '',
			'title'     => '',
			'group'     => '',
			'zoom_icon' => 'plus'
		), $atts ) );

		return '<a class="' . esc_attr( $type ) . ' ' . esc_attr( $zoom_icon ) . '" href="' . esc_attr( $full ) . '" title="' . esc_attr( $title ) . '" rel="' . esc_attr( $group ) . '"> ' . $content . ' </a>';
	
	}
	add_shortcode('lightbox', 'scribe_lightbox_sc');

	/* -------------------------------------------------- */
	/*	Accordion Content
	/* -------------------------------------------------- */

	function scribe_accordion_content_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'title'      => '',
			'title_size' => 'span',
			'mode'       => ''
		), $atts ) );

		return '<ul id="toggle-view"><li><h3>' . esc_attr( $title ) . '</h3><div class="panel"><p>' . do_shortcode( $content ) . '<p></div></li></ul>';
	
	}
	add_shortcode('accordion_content', 'scribe_accordion_content_sc');

	/* -------------------------------------------------- */
	/*	Content Tabs
	/* -------------------------------------------------- */

	// Tabs container
	function scribe_content_tabgroup_sc( $atts, $content = null ) {

		if( !isset( $GLOBALS['tabs_groups'] ) )
			$GLOBALS['tabs_groups'] = 0;
			
		$GLOBALS['tabs_groups']++;

		$GLOBALS['tab_count'] = 0;

		$tabs_count = 1;

		do_shortcode( $content );

		if( is_array( $GLOBALS['tabs'] ) ) {
		

			foreach( $GLOBALS['tabs'] as $tab ) {

				$tabs[] = '<li><a href="#tab-' . $GLOBALS['tabs_groups'] . '-' . $tabs_count . '">' . $tab['title'] . '</a></li>';
				
				
				$panes[] = '<div id="tab-' . $GLOBALS['tabs_groups'] . '-' . $tabs_count++ . '" class="tab-content">' . do_shortcode( $tab['content'] ) . '</div>';

			}

			$return = "\n". '<div class="tabs-wrapper"><ul class="tabs">' . implode( "\n", $tabs ) . '</ul>' . "\n" . '<div style="margin-bottom: 10px" class="tabs-container">' . implode( "\n", $panes ) . '</div><div class="clear"></div></div>' . "\n";
		}
		
		$GLOBALS['tabs'] = null;

		return $return;

	}
	add_shortcode('tabgroup', 'scribe_content_tabgroup_sc');

	// Single tab
	function scribe_content_tab_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'title' => ''
		), $atts) );

		$i = $GLOBALS['tab_count'];

		$GLOBALS['tabs'][$i] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' => $content );

		$GLOBALS['tab_count']++;

	}
	add_shortcode('tab', 'scribe_content_tab_sc');



	/* -------------------------------------------------- */
	/*	Shortcode Fixer
	/* -------------------------------------------------- */

	function scribe_shortcode_fixer( $content ) {
		$scribe_shortcodes = join('|', array('one_half', 'one_half_last', 'one_third', 'one_third_last', 'one_fourth', 'one_fourth_last', 'two_third', 'two_third_last', 'three_fourth', 'three_fourth_last', 'error', 'success', 'info', 'notice', 'divider', 'slogan', 'button', 'dropcap', 'infobox', 'list', 'quote', 'lightbox', 'accordion_content', 'tabgroup', 'tab', 'pricing_table', 'pricing_column', 'check', 'video', 'audio', 'post_carousel', 'projects_carousel', 'portfolio', 'slider', 'team_member', 'fullwidth_map',' raw') );

		$new_content = preg_replace( "/(<p>)?\[($scribe_shortcodes)(\s[^\]]+)?\](<\/p>|<br \/>)?/", "[$2$3]", $content );

		$new_content = preg_replace( "/(<p>)?\[\/($scribe_shortcodes)](<\/p>|<br \/>)?/", "[/$2]", $new_content );

		return $new_content;
	}
	add_filter('the_content', 'scribe_shortcode_fixer');

	// Just to make sure that nothing seriously breaks in older versions of the theme (<v1.08)
	function scribe_raw_sc( $atts, $content = null ) {

		return do_shortcode( $content );

	}
	add_shortcode('raw', 'scribe_raw_sc');

/* ---------------------------------------------------------------------- */
/*	TinyMCE Buttons
/* ---------------------------------------------------------------------- */

function add_shortcodes_button() {

	if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') )
		return;

	if ( get_user_option('rich_editing') == 'true' ) {
		add_filter('mce_external_plugins', 'add_shortcodes_tinymce_plugin');
		add_filter('mce_buttons', 'register_shortcodes_button');
	}

}
add_action('init', 'add_shortcodes_button');

function register_shortcodes_button( $buttons ) {

	array_push( $buttons, '|', 'scribe_shortcodes' );

	return $buttons;

}

function add_shortcodes_tinymce_plugin( $plugin_array ) {

	$plugin_array['scribe_shortcodes'] = SS_BASE_URL . 'library/tinymce/tinymce.js';

	return $plugin_array;

}

function my_refresh_mce( $ver ) {

	$ver += 3;

	return $ver;

}
add_filter('tiny_mce_version', 'my_refresh_mce');