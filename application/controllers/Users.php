<?php

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUsers');
    }
    public function updateprofileadmin()
    {   
        $id_detail      = $this->uri->segment(3);

        $full_name      = $this->input->post('full_name');
        $email          = $this->input->post('email');
        $hp             = $this->input->post('hp');
        $alamat         = $this->input->post('alamat');
        $tanggal_lahir  = $this->input->post('tanggal_lahir');
        $jenis_kelamin  = $this->input->post('jenis_kelamin');
        $cek_foto = $_FILES['foto']['name'];
    
        if ($full_name != null && $jenis_kelamin != null && $email != null && $hp != null && $alamat != null && $tanggal_lahir != null) {
            if ($cek_foto != null) {
            $config['upload_path']      = "./assets/admin/users/";
            $config['allowed_types']    = 'png|jpg|jpeg|gif';
            $this->upload->initialize($config);
                if ($this->upload->do_upload('foto')) {
                    $data_foto = array('data_upload' => $this->upload->data());
                    $nama_foto = $data_foto['data_upload']['file_name'];

                    $data = array(
                        'full_name' => $full_name,
                        'email'     => $email,
                        'hp'        => $hp,
                        'alamat'    => $alamat,
                        'tanggal_lahir' => $tanggal_lahir,
                        'jenis_kelamin' => $jenis_kelamin,
                        'foto'      => $nama_foto   
                    );
                    $this->ModelUsers->updateData($data,$id_detail);
                    $this->session->set_flashdata('type', 'success');
                    $this->session->set_flashdata('pesan', 'Data Berhasil Di Update');
                    $this->session->set_flashdata('title', 'Success!');
                    redirect(base_url('dashboard/profile'));
                }else{
                    $this->session->set_flashdata('type', 'warning');
                    $this->session->set_flashdata('pesan', 'Foto Tidak Terupload');
                    $this->session->set_flashdata('title', 'Gagal!');
                    redirect(base_url('dashboard/profile'));
                }
            } else {
                $data_foto = $this->ModelUsers->getDataFotoById($id_detail);
                $nama_foto = $data_foto['foto'];
                $data = array(
                    'full_name' => $full_name,
                    'email'     => $email,
                    'hp'        => $hp,
                    'alamat'    => $alamat,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jenis_kelamin' => $jenis_kelamin,
                    'foto'      => $nama_foto
                );
                $this->ModelUsers->updateData($data,$id_detail);
                $this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('pesan', 'Data Berhasil Di Update');
                $this->session->set_flashdata('title', 'Success!');
                redirect(base_url('dashboard/profile')); 
              
            }
        } else {
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Data Tidak Boleh Kosong');
            $this->session->set_flashdata('title', 'Gagal!');
            redirect(base_url('dashboard/profile'));
        }
    }
    
    public function ubahpasswordadmin(){
        $id_users = $this->session->userdata('id_users');

        $password_lama = $this->input->post('passwordlama');
        $password      = $this->input->post('password');
        $konfirmasi_password = $this->input->post('konfirmasi_password');

        $cek_password = $this->ModelUsers->getDataByPassword($password_lama);
        if($cek_password != null){
        if($password == $konfirmasi_password){
            $data = array(
                'password'  => $password

            );
            $this->ModelUsers->changePassword($data,$id_users);
            $this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('pesan', 'Password Berhasil Di Ubah');
            $this->session->set_flashdata('title', 'Berhasil!!!');
            redirect(base_url('dashboard/profile'));
        }else{
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Password Konfirmasi Tidak Cocok');
            $this->session->set_flashdata('title', 'Gagal!');
            redirect(base_url('dashboard/profile'));
        }
        }else{
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Password Lama Tidak Cocok');
            $this->session->set_flashdata('title', 'Gagal!');
            redirect(base_url('dashboard/profile'));
        }
    }
    public function ubahpasswordusers(){
        $id_users = $this->session->userdata('id_users');

        $password_lama = $this->input->post('passwordlama');
        $password      = $this->input->post('password');
        $konfirmasi_password = $this->input->post('konfirmasi_password');

        $cek_password = $this->ModelUsers->getDataByPassword($password_lama);
        if($cek_password != null){
        if($password == $konfirmasi_password){
            $data = array(
                'password'  => $password

            );
            $this->ModelUsers->changePassword($data,$id_users);
            $this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('pesan', 'Password Berhasil Di Ubah');
            $this->session->set_flashdata('title', 'Berhasil!!!');
            redirect(base_url('home/profile'));
        }else{
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Password Konfirmasi Tidak Cocok');
            $this->session->set_flashdata('title', 'Gagal!');
            redirect(base_url('home/profile'));
        }
        }else{
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Password Lama Tidak Cocok');
            $this->session->set_flashdata('title', 'Gagal!');
            redirect(base_url('home/profile'));
        }
    }
    public function readDetailUsers()
    {
        $id_nilai = $this->uri->segment(3);
        $getDataUsers = $this->ModelUsers->getDetailUsers($id_nilai);
        echo json_encode($getDataUsers);
    }

    public function updateProfileUsers(){
        $id_users = $this->session->userdata('id_users');
       
        $full_name = $this->input->post('full_name');
        $email  = $this->input->post('email');
        $hp     = $this->input->post('hp');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $alamat = $this->input->post('alamat');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $nik = $this->input->post('nik');
        $phone_1 = $this->input->post('phone_1');
        $phone_2 = $this->input->post('phone_2');
        $cekFoto = $_FILES['foto']['name'];
        
        $getDataProfile = $this->ModelUsers->getDataDetailByIdUsers($id_users);
        if($_FILES['foto_ktp']['name'] == null){
            $foto_ktp = $getDataProfile['foto_ktp'];
        }else{
            $foto_ktp          = $this->_updatePhoto('foto_ktp');
        }

       

        if($cekFoto != null){
            $config['upload_path']      = "./assets/admin/users/";
            $config['allowed_types']    = 'png|jpg|jpeg|gif';
            $this->upload->initialize($config);
            if($this->upload->do_upload('foto')){
                $data_foto = array('data_upload' => $this->upload->data());
                $nama_foto = $data_foto['data_upload']['file_name'];

            }else{
                $this->session->set_flashdata('type', 'warning');
                $this->session->set_flashdata('pesan', 'Foto Tidak terupload !!');
                $this->session->set_flashdata('title', 'Gagal!');
                redirect(base_url('home/profile'));
            }
        }else{
            $getDataUsers = $this->ModelUsers->getDataDetailByIdUsers($id_users);
            $nama_foto = $getDataUsers['foto'];
        }

        $data = array(
           
            'full_name'     => $full_name,
            'email'         => $email,
            'hp'            => $hp,
            'jenis_kelamin' => $jenis_kelamin,
            'alamat'        => $alamat,
            'tanggal_lahir' => $tanggal_lahir,
            'nik'           => $nik,
            'phone_1'       => $phone_1,
            'phone_2'       => $phone_2,
            'foto'          => $nama_foto,
            'foto_ktp'      => $foto_ktp
        );
        $this->ModelUsers->updateDataUsers($data,$id_users);
        $this->session->set_flashdata('type', 'success');
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Update');
        $this->session->set_flashdata('title', 'Success!');
        redirect(base_url('home/profile'));
        }
        public function _updatePhoto($nameFoto)
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
        }
    }
}
