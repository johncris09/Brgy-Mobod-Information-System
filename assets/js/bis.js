(function ($) {

	// Login 
	$('#login-form').on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			url     : "login/login",
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				console.info(data)
				if (data.response) {
					location.reload();
					$('.error').addClass('text-hide');
				} else {
					$('.error').removeClass('text-hide');
				}
			},
			error: function (xhr, status, error) {
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
		confirm_delete('purok/delete_purok/', purok_id);
	});



	function load_position() {
		$.ajax({
			url     : "position/load_position",
			method  : "POST",
			dataType: "json",
			success : function (data) {
				$('#position_list').html(data);
				$('#position_data').dataTable({
					"scrollY": 200,
					"scrollX": true,
				});
			},
			error: function (xhr, status, error) {
				// console.info(xhr.responseText);
			},
		});
	}

	load_position();

	$('#add_position_form').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url     : "insert_position",
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
					$('#add_position_form')[0].reset();
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
			error: function (xhr, status, error) {
				notify('A Database Error Occurred', 'Duplicate entry', 'fa fa-info', 'blue', 'btn-info');
			},
		});
	});


	$('#update_position_form').on('submit', function (event) {
		event.preventDefault();
		var position_id = $('#position_id').val();
		$.ajax({
			url     : "../update_position/" + position_id,
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

	$(document).on('click', 'a.delete_position', function () {
		var position_id = $(this).attr('id');
		confirm_delete('position/delete_position/', position_id);
	});


	function load_user_type() {
		$.ajax({
			url     : "user_type/load_user_type",
			method  : "POST",
			dataType: "json",
			success : function (data) {
				$('#user_type_list').html(data);
				$('#user_type_data').dataTable({
					"scrollY": 200,
					"scrollX": true,
				});
			},
			error: function (xhr, status, error) {
				// console.info(xhr.responseText);
			},
		});
	}

	load_user_type();

	$('#add_user_type_form').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url     : "insert_user_type",
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
					$('#add_user_type_form')[0].reset();
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
			error: function (xhr, status, error) {
				notify('A Database Error Occurred', 'Duplicate entry', 'fa fa-info', 'blue', 'btn-info');
			},
		});
	});

	$('#update_user_type_form').on('submit', function (event) {
		event.preventDefault();
		var user_type_id = $('#user_type_id').val();
		$.ajax({
			url     : "../update_user_type/" + user_type_id,
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				// console.info(data)
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

	$(document).on('click', 'a.delete_user_type', function () {
		var user_type_id = $(this).attr('id');
		confirm_delete('user_type/delete_user_type/', user_type_id);
	});

	function load_user() {
		$.ajax({
			url     : "user/load_user",
			method  : "POST",
			dataType: "json",
			success : function (data) {
				// console.info(data)
				$('#user_list').html(data);
				$('#user_data').dataTable({
					"scrollY": 200,
					"scrollX": true,
				});
			},
			error: function (xhr, status, error) {
				// console.info(xhr.responseText);
			},
		});
	}

	load_user();

	

	
	$('#add_user_form').on('submit', function (event) {
		event.preventDefault(); 
		$.ajax({
			url     : "insert_user",
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) { 
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
					$('#add_user_form')[0].reset();
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
			error: function (xhr, status, error) {
				console.info(xhr.responseText);
				// notify('A Database Error Occurred', 'Duplicate entry', 'fa fa-info', 'blue', 'btn-info');
			},
		});
	});

	$('#update_user_form').on('submit', function (event) {
		event.preventDefault();
		var user_id = $('#user_id').val(); 
		$.ajax({
			url     : "../update_user/" + user_id,
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				// console.info(data)
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

	
	$(document).on('click', 'a.delete_user', function () {
		var user_id = $(this).attr('id');
		confirm_delete('user/delete_user/', user_id);
	});

	

	function load_household() {
		$.ajax({
			url     : "household/load_household",
			method  : "POST",
			dataType: "json",
			success : function (data) {
				$('#household_list').html(data);
				$('#household_data').dataTable({
					"scrollY": 200,
					"scrollX": true,
				});
			},
			error: function (xhr, status, error) {
				// console.info(xhr.responseText);
			},
		});
	}

	load_household();

	

	$('#update_household_form').on('submit', function (event) {
		event.preventDefault();
		var household_id = $('#household_id').val();  
		$.ajax({
			url     : "../update_household/" + household_id,
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
 

	$('#add_household_form').on('submit', function (event) {
		event.preventDefault();  
		$.ajax({
			url     : "insert_household",
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) { 
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
					$('#add_household_form')[0].reset();
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
			error: function (xhr, status, error) {
				// console.info(xhr.responseText);
				notify('A Database Error Occurred', 'Duplicate entry', 'fa fa-info', 'blue', 'btn-info');
			},
		});
	});

	
	
	$(document).on('click', 'a.delete_household', function () {
		var household_id = $(this).attr('id');
		confirm_delete('household/delete_household/', household_id);
	});

	
	function load_resident() {
		$.ajax({
			url     : "resident/load_resident",
			method  : "POST",
			dataType: "json",
			success : function (data) {
				// console.info(data)
				$('#resident_list').html(data);
				$('#resident_data').dataTable({
					"scrollY": 200,
					"scrollX": true,
				});
			},
			error: function (xhr, status, error) {
				// console.info(xhr.responseText);
			},
		});
	}

	load_resident(); 

	$('#add_resident_form').on('submit', function (event) {
		event.preventDefault();  
		console.info($(this).serialize())
		$.ajax({
			url     : "insert_resident",
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) { 
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
					$('#add_resident_form')[0].reset();
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
			error: function (xhr, status, error) {
				// console.info(xhr.responseText);
				notify('A Database Error Occurred', 'Duplicate entry', 'fa fa-info', 'blue', 'btn-info');
			},
		});
	});



	function confirm_delete(url, id) {
		$.confirm({
			title            : 'Delete',
			content          : 'Are you sure you want to delete this data?',
			columnClass      : 'col-md-4 col-md-offset-8 col-xs-4 col-xs-offset-8',
			containerFluid   : true,                                                  // this will add 'container-fluid' instead of 'container'
			icon             : 'fa fa-question',
			theme            : 'modern',
			closeIcon        : true,
			animation        : 'top',
			closeAnimation   : 'bottom',
			typeAnimated     : true,
			backgroundDismiss: true,
			type             : 'red',
			buttons          : {
				ok: {
					text    : 'Ok',
					btnClass: "blue-gradient btn-rounded z-depth-1a",
					keys    : ['enter'],
					action  : function () {
						$.ajax({
							url     : url + id,
							method  : "POST",
							data    : $(this).serialize(),
							dataType: "json",
							success : function (data) {
								if (data.response) {
									notify(data.title, data.content, data.icon, data.type, data.btnClass);
								} else {
									notify(data.title, data.content, data.icon, data.type, data.btnClass);
								}
								load_purok();
								load_position();
								load_user_type();
								load_user();
								load_household();
							},
							error: function (xhr, status, error) {
								// console.info(xhr.responseText);
								notify('A Database Error Occurred', 'Cannot delete or update. This data is used in the other operation', 'fa fa-info', 'blue', 'btn-info');
							},
						});
					}
				},
				close: function () {}
			}
		});
	}


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

	$('.inputFile').on('change', function () {
		showPreview($(this)[0]);
	});

	function showPreview(objFileInput) {
		if (objFileInput.files[0]) {
			var fileReader = new FileReader();
			fileReader.onload = function (e) {
				$(".img.icon-choose-image").css('opacity', '0.1');
				$("#targetLayer").html('<img src="' + e.target.result + '" width="200px"   class="image upload-preview" />');
				$("#targetLayer").css('opacity', '0.7');
			}
			fileReader.readAsDataURL(objFileInput.files[0]);
		}
	}

})(jQuery);
