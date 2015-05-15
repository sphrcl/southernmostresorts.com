<?php
/**
 * Repeatable Custom Fields in a Metabox
 * Author: Helen Hou-Sandi
 *
 * From a bespoke system, so currently not modular - will fix soon
 * Note that this particular metadata is saved as one multidimensional array (serialized)
 */

add_action('admin_init', 'rooms_add_meta_boxes', 1);
function rooms_add_meta_boxes() {
	add_meta_box( 'repeatable-fields', 'Available Packages', 'rooms_repeatable_meta_box_display', 'rooms', 'normal', 'high');
}

function rooms_repeatable_meta_box_display() {
	global $post;

	$repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);

	wp_nonce_field( 'rooms_repeatable_meta_box_nonce', 'rooms_repeatable_meta_box_nonce' );
	?>
	<script type="text/javascript">
		jQuery(document).ready(function( $ ){
			$( '#add-row' ).on('click', function() {
				var row = $( '.empty-row.screen-reader-text' ).clone(true);
				row.removeClass( 'empty-row screen-reader-text' );
				row.insertBefore( '#repeatable-fieldset-one tbody>tr:last' );
				return false;
			});
	  	
			$( '.remove-row' ).on('click', function() {
				$(this).parents('tr').remove();
				return false;
			});

			
		});
	</script>
  
<table id="repeatable-fieldset-one" width="100%">

	<thead>
		<tr>
			<th width="30%">Package</th>
			<th width="30%">Description</th>
			<th width="30%">URL</th>
			<th width="8%"></th>
		</tr>
	</thead>

	<tbody>

		<?php if ( $repeatable_fields ) : foreach ( $repeatable_fields as $field ) { ?>

			<tr>		
				<td>
					<input type="text" class="upload_image" name="namer[]" value="<?php if ($field['namer'] != '') echo esc_attr( $field['namer'] ); ?>" size="30" style="width: 100%; padding: 10px;" />
				</td>
				<td>
					<textarea type="text" class="widefat" name="description[]" ><?php if($field['description'] != '') echo esc_attr( $field['description'] ); ?></textarea>
				</td>
				<td>
					<input type="text" class="upload_image" name="url[]" value="<?php if ($field['url'] != '') echo esc_attr( $field['url'] ); ?>" size="30" style="width: 100%; padding: 10px;" />
				</td>
				<td><a class="button remove-row" href="#">Remove</a></td>
			</tr>

		<?php }	else : ?>

			<tr>

				<td>
					<input type="text" class="upload_image" name="namer[]" size="30" style="width: 100%; padding: 10px;" />
				</td>
			
				<td><textarea type="text" class="widefat" name="description[]" ></textarea></td>

				<td>
					<input type="text" class="upload_image" name="url[]" value="<?php if ($field['url'] != '') echo esc_attr( $field['url'] ); else echo 'http://'; ?>" size="30" style="width: 100%; padding: 10px;" />
				</td>
			
				<td><a class="button remove-row" href="#">Remove</a></td>
			</tr>

		<?php endif; ?>
	
	<!-- empty hidden one for jQuery -->
	<tr class="empty-row screen-reader-text">

		<td>
			<input type="text" class="upload_image" name="namer[]" size="30" style="width: 100%; padding: 10px;" />
		</td>

		<td><textarea type="text" class="widefat" name="description[]" ></textarea></td>

		<td>
			<input type="text" class="upload_image" name="url[]" size="30" style="width: 100%; padding: 10px;" />
		</td>
		  
		<td><a class="button remove-row" href="#">Remove</a></td>
	</tr>

	</tbody>
</table>
	
	<p><a id="add-row" class="button" href="#">Add another</a></p>

<?php }

add_action('save_post', 'rooms_repeatable_meta_box_save');
function rooms_repeatable_meta_box_save($post_id) {
	if ( ! isset( $_POST['rooms_repeatable_meta_box_nonce'] ) ||
	! wp_verify_nonce( $_POST['rooms_repeatable_meta_box_nonce'], 'rooms_repeatable_meta_box_nonce' ) )
		return;
	
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	
	if (!current_user_can('edit_post', $post_id))
		return;
	
	$old = get_post_meta($post_id, 'repeatable_fields', true);
	$new = array();
	
	$names = $_POST['description'];
	$urls = $_POST['url'];
	$namers = $_POST['namer'];
	
	$count = count( $names );
	
	for ( $i = 0; $i < $count; $i++ ) {
		if ( $names[$i] != '' ) :
			$new[$i]['description'] = stripslashes( strip_tags( $names[$i] ) );
			$new[$i]['namer'] = stripslashes( strip_tags( $namers[$i] ) );
			
			if ( in_array( $selects[$i] ) )
				$new[$i]['select'] = $selects[$i];
			else
				$new[$i]['select'] = '';
		
			if ( $urls[$i] == 'http://' )
				$new[$i]['url'] = '';
			else
				$new[$i]['url'] = stripslashes( $urls[$i] ); // and however you want to sanitize
		endif;
	}

	if ( !empty( $new ) && $new != $old )
		update_post_meta( $post_id, 'repeatable_fields', $new );
	elseif ( empty($new) && $old )
		delete_post_meta( $post_id, 'repeatable_fields', $old );
}
?>