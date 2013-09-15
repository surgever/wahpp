<h1 id="titulo">Espacios de Hacks</h1>
<div id="list" class="loading">

</div>

<script type="text/javascript">
$('#list').html('');
$.ajax({
	dataType: 'jsonp',jsonp: 'jsonp_callback',url: 'http://wahackpokemon.com/wah/api/get.hacks.php',
	success: function(data) {
		$('#list').append(data);/*
		var html='';
		for(var i=0;i<data.length;i++){
		for(var i=0;i<3;i++){
			html += '<article class="desplegable"><header><h1 class="tit">'+data[i][2]
			+'<span>~'+data[i][1]+'</span><b>W</b></h1></header><section>'+data[i][3]+'</section></article>';
		};
		sessionStorage.noticias = html;
		$not.removeClass('loading').html(html);
		$('.tit',$not).on('click',pledesplegar);*/
	},
	error: function(err, textStatus, errorThrown) {alert(textStatus);} 
});
</script>
<style type="text/css">
#pageapp.on {background:#fff}
#list li {display: block; min-height:40px; padding:5px; background: #fff; color: #666; text-align: center;}
#list li:nth-child(even) {background: #eee}
h1#titulo {background: #C5B600; color: #fff; text-align: center;line-height:40px; font-size:35px}
#list i {display:block; float: left; width:30px; height:30px; margin:0 5px 0 0; line-height:30px; text-align:center; border:5px solid #000;border-radius:50%; background z:gray;color: #fff; font-size:16px; font-weight:bold; font-style:normal}
#list strong {display:block; color: #C5B600; font-size: 18px;}
#list cite {display:block; font-size:12px}

</style>