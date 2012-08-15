<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
	<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
	<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
	<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->

	<head>
	
		<!-- CHARSET -->
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		
		<!-- VIEWPORT WIDTH FOR MOBILE DEVICES -->
		<meta name="viewport" content="width=device-width" />
		
		<!-- CONTENT TYPE -->
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
		<!-- TITLE -->
		<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
		
		<!-- MAIN STYLESHEET -->
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		
		<!-- RESPONSIVE -->
		<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/framework/css/bootstrap-responsive.css" />
		
		<!-- BOOTSTRAP -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/framework/css/bootstrap.min.css" type="text/css" media="screen" />
		
		<!-- FLEX SLIDER -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/framework/css/flexslider.css" type="text/css" media="screen" />
		
		<!-- SLIDES -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/framework/css/slides.css" type="text/css" media="screen" />
		
		<!-- SUPERFISH -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/framework/css/superfish.css" type="text/css" media="screen" />
		
		<!-- PROFILE -->
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		
		<!-- PINGBACK -->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
		<!-- FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
		
		<!-- THREADED COMMENTS -->
		<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
		
		<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/framework/css/ie.css">
		<![endif]-->

		<!-- IE Fix for HTML5 Tags -->
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<!-- THE HEAD STUFF -->
		<?php wp_head(); ?>
	
	</head>
	
		<body <?php body_class(); ?> >

    		<div class="navbar navbar-fixed-top">

      			<div class="navbar-inner">
        
        			<div class="container">
        
        				<?php if (get_option('of_text_logo') == 'true') { ?>
        
        					<a class="brand" href="<?php echo home_url(); ?>/"><span class="name"><?php bloginfo( 'name' ); ?></span><span id="sub-logo">/&nbsp;<?php bloginfo('description'); ?></span>
</a>        
        				<?php } elseif (get_option('of_logo')) { ?>
        
       		 				<a href="<?php echo home_url(); ?>/" class="logo"><img src="<?php echo get_option('of_logo'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
        
        				<?php } else { ?>
         
         					<a class="brand" href="<?php echo home_url(); ?>/"><span class="name"><?php bloginfo( 'name' ); ?></span><span id="sub-logo">/&nbsp;<?php bloginfo('description'); ?></span></a>
         
         				<?php } ?>

          				<div class="project-menu">
          				
          					<nav>
            
              					<?php wp_nav_menu( array( 'menu_class' => 'sf-menu', 'theme_location' => 'primary' ) ); ?>
              				
              				</nav><!-- END NAV -->
              
          				</div><!-- END PROJECT MENU -->
        
        			</div><!-- END CONTAINER -->
      
      			</div><!-- END NAVBAR INNER -->
    
    		</div><!-- END NAVBAR -->		