<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cppt_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
    }

    public function index()
    {
        $data = [
            'title' => 'CPPT',
            'content' => 'Poliklinik/dokter/cppt',
            'header' => datatable_header(),
            'footer' => datatable_footer()
        ];
        $this->load->view('layouts/dashboard', $data);
    }


    public function login()
    {
        $this->load->view('auth/login');
    }
}
