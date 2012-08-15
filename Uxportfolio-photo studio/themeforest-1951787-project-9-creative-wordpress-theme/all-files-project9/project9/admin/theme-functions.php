<?php

/* These are functions specific to the included option settings and this theme */

/*-----------------------------------------------------------------------------------*/
/* Theme Header Output - wp_head() */
/*-----------------------------------------------------------------------------------*/

// This sets up the layouts and styles selected from the options panel

if (!function_exists('optionsframework_wp_head')) {
	function optionsframework_wp_head() { 
		$shortname =  get_option('of_shortname');
			
		// This prints out the custom css and specific styling options
		of_head_css();
	}
}

add_action('wp_head', 'optionsframework_wp_head');


/*-----------------------------------------------------------------------------------*/
/* Output CSS from standarized options */
/*-----------------------------------------------------------------------------------*/

function of_head_css() {

		$shortname =  get_option('of_shortname'); 
		$output = '';
		
		$custom_css = get_option('of_custom_css');
		
		if ($custom_css <> '') {
			$output .= $custom_css . "\n";
		}
		
		// Output styles
		if ($output <> '') {
			$output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
			echo $output;
		}
	
}

/*-----------------------------------------------------------------------------------*/
/* GALLERY
/*-----------------------------------------------------------------------------------*/


function siiimple_gallery($postid){
	 
	 if(has_post_format('gallery', $postid)) {
	?>
		<script type="text/javascript">
		jQuery(document).ready(function(){
				jQuery("#gallery_<?php echo $postid; ?>").easySlider({
			auto: false,
			speed: 	300,
			numericId: 	'controls_<?php echo $postid; ?>',
			continuous: true,
			numeric: true
			});
			});
		</script>
		
		
	<?php }
	
}


/*-----------------------------------------------------------------------------------*/
/* Audio Files
/*-----------------------------------------------------------------------------------*/

function siiimple_audio($postid) {
	
	$mp3 = get_post_meta($postid, 'siiimple_audio_mp3', TRUE);
	$ogg = get_post_meta($postid, 'siiimple_audio_ogg', TRUE);
	
	if(has_post_format('audio', $postid)) {
	 ?>
		<script type="text/javascript">
		
			jQuery(document).ready(function(){
	
				if(jQuery().jPlayer) {
					jQuery("#jquery_jplayer_<?php echo $postid; ?>").jPlayer({
						ready: function () {
							jQuery(this).jPlayer("setMedia", {
								<?php if($mp3 != '') : ?>
								mp3: "<?php echo $mp3; ?>",
								<?php endif; ?>
								<?php if($ogg != '') : ?>
								oga: "<?php echo $ogg; ?>",
								<?php endif; ?>
								end: ""
							});
						},
						swfPath: "<?php echo get_template_directory_uri(); ?>/framework/scripts",
						cssSelectorAncestor: "#jp_interface_<?php echo $postid; ?>",
						supplied: "<?php if($ogg != '') : ?>oga,<?php endif; ?><?php if($mp3 != '') : ?>mp3, <?php endif; ?> all"
					});
					
				}
			});
		</script>
	<?php }
}
/*-----------------------------------------------------------------------------------*/
/* Add Favicon
/*-----------------------------------------------------------------------------------*/

function childtheme_favicon() {
		$shortname =  get_option('of_shortname'); 
		if (get_option($shortname . '_custom_favicon') != '') {
	        echo '<link rel="shortcut icon" href="'.  get_option('of_custom_favicon')  .'"/>'."\n";
	    }
		else { ?>
			<link rel="shortcut icon" href="<?php echo bloginfo('stylesheet_directory') ?>/admin/images/favicon.ico" />
<?php }
}

add_action('wp_head', 'childtheme_favicon');

/*-----------------------------------------------------------------------------------*/
/* Show analytics code in footer */
/*-----------------------------------------------------------------------------------*/

function childtheme_analytics(){
	$shortname =  get_option('of_shortname');
	$output = get_option($shortname . '_google_analytics');
	if ( $output <> "" ) 
		echo stripslashes($output) . "\n";
}
add_action('wp_footer','childtheme_analytics');

?>
