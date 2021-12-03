<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelMobil');
        $this->load->model('ModelUsers');
        $this->load->model('ModelSubKriteria');
        $this->load->model('ModelPengajuan');
    }
    public function index()
    {
        $data = array(
            'title' => 'Home - Rafi Motor',
            'active_home' => 'active'
        );
        $this->load->view('home/layout/header', $data);
        $this->load->view('home/layout/navbar');
        $this->load->view('home/layout/content');
        $this->load->view('home/layout/footer');
    }
    public function product()
    {
        $data = array(
            'title' => 'Produk - Rafi Motor',
            'data_mobil'    => $this->ModelMobil->getData(),
            'active_product'    => 'active'
        );
        $this->load->view('home/layout/header', $data);
        $this->load->view('home/layout/navbar');
        $this->load->view('home/product/product');
        $this->load->view('home/layout/footer');
    }
    public function detailproduct()
    {
        $id_mobil = $this->uri->segment(3);
        $getDataMobil = $this->ModelMobil->getDetailMobil($id_mobil);
        $id_merk = $getDataMobil['id_merk'];
        $data = array(
            'title' => 'Product - Rafi Motor',
            'active_product'    => 'active',
            'data_detail_mobil' => $this->ModelMobil->getDetailMobil($id_mobil),
            'data_terkait'      => $this->ModelMobil->getDataByIdMerk($id_merk, $id_mobil)
        );
        $this->load->view('home/layout/header', $data);
        $this->load->view('home/layout/navbar');
        $this->load->view('home/product/detailproduct');
        $this->load->view('home/layout/footer');
    }
    public function pengajuan()
    {
        $id_users = $this->session->userdata('id_users');
        $id_mobil = $this->uri->segment(3);
        $db_id_users   = $this->session->userdata('id_users');
        $data_riwayat = $this->ModelPengajuan->getDataPengajuanIdUsers($id_users);

        if($data_riwayat != null){

            $data_riwayat += $this->getSubKriteria($data_riwayat['nilai_gaji'], 'gaji');
            $data_riwayat += $this->getSubKriteria($data_riwayat['nilai_status'], 'status1');
            $data_riwayat += $this->getSubKriteria($data_riwayat['nilai_tanggungan'], 'tanggungan');
            $data_riwayat += $this->getSubKriteria($data_riwayat['nilai_jangka'], 'jangka');
            $data_riwayat += $this->getSubKriteria($data_riwayat['nilai_dp'], 'dp');
            $data_riwayat += $this->getSubKriteria($data_riwayat['nilai_usia'], 'usia');
        }



        // $data_riwayat += array('cacad' => "cacad");
       

        if ($this->session->userdata('username') != null) {
            $data = array(
                'title'              => 'Pengajuan - Rafi Motor',
                'active_product'     => 'active',
                'data_users'         => $this->ModelUsers->getDataDetailByIdUsers($db_id_users),
                'data_gaji'          => $this->ModelSubKriteria->getDataSubById('14'),
                'data_rumah'         => $this->ModelSubKriteria->getDataSubById('2'),
                'data_tanggungan'    => $this->ModelSubKriteria->getDataSubById('9'),
                'data_jangka'        => $this->ModelSubKriteria->getDataSubById('10'),
                'data_kreditke'      => $this->ModelSubKriteria->getDataSubById('11'),
                'data_usia'          => $this->ModelSubKriteria->getDataSubById('12'),
                'data_mobil'         => $this->ModelMobil->getDetailMobil($id_mobil),
                'data_riwayat'       => $data_riwayat
            );

            
            $this->load->view('home/layout/header', $data);
            $this->load->view('home/layout/navbar');
            $this->load->view('home/product/pengajuan');
            $this->load->view('home/layout/footer');
        } else {
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Silahkan Login Terlebih Dahulu');
            $this->session->set_flashdata('title', 'Failed!');
            redirect(base_url());
        }
    }

    public function getSubKriteria($nilai, $keterangan)
    {
        $dataKriteria = $this->ModelSubKriteria->getDetailNilaiSubKriteria($nilai);
        $detail = $dataKriteria['sub_kriteria'];
        if ($keterangan == "gaji") {
            return array("gaji" => $detail);
        } else if ($keterangan == "status1") {
            return array("status1" => $detail);
        } else if ($keterangan == "tanggungan") {
            return array("tanggungan" => $detail);
        } else if ($keterangan == "jangka") {
            return array("jangka" => $detail);
        }else if ($keterangan == "dp") {
            return array("dp" => $detail);
        }else if ($keterangan == "usia") {
            return array("usia" => $detail);
        }
    }
    public function thankyou()
    {

        $data = array(
            'title'              => 'Terima Kasih - Rafi Motor',
            'active_product'     => 'active',
        );
        $this->load->view('home/layout/header', $data);
        $this->load->view('home/layout/navbar');
        $this->load->view('home/product/thankyou');
        $this->load->view('home/layout/footer');
    }
    public function riwayat()
    {
        $id_users = $this->session->userdata('id_users');
        if ($this->session->userdata('username') != null) {
            $data = array(
                'title'              => 'Riwayat Pengajuan - Rafi Motor',
                'active_riwayat'     => 'active',

                'data_gaji'          => $this->ModelSubKriteria->getDataSubById('14'),
                'data_rumah'         => $this->ModelSubKriteria->getDataSubById('2'),
                'data_tanggungan'    => $this->ModelSubKriteria->getDataSubById('9'),
                'data_jangka'        => $this->ModelSubKriteria->getDataSubById('10'),
                'data_kreditke'      => $this->ModelSubKriteria->getDataSubById('11'),
                'data_usia'          => $this->ModelSubKriteria->getDataSubById('12'),
                'data_riwayat'       => $this->ModelPengajuan->getDataRiwayat($id_users),


            );


            $this->load->view('home/layout/header', $data);
            $this->load->view('home/layout/navbar');
            $this->load->view('home/riwayat/riwayat');
            $this->load->view('home/layout/footer');
        } else {
            redirect(base_url());
        }
    }
    public function profile()
    {
        $db_id_users = $this->session->userdata('id_users');

        if ($this->session->userdata('username') != null) {
            $data = array(
                'title'              => 'Profile - Rafi Motor',
                'active_profile'     => 'active',
                'data_users'    => $this->ModelUsers->getDataDetailByIdUsers($db_id_users)

            );



            $this->load->view('home/layout/header', $data);
            $this->load->view('home/layout/navbar');
            $this->load->view('home/profile/profile');
            $this->load->view('home/layout/footer');
        } else {
            redirect(base_url());
        }
    }
}
