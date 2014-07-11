$(document).ready(function () {

	var windowHeight = $(window).height();
	var themeHeight = $('.theme').height();

	if(windowHeight > themeHeight){
		$('.theme').height(windowHeight);
	}

});