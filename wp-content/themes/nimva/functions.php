<?php
#-----------------------------------------------------------------#
# Load text domain
#-----------------------------------------------------------------#

load_theme_textdomain('Nimva', TEMPLATEPATH.'/languages');

#-----------------------------------------------------------------#
# Allow shortcodes in widget text
#-----------------------------------------------------------------#
add_filter('widget_text', 'do_shortcode');
add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');

#-----------------------------------------------------------------#
# Register WP3.0+ Menus
#-----------------------------------------------------------------#

register_nav_menu('primary-menu', __('Primary Menu'));
register_nav_menu('footer-menu', __('Footer Menu'));
register_nav_menu('top-nav', __('Top Navigation'));
register_nav_menu('one-page-nav', __('One Page Navigation'));

// Initialize the mega menu framework
require_once( get_template_directory() . '/functions/megamenu/mega-menu-framework.php' );


#-----------------------------------------------------------------#
# Loads the Options Panel
#-----------------------------------------------------------------#
 
require_once ( get_template_directory() . '/admin/index.php');

#-----------------------------------------------------------------#
# Include Metaboxes
#-----------------------------------------------------------------#
include_once(get_template_directory().'/functions/metaboxes.php');

#-----------------------------------------------------------------#
# Automatic Feed Links
#-----------------------------------------------------------------#

if(function_exists('add_theme_support')) {
    add_theme_support('automatic-feed-links');
}

#-----------------------------------------------------------------#
# Register Sidebars
#-----------------------------------------------------------------#/
function nimva_widgets_init() {
	register_sidebar( array('name' => __( 'Blog Sidebar', 'Nimva' ),
		'id' => 'sidebar-1',
		'before_widget' => '<div class="widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<div class="title-outer"><h3>',
		'after_title' => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Portfolio Sidebar', 'Nimva' ),
		'id' => 'sidebar-2',
		'before_widget' => '<div class="widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<div class="title-outer"><h3>',
		'after_title' => '</h3></div>'
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar 1', 'Nimva' ),
		'id' => 'footer-1',
		'before_widget' => '<div class="widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<div class="comp"><h4>',
		'after_title' => '</h4></div>'
	) );
	register_sidebar( array(
		'name' => __( 'Footer Sidebar 2', 'Nimva' ),
		'id' => 'footer-2',
		'before_widget' => '<div class="widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<div class="comp"><h4>',
		'after_title' => '</h4></div>'
	) );
	register_sidebar( array(
		'name' => __( 'Footer Sidebar 3', 'Nimva' ),
		'id' => 'footer-3',
		'before_widget' => '<div class="widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<div class="comp"><h4>',
		'after_title' => '</h4></div>'
	) );
	register_sidebar( array(
		'name' => __( 'Footer Sidebar 4', 'Nimva' ),
		'id' => 'footer-4',
		'before_widget' => '<div class="widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<div class="comp"><h4>',
		'after_title' => '</h4></div>'
	) );
	register_sidebar( array(
		'name' => __( 'WooCommerce Sidebar', 'Nimva' ),
		'id' => 'woocommerce',
		'before_widget' => '<div class="widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<div class="title-outer"><h3>',
		'after_title' => '</h3></div>'
	) );
	
}
add_action( 'widgets_init', 'nimva_widgets_init' );


#-----------------------------------------------------------------#
# Custom Post Type
#-----------------------------------------------------------------#/
add_action('init', 'pyre_init');

