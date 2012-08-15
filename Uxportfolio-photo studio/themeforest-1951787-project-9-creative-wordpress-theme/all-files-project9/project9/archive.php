<?php get_header(); ?>

<div class="container" id="main-blog">

	<div class="row" id="home-blog">

	<?php if (have_posts()) : ?>
	
	<!-- SINGLE TOP WRAP -->
	<div class="single-top-wrap">
	
		<!-- LEFT BLOCK -->
		<div class="left-block">

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
	<h1 class="blog-header"><span>&#8216;<?php single_cat_title(); ?>&#8217; <?php _e('Category', 'framework'); ?></span></h1>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	<h1 class="blog-header"><span><?php _e('Posts Tagged', 'framework'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</span></h1>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h1 class="blog-header"><span><?php _e('Archive for', 'framework'); ?> <?php the_time('F jS, Y'); ?></span></h1>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h1 class="blog-header"><span><?php _e('Archive for', 'framework'); ?> <?php the_time('F, Y'); ?></span></h1>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h1 class="blog-header"><span><?php _e('Archive for', 'framework'); ?> <?php the_time('Y'); ?></span></h1>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h1 class="blog-header"><span><?php _e('Author Archive', 'framework'); ?></span></h1>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h1 class="blog-header"><span><?php _e('Blog Archives', 'framework'); ?></span></h1>
	<?php } ?>
	
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
		
	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2>No posts found.</h2>");
		}
		get_search_form();

	endif;
?>
</div><!-- END CONTAINER MASONRY -->
		
	</div><!-- END ROW BLOG -->
	
	<div id="blog-pagination">
	
		<!-- PAGINATION -->
		<?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>
	
	</div>

</div><!-- END CONTAINER -->

<?php get_footer(); ?>
