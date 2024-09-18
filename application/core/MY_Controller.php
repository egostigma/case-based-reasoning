<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $data = array();
    public $user = array();

    public function __construct()
    {
        parent::__construct();
        
        $ci = &get_instance();

        date_default_timezone_set('Asia/Jakarta');
        ini_set('max_execution_time', 0);


        $this->data += array(
            'ci'              => $ci,
            'controller'      => $this->router->class,
            'method'          => $this->router->method,
            'controller_text' => ucwords(str_replace("_", " ", $this->router->class)),
            'method_text'     => ucwords(str_replace("_", " ", $this->router->method)),
        );

        if (!empty($this->session->user_id)) {
            $this->load->model('m_users');
            $this->user = $this->m_users->get($this->session->user_id);
            $this->data += array(
                'users' => $this->user,
            );
        }
    }
}

class LoggedIn extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->user_id) {
            $this->load->model('m_users');
            $this->user = $this->m_users->get($this->session->user_id);
            $this->data += array(
                'users' => $this->user,
            );
        } else {
            redirect('login');
        }
    }
}

class IsAdmin extends LoggedIn
{
    public function __construct()
    {
        parent::__construct();
    }
}
