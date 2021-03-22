<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthC extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->folder_path = "admin/auth/";
    $this->table_name = "admin_user";
    $this->load->model('admin/UserM');
  }

  public function login()
  {
    redirect(base_url('admin/dashboard'));
    if (!empty($this->session->admin_login["public_key"])) {
      redirect(base_url('admin/dashboard'));
    }
    $this->load->view($this->folder_path.'login');
  }

  public function login_request()
  {
    if (!empty($this->session->admin_login["public_key"])) {
      redirect(base_url('admin/dashboard'));
    }
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[100]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[32]');
    if ($this->form_validation->run() == false) {
      echo $this->utility->output_json(0, 'Validation Error', validation_errors());
      return false;
    }else {
      $response = $this->Shared_M->fetch_all($this->table_name, array(), array('email' => $this->input->post('email')), 1);
      if (!empty($response) && password_verify($this->input->post('password'), $response['password'])) {
          $user_info = $this->UserM->get_user_info($response["public_key"]);
          $this->session->set_userdata('admin_login', $user_info);
          echo $this->utility->output_json(ACTIVE, 'Info', 'Successfully Login', true , base_url('admin/dashboard'));
          return;
      }
      echo $this->utility->output_json(0, 'Login Error', 'Email/password incorrcet');
      return;
    }
  }

  public function logout()
  {

    $this->session->unset_userdata('admin_login');
    redirect(base_url('admin/login'));
  }

  public function forget()
  {
    if (!empty($this->session->admin_login["public_key"])) {
      redirect(base_url('admin/dashboard'));
    }
    $this->load->view($this->folder_path.'forget');
  }
  public function forget_request()
  {
    if (!empty($this->session->admin_login["public_key"])) {
      redirect(base_url('admin/dashboard'));
    }
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[100]');
    if ($this->form_validation->run() == false) {
      echo $this->utility->output_json(0, 'Validation Error', validation_errors());
      return false;
    } else {
        $response = $this->Shared_M->fetch_all($this->table_name, array(), array('email' => $this->input->post('email')), 1);
        if (!empty($response)) {
            $this->load->library('Notification');
            $forgetCode = get_unique_no();
            $forgetLink = base_url('admin/reset/') . $forgetCode;
            $now = new DateTime();
            $info = array(
                "forget_code" => $forgetCode,
                "forget_status" => 0,
                "forget_date" => date("Y-m-d H:i:s"),
            );
            $where = array(
                "public_key" => $response["public_key"],
            );
            $this->Shared_M->update($this->table_name, $info, $where);
            $this->notification->forget_email($forgetLink, $response['email']);
            echo $this->utility->output_json(ACTIVE, 'Message', 'The Link has been sent on your email account, Click that link and recover your password' , true , base_url('admin/forget'));
            return true;
        }
        echo $this->utility->output_json(0, 'Warning', 'Plesae enter correct email');
    }
  }

  public function reset($code)
   {
     if (!empty($this->session->admin_login["public_key"])) {
       redirect(base_url('admin/dashboard'));
     }
       $data["code"] = $code;
       // $response = $this->is_reset($code);
       $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[32]');
       $this->form_validation->set_rules('co-password', 'Confirm Password', 'trim|required|matches[password]');
       if ($this->form_validation->run() == false) {
         $this->load->view($this->folder_path.'reset_password' ,$data);
           } else {
           $info = array(
               "password" => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
               "forget_status" => 1,
           );
           $where = array(
               "forget_code" => $code,
           );
           $this->Shared_M->update($this->table_name, $info, $where);
           $sess_data = array(
                    'status' => ACTIVE,
                    'message' => 'Successfully Reset the password',
                );
                $this->session->set_flashdata('user_info', $sess_data);
                redirect(base_url('admin/login'));
       }
   }

   public function is_reset($code)
   {
       $where = array('forget_code' => $code);
       $columns = array("email", "forget_code", "forget_status", "forget_date");
       $response = $this->Shared_M->fetch_all($this->table_name, $columns, $where, 1);
       if (!empty($response) && $response["forget_status"] == 0) {
           $currentTime = new DateTime(date("Y-m-d H:i:s"));
           $since_start = $currentTime->diff(new DateTime($response["forget_date"]));
           if ($since_start->i < 15) {
               return $response;
           } else {
             $sess_data = array(
                   'status' => 0,
                   'message' => 'Time out to reset your password',
               );

               $this->session->set_flashdata('user_info', $sess_data);
               redirect("admin/login");
           }
       } else {
           redirect("admin/login");
       }
   }

   public function update_profile()
   {
     if (empty($this->session->admin_login["public_key"])) {
       redirect(base_url('admin/login'));
     }
     $user_id= $this->session->admin_login["public_key"];
     $data["user_info"] = $this->UserM->get_user_info($user_id);
     $email = $data["user_info"]["email"];
     $this->form_validation->set_rules('name', 'Name', 'trim|required');
     $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_valid_email['.$email.']');
     $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|max_length[32]');
     $this->form_validation->set_rules('co-password', 'confirm Password', 'trim|matches[password]');
     if ($this->form_validation->run() == false) {
       $this->load_view->admin_view(array($this->folder_path."update_profile") , $data);
       return false;
     }else {
       $user_info = array(
         'name' => $this->input->post('name'),
         'email' => $this->input->post('email'),
         'updation_date' => date("Y-m-d H:i:s"),
         'updated_by' => 1
       );
       if (!empty($this->input->post('password'))) {
         $user_info['password'] = password_hash($this->input->post('password') , PASSWORD_BCRYPT);
       }
       $where = array('public_key' => $user_id);
       $this->Shared_M->update($this->table_name, $user_info , $where);
       $this->set_login_session($user_id);
       $sess_data = array(
            'status' => ACTIVE,
            'message' => 'Successfully update the Profile',
        );
        $this->session->set_flashdata('user_info', $sess_data);
        redirect(base_url('admin/dashboard'));
   }
 }

   public function update_profile_image()
   {
     if (empty($_FILES["profile-image"]['name'])) {
       echo $this->utility->output_json(0, 'warning', 'Please first select profile image');
       return false;
     }
     $this->load->library('UploadFile');
     if (!empty($_FILES["profile-image"]['name'])) {
       $response1 = $this->uploadfile->uploadsingleimage('profile-image', UPLOAD_DIRECTORY, EXTENSION_TYPE, IMAGE_SIZE);
       $response1 = json_decode($response1);
       $message = "Successfully Profile Image Update";
       $file_info1 = array(
          'profile_pic' => (!empty($response1->file_path))?$response1->file_path:"",
       );
       if ($response1->status == 0) {
           echo $this->utility->output_json(0, 'Error', $response->error);
           return false;
       }
       $where = array('public_key'=>$this->session->admin_login["public_key"]);
       $this->Shared_M->update('admin_user', $file_info1 , $where);
       $this->set_login_session($this->session->admin_login["public_key"]);
       echo $this->utility->output_json(1, 'Success', $message , true , base_url('admin/update/profile'));
     }
   }

   // Set session
   public function set_login_session($user_id)
   {
     $user_info = $this->UserM->get_user_info($user_id);
     $this->session->set_userdata('admin_login', $user_info);
   }
   public function valid_email($email , $old_email)
   {
     if (!empty($email) && $email !== $old_email ) {
       $info = $this->Shared_M->fetch_all('admin_user' , array('email') , array('email'=>$email),1);
       if (!empty($info)) {
         $this->form_validation->set_message('valid_email', 'The Email field already exist..');
        return FALSE;
       }
     }
     return true;
   }

}
