<?php siiimple_gallery(get_the_ID()); ?>

<div id="gallery_<?php the_ID(); ?>" class="gallerySlider">

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
				$src = wp_get_attachment_image_src( $attachment->ID, 'medium'); 
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
<div class="blog-wrap">
<h4 class="latest-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="video"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/gallery.png"></span></h4>
</div>