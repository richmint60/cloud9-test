<?php
function extra_vc_style() {
    wp_enqueue_style( 'vc_style' , get_template_directory_uri() . '/css/vc_style.css' );
}

add_action( 'wp_enqueue_scripts', 'extra_vc_style', 15 );
function get_coordinates( $address, $force_refresh = false ) {

	    $address_hash = md5( $address );

	    $coordinates = get_transient( $address_hash );

	    if ( $force_refresh || 
	    	 $coordinates === false
	    ) {

	    	$args       = array( 'address' => urlencode( $address ), 'sensor' => 'false' );
	    	$url        = add_query_arg( $args, 'http://maps.googleapis.com/maps/api/geocode/json' );
	     	$response 	= wp_remote_get( $url );

	     	if( is_wp_error( $response ) )
	     		return;

	     	$data = wp_remote_retrieve_body( $response );

	     	if( is_wp_error( $data ) )
	     		return;

			if ( $response['response']['code'] == 200 ) {

				$data = json_decode( $data );

				if ( $data->status === 'OK' ) {

				  	$coordinates = $data->results[0]->geometry->location;

				  	$cache_value['lat'] 	= $coordinates->lat;
				  	$cache_value['lng'] 	= $coordinates->lng;
				  	$cache_value['address'] = (string) $data->results[0]->formatted_address;

				  	// cache coordinates for 3 months
				  	set_transient($address_hash, $cache_value, 3600*24*30*3);
				  	$data = $cache_value;

				} elseif ( $data->status === 'ZERO_RESULTS' ) {
				  	return __( 'No location found for the entered address.', 'Nimva' );
				} elseif( $data->status === 'INVALID_REQUEST' ) {
				   	return __( 'Invalid request. Did you enter an address?', 'Nimva' );
				} else {
					return __( 'Something went wrong while retrieving your map, please ensure you have entered the short code correctly.', 'Nimva' );
				}

			} else {
			 	return __( 'Unable to contact Google API service.', 'Nimva' );
			}

	    } else {
	       // return cached results
	       $data = $coordinates;
	    }

	    return $data;

	}
#-----------------------------------------------------------------#
# Hex to RGBA function
#-----------------------------------------------------------------#

global $data;

function hex2rgba($hex) {

	$hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}


#-----------------------------------------------------------------#
# Hex to RGBA function
#-----------------------------------------------------------------#

function hexDarker( $hex, $factor = 30 ) {
    $new_hex = '';
    if ( $hex == '' || $factor == '' ) {
        return false;
    }

    $hex = str_replace( '#', '', $hex );

    $base['R'] = hexdec( $hex{0}.$hex{1} );
    $base['G'] = hexdec( $hex{2}.$hex{3} );
    $base['B'] = hexdec( $hex{4}.$hex{5} );


    foreach ( $base as $k => $v ) {
        $amount = $v / 100;
        $amount = round( $amount * $factor );
        $new_decimal = $v - $amount;

        $new_hex_component = dechex( $new_decimal );
        if ( strlen( $new_hex_component ) < 2 ) { $new_hex_component = "0".$new_hex_component; }
        $new_hex .= $new_hex_component;
    }

    return '#'.$new_hex;
}

#-----------------------------------------------------------------#
# Fontawesome in Menus
#-----------------------------------------------------------------#
class FontawesomeMenus{
	function fontawesome_menu( $nav ) {
        $menu = preg_replace_callback(
                            '/<li((?:[^>]+)(fa-[^ ]+ )(?:[^>]+))><a[^>]+>(.*)<\/a>/',
                            array( $this, 'fontawesome_replace' ),
                            $nav
                        );
        print $menu;
    }
    function fontawesome_replace( $a ) {
        $listitem = $a[0];
        $icon = $a[2];
        $link_text = $a[3];
        $str_noicon = str_replace( $icon, '', $listitem );
        $str = str_replace( $link_text, '<span class="megamenu-icon text-menu-icon"><i class="fa ' . trim( $icon ) . '"></i></span><span class="menu-text"> ' . $link_text . '</span>', $str_noicon );
        return $str;
    }
	function __construct() {        
        add_filter( 'wp_nav_menu' , array( $this, 'fontawesome_menu' ), 10, 2);        
    }
}

