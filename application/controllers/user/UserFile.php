<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserFile extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function file_upload_request()
  {
    if (!empty($_FILES)) {
        $user_id = $this->session->user_login["public_key"];
        $this->load->library('UploadFile');
        $response = $this->uploadfile->uploadsingleimage('file', UPLOAD_DIRECTORY, FILE_EXTENSION_TYPE, IMAGE_SIZE);
        $response = json_decode($response);
        if ($response->status == 0) {
            echo $this->utility->output_json(0, 'Error', $response->error);
            return false;
        }
        $file_info = array(
            'file_path' => $response->file_path,
            'type' => $response->file_type,
            'name' => $response->file_name,
            'user_id' => $this->session->user_login["public_key"],
            'creation_date ' => date('Y-m-d h:i:sa'),
        );
        $this->Shared_M->insert('user_files', $file_info);
        echo $this->utility->output_json(1, 'Successfully file upload', array('file_path' => $response->file_path, 'file_name' => $response->file_name));

    }
  }

  public function file_remove()
  {
      $this->form_validation->set_rules('file_path', 'File', 'trim|required');
      if ($this->form_validation->run() == false) {
          echo $this->utility->output_json(0, 'Error', validation_errors());
      } else {
          $file_path = $this->input->post('file_path');
          unlink($file_path);
          $this->Shared_M->delete('user_files', array('file_path' => $file_path));
          echo $this->utility->output_json(1, 'Delete the file');

      }
  }


}
