$(document).ready(function () {
	
	$('#tel').mask('(99)9999-9999');

	/**
	 * fecha form de inscrição
	 */
	$('.ct', '#subscribe-form:not(.is-open)').hide();

	$('.hd', '#subscribe-form').on('click', function (e) {
		e.preventDefault();
		$('.ct', '#subscribe-form').slideToggle();
	});

});