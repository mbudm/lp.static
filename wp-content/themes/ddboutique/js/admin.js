jQuery(document).ready(function ($) {

	$('.color-picker').each( function(i){
			var picker_id = $(this).attr('id') + '_picker';
			$(this).after('<div class="fpicker" id="'+picker_id+'"></div>');
			$('#'+picker_id).farbtastic('#'+$(this).attr('id'));
	});
	$('.color-picker').blur(function() {
	  $('#'+$(this).attr('id') + '_picker').hide();
	});
	$('.color-picker').focus(function() {
	  $('#'+$(this).attr('id') + '_picker').show();
	});
	mbudmSetPostAttachmentHTML = function(html,attachmentType){
		$('.inside', '#post'+attachmentType+'div').html(html);
	};
	
	mbudmSetPostAttachmentID = function(id,attachmentType){
		var field = $('input[value="'+attachmentType+'_id"]', '#list-table');
		if ( field.size() > 0 ) {
			$('#meta\\[' + field.attr('id').match(/[0-9]+/) + '\\]\\[value\\]').text(id);
		}
	};

	mbudmRemovePostAttachment = function(nonce, attachmentType){
		$.post(ajaxurl, {
			action:"set-post-"+attachmentType, post_id: $('#post_ID').val(), attachment_id: -1, _ajax_nonce: nonce, cookie: encodeURIComponent(document.cookie)
		}, function(str){
			if ( str == '0' ) {
				alert( mbudmSetPostAttachmentPreviewContent.error );
			} else {
				mbudmSetPostAttachmentHTML(str,attachmentType);
			}
		}
		);
	};
	
	
	var mbudmSetPostAttachmentPreviewContent = {
		setAttachment: 'Use as preview file',
		saving: 'Saving...' ,
		error: 'Could not set that as the preview file. Try a different attachment.' ,
		done: 'Done' 
		};
	var mbudmSetPostAttachmentContent = {
		setAttachment: 'Use as file',
		saving: 'Saving...' ,
		error: 'Could not set that as the file. Try a different attachment.' ,
		done: 'Done' 
		};
});
/*
attachmentType = _file or _preview_file
*/
function mbudmSetAsAttachment(c,b,attachmentType){
	var a=jQuery("a#wp-post-"+attachmentType+"-"+c);
	a.text(mbudmSetPostAttachmentPreviewContent.saving);
	jQuery.post(ajaxurl,{
			action:"set_post"+attachmentType,
			post_id:post_id,
			attachment_id:c,
			_ajax_nonce:b,
			cookie:encodeURIComponent(document.cookie)
		},
		function(e){
			var d=window.dialogArguments||opener||parent||top;
			a.text(mbudmSetPostAttachmentPreviewContent.setAttachment);
			if(e=="0"){
				alert(mbudmSetPostAttachmentPreviewContent.error);
			}else{
				jQuery("a.wp-post-"+attachmentType).show();
				a.text(mbudmSetPostAttachmentPreviewContent.done);
				a.fadeOut(2000);
				d.mbudmSetPostAttachmentID(c);
				d.mbudmSetPostAttachmentHTML(e);
			}
		}
	);
};
