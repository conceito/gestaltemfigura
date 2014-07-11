$(document).ready(function(){
// limita caracteres ---------------------------------------------------------------
	$("textarea[name=resumo]").charLimit({
		limit: 300, // number
		speed: "normal", // nummber or string
		descending: true // boolean
	});
});
/*
 * CharLimit - jQuery plugin for counting and limiting characters for input and textarea fields
 *
 * $Version: 18.11.2008
 * michal.podhradsky@gmail.com
 */

(function($){
	$.fn.charLimit = function(options){
		var defaults = {
			limit: 30,
			speed: "normal",
			descending: true
		}
		var o = $.extend(defaults,options);
		
		return this.each(function(i) {
			var obj = $(this);
			if(!obj.next().hasClass("countBox"))
				obj.after("<span class='countBox box"+ i +"' style='display:none;'></span>");
			
			function countChars(){
				var value = (o.descending) ? o.limit - obj.val().length : obj.val().length;
				$(".box"+i).text(value);
			}
			countChars();
			
			obj
				.keydown(function(e){
					if(obj.val().length  >= o.limit && e.keyCode != "8" && e.keyCode != "9" && e.keyCode != "46")
						e.preventDefault(); // cancel event
					countChars();
				})
				.keyup(function(e){
					if(obj.val().length >= o.limit){
						obj.val(obj.val().substr(0,o.limit))
					}
					countChars();
				})
				.focus(function(){
					obj.next().fadeIn(o.speed);
					countChars();
				})
				.blur(function(){
				 	obj.next().fadeOut(o.speed);
				});
		});
	}
})(jQuery);