<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Controller extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->is_login();
  }

  public function is_login()
  {
    if (empty($this->session->admin_login["public_key"])) {
       redirect('admin/login');
    }
  }

}
