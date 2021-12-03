<?php

class Type extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelType');
    }
    public function tambahtype()
    {
        $nama_type = $this->input->post('nama_type');

        if ($nama_type != null) {
            $data = array(
                'nama_type' => $nama_type

            );
            $this->ModelType->addData($data);
            $this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
            $this->session->set_flashdata('title', 'Berhasil!');
            redirect(base_url('dashboard/datatype'));
        } else {
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Data Tidak Boleh Kosong');
            $this->session->set_flashdata('title', 'Gagal!');
            redirect(base_url('dashboard/datatype'));
        }
    }
    public function updatetype(){
        $id_type = $this->input->post('id_type');
        $nama_type = $this->input->post('nama_type');
        if($id_type != null && $nama_type != null ){
            $data = array(
                'nama_type' => $nama_type
            );
            $this->ModelType->updateData($data,$id_type);
            $this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('pesan', 'Data Berhasil Di Update');
            $this->session->set_flashdata('title', 'Berhasil!!!');
            redirect(base_url('dashboard/datatype'));

        }else{
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Data Tidak Boleh Kosong');
            $this->session->set_flashdata('title', 'Gagal!');
            redirect(base_url('dashboard/datatype'));
        }
    }
    public function deletetype(){
    $id_type = $this->uri->segment(3);
    
    $this->ModelType->deleteData($id_type);
    $this->session->set_flashdata('type', 'success');
    $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus');
    $this->session->set_flashdata('title', 'Berhasil!!!');
    redirect(base_url('dashboard/datatype'));
    }
}
