<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasus extends IsAdmin
{
    public function index()
    {
        $this->load->model(array('m_kasus'));
        $this->data += array(
            'kasus' => $this->db->join('kerusakan', 'kasus.kerusakan_id = kerusakan.kerusakan_id')
                ->join('gejala', 'kasus.gejala_id = gejala.gejala_id')
                ->get('kasus')->result(),
        );

        // echo json_encode($this->data['kasus']);

        $this->output->enable_profiler(ENVIRONMENT == 'development');

        $this->template->view($this->router->class . '/' . $this->router->method, $this->data);
    }

    public function create()
    {
        $this->load->model(array('m_kerusakan', 'm_gejala'));
        $this->data += array(
            'kerusakan' => $this->m_kerusakan->get_all(),
            'gejala'    => $this->m_gejala->get_all(),
        );

        $this->output->enable_profiler(ENVIRONMENT == 'development');
        $this->template->view($this->router->class . '/' . $this->router->method, $this->data);
    }

    public function store()
    {
        $this->load->model(array('m_kasus'));

        foreach ($this->input->post('gejala') as $gejala_id) {
            $values = array(
                'kerusakan_id' => $this->input->post('kerusakan'),
                'gejala_id'    => $gejala_id,
                'kasus_bobot'  => $this->input->post('bobot'),
            );
            $this->m_kasus->insert($values);
        }
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE) {
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

        $where = array('kasus_id' => $id);

        $this->load->model(array('m_kasus'));
        $this->data += array(
            'kasus' => $this->m_kasus->where($where)->get(),
        );

        $this->output->enable_profiler(ENVIRONMENT == 'development');
        $this->template->view($this->router->class . '/' . $this->router->method, $this->data);
    }

    //update data sesuai id
    public function update($id)
    {
        $this->load->model('m_kasus');

        $where = array('kasus_id' => $id);

        $values = array(
            'kasus_nama' => $this->input->post('nama'),
        );

        if ($this->m_kasus->update($values, $where)) {
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
        $this->load->model('m_kasus');

        $where = array('kasus_id' => $id);

        if ($this->m_kasus->delete($where)) {
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
