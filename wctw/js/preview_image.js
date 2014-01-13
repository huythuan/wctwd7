jQuery(document).ready(function($){
	var pathArray = window.location.pathname.split( '/' );
	var secondLevelLocation = pathArray[1];
	if (secondLevelLocation == 'maps'){
		var offsetX = 50;
		var offsetY = -200;
		$( ".field-type-image a" ).hover(function(e) {
	   		var href = $(this).children('img').attr('src');
	    	$('<img id="previewImage" src="' + href + '" alt="big image" />')
		    	.css('top', e.pageY + offsetY)
		    	.css('left', e.pageX + offsetX)
		    	.appendTo('body');
			}, function() {
		    	$('#previewImage').remove();
        	}); 
			$(".field-type-image a").mousemove(function(e) {
				$("#previewImage").css('top', e.pageY + offsetY).css('left', e.pageX + offsetX);
			});  
		  }          
});

