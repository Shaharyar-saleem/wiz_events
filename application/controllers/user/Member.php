<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->folder_path = 'user/members/';
    $this->load->model('user/MemberM');
  }

  public function index()
  {
    $data["all_members"] = $this->MemberM->get_all_members();
    $data["member_list"] = $this->load->view('user/shared/list_members' , $data , TRUE);
    
    // commented by shsharyar for memebres page designing
    // $this->load_view->user_view(array($this->folder_path.'members') , $data);
    $this->load_view->user_view(array($this->folder_path.'members'));
  }

  public function search_list_members()
  {
    $data["all_members"] = $this->MemberM->get_all_members();
    $member_list = $this->load->view('user/shared/list_members' , $data , TRUE);
    $status = (!empty($data["all_members"]))?1:0;
    echo json_encode(array(
        'status' => $status,
        'status_message' => ($status ==0)?"No Record Found":"Record Found",
        'data' => array(
            'member_list' => $member_list,
        ),
    ));
  }
  public function user_follow($follow_id)
  {
    $following_id = $this->session->user_login["public_key"];
    if (!$this->utility->is_login() || is_login_user($follow_id)) {
      redirect(base_url());
    }
    $this->user_exist($following_id);
    $info = array(
      'follow_id'=>$follow_id,
      'following_id'=>$following_id,
    );
    if (is_follow($follow_id , $following_id)) {
      $this->Shared_M->delete('user_follow' , $info);
      $message = "Successfully un-follow the user";
    }else {
      $info["date"] = date("Y-m-d H:i:s");
      $this->Shared_M->insert('user_follow' , $info);
      $message = "Successfully follow the user";
    }
    $sess_data = array(
             'status' => ACTIVE,
             'message' => $message,
         );
    $this->session->set_flashdata('user_info', $sess_data);
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function report_user($user_id)
  {
    if (!$this->utility->is_login() || is_login_user($user_id)) {
      echo $this->utility->output_json(0, 'warning', 'Access Denied');
      return false;
    }
    $this->form_validation->set_rules('message', 'Message', 'trim|required');
    if ($this->form_validation->run() == false) {
      echo $this->utility->output_json(0, 'Validation Error', validation_errors());
      return false;
    }else {
      $info = array(
        'report_user_id' => $user_id,
        'user_id' => $this->session->user_login["public_key"],
        'message' => $this->input->post('message'),
        'date'  => date("Y-m-d H:i:s")
      );
      $this->Shared_M->insert('user_report' , $info);
      echo $this->utility->output_json(1, 'Success', 'Your message has been send successfully', true , $_SERVER['HTTP_REFERER']);
      return;
    }
  }
  public function user_exist($user_id)
  {
    $user_info = $this->Shared_M->fetch_all('user' , array() ,array('public_key'=>$user_id),1);
    if (empty($user_info)) {
      redirect(base_url());
    }
    return $user_info;
  }

}
