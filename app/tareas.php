<div id="tareaswrapper" ontouchstart="touchStart(event,'tareaswrapper');"  ontouchend="touchEnd(event);" ontouchmove="touchMove(event);" ontouchcancel="touchCancel(event);" >
<ul id="tareas">
<li class="hecho">
	<i></i>
	<h3></h3>
	<span></span>
	<b></b>
</li>
</ul>
</div>
<script type="text/javascript" src="js/swipesensejs.js" />
<script type="text/javascript">
var k,lista=$('#tareas');
var generarlista = function(o) {
	//k = event.keyCode;
	//localStorage.notepad = notepad.html().replace('<div>',"\n");
	return false;
};
var agregartarea = function(o) {
	return false;
};
//if(localStorage.notepad) notepad.html(localStorage.notepad);
</script>
<style type="text/css">
#pageapp.on {background: #ccc}
#tareaswrapper {clear:both; margin:10px; background:#4586d6;padding:30px 10px 5px;color:#fff;min-height:400px; line-height: 20px;box-shadow: inset 0px 5px 10px #174292, 0px -1px 0px #999, 0px 1px 2px #fff; border-radius: 5px}
</style>