function pyre_init() {
	global $data;
	register_post_type(
		'creativo_portfolio',
		array(
			'labels' => array(
				'name' => 'Portfolio',				
				'singular_name' => __('Portfolio', 'Nimva' ),
				'view_item' => 'View Portfolio',
				'add_new' => __('Add New Portfolio', 'Nimva' ),
				'add_new_item' => __('Add New Portfolio Post', 'Nimva' ),
				'edit_item' => __('Edit Portfolio', 'Nimva' ),
				'new_item' => __('New Portfolio', 'Nimva' ),
				'view_item' => __('View Portfolio', 'Nimva' ),
				'search_items' => __('Search Portfolio', 'Nimva' ),
				'not_found' =>  __('No Portfolio found', 'Nimva' ),
				'not_found_in_trash' => __('No Portfolio found in Trash', 'Nimva' ), 
				'parent_item_colon' => '',
			),
			'public' => true,
			'menu_icon' => 'dashicons-format-gallery',
			'has_archive' => true,
			'rewrite' => array('slug' => $data['portfolio_slug']),
			'supports' => array('title', 'editor', 'thumbnail','comments'),
			//'exclude_from_search' => true,
			'can_export' => true,
			'show_in_nav_menus' => true
		)
	);

	register_taxonomy('portfolio_category', 'creativo_portfolio', array('hierarchical' => true, 'label' => 'Portfolio Categories', 'query_var' => true, 'rewrite' => true));
	
	register_post_type(
		'faq',
		array(
			'labels' => array(
				'name' => 'FAQs',
				'singular_name' => __('FAQ', 'Nimva' ),
				'add_new' => __('Add New FAQ', 'Nimva' ),
				'add_new_item' => __('Add New FAQ', 'Nimva' ),
				'edit_item' => __('Edit FAQ', 'Nimva' ),
				'new_item' => __('New FAQ', 'Nimva' ),
				'view_item' => __('View FAQs', 'Nimva' ),
				'search_items' => __('Search FAQs', 'Nimva' ),
				'not_found' =>  __('No FAQs found', 'Nimva' ),
				'not_found_in_trash' => __('No FAQs found in Trash', 'Nimva' ), 
				'parent_item_colon' => '',
			),
			'public' => true,
			'menu_icon' => 'dashicons-format-status',
			'has_archive' => false,
			'rewrite' => array('slug' => 'faq-items'),
			'supports' => array('title', 'editor', 'thumbnail','comments'),
			'exclude_from_search' => true,
			'can_export' => true
		)
	);
	
	register_taxonomy('faq_category', 'faq', array('hierarchical' => true, 'label' => 'FAQ Categories', 'query_var' => true, 'rewrite' => true));
	
	register_post_type(
		'testimonials',
		array(
			'labels' => array(
				'name' => 'Testimonials',
				'singular_name' => __('Testimonial', 'Nimva' ),
				'add_new' => __('Add Testimonial', 'Nimva' ),
				'add_new_item' => __('Add New Testimonial', 'Nimva' ),
				'edit_item' => __('Edit Testimonial', 'Nimva' ),
				'new_item' => __('New Testimonial', 'Nimva' ),
				'view_item' => __('View Testimonial', 'Nimva' ),
				'search_items' => __('Search Testimonial', 'Nimva' ),
				'not_found' =>  __('No Testimonial found', 'Nimva' ),
				'not_found_in_trash' => __('No Testimonial found in Trash', 'Nimva' ), 
				'parent_item_colon' => '',				
			),
			'public' => true,
			'menu_icon' => 'dashicons-format-quote',
			'has_archive' => false,
			'rewrite' => array('slug' => 'testimonials'),
			'supports' => array('title', 'thumbnail', 'page-attributes'),
			'can_export' => true,
			'capability_type' => 'post'
		)
	);
	
	register_post_type(
		'clients',
		array(
			'labels' => array(
				'name' => 'Clients',
				'singular_name' => 'Client',
				'singular_name' => __('Client', 'Nimva' ),
				'add_new' => __('Add Client', 'Nimva' ),
				'add_new_item' => __('Add New Client', 'Nimva' ),
				'edit_item' => __('Edit Client', 'Nimva' ),
				'new_item' => __('New Client', 'Nimva' ),
				'view_item' => __('View Client', 'Nimva' ),
				'search_items' => __('Search Clients', 'Nimva' ),
				'not_found' =>  __('No Client found', 'Nimva' ),
				'not_found_in_trash' => __('No Client found in Trash', 'Nimva' ), 
				'parent_item_colon' => '',				
			),
			'public' => true,
			'menu_icon' => 'dashicons-groups',
			'has_archive' => false,
			'rewrite' => array('slug' => 'clients'),
			'supports' => array('title', 'thumbnail', 'page-attributes'),
			'can_export' => true,
			'capability_type' => 'post'
		)
	);
	
	register_post_type(
		'employees',
		array(
			'labels' => array(
				'name' => 'Employees',
				'singular_name' => 'Team Member',
				'add_new' => __('Add New Member','Nimva'),
				'add_new_item' => __('Add New Team Member', 'Nimva' ),
				'edit_item' => __('Edit Team Member','Nimva'),
				'new_item' => __('New Team Member','Nimva'),
				'view_item' => __('View Team Member','Nimva'),
				'search_items' => __('Search Team Members','Nimva'),
				'not_found' =>  __('No Team Member found','Nimva'),
				'not_found_in_trash' => __('No Team Members found in Trash','Nimva'),
				'parent_item_colon' => '',			
			),
			'public' => true,
			'menu_icon' => 'dashicons-businessman',
			'has_archive' => false,
			'rewrite' => array('slug' => 'employees'),
			'supports' => array('title', 'thumbnail', 'page-attributes'),
			'can_export' => true,
			'capability_type' => 'post'
		)
	);
	
	register_post_type(
		'pricing',
		array(
			'labels' => array(
				'name' => 'Pricing Tables',
				'singular_name' => 'Pricing Item',
				'add_new' => __('Add Pricing Item','Nimva'),
				'add_new_item' => __('Add New Pricing Item', 'Nimva' ),
				'edit_item' => __('Edit Pricing Item','Nimva'),
				'new_item' => __('New Pricing Item','Nimva'),
				'view_item' => __('View Pricing Item','Nimva'),
				'search_items' => __('Search Pricing Item','Nimva'),
				'not_found' =>  __('No Pricing Item found','Nimva'),
				'not_found_in_trash' => __('No Pricing Item found in Trash','Nimva'),
				'parent_item_colon' => '',			
			),
			'public' => true,
			'menu_icon' => 'dashicons-editor-ol',
			'has_archive' => false,
			'rewrite' => array('slug' => 'pricing'),
			'supports' => array('title', 'editor', 'page-attributes'),
			'can_export' => true,
			'capability_type' => 'post'
		)
	);

}

