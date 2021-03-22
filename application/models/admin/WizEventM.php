<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WizEventM extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get_all_event()
  {
    $this->db->select('
    user_event.public_key AS event_id,
    user_event.event_title,
    user_event.event_location_type,
    user_event.event_address,
    user_event.description,
    user_event.start_date,
    user_event.end_date,
    user_event.event_type,
    user_event.status,
    GROUP_CONCAT(event_file.file_path) AS file_paths,
    GROUP_CONCAT(event_file.file_type) AS file_types,
    DATE_FORMAT(user_event.creation_date ,"%d %b %Y") AS creation_date
    ');
   $this->db->from('user_event');
   $this->db->join('event_file', 'event_file.event_id = user_event.public_key', 'inner');
   $this->db->group_by('user_event.public_key');
   return $this->db->get()->result_array();
  }

}
