<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends Auth_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->folder_path = 'admin/blog/';
    $this->table_name = "admin_blog";
    $this->load->model('admin/BlogM');
  }

  public function index()
  {
    $data["blog_info"] = $this->BlogM->get_blog_list();
    $this->load_view->admin_view(array($this->folder_path."blog_list") , $data);
  }

  public function add_blog()
  {
    $this->form_validation->set_rules('post_type', 'Post Type', 'trim|required');
    $this->form_validation->set_rules('post_title', 'Post Title', 'trim|required');
    $this->form_validation->set_rules('post_date', 'Post Date', 'trim|required');
    $this->form_validation->set_rules('description', 'Description', 'trim|required');
    if (empty($_FILES['post_file']["name"][0])) {
      $this->form_validation->set_rules('post_file[]', 'Post Media', 'trim|required');
    }
    if ($this->form_validation->run() == FALSE)
    {
      $this->load_view->admin_view(array($this->folder_path."add_blog") , array());
    }else {
      $this->load->library('UploadFile');
      $response = $this->uploadfile->uploadMultiFiles('post_file', UPLOAD_DIRECTORY, EXTENSION_TYPE, IMAGE_SIZE);
      $response = json_decode($response);
      if ($response->status == 0) {
        // print_r($_FILES);
        // exit;
        $sess_data = array(
             'status' => DE_ACTIVE,
             'message' => $response->error,
         );
         $this->session->set_flashdata('user_info', $sess_data);
         $this->load_view->admin_view(array($this->folder_path."add_blog") , array());
         return;
      }

      $blog_id = get_unique_no(15);
      $blog_info = array(
        'public_key' => $blog_id,
        'post_type' => $this->input->post('post_type'),
        'title' => $this->input->post('post_title'),
        'date' => $this->input->post('post_date'),
        'description' => trim($this->input->post('description')),
        'status' => (!empty($this->input->post('save-as-draft')))?DRAFT:ACTIVE,
        'creation_date' => date("Y-m-d H:i:s"),
        'created_by' => $this->session->admin_login["public_key"],
      );
      for ($i=0; $i <count($response->file_path) ; $i++) {
        $file_info[] = array(
            'file_path' => $response->file_path[$i],
            'type' => $response->file_type[$i],
            'name' => $response->file_name[$i],
            'blog_id' => $blog_id,
            'creation_date' => date("Y-m-d H:i:s"),
        );
      }
      $this->Shared_M->insert('admin_blog' , $blog_info);
      $this->Shared_M->insert_batch('admin_blog_media' , $file_info);
      $sess_data = array(
           'status' => ACTIVE,
           'message' => 'Successfully add the blog',
       );
       $this->session->set_flashdata('user_info', $sess_data);
       redirect(base_url('admin/blog'));
    }

  }

  public function update_blog($blog_id)
  {
    $this->is_valid_user($blog_id);
    $data["blog_info"] = $this->BlogM->get_blog_list($blog_id);
    $this->form_validation->set_rules('post_type', 'Post Type', 'trim|required');
    $this->form_validation->set_rules('post_title', 'Post Title', 'trim|required');
    $this->form_validation->set_rules('post_date', 'Post Date', 'trim|required');
    $this->form_validation->set_rules('description', 'Description', 'trim|required');

    if ($this->form_validation->run() == FALSE)
    {
      $this->load_view->admin_view(array($this->folder_path."update_blog") , $data);
    }else {
      $blog_info = array(
        'post_type' => $this->input->post('post_type'),
        'title' => $this->input->post('post_title'),
        'date' => $this->input->post('post_date'),
        'description' => trim($this->input->post('description')),
        'status' => (!empty($this->input->post('is_draft')))?DRAFT:ACTIVE,
        'updation_date' => date("Y-m-d H:i:s"),
        'updated_by' => $this->session->admin_login["public_key"],
      );
      $this->Shared_M->update('admin_blog' , $blog_info , array('public_key'=>$blog_id));
      $sess_data = array(
           'status' => ACTIVE,
           'message' => 'Successfully update the blog',
       );
       $this->session->set_flashdata('user_info', $sess_data);
       redirect(base_url('admin/blog'));
    }
  }

  public function is_valid_user($blog_id)
  {
    $user_id = $this->session->admin_login["public_key"];
    $where = array('public_key' => $blog_id , 'created_by'=>$user_id ,'is_deleted'=>ACTIVE);
    $info = $this->Shared_M->fetch_all('admin_blog' , array('public_key') , $where,1);
    if (!empty($info)) {
      return $info;
    }
    redirect('admin/blog');
  }

  public function archive_blog($blog_id)
  {
    $this->is_valid_user($blog_id);
    $blog_info = array(
      'is_deleted' => 0,
      'updation_date' => date("Y-m-d H:i:s"),
      'updated_by' => $this->session->admin_login["public_key"],
    );
    $this->Shared_M->update('admin_blog' , $blog_info , array('public_key'=>$blog_id));
    $sess_data = array(
         'status' => ACTIVE,
         'message' => 'Successfully archive the blog',
     );
     $this->session->set_flashdata('user_info', $sess_data);
     redirect(base_url('admin/blog'));
  }

}
