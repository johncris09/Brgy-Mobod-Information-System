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
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
					$('#add_purok_form')[0].reset();
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				} 
			},
			error: function (xhr, status, error) { 
				notify('A Database Error Occurred', 'Duplicate entry', 'fa fa-info', 'blue', 'btn-info');
			},
		}); 
	});

	 
	$('#update_purok_form').on('submit', function (event) {
		event.preventDefault();
		var purok_id = $('#purok_id').val(); 
		$.ajax({
			url     : "../update_purok/" + purok_id,
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {  
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
			error: function (xhr, status, error) { 
				notify('A Database Error Occurred', 'Duplicate entry', 'fa fa-info', 'blue', 'btn-info');  
			},
		});
	});

	 
	$(document).on('click', 'a.delete_purok', function () {
		var purok_id = $(this).attr('id'); 
	});


	function notify(title, content, icon, type, btnClass = 'btn-warning', okAction = "") {
		$.confirm({
			title            : title,
			content          : content,
			columnClass      : 'col-md-4 col-md-offset-8 col-xs-4 col-xs-offset-8',
			containerFluid   : true,                                                  // this will add 'container-fluid' instead of 'container'
			icon             : icon,
			theme            : 'modern',
			closeIcon        : true,
			animation        : 'top',
			closeAnimation   : 'bottom',
			typeAnimated     : true,
			backgroundDismiss: true,
			type             : type,
			buttons          : {
				Ok: {
					text    : 'Ok',
					btnClass: btnClass,
					keys    : ['enter'],
					action  : function () {
						if (okAction != "") {
							window.location.href = okAction;
						}
					}
				},
				close: function () {}
			}
		});
	}
  
})(jQuery);
