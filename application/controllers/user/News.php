<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->folder_path = 'user/news/';
  }

  public function index()
  {
    $this->load_view->user_view(array($this->folder_path.'index') , array());
  }

}
