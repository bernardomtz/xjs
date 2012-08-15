<?php $blog = get_option('of_blog'); ?>
					
<?php if ( $blog == 'b1' ) {
					
include (TEMPLATEPATH . '/framework/includes/masonry-blog.php');
						
} elseif ( $blog == 'b2' ) {
						
include (TEMPLATEPATH . '/framework/includes/masonry-blog-sidebar.php');
						
} else {
						
include (TEMPLATEPATH . '/framework/includes/masonry-blog.php');
						
}  ?>