<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends Auth_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->table_name = 'admin_group';
    $this->folder_path = 'permission/group/';
  }

  public function all_group()
  {
    $data["group_info"] = $this->Shared_M->fetch_all($this->table_name , array() ,array('status'=>ACTIVE));
    $this->load_view->admin_view(array($this->folder_path."index") , $data);
  }

  public function add_group()
  {
    $this->form_validation->set_rules('group_name', 'Group Name', 'trim|required|is_unique[admin_group.name]');
    $this->form_validation->set_rules('group_description', 'Group Description', 'trim|max_length[150]');
    if ($this->form_validation->run() == false) {
      echo $this->utility->output_json(0, 'Validation Error', validation_errors());
      return false;
    }else {
      $group_info = array(
        'public_key' => get_unique_no(),
        'name' => $this->input->post('group_name'),
        'description' => $this->input->post('group_description'),
        'group_type' => (!empty($this->input->post('all_page_access')))?FULL_ACCESS:2,
        'creation_date' => date("Y-m-d H:i:s"),
        'created_by' => 1
      );
      $this->Shared_M->insert($this->table_name, $group_info);
      echo $this->utility->output_json(ACTIVE, 'Info', 'Successfully add the group', true , base_url('admin/group'));
      return;
    }
  }

  public function update_group($group_id)
  {
    $this->group_exist($group_id);
    $this->form_validation->set_rules('group_name', 'Group Name', 'trim|required');
    $this->form_validation->set_rules('group_description', 'Group Description', 'trim|max_length[150]');
    if ($this->form_validation->run() == false) {
      echo $this->utility->output_json(0, 'Validation Error', validation_errors());
      return false;
    }else {
      $group_info = array(
        'name' => $this->input->post('group_name'),
        'description' => $this->input->post('group_description'),
        'group_type' => (!empty($this->input->post('all_page_access')))?FULL_ACCESS:2,
        'updation_date' => date("Y-m-d H:i:s"),
        'updated_by' => 1
      );
      $where = array('public_key' => $group_id);
      $this->Shared_M->update($this->table_name, $group_info , $where);
      echo $this->utility->output_json(ACTIVE, 'Info', 'Successfully update the group', true , base_url('admin/group'));
      return;
    }
  }

  public function delete_group($group_id)
  {
    // code...
  }

  public function group_exist($group_id)
  {
    $group_info = $this->Shared_M->fetch_all($this->table_name , array() , array('public_key' => $group_id),1);
    return (!empty($group_info))?$group_info:false;
    redirect('admin/group');
  }
}
