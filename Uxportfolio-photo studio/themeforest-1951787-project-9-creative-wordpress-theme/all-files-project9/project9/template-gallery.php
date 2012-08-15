<?php
/*
Template Name: Template Gallery
*/
?>

<?php get_header(); ?>

<script>
jQuery(document).ready(function() {	
// Isotope
var $container = $('#isotope2');
      var $isoID = $('#filters .active').attr('data-filter');

	  $container.isotope({
		itemSelector: '.gg',
		animationEngine: 'jquery',
		animationOptions: {
		duration: 350,
		easing: 'linear',
		queue: true
		}
	  });
	  $container.isotope({ filter: $isoID });

	jQuery('#filters li a').click(function() {
		$('#filters li a').removeClass('active');
		$(this).addClass('active');
		$isoID = $(this).attr('data-filter');
		$container.isotope({ filter: $isoID });
		return false;
	});
});	
</script>

<div class="container" id="single1">

	<div class="row">
	
	<!-- SINGLE TOP WRAP -->
	<div class="single-top-wrap">
	
		<!-- LEFT BLOCK -->
		<div class="left-block">
		
			<?php if ( $gth = get_option('of_gth') ) { ?>
			<h1 class="blog-header"><span><?php echo stripslashes ( $gth ); ?></span></h1>
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
		
		<!-- BEGIN FILTERS -->
		<ul id="filters">
	
			<!-- BEGIN FILTER -->
			<li id="filter-title">
		
			<?php if ( $filter = get_option('of_filter') ) { ?>
	
			<?php echo stripslashes ( $filter ) ; ?>
	
			<?php } ?>
			
			Filter
	
			<!-- END FILTER -->	
			</li>
		
			<!-- LI -->
			<li id="all"><a class="active" href="#" data-filter="*">All</a></li>
		
			<?php 
			$terms = get_terms("gallery_sorting");
			$count = count($terms);
			if ( $count > 0 ){
			$sPattern = '/\s*/m';
			$sReplace = '';
			foreach ( $terms as $term ) {
			$isoTax = preg_replace( $sPattern, $sReplace, $term->name);
			echo '<li><a href="#" data-filter=".' . $isoTax . '">' . $term->name . '</a></li>';
				}
			} 
			?>

		<!-- END FILTERS -->
		</ul>

<div class="clear"></div>

<div class="marketing">

	<div id="isotope2" class="transitions-enabled">

			<?php if ( $gtn = get_option('of_gtn') ) { ?> 
			<?php query_posts( 'post_type=gallery&posts_per_page=6'. $gtn .'&paged='.$paged); ?>
			<?php } ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php $thumb = get_post_thumbnail_id(); ?>
			<?php $image = vt_resize( $thumb,'' , 300, 225, true );?>
			<?php $terms_l = get_the_terms ($post->id, 'gallery_sorting'); ?>

				<div class="span4 gg <?php unset($term_links);
					$sPattern = '/\s*/m';
					$sReplace = '';
					foreach ($terms_l as $term) {
					$term_links[] = preg_replace( $sPattern, $sReplace, $term->name); }
					$on_draught = join(" ", $term_links);
					echo $on_draught; 
					?>">
      
    				<img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" alt="image"/>
    				
    				<div class="clear" style="height:1px;"></div>
      
    				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	  
	 				<?php the_excerpt(); ?>
	 				
	 				<div class="learn-more"><a href="<?php the_permalink(); ?>">/&nbsp;<?php _e('Learn More', 'framework'); ?></a></div>
    
    			</div><!-- END SPAN4 -->
    			
    		<?php endwhile; ?>
			<?php endif; ?>

	</div><!-- ISOTOPE -->
	
</div><!-- MARKETING -->

</div><!-- END CONTAINER -->

<?php get_footer(); ?>