function custom_post_context_fixer() {
	if ( ( get_query_var( 'post_type' ) == 'clients' ) || ( get_query_var( 'post_type' ) == 'testimonials' ) || ( get_query_var( 'post_type' ) == 'employees' )) {
		global $wp_query;
		$wp_query->is_home = false;
		$wp_query->is_404 = true;
		$wp_query->is_single = false;
		$wp_query->is_singular = false;
	}
}
add_action( 'template_redirect', 'custom_post_context_fixer' );

#-----------------------------------------------------------------#
# Configure WP2.9+ Thumbnails 
#-----------------------------------------------------------------#/

if( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );

// Add post thumbnail functionality
/*
add_image_size('related-img', 160, 120, true); // ar merge din 470 sa iasa
add_image_size('related-port', 188, 146, true); // ar merge din 470 sa iasa


add_image_size('portfolio-two', 470, 320, true); //470x320
add_image_size('portfolio-three', 310, 210, true); // merge pt 470x320
add_image_size('portfolio-four', 280, 191, true);  // ar trebui sa devina 280x191 - 231x180
add_image_size('round-four', 231, 230, true);
add_image_size('blog-medium', 720, 324, true); // 
add_image_size('blog-small', 300, 200, true); // dispare
add_image_size('smallest-thumbnail',  64, 64, true);	// dispare
}
*/
}




