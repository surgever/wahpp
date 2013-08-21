$('html').css('background','orange');
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
	$('html').css('background','yellow');
	setTimeout(function(){$('html').css('background','lime');},2000);
	setTimeout(function(){$('html').css('background','blue');},5000);
	setTimeout(carga,5000);
});