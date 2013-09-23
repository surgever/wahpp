<div id="spacewrapper">
	<div id="hacklist" class="panel">
		<h1 class="titulo">Espacios de Hacks</h1>
		<ul id="list" class="loading"></ul>
	</div>
	<div id="hackinfo" class="panel">
		<h1 class="titulo"></h1>
		<ul></ul>
	</div>
	<div id="secinfo" class="panel">
		<h1 class="titulo"></h1>
		<section></section>
	</div>
</div>
<script type="text/javascript">
var list = $('#list'),spacewrapper=$('#spacewrapper'), hackinfo = $('#hackinfo'),hack={};
$.ajax({
	dataType: 'jsonp',jsonp: 'jsonp_callback',url: 'http://wahackpokemon.com/wah/api/get.hacks.php',
	success: function(data) {
		var html ='';
		for(var i=0;i<data.length;i++)
			html += '<li data-n="'+data[i].n+'" data-b="'+data[i].b+'" data-p="'+data[i].p+'" data-d="'+data[i].d+'" data-r="'+data[i].r+'" data-m="'+data[i].m+'" data-s="'+data[i].s+'"><strong>'+data[i].t+'</strong><cite>'+data[i].a+'</cite></li>';
		list.append(html);
		$('li',list).click(openhack);
	},
	error: function(err, textStatus, errorThrown) {alert(textStatus);} 
});
var openhack = function(){
	var t = $(this);
	hack = {
		n : t.data('n'),
		t : $('strong',t).text(),
		a : $('cite',t).text(),
		b : t.data('b'),
		p : t.data('p').replace('..','').replace('/hack/','http://wahackpokemon.com/hack/'),
		d : t.data('d'),
		r : t.data('r'),
		m : t.data('m').replace('..','').replace('/hack/','http://wahackpokemon.com/hack/'),
		s : t.data('s').replace('..','').replace('/hack/','http://wahackpokemon.com/hack/')
	};
	$('h1',hackinfo).text(hack.t);
	var html = '<li id="hacknameasy">'+hack.n+'-space</li>';
	if(hack.p!='undefined' && hack.p!='') html +='<li><img src="'+hack.p+'" alt="(Fallo URL portada)" /></li>';
	if(hack.d!='undefined') html +='<li><p>'+hack.d+'</p></li>';
	html +='<li id="hackmenusec"><ul>';
	if(hack.m!='undefined') html +='<li id="hackmapa">Ver mapa de '+hack.r+'</li>';
	if(hack.s!='undefined') html +='<li id="hackscan">Ver scan del juego</li>';
	html +='<li id="hackiframe">Ver space completo de '+hack.t+'</li>';
	html +='<li id="hackautor">Hecho por '+hack.a+'</li></ul></li>';
	$('ul',hackinfo).html(html);
	slideScreen('#spacewrapper',1);
	history.pushState({name:'title'}, hack.t, '/#hacks/'+hack.n);
	$('#hackmapa',hackinfo).click(openhackmapa);
	$('#hackscan',hackinfo).click(openhackscan);
	$('#hackiframe',hackinfo).click(openhackiframe);
}
var openhackmapa = function(){
	$('#secinfo h1').text(hack.r);
	$('#secinfo section').html('<img src="'+hack.m+'" alt="(Fallo URL mapa)" style="width:100%"/>');
	slideScreen('#spacewrapper',2);
	history.pushState({name:'title'}, hack.r, '/#hacks/'+hack.n+'/mapa');
}
var openhackscan = function(){
	$('#secinfo h1').text('Scan');
	$('#secinfo section').html('<img src="'+hack.s+'" alt="(Fallo URL scan)" style="width:100%"/>');
	slideScreen('#spacewrapper',2);
	history.pushState({name:'title'}, hack.r, '/#hacks/'+hack.n+'/scan');
}
var openhackiframe = function(){
	$('#secinfo h1').text(hack.n);
	$('#secinfo section').html('<iframe frameborder="0" height="465px" width="470px" scrolling="yes" src="http://wahackpokemon.com/es/'+hack.n+'-space" frameborder="0" allowfullscreen style="width:100%;height:100%"></iframe>');
	slideScreen('#spacewrapper',2);
	history.pushState({name:'title'}, hack.r, '/#hacks/'+hack.n+'/space');
}
function slideScreen(obj,x) {
	$(obj).attr('rel',x).attr('style',
		'-webkit-transition:.2s ease-out;-moz-transition:.2s ease-out;transition:.2s ease-out;'+
		'-webkit-transform:translate3d('+(-x*100)+'%,0,0);-moz-transform:translate3d('+(-x*100)+'%,0,0);transform:translate3d('+(-x*100)+'%,0,0);')
}
extrapopstate = function() {
		hash = window.location.hash.substring(1).split('/');
		if(!hash[1]) slideScreen('#spacewrapper',0);
		else slideScreen('#spacewrapper',1);
};
extrapopstate();
</script>
<style type="text/css">
#pageapp.on {background:#fff;height:100%; color:#333}
#list {min-height:200px;}
#list li {display: block; min-height:40px; padding:5px; background: #fff url(img/chevron.png) right center no-repeat; color: #666; text-align: left; border-bottom:1px solid #ccc;}
#list li:nth-child(even) {background-color: #f7f7f7}
#spacewrapper .titulo {background: #C5B600; color: #fff;line-height:40px; font-size:35px; text-align:center; padding:5px; border-bottom:1px solid #978C00}
#list i {display:block; float: left; width:30px; height:30px; margin:0 5px 0 0; line-height:30px; text-align:center; border:5px solid #000;border-radius:50%; background z:gray;color: #fff; font-size:16px; font-weight:bold; font-style:normal}
#list strong {display:block; color: #C5B600; font-size: 18px;}
#list cite {display:block; font-size:12px}
#spacewrapper {position: relative;}
#spacewrapper {width:100%;height:100%; }
.panel {width:100%;height:100%;overflow-y:auto}
#hacknameasy {background:#eee; color:#999; font-size:90%;font-style:italic}
#hacklist {position: absolute; top:0px; left:0%; }
#hackinfo {position: absolute; top:0px; left:100%;}
#secinfo {position: absolute; top:0px; left:200%;}
#hackinfo li{text-align:center; padding:5px}
#hackinfo li#hackmenusec{padding:0;}
#hackinfo li li{text-align:left; border:1px solid #ccc; border-width:1px 0px; margin-bottom:-1px; background: #fff url(img/chevron.png) right center no-repeat; padding:20px 10px}
#list li:hover,#hackinfo li li:hover {background-color:#eee}
#hackinfo #hackautor{text-align:right;background:none}
</style>