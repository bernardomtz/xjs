<iframe src="<?php echo get_post_meta($post->ID, "siiimple_video", $single = true); ?>" width="290" height="170" style="border:0;" id="fit"></iframe>

<div class="blog-wrap standard-img">
<h4 class="latest-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="video"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/video.png"></span></h4>
</div>