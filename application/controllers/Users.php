<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends IsAdmin
{
    public function index()
    {
        $this->output->enable_profiler(ENVIRONMENT == 'development');
        
        redirect($this->data['controller'] . '/profile');
    }

    public function edit($id = '')
    {
        if (empty($id)) {
            $id = $this->data['users']->user_id;
        }

        if (empty($id)) {
            redirect($this->data['controller'] . '/profile');
        }

        if ($id  != $this->data['users']->user_id) {
            redirect($this->data['controller'] . '/profile');
        }

        $query = array(
            'user_id'   => $this->session->user_id
        );

        $data = array(
            'user_email' => $this->input->post('email'),
            'user_name' => $this->input->post('username'),
            'user_pass' => $this->hash_password($this->input->post('password'))
        );

        // update data
        if ($this->m_users->update($data, $query)) {
            echo json_encode(
                array(
                    "status"   => true,
                    "redirect" => site_url($this->data['controller']),
                )
            );
        } else {
            echo json_encode(array("status" => false));
        }
    }

    public function profile()
    {
        $this->output->enable_profiler(ENVIRONMENT == 'development');

        $this->template->view($this->data['controller'] . '/' . $this->data['method'], $this->data);
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        redirect($this->route->default);
    }

    private function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