#-----------------------------------------------------------------#
# Fixing filtering for shortcodes
#-----------------------------------------------------------------#/

function shortcode_empty_paragraph_fix($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']',
		'<br />[' => '['
    );

    $content = strtr($content, $array);
    return $content;
}

add_filter('the_content', 'shortcode_empty_paragraph_fix');


#-----------------------------------------------------------------#
# Allow the upload of custom fonts
#-----------------------------------------------------------------#/

add_filter('upload_mimes', 'nimva_filter_mime_types');
function nimva_filter_mime_types($mimes)
{
	$mimes['ttf'] = 'font/ttf';
	$mimes['woff'] = 'font/woff';
	$mimes['svg'] = 'font/svg';
	$mimes['eot'] = 'font/eot';

	return $mimes;
}


if ( is_admin() ) {
    $of_page= 'appearance_page_options-framework';
    add_action( "admin_print_scripts-$of_page", 'optionsframework_custom_js', 0 );
}

#-----------------------------------------------------------------#
# Nimva Javascript files
#-----------------------------------------------------------------#/

function nimva_js_scripts() {
	global $data;	
	
	wp_enqueue_style( 'js_composer_front' , get_bloginfo('template_directory') . '/css/js_composer_front.css' );
	wp_enqueue_style( 'tipsy' , get_bloginfo('template_directory') . '/css/tipsy.css' );
	wp_enqueue_style( 'retina' , get_bloginfo('template_directory') . '/css/retina.css' );
	wp_enqueue_style( 'bootstrap' , get_bloginfo('template_directory') . '/css/bootstrap.css' );
	wp_enqueue_style( 'fontawesome' , get_bloginfo('template_directory') . '/css/font-awesome.css' );
	wp_enqueue_style( 'prettyPhotoStyle' , get_bloginfo('template_directory') . '/css/prettyPhoto.css' );
	wp_enqueue_style( 'woo' , get_bloginfo('template_directory') . '/css/woo.css' );
	
	if($data['responsive']){ 
		wp_enqueue_style( 'responsive' , get_template_directory_uri() . '/css/responsive.css' );
	}
	
	wp_register_script( 'plug_cus', get_template_directory_uri() . '/js/plugins.js', array(), '1.9.5', TRUE);
	wp_register_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), '1.9.5', TRUE);
	wp_register_script( 'jhover', get_template_directory_uri() . '/js/jquery.hoverdir.js', array(), '1.9.5', TRUE);
	wp_register_script( 'ytbplayer', get_template_directory_uri() . '/js/jquery.mb.YTPlayer.min.js', array(), '1.9.5', TRUE);

	wp_register_script( 'smoothscroll', get_template_directory_uri() . '/js/SmoothScroll.js', array('jquery'), '1.9.5' , true );
	wp_register_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array(), '1.9.5', TRUE);	
	wp_register_script( 'waypoints', get_template_directory_uri() .'/js/waypoints.min.js', array(), '1.9.5', TRUE );
	//wp_register_script( 'googlemap', get_template_directory_uri() . '/js/jquery.gmap.js');
	wp_register_script( 'googlemap_sensor', '//maps.google.com/maps/api/js', array(), '1.9.5', TRUE);
	
	//wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'plug_cus' );
	wp_enqueue_script( 'ytbplayer' );	
	wp_enqueue_script( 'custom' );
	wp_enqueue_script( 'jhover' );	
	
	if($data['smooth_scrolling']){
		wp_enqueue_script( 'smoothscroll');
	}
	wp_enqueue_script( 'superfish'); 
	wp_enqueue_script( 'waypoints');
	
	if(class_exists('Woocommerce')) {
		wp_enqueue_script( 'woo', get_template_directory_uri().'/js/woo.js', array(), '1.9.4', TRUE );
	}
	
	wp_enqueue_script( 'googlemap_sensor');

	if($data['google_body'] && $data['google_body'] != 'Select Font') {
		$ggl_font[ urlencode( $data['google_body'] ) ] = '' . urlencode( $data['google_body'] );
	}

	if($data['google_nav'] && $data['google_nav'] != 'Select Font') {
		$ggl_font[ urlencode( $data['google_nav'] ) ] = '' . urlencode( $data['google_nav'] );
	}

	if($data['google_headings'] && $data['google_headings'] != 'Select Font') {
		$ggl_font[ urlencode( $data['google_headings'] ) ] = '' . urlencode( $data['google_headings'] );
	}

	if($data['google_footer_headings'] && $data['google_footer_headings'] != 'Select Font') {
		$ggl_font[ urlencode( $data['google_footer_headings'] ) ] = '' . urlencode( $data['google_footer_headings'] );
	}

	if($data['tagline_font'] && $data['tagline_font'] != 'Select Font') {
		$ggl_font[ urlencode( $data['tagline_font'] ) ] = '' . urlencode( $data['tagline_font'] );
	}

	if($data['text_logo_font'] && $data['text_logo_font'] != 'Select Font') {
		$ggl_font[ urlencode( $data['text_logo_font'] ) ] = '' . urlencode( $data['text_logo_font'] );
	}

	if ( isset( $ggl_font ) && $ggl_font ) {
		$font_families = '';
						
		$font_styles = $font_subsets = '';
			
		$font_subsets = 'latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese';
		$font_styles = '300,400,500,600,700';

		foreach ( $ggl_font as $g_font ) {
			$font_families .= sprintf( '%s:%s|', $g_font, urlencode( $font_styles ) );
		}
			
		if ( $font_subsets ) {
			$font_families = sprintf( '%s&%s', rtrim( $font_families, '|' ), $font_subsets );
		} else {
			$font_families = rtrim( $font_families, '|' );
		}

		wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=' . $font_families, array(), '' );
	}
	
}
add_action('wp_enqueue_scripts', 'nimva_js_scripts');

