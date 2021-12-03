<?php

class Merk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelMerk');
    }
    public function tambahmerk()
    {
        $nama_merk = $this->input->post('nama_merk');

        if ($nama_merk != null) {
            $data = array(
                'nama_merk' => $nama_merk

            );
            $this->ModelMerk->addData($data);
            $this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
            $this->session->set_flashdata('title', 'Berhasil!!!');
            redirect(base_url('dashboard/datamerk'));
        } else {
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Data Tidak Boleh Kosong');
            $this->session->set_flashdata('title', 'Gagal!!!');
            redirect(base_url('dashboard/datamerk'));
        }
    }
    public function updatemerk()
    {
        $id_merk = $this->input->post('id_merk');
        $nama_merk = $this->input->post('nama_merk');
        if ($id_merk != null && $nama_merk != null) {
            $data = array(
                'nama_merk' => $nama_merk
            );
            $this->ModelMerk->updateData($data, $id_merk);
            $this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('pesan', 'Data Berhasil Di Update');
            $this->session->set_flashdata('title', 'Berhasil!!!');
            redirect(base_url('dashboard/datamerk'));
        } else {
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Data Tidak Boleh Kosong');
            $this->session->set_flashdata('title', 'Gagal!!!');
            redirect(base_url('dashboard/datamerk'));
        }
    }
    public function deletemerk()
    {
        $id_merk = $this->uri->segment(3);

        $this->ModelMerk->deleteData($id_merk);
        $this->session->set_flashdata('type', 'success');
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus');
        $this->session->set_flashdata('title', 'Berhasil!!!');
        redirect(base_url('dashboard/datamerk'));
    }
}
