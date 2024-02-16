<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kunjungan_controller extends CI_Controller
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
    }

    public function index()
    {
        $kode_dokter = 0;
        $datenow = date('Y-m-d');
        $tgl_kunjungan = $datenow;

        if ($this->input->get('dokter')) {
            $kode_dokter = $this->input->get('dokter');
            $tgl_kunjungan = $this->input->get('tgl_kunjungan');
        }

        $data = [
            'title' => 'Encounter / Kunjungan Pasien',
            'content' => 'satu-sehat/kunjungan/index',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'select2Header' => select2_header(),
            'select2Footers' => select2_footer(),
            'dokters' => $this->Dokter_model->dokter_praktek_hari_ini(),
            'pasiens' => $this->Pasien_model->get_pasien_by_dokter_dan_tgl_kunjungan(array($tgl_kunjungan, $kode_dokter, $tgl_kunjungan, $kode_dokter))
        ];
        // var_dump($data['pasiens']);
        // die;
        $this->load->view('layouts/dashboard', $data);
    }
}
