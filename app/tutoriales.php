<div id="tutowrapper" class="loading">
	<div id="tutotabs">
		<div style="height:50px"></div>
		<button rel="0" class="on">W<br />I<br />K<br />I</button>
		<button rel="1">W<br />E<br />B</button>
		<button rel="2">F<br />O<br />R<br />O</button>
	</div>
	<div id="tutolist" class="panel">
		<div id="wikilist" class="hoja">
			<h1 class="titulo">Creaciones Wahackpedia</h1>
			<ul></ul>
		</div>
		<div id="weblist" class="hoja">
			<h1 class="titulo">Tutoriales de Wah</h1>
			<ul></ul>
		</div>
		<div id="forolist" class="hoja">
			<h1 class="titulo">Últimos publicados</h1>
			<ul></ul>
		</div>
	</div>
	<div id="tutoinfo" class="panel">
		<h1 class="titulo">Tutorial</h1>
		<section>Lorem ipsum dolor sit amet.</section>
	</div>

</div>


<script type="text/javascript">
$('#list').html('<li id="titulo"><h1>Whack a Ranking!</h1></li>');

$.ajax({
	dataType: 'jsonp',jsonp: 'jsonp_callback',url: 'http://wahackpokemon.com/wah/api/get.tutos.php',
	success: function(data) {
		var html='',li;
		for(var i=0;i<data.wiki.length;i++){
			li=data.wiki[i].split('||');
			html += '<li data-url="http://wahackforo.com/w-'+li[0]+'"><strong>'+li[0].replace(/_/g,' ')+'</strong><cite>'+li[1]+'</cite></li>';
			$('#wikilist ul').html(html);
		}	
		var html='';		
		for(var i=0;i<data.web.length;i++){
			li=data.web[i].split('|');
			html += '<li data-url="http://wahackpokemon.com/'+li[0]+'"><strong>'+li[1]+'</strong></li>';
			$('#weblist ul').html(html);
		}		
		var html='';	
		for(var i=0;i<data.foro.length;i++){
			li=data.foro[i].split('||');
			html += '<li data-url="http://wahackforo.com/t-'+li[2]+'/redir301"><strong>'+li[0]+'</strong><cite>'+li[1]+'</cite></li>';
			$('#forolist ul').html(html);
		}
		$('.hoja li').click(abrirtuto);
	},
	error: function(err, textStatus, errorThrown) {alert(textStatus);} 
});

var tutotab = function(){
	$('#tutotabs button').removeClass('on');
	var y = $(this).addClass('on').attr('rel');
	slideScreen('#tutolist',0,y);
}
var abrirtuto = function(){
	var t = $(this);
	var tuto = {
			u : t.data('url'),
			t : $('strong',t).text(),
			a : $('cite',t).text(),
		};
	console.log(tuto);
	$('#tutoinfo h1').text(tuto.t);
	$('#tutoinfo section').html('<iframe frameborder="0" height="100%" width="100%" scrolling="yes" src="'+tuto.u+'" frameborder="0" allowfullscreen style="width:100%;height:100%"></iframe>');
	slideScreen('#tutowrapper',1,0);
	history.pushState({name:'tutoial'}, 'Tutorial', '/#tutoriales/open');
}

function slideScreen(obj,x,y) {
	if(x===undefined) var x = 0;
	if(y===undefined) var y = 0;
	$(obj).attr('rel',x).attr('style',
		'-webkit-transition:.2s ease-out;-moz-transition:.2s ease-out;transition:.2s ease-out;'+
		'-webkit-transform:translate3d('+(-x*100)+'%,'+(-y*100)+'%,0);-moz-transform:translate3d('+(-x*100)+'%,'+(-y*100)+'%,0);transform:translate3d('+(-x*100)+'%,'+(-y*100)+'%,0);')
}
$('#tutotabs button').click(tutotab);
extrapopstate = function() {
		hash = window.location.hash.substring(1).split('/');
		if(!hash[1]) slideScreen('#tutowrapper',0);
		else slideScreen('#tutowrapper',1);
};
extrapopstate();

</script>
<style type="text/css">
#pageapp.on {background:#fff;height:100%; color:#333}
#tutowrapper{height:100%;}
#tutoinfo {position: absolute; top:0px; left:100%;}
.panel {width:100%;height:100%;overflow-y:auto}
#tutolist {overflow:visible;transform:.2s linear}
#tutotabs {background: #006; float:left;height:100%;position:fixed;top:0px;left:0px;z-index:2;}
#tutotabs button {background: none; display:block;border:none;color: #fff;width:50px;text-align:center; padding:5px 0;cursor:pointer}
#tutotabs button:hover,#tutotabs button.on {background: #001; color: #cff}
.hoja {margin-left:50px;height:100%;overflow-y:auto;}

.titulo {color: #1B5FCD;line-height:40px; font-size:35px; padding:5px;}
.titulo:first-letter {font-size:40px;}
.hoja li {display: block; min-height:40px; padding:5px; background: #fff url(img/chevron.png) right center no-repeat; color: #666; text-align: left; border-bottom:1px solid #ccc;}
.hoja li:nth-child(even) {background-color: #f7f7f7}
.hoja li:hover {background-color:#eee}

.hoja strong {display:block; color: #111; font-size: 18px;}
.hoja i {color: red}
.hoja cite {display:block; font-size:12px; color:#333}

</style>

