<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WizUserM extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get_user_info()
  {
    $this->db->select('
    user.public_key AS user_id,
    user.name,
    user.email,
    user.phone_no,
    identity.name AS identity_name,
    DATE_FORMAT(user.creation_date , "%d %b %Y") AS join_date
    ');
    $this->db->from('user');
    $this->db->join('user_additional_info', 'user_additional_info.user_id = user.public_key', 'inner');
    $this->db->join('identity', 'user_additional_info.identity_id = identity.public_key', 'inner');
    $this->db->where('user.status', ACTIVE);
    $this->db->group_by('user.public_key');
    $this->db->order_by('user.creation_date DESC');
    return $this->db->get()->result_array();
  }

}
