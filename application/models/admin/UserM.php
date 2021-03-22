<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserM extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get_user_info($user_id="")
  {
    $this->db->select('
    admin_user.* ,
    DATE_FORMAT("admin_user.creation_date", "%d %b %Y") AS join_date,
    admin_group.name AS group_name
    ');
    $this->db->from('admin_user');
    $this->db->join('admin_group', 'admin_group.public_key = admin_user.groupId', 'inner');
    $this->db->where('admin_user.status', ACTIVE);
    if (!empty($user_id)) {
      $this->db->where('admin_user.public_key', $user_id);
      return $this->db->get()->row_array();
    }
    return $this->db->get()->result_array();
  }

}
