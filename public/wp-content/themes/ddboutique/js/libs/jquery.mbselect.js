(function($){
	$.fn.mbSelect = function(settings){
		settings = $.extend({
			render : function(option){
				return $('<li>',{
					html : option.text(),
					"class" : option.attr('class')
				});
			},
			className : '',
			triggerSubmit : false
		},settings);

		return this.each(function(){

			// The "this" points to the current select element:
			var select = $(this);
			
			var parentForm = select.parents('form');

			var selectBox = $('<div>',{
			"class":"mbSelect",
			html:"<h4 /><ul>"
			});
			var dropDown = selectBox.find('ul');
			var selected = selectBox.find('h4');
			
			if(settings.className){
				selectBox.addClass(options.className);
			}
			
			
			
			// Looping though the options of the original select element
			select.find('option').each(function(i){
				var option = $(this);

				if(i==select.attr('selectedIndex')){
					selected.html(option.text());
					select.find('option').removeClass('selected');
					option.addClass('selected');
					
				}else if (i==0){
					// make this selected in case nothing is
					selected.html(option.text());
					option.addClass('selected');
				}
				
				// Creating a dropdown item according to the
				// data-icon and data-html-text HTML5 attributes:
				var li = settings.render(option);

				li.click(function(){
					if(!settings.triggerSubmit){
						selected.html(option.text());
					
						dropDown.children('li').removeClass('selected');
						$(this).addClass('selected');
					}
					dropDown.trigger('hide');
					// When a click occurs, we are also reflecting
					// the change on the original select element:
					select.val(option.val());
					
					if(settings.triggerSubmit){
						// submit the parent form
						parentForm.submit();
					}

					return false;
				});
				
				


				dropDown.append(li);
			});
			dropDown.hide();
			select.hide().after(selectBox);

			// Binding custom show and hide events on the dropDown:

			dropDown.bind('show',function(){

				if(dropDown.is(':animated')){
					return false;
				}

				selectBox.addClass('expanded');
				dropDown.slideDown();

			}).bind('hide',function(){

				if(dropDown.is(':animated')){
					return false;
				}

				selectBox.removeClass('expanded');
				dropDown.slideUp();

			}).bind('toggle',function(){
				if(selectBox.hasClass('expanded')){
					dropDown.trigger('hide');
				}
				else dropDown.trigger('show');
			});

			selectBox.click(function(){
				dropDown.trigger('toggle');
				return false;
			});

			// If we click anywhere on the page, while the
			// dropdown is shown, it is going to be hidden:

			$(document).click(function(){
				dropDown.trigger('hide');
			});

		});
	}

})(jQuery);
