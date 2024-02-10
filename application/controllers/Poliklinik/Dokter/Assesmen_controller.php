<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assesmen_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('Rawat_jalan_model');
        $this->load->model('Pasien_model');
        $this->load->model('Perawat_model');
        $this->load->model('Laboratorium_model');
        $this->load->model('Radiologi_model');
        $this->load->model('Obat_model');
        $this->load->model('Dokter_model');
    }

    public function index()
    {

        $kodeDokter = $this->session->userdata('user_name');
        $datenow = date('Y-m-d');

        $data = [
            'title' => 'Rawat Jalan',
            'content' => 'poliklinik/dokter/list_pasien',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'select2Header' => select2_header(),
            'select2Footers' => select2_footer(),
            'pasiens' => $this->Pasien_model->get_pasien_dokter_by_kode_dokter(array($datenow, $kodeDokter, $datenow, $kodeDokter)),
            
        ];
        // var_dump($data['dokters']);
        // die;
        $this->load->view('layouts/dashboard', $data);
    }

    public function create($no_register,$kode_dokter)
    {
        $data = [
            'title' => 'Tambah Data',
            'content' => 'poliklinik/dokter/assesmen_pasien',
            'kode_dokter'=>$kode_dokter,
            'no_reg'=>$no_register,
            'biodata' => $this->Pasien_model->get_biodata_pasien_by_mr_dokter(array($no_register)),
            'labs' => $this->Laboratorium_model->list_pemeriksaan_lab(),
            'radiologis' => $this->Radiologi_model->list_pemeriksaan_rad(),
            'obats' => $this->Obat_model->list_nama_obat(),
            'dokters' => $this->Dokter_model->list_nama_dokter_spesialis(),
        ];
        // var_dump($data['dokters']);
        // die;
        $this->load->view('layouts/dashboard', $data);
    }
}
