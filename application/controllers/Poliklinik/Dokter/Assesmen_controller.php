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
        $this->load->model('RawatJalanModel');
        $this->load->model('PasienModel');
        $this->load->model('Perawat_model');
    }

    public function index()
    {
        $kodeDokter = 0;

        if ($this->input->get('dokter')) {
            $kodeDokter = $this->input->get('dokter');
        }

        $datenow = date('Y-m-d');

        $data = [
            'title' => 'Rawat Jalan',
            'content' => 'poliklinik/dokter/list_pasien',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'select2Header' => select2_header(),
            'select2Footers' => select2_footer(),
        ];
        // var_dump($data['dokters']);
        // die;
        $this->load->view('layouts/dashboard', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data',
            'content' => 'poliklinik/dokter/assesmen_pasien',
        ];
        // var_dump($data['dokters']);
        // die;
        $this->load->view('layouts/dashboard', $data);
    }
}
