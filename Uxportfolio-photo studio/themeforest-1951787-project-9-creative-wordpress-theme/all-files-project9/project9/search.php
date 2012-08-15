<?php get_header(); ?>

<div class="container" id="main-blog">

	<div class="row" id="home-blog">

	<?php if (have_posts()) : ?>
	
	<!-- SINGLE TOP WRAP -->
	<div class="single-top-wrap">
	
		<!-- LEFT BLOCK -->
		<div class="left-block">

		<h1 class="blog-header"><span><?php _e('Search Results', 'framework'); ?></span></h1>
		
		</div><!-- END SPAN8 -->
		
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
		
		</div><!-- END SINGLE TOP WRAP -->
		
		<div id="container-masonry">

		<?php while (have_posts()) : the_post(); ?>

			<div class="span4 item">

					<?php
					$format = get_post_format();
					get_template_part( 'formats/'.$format );
					if($format == '')
					get_template_part( 'formats/standard' );
					?>

				</div><!-- END SPAN 4 ITEM -->

		<?php endwhile; ?>
		
	<?php else : ?>

		<h2><?php _e('No posts found. Try a different search?', 'framework'); ?></h2>
		<?php get_search_form(); ?>

	<?php endif; ?>

</div><!-- END CONTAINER MASONRY -->
		
	</div><!-- END ROW BLOG -->
	
	<div id="blog-pagination">
	
		<!-- PAGINATION -->
		<?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>
	
	</div>

</div><!-- END CONTAINER -->

<?php get_footer(); ?>