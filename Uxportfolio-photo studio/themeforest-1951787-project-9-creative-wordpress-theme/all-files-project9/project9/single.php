<?php get_header(); ?>

<div class="container" id="single1">

	<div class="row" id="block-single">
	
		<div class="span4" id="sidebar">
	
			<?php get_sidebar(); ?>
	
		</div><!-- END SPAN4 -->

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<?php $thumbs = get_post_thumbnail_id(); $images = vt_resize( $thumbs,'' , 630, true ); ?>
	
		<div class="span8" id="single-content">

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
				<h2><?php the_title(); ?></h2>
			
				<ul class="post-meta">
				
				<li class="time"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) .' '. __('ago', 'framework'); ?></li>
				
				<li class="comment-count"><?php comments_popup_link(__('<span class="icon"></span> 0 Comments', 'framework'), __('<span class="icon"></span> 1 Comment', 'framework'), __('<span class="icon"></span> % Comments', 'framework')); ?></li>
				
				<?php if(has_category()): ?>
				<li class="category"><?php
					$output = '';
					foreach((get_the_category()) as $category) {
    				if($category->name==$homecat) continue;
    				$category_id = get_cat_ID( $category->cat_name );
    				$category_link = get_category_link( $category_id );
					if(!empty($output))
    				$output .= ', ';
    				$output .= '<span class="cat"><a href="'.$category_link.'">'.$category->cat_name.'</a></span>';
					} echo $output;
					?>
				</li>
				<?php endif; ?>
				
				<?php if(has_tag()) : ?>
    
    			<?php the_tags( '<li class="tags">', ', ', '</li>'); ?>
    
				<?php endif; ?>
				
				<li class="face"><iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&amp;layout=button_count&amp;show_faces=false&amp;width=50&amp;action=like&amp;colorscheme=light&amp;height=20" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:50px; height:20px;" allowTransparency="true"></iframe></li>
				
				</ul>
			
				<?php if ( has_post_format( 'video' )) { ?>
				
				<iframe src="<?php echo get_post_meta($post->ID, "siiimple_video", $single = true); ?>" width="620" height="300" style="border:0;margin:20px 0px;" id="fit"></iframe>
				
				<?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				
				<?php } elseif ( has_post_format( 'audio' )) { ?>
				
				<?php siiimple_audio(get_the_ID()); ?>

<?php if ($thumbs) { ?>               
<img src="<?php echo $images[url]; ?>" width="<?php echo $images[width]; ?>" height="<?php echo $images[height]; ?>" alt="image" class="single-main-img"/>
<?php } ?> 
     	
     		<div id="jquery_jplayer_<?php the_ID(); ?>" class="jp-jplayer"></div>
		
                    <div class="jp-audio-container" style="margin-bottom:20px;">
                        <div class="jp-audio">
                            <div class="jp-type-single">
                                <div id="jp_interface_<?php the_ID(); ?>" class="jp-interface">
                                    <ul class="jp-controls">
                                    	<li><div class="seperator-first"></div></li>
                                        <li><div class="seperator-second"></div></li>
                                        <li><a href="#" class="jp-play" tabindex="1">play</a></li>
                                        <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
                                        <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
                                        <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
                                    </ul>
                                    <div class="jp-progress-container">
                                        <div class="jp-progress">
                                            <div class="jp-seek-bar">
                                                <div class="jp-play-bar"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jp-volume-bar-container">
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				
				<?php } elseif ( has_post_format( 'gallery' )) { ?>
				
				<?php siiimple_gallery(get_the_ID()); ?>

				<div id="gallery_<?php the_ID(); ?>" class="gallerySingle">

				<div class="gallery-single-wrap">

				<ul>
	
					<?php 
					$args = array(
					'orderby' => 'menu_order',
					'post_type' => 'attachment',
					'post_parent'    => get_the_ID(),
					'post_mime_type' => 'image',
					'post_status'    => null,
					'numberposts'    => -1,
					);
					$attachments = get_posts($args);
					?>
					
					<?php if ($attachments) : ?>
					 
					<?php foreach ($attachments as $attachment) : ?>
                        	
                	<?php 
					$src = wp_get_attachment_image_src( $attachment->ID, 'large'); 
					if(is_singular())
					$src = wp_get_attachment_image_src( $attachment->ID, 'single-thumb'); 
					?>
                            
                        <li>
                            <img 
                            height="<?php echo $src[2]; ?>"
                            width="<?php echo $src[1]; ?>"
                            alt="<?php echo apply_filters('the_title', $attachment->post_title); ?>" 
                            src="<?php echo $src[0]; ?>" 
                            />
                       </li>
                           
                        
                        <?php endforeach; ?>
                        
                        
                        <?php endif; ?>


					</ul>
				
				</div>
			
			</div>

			
			<?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>
				
			<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				
			<?php } elseif ( has_post_format( 'quote' )) { ?>
				
			<div class="single-quote-wrap">
				
			<?php the_content(); ?>
				
			<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				
			</div>
				
			<?php } elseif ( has_post_format( 'link' )) { ?>
			
			<div class="single-quote-wrap">
				
			<?php the_content(); ?>
				
			<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				
			</div>
				
			<?php } else { ?>
				
				<img src="<?php echo $images[url]; ?>" width="<?php echo $images[width]; ?>" height="<?php echo $images[height]; ?>" alt="image" class="single-main-img"/>
				
				<?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				
				<?php } ?>
				
				<div class="link-prev"><?php next_post_link(__('&larr;&nbsp;%link', 'framework'), '<span class="arrow">%title</span>') ?></div>
				<div class="link-next"><?php previous_post_link(__('%link&nbsp;&rarr;', 'framework'), '<span class="arrow">%title</span>') ?></div>
			</div><!-- END POST -->
		
			<div class="clear"></div>
		
			<?php $tags = wp_get_post_tags($post->ID); ?>
			<?php if ( $tags ) { ?>
			
				<div class="related">
		
					<h4 class="sub-header"><span><?php _e('Related Posts', 'framework'); ?></span></h4>
			
					<?php require (TEMPLATEPATH . '/framework/includes/related-posts.php'); ?>
			
				</div><!-- END RELATED -->
		
			<?php } ?>
		
		</div><!-- END SPAN8 -->
		
	<div class="clear"></div>
		
	<div class="span8" id="comments-bottom">
	
		<div class="comments-inner-wrap">

			<?php comments_template('', true); ?>
		
		</div><!-- END COMMENTS INNER WRAP -->
			
	</div><!-- END SPAN8 -->

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.', 'framework'); ?></p>

	<?php endif; ?>
	
	</div><!-- END ROW -->

</div><!-- END CONTAINER -->

<?php get_footer(); ?>