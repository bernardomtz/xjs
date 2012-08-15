<?php $thumb = get_post_thumbnail_id(); ?>
<?php $image = vt_resize( $thumb,'' , 300, true );?>

<?php siiimple_audio(get_the_ID()); ?>

<?php if ($thumb) { ?>               
<img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" class="main-img" alt="image"/>
<?php } ?> 
     	
     		<div id="jquery_jplayer_<?php the_ID(); ?>" class="jp-jplayer"></div>
		
                    <div class="jp-audio-container">
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

<div class="blog-wrap">                   
<h4 class="latest-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="video"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/music2.png"></span></h4>
</div>