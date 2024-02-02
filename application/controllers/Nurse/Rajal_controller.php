<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rajal_controller extends CI_Controller
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
        $this->load->model('Perawat_model');
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

    public function create($no_register)

    {

        $get_mr_pasien = $this->PasienModel->find_pasien_by_register($no_register);

        foreach ($get_mr_pasien as $get_mr) {
            $mr = $get_mr['No_MR'];
        }
        // var_dump($mr);
        // die;

        $data = [
            'title' => 'Form Rawat Jalan',
            'content' => 'nurse/rajal/create',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'list_masalah_keperawatan' => $this->Perawat_model->list_masalah_keperawatan(),
            'list_rencana_keperawatan' => $this->Perawat_model->rencana_keperawatan(),
            'list_icd' => $this->Perawat_model->get_icd(),
            'histories' => $this->PasienModel->get_history_by_mr(array($mr)),
            'biodata' => $this->PasienModel->get_biodata_pasien_by_mr(array($mr))
        ];
        $this->load->view('layouts/dashboard', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('FS_ANAMNESA', 'FS_ANAMNESA', 'max_length[64]');
        $this->form_validation->set_rules('FS_EDUKASI', 'FS_EDUKASI', 'max_length[64]');
        $this->form_validation->set_rules('FS_SUHU', 'FS_SUHU', 'max_length[64]');
        $this->form_validation->set_rules('FS_NADI', 'FS_NADI', 'max_length[64]');
        $this->form_validation->set_rules('FS_R', 'FS_R', 'max_length[64]');
        $this->form_validation->set_rules('FS_TD', 'FS_TD', 'max_length[64]');
        $this->form_validation->set_rules('FS_TB', 'FS_TB', 'max_length[64]');
        $this->form_validation->set_rules('FS_BB', 'FS_BB', 'max_length[64]');
        $this->form_validation->set_rules('FS_NYERI', 'FS_NYERI', 'max_length[64]');
        $this->form_validation->set_rules('FS_NYERIP', 'FS_NYERIP', 'max_length[64]');
        $this->form_validation->set_rules('FS_NYERIQ', 'FS_NYERIQ', 'max_length[64]');
        $this->form_validation->set_rules('FS_NYERIR', 'FS_NYERIR', 'max_length[64]');
        $this->form_validation->set_rules('FS_NYERIS', 'FS_NYERIS', 'max_length[64]');
        $this->form_validation->set_rules('FS_NYERIT', 'FS_NYERIT', 'max_length[64]');
        $this->form_validation->set_rules('FS_CARA_BERJALAN1', 'FS_CARA_BERJALAN1', 'max_length[64]');
        $this->form_validation->set_rules('FS_CARA_BERJALAN2', 'FS_CARA_BERJALAN2', 'max_length[64]');
        $this->form_validation->set_rules('intervensi1', 'intervensi1', 'max_length[64]');
        $this->form_validation->set_rules('intervensi2', 'intervensi2', 'max_length[64]');
        $this->form_validation->set_rules('FS_CARA_DUDUK', 'FS_CARA_DUDUK', 'max_length[64]');
        $this->form_validation->set_rules('FS_RIW_PENYAKIT_DAHULU', 'FS_RIW_PENYAKIT_DAHULU', 'max_length[64]');
        $this->form_validation->set_rules('FS_RIW_PENYAKIT_DAHULU2', 'FS_RIW_PENYAKIT_DAHULU2', 'max_length[64]');
        $this->form_validation->set_rules('FS_ALERGI', 'FS_ALERGI', 'max_length[64]');
        $this->form_validation->set_rules('FS_REAK_ALERGI', 'FS_REAK_ALERGI', 'max_length[64]');
        $this->form_validation->set_rules('FS_STATUS_PSIK', 'FS_STATUS_PSIK', 'max_length[64]');
        $this->form_validation->set_rules('FS_STATUS_PSIK2', 'FS_STATUS_PSIK2', 'max_length[64]');
        $this->form_validation->set_rules('FS_HUB_KELUARGA', 'FS_HUB_KELUARGA', 'max_length[64]');
        $this->form_validation->set_rules('FS_ST_FUNGSIONAL', 'FS_ST_FUNGSIONAL', 'max_length[64]');
        $this->form_validation->set_rules('FS_PENGELIHATAN', 'FS_PENGELIHATAN', 'max_length[64]');
        $this->form_validation->set_rules('FS_PENCIUMAN', 'FS_PENCIUMAN', 'max_length[64]');
        $this->form_validation->set_rules('FS_PENDENGARAN', 'FS_PENDENGARAN', 'max_length[64]');
        $this->form_validation->set_rules('FS_NUTRISI1', 'FS_NUTRISI1', 'max_length[64]');
        $this->form_validation->set_rules('FS_NUTRISI2', 'FS_NUTRISI2', 'max_length[64]');
        $this->form_validation->set_rules('FS_AGAMA', 'FS_AGAMA', 'max_length[64]');
        $this->form_validation->set_rules('FS_NILAI_KHUSUS', 'FS_NILAI_KHUSUS', 'max_length[64]');
        $this->form_validation->set_rules('FS_NILAI_KHUSUS2', 'FS_NILAI_KHUSUS2', 'max_length[64]');
        $this->form_validation->set_rules('tujuan', 'tujuan', 'max_length[64]');
        $this->form_validation->set_rules('tembusan', 'tembusan', 'max_length[64]');
        $this->form_validation->set_rules('FS_SKDP_FASKES', 'FS_SKDP_FASKES', 'max_length[64]');
        $this->form_validation->set_rules('kode_icd_x', 'kode_icd_x', 'max_length[64]');
        if ($this->form_validation->run() !== false) {
            // query add proses
        } else {
            // handle error
        }
    }


    public function edit()
    {
    }

    public function update()
    {
    }
}
