<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
		// var_dump($this->session->userdata('user_name'));
		// die;
		$data = [
            'title' => 'Rawat Jalan',
            'content' => 'dashboard',
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
