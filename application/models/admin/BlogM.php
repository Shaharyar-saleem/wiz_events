<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlogM extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get_blog_list($blog_id="")
  {
    $this->db->select('
    admin_blog.public_key AS blog_id,
    admin_blog.post_type,
    admin_blog.title,
    admin_blog.date AS post_date,
    admin_blog.description,
    admin_blog.status,
    admin_blog.is_approve,
    GROUP_CONCAT(admin_blog_media.file_path) AS file_paths,
    GROUP_CONCAT(admin_blog_media.type) AS media_types,
    admin_user.name AS user_name,
    admin_user.profile_pic
    ');
    $this->db->from('admin_blog');
    $this->db->join('admin_blog_media', 'admin_blog.public_key = admin_blog_media.blog_id', 'inner');
    $this->db->join('admin_user', 'admin_user.public_key = admin_blog.created_by', 'inner');
    $this->db->where('admin_blog.is_deleted', ACTIVE);
    if (!empty($blog_id)) {
      $this->db->where('admin_blog.public_key', $blog_id);
      return $this->db->get()->row_array();
    }
    return $this->db->get()->result_array();
  }

}
