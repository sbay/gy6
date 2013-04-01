var GY6 = {

	init: function() {
		
		this.helpers.init();
		this.bind();
	
		this.homePage();
		this.sixPillars();
		this.takeAction();
		this.events();
		this.partners();
		this.media();
		this.faq();

	},
	
	bind: function() {

		$(".live").fancybox({
			width			: 810,
			height			: 605,
			scrolling		: 'no',
			padding			: 0,
			type			: 'iframe',
			wrapCSS			: 'no-scrollbars',
			autoCenter		: true,
			closeClick		: false,
			helpers			: { 
				overlay		: {
					closeClick	: false
				}
			}
		});

		$("#psa-callout a").fancybox(
			GY6.fancybox.options({
				type			: 'iframe',
				wrapCSS			: 'no-scrollbars',
				arrows			: false,
			})
		);


		$("#social-stream-callout").fancybox(
			GY6.fancybox.options({
				type			: 'iframe',
				width			: 1000,
				margin			: [50, 0, 0, 0],
				wrapCSS			: 'no-scrollbars social-stream',
				iframe			: {
					preload		: false
				}
			})
		);
		
		
		$(".news-list").bxSlider({
			infiniteLoop		:	false,
			hideControlOnEnd	:	true,
			easing				:	'ease-in-out',
			onSliderLoad		:	function(){
				$(".news-list").removeClass('invisible');
			}
		});
		
		if ($(".news-list, .media").length) {
			
			
			// Initialize post Fancyboxes with accordingly wrapped classees
		 	$(".news-list a").fancybox(
				GY6.fancybox.mediaOptions({
					wrapCSS			: 'no-scrollbars news',
				})
			);
			
			$(".media .video a").fancybox(
				GY6.fancybox.mediaOptions({
					wrapCSS			: 'no-scrollbars video',
				})
			);
			
			$(".media .photo a").fancybox(
				GY6.fancybox.mediaOptions({
					wrapCSS			: 'no-scrollbars photo',
				})
			);
			
			$(".media .press a").fancybox(
				GY6.fancybox.mediaOptions({
					wrapCSS			: 'no-scrollbars press',
				})
			);

			
			// Keyboard navigation for slides
			$(document).keydown(function(e){
				if (e.keyCode == 37) { 
					$('.bx-prev').click();
				} else if (e.keyCode == 39) {
					$('.bx-next').click();
				}
			});
		}


		$('#newsletter-signup').fancybox(
			GY6.fancybox.options({
				iframe			: {
					scrolling	: 'no'
				},
				afterClose		: function() {
					$('input, button', subscribe_form).show();
					$('input', subscribe_form).val('');
					$('.result', subscribe_form).remove();
				}
			})
		);


		var subscribe_form = $('#newsletter-form'),
		subscribe_modal = $('#newsletter-modal');

		subscribe_form.submit(function(e){
			subscribe_modal.addClass('loading');

			if (!$('.result', subscribe_form).length) {
				subscribe_form.append('<div class="result hide" />');
			}

			$.ajax({
				type: "POST",
				url: $(this).attr('action'),
				data: {'email' : subscribe_form.find('#email').val()}, 
				success: function(data, status){ 
					$('input, button', subscribe_form).hide();
					$('.result', subscribe_form).removeClass('hide').html(data); //console.log(data, status);
					subscribe_modal.removeClass('loading');
					
					timeout = setTimeout(function () { 
						$('.fancybox-close').click();
					}, 5000);
				},
				error: function(xhr, status, error) {
					subscribe_modal.removeClass('loading');
					$('.result', subscribe_form).removeClass('hide').addClass('error').html(error);
				}
			});
			return false;
		});



		var donate_form = $('#donate_form'),
		donate_thanks = $('#donate_form_thanks');

		if (donate_form.length) {
			donate_form.validate({
				debug: true,
				errorElement: "span",
				submitHandler: function () {
					donate_form.addClass('loading');

					if (!$('.result', donate_thanks).length) {
						donate_thanks.append('<div class="result hide" />');
					}

					$.ajax({
						type: "POST",
						url: donate_form.attr('action'),
						data: donate_form.serialize(), 
						success: function(data, status){ 
							$('.result', donate_thanks).removeClass('hide').html('<hr />' + data);
							donate_form.removeClass('loading');

							donate_form.fadeOut('slow', function() {
								donate_thanks.css({'padding-top': '5%', 'padding-bottom': '5%'});
							});

							$('.share', donate_thanks).removeClass('hide');

						},
						error: function(xhr, status, error) {
							donate_form.removeClass('loading');
							$('.result', donate_thanks).removeClass('hide').addClass('error').html('<hr />' + error);
							$('.share', donate_thanks).removeClass('hide');
						}
					});
					return false;
				}
			});
		}

		
	},
	
	homePage: function() {

		// Check the body tag to determine if we are on the home page
		if ($('body').hasClass('home')) {
			
			// Inverse site's footer to dark
			$('.site-footer').addClass('inversed');
			

			// Populate slide navigation
			$('#secondary_nav').show().append('<ul class="slides-nav"></ul>');

			// Add Event Counter field
			$('#secondary_nav').show().append('<div class="slide-counter"><span class="selected"></span><span class="total"></span></div>');

		}


		// Supersized
		if ($('body').hasClass('home') || $('body').hasClass('parent-pageid-3203')) {

			GY6.supersized.init();

		} else {
			// If not home, remove Supersized elements that get attached to body
			$('#supersized').remove();
			$('#supersized-loader').remove();
		}

	},
	
	sixPillars: function() {
	
		var container = $('#sixpillars'),
		subnav = $('.section-subnav', container),
		content = $('.section-content', container);

		if (container.length) {
		
			$('a', subnav).click(function(e) {
				
				var target = $(this).attr('href'); //.substring(1);
				
				// Reset menu items and select the one clicked
				$('li', subnav).removeClass('current_page_item');
				$(this).parent().addClass('current_page_item');
				
				// Reset tabbed content and display the one selected
				content.removeClass('active');
				$(target, container).addClass('active');
				
				return false;
			});


			// 6 Pillars Pop-Up Tabs
			var lead_partners = $('.partner_tabs');
			$('.tab_titles a', lead_partners).click( function(e) {
				$('.tab_titles a', lead_partners).removeClass('active');

		        var index = $('.tab_titles a', lead_partners).index(this),
		            current = $('.tab_lists ul:nth-child(' + (index+1) + ')', lead_partners);        
		        
		        if( current.is(":visible") ) {
		        	$(this).removeClass('active');
		            current.hide();
		        } else {
		            $('.tab_lists ul', lead_partners).hide();
		            $(this).addClass('active');
		            current.show();
		        }

		        return false;
			});


			// Ajax load Progress Report contents
			$(".actions .progress").on('click', function() {
				var progress_url = $(this).attr('href') + ' #progress_report';

				$.fancybox(
					GY6.fancybox.options({
						wrapCSS			: '',
						arrows			: false,
						href			: progress_url,
						type			: 'ajax'
					})
				);

				return false;
			});

		}
	
	},
	
	takeAction: function() {

		var container = $('.take-action'),
		subnav = $('.panels', container),
		content = $('.take-action-content', container),
		currentPanel;
		
		$('a', subnav).click(function(e) {
			
			var target = $(this).attr('href'); //.substring(1);
			
			if (currentPanel == target) {
				collapse();
			} else {
				expand(target);
			}
			
			return false;
		});
		
		function collapse() {
			content.removeClass('active');
			subnav.removeClass('aside');	
			$('a', subnav).addClass('active');
			currentPanel = '';
		}
		
		function expand(target) {
			
			if ( !subnav.hasClass('aside') ) {
				subnav.addClass('aside');
			}
			
			// Reset menu items and select the one clicked
			$('a', subnav).removeClass('active');
			$('a[href="' + target + '"]').addClass('active');
			
			// Reset tabbed content and display the one selected
			content.removeClass('active');
			$(target, container).addClass('active');
			
			currentPanel = target;
		}

	},

	
	events: function() {

		var events = $('.events'),
		events_count = $('.event', events).length,
		selected = $('.event', events).index( $('.active') );
		
		if (events.length) {
			// Populate event navigation
			$('#secondary_nav').show().append('<ul class="events-nav"></ul>');
			$('.event', events).each( function(index) {
				$('#secondary_nav .events-nav').append('<li></li>');
				
				if (index == selected) { $('#secondary_nav .events-nav li:last-child').addClass('active'); }
			});
			
			// Add Event Counter field
			$('#secondary_nav').append('<div class="event-counter" />');
			$('#secondary_nav .event-counter').html('<span class="selected">' + GY6.helpers.padWithZeros(selected+1, 2) + '</span><span class="total">' + GY6.helpers.padWithZeros(events_count, 2) + '</span>');
			
			// Bind event 
			$('.events-nav li').click(function(e) {
				selected = $(this).index();
				
				$('.events-nav li').removeClass('active');
				$(this).addClass('active');
				
				$('.event', events).removeClass('active');
				$('.event:nth-child(' + (selected+1) + ')', events).addClass('active');
				
				$('#secondary_nav .selected').text( GY6.helpers.padWithZeros(selected+1, 2) );
			});
			
			// Keyboard navigation for slides
			$(document).on('keydown', function(e) {
				if (e.keyCode == 37) { 
					$('.events-nav li:nth-child(' + (selected) + ')').click();
				} else if (e.keyCode == 39) {
					$('.events-nav li:nth-child(' + (selected+2) + ')').click();
				}
			});
		}
	},

	
	partners: function() {
		
		var container = $('.partners');

		$(".partners_list a").fancybox( GY6.fancybox.options({
			wrapCSS			: ' '
		}) );

		if (container.length) {

			var currentTallest = 0;
			$('.col .section', container).each(function() {
				if ($(this).outerHeight() > currentTallest) { currentTallest = $(this).outerHeight(); }
			});
			$('.col .section', container).css({'min-height': currentTallest}); 
		}
		
	},
	

	media: function() {
		
		var container = $('#media');
		
		if (container.length) {
			
			// Create media nav
			$('#secondary_nav').show().addClass('nav').append('<ul class="media-nav"><li><a href="#" data-type="all">All</a></li><li><a href="#" data-type="video">Video</a></li><li><a href="#" data-type="photo">Photo</a></li><li><a href="#" data-type="press">Press</a></li></ul>');
			
			// Wrap media items into groups for bxSlider to pick up
			var elem = $('.media-item', container),
			elemLen = elem.length,
			elemPerDiv = 10;
			
			for (var i = 0; i < elemLen; i += elemPerDiv){
				elem.filter(':eq('+i+'),:lt('+(i+elemPerDiv)+'):gt('+i+')').wrapAll('<li />');
			}
			
			var slider = $("#media").bxSlider({
				infiniteLoop		:	false,
				hideControlOnEnd	:	true,
				easing				:	'ease-in-out',
				onSliderLoad		:	function(){
					container.removeClass('invisible');
				}
			});
			
			// Bind media nav click options
			$('#secondary_nav a').click(function(e) {
				e.preventDefault();
				
				container.html(elem);
				
				$('#secondary_nav li').removeClass('current_page_item');
				$(this).parent().addClass('current_page_item');
				
				// Filter elements according to their data type
				if ($(this).data('type') != 'all') {
					for (var i = 0; i < elemLen; i += elemPerDiv){
						elem.filter('.' + $(this).data('type')).filter(':eq('+i+'),:lt('+(i+elemPerDiv)+'):gt('+i+')').wrapAll('<li />');
					}
				} else {
					for (var i = 0; i < elemLen; i += elemPerDiv){
						elem.filter(':eq('+i+'),:lt('+(i+elemPerDiv)+'):gt('+i+')').wrapAll('<li />');
					}
				}

				$("#media > div").remove();
				
				slider.reloadSlider();

				//$('.media-item.' + $(this).data('type')).fadeIn(300);
				//$('.media-item:not(.' + $(this).data('type') + ')').fadeOut(500);
			});
			
		}
		
	},
	
	
	faq: function() {
		
		var container = $('.faq');

		// FAQ topic questions slidedown toggle
		$('dt', this.container).click(function(e) {
			$(this).next('dd').stop().slideToggle();
		});
		
	},

	fancybox: {
		
		init: function() {
			//$("nav a[href^='http'], nav a[href*='index-php']").fancybox({
			$("[rel~='fancybox']").fancybox( this.options() );
		},
		
		options : function(options) {
			return $.extend({
				padding			: 0,
				autoSize		: true,
				autoCenter		: true,
				maxWidth		: 1000,
				maxHeight		: 800,
				arrows			: true,
				closeBtn		: true,
				loop			: false,
				wrapCSS			: 'no-scrollbars',
				/* iframe			: {
					scrolling	: 'no'
				} */
				beforeLoad		: function() {
					if (typeof api != 'undefined') {
						api.playToggle();
					}
				},
				afterClose		: function() {
					if (typeof api != 'undefined') {
						api.playToggle();
					}
				}
			}, options);
		},
		
		mediaOptions: function(options) {
			return $.extend({
				type			: 'iframe',
				scrolling		: 'no',
				padding			: 0,
				margin			: [40, 0, 40, 0],
				wrapCSS			: 'no-scrollbars',
				autoCenter		: true,
				closeClick		: false,
				fitToView		: true,
				loop			: false,
				width			: 1000,
				/*helpers			: {
					overlay		: {
						closeClick	: false
					}
				},*/
				beforeShow		: function() {
					$("body").css({'overflow':'hidden'});
				},
				afterClose		: function() {
					$("body").css({'overflow':'auto'});
				}
			}, options);
		}

	},


	supersized: {

		init: function() {

			var container = $('.supersized_list'),
			slides = $('li', container);

			// Grab the slides' info from page's content list
			var slides_object = [];           
			slides.each(function() {
				var obj = {
	                image:	$(".image", this).html(),
	                title:	$(".title", this).html(),
	                thumb:	$(".thumb", this).html(),
	                url:	$(".link", this).html()
	            };
	            slides_object.push(obj);
			});


			// Full screen slideshow on Home Page
			$.supersized({
			
				// Functionality
				slide_interval          :   6000,		// Length between transitions
				transition              :   4, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
				transition_speed		:	1000,		// Speed of transition
				fit_portrait			:	0,
				new_window				:	0,
														   
				// Components							
				slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
				slides 					:  	slides_object
			});

			// Pause slideshow on slide navigation click
			$('.slides-nav li').click(function() {
				if ($(this).data('clicked')) {
					api.playToggle('play'); vars.is_paused = false;
				} else {
					$('.slides-nav li').data('clicked', false);
					$(this).data('clicked', true);
					api.playToggle('pause'); vars.is_paused = true;
				}
		    });

		}

	},

	
	helpers: {
		
		scrollElement: 'html, body',
		scrolling: false,
		
		init: function() { //console.log('helpers init');
			
			GY6.fancybox.init();
			
			// Find out which browser supported root element to use for scrolling
			// http://www.zachstronaut.com/posts/2009/01/18/jquery-smooth-scroll-bugs.html
			$('html, body').each(function () {
				var initScrollTop = $(this).attr('scrollTop');
				$(this).attr('scrollTop', initScrollTop + 1);
				if ($(this).attr('scrollTop') == initScrollTop + 1) {
					this.scrollElement = this.nodeName.toLowerCase();
					$(this).attr('scrollTop', initScrollTop);
					return false;
				}    
			});
			

			// Open external links in new windows
			$('a[rel="external"]').click( function() {
				window.open( $(this).attr('href') );
				return false;
			});
			
			// Open all external links in a new window
			$('a').each(function() {
				if ( !($(this).hasClass('live') || $(this).hasClass('fancybox.iframe') || $(this).hasClass('fancybox') || $(this).attr('rel') == "fancybox") ) {
					var a = new RegExp('/' + window.location.host + '/'); var b = new RegExp('postback');
					if(!a.test(this.href) && !b.test(this.href.toLowerCase())) {
						$(this).click(function(event) {
							event.preventDefault(); event.stopPropagation(); window.open(this.href, '_blank');
						});
					}
				}
			});
		},
		
		padWithZeros: function(num, max) {
			num = num.toString();
			return num.length < max ? this.padWithZeros("0" + num, max) : num;
		},
		
		
		scrollContent: function(step, speed) {
			
			var amount = "+=" + step + "px";
			
			$(GY6.helpers.scrollElement).animate({
				scrollTop: amount
			}, speed, function() {
				if (GY6.helpers.scrolling) {
					GY6.helpers.scrollContent(step, speed);
				}
			});
		}
		
	}
	
};




$(function () {

	// Hide media content before the slider has initialized
	$("#media, .news-list").addClass('invisible');

	
	GY6.init();

});