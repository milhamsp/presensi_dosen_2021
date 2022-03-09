$(document).ready(function(){
	$("#title").autocomplete({
		source: /*[
		"Apple",
		"Mango"
		]*/"main/get_dosen1"
    });
});