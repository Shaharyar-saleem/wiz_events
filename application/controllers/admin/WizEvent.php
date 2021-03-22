<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WizEvent extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->folder_path = 'admin/report/wizevent/';
    $this->load->model('admin/WizEventM');
  }

  public function all_wiz_event()
  {
    $data["all_event"] = $this->WizEventM->get_all_event();
    $this->load_view->admin_view(array($this->folder_path."all_event") , $data);
  }

}
