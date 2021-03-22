<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shared_M extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function fetch_all($tableName, $columns = array(), $where, $limit = null , $distinct = false, $group_by = null , $order_by = null)
    {
        $this->db->select(!empty($columns) ? $columns : '*');
        $this->db->distinct($distinct);

        $this->db->where($where);
        if (!empty($group_by)) {
            if (is_array($group_by)) {
                $group_by = implode(',', $group_by);
            }
            $this->db->group_by($group_by);
        }
        if ($limit === 1) {
            return $this->db->get($tableName, $limit)->row_array();
        }
        if (!empty($order_by)) {
          $this->db->order_by($order_by);
        }
        // echo $this->db->get_compiled_select().'<br>';exit;;
        return $this->db->get($tableName, $limit)->result_array();
    }


    public function update($tableName, $columns = array(), $where = array(), $limit = 1)
    {
        return $this->db->update(
            $tableName,
            $columns,
            $where
        );
    }
    public function update_batch($tableName , $info , $con_col)
    {
      $this->db->update_batch($tableName, $info, $con_col);
    }
    public function insert($tableName, $columns)
    {
        return $this->db->insert($tableName, $columns);
    }

    public function insert_batch($tableName, $columns)
    {
        return $this->db->insert_batch($tableName, $columns);
    }

    public function delete($tableName, $where)
    {
        $this->db->delete($tableName, $where);
    }


}
