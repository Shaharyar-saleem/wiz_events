<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->folder_path = 'user/account/';
  }

  public function login()
  {
    // if ($this->utility->is_login()) {
    //   redirect(base_url());
    // }
    $this->load_view->user_view(array($this->folder_path.'login'));
  }

  public function login_request()
  {
    if ($this->utility->is_login()) {
      echo $this->utility->output_json(0, 'warning', 'Access Denied');
      return false;
    }
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[100]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[32]');
    if ($this->form_validation->run() == false) {
      echo $this->utility->output_json(0, 'Validation Error', validation_errors());
      return false;
    }else {
      $response = $this->Shared_M->fetch_all('user', array(), array('email' => $this->input->post('email')), 1);
      if (!empty($response) && password_verify($this->input->post('password'), $response['password'])) {

          $this->session->set_userdata('user_login', $response);
          echo $this->utility->output_json(ACTIVE, 'Info', 'Successfully Login', true , base_url());
          return;
      }
      echo $this->utility->output_json(0, 'Login Error', 'Email/password incorrcet');
      return;
    }
  }

  public function signup()
  {
    if ($this->utility->is_login()) {
      redirect(base_url());
    }
    $data["identity"] = $this->Shared_M->fetch_all('identity' , array() , array('status'=>ACTIVE));
    $data["industry"] = $this->Shared_M->fetch_all('industry' , array() , array('status'=>ACTIVE) , null , null , null , 'name ASC');

    $this->load_view->user_view(array($this->folder_path.'signup') , $data);
  }

  public function signup_request()
  {
    if ($this->utility->is_login()) {
      echo $this->utility->output_json(0, 'warning', 'Access Denied');
      return false;
    }
    $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[100]|is_unique[user.email]');
    $this->form_validation->set_rules('phone_no', 'Phone No', 'trim|required|min_length[8]|max_length[15]');
    $this->form_validation->set_rules('identity', 'Identity', 'trim|required|required');
    if (!empty($this->input->post('identity'))) {
      $is_industry = $this->Shared_M->fetch_all('identity' , array() , array('public_key' => $this->input->post('identity')),1);
      if ($is_industry["is_industry"] == 0) {
        $this->form_validation->set_rules('industry[]', 'Industry', 'trim|required|required|callback_count_industry');
      }
    }
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[32]');
    $this->form_validation->set_rules('verify-password', 'Confirm Password', 'trim|required|matches[password]');
    if ($this->form_validation->run() == false) {
      echo $this->utility->output_json(0, 'Validation Error', validation_errors());
      return false;
    }else {
      $user_id = get_unique_no();
      $user_info = array(
        'public_key' => $user_id,
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'phone_no' => $this->input->post('phone_no'),
        'password' => password_hash($this->input->post('password') , PASSWORD_BCRYPT),
        'creation_date'=> date("Y-m-d H:i:s")
      );
      $additional_info = array(
         'user_id' => $user_id,
         'identity_id'=>$this->input->post('identity')
      );
      foreach ($this->input->post('industry') as $key => $info) {
        $user_industry[] = array(
          'industry_id'=> $info,
          'user_id'=> $user_id
        );
      }
      $this->Shared_M->insert('user' , $user_info);
      $this->Shared_M->insert('user_additional_info' , $additional_info);
      if (!empty($user_industry)) {
        $this->Shared_M->insert_batch('user_industry' , $user_industry);
      }
      $this->session->set_userdata('user_login', $user_info);
      echo $this->utility->output_json(ACTIVE, 'Info', 'Thanks for signup', true , base_url());
    }
  }

  public function forget()
  {
    if ($this->utility->is_login()) {
      redirect(base_url());
    }
    $this->load_view->user_view(array($this->folder_path.'forget') , array());
  }
  public function forget_request()
  {
    if ($this->utility->is_login()) {
      echo $this->utility->output_json(0, 'warning', 'Access Denied');
      return false;
    }
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[100]');
    if ($this->form_validation->run() == false) {
      echo $this->utility->output_json(0, 'Validation Error', validation_errors());
      return false;
    } else {
        $response = $this->Shared_M->fetch_all('user', array(), array('email' => $this->input->post('email')), 1);
        if (!empty($response)) {
            $this->load->library('Notification');
            $forgetCode = get_unique_no();
            $forgetLink = base_url('reset/') . $forgetCode;
            $now = new DateTime();
            $info = array(
                "forget_code" => $forgetCode,
                "forget_status" => 0,
                "forget_date" => date("Y-m-d H:i:s"),
            );
            $where = array(
                "public_key" => $response["public_key"],
            );
            $this->Shared_M->update('user', $info, $where);
            $this->notification->forget_email($forgetLink, $response['email']);
            echo $this->utility->output_json(ACTIVE, 'Message', 'The Link has been sent on your email account, Click that link and recover your password' , true , base_url('forget'));
            return true;
        }
        echo $this->utility->output_json(0, 'Warning', 'Plesae enter correct email');
    }
  }

  public function reset($code)
   {
     if ($this->utility->is_login()) {
       redirect(base_url());
     }
       $data["code"] = $code;
       $response = $this->is_reset($code);
       $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[32]');
       $this->form_validation->set_rules('co-password', 'Confirm Password', 'trim|required|matches[password]');
       if ($this->form_validation->run() == false) {
         $this->load_view->user_view(array($this->folder_path.'reset') , $data);
           } else {
           $info = array(
               "password" => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
               "forget_status" => 1,
           );
           $where = array(
               "forget_code" => $code,
           );
           $this->Shared_M->update('user', $info, $where);
           $sess_data = array(
                    'status' => ACTIVE,
                    'message' => 'Successfully Reset the password',
                );
                $this->session->set_flashdata('user_info', $sess_data);
                redirect(base_url('login'));
       }
   }

   public function is_reset($code)
   {
       $where = array('forget_code' => $code);
       $columns = array("email", "forget_code", "forget_status", "forget_date");
       $response = $this->Shared_M->fetch_all('user', $columns, $where, 1);
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
               redirect("login");
           }
       } else {
           redirect("login");
       }
   }

   public function count_industry($industry)
   {
     $industry = $this->input->post('industry');
     if (count($industry) > MAX_INDUSTRY) {
       $this->form_validation->set_message('count_industry', 'You can only select '.MAX_INDUSTRY.' Industry');
      return FALSE;
     }
     return true;
   }

   public function logout()
   {
     $this->session->unset_userdata('user_login');
     redirect(base_url());
   }

   public function user_profile($user_id)
   {

     if (!$this->Shared_M->fetch_all('user' , array('public_key') , array('public_key'=>$user_id),1)) {
       show_404();
     }
     $this->load->model('user/AccountM');
     $data["member_list"] = $this->AccountM->get_user_info($user_id);
     $data["user_file"] = $this->Shared_M->fetch_all('user_files' , array() , array('user_id'=>$user_id));
     $data["total_follower"] = $this->Shared_M->fetch_all('user_follow' , array('count(user_follow.follow_id) AS total_follower') , array('user_follow.follow_id'=>$user_id),1);
     $data["total_following"] = $this->Shared_M->fetch_all('user_follow' , array('count(user_follow.follow_id) AS total_following') , array('user_follow.following_id'=>$user_id),1);
     $this->load_view->user_view(array($this->folder_path.'profile') , $data);
   }

   public function update_profile()
   {
     $this->load->model('user/AccountM');
     $data["identity"] = $this->Shared_M->fetch_all('identity' , array() , array('status'=>ACTIVE));
     $data["industry"] = $this->Shared_M->fetch_all('industry' , array() , array('status'=>ACTIVE));
     $data["user_file"] = $this->Shared_M->fetch_all('user_files' , array() , array('user_id'=>$this->session->user_login["public_key"]));
     $data["user_info"] = $this->AccountM->get_user_info($this->session->user_login["public_key"]);
     $data["user_industry"] = explode(',', $data["user_info"]["industry_id"]);
     $this->load_view->user_view(array($this->folder_path.'update_account') , $data);
   }
   public function update_image_request()
   {
     if (empty($_FILES) || (empty($_FILES["cover-image"]['name']) && empty($_FILES["profile-image"]['name']))) {
       echo $this->utility->output_json(0, 'warning', 'Please first select Cover/profile image');
       return false;
     }
     $this->load->library('UploadFile');
     if (!empty($_FILES["cover-image"]['name'])) {
       $response = $this->uploadfile->uploadsingleimage('cover-image', UPLOAD_DIRECTORY, EXTENSION_TYPE, IMAGE_SIZE);
       $response = json_decode($response);
       $message = "Successfully Cover Image Update";
       $file_info = array(
           'cover_image' => (!empty($response->file_path))?$response->file_path:"",
       );
       if ($response->status == 0) {
           echo $this->utility->output_json(0, 'Error', $response->error);
           return false;
       }
       $where = array('user_id'=>$this->session->user_login["public_key"]);
       $this->Shared_M->update('user_additional_info', $file_info , $where);
     }
     if (!empty($_FILES["profile-image"]['name'])) {
       $response1 = $this->uploadfile->uploadsingleimage('profile-image', UPLOAD_DIRECTORY, EXTENSION_TYPE, IMAGE_SIZE);
       $response1 = json_decode($response1);
       $message = "Successfully Profile Image Update";
       $file_info1 = array(
          'profile_image' => (!empty($response1->file_path))?$response1->file_path:"",
       );
       if ($response1->status == 0) {
           echo $this->utility->output_json(0, 'Error', $response->error);
           return false;
       }
       $where = array('user_id'=>$this->session->user_login["public_key"]);
       $this->Shared_M->update('user_additional_info', $file_info1 , $where);
     }
     echo $this->utility->output_json(1, 'Success', $message);

   }

   public function update_account_request()
   {
     if (!$this->utility->is_login()) {
       echo $this->utility->output_json(0, 'warning', 'Access Denied');
       return false;
     }
     $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[100]');
     $this->form_validation->set_rules('web_link', 'Website Link', 'trim|max_length[150]');
     $this->form_validation->set_rules('address', 'Address', 'trim|max_length[180]');
     $this->form_validation->set_rules('phone_no', 'Phone No', 'trim|required|min_length[8]|max_length[15]');
     $this->form_validation->set_rules('identity', 'Identity', 'trim|required');
     $this->form_validation->set_rules('caption', 'Caption', 'trim|required|max_length[100]');
     $this->form_validation->set_rules('about', 'About', 'trim|required');
     if (!empty($this->input->post('identity'))) {
       $is_industry = $this->Shared_M->fetch_all('identity' , array() , array('public_key' => $this->input->post('identity')),1);
       if ($is_industry["is_industry"] == 0) {
         $this->form_validation->set_rules('industry[]', 'Industry', 'trim|required|required|callback_count_industry');
       }
     }
     if (!empty($this->input->post('password'))) {
       $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[32]');
       $this->form_validation->set_rules('verify-password', 'Confirm Password', 'trim|required|matches[password]');
     }
     if ($this->form_validation->run() == false) {
       echo $this->utility->output_json(0, 'Validation Error', validation_errors());
       return false;
     }else {
       $user_info = array(
         'name' => $this->input->post('name'),
         'phone_no' => $this->input->post('phone_no'),
         'updation_date'=> date("Y-m-d H:i:s")
       );
       if (!empty($this->input->post('password'))) {
         $user_info["password"] = password_hash($this->input->post('password') , PASSWORD_BCRYPT);
       }
       $additional_info = array(
          'identity_id'=>$this->input->post('identity'),
          'website_link' => $this->input->post('web_link'),
          'address' => $this->input->post('address'),
          'caption'=>$this->input->post('caption'),
          'about'=>$this->input->post('about')
       );
       $user_id = $this->session->user_login["public_key"];
       foreach ($this->input->post('industry') as $key => $info) {
         $user_industry[] = array(
           'industry_id'=> $info,
           'user_id'=> $user_id
         );
       }
       $this->Shared_M->update('user' , $user_info , array('public_key'=>$user_id));
       $this->Shared_M->update('user_additional_info' , $additional_info , array('user_id'=>$user_id));
       $this->Shared_M->delete('user_industry' , array('user_id'=>$user_id));
      if (!empty($user_industry)) {
         $this->Shared_M->insert_batch('user_industry' , $user_industry);
       }
       echo $this->utility->output_json(ACTIVE, 'Info', 'Successfully Account update', true , base_url());
     }
   }






// under development of user page by SHAHARAYAR
public function test_profile(){
  $this->load_view->user_view(array($this->folder_path.'user_profile'));
}
public function test_preview(){
  $this->load_view->user_view(array($this->folder_path.'actual_preview'));
}

public function test_n_setting(){
  $this->load_view->user_view(array($this->folder_path.'notification_setting'));
}

public function test_comment(){
  $this->load_view->user_view(array($this->folder_path.'view_comment'));
}

}





