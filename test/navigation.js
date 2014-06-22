$(document).ready(function() {

	$("#menu h2, #menu h3").click(function () {
		menu = $(this).parent('li').children('ul');
		menu.slideToggle('slow');
		return false;
	});

	
});