/* 
   Minimiser for jQuery v1.0.1.
   Written by Steve Roberts using a design pattern from Keith Wood (kwood{at}iinet.com.au) http://keith-wood.name/maxlength.html May 2009.
   Dual licensed under the GPL (http://dev.jquery.com/browser/trunk/jquery/GPL-LICENSE.txt) and 
   MIT (http://dev.jquery.com/browser/trunk/jquery/MIT-LICENSE.txt) licenses. 
   Please attribute the author if you use it. */

(function($) { // Hide scope, no $ conflict

var PROP_NAME = 'minimiser';

/* minimiser manager. */
function Minimiser() {
	
	this._defaults = {
		trigger_element: ":first",
		enable_width: 9999,
		isEnabled: false,
		isOpen: true,
		accordionMode: false
	}
	this._instances = [];
}

$.extend(Minimiser.prototype, {
	/* Class name added to elements to indicate already configured with mobify. */
	markerClassName: 'minimiser',
	isOpenClass: 'minIsOpen',
	triggerClassName: 'minTrigger',
	
	
	/* Override the default settings for all minimiser instances.
	   @param  settings  (object) the new settings to use as defaults
	   @return  (Minimiser) this object */
	setDefaults: function(settings) {
		$.extend(this._defaults, settings || {});
		return this;
	},

	/* Attach the minimiser functionality to an element.
	   @param  target    (element) the control to affect
	   @param  settings  (object) the custom options for this instance */
	_attachMinimiser: function(target, settings) {
		target = $(target);
		if (target.hasClass(this.markerClassName)) {
			return;
		}
		target.addClass(this.markerClassName);
		
				
		var inst = {settings: $.extend({}, this._defaults)};
		$.data(target[0], PROP_NAME, inst);
		
	
		this._instances.push(target);
	
		this._changeMinimiser(target, settings);
	},

	/* Reconfigure the settings for a minimiser control.
	   @param  target    (element) the control to affect
	   @param  settings  (object) the new options for this instance or
	                     (string) an individual property name
	   @param  value     (any) the individual property value (omit if settings is an object) */
	_changeMinimiser: function(target, settings, value) {
		target = $(target);
		if (!target.hasClass(this.markerClassName)) {
			return;
		}
		settings = settings || {};
		if (typeof settings == 'string') {
			var name = settings;
			settings = {};
			settings[name] = value;
		}
		var inst = $.data(target[0], PROP_NAME);
		$.extend(inst.settings, settings);
		
		/* bind to resize event */
		$(window).bind('resize.minimiser' ,{t: target},function(event) {
		 	$.minimiser._enableMinimiser(event.data.t);
		 });
		
		/* store the trigger element */
		inst.settings.trigElt = target.children(inst.settings.trigger_element);
		
		/* store a ref to the target in the trigElt data object */
		var trigInst = {minimiserTarget: target};
		$.data(inst.settings.trigElt[0], PROP_NAME, trigInst);
		
		if(!inst.settings.trigElt.hasClass(this.triggerClassName)){
			inst.settings.trigElt.addClass(this.triggerClassName);
		}
		
		/* apply bind to trigger element */
		inst.settings.trigElt.bind('click.minimiser',{t: target},function(event) { 
				$.minimiser._updateMinimiser(event.data.t);
				//$(this).siblings().slideToggle(); 
		});
		$.minimiser._enableMinimiser(target);
	},
	/* bound to the resize event - each instance does an enable check
	   @param  target  (element) the control to check */
	_enableMinimiser: function(target) {
		target = $(target);
		var inst = $.data(target[0], PROP_NAME);
		var enableCheck = $(window).width() <= inst.settings.enable_width ? true : false ;
		if(enableCheck !== inst.settings.isEnabled){
			inst.settings.isEnabled = enableCheck;
			$.minimiser._updateMinimiser(target);
		}else{
			
		}
	},
	
	/* slidetoggle wrapper function 
	   @param  target  (element) the control to check
	   @param  showOrhide  (Boolean) control the hide/show state  */
	_updateMinimiser: function(target,showOrhide) {
		target = $(target);
		var inst = $.data(target[0], PROP_NAME);
		
		/* opening or closing ? */
		if(inst.settings.isEnabled){
			if(showOrhide === undefined){ 
				inst.settings.isOpen = !inst.settings.isOpen
			}else{
				inst.settings.isOpen = showOrhide;
			}
		}else{
			//show 
			inst.settings.isOpen = true;
		}
			
		/* do open/close and set class */
		if(inst.settings.isOpen){
			var sibs = inst.settings.trigElt.siblings();
			sibs.removeClass('hidden');
			sibs.slideDown('fast'); 
			if (!target.hasClass(this.isOpenClass)) {
				target.addClass(this.isOpenClass);
			}
			if(inst.settings.accordionMode){
				//close everything but this one
				$.minimiser._accordionMinimiser(target);
			}
		}else{
			var sibs = inst.settings.trigElt.siblings();
			sibs.slideUp('fast', function() {
			   // Animation complete.
			   $(this).addClass('hidden');
			}); 
			if (target.hasClass(this.isOpenClass)){
				target.removeClass(this.isOpenClass);	
			}
		}
	},
	/* Close all instances except for target.
	   @param  target  (element) the control to affect */
	_accordionMinimiser: function(target) {
		target = $(target);
		for(var inst in this._instances){
			if(this._instances[inst][0] != target[0]){
				$.minimiser._updateMinimiser(this._instances[inst],false);
			}
		}
	},
	/* Remove the minimiser functionality from a control.
	   @param  target  (element) the control to affect */
	_destroyMinimiser: function(target) {
		target = $(target);
		if (!target.hasClass(this.markerClassName)) {
			return;
		}
		target.removeClass(this.markerClassName).
			unbind('.minimiser');
		$.removeData(target[0], PROP_NAME);
	},

	/* Retrieve the current instance settings.
	   @param  target  (element) the control to check
	   @return  (object) the current instance settings */
	_settingsMinimiser: function(target) {
		var inst = $.data(target, PROP_NAME);
		return inst.settings;
	}
});

// The list of commands that return values and don't permit chaining
var getters = ['settings'];

/* Attach the minimiser functionality to a jQuery selection.
   @param  command  (string) the command to run (optional, default 'attach')
   @param  options  (object) the new settings to use for these instances (optional)
   @return  (jQuery) for chaining further calls */
$.fn.minimiser = function(options) {
	var otherArgs = Array.prototype.slice.call(arguments, 1);
	if ($.inArray(options, getters) > -1) {
		return $.minimiser['_' + options + 'Minimiser'].
			apply($.minimiser, [this[0]].concat(otherArgs));
	}
	return this.each(function() {
		if (typeof options == 'string') {
			$.minimiser['_' + options + 'Minimiser'].
				apply($.minimiser, [this].concat(otherArgs));
		}
		else {
			$.minimiser._attachMinimiser(this, options || {});
		}
	});
};

/* Initialise the minimiser functionality. */
$.minimiser = new Minimiser(); // singleton instance

})(jQuery);
