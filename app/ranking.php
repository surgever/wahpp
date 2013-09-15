
<ul id="list" class="loading">

</ul>

<script type="text/javascript">
$('#list').html('<li id="titulo"><h1>Whack a Ranking!</h1></li>');
$.ajax({
	dataType: 'jsonp',jsonp: 'jsonp_callback',url: 'http://wahackpokemon.com/wah/api/get.ranking.php',
	success: function(data) {
		$('#list').append('<li id="rey"><small><strong>Rey del ranking:</strong><br /> '+data.king.tit+'</small><br /><a href="'+data.king.url+'"><img src="'+data.king.img+'" alt="No screen"/></a></li>');
		$('#list').append(data.list);/*
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
#list li {display: block; min-height:40px; padding:5px; background: #fff; color: #666}
#list li:nth-child(even) {background: #eee}
#list #titulo {background: #69bcc6; color: #fff; text-align: center;line-height:40px; font-size:35px}
#list #rey {text-align: center; height: auto; background:#fff}
#list #rey strong {color: #69bcc6;}
#list i {display:block; float: left; width:30px; height:30px; margin:0 5px 0 0; line-height:30px; text-align:center; border:5px solid #000;border-radius:50%; background z:gray;color: #fff; font-size:16px; font-weight:bold; font-style:normal}
#list em {float:right; line-height:40px; color: #69bcc6}
#list cite {display:block; font-size:12px}

#list .RED,#list .GREEN,#list .BLUE,#list .YELLOW,#list .GOLD,#list .AAUE,#list .SILVER,#list .AAXE,#list .CRYSTAL {border-color:#666}
#list .RED{background:#9D0905}
#list .GREEN{background:#20AD2D}
#list .BLUE{background:#0C74A9}
#list .YELLOW{background:#E2BE00}
#list .GOLD, #list .AAUE {background:#D0AE29}
#list .SILVER, #list .AAXE {background:#A0A3AA}
#list .CRYSTAL, #list .BYTE {background:#848DDA}
#list .AXVE, #list .Ruby, #list .AXVS {background:#F31A3D;border-color:#9C0F31}
#list .AXPE, #list .AXPS {background:#0082BC;border-color:#404C80}
#list .BPEE, #list .BPES {background:#00A647;border-color:#376D5D}
#list .BPRE, #list .BPRS {background:#E06E38;border-color:#9D0905}
#list .BPGE, #list .BPGS {background:#8EC756;border-color:#20AD2D}
#list .DIAMOND {background:#C2F5F6;border-color:#44597D}
#list .PEARL {background:#EBE3E0;border-color:#945D85}
#list .PLATINUM {background:#AEAEAE;border-color:#1C202C}
#list .HG {background:#D0AE29;border-color:#E96F24}
#list .SS {background:#A0A3AA;border-color:#50647F}
#list .BLACK, #list .IRBO {background:#333333;border-color:#666666}
#list .WHITE, #list .IRAO {background:#EFEEEE;border-color:#DDDDDD}
</style>