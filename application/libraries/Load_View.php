<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Load_View
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function user_view($files, $data = array(), $templates = true)
    {
        if ($templates) {
            $this->ci->load->view('user/template/header.php', $data);
        }
        foreach ($files as $key => $file) {
            if ($key == 0 && !$templates) {
                $this->ci->load->view($file, $data);
            } else {
                $this->ci->load->view($file);
            }
        }
        if ($templates) {
            $this->ci->load->view('user/template/footer.php');
        }
    }

    public function admin_view($files, $data = array(), $templates = true)
    {
        $data["login_info"] = $this->ci->session->admin_login;
        if ($templates) {
            $this->ci->load->view('admin/template/header', $data);
        }
        foreach ($files as $key => $file) {
            if ($key == 0 && !$templates) {
                $this->ci->load->view($file, $data);
            } else {
                $this->ci->load->view($file);
            }
        }
        if ($templates) {
            $this->ci->load->view('admin/template/footer');
        }
    }
}

/* End of file Load_View.php */
