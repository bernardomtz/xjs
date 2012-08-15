<script type="text/javascript">
jQuery(document).ready(function() {		
// FLEX SLIDER
$('.flexslider').flexslider({

		slideshow: true, //Should the slider animate automatically by default? (true/false)
		animation: "<?php if ( $fa = get_option('of_fa') ) { ?><?php echo ( $fa)  ?><?php } else { ?>fade<?php } ?>",//String: Select your animation type, "fade" or "slide"
		slideshowSpeed: <?php if ( $fs = get_option('of_fs') ) { ?><?php echo ( $fs)  ?><?php } else { ?>6000<?php } ?>,
		animationDuration: <?php if ( $fd = get_option('of_fd') ) { ?><?php echo ( $fd)  ?><?php } else { ?>2000<?php } ?>,
		directionNav: true, //Create navigation for previous/next navigation? (true/false)
		controlNav: false, //Create navigation for paging control of each slide? (true/false)
		keyboardNav: true, //Allow for keyboard navigation using left/right keys (true/false)
		touchSwipe: true, //Touch swipe gestures for left/right slide navigation (true/false)
		prevText: "Previous", //Set the text for the "previous" directionNav item
		nextText: "Next", //Set the text for the "next" directionNav item
		pausePlay: false, //Create pause/play dynamic element (true/false)
		pauseText: 'Pause', //Set the text for the "pause" pausePlay item
		playText: 'Play', //Set the text for the "play" pausePlay item
		randomize: "<?php if ( $fr = get_option('of_fr') ) { ?><?php echo ( $fr)  ?><?php } else { ?>false<?php } ?>", 
		slideToStart: 0, //The slide that the slider should start on. Array notation (0 = first slide)
		animationLoop: true, //Should the animation loop? If false, directionNav will received disabled classes when at either end (true/false)
		pauseOnAction: true, //Pause the slideshow when interacting with control elements, highly recommended. (true/false)
		pauseOnHover: false, //Pause the slideshow when hovering over slider, then resume when no longer hovering (true/false)
		controlsContainer: ".flex-container"
});
});
</script>

<script type="text/javascript">
jQuery('#slides').slides({
		preload: true,
		preloadImage: '<?php echo get_template_directory_uri(); ?>/framework/img/loading.gif',
		slideEasing: "<?php if ( $se = get_option('of_se') ) { ?><?php echo ( $se)  ?><?php } else { ?>easeOutQuad<?php } ?>",
		slideSpeed: <?php if ( $ss = get_option('of_ss') ) { ?><?php echo ( $ss)  ?><?php } else { ?>300<?php } ?>,
		autoHeight: true,
		play: false
		});
</script>
