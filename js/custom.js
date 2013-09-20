var msg,apps,equis,$app,$desk,$load=$('#pageload'),desked=0,extrapopstate;
apps = [["ajustes","Ajustes"],["reloj","Reloj"],["pizarra","Pizarra"],["dado","Dado"],["tareas","Tareas"],["ranking","Ranking"],["hacks","Spaces"]];

var cl = function(o,add,remove){
	$(o).addClass(add).removeClass(remove);
};	
var introvilla = function() {
	return false;
};
var cargar = function() {
	$desk = $('#pagedesk').addClass('desk');
	$app = $('#pageapp');
	if(!localStorage.home) showdesk();
	else openapp({name: localStorage.home,url: 'app/'+localStorage.home+'.php'});
}
var showdesk = function() {
	var $not = $('#noticias',$desk).addClass('loading');
	/*if(!sessionStorage.noticias) $.ajax({
		dataType: 'jsonp',jsonp: 'jsonp_callback',url: 'http://wahackpokemon.com/wah/api/get.news.php',
		success: function(data) {
			var html='';
			//for(var i=0;i<data.length;i++){
			for(var i=0;i<3;i++){
				html += '<article class="desplegable"><header><h1 class="tit">'+data[i][2]
				+'<span>~'+data[i][1]+'</span><b>W</b></h1></header><section>'+data[i][3]+'</section></article>';
			};
			sessionStorage.noticias = html;
			$not.removeClass('loading').html(html);
			$('.tit',$not).on('click',pledesplegar);
		},
		error: function(err, textStatus, errorThrown) {alert(textStatus);} 
	});
	else { $not.removeClass('loading').html(sessionStorage.noticias);
			$('.tit',$not).on('click',pledesplegar);
	}*/
	for(var i=0;i<apps.length;i++) {
		$('#dir',$desk).append('<a href="app/'+apps[i][0]+'.php" rel="'+apps[i][0]+'"><img src="app/'+apps[i][0]+'.png"/><span>'+apps[i][1]+'</span></a>');
	}
	$('#dir a',$desk).on('dragstart touchmove', function (e) {e.preventDefault();});
	$('#dir a',$desk).on('click touchstart',function(e){
		e.preventDefault();
		$(this).addClass('lift');	
		openapp({name: $(this).attr('rel'),url: $(this).attr('href')});
	});
	desked = true;
};
var openapp = function(app) {
	if($app.attr('rel') != app.name) $('#pageapp').load(app.url,anim);
	else anim();
	function anim() {
		$app.attr('rel',app.name).addClass('opening on opaque');
			setTimeout(function(){
				$('#pagedesk').addClass('off');
				setTimeout(function(){
					$('#pageapp').removeClass('opening')
				//	.find('.appclose,.appback').click(closeapp);
					if(window.location.hash) var hash = window.location.hash.substring(1);
					if(hash!=app.name) history.pushState(app, app.name, '/#'+app.name);
				},200);
		},800);
	}
};
var closeapp = function() {
	if(!desked) showdesk();
	$('#pagedesk').removeClass('off');
	$('#pageapp').addClass('opening').removeClass('opaque');
	setTimeout(function(){
		$('#dir a').removeClass('lift');
		setTimeout(function(){
			$('#pageapp').removeClass('opening on');
			if(window.location.hash) var hash = window.location.hash.substring(1);
			if(hash) {window.location.hash='';}
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

window.onpopstate = function(event) {
		if(window.location.hash) var hash = window.location.hash.substring(1); //console.log(hash);
		//if(hash.indexOf('/')!=-1) {console.log(hash); hash=hash.split('/'); hash=hash[0];}
		if(hash && !$('#pageapp').hasClass('on')) openapp({name: hash,url: 'app/'+hash+'.php'});
		else if(!hash && $('#pageapp').hasClass('on')) closeapp();
		if(extrapopstate) extrapopstate();
};
$(document).ready(function() {
	if(typeof(Storage)==="undefined") alert('Sin almacenamiento local la aplicación no funcionará.') 
	else cargar();
});