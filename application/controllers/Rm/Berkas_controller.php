<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berkas_controller extends CI_Controller
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
        $this->load->model('Rawat_jalan_model');
    }

    public function index()
    {

        $no_mr = $this->input->get('No_MR');

        $data = [
            'title' => 'Berkas Rekam Medis',
            'content' => 'rm/berkas/index',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'select2Header' => select2_header(),
            'select2Footers' => select2_footer(),
            'result' => $this->Berkas_model->get_data_px_by_rm($no_mr),
            'pasiens' => $this->Berkas_model->get_px_history2($no_mr),
        ];
        $this->load->view('layouts/dashboard', $data);
    }

    //Cetak Profil Singkat
    public function resume($FS_MR = "")
    {
        $this->load->library('pdfgenerator');

        $data = [
            'title' => 'Cetak Profil Ringkas',
            'rs_pasien' => $this->Rawat_jalan_model->get_px_by_dokter_by_rm_cetak(array($FS_MR)),
            'rs_resume' => $this->Rawat_jalan_model->get_px_profil(array($FS_MR)),
        ];

        // filename dari pdf ketika didownload
        $file_pdf = 'Profil Ringkas Medis Rawat Jalan';

        $paper = 'A4';
        $orientation = "potrait";
        $html = $this->load->view('rm/berkas/cetak/profil', $data, true);

        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function login()
    {
        $this->load->view('auth/login');
    }
}
