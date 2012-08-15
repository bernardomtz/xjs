<?php

/*-----------------------------------------------------------------------------------*/

/*	DO NOT DELETE THESE LINES OR HELL SHALL SWALLOW YOU ALIVE

/*-----------------------------------------------------------------------------------*/
	
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'framework') ?></p>
	<?php
		return;
	}

/*-----------------------------------------------------------------------------------*/

/*	COMMENTS & PINGS

/*-----------------------------------------------------------------------------------*/

		if ( have_comments() ) : // if there are comments ?>
        
        <?php if ( ! empty($comments_by_type['comment']) ) : // if there are normal comments ?>
        
        	<div class="comments-title-wrap">

				<h4 class="sub-header"><span><?php comments_number(__('No Comments', 'framework'), __('One Comment', 'framework'), __('% Comments', 'framework')); ?></span></h4>
				</div>
		
			<ol class="commentlist">
        
        		<?php wp_list_comments('type=comment&avatar_size=40&callback=iii_comment'); ?>
        
        	</ol>

        <?php endif; ?>

        <?php if ( ! empty($comments_by_type['pings']) ) : // if there are pings ?>
		
			<h3 id="pings"><?php _e('Trackbacks for this post', 'framework') ?></h3>
		
				<ol class="pinglist">
        
        			<?php wp_list_comments('type=pings&callback=iii_list_pings'); ?>
        
        		</ol>

        <?php endif; ?>
		
		<div class="navigation">
			
			<div class="alignleft"><?php previous_comments_link(); ?></div>
			
			<div class="alignright"><?php next_comments_link(); ?></div>
		
		</div>
		
		<?php
		
/*-----------------------------------------------------------------------------------*/

/*	NO COMMENTS & CLOSED COMMENTS

/*-----------------------------------------------------------------------------------*/
		
		if ('closed' == $post->comment_status ) : // if the post has comments but comments are now closed ?>
		
		<p class="nocomments"><?php _e('Comments are now closed for this article.', 'framework') ?></p>
		
		<?php endif; ?>

 		<?php else :  ?>
		
        <?php if ('open' == $post->comment_status) : // if comments are open but no comments so far ?>

        <?php else : // if comments are closed ?>
		
		<?php if (is_single()) { ?><p class="nocomments"><?php _e('Comments are closed.', 'framework') ?></p><?php } ?>

        <?php endif; ?>
        
<?php endif;

/*-----------------------------------------------------------------------------------*/

/*	COMMENT FORM

/*-----------------------------------------------------------------------------------*/

	if ( comments_open() ) : ?>
	
	<div class="clear"></div>

	<div id="respond">
	
	<div class="block-title">
		
		<h4 class="sub-header"><span><?php comment_form_title( __('Join the Conversation', 'framework'), __('Leave a Comment to %s', 'framework') ); ?></span></h4>

	</div>
	
	<div class="cancel-comment-reply">
			
		<?php cancel_comment_reply_link(); ?>
		
	</div>
	
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p><?php printf(__('You must be %1$slogged in%2$s to post a comment.', 'framework'), '<a href="'.get_option('siteurl').'/wp-login.php?redirect_to='.urlencode(get_permalink()).'">', '</a>') ?></p>
		<?php else : ?>
	
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" class="nice" method="post" id="commentform">
	
			<?php if ( is_user_logged_in() ) : ?>
		
			<p><?php printf(__('Logged in as %1$s. %2$sLog out &raquo;%3$s', 'framework'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>', '<a href="'.(function_exists('wp_logout_url') ? wp_logout_url(get_permalink()) : get_option('siteurl').'/wp-login.php?action=logout" title="').'" title="'.__('Log out of this account', 'framework').'">', '</a>') ?></p>
		
			<?php else : ?>
		
			<label for="author"><?php _e('Name', 'framework') ?> <small><?php if ($req) _e("*", 'framework'); ?></small></label><p><input type="text" name="author" id="author" class="large input-text" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" /></p>
		
			<label for="email"><?php _e('Email', 'framework') ?> <small><?php if ($req) _e("*", 'framework'); ?></small> <span><?php _e('(never published)', 'framework') ?></span></label><p><input type="text" name="email" id="email" class="large input-text" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" />
			</p>
		
			<label for="url"><?php _e('Website', 'framework') ?></label><p><input type="text" name="url" id="url" class="large input-text" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" /></p>
		
			<?php endif; ?>
		
			<textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
			
			<!--<p class="allowed-tags"><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
			
			<div class="clear"></div>
		
			<a><button name="submit" class="btn btn-primary btn-large" type="submit" id="submit" tabindex="5"><?php _e('Submit Comment', 'framework') ?></button></a>
			
			<?php comment_id_fields(); ?>
			
			<?php do_action('comment_form', $post->ID); ?>
	
		</form>

	<?php endif; // If registration required and not logged in ?>
	</div>

	<?php endif; // if you delete this the sky will fall on your head ?>