#-----------------------------------------------------------------#
# Content Strip Tags functions
#-----------------------------------------------------------------#

function nv_content($limit, $strip_html) {
	global $more;	

	$test_strip_html = $strip_html;

	if($strip_html == "true" || $strip_html == true) {
		$test_strip_html = true;
	}

	if($strip_html == "false" || $strip_html == false) {
		$test_strip_html = false;
	}	
	//$test_strip_html = true;
	if($test_strip_html) {		
		$raw_content = strip_shortcodes( strip_tags( get_the_content() ) );
	} else {		
		$raw_content = strip_shortcodes( get_the_content() );
	}

	if($raw_content) {
		
		$content = explode(' ', $raw_content, $limit);
		
		if (count($content)>=$limit) {
			array_pop($content);
			$content = implode(" ",$content).'...';
		} 
		else {
			$content = implode(" ",$content);
		}	
		
		$content = preg_replace('/\[.+\]/','', $content);
		if(!$test_strip_html) {
			$content = apply_filters('the_content', $content); 
		}
		$content = str_replace(']]>', ']]&gt;', $content);
		
		return $content;
	}
}


#-----------------------------------------------------------------#
# Comment Styling
#-----------------------------------------------------------------#

if( !function_exists( 'comment_style' ) ) {
    function comment_style($comment, $args, $depth) {

        $GLOBALS['comment'] = $comment; ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     
            <div id="comment-<?php comment_ID(); ?>" class="comment-wrap clearfix">
            	
                <div class="comment-meta">
                	<div class="comment-author vcard">
                        <span class="comment-avatar clearfix">
                            <?php echo get_avatar($comment,$size='55'); ?>
                        </span> 
                    </div>       
                </div>
                
                <div class="comment-content clearfix">
                	<div class="comment-author">
                    	<?php echo get_comment_author_link(); ?>
                        <span>
                        	<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'framework'), get_comment_date(),  get_comment_time()) ?></a> &middot; 
                            <?php edit_comment_link(__('(Edit)', 'framework'),'  ','') ?> &middot; <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                        </span>
                    </div>
                    <?php comment_text() ?>
                </div>

<!--
                <div style=" max-width:300px; float:left">
                    <div class="comment-author vcard">
                        <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
                    </div>
    
                    <div class="comment-meta commentmetadata">
                        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'framework'), get_comment_date(),  get_comment_time()) ?></a>
                        <?php edit_comment_link(__('(Edit)', 'framework'),'  ','') ?> &middot; <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </div>
          
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em class="moderation"><?php _e('Your comment is awaiting moderation.', 'framework') ?></em>
                        <br />
                    <?php endif; ?>
          
                    <div class="comment-body">
                        <?php comment_text() ?>
                    </div>
                </div>    
                -->
            </div>
            <div class="clear"></div>

    <?php
    }
}


#-----------------------------------------------------------------#
# Seperated Pings Styling
#-----------------------------------------------------------------#

if( !function_exists( 'cr_list_pings' ) ) {
    function cr_list_pings($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment; ?>
    	<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
    	<?php 
    }
}


#-----------------------------------------------------------------#
# Custom Gravatar Support
#-----------------------------------------------------------------#

if( !function_exists( 'cr_custom_gravatar' ) ) {
    function cr_custom_gravatar( $avatar_defaults ) {
        $cr_avatar = get_template_directory_uri() . '/images/gravatar.png';
        $avatar_defaults[$cr_avatar] = 'Custom Gravatar (/images/gravatar.png)';
        return $avatar_defaults;
    }
    
    add_filter( 'avatar_defaults', 'cr_custom_gravatar' );
}

#-----------------------------------------------------------------#
# Related Posts Function
#-----------------------------------------------------------------#

function get_related_posts($post_id,$items) {
	
	$query = new WP_Query();    
    $args = '';
	$args = wp_parse_args($args, array(
		'showposts' => $items,
		'post__not_in' => array($post_id),
		'ignore_sticky_posts' => 0,
        'category__in' => wp_get_post_categories($post_id)
	));
	
	$query = new WP_Query($args);
	
  	return $query;
}

