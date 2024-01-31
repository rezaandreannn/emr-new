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
    }

    public function index()
    {
        $data = [
            'title' => 'Rawat Jalan',
            'content' => 'nurse/rajal/index',
            'header' => datatable_header(),
            'footer' => datatable_footer()
        ];
        $this->load->view('layouts/dashboard', $data);
    }


    public function create()
    {
        $data = [
            'title' => 'Form Rawat Jalan',
            'content' => 'nurse/rajal/create',
        ];
        $this->load->view('layouts/dashboard', $data);
    }
}
