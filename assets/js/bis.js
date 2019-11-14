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
				if(data.response)
				{
					location.reload();
					$('.error').addClass('text-hide');
				}else{
					$('.error').removeClass('text-hide');
				}
			},
			error: function(xhr,status,error){ 
				console.info(xhr.responseText);
			}
		});
	});
	

})(jQuery);
