jQuery(document).ready(function(){
	"use strict";

    if (window.firstSubmainPadding != undefined) {
        jQuery('.l-submain').first().css('padding-top', window.firstSubmainPadding+'px');
    }

	if (jQuery.magnificPopup)
	{
		jQuery('.w-gallery-tnails').each(function() {
            jQuery(this).magnificPopup({
                type: 'image',
                delegate: 'a',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1]
                },
                removalDelay: 300,
                mainClass: 'mfp-fade',
                fixedContentPos: false

            });
        });

        if ( ! window.disable_wc_lightbox) {
            jQuery('.product .images').magnificPopup({
                type: 'image',
                delegate: 'a',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1]
                },
                removalDelay: 300,
                mainClass: 'mfp-fade',
                fixedContentPos: false

            });
        }

		jQuery('a[ref=magnificPopup][class!=direct-link]').magnificPopup({
			type: 'image',
            fixedContentPos: false
		});
	}

	if (jQuery().isotope){
		var portfolioContainer = jQuery('.w-portfolio.type_sortable .w-portfolio-list');
		if (portfolioContainer) {
			portfolioContainer.imagesLoaded(function(){
				portfolioContainer.isotope({
					itemSelector : '.w-portfolio-item',
					layoutMode : 'fitRows'
				});
			});

			jQuery('.w-filters-item').each(function() {
				var item = jQuery(this);
                item.click(function(){
					if ( ! item.hasClass('active')) {
						jQuery('.w-filters-item').removeClass('active');
						item.addClass('active');
						var selector = jQuery(this).attr('data-filter');
						portfolioContainer.isotope({ filter: selector });
						return false;
					}

				});
			});

		}

		var postsContainer = jQuery('.w-blog.type_masonry .w-blog-list');

		if (postsContainer.length) {
			postsContainer.imagesLoaded(function(){
				postsContainer.isotope({
					itemSelector : '.w-blog-entry',
					layoutMode : 'masonry'
				});
			});

		}

		var galleryContainer = jQuery('.w-gallery.type_masonry .w-gallery-tnails');

		if (galleryContainer.length) {
			galleryContainer.imagesLoaded(function(){
				galleryContainer.isotope({
					layoutMode : 'masonry'
				});
			});

		}

	}

	if (jQuery().revolution){
		if (jQuery.fn.cssOriginal !== undefined) {
			jQuery.fn.css = jQuery.fn.cssOriginal;
		}
		jQuery('.fullwidthbanner').revolution({
			delay: 9000,
			startwidth: 1140,
			startheight: 500,
			soloArrowLeftHOffset: 20,
			soloArrowLeftVOffset: 0,
			soloArrowRightHOffset: 20,
			soloArrowRightVOffset: 0,
			onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off
			fullWidth:"on",
			hideThumbs: false,
			shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)
		});
	}

	if (jQuery().waypoint){

        jQuery('.animate_afc, .animate_afl, .animate_afr, .animate_aft, .animate_afb, .animate_wfc, .animate_hfc, .animate_rfc, .animate_rfl, .animate_rfr').waypoint(function() {
            if ( ! jQuery(this).hasClass('animate_start')){
                var elm = jQuery(this);
                setTimeout(function() {
                    elm.addClass('animate_start');
                }, 20);
            }
        }, {offset:'85%', triggerOnce: true});

        jQuery('.w-counter').each(function(){
            var counter = jQuery(this).find('.w-counter-number'),
                count = '',
                prefix = '',
                suffix = '',
                number = 0;

            if (jQuery(this).data('count')) {
                count = parseInt(jQuery(this).data('count'), 10);
            }
            if (jQuery(this).data('prefix')) {
                prefix = jQuery(this).data('prefix');
            }
            if (jQuery(this).data('suffix')) {
                suffix = jQuery(this).data('suffix');
            }

            counter.html(prefix+number+suffix);
        })

        jQuery('.w-counter').waypoint(function() {
            var counter = jQuery(this).find('.w-counter-number'),
                count = '',
                prefix = '',
                suffix = '',
                number = 0;

            if (jQuery(this).data('count')) {
                count = parseInt(jQuery(this).data('count'), 10);
            }
            if (jQuery(this).data('prefix')) {
                prefix = jQuery(this).data('prefix');
            }
            if (jQuery(this).data('suffix')) {
                suffix = jQuery(this).data('suffix');
            }

            var	step = Math.ceil(count/25),
                handler = setInterval(function() {
                    number += step;
                    counter.html(prefix+number+suffix);
                    if (number >= count) {
                        counter.html(prefix+count+suffix);
                        window.clearInterval(handler);
                    }
                }, 40);


        }, {offset:'85%', triggerOnce: true});
	}

	var scrollHandlerPageTO = false,
        logoHeight = (window.logoHeight != undefined)?window.logoHeight:30,
        logoHeightSticky = (window.logoHeightSticky != undefined)?window.logoHeightSticky:30,
        logoHeightTablets = (window.logoHeightTablets != undefined)?window.logoHeightTablets:30,
        logoHeightMobiles = (window.logoHeightMobiles != undefined)?window.logoHeightMobiles:30,
        headerDisableStickyHeaderWidth = (window.headerDisableStickyHeaderWidth != undefined)?window.headerDisableStickyHeaderWidth:1023,
        headerDisableAnimationWidth = (window.headerDisableAnimationWidth != undefined)?window.headerDisableAnimationWidth:1023,
        headerMainHeight = (window.headerMainHeight != undefined)?window.headerMainHeight-0:120,
        headerMainShrinkedHeight = (window.headerMainShrinkedHeight != undefined)?window.headerMainShrinkedHeight-0:60,
        headerExtraHeight = (window.headerExtraHeight != undefined)?window.headerExtraHeight-0:36,
		scrollHandlerPage = function(){
			var scrollPosition	= parseInt(jQuery(window).scrollTop(), 10),
				windowHeight = jQuery(window).height()- 0,
				windowWidth = jQuery(window).width()- 0;

			if (scrollPosition >= windowHeight) {
				jQuery('.w-toplink').addClass('active');
			} else {
				jQuery('.w-toplink').removeClass('active');
			}



			if (jQuery('.l-canvas').hasClass('headerpos_fixed')) {
				var topHeaderHeight, middleHeaderHeight;

				if (scrollPosition > 0 && windowWidth > headerDisableStickyHeaderWidth) {
					if ( ! jQuery('.l-header').hasClass('state_sticky')) {
						jQuery('.l-header').addClass('state_sticky');
					}
                    if (jQuery('.l-header').hasClass('state_initial')) {
                        jQuery('.l-header').removeClass('state_initial');
                    }
                    if ( ! jQuery('.l-canvas').is('.headertype_advanced, .headertype_centered') && windowWidth > 899){
                        jQuery('.w-logo-img').css('height', logoHeightSticky+'px');
                    }

                    if (jQuery('.l-canvas').hasClass('headertype_extended')) {
						if (scrollPosition > (headerMainHeight-headerMainShrinkedHeight)) {
							topHeaderHeight = Math.max(headerExtraHeight+(headerMainHeight-headerMainShrinkedHeight)-scrollPosition, 0);
							jQuery('.l-subheader.at_top').css({'height': topHeaderHeight+'px', 'overflow': 'hidden'});
						} else {
							jQuery('.l-subheader.at_top').css({'height': headerExtraHeight+'px', 'overflow': ''});
						}

                        middleHeaderHeight = Math.max(Math.round(headerMainHeight-scrollPosition), headerMainShrinkedHeight);
                        jQuery('.l-subheader.at_middle').css({'line-height': middleHeaderHeight+'px'});

					} else if (jQuery('.l-canvas').is('.headertype_advanced, .headertype_centered')) {
                        middleHeaderHeight = Math.max(Math.round(headerMainHeight-scrollPosition), 0);
                        jQuery('.l-subheader.at_middle').css({'height': middleHeaderHeight+'px', 'line-height': middleHeaderHeight+'px'});
                    } else {
                        middleHeaderHeight = Math.max(Math.round(headerMainHeight-scrollPosition), headerMainShrinkedHeight);
                        jQuery('.l-subheader.at_middle').css({'line-height': middleHeaderHeight+'px'});
                    }



				} else {
					if (jQuery('.l-header').hasClass('state_sticky')) {
						jQuery('.l-header').removeClass('state_sticky');
					}
					if ( ! jQuery('.l-header').hasClass('state_initial')) {
						jQuery('.l-header').addClass('state_initial');
					}
                    if ( ! jQuery('.l-canvas').is('.headertype_advanced, .headertype_centered') && windowWidth > 899){
                        jQuery('.w-logo-img').css('height', logoHeight+'px');
                    }

					jQuery('.l-subheader.at_middle').css({'height': '', 'line-height': headerMainHeight+'px'});
					jQuery('.l-subheader.at_top').css({'height': headerExtraHeight+'px', 'overflow': ''});
				}

			}
		},
        menuHandler = function(){

            var W = jQuery(window).width()- 0,
                scrollPosition	= parseInt(jQuery(window).scrollTop(), 10);

            if (W > headerDisableStickyHeaderWidth) {
                if (jQuery('.l-header').hasClass('no_fixed')) {
                    jQuery('.l-header').removeClass('no_fixed');
                }
                if ( ! jQuery('.l-header').hasClass('state_initial')) {
                    jQuery('.l-header').addClass('state_initial');
                }
            } else {
                if ( ! jQuery('.l-header').hasClass('no_fixed')) {
                    jQuery('.l-header').addClass('no_fixed');
                }
                if (jQuery('.l-header').hasClass('state_initial')) {
                    jQuery('.l-header').removeClass('state_initial');
                }
            }

            if (W > headerDisableAnimationWidth) {
                if (jQuery('.l-body').hasClass('disable_animation')) {
                    jQuery('.l-body').removeClass('disable_animation');
                }
            } else {
                if ( ! jQuery('.l-body').hasClass('disable_animation')) {
                    jQuery('.l-body').addClass('disable_animation');
                }
            }

            if (W <= 599) {
                jQuery('.w-logo-img').css('height', logoHeightMobiles+'px');
            } else if (W <= 899) {
                jQuery('.w-logo-img').css('height', logoHeightTablets+'px');
            } else if ( ! jQuery('.l-canvas').is('.headertype_advanced, .headertype_centered') && scrollPosition > 0 && W > headerDisableStickyHeaderWidth){
                jQuery('.w-logo-img').css('height', logoHeightSticky+'px');
            } else {
                jQuery('.w-logo-img').css('height', logoHeight+'px');
            }

            jQuery('.l-header .w-nav').each(function () {
                var nav = jQuery(this),
                    navControl = nav.find('.w-nav-control'),
                    navList = nav.find('.w-nav-list.level_1'),
                    navSubLists = navList.find('.w-nav-item.has_sublevel .w-nav-list'),
                    navAnchors = nav.find('.w-nav-anchor'),
                    navRunning = false,
                    mobileNavWidth = 1000;

                if (window.mobileNavWidth !== undefined) {
                    mobileNavWidth = window.mobileNavWidth-0;
                }

                if (W <= mobileNavWidth) {
                    var navSubControls = navList.find('.w-nav-item.has_sublevel .w-nav-arrow');

                    if (window.imprezaTouchMenuInit == undefined || window.imprezaTouchMenuInit == false) {
                        window.imprezaTouchMenuInit = true;
                        window.imprezaTouchMenuOpen = false;
                        navList.slideUp(1);
                    }

                    nav.removeClass('touch_disabled');

                    if (! nav.hasClass('touch_enabled')) {
                        nav.addClass('touch_enabled');
                        navList.css({display: 'none'});
                        navSubLists.css({display: 'none'});
                    }

                    if (jQuery('.l-canvas').hasClass('headerpos_fixed') && W > headerDisableStickyHeaderWidth) {
                        navList.css('max-height', jQuery(window).height()-jQuery('.l-header').height()+'px');
                    } else {
                        navList.css('max-height', '');
                    }

                    navControl.off('click').click(function() {
                        if (! navRunning) {
                            navRunning = true;
                            if (window.imprezaTouchMenuOpen) {
                                navList.slideUp(250, function(){
                                    navRunning = false;
                                });
                                window.imprezaTouchMenuOpen = false;
                            } else {
                                navList.slideDown(250, function(){
                                    navRunning = false;
                                });
                                window.imprezaTouchMenuOpen = true;
                            }
                        }
                    });

                    navSubControls.off('click').click(function() {
                        if (! navRunning) {
                            navRunning = true;
                            var subList = jQuery(this).closest('.w-nav-item').find('.w-nav-list').first(),
                                subListOpen = subList.data('subListOpen'),
                                currentNavItem = jQuery(this).closest('.w-nav-item');

                            if (subListOpen) {
                                subList.slideUp(250, function(){
                                    navRunning = false;
                                    currentNavItem.removeClass('open');
                                });
                                subListOpen = false;
                            } else {
                                subList.slideDown(250, function(){
                                    navRunning = false;
                                    currentNavItem.addClass('open');
                                });
                                subListOpen = true;
                            }

                            subList.data('subListOpen', subListOpen);
                        }

                        return false;
                    });

                    navAnchors.click(function() {
                        if (W <= mobileNavWidth) {
                            navRunning = true;
                            navList.slideUp(250, function(){
                                navRunning = false;
                            });
                            window.imprezaTouchMenuOpen = false;
                        }
                    });

                } else {
                    nav.removeClass('touch_enabled');
                    if (! nav.hasClass('touch_disabled')) {
                        nav.addClass('touch_disabled');
                    }
                    nav.find('.w-nav-item').removeClass('open');
                    navList.css({height: '', display: '', 'max-height': ''});
                    window.imprezaTouchMenuInit = false;
                    window.imprezaTouchMenuOpen = false;
                    navSubLists.css({height: '', display: ''});
                    navControl.off('click');

                }

            });
        };

    var linkScroll = function(event, link) {
        event.preventDefault();
        event.stopPropagation();

        if (jQuery(link.hash).length) {

            var newOffset = jQuery(link.hash).offset().top,
                canvas = jQuery('.l-canvas'),
                mobileNavWidth = 1000,
                W = jQuery(window).width()- 0;

            if (window.mobileNavWidth !== undefined) {
                mobileNavWidth = window.mobileNavWidth-0;
            }

            if (W <= mobileNavWidth) {
                if (jQuery(link).hasClass('w-nav-anchor')) {
                    var menuHeight = jQuery('.l-header .w-nav .w-nav-list.level_1').height();
                    newOffset = newOffset-menuHeight-1;
                } else {
                    newOffset = newOffset+1;
                }
            } else {
                if (canvas.hasClass('headerpos_fixed')) {
                    if (canvas.hasClass('headertype_standard') || canvas.hasClass('headertype_extended')) {
                        newOffset = newOffset-(headerMainShrinkedHeight-1);
                    } else {
                        newOffset = newOffset-(headerExtraHeight-1);
                    }
                } else {
                    newOffset = newOffset+1;
                }
            }

            jQuery("html, body").animate({
                scrollTop: newOffset+"px"
            }, {
                duration: 1200,
                easing: "easeInOutQuint"
            });
        }

    };



    jQuery('a.w-blogpost-meta-comments-h, .w-comments-title a[href="#respond"]').on('click',function(event) {
        linkScroll(event, this);
    });

    jQuery('.menu-item > a, a.g-btn, a.smooth-scroll, a.bbp-reply-permalink').on('click',function(event) {
        if (jQuery(this).attr('href').indexOf("#") != -1) {
            var windowURL = window.location.href.split('#')[0],
                linkURL = jQuery(this).attr('href').split('#')[0];
            if (windowURL == linkURL || jQuery(this).attr('href').indexOf("#") == 0) {
                linkScroll(event, this);
            }
        }
    });

    jQuery('a[href="#"]').on('click',function(event) {
        if (jQuery(this).hasClass('w-nav-anchor') || jQuery(this).hasClass('g-btn') || jQuery(this).hasClass('smooth-scroll') || jQuery(this).hasClass('w-toplink')) {
            event.preventDefault();
            event.stopPropagation();
            jQuery("html, body").animate({
                scrollTop: 0
            }, {
                duration: 1200,
                easing: "easeInOutQuint"
            });
        }
    });

    if (document.location.hash && jQuery(document.location.hash).length) {
        var newOffset = jQuery(document.location.hash).offset().top,
            canvas = jQuery('.l-canvas'),
            mobileNavWidth = 1000,
            W = jQuery(window).width()- 0;

        if (window.mobileNavWidth !== undefined) {
            mobileNavWidth = window.mobileNavWidth-0;
        }

        if (canvas.hasClass('headerpos_fixed') && W > mobileNavWidth) {
            if (canvas.hasClass('headertype_standard') || canvas.hasClass('headertype_extended')) {
                newOffset = newOffset-(headerMainShrinkedHeight-1);
            } else {
                newOffset = newOffset-(headerExtraHeight-1);
            }
        } else {
            newOffset = newOffset+1;
        }

        jQuery("html, body").animate({
            scrollTop: newOffset+"px"
        }, {
            duration: 1200,
            easing: "easeInOutQuint"
        });
    }

    window.videoInit = false;
    window.setVideoProportion = function() {
        jQuery('.l-submain-video').each(function(){
            if ((jQuery(window).width()-0) <= 1024) {
                jQuery(this).hide();
                return;
            }
            jQuery(this).show();
            var container = jQuery(this),
                mejsContainer = container.find('.mejs-container'),
                poster = container.find('.mejs-mediaelement img'),
                video = container.find('video'),
                videoHeight = video.attr('height'),
                videoWidth = video.attr('width'),
                videoProportion = videoWidth / videoHeight,
                parent = container.parent(),
                parentHeight = parent.outerHeight(),
                parentWidth = parent.outerWidth(),
                parentProportion = parentWidth / parentHeight,
                proportion = parentHeight / videoHeight,
                centerX, centerY;

            if (parentProportion >= videoProportion) {
                proportion = parentWidth / videoWidth;
            }

            container.width(proportion*videoWidth);
            container.height(proportion*videoHeight);

            poster.width(proportion*videoWidth);
            poster.height(proportion*videoHeight);

            centerX = ((parentWidth >> 1) - (container.width() >> 1)) | 0;
            centerY = ((parentHeight >> 1) - (container.height() >> 1)) | 0;

            container.css({ 'left': centerX, 'top': centerY });

            mejsContainer.css({width: '100%', height: '100%'});

        });
    };

    window.resizeHandler = function(){
        if (window.MediaElementPlayer){
            if (videoInit) {
                window.setVideoProportion();
            } else {
                videoInit = true;

                jQuery('.l-submain-video video').mediaelementplayer({
                    enableKeyboard: false,
                    iPadUseNativeControls: false,
                    pauseOtherPlayers: false,
                    iPhoneUseNativeControls: false,
                    AndroidUseNativeControls: false,
                    videoWidth: '100%',
                    videoHeight: '100%',
                    success: function (mediaElement, domObject) {
                        window.setVideoProportion();
                        jQuery(domObject).css('display', 'block');
                    }
                });
            }
        }
    }

	scrollHandlerPage();
	menuHandler();
    window.resizeHandler();

	jQuery(window).scroll(function() {
		scrollHandlerPage();
	});

	jQuery(window).resize(function() {
		if (scrollHandlerPageTO !== false) {
			window.clearTimeout(scrollHandlerPageTO);
		}
		scrollHandlerPageTO = window.setTimeout(function(){
			scrollHandlerPage();
			menuHandler();
            window.resizeHandler();
		}, 5);

	});

    jQuery('.contact_form').each(function(){

        jQuery(this).submit(function(){
            var form = jQuery(this),
                name, email, phone, message, captcha, captchaResult, receiver,
                receiverField = form.find('input[name=receiver]'),
                nameField = form.find('input[name=name]'),
                emailField = form.find('input[name=email]'),
                phoneField = form.find('input[name=phone]'),
                messageField = form.find('textarea[name=message]'),
                captchaField = form.find('input[name=captcha]'),
                captchaResultField = form.find('input[name=captcha_result]'),
                button = form.find('.g-btn'),
                errors = 0;

            button.addClass('loading');
            jQuery('.w-form-field-success').html('');

            if (receiverField.length) {
                receiver = receiverField.val();
            }
            if (nameField.length) {
                name = nameField.val();

                if (name === '' && nameField.data('required') === 1){
                    if ( ! jQuery('#name_row').hasClass('check_wrong')) {
                        jQuery('#name_row').addClass('check_wrong');
                    }
                    jQuery('#name_state').html(window.nameFieldError);

                    errors++;
                } else {
                    if (jQuery('#name_row').hasClass('check_wrong')) {
                        jQuery('#name_row').removeClass('check_wrong');
                    }
                    jQuery('#name_state').html('');
                }
            }

            if (emailField.length) {
                email = emailField.val();

                if (email === '' && emailField.data('required') === 1){
                    if ( ! jQuery('#email_row').hasClass('check_wrong')) {
                        jQuery('#email_row').addClass('check_wrong');
                    }
                    jQuery('#email_state').html(window.emailFieldError);
                    errors++;
                } else {
                    if (jQuery('#email_row').hasClass('check_wrong')) {
                        jQuery('#email_row').removeClass('check_wrong');
                    }
                    jQuery('#email_state').html('');
                }
            }

            if (phoneField.length) {
                phone = phoneField.val();

                if (phone === '' && phoneField.data('required') === 1){
                    if ( ! jQuery('#phone_row').hasClass('check_wrong')) {
                        jQuery('#phone_row').addClass('check_wrong');
                    }
                    jQuery('#phone_state').html(window.phoneFieldError);
                    errors++;
                } else {
                    if (jQuery('#phone_row').hasClass('check_wrong')) {
                        jQuery('#phone_row').removeClass('check_wrong');
                    }
                    jQuery('#phone_state').html('');
                }
            }

            if (messageField.length) {
                message = messageField.val();

                if (message === '' && messageField.data('required') === 1){
                    if ( ! jQuery('#message_row').hasClass('check_wrong')) {
                        jQuery('#message_row').addClass('check_wrong');
                    }
                    jQuery('#message_state').html(window.messageFieldError);
                    errors++;
                } else {
                    if (jQuery('#message_row').hasClass('check_wrong')) {
                        jQuery('#message_row').removeClass('check_wrong');
                    }
                    jQuery('#message_state').html('');
                }
            }

            if (captchaField.length) {
                captcha = captchaField.val();
                captchaResult = captchaResultField.val();

                if (captcha === ''){
                    if ( ! jQuery('#captcha_row').hasClass('check_wrong')) {
                        jQuery('#captcha_row').addClass('check_wrong');
                    }
                    jQuery('#captcha_state').html(window.captchaFieldError);
                    errors++;
                } else {
                    if (jQuery('#captcha_row').hasClass('check_wrong')) {
                        jQuery('#captcha_row').removeClass('check_wrong');
                    }
                    jQuery('#captcha_state').html('');
                }
            }

            if (errors === 0){
                jQuery.ajax({
                    type: 'POST',
                    url: window.ajaxURL,
                    dataType: 'json',
                    data: {
                        action: 'sendContact',
                        receiver: receiver,
                        name: name,
                        email: email,
                        phone: phone,
                        message: message,
                        captcha: captcha,
                        captcha_result: captchaResult
                    },
                    success: function(data){
                        if (data.success){
                            jQuery('.w-form-field-success').html(window.messageFormSuccess);

                            if (jQuery('#captcha_row').hasClass('check_wrong')) {
                                jQuery('#captcha_row').removeClass('check_wrong');
                            }
                            jQuery('#captcha_state').html('');

                            if (nameField.length) {
                                nameField.val('');
                            }
                            if (emailField.length) {
                                emailField.val('');
                            }
                            if (phoneField.length) {
                                phoneField.val('');
                            }
                            if (messageField.length) {
                                messageField.val('');
                            }
                            if (captchaField.length) {
                                captchaField.val('');
                            }

                        } else {
                            if (data.errors.captcha != undefined) {
                                if ( ! jQuery('#captcha_row').hasClass('check_wrong')) {
                                    jQuery('#captcha_row').addClass('check_wrong');
                                }
                                jQuery('#captcha_state').html(data.errors.captcha);
                            }
                        }

                        button.removeClass('loading');
                    },
                    error: function(){
                    }
                });
            } else {
                button.removeClass('loading');
            }

            return false;
        });

    });

    jQuery(".w-clients-list").each(function() {
        var clients = jQuery(this),
            autoPlay = clients.attr('data-autoPlay'),
            autoPlaySpeed = clients.attr('data-autoPlaySpeed'),
            columns = clients.attr('data-columns'),
            columns1300 = (columns < 4)?columns:4,
            columns1024 = (columns < 3)?columns:3,
            columns768 = (columns < 2)?columns:2,
            infinite = false;
        if (autoPlay == 1) {
            autoPlay = infinite = true;
        } else {
            autoPlay = infinite = false;
        }
        clients.slick({
            infinite: infinite,
            autoplay: autoPlay,
            lazyLoad: 'progressive',
            autoplaySpeed: autoPlaySpeed,
            accessibility: false,
            slidesToShow: columns,
            responsive: [
                {
                    breakpoint: 1300,
                    settings: {
                        slidesToShow: columns1300
						}
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: columns1024
						}
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: columns768
						}
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1
						}
                }
            ]
        });
    });

    jQuery('.fotorama').fotorama({
        spinner: {
            lines: 13,
            color: 'rgba(0, 0, 0, .75)'
        }
    });


    function update_cart_widget(event){
        if(typeof event != 'undefined')
        {
            var cart = jQuery('.w-cart'),
                notification = jQuery('.w-cart-notification'),
                productName = notification.find('.product-name'),
                quantity = cart.find('.w-cart-quantity'),
                quantity_val = parseInt(quantity.html(), 10);

            if ( ! cart.hasClass('has_items')) {
                cart.addClass('has_items');
            }

            quantity_val++;
            quantity.html(quantity_val);

            notification.css({display: 'block', opacity: 0});

            productName.html(addedProduct);
            notification.animate({opacity: 1}, 300, function(){
                window.setTimeout(function(){
                    notification.animate({opacity: 0},300, function(){
                        notification.css({display: 'none'});
                    });
                }, 3000);
            });


        }
    }

    var addedProduct = 'Product';

    jQuery('.add_to_cart_button').click(function(){
        var productContainer = jQuery(this).parents('.product').eq(0);
        addedProduct = productContainer.find('h3').text();
    });

    jQuery('body').bind('added_to_cart', update_cart_widget);


});
