jQuery.noConflict();

jQuery(document).ready(function()
{	

Cufon.replace('h1,h2,h3,h4,h5,h6',{ fontFamily: 'Quicksand' });

	
	/*image slider (levitation)*/
	if (jQuery('.featured_item').length > 0 )jQuery('#featured').levitate({  
			duration:600, 					// transition duration 
			transition:"easeInOutCubic", 	// transition easing
			opacity:0.6,					// opacity of second row
			opacity_level2:0,				// opacity of third row
			interval: 4000					// interval between auto rotate, set to false if you want to disable outorotation
			
		});
		
	
	

	// activates the lightbox page, if you are using a dark color scheme use another theme parameter
	jQuery("a[rel^='prettyPhoto'], a[rel^='lightbox']").prettyPhoto({
		"theme": 'light_rounded' /* light_rounded / dark_rounded / light_square / dark_square */																
	});
	
	
	k_form(); //controls the contact form
	k_menu(); // controls the dropdown menu
	
});

jQuery(window).load(function(){
	/*image slider (alternate)*/	
	if (jQuery('.featured_alternate').length > 0 )
	{	
		jQuery('.featured_alternate').not('.featured_alternate_active').css({"display":"none"});
		// set the automatic image rotation, number is time between transitions in miliseconds
		interval = setInterval(function() { k_fader(".featured_alternate",'1'); }, 4000); 	
	}
});





























function k_fader($items_to_fade, $next_or_prev)
{	
	var $items = jQuery($items_to_fade);
	var $currentitem = $items.filter(":visible");
	var $new_item;
	var $selector;
	
	if($items.length > 1)
	{
		for(i = 0; i < $items.length; i++)
		{
			if($items[i] == $currentitem[0])
			{	
				$selector = $next_or_prev >= 0 ? i != $items.length-1 ? i+1 : 0 : i == 0 ? $items.length-1 : i-1;
				
				$new_item = jQuery($items[$selector]);
				break;
			}
		}
		
		if( $new_item.css("display") == "none" )
			{	
				$currentitem.css({zIndex:1});
				$new_item.css({zIndex:2}).fadeIn(1200, function()
				{
					$currentitem.css({display:"none"});
				});
				
			}
	}
}

function k_form(){
	var my_error;
	jQuery(".ajax_form #send").bind("click", function(){
											 
	my_error = false;
	jQuery(".ajax_form #name, .ajax_form #message, .ajax_form #email ").each(function(i){
				
				
				var value = jQuery(this).attr("value");
				var check_for = jQuery(this).attr("id");
				var surrounding_element = jQuery(this).parent();
				if(check_for == "email"){
					if(!value.match(/^\w[\w|\.|\-]+@\w[\w|\.|\-]+\.[a-zA-Z]{2,4}$/)){
						
						surrounding_element.attr("class","").addClass("error");
						
						my_error = true;
						}else{
						surrounding_element.attr("class","").addClass("valid");	
						}
					}
				
				if(check_for == "name" || check_for == "message"){
					if(value == ""){
						
						surrounding_element.attr("class","").addClass("error");
						
						my_error = true;
						}else{
						surrounding_element.attr("class","").addClass("valid");	
						}
					}
						   if(jQuery(".ajax_form #name, .ajax_form #message, .ajax_form #email").length  == i+1){
								if(my_error == false){
									jQuery(".ajax_form").slideUp(400);
									
									var $datastring = "ajax=true";
									jQuery(".ajax_form input, .ajax_form textarea").each(function(i)
									{
										var $name = jQuery(this).attr('name');	
										var $value = jQuery(this).attr('value');
										$datastring = $datastring + "&" + $name + "=" + $value;
									});
																		
									
									jQuery(".ajax_form #send").fadeOut(100);	
									
									jQuery.ajax({
									   type: "POST",
									   url: "send.php",
									   data: $datastring,
									   success: function(response){
									   jQuery(".ajax_form").before("<div class='ajaxresponse' style='display: none;'></div>");
									   jQuery(".ajaxresponse").html(response).slideDown(400); 
									   jQuery(".ajax_form #send").fadeIn(400);
									   jQuery(".ajax_form #name, .ajax_form #message, .ajax_form #email , .ajax_form #website").val("");
										   }
										});
									} 
							}
					});
			return false;
	});
}


function k_menu(){
jQuery("#nav a, #subnav a").removeAttr('title');
jQuery(" #nav ul ").css({display: "none"}); // Opera Fix
jQuery(" #nav li").hover(function(){
		jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown(400);
		},function(){
		jQuery(this).find('ul:first').css({visibility: "hidden"});
		});
}




(function($)
{ 
	$.fn.levitate = function(default_options) 
	{
		var defaults = 
		{  
			duration:600, 					// transition duration 
			transition:"easeInOutCubic", 	
			opacity:0.6,
			opacity_level2:0,
			interval: 5000
			
		};  
		
		var def = $.extend(defaults, default_options); 
		
		return this.each(function()
		{	
			// variables and elements we need
			var $container = $(this), $items = $container.find('.featured_item'), $values = [], $zindex = [], $offset = 0, $animating = false, $clicked=false;
			
			var interval = setInterval(function(){}, 50000);//fake interval needed to circumvent some js errors in not-so-good-browsers ;D
			
			jQuery(window).load(function(){
				if(def.interval && !$clicked )
					{
					interval = setInterval(function() { rotate(-1); }, def.interval); 
					}
				});
		
			//sets the opacity for elements in JS since its not yet a valid css declaration (if user wants opacity):
			if (def.opacity != 1 && def.opacity_level2 != 1)
			{	$items.not('.featured_item_active').css('opacity',def.opacity_level2);
				$container.find('.featured_item_active').css('opacity', 1);
				$container.find('.featured_item_last, .featured_item_upcoming').css('opacity', def.opacity);
				
			}
			//gets the values for each element by extracting the css, this way we can use unlimited items
			$items.each(function(i)
			{	
				var $item = $(this);
				 
				$values[i]= {
								width: $item.width(),
								top: parseInt($item.css('top')),
								left: parseInt($item.css('left')),
								opacity: $item.css('opacity')
							};
							
				$zindex[i] =	$item.css('zIndex');
							
			}); // end each loop
			
			
			$items.click(function(e)
			{	
				if (! $animating)
				{	
					$direction = e.pageX > $(window).width() / 2 ? -1 : 1;
					rotate($direction);
				}
				clearInterval(interval);
				$clicked = true;
			}); // end click
			
			
			function rotate($direction)
			{	
				if ($items.length <= 2) return;
				$animating = true;
				
				if($items.length == $offset || $items.length == ($offset*-1))
				{
					$offset = 1 * $direction;
				}
				else
				{
					$offset = $offset + $direction;
				}
								
				
				//$offset = $items.length == $offset ? 1 : $offset + 1;
				$items.each(function(i)
				{	
					var $item = $(this), $next;
					
					$next = i + $offset;
					
						if($next >= $items.length)
						{
							$next = i - $items.length + $offset;
						}
						else if($next < 0)
						{
							$next = i + $items.length + $offset;
						}
					
					//modifier of -12 for images because of border + padding				
					$item.animate($values[$next], def.duration, def.transition);
					$item.find("img").animate({width:$values[$next].width-12}, def.duration, def.transition, function()
					{
						$animating = false;
					});
					
					setTimeout(function()
					{
        				$item.css({zIndex: $zindex[$next]});
    				}, def.duration / 2);
    				
				});
			} //end rotate
		});	
	};
})(jQuery); 

























/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
*/

// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		//alert(jQuery.easing.default);
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158; 
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});