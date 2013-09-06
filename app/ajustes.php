<button class="appclose">×</button>

<div class="clear"></div>
Home: 
<div id="optionshome"><button id="desk">Escritorio</button></div>

<script type="text/javascript">
var optionshome = function(app) {
	if(this.id != 'desk') localStorage.home = this.id.substring(1);
	else if(localStorage.home) localStorage.removeItem('home');  
}
var hey = apps[2][0];
$(document).ready(function() {
	console.log(apps.length);
	for(var i=0;i<apps.length;i++) 
		$('#optionshome',$app).append('<button id="b'+apps[i][0]+'">'+apps[i][1]+'</button>');
	$('#optionshome button').click(optionshome);
});
</script>