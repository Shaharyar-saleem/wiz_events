<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notification
{

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function forget_email($forget_link, $email)
    {
        $this->CI->load->library('email');
        // $config['protocol'] = 'sendmail';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = true;
        $config['mailtype'] = 'html';
        $this->CI->email->initialize($config);
        $this->CI->email->from('DoNotReply@wizevent.pro');
        $this->CI->email->to($email);
        $data['verifyLink'] = $forget_link;
        $this->CI->email->subject("Forget Password");
        $emailView = $this->CI->load->view("emailTemplates/forgotPassword", $data, true);
        $this->CI->email->message($emailView);
        $this->CI->email->send();
    }

    public function send_invoice_email($email , $invoice_id="")
    {
        $this->CI->load->library('email');
        // $config['protocol'] = 'sendmail';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = true;
        $config['mailtype'] = 'html';
        $this->CI->email->initialize($config);
        $this->CI->email->from('DoNotReply@aaatt.pro');
        $this->CI->email->to($email);
        $this->CI->email->subject("AAATT Payment Receipt");
        $data = $this->get_invoice_details();
        $data["invoice_id"] = "19-".$invoice_id;
        $emailView = $this->CI->load->view("emailTemplates/aaatt_payment", $data, true);
        $this->CI->email->message($emailView);
        $this->CI->email->send();
    }

    public function get_invoice_details()
    {
        $this->CI->load->model(array('user/ContentM'));
        $total_price = $this->CI->Shared_M->fetch_all('submission_content', array('SUM(IF(entry_type = 1, 60, 85)) AS total_price'), array(
          'payment_status' => NOT_RECEIVED_PAYMENT,
           'created_by' => $this->CI->session->user_login["public_key"],
           'status' => ACTIVE
         ), 1);
        $total_price = $total_price["total_price"];
        $t_tax = ($total_price * 12.5) / 100;
        $total_price = float_format($total_price + $t_tax);
        return array(
            'total_price' => $total_price,
            't_tax' => $t_tax,
            'p_details' => $this->CI->ContentM->get_invoice_details(),
            'user_info' => $this->CI->session->user_login,
        );
    }

    public function send_custom_email($subject, $message, $email)
    {
      $this->CI->load->library('email');
     // $config['protocol'] = 'sendmail';
     $config['charset'] = 'utf-8';
     $config['wordwrap'] = true;
     $config['mailtype'] = 'html';
     $this->CI->email->initialize($config);
     $this->CI->email->from('admin@aaatt.org');
     $this->CI->email->to($email);
     $data['email_msg'] = $message;
     $this->CI->email->subject($subject);
     $emailView = $this->CI->load->view("emailTemplates/common_template", $data, true);
     $this->CI->email->message($emailView);
     $this->CI->email->send();
    }

}
