<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends Auth_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->folder_path = "permission/";
  }

  public function manage_permission()
  {
    $data["group_info"] = $this->Shared_M->fetch_all('admin_group' , array() ,array('status'=>ACTIVE));
    $this->load_view->admin_view(array($this->folder_path."manage_permission") , $data);
  }

  public function get_permission($group_id)
  {
    $response = $this->Shared_M->fetch_all('admin_group_permission' , array() , array('groupId' => $group_id),1);
    echo json_encode(array(
        'status' => 1,
        'status_message' => 'Get',
        'data' => $response,
    ));
      return;
  }

  public function add_permission()
  {
    $this->form_validation->set_rules('groupId', 'Group Name', 'trim|required');
    $this->form_validation->set_rules('permissions[]', 'Permission', 'trim|required');
    if ($this->form_validation->run() == false) {
      echo $this->utility->output_json(0, 'Validation Error', validation_errors());
      return false;
    }else {
      $prmission = $this->Shared_M->fetch_all('admin_group_permission' , array() , array('groupId'=>$this->input->post('groupId')),1);
      $group_info = array(
        'groupId' => $this->input->post('groupId'),
        'permissionKey' => json_encode($this->input->post('permissions')),
        'creation_date' => date("Y-m-d H:i:s"),
        'created_by' => 1
      );
      if (empty($prmission)) {
        $this->Shared_M->insert('admin_group_permission', $group_info);
      } else {
        $where = array('groupId'=>$this->input->post('groupId'));
        $this->Shared_M->update('admin_group_permission', $group_info , $where);
      }
      echo $this->utility->output_json(ACTIVE, 'Info', 'Successfully add the permission', true , base_url('admin/manage/permission'));
      return;
    }
  }

}
