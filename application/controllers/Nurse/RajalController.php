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
<<<<<<< HEAD
    
    public function create($no_mr)
=======

    public function create($no_register)
>>>>>>> 232c142cc791810c8ea87ea9086bc6aa78b2db22
    {
        $data = [
            'title' => 'Form Rawat Jalan',
            'content' => 'nurse/rajal/create',
            'historys' => $this->PasienModel->get_history_by_mr(array($no_mr))
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
