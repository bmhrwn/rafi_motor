<?php

class Mobil  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelMobil');
    }
    public function tambahmobil()
    {
        $nama_mobil = $this->input->post('nama_mobil');
        $plat_mobil = $this->input->post('plat_mobil');
        $nama_merk  = $this->input->post('nama_merk');
        $nama_type  = $this->input->post('nama_type');
        $tahun_mobil = $this->input->post('tahun_mobil');
        $harga_mobil = $this->input->post('harga_mobil');
        $tipe_mobil = $this->input->post('tipe_mobil');
        $varian = $this->input->post('varian');
        $cakupan_mesin = $this->input->post('cakupan_mesin');
        $transmisi = $this->input->post('transmisi');
        $penumpang = $this->input->post('penumpang');
        $kilometer = $this->input->post('kilometer');
        $warna = $this->input->post('warna');
        $bahan_bakar = $this->input->post('bahan_bakar');
        $warna_chart = $this->input->post('warna_chart');

        if ($nama_mobil != null && $nama_merk != null && $nama_type != null) {
            $foto_1 = $this->_updatePhoto('foto_1');
            $foto_2 = $this->_updatePhoto('foto_2');
            $foto_3 = $this->_updatePhoto('foto_3');



            $data = array(
                'nama_mobil'    => $nama_mobil,
                'id_type'       => $nama_type,
                'id_merk'       => $nama_merk,
                'warna_chart'   => $warna_chart,
            );
            $this->ModelMobil->addData($data);
            $getDataMobil = $this->ModelMobil->getDataMobilLast();
            $id_mobil = $getDataMobil['id_mobil'];
            $addGambar = array(
                'id_mobil'  => $id_mobil,
                'foto_1'    => $foto_1,
                'foto_2'    => $foto_2,
                'foto_3'    => $foto_3
            );
            $this->ModelMobil->addGambar($addGambar);
            $datadetail = array(
                'id_mobil'      => $id_mobil,
                'plat_mobil'    => $plat_mobil,
                'tahun_mobil'   => $tahun_mobil,
                'harga_mobil'   => $harga_mobil,
                'tipe_mobil'    => $tipe_mobil,
                'varian'        => $varian,
                'cakupan_mesin' => $cakupan_mesin,
                'transmisi'     => $transmisi,
                'penumpang'     => $penumpang,
                'kilometer'     => $kilometer,
                'warna'         => $warna,
                'bahan_bakar'   => $bahan_bakar
            );
            $this->ModelMobil->addDataDetail($datadetail);
            $this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
            $this->session->set_flashdata('title', 'Success!');
            redirect(base_url('dashboard/datamobil'));
        } else {
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Data Tidak Boleh Kosong');
            $this->session->set_flashdata('title', 'Gagal!');
            redirect(base_url('dashboard/datamobil'));
        }
    }

    public function _updatePhoto($nameFoto)
    {
        $config['upload_path']      = "./assets/admin/mobil/";
        $config['allowed_types']    = 'png|jpg|jpeg|gif';
        $this->upload->initialize($config);
        if ($this->upload->do_upload($nameFoto)) {
            $data_foto = array('data_upload' => $this->upload->data());
            $nama_foto = $data_foto['data_upload']['file_name'];
            return $nama_foto;
        } else {
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Foto Tidak Terupload');
            $this->session->set_flashdata('title', 'Gagal!');
            redirect(base_url('dashboard/datamobil'));
        }
    }

    public function deletemobil()
    {
        $id_mobil = $this->uri->segment(3);

        $this->ModelMobil->deleteData($id_mobil);
        $this->session->set_flashdata('type', 'success');
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus');
        $this->session->set_flashdata('title', 'Success!');
        redirect(base_url('dashboard/datamobil'));
    }
    public function updatemobil()
    {
        $id_mobil = $this->input->post('id_mobil');
        $nama_mobil = $this->input->post('nama_mobil');
        $id_type    = $this->input->post('nama_type');
        $id_merk    = $this->input->post('nama_merk');
        $plat_mobil = $this->input->post('plat_mobil');
        $nama_merk  = $this->input->post('nama_merk');
        $nama_type  = $this->input->post('nama_type');
        $tahun_mobil = $this->input->post('tahun_mobil');
        $harga_mobil = $this->input->post('harga_mobil');
        $tipe_mobil = $this->input->post('tipe_mobil');
        $varian = $this->input->post('varian');
        $cakupan_mesin = $this->input->post('cakupan_mesin');
        $transmisi = $this->input->post('transmisi');
        $penumpang = $this->input->post('penumpang');
        $kilometer = $this->input->post('kilometer');
        $warna = $this->input->post('warna');
        $bahan_bakar = $this->input->post('bahan_bakar');
        $warna_chart = $this->input->post('warna_chart');

        $cek_foto1 = $_FILES['foto_1']['name'];
        $cek_foto2 = $_FILES['foto_2']['name'];
        $cek_foto3 = $_FILES['foto_3']['name'];

        if ($id_mobil != null && $nama_mobil != null && $plat_mobil != null && $nama_merk != null && $nama_type != null && $tahun_mobil != null && $harga_mobil != null && $id_merk != null && $id_merk != null) {
            $data_gambar = $this->ModelMobil->getGambarMobil($id_mobil);
            if ($cek_foto1 != null) {
                $foto_1 = $this->_updatePhoto('foto_1');
            }else{
                $foto_1 = $data_gambar['foto_1'];
            }

            if($cek_foto2 != null){
                $foto_2 = $this->_updatePhoto('foto_2');
            }else{
                $foto_2 = $data_gambar['foto_2'];
            }

            if($cek_foto3 != null){
                $foto_3 = $this->_updatePhoto('foto_3');
            }else{
                $foto_3 = $data_gambar['foto_3'];
            }
            $addmobil = array(
                'id_type'   => $id_type,
                'id_merk'   => $id_merk,
                'nama_mobil' => $nama_mobil,
                'warna_chart'   => $warna_chart,

            );

            $addGambar = array(
                'id_mobil'  => $id_mobil,
                'foto_1'    => $foto_1,
                'foto_2'    => $foto_2,
                'foto_3'    => $foto_3
            );

            
            $datadetail = array(
                'plat_mobil'    => $plat_mobil,
                'tahun_mobil'   => $tahun_mobil,
                'harga_mobil'   => $harga_mobil,
                'tipe_mobil'    => $tipe_mobil,
                'varian'        => $varian,
                'cakupan_mesin' => $cakupan_mesin,
                'transmisi'     => $transmisi,
                'penumpang'     => $penumpang,
                'kilometer'     => $kilometer,
                'warna'         => $warna,
                'bahan_bakar'   => $bahan_bakar
            );

            $this->ModelMobil->updateGambar($addGambar,$id_mobil);
            $this->ModelMobil->updateDetailMobil($datadetail, $id_mobil);
            $this->ModelMobil->updateMobil($addmobil,$id_mobil);
            $this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('pesan', 'Data Berhasil Di Update');
            $this->session->set_flashdata('title', 'Success!');
            redirect(base_url('dashboard/datamobil'));
        } else {
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Data Tidak Boleh Kosong');
            $this->session->set_flashdata('title', 'Gagal!');
            redirect(base_url('dashboard/datamobil'));
        }
    }
}
