var carga = function(event) {
	$('#page-load div').fadeIn(5000,function(){
		$('span',this).animate({opacity:1},function(){
			setTimeout(function(){
				$('#page-load').fadeOut();
			},8000);
		});
	});
};
$(document).ready(function() {
	setTimeout(carga,5000);
});