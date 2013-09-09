
<div id="dadowrapper">
<div id="scene">
<ol id="dado">
<li id="i"><div></div><b class="center">●</b></li>
<li id="ii"><div></div><b class="left">●</b><b class="right">●</b></li>
<li id="iii"><div></div><b class="center">●</b><b class="left">●</b><b class="right">●</b></li>
<li id="iv"><div></div><b class="left">●</b><b class="right">●</b><b class="left">●</b><b class="right">●</b></li>
<li id="v"><div></div><b class="center">●</b><b class="left">●</b><b class="right">●</b><b class="left">●</b><b class="right">●</b></li>
<li id="vi"><div></div><b class="left">●</b><b class="right">●</b><b class="left">●</b><b class="right">●</b><b class="left">●</b><b class="right">●</b></li>
</ol>
</div>
</div>

<script type="text/javascript">
var dado = $('#dado'),scene = $('#scene');
var lanzar = function(o) {
	var x = (Math.floor(Math.random()*10) + 5)* 90;
	var y = (Math.floor(Math.random()*10) + 5)* 90;
	var z = (Math.floor(Math.random()*10) + 5)* 90;
	dado.attr(
		'style',
		'-webkit-transform: rotateX('+x+'deg) rotateY('+y+'deg) rotateZ('+z+'deg);'
		+'-moz-transform: rotateX('+x+'deg) rotateY('+y+'deg) rotateZ('+z+'deg);'
		+'transform: rotateX('+x+'deg) rotateY('+y+'deg) rotateZ('+z+'deg);'
	);
	y = (Math.floor(Math.random()*90));
	scene.attr(
		'style',
		'-webkit-transform: rotateX(-55deg) rotateY('+y+'deg);'
		+'-moz-transform: rotateX(-55deg) rotateY('+y+'deg);'
		+'transform: rotateX(-55deg) rotateY('+y+'deg);'
	);
};
dado.on('click dragmove touchmove', lanzar);
</script>
<style type="text/css">
#pageapp.on {background: green url(img/tapete.jpg) repeat}
#dadowrapper {display:none; width: 200px;  height: 200px;  position: absolute; top:50%; left:50%; margin:-100px;   -webkit-perspective: 1500px;perspective: 1500px;}
#pageapp.on #dadowrapper{display:block}
#scene { width:100%; height:100%; -webkit-transform-style: preserve-3d;-moz-transform-style: preserve-3d;transform-style: preserve-3d; -webkit-transform: rotateX( -50deg ) translateZ( 20px ) rotateY( 30deg ); -moz-transform: rotateX( -50deg ) translateZ( 20px ) rotateY( 30deg ); transform: rotateX( -50deg ) translateZ( 20px ) rotateY( 30deg ); -webkit-transition:1s ease-in; -moz-transition:1s ease-in; transition:1s ease-in}
#dado {display:block; width:100%; height:100%; -webkit-transform-style: preserve-3d;-moz-transform-style: preserve-3d;transform-style: preserve-3d; position: absolute; top:0px; left:0px;  padding:0; margin:0; list-style: none; -webkit-transition:2s ease-out; -moz-transition:2s ease-out; transition:2s ease-out}
#dado li {display: block; width:100%; height:100%; position: absolute; top:0px; left:0px; background: #fff;-webkit-transition:all 0.5s ease-in;-moz-transition:all 0.5s ease-in;transition:all 0.5s ease-in; box-shadow:inset 0px 0px 50px #999; border-radius:20px; -webkit-transform-style: preserve-3d;-moz-transform-style: preserve-3d; }
#dado li div {position: absolute; top:0px; left:0px; width:100%; height:100%; background:#bbb;border-radius:10px;-webkit-transform: translateZ( -50px );-moz-transform: translateZ( -50px );transform: translateZ( -50px ); display: none}
#dado li b {display:block; text-align:center; color:#000; font-size:70px;-webkit-transform: translateZ( 1px );-moz-transform: translateZ( 1px );transform: translateZ( 1px ); }
#i   { -webkit-transform: rotateX(  90deg ) translateZ( 100px );transform: rotateX(  90deg ) translateZ( 100px ); }
#ii  { -webkit-transform: rotateY( -90deg ) translateZ( 100px );transform: rotateY( -90deg ) translateZ( 100px ); }
#iii { -webkit-transform: rotateX( 180deg ) translateZ( 100px );transform: rotateX( 180deg ) translateZ( 100px ); }
#iv  { -webkit-transform: rotateY(   0deg ) translateZ( 100px );transform: rotateY(   0deg ) translateZ( 100px ); }
#v   { -webkit-transform: rotateY(  90deg ) translateZ( 100px );transform: rotateY(  90deg ) translateZ( 100px ); }
#vi  { -webkit-transform: rotateX( -90deg ) translateZ( 100px );transform: rotateX( -90deg ) translateZ( 100px ); }/*
#i   div{ -webkit-transform: rotateX(  90deg ) translateZ( 100px );transform: rotateX(  90deg ) translateZ( 100px ); }
#ii  div{ -webkit-transform: rotateY( -90deg ) translateZ( 100px );transform: rotateY( -90deg ) translateZ( 100px ); }
#iii div{ -webkit-transform: rotateX( 180deg ) translateZ( 100px );transform: rotateX( 180deg ) translateZ( 100px ); }
#iv  div{ -webkit-transform: rotateY(   0deg ) translateZ( 100px );transform: rotateY(   0deg ) translateZ( 100px ); }
#v   div{ -webkit-transform: rotateY(  90deg ) translateZ( 100px );transform: rotateY(  90deg ) translateZ( 100px ); }
#vi  div{ -webkit-transform: rotateX( -90deg ) translateZ( 100px );transform: rotateX( -90deg ) translateZ( 100px ); }*/
#dado b.center {width:100%; height:100%; line-height:200px; position: absolute; top:0px; left:0px}
#dado b.left {width:50%; height:50%; line-height:100px; float:left;}
#dado b.right {width:50%; height:50%; line-height:100px; float:right;}
#dado #ii b,#dado #iii b {clear:left}
#dado #vi b { height:33%; line-height:66px; }

</style>