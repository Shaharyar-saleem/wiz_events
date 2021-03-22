<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->folder_path = "user/event/";
    $this->load->model('user/EventM');
    // if (!$this->utility->is_login()) {
    //   redirect(base_url('login'));
    // }
  }

  public function user_event()
  {
    $user_id = $this->session->user_login["public_key"];
    $data["user_event"] = $this->EventM->get_user_event($user_id);
    $this->load_view->user_view(array($this->folder_path.'user_event') , $data);

  }
  public function create_event()
  {
    $this->load->model('user/AccountM');
    $data["user_info"] = $this->AccountM->short_user_info($this->session->user_login["public_key"]);
    $data["event_catagories"] = $this->Shared_M->fetch_all('event_catagories' , array(), array('status'=>ACTIVE));
    $this->load_view->user_view(array($this->folder_path.'create_event') , $data);
  }

  public function create_event_request()
  {
    $this->form_validation->set_rules('event-name', 'Event Name', 'trim|required|max_length[100]');
    $this->form_validation->set_rules('event-address-type', 'Address Type', 'trim|required');
    $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
    $this->form_validation->set_rules('end_date', 'End Date', 'trim|required|callback_event_time');
    $this->form_validation->set_rules('address', 'Address', 'trim|min_length[2]|max_length[250]');
    $this->form_validation->set_rules('web-link', 'Website Link', 'trim|max_length[140]');
    $this->form_validation->set_rules('event-description', 'Description', 'trim|required|min_length[8]|max_length[250]');
    $this->form_validation->set_rules('event-type', 'Event Type', 'trim|required');
    $this->form_validation->set_rules('ticket-link', 'Ticket Link', 'trim|max_length[140]');
    $this->form_validation->set_rules('categories[]', 'Catagory', 'trim|required|max_length[140]');
    $this->form_validation->set_rules('save-for-later', 'Blueprint', 'trim');
    $this->form_validation->set_rules('invite-people', 'Invite people', 'trim');
    if (!empty($this->input->post('invite-people'))) {
      $this->form_validation->set_rules('inviteUsers[]', 'Invite User', 'trim|required');
    }
    if (!empty($this->input->post('event-address-type')) && $this->input->post('event-address-type') == PHYSICAL_EVENT) {
      $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[2]|max_length[250]');
    }
    if (empty($_FILES["event-files"]["name"][0])) {
      $this->form_validation->set_rules('event-files', 'file', 'trim|required');
    }
    if ($this->form_validation->run() == false) {
      echo $this->utility->output_json(0, 'Validation Error', validation_errors());
      return false;
    }else {
      $event_id = get_unique_no(15);
      // Event Info
      $even_info = $this->get_event_data($event_id);
      // Event files
      $user_id = $this->session->user_login["public_key"];
      $this->load->library('UploadFile');
      $response = $this->uploadfile->uploadMultiFiles('event-files', UPLOAD_DIRECTORY, EXTENSION_TYPE, IMAGE_SIZE);
      $response = json_decode($response);
      if ($response->status == 0) {
          echo $this->utility->output_json(0, 'Error', $response->error);
          return false;
      }
      for ($i=0; $i <count($response->file_path) ; $i++) {
        $file_info[] = array(
            'file_path' => $response->file_path[$i],
            'file_type' => $response->file_type[$i],
            'file_name' => $response->file_name[$i],
            'event_id' => $event_id,
        );
      }
      // Catagory Info
      $catagory_info = $this->get_catagory_info($event_id);
      $this->Shared_M->insert('user_event' , $even_info);
      $this->Shared_M->insert_batch('user_catagories' , $catagory_info);
      $this->Shared_M->insert_batch('event_file' , $file_info);
      echo $this->utility->output_json(ACTIVE, 'Success', 'Successfully Event has been created' , true , base_url());
      return true;
    }
  }

  public function get_catagory_info($event_id)
  {
    $catagories_info = array();
    $event_catagories = $this->Shared_M->fetch_all('event_catagories' , array(), array('status'=>ACTIVE));
    foreach ($this->input->post('categories') as $ky => $c_id) {
      if ($this->category_exist($event_catagories ,$c_id)) {
        $catagories_info[] = array(
          'event_id'=> $event_id,
          'catagory_id'=> $c_id,
        );
      } else {
        $catagory_id = get_unique_no();
        $c_info = array(
          'public_key' => $catagory_id,
          'title' => $c_id,
          'created_by'=>$this->session->user_login["public_key"],
          'creation_date'=>date('Y-m-d H:i:s')
        );
        $this->Shared_M->insert('event_catagories' , $c_info);
        $catagories_info[] = array(
          'event_id'=> $event_id,
          'catagory_id'=> $catagory_id,
        );
      }
    }
    return $catagories_info;
  }

  public function category_exist($event_catagories ,$c_id)
  {
    $key = 0;
    foreach ($event_catagories as  $info) {
      if ($info["public_key"] == $c_id) {
        return  $info;
      }
      $key++;
    }
    return false;
  }
  public function get_event_data($event_id="")
  {
    $originalDate = $this->input->post('start_date');
    $start_time = date("Y-m-d H:i:s", strtotime($originalDate));
    $originalDate1 = $this->input->post('end_date');
    $end_time = date("Y-m-d H:i:s", strtotime($originalDate1));

    $event_info = array(
      'user_id' => $this->session->user_login["public_key"],
      'event_title' => $this->input->post('event-name'),
      'event_location_type' => ($this->input->post('event-address-type') == PHYSICAL_EVENT)?PHYSICAL_EVENT:PROMO_EVENT,
      'event_address' => $this->input->post('address'),
      'refer_website_link' => $this->input->post('web-link'),
      'description' => $this->input->post('event-description'),
      'start_date' => $start_time,
      'end_date' => $end_time,
      'ticket_link' => $this->input->post('ticket-link'),
      'event_type' => ($this->input->post('event-type') == PRIVATE_EVENT)?PRIVATE_EVENT:OPEN_EVENT,
      'status' => (!empty($this->input->post('save-for-later')))?DRAFT:ACTIVE
    );
     if (!empty($event_id)) {
       $event_info["public_key"] = $event_id;
       $event_info["creation_date"] = date('Y-m-d H:i:s');
     }
     return $event_info;
  }

  public function event_time()
  {
    $start_time = $this->input->post('start_date');
    $end_time = $this->input->post('end_date');
    if (!empty($start_time) && !empty($end_time)) {
      if ($start_time > $end_time) {
        $this->form_validation->set_message('event_time', 'The start time must be less then to end time');
        return false;
      }
    }
    return true;
  }
}
