<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsM extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get_post($post_type = "")
  {
    $user_id = (!empty($this->session->user_login["public_key"]))?$this->session->user_login["public_key"]:"";
    $this->db->select('
    admin_blog.public_key AS blog_id,
    admin_blog.post_type,
    admin_blog.title AS post_title,
    DATE_FORMAT(admin_blog.date , "%b %d") AS post_date,
    admin_blog.description,
    GROUP_CONCAT(admin_blog_media.file_path) AS file_paths,
    GROUP_CONCAT(admin_blog_media.type) AS file_types,
    admin_user.name AS blogger_name,
    admin_user.profile_pic AS blogger_pic,
    blog_comment.blog_like,
    blog_comment.user_id AS blog_user_like_id,
    blog_comment.blog_id AS blog_id_like
    ');
    $this->db->from('admin_blog');
    $this->db->join('admin_blog_media', 'admin_blog_media.blog_id = admin_blog.public_key', 'inner');
    $this->db->join('admin_user', 'admin_user.public_key = admin_blog.created_by', 'inner');
    $this->db->join('blog_comment', "blog_comment.blog_id = admin_blog.public_key AND blog_comment.user_id = '$user_id'", 'left');
    $this->db->where('admin_blog.is_deleted', ACTIVE);
    if (!empty($post_type)) {
      $this->db->where('admin_blog.post_type', $post_type);
    }
    $this->db->group_by('admin_blog.public_key');
    $this->db->order_by('admin_blog.date DESC');
    return $this->db->get()->result_array();
  }

  public function is_liked($blog_id , $user_id)
  {
    $this->db->select('
    admin_blog.public_key,
    blog_comment.blog_like,
    blog_comment.blog_id,
    ');
    $this->db->from('admin_blog');
    $this->db->join('blog_comment', "blog_comment.blog_id = admin_blog.public_key AND blog_comment.user_id = '$user_id'", 'left');
    $this->db->where('admin_blog.public_key', $blog_id);
    return $this->db->get()->row_array();;
  }

  public function get_total_like()
  {
    $this->db->select('
    COUNT(blog_comment.blog_like) AS total_like,
    blog_comment.blog_id
    ');
    $this->db->from('blog_comment');
    $this->db->where('blog_like', LIKE);
    $this->db->group_by('blog_id');
    return $this->db->get()->result_array();
  }

}
