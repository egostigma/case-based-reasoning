<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kerusakan extends IsAdmin
{
    public function index()
    {
        $this->load->model(array('m_kerusakan'));
        $this->data += array(
            'kerusakan' => $this->m_kerusakan->get_all(),
        );

        $this->output->enable_profiler(ENVIRONMENT == 'development');

        $this->template->view($this->router->class . '/' . $this->router->method, $this->data);
    }

    public function create()
    {
        $this->output->enable_profiler(ENVIRONMENT == 'development');
        $this->template->view($this->router->class . '/' . $this->router->method, $this->data);
    }

    public function store()
    {
        $this->load->model(array('m_kerusakan'));

        $values = array(
            'kerusakan_nama'     => $this->input->post('nama'),
            'kerusakan_solusi'     => $this->input->post('solusi')
        );

        if ($this->m_kerusakan->insert($values)) {
            $this->session->set_flashdata("alert", 
                '<div class="m-alert m-alert--icon m-alert--air m-alert--outline m-alert--square m-alert--outline-2x alert alert-primary alert-dismissible m--margin-bottom-30" role="alert">
                    <div class="m-alert__icon">
                        <i class="flaticon-info m--font-brand"></i>
                    </div>
                    <div class="m-alert__text">
                        Data berhasil Ditambahkan
                    </div>
                </div>');
        } else {
            $this->session->set_flashdata("alert", 
                '<div class="m-alert m-alert--icon m-alert--air m-alert--outline m-alert--square m-alert--outline-2x alert alert-danger alert-dismissible m--margin-bottom-30" role="alert">
                    <div class="m-alert__icon">
                        <i class="flaticon-info m--font-brand"></i>
                    </div>
                    <div class="m-alert__text">
                        Data gagal Ditambahkan
                    </div>
                </div>');
        }

        redirect($this->router->class);
    }

    public function edit($id = '')
    {
        if (empty($id)) {
            redirect($this->router->class);
        }

        $where = array('kerusakan_id' => $id);

        $this->load->model(array('m_kerusakan'));
        $this->data += array(
            'kerusakan' => $this->m_kerusakan->where($where)->get(),
        );

        $this->output->enable_profiler(ENVIRONMENT == 'development');
        $this->template->view($this->router->class . '/' . $this->router->method, $this->data);
    }

    //update data sesuai id
    public function update($id)
    {
        $this->load->model('m_kerusakan');

        $where = array('kerusakan_id' => $id);

        $values = array(
            'kerusakan_nama'     => $this->input->post('nama'),
            'kerusakan_solusi'     => $this->input->post('solusi')
        );

        if ($this->m_kerusakan->update($values, $where)) {
            $this->session->set_flashdata("alert", 
                '<div class="m-alert m-alert--icon m-alert--air m-alert--outline m-alert--square m-alert--outline-2x alert alert-primary alert-dismissible m--margin-bottom-30" role="alert">
                    <div class="m-alert__icon">
                        <i class="flaticon-info m--font-brand"></i>
                    </div>
                    <div class="m-alert__text">
                        Data berhasil diubah
                    </div>
                </div>');
        } else {
            $this->session->set_flashdata("alert", 
                '<div class="m-alert m-alert--icon m-alert--air m-alert--outline m-alert--square m-alert--outline-2x alert alert-danger alert-dismissible m--margin-bottom-30" role="alert">
                    <div class="m-alert__icon">
                        <i class="flaticon-info m--font-brand"></i>
                    </div>
                    <div class="m-alert__text">
                        Data gagal diubah
                    </div>
                </div>');
        }

        redirect($this->router->class);
    }

    public function destroy($id)
    {
        $this->load->model('m_kerusakan');

        $where = array('kerusakan_id' => $id);

        if ($this->m_kerusakan->delete($where)) {
            $this->session->set_flashdata("alert", 
                '<div class="m-alert m-alert--icon m-alert--air m-alert--outline m-alert--square m-alert--outline-2x alert alert-primary alert-dismissible m--margin-bottom-30" role="alert">
                    <div class="m-alert__icon">
                        <i class="flaticon-info m--font-brand"></i>
                    </div>
                    <div class="m-alert__text">
                        Data berhasil dihapus
                    </div>
                </div>');
        } else {
            $this->session->set_flashdata("alert", 
                '<div class="m-alert m-alert--icon m-alert--air m-alert--outline m-alert--square m-alert--outline-2x alert alert-danger alert-dismissible m--margin-bottom-30" role="alert">
                    <div class="m-alert__icon">
                        <i class="flaticon-info m--font-brand"></i>
                    </div>
                    <div class="m-alert__text">
                        Data gagal dihapus
                    </div>
                </div>');
        }

        redirect($this->router->class);
    }
}
