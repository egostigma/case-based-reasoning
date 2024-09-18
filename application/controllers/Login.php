<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{
    public $date;
    public $data = array();
    public $user = array();

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set("Asia/Jakarta");
        $this->date = date("Y-m-d");
        $this->load->model('m_users');

        if ($this->session->user_id) {
            $this->user = $this->m_users->get($this->session->user_id);
            if ($this->user->user_role === $this->admin_role) {
                //redirect($this->admin_role);
                redirect($this->router->default_controller);
            } else {
                redirect($this->router->default_controller);
            }
        }
    }

    public function index()
    {
        $this->template->view($this->data['controller'] . '/' . $this->data['method'], $this->data);
    }

    public function auth()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $query = array(
            'user_name' => $username,
            'user_pass' => $password,
        );

        if ($this->verify_password($query)) {
            $this->user = $this->m_users->get(array('user_name' => $query['user_name']));
            $this->session->set_userdata('user_id', $this->user->user_id);
            echo json_encode(
                array(
                    "status"   => true,
                    "redirect" => $this->router->default_controller,
                )
            );
        } else {
            echo json_encode(array("status" => false));
        }
    }

    private function verify_password($query)
    {
        $verify = $this->m_users->get(array('user_name' => $query['user_name']));
        if ($verify) {
            return password_verify($query['user_pass'], $verify->user_pass);
        } else {
            return false;
        }

    }
}
