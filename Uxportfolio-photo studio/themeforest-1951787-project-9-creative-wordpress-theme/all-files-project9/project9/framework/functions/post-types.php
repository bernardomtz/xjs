<?php
	add_action('init', 'create_post_types');
	function create_post_types() {
	
	register_post_type(
			'slider',
			array(
				'labels' => array(
					'name' => __( 'Slider' ),
					'singular_name' => __( 'Slider' ),
					'add_new' => __( 'Add New Slider Item' ),
					'add_new_item' => __( 'Add New Slider Item' ),
					'edit' => __( 'Edit' ),
					'edit_item' => __( 'Edit Slider' ),
					'new_item' => __( 'New Slider Item' ),
					'view' => __( 'View Slider' ),
					'view_item' => __( 'View Slider' ),
					'search_items' => __( 'Search Slider Items' ),
					'not_found' => __( 'No Slides found' ),
					'not_found_in_trash' => __( 'No Slides found in the Trash' ),
				),
				'public' => true,
				'show_ui' => true,
				'menu_position' => 4,
				'menu_icon' => get_stylesheet_directory_uri() . '/admin/images/page.png',
				'query_var' => true,
				'taxonomies' => array('category', 'post_tag'),
				'supports' => array( 'title','thumbnail', 'custom-fields','excerpt', 'editor', 'comments'),
				'rewrite' => array( 'slug' => 'slides', 'with_front' => false ),
				'capability_type' => 'post',
				'can_export' => true
			)
		);
		
		register_post_type(
			'taglines',
			array(
				'labels' => array(
					'name' => __( 'Taglines' ),
					'singular_name' => __( 'Taglines' ),
					'add_new' => __( 'Add New Tagline' ),
					'add_new_item' => __( 'Add New Tagline' ),
					'edit' => __( 'Edit' ),
					'edit_item' => __( 'Edit Taglines' ),
					'new_item' => __( 'New Tagline' ),
					'view' => __( 'View Taglines' ),
					'view_item' => __( 'View Taglines' ),
					'search_items' => __( 'Search Taglines' ),
					'not_found' => __( 'No Taglines found' ),
					'not_found_in_trash' => __( 'No Taglines found in the Trash' ),
				),
				'public' => true,
				'show_ui' => true,
				'menu_position' => 5,
				'menu_icon' => get_stylesheet_directory_uri() . '/admin/images/page.png',
				'query_var' => true,
				'taxonomies' => array('category', 'post_tag'),
				'supports' => array( 'title','thumbnail', 'custom-fields', 'excerpt','editor', 'comments'),
				'rewrite' => array( 'slug' => 'tagline', 'with_front' => false ),
				'can_export' => true
			)
		);
		
		register_post_type(
			'marketing',
			array(
				'labels' => array(
					'name' => __( 'Marketing' ),
					'singular_name' => __( 'Marketing' ),
					'add_new' => __( 'Add New Item' ),
					'add_new_item' => __( 'Add New Item' ),
					'edit' => __( 'Edit' ),
					'edit_item' => __( 'Edit Marketing' ),
					'new_item' => __( 'New Marketing Item' ),
					'view' => __( 'View Marketing' ),
					'view_item' => __( 'View Marketing' ),
					'search_items' => __( 'Search Marketing Items' ),
					'not_found' => __( 'No Marketing Items found' ),
					'not_found_in_trash' => __( 'No Marketing items found in the Trash' ),
				),
				'public' => true,
				'show_ui' => true,
				'menu_position' => 6,
				'menu_icon' => get_stylesheet_directory_uri() . '/admin/images/page.png',
				'query_var' => true,
				'taxonomies' => array('category', 'post_tag'),
				'supports' => array( 'title','thumbnail', 'custom-fields','excerpt', 'editor', 'comments'),
				'rewrite' => array( 'slug' => 'marketing', 'with_front' => false ),
				'capability_type' => 'post',
				'can_export' => true
			)
		);
		
		
		
		
		register_post_type(
			'logos',
			array(
				'labels' => array(
					'name' => __( 'Clients' ),
					'singular_name' => __( 'Clients' ),
					'add_new' => __( 'Add New Item' ),
					'add_new_item' => __( 'Add New Client' ),
					'edit' => __( 'Edit' ),
					'edit_item' => __( 'Edit Clients' ),
					'new_item' => __( 'New Clients Item' ),
					'view' => __( 'View Clients' ),
					'view_item' => __( 'View Clients' ),
					'search_items' => __( 'Search Clients Items' ),
					'not_found' => __( 'No Clients Items found' ),
					'not_found_in_trash' => __( 'No Clients items found in the Trash' ),
				),
				'public' => true,
				'show_ui' => true,
				'menu_position' => 7,
				'menu_icon' => get_stylesheet_directory_uri() . '/admin/images/page.png',
				'query_var' => true,
				'taxonomies' => array('category', 'post_tag'),
				'supports' => array( 'title','thumbnail', 'custom-fields', 'editor', 'comments'),
				'rewrite' => array( 'slug' => 'clients', 'with_front' => false ),
				'capability_type' => 'post',
				'can_export' => true
			)
		);
		
		register_post_type(
			'gallery',
			array(
				'labels' => array(
					'name' => __( 'Gallery' ),
					'singular_name' => __( 'Gallery' ),
					'add_new' => __( 'Add Gallery Item' ),
					'add_new_item' => __( 'Add Gallery Item' ),
					'edit' => __( 'Edit' ),
					'edit_item' => __( 'Edit Gallery' ),
					'new_item' => __( 'New Gallery Item' ),
					'view' => __( 'View Gallery' ),
					'view_item' => __( 'View Gallery' ),
					'search_items' => __( 'Search Gallery Items' ),
					'not_found' => __( 'No Gallery Items found' ),
					'not_found_in_trash' => __( 'No Gallery items found in the Trash' ),
				),
				'public' => true,
				'show_ui' => true,
				'menu_position' => 8,
				'menu_icon' => get_stylesheet_directory_uri() . '/admin/images/page.png',
				'query_var' => true,
				'taxonomies' => array('category', 'post_tag'),
				'supports' => array( 'title','thumbnail','excerpt', 'custom-fields', 'editor'),
				'rewrite' => array( 'slug' => 'gallery', 'with_front' => false ),
				'capability_type' => 'post',
				'can_export' => true
			)
		);


	}
?>