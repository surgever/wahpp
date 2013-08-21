navigator.splashscreen.hide();
setTimeout(function(){alert('Hello Wah!');},800);

var plegar = function() {
	var rel= $(this).attr('rel'),
		bloqueid= '#'+rel;
	if($('#acordeon').hasClass(rel)) {
		$(bloqueid).slideDown('slow', function() {
			$('#acordeon').removeClass(rel);
		});
	} else {
		$(bloqueid).slideUp('slow', function() {
			$('#acordeon').addClass(rel);
		});
	}
};
$(document).ready(function() {
	$('#wahlogo').css('background','red');
});