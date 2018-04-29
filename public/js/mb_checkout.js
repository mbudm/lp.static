// make these global 
var dgloaded;
var dg;
var checkout;
var cartsummary;
var cartvalue;

jQuery(document).ready(function ($) {
	if(incontext_mode){
		if(!dgloaded){
			//asynchronously fetch paypal's javascript
			jQuery.getScript('https://www.paypalobjects.com/js/external/dg.js', 
				function(){
					//console.debug("paypal javascript loaded");
					dgloaded = true;
					process_dg();
				}
			);
		}else{
			process_dg();
		}
	}
	
	if(jQuery.fn.mbSelect){
		jQuery('#mb_addp').mbSelect({triggerSubmit:true});
	}
});


function process_dg(){
	if(jQuery.QueryString){ //need to test if QueryString has been loaded for this page
		if(window.top == window.self) {
			// Top level window			
			checkout = getCheckoutHasItemsElement();
			if(checkout.length > 0){
				cartsummary = jQuery("input#mbudm_cart_summary").val();
				cartvalue = jQuery("input#mbudm_cart_value").val();
				if(typeof _gaq === 'object'){
					_gaq.push(['_trackEvent', 'Products', 'Checkout Submit', top.cartsummary]);
				}
				dg = new PAYPAL.apps.DGFlow({
					// the HTML ID of the form submit button which calls setEC
					trigger: "checkout_submit"
				});
			}else{
				//window.console && console.log('No items so pp not set up');
			}
		} else {
			// Not top level. An iframe, popup or something
			// jQuery('body').hide();
			switch(jQuery.QueryString["mb_trans"]){
				case "1":
					//var c = top.checkout ? top.checkout : getCheckoutElement();
					if(top.checkout){
						if(typeof _gaq === 'object'){
							_gaq.push(['_trackEvent', 'Products', 'Purchased', top.cartsummary]);
							ga_addTrans();
						}
						if(top.dg){
							top.window.location.replace(mbl10n.success_redirect);
							top.dg.closeFlow();
						}
					}else{
						console.log("Completed but no checkout element:"+typeof(top.checkout));
					}
				break;
				case "2":
					if(top.checkout){
						top.checkout.before('<p class="alerts">'+mbl10n.checkout_cancel+'</p>');
						if(typeof _gaq === 'object'){
							_gaq.push(['_trackEvent', 'Products', 'Cancelled', top.cartsummary]);
						}
						if(top.dg){
							top.dg.closeFlow();
						}
					}else{
						console.log("Cancelled but no checkout element:"+typeof(top.checkout));
					}
				break;
			}
		}
	}
}

function getCheckoutHasItemsElement(){
	return jQuery("#checkout.cart_has_items");
}
function getCheckoutElement(){
	return jQuery("#checkout");
}

function ga_addTrans(){
	  _gaq.push(['_trackPageview']);
	  
	  _gaq.push(ga_addTrans_arr);
	
	   // add item might be called for every item in the shopping cart
	   // where your ecommerce engine loops through each item in the cart and
	   // prints out _addItem for each
	   for(var inst in ga_addItem_arr){
	  		//console.log(inst +": "+ga_addItem_arr[inst]);
	  		_gaq.push(ga_addItem_arr[inst]);
	  }
	  _gaq.push(['_trackTrans']); //submits transaction to the Analytics servers
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	  
}
