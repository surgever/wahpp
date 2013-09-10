<div id="tareaswrapper" ontouchstart="touchStart(event,'tareaswrapper');"  ontouchend="touchEnd(event);" ontouchmove="touchMove(event);" ontouchcancel="touchCancel(event);" >
<ul id="tareas">
</ul>
</div>
<script type="text/javascript" src="js/swipesensejs.js" />
<script type="text/javascript">
var lista=$('#tareas'),li,tareas,tarea,id;
var colores = ['white','red','blue','yellow','cyan','green'];

var f5lista = function() {
	tareas = JSON.parse(localStorage.tareas);
	var html='';
	for (var i=0;i<tareas.length;i++) {
		html += '<li class="'+tareas[i][0]+' '+tareas[i][1]+'" id="li'+i+'" ontouchstart="touchStart(event,\'tareaswrapper\');"  ontouchend="touchEnd(event);" ontouchmove="touchMove(event);" ontouchcancel="touchCancel(event);"><i></i><b></b><h3>'+tareas[i][2]+'</h3><span>'+tareas[i][3]+'</span></li>';
	}
	lista.html(html);
	li=$('li',lista );
	eventostareas();
};
var tareanueva = function(o) {
	return false;};
var tareaver = function(e) {
	$(this).parent('li').toggleClass('show');};
var tareaeditar = function(e) {
	$(this).parent('li').toggleClass('show');};
var tareahecho = function(e) {
	tarea  = $(this).parent('li'); id = tarea[0].id.substr(2);
	if(tarea.hasClass('hecho')) {tarea.removeClass('hecho');tareas[id][0]='';}
		else  {tarea.addClass('hecho');tareas[id][0]='hecho';}
	localStorage.tareas = JSON.stringify(tareas);
	};
var tareaborrar = function(e) {
	tarea  = $(this).parent('li'); id = tarea[0].id.substr(2);
	$(this).parent('li').remove();
	tareas.splice(id, 1);
	localStorage.tareas = JSON.stringify(tareas);
	};
var tareacolorear = function() {
	tarea  = $(this).parent('li'); id = tarea[0].id.substr(2);
	for (var i=0;i<colores.length;i++) if(tareas[id][1]==colores[i]) {
		tarea.removeClass(tareas[id][1]);
		tareas[id][1]= (i<colores.length-1)? colores[i+1] :colores[0];
		tarea.addClass(tareas[id][1]);
		break; break;
	}
	localStorage.tareas = JSON.stringify(tareas);
	};
var eventostareas = function() {
	$('h3',li).click(tareaver);
	$('h3',li).dblclick(tareaeditar);
	$('i',li).dblclick(tareahecho);
	$('i',li).click(tareacolorear);
	$('b',li).click(tareaborrar);
};

if(!localStorage.tareas) localStorage.tareas = '[["hecho","white","Descargar la Wahpp","Bajarse la aplicación de Wah"],["","white","Empezar un hack","Crear tu propio proyecto"],["","yellow","Publicar el hack en Wah",""]]';
f5lista();

//if(localStorage.notepad) notepad.html(localStorage.notepad);
</script>
<style type="text/css">
#pageapp.on {background: #ccc}
#tareaswrapper {clear:both; margin:10px; background:#4586d6;padding:30px 10px 5px;color:#fff;min-height:400px; line-height: 20px;box-shadow: inset 0px 5px 10px #174292, 0px -1px 0px #999, 0px 1px 2px #fff; border-radius: 5px}
#tareas li {min-height:30px;clear:both; background:rgba(0,0,0,0.2); border-radius:5px; margin:10px 0}
#tareas li *{display:block; height:30px;}
#tareas i {width: 60px; float: left; background: lightgreen; opacity:0.1}
#tareas b {width: 60px; float: right; background: red; opacity:0.1}
#tareas h3 {padding: 5px 0; font-weight: bold}
#tareas h3, #tareas li.show span {height:auto; }
#tareas span {height:0px; overflow: hidden}
#tareas li.hecho i {background: green}
#tareas li.hecho h3 {text-decoration: line-through}
['white','red','yellow','green','blue','violet'];
#tareas li.white h3 {color:#fff}
#tareas li.red h3 {color:#fdc9bd}
#tareas li.blue h3 {color:#c2bdfd}
#tareas li.yellow h3 {color:#fffbb8}
#tareas li.cyan h3 {color:#b8fff4}
#tareas li.green h3 {color:#b6ff99}
#tareas li.white {background:rgba(0,0,0,0.2);}
#tareas li.red {background:rgba(150,50,0,0.6);}
#tareas li.blue {background:rgba(0,0,150,0.6);}
#tareas li.yellow {background:rgba(150,150,0,0.6);}
#tareas li.cyan {background:rgba(0,100,100,0.6);}
#tareas li.green {background:rgba(0,150,0,0.6);}
</style>