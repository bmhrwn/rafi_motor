<?php

Class SubKriteria extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelKriteria');
        $this->load->model('ModelSubKriteria');
    }
    public function tambahsubkriteria(){
        $id_kriteria = $this->uri->segment(3);

        $sub_kriteria = $this->input->post('sub_kriteria');
        $bobot  = $this->input->post('bobot');

        $data_bobot = $this->ModelKriteria->getSubDataBobot($id_kriteria);
   
        if ($data_bobot['total_bobot'] == null) {
            $perbaikan_bobot = $bobot / $bobot;
            $data_kriteria = $this->ModelKriteria->getDataBobotById($id_kriteria);
            $perbaikan_bobot_kriteria = $data_kriteria['perbaikan_bobot'];
            $global_bobot = $perbaikan_bobot * $perbaikan_bobot_kriteria;
        } else {
            $total_bobot = $data_bobot['total_bobot'] + $bobot;
            $perbaikan_bobot = $bobot / $total_bobot;
            $data_kriteria = $this->ModelKriteria->getDataBobotById($id_kriteria);
            $perbaikan_bobot_kriteria = $data_kriteria['perbaikan_bobot'];
            $global_bobot = $perbaikan_bobot * $perbaikan_bobot_kriteria;
        }
        $data = array(
            'sub_kriteria'      => $sub_kriteria,
            'id_kriteria'       => $id_kriteria,
            'bobot'             => $bobot,
            'perbaikan_bobot'   => $perbaikan_bobot,
            'bobot_global'      => $global_bobot,
        );
        $this->ModelKriteria->addDataSubKriteria($data);
        $this->session->set_flashdata('type', 'success');
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
        $this->session->set_flashdata('title', 'Berhasil!!!');
        redirect(base_url('dashboard/datasubkriteria/'.$id_kriteria));
    }
    public function updatesubkriteria(){
        $id_kriteria = $this->uri->segment(3);
        $id_sub_kriteria = $this->input->post('id_sub_kriteria');
        
        $sub_kriteria = $this->input->post('sub_kriteria');
        $bobot = $this->input->post('bobot');

        $old_total_bobot = $this->ModelSubKriteria->getOldBobotById($id_kriteria);
        $data_sub_kriteria = $this->ModelSubKriteria->getBobotByIdSubKriteria($id_sub_kriteria);   
        $old_bobot = $data_sub_kriteria['bobot'];
        $total_bobot = ($old_total_bobot['old_total_bobot'] - $old_bobot) + $bobot;
        $perbaikan_bobot = $bobot / $total_bobot;
        $data_kriteria = $this->ModelKriteria->getDataBobotById($id_kriteria);
        $perbaikan_bobot_kriteria = $data_kriteria['perbaikan_bobot'];
        $bobot_global = $perbaikan_bobot * $perbaikan_bobot_kriteria;
        
        
        $data = array(
            'sub_kriteria'      => $sub_kriteria,
            'bobot'             => $bobot,
            'perbaikan_bobot'   => $perbaikan_bobot,
            'bobot_global'      => $bobot_global
        );
        $this->ModelSubKriteria->updateDataSubByIdSub($data,$id_sub_kriteria);
        $this->session->set_flashdata('type', 'success');
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Update');
        $this->session->set_flashdata('title', 'Berhasil!');
        redirect(base_url('dashboard/datasubkriteria/'.$id_kriteria));
        
    }
    public function hapusdata(){
        $id_sub_kriteria = $this->uri->segment(3);
        $id_kriteria = $this->uri->segment(4);

        $this->ModelSubKriteria->deleteData($id_sub_kriteria);
        $this->session->set_flashdata('type', 'success');
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus');
        $this->session->set_flashdata('title', 'Berhasil!');
        redirect(base_url('dashboard/datasubkriteria/'.$id_kriteria));
    }
}