<?php

class Pengajuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUsers');
        $this->load->model('ModelPengajuan');
        $this->load->model('ModelSubKriteria');
        $this->load->model('ModelWeight');
    }
    public function inputpengajuan()
    {
       
        $id_mobil  = $this->uri->segment(3);
        $nik       = $this->input->post('nik');
        $id_users   = $this->session->userdata('id_users');
        $id_detail    = $this->session->userdata('id_detail');
        $full_name  = $this->input->post('full_name');
        $email      = $this->input->post('email');
        $alamat     = $this->input->post('alamat');
        $hp         = $this->input->post('hp');
        $phone_1    = $this->input->post('phone_1');
        $phone_2    = $this->input->post('phone_2');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $status_pernikahan = $this->input->post('status_pernikahan');
        $alamat_kantor = $this->input->post('alamat_kantor');
        $no_kantor = $this->input->post('no_kantor');
     

        $gaji              = $this->input->post('gaji');
        $status            = $this->input->post('status');
        $tanggungan        = $this->input->post('tanggungan');
        $jangka_waktu      = $this->input->post('jangka_waktu');
        $dp                = $this->input->post('dp');
        $usia              = $this->input->post('usia');
        $harga_dp          = $this->input->post('harga_dp');
        $cicilan           = $this->input->post('cicilan');
        $gajiAwal          = $this->input->post('gaji_awal');

        if($status_pernikahan == "Belum Menikah"){
            $tanggungan = 29;
        }

   

        if($_FILES['foto_status']['name'] == null){
            $foto_status = "";
        }else{
            $foto_status       = $this->_updatePhoto('foto_status',$id_mobil);
        }

        $getDataProfile = $this->ModelUsers->getDataDetailByIdUsers($id_users);
        if($_FILES['foto_ktp']['name'] == null){
            $foto_ktp = $getDataProfile['foto_ktp'];
        }else{
            $foto_ktp          = $this->_updatePhoto('foto_ktp',$id_mobil);
        }

      
        if ($nik != null && $alamat != null && $hp != null && $gaji != null && $status != null && $tanggungan != null && $jangka_waktu != null && $dp != null && $usia != null && $tanggal_lahir != null && $phone_1 != null && $phone_2 != null && $status_pernikahan != null && $no_kantor != null && $alamat_kantor != null) {

            
            $foto_gaji         = $this->_updatePhoto('foto_gaji',$id_mobil);
            $foto_npwp         = $this->_updatePhoto('foto_npwp',$id_mobil);
            $foto_buku_tabungan = $this->_updatePhoto('foto_buku_tabungan',$id_mobil);
            $foto_tanggungan   = $this->_updatePhoto('foto_tanggungan',$id_mobil);


            $data = array(
                'full_name'     => $full_name,
                'email'         => $email,
                'alamat'        => $alamat,
                'hp'            => $hp,
                'tanggal_lahir' => $tanggal_lahir,
                'phone_1'       => $phone_1,
                'phone_2'       => $phone_2,
                'nik'           => $nik,
                'foto_ktp'      => $foto_ktp,
                'status_pernikahan' => $status_pernikahan,
                'alamat_kantor' => $alamat_kantor,
                'no_kantor'     => $no_kantor,
            );
            $this->ModelUsers->updateData($data, $id_detail);

            $cek_data_pengajuan = $this->ModelPengajuan->getDataPengajuanByIdUsers3($id_users);
            $status_pengajuan = $cek_data_pengajuan['status_pengajuan'];
            if ($status_pengajuan == 3 || $status_pengajuan == 1 || $cek_data_pengajuan == null) {
                $input_penilaian = array(
                    'nilai_gaji'        => $gaji,
                    'nilai_status'      => $status,
                    'nilai_tanggungan'  => $tanggungan,
                    'nilai_jangka'      => $jangka_waktu,
                    'nilai_dp'          => $dp,
                    'nilai_usia'        => $usia,
                    'id_users'          => $id_users,
                    'id_mobil'          => $id_mobil,
                    'harga_dp'          => $harga_dp,
                    'cicilan'           => $cicilan,
                    'tanggal_pengajuan' => date('Y-m-d'),
                    'foto_gaji'         => $foto_gaji,
                    'foto_status'       => $foto_status,
                    'foto_npwp'         => $foto_npwp,
                    'foto_buku_tabungan' => $foto_buku_tabungan,
                    'foto_tanggungan'   => $foto_tanggungan,
                    'gaji_awal'         => $gajiAwal

                );
                $this->ModelPengajuan->insertData($input_penilaian);
                $getDataPengajuan = $this->ModelPengajuan->getDataPengajuanByIdUsers($id_users);
                $insertNormalisasi = array(
                    'id_penilaian'  => $getDataPengajuan['id_penilaian']
                );
                $insertKonfirmasi = array(
                    'id_penilaian'  => $getDataPengajuan['id_penilaian'],
                );
                $this->ModelPengajuan->insertKonfirmasi($insertKonfirmasi);
                $this->ModelPengajuan->insertNormalisasi($insertNormalisasi);
                redirect(base_url('home/thankyou'));
            } else {
                $this->session->set_flashdata('type', 'info');
                $this->session->set_flashdata('pesan', 'Pengajuan Sudah Ada, Silahkan Ajukan kembali jika pengajuan anda ditolak');
                $this->session->set_flashdata('title', 'Informasi!');
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Data Tidak Boleh Kosong');
            $this->session->set_flashdata('title', 'Gagal!');
            redirect(base_url('home/pengajuan/'.$id_mobil));
        }
    }

    public function _updatePhoto($nameFoto,$id_mobil)
    {
        $config['upload_path']      = "./assets/admin/buktipengajuan/";
        $config['allowed_types']    = 'png|jpg|jpeg|gif';
        $this->upload->initialize($config);
        if ($this->upload->do_upload($nameFoto)) {
            $data_foto = array('data_upload' => $this->upload->data());
            $nama_foto = $data_foto['data_upload']['file_name'];
            return $nama_foto;
        } else  if($nameFoto == "foto_status"){
            return "";
            
        }else{
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Mohon lengkapi berkas-berkas yang dibutuhkan');
            $this->session->set_flashdata('title', 'Gagal!');
            redirect(base_url('home/pengajuan/'.$id_mobil));
        }
    }


    public function readDetailPengajuan()
    {
        $id_nilai = $this->uri->segment(3);
        $getDataPenilaian = $this->ModelSubKriteria->getDetailNilaiSubKriteria($id_nilai);
        echo json_encode($getDataPenilaian);
    }
    public function readDetailMobil()
    {
        $id_mobil = $this->uri->segment(3);
        $getDataMobil = $this->ModelSubKriteria->getDetailMobil($id_mobil);
        echo json_encode($getDataMobil);
    }

    public function confirmPengajuan()
    {
        $id = $this->uri->segment(3);
        $checktanggal = $this->input->post('check_tanggal');
        $checkusia = $this->input->post('check_usia');
        $checkKtp = $this->input->post('check_ktp');   
        $check_phone1 = $this->input->post('check_phone1');
        $check_phone2 = $this->input->post('check_phone2');         
        $check_gaji    = $this->input->post('check_gaji');
        $check_tanggungan = $this->input->post('check_tanggungan');
        $check_statusrumah = $this->input->post('check_statusrumah');
        $checknpwp = $this->input->post('check_npwp');
        $checktabungan = $this->input->post('check_tabungan');
        $check_pernikahan = $this->input->post('check_pernikahan');
        $check_alamatkantor  = $this->input->post('check_alamatkantor');
        $check_nokantor     = $this->input->post('check_nokantor');

        
        $ktp = $this->_checkData($checkKtp);
        $tanggal = $this->_checkData($checktanggal);
        $usia = $this->_checkData($checkusia);
        $phone1 = $this->_checkData($check_phone1);
        $phone2 = $this->_checkData($check_phone2);
        $gaji = $this->_checkData($check_gaji);
        $tanggungan = $this->_checkData($check_tanggungan);
        $statusrumah = $this->_checkData($check_statusrumah);
        $npwp = $this->_checkData($checknpwp);
        $tabungan = $this->_checkData($checktabungan);
        $pernikahan = $this->_checkData($check_pernikahan);
        $alamatkantor = $this->_checkData($check_alamatkantor);
        $nokantor  = $this->_checkData($check_nokantor);
        $kredit_ke = $this->input->post('kredit_ke');
        $gaji_akhir = $this->input->post('gaji_akhir');
        
        $getDataPengajuan = $this->ModelPengajuan->getDataPenilaian($id);
        $cicilan = $getDataPengajuan['cicilan'];

        if($kredit_ke == "44"){
            $gaji_akhir = 0;
            $finalGaji = $getDataPengajuan['gaji_awal'];
        }else{
            $finalGaji = $gaji_akhir;
        }

        if($finalGaji < 4000000){
            $besarGaji = 8;
        }else if($finalGaji > 4000000 && $finalGaji < 6000000){
            $besarGaji = 10;
        }else if($finalGaji > 6000000 && $finalGaji < 8000000){
            $besarGaji = 11;
        }else if($finalGaji > 8000000){
            $besarGaji = 12;
        }


        

        if($checkKtp != null && $checktanggal != null && $checkusia && $check_phone1 != null && $check_phone2 != null && $check_gaji != null && $check_tanggungan != null && $check_statusrumah != null && $checknpwp != null && $checktabungan != null && $check_pernikahan != null && $check_alamatkantor != null && $check_nokantor != null){
            
            $getDataPenilaian = $this->ModelPengajuan->getDataPenilaian($id);
            //gaji
            $nilai_gaji = $getDataPenilaian['nilai_gaji'];
            $getDetailGaji = $this->ModelSubKriteria->getDetailNilaiSubKriteria($nilai_gaji);
            //status
            $nilai_status = $getDataPenilaian['nilai_status'];
            $getDetailStatus = $this->ModelSubKriteria->getDetailNilaiSubKriteria($nilai_status);
            //tanggungan
            $nilai_tanggungan = $getDataPenilaian['nilai_tanggungan'];
            $getDetailTanggungan = $this->ModelSubKriteria->getDetailNilaiSubKriteria($nilai_tanggungan);
            //jangka

            $nilai_jangka = $getDataPenilaian['nilai_jangka'];
            $getDetailJangka = $this->ModelSubKriteria->getDetailNilaiSubKriteria($nilai_jangka);
            //jumlah kredit

            $nilai_kreditke = $getDataPenilaian['nilai_kreditke'];
            $getDetailKreditKe = $this->ModelSubKriteria->getDetailNilaiSubKriteria($nilai_kreditke);
            //usia
            $nilai_usia = $getDataPenilaian['nilai_usia'];
            $getDetailUsia = $this->ModelSubKriteria->getDetailNilaiSubKriteria($nilai_usia);

            //dp
            $nilai_dp = $getDataPenilaian['nilai_dp'];
            $getDetailDp = $this->ModelSubKriteria->getDetailNilaiSubKriteria($nilai_dp);

            
            
            $vector_s = (pow($getDetailGaji['bobot'], $getDetailGaji['bobot_global'])) * 
                        (pow($getDetailStatus['bobot'], $getDetailStatus['bobot_global'])) * 
                        (pow($getDetailTanggungan['bobot'], $getDetailTanggungan['bobot_global'])) * 
                        (pow($getDetailJangka['bobot'], $getDetailJangka['bobot_global'])) * 
                        (pow($getDetailKreditKe['bobot'], $getDetailKreditKe['bobot_global'])) * 
                        (pow($getDetailUsia['bobot'], $getDetailUsia['bobot_global'])) * 
                        (pow($getDetailDp['bobot'],$getDetailDp['bobot_global']));
            
           

           
            $sisaGaji = $finalGaji - $cicilan;
            if($sisaGaji < $cicilan){
                $updateStatusPengajuan = array(
                    'status'    => 2
                );
                $data = array(
                    'nilai_vector_s'    => $vector_s,
                    'status_pengajuan'  => 1
                );
            }else{
                $updateStatusPengajuan = array(
                    'status'    => 1
                );
                $data = array(
                    'nilai_vector_s'    => $vector_s,
                    'status_pengajuan'  => 2
                );
            }
    
           
           
    
            $this->ModelPengajuan->updateData($updateStatusPengajuan, $id);
            // $this->ModelPengajuan->insertNormalisasi($data);
            $this->ModelPengajuan->updateNormalisasi($data, $id);
           
        }else{
            $updateStatus = array(
                'status'    => 2
            );

            $updateNormalisasi = array(
                'status_pengajuan'  => 1
            );
            $this->ModelPengajuan->updateData($updateStatus, $id);
            $this->ModelPengajuan->updateNormalisasi($updateNormalisasi, $id);
           
        }

        $updateKonfirmasi = array(
          
            'check_ktp'         => $ktp,
            'check_tgllahir'    => $tanggal,
            'check_usia'        => $usia,
            'check_phone1'      => $phone1,
            'check_phone2'      => $phone2,
            'check_gaji'        => $gaji,
            'check_tanggungan'  => $tanggungan,
            'check_statusrumah' => $statusrumah,
            'check_npwp'        => $npwp,
            'check_tabungan'    => $tabungan,
            'check_pernikahan'  => $pernikahan,
            'check_alamatkantor'  => $alamatkantor,
            'check_nokantor'    => $nokantor
               
        );




        if($gaji_akhir == 0){
            $updatePengajuan = [
                'nilai_kreditke'     => $kredit_ke,
                'gaji_akhir'        => $gaji_akhir
            ];
        }else{
           
            $updatePengajuan = [
                'nilai_kreditke'     => $kredit_ke,
                'gaji_akhir'        => $gaji_akhir,
                'nilai_gaji'        => $besarGaji
            ];
        }

        
        $this->ModelPengajuan->updateDataPengajuan($updatePengajuan,$id);
        $this->ModelPengajuan->updateKonfirmasi($updateKonfirmasi,$id);
        $this->session->set_flashdata('type', 'success');
        $this->session->set_flashdata('pesan', 'Data Pengajuan Berhasil diperiksa ');
        $this->session->set_flashdata('title', 'Berhasil!');
        redirect(base_url('dashboard/datakonfirmasi'));


        
    }

    public function _checkData($data){
        if($data != null){
            $data = 1;
        }else{
            $data = 0;
        }

        return $data;
    }

    public function hitungAkhir()
    {
        $readDataNormalisasi = $this->ModelWeight->getDataHitung(2);
        $getTotalVectorS = $this->ModelWeight->getTotalVectorS(2);
        $totalVectorV = $getTotalVectorS['total'];
        $totalnilaiVectorV = 0;
        $penentuanKelayakan = 0;

        //menentukan nilai tengah
        foreach ($readDataNormalisasi as $rdn) {
            $nilai_vector_v = $rdn['nilai_vector_s'] / $totalVectorV;
            $totalnilaiVectorV += $nilai_vector_v;
            $penentuanKelayakan = $totalnilaiVectorV / count($readDataNormalisasi);
        }

        //menentukan kelayakan dari nilai tengah

        foreach ($readDataNormalisasi as $nilai) {
            $nilai_vector_v = $nilai['nilai_vector_s'] / $totalVectorV;
            if ($nilai_vector_v >= $penentuanKelayakan) {
                $status = 4;
            } else {
                $status = 3;
            }

            $data = array(array(
                'id_normalisasi'    => $nilai['id_normalisasi'],
                'nilai_vector_v'    => $nilai_vector_v,
                'status_pengajuan'  => $status
            ));
            // $this->ModelWeight->updateVectorV($data,'id_normalisasi');
            $this->db->update_batch('tbl_normalisasi', $data, 'id_normalisasi');
        }
        $this->session->set_flashdata('type', 'success');
        $this->session->set_flashdata('pesan', 'Berhasil Menghitung Kelayakan Customer');
        $this->session->set_flashdata('title', 'Berhasil!');
        redirect(base_url('dashboard/datapenilaian'));
    }
    public function menyetujuipengajuan()
    {
        $id_penilaian = $this->uri->segment(3);

        $data = array(
            'is_approve'    => 1,

        );
        $this->ModelWeight->changeAprrove($data, $id_penilaian);
        redirect(base_url('dashboard/datapenilaian'));
    }
    public function batalpengajuan()
    {
        $id_penilaian = $this->uri->segment(3);

        $this->ModelPengajuan->deleteDataPengajuan($id_penilaian);
        redirect(base_url('home/riwayat'));
    }
    public function ubahpengajuan()
    {
        $id_penilaian = $this->input->post('id_penilaian');
        $nilai_gaji   = $this->input->post('gaji');
        $nilai_status = $this->input->post('status');
        $nilai_tanggungan = $this->input->post('tanggungan');
        $nilai_jangka   = $this->input->post('jangka_waktu');
        $nilai_kredit_ke      = $this->input->post('kredit_ke');
        $nilai_usia     = $this->input->post('usia');
        if ($id_penilaian != null && $nilai_gaji != null && $nilai_status != null && $nilai_tanggungan != null && $nilai_jangka != null && $nilai_kredit_ke != null && $nilai_usia != null) {
            $data = array(
                'nilai_gaji'        => $nilai_gaji,
                'nilai_status'      => $nilai_status,
                'nilai_tanggungan'  => $nilai_tanggungan,
                'nilai_jangka'      => $nilai_jangka,
                'nilai_kreditke'    => $nilai_kredit_ke,
                'nilai_usia'        => $nilai_usia
            );
            $this->ModelPengajuan->updateDataPengajuan($data, $id_penilaian);
            $this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('pesan', 'Berhasil Ubah Pengajuan');
            $this->session->set_flashdata('title', 'Berhasil!');
            redirect(base_url('home/riwayat'));
        } else {
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Data Tidak Boleh Kosong');
            $this->session->set_flashdata('title', 'Gagal!');
            redirect(base_url('home/riwayat'));
        }
    }
  
}
