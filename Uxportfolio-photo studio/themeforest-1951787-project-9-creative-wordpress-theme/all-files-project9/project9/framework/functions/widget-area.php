<?php
///////////////////////////////////////////////// Sidebar Widgets
if ( function_exists('register_sidebar') )

register_sidebar(array('name'=>'Footer One',
	'before_widget' => '<div class="span3">',
	'after_widget' => '</div>',
	'before_title' => '<h2 class="footer">',
	'after_title' => '</h2>',
));

register_sidebar(array('name'=>'Footer Two',
	'before_widget' => '<div class="span3">',
	'after_widget' => '</div>',
	'before_title' => '<h2 class="footer">',
	'after_title' => '</h2>',
));

register_sidebar(array('name'=>'Footer Three',
	'before_widget' => '<div class="span3">',
	'after_widget' => '</div>',
	'before_title' => '<h2 class="footer">',
	'after_title' => '</h2>',
));

register_sidebar(array('name'=>'Footer Four',
	'before_widget' => '<div class="span3" style="border-right:0">',
	'after_widget' => '</div>',
	'before_title' => '<h2 class="footer">',
	'after_title' => '</h2>',
));

register_sidebar(array('name'=>'Sidebar One',
	'before_widget' => '<ul class="clearfix">',
	'after_widget' => '</ul>',
	'before_title' => '<h4 class="sidebar">',
	'after_title' => '</h4>',
));
register_sidebar(array('name'=>'Sidebar Two',
	'before_widget' => '<ul class="clearfix">',
	'after_widget' => '</ul>',
	'before_title' => '<h4 class="sidebar">',
	'after_title' => '</h4>',
));
register_sidebar(array('name'=>'Sidebar Three',
	'before_widget' => '<ul class="clearfix">',
	'after_widget' => '</ul>',
	'before_title' => '<h4 class="sidebar">',
	'after_title' => '</h4>',
));
register_sidebar(array('name'=>'Sidebar Four',
	'before_widget' => '<ul class="clearfix">',
	'after_widget' => '</ul>',
	'before_title' => '<h4 class="sidebar">',
	'after_title' => '</h4>',
));
register_sidebar(array('name'=>'Sidebar Five',
	'before_widget' => '<ul class="clearfix" style="margin-bottom:0; background:none;">',
	'after_widget' => '</ul>',
	'before_title' => '<h4 class="sidebar">',
	'after_title' => '</h4>',
));
?>