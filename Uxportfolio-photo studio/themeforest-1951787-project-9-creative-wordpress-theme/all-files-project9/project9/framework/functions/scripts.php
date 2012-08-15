<?php
function siiimple_enqueue_scripts() {
	if(!is_admin()){
		
		wp_deregister_script( 'jquery' );
		
		wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js');
		
		wp_enqueue_script( 'flex', SIIIMPLE_JS .'/jquery.flexslider-min.js', array('jquery'));
		
		wp_enqueue_script( 'custom', SIIIMPLE_JS .'/custom.js', array('jquery'));
		
		wp_enqueue_script( 'slides', SIIIMPLE_JS .'/slides.min.jquery.js', array('jquery'));
		
		wp_enqueue_script( 'jplayer', SIIIMPLE_JS .'/jquery.jplayer.min.js', array('jquery'));
		
		wp_enqueue_script( 'isotope', SIIIMPLE_JS .'/jquery.isotope.min.js', array('jquery'));
		
		wp_enqueue_script( 'masonry', SIIIMPLE_JS .'/jquery.masonry.min.js', array('jquery'));
		
		wp_enqueue_script( 'easySlider', SIIIMPLE_JS .'/easySlider1.7.js', array('jquery'));
		
		wp_enqueue_script( 'superfish', SIIIMPLE_JS .'/superfish.js', array('jquery'));
		
		wp_enqueue_script( 'supersubs', SIIIMPLE_JS .'/supersubs.js', array('jquery'));
		
		wp_enqueue_script( 'easing', SIIIMPLE_JS .'/jquery.easing.1.3.js', array('jquery'));
		
		}
}
add_action('wp_print_scripts', 'siiimple_enqueue_scripts');
add_action('wp_print_styles', 'siiimple_enqueue_scripts');
?>