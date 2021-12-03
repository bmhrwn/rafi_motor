<?php

class Kriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelKriteria');
    }
    public function tambahkriteria()
    {
        $kode = $this->input->post('kode');
        $kriteria = $this->input->post('kriteria');
        $bobot  = $this->input->post('bobot');

        $data_bobot = $this->ModelKriteria->getDataBobot();
        if ($data_bobot['total_bobot'] == null) {
            $perbaikan_bobot = $bobot / $bobot;
        } else {
            $total_bobot = $data_bobot['total_bobot'] + $bobot;
            $perbaikan_bobot = $bobot / $total_bobot;
        }

        $data = array(
            'kode'  => $kode,
            'kriteria'  => $kriteria,
            'bobot'   => $bobot,
            'perbaikan_bobot'   => $perbaikan_bobot
        );
        $this->ModelKriteria->addData($data);
        $this->session->set_flashdata('type', 'success');
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
        $this->session->set_flashdata('title', 'Berhasil!!!');
        redirect(base_url('dashboard/datakriteria'));
    }
    public function updatekriteria(){
        $id_kriteria = $this->input->post('id_kriteria');
        $kode = $this->input->post('kode');
        $kriteria = $this->input->post('kriteria');
        $bobot = $this->input->post('bobot');

        $data_kriteria = $this->ModelKriteria->getDataBobotById($id_kriteria);
        $old_bobot = $data_kriteria['bobot'];
        $data_bobot = $this->ModelKriteria->getDataBobot();
        $total_bobot = ($data_bobot['total_bobot'] - $old_bobot) + $bobot;
        $perbaikan_bobot = $bobot / $total_bobot;
        
        $data = array(
        
            'kode'  => $kode,
            'kriteria'  => $kriteria,
            'bobot'    => $bobot,
            'perbaikan_bobot' => $perbaikan_bobot
        );
        $this->ModelKriteria->updateData($data,$id_kriteria);
        $this->session->set_flashdata('type', 'success');
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Update');
        $this->session->set_flashdata('title', 'Berhasil!!!');
        redirect(base_url('dashboard/datakriteria'));
    }
    public function deletekriteria(){
        $id_kriteria = $this->uri->segment(3);

        $this->ModelKriteria->deleteDataById($id_kriteria);
        $this->session->set_flashdata('type', 'success');
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Delete');
        $this->session->set_flashdata('title', 'Berhasil!!!');
        redirect(base_url('dashboard/datakriteria'));
    }
}
