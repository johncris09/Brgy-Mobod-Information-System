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

	
	function load_purok() {
		$.ajax({
			url     : "purok/load_purok",
			method  : "POST",
			dataType: "json",
			success : function (data) { 
				$('#purok_list').html(data);
				$('#purok_data').dataTable({
					"scrollY": 200,
					"scrollX": true,
				});
			},
			error: function (xhr, status, error) { 
				// console.info(xhr.responseText);
			},
		});
	}

	load_purok();

	
	$('#add_purok_form').on('submit', function (event) {
		event.preventDefault(); 
		$.ajax({
			url     : "insert_purok",
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				console.info(data)
			},
			error: function (xhr, status, error) { 
				// console.info(xhr.responseText); 
			},
		});
	});
  
})(jQuery);
