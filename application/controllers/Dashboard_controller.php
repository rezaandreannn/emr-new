<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('LoginModel');
    }



    public function index()
    {
        // var_dump($this->session->userdata('user_name'));
        // die;
        $profile_user_login=$this->LoginModel->get_user_profil(array($this->session->userdata('user_id'), $this->session->userdata('role_id')));
        $data = [
            'title' => 'Rawat Jalan',
            'content' => 'dashboard',
            'profile_user' => $profile_user_login,
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
