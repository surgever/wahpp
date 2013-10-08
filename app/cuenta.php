<?php 
$ddbbip = '79.150.66.154';
$ddbbagent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.76 Safar';
$ip = implode('.', array_slice(explode('.', $_SERVER['REMOTE_ADDR']), 0, 4 - 1));

$newidhash = md5($_SERVER['HTTP_USER_AGENT'] . $ip);
?>

<div id="user">
	<h1><?php echo $newidhash;?></h1> 
	<ul>
		<li>IP: <?php echo $ddbbip.' - '.$_SERVER['REMOTE_ADDR']; ?></li>
		<li>Direcci&oacute;n: <?php echo $ddbbagent.' - '.$_SERVER['HTTP_USER_AGENT']; ?></li>
	</ul>
</div>

<script type="text/javascript">
$('#list').html('<li id="titulo"><h1>Whack a Ranking!</h1></li>');
/*$.ajax({
	dataType: 'jsonp',jsonp: 'jsonp_callback',url: 'http://wahackpokemon.com/wah/api/get.ranking.php',
	success: function(data) {
		$('#list').append('<li id="rey"><small><strong>Rey del ranking:</strong><br /> '+data.king.tit+'</small><br /><a href="'+data.king.url+'"><img src="'+data.king.img+'" alt="No screen"/></a></li>');
		$('#list').append(data.list);
	},
	error: function(err, textStatus, errorThrown) {alert(textStatus);} 
});*/
</script>
<style type="text/css">
#pageapp.on {background:#fff}
#user {color:#000}
#list li {display: block; min-height:40px; padding:5px; background: #fff; color: #666}
#list li:nth-child(even) {background: #eee}
#list #titulo {background: #69bcc6; color: #fff; text-align: center;line-height:40px; font-size:35px; border-bottom:1px solid #52929a}
#list #rey {text-align: center; height: auto; background:#fff}
#list #rey strong {color: #69bcc6;}
#list i {display:block; float: left; width:30px; height:30px; margin:0 5px 0 0; line-height:30px; text-align:center; border:5px solid #000;border-radius:50%; background z:gray;color: #fff; font-size:16px; font-weight:bold; font-style:normal}
#list em {float:right; line-height:40px; color: #69bcc6}
</style>