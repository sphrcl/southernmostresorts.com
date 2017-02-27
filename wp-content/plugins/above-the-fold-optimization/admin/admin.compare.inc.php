<form method="post" action="<?php echo admin_url('admin-post.php?action=abovethefold_compare'); ?>" class="clearfix">
	<?php wp_nonce_field('abovethefold'); ?>
	<div class="wrap abovethefold-wrapper">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder">
				<div id="post-body-content">
					<div class="postbox">
						<h3 class="hndle">
							<span><?php _e( 'Above The Fold Quality Test', 'abovethefold' ); ?></span>
						</h3>
						<div class="inside testcontent">

						<p>This test enables to compare the critical CSS display with the full CSS display to test for differences that could cause a <a href="https://en.wikipedia.org/wiki/Flash_of_unstyled_content" target="_blank">Flash of unstyled content (FOUC)</a>. Good quality critical CSS will provide a near perfect match between the critical CSS and full CSS display. </p>
							<p>You can quickly open the critical CSS quality test for any url by adding the query string <code><strong>?compare-abtf=<?php print md5(SECURE_AUTH_KEY . AUTH_KEY); ?></strong></code>.</p>
								<div>
								<select id="comparepages" class="wp-pageselect"><option value=""></option><option value="<?php print home_url(); ?>">Home Page (index)</option></select>

								<button type="button" id="comparepages_split" rel="<?php print md5(SECURE_AUTH_KEY . AUTH_KEY); ?>" class="button button-large">Split View (Compare)</button>
								<button type="button" id="comparepages_full" rel="<?php print md5(SECURE_AUTH_KEY . AUTH_KEY); ?>" class="button button-large">Full View (Critical CSS only)</button>
							</div>

							<p>To test the above the fold quality in a responsive test, you can use Chrome or Firefox Dev Tools or alternatively an online responsive test (<a href="https://encrypted.google.com/search?q=responsive+test&amp;hl=<?php print $lgcode;?>" target="_blank">see Google</a>).</p>

							<h1>What to test?</h1>
							<p>The critical CSS display of the above the fold content should match the full CSS display of a page.</p>

							<p>The following example shows how subtle problems in the critical CSS can have an impact on the above the fold display.</p>

							<table class="abtfexample">
								<thead>
									<tr>
										<td class="err"><span>&#x2717;</span> Invalid</td>
										<td class="ok"><span>&#x2713;</span> Valid</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><img src="<?php print WPABTF_URI; ?>admin/abtf-example-invalid.png" width="343" height="572" border="0" alt="Invalid Critical CSS"></td>
										<td><img src="<?php print WPABTF_URI; ?>admin/abtf-example-valid.png" width="343" height="572" border="0" alt="Valid Critical CSS"></td>
									</tr>
								</tbody>
							</table>

							<p>For more information about the above the fold display, read the <a href="https://developers.google.com/speed/docs/insights/PrioritizeVisibleContent?hl=<?php print $lgcode;?>" target="_blank">documentation by Google</a> or see <a href="https://addyosmani.com/blog/detecting-critical-above-the-fold-css-with-paul-kinlan-video/#utm_source=wordpress&amp;utm_medium=plugin&amp;utm_term=optimization&amp;utm_campaign=PageSpeed.pro%3A%20Above%20The%20Fold%20Optimization" target="_blank">this blog</a> (with video) by two Google engineers.</p>


						</div>
					</div>

	<!-- End of #post_form -->

				</div>
			</div> <!-- End of #post-body -->
		</div> <!-- End of #poststuff -->
	</div> <!-- End of .wrap .nginx-wrapper -->
</form>
