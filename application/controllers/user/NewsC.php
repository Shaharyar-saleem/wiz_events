<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsC extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->folder_path = 'user/news/';
    $this->load->model(array('user/NewsM'));
  }

  public function index($post_type="")
  {
    if ($post_type == "news-blog") {
      $post_type = NEW_BLOG;
    }elseif ($post_type == "wiz-event") {
      $post_type = WIZ_EVENT;
    }
    $data["post_type"] = $post_type;
    $data["blog_info"] = $this->NewsM->get_post($post_type);
    $data["news_list"] = $this->load->view($this->folder_path.'news_list' , $data , TRUE);
    $this->load_view->user_view(array($this->folder_path.'index') , $data);
  }

  public function blog_like()
  {
    $this->is_login();
    $blog_id = $this->input->post('blog_id');
    $user_id = $this->session->user_login["public_key"];
    $response = $this->NewsM->is_liked($blog_id , $user_id);
    if ($response) {
      if (empty($response["blog_id"])) {
        $info = array(
          'blog_id' => $blog_id,
          'user_id' => $user_id,
          'blog_like' => LIKE,
          'like_date' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('blog_comment', $info);
      }else {
        $like = ($response["blog_like"] == LIKE)?0:LIKE;
        $info = array(
          'blog_like' => $like,
          'like_date' => date('Y-m-d H:i:s'),
        );
        $where = array(
          'blog_id' => $blog_id,
          'user_id' => $user_id,
        );
        $this->db->update('blog_comment', $info , $where);
      }
    }
    echo "Success";
    return;
  }

  public function is_login()
  {
    if (!$this->utility->is_login()) {
      echo json_encode(
        array(
          'status' =>'false',
          'message' => 'Authentication Error'
        )
      );
      return;
    }
  }
 


 // function for view the news page written by shaharyar
  public function view_news(){
       $this->load_view->user_view(array($this->folder_path.'view_news'));
  }
}
