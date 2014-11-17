(function () {
	tinymce.create("tinymce.plugins.sympleShortcodesPremium", {
		init: function ( ed, url ) {
			tinymce.plugins.sympleShortcodesPremium.theurl = url;
			ed.addCommand("sympleTB", function ( a, params ) {
				var popup = params.identifier;
				tb_show("Insert Symple Shortcode", url + "/mce-popup.php?popup=" + popup + "&width=" + 800);
			});
		},
		createControl: function ( btn, e ) {
			if ( btn == "symple_button_premium" ) {
				var a = this;
				var btn = e.createSplitButton('symple_button_premium', {
                    title: "Insert Shortcode",
					image: tinymce.plugins.sympleShortcodesPremium.theurl +"/images/icon.png",
					icons: false
                });
                btn.onRenderMenu.add(function (c, b) {					
					b.add({title : 'Insert Shortcodes', 'class' : 'mceMenuItemTitle'}).setDisabled(1);
					
					// Columns
					c = b.addMenu({title:"Layout"});
						a.render( c, "Columns", "columns" );
						a.render( c, "Spacing", "spacing" );
						a.render( c, "Background Area", "background_area" );
						a.render( c, "Centered Container", "centered_container" );
						//a.render( c, "Clear Floats", "clear" );
					
					b.addSeparator();
					
					// Elements
					c = b.addMenu({title:"Elements"});
									
						a.render( c, "Boxes", "boxes" );
						a.render( c, "Bullets", "bullets" );
						a.render( c, "Button", "button" );
						a.render( c, "Callout", "callout" );
						a.render( c, "Divider", "divider" );
						a.render( c, "Google Map", "googlemap" );
						a.render( c, "Heading", "heading" );
						a.render( c, "Highlight", "highlight" );
						a.render( c, "Icons", "icon" );
						a.render( c, "Pricing Table", "pricing" );
						a.render( c, "Skillbar", "skillbar" );
						a.render( c, "Social Icon", "social" );	
						a.render( c, "Testimonial", "testimonial" );
						
					b.addSeparator();
						
					// jQuery
					c = b.addMenu({title:"jQuery"});
					
						a.render( c, "Accordion", "accordion" );
						a.render( c, "Tabs", "tabs" );
						a.render( c, "Toggle", "toggle" );
					
					b.addSeparator();
					
					// Posts
					c = b.addMenu({title:"Recent Posts"});
					
						a.render( c, "Recent News", "recent_news" );
						a.render( c, "Posts Grid", "posts_grid" );
						a.render( c, "Posts Carousel", "posts_carousel" );
						a.render( c, "Posts Slider", "posts_flexslider" );
						
					b.addSeparator();
					
					// Attachments
					c = b.addMenu({title:"Image Attachments"});
					
						a.render( c, "Image Carousel", "attachments_carousel" );
						a.render( c, "Image Slider", "attachments_slider" );
						
					b.addSeparator();
						
					// Custom Sliders
					c = b.addMenu({title:"Custom Sliders"});
					
						a.render( c, "Carousel", "custom_carousel" );
						a.render( c, "FlexSlider", "custom_flexslider" );
						
					b.addSeparator();
					
					c = b.addMenu({title:"Other"});
					
						a.render( c, "WPML", "wpml" );
	
				});
                return btn;
			}
			return null;
		},
		render: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("sympleTB", false, {
						title: title,
						identifier: id
					})
				}
			})
		}
	});
	tinymce.PluginManager.add("sympleShortcodesPremium", tinymce.plugins.sympleShortcodesPremium);
})();