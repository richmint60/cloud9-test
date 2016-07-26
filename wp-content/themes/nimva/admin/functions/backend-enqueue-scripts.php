<?php


/*
***** Theme backend scripts
*/
function theme_admin_add_script() {

	//wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('jquery-ui-slider');

    /* theme custom script should always be the last to enqueue */
	wp_enqueue_script( 'admin-js-script', ADMIN_DIR . 'assets/js/backend-scripts.js');
	
}

/*
***** Theme backend scripts
*/
function theme_admin_add_style() {	
		
		wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/css/font-awesome.css', false, false, 'all' );
		wp_enqueue_style( 'icon-style',  ADMIN_DIR.'assets/css/icon-style.css', false, false, 'all' );
		wp_enqueue_style( 'chosen_style', get_template_directory_uri() . '/css/chosen-select.css');
		//wp_enqueue_style( 'mk-icomoon', get_template_directory_uri().'/icomoon-fonts.css', false, false, 'all' );
 
}


/*
***** Initialize theme scripts and styles
*/
if ( theme_is_post_type()) {
	add_action( 'admin_init', 'theme_admin_add_script' );
	add_action( 'admin_init', 'theme_admin_add_style' );
//	add_action('admin_head', 'add_script_to_head');
}



