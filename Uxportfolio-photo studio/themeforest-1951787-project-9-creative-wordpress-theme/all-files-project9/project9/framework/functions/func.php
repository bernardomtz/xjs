<?php 
/*-----------------------------------------------------------------------------------*/
/* IMPORTANT WP FUNCTIONS */
/*-----------------------------------------------------------------------------------*/
if (function_exists('add_theme_support')) {
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 50, 50, true ); 
add_image_size( 'large', 620, '', true ); // Large thumbnails
add_image_size( 'medium', 290, '', true ); // Medium thumbnails
add_image_size( 'small', 125, '', true ); // Small thumbnails
add_image_size( 'mini-thumbnail', 50, 50, true );
add_image_size( 'single-post-thumbnail', 550, 9999,true );
add_image_size( 'content', 200, 150, true );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'menus' );
add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');
register_nav_menu('primary', 'Main Navigation Menu');
register_nav_menu('footer', 'Footer Navigation Menu');
}
?>
<?php
function jpeg_quality_callback($arg)
{
return (int)100;
}

add_filter('jpeg_quality', 'jpeg_quality_callback');
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* THEME WIDTH CONSTANT */
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 960;
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* TRANSLATION */
/*-----------------------------------------------------------------------------------*/
load_theme_textdomain ('framework');
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* POST FORMATS */
/*-----------------------------------------------------------------------------------*/
$formats = array( 
			'gallery',
			'image', 
			'link',  
			'quote', 
			'audio',
			'video');

