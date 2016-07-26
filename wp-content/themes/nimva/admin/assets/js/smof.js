/**
 * SMOF js
 *
 * contains the core functionalities to be used
 * inside SMOF
 */

jQuery.noConflict();

/** Fire up jQuery - let's dance! 
 */
jQuery(document).ready(function($){
	
	//(un)fold options in a checkbox-group
  	jQuery('.fld').click(function() {
    	var $fold='.f_'+this.id;
    	$($fold).slideToggle('normal', "swing");
  	});

  	//Color picker
  	$('.of-color').wpColorPicker();
	
	//hides warning if js is enabled			
	$('#js-warning').hide();
	
	//Tabify Options			
	$('.group').hide();

// Get the URL parameter for tab
	function getURLParameter(name) {
	    return decodeURI(
	        (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,''])[1]
	    );
	}
	
	// If the $_GET param of tab is set, use that for the tab that should be open
	if (getURLParameter('tab') != "") {
		$.cookie('of_current_opt', '#'+getURLParameter('tab'), { expires: 7, path: '/' });
	}
	
	// Display last current tab	
	if ($.cookie("of_current_opt") === null) {
		$('.group:first').fadeIn('fast');	
		$('#of-nav li:first').addClass('current');
	} else {
	
		var hooks = $('#hooks').html();
		hooks = jQuery.parseJSON(hooks);
		
		$.each(hooks, function(key, value) { 
		
			if ($.cookie("of_current_opt") == '#of-option-'+ value) {
				$('.group#of-option-' + value).fadeIn();
				$('#of-nav li.' + value).addClass('current');
			}
			
		});
	
	}
				
	//Current Menu Class
	$('#of-nav li a').click(function(evt){
	// event.preventDefault();
				
		$('#of-nav li').removeClass('current');
		$(this).parent().addClass('current');
							
		var clicked_group = $(this).attr('href');
		
		$.cookie('of_current_opt', clicked_group, { expires: 7, path: '/' });
			
		$('.group').hide();
							
		$(clicked_group).fadeIn('fast');
		return false;
						
	});

	//Expand Options 
	var flip = 0;
				
	$('#expand_options').click(function(){
		if(flip == 0){
			flip = 1;
			$('#of_container #of-nav').hide();
			$('#of_container #content').width(755);
			$('#of_container .group').add('#of_container .group h2').show();
	
			$(this).removeClass('expand');
			$(this).addClass('close');
			$(this).text('Close');
					
		} else {
			flip = 0;
			$('#of_container #of-nav').show();
			$('#of_container #content').width(595);
			$('#of_container .group').add('#of_container .group h2').hide();
			$('#of_container .group:first').show();
			$('#of_container #of-nav li').removeClass('current');
			$('#of_container #of-nav li:first').addClass('current');
					
			$(this).removeClass('close');
			$(this).addClass('expand');
			$(this).text('Expand');
				
		}
			
	});
	
	//Update Message popup
	$.fn.center = function () {
		this.animate({"top":( $(window).height() - this.height() - 200 ) / 2+$(window).scrollTop() + "px"},100);
		this.css("left", 250 );
		return this;
	}
		
			
	$('#of-popup-save').center();
	$('#of-popup-reset').center();
	$('#of-popup-fail').center();
			
	$(window).scroll(function() { 
		$('#of-popup-save').center();
		$('#of-popup-reset').center();
		$('#of-popup-fail').center();
	});
			

	//Masked Inputs (images as radio buttons)
	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');
	});
	$('.of-radio-img-label').hide();
	$('.of-radio-img-img').show();
	$('.of-radio-img-radio').hide();
	
	//Masked Inputs (background images as radio buttons)
	$('.of-radio-tile-img').click(function(){
		$(this).parent().parent().find('.of-radio-tile-img').removeClass('of-radio-tile-selected');
		$(this).addClass('of-radio-tile-selected');
	});
	$('.of-radio-tile-label').hide();
	$('.of-radio-tile-img').show();
	$('.of-radio-tile-radio').hide();

	// Style Select
	(function ($) {
	styleSelect = {
		init: function () {
		$('.select_wrapper').each(function () {
			$(this).prepend('<span>' + $(this).find('.select option:selected').text() + '</span>');
		});
		$('.select').live('change', function () {
			$(this).prev('span').replaceWith('<span>' + $(this).find('option:selected').text() + '</span>');
		});
		$('.select').bind($.browser.msie ? 'click' : 'change', function(event) {
			$(this).prev('span').replaceWith('<span>' + $(this).find('option:selected').text() + '</span>');
		}); 
		}
	};
	$(document).ready(function () {
		styleSelect.init()
	})
	})(jQuery);
	
	
	/** Aquagraphite Slider MOD */
	
	//Hide (Collapse) the toggle containers on load
	$(".slide_body").hide(); 

	//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
	$(".slide_edit_button").live( 'click', function(){		
		/*
		//display as an accordion
		$(".slide_header").removeClass("active");	
		$(".slide_body").slideUp("fast");
		*/
		//toggle for each
		$(this).parent().toggleClass("active").next().slideToggle("fast");
		return false; //Prevent the browser jump to the link anchor
	});	
	
	// Update slide title upon typing		
	function update_slider_title(e) {
		var element = e;
		if ( this.timer ) {
			clearTimeout( element.timer );
		}
		this.timer = setTimeout( function() {
			$(element).parent().prev().find('strong').text( element.value );
		}, 100);
		return true;
	}
	
	$('.of-slider-title').live('keyup', function(){
		update_slider_title(this);
	});
		
	
	//Remove individual slide
	$('.slide_delete_button').live('click', function(){
	// event.preventDefault();
	var agree = confirm("Are you sure you wish to delete this slide?");
		if (agree) {
			var $trash = $(this).parents('li');
			//$trash.slideUp('slow', function(){ $trash.remove(); }); //chrome + confirm bug made slideUp not working...
			$trash.animate({
					opacity: 0.25,
					height: 0,
				}, 500, function() {
					$(this).remove();
			});
			return false; //Prevent the browser jump to the link anchor
		} else {
		return false;
		}	
	});
	
	//Add new slide
	$(".slide_add_button").live('click', function(){		
		var slidesContainer = $(this).prev();
		var sliderId = slidesContainer.attr('id');
		
		var numArr = $('#'+sliderId +' li').find('.order').map(function() { 
			var str = this.id; 
			str = str.replace(/\D/g,'');
			str = parseFloat(str);
			return str;			
		}).get();
		
		var maxNum = Math.max.apply(Math, numArr);
		if (maxNum < 1 ) { maxNum = 0};
		var newNum = maxNum + 1;
		
		var newSlide = '<li class="temphide"><div class="slide_header"><strong>Slide ' + newNum + '</strong><input type="hidden" class="slide of-input order" name="' + sliderId + '[' + newNum + '][order]" id="' + sliderId + '_slide_order-' + newNum + '" value="' + newNum + '"><a class="slide_edit_button" href="#">Edit</a></div><div class="slide_body" style="display: none; "><label>Title</label><input class="slide of-input of-slider-title" name="' + sliderId + '[' + newNum + '][title]" id="' + sliderId + '_' + newNum + '_slide_title" value=""><label>Image URL</label><input class="upload slide of-input" name="' + sliderId + '[' + newNum + '][url]" id="' + sliderId + '_' + newNum + '_slide_url" value=""><div class="upload_button_div"><span class="button media_upload_button" id="' + sliderId + '_' + newNum + '">Upload</span><span class="button remove-image hide" id="reset_' + sliderId + '_' + newNum + '" title="' + sliderId + '_' + newNum + '">Remove</span></div><div class="screenshot"></div><label>Link URL (optional)</label><input class="slide of-input" name="' + sliderId + '[' + newNum + '][link]" id="' + sliderId + '_' + newNum + '_slide_link" value=""><label>Description (optional)</label><textarea class="slide of-input" name="' + sliderId + '[' + newNum + '][description]" id="' + sliderId + '_' + newNum + '_slide_description" cols="8" rows="8"></textarea><a class="slide_delete_button" href="#">Delete</a><div class="clear"></div></div></li>';
		
		slidesContainer.append(newSlide);
		var nSlide = slidesContainer.find('.temphide');
		nSlide.fadeIn('fast', function() {
			$(this).removeClass('temphide');
		});
				
		optionsframework_file_bindings(); // re-initialise upload image..
		
		return false; //prevent jumps, as always..
	});	
	
	//Sort slides
	jQuery('.slider').find('ul').each( function() {
		var id = jQuery(this).attr('id');
		$('#'+ id).sortable({
			placeholder: "placeholder",
			opacity: 0.6,
			handle: ".slide_header",
			cancel: "a"
		});	
	});
	
	
	/**	Sorter (Layout Manager) */
	jQuery('.sorter').each( function() {
		var id = jQuery(this).attr('id');
		$('#'+ id).find('ul').sortable({
			items: 'li',
			placeholder: "placeholder",
			connectWith: '.sortlist_' + id,
			opacity: 0.6,
			update: function() {
				$(this).find('.position').each( function() {
				
					var listID = $(this).parent().attr('id');
					var parentID = $(this).parent().parent().attr('id');
					parentID = parentID.replace(id + '_', '')
					var optionID = $(this).parent().parent().parent().attr('id');
					$(this).prop("name", optionID + '[' + parentID + '][' + listID + ']');
					
				});
			}
		});	
	});
	
	
	/**	Ajax Backup & Restore MOD */
	//backup button
	$('#of_backup_button').live('click', function(){
	
		var answer = confirm("Click OK to backup your current saved options.")
		
		if (answer){
	
			var clickedObject = $(this);
			var clickedID = $(this).attr('id');
					
			var nonce = $('#security').val();
		
			var data = {
				action: 'of_ajax_post_action',
				type: 'backup_options',
				security: nonce
			};
						
			$.post(ajaxurl, data, function(response) {
							
				//check nonce
				if(response==-1){ //failed
								
					var fail_popup = $('#of-popup-fail');
					fail_popup.fadeIn();
					window.setTimeout(function(){
						fail_popup.fadeOut();                        
					}, 2000);
				}
							
				else {
							
					var success_popup = $('#of-popup-save');
					success_popup.fadeIn();
					window.setTimeout(function(){
						location.reload();                        
					}, 1000);
				}
							
			});
			
		}
		
	return false;
					
	}); 
	
	//restore button
	$('#of_restore_button').live('click', function(){
	
		var answer = confirm("'Warning: All of your current options will be replaced with the data from your last backup! Proceed?")
		
		if (answer){
	
			var clickedObject = $(this);
			var clickedID = $(this).attr('id');
					
			var nonce = $('#security').val();
		
			var data = {
				action: 'of_ajax_post_action',
				type: 'restore_options',
				security: nonce
			};
						
			$.post(ajaxurl, data, function(response) {
			
				//check nonce
				if(response==-1){ //failed
								
					var fail_popup = $('#of-popup-fail');
					fail_popup.fadeIn();
					window.setTimeout(function(){
						fail_popup.fadeOut();                        
					}, 2000);
				}
							
				else {
							
					var success_popup = $('#of-popup-save');
					success_popup.fadeIn();
					window.setTimeout(function(){
						location.reload();                        
					}, 1000);
				}	
						
			});
	
		}
	
	return false;
					
	});
	
	/**	Ajax Transfer (Import/Export) Option */
	$('#of_import_button').live('click', function(){
	
		var answer = confirm("Click OK to import options.")
		
		if (answer){
	
			var clickedObject = $(this);
			var clickedID = $(this).attr('id');
					
			var nonce = $('#security').val();
			
			var import_data = $('#export_data').val();
		
			var data = {
				action: 'of_ajax_post_action',
				type: 'import_options',
				security: nonce,
				data: import_data
			};
						
			$.post(ajaxurl, data, function(response) {
				var fail_popup = $('#of-popup-fail');
				var success_popup = $('#of-popup-save');
				
				//check nonce
				if(response==-1){ //failed
					fail_popup.fadeIn();
					window.setTimeout(function(){
						fail_popup.fadeOut();                        
					}, 2000);
				}		
				else 
				{
					success_popup.fadeIn();
					window.setTimeout(function(){
						location.reload();                        
					}, 1000);
				}
							
			});
			
		}
		
	return false;
					
	});
	
	/** AJAX Save Options */
	$('#of_save').live('click',function() {
			
		var nonce = $('#security').val();
					
		$('.ajax-loading-img').fadeIn();
		
		//get serialized data from all our option fields			
		var serializedReturn = $('#of_form :input[name][name!="security"][name!="of_reset"]').serialize();
		
		$('#of_form :input[type=checkbox]').each(function() {     
		    if (!this.checked) {
		        serializedReturn += '&'+this.name+'=0';
		    }
		});
				
		var data = {
			type: 'save',
			action: 'of_ajax_post_action',
			security: nonce,
			data: serializedReturn
		};
					
		$.post(ajaxurl, data, function(response) {
			var success = $('#of-popup-save');
			var fail = $('#of-popup-fail');
			var loading = $('.ajax-loading-img');
			loading.fadeOut();  
						
			if (response==1) {
				success.fadeIn();
			} else { 
				fail.fadeIn();
			}
						
			window.setTimeout(function(){
				success.fadeOut(); 
				fail.fadeOut();				
			}, 2000);
		});
			
	return false; 
					
	});   
	
	
	/* AJAX Options Reset */	
	$('#of_reset').click(function() {
		
		//confirm reset
		var answer = confirm("Click OK to reset. All settings will be lost and replaced with default settings!");
		
		//ajax reset
		if (answer){
			
			var nonce = $('#security').val();
						
			$('.ajax-reset-loading-img').fadeIn();
							
			var data = {
			
				type: 'reset',
				action: 'of_ajax_post_action',
				security: nonce,
			};
						
			$.post(ajaxurl, data, function(response) {
				var success = $('#of-popup-reset');
				var fail = $('#of-popup-fail');
				var loading = $('.ajax-reset-loading-img');
				loading.fadeOut();  
							
				if (response==1)
				{
					success.fadeIn();
					window.setTimeout(function(){
						location.reload();                        
					}, 1000);
				} 
				else 
				{ 
					fail.fadeIn();
					window.setTimeout(function(){
						fail.fadeOut();				
					}, 2000);
				}
							

			});
			
		}
			
	return false;
		
	});


	/**	Tipsy @since v1.3 */
	if (jQuery().tipsy) {
		$('.typography-size, .typography-height, .typography-face, .typography-style, .of-typography-color').tipsy({
			fade: true,
			gravity: 's',
			opacity: 0.7,
		});
	}
	
	
	/**
	  * JQuery UI Slider function
	  * Dependencies 	 : jquery, jquery-ui-slider
	  * Feature added by : Smartik - http://smartik.ws/
	  * Date 			 : 03.17.2013
	  */
	jQuery('.smof_sliderui').each(function() {
		
		var obj   = jQuery(this);
		var sId   = "#" + obj.data('id');
		var val   = parseInt(obj.data('val'));
		var min   = parseInt(obj.data('min'));
		var max   = parseInt(obj.data('max'));
		var step  = parseInt(obj.data('step'));
		
		//slider init
		obj.slider({
			value: val,
			min: min,
			max: max,
			step: step,
			range: "min",
			slide: function( event, ui ) {
				jQuery(sId).val( ui.value );
			}
		});
		
	});


	/**
	  * Switch
	  * Dependencies 	 : jquery
	  * Feature added by : Smartik - http://smartik.ws/
	  * Date 			 : 03.17.2013
	  */
	jQuery(".cb-enable").click(function(){
		var parent = $(this).parents('.switch-options');
		jQuery('.cb-disable',parent).removeClass('selected');
		jQuery(this).addClass('selected');
		jQuery('.main_checkbox',parent).attr('checked', true);
		
		//fold/unfold related options
		var obj = jQuery(this);
		var $fold='.f_'+obj.data('id');
		jQuery($fold).slideDown('normal', "swing");
	});
	jQuery(".cb-disable").click(function(){
		var parent = $(this).parents('.switch-options');
		jQuery('.cb-enable',parent).removeClass('selected');
		jQuery(this).addClass('selected');
		jQuery('.main_checkbox',parent).attr('checked', false);
		
		//fold/unfold related options
		var obj = jQuery(this);
		var $fold='.f_'+obj.data('id');
		jQuery($fold).slideUp('normal', "swing");
	});
	//disable text select(for modern chrome, safari and firefox is done via CSS)
	if (($.browser.msie && $.browser.version < 10) || $.browser.opera) { 
		$('.cb-enable span, .cb-disable span').find().attr('unselectable', 'on');
	}
	
	
	/**
	  * Google Fonts
	  * Dependencies 	 : google.com, jquery
	  * Feature added by : Smartik - http://smartik.ws/
	  * Date 			 : 03.17.2013
	  */
	function GoogleFontSelect( slctr, mainID ){
		
		var _selected = $(slctr).val(); 						//get current value - selected and saved
		var _linkclass = 'style_link_'+ mainID;
		var _previewer = mainID +'_ggf_previewer';
		
		if( _selected ){ //if var exists and isset
			
			$('.'+ _previewer ).fadeIn();

			//Check if selected is not equal with "Select a font" and execute the script.
			if ( _selected !== 'none' && _selected !== 'Select a font' ) {
				
				//remove other elements crested in <head>
				$( '.'+ _linkclass ).remove();
				
				//replace spaces with "+" sign
				var the_font = _selected.replace(/\s+/g, '+');
				
				//add reference to google font family
				$('head').append('<link href="http://fonts.googleapis.com/css?family='+ the_font +'" rel="stylesheet" type="text/css" class="'+ _linkclass +'">');
				
				//show in the preview box the font
				$('.'+ _previewer ).css('font-family', _selected +', sans-serif' );
				
			}else{
				
				//if selected is not a font remove style "font-family" at preview box
				$('.'+ _previewer ).css('font-family', '' );
				$('.'+ _previewer ).fadeOut();
				
			}
		
		}
	
	}
	
	//init for each element
	jQuery( '.google_font_select' ).each(function(){ 
		var mainID = jQuery(this).attr('id');
		GoogleFontSelect( this, mainID );
	});
	
	//init when value is changed
	jQuery( '.google_font_select' ).change(function(){ 
		var mainID = jQuery(this).attr('id');
		GoogleFontSelect( this, mainID );
	});


	/**
	  * Media Uploader
	  * Dependencies 	 : jquery, wp media uploader
	  * Feature added by : Smartik - http://smartik.ws/
	  * Date 			 : 05.28.2013
	  */
	function optionsframework_add_file(event, selector) {
	
		var upload = $(".uploaded-file"), frame;
		var $el = $(this);

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( frame ) {
			frame.open();
			return;
		}

		// Create the media frame.
		frame = wp.media({
			// Set the title of the modal.
			title: $el.data('choose'),

			// Customize the submit button.
			button: {
				// Set the text of the button.
				text: $el.data('update'),
				// Tell the button not to close the modal, since we're
				// going to refresh the page when the image is selected.
				close: false
			}
		});

		// When an image is selected, run a callback.
		frame.on( 'select', function() {
			// Grab the selected attachment.
			var attachment = frame.state().get('selection').first();
			frame.close();
			selector.find('.upload').val(attachment.attributes.url);
			if ( attachment.attributes.type == 'image' ) {
				selector.find('.screenshot').empty().hide().append('<img class="of-option-image" src="' + attachment.attributes.url + '">').slideDown('fast');
			}
			selector.find('.media_upload_button').unbind();
			selector.find('.remove-image').show().removeClass('hide');//show "Remove" button
			selector.find('.of-background-properties').slideDown();
			optionsframework_file_bindings();
		});

		// Finally, open the modal.
		frame.open();
	}
    
	function optionsframework_remove_file(selector) {
		selector.find('.remove-image').hide().addClass('hide');//hide "Remove" button
		selector.find('.upload').val('');
		selector.find('.of-background-properties').hide();
		selector.find('.screenshot').slideUp();
		selector.find('.remove-file').unbind();
		// We don't display the upload button if .upload-notice is present
		// This means the user doesn't have the WordPress 3.5 Media Library Support
		if ( $('.section-upload .upload-notice').length > 0 ) {
			$('.media_upload_button').remove();
		}
		optionsframework_file_bindings();
	}
	
	function optionsframework_file_bindings() {
		$('.remove-image, .remove-file').on('click', function() {
			optionsframework_remove_file( $(this).parents('.section-upload, .section-media, .slide_body') );
        });
        
        $('.media_upload_button').unbind('click').click( function( event ) {
        	optionsframework_add_file(event, $(this).parents('.section-upload, .section-media, .slide_body'));
        });
    }
    
    optionsframework_file_bindings();

	
	

}); //end doc ready

