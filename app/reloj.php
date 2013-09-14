<div id="fondo">
<div id="reloj">
	<i id="s"></i>
	<i id="h"></i>
	<i id="m"></i>
</div>
<span id="relojdisplay"></span>
</div>
<script type="text/javascript">
var h = $('#h'),m = $('#m'),s = $('#s'),hours;
function setdeg(o,deg) {
	o.attr('style', '-webkit-transform: rotate('+deg+'deg); -moz-transform: scale('+deg+'deg); transform: scale('+deg+'deg)');
};
function colorcielo() {
	if(hours<24) $('#fondo').css('background-color','#191970');
//	if(hours<22) $('#fondo').css('background-color','#C71585');
	if(hours<18) $('#fondo').css('background-color','#1E90FF');
	if(hours<12) $('#fondo').css('background-color','#87CEFA');
	if(hours<8) $('#fondo').css('background-color','#111122');
}
function f5reloj() {
	var currentTime = new Date()
	hours = currentTime.getHours()
	var minutes = currentTime.getMinutes()
	var secs = currentTime.getSeconds()
	if (minutes < 10){
	minutes = "0" + minutes
	}
	setdeg(h,(hours*30)+(minutes*0.5));
	setdeg(m,(minutes*6)+(secs*0.1));
	setdeg(s,secs*6);
	var ap = (hours > 11)?"PM":"AM";
	$('#pageapp #relojdisplay').text(hours + ":" + minutes +" ");
}
f5reloj();
setInterval(f5reloj,1000);
colorcielo();


 </script>
<style type="text/css">
#pageapp.on #fondo {min-height: 100%;position: absolute;top: 0px;left: 0px;width:100%; height:100%; background: url(img/fondo-cielo.png) bottom repeat-x #70b070}
#reloj, #pageapp span  {display:block; background: rgba(150,150,150,0.3); border:3px solid rgba(0,0,0,0.4); border-radius:50%; width:250px; height: 250px; position: relative; margin:40px auto 0}
#reloj i {display:block; background:#000; width:1%; height:50%; -webkit-transform-origin: bottom; -moz-transform-origin: bottom; transform-origin: bottom; position: absolute; left: 50%; bottom:50%}
#reloj #h {height:30%}
#reloj #m {height:45%}
#reloj #s {height:40%; background: darkred}
#reloj b {display: block; background: #000; height:3%; width:3%; position:absolute; left:49%; top:49%; border-radius:10px}
#pageapp span {width:90px; height:32px; border-radius:5px; color:#fff; line-height:30px; text-align: center; margin-top:80px}

@media (max-width:260px) {#reloj {width:200px; height:200px}}
@media (max-width:210px) {#reloj {width:150px; height:150px}}
@media (max-height:450px) {#pageapp span {margin-top:50px}}
@media (max-height:400px) {#reloj {margin-top:10px}}
@media (max-height:370px) {#pageapp span {margin-top:10px}}
@media (max-height:320px) {#reloj {width:200px; height:200px}}
@media (max-height:270px) {#reloj {width:150px; height:150px}}
</style>