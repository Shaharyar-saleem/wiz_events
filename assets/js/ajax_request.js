$("body").on('submit', '.submit_form', function(e) {
	e.preventDefault();
	var submit_button = $(this).find('button[type=submit]');
	submit_button.attr('disabled', 'disabled');

	var modal_parent = $(this).parents('.modal');

	var is_modal = modal_parent.length > 0;

	var this_form = $(this);
	var formData = new FormData(this);
	$.ajax({
		type: "post",
		url: this_form.attr('action'),
		data: formData,
		processData: false,
		contentType: false,
		cache: false,
		dataType: "json",
		success: function(response) {
			if (response['status'] == 1) {
				if (is_modal) {
					modal_parent.modal('hide')
				}
				$.toast().reset('all');
				$.toast({
					heading: response["status_message"],
					text: response["data"]['error_msg'],
					position: 'top-right',
					loaderBg: '#f33923',
					icon: 'success',
					hideAfter: 3500,
					stack: 6
				});
				if (response.is_redirect == 1) {
					window.location.href = response.redirect_path;
					return true;
				}
				return true;
			}
			$.toast().reset('all');
			$.toast({
				heading: response["status_message"],
				text: response["data"]['error_msg'],
				position: 'top-right',
				loaderBg: '#f33923',
				icon: 'error',
				hideAfter: 4500,
				stack: 6
			});
		},
		error: function(error) {
			$.toast({
				heading: 'Error',
				text: 'Error Occur',
				position: 'top-right',
				loaderBg: '#f33923',
				icon: 'error',
				hideAfter: 3500,
				stack: 6
			});
		},
		complete: function() {
			submit_button.removeAttr('disabled');
		}
	});
});

$(".del-file").click(function(event) {
  var data_path = $(this).attr('data-path');
  console.log(data_path);
  var that  = $(this);
  $.ajax({
      type: "post",
      url: API_URL+'file/remove',
      data: {file_path:data_path},
      success: function (response) {
        $(that).parents('tr').remove()
      },
      error: function (error) {

      },

  });
});