jQuery(document).ready(function($) {    

    var lightred = new Array();
    lightred['primary_color']='#f96e5b';
	lightred['header_sp_bg_hover']='#f96e5b';
	lightred['twitter_bar_bg']='#f96e5b';
	lightred['link_color_hover']='#f96e5b';
	lightred['header_contact_link_color']='#f96e5b';
	lightred['call_action_span_color']='#f96e5b';
	lightred['menu_border_color_hover']='#f96e5b';
	lightred['blog_post_date_bg_color']='#f96e5b';
	lightred['search_button_bg_color_hover']='#f96e5b';
	lightred['image_hover_icon_bg']='#f96e5b';
	lightred['portf_title_bg_color_hover']='#f96e5b';
	lightred['span_text_color']='#f96e5b';
	lightred['minimal_bg_inverse_color']='#f96e5b';
	lightred['clients_border_color_hover']='#f96e5b';
	lightred['cool_title_border_color']='#f96e5b';
	lightred['fs_box_bg_color_hover']='#f96e5b';
	lightred['fs_box_title_color']='#f96e5b';
	lightred['pf_icon_bg1']='#f96e5b';
	lightred['pf_icon_title1']='#f96e5b';
	lightred['pt_best_price_title']='#f96e5b';
	lightred['pt_best_price_bg'] = lightred['post_navigation_color_hover'] = lightred['back_top_bg_hover'] = lightred['mm_headings_hover'] = lightred['portf_rh_bg'] = lightred['testimonial_link_color'] = lightred['wc_button_bg_hover'] =lightred['acc_active_title'] = lightred['acc_active_icon'] = lightred['tabs_active_tab'] = lightred['tabs_active_text'] = lightred['tour_active_tab'] = lightred['tour_active_text'] = lightred['wrapper_top_border_color'] = lightred['menu_first_color_hover'] = lightred['woo_sale_tag'] = lightred['woo_prod_price'] = lightred['page_navi_color']= lightred['slide_arrow_color'] ='#f96e5b';	

	
    var darkred = new Array();
    darkred['primary_color']='#961a34';
	darkred['header_sp_bg_hover']='#961a34';
	darkred['twitter_bar_bg']='#961a34';	
	darkred['link_color_hover']='#961a34';
	darkred['header_contact_link_color']='#961a34';
	darkred['call_action_span_color']='#961a34';
	darkred['menu_border_color_hover']='#961a34';
	darkred['blog_post_date_bg_color']='#961a34';
	darkred['search_button_bg_color_hover']='#961a34';
	darkred['image_hover_icon_bg']='#961a34';
	darkred['portf_title_bg_color_hover']='#961a34';
	darkred['span_text_color']='#961a34';
	darkred['minimal_bg_inverse_color']='#961a34';
	darkred['clients_border_color_hover']='#961a34';
	darkred['cool_title_border_color']='#961a34';
	darkred['fs_box_bg_color_hover']='#961a34';
	darkred['fs_box_title_color']='#961a34';	
	darkred['pf_icon_bg1']='#961a34';
	darkred['pf_icon_title1']='#961a34';
	darkred['pt_best_price_title']='#961a34';
	darkred['pt_best_price_bg'] = darkred['post_navigation_color_hover'] = darkred['back_top_bg_hover'] = darkred['mm_headings_hover'] = darkred['portf_rh_bg'] = darkred['testimonial_link_color'] = darkred['wc_button_bg_hover'] = darkred['acc_active_title'] = darkred['acc_active_icon'] = darkred['tabs_active_tab'] = darkred['tabs_active_text'] = darkred['tour_active_tab'] = darkred['tour_active_text'] = darkred['wrapper_top_border_color'] = darkred['menu_first_color_hover'] = darkred['woo_sale_tag'] = darkred['woo_prod_price'] = darkred['page_navi_color']= darkred['slide_arrow_color'] = '#961a34';	
	
	var orange = new Array();
    orange['primary_color']='#ff7534';
	orange['header_sp_bg_hover']='#ff7534';
    orange['twitter_bar_bg']='#ff7534';	
	orange['link_color_hover']='#ff7534';
    orange['header_contact_link_color']='#ff7534';
	orange['call_action_span_color']='#ff7534';	
	orange['menu_border_color_hover']='#ff7534';
	orange['blog_post_date_bg_color']='#ff7534';
	orange['search_button_bg_color_hover']='#ff7534';
	orange['image_hover_icon_bg']='#ff7534';
	orange['portf_title_bg_color_hover']='#ff7534';
	orange['span_text_color']='#ff7534';
	orange['minimal_bg_inverse_color']='#ff7534';
	orange['clients_border_color_hover']='#ff7534';
	orange['cool_title_border_color']='#ff7534';
	orange['fs_box_bg_color_hover']='#ff7534';
	orange['fs_box_title_color']='#ff7534';
	orange['pf_icon_bg1']='#ff7534';
	orange['pf_icon_title1']='#ff7534';
	orange['pt_best_price_title']='#ff7534';
	orange['pt_best_price_bg'] = orange['post_navigation_color_hover'] = orange['back_top_bg_hover'] = orange['mm_headings_hover'] = orange['portf_rh_bg'] = orange['testimonial_link_color'] = orange['wc_button_bg_hover'] = orange['acc_active_title'] = orange['acc_active_icon'] = orange['tabs_active_tab'] = orange['tabs_active_text'] = orange['tour_active_tab'] = orange['tour_active_text'] = orange['menu_first_color_hover'] = orange['wrapper_top_border_color'] = orange['woo_sale_tag'] = orange['woo_prod_price'] = orange['page_navi_color']= orange['slide_arrow_color'] = '#ff7534';
	
	var turquoise = new Array();
    turquoise['primary_color']='#00d1c5';
	turquoise['header_sp_bg_hover']='#00d1c5';
	turquoise['twitter_bar_bg']='#00d1c5';
	turquoise['link_color_hover']='#00d1c5';
	turquoise['header_contact_link_color']='#00d1c5';
	turquoise['call_action_span_color']='#00d1c5';
	turquoise['menu_border_color_hover']='#00d1c5';
	turquoise['blog_post_date_bg_color']='#00d1c5';
	turquoise['search_button_bg_color_hover']='#00d1c5';
	turquoise['image_hover_icon_bg']='#00d1c5';
	turquoise['portf_title_bg_color_hover']='#00d1c5';
	turquoise['span_text_color']='#00d1c5';
	turquoise['minimal_bg_inverse_color']='#00d1c5';
	turquoise['clients_border_color_hover']='#00d1c5';
	turquoise['cool_title_border_color']='#00d1c5';
	turquoise['fs_box_bg_color_hover']='#00d1c5';
	turquoise['fs_box_title_color']='#00d1c5';
	turquoise['pf_icon_bg1']='#00d1c5';
	turquoise['pf_icon_title1']='#00d1c5';
	turquoise['pt_best_price_title']='#00d1c5';
	turquoise['pt_best_price_bg'] = turquoise['post_navigation_color_hover'] = turquoise['back_top_bg_hover'] = turquoise['mm_headings_hover'] = turquoise['portf_rh_bg'] = turquoise['testimonial_link_color'] = turquoise['wc_button_bg_hover'] = turquoise['acc_active_title'] = turquoise['acc_active_icon'] = turquoise['tabs_active_tab'] = turquoise['tabs_active_text'] = turquoise['tour_active_tab'] = turquoise['menu_first_color_hover'] = turquoise['tour_active_text'] = turquoise['wrapper_top_border_color'] = turquoise['woo_prod_price'] = turquoise['woo_sale_tag'] = turquoise['page_navi_color']= turquoise['slide_arrow_color'] ='#00d1c5';
	
	var emerald = new Array();
    emerald['primary_color']='#37ba85';
	emerald['header_sp_bg_hover']='#37ba85';
	emerald['twitter_bar_bg']='#37ba85';
	emerald['link_color_hover']='#37ba85';
	emerald['header_contact_link_color']='#37ba85';
	emerald['call_action_span_color']='#37ba85';
	emerald['menu_border_color_hover']='#37ba85';
	emerald['blog_post_date_bg_color']='#37ba85';
	emerald['search_button_bg_color_hover']='#37ba85';
	emerald['image_hover_icon_bg']='#37ba85';
	emerald['portf_title_bg_color_hover']='#37ba85';
	emerald['span_text_color']='#37ba85';
	emerald['minimal_bg_inverse_color']='#37ba85';
	emerald['clients_border_color_hover']='#37ba85';
	emerald['cool_title_border_color']='#37ba85';
	emerald['fs_box_bg_color_hover']='#37ba85';
	emerald['fs_box_title_color']='#37ba85';
	emerald['pf_icon_bg1']='#37ba85';
	emerald['pf_icon_title1']='#37ba85';
	emerald['pt_best_price_title']='#37ba85';
	emerald['pt_best_price_bg'] = emerald['post_navigation_color_hover'] = emerald['back_top_bg_hover'] = emerald['mm_headings_hover'] = emerald['portf_rh_bg'] = emerald['testimonial_link_color'] = emerald['wc_button_bg_hover'] = emerald['acc_active_title'] = emerald['acc_active_icon'] = emerald['tabs_active_tab'] = emerald['tabs_active_text'] = emerald['tour_active_tab'] = emerald['tour_active_text'] = emerald['menu_first_color_hover'] = emerald['wrapper_top_border_color'] = emerald['woo_prod_price'] = emerald['page_navi_color']= emerald['slide_arrow_color'] = emerald['woo_sale_tag'] ='#37ba85';
	
	var lightblue = new Array();
    lightblue['primary_color']='#3498db';
	lightblue['header_sp_bg_hover']='#3498db';
	lightblue['twitter_bar_bg']='#3498db';
	lightblue['link_color_hover']='#3498db';
	lightblue['header_contact_link_color']='#3498db';
	lightblue['call_action_span_color']='#3498db';
	lightblue['menu_border_color_hover']='#3498db';
	lightblue['blog_post_date_bg_color']='#3498db';
	lightblue['search_button_bg_color_hover']='#3498db';
	lightblue['image_hover_icon_bg']='#3498db';
	lightblue['portf_title_bg_color_hover']='#3498db';
	lightblue['span_text_color']='#3498db';
	lightblue['minimal_bg_inverse_color']='#3498db';
	lightblue['clients_border_color_hover']='#3498db';
	lightblue['cool_title_border_color']='#3498db';
	lightblue['fs_box_bg_color_hover']='#3498db';
	lightblue['fs_box_title_color']='#3498db';
	lightblue['pf_icon_bg1']='#3498db';
	lightblue['pf_icon_title1']='#3498db';
	lightblue['pt_best_price_title']='#3498db';
	lightblue['pt_best_price_bg'] = lightblue['post_navigation_color_hover'] = lightblue['back_top_bg_hover'] = lightblue['mm_headings_hover'] = lightblue['portf_rh_bg'] = lightblue['testimonial_link_color'] = lightblue['wc_button_bg_hover'] = lightblue['acc_active_title'] = lightblue['acc_active_icon'] = lightblue['tabs_active_tab'] = lightblue['tabs_active_text'] = lightblue['tour_active_tab'] = lightblue['menu_first_color_hover'] = lightblue['tour_active_text'] = lightblue['wrapper_top_border_color'] = lightblue['woo_sale_tag'] = lightblue['woo_prod_price'] = lightblue['page_navi_color']= lightblue['slide_arrow_color'] ='#3498db';
	
	var amethyst = new Array();
    amethyst['primary_color']='#9b59b6';
	amethyst['header_sp_bg_hover']='#9b59b6';
	amethyst['twitter_bar_bg']='#9b59b6';
	amethyst['link_color_hover']='#9b59b6';
	amethyst['header_contact_link_color']='#9b59b6';
	amethyst['call_action_span_color']='#9b59b6';
	amethyst['menu_border_color_hover']='#9b59b6';
	amethyst['blog_post_date_bg_color']='#9b59b6';
	amethyst['search_button_bg_color_hover']='#9b59b6';
	amethyst['image_hover_icon_bg']='#9b59b6';
	amethyst['portf_title_bg_color_hover']='#9b59b6';
	amethyst['span_text_color']='#9b59b6';
	amethyst['minimal_bg_inverse_color']='#9b59b6';
	amethyst['clients_border_color_hover']='#9b59b6';
	amethyst['cool_title_border_color']='#9b59b6';
	amethyst['fs_box_bg_color_hover']='#9b59b6';
	amethyst['fs_box_title_color']='#9b59b6';
	amethyst['pf_icon_bg1']='#9b59b6';
	amethyst['pf_icon_title1']='#9b59b6';
	amethyst['pt_best_price_title']='#9b59b6';
	amethyst['pt_best_price_bg'] = amethyst['post_navigation_color_hover'] = amethyst['back_top_bg_hover'] = amethyst['mm_headings_hover'] = amethyst['portf_rh_bg'] = amethyst['testimonial_link_color'] = amethyst['wc_button_bg_hover'] = amethyst['acc_active_title'] = amethyst['acc_active_icon'] = amethyst['tabs_active_tab'] = amethyst['tabs_active_text'] = amethyst['tour_active_tab'] = amethyst['menu_first_color_hover'] = amethyst['tour_active_text'] = amethyst['wrapper_top_border_color'] = amethyst['woo_sale_tag'] = amethyst['woo_prod_price'] = amethyst['page_navi_color']= amethyst['slide_arrow_color'] ='#9b59b6';
	
	
	
	var wetasphalt = new Array();
    wetasphalt['primary_color']='#34495e';
	wetasphalt['header_sp_bg_hover']='#34495e';
	wetasphalt['twitter_bar_bg']='#34495e';
	wetasphalt['link_color_hover']='#34495e';
	wetasphalt['header_contact_link_color']='#34495e';
	wetasphalt['call_action_span_color']='#34495e';
	wetasphalt['menu_border_color_hover']='#34495e';
	wetasphalt['blog_post_date_bg_color']='#34495e';
	wetasphalt['search_button_bg_color_hover']='#34495e';
	wetasphalt['image_hover_icon_bg']='#34495e';
	wetasphalt['portf_title_bg_color_hover']='#34495e';
	wetasphalt['span_text_color']='#34495e';
	wetasphalt['minimal_bg_inverse_color']='#34495e';
	wetasphalt['clients_border_color_hover']='#34495e';
	wetasphalt['cool_title_border_color']='#34495e';
	wetasphalt['fs_box_bg_color_hover']='#34495e';
	wetasphalt['fs_box_title_color']='#34495e';
	wetasphalt['pf_icon_bg1']='#34495e';
	wetasphalt['pf_icon_title1']='#34495e';
	wetasphalt['pt_best_price_title']='#34495e';
	wetasphalt['pt_best_price_bg'] = wetasphalt['post_navigation_color_hover'] = wetasphalt['back_top_bg_hover'] = wetasphalt['mm_headings_hover'] = wetasphalt['portf_rh_bg'] = wetasphalt['testimonial_link_color'] = wetasphalt['wc_button_bg_hover'] = wetasphalt['acc_active_title'] = wetasphalt['acc_active_icon'] = wetasphalt['tabs_active_tab'] = wetasphalt['tabs_active_text'] = wetasphalt['tour_active_tab'] = wetasphalt['menu_first_color_hover'] = wetasphalt['tour_active_text'] = wetasphalt['wrapper_top_border_color'] = wetasphalt['woo_sale_tag'] = wetasphalt['woo_prod_price'] = wetasphalt['page_navi_color']= wetasphalt['slide_arrow_color'] = '#34495e';


    $('#color_scheme').change(function() {
        colorscheme = $(this).val();
		
        if (colorscheme == 'Light Red') { colorscheme = lightred; }
		if (colorscheme == 'Dark Red') { colorscheme = darkred; }
        if (colorscheme == 'Orange') { colorscheme = orange; }
        if (colorscheme == 'Turquoise') { colorscheme = turquoise; }
        if (colorscheme == 'Emerald') { colorscheme = emerald; }
        if (colorscheme == 'Light Blue') { colorscheme = lightblue; }
		if (colorscheme == 'Amethyst') { colorscheme = amethyst; }
        if (colorscheme == 'Wet Asphalt') { colorscheme = wetasphalt; }

        for (id in colorscheme) {
            of_update_color(id,colorscheme[id]);
        }

        of_update_color('counter_filled_color', $('#primary_color').val());
    });

    // This does the heavy lifting of updating all the colorpickers and text
    function of_update_color(id,hex) {
        //$('#section-' + id + ' .of-color').css({backgroundColor:hex});
        $('#section-' + id + ' .of-color').wpColorPicker('color',hex);
//        $('#section-' + id + ' .colorSelector').children('div').css('backgroundColor', hex);
 //       $('#section-' + id + ' .of-color').val(hex);
        //$('#section-' + id + ' .of-color').animate({backgroundColor:'#ffffff'}, 600);
    }

});