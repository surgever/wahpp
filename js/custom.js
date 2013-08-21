/*navigator.splashscreen.hide();*/

var red = function(event) {
	event.preventDefault();
	$('#wahlogo').css('background','red');
};
$(document).ready(function() {
	$('#wahlogo').click(red);
	$('#page-load div').fadeIn(2000,function(){
		$('span',this).animate({opacity:1},function(){
			$('#page-load').slideUp();
		});
	});
	setTimeout(function(){alert('Hello Wah!');},8000);
});