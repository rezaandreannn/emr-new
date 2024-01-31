<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RajalController extends CI_Controller
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
            $kodeDokter =$this->input->get('dokter');
        }

        $datenow = date('Y-m-d');

        $data = [
            'title' => 'Rawat Jalan',
            'content' => 'nurse/rajal/index',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'select2Header'=>select2_header(),
            'select2Footers'=>select2_footer(),
            'dokters' => $this->RawatJalanModel->get_dokter(),
            'pasiens' => $this->PasienModel->get_pasien_rajal_by_kode_dokter(array($datenow,$kodeDokter,$datenow,$kodeDokter))
        ];
        // var_dump($data['pasiens']);
        // die;
        $this->load->view('layouts/dashboard', $data);
    }

    public function add_process(){
        var_dump('ok');
    }


    public function login()
    {
        $this->load->view('auth/login');
    }
}
