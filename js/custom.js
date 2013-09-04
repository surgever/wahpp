var msg;
var carga = function() {
	$('#pageload div').fadeIn(2000,function(){
		$('span',this).animate({opacity:1},180,function(){
			setTimeout(function(){
				$('#pageload').css('background-color','#FFF').fadeOut(1000,function(){$('#pageload').remove();});
			},1000);
		});
	});
	if(typeof(Storage)==="undefined") alert('Sin almacenamiento local la aplicación no funcionará.');
	else {/*
		if(!localStorage.nick) introvilla();
		else if(localStorage.homeapp) {
			var homeapp = localStorage.homeapp;
			var memapp = 'mem'+homeapp;
			if(localStorage[memapp]) apprestore(homeapp);
			else {appstart(homeapp);}
		} else */
		$('#pageload').remove();
			$('body').addClass('desk');
			showdesk();
	}
};
var introvilla = function() {
	return false;
};
var showdesk = function() {
	$.ajax({
		dataType: 'jsonp',jsonp: 'jsonp_callback',url: 'http://wahackpokemon.com/wah/app/getnews.php',
		success: function(data) {
			var html='';
			for(var i=0;i<data.length;i++){
				html += '<article class="desplegable"><header><h1 class="tit">'+data[i][2]
				+'<span>~'+data[i][1]+'</span><b>W</b></h1></header><section>'+data[i][3]+'</section></article>';
			};
			$('#noticias').html(html);
			$('#noticias .tit').click(pledesplegar);
		},
		error: function(err, textStatus, errorThrown) {alert(textStatus);} 
	});
};
var animacionabrirapp = function() {
	$('#sombra blanca', this).animate({width:'100%',height:'100%',top:0,left:0});
};

var pledesplegar = function() {
	$(this).parents('.desplegable').toggleClass('show');
};
/*var	t='data:audio/midi;base64,TVRoZAAAAAYAAAABAeBNVHJrAAAAJQD%2FUQMHoSAA%2F1kCAwAA%2F1gEBAIwCADAKgCQTGmDX4BMAAH%2FLwA%3D';
//new Audio(t).play();
// $().load(url) */

$(document).ready(function() {
	if(typeof(Storage)==="undefined") alert('Sin almacenamiento local la aplicación no funcionará.');
	carga();
	
	
	//cargarnoticias();
});