<?php
/*
Template Name: Template Page Full
*/
?>

<?php get_header(); ?>

<div class="container" id="single1">

	<div class="row" id="block-single">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<?php $thumbs = get_post_thumbnail_id(); $images = vt_resize( $thumbs,'' , 900, true ); ?>
		<?php $video = get_post_meta($post->ID, "siiimple_video", $single = true); ?>
		
		<div class="span12 full-width" id="single-content">

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
				<h2><?php the_title(); ?></h2>
			
				<?php if ( $video ) { ?>
				
				<iframe src="<?php echo get_post_meta($post->ID, "siiimple_video", $single = true); ?>" width="900" height="500" style="border:0;margin:20px 0px;" id="fit"></iframe>
				
				<?php } elseif ($thumbs) { ?>
				
				<img src="<?php echo $images[url]; ?>" width="<?php echo $images[width]; ?>" height="<?php echo $images[height]; ?>" alt="image" class="single-main-img"/>
				
				<?php } ?>
				
				<?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				
				<div class="link-prev"><?php next_post_link(__('&larr;&nbsp;%link', 'framework'), '<span class="arrow">%title</span>') ?></div>
				<div class="link-next"><?php previous_post_link(__('%link&nbsp;&rarr;', 'framework'), '<span class="arrow">%title</span>') ?></div>
			
			</div><!-- END POST -->
		
			<div class="clear"></div>
		
		</div><!-- END SPAN8 -->
			
	</div><!-- END SPAN8 -->

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.', 'framework'); ?></p>

	<?php endif; ?>
	
	</div><!-- END ROW -->

</div><!-- END CONTAINER -->

<?php get_footer(); ?>