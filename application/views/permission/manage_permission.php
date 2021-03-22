<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Manage Permission </h3>

  </div>
  <div class="row">
    <div class="col-12 form-group">
      <select class="form-control" id="permission_group">
        <option selected disabled>Select Group</option>
        <?php foreach ($group_info as $key => $info): ?>
          <option value="<?= $info["public_key"]."_".$info["name"] ?>"><?= $info["name"] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">

      <div class="card">
        <div class="card-body">
          <table class="table table-hover display pb-30">
            <thead>
              <tr>
                <th colspan="2">Module Name</th>
                <th class="text-center" colspan="6">Permission</th>
              </tr>
            </thead>
            <tbody>
              <!--  Dashboard -->
              <tr class="permission_fields">
                <td colspan="2">All Privallage</td>
                <td>
                  <input type="checkbox" name="" value="" class="checkRowAll">
                </td>
                <td>
                  <input type="checkbox" class="checkSub" name="access" value="1_all_privallage">
                  All privilege
                </td>
              </tr>
              <!--  Dashboard -->
              <tr class="permission_fields">
                <td colspan="2">Dashboard</td>
                <td>
                  <input type="checkbox" name="" value="" class="checkRowAll">
                </td>
                <td>
                  <input type="checkbox" class="checkSub" name="read" value="1_read_dashboard">
                  read
                </td>
              </tr>
              <!-- Customer  -->
              <tr class="permission_fields">
                <td colspan="2">Blog</td>
                <td>
                  <input type="checkbox" name="" value="" class="checkRowAll">
                </td>
                <td>
                  <input type="checkbox" class="checkSub" name="read" value="1_read_Blog">
                  read
                </td>
                <td>
                  <input type="checkbox" class="checkSub" name="create" value="2_create_Blog">
                  create
                </td>
                <td>
                  <input type="checkbox" class="checkSub" name="update" value="3_update_Blog">
                  update
                </td>
                <td>
                  <input type="checkbox" class="checkSub" name="delete" value="4_delete_Blog">
                  delete
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr class="text-center">
                <td colspan="7">
                  <button type="button" class="btn btn-success" id="submitBtn">Save</button>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	var API_URL = '<?=base_url();?>';
	$('.checkRowAll').change(function (e) {
		e.preventDefault();
		var rowParent = $(this).parents('tr').find('input[type=checkbox]');
		if ($(this).is(":checked")) {
			rowParent.prop('checked', true);
		} else {
			rowParent.prop('checked', false)
		}
	});
	$('.checkSub').change(function (e) {
		e.preventDefault();
		var checkBoxRow = $(this).parents('tr').find('input[type=checkbox]');
		var allChecked = true;
		$.each(checkBoxRow, function (indexInArray, valueOfElement) {
			if (!$(valueOfElement).hasClass('checkRowAll') && !$(valueOfElement).is(':checked')) {
				allChecked = false;
			}
		});
		if (allChecked) {
			checkBoxRow.eq(0).prop('checked', true);
		} else {
			checkBoxRow.eq(0).prop('checked', false);
		}
	});
	$('#submitBtn').click(function (e) {
		e.preventDefault();
		var groups = $('#permission_group').val().split('_');
		var groupId = groups[0];
		var groupName = groups[1];
		var json = [];
		json.push({
			'group_name': groupName,
		})
		$.each($('.permission_fields'), function (indexInArray, valueOfElement) {
			module_name = $(this).children('td:first').text();
			checkBoxList = $(this).find('input[type=checkbox]:not(.checkRowAll)');
			permission = [];
			$.each(checkBoxList, function (indexInArray, valueOfElement) {
				if ($(this).is(':checked')) {
					permission.push({
						'name': $(this).attr('name'),
						'value': 1
					})
				}
			});
			json.push({
				'module_name': module_name,
				'permissions': permission
			})
		});

		console.log(json);
		// Request Ajax and store PErmission
		$.ajax({
			type: "post",
			url: API_URL + "admin/add/permission",
			data: { 'permissions': json, 'groupId': groupId },
			dataType: "json",
			success: function (response) {
				console.log(response);
				$("#msgInfo").text(response["status_message"]);
				if (response["status"] == 1) {
          var delay = 1000;
  				setTimeout(function () { window.location = API_URL + "admin/manage/permission"; }, delay);
        }
			},
			error: function (error) {
				console.log("Error", error);
			}
		});

	});
	// })
	$("#permission_group").change(function () {
    $('input:checkbox').removeAttr('checked')
    $('input:checkbox').attr('checked',false);
    var groups = $('#permission_group').val().split('_');
		var groupId = groups[0];
		var groupName = groups[1];
		$.ajax({
			type: "post",
			url: API_URL + "admin/get-permission/"+groupId,
			dataType: "json",
			success: function (response) {
				if (response['data']) {
					var permissionObject = JSON.parse(response['data']['permissionKey']);
					$.each(permissionObject, function (index, element) {
						var targetObj = $('.permission_fields td:contains(' + element['module_name'] + ')').parent('tr');
						if (typeof element['permissions'] !== 'undefined') {
							$.each(element['permissions'], function (i, e) {
								targetObj.find('input[type=checkbox][name=' + e['name'] + ']').prop('checked', 'true');
								if (i == 3) {
									targetObj.find('input[type=checkbox].checkRowAll').prop('checked', 'true');
								}
							})
						}
					})
				} else {
					var check_boxes = $('.table_data input:checkbox');
					$.each(check_boxes, function (index, el) {
						$(this).removeAttr('checked');
					});
				}
			},
			error: function (error) {
				console.log("Error", error);
			}
		});

	});
</script>
