<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Terapis_controller extends CI_Controller
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
            'title' => 'Cppt Fisioterapi',
            'content' => 'fisioterapi/cppt_fisioterapi',
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


}
