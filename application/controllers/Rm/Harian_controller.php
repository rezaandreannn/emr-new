<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Harian_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('Berkas_model');
        $this->load->model('Dokter_model');
    }

    public function index()
    {
        $kodeDokter = 0;

        if ($this->input->get('dokter')) {
            $kodeDokter = $this->input->get('dokter');
        }

        $date = date('Y-m-d');

        $data = [
            'title' => 'Berkas Rekam Medis Harian',
            'content' => 'rm/harian/index',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'select2Header' => select2_header(),
            'select2Footers' => select2_footer(),
            'dokters' => $this->Dokter_model->get_dokter(),
            'pasiens' => $this->Berkas_model->get_px_by_dokter_wait(array($date, $kodeDokter, $date, $kodeDokter))
        ];
        $this->load->view('layouts/dashboard', $data);
    }


    public function login()
    {
        $this->load->view('auth/login');
    }
}
