var msg,apps,equis;
var carga = function() {
	$('#pageload div').fadeIn(2000,function(){
		$('span',this).animate({opacity:1},180,function(){
			$('#pagedesk').addClass('desk');
			showdesk();
			setTimeout(function(){
				$('#pageload').fadeOut(2000,function(){$('#pageload').remove();});
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
		//	$('#pageload').remove();
		//	$('#pagedesk').addClass('desk');
		//	showdesk();
	}
};
var introvilla = function() {
	return false;
};
var showdesk = function() {
	var o = $('#noticias').addClass('loading');
	if(!sessionStorage.noticias) $.ajax({
		dataType: 'jsonp',jsonp: 'jsonp_callback',url: 'http://wahackpokemon.com/wah/api/getnews.php',
		success: function(data) {
			var html='';
			//for(var i=0;i<data.length;i++){
			for(var i=0;i<3;i++){
				html += '<article class="desplegable"><header><h1 class="tit">'+data[i][2]
				+'<span>~'+data[i][1]+'</span><b>W</b></h1></header><section>'+data[i][3]+'</section></article>';
			};
			sessionStorage.noticias = html;
			o.removeClass('loading').html(html);
			$('.tit',o).on('click',pledesplegar);
		},
		error: function(err, textStatus, errorThrown) {alert(textStatus);} 
	});
	else {o.removeClass('loading').html(sessionStorage.noticias);
			$('.tit',o).on('click',pledesplegar);
	}
	apps = [["ajustes","Ajustes"],["reloj","Reloj"],["notas","Notas"],["ajustes","Ajustes"],["reloj","Reloj"],["notas","Notas"],["ajustes","Ajustes"],["reloj","Reloj"],["notas","Notas"],["ajustes","Ajustes"],["reloj","Reloj"],["notas","Notas"]];
	for(var i=0;i<apps.length;i++) {
		$('#dir').append('<a href="app/'+apps[i][0]+'.php" rel="'+apps[i][0]+'"><img src="img/app-'+apps[i][0]+'.png"/><span>'+apps[i][1]+'</span></a>');
	}
	$('#dir a').on('click touchstart',openapp);
	$('#dir a').on('dragstart', function (e) {e.preventDefault();});	
};
var openapp = function(e) {
	e.preventDefault();
	$(this).addClass('lift');
	var appname = $(this).attr('rel');
	$('#pageapp').addClass('opening').load($(this).attr('href'),function(){
		$(this).attr('rel',appname).addClass('on opaque');
		setTimeout(function(){
			$('#pagedesk').addClass('off');
			$('#pageapp').removeClass('opening');
		},1000);
	});
};
var closeapp = function() {
	$('#pagedesk').removeClass('off');
	$('#pageapp').removeClass('opaque');
	setTimeout(function(){
		$('#dir a').removeClass('lift');
		setTimeout(function(){
			$('#pageapp').removeClass('on');
		},800);
	},200);
};
var appcommons = function() {
	$('.close').live();
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