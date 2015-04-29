<?php
/**
 * The template for displaying Comments.
 *
 */
?>


<div class="boxer">



	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'cebolang' ); ?></p>
	
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>
	
	
	

	<?php // You can start editing here -- including this comment! ?>
	
	
	
		
				
				
				<?php if ( have_comments() ) { ?>
					
					<h4>
						<?php
							printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s responses on &ldquo;%2$s&rdquo;', get_comments_number(), 'cebolang' ),
								number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
						?>
					</h4>
					
					<? } else { ?>
					
					<h4><?php _e('Leave a Reply', 'cebolang'); ?></h4>
					
					<? } ?>
		
					<div class="postcomments">
					
					
					
					<?php $args = array(
						'id_form' => 'sleek',
						'id_submit' => 'submit',
						'title_reply' => __( '' ),
						'title_reply_to' => __( '' ),
						'cancel_reply_link' => __( 'Cancel Reply' ),
						'label_submit' => __( 'Leave your thoughts' ),
						
						'comment_field' => '<div class="messenger"><i class="fa fa-quote-right"></i><textarea id="commenters" class="lonely" name="comment" cols="45" rows="8" aria-required="true"></textarea></div><div class="clear"></div>',
						
						'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
						
						'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
						'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
						'comment_notes_after' => '',
						
						'fields' => apply_filters( 'comment_form_default_fields', array(
							'author' => '<div class="letterbox"><input id="author" class="lilly" placeholder="Your Name*" name="author" type="text" value="' . esc_attr(  $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />',
							
							'email' => '<input id="emaild" name="email" type="text" class="lilly" placeholder="Your Email*" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />',
							'url' => '<input id="url" name="url" type="text" class="lilly" placeholder="Your Website (optional)" value="' . esc_attr(  $commenter['comment_author_website'] ) . '"/></div>' ) ) );
						
						comment_form($args); ?>
					
					
					
					
					<div class="usercomments">
					
					
						<ul class="commentlist">
							<?php
								
								wp_list_comments(array('avatar_size' => 80));
							?>
						</ul>

								
					
					<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		if ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'cebolang' ); ?></p>
	<?php endif; ?>
	
					</div><!-- end .usercomments -->
					
						<div class="clear"></div>
					
					
				
				</div>
				
					<div class="clear"></div>
		
			</div>		
			
				<div class="clear"></div>
						
		</div>
		
		
		
		
		<div class="clear"></div>