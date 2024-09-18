<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends MY_Controller
{

    public function index()
    {
        $this->load->model(array('m_konsultasi'));
        $this->data += array(
            'konsultasi' => $this->m_konsultasi->get_all(),
        );
        
        $this->output->enable_profiler(ENVIRONMENT == 'development');
        $this->template->view($this->data['controller'] . '/' . $this->data['method'], $this->data);
        //redirect($this->data['controller'] . '/create');
    }

    public function create()
    {
        $this->load->model(array('m_gejala'));
        $this->data += array(
            'gejala' => $this->m_gejala->get_all(),
        );

        $this->output->enable_profiler(ENVIRONMENT == 'development');
        $this->template->view($this->data['controller'] . '/' . $this->data['method'], $this->data);
    }

    public function store()
    {
        $this->load->model('m_konsultasi');

        $konsultasi = array();

        $this->db->trans_start();
        $this->m_konsultasi->insert($konsultasi);
        $konsultasi_id = $this->db->insert_id();

        $this->load->model('m_konsultasi_gejala');

        foreach ($this->input->post('gejala') as $gejala_id) {

            $values = array(
                'konsultasi_id' => $konsultasi_id,
                'gejala_id'     => $gejala_id,
            );

            $this->m_konsultasi_gejala->insert($values);

        }
        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            redirect($this->router->class);
        } else {
            redirect($this->router->class.'/show/'.$konsultasi_id);
        }

        // if ($this->m_konsultasi->insert($values)) {
        //     $this->session->set_flashdata("alert", "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\"><button type=\"button\" type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button><strong>Berhasil!</strong> Data rumah berhasil ditambahkan.</div>");
        // } else {
        //     $this->session->set_flashdata("alert", "<div class=\"alert alert-danger alert-dismissible fade in\" role=\"alert\"><button type=\"button\" type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button><strong>Gagal!</strong> Data rumah gagal ditambahkan.</div>");
        // }

        // redirect($this->router->class);
    }

    public function show($id)
    {
        $where = array('konsultasi_id' => $id);

        $konsultasi = $this->db->join('gejala', 'konsultasi_gejala.gejala_id = gejala.gejala_id')
                                ->where($where)
                                ->get('konsultasi_gejala')
                                ->result();

        $this->data += array('konsultasi' => $konsultasi);

        $kasus = $this->db->join('kerusakan', 'kasus.kerusakan_id = kerusakan.kerusakan_id')
                            ->join('gejala', 'kasus.gejala_id = gejala.gejala_id')
                            ->get('kasus')
                            ->result();

        $this->data += array('kasus' => $kasus);

        $kerusakan = $this->db->get('kerusakan')
                            ->result();

        $this->data += array('kerusakan' => $kerusakan);

        $similarity = $this->db->select("   
                                            kerusakan.kerusakan_id,
                                            kasus.kasus_bobot,
                                            IF(
                                                kasus.gejala_id = konsultasi_gejala.gejala_id,
                                                1,
                                                0
                                            ) AS nilai"
                                        )
                            ->join('konsultasi_gejala', 'kasus.gejala_id = konsultasi_gejala.gejala_id AND konsultasi_gejala.konsultasi_id = "'.$id.'"', 'LEFT')
                            ->join('kerusakan', 'kasus.kerusakan_id = kerusakan.kerusakan_id')
                            ->join('gejala', 'gejala.gejala_id = konsultasi_gejala.gejala_id', 'LEFT')
                            ->get('kasus')
                            ->result();

        $this->data += array('similarity' => $similarity);

        $this->output->enable_profiler(ENVIRONMENT == 'development');
        $this->template->view($this->data['controller'] . '/' . $this->data['method'], $this->data);
    }

    public function terakhir()
    {
        $id = $this->db->select('konsultasi_id')->order_by('konsultasi_id','desc')->limit(1)->get('konsultasi')->row('konsultasi_id');
        $where = array('konsultasi_id' => $id);

        $konsultasi = $this->db->join('gejala', 'konsultasi_gejala.gejala_id = gejala.gejala_id')
                                ->where($where)
                                ->get('konsultasi_gejala')
                                ->result();

        $this->data += array('konsultasi' => $konsultasi);

        $kasus = $this->db->join('kerusakan', 'kasus.kerusakan_id = kerusakan.kerusakan_id')
                            ->join('gejala', 'kasus.gejala_id = gejala.gejala_id')
                            ->get('kasus')
                            ->result();

        $this->data += array('kasus' => $kasus);

        $kerusakan = $this->db->get('kerusakan')
                            ->result();

        $this->data += array('kerusakan' => $kerusakan);

        $similarity = $this->db->select("   
                                            kerusakan.kerusakan_id,
                                            kasus.kasus_bobot,
                                            IF(
                                                kasus.gejala_id = konsultasi_gejala.gejala_id,
                                                1,
                                                0
                                            ) AS nilai"
                                        )
                            ->join('konsultasi_gejala', 'kasus.gejala_id = konsultasi_gejala.gejala_id AND konsultasi_gejala.konsultasi_id = "'.$id.'"', 'LEFT')
                            ->join('kerusakan', 'kasus.kerusakan_id = kerusakan.kerusakan_id')
                            ->join('gejala', 'gejala.gejala_id = konsultasi_gejala.gejala_id', 'LEFT')
                            ->get('kasus')
                            ->result();

        $this->data += array('similarity' => $similarity);

        $this->output->enable_profiler(ENVIRONMENT == 'development');
        $this->template->view($this->data['controller'] . '/' . $this->data['method'], $this->data);
    }
}