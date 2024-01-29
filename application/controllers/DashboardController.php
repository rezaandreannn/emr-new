<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
    public function index()
    {
        $data['content'] = 'dashboard';
        $this->load->view('layouts/dashboard', $data);
    }
}
