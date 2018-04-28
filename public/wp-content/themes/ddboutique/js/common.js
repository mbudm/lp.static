jQuery(document).ready(function ($) {
	
	fadeUpPage();
	/**/
	var timer;
    $('#access li').hover(
		function() {
			if(timer){
				clearTimeout(timer);
				timer = null;
			}
			$(this).children('.sub-menu').fadeIn();
		},
		function() {
			timer = setTimeout(function(){
				$('.sub-menu').fadeOut();
					}, 1000);
		}
	);

	
	
	// Load full image on click
	$("a.productPreview").live('click', function(e) {
		e.preventDefault();
		var previewTitle = $(this).attr('oldtitle');
		var href = $(this).attr('href');
		
		$.modal('<h2>'+previewTitle+'</h2><img src="' + href + '" />',{
			opacity:80,
			maxHeight:'90%',
			maxWidth:'90%',
			closeHTML:'<a class="modalCloseImg" title="'+mbl10n.close_label+'"><span>'+mbl10n.close_label+'</span></a>',
			autoResize:true,
			onOpen: function (dialog) {
				dialog.overlay.fadeIn('slow', function () {
					dialog.data.hide();
					dialog.container.fadeIn('slow', function () {
						dialog.data.fadeIn('fast');
					});
				});
			},
			onClose: function (dialog) {
				dialog.data.fadeOut('fast', function () {
					dialog.container.fadeOut('fast', function () {
						dialog.overlay.fadeOut('slow', function () {
							$.modal.close();
						});
					});
				});
			}
		});
	});
	
	$("figure").each(function(i){
		//remove title & alt attrs
		$(this).find('a').each( function(i){
			$(this).attr('oldtitle',$(this).attr('title'))
			$(this).removeAttr('title');
		});
		$(this).find('a img').each( function(i){
			$(this).attr('oldtitle',$(this).attr('title'))
			$(this).removeAttr('alt title');
		});
		
		var $tip = $(this).find('figcaption');
		$tip.hide();
		var tipw = $tip.width() ? $tip.width() : 100 ;
		$(this).qtip({
			content:$tip,
			position:{target:'mouse', adjust:{x:-4, y:-4, mouse: true }},
			style: {border:{width:0},'background':'none','padding':'0'},
			show:'mouseover',
			hide: 'mouseout'
		});
	});
	
	/* product taxonomy */
	if($('body').hasClass('tax-mbudm_product_category') && !$('html').hasClass('oldie') ){
		updateProductCategoryItems();
		// bind to resize
		$(window).bind('resize', updateProductCategoryItems);
	}
	$.QueryString = (function(a) {
        if (a == "") return {};
        var b = {};
        for (var i = 0; i < a.length; ++i)
        {
            var p=a[i].split('=');
            if (p.length != 2) continue;
            b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
        }
        return b;
    })(window.location.search.substr(1).split('&'))
    
    if(jQuery().minimiser){
		$(".minimisable").minimiser();
	}
	
	if( $('#product-promo-wrapper').length ){ /*&& !$('html').hasClass('mouldie') ){ */
		var $pwrap = $('#product-promo-wrapper');
		var $pcon = $pwrap.find('.slider-content');
		var $p = $pwrap.find('#product-promo');
		var $pw = $p.width();
		var $pk = $p.children('li');
		var $pkFirst = $p.children('li').first();
		var pkPadding = Number( $pkFirst.children('.product-info').css('padding-top').replace(/[^-\d\.]/g, '') ) + Number( $pkFirst.children('.product-info').css('padding-bottom').replace(/[^-\d\.]/g, '') );
		var pkInfoHeight = $p.height() - pkPadding - ($pkFirst.children('.product-holder').height() /2);
		$pk.each(function(i){
			var $infoBox = $(this).children('.product-info');
			var oldHeight = $infoBox.height();
			$infoBox.height(pkInfoHeight);
			var newHeight = $infoBox.height();
		});
		
		if($pk.length > 3 && $pwrap){
			//$pwrap.css('overflow','hidden');
			//create next prev nav
			var $next = $('<a id="pp_next" class="navitem" href="#">&gt;</a>');
			var $prev = $('<a id="pp_prev" class="navitem" href="#">&lt;</a>');
			$pwrap.prepend($prev );
			$pwrap.append($next );
			
			var $sStep = $pkFirst.width() + Number( $pkFirst.css('margin-right').replace(/[^-\d\.]/g, '') );
			$next.bind('click', {scrollTarget:$pcon,scrollStep:$sStep},function(e){
				var $p = e.data.scrollTarget;
				var sStep = '+='+e.data.scrollStep+'px';
				$p.scrollTo(sStep,{axis:'x',duration:200});
			});
			$prev.bind('click', {scrollTarget:$pcon,scrollStep:$sStep},function(e){
				var $p = e.data.scrollTarget;
				var sStep = '-='+e.data.scrollStep+'px';
				$p.scrollTo(sStep,{axis:'x',duration:200});
			});
			
			$pcon.scroll(function() {
				var cpos = $(this).scrollLeft();
				if(cpos + $(this).width() >=  $p.width() ){
					//disable next
					$next.addClass('disabled');
				}else if(cpos <=0){
					//disable prev
					$prev.addClass('disabled');
				}else{
					$next.removeClass('disabled');
					$prev.removeClass('disabled');
				}
			});
			$pcon.scroll();
		}
    }
    
    $("#product-promo.simple_cycle").cycle({
		fx: 'fadeZoom',
		speed: '2000',
		pause: 1
	});
	
	if(typeof _gaq === 'object'){
		if($('#request-download').length ){
			$('#request-download').submit(function() {
			  var dlfile = $("input#download-title").val();
			  _gaq.push(['_trackEvent', 'Free Samples', 'Downloaded', dlfile]);
			});
		}
	}
	
});

function fadeUpPage(){
	if(jQuery(".oldie").length > 0){
    	jQuery(".js #wrap").delay(200).fadeIn(1);
    }else{
    	jQuery(".js #content").fadeIn(1000);
    }
}
function updateProductCategoryItems(){
	var $p = $('#product-promo');
	var $pw = $p.width();
	var $pk = $p.children('li');
	var maxHeight = 0
	$pk.each(function(i){
		var $infoBox = $(this).children('.product-info');
		$infoBox.height('auto');//pkInfoHeight);
		var myHeight = $infoBox.height();
		maxHeight = Math.max(maxHeight,myHeight);
	});

	$pk.each(function(i){
		var $infoBox = $(this).children('.product-info');
		var oldHeight = $infoBox.height();
		$infoBox.height(maxHeight);//pkInfoHeight);
		var newHeight = $infoBox.height();
	});
}
