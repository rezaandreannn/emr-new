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
    }

    public function index()
    {
        $data = [
            'title' => 'Kebidanan',
            'content' => 'nurse/bidan/index',
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
