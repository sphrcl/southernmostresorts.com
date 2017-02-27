<?php
	if ( isset( $_GET['limited-offer'] ) ) {
		$welcome_checked = empty( $_GET['limited-offer'] ) ? 0 : 1;
		update_user_meta( get_current_user_id(), 'abtf_show_offer', $welcome_checked );
	} else {
		$welcome_checked = get_user_meta( get_current_user_id(), 'abtf_show_offer', true );
	}

	if (!$welcome_checked) {
?>
<div id="welcome-panel" class="welcome-panel">
	<a class="welcome-panel-close" href="<?php echo add_query_arg( array( 'page' => 'abovethefold', 'tab' => 'settings', 'limited-offer' => 1 ), admin_url( 'admin.php' ) ); ?>" aria-label="Dismiss the welcome panel">Dismiss</a>
	<div class="welcome-panel-content">
		<h2>Special Offer: Early Access To <strong>New Optimization Plugin</strong></h2>
		<p class="about-description" style="margin-top:4px;">Easy to use (plug and play), automated Google PageSpeed <span class="g100">100</span> score and lots of new professional optimization features.</p>
		<div class="welcome-panel-column-container">
			<div class="welcome-panel-column" style="margin-bottom:1em;">
					<a href="https://pagespeed.pro/innovation/advanced-wordpress-optimization/" target="_blank" class="button button-primary button-hero load-customize hide-if-no-customize">Read More</a>
			</div>
		</div>
	</div>
</div>
<?php
	}
?>