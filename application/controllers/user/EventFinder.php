<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventFinder extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->folder_path = 'user/event/';
    $this->load->model('user/EventM');
  }

  public function event_finder()
  {
    $data["event_info"] = $this->EventM->get_all_event();
    $this->load_view->user_view(array($this->folder_path.'event_finder') , $data);
  }

}
