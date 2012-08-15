<?php
// Define Directory Constants
define('SIIIMPLE_FRAMEWORK', TEMPLATEPATH . '/framework');
define('SIIIMPLE_ADMIN', SIIIMPLE_FRAMEWORK . '/admin');
define('SIIIMPLE_FUNCTIONS', SIIIMPLE_FRAMEWORK . '/functions');
define('SIIIMPLE_INCLUDES', SIIIMPLE_FRAMEWORK . '/includes');
define('SIIIMPLE_JS', get_template_directory_uri() . '/framework/scripts' );

// Define Folder Constants
define('SIIIMPLE_SCRIPTS_FOLDER', get_bloginfo('template_url') . '/framework/scripts');

// Load Some Basic Theme Functions
require_once(SIIIMPLE_FUNCTIONS . '/func.php');

// Load Header Scripts
require_once(SIIIMPLE_FUNCTIONS . '/scripts.php');

// Load Meta Box
require_once(SIIIMPLE_FUNCTIONS . '/meta-box.php');

// Load Meta
require_once(SIIIMPLE_FUNCTIONS . '/meta.php');

// Load Meta
require_once(SIIIMPLE_FUNCTIONS . '/flickr.php');

// Load Meta
require_once(SIIIMPLE_FUNCTIONS . '/widget-area.php');

// Load Meta
require_once(SIIIMPLE_FUNCTIONS . '/twitter-widget.php');

// Shortcodes
require_once(SIIIMPLE_FUNCTIONS . '/shortcodes.php');

// Load Post Types
require_once(SIIIMPLE_FUNCTIONS . '/post-types.php');

?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Options Framework Functions
/*-----------------------------------------------------------------------------------*/

/* Set the file path based on whether the Options Framework is in a parent theme or child theme */

if ( STYLESHEETPATH == TEMPLATEPATH ) {
	define('OF_FILEPATH', TEMPLATEPATH);
	define('OF_DIRECTORY', get_bloginfo('template_directory'));
} else {
	define('OF_FILEPATH', STYLESHEETPATH);
	define('OF_DIRECTORY', get_bloginfo('stylesheet_directory'));
}

// Custom Taxonomy Code  
// Custom Taxonomy Code  
// Custom Taxonomy Code  
add_action( 'init', 'build_taxonomies', 0 ); 

function build_taxonomies() {

register_taxonomy( 'gallery_sorting', 'gallery', array( 'hierarchical' => true, 'label' => 'Gallery Sorting', 'query_var' => true, 'rewrite' => true ) ); 


}
// Custom Taxonomy Code  
// Custom Taxonomy Code  
// Custom Taxonomy Code

/* These files build out the options interface.  Likely won't need to edit these. */

require_once (OF_FILEPATH . '/admin/admin-functions.php');		// Custom functions and plugins
require_once (OF_FILEPATH . '/admin/admin-interface.php');		// Admin Interfaces (options,framework, seo)

/* These files build out the theme specific options and associated functions. */

require_once (OF_FILEPATH . '/admin/theme-options.php'); 		// Options panel settings and custom settings
require_once (OF_FILEPATH . '/admin/theme-functions.php'); 	// Theme actions based on options settings

?>