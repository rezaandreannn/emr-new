<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        $this->load->model('LoginModel');
    }
    //catatan untuk mengambil data user di Controller/base/operatorbase.php di fungsi base_view_app()

    public function index()
    {
        $this->load->view('auth/login');
    }

    public function Login_proses()
    {
        $this->form_validation->set_rules('username', 'user_name', 'required');
        $this->form_validation->set_rules('password', 'user_pass', 'required');
        if ($this->form_validation->run() !== false) {
            $username = trim($this->input->post('username'));
            $password = trim($this->input->post('password'));

            $User = $this->LoginModel->get_user_login_auto_role($username, $password, '2');


            if (!empty($User)) {
                $this->session->set_userdata('masuk', TRUE);
                $sess = array(
                    'user_id' => $User['user_id'],
                    'role_id' => $User['role_id'],
                    'user_name' => $User['user_name'],

                );

                if ($User['lock_st'] == '0') {
                    // output
                    $this->session->set_userdata($sess);
                    redirect('dashboard');
                } else {
                    $url = base_url();
                    echo $this->session->set_flashdata('danger', 'Username Atau Password Salah');
                    redirect($url);
                }
            } else {
                $url = base_url();
                echo $this->session->set_flashdata('warning', 'Username dan Password tidak boleh kosong');
                redirect($url);
            }
        }
    }

    function Logout()
    {
        $this->session->sess_destroy();
        $url = base_url('');
        redirect($url);
    }
}

