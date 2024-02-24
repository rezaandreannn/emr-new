<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Terapis_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('Rawat_jalan_model');
        $this->load->model('Pasien_model');
        $this->load->model('Perawat_model');
        $this->load->model('Laboratorium_model');
        $this->load->model('Radiologi_model');
        $this->load->model('Obat_model');
        $this->load->model('Dokter_model');
        $this->load->model('Fisioterapi_model');
    }

    public function index()
    {

        $kodeDokter = $this->session->userdata('user_name');
        $datenow = date('Y-m-d');

        $data = [
            'title' => 'Cppt Fisioterapi',
            'content' => 'fisioterapi/cppt_fisioterapi',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'select2Header' => select2_header(),
            'select2Footers' => select2_footer(),
            'pasiens' => $this->Fisioterapi_model->get_pasien_rajal_fisioterapi(array($datenow,$datenow)),

        ];
        // var_dump($data['pasiens']);
        // die;
        $this->load->view('layouts/dashboard', $data);
    }

    public function cari_proses(){

        redirect('fisioterapi/cppt/' . $this->input->post('pasien'));

    }

    public function create($no_register)
    {

        $get_mr_pasien = $this->Pasien_model->find_pasien_by_register($no_register);
        $mr = $get_mr_pasien['No_MR'];
        // var_dump($this->input->post('pasien'));
        // die;
        $data = [
            'no_reg' => $no_register,
            'title' => 'Cppt Fisioterapi',
            'content' => 'fisioterapi/create',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'biodata' => $this->Pasien_model->get_biodata_pasien_by_mr(array($mr)),
            'fisioterapis' => $this->Fisioterapi_model->get_medis_fisioterapi_by_mr(array($mr)),

        ];
        // var_dump($data['pasiens']);
        // die;
        $this->load->view('layouts/dashboard', $data);
    }


    public function store(){

     

        $cppt_fisio = array(
            $this->input->post('ANAMNESA'),
            $this->input->post('TEKANAN_DARAH'),
            $this->input->post('NADI'),
            $this->input->post('SUHU'),
            $this->input->post('URUTAN_FISIO'),
            $this->input->post('NO_MR_PASIEN'),
            $this->input->post('TANGGAL'),
            $this->input->post('JAM'),
            'TERAPIS'
        );

        $this->Fisioterapi_model->insert_cppt_fisioterapi($cppt_fisio);

        redirect ('fisioterapi/cppt/' . $this->input->post('NO_REG'));
    }

    public function delete($id_cppt_fisio,$no_register){


        $this->Fisioterapi_model->delete_cppt_fisio($id_cppt_fisio);

        redirect ('fisioterapi/cppt/' . $no_register);
    }

}
