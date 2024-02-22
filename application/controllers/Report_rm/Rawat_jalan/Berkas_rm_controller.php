<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berkas_rm_controller extends CI_Controller
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
        $this->load->model('Dokter_model');
        $this->load->model('Rekam_medis_model');
    }

    //Cetak Profil Singkat
    public function resume($FS_MR = "")
    {
        $this->load->library('pdfgenerator');

        $data = [
            'title' => 'Cetak',
            'rs_pasien' => $this->Rawat_jalan_model->get_px_by_dokter_by_rm_cetak(array($FS_MR)),
            'rs_resume' => $this->Rawat_jalan_model->get_px_profil(array($FS_MR)),
        ];

        // filename dari pdf ketika didownload
        $file_pdf = 'Cetak';

        $paper = 'A4';
        $orientation = "landscape";
        $html = $this->load->view('nurse/rajal/cetak/profil', $data, true);

        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    //Cetak pengantar lab
    public function cetak_pengantar_lab($no_registrasi, $kode_transaksi)
    {
        $this->load->library('pdfgenerator');


        $data = [
            'title' => 'Cetak',
            'biodata' => $this->Rekam_medis_model->get_pasien_by_dokter_by_noreg(array($no_registrasi)),
            'pemeriksaan_lab' => $this->Rekam_medis_model->get_order_lab_by_noreg(array($no_registrasi)),
            'medis_by_noreg' => $this->Rekam_medis_model->get_medis_by_noreg(array($no_registrasi,$kode_transaksi)),
            'alamat' => $this->Rekam_medis_model->get_alamat(),
        ];

        // filename dari pdf ketika didownload
        $file_pdf = 'Cetak';

        $paper = 'A5';
        $orientation = "portait";
        $html = $this->load->view('report_rekam_medis/rawat_jalan/pengantar_lab', $data, true);

        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    //Cetak pengantar radiologi
    public function cetak_pengantar_radiologi($no_registrasi, $kode_transaksi)
    {
        $this->load->library('pdfgenerator');


        $data = [
            'title' => 'Cetak',
            'biodata' => $this->Rekam_medis_model->get_pasien_by_dokter_by_noreg(array($no_registrasi)),
            'pemeriksaan_radiologi' => $this->Rekam_medis_model->get_order_radiologi_by_noreg(array($no_registrasi)),
            'medis_by_noreg' => $this->Rekam_medis_model->get_medis_by_noreg(array($no_registrasi,$kode_transaksi)),
            'alamat' => $this->Rekam_medis_model->get_alamat(),
        ];

        // filename dari pdf ketika didownload
        $file_pdf = 'Cetak';

        $paper = 'A5';
        $orientation = "portait";
        $html = $this->load->view('report_rekam_medis/rawat_jalan/pengantar_radiologi', $data, true);

        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
    
    //Cetak pengantar resep
    public function cetak_pengantar_resep($no_registrasi, $kode_transaksi)
    {
        $this->load->library('pdfgenerator');

      
        $data = [
            'title' => 'Cetak',
            'biodata' => $this->Rekam_medis_model->get_pasien_by_dokter_by_noreg(array($no_registrasi)),
            'medis_by_noreg' => $this->Rekam_medis_model->get_medis_by_noreg(array($no_registrasi,$kode_transaksi)),
            'alamat' => $this->Rekam_medis_model->get_alamat(),
            'rekanan' => $this->Rekam_medis_model->get_pasien_by_rekanan(array($no_registrasi)),
            'antrian' => $this->Rekam_medis_model->get_antrian_obat_by_kode_transaksi(array($kode_transaksi)),
        ];


        // filename dari pdf ketika didownload
        $file_pdf = 'Cetak';

        $paper = 'A5';
        $orientation = "portait";
        $html = $this->load->view('report_rekam_medis/rawat_jalan/resep', $data, true);

        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    //Cetak pengantar skdp
    public function cetak_surat_skdp($no_registrasi, $kode_transaksi)
    {
        $this->load->library('pdfgenerator');

      
        $data = [
            'title' => 'Cetak',
            'biodata' => $this->Rekam_medis_model->get_pasien_by_dokter_by_noreg(array($no_registrasi)),
            'medis_by_noreg' => $this->Rekam_medis_model->get_medis_by_noreg(array($no_registrasi,$kode_transaksi)),
            'alamat' => $this->Rekam_medis_model->get_alamat(),
            'skdp' => $this->Rekam_medis_model->get_data_skdp_by_rg(array($no_registrasi)),
            'antrian' => $this->Rekam_medis_model->get_antrian_obat_by_kode_transaksi(array($kode_transaksi)),
        ];


        // filename dari pdf ketika didownload
        $file_pdf = 'Cetak';

        $paper = 'A5';
        $orientation = "portait";
        $html = $this->load->view('report_rekam_medis/rawat_jalan/skdp', $data, true);

        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
