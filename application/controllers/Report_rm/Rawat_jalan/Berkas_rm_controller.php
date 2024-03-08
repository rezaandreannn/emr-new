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
        $this->load->library('Ciqrcode');
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

    public function qr_testing($kodenya)
    {
        QRcode::png(
            $kodenya,
            $outfile = false,
            $level = QR_ECLEVEL_H,
            $size = 5,
            $margin = 2
        );
    }

    //Cetak Lembar Verif di rekam medis
    public function cetak_pengantar_verif($FS_KD_REG = "", $FS_KD_TRS = "")
    {
        $this->load->library('pdfgenerator');

        $data = [
            'title' => 'Cetak Lembar Verif',
            'rs_pasien' => $this->Rekam_medis_model->get_px_by_dokter_by_rg2(array($FS_KD_REG)),
            'rs_resep' => $this->Rekam_medis_model->get_data_terapi_by_rg(array($FS_KD_REG)),
            'asal' => $this->Rekam_medis_model->get_px_history_verif(array($FS_KD_REG)),
            'inap' => $this->Rekam_medis_model->get_lama_inap(array($FS_KD_REG)),
            'result' => $this->Rekam_medis_model->get_data_medis_by_rg23(array($FS_KD_REG)),
        ];

        // filename dari pdf ketika didownload
        $file_pdf = 'Lembar Verif';

        $paper = 'A4';
        $orientation = "potrait";
        $html = $this->load->view('report_rekam_medis/rawat_jalan/pengantar_verif', $data, true);

        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    //Cetak Lembar Verif di rekam medis harian
    public function cetak_pengantar_verif2($FS_KD_REG = "", $FS_KD_TRS = "")
    {
        $this->load->library('pdfgenerator');

        $data = [
            'title' => 'Cetak Lembar Verif',
            'rs_pasien' => $this->Rekam_medis_model->get_px_by_dokter_by_rg2(array($FS_KD_REG)),
            'rs_resep' => $this->Rekam_medis_model->get_data_terapi_by_rg(array($FS_KD_REG)),
            'asal' => $this->Rekam_medis_model->get_px_history_verif(array($FS_KD_REG)),
            'inap' => $this->Rekam_medis_model->get_lama_inap(array($FS_KD_REG)),
            'result' => $this->Rekam_medis_model->get_data_medis_by_rg23(array($FS_KD_REG)),
        ];

        // filename dari pdf ketika didownload
        $file_pdf = 'Lembar Verif';

        $paper = 'A4';
        $orientation = "potrait";
        $html = $this->load->view('report_rekam_medis/rawat_jalan/pengantar_verif', $data, true);

        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    //Cetak pengantar SKDP di Rekam Medis
    public function cetak_pengantar_skdp($FS_KD_REG = "", $FS_KD_TRS = "")
    {
        $this->load->library('pdfgenerator');

        $get_mr_pasien = $this->Pasien_model->find_pasien_by_register($no_registrasi);
        $mr = $get_mr_pasien['No_MR'];

        $data = [
            'title' => 'Cetak Berkas SKDP',
            'rs_pasien' => $this->Rekam_medis_model->get_px_by_dokter_by_rg2(array($FS_KD_REG)),
            'rs_skdp' => $this->Rekam_medis_model->get_data_skdp_by_rg(array($FS_KD_REG)),
            'result' => $this->Rekam_medis_model->get_data_medis_by_rg2(array($FS_KD_REG)),
            'ceklabskdp' => $this->Rekam_medis_model->get_cek_lab_skdp(array($FS_KD_REG)),
            'cekradskdp' => $this->Rekam_medis_model->get_cek_rad_skdp(array($FS_KD_REG)),
            'rs_lab' => $this->Rekam_medis_model->get_data_order_lab_by_rg3(array($FS_KD_REG)),
            'rs_rad' => $this->Rekam_medis_model->get_data_order_rad_by_rg3(array($FS_KD_REG)),
        ];

        // filename dari pdf ketika didownload
        $file_pdf = 'Lembar SKDP';

        $paper = 'A4';
        $orientation = "potrait";
        $html = $this->load->view('report_rekam_medis/rawat_jalan/pengantar_skdp', $data, true);

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
            'medis_by_noreg' => $this->Rekam_medis_model->get_medis_by_noreg(array($no_registrasi, $kode_transaksi)),
            'alamat' => $this->Rekam_medis_model->get_alamat(),
        ];

        // filename dari pdf ketika didownload
        $file_pdf = 'Cetak';

        $paper = 'A5';
        $orientation = "portait";
        $html = $this->load->view('report_rekam_medis/rawat_jalan/pengantar_lab', $data, true);

        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function cetak_pengantar_lab2($no_registrasi, $kode_transaksi)
    {
        $this->load->library('pdfgenerator');

        $get_mr_pasien = $this->Pasien_model->find_pasien_by_register($no_registrasi);
        $mr = $get_mr_pasien['No_MR'];
        $data = [
            'title' => 'Cetak',
            'biodata' => $this->Rekam_medis_model->get_pasien_by_dokter_by_noreg(array($no_registrasi)),
            'pemeriksaan_lab' => $this->Rekam_medis_model->get_order_lab_by_noreg(array($no_registrasi)),
            'medis_by_noreg' => $this->Rekam_medis_model->get_medis_by_noreg(array($no_registrasi, $kode_transaksi)),
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
            'medis_by_noreg' => $this->Rekam_medis_model->get_medis_by_noreg(array($no_registrasi, $kode_transaksi)),
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
            'medis_by_noreg' => $this->Rekam_medis_model->get_medis_by_noreg(array($no_registrasi, $kode_transaksi)),
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
            'medis_by_noreg' => $this->Rekam_medis_model->get_medis_by_noreg(array($no_registrasi, $kode_transaksi)),
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
