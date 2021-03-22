/*Dropzone Init*/
Dropzone.autoDiscover = false;
if (typeof project_type !== undefined) {
const dropzone = $("#dropzone").dropzone({
	url: API_URL + "file/upload",
	addRemoveLinks: true,
	timeout :86400000,
	maxFilesize:2048,
	acceptedFiles: 'image/*,.mp4,.webm,.ogg',
	init: function() {
		this.on("sending", function(file, xhr, formData) {
			// formData.append("content_id", $("#content_id").val());
		});
		this.on("success", function(file, response) {
			var response = JSON.parse(response);
			show_message(response["status"], response["status_message"]);
			file_path = response["data"]["error_msg"]["file_path"];
			console.log($("#user_file tr").length);
			if (response["status"] == 1) {
				$("#user_file").append(
					`
            <tr>
              <td>${$("#user_file tr").length + 1}</td>
              <td>${response["data"]["error_msg"]["file_name"]}</td>
              <td> <a href="${API_URL +
								response["data"]["error_msg"]["file_path"]}" target="_blank">${
						response["data"]["error_msg"]["file_name"]
					}</a> </td>
              <td></td>
            </tr>
            `
				);
			}
		});
		this.on("removedfile", function(file, response) {
			$.ajax({
				url: API_URL + "file/remove",
				method: "POST",
				data: { file_path: file_path }
			}).done(function() {
				$(`#user_file a[href='${API_URL + file_path}']`)
					.parents("tr")
					.remove();
				$(this).addClass("done");
			});
		});
	}
});
}


function show_message(status , message) {
  $.toast({
      heading: (status == 1)?'Success':'Warning',
      text: message,
      position: 'top-right',
      loaderBg: (status == 1)?'#f33923':'#f33923',
      icon: (status == 1)?'success':'error',
      hideAfter: 3500,
      stack: 6
  });
}


