<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberM extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get_all_members($user_id="")
  {
    $this->db->select('
    user.public_key AS user_id,
    user.name,
    user.email,
    user.phone_no,
    DATE_FORMAT(user.creation_date, "%b %Y") AS since_date,
    user_additional_info.profile_image,
    user_additional_info.cover_image,
    user_additional_info.caption,
    user_additional_info.followers,
    user_additional_info.fellow,
    user_follow.follow_id,
    user_follow.following_id,
    user_report.report_user_id,
    user_report.user_id AS reporter_user_id,
    ');
    $this->db->from('user');
    $this->db->join('user_additional_info', 'user_additional_info.user_id = user.public_key', 'inner');
    $this->db->join('user_follow', 'user_follow.follow_id = user.public_key', 'left');
    $this->db->join('user_report', 'user_report.report_user_id = user.public_key', 'left');
    if (!empty($user_id)) {
      $this->db->where('user.public_key', $user_id);
      return $this->db->get()->row_array();
    }
    if ($this->input->post('sort_member') == 1) {
      $this->db->order_by('user.public_key ASC');
    }elseif ($this->input->post('sort_member') == 2) {
      // code...
    }elseif ($this->input->post('sort_member') == 3) {
      $this->db->order_by('user.creation_date DESC');
    }elseif ($this->input->post('sort_member') == 4) {
      $this->db->order_by('user.creation_date ASC');
    }
    if (!empty($this->input->post('search_text'))) {
      $this->db->like('user.name', $this->input->post('search_text'));
    }
    $this->db->group_by('user.public_key');
    return $this->db->get()->result_array();
  }

}
