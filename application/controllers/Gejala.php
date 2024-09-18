<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends IsAdmin
{
    public function index()
    {
        $this->load->model(array('m_gejala'));
        $this->data += array(
            'gejala' => $this->m_gejala->get_all(),
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
        $this->load->model(array('m_gejala'));

        $values = array(
            'gejala_nama'     => $this->input->post('nama')
        );

        if ($this->m_gejala->insert($values)) {
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

        $where = array('gejala_id' => $id);

        $this->load->model(array('m_gejala'));
        $this->data += array(
            'gejala' => $this->m_gejala->where($where)->get(),
        );

        $this->output->enable_profiler(ENVIRONMENT == 'development');
        $this->template->view($this->router->class . '/' . $this->router->method, $this->data);
    }

    //update data sesuai id
    public function update($id)
    {
        $this->load->model('m_gejala');

        $where = array('gejala_id' => $id);

        $values = array(
            'gejala_nama'     => $this->input->post('nama')
        );

        if ($this->m_gejala->update($values, $where)) {
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
        $this->load->model('m_gejala');

        $where = array('gejala_id' => $id);

        if ($this->m_gejala->delete($where)) {
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
