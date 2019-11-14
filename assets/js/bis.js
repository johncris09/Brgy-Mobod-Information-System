(function ($) {  

	// Login 
	$('#login-form').on('submit', function(e){
		e.preventDefault();    
		$.ajax({
			url: "login/login",
			method: "POST",
			data: $(this).serialize(),
			dataType: "json",  
			success: function(data){    
				console.info(data) 
			},
			error: function(xhr,status,error){ 
				console.info(xhr.responseText);
			}
		});
	});
	

})(jQuery);