add_theme_support( 'post-formats', $formats ); 
add_post_type_support( 'post', 'post-formats' );
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* BETTER PAGINATION */
/*-----------------------------------------------------------------------------------*/
function pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1; 
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }  
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><ul><li><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li class=\"active\"><a href='#'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</li></ul></div>\n";
     }
}
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* IMAGE RESIZE */
/*-----------------------------------------------------------------------------------*/
function vt_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {

	// this is an attachment, so we have the ID
	if ( $attach_id ) {
	
		$image_src = wp_get_attachment_image_src( $attach_id, 'full' );
		$file_path = get_attached_file( $attach_id );
	
	// this is not an attachment, let's use the image url
	} else if ( $img_url ) {
		
		$file_path = parse_url( $img_url );
		$file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path['path'];
		
		//$file_path = ltrim( $file_path['path'], '/' );
		//$file_path = rtrim( ABSPATH, '/' ).$file_path['path'];
		
		$orig_size = getimagesize( $file_path );
		
		$image_src[0] = $img_url;
		$image_src[1] = $orig_size[0];
		$image_src[2] = $orig_size[1];
	} else {
	return False;
	}
	
	$file_info = pathinfo( $file_path );
	$extension = '.'. $file_info['extension'];

	// the image path without the extension
	$no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];

	$cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;

	// checking if the file size is larger than the target size
	// if it is smaller or the same size, stop right here and return
	if ( $image_src[1] > $width || $image_src[2] > $height ) {

		// the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
		if ( file_exists( $cropped_img_path ) ) {

			$cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
			
			$vt_image = array (
				'url' => $cropped_img_url,
				'width' => $width,
				'height' => $height
			);
			
			return $vt_image;
		}

		// $crop = false
		if ( $crop == false ) {
		
			// calculate the size proportionaly
			$proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
			$resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;			

			// checking if the file already exists
			if ( file_exists( $resized_img_path ) ) {
			
				$resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );

				$vt_image = array (
					'url' => $resized_img_url,
					'width' => $proportional_size[0],
					'height' => $proportional_size[1]
				);
				
				return $vt_image;
			}
		}

		// no cache files - let's finally resize it
		$new_img_path = image_resize( $file_path, $width, $height, $crop );
		$new_img_size = getimagesize( $new_img_path );
		$new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );

		// resized output
		$vt_image = array (
			'url' => $new_img,
			'width' => $new_img_size[0],
			'height' => $new_img_size[1]
		);
		
		return $vt_image;
	}

	// default output - without resizing
	$vt_image = array (
		'url' => $image_src[0],
		'width' => $image_src[1],
		'height' => $image_src[2]
	);
	
	return $vt_image;
}
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* VARIETY OF EXCERPTS */
/*-----------------------------------------------------------------------------------*/
function wpe_excerptlength_teaser100($length) {
    return 45;
}
function wpe_excerptlength_index($length) {
    return 15;
}
function wpe_excerptlength_index2($length) {
    return 15;
}
function wpe_excerptlength_100($length) {
    return 25;
}
function wpe_excerptlength_200($length) {
    return 85;
}
function wpe_excerptmore($more) {
    return '...';
}
function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* SHORTCODES LISTED IN ADMIN */
/*-----------------------------------------------------------------------------------*/
add_action('media_buttons','add_sc_select',11);
function add_sc_select(){
    global $shortcode_tags;
     /* ------------------------------------- */
     /* enter names of shortcode to exclude bellow */
     /* ------------------------------------- */
    $exclude = array("wp_caption","caption","gallery","image","tooltip","blockbox","blockleft", "embed");
    echo '&nbsp;<select id="sc_select"><option>Shortcode</option>';
    foreach ($shortcode_tags as $key => $val){
	    if(!in_array($key,$exclude)){
            $shortcodes_list .= '<option value="['.$key.'][/'.$key.']">'.$key.'</option>';
    	    }
        }
     echo $shortcodes_list;
     echo '</select>';
}
add_action('admin_head', 'button_js');
function button_js() {
	echo '<script type="text/javascript">
	jQuery(document).ready(function(){
	   jQuery("#sc_select").change(function() {
			  send_to_editor(jQuery("#sc_select :selected").val());
        		  return false;
		});
	});
	</script>';
}
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* COMMENTS */
/*-----------------------------------------------------------------------------------*/
function iii_comment($comment, $args, $depth) {

    $isByAuthor = false;

    if($comment->comment_author_email == get_the_author_meta('email')) {
        $isByAuthor = true;
    }

    $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     
     <div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix">
     
      <?php echo get_avatar($comment,$size='55'); ?>
      
      <div class="comment-author vcard">
         <?php printf(__('%s'), get_comment_author_link()) ?> 
		 <?php if($isByAuthor) { ?><span class="author-tag"><?php _e('(Author)','framework') ?>&nbsp;</span><?php } ?>on&nbsp;<span class="author-date"><?php printf(__('%1$s'), get_comment_date()) ?></span>
      </div>

      <div class="comment-meta date">
		<?php edit_comment_link(__('(Edit)'),'  ','') ?>  
      </div>
      
      <div class="comment-inner">
      
	  	<?php if ($comment->comment_approved == '0') : ?>
         <em class="moderation"><?php _e('Your comment is being checked out.  Just hang tight.') ?></em>
         <br />
      	<?php endif; ?>
  
   		<?php comment_text() ?>
   		
   		<span class="reply-link">
   		
   		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
   		
   		</span>
        
      </div>
      
     </div>

<?php
}
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* TWITTER BLOGGER.JS */
/*-----------------------------------------------------------------------------------*/
function siiimple_twitter_script($unique_id,$username,$limit) {
?>
<script type="text/javascript">
<!--//--><![CDATA[//><!--

    function twitterCallback2(twitters) {
      var statusHTML = [];
      for (var i=0; i<twitters.length; i++){
        var username = twitters[i].user.screen_name;
        var status = twitters[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
          return '<a href="'+url+'">'+url+'</a>';
        }).replace(/\B@([_a-z0-9]+)/ig, function(reply) {
          return  reply.charAt(0)+'<a href="http://twitter.com/'+reply.substring(1)+'">'+reply.substring(1)+'</a>';
        });
        statusHTML.push('<li><span>'+status+'</span> <br/><a style="font-size:85%" href="http://twitter.com/'+username+'/statuses/'+twitters[i].id+'">'+relative_time(twitters[i].created_at)+'</a></li>');
      }
      document.getElementById('twitter_update_list_<?php echo $unique_id; ?>').innerHTML = statusHTML.join('');
    }
    
    function relative_time(time_value) {
      var values = time_value.split(" ");
      time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
      var parsed_date = Date.parse(time_value);
      var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
      var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
      delta = delta + (relative_to.getTimezoneOffset() * 60);
    
      if (delta < 60) {
        return 'less than a minute ago';
      } else if(delta < 120) {
        return 'about a minute ago';
      } else if(delta < (60*60)) {
        return (parseInt(delta / 60)).toString() + ' minutes ago';
      } else if(delta < (120*60)) {
        return 'about an hour ago';
      } else if(delta < (24*60*60)) {
        return 'about ' + (parseInt(delta / 3600)).toString() + ' hours ago';
      } else if(delta < (48*60*60)) {
        return '1 day ago';
      } else {
        return (parseInt(delta / 86400)).toString() + ' days ago';
      }
    }
//-->!]]>
</script>
<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $username; ?>.json?callback=twitterCallback2&amp;count=<?php echo $limit; ?>"></script>
<?php

} ?>