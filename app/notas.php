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
#pageapp.on {background: red}
#notepadwrapper {clear:both; background:rgba(0,0,0,0.5); border-radius:3px; margin:10px;padding:5px}
#notepad {background:#ffc;padding:30px 10px 5px;color:#000;min-height:400px; line-height: 20px}
</style>