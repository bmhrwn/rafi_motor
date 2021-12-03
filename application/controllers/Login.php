<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUsers');
    }
    public function index()
    {
        if ($this->session->userdata('username') != null) {
            redirect(base_url('dashboard'));
        }
        $this->load->view('login/index');
    }
    public function daftar()
    {
        $this->load->view('login/daftar');
    }
    public function proseslogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($username != null && $password != null) {
            $cekuser = $this->ModelUsers->getDataByUsername($username);
            if ($cekuser != null) {
                $db_pass = $cekuser['password'];
                if ($password == $db_pass) {
                    $role = $cekuser['role'];
                    if ($role == 0) {
                        $db_id_users = $cekuser['id_users'];
                        $cekdetail = $this->ModelUsers->getDataDetailByIdUsers($db_id_users);
                        $this->session->set_userdata('full_name', $cekdetail['full_name']);
                        $this->session->set_userdata('id_detail', $cekdetail['id_detail']);
                        $this->session->set_userdata('id_users', $cekdetail['id_users']);
                        $this->session->set_userdata('username', $cekuser['username']);
                        $this->session->set_userdata('user', true);
                        redirect(base_url('home'));
                    } else if($role == 1) {
                        $db_id_users = $cekuser['id_users'];
                        $cekdetail = $this->ModelUsers->getDataDetailByIdUsers($db_id_users);
                        $this->session->set_userdata('full_name', $cekdetail['full_name']);
                        $this->session->set_userdata('id_detail', $cekdetail['id_detail']);
                        $this->session->set_userdata('id_users', $cekdetail['id_users']);
                        $this->session->set_userdata('username', $cekuser['username']);
                        $this->session->set_userdata('admin', true);
                        redirect(base_url('dashboard'));
                    }else{
                        $db_id_users = $cekuser['id_users'];
                        $cekdetail = $this->ModelUsers->getDataDetailByIdUsers($db_id_users);
                        $this->session->set_userdata('full_name', $cekdetail['full_name']);
                        $this->session->set_userdata('id_detail', $cekdetail['id_detail']);
                        $this->session->set_userdata('id_users', $cekdetail['id_users']);
                        $this->session->set_userdata('username', $cekuser['username']);
                        $this->session->set_userdata('pemilik', true);
                        redirect(base_url('dashboard'));
                    }
                } else {
                    $this->session->set_flashdata('type', 'warning');
                    $this->session->set_flashdata('pesan', 'Password Tidak Cocok');
                    $this->session->set_flashdata('title', 'Gagal!');
                    redirect(base_url('login'));
                }
            } else {
                $this->session->set_flashdata('type', 'warning');
                $this->session->set_flashdata('pesan', 'Username Tidak Terdaftar');
                $this->session->set_flashdata('title', 'Gagal!');
                redirect(base_url('login'));
            }
        } else {
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Username dan Password Tidak Boleh Kosong');
            $this->session->set_flashdata('title', 'Gagal!');
            redirect(base_url('login'));
        }
    }
    public function proses_daftar()
    {
        $username = $this->input->post('username');
        $full_name = $this->input->post('full_name');
        $email     = $this->input->post('email');
        $password   = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');

        if($username != null && $full_name != null && $email != null && $password != null && $confirm_password != null){
        if ($password == $confirm_password) {
            $cek_data = $this->ModelUsers->getDataByUsername($username);
            $cek_email = $this->ModelUsers->getDataDetailUsers($email);
            if ($cek_data == null) {
            if($cek_email == null ){
           
                $data = array(
                    'username'  => $username,
                    'password'  => $password,
                );
                $this->ModelUsers->insertDataUsers($data);
                $get_data = $this->ModelUsers->getDataByUsername($username);
                $id_users = $get_data['id_users'];

                $input_data = array(
                    'id_users' => $id_users,
                    'full_name' => $full_name,
                    'email'     => $email
                );
                $this->ModelUsers->insertDataDetailUsers($input_data);
                $this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('pesan', 'Berhasil Daftar');
                $this->session->set_flashdata('title', 'Success!');
                redirect(base_url('login/daftar'));
            } else {
                $this->session->set_flashdata('type', 'warning');
                $this->session->set_flashdata('pesan', 'Email Telah Digunakan');
                $this->session->set_flashdata('title', 'Gagal!');
                redirect(base_url('login/daftar'));
            }
        } else {
            $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Username Telah Digunakan');
            $this->session->set_flashdata('title', 'Gagal!');
            redirect(base_url('login/daftar'));
        }
    }else{
         $this->session->set_flashdata('type', 'warning');
            $this->session->set_flashdata('pesan', 'Password Tidak Cocok');
            $this->session->set_flashdata('title', 'Gagal!');
            redirect(base_url('login/daftar'));
    }
    }else{
        $this->session->set_flashdata('type', 'warning');
        $this->session->set_flashdata('pesan', 'Data Tidak Boleh Kosong');
        $this->session->set_flashdata('title', 'Gagal!');
        redirect(base_url('login/daftar'));
    }
}
    public function proseslogout()
    {
        session_destroy();
        redirect(base_url());
    }
}
