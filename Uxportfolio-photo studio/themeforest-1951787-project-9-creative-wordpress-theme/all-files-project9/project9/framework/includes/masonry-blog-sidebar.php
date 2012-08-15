<?php get_header(); ?>

<div class="container" id="main-blog-2">

	<div class="row" id="home-blog">
	
		<!-- SINGLE TOP WRAP -->
		<div class="single-top-wrap">
	
			<!-- LEFT BLOCK -->
			<div class="left-block">
		
				<?php if ( $bth = get_option('of_bth') ) { ?>
				<h1 class="blog-header"><span><?php echo stripslashes ( $bth ); ?></span></h1>
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
				<li><a class="tt-twitter" href="<?php echo stripslashes ( $twitter ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/social-media/twitter.png"><span>Twitter</span></a></li>
				<?php } ?>
				
				<?php if ( $facebook = get_option('of_facebook_url') ) { ?>
				<li><a class="tt-facebook" href="<?php echo stripslashes ( $facebook ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/social-media/facebook.png"><span>Facebook</span></a></li>
				<?php } ?>
				
				<?php if ( $flickr = get_option('of_flickr_url') ) { ?>
				<li><a class="tt-facebook" href="<?php echo stripslashes ( $flickr ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/social-media/flickr.png"><span>Flickr</span></a></li>
				<?php } ?>
				
				<?php if ( $link = get_option('of_link_url') ) { ?>
				<li><a class="tt-linkedin" href="<?php echo stripslashes ( $link ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/social-media/link.png"><span>LinkedIn</span></a></li>
				<?php } ?>
				
				<?php if ( $rss = get_option('of_rss_url') ) { ?>
				<li><a class="tt-forrst" href="<?php echo stripslashes ( $rss ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/social-media/rss.png"><span>RSS</span></a></li>
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
		
		<div class="span5" id="sidebar">
		
			<?php get_sidebar(); ?>
		
		</div>
		
		<div id="container-masonry" class="transitions-enabled clearfix">
		
		<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>

				<div class="span4 item">

					<?php $format = get_post_format();
					get_template_part( 'formats/'.$format );
					if($format == '')
					get_template_part( 'formats/standard' ); ?>

				</div><!-- END SPAN 4 ITEM -->
	
			<?php endwhile; ?>

			<?php endif; ?>

		</div><!-- END CONTAINER MASONRY -->
		
	</div><!-- END ROW BLOG -->
	
		<div id="blog-pagination">
	
		<!-- PAGINATION -->
			<?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>
	
		</div>

</div><!-- END CONTAINER -->

<?php get_footer(); ?>