function optionsframework_custom_js () {
	wp_register_script( 'nimva_custom_js', get_template_directory_uri() .'/js/options-custom.js', array( 'jquery') );
	wp_enqueue_script( 'nimva_custom_js' );
}
/*
	if($data['disable_visual_composer'] !='1'){
		if (!class_exists('WPBakeryVisualComposerAbstract')) {
		  $dir = dirname(__FILE__) . '/builder/';
		  $composer_settings = Array(
			  'APP_ROOT'      => $dir . '/js_composer',
			  'WP_ROOT'       => dirname( dirname( dirname( dirname($dir ) ) ) ). '/',
			  'APP_DIR'       => basename( $dir ) . '/js_composer/',
			  'CONFIG'        => $dir . '/js_composer/config/',
			  'ASSETS_DIR'    => 'assets/',
			  'COMPOSER'      => $dir . '/js_composer/composer/',
			  'COMPOSER_LIB'  => $dir . '/js_composer/composer/lib/',
			  'SHORTCODES_LIB'  => $dir . '/js_composer/composer/lib/shortcodes/',
			  'USER_DIR_NAME'  => 'vc_templates', 
		 
			  //for which content types Visual Composer should be enabled by default
			  'default_post_types' => Array('page')
		  );
		  require_once locate_template('/builder/js_composer/js_composer.php');
		  $wpVC_setup->init($composer_settings);
		}
	}
*/


#-----------------------------------------------------------------#
# Auto plugin activation
#-----------------------------------------------------------------#

require_once('functions/plugin/class-tgm-plugin-activation.php');

