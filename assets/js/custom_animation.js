(function ($) {  
	$(document).on("mouseover", "td>a", function(){
		$(this).addClass("animated jello");
	});
	$(document).on("mouseleave", "td>a", function(){
		$(this).removeClass("animated jello");
	});
})(jQuery);
