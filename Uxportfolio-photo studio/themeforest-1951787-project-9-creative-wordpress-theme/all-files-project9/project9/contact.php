<?php
/*
Template Name: Contact
*/
?>

<?php
if(isset($_POST['submitted'])) {
	if(trim($_POST['contactName']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}

	if(trim($_POST['email']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(trim($_POST['comments']) === '') {
		$commentError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}

	if(!isset($hasError)) {
		$emailTo = get_option('of_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = 'From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}

} ?>
<?php get_header(); ?>

<div id="contact">

<div class="container" id="single1">

	<div class="row">
	
	<!-- SINGLE TOP WRAP -->
	<div class="single-top-wrap">
	
		<!-- LEFT BLOCK -->
		<div class="left-block">
		
			
			<h1 class="blog-header"><span><?php the_title(); ?></span></h1>
			
			
		<!-- END LEFT BLOCK -->
		</div>
	
		<!-- RIGHT BLOCK -->
		<div class="right-block">
	
			<!-- TT WRAPPER -->
			<ul class="tt-wrapper">
	
				<!-- SOCIAL -->
				<span class="social">
				
				<?php if ( $twitter = get_option('of_twitter_url') ) { ?>
				<li><a class="tt-twitter" href="<?php echo stripslashes ( $twitter ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/social-media/twitter.png"><span><?php _e('Twitter', 'framework'); ?></span></a></li>
				<?php } ?>
				
				<?php if ( $facebook = get_option('of_facebook_url') ) { ?>
				<li><a class="tt-facebook" href="<?php echo stripslashes ( $facebook ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/social-media/facebook.png"><span><?php _e('Facebook', 'framework'); ?></span></a></li>
				<?php } ?>
				
				<?php if ( $flickr = get_option('of_flickr_url') ) { ?>
				<li><a class="tt-facebook" href="<?php echo stripslashes ( $flickr ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/social-media/flickr.png"><span><?php _e('Flickr', 'framework'); ?></span></a></li>
				<?php } ?>
				
				<?php if ( $link = get_option('of_link_url') ) { ?>
				<li><a class="tt-linkedin" href="<?php echo stripslashes ( $link ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/social-media/link.png"><span><?php _e('LinkedIn', 'framework'); ?></span></a></li>
				<?php } ?>
				
				<?php if ( $rss = get_option('of_rss_url') ) { ?>
				<li><a class="tt-forrst" href="<?php echo stripslashes ( $rss ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/social-media/rss.png"><span><?php _e('RSS', 'framework'); ?></span></a></li>
				<?php } ?>
			
				<!-- END SOCIAL -->
				</span>
	
				<!-- SEARCH -->
				<span class="search">
	
				<li><?php get_search_form( '' ); ?> </li>
	
				<!-- END SEARCH -->
				</span>
			
			<!-- END TT WRAPPER -->
			</ul>
	
		<!-- END RIGHT BLOCK -->
		</div> 
		
		</div>
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<!-- THUMB -->
		<?php $thumb = get_post_thumbnail_id(); $image = vt_resize( $thumb,'' , 672, 305, true ); ?>
		
		<!-- FANCYBOX -->
		<?php $fullsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large', false, '' ); ?>
		
		<!-- VIDEO -->
		<?php $video = get_post_meta($post->ID, 'siiimple_video', true);?>
		
		<?php $gmaps = get_post_meta($post->ID, 'siiimple_gmaps', true);?>

					
         <div class="blog-post-wrap" id="fitvid">

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
			<?php if ($thumb) { ?>
		
			<img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" alt="image"/>
			
			<?php } elseif ($video) { ?>
			
			<iframe src="<?php echo get_post_meta($post->ID, "siiimple_video", $single = true); ?>" width="672" height="305" style="border:0;margin-bottom:20px;"></iframe>
			
			<?php } elseif ($gmaps) { ?>
			
			<iframe width="672" height="305" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="margin-bottom:20px;margin-top:-10px;" src="<?php echo $gmaps; ?>"></iframe>
			
			<?php } ?>
			
			<?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>

			</div>
		
		</div>

         <?php if(isset($emailSent) && $emailSent == true) { ?>

                            <div class="thanks">
                                <p><?php _e('Thanks, your email was sent successfully.', 'framework') ?></p>
                            </div>
        
                        <?php } else { ?>
                
                            <?php if(isset($hasError) || isset($captchaError)) { ?>
                                <p class="error"><?php _e('Sorry, an error occured.', 'framework') ?><p>
                            <?php } ?>
            
                            <form action="<?php the_permalink(); ?>" id="contactForm" method="post" class="clearfix">
                                <ul class="contactform">
                                    <li><label for="contactName"><?php _e('Name:', 'framework') ?></label>
                                        <input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField large input-text" />
                                        <?php if($nameError != '') { ?>
                                            <span class="error"><?php echo $nameError; ?></span> 
                                        <?php } ?>
                                    </li>
                        
                                    <li><label for="email"><?php _e('Email:', 'framework') ?></label>
                                        <input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email large input-text" />
                                        <?php if($emailError != '') { ?>
                                            <span class="error"><?php echo $emailError; ?></span>
                                        <?php } ?>
                                    </li>
                        
                                    <li class="textarea"><label for="commentsText"><?php _e('Message:', 'framework') ?></label>
                                        <textarea name="comments" id="commentsText" rows="20" cols="30" class="required requiredField form.nice textarea"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
                                        <?php if($commentError != '') { ?>
                                            <span class="error"><?php echo $commentError; ?></span> 
                                        <?php } ?>
                                    </li>
                        
                                    <li class="button">
                                        <input type="hidden" name="submitted" id="submitted" value="true" />
                                        <button name="submit" class="btn btn-primary btn-large" type="submit" id="submit" tabindex="5"><?php _e('Send Email', 'framework') ?></button>
                                    </li>
                                </ul>
                            </form>
                        <?php } ?>
					
					</div>

				
				</div>

				<?php endwhile; endif; ?>
		
		</div>
	
	</div>
	
	</div>

<?php get_footer(); ?>