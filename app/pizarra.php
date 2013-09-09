<div id="notepadwrapper"><div contenteditable="true" id="notepad">
Escribe algo aquí.
</div></div>

<script type="text/javascript">
var k,notepad=$('#notepad');
var tecleo = function(event) {
	//k = event.keyCode;
	localStorage.notepad = notepad.html().replace('<div>',"\n");
};
notepad.keyup(tecleo);
if(localStorage.notepad) notepad.html(localStorage.notepad);
</script>
<style type="text/css">
#pageapp.on {background:url(../img/birchdesk.jpg) #ddb586}
#notepadwrapper {clear:both; background:rgba(0,0,0,0.5); border-radius:3px; margin:10px;padding:5px}
#notepad {background:#4f8762;padding:30px 10px 5px;color:#fff;min-height:400px; line-height: 20px;box-shadow: inset 0px 3px 0px #316142}
</style>