add_action('tgmpa_register', 'nimva_register_required_plugins');
function nimva_register_required_plugins() {
	$plugins = array(
		array(
			'name'     				=> '1. Visual Composer', // The plugin name
			'slug'     				=> 'js_composer', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/functions/plugin/js_composer.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '4.12', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> '2. Layer Slider', // The plugin name
			'slug'     				=> 'LayerSlider', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/functions/plugin/LayerSlider.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '5.6.8', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'Post Types Order', // The plugin name
			'slug'     				=> 'post-types-order', // The plugin slug (typically the folder name)			
			'required' 				=> false // If false, the plugin is only 'recommended' instead of required			
		),
		array(
			'name'     				=> 'Contact Form 7', // The plugin name
			'slug'     				=> 'contact-form-7', // The plugin slug (typically the folder name)			
			'required' 				=> false // If false, the plugin is only 'recommended' instead of required			
		)
	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'nimva';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin installed or updated: %1$s.', 'This theme requires the following plugins installed or updated: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin installed or updated: %1$s.', 'This theme recommends the following plugins installed or updated: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa($plugins, $config);
}


#-----------------------------------------------------------------#
# Featured Images Function Setup
#-----------------------------------------------------------------#

require_once('functions/plugin/multiple-featured-images/multiple-featured-images.php');

if( class_exists( 'kdMultipleFeaturedImages' )) {
		$i = 2;

		while($i <= $data['featured_images']) {
	        $args = array(
	                'id' => 'featured-image-'.$i,
	                'post_type' => 'post',      // Set this to post or page
	                'labels' => array(
	                    'name'      => 'Featured image '.$i,
	                    'set'       => 'Set featured image '.$i,
	                    'remove'    => 'Remove featured image '.$i,
	                    'use'       => 'Use as featured image '.$i,
	                )
	        );

	        new kdMultipleFeaturedImages( $args );

	        $args = array(
	                'id' => 'featured-image-'.$i,
	                'post_type' => 'creativo_portfolio',      // Set this to post or page
	                'labels' => array(
	                    'name'      => 'Featured image '.$i,
	                    'set'       => 'Set featured image '.$i,
	                    'remove'    => 'Remove featured image '.$i,
	                    'use'       => 'Use as featured image '.$i,
	                )
	        );

	        new kdMultipleFeaturedImages( $args );

	        $i++;
    	}
}


#-----------------------------------------------------------------#
# Load Custom Functions
#-----------------------------------------------------------------#

include_once('functions/custom_functions.php');

new FontawesomeMenus();

#-----------------------------------------------------------------#
# Load Widgets & Shortcodes
#-----------------------------------------------------------------#

// Add the Theme Shortcodes
include("functions/shortcodes.php");

// Add flickr widget
include("functions/widget-flickr.php");
include("functions/widget-contact.php");
include("functions/widget-tweets.php");
include("functions/widget-video.php");
include("functions/widget-tabs.php");
include("functions/widget-social.php");
include('functions/widget-recentportfolios.php');
include('functions/widget-recentposts.php');
include('functions/widget-recentportfolios-footer.php');
include('functions/widget-footer-testimonial.php');

/* Extend Visual Composer */
require_once ( get_template_directory() . "/vc/vc_extend.php" );


#-----------------------------------------------------------------#
# Load Multi Sidebars
#-----------------------------------------------------------------

include_once('functions/plugin/multiple_sidebars.php');


#-----------------------------------------------------------------#
# Add different classes for next previous link attributes
#-----------------------------------------------------------------#

add_filter('next_post_link_attributes', 'posts_link_attributes_1');
add_filter('previous_post_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="port-nav-prev"';
}
function posts_link_attributes_2() {
    return 'class="port-nav-next"';
}


#-----------------------------------------------------------------#
# Add extra styling for Nimva Shortcodes
#-----------------------------------------------------------------#

add_action('admin_head', 'nimva_admin_css');
function nimva_admin_css() {
	echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/css/admin_shortcodes.css">';
}

require_once('wp-updates-theme.php');
new WPUpdatesThemeUpdater_1041( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );

include_once( get_template_directory() . "/themeupgrader.php" );
new EWA_Theme_Upgrader( "http://rockythemes.com/api", 2 );
