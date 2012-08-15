<?php
/*
Template Name: Template Home
*/
?>

<?php get_header(); ?>

<div class="flex-container">
					
	<div class="flexslider clearfix">
						
		<ul class="slides">
			
		<?php query_posts( 'post_type=slider&posts_per_page=-1'.'&paged='.$paged); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php $thumbs = get_post_thumbnail_id(); $images = vt_resize( $thumbs,'' , 1600, 700, true ); ?>
		<?php $video = get_post_meta($post->ID, 'siiimple_video', true);?>
								
			<li class="slide">
				
				<img src="<?php echo $images[url]; ?>" width="<?php echo $images[width]; ?>" height="<?php echo $images[height]; ?>" alt="image"/>
		    	
		    	<div class="caption">
					
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    
                    <?php the_excerpt(); ?>
                    
                    <div class="learn-more flex-learn"><a href="<?php the_permalink(); ?>">/&nbsp;<?php _e('Read More', 'framework'); ?></a></div>
                    
                </div><!-- END CAPTION -->
		    	
		    </li><!-- SLIDE -->
		    				
		    <?php endwhile; ?>
    		<?php endif; ?>
    							
    	</ul><!-- END UL SLIDES -->
	
	</div><!-- END FLEXSLIDER-->
	
</div><!-- END FLEX CONTAINER -->

<div class="container">

<div class="marketing">

  <div class="intro-wrap">
  
  	<div id="container">
  
  		<div id="slides">
				
			<div class="slides_container">
				
					<?php if ( $taglinesnumber = get_option('of_home_taglines_number') ) { ?>  
					<?php query_posts( 'post_type=taglines&posts_per_page='. $taglinesnumber .'&paged='.$paged); ?>
					<?php } ?>
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php $thumb = get_post_thumbnail_id(); ?>
					<?php $image = vt_resize( $thumb,'' , 125, 125, true );?>
					
				<div>
					
					<div class="slide-inner">
					
						<img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" class="top-img" alt="image"/>
							
						<?php the_excerpt(); ?>
						
						<p class="learn"><a href="<?php the_permalink(); ?>">/&nbsp;<?php _e('Learn More', 'framework'); ?></a></p>
						
					</div><!-- END SLIDE INNER -->
  					
				</div><!-- END DIV -->
					
					<?php endwhile; ?>
					<?php endif; ?>
					
			</div><!-- SLIDES CONTAINER -->
				
				<a href="#" class="prev"><img src="<?php echo get_template_directory_uri(); ?>/framework/img/left2.png" width="30" height="30" alt="Arrow Prev"></a>
				<a href="#" class="next"><img src="<?php echo get_template_directory_uri(); ?>/framework/img/right2.png" width="30" height="30" alt="Arrow Next"></a>
			
			</div><!-- SLIDES -->
  	
	</div><!-- CONTAINER -->
	
</div><!-- INTRO-WRAP -->
  
<div class="row">

<h4 class="sub-header">
	<?php if ( $homemarketing = get_option('of_home_marketing') ) { ?>
	<span><?php echo stripslashes ( $homemarketing ); ?></span>
	<?php } ?>
	<?php if ( $homemarketingview = get_option('of_home_marketing_view') ) { ?>
	<span class="view">&nbsp;/&nbsp;<?php if ( $homemarketingviewlink = get_option('of_home_marketing_view_link') ) { ?><a href="<?php echo stripslashes ( $homemarketingviewlink ); ?>"><?php } ?><?php echo stripslashes ( $homemarketingview ); ?></a></span><?php } ?>
	</h4>

<?php if ( $marketingnumber = get_option('of_home_marketing_number') ) { ?>  
<?php query_posts( 'post_type=marketing&posts_per_page='. $marketingnumber .'&paged='.$paged); ?>
<?php } ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
	<div class="span4">
      
    	<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
      
    	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	  
	 	<?php the_excerpt(); ?>
	 		
	 </div><!-- END SPAN4 -->
    
<?php endwhile; ?>
<?php endif; ?> 
 
</div><!-- END ROW -->
  
</div><!-- END MARKETING -->

<div class="clear"></div>

<?php if (get_option('of_latest_blog') == 'true') { ?>

<div class="row" id="home-blog">

	<h4 class="sub-header">
	<?php if ( $homeblog = get_option('of_home_blog') ) { ?>
	<span><?php echo stripslashes ( $homeblog ); ?></span>
	<?php } ?>
	<?php if ( $homeblogview = get_option('of_home_blog_view') ) { ?>
	<span class="view">&nbsp;/&nbsp;<?php if ( $homeblogviewlink = get_option('of_home_blog_view_link') ) { ?><a href="<?php echo stripslashes ( $homeblogviewlink ); ?>"><?php } ?><?php echo stripslashes ( $homeblogview ); ?></a></span><?php } ?>
	</h4>

	<div id="container-masonry" class="transitions-enabled clearfix">
	
	<?php if ( $blognumber = get_option('of_home_blog_number') ) { ?> 
	<?php $args=array( 'showposts' => $blognumber );  $my_query = new WP_Query($args); ?>
	<?php } ?>
	<?php if ( $my_query->have_posts() ) { while ($my_query->have_posts()) : $my_query->the_post(); ?> 

		<div class="span4 item">

			<?php
			$format = get_post_format();
			get_template_part( 'formats/'.$format );
			if($format == '')
			get_template_part( 'formats/standard' );
			?>

		</div><!-- END SPAN 4 ITEM -->

	<?php endwhile; } //while ($my_query) ?>

	</div><!-- END CONTAINER -->

</div><!-- END ROW -->

<?php } ?>

<div class="clear"></div>

<?php if (get_option('of_media') == 'true') { ?>

<div class="row" id="home-logo">

	<h4 class="sub-header">
	<?php if ( $homeclients = get_option('of_home_clients') ) { ?>
	<span><?php echo stripslashes ( $homeclients ); ?></span>
	<?php } ?>
	<?php if ( $homeclientsview = get_option('of_home_clients_view') ) { ?>
	<span class="view">&nbsp;/&nbsp;<?php if ( $homeclientsviewlink = get_option('of_home_clients_view_link') ) { ?><a href="<?php echo stripslashes ( $homeclientsviewlink ); ?>"><?php } ?><?php echo stripslashes ( $homeclientsview ); ?></a></span><?php } ?>
	</h4>

	<?php if ( $clientsnumber = get_option('of_home_clients_number') ) { ?> 
	<?php query_posts( 'post_type=logos&posts_per_page='. $clientsnumber .'&paged='.$paged); ?>
	<?php } ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php $thumb = get_post_thumbnail_id(); ?>
	<?php $image = vt_resize( $thumb,'' , 140, 140, true );?>

	<div class="span2">

		<a href="<?php the_permalink(); ?>">
			
		<img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" alt="image"/>
	
		</a>
			
	</div><!-- END SPAN2 -->
			
<?php endwhile; ?>
<?php endif; ?>

</div><!-- END ROW -->

<?php } ?>

<?php get_footer(); ?>