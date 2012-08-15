<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){
	
// VARIABLES
$themename = get_theme_data(STYLESHEETPATH . '/style.css');
$themename = $themename['Name'];
$shortname = "of";

// Populate OptionsFramework option in array for use in theme
global $of_options;
$of_options = get_option('of_options');

$GLOBALS['template_path'] = OF_DIRECTORY;

//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
$of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
$categories_tmp = array_unshift($of_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($of_pages_obj as $of_page) {
    $of_pages[$of_page->ID] = $of_page->post_name; }
$of_pages_tmp = array_unshift($of_pages, "Select a page:");       

// Image Alignment radio box
$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$options_image_link_to = array("image" => "The Image","post" => "The Post"); 

//Testing 
$img = OF_DIRECTORY . '/_framework/images/graph.png';

// Nivo Slider Options
$options_slide_time = array("5000","6000","7000","8000","9000","10000");//ani time
$options_slide_speed = array("300","400","500","600","700","800");//Slide transition speed
$options_slide_eff = array("sliceDown","sliceDownLeft","sliceUp","sliceUpLeft","sliceUpDown","sliceUpDownLeft","fold","fade","random");
$options_slide_slices = array("5","10","15","20");

// Orbit Slider Options
$options_slide_time_orbit = array("3000","4000","5000","6000","7000","8000","9000","10000");//if timer is enabled, time between transitions
$options_slide_ani_orbit = array("400","500","600","700","800","900","1000");// how fast animtions are
$options_orbit_trans = array("fade", "horizontal-slide", "vertical-slide", "horizontal-push");

$options_select = array($img,"two","three","four","five"); 
$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 

//Stylesheets Reader
$alt_stylesheet_path = OF_FILEPATH . '/framework/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");

// Set the Options Array
$options = array();
					                

$options[] = array( "name" => __("Custom Logo"),
                    "type" => "heading");
                 
$options[] = array( "name" => __("Check For Text Logo"),
					"desc" => __("Check this to enable a plain text logo rather than an image."),
					"id" => $shortname."_text_logo",
					"std" => "false",
					"type" => "checkbox");					

$options[] = array( "name" => __("Custom Logo"),
					"desc" => __("Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)"),
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload");
					
$options[] = array( "name" => __("General Options"),
                    "type" => "heading");
                    
$options[] = array( "name" => __("Show Latest Home Blog"),
					"desc" => __("You can choose to not show latest blog posts on home page."),
					"id" => $shortname."_latest_blog",
					"std" => "false",
					"type" => "checkbox");
					
$options[] = array( "name" => __("Show Clients At Bottom"),
					"desc" => __("You can choose to remove clients images at bottom of page."),
					"id" => $shortname."_media",
					"std" => "false",
					"type" => "checkbox");
					
$options[] = array( "name" => __("Flex Slider Options"),
                    "type" => "heading");

$options[] = array( "name" => __("Slider Animation"),
					"desc" => __("Choose between 'fade' or 'slide'"),
					"id" => $shortname."_fa",
					"std" => "fade",
					"type" => "text");
			
$options[] = array( "name" => __("Slider Speed"),
					"desc" => __("Set the speed of the slideshow cycling, in milliseconds"),
					"id" => $shortname."_fs",
					"std" => "6000",
					"type" => "text");
					
$options[] = array( "name" => __("Slider Animation Duration"),
					"desc" => __("Set the speed of animations, in milliseconds"),
					"id" => $shortname."_fd",
					"std" => "2000",
					"type" => "text");
					
$options[] = array( "name" => __("Randomize"),
					"desc" => __("Randomize slide order on page load? (true/false)"),
					"id" => $shortname."_fr",
					"std" => "false",
					"type" => "text");
					
$options[] = array( "name" => __("Tagline Slider Options"),
                    "type" => "heading");
                    
$options[] = array( "name" => __("Slider Easing"),
					"desc" => __("There are a variety of effects available to include here.  Visit <a href='http://gsgd.co.uk/sandbox/jquery/easing/'>jQuery Easing Plugin</a> to find out more."),
					"id" => $shortname."_se",
					"std" => "",
					"type" => "text");
                    
$options[] = array( "name" => __("Slider Speed"),
					"desc" => __("Set the speed of the slideshow cycling"),
					"id" => $shortname."_ss",
					"std" => "600",
					"type" => "text");
	
//Home Template (WHAT WE DO)
					
$options[] = array( "name" => __("Home Template"),
                    "type" => "heading");
                    
$options[] = array( "name" => __("# of Tagline Posts"),
					"desc" => __("How Many Taglines Posts to Show?"),
					"id" => $shortname."_home_taglines_number",
					"std" => "6",
					"type" => "text");
                    
$options[] = array( "name" => __("<span style='color:#d55a4a'>Marketing Header</a>"),
					"desc" => __("This will introduce the section that will show the Marketing posts."),
					"id" => $shortname."_home_marketing",
					"std" => __("What We Do"),
					"type" => "text");  
					
$options[] = array( "name" => __("<span style='color:#d55a4a'>Marketing View All</a>"),
					"desc" => __("You can change the text for the view all text."),
					"id" => $shortname."_home_marketing_view",
					"std" => __("View All"),
					"type" => "text");  
					
$options[] = array( "name" => __("<span style='color:#d55a4a'>Marketing View All Link</a>"),
					"desc" => __("You can change the text for the view all link."),
					"id" => $shortname."_home_marketing_view_link",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => __("<span style='color:#d55a4a'># of Marketing Posts</span>"),
					"desc" => __("How Many Marketing Posts to Show?"),
					"id" => $shortname."_home_marketing_number",
					"std" => "6",
					"type" => "text");

//Home Template (LATEST BLOG)					

$options[] = array( "name" => __("Latest Blog Header"),
					"desc" => __("This will introduce the section that will show the latest blog posts."),
					"id" => $shortname."_home_blog",
					"std" => __("Latest Blog"),
					"type" => "text");  
					
$options[] = array( "name" => __("Latest Blog View All"),
					"desc" => __("You can change the text for the view all text."),
					"id" => $shortname."_home_blog_view",
					"std" => "View All",
					"type" => "text");  
					
$options[] = array( "name" => __("Latest Blog View All Link"),
					"desc" => __("You can change the text for the view all link."),
					"id" => $shortname."_home_blog_view_link",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => __("# of Blog Posts"),
					"desc" => __("How Many Blog Posts to Show?"),
					"id" => $shortname."_home_blog_number",
					"std" => "8",
					"type" => "text"); 
					
//Home Template (OUR CLIENTS)	

$options[] = array( "name" => __("<span style='color:#6498bc'>Our Clients Header</span>"),
					"desc" => __("This will introduce the section that will show the Our Clients posts."),
					"id" => $shortname."_home_clients",
					"std" => __("Our Clients"),
					"type" => "text");  
					
$options[] = array( "name" => __("<span style='color:#6498bc'>Our Clients View All</span>"),
					"desc" => __("You can change the text for the view all text."),
					"id" => $shortname."_home_clients_view",
					"std" => __("View All"),
					"type" => "text");  
					
$options[] = array( "name" => __("<span style='color:#6498bc'>Our Clients View All Link</span>"),
					"desc" => __("You can change the text for the view all link."),
					"id" => $shortname."_home_clients_view_link",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => __("<span style='color:#6498bc'># of Clients Posts</span>"),
					"desc" => __("How Many Clients Posts to Show?"),
					"id" => $shortname."_home_clients_number",
					"std" => "6",
					"type" => "text"); 
					

$options[] = array( "name" => __("Blog Stuff"),
                    "type" => "heading");
                    
                    
$options[] = array( "name" => __("Blog Template Header"),
					"desc" => __("Introduce your Blog."),
					"id" => $shortname."_bth",
					"std" => __("Our Blog"),
					"type" => "text");
                   
                    
$url =  OF_DIRECTORY . '/admin/images/';
$options[] = array( "name" => __("Choose A Blog Layout"),
					"desc" => __("You can choose between several blog layout options.  Be sure to create a new page, then choose that page in the Settings > Reading > Post Page tab.  That will become your blog page and the layout you choose here will be the layout the user sees.  :)"),
					"id" => $shortname."_blog",
					"std" => "",
					"type" => "images",
					"options" => array(
						'b1' => $url . 'b1.png',
						'b2' => $url . 'b2.png',
						)
					);
					

					

$options[] = array( "name" => __("Marketing Template"),
                    "type" => "heading");
                    
$options[] = array( "name" => __("Marketing Template Header"),
					"desc" => __("Introduce your Marketing template page."),
					"id" => $shortname."_mth",
					"std" => __("What We Do"),
					"type" => "text");
                    
   
 $options[] = array( "name" => __("# of Marketing Template Posts</span>"),
					"desc" => __("How Many Marketing Posts to Show on the Marketing Template page?"),
					"id" => $shortname."_mtn",
					"std" => "6",
					"type" => "text");  
					
$options[] = array( "name" => __("Clients Template"),
                    "type" => "heading");   
                    
$options[] = array( "name" => __("Clients Template Header"),
					"desc" => __("Introduce your Clients template page."),
					"id" => $shortname."_cth",
					"std" => __("Our Clients"),
					"type" => "text");
                    
   
 $options[] = array( "name" => __("# of Clients Template Posts</span>"),
					"desc" => __("How Many Clients Posts to Show on the Clients Template page?"),
					"id" => $shortname."_ctn",
					"std" => "6",
					"type" => "text"); 
					
$options[] = array( "name" => __("Gallery Template"),
                    "type" => "heading");  
                    
$options[] = array( "name" => __("Gallery Template Header"),
					"desc" => __("Introduce your Gallery template page."),
					"id" => $shortname."_gth",
					"std" => __("Our Gallery"),
					"type" => "text");
                    
   
 $options[] = array( "name" => __("# of Gallery Template Posts</span>"),
					"desc" => __("How Many Gallery Posts to Show on the Gallery Template page?"),
					"id" => $shortname."_gtn",
					"std" => "6",
					"type" => "text");             
					
					
$options[] = array( "name" => __("Social Icons"),
                    "type" => "heading");
                    
					
$options[] = array( "name" => __("Facebook URL"),
					"desc" => __("Enter Your Facebook URL<br/><span style='color:#FF5500'>http://www.facebook.com/pages/Siiimple/174221319304233</span>"),
					"id" => $shortname."_facebook_url",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => __("Twitter Username"),
					"desc" => __("Enter Your Twitter Username.<br/><span style='color:#FF5500'>http://www.twitter.com/siiimple</span>"),
					"id" => $shortname."_twitter_url",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => __("LinkedIn URL"),
					"desc" => __("Enter Your LinkedIn Username.<br/><span style='color:#FF5500'>http://www.flickr.com/photos/44952670@N02</span>"),
					"id" => $shortname."_link_url",
					"std" => "",
					"type" => "text");
					
  
$options[] = array( "name" => __("Flickr URL"),
					"desc" => __("Enter Your Flickr Username.<br/><span style='color:#FF5500'>http://www.flickr.com/photos/44952670@N02</span>"),
					"id" => $shortname."_flickr_url",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => __("Contact"),
					"desc" => __("Enter Your Address to your contact page.<br/><span style='color:#FF5500'>http://themes.siiimple.com/zoho/pageExample</span>"),
					"id" => $shortname."_email_url",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => __("RSS URL"),
					"desc" => __("Enter Your RSS feed.<br/><span style='color:#FF5500'>http://themes.siiimple.com/zoho/feed</span>"),
					"id" => $shortname."_rss_url",
					"std" => "",
					"type" => "text");
					                    
									
$options[] = array( "name" => __("Contact Email"),
                    "type" => "heading");
                    
$options[] = array( "name" => __('Contact Form Email Address','framework'),
					"desc" => __('Enter the email address where you\'d like to receive emails from the contact form, or leave blank to use admin email.','framework'),
					"id" => $shortname."_email",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => __("Accessories"),
                    "type" => "heading");
					
$options[] = array( "name" => __("Tracking Code"),
					"desc" => __("Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme."),
					"id" => $shortname."_ga_code",
					"std" => "",
					"type" => "textarea"); 
					
$options[] = array( "name" => __("Custom Favicon"),
					"desc" => __("Upload a 16px x 16px Png/Gif image that will represent your website's favicon."),
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload");
					
$options[] = array( "name" => __("Change text in the Footer?"),
					"desc" => __("This will change the entire text in the footer and replace it with what you want.  You can use html tags, like < p >< /p > for paragraph, etc.  Also, if you want to keep your rss feed in place use this:<br/> < ?php bloginfo('rss2_url'); ? > (no spaces before brackets)"),
					"id" => $shortname."_footer",
					"std" => "",
					"type" => "textarea");
			
					
update_option('of_template',$options); 					  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);

}
}
?>