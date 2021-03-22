<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utility
{
    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->helper('string');
    }

    public function generate_unique_number($tableName, $columnName, $public_key_length = 8)
    {
        $unique_number = substr(sha1(random_string('alnum', 8)), 0, $public_key_length);
        while ($this->CI->db->get_where($tableName, array($columnName => $unique_number))->row()) {
            $unique_number = substr(sha1(random_string('alnum', 8)), 0, $public_key_length);
        }
        return $unique_number;
    }



    public function column_value_exist($tableName , $columnName , $columnValue)
    {
      $res = $this->CI->db->get_where($tableName, array($columnName => $columnValue))->row();
      if (empty($res)) {
         redirect(show_404());
      }
      return $res;
    }

    public function is_login()
    {
      if (!empty($this->CI->session->user_login)) {
          return $this->CI->session->user_login;
      }
      return false;
    }
    public function output_json($status , $message ="" , $data = null , $is_redirect = false , $redirect_path = null)
    {
      return json_encode(array(
          'status' => $status,
          'status_message' => $message,
          'redirect_path' => $redirect_path,
          'is_redirect' => $is_redirect,
          'data' => array(
              'error_msg' => $data,
          ),
      ));
      return;
    }
}
