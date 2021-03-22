<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('user/NewsM');
  }

  public function index()
  {
    $data["blog_info"] = $this->NewsM->get_post();
    $data["news_list"] = $this->load->view('user/news/news_list' , $data , TRUE);
    $this->load_view->user_view(array('user/home') , $data);
  }

  public function dd()
  {
    print_r($_FILES);
  }

}
