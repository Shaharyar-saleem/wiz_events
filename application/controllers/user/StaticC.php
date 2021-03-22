<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaticC extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->folder_path = 'static/';
  }

  public function contact()
  {
    $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[50]');
    $this->form_validation->set_rules('last_name', 'Last Name', 'trim|max_length[50]');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[110]');
    $this->form_validation->set_rules('phone', 'Contact No', 'trim|max_length[20]');
    $this->form_validation->set_rules('message', 'Contact No', 'trim|required|max_length[350]');
    if ($this->form_validation->run() == false) {
    $this->load_view->user_view(array($this->folder_path.'contact') , array());
  }else {
      $info = array(
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
        'email' => $this->input->post('email'),
        'phone_no' => $this->input->post('phone'),
        'message' => $this->input->post('message'),
        'creation_date' => date("Y-m-d H:i:s"),
      );
      $this->Shared_M->insert('contact' , $info);
      $sess_data = array(
               'status' => ACTIVE,
               'message' => 'Successfully Send the message',
           );
     $this->session->set_flashdata('user_info', $sess_data);
     redirect(base_url());
  }
  }

  public function careers()
  {
    $this->load_view->user_view(array($this->folder_path.'careers') , array());
  }

  public function news()
  {
    $this->load_view->user_view(array($this->folder_path.'news') , array());
  }

  public function about()
  {
    $this->load_view->user_view(array($this->folder_path.'about') , array());
  }

}
