</div><!-- END CONTAINER -->

<div id="footer-top">
	<div class="container">

		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer One') ) : ?><?php endif; ?>			
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Two') ) : ?><?php endif; ?>

		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Three') ) : ?><?php endif; ?>
		
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Four') ) : ?><?php endif; ?>
		
	</div><!-- END CONTAINER -->

</div><!-- END FOOTER TOP -->

<div id="footer-bottom">

	<div class="container">

		<div class="row">
		
			<div class="span5">
	
				<?php wp_nav_menu( array( 'menu_class' => 'footer-nav', 'theme_location' => 'footer' ) ); ?>
	
			</div><!-- END SPAN5 -->
	
			<div class="span5" id="foot-left">
	
				<?php if ( $footer = get_option('of_footer') ) { ?>
		
				<p class="footer-base"><?php echo stripslashes ( $footer) ; ?></p>
			
				<?php } else { ?>
		
				<p class="footer-base">Project 9 &copy; 2011-2012</p>
		
				<?php } ?>
		
			</div><!-- END SPAN5 -->
	
		</div>

	</div>
	
</div>

<?php include (TEMPLATEPATH . '/framework/includes/footer-scripts.php'); ?>		

<?php wp_footer(); ?>

</body>

</html>