#-----------------------------------------------------------------#
# Related Portfolio Function
#-----------------------------------------------------------------#

function get_related_projects($post_id,$items) {
    $query = new WP_Query();
    
    $args = '';

    $item_cats = get_the_terms($post->ID, 'portfolio_category');
    if($item_cats):
    foreach($item_cats as $item_cat) {
        $item_array[] = $item_cat->term_id;
    }
    endif;

    $args = wp_parse_args($args, array(
        'showposts' => $items,
        'post__not_in' => array($post_id),
        'ignore_sticky_posts' => 0,
        'post_type' => 'creativo_portfolio',
        'tax_query' => array(
            array(
                'taxonomy' => 'portfolio_category',
                'field' => 'id',
                'terms' => $item_array
            )
        )
    ));
    
    $query = new WP_Query($args);
    
    return $query;
}

#-----------------------------------------------------------------#
# Custom pagination function
#-----------------------------------------------------------------#

function nv_pagination($pages = '', $range = 2)
{  

	global $data;

     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination clearfix'>";
        // if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'><span class='arrows'>&laquo;</span> First</a>";
         if($paged > 1) echo '<a class="pagination-prev" href="'.get_pagenum_link($paged - 1).'"><span class="page-prev">←'.__('Previous','Nimva').'</span></a>';

         for ($i=1; $i <= $pages; $i++)
         {
			 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
            
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
			 }
             
         }

         if ($paged < $pages) echo '<a class="pagination-next" href="'.get_pagenum_link($paged + 1).'"><span class="page-next">'.__('Next', 'Nimva').' →</span></a>';  
        // if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last <span class='arrows'>&raquo;</span></a>";
         echo "</div>\n";
     }
}

#-----------------------------------------------------------------#
# Limit Words Function
#-----------------------------------------------------------------#

function string_limit_words($string, $word_limit)
{
	$words = explode(' ', $string, ($word_limit + 1));
	
	if(count($words) > $word_limit) {
		array_pop($words);
	}
	
	return implode(' ', $words);
}

#-----------------------------------------------------------------#
# Custom Breadcrumb Function
#-----------------------------------------------------------------#

