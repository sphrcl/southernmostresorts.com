<?php

?>
<form method="post" action="<?php echo admin_url('admin-post.php?action=abtf_settings_update'); ?>" class="clearfix">
	<?php wp_nonce_field('abovethefold'); ?>
	<div class="wrap abovethefold-wrapper">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder">
				<div id="post-body-content">
					<div class="postbox">
						<h3 class="hndle">
							<span><?php _e( 'Settings', 'abovethefold' ); ?></span>
						</h3>
						<div class="inside testcontent">

						<table class="form-table">
							<tr valign="top">
								<th scope="row">Admin Bar</th>
								<td>
                                    <label><input type="checkbox" name="abovethefold[adminbar]" value="1"<?php if (!isset($options['adminbar']) || intval($options['adminbar']) === 1) { print ' checked'; } ?>> Enabled</label>
                                    <p class="description">Show a <code>PageSpeed</code> menu in the top admin bar with links to website speed and security tests such as Google PageSpeed Insights.</p>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">Clear Page Caches</th>
								<td>
                                    <label><input type="checkbox" name="abovethefold[clear_pagecache]" value="1"<?php if (!isset($options['clear_pagecache']) || intval($options['clear_pagecache']) === 1) { print ' checked'; } ?>> Enabled</label>
                                    <p class="description">If enabled, the page related caches of <a href="https://github.com/optimalisatie/above-the-fold-optimization/tree/master/trunk/modules/plugins/" target="_blank">supported plugins</a> is cleared when updating the above the fold settings.</p>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">Debug Modus</th>
								<td>
                                    <label><input type="checkbox" name="abovethefold[debug]" value="1"<?php if (isset($options['debug']) && intval($options['debug']) === 1) { print ' checked'; } ?>> Enabled</label>
                                    <p class="description">Show debug info in the browser console for logged in admin-users.</p>
								</td>
							</tr>
						</table>
						<hr />
						<?php
							submit_button( __( 'Save' ), 'primary large', 'is_submit', false );
						?>&nbsp;
						<?php
							submit_button( __( 'Clear Page Caches' ), 'large', 'clear_pagecache', false );
						?>
						</div>
					</div>


	<!-- End of #post_form -->

				</div>
			</div> <!-- End of #post-body -->
		</div> <!-- End of #poststuff -->
	</div> <!-- End of .wrap .nginx-wrapper -->
</form>
