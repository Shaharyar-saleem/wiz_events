<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Auth_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->table_name = 'admin_user';
    $this->folder_path = 'admin/user/';
    $this->load->model('admin/UserM');
  }

  public function all_user()
  {
    $data["all_user"] = $this->UserM->get_user_info();
    $this->load_view->admin_view(array($this->folder_path."user_list") , $data);
  }

  public function add_user()
  {
    $data["group_info"] = $this->Shared_M->fetch_all('admin_group' , array() , array('status'=>ACTIVE));
    $this->form_validation->set_rules('name', 'Name', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[admin_user.email]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[32]');
    $this->form_validation->set_rules('co-password', 'confirm Password', 'trim|required|matches[password]');
    $this->form_validation->set_rules('permission_group', 'Group', 'trim|required');
    if ($this->form_validation->run() == false) {
      $this->load_view->admin_view(array($this->folder_path."add_user") , $data);
      return false;
    }else {
      $user_info = array(
        'public_key' => get_unique_no(),
        'groupId' => $this->input->post('permission_group'),
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'password' => password_hash($this->input->post('password') , PASSWORD_BCRYPT),
        'creation_date' => date("Y-m-d H:i:s"),
        'created_by' => 1
      );
      $this->Shared_M->insert($this->table_name, $user_info);
      $sess_data = array(
           'status' => ACTIVE,
           'message' => 'Successfully add the User',
       );
       $this->session->set_flashdata('user_info', $sess_data);
       redirect(base_url('admin/user'));
    }
  }

  public function update_user($user_id)
  {
    // code...
  }

  public function delete_user($user_id)
  {
    // code...
  }

  public function user_exist($user_id)
  {
    $user_info = $this->Shared_M->fetch_all($this->table_name , array() , array('public_key' => $user_id),1);
    return (!empty($user_info))?$user_info:false;
    redirect('admin/user');
  }

}
