/* MEDIA UPLOADER */
jQuery(document).ready(function($){
	$('#uploadBtn').click(function(e) {
		e.preventDefault();
		var thumb = wp.media({ 
			title: 'Upload Logo',
			multiple: false
		}).open().on('select', function(e){
			var thumb_url = thumb.state().get( 'selection' ).first().toJSON().url;
			$('#deluxeLogo').attr( 'src', thumb_url );
                        $('#optionsLogoURL').val( thumb_url );
			});
		return false;
	});	
});

