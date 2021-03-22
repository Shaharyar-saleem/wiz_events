<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventM extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get_user_event()
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
    user_event.status AS event_status
    ');
    $this->db->from('user_event');
    $this->db->order_by('user_event.creation_date DESC');
    return $this->db->get()->result_array();
  }

  public function get_all_event($limit="")
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
    user_event.status AS event_status,
    DATE_FORMAT(user_event.start_date , "%d %b %h:%d %p") AS start_event_date,
    DATE_FORMAT(user_event.end_date , "%d %b %h:%d %p") AS end_event_date
    ');
    $this->db->from('user_event');
    $this->db->order_by('user_event.creation_date DESC');
    return $this->db->get()->result_array();
  }
}
