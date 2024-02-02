<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rajal_controller extends CI_Controller
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
            'content' => 'nurse/rajal/index',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'select2Header' => select2_header(),
            'select2Footers' => select2_footer(),
            'dokters' => $this->Dokter_model->get_dokter(),
            'pasiens' => $this->PasienModel->get_pasien_rajal_by_kode_dokter(array($datenow, $kodeDokter, $datenow, $kodeDokter))
        ];
        // var_dump($data['dokters']);
        // die;
        $this->load->view('layouts/dashboard', $data);
    }

    public function create($no_register)

    {

        $get_mr_pasien = $this->PasienModel->find_pasien_by_register($no_register);

        foreach ($get_mr_pasien as $get_mr) {
            $mr = $get_mr['No_MR'];
        }
        // var_dump($mr);
        // die;

        $data = [
            'title' => 'Form Rawat Jalan',
            'content' => 'nurse/rajal/create',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'list_masalah_keperawatan' => $this->Perawat_model->list_masalah_keperawatan(),
            'list_rencana_keperawatan' => $this->Perawat_model->rencana_keperawatan(),
            'list_icd' => $this->Perawat_model->get_icd(),
            'histories' => $this->PasienModel->get_history_by_mr(array($mr)),
            'biodata' => $this->PasienModel->get_biodata_pasien_by_mr(array($mr))
        ];
        $this->load->view('layouts/dashboard', $data);
    }

    public function store()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }
}