if(!function_exists('nimva_breadcrumb')):
function nimva_breadcrumb() {
        global $data,$post;
        echo '<ul class="breadcrumbs">';

         if ( !is_front_page() ) {
        echo '<li><a href="';
        echo home_url();
        echo '"><i class="fa fa-home"></i>';
        echo "</a></li>";
        }

        $params['link_none'] = '';
        $separator = '';

        if (is_category() && !is_singular('creativo_portfolio')) {
            $category = get_the_category();
            $ID = $category[0]->cat_ID;
            echo is_wp_error( $cat_parents = get_category_parents($ID, TRUE, '', FALSE ) ) ? '' : '<li>'.$cat_parents.'</li>';
        }

        if(is_singular('creativo_portfolio')) {
            echo get_the_term_list($post->ID, 'portfolio_category', '<li>', '&nbsp;/&nbsp;&nbsp;', '</li>');
            echo '<li>'.get_the_title().'</li>';
        }

        if(is_singular('event')) {
            echo get_the_term_list($post->ID, 'event-categories', '<li>', '&nbsp;/&nbsp;&nbsp;', '</li>');
            echo '<li>'.get_the_title().'</li>';
        }

        if (is_tax()) {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            echo '<li>'.$term->name.'</li>';
        }

        if(is_home()) { echo '<li>'.$data['blog_title'].'</li>'; }
        if(is_page() && !is_front_page()) {
            $parents = array();
            $parent_id = $post->post_parent;
            while ( $parent_id ) :
                $page = get_page( $parent_id );
                if ( $params["link_none"] )
                    $parents[]  = get_the_title( $page->ID );
                else
                    $parents[]  = '<li><a href="' . get_permalink( $page->ID ) . '" title="' . get_the_title( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a></li>' . $separator;
                $parent_id  = $page->post_parent;
            endwhile;
            $parents = array_reverse( $parents );
            echo join( '', $parents );
            echo '<li>'.get_the_title().'</li>';
        }
        if(is_single() && !is_singular('creativo_portfolio')  && !is_singular('event')) {
            $categories_1 = get_the_category($post->ID);
            if($categories_1):
                foreach($categories_1 as $cat_1):
                    $cat_1_ids[] = $cat_1->term_id;
                endforeach;
                $cat_1_line = implode(',', $cat_1_ids);
            endif;
            if( $cat_1_line ) {
                $categories = get_categories(array(
                    'include' => $cat_1_line,
                    'orderby' => 'id'
                ));
                if ( $categories ) :
                    foreach ( $categories as $cat ) :
                        $cats[] = '<li><a href="' . get_category_link( $cat->term_id ) . '" title="' . $cat->name . '">' . $cat->name . '</a></li>';
                    endforeach;
                    echo join( '', $cats );
                endif;
            }
            echo '<li>'.get_the_title().'</li>';
        }
        if(is_tag()){ echo '<li>'."Tag: ".single_tag_title('',FALSE).'</li>'; }
        if(is_404()){ echo '<li>'.__("404 - Page not Found", 'Nimva').'</li>'; }
        if(is_search()){ echo '<li>'.__("Search", 'Nimva').'</li>'; }
        if(is_year()){ echo '<li>'.get_the_time('Y').'</li>'; }

        echo "</ul>";
}
endif;

/**
 * Title         : Aqua Resizer
 * Description   : Resizes WordPress images on the fly
 * Version       : 1.2.0
 * Author        : Syamil MJ
 * Author URI    : http://aquagraphite.com
 * License       : WTFPL - http://sam.zoy.org/wtfpl/
 * Documentation : https://github.com/sy4mil/Aqua-Resizer/
 *
 * @param string  $url    - (required) must be uploaded using wp media uploader
 * @param int     $width  - (required)
 * @param int     $height - (optional)
 * @param bool    $crop   - (optional) default to soft crop
 * @param bool    $single - (optional) returns an array if false
 * @uses  wp_upload_dir()
 * @uses  image_resize_dimensions()
 * @uses  wp_get_image_editor()
 *
 * @return str|array
 */

if(!class_exists('Aq_Resize')) {
    class Aq_Resize
    {
        /**
         * The singleton instance
         */
        static private $instance = null;

        /**
         * No initialization allowed
         */
        private function __construct() {}

        /**
         * No cloning allowed
         */
        private function __clone() {}

        /**
         * For your custom default usage you may want to initialize an Aq_Resize object by yourself and then have own defaults
         */
        static public function getInstance() {
            if(self::$instance == null) {
                self::$instance = new self;
            }

            return self::$instance;
        }

        /**
         * Run, forest.
         */
        public function process( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false ) {
            // Validate inputs.
            if ( ! $url || ( ! $width && ! $height ) ) return false;

            // Caipt'n, ready to hook.
            if ( true === $upscale ) add_filter( 'image_resize_dimensions', array($this, 'aq_upscale'), 10, 6 );

            // Define upload path & dir.
            $upload_info = wp_upload_dir();
            $upload_dir = $upload_info['basedir'];
            $upload_url = $upload_info['baseurl'];
            
            $http_prefix = "http://";
            $https_prefix = "https://";
            
            /* if the $url scheme differs from $upload_url scheme, make them match 
               if the schemes differe, images don't show up. */
            if(!strncmp($url,$https_prefix,strlen($https_prefix))){ //if url begins with https:// make $upload_url begin with https:// as well
                $upload_url = str_replace($http_prefix,$https_prefix,$upload_url);
            }
            elseif(!strncmp($url,$http_prefix,strlen($http_prefix))){ //if url begins with http:// make $upload_url begin with http:// as well
                $upload_url = str_replace($https_prefix,$http_prefix,$upload_url);      
            }
            

            // Check if $img_url is local.
            if ( false === strpos( $url, $upload_url ) ) return false;

            // Define path of image.
            $rel_path = str_replace( $upload_url, '', $url );
            $img_path = $upload_dir . $rel_path;

            // Check if img path exists, and is an image indeed.
            if ( ! file_exists( $img_path ) or ! getimagesize( $img_path ) ) return false;

            // Get image info.
            $info = pathinfo( $img_path );
            $ext = $info['extension'];
            list( $orig_w, $orig_h ) = getimagesize( $img_path );

            // Get image size after cropping.
            $dims = image_resize_dimensions( $orig_w, $orig_h, $width, $height, $crop );
            $dst_w = $dims[4];
            $dst_h = $dims[5];

            // Return the original image only if it exactly fits the needed measures.
            if ( ! $dims && ( ( ( null === $height && $orig_w == $width ) xor ( null === $width && $orig_h == $height ) ) xor ( $height == $orig_h && $width == $orig_w ) ) ) {
                $img_url = $url;
                $dst_w = $orig_w;
                $dst_h = $orig_h;
            } else {
                // Use this to check if cropped image already exists, so we can return that instead.
                $suffix = "{$dst_w}x{$dst_h}";
                $dst_rel_path = str_replace( '.' . $ext, '', $rel_path );
                $destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}.{$ext}";

                if ( ! $dims || ( true == $crop && false == $upscale && ( $dst_w < $width || $dst_h < $height ) ) ) {
                    // Can't resize, so return false saying that the action to do could not be processed as planned.
                    return false;
                }
                // Else check if cache exists.
                elseif ( file_exists( $destfilename ) && getimagesize( $destfilename ) ) {
                    $img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";
                }
                // Else, we resize the image and return the new resized image url.
                else {

                    $editor = wp_get_image_editor( $img_path );

                    if ( is_wp_error( $editor ) || is_wp_error( $editor->resize( $width, $height, $crop ) ) )
                        return false;

                    $resized_file = $editor->save();

                    if ( ! is_wp_error( $resized_file ) ) {
                        $resized_rel_path = str_replace( $upload_dir, '', $resized_file['path'] );
                        $img_url = $upload_url . $resized_rel_path;
                    } else {
                        return false;
                    }

                }
            }

            // Okay, leave the ship.
            if ( true === $upscale ) remove_filter( 'image_resize_dimensions', array( $this, 'aq_upscale' ) );

            // Return the output.
            if ( $single ) {
                // str return.
                $image = $img_url;
            } else {
                // array return.
                $image = array (
                    0 => $img_url,
                    1 => $dst_w,
                    2 => $dst_h
                );
            }

            return $image;
        }

        /**
         * Callback to overwrite WP computing of thumbnail measures
         */
        function aq_upscale( $default, $orig_w, $orig_h, $dest_w, $dest_h, $crop ) {
            if ( ! $crop ) return null; // Let the wordpress default function handle this.

            // Here is the point we allow to use larger image size than the original one.
            $aspect_ratio = $orig_w / $orig_h;
            $new_w = $dest_w;
            $new_h = $dest_h;

            if ( ! $new_w ) {
                $new_w = intval( $new_h * $aspect_ratio );
            }

            if ( ! $new_h ) {
                $new_h = intval( $new_w / $aspect_ratio );
            }

            $size_ratio = max( $new_w / $orig_w, $new_h / $orig_h );

            $crop_w = round( $new_w / $size_ratio );
            $crop_h = round( $new_h / $size_ratio );

            $s_x = floor( ( $orig_w - $crop_w ) / 2 );
            $s_y = floor( ( $orig_h - $crop_h ) / 2 );

            return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
        }
    }
}





