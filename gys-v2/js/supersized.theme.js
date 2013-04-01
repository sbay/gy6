/*

	Supersized - Fullscreen Slideshow jQuery Plugin
	Version : 3.2.7
	Theme 	: Shutter 1.1
	
	Site	: www.buildinternet.com/project/supersized
	Author	: Sam Dunn
	Company : One Mighty Roar (www.onemightyroar.com)
	License : MIT License / GPL License

*/

(function($){
	
	theme = {
	 	
	 	/* Initial Placement
		----------------------------*/
	 	_init : function(){
			
			// Display total slides
			if ($(vars.slide_total).length){
				if ($(vars.slide_total).length < 10) {
					$(vars.slide_total).html('0' + api.options.slides.length);
				} else {
					$(vars.slide_total).html(api.options.slides.length);
				}
			}

			
			/* Navigation Items
			----------------------------*/
		    $(vars.next_slide).click(function() {
		    	api.nextSlide();
		    });
		    
		    $(vars.prev_slide).click(function() {
		    	api.prevSlide();
		    });
		    
	    	// Full Opacity on Hover
	    	if(jQuery.support.opacity){
		    	$(vars.prev_slide +','+vars.next_slide).mouseover(function() {
				   $(this).stop().animate({opacity:1},100);
				}).mouseout(function(){
				   $(this).stop().animate({opacity:0.6},100);
				});
			}				
	 	},


	 	/* Play Toggle
		----------------------------*/
	 	playToggle : function(state){

		},
	 	
	 	
	 	/* Go To Slide
		----------------------------*/
	 	goTo : function(){

		},

	 	
	 	/* Before Slide Transition
		----------------------------*/
	 	beforeAnimation : function(direction){
		  	
		  	/* Update Fields
		  	----------------------------*/
		  	// Update slide caption
		   	if ($(vars.slide_caption).length){
		   		$(vars.slide_caption).removeClass().addClass('slide' + (vars.current_slide + 1));

		   		(api.getField('title')) ? $(vars.slide_caption).hide().html(api.getField('title')).fadeIn(800) : $(vars.slide_caption).html('');
		   	}

		    // Update slide number
			if (vars.slide_current.length){
				if (vars.current_slide < 9) {
					$(vars.slide_current).html('0' + (vars.current_slide + 1));
				} else {
					$(vars.slide_current).html(vars.current_slide + 1);
				}
			}
		    
	 	},
	 	
	 	
	 	/* After Slide Transition
		----------------------------*/
	 	afterAnimation : function(){

	 	},
	 
	 };
	 
	 
	 /* Theme Specific Variables
	 ----------------------------*/
	 $.supersized.themeVars = {
													
		// General Elements
		slide_caption		:	'#slide-title',	// Slide caption
		slide_current		:	'.slide-counter .selected',		// Current slide number
		slide_total			:	'.slide-counter .total',		// Total Slides
		slide_list			:	'.slides-nav',		// Slide jump list							
	 												
	 };												
	
	 /* Theme Specific Options
	 ----------------------------*/												
	 $.supersized.themeOptions = {					
	 						   
		
	 };
	
})(jQuery);