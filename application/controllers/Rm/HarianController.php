<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HarianController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('RawatJalanModel');
        $this->load->model('PasienModel');
    }

    public function index()
    {
        $kodeDokter = 0;

        if ($this->input->get('dokter')) {
            $kodeDokter = $this->input->get('dokter');
        }

        $datenow = date('Y-m-d');

        $data = [
            'title' => 'Berkas Rekam Medis Harian',
            'content' => 'rm/harian/index',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'select2Header' => select2_header(),
            'select2Footers' => select2_footer(),
            'dokters' => $this->Dokter_model->get_dokter(),
            'pasiens' => $this->PasienModel->get_pasien_rajal_by_kode_dokter(array($datenow, $kodeDokter, $datenow, $kodeDokter))
        ];
        $this->load->view('layouts/dashboard', $data);
    }


    public function login()
    {
        $this->load->view('auth/login');
    }
}
