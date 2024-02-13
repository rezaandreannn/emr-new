<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidan_controller extends CI_Controller
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
        $kodeDokter = 0;

        if ($this->input->get('dokter')) {
            $kodeDokter = $this->input->get('dokter');
        }

        $datenow = date('Y-m-d');

        $data = [
            'title' => 'Kebidanan',
            'content' => 'nurse/bidan/index',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'dokters' => $this->Dokter_model->get_dokter(),
            'pasiens' => $this->Pasien_model->get_pasien_rajal_by_kode_dokter(array($datenow, $kodeDokter, $datenow, $kodeDokter))
        ];
        $this->load->view('layouts/dashboard', $data);
    }

    public function create($no_register, $kode_dokter)

    {

        $get_mr_pasien = $this->Pasien_model->find_pasien_by_register($no_register);

        foreach ($get_mr_pasien as $get_mr) {
            $mr = $get_mr['No_MR'];
        }
        // var_dump($mr);
        // die;

        $data = [
            'title' => 'Form Kebidanan',
            'content' => 'nurse/bidan/create',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'kode_dokter' => $kode_dokter,
            'no_reg' => $no_register,
            'list_masalah_keperawatan' => $this->Perawat_model->list_masalah_keperawatan(),
            'list_rencana_keperawatan' => $this->Perawat_model->rencana_keperawatan(),
            'list_icd' => $this->Perawat_model->get_icd(),
            'histories' => $this->Pasien_model->get_history_by_mr(array($mr)),
            'biodata' => $this->Pasien_model->get_biodata_pasien_by_mr(array($mr))
        ];
        $this->load->view('layouts/dashboard', $data);
    }


    public function login()
    {
        $this->load->view('auth/login');
    }
}
