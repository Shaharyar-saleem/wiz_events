<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountM extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get_user_info($user_id)
  {
    $this->db->select('
    user.public_key AS user_id,
    user.name,
    user.email,
    user.phone_no,
    user.status,
    DATE_FORMAT(user.creation_date, "%b %Y") AS since_date,
    user_additional_info.identity_id,
    user_additional_info.profile_image,
    user_additional_info.cover_image,
    user_additional_info.caption,
    user_additional_info.about,
    user_additional_info.followers,
    user_additional_info.fellow,
    user_additional_info.website_link,
    user_additional_info.address,
    GROUP_CONCAT(industry.public_key) AS industry_id
    ');
    $this->db->from('user');
    $this->db->join('user_additional_info', 'user_additional_info.user_id = user.public_key', 'inner');
    $this->db->join('user_industry', "user_industry.user_id = user.public_key AND user_industry.user_id='$user_id'", 'left');
    $this->db->join('industry', 'industry.public_key = user_industry.industry_id', 'left');
    $this->db->where('user.public_key', $user_id);
    return $this->db->get()->row_array();
  }

  public function short_user_info($user_id)
  {
    $this->db->select('
    user.public_key AS user_id,
    user.name,
    user.email,
    user.phone_no,
    DATE_FORMAT(user.creation_date, "%b %Y") AS since_date,
    user_additional_info.profile_image,
    user_additional_info.website_link,
    user_additional_info.address
    ');
    $this->db->from('user');
    $this->db->join('user_additional_info', 'user_additional_info.user_id = user.public_key', 'inner');
    $this->db->where('user.public_key', $user_id);
    return $this->db->get()->row_array();
  }

}