if(!function_exists('aq_resize')) {

    /**
     * This is just a tiny wrapper function for the class above so that there is no
     * need to change any code in your own WP themes. Usage is still the same :)
     */
    function aq_resize( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false ) {
        $aq_resize = Aq_Resize::getInstance();
        return $aq_resize->process( $url, $width, $height, $crop, $single, $upscale );
    }
}

// retrieves the attachment ID from the file URL
function nv_get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_action( 'woocommerce_before_main_content', 'mk_woocommerce_output_content_wrapper', 10);
add_action( 'woocommerce_after_main_content', 'mk_woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);


function mk_woocommerce_output_content_wrapper() {	
	global $data, $post;
	
	if(is_shop()) {
		$pageID = get_option('woocommerce_shop_page_id');
	} else {
		$pageID = $post->ID;
	}
	
	?>
	<div class="content-wrap ">
		<div class="container clearfix">
        	<?php
			if( ( $data['shop_sidebar'] ) && ( $data['woocommerce_archive_sidebar'] != 'None' && get_post_meta($pageID, 'pyre_en_sidebar', true) != 'no' )  ) { 
			?>
        		<div class="postcontent clearfix nobottommargin">
            <?php
			}
			else{
			?>
				<div class="col_full nobottommargin">            
<?php
			}
}

function mk_woocommerce_output_content_wrapper_end() {
	global $data, $post;
	if(is_shop()) {
		$pageID = get_option('woocommerce_shop_page_id');
	} else {
		$pageID = $post->ID;
	}
?>
			
		</div>
	<?php 
	if( ( $data['shop_sidebar'] ) && ( $data['woocommerce_archive_sidebar'] != 'None' && get_post_meta($pageID, 'pyre_en_sidebar', true) != 'no' ) ) { 
		
	?>
    	<div class="sidebar col_last nobottommargin clearfix" <?php echo get_post_meta($pageID, 'pyre_en_sidebar', true); ?>>
                    <div class="sidebar-widgets-wrap clearfix">
                        <?php
                        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($data['woocommerce_archive_sidebar'])): 
                        endif;
                        ?> 
                    </div>
                </div>
    <?php 
	
	} ?>	
	</div>
	
</div>
<?php
}

