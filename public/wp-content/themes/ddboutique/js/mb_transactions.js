jQuery(document).ready(function ($) {
	jQuery('a#product-download').click(function() {
		var dlfile = jQuery(this).attr('title');
		 _gaq.push(['_trackEvent', 'Posters', 'Downloaded', dlfile]);
	});
});
