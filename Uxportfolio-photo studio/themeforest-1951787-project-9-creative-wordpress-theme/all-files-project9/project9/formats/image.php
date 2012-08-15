<?php $thumb = get_post_thumbnail_id(); ?>
<?php $image = vt_resize( $thumb,'' , 300, true );?>
	
<img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" alt="image"/>

<div class="blog-wrap standard-img">

<h4 class="latest-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="video standard"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/image.png"></span></h4>

</div>