function nv_is_out_of_stock() {
	    global $post;
	    $post_id = $post->ID;
	    $stock_status = get_post_meta($post_id, '_stock_status',true);
	    
	    if ($stock_status == 'outofstock') {
	    return true;
	    } else {
	    return false;
	    }
	}


//how many products to be displayed per page
if($data['shop_prod_number']) {
	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$data['shop_prod_number'].';' ), 20 );
}

// Change number of products per row to 3
if( ( $data['shop_sidebar'] ) && ( $data['woocommerce_archive_sidebar'] != 'None' )  ) { 
		add_filter('loop_shop_columns', 'loop_columns');
		if (!function_exists('loop_columns')) {
			function loop_columns() {
				return 3; // 3 products per row
			}
		}
}

// Redefine woocommerce_output_related_products()
function woocommerce_output_related_products() {
	
	global $data,$post;
	
	if(is_shop()) {
		$pageID = get_option('woocommerce_shop_page_id');
	} else {
		$pageID = $post->ID;
	}
	
	if( ( $data['shop_sidebar'] ) && ( $data['woocommerce_archive_sidebar'] != 'None' && get_post_meta($pageID, 'pyre_en_sidebar', true) != 'no' ) ) { 
		woocommerce_related_products(3,3); // Display 4 products in rows of 4
	}
	else{
		woocommerce_related_products(4,4);
	}
}

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start();
	
	?>
    <?php if(!$woocommerce->cart->cart_contents_count): ?>
	<a class="shopping-cart" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"><span><?php echo $woocommerce->cart->cart_contents_count; ?></span></i></a>
     <?php else: ?>
    <a class="shopping-cart active" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"><span><?php echo $woocommerce->cart->cart_contents_count; ?></span></i></a>

	<?php
	endif;
	$fragments['a.shopping-cart'] = ob_get_clean();
	
	return $fragments;
	
}

if( ! function_exists( 'less_css' ) ) {
	function less_css( $minify ) {
		/* remove comments */
		$minify = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $minify );

		/* remove tabs, spaces, newlines, etc. */
		$minify = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $minify );
			
		return $minify;
	}
}

/* Get Attachment id from image url */
function pn_get_attachment_id_from_url( $attachment_url = '' ) {
 
    global $wpdb;
    $attachment_id = false;
 
    // If there is no url, return.
    if ( '' == $attachment_url )
        return;
 
    // Get the upload directory paths
    $upload_dir_paths = wp_upload_dir();
 
    // Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
    if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
 
        // If this is the URL of an auto-generated thumbnail, get the URL of the original image
        $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
 
        // Remove the upload path base directory from the attachment URL
        $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
 
        // Finally, run a custom database query to get the attachment ID from the modified attachment URL
        $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
 
    }
 
    return $attachment_id;
}


