<?php

class Email extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUsers');
        $this->load->model('ModelPengajuan');
    }


    public function sendEmail()
    {
        $id = $this->uri->segment(3);
        $idNormalisasi = $this->uri->segment(4);


        $getDataUser = $this->ModelUsers->getDataDetailByIdUsers($id);
        $email = $getDataUser['email'];
        $nama = $getDataUser['full_name'];

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'rafimotor2020@gmail.com',
            'smtp_pass' => 'ayam14045',
            'mailtype'  => 'html',
            'smtp_timeout' => '4', //in seconds
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        $data = array(
            'date'  => date('d F Y'),
            'nama'  => $nama
        );
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        // Set to, from, message, etc.
        $this->email->from('RafiMotor', 'Admin RafiMotor');
        $this->email->to($email);

        $this->email->subject('Konfirmasi Pengajuan Kredit Mobil');
        $this->email->message($this->load->view('dashboard/email',$data,true));
        

        $this->email->send();
        $updateEmail = array(
            'is_email'  =>  1,
            'tanggal'   => date('Y-m-d')
        );
        $this->ModelPengajuan->updateIsEmail($updateEmail,$idNormalisasi);
        redirect(base_url('dashboard/datamenyetujui'));
    }
}
