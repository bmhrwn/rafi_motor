<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        if ($this->session->userdata('admin') == false && $this->session->userdata('pemilik') == false) {
            redirect(base_url());
        }


        $this->load->model('ModelType');
        $this->load->model('ModelMerk');
        $this->load->model('ModelMobil');
        $this->load->model('ModelUsers');
        $this->load->model('ModelKriteria');
        $this->load->model('ModelPengajuan');
        $this->load->model('ModelWeight');
    }
    public function index()
    {
        // var_dump($this->session->userdata('admin'));die;
        $username = $this->session->userdata('id_users');
        $getdatamobil = $this->ModelMobil->getDataMobilCount();
        $getdatalayak = $this->ModelPengajuan->getDataLayakCount(4);
        $getdatatidaklayak = $this->ModelPengajuan->getDataTidakLayakCount(3);
        $getdatapengajuan = $this->ModelPengajuan->getDataPengajuan();
        $data = array(
            'active_dashboard'  => 'active',
            'title' => 'Dashboard Rafi Motor',
            'data_users'    => $this->ModelUsers->getDataDetailByIdUsers($username),
            'count_mobil'   => count($getdatamobil),
            'count_layak'   => count($getdatalayak),
            'count_tidak_layak' => count($getdatatidaklayak),
            'count_pengajuan'   => count($getdatapengajuan)
        );

        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/sidebar');
        $this->load->view('dashboard/layout/topbar');
        $this->load->view('dashboard/layout/content');
        $this->load->view('dashboard/layout/footer');
    }
    public function datatype()
    {
        $username = $this->session->userdata('id_users');
        $data = array(
            'active_type'   => 'active',
            'title'         => 'Data Type Rafi Motor',
            'data_type'     => $this->ModelType->getData(),
            'data_users'    => $this->ModelUsers->getDataDetailByIdUsers($username)
        );
        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/sidebar');
        $this->load->view('dashboard/layout/topbar');
        $this->load->view('dashboard/type/datatype');
        $this->load->view('dashboard/layout/footer');
    }
    public function datamerk()
    {
        $username = $this->session->userdata('id_users');
        $data = array(
            'active_merk'   => 'active',
            'title'         => 'Data Merk Rafi Motor',
            'data_merk'     => $this->ModelMerk->getData(),
            'data_users'    => $this->ModelUsers->getDataDetailByIdUsers($username)
        );
        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/sidebar');
        $this->load->view('dashboard/layout/topbar');
        $this->load->view('dashboard/merk/datamerk');
        $this->load->view('dashboard/layout/footer');
    }
    public function datamobil()
    {
        $username = $this->session->userdata('id_users');
        $data = array(
            'active_mobil'   => 'active',
            'title'         => 'Data Mobil Rafi Motor',
            'data_mobil'     => $this->ModelMobil->getData(),
            'data_type'     => $this->ModelType->getData(),
            'data_merk'     => $this->ModelMerk->getData(),
            'data_users'    => $this->ModelUsers->getDataDetailByIdUsers($username)
        );
        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/sidebar');
        $this->load->view('dashboard/layout/topbar');
        $this->load->view('dashboard/mobil/datamobil');
        $this->load->view('dashboard/layout/footer');
    }
    public function profile()
    {
        $username = $this->session->userdata('id_users');
        $db_id_users   = $this->session->userdata('id_users');

        $data = array(
            'title'         => 'Profile Rafi Motor',
            'data_detail'  => $this->ModelUsers->getDataDetailByIdUsers($db_id_users),
            'data_users'    => $this->ModelUsers->getDataDetailByIdUsers($username)

        );
        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/sidebar');
        $this->load->view('dashboard/layout/topbar');
        $this->load->view('dashboard/profile/profile');
        $this->load->view('dashboard/layout/footer');
    }
    public function datakriteria()
    {
        $username = $this->session->userdata('id_users');
        $data = array(
            'title'         => 'Kriteria Rafi Motor',
            'data_kriteria' => $this->ModelKriteria->getData(),
            'active_kriteria'   => 'active',
            'data_users'    => $this->ModelUsers->getDataDetailByIdUsers($username)
        );

        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/sidebar');
        $this->load->view('dashboard/layout/topbar');
        $this->load->view('dashboard/kriteria/datakriteria');
        $this->load->view('dashboard/layout/footer');
    }
    public function datasubkriteria()
    {
        $username = $this->session->userdata('id_users');
        $id_kriteria = $this->uri->segment(3);
        $data = array(
            'title'         => 'Sub Kriteria Rafi Motor',
            'data_sub_kriteria' => $this->ModelKriteria->getDataSubKriteria($id_kriteria),
            'active_kriteria'   => 'active',
            'data_users'    => $this->ModelUsers->getDataDetailByIdUsers($username)
        );

        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/sidebar');
        $this->load->view('dashboard/layout/topbar');
        $this->load->view('dashboard/subkriteria/datasubkriteria');
        $this->load->view('dashboard/layout/footer');
    }
    public function datakonfirmasi()
    {
        $username = $this->session->userdata('id_users');
        $data = array(
            'title'         => 'Konfirmasi Dokumen Rafi Motor',
            'data_penilaian'    => $this->ModelPengajuan->getDataPengajuanCustomer(),
            'active_pengajuan'  => 'active',
            'data_users'    => $this->ModelUsers->getDataDetailByIdUsers($username),
            'kredit'        => $this->ModelKriteria->getDataSubKriteria(17)
        );
        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/sidebar');
        $this->load->view('dashboard/layout/topbar');
        $this->load->view('dashboard/konfirmasidokumen/datakonfirmasi');
        $this->load->view('dashboard/layout/footer');
    }

    public function datapenilaian()
    {
        $username = $this->session->userdata('id_users');
        $data = array(
            'title'         => 'Penilaian Rafi Motor',
            'data_penilaian'    => $this->ModelWeight->getDataPenilaian(),
            'data_penilaian_baru'    => $this->ModelWeight->getDataPenilaianByStatus(2),
            'active_perhitungan'  => 'active',
            'data_users'    => $this->ModelUsers->getDataDetailByIdUsers($username)
        );
        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/sidebar');
        $this->load->view('dashboard/layout/topbar');
        $this->load->view('dashboard/normalisasi/data_normalisasi');
        $this->load->view('dashboard/layout/footer');
    }
    public function datamenyetujui()
    {
        $username = $this->session->userdata('id_users');
        $data = array(
            'title'         => 'Menyetujui Rafi Motor',
            'data_menyetujui'    => $this->ModelWeight->getDataMenyetujui(1),
            'active_menyetujui'  => 'active',
            'data_users'    => $this->ModelUsers->getDataDetailByIdUsers($username)
        );
        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/sidebar');
        $this->load->view('dashboard/layout/topbar');
        $this->load->view('dashboard/menyetujui/data_menyetujui');
        $this->load->view('dashboard/layout/footer');
    }
    public function datalaporan()
    {
        if (isset($_POST['bulan'])) {
            $date = $this->input->post('bulan');
            $array = explode("-", $date);
            $month = $array[1];
            $year = $array[0];
        } else {
            $month = date('m');
            $year = date('Y');
        }
        $name = $this->getMonth($month);

        // CHART KONFIRMASI DOKUMEN
        $namaMobil = [];
        $warnaChart = [];
        $dataMobil = [];
        $getDataMobil = $this->ModelPengajuan->getDataMobilSingle($month,$year,0);
        foreach($getDataMobil as $gdm){
            array_push($namaMobil,$gdm['nama_mobil']);
            array_push($warnaChart,$gdm['warna_chart']);
            $idMobil = $gdm['id_mobil'];
            $mobil = $this->ModelPengajuan->getCountMobil($idMobil,0,$month,$year);
            array_push($dataMobil,count($mobil));
        }
        
        if(isset($_POST['jenis'])){
            $jenis = $this->input->post('jenis');
            if($jenis == "dokumen"){
                $view = "dokumen";
            }else if($jenis == "mobil"){
                $view = "mobil";
            }else if($jenis == "dp"){
                $view = "dp";
            }else if($jenis == "tenor"){
                $view = "tenor";
            }
        }else{
            $view = "dokumen";
        }
        // CHART KONFIRMASI DOKUMEN

        //CHART DP
            $arrayNamaDp = [];
            $arrayNilaiDp = [];
            $dataKriteriaDP = $this->ModelKriteria->getDataSubKriteria(11);
            foreach($dataKriteriaDP as $dp){
                $id_sub = $dp['id_sub_kriteria'];
                $getCountData = $this->ModelPengajuan->getCountingDp($month,$year,$id_sub,0);
                array_push($arrayNamaDp,$dp['sub_kriteria']);
                array_push($arrayNilaiDp,count($getCountData));
            }

        //CHART DP
            $arraynamatenor     = [];
            $arraynilaitenor    = [];
            $datakriteriatenor  = $this->ModelKriteria->getDataSubKriteria(10);
            foreach($datakriteriatenor as $tenor){
                $id_sub = $tenor['id_sub_kriteria'];
                $getcountdatatenor = $this->ModelPengajuan->getCountingtenor($month,$year,$id_sub,0);
                array_push($arraynamatenor,$tenor['sub_kriteria']);
                array_push($arraynilaitenor,count($getcountdatatenor));
            }

        
        $username = $this->session->userdata('id_users');
        $data = array(
            'title'         => 'Laporan Rafi Motor',
            'date'          => $name . ' ' . $year,
            'cetak_month'   => $year . '-' . $month,
            'active_laporan'  => 'active',
            'view'          => $view,
            'data_users'    => $this->ModelUsers->getDataDetailByIdUsers($username),
            'data_laporan'  => $this->ModelPengajuan->getDataLaporan($month, $year),
            'nama_mobil'    => $namaMobil,
            'warna_chart'   => $warnaChart,
            'jumlah_mobil'  => $dataMobil,
            'nama_dp'       => $arrayNamaDp,
            'nilai_dp'       => $arrayNilaiDp,
            'nama_tenor'    => $arraynamatenor,
            'nilai_tenor'   => $arraynilaitenor,
        );
        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/sidebar');
        $this->load->view('dashboard/layout/topbar');
        $this->load->view('dashboard/laporan/datalaporan');
        $this->load->view('dashboard/layout/footer');
    }

    function getMonth($month)
    {
        if ($month == 1) {
            $name = "Januari";
        } else if ($month == 2) {
            $name = "Februari";
        } else if ($month == 3) {
            $name = "Maret";
        } else if ($month == 4) {
            $name = "April";
        } else if ($month == 5) {
            $name = "Mei";
        } else if ($month == 6) {
            $name = "Juni";
        } else if ($month == 7) {
            $name = "Juli";
        } else if ($month == 8) {
            $name = "Agustus";
        } else if ($month == 9) {
            $name = "September";
        } else if ($month == 10) {
            $name = "Oktober";
        } else if ($month == 11) {
            $name = "November";
        } else if ($month == 12) {
            $name = "Desember";
        }

        return $name;
    }

    public function cetak_laporan()
    {
        $date = $this->input->post('date');
        $cetak = $this->input->post('cetak');
        $array = explode("-", $date);
        $month = $array[1];
        $year = $array[0];

        //CHART DOKUMEN
        $namaMobil = [];
        $warnaChart = [];
        $dataMobil = [];
        $getDataMobil = $this->ModelPengajuan->getDataMobilSingle($month,$year,0);
        foreach($getDataMobil as $gdm){
            array_push($namaMobil,$gdm['nama_mobil']);
            array_push($warnaChart,$gdm['warna_chart']);
            $idMobil = $gdm['id_mobil'];
            $mobil = $this->ModelPengajuan->getCountMobil($idMobil,0,$month,$year);
            array_push($dataMobil,count($mobil));
        }

        //CHART DP
        $arrayNamaDp = [];
        $arrayNilaiDp = [];
        $dataKriteriaDP = $this->ModelKriteria->getDataSubKriteria(11);
        foreach($dataKriteriaDP as $dp){
            $id_sub = $dp['id_sub_kriteria'];
            $getCountData = $this->ModelPengajuan->getCountingDp($month,$year,$id_sub,0);
            array_push($arrayNamaDp,$dp['sub_kriteria']);
            array_push($arrayNilaiDp,count($getCountData));
        }

         //CHART DP
         $arraynamatenor     = [];
         $arraynilaitenor    = [];
         $datakriteriatenor  = $this->ModelKriteria->getDataSubKriteria(10);
         foreach($datakriteriatenor as $tenor){
             $id_sub = $tenor['id_sub_kriteria'];
             $getcountdatatenor = $this->ModelPengajuan->getCountingtenor($month,$year,$id_sub,0);
             array_push($arraynamatenor,$tenor['sub_kriteria']);
             array_push($arraynilaitenor,count($getcountdatatenor));
         }  

        if($cetak == "laporan"){
            $dataLaporan = $this->ModelPengajuan->getDataLaporan($month, $year);
            $view = 'dashboard/laporan/cetaklaporan';
        }else if($cetak == "mobil"){
            $dataLaporan = [[]];
            $view = 'dashboard/laporan/cetak_grafik_mobil';
        }else if($cetak == "dp"){
            $dataLaporan = [[]];
            $view = 'dashboard/laporan/cetak_grafik_dp';
        }else if($cetak == "tenor"){
            $dataLaporan = [[]];
            $view = 'dashboard/laporan/cetak_grafik_tenor';
        }
       
       
        $name = $this->getMonth($month);

        $data = array(
            'text_date'     => $name . ' ' . $year,
            'data_laporan'  => $dataLaporan,
            'nama_mobil'    => $namaMobil,
            'warna_chart'   => $warnaChart,
            'jumlah_mobil'  => $dataMobil,
            'nama_dp'       => $arrayNamaDp,
            'nilai_dp'       => $arrayNilaiDp,
            'nama_tenor'    => $arraynamatenor,
            'nilai_tenor'   => $arraynilaitenor,
        );
        $this->load->view($view, $data);
    }
}
