<?php  //for use in the loop, list 5 post titles related to first tag on current post
  $backup = $post;  // backup the current object
  $tags = wp_get_post_tags($post->ID);
  $tagIDs = array();
  if ($tags) {
    $tagcount = count($tags);
    for ($i = 0; $i < $tagcount; $i++) {
      $tagIDs[$i] = $tags[$i]->term_id;
    }
    $args=array(
      'tag__in' => $tagIDs,
      'post__not_in' => array($post->ID),
      'showposts'=>3,
      'caller_get_posts'=>1
    );
    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {
      while ($my_query->have_posts()) : $my_query->the_post(); ?>
      <?php $thumbr= get_post_thumbnail_id(); ?>
	  <?php $imager = vt_resize( $thumbr,'' , 260, 145, true );?>
	  <?php $fullthumb = get_post_thumbnail_id(); ?>
	  <?php $fullimg = vt_resize( $fullthumb, '', 600, true); ?>
	  <?php $video = get_post_meta($post->ID, 'siiimple_video', true);?>
	   
	<div class="span2">
	
	<?php if ($thumbr) { ?>

	<img src="<?php echo $imager[url]; ?>" width="<?php echo $imager[width]; ?>" height="<?php echo $imager[height]; ?>" alt="image"/>
	
	<?php } elseif ( has_post_format( 'audio' )) { ?>
	
	<img src="<?php echo get_template_directory_uri(); ?>/framework/images/audio-home-blog.png">
	
	<?php } elseif ($video) { ?>
			
			<iframe src="<?php echo get_post_meta($post->ID, "siiimple_video", $single = true); ?>" width="186" height="149" style="border:0;margin-bottom:20px;"></iframe>
			
	<?php } ?>
	
	<h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

</div>
      <?php endwhile;
    } else { ?>
      <h3 class="no-related-posts">No related posts found!</h3>
    <?php }
  }
  $post = $backup;  // copy it back
  wp_reset_query(); // to use the original query again
?>
