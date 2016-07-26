(function() {
	tinymce.PluginManager.add('tfbutton', function( editor, url ) {
		editor.addButton('tfbutton', {			
			icon: 'nimva_sh',
			type: 'menubutton',
			menu: [
				{
					icon: 'checklist',
					text: 'Checklist',
					onclick: function() {
						editor.insertContent('[checklist icon="fa-star" font_size="12"]<ul><li>My First Item</li><li>My Second Item</li><li>My Third Item</li></ul>[/checklist]');
					}
				},
				{
					icon: 'dropcap',
					text: 'Dropcap',
					onclick: function() {
						editor.insertContent('[dropcap color="#f96e5b"]...[/dropcap]');
					}
				},
				{
					icon: 'highlight',
					text: 'Highlight',
					onclick: function() {
						editor.insertContent('[highlight color="#f96e5b"]...[/highlight]');
					}
				},
				{
					icon: 'tooltip',
					text: 'Tooltip',
					onclick: function() {
						editor.insertContent('[tooltip title="Text Tooltip" position="left, right, top, bottom" link=""]Hover over this text for Tooltip[/tooltip]');
					}
				},
				{
					icon: 'fontawesome',
					text: 'FontAwesome Icon',
					onclick: function() {
						editor.insertContent('[fontawesome icon="fa-laptop"]');
					}
				}
			]
		});
	});
})();
/*
(function() {  
    tinymce.create('tinymce.plugins.tfbutton', {
        init : function(ed, url) {  
            nimva_shortcode_url = url;
        },    
        createControl : function(n, cm) {
            switch(n) {
                case 'tfbutton':
                    var c = cm.createSplitButton('tfbutton', {
                        title : 'Nimva Shortcodes',
                        image : nimva_shortcode_url+'/tfbutton-nimva.png'
                    }); 

                    c.onRenderMenu.add(function(c, m) {
                        m.add({
                            title : 'Shortcodes',
                            'class' : 'mceMenuItemTitle'
                        }).setDisabled(1);
						
						m.add({
                            title : '1 Full Column',
                            icon: 'full-column',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[col_full]...[/col_full]');
                            }
                        });
						
						m.add({
                            title : '1/2 Column',
                            icon: 'half-column',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[one_half last="no"]...[/one_half]');
                            }
                        });
						
						m.add({
                            title : '1/3 Column',
                            icon: 'one-third-column',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[one_third last="no"]...[/one_third]');
                            }
                        });
						
						m.add({
                            title : '2/3 Column',
                            icon: 'two-third-column',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[two_third last="no"]...[/two_third] ');
                            }
                        });
						
						m.add({
                            title : '1/4 Column',
                            icon: 'one-fourth-column',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[one_fourth last="no"]...[/one_fourth]');
                            }
                        });
						
						m.add({
                            title : '3/4 Column',
                            icon: 'three-fourth-column',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[three_fourth last="no"]...[/three_fourth]');
                            }
                        });
						
						m.add({
                            title : '1/5 Column',
                            icon: 'one-fifth-column',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[one_fifth last="no"]...[/one_fifth]');
                            }
                        });
						
						m.add({
                            title : '2/5 Column',
                            icon: 'two-fifth-column',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[two_fifth last="no"]...[/two_fifth]');
                            }
                        });
						
						m.add({
                            title : '3/5 Column',
                            icon: 'three-fifth-column',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[three_fifth last="no"]...[/three_fifth]');
                            }
                        });
						
						m.add({
                            title : '4/5 Column',
                            icon: 'four-fifth-column',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[four_fifth last="no"]...[/four_fifth]');
                            }
                        });
						
						m.add({
                            title : 'Alert',
                            icon: 'alert',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[alert type="e.g. success, error, info, notice, general" title="Alert Box Title"]Your Message Goes Here.[/alert]');
                            }
                        });
						
						m.add({
                            title : 'Button Minimal',
                            icon: 'button-minimal',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[button_minimal link="" size="large, normal" inverse_colors="yes, no" icon="icon-comments-alt"]Your Text[/button_minimal]');
                            }
                        });
						
						m.add({
                            title : 'Button Colored',
                            icon: 'button-colored',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[button_colored link="" color="red, blue, orange, green, purple, black, white" icon="icon-comments-alt"]Your Text[/button_colored]');
                            }
                        });
						
						m.add({
                            title : 'Button Bootstrap',
                            icon: 'button-bootstrap',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[button_bootstrap link="" style="primary, info, success, warning, danger, inverse, default" size="large, small, mini" ]Your Text[/button_bootstrap]');
                            }
                        });
						
						m.add({
                            title : 'Checklist',
                            icon: 'checklist',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[checklist icon="icon-caret-right"]<ul><li>My First Item</li><li>My Second Item</li><li>My Third Item</li></ul>[/checklist]');
                            }
                        }); 
						
						m.add({
                            title : 'Clients',
                            icon: 'clients',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[clients]<br />[client link=""]image url here[/client]<br />[client link=""]image url here[/client]<br />[/clients]');
                            }
                        });
						
						m.add({
                            title : 'Cool Title',
                            icon: 'cool-title',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[cooltitle icon="icon-laptop"]My Cool title[/cooltitle]');
                            }
                        });
						
						m.add({
                            title : 'Dropcap',
                            icon: 'dropcap',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[dropcap]...[/dropcap]');
                            }
                        });
						
						m.add({
                            title : 'FAQs',
                            icon: 'dropcap',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[faqs items="5"]');
                            }
                        });
						
						m.add({
                            title : 'Featured Services',
                            icon: 'featured-services',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[featured_services title="85+ HTML Pages" icon="icon-cogs" link="" picture_icon_url=""]<br />Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit.<br />[/featured_services]');
                            }
                        });
						
						m.add({
                            title : 'FontAwesome Icon',
                            icon: 'fontawesome',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[fontawesome icon="icon-laptop"]');
                            }
                        });
						
						m.add({
                            title : 'Highlight',
                            icon: 'highlight',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[highlight color="#f96e5b"]...[/highlight]');
                            }
                        });
						
						m.add({
                            title : 'HR Element',
                            icon: 'hr',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[hr style="1, 2" height="small, big"]');
                            }
                        });
						
						m.add({
                            title : 'Infobox',
                            icon: 'infobox',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[infobox align="" title="Nimva is fully responsive and beautifully crafted for mobile devices."]<br />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum.<br />[/infobox]');
                            }
                        });
						
						m.add({
                            title : 'Lightbox Image',
                            icon: 'lightbox',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('<a href="full image link" rel="prettyPhoto" title="lightbox description"><img src="thumbnail image link" alt="lightbox title" /></a>');
                            }
                        });
						
						m.add({
                            title : 'Person',
                            icon: 'person',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[person name="John Doe" picture="" position="Developer" facebook="http://facebook.com" twitter="http://twitter.com" linkedin="http://linkedin.com" dribbble="http://dribbble.com" vimeo="http://vimeo.com" gplus="http://google.com/plus" flickr="http://flickr.com"]Redantium, totam rem aperiam, eaque ipsa qu ab illo inventore veritatis et quasi architectos beatae vitae dicta sunt explicabo. Nemo enim.[/person]');
                            }
                        });
						
						m.add({
                            title : 'Progress Bar',
                            icon: 'progress-bar',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[bar percentage="90%" background_color="" style="e.g: 1, 2, 3"]Web Design[/bar]');
                            }
                        });					

						m.add({
                            title : 'Product Feature',
                            icon: 'product-feature',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[product_feature title="85+ HTML Pages" style="1, 2" link="" icon="icon-copy" picture_icon_url="" ]<br />Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit.<br />[/product_feature]');
                            }
                        });						
						
						m.add({
                            title : 'Pricing Table',
                            icon: 'pricing-table',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[pricing_table columns="e.g. 3, 4 or 5" spaced_columns="no"]<p>[pricing_column title="Basic Plan" type="e.g. normal, best" price="7.99" currency="$" time="monthly"]</p><ul><li>Free Setup</li><li>Complex Stats</li><li>Basic Tracking</li></ul><p>[button_footer][button_minimal link="#" size="normal" inverse_colors="no"]Signup Now[/button_minimal][/button_footer]<br />[/pricing_column]</p>[/pricing_table]');
                            }
                        });
						
						m.add({
                            title : 'Recent Posts',
                            icon: 'recent-posts',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[recent_posts box_title="" columns="e.g: 3, 4, 5" items="6" category_id="" thumbnail="yes" show_date="yes" show_excerpt="yes" posts_title="yes" continue_reading="yes"][/recent_posts]');
                            }
                        });
						
						m.add({
                            title : 'Recent Works',
                            icon: 'recent-works',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[recent_works title="Our Portfolio" items="12" category=""][/recent_works]');
                            }
                        });
						
						m.add({
                            title : 'Social Links',
                            icon: 'social-links',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[social_links facebook="" twitter="" dribbble="" google="" linkedin="" tumblr="" vimeo="" youtube="" pinterest="" flickr="" skype=""]');
                            }
                        });		
						
						m.add({
                            title : 'Tabs',
                            icon: 'tabs',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[tabs tab1=\"Tab 1\" tab2=\"Tab 2\" tab3=\"Tab 3\" ]<br /><br />[tab id=tab1]Tab content 1[/tab]<br />[tab id=tab2]Tab content 2[/tab]<br />[tab id=tab3]Tab content 3[/tab]<br /><br />[/tabs]');
                            }
                        });				

						m.add({
                            title : 'Tagline Box',
                            icon: 'tagline-box',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[tagline_box link="http://themeforest.net/user/RockyThemes" button="Buy Theme" button_style="normal, inverse" title="Nimva, a Supreme Multi-Purpose WordPress Theme" description="Check out all the shortcodes Nimva comes packed with. We have a shortcode for everything you need!"][/tagline_box]');
                            }
                        });
						
						m.add({
                            title : 'Testimonials',
                            icon: 'testimonials',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[testimonials]<p>[testimonial author="John Doe" company="RockyThemes" link="http://rockythemes.com"]Donec eget dignissim augue. Donec ante felis, aliquam ut consequat eget, lobortis dapibus risus. Aliquam laoreet enim et lectus ornare hendrerit. Aliquam rhoncus enim libero. Morbi aliquam, nibh mattis feugiat dapibus, nisi massa adipiscing justo, sit amet condimentum urna ipsum et lacus.[/testimonial]<br/>[testimonial name="John Doe2" company="RockyThemes2"]Donec eget dignissim augue. Donec ante felis, aliquam ut consequat eget, lobortis dapibus risus. Aliquam laoreet enim et lectus ornare hendrerit. Aliquam rhoncus enim libero. Morbi aliquam, nibh mattis feugiat dapibus, nisi massa adipiscing justo, sit amet condimentum urna ipsum et lacus.[/testimonial]</p>[/testimonials]');
                            }
                        });
						
						m.add({
                            title : 'Toggle',
                            icon: 'toggle',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[toggle title="My Toggle Title" icon="icon-info-sign"]This is where the content of the toggle comes[/toggle] ');
                            }
                        }); 
						
						m.add({
                            title : 'Tooltip',
                            icon: 'tooltip',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[tooltip title="Text Tooltip" position="left, right, top, bottom" link=""]Hover over this text for Tooltip[/tooltip]');
                            }
                        });
						
						m.add({
                            title : 'Slider',
                            icon: 'slider',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[slider width="100%" float="none"]<br />[slide link=""]image src[/slide]<br />[slide link=""]image src[/slide]<br />[/slider]');
                            }
                        });					
								
						m.add({
                            title : 'Youtube Video',
                            icon: 'youtube',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[youtube id="Enter video ID (eg. Wq4Y7ztznKc)" width="600" height="350"]');
                            }
                        });
						
						m.add({
                            title : 'Vimeo Video',
                            icon: 'vimeo',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[vimeo id="Enter video ID (eg. 10145153)" width="600" height="350"]');
                            }
                        });
						
						m.add({
                            title : 'DailyMotion Video',
                            icon: 'dailym',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[dailym id="Enter video ID (eg. xvm1gx)" width="480" height="270" ]');
                            }
                        });
      
                    });

                  // Return the new menubutton instance
                  return c;
            }

            return null;
        },  
    });  
    tinymce.PluginManager.add('tfbutton', tinymce.plugins.tfbutton);  
})();
*/