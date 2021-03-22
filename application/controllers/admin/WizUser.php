<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WizUser extends Auth_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->folder_path = 'admin/report/wizuser/';
    $this->load->model('admin/WizUserM');
  }

  public function all_wiz_user()
  {
    $data["all_user"] = $this->WizUserM->get_user_info();
    $this->load_view->admin_view(array($this->folder_path."all_user") , $data);
  }

}
