<?php
/*
Template Name: Template Marketing
*/
?>

<?php get_header(); ?>

<div class="container" id="single1">

	<div class="row">
	
	<!-- SINGLE TOP WRAP -->
	<div class="single-top-wrap">
	
		<!-- LEFT BLOCK -->
		<div class="left-block">
		
			<?php if ( $mth = get_option('of_mth') ) { ?>
			<h1 class="blog-header"><span><?php echo stripslashes ( $mth ); ?></span></h1>
			<?php } ?>
			
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
		
		<br style="clear:both">

		<div class="marketing">

			<?php if ( $mtn = get_option('of_mtn') ) { ?> 
			<?php query_posts( 'post_type=marketing&posts_per_page=6'. $mtn .'&paged='.$paged); ?>
			<?php } ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="span4">
      
    				<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
      
    				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	  
	 				<p><?php the_excerpt(); ?></p>
	 		
	 				<a class="more-link" href="<?php the_permalink(); ?>"><?php _e('Read More', 'framework'); ?></a>
    
    			</div><!-- END SPAN4 -->
	
			<?php endwhile; ?>
			<?php endif; ?>

	</div><!-- END ROW BLOG -->
	
</div>

</div><!-- END CONTAINER -->

<?php get_footer(); ?>