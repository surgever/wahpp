<div id="tareaswrapper" class="white">
<ul id="tareas">
</ul>
<button id="crear"><strong>+ Añadir tarea</strong></button>
</div>
<script type="text/javascript">
var lista=$('#tareas'),li,tareas,tarea,id,l8n={};
var colores = ['white','red','blue','yellow','cyan','green'];

var f5lista = function() {
	tareas = JSON.parse(localStorage.tareas);
	var html='';
	for (var i=0;i<tareas.length;i++) {
		html += '<li class="'+tareas[i][0]+' '+tareas[i][1]+'" data-n="'+i+'" ><i><img src="img/hecho.png" /></i><h3>'+tareas[i][2]+'</h3><span>'+tareas[i][3]+'<small><b class="editar">Editar</b> <b class="colorear">Color</b> <b class="borrar">Borrar </b></small></li>';
	}
	lista.html(html);
	li=$('li',lista );
	eventostareas();
};
var tareanueva = function(o) {
	tarea = ['','white'];
	var tit = '';
	if(tit = prompt(l8n.anadir)) {
	while(tit==false) tit = prompt(l8n.anadir);
	tarea[2] = tit;
	var desc = prompt(l8n.desc);
	if(desc) tarea[3] = desc;
		else tarea[3] = '';
	tareas.push(tarea);
	localStorage.tareas = JSON.stringify(tareas);
	f5lista();
	}};
var tareaver = function(e) {
	$(this).parents('li').toggleClass('show');};
var tareaeditar = function(e) {
	tarea = $(this);
	if(tarea.context.tagName=='B') tarea = tarea.parents('li');
	id = tarea.data('n');
	var tit = prompt(l8n.editar,tareas[id][2]);
	if(tit && tit.trim()) {
		tareas[id][2] = tit.trim();
		var desc = prompt(l8n.desc,tareas[id][3]);
		if(desc && desc.trim()) tareas[id][3] = desc.trim();
		else tareas[id][3] = '';
		localStorage.tareas = JSON.stringify(tareas);
		f5lista();
	}
	};
var tareahecho = function(e) {
	tarea  = $(this); id =  tarea.data('n');
	if(tarea.hasClass('hecho')) {tarea.removeClass('hecho');tareas[id][0]='';}
		else  {tarea.addClass('hecho');tareas[id][0]='hecho';}
	localStorage.tareas = JSON.stringify(tareas);
	};
var tareaborrar = function(e) { if(confirm(l8n.borrar)) {
	tarea = $(this);
	if(tarea.context.tagName=='B') tarea = tarea.parents('li');
	tarea.remove();
	tareas.splice(tarea.data('n'), 1);
	localStorage.tareas = JSON.stringify(tareas);
	f5lista();
	}};
var tareacolorear = function() {
	tarea  = $(this);
	var color;
	if(tarea.context.tagName=='B') { tarea = tarea.parents('li'); id = tarea.data('n'); color = tareas[id][1]; var dolist=1;}
	else { color = $(this).context.className; }
	for (var i=0;i<colores.length;i++) if(color==colores[i]) {
		tarea.removeClass(color);
		color= (i<colores.length-1)? colores[i+1] :colores[0];
		break; break;}
	if(dolist) {
		tareas[id][1] = color;
		localStorage.tareas = JSON.stringify(tareas);}
	tarea.addClass(color)
	};
var eventostareas = function() {
	$(li)
	.swipe( {
		swipeLeft:tareaborrar,
		swipeRight:tareahecho
		})
	.on('dblclick',tareaeditar);
	
	$('h3',li).on('click tap',tareaver)
	$('.borrar',li).click(tareaborrar);
	$('.editar',li).click(tareaeditar);
	$('.colorear',li).click(tareacolorear);
};

$('#crear').on('click',tareanueva);
if(!localStorage.tareas) localStorage.tareas = '[["hecho","white","Descargar la Wahpp","Bajarse la aplicación de Wah"],["","white","Empezar un hack","Crear tu propio proyecto"],["","yellow","Publicar el hack en Wah",""]]';
$('#tareaswrapper').swipe({
		swipeLeft:tareacolorear,
		swipeRight:tareacolorear
		})
f5lista();

l8n.anadir = 'Añadir tarea:';
l8n.desc = '¿Quieres poner una descripción a esta tarea?';
l8n.editar = 'Edita esta tarea:';
l8n.borrar = '¿Quieres borrar esta tarea?';
</script>
<style type="text/css">
#pageapp.on {background: #ccc}
#tareaswrapper {clear:both; margin:10px; background:#4586d6;padding:30px 10px 5px;color:#fff; line-height: 20px;box-shadow: inset 0px 5px 10px #174292, 0px -1px 0px #999, 0px 1px 2px #fff; border-radius: 5px}
#tareas li, #tareaswrapper #crear {min-height:30px;clear:both; background:rgba(0,0,0,0.2); border-radius:5px; margin:5px 0; padding: 0 10px 0 5px}
#tareas i {display: block; width: 40px; height:40px; float: left;opacity:0 }
#tareas i img {width: 40px; height:40px;}
#tareas b {cursor: pointer;display: block;float: right;margin: 0;padding: 2px 10px;color:rgba(255,255,255,0.5)}
#tareas b:hover {color:#fff;}
#tareas h3 {padding: 10px 0; font-weight: bold; font-size:18px}
#tareas span {display: block; height:0px; overflow: hidden; line-height: 30px;}
#tareas span small {display:block; text-align: right}
#tareas li.show span {height:auto;}
#tareas li.hecho i {opacity:1}
#tareas li.hecho h3 {text-decoration: line-through}
['white','red','yellow','green','blue','violet'];
#tareas li.white h3 {color:#fff}
#tareas li.red h3 {color:#fdc9bd}
#tareas li.blue h3 {color:#c2bdfd}
#tareas li.yellow h3 {color:#fffbb8}
#tareas li.cyan h3 {color:#b8fff4}
#tareas li.green h3 {color:#b6ff99}
#tareaswrapper li.white {background:rgba(0,0,0,0.2);}
#tareaswrapper.red,#tareaswrapper .red  {background:rgba(150,50,0,0.6);}
#tareaswrapper.blue,#tareaswrapper .blue {background:rgba(0,0,150,0.6);}
#tareaswrapper.yellow,#tareaswrapper .yellow {background:rgba(150,150,0,0.6);}
#tareaswrapper.cyan,#tareaswrapper .cyan {background:rgba(0,100,100,0.6);}
#tareaswrapper.green,#tareaswrapper .green {background:rgba(0,150,0,0.6);}
#tareaswrapper li {display:none}
#tareaswrapper.white li,#tareaswrapper.red .red,#tareaswrapper.blue .blue,#tareaswrapper.yellow .yellow,#tareaswrapper.cyan .cyan,#tareaswrapper.green .green{display:block}
#tareaswrapper #crear {display: block; border:0 none; margin:15px auto 20px; color: #fff}
#tareaswrapper #crear:hover {background:rgba(0,0,0,0.4)}
</style>