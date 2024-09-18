<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function index()
    {
        $this->output->enable_profiler(ENVIRONMENT == 'development');

        $this->template->view($this->data['controller'] . '/' . $this->data['method'], $this->data);
    }
}
