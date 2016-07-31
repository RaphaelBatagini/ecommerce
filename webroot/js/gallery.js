$('#gallery img').click(function(event){
	//$('.demo').destroy();
	$('.demo').croppie('bind', {
    	url: event.target.src,
    	viewport: { width: 750, height: 250},
    	boundary: { width: 750, height: 250},
	});
});

$('#save-cover').click(function(){
	$('.demo').croppie('result', 'canvas').then(function(base64image) {
    	$.ajax({
    		type: "POST",
		  	url: "/articles/save-image-to-article",
		  	data : {
		  		id : $('#idArticle').html(),
		  		image64: base64image
		  	}
		}).done(function() {
		  	window.location.replace("/articles/view/" + $('#idArticle').html());
		});
	});
});