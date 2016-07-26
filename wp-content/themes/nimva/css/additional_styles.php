<?php 
if(!$data['responsive']){ 
?>
	.stretched #wrapper {
		min-width:1020px;
	}
<?php 
}	

if($data['layout_width'] == '1160px') {
	?>
    @media only screen and (min-width: 1159px) {
    	<?php 
		if($data['site_layout']=='Boxed') {
		?>
        	#wrapper {
            	width: 1220px;
            }
            body #header.sticky-header {
            	max-width: 1220px !important;
            } 
            .vc_row[data-vc-full-width] {
	            max-width: 1220px;
	            left: 15px;	           
            }           
        <?php
		}
		?>
        .container {
            max-width: 1160px;
        }
        .menu-wrapper-inside {
        	max-width: 1160px !important;
        }
        #portfolio-single-wrap.portfolio-single-full #slider {
            width: 1160px;
        }
        #portfolio-single-wrap.portfolio-single-full .port-desc, #portfolio-single-wrap.portfolio-single-full.portfolio-single-full-left .port-desc, .postcontent #portfolio-single-wrap .port-desc {
            width: 760px;
        }
        .postcontent #portfolio-single-wrap .port-desc {
        	width: 480px;
        }
        .postcontent #portfolio-single-wrap .port-details {
        	width: 270px !important;
        }
        #portfolio-single-wrap.portfolio-single-full .port-details, #portfolio-single-wrap.portfolio-single-full.portfolio-single-full-left .port-details, .postcontent #portfolio-single-wrap .port-details {
            width: 350px;
        }
        #portfolio-details-wrap {
        	width: 350px; 
        }        
        #portfolio-single-wrap #slider {
        	width: 760px;
        }
        #portfolio-details-wrap .port-terms h5 {
            width: 150px;
        }       
        .small-posts .entry_image_sh {
            width: 200px;
            height:136px;
        }
        .our-clients .item a {
            margin: 0px auto;
        }
        #header nav > ul > li.megamenu > ul > li > ul {
        	width: 1160px;
        }
        
        .portfolio-3 .portfolio-item {
        	width: 370px;
        }
        .portfolio-3 .portfolio-item .portfolio-image, .portfolio-3 .portfolio-item .portfolio-image a, .portfolio-3 .portfolio-item .portfolio-image img {
        	width: 370px;
            height: 250px;
        }
        .portfolio-item {
        	width: 275px;
        }
        
        .portfolio-item .portfolio-image, .portfolio-item .portfolio-image a, .portfolio-item .portfolio-image img {
        	width: 275px;
            height: 187px;
        }
        .portfolio-2 .portfolio-item {
        	width: 560px;
        }
        .portfolio-2 .portfolio-item .portfolio-image, .portfolio-2 .portfolio-item .portfolio-image a, .portfolio-2 .portfolio-item .portfolio-image img {
        	width: 560px;
            height: 380px;
        }
        .postcontent {
        	width: 800px;
        }        
        .postcontent .small-posts .entry_c {
        	width: 480px;
        }
        .sidebar {
        	width: 310px;
        }
        
        .widget_search input[type="text"] {
        	width: 82%;
        }
        .error404-page-meta form, .searchtop-meta form {
        	width: 312px;
        }
        .error404-page-meta input[type="text"], .searchtop-meta input[type="text"],  .widget_product_search input[type="text"] {
        	width:270px;
        }
        .searchtop-meta input[type="search"] {
        	width: 100%;
        }
        .related-posts li {
        	width: 180px !important;
        }
        .rpost-image, .rpost-image a, .rpost-image img {
        	width: 180px !important;
            height: 122px;
        }
        <?php
		if ( get_post_meta ( $post->ID, 'pyre_en_sidebar', true ) == 'no') {
			?>
            .related-posts li {
                width: 212px !important;
            }
            .rpost-image, .rpost-image a, .rpost-image img {
                width: 212px !important;
                height: 144px;
            }
            <?php
		}
		?>
        .entry_c {
        	width: 718px;
        }
        .col_full .entry_c {
        	width: 1068px;
        }
        .col_full .small-posts .entry_c {
        	width: 840px;
        }
        
        .vc_span6 .scroll-portfolio .portfolio-item {
        	width: 176px !important;
        }        
        .vc_span6 .scroll-portfolio .portfolio-item .portfolio-image, .vc_span6 .scroll-portfolio .portfolio-item .portfolio-image a, .vc_span6 .scroll-portfolio .portfolio-item .portfolio-image img {
        	width: 176px !important;
            height: 120px;
        }
        
        .scroll-portfolio .portfolio-item {
        	width: 278px !important;
        }
        .scroll-portfolio .portfolio-item .portfolio-image, .scroll-portfolio .portfolio-item .portfolio-image a, .scroll-portfolio .portfolio-item .portfolio-image img {
        	width: 278px !important;
            height: 189px;
        }
        .vc_span8 .scroll-portfolio .portfolio-item {
        	width: 242px !important;
        }
        .vc_span8 .scroll-portfolio .portfolio-item .portfolio-image, .vc_span8 .scroll-portfolio .portfolio-item .portfolio-image a, .vc_span8 .scroll-portfolio .portfolio-item .portfolio-image img {
        	width: 242px !important;
            height: 165px;
        }
        .vc_span4 .scroll-portfolio .portfolio-item {
        	width: 171px !important;
        }
        .vc_span4 .scroll-portfolio .portfolio-item .portfolio-image, .vc_span4 .scroll-portfolio .portfolio-item .portfolio-image a, .vc_span4 .scroll-portfolio .portfolio-item .portfolio-image img {
        	width: 171px !important;
            height: 116px;
        }
        .vc_span3 .scroll-portfolio .portfolio-item {
        	width: 256px !important;
        }
        .vc_span3 .scroll-portfolio .portfolio-item .portfolio-image, .vc_span3 .scroll-portfolio .portfolio-item .portfolio-image a, .vc_span3 .scroll-portfolio .portfolio-item .portfolio-image img {
        	width: 256px !important;
            height: 174px;
        }
        .vc_span9 .scroll-portfolio .portfolio-item {
        	width: 203px !important;
        }
        .vc_span9 .scroll-portfolio .portfolio-item .portfolio-image, .vc_span9 .scroll-portfolio .portfolio-item .portfolio-image a, .vc_span9 .scroll-portfolio .portfolio-item .portfolio-image img {
        	width: 203px !important;
        	height: 138px;
        }
        .widget .custom_recent_posts {
        	max-width: 310px;
        }
        .portfolio-widget .portfolio-item .portfolio-image, .portfolio-widget .portfolio-item .portfolio-image a, .portfolio-widget .portfolio-item .portfolio-image img {
        	width: 310px;
            height: 211px;
        }        

        #footer .col_one_fourth {
        	width: 260px;
        }        
	}
    <?php
}
if($data['site_layout']=='Wide') {
	$bclass = 'stretched';
	
}
else{
	$bclass = '';
	
}
	if( !get_post_meta($post->ID, 'pyre_background', true) && !get_post_meta($post->ID, 'pyre_bg_color', true) && !get_post_meta($post->ID, 'pyre_youtube_id', true) ) {
?>   
    body {
		background-color:<?php echo $data['bg_color']; ?>;
		<?php if($data['bg_pattern_en'] && $data['bg_pattern'] && !$data['bg_image']): ?>		
			background-image:url("<?php echo $data['bg_pattern']; ?>");
			background-repeat:repeat;
			background-attachment: fixed;		
		<?php endif; ?>	
		
		<?php if($data['bg_image']): ?>
			background-image:url(<?php echo $data['bg_image']; ?>);
			background-repeat:<?php echo $data['bg_repeat']; ?>;
			
			<?php if($data['bg_full']): ?>
				background-attachment:fixed;
				background-position:center center;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			<?php endif; ?>
			
		<?php endif; ?>
		
		<?php
		if($data['en_parallax']) {
			$bclass .= ' parallax_section ';
		}
		?>
		
		
	}
<?php
	}
	else if( get_post_meta($post->ID, 'pyre_background', true) || get_post_meta($post->ID, 'pyre_bg_color', true) ) {
	?>
			body {
				background-color: <?php echo get_post_meta($post->ID, 'pyre_bg_color', true); ?>;
				background-image: url(<?php echo get_post_meta($post->ID, 'pyre_background', true); ?>);
				background-repeat:<?php echo get_post_meta($post->ID, 'pyre_bg_repeat', true); ?>;
				background-attachment: <?php echo get_post_meta($post->ID, 'pyre_bg_attach', true); ?>;
				
				<?php
				if( get_post_meta($post->ID, 'pyre_en_full_screen', true) == 'yes' ) {
				?>
					-webkit-background-size: cover;
					-moz-background-size: cover;
					-o-background-size: cover;
					background-size: cover;
					background-position:center center;
				<?php
				}
				?>
			}
	<?php
			if( get_post_meta($post->ID, 'pyre_en_parallax', true) =='yes' ) {
				$bclass .= ' parallax_section ';
			}
		
	}

	if($data['site_layout']=='Boxed'){
	?>
		#wrapper {
			margin-top: <?php echo $data['margin_top']; ?>px;
			margin-bottom: <?php echo $data['margin_bottom']; ?>px;	
			background-color: <?php echo $data['content_bg'] ?>;
		}
		.sticky {
			width:1020px;
		}
	<?php
	}
	?>

	<?php	
	if(	$data['custom_woff'] && $data['custom_ttf'] && $data['custom_svg'] && $data['custom_eot'] ){
	?>
		@font-face {
			font-family: 'CustomFont';
			src: url('<?php echo $data['custom_eot']; ?>'); /* IE9 Compat Modes */
			src: url('<?php echo $data['custom_eot']; ?>?#iefix') format('embedded-opentype'), /* IE6-IE8 */
				 url('<?php echo $data['custom_woff']; ?>') format('woff'), /* Modern Browsers */
				 url('<?php echo $data['custom_ttf']; ?>') format('truetype'), /* Safari, Android, iOS */
				 url('<?php echo $data['custom_svg']; ?>#CustomFont') format('svg'); /* Legacy iOS */	
			
		}
	<?php
		// where to use the custom font		
		$custom_body = ($data['custom_body']) ? true : false; // use on Body
		$custom_menu = ($data['custom_menu']) ? true : false; // use on Menu
		$custom_heading = ($data['custom_heading']) ? true : false; // use on Headings
		$custom_logo = ($data['custom_logo']) ? true : false; // use on Text Logo
		$custom_tagline = ($data['custom_tagline']) ? true : false; // use on Tagline
		$custom_footer = ($data['custom_footer']) ? true : false; // use on Footer Heading
	}
	?>

	<?php
	if(!$custom_body){
		if($data['google_body'] != 'Select Font') {
			$font = '"'.$data['google_body'].'", Arial, Helvetica, sans-serif !important';
		} elseif($data['standard_body'] != 'Select Font') {
			$font = $data['standard_body'].' !important';
		}
	}
	else{
		$font = "'CustomFont', Arial, Helvetica, sans-serif";
	}
	?>
	body, input, select, textarea,
	.slide-caption2, #lp-contacts li, #portfolio-filter li a, #faq-filter li a,
	.widget_nav_menu li, .entry_meta li a,
	.promo-desc > span, .promo-action a, .error404,
	.widget_links li, .widget_meta li, 
	.widget_archive li, .widget_recent_comments li, 
	.widget_recent_entries li, .widget_categories li, 
	.widget_pages li, .tab_widget ul.tabs li a,
	.toggle .togglet, .toggle .toggleta,.team-image span,
	.team-skills li, .skills li span, .simple-button, .pricing-price .price-tenure,
	.acctitle, .acctitlec,.testimonial-item .testi-author {
		font-family:<?php echo $font; ?>;
		
	}
	<?php
	if(!$custom_menu){
		if($data['google_nav'] != 'Select Font') {
			$nav_font = '"'.$data['google_nav'].'", Arial, Helvetica, sans-serif !important';
		} elseif($data['standard_nav'] != 'Select Font') {
			$nav_font = $data['standard_nav'].' !important';
		}
	}
	else{
		$nav_font = "'CustomFont', Arial, Helvetica, sans-serif";
	}
	?>
	#primary-menu li a, #primary-menu li a span, #header nav > ul {
		font-family:<?php echo $nav_font; ?>
	}
	<?php
	if(!$custom_heading){
		if($data['google_headings'] != 'Select Font') {
			$headings_font = '"'.$data['google_headings'].'", Arial, Helvetica, sans-serif ';
		} elseif($data['standard_headings'] != 'Select Font') {
			$headings_font = $data['standard_headings'].' ';
		}
	}
	else{
		$headings_font = "'CustomFont', Arial, Helvetica, sans-serif";
	}
	?>
	h1, h2, h3, h4, h5, h6 {
		font-family: <?php echo $headings_font; ?>;
	}
    .pagination span.current {
    	background-color: <?php echo $data['page_navi_color']; ?>;
        border-color: <?php echo $data['page_navi_color']; ?>;
    }
    .flex-prev:hover, .flex-next:hover, .rs-prev:hover, .rs-next:hover, .nivo-prevNav:hover, .nivo-nextNav:hover, .camera_prev:hover, .camera_next:hover, .camera_commands:hover, .tp-leftarrow.large:hover, .tp-rightarrow.large:hover, .ls-noskin .ls-nav-prev:hover, .ls-noskin .ls-nav-next:hover {
    	background-color: <?php echo $data['slide_arrow_color']; ?> !important;
    }
	<?php
	if(!$custom_footer){
		if($data['google_footer_headings'] != 'Select Font') {
			$footer_font = '"'.$data['google_footer_headings'].'", Arial, Helvetica, sans-serif !important';
		} elseif($data['standard_footer_headings'] != 'Select Font') {
			$footer_font = $data['standard_footer_headings'].' !important';
		}
	}
	else{
		$footer_font = "'CustomFont', Arial, Helvetica, sans-serif";
	}
	?>
	#footer .widget h4 {
		font-family: <?php echo $footer_font; ?>;
	}

	<?php if($data['body_font_size']): ?>
	body, .entry_content, .testimonial-item .testi-content {
		font-size: <?php echo $data['body_font_size']; ?>px ;
	}		
	<?php endif; ?>
	
	<?php if($data['nav_font_size']): ?>
	#primary-menu li a, #header nav ul li a {
		font-size: <?php echo $data['nav_font_size']; ?>px ;
	}
	<?php endif; ?>

	<?php if($data['snav_font_size']): ?>
	#top-menu{
		font-size: <?php echo $data['snav_font_size']; ?>px ;}
	<?php endif; ?>
	
	<?php if($data['page_title_font_size']): ?>
	#page-title h1 {
		font-size: <?php echo $data['page_title_font_size']; ?>px ;}
	<?php endif; ?>
	
	<?php if($data['breadcrumbs_font_size']): ?>
	#page-title ul.breadcrumbs li {
		font-size: <?php echo $data['breadcrumbs_font_size']; ?>px ;}
	<?php endif; ?>
	
	<?php if($data['coolt_font_size']): ?>
	.title-outer h3 {
		font-size: <?php echo $data['coolt_font_size']; ?>px ;}
	<?php endif; ?>
	
	<?php if($data['sidew_font_size']): ?>
	.sidebar .title-outer h3 {
		font-size: <?php echo $data['sidew_font_size']; ?>px ;}
	<?php endif; ?>
	
	<?php if($data['footw_font_size']): ?>
	#footer .widget h4 {
		font-size: <?php echo $data['footw_font_size']; ?>px ;}
	<?php endif; ?>
	
	<?php if($data['copyright_font_size']): ?>
	#copyrights {
		font-size: <?php echo $data['copyright_font_size']; ?>px ;}
	<?php endif; ?>
	
	<?php if($data['h1_font_size']): ?>
	h1 {
		font-size: <?php echo $data['h1_font_size']; ?>px ;
		line-height: <?php echo 6+$data['h1_font_size']; ?>px ;
	}
	<?php endif; ?>
	
	<?php if($data['h2_font_size']): ?>
	h2 {
		font-size: <?php echo $data['h2_font_size']; ?>px ;
		line-height: <?php echo 6+$data['h2_font_size']; ?>px ;
	}
	<?php endif; ?>
	
	<?php if($data['h3_font_size']): ?>
	h3 {
		font-size: <?php echo $data['h3_font_size']; ?>px ;
		line-height: <?php echo 6+$data['h3_font_size']; ?>px ;
	}
	<?php endif; ?>
	
	<?php if($data['h4_font_size']): ?>
	h4 {
		font-size: <?php echo $data['h4_font_size']; ?>px ;
		line-height: <?php echo 6+$data['h4_font_size']; ?>px ;
	}
	<?php endif; ?>
	
	<?php if($data['h5_font_size']): ?>
	h5 {
		font-size: <?php echo $data['h5_font_size']; ?>px ;
		line-height: <?php echo 6+$data['h5_font_size']; ?>px;
	}
	<?php endif; ?>
	
	<?php if($data['h6_font_size']): ?>
	h6 {
		font-size: <?php echo $data['h6_font_size']; ?>px ;
		line-height: <?php echo 6+$data['h6_font_size']; ?>px;
	}
	<?php endif; ?>	

	<?php 
	if($data['wrapper_top_border']>0) {
		?>
		#wrapper {
			border-top: <?php echo $data['wrapper_top_border']; ?>px solid <?php echo $data['wrapper_top_border_color']; ?>;
		}
		<?php
	}
	?>
	#top-bar {
		<?php if( $data['header_top_bar_bw'] && $data['header_top_bar_bw'] > 0 ) { ?>
			
			border-bottom-width:<?php echo $data['header_top_bar_bw']; ?>px;
			
			<?php if($data['header_top_bar_bc']) { ?>
			
				border-bottom-color:<?php echo $data['header_top_bar_bc']; ?>;
			
			<?php } ?>
			
		<?php } 
			else{
			?>
				border-bottom: none;
			<?php
			}
		?>
		
	}
	
	#page-title {
		background-color: <?php echo $data['title_bread_bg_color_out']; ?>;
		border-width:<?php echo $data['title_bread_border_width']; ?>px;	
		border-color: <?php echo $data['title_bread_border_color']; ?>;	
		padding: <?php echo $data['title_bread_padding_out']; ?>px 0 !important;
		
	}
	.page_title_inner {
		background-color: <?php echo $data['title_bread_bg_color_in']; ?>;
		padding: <?php echo $data['title_bread_padding_in']; ?>px 0;
		<?php
		if($data['title_bread_bg_pattern_en'] && !$data['title_bread_custom_bg_image']) {
		?>
			background:url("<?php echo $data['title_bread_bg_pattern']; ?>");
		<?php
		}
		elseif($data['title_bread_custom_bg_image']){
		?>
			background:url("<?php echo $data['title_bread_custom_bg_image']; ?>") <?php echo $data['title_bread_custom_bg_repeat']; ?>;
			background-size:cover;
		<?php	
		}
		?>
	}
	
	#portfolio-navigation .port-nav-prev a i, #portfolio-navigation .port-nav-next a i {
		color: <?php echo $data['post_navigation_color']; ?>;
		
	}
	#portfolio-navigation .port-nav-prev a:hover i, #portfolio-navigation .port-nav-next a:hover i {
		color: <?php echo $data['post_navigation_color_hover']; ?>;		
	}
	
	<?php
	
	//grab logo details	

	if($data['logo']){
		//deprecated as getimagesize doesn't work on all servers
		//list($logowidth, $logoheight) = getimagesize($data['logo']);
		//$factor = $logowidth / $logoheight;
		
		//new way to grab logo - logo image should always be uploaded and exist in the media library.
		$logo_id = nv_get_image_id($data['logo']);		
		$logo_details = wp_get_attachment_image_src($logo_id,'full');

	?>
		#logo {        	
        	<?php if($data['logo_resize']){ ?>
				max-height:<?php echo $data['logo_resize_value']; ?>px;				
            <?php }
			else { ?>
				max-width: <?php echo $logo_details[1]; ?>px;
			<?php }?>    
		}
		<?php
		if($data['sticky_header_logo'] && $data['sticky_header_logo']!= '') {
			$logo_id = pn_get_attachment_id_from_url ($data['logo']);
	    	$logo_attr = wp_get_attachment_image_src($logo_id, 'full');

	    	if($data['logo_resize']){
	    		$logo_height = $data['logo_resize_value'];
	    	}
	    	else {
	    		$logo_height = $logo_attr[2];
	    	}
		?>
			#header.sticky #logo img {
				height: <?php echo $logo_height; ?>px;
			}
		<?php
		}
		?>
        #header.sticky.reduced #logo img {
        	height: <?php echo $data['sticky_header_logo']; ?>px;
        }			
	<?php
	}
	else{
		?>
		#logo {
			line-height:normal;
			font-size: <?php echo $data['text_logo_font_size'] ?>px;
			<?php
			if($custom_logo) {
			?>
				font-family: 'CustomFont', Arial, Helvetica, sans-serif;
			<?php
			}
			else {
			?>
				font-family: '<?php echo $data['text_logo_font']; ?>', Arial, Helvetica, sans-serif;
			<?php
			}
			?>
			margin-top: <?php echo $data['text_logo_margin_top']; ?>px;
			margin-bottom: <?php echo $data['text_logo_margin_bottom']; ?>px;
			margin-right:0;
		}
		#logo a.standard_logo_text {
			color:  <?php echo $data['text_logo_font_color']; ?>;
		}
		<?php
	}
	
	//logo resize 
	
	if($data['logo_resize']){
	?>
		#logo img {
			height:<?php echo $data['logo_resize_value']; ?>px;
		}
	<?php
	}
	?>
	
	.tagline {
		color: <?php echo $data['tagline_font_color']; ?>;	
	}
	
	<?php
	
	//Header versions
	
	$header_layout = (get_post_meta($post->ID, 'pyre_header_version', true) != NULL) ? get_post_meta($post->ID, 'pyre_header_version', true) : $data['header_layout'] ;
	if( $header_layout == 'default' ) $header_layout = $data['header_layout'];
	
	if($header_layout=='v2') {
	?>
		#logo, #primary-menu {
			float:none;
			margin: 0 auto;
		}
        
        #logo img {
        	margin: 0 auto;
        }
		
		<?php 
		
		if (!$data['logo']) {
			?>
			#logo {
				max-width:none;
				margin:20px auto;
				text-align:center;
			}
			.tagline {
				text-align:center;
				float:none;
				font-size: <?php echo $data['tagline_font_size'] ?>px;
				
			<?php
				if($custom_tagline) {
				?>
					font-family: 'CustomFont', Arial, Helvetica, sans-serif;
				<?php
				}
				else{
					if($data['tagline_font'] != 'Select Font') {
						?>
						font-family: "<?php echo $data['tagline_font']; ?>", Arial, Helvetica, sans-serif;
						<?php
					} 
				}
				?>					
				
			}
			<?php
		}
		
		if($data['header_v23_menu_border_top']>0) {
		?>
			#menu-wrapper {
				border-top:<?php echo $data['header_v23_menu_border_top']; ?>px solid <?php echo $data['header_v23_menu_border_top_color']; ?>;
			}
		<?php
		}
		?>
		.menu-wrapper-inside{
			max-width:960px;
			margin:0 auto;
			position: relative;
		}
		
		#header nav > ul {
			float:none;			
			text-align:center;
		}
		
		#header nav > ul > li {
			float: none;
			display:inline-block;
		}
		
		#header nav ul li ul {
			text-align: left;
		}
		/*
		html:not(.js) #header nav > ul > li > a {
			padding: 16px 7px 17px;
		}
		*/
		#header .sf-menu > li:hover > ul, #header .sf-menu > li.sfHover > ul { 
			top:97px;
		}

		.realwidth {
			max-width:100%;
		}
		body.sticky {
			margin-top:140px;
		}
		<?php
	}
	
	elseif($header_layout=='v3') {
	?>		
		<?php
		if(!$data['show_tagline'] && !$data['header_v3_banner'] ) {
		?>
			#logo {
				float:none;
			}	
			
		<?php
		}
		?>
		.tagline{
			float: <?php echo $data['tagline_pos']; ?>;
			font-size: <?php echo $data['tagline_font_size'] ?>px;
				
			<?php
			if($custom_tagline) {
			?>
				font-family: 'CustomFont', Arial, Helvetica, sans-serif;
			<?php
			}
			else{
				if($data['tagline_font'] != 'Select Font') {
					?>
					font-family: "<?php echo $data['tagline_font']; ?>", Arial, Helvetica, sans-serif;
					<?php
				} 
			}
			?>
				
			margin-top: <?php echo $data['tagline_margin_top'] ?>px;
			text-align: <?php echo $data['tagline_text_align'] ?>;
	
		}
		<?php
		if($data['header_v23_menu_border_top']>0) {
		?>
			#menu-wrapper {
				border-top:<?php echo $data['header_v23_menu_border_top']; ?>px solid <?php echo $data['header_v23_menu_border_top_color']; ?>;
			}
		<?php
		}
		?>
		.menu-wrapper-inside{
			max-width:960px;
			margin:0 auto;
			position: relative;
		}
		
		#header nav > ul {
			float:none;			
			
		}
		
		/*
		html:not(.js) #header nav > ul > li > a {
			padding: 16px 7px 17px;
		}
		*/
		#header .sf-menu > li:hover > ul, #header .sf-menu > li.sfHover > ul { 
			top:97px;
		}
		
		.realwidth {
			max-width:100%;						
		}
		
		
	
	<?php
	}
	if(($header_layout == 'v2') || ($header_layout == 'v3')){
	?>
	
		html:not(.js) #header nav > ul > li > a, html:not(.js) #header.reduced nav > ul > li > a {
			line-height: <?php echo $data['header_v23_menu_height']; ?>px;
		}
		#header .sf-menu > li:hover > ul, #header .sf-menu > li.sfHover > ul {
			top: <?php echo ($data['header_v23_menu_height']); ?>px;
		}
		
		#menu-wrapper {
			background-color: <?php echo $data['menu_v23_bg']; ?>;
		}
		
	<?php
	}
	elseif($header_layout == 'v1'){	
	?>
		.tagline {
			float:none;
			text-align: left;
			font-size: <?php echo $data['tagline_font_size'] ?>px;
				
			<?php
			if($custom_tagline) {
			?>
				font-family: 'CustomFont', Arial, Helvetica, sans-serif;
			<?php
			}
			else {
				if($data['tagline_font'] != 'Select Font') {
				?>
					font-family: "<?php echo $data['tagline_font']; ?>", Arial, Helvetica, sans-serif;
				<?php
				}
			}
			?>
		}
	<?php
	}
	?>
	<?php 
	if($data['transp_floating_header']) {
		$header_bg_color_hex = hex2rgba($data['header_bg']); 	
	?>
		body #header.sticky-header {
			background: rgba(<?php echo $header_bg_color_hex[0]; ?>, <?php echo $header_bg_color_hex[1]; ?>, <?php echo $header_bg_color_hex[2]; ?>, 0.95) ;
		}
	<?php 
	}
	?>
	<?php // if(!$data['primary_color_overwrite']) : ?>
	
		/* background color */
		
		#header{
			background-color: <?php echo $data['header_bg']; ?>;
		}
		
		<?php
		if($data['header_bg_pattern_en'] && !$data['header_custom_bg_image']){
			?>			
			#header, body #header.sticky-header {				
				background: <?php echo $data['header_bg']; ?> url(<?php echo $data['header_bg_pattern'] ?>) repeat;
			}
			<?php
		}
		elseif ( $data['header_custom_bg_image'] ) {
			?>
			#header, body #header.sticky-header {
				background: <?php echo $data['header_bg']; ?> url(<?php echo $data['header_custom_bg_image'] ?>) <?php echo $data['header_custom_bg_repeat'] ?>;
			}
			<?php
		}
		if($data['header_border_top']>0) {
		?>
			#header {
				border-top: <?php echo $data['header_border_top'] ?>px solid <?php echo $data['header_border_top_color'] ?>;
			}
		<?php
		}	
		
		if($data['header_border_bottom']>0) {
		?>
			#header {
				border-bottom: <?php echo $data['header_border_bottom'] ?>px solid <?php echo $data['header_border_bottom_color'] ?>;
			}
		<?php
		}
		?>
		
		#top-bar{
			background-color: <?php echo $data['header_contact_bg']; ?>;
		}
		#top-menu ul li div, #top-menu li a, #top-menus li a, #top-menus li, #top-menu li span, #top-menu li i {
			color: <?php echo $data['header_contact_text_color']; ?>;
		}
		#top-menu li a:hover, #top-menus li a:hover{
			color: <?php echo $data['header_contact_link_color']; ?>;
			border-color: <?php echo $data['header_contact_link_color']; ?>;
		}
		#top-menu .mail{			
			border-color: <?php echo $data['header_contact_separator_color']; ?>;
		}
		#top-social li a{
			color: <?php echo $data['header_sp_color']; ?>;
		}		
		
		#top-social li a:hover .ts-icon, #top-social li a:hover{
			background-color: <?php echo $data['header_sp_bg_hover']; ?>;
		}
		<?php
		if($data['site_layout']=='Boxed'){
		?>
			.content-wrap{
				background-color: <?php echo $data['content_bg']; ?>;
			}
		<?php
		}	
		?>		
		#twitter_bar {
			background-color: <?php echo $data['twitter_bar_bg']; ?>;
			color: <?php echo $data['twitter_bar_text']; ?>;
		}
		#twitter_bar ul li a {
			color: <?php echo $data['twitter_bar_text']; ?>;
			border-bottom-color: <?php echo $data['twitter_bar_text']; ?>;
		}
		#footer.footer-dark {
			background-color: <?php echo $data['footer_bg']; ?>;
			<?php
			if($data['footer_bg_pattern_en'] && !$data['footer_custom_bg_image']) {
				?>
				background: <?php echo $data['footer_bg']; ?> url("<?php echo $data['footer_bg_pattern']; ?>") repeat;
				<?php
			}
			elseif($data['footer_custom_bg_image'])	{
				?>
				background: <?php echo $data['footer_bg']; ?> url("<?php echo $data['footer_custom_bg_image']; ?>") <?php echo $data['footer_custom_bg_repeat']; ?>;
				<?php
			}
			?>
		}
		#footer {
			border-color: <?php echo $data['footer_border']; ?>;
		}
		#copyrights.copyrights-dark {
			background-color: <?php echo $data['copyright_bg']; ?>;
		}
		#copyrights {
			border-color: <?php echo $data['copyright_border']; ?>;
		}
		/* Text color */
		body {
			color: <?php echo $data['body_text_color']; ?>;
		}	
		.team-skills li a, .team-skills li a:hover {
			color: <?php echo $data['body_text_color']; ?>;
		}
		h1 span, h2 span, h3 span, h4 span, h5 span, h6 span {
			color: <?php echo $data['span_text_color']; ?>;
		}
		a, h1 span, h2 span, h3 span, h4 span, h5 span, h6 span, h3.featuredinverse,
		#lp-contacts li span,  
		#portfolio-filter li.activeFilter a, #faq-filter li.activeFilter a, 
		.error404, .tab_widget ul.tabs li.active a,
		.product-feature3:hover span, .team-skills li span, .dropcap, .best-price .pricing-title h4, .best-price .pricing-price,
		 .twitter-widget ul li a, .sposts-list a, .inner .ca-main, .entry_title h2 a, .woocommerce ul.products li.product .product_details h3 a
		 {
			color: <?php echo $data['link_color']; ?>;
		}	
		a:hover, #page-title ul.breadcrumbs li a:hover, #portfolio-filter li a:hover, #faq-filter li a:hover, .entry_meta li a:hover, .ipost .ipost-title a:hover,
		.comment-content .comment-author a:hover, .comment-wrap:hover a,.promo h3 > span,
		.widget a:hover, #footer.footer-dark .widget_nav_menu li a:hover,
		#footer.footer-dark .widget_links li a:hover, #footer.footer-dark .widget_meta li a:hover, #footer.footer-dark .widget_archive li a:hover,
		#footer.footer-dark .widget_recent_comments li a:hover, #footer.footer-dark .widget_recent_entries li a:hover, #footer.footer-dark .widget_categories li a:hover,
		#footer.footer-dark .widget_pages li a:hover,#copyrights.copyrights-dark a:hover, .entry_title h2 a:hover, .product_buttons_wrap a:hover, .woocommerce ul.products li.product .product_details h3 a:hover {
			color: <?php echo $data['link_color_hover']; ?>;
		}
		#page-title h1 {
			color: <?php echo $data['page_title_color']; ?>;
		}
		#page-title ul.breadcrumbs li  {
			color: <?php echo $data['breadcrumbs_text_color']; ?>;
		}
		#page-title ul.breadcrumbs li a {
			color: <?php echo $data['breadcrumbs_link_color']; ?>;
		}
		h1 {
			color: <?php echo $data['h1_color']; ?>;
		}
		h2,.entry_title h2 {
			color: <?php echo $data['h2_color']; ?>;
		}
		h3 {
			color: <?php echo $data['h3_color']; ?>;
		}
		h4 {
			color: <?php echo $data['h4_color']; ?>;
		}
		h5 {
			color: <?php echo $data['h5_color']; ?>;
		}
		h6 {
			color: <?php echo $data['h6_color']; ?>;
		}
		#footer.footer-dark .widget h4 {
			color: <?php echo $data['footer_headings_color']; ?>;
		}
		#footer .widget .comp {
			border-color: <?php echo $data['footer_headings_border_color_big']; ?>;
		}
		#footer.footer-dark .widget h4 {
			border-color: <?php echo $data['footer_headings_border_color']; ?>;
		}
		#footer.footer-dark {
			color: <?php echo $data['footer_text_color']; ?>;
		}
		#copyrights.copyrights-dark {
			color: <?php echo $data['copyright_text_color']; ?>;
		}
		#footer.footer-dark a {
			color: <?php echo $data['footer_link_color']; ?>;
		}	
		#footer.footer-dark a:hover {
			color: <?php echo $data['footer_link_color_hover']; ?>;
		}
		#copyrights.copyrights-dark a {
			color: <?php echo $data['copyright_link_color']; ?>;
		}
		#footer.footer-dark .widget_links li a:hover  {
			color: <?php echo $data['footer_link_color_hover']; ?>;
		}
		#copyrights.copyrights-dark a:hover {
			color: <?php echo $data['copyright_link_color_hover']; ?>;
		}
		
		/* Header menu color 	*/
		
		<?php
		if($data['dropdown_mw'] != 200) {
			?>
			.sf-menu ul {
				width: <?php echo $data['dropdown_mw'] ?>px;
			}
			ul.sf-menu li li:hover ul, ul.sf-menu li li.sfHover ul {
				left: <?php echo $data['dropdown_mw'] ?>px;
			}
			<?php
		}
		?>
		
		#header nav ul li a, .sf-sub-indicator [class^="fa-"], .sf-sub-indicator [class*=" fa-"]  {
			color: <?php echo $data['menu_first_color']; ?>;
		}
		#header nav ul li a:hover, #header nav .sf-menu li.sfHover > a, ul.sf-menu > li > a:hover > .sf-sub-indicator i, ul.sf-menu > li > a:active > .sf-sub-indicator i, ul.sf-menu > li.sfHover > a > .sf-sub-indicator i, #header > div > nav > ul > li.cart > a.shopping-cart:hover, #header > div > nav > ul > li.cart > a.shopping-cart.active, .woocommerce-MyAccount-navigation ul li.is-active a {
			color: <?php echo $data['menu_first_color_hover']; ?>;
		}
		.shopping-cart span, .woocommerce-MyAccount-navigation ul li.is-active a:before {
			background-color: <?php echo $data['menu_first_color_hover']; ?>;
		}
		
		#header nav .sf-menu li.current-menu-ancestor > a, 
		#header nav .sf-menu li.current-menu-item > a, 
		#header nav .sf-menu > li.current-menu-ancestor > a > .sf-sub-indicator [class^="fa-"],
		#header nav .sf-menu li.current_page_item > a .sf-sub-indicator [class^="fa-"]
		 {
			color: <?php echo $data['menu_first_color_hover']; ?>;
		}
		#header nav .sf-menu li.current-menu-ancestor > a, #header nav .sf-menu li ul {
			border-color: <?php echo $data['menu_border_color_hover']; ?>;
		}

		#header nav ul li a:hover, #header nav .sf-menu li.sfHover > a {
			background-color: <?php echo $data['menu_first_bg_color_hover']; ?>;
		}
		html:not(.js) #header nav > ul > li > a:hover, #header nav ul li a:hover, #header nav .sf-menu li.sfHover > a {
			border-color: <?php echo $data['menu_border_color_hover']; ?>;
		}

		#header nav .sf-menu li ul li a,
		.sf-menu li ul li > a .sf-sub-indicator [class^="fa-"], 
		#header nav .sf-menu li.sfHover ul li.sfHover ul li a,
		#header nav .sf-menu li.sfHover ul li.sfHover ul li.sfHover ul li a,
		.sf-menu li.megamenu ul li.sfHover > a .sf-sub-indicator [class^="fa-"] {
			color: <?php echo $data['menu_sub_color']; ?>;			
		}
        #header nav > ul > li.megamenu > ul ul li.current-menu-item ul li a {
        	color: <?php echo $data['menu_sub_color']; ?>!important;
            background-color: transparent;
        }
        #header nav > ul > li.megamenu > ul ul li.current-menu-item ul li a:hover {
        	color: <?php echo $data['menu_sub_color_hover']; ?> !important;
        }
		
		.sf-menu .megamenu-bullet {
			border-left-color: <?php echo $data['menu_sub_color']; ?>;
		}
		
		#header #nav .sf-menu li.megamenu ul li ul.megamenu li h3.megamenu-title,
		#header #nav .sf-menu li.megamenu ul li ul.megamenu li h3.megamenu-title a,
		#header #nav h3.megamenu-title span {
			color: <?php echo $data['mm_headings']; ?> !important;
		}
        #header #nav .sf-menu li.megamenu ul li ul.megamenu li h3.megamenu-title a {
        	background-color: transparent;
        }

		#header #nav .sf-menu li.megamenu ul li ul.megamenu li h3.megamenu-title a:hover,
		#header #nav h3.megamenu-title a:hover span {
			color: <?php echo $data['mm_headings_hover']; ?> !important;
		}
		
		#header nav > ul > li.megamenu ul li ul li a{
			color: <?php echo $data['menu_sub_color']; ?>;
		}
		
		#header nav .sf-menu li ul li a:hover, 
		#header nav .sf-menu li.sfHover ul li.sfHover a,
		#header nav .sf-menu li.sfHover ul li.sfHover ul li.sfHover a,
		#header nav .sf-menu li.sfHover ul li.sfHover ul li a:hover, 
		#header nav > ul > li.megamenu > ul > li > a:hover, 
		#header nav .sf-menu li ul li.sfHover > a .sf-sub-indicator [class^="fa-"],
		#header nav .sf-menu li ul li.current_page_ancestor > a .sf-sub-indicator [class^="fa-"],
		#header nav .sf-menu li.sfHover ul li.sfHover ul li.sfHover ul li.current_page_item a {
			color: <?php echo $data['menu_sub_color_hover']; ?>;
		}
		#header nav .sf-menu li ul li a:hover .megamenu-bullet,
		#header nav .sf-menu li ul li.current-menu-item a .megamenu-bullet {
			border-left-color: <?php echo $data['menu_sub_color_hover']; ?>;
		}
		#header nav > ul > li.megamenu > ul ul li a:hover, 
		#header nav > ul > li.megamenu > ul ul li.current-menu-item a,
		.sf-menu li.megamenu ul li > a:hover .sf-sub-indicator [class^="fa-"],
		#header nav .sf-menu li.megamenu ul li.current_page_item > a .sf-sub-indicator [class^="fa-"]
		 {
			color: <?php echo $data['menu_sub_color_hover']; ?> !important;
		}		
		
		#header nav .sf-menu li.current_page_ancestor > a .sf-sub-indicator [class^="fa-"] {
			border-top-color: <?php echo $data['menu_border_color_hover']; ?>;
			color: <?php echo $data['menu_first_color']; ?>;
			
		}
		#header > nav > .sf-menu > li.current-menu-item > a:hover, #header > nav > .sf-menu > li.current_page_item > a:hover > .sf-sub-indicator [class^="fa-"] {
			color: <?php echo $data['menu_first_color_hover']; ?>;
		}
		
		#header nav .sf-menu li ul li.current-menu-item > a, 
		#header nav .sf-menu li ul li.current-menu-ancestor > a,
		#header nav .sf-menu li ul li.current-menu-ancestor ul li.current-menu-ancestor > a,
		#header nav .sf-menu li.sfHover ul li.sfHover ul li.current-menu-item > a  {
			color: <?php echo $data['menu_sub_color_hover']; ?>;
			<?php
			if($data['en_menu_transparent']){
				$transparent_mega = hex2rgba($data['menu_sub_bg_color_hover']);
			?>
				background-color: rgba(<?php echo $transparent_mega[0]; ?>, <?php echo $transparent_mega[1]; ?>, <?php echo $transparent_mega[2]; ?>, 0.95) !important;
			<?php
			}
			else {
			?>
				background-color: <?php echo $data['menu_sub_bg_color_hover']; ?>;
			<?php
			}
			?>

		}
		#header nav .sf-menu li ul li.current-menu-ancestor > a .sf-sub-indicator [class^="fa-"] {
			color: <?php echo $data['menu_sub_color_hover']; ?>;
		}
		
		#header nav .sf-menu li.megamenu ul li.current-menu-item > a {
			background: transparent;
			color: <?php echo $data['mm_headings_hover']; ?>;
		}

		#header nav .sf-menu li ul li a, #header nav > ul > li.megamenu > ul.sub-menu {
			<?php
			if($data['en_menu_transparent']){
				$transparent_menu = hex2rgba($data['menu_sub_bg_color']);
			?>
				background-color: rgba(<?php echo $transparent_menu[0]; ?>, <?php echo $transparent_menu[1]; ?>, <?php echo $transparent_menu[2]; ?>, 0.95);
			<?php
			}
			else {
			?>
				background-color: <?php echo $data['menu_sub_bg_color']; ?>;
			<?php
			}
			?>
		}
		
		.sf-menu li ul li a:hover, .sf-menu li ul li.sfHover > a, #header nav > ul > li.megamenu > ul ul li a:hover {
			<?php
			if($data['en_menu_transparent']){
				$transparent_mega = hex2rgba($data['menu_sub_bg_color_hover']);
			?>
				background-color: rgba(<?php echo $transparent_mega[0]; ?>, <?php echo $transparent_mega[1]; ?>, <?php echo $transparent_mega[2]; ?>, 0.95) !important;
			<?php
			}
			else {
			?>
				background-color: <?php echo $data['menu_sub_bg_color_hover']; ?> !important;
			<?php
			}
			?>	
		}
		
		#header nav > ul > li.megamenu > ul > li {
			border-right-color: <?php echo $data['menu_separators_color']; ?>;
		}
		
		.sf-menu ul li a, .sf-menu ul li ul li a  {
			border-bottom-color: <?php echo $data['menu_separators_color']; ?> !important;
		}
		
		#header nav > ul > li.megamenu > ul > li > ul, #header nav > ul > li.megamenu > ul > li > ul > li {
			border-color: <?php echo $data['menu_separators_color']; ?>;
		}
		
		
		#header nav > ul >li.megamenu > ul li a{
			background:none;
		}
		
		
		/* Element colors */
        
        
		<?php if($data['image_hover_bg_color'] || $data['image_hover_bg_opacity']): $opacity = $data['image_hover_bg_opacity']/100; ?>
		.portfolio-overlay {
			<?php $portfolio_hex = hex2rgba($data['image_hover_bg_color']); ?>
			background-color: rgba(<?php echo $portfolio_hex[0]; ?>, <?php echo $portfolio_hex[1]; ?>, <?php echo $portfolio_hex[2]; ?>, <?php echo $opacity; ?>);
		}
		<?php endif; ?>
		
		.entry_date_thin div.day, .entry_date_thin div.month, .entry_date div.month, .entry_date div.day, .entry_date div.year {
			background-color: <?php echo $data['blog_post_date_bg_color']; ?>;
		}		
		.entry_date div.post-icon {
			color: <?php echo $data['blog_post_icon_color']; ?>;
		}
        
        .our-clients li:hover, .our-clients .item:hover {
        	border-color: <?php echo $data['clients_border_color_hover']; ?>;
        }
		
		.portfolio-title {
			background-color: <?php echo $data['portf_title_bg_color']; ?>;
		}
		.portfolio-item:hover .portfolio-title {
			background-color: <?php echo $data['portf_title_bg_color_hover']; ?>;
		}
		.portfolio-title h3 a {
			color: <?php echo $data['portf_title_link_color']; ?>;
		}
		.portfolio-item:hover h3 a, .portfolio-title h3 a:hover {
			color: <?php echo $data['portf_title_link_color_hover']; ?>;
		}
		.portfolio_tags a {
			color: <?php echo $data['portf_categ_link_color']; ?>;
		}
		.portfolio-item:hover .portfolio_tags a, .portfolio-item:hover .portfolio_tags {
			color: <?php echo $data['portf_categ_link_color_hover']; ?>;			
		}
		.portfolio-item:hover .portfolio_tags a:hover{
			border-color: <?php echo $data['portf_categ_link_color_hover']; ?>;
		}
		.error404-meta input[type="submit"], .searchtop-meta input[type="submit"] {
			background-color: <?php echo $data['search_button_bg_color']; ?>;
		}
		.error404-meta input[type="submit"]:hover, .searchtop-meta input[type="submit"]:hover {
			background-color: <?php echo $data['search_button_bg_color_hover']; ?>;
		}
		.tipsy-inner {
			background-color: <?php echo $data['tooltip_bg_color']; ?>;
			color: <?php echo $data['tooltip_text_color']; ?>;
		}
		.tipsy-arrow-n, .tipsy-arrow-s, .tipsy-arrow-e, .tipsy-arrow-w{
			border-color: <?php echo $data['tooltip_bg_color']; ?>;
		}

		/*Shortcodes Styling*/
		
		/* WooCommerce Button */
		
		.simple-button.default_color.inverse, .woocommerce #content button.button, #content .return-to-shop a.button,
		.woocommerce #payment #place_order, .woocommerce-page #payment #place_order, #content .woocommerce input.button, #content .woocommerce a.button{
			background-color: <?php echo $data['wc_button_bg']; ?> ;
			color: <?php echo $data['wc_button_text']; ?>;
		}
		.simple-button:hover.default_color.inverse, .woocommerce #content button.button:hover, #content .return-to-shop a.button:hover,
		.woocommerce #payment #place_order:hover, .woocommerce-page #payment #place_order:hover, #content .woocommerce input.button:hover, #content .woocommerce a.button:hover {
			background-color: <?php echo $data['wc_button_bg_hover']; ?> ;
			color: <?php echo $data['wc_button_text_hover']; ?>;
		}
		
		.simple-button.default_color {
			background-color: <?php echo $data['wc_button_bg_hover']; ?> ;
			color: <?php echo $data['wc_button_text_hover']; ?>;
		}
		
		.simple-button:hover.default_color {
			background-color: <?php echo $data['wc_button_bg']; ?> ;
			color: <?php echo $data['wc_button_text']; ?>;
		}
		
		/* Red */
		.simple-button.red, .simple-button:hover.red.inverse, .simple-button-3d.red {
			background-color: <?php echo $data['colored_bg_red']; ?> ;
			color: <?php echo $data['colored_text_red']; ?>;
		}
		.simple-button:hover.red, .simple-button.red.inverse {
			background-color: <?php echo $data['colored_bg_red_hover']; ?> ;
			color: <?php echo $data['colored_text_red_hover']; ?>;
		}
		
		.simple-button-3d.red{
			box-shadow: 0px 3px 0px 0px <?php echo hexDarker( $data['colored_bg_red'], 20 ); ?>;
		}
		
		/* Dark Red */
		.simple-button.dark_red, .simple-button:hover.dark_red.inverse, .simple-button-3d.dark_red {
			background-color: <?php echo $data['colored_bg_dark_red']; ?> ;
			color: <?php echo $data['colored_text_dark_red']; ?>;
		}
		.simple-button:hover.dark_red, .simple-button.dark_red.inverse {
			background-color: <?php echo $data['colored_bg_dark_red_hover']; ?> ;
			color: <?php echo $data['colored_text_dark_red_hover']; ?>;
		}
		
		.simple-button-3d.dark_red{
			box-shadow: 0px 3px 0px 0px <?php echo hexDarker( $data['colored_bg_dark_red'], 20 ); ?>;
		}
		
		/* Blue */
		.simple-button.blue, .simple-button:hover.blue.inverse, .simple-button-3d.blue {
			background-color: <?php echo $data['colored_bg_blue']; ?> ;
			color: <?php echo $data['colored_text_blue']; ?>;
		}
		.simple-button:hover.blue, .simple-button.blue.inverse {
			background-color: <?php echo $data['colored_bg_blue_hover']; ?> ;
			color: <?php echo $data['colored_text_blue_hover']; ?>;
		}
		
		.simple-button-3d.blue{
			box-shadow: 0px 3px 0px 0px <?php echo hexDarker( $data['colored_bg_blue'], 20 ); ?>;
		}
		
		/* Orange */
		.simple-button.orange, .simple-button:hover.orange.inverse, .simple-button-3d.orange {
			background-color: <?php echo $data['colored_bg_orange']; ?> ;
			color: <?php echo $data['colored_text_orange']; ?>;
		}
		.simple-button:hover.orange, .simple-button.orange.inverse {
			background-color: <?php echo $data['colored_bg_orange_hover']; ?> ;
			color: <?php echo $data['colored_text_orange_hover']; ?>;
		}
		
		.simple-button-3d.orange{
			box-shadow: 0px 3px 0px 0px <?php echo hexDarker( $data['colored_bg_orange'], 20 ); ?>;
		}
		
		/* Emerald */
		.simple-button.emerald, .simple-button:hover.emerald.inverse, .simple-button-3d.emerald {
			background-color: <?php echo $data['colored_bg_emerald']; ?> ;
			color: <?php echo $data['colored_text_emerald']; ?>;
		}
		.simple-button:hover.emerald, .simple-button.emerald.inverse {
			background-color: <?php echo $data['colored_bg_emerald_hover']; ?> ;
			color: <?php echo $data['colored_text_emerald_hover']; ?>;
		}
		
		.simple-button-3d.emerald{
			box-shadow: 0px 3px 0px 0px <?php echo hexDarker( $data['colored_bg_emerald'], 20 ); ?>;
		}		
		
		/* Turquoise */
		.simple-button.turquoise, .simple-button:hover.turquoise.inverse, .simple-button-3d.turquoise {
			background-color: <?php echo $data['colored_bg_turquoise']; ?> ;
			color: <?php echo $data['colored_text_turquoise']; ?>;
		}
		.simple-button:hover.turquoise, .simple-button.turquoise.inverse {
			background-color: <?php echo $data['colored_bg_turquoise_hover']; ?> ;
			color: <?php echo $data['colored_text_turquoise_hover']; ?>;
		}
		
		.simple-button-3d.turquoise{
			box-shadow: 0px 3px 0px 0px <?php echo hexDarker( $data['colored_bg_turquoise'], 20 ); ?>;
		}
		
		/* Amethyst */
		.simple-button.amethyst, .simple-button:hover.amethyst.inverse, .simple-button-3d.amethyst {
			background-color: <?php echo $data['colored_bg_amethyst']; ?> ;
			color: <?php echo $data['colored_text_amethyst']; ?>;
		}
		.simple-button:hover.amethyst, .simple-button.amethyst.inverse {
			background-color: <?php echo $data['colored_bg_amethyst_hover']; ?> ;
			color: <?php echo $data['colored_text_amethyst_hover']; ?>;
		}
		
		.simple-button-3d.amethyst{
			box-shadow: 0px 3px 0px 0px <?php echo hexDarker( $data['colored_bg_amethyst'], 20 ); ?>;
		}
		
		/* Wet Asphalt */
		.simple-button.wet_asphalt, .simple-button:hover.wet_asphalt.inverse, .simple-button-3d.wet_asphalt {
			background-color: <?php echo $data['colored_bg_wet_asphalt']; ?> ;
			color: <?php echo $data['colored_text_wet_asphalt']; ?>;
		}
		.simple-button:hover.wet_asphalt, .simple-button.wet_asphalt.inverse {
			background-color: <?php echo $data['colored_bg_wet_asphalt_hover']; ?> ;
			color: <?php echo $data['colored_text_wet_asphalt_hover']; ?>;
		}
		
		.simple-button-3d.wet_asphalt{
			box-shadow: 0px 3px 0px 0px <?php echo hexDarker( $data['colored_bg_wet_asphalt'], 20 ); ?>;
		}
		
		/* Light */
		.simple-button.light, .simple-button:hover.light.inverse, .simple-button-3d.light {
			background-color: <?php echo $data['colored_bg_light']; ?> ;
			color: <?php echo $data['colored_text_light']; ?>;
			border: 1px solid <?php echo $data['colored_border_light_hover']; ?>;
		}
		.simple-button:hover.light, .simple-button.light.inverse {
			background-color: <?php echo $data['colored_bg_light_hover']; ?> ;
			color: <?php echo $data['colored_text_light_hover']; ?>;
			border: 1px solid <?php echo $data['colored_border_light_hover']; ?>;
		}
		.simple-button-3d.light{
			border: 1px solid #eee;
			border-bottom:none;
			box-shadow: 0px 3px 0px 0px <?php echo hexDarker( $data['colored_bg_light'], 30 ); ?>;
		}
		.simple-button-3d:active.light{
			border-bottom: 1px solid #eee;
		}
		
		/* Dark */
		.simple-button.dark, .simple-button:hover.dark.inverse, .simple-button-3d.dark {
			background-color: <?php echo $data['colored_bg_dark']; ?> ;
			color: <?php echo $data['colored_text_dark']; ?>;
			border: 1px solid <?php echo $data['colored_border_dark']; ?>;
		}
		.simple-button:hover.dark, .simple-button.dark.inverse {
			background-color: <?php echo $data['colored_bg_dark_hover']; ?> ;
			color: <?php echo $data['colored_text_dark_hover']; ?>;
			border: 1px solid <?php echo $data['colored_border_dark_hover']; ?>;
		}
		
		.simple-button-3d.dark{
			border:none;
			box-shadow: 0px 3px 0px 0px <?php echo hexDarker( $data['colored_bg_dark'], 50 ); ?>;
		}
		
		/* Transparent Light */
		.simple-button.transparent_light {
			background-color: transparent ;
			color: <?php echo $data['transparent_ligth_text']; ?>;
			border: 1px solid <?php echo $data['transparent_light_border']; ?>;
		}		
		.simple-button:hover.transparent_light {
			background-color: transparent ;
			color: <?php echo $data['transparent_ligth_text_hover']; ?>;
			border: 1px solid <?php echo $data['transparent_light_border_hover']; ?>;
		}
		
		/* Transparent Dark */
		.simple-button.transparent_dark {
			background-color: transparent ;
			color: <?php echo $data['transparent_dark_text']; ?>;
			border: 1px solid <?php echo $data['transparent_dark_border']; ?>;
		}		
		.simple-button:hover.transparent_dark {
			background-color: transparent ;
			color: <?php echo $data['transparent_dark_text_hover']; ?>;
			border: 1px solid <?php echo $data['transparent_dark_border_hover']; ?>;
		}
		
		<?php if(!$data['minimal_text_shadow']) : ?>
		.simple-button {
			text-shadow:none;
		}
		<?php endif; ?>
		.red_btn {
			background-color: <?php echo $data['colored_bg_red']; ?> !important;
		}
		.blue_btn {
			background-color: <?php echo $data['colored_bg_blue']; ?> !important;
		}
		.orange_btn {
			background-color: <?php echo $data['colored_bg_orange']; ?> !important;
		}
		.green_btn {
			background-color: <?php echo $data['colored_bg_green']; ?> !important;
		}
		.white_btn {
			background-color: <?php echo $data['colored_bg_white']; ?> !important;
		}
		.black_btn {
			background-color: <?php echo $data['colored_bg_black']; ?> !important;
		}
		.purple_btn {
			background-color: <?php echo $data['colored_bg_purple']; ?> !important;
		}
		/*
		.checklist li[class^="fa-"]{
			margin-left: <?php echo $data['checklist_margin_left']; ?>px;
			color: <?php echo $data['checklist_color']; ?>;
			margin-bottom:10px;
		}
		*/
		.our-clients li {
			border-color: <?php echo $data['clients_border_color']; ?>;
		}

		.our-clients li:hover {
			border-color: <?php echo $data['clients_border_color_hover']; ?>;
		}
		<?php if($data['cool_title_border']) : ?>
			.title-outer h3, .title-outer i {
				border-color: <?php echo $data['cool_title_border_color']; ?>;
			}
		<?php else: ?>
			.title-outer h3 {
				border: none;
			}	
		<?php endif; ?>
		.title-outer {
			border-bottom-color:<?php echo $data['cool_title_big_border_color']; ?>
		}
		.inner {
			border-width: <?php echo $data['fs_box_border_width']; ?>px;
			background-color: <?php echo $data['fs_box_bg_color']; ?>;
		}
		.inner:hover {
			background-color: <?php echo $data['fs_box_bg_color_hover']; ?>;
		}
		.inner .ca-icon {
			color: <?php echo $data['fs_box_icon_color']; ?>;
		}
		
		.inner .ca-main a, .inner .ca-main{
			color: <?php echo $data['fs_box_title_color']; ?>;
		}
		.inner .ca-sub{
			color: <?php echo $data['fs_box_text_color']; ?>;
		}
		<?php if(!$data['fs_box_text_shadow']) : ?>
			.inner:hover .ca-icon, .inner:hover .ca-main, .inner:hover .ca-sub {
				text-shadow: none;
			}
		<?php endif; ?>
		
		.inner:hover .ca-icon {
			color: <?php echo $data['fs_box_icon_color_hover']; ?>;
		}
		.inner:hover .ca-main, .inner:hover .ca-main a {
			color: <?php echo $data['fs_box_title_color_hover']; ?>;
		}
		.inner:hover .ca-sub {
			color: <?php echo $data['fs_box_text_color_hover']; ?>;
		}
		/*
		.product-feature > span.inverse {
			background-color: <?php echo $data['pf_icon_bg1']; ?>;
			color: <?php echo $data['pf_icon_text1']; ?>;
		}
		h3.featuredinverse {
			color: <?php echo $data['pf_icon_title1']; ?>;
		}
		*/
		.product-feature > span {
			background-color: <?php echo $data['pf_icon_bg2']; ?>;
			color: <?php echo $data['pf_icon_text2']; ?>;
		}
		h3.featured {
			color: <?php echo $data['pf_icon_title2']; ?>;
		}
		
		<?php if($data['pf_icon_size']) : ?>
			.product-feature > span, .product-feature > span.inverse {
				font-size: <?php echo $data['pf_icon_size']; ?>px;
				width: <?php echo ($data['pf_icon_size']+4); ?>px;
				height: <?php echo ($data['pf_icon_size']+4); ?>px;
				line-height: <?php echo ($data['pf_icon_size']+3); ?>px;
			}
			.product-feature {
				padding-left: <?php echo ($data['pf_icon_size']+30); ?>px;
			}
		<?php endif; ?>	
		
		.best-price .pricing-title h4 {
			color: <?php echo $data['pt_best_price_title']; ?>;
		}
		
		.pricing-style2 .best-price .pricing-price {
			background-color: <?php echo $data['pt_best_price_bg']; ?>;
			color: <?php echo $data['pt_best_price_text']; ?>;
		}
		.pricing-style2 .best-price .price-tenure {
			color: <?php echo $data['pt_best_price_time']; ?>;
		}
		
		.pricing-title h4 {
			color: <?php echo $data['pt_normal_price_title']; ?>;
		}
		
		.pricing-style2 .pricing-price {
			background-color: <?php echo $data['pt_normal_price_bg']; ?>;
			color: <?php echo $data['pt_normal_price_text']; ?>;
		}
		
		.pricing-style2 .price-tenure {
			color: <?php echo $data['pt_normal_price_time']; ?>;
		}
		
		.portfolio-overlay-inside span, .post-overlay {
			background-color: <?php echo $data['image_hover_icon_bg']; ?>;
			color: <?php echo $data['image_hover_icon_color']; ?>;
		}
		
		.promo-box {
			border-color: <?php echo $data['tagline_box_border']; ?>;
			background-color: <?php echo $data['tagline_inner_box_border']; ?>
		}
		.promo {
			background-color: <?php echo $data['tagline_box_bg']; ?>;
		}		
		.promo h3 {
			font-size: <?php echo $data['tagline_title_size']; ?>px;
			line-height: <?php echo ($data['tagline_title_size']+5); ?>px;
			color: <?php echo $data['tagline_box_title']; ?>;
		}
		.promo-desc > span {
			font-size: <?php echo $data['tagline_text_size']; ?>px;
			line-height: <?php echo ($data['tagline_text_size']+5); ?>px;
		}
		.testimonial-item .testi-content, #footer.footer-dark .testimonial-item .testi-content {
			background-color: <?php echo $data['testimonial_bg_color']; ?>;
			color: <?php echo $data['testimonial_text_color']; ?>;			
			border: 1px solid <?php echo $data['testimonial_border_color']; ?>;
			text-align: <?php echo $data['testimonial_text_align']; ?>;
		}
		
		.testimonial-item .testi-author {
			color: <?php echo $data['testimonial_author_color']; ?>;
		}
		
		.testimonial-item .testi-author span a {
			color: <?php echo $data['testimonial_link_color']; ?>;
		}
		
		.testimonial-item .testi-author span a:hover {
			color: <?php echo $data['testimonial_link_color_hover']; ?>;
		}
		
		.testimonial-item .testi-content span, .testimonial-item .testi-content span.left, #footer .testimonial-item .testi-content span {
			background-color: <?php echo $data['testimonial_bg_color']; ?>;
			border:1px solid <?php echo $data['testimonial_border_color']; ?>;
			border-top:0;
			border-left:0;
		}
		
		.testimonial-item .testi-author {
			text-align: <?php echo $data['testimonial_author_position']; ?>;
			<?php
			if( $data['testimonial_author_position'] == 'Right' ) {				
			?>
				padding-left:0;				
			<?php
			}
			?>
		}
		<?php 
		if($data['testimonial_author_position'] == 'Right'){ 
		?>
			.testimonial-item .testi-content:before {
				right:30px;
				left:auto;
			}
		<?php 
		} 
		if($data['testimonial_author_position'] == 'Center'){
		?>
			.testimonial-item .testi-content:before {
				right:auto;
				left:50%;
			}
		<?php
		}
		?>
		
		<?php if($data['tb_pos']=="right") : ?>
			.faq .togglet i, .faq .toggleta i {
				left:auto;
				right:0;
				padding-left: 0px;
			}
			.faq .togglec, .toggle .togglec, .faq .togglec.open, .toggle .togglec.open {
				padding-left:0;
			}
			.toggle .togglet, .toggle .toggleta, .toggle .togglet.open, .toggle .togglet.open.toggleta {
				background-position:right;
				padding-left: 0px;
				padding-right: 32px;
			}
		<?php endif; ?>
		.toggle .togglet {
			color: <?php echo $data['tb_title_color']; ?>;
			transition: color .2s linear;
			-moz-transition: color .2s linear;
			-webkit-transition: color .2s linear;
			-ms-transition: color .2s linear;
			-o-transition: color .2s linear;
		}
		.toggle:hover .togglet, .toggle .toggleta{
			color: <?php echo $data['tb_title_color_hov']; ?>;
		}

		.faq .togglet i {
			color: <?php echo $data['tb_icon_color']; ?>;
			transition: color .2s linear;
			-moz-transition: color .2s linear;
			-webkit-transition: color .2s linear;
			-ms-transition: color .2s linear;
			-o-transition: color .2s linear;
		}
		.faq:hover .togglet i {
			color: <?php echo $data['tb_icon_color_hov']; ?>;
		}
		.faq .toggleta i {
			color: <?php echo $data['tb_icon_color_hov']; ?>;
		}
		
		.portfolio-overlay-round, .change-hexa {
			background-color: <?php echo $data['portf_rh_bg']; ?>;
		}
		
		.tab_widget ul.tabs, .tab_widget .tab_container, .tab_widget ul.tabs li,
		.wpb_content_element .wpb_tabs_nav, .wpb_tabs .wpb_tabs_nav li,
		.wpb_content_element.wpb_tabs .wpb_tour_tabs_wrapper .wpb_tab  {
			border-color: <?php echo $data['tabs_border']; ?>;
		}
		.tab_widget ul.tabs li:first-child, .wpb_tabs .wpb_tabs_nav li:first-child {
			border-left-color: <?php echo $data['tabs_border']; ?>;
		}
		
		.tab_widget .tab_container, .wpb_content_element.wpb_tabs .wpb_tour_tabs_wrapper .wpb_tab {
			background-color: <?php echo $data['tabs_content_bg']; ?>;
			color: <?php echo $data['tabs_text']; ?>
		}
		
		.tab_widget ul.tabs li a,
		.wpb_content_element .wpb_tour_tabs_wrapper .wpb_tabs_nav a {
			color: <?php echo $data['tabs_inactive_text']; ?>;
		}
		.tab_widget ul.tabs li,
		.wpb_tabs .wpb_tabs_nav li, .wpb_content_element .wpb_tabs_nav li:hover {
			background-color: <?php echo $data['tabs_inactive_bg']; ?>
		}
		
		.tab_widget ul.tabs li.active, .tab_widget ul.tabs li.ui-tabs-active,
		.wpb_content_element .wpb_tabs_nav li.ui-tabs-active {
			border-top-color: <?php echo $data['tabs_active_tab']; ?>;
			border-bottom-color:<?php echo $data['tabs_active_bg']; ?>;
		}
		
		.tab_widget ul.tabs li.active a, .tab_widget ul.tabs li.active a:hover, .tab_widget ul.tabs li.ui-tabs-active a,
		.wpb_content_element .wpb_tabs_nav li.ui-tabs-active a {
			color: <?php echo $data['tabs_active_text']; ?>;
			background-color: <?php echo $data['tabs_active_bg']; ?>;
		}		
		

		.side-tabs ul.tabs li:first-child, .side-tabs ul.tabs li, 
		.wpb_tour .wpb_tabs_nav li, 
		.wpb_content_element.wpb_tour .wpb_tabs_nav li:first-child
		  {
			border-color: <?php echo $data['tour_border']; ?>;
		}
		
		.side-tabs .tab_container,
		.wpb_tour .wpb_tour_tabs_wrapper .wpb_tab {
			background-color: <?php echo $data['tour_content_bg']; ?>;
			color: <?php echo $data['tour_text']; ?>;
		}
		
		.side-tabs ul.tabs li a,
		.wpb_content_element.wpb_tour .wpb_tabs_nav li a {
			color: <?php echo $data['tour_inactive_text']; ?>;
		}
		
		.side-tabs ul.tabs li,
		.wpb_content_element.wpb_tour .wpb_tabs_nav li {
			background-color: <?php echo $data['tour_inactive_bg']; ?>;
		}		
		
		.side-tabs ul.tabs li.active, .side-tabs ul.tabs li.ui-tabs-active,
		.wpb_content_element.wpb_tour .wpb_tabs_nav li.ui-tabs-active {
			border-left-color: <?php echo $data['tour_active_tab']; ?>;
			border-right-color: <?php echo $data['tour_active_bg']; ?>;
			border-bottom-color:<?php echo $data['tour_border']; ?>;
		}
		.side-tabs ul.tabs li.active a, .side-tabs ul.tabs li.active a:hover,
		.wpb_content_element.wpb_tour .wpb_tabs_nav li.ui-tabs-active a  {
			color: <?php echo $data['tour_active_text']; ?>;
			background-color: <?php echo $data['tour_active_bg']; ?>;
		}
		
		.side-tabs ul.tabs li.active a:hover  {
			border-right-color: <?php echo $data['tour_active_bg']; ?>;
		}
		
		.acctitle.render-icon.acctitlec, .acctitle.acctitlec, .acctitle.render-icon.ui-state-active, .acctitle.ui-state-active,
		.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header.ui-state-active a {
			color: <?php echo $data['acc_active_title']; ?>;
		}
		.acctitle.render-icon.acctitlec i, .acctitle.render-icon.ui-state-active i,
		.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header.ui-state-active i {
			color: <?php echo $data['acc_active_icon']; ?>;
		}
		
		.acctitle.render-icon, .acctitle,
		.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header a {
			color: <?php echo $data['acc_inactive_title']; ?>;
		}
		.acctitle.render-icon i,
		.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header i {
			color: <?php echo $data['acc_inactive_icon']; ?>;
		}
		.wpb_accordion_section {
			border-color: <?php echo $data['acc_separator']; ?>;
		}

	<?php // endif; ?>
	
	<?php
	// transparent header
	if ( get_post_meta($post->ID, 'pyre_transparent_header', true) == 'yes' ) {
		 
		?>
		#header {
			position:absolute;
			width:100%;
			background-color: transparent;
			border-bottom: none;
			
		}
		.shadow {
			box-shadow: none;
			-webkit-box-shadow: none;
		}
		#header nav ul li a:hover, #header nav .sf-menu li.sfHover > a {
			background-color:transparent;
		}
		<?php
	}
	?>
	
	<?php 
	if($data['en_tapcall']){ 
	?>
		.taptocall {
			background-color: <?php echo $data['tapcall_bg']; ?>;
			color: <?php echo $data['tapcall_text']; ?>;
		}
	<?php
	}
	?>
	
	<?php
	if($data['en_back_top']) {
	?>
		#gotoTop {
			background-color: <?php echo $data['back_top_bg'] ?>;
			border: <?php echo $data['back_top_border'] ?>px solid <?php echo $data['back_top_border_color']; ?>;
			color: <?php echo $data['back_top_icon']; ?>;
		}
		#gotoTop:hover {
			background-color: <?php echo $data['back_top_bg_hover'] ?>;
		}
	<?php
	}
	?>
	
	<?php
	if( ( $data['sidebar_position']=='Left' ) ) {
	?>
		.postcontent {
			margin-right:0;
			float:right;
			margin-left:30px;
		}
		.sidebar.col_last {
			float:left;
			clear:left;
		}
	<?php
	}
	?>
	
	<?php if(is_page_template('page-blank.php')): ?>
		#wrapper {
			box-shadow: none;
			-webkit-box-shadow: none;
		}
	<?php endif ?>
	
	<?php if(is_page_template('page-contact.php')): ?>	
	#slider{
		width:<?php echo $data['gmap_width']; ?>;
		margin:0 auto;
		
		<?php if($data['gmap_height']): ?>
		
		height:<?php echo $data['gmap_height']; ?>;		
		
		<?php endif; ?>
	}
    .google_map_render.contact_map {
    	height: <?php echo $data['gmap_height']; ?>;
    }
	<?php endif; ?>
	
	<?php 
	if($data['custom_css_area']) {
		echo $data['custom_css_area'];
	}
	?>
	<?php
	if($data['categ_desc']) {
	?>
		.category_description {
			background-color: <?php echo $data['categ_desc_bg']; ?>;
			color: <?php echo $data['categ_desc_text']; ?>;
			<?php
			if($data['categ_desc_border']>0){
			?>	
				border: <?php echo $data['categ_desc_border'].'px'; ?> solid <?php echo $data['categ_desc_border_color']; ?>;
			<?php
			}
			else{
			?>
				border:none;
			<?php
			}
			?>	
		}
	<?php
	}
	?>
	
	
	
	<?php
		if($data['floating_header'] && $data['site_layout']=='Boxed') {
		?>
			body #header.sticky-header {
				max-width:1020px;
				left:auto;
			}
		<?php
		}
		$header_class = '';
		if($data['shadow_header']) $header_class .= 'shadow'; 
		
	?>
	
	<?php
	if($data['call_action']) {
	?>
		#call_action {
			background-color: <?php echo $data['call_action_bg']; ?>;
		}
		#call_action h3 {
			color: <?php echo $data['call_action_text_color']; ?>;
		}
		.promo-text span {
			color: <?php echo $data['call_action_span_color']; ?>
		}
		
		<?php
		if($data['call_action_bg_pattern_en']) {
		?>
			#call_action {
				background: url("<?php echo $data['call_action_bg_pattern']; ?>") repeat;
			}
		<?php
		}
		if($data['call_action_custom_bg_image']) {
		?>
			#call_action {
				background: url("<?php echo $data['call_action_custom_bg_image']; ?>") <?php echo $data['call_action_custom_bg_repeat']; ?>;
			}
		<?php
		}
		?>
		
	<?php
	}
	?>
	
	.woocommerce .product_holder .product-loop-thumb span.onsale, .woocommerce .product_holder .product-loop-thumb .wc-new-badge, .woocommerce .product_holder .product-loop-thumb .out-of-stock-badge, .woocommerce .product_holder .product-loop-thumb .free-badge, .single-product.woocommerce #content span.onsale {
		background-color: <?php echo $data['woo_sale_tag']; ?>;
	}
	
	#content .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .product_details .product_price .price, .woocommerce-page #content ul.products li.product .product_details .product_price .price, .woocommerce #content .product .product_price p.price, #header .cart-content .cart-desc .product-quantity span.amount, #header .cart-total .amount {
		color: <?php echo $data['woo_prod_price']; ?>;
	}
	
	.woocommerce ul.products li.product .price del, .woocommerce-page ul.products li.product .price del {
		color: <?php echo $data['woo_prod_old_price']; ?>
	}
	
	<?php
	$none_img = get_template_directory_uri().'/images/overlay/none.png'; 
	
	if(($data['video_overlay'] !='') || ($data['video_overlay_bg'] != $none_img)) { ?>
			
		.video_bg {
			background-color: <?php echo $data['video_overlay']; ?>;
			opacity: <?php echo ($data['video_overlay_opacity']/100); ?>;
			filter: alpha(opacity=<?php echo ($data['video_overlay_opacity']/100); ?>);
			
			<?php 
			
			
			if ($data['video_overlay_bg'] != $none_img ) { 
			?>
				background-image: url(<?php echo $data['video_overlay_bg']; ?>);
			<?php 
			}
			?>
		}
                	
	<?php 
	} 
	if($data['smooth_scrolling']){
	?>
		/* Let's get this party started */
		::-webkit-scrollbar {
			width: 7px;
		}
		 
		/* Track */
		::-webkit-scrollbar-track {
			background-color:#666;
			position: fixed;
			top:0;
			height: 100%;
			right:0;
		}
		 
		/* Handle */
		::-webkit-scrollbar-thumb {
			-webkit-border-radius: 3px;
			border-radius: 3px;
			background: rgba(45,45,45,0.8); 
		}
		::-webkit-scrollbar-thumb:window-inactive {
			background: rgba(45,45,45,0.4); 
		}
	<?php
	}
	if($data['responsive']){ 
	?>
		@media only screen and (max-width: 979px) {
			.side-tabs ul.tabs li.active, .side-tabs ul.tabs li.ui-tabs-active {
				border-top: 1px solid #ddd;
				border-right-color: <?php echo $data['tour_border']; ?>;
				border-left-color: <?php echo $data['tour_border']; ?>;
				border-top-color: <?php echo $data['tour_active_tab']; ?>; 
			}
			.side-tabs .tab_container {
				box-shadow: none;
				border:1px solid <?php echo $data['tour_border']; ?>; 
			}
		}
	<?php
	}
	
    if( isset($data['mob_menu_bg']) ) {
	?>
    	#mobile-menu {		
        	background-color: <?php echo $data['mob_menu_bg']; ?>;
        }   
    <?php
	}		
    ?>
    
    <?php
	if( isset($data['mob_menu_link']) ) {
	?>
    	#mobile-menu ul li a:hover, 
        #mobile-menu ul li a:hover [class^="fa-"], 
        #mobile-menu li.open > a, 
        #mobile-menu ul li.current-menu-item > a, 
        #mobile-menu ul li.current-menu-ancestor > a,
        #mobile-menu ul li a, 
        #mobile-menu .container > ul > li:last-child ul li a,
        #mobile-menu .sf-sub-indicator [class^="fa-"], #mobile-menu .sf-sub-indicator [class*=" fa-"],
        body #mobile-menu li.open > a [class^="fa-"] {
        	color: <?php echo $data['mob_menu_link']; ?>;
        }
    <?php	
	}
	if(isset($data['mob_menu_sep_link'])) {
    ?>
        #mobile-menu ul li a, #mobile-menu .container > ul > li:last-child ul li a {
            border-bottom:1px dotted <?php echo $data['mob_menu_sep_link']; ?>;
        }
        #mobile-menu {
            border-bottom: 1px solid <?php echo $data['mob_menu_sep_link']; ?>;
        }
    <?php
	}
	if(isset($data['mob_menu_up']) && $data['mob_menu_up']) {
	?>
    	#mobile-menu .container > ul {
        	text-transform: uppercase;
        }
    <?php
	}
	if(isset($data['mob_menu_font_weight'])) {
	?>
        #mobile-menu .container > ul {
        	font-weight: <?php echo $data['mob_menu_font_weight']; ?>;
        }
    <?php
	}
	?>    	