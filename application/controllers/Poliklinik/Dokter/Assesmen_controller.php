<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assesmen_controller extends CI_Controller
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
    }

    public function index()
    {

        $kodeDokter = $this->session->userdata('user_name');
        $datenow = date('Y-m-d');

        $data = [
            'title' => 'Rawat Jalan',
            'content' => 'poliklinik/dokter/list_pasien',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'select2Header' => select2_header(),
            'select2Footers' => select2_footer(),
            'pasiens' => $this->Pasien_model->get_pasien_dokter_by_kode_dokter(array($datenow, $kodeDokter, $datenow, $kodeDokter)),

        ];
        // var_dump($data['dokters']);
        // die;
        $this->load->view('layouts/dashboard', $data);
    }

    public function skdp_rencana_kontrol()
    {
        $id = $this->input->post('FS_SKDP_1');
        $rs_skdp_rencana = $this->Rawat_jalan_model->get_rencana_skdp($id);
        //$data .= "<option>--Pilih Alasan--</option>";
        foreach ($rs_skdp_rencana as $skdp_rencana) {
            $data = '<option value="' . $skdp_rencana['FS_KD_TRS'] . '">' . $skdp_rencana['FS_NM_SKDP_RENCANA'] . '</option>';
        }
        echo $data;
    }

    public function create($no_register, $kode_dokter)
    {

        $get_mr_pasien = $this->Pasien_model->find_pasien_by_register($no_register);
        $mr = $get_mr_pasien['No_MR'];

        $datenow = date('Y-m-d');

        $data = [
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'title' => 'Tambah Data',
            'content' => 'poliklinik/dokter/assesmen_pasien',
            'kode_dokter' => $kode_dokter,
            'no_reg' => $no_register,
            'hasil_labs' => $this->Rawat_jalan_model->get_data_lab_by_noreg(array($no_register)),
            'biodata' => $this->Pasien_model->get_biodata_pasien_by_noreg_dokter(array($no_register)),
            'vital_sign' => $this->Pasien_model->get_vital_sign_by_noreg(array($no_register)),
            'nyeri' => $this->Pasien_model->get_nyeri_by_noreg(array($no_register)),
            'nutrisi' => $this->Pasien_model->get_nutrisi_by_noreg(array($no_register)),
            'alergi' => $this->Pasien_model->get_data_alergi_by_rg(array($mr)),
            'labs' => $this->Laboratorium_model->list_pemeriksaan_lab(),
            'radiologis' => $this->Radiologi_model->list_pemeriksaan_rad(),
            'obats' => $this->Obat_model->list_nama_obat(),
            'dokters' => $this->Dokter_model->list_nama_dokter_spesialis(),
            'alasan_skdp' => $this->Rawat_jalan_model->get_alasan_skdp(),
            'asesmen_perawat' => $this->Rawat_jalan_model->get_asesmen_perawat(array($no_register)),
            'histori_pasiens' => $this->Rawat_jalan_model->get_history_pasien_by_noreg(array($datenow, $kode_dokter, $mr)),


        ];

        $this->load->view('layouts/dashboard', $data);
    }

    public function copy_pemeriksaan($no_register,$no_register_lama, $kode_dokter)
    {

        $get_mr_pasien = $this->Pasien_model->find_pasien_by_register($no_register);
        $mr = $get_mr_pasien['No_MR'];

        $datenow = date('Y-m-d');

        $data = [
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'title' => 'Tambah Data',
            'content' => 'poliklinik/dokter/copy_asesmen_pasien',
            'kode_dokter' => $kode_dokter,
            'no_reg' => $no_register,
            'hasil_labs' => $this->Rawat_jalan_model->get_data_lab_by_noreg(array($no_register)),
            'biodata' => $this->Pasien_model->get_biodata_pasien_by_noreg_dokter(array($no_register)),
            'biodata_sebelumnya' => $this->Pasien_model->get_biodata_pasien_by_noreg_dokter(array($no_register_lama)),
            'vital_sign' => $this->Pasien_model->get_vital_sign_by_noreg(array($no_register)),
            'nyeri' => $this->Pasien_model->get_nyeri_by_noreg(array($no_register)),
            'nutrisi' => $this->Pasien_model->get_nutrisi_by_noreg(array($no_register)),
            'alergi' => $this->Pasien_model->get_data_alergi_by_rg(array($mr)),
            'labs' => $this->Laboratorium_model->list_pemeriksaan_lab(),
            'radiologis' => $this->Radiologi_model->list_pemeriksaan_rad(),
            'obats' => $this->Obat_model->list_nama_obat(),
            'dokters' => $this->Dokter_model->list_nama_dokter_spesialis(),
            'alasan_skdp' => $this->Rawat_jalan_model->get_alasan_skdp(),
            'asesmen_perawat' => $this->Rawat_jalan_model->get_asesmen_perawat(array($no_register)),
            'asesmen_dokter' => $this->Rawat_jalan_model->get_data_asesmen_dokter_by_noreg(array($no_register_lama)),
            'histori_pasiens' => $this->Rawat_jalan_model->get_history_pasien_by_noreg(array($datenow, $kode_dokter, $mr)),


        ];

        $this->load->view('layouts/dashboard', $data);
    }

    public function edit($no_register, $kode_dokter)
    {

        $get_mr_pasien = $this->Pasien_model->find_pasien_by_register($no_register);
        $mr = $get_mr_pasien['No_MR'];
   
        $data = [
            'title' => 'Tambah Data',
            'content' => 'poliklinik/dokter/edit_assesmen_pasien',
            'kode_dokter' => $kode_dokter,
            'no_reg' => $no_register,
            'biodata' => $this->Pasien_model->get_biodata_pasien_by_noreg_dokter(array($no_register)),
            'vital_sign' => $this->Pasien_model->get_vital_sign_by_noreg(array($no_register)),
            'nyeri' => $this->Pasien_model->get_nyeri_by_noreg(array($no_register)),
            'nutrisi' => $this->Pasien_model->get_nutrisi_by_noreg(array($no_register)),
            'hasil_labs' => $this->Rawat_jalan_model->get_data_lab_by_noreg(array($no_register)),
            'alergi' => $this->Pasien_model->get_data_alergi_by_rg(array($mr)),
            'labs' => $this->Laboratorium_model->list_pemeriksaan_lab(),
            'radiologis' => $this->Radiologi_model->list_pemeriksaan_rad(),
            'obats' => $this->Obat_model->list_nama_obat(),
            'dokters' => $this->Dokter_model->list_nama_dokter_spesialis(),
            'alasan_skdp' => $this->Rawat_jalan_model->get_alasan_skdp(),
            'asesmen_perawat' => $this->Rawat_jalan_model->get_asesmen_perawat(array($no_register)),
            'asesmen_dokter' => $this->Rawat_jalan_model->get_data_asesmen_dokter_by_noreg(array($no_register)),
            'skdp_select' => $this->Rawat_jalan_model->get_skdp_pemeriksaan(array($no_register)),
            'rujukan_rs' => $this->Rawat_jalan_model->get_surat_rujukan_rs(array($no_register)),
            'prb' => $this->Rawat_jalan_model->get_surat_prb(array($no_register)),
            'rencana_skdp' => $this->Rawat_jalan_model->get_rencana_skdp2(),
        ];
        // var_dump($data['dokters']);
        // die;
        $this->load->view('layouts/dashboard', $data);
    }


    // add proses pemeriksan dokter
    public function store()
    {
        $this->form_validation->set_rules('FS_ANAMNESA', 'FS_ANAMNESA', 'required|max_length[64]');
        $this->form_validation->set_rules('FS_DIAGNOSA', 'FS_DIAGNOSA', 'required|max_length[64]');
        if ($this->form_validation->run() !== false) {
            $cek_status = $this->Rawat_jalan_model->cek_status_asasmen_dokter($this->input->post('FS_KD_REG'));
            if ($cek_status->num_rows() > 0) {
                echo $this->session->set_flashdata('danger', 'Pasien sudah di periksa!');
                redirect('poliklinik/daftar-pasien');
            } else {

                try {

                    $terapi1 = $this->input->post('FS_TERAPI');
                    $terapi2 = $this->input->post('FS_TERAPI2');

                    $jumlahkartakter2 = strlen($terapi2);
                    if ($jumlahkartakter2 > 10) {
                        $terapinya = $terapi1 . " " . $terapi2;
                    } else {
                        $terapinya = $terapi1;
                    }

                    //pemeriksaan dokter
                    $asasmen_dokter = array(
                        '',
                        $this->input->post('FS_KD_REG'),
                        $this->input->post('FS_DIAGNOSA'),
                        $this->input->post('FS_ANAMNESA'),
                        $this->input->post('FS_TINDAKAN'),
                        $terapinya,
                        $this->input->post('FS_CATATAN_FISIK'),
                        $this->session->userdata('user_name'),
                        $this->input->post('FS_CARA_PULANG'),
                        $this->input->post('FS_DAFTAR_MASALAH'),
                        $this->input->post('FS_PLANNING'),
                        $this->input->post('FS_OBAT_PROLANIS'),
                        $this->session->userdata('user_id'),
                        date('Y-m-d'),
                        date('H:i:s'),
                        $this->input->post('FS_EKG'),
                        $this->input->post('FS_USG'),
                        $this->input->post('HASIL_ECHO') ?  $this->input->post('HASIL_ECHO') : '',
                        $this->input->post('HASIL_EKG') ? $this->input->post('HASIL_EKG') : '',
                        $this->input->post('HASIL_TREADMILL') ? $this->input->post('HASIL_TREADMILL') : '',
                        $this->input->post('FS_DIAGNOSA_SEKUNDER')
                    );

                    if ($this->Rawat_jalan_model->insert_pemeriksaan_rj_dokter($asasmen_dokter)) {

                        //cek skdp menyusul menyesuaikan
                        //cek status rawat jalan juga menyusul

                        $FS_KD_TRS = $this->Rawat_jalan_model->get_last_inserted_id();
                        $cek_status_pemeriksaan = $this->Rawat_jalan_model->cek_status_asasmen($this->input->post('FS_KD_REG'));
                        if ($cek_status_pemeriksaan->num_rows() > 0) {
                            $this->Rawat_jalan_model->update_status_pemeriksaan(array('2', $this->input->post('FS_KD_REG')));
                        } else {
                            $status_rj = array(
                                $this->input->post('FS_KD_REG'),
                                '2',
                                '1',
                                'A',
                                $this->session->userdata('user_id'),
                                date('Y-m-d')
                            );

                            $this->Rawat_jalan_model->insert_status_rj($status_rj);
                        };

                        $resiko_tinggi = array(
                            $this->input->post('FS_HIGH_RISK'),
                            $this->input->post('FS_MR')
                        );
                        $this->Rawat_jalan_model->update_resiko_tinggi($resiko_tinggi);

                        //cek antrian di farmasi
                        $cek_antrian_farmasi = $this->Rawat_jalan_model->cek_antrian_farmasi(array(date('Y-m-d')));
                        if (is_null($cek_antrian_farmasi['ANTRIAN'])) {
                            $cek_antrian_farmasi['ANTRIAN'] = '0';
                        }
                        $antrian_sekarang = $cek_antrian_farmasi['ANTRIAN'] + 1;

                        // insert antrian obat ke farmasi
                        $antrian_farmasi = array(
                            $FS_KD_TRS,
                            $antrian_sekarang,
                            date('Y-m-d')
                        );

                        $this->Rawat_jalan_model->insert_antrian_obat($antrian_farmasi);

                        //insert order laboratorium
                        $order_lab = $this->input->post('tujuan');
                        if (!empty($order_lab)) {
                            foreach ($order_lab as $key => $value) {
                                $this->Rawat_jalan_model->insert_pemeriksaan_lab(array($key, $value, $this->input->post('FS_KD_REG')));
                            }
                        }

                        //insert pemeriksaan radiologi
                        $order_radiologi = $this->input->post('tembusan');
                        $bagian_radiologi = $this->input->post('FS_BAGIAN');
                        if (!empty($order_radiologi)) {
                            foreach ($order_radiologi as $key => $value) {
                                $this->Rawat_jalan_model->insert_pemeriksaan_rad(array($key, $value, $this->input->post('FS_KD_REG'), $bagian_radiologi));
                            }
                        }

                        // if cara pulang belum fix
                        if ($this->input->post('FS_CARA_PULANG') == '2') {
                            $no_skdp = $this->Rawat_jalan_model->get_no_skdp(array(date('m'), date('Y')));
                            if (is_null($no_skdp['NOSKDP'])) {
                                $no_skdp['NOSKDP'] = '0';
                            }
                            $SKDP = $no_skdp['NOSKDP'] + 1;
                            $SKDP_PROCESS = array(
                                $this->input->post('FS_KD_REG'),
                                $this->input->post('FS_SKDP_1'),
                                $this->input->post('FS_SKDP_2'),
                                $this->input->post('FS_SKDP_KET'),
                                $this->input->post('FS_SKDP_KONTROL'),
                                $SKDP,
                                $this->session->userdata('user_name'),
                                date('Y-m-d'),
                                date('H:i:s'),
                                $this->input->post('FS_SKDP_FASKES'),
                                $this->input->post('FS_PESAN'),
                                $this->input->post('FS_RENCANA_KONTROL')
                            );
                            // insert
                            // if ($this->Rawat_jalan_model->insert_medis($params)) {
                            $this->Rawat_jalan_model->insert_surat_skdp($SKDP_PROCESS);
                        } else if ($this->input->post('FS_CARA_PULANG') == '4') {
                            //rujuk eksternal
                            $rujuk_rs = array(
                                $this->input->post('FS_KD_REG'),
                                $this->input->post('FS_TUJUAN_RUJUKAN_LUAR_RS'),
                                $this->input->post('FS_TUJUAN_RUJUKAN_LUAR_RS2'),
                                $this->input->post('FS_ALASAN_RUJUK_LUAR_RS'),
                                $this->session->userdata('user_name'),
                                date('Y-m-d'),
                                date('H:i:s')
                            );
                            $this->Rawat_jalan_model->insert_rujuk_rs($rujuk_rs);
                        } else if ($this->input->post('FS_CARA_PULANG') == '6') {
                            //rujuk internal
                            $rujuk_internal = array(
                                $this->input->post('FS_KD_REG'),
                                $this->input->post('FS_TUJUAN_RUJUKAN'),
                                $this->input->post('FS_TUJUAN_RUJUKAN2'),
                                $this->input->post('FS_ALASAN_RUJUK'),
                                $this->session->userdata('user_name'),
                                date('Y-m-d'),
                                date('H:i:s')
                            );
                            $this->Rawat_jalan_model->insert_rujuk_rs($rujuk_internal);
                        } else if ($this->input->post('FS_CARA_PULANG') == '7') {
                            $kembali_ke_faskes = array(
                                $this->input->post('FS_KD_TRS'),
                                $this->input->post('FS_KD_REG'),
                                $this->input->post('FS_TGL_PRB'),
                                $this->input->post('FS_TUJUAN'),
                                $this->session->userdata('user_name'),
                                date('Y-m-d'),
                                date('H:i:s')
                            );
                            $this->Rawat_jalan_model->insert_rujuk_ke_faskes_primer($kembali_ke_faskes);
                        }
                        // batas if input cara pulang
                    } else {


                        echo $this->session->set_flashdata('warning', 'Pastikan Isian Sudah benar');
                        redirect('poliklinik/periksa/' . $this->input->post('FS_KD_REG') . '/' . $this->session->userdata('user_name'));
                    }

                    $this->db->trans_commit();
                    echo $this->session->set_flashdata('success', 'Detail Pemeriksaan Berhasil Disimpan');
                    redirect('poliklinik/daftar-pasien');
                } catch (\Throwable $th) {
                    //throw $th;
                    $this->db->trans_rollback();
                    echo $this->session->set_flashdata('warning', 'Pastikan Isian Sudah benar');
                    redirect('poliklinik/periksa/' . $this->input->post('FS_KD_REG') . '/' . $this->session->userdata('user_name'));

                    // redirect belum fix
                    // redirect('prwt/rajal/edit/' . $this->input->post('FS_KD_REG') . '/' . $this->input->post('FS_KD_MEDIS'));
                }
            }
        } else {
            // handle error

            echo $this->session->set_flashdata('warning', 'Pastikan Isian Sudah benar');
            redirect('poliklinik/periksa/' . $this->input->post('FS_KD_REG') . '/' . $this->session->userdata('user_name'));
        }
    }
    //end pemeriksaan dokter

    //update pemeriksaan dokter
    public function update()
    {

        $this->form_validation->set_rules('FS_ANAMNESA', 'FS_ANAMNESA', 'required|max_length[64]');
        $this->form_validation->set_rules('FS_DIAGNOSA', 'FS_DIAGNOSA', 'required|max_length[64]');
        if ($this->form_validation->run() !== false) {


            try {

                $terapi1 = $this->input->post('FS_TERAPI');
                $terapi2 = $this->input->post('FS_TERAPI2');

                $jumlahkartakter2 = strlen($terapi2);
                if ($jumlahkartakter2 > 10) {
                    $terapinya = $terapi1 . " " . $terapi2;
                } else {
                    $terapinya = $terapi1;
                }

                $terapi1_0 = $this->input->post('FS_TERAPI_0');
                $terapi2_0 = $this->input->post('FS_TERAPI2_0');

                $jumlahkartakter2_0 = strlen($terapi2_0);
                if ($jumlahkartakter2_0 > 10) {
                    $terapinya_0 = $terapi1_0 . " " . $terapi2_0;
                } else {
                    $terapinya_0 = $terapi1_0;
                }

                //pemeriksaan dokter
                $asasmen_dokter = array(

                    $this->input->post('FS_DIAGNOSA'),
                    $this->input->post('FS_ANAMNESA'),
                    $this->input->post('FS_TINDAKAN'),
                    $terapinya,
                    $this->input->post('FS_CATATAN_FISIK'),
                    $this->input->post('FS_CARA_PULANG'),
                    $this->input->post('FS_DAFTAR_MASALAH'),
                    $this->input->post('FS_PLANNING'),
                    '',
                    $this->session->userdata('user_id'),
                    date('Y-m-d'),
                    $this->input->post('FS_EKG'),
                    $this->input->post('FS_USG'),
                    $this->input->post('HASIL_ECHO') ?  $this->input->post('HASIL_ECHO') : '',
                    $this->input->post('HASIL_EKG') ? $this->input->post('HASIL_EKG') : '',
                    $this->input->post('HASIL_TREADMILL') ? $this->input->post('HASIL_TREADMILL') : '',
                    $this->input->post('FS_DIAGNOSA_SEKUNDER'),
                    $this->input->post('FS_KD_TRS'),
                );

                if ($this->Rawat_jalan_model->update_pemeriksaan_rj_dokter($asasmen_dokter)) {

                    $riwayat = array(
                        $this->input->post('FS_KD_REG'),
                        $this->input->post('FS_DIAGNOSA_0'),
                        $this->input->post('FS_ANAMNESA_0'),
                        $this->input->post('FS_TINDAKAN_0'),
                        $terapinya_0,
                        $this->input->post('FS_CATATAN_FISIK_0'),
                        $this->input->post('FS_CARA_PULANG_0'),
                        $this->input->post('FS_DAFTAR_MASALAH_0'),
                        $this->input->post('FS_EKG_0'),
                        $this->input->post('FS_USG_0'),
                        $this->session->userdata('user_name'),
                        date('Y-m-d'),
                    );
                    $this->Rawat_jalan_model->insert_riwayat_pemeriksaan_dokter($riwayat);



                    //cek skdp menyusul menyesuaikan
                    //cek status rawat jalan juga menyusul


                    $resiko_tinggi = array(
                        $this->input->post('FS_HIGH_RISK'),
                        $this->input->post('FS_MR')
                    );
                    $this->Rawat_jalan_model->update_resiko_tinggi($resiko_tinggi);


                    //insert order laboratorium
                    $order_lab = $this->input->post('tujuan');
                    $this->Rawat_jalan_model->delete_pemeriksaan_lab($this->input->post('FS_KD_REG'));
                    if (!empty($order_lab)) {
                        foreach ($order_lab as $key => $value) {
                            $this->Rawat_jalan_model->insert_pemeriksaan_lab(array($key, $value, $this->input->post('FS_KD_REG')));
                        }
                    }

                    //insert pemeriksaan radiologi
                    $order_radiologi = $this->input->post('tembusan');
                    $bagian_radiologi = $this->input->post('FS_BAGIAN');
                    $this->Rawat_jalan_model->delete_pemeriksaan_rad($this->input->post('FS_KD_REG'));
                    if (!empty($order_radiologi)) {
                        foreach ($order_radiologi as $key => $value) {
                            $this->Rawat_jalan_model->insert_pemeriksaan_rad(array($key, $value, $this->input->post('FS_KD_REG'), $bagian_radiologi));
                        }
                    }

                    $cek_skdp = $this->Rawat_jalan_model->cek_skdp_pemeriksaan(array($this->input->post('FS_KD_REG')));
                    $cek_rujukan_rs = $this->Rawat_jalan_model->cek_rujukan_rs(array($this->input->post('FS_KD_REG')));
                    $cek_prb = $this->Rawat_jalan_model->cek_prb(array($this->input->post('FS_KD_REG')));

                    // if cara pulang belum fix
                    if ($this->input->post('FS_CARA_PULANG') == '2') {
                        $this->Rawat_jalan_model->delete_rujuk_rs(array($this->input->post('FS_KD_REG')));
                        $this->Rawat_jalan_model->delete_rujuk_ke_faskes_primer(array($this->input->post('FS_KD_REG')));

                        if ($cek_skdp >= '1') { //update jika sudah mengisi skdp
                            $skdp_process = array(
                                $this->input->post('FS_SKDP_1'),
                                $this->input->post('FS_SKDP_2'),
                                $this->input->post('FS_SKDP_KET'),
                                $this->input->post('FS_SKDP_KONTROL'),
                                $this->input->post('FS_KD_REG'),
                                $this->input->post('FS_SKDP_FASKES'),
                                $this->input->post('FS_PESAN'),
                                $this->input->post('FS_RENCANA_KONTROL'),
                                $this->input->post('FS_KD_REG'),


                            );
                            // insert
                            //if ($this->Rawat_jalan_model->update_medis($skdp_process)) {
                            $this->Rawat_jalan_model->update_surat_skdp($skdp_process);
                        } else {

                            $no_skdp = $this->Rawat_jalan_model->get_no_skdp(array(date('m'), date('Y')));
                            if (is_null($no_skdp['NOSKDP'])) {
                                $no_skdp['NOSKDP'] = '0';
                            }
                            $SKDP = $no_skdp['NOSKDP'] + 1;
                            $SKDP_PROCESS = array(
                                $this->input->post('FS_KD_REG'),
                                $this->input->post('FS_SKDP_1'),
                                $this->input->post('FS_SKDP_2'),
                                $this->input->post('FS_SKDP_KET'),
                                $this->input->post('FS_SKDP_KONTROL'),
                                $SKDP,
                                $this->session->userdata('user_name'),
                                date('Y-m-d'),
                                date('H:i:s'),
                                $this->input->post('FS_SKDP_FASKES'),
                                $this->input->post('FS_PESAN'),
                                $this->input->post('FS_RENCANA_KONTROL')
                            );
                            // insert
                            // if ($this->Rawat_jalan_model->insert_medis($params)) {
                            $this->Rawat_jalan_model->insert_surat_skdp($SKDP_PROCESS);
                        }
                    } else if ($this->input->post('FS_CARA_PULANG') == '3') {


                        //rawat inap
                    } else if ($this->input->post('FS_CARA_PULANG') == '4') {
                        $this->Rawat_jalan_model->delete_skdp(array($this->input->post('FS_KD_REG')));
                        $this->Rawat_jalan_model->delete_rujuk_ke_faskes_primer(array($this->input->post('FS_KD_REG')));
                        //rujuk eksternal
                        if ($cek_rujukan_rs >= '1') {
                            $rujuk_rs = array(

                                $this->input->post('FS_TUJUAN_RUJUKAN_LUAR_RS'),
                                $this->input->post('FS_TUJUAN_RUJUKAN_LUAR_RS2'),
                                $this->input->post('FS_ALASAN_RUJUK_LUAR_RS'),
                                $this->input->post('FS_KD_REG'),
                            );
                            $this->Rawat_jalan_model->update_rujuk_rs($rujuk_rs);
                        } else {
                            $rujuk_rs = array(
                                $this->input->post('FS_KD_REG'),
                                $this->input->post('FS_TUJUAN_RUJUKAN_LUAR_RS'),
                                $this->input->post('FS_TUJUAN_RUJUKAN_LUAR_RS2'),
                                $this->input->post('FS_ALASAN_RUJUK_LUAR_RS'),
                                $this->session->userdata('user_name'),
                                date('Y-m-d'),
                                date('H:i:s')
                            );
                            $this->Rawat_jalan_model->insert_rujuk_rs($rujuk_rs);
                        }
                    } else if ($this->input->post('FS_CARA_PULANG') == '6') {
                        //rujuk internal
                        $this->Rawat_jalan_model->delete_skdp(array($this->input->post('FS_KD_REG')));
                        $this->Rawat_jalan_model->delete_rujuk_ke_faskes_primer(array($this->input->post('FS_KD_REG')));
                        if ($cek_rujukan_rs >= '1') {
                            $rujuk_internal = array(

                                $this->input->post('FS_TUJUAN_RUJUKAN'),
                                $this->input->post('FS_TUJUAN_RUJUKAN2'),
                                $this->input->post('FS_ALASAN_RUJUK'),
                                $this->input->post('FS_KD_REG'),
                            );
                            $this->Rawat_jalan_model->update_rujuk_rs($rujuk_internal);
                        } else {
                            $rujuk_internal = array(
                                $this->input->post('FS_KD_REG'),
                                $this->input->post('FS_TUJUAN_RUJUKAN'),
                                $this->input->post('FS_TUJUAN_RUJUKAN2'),
                                $this->input->post('FS_ALASAN_RUJUK'),
                                $this->session->userdata('user_name'),
                                date('Y-m-d'),
                                date('H:i:s')
                            );
                            $this->Rawat_jalan_model->insert_rujuk_rs($rujuk_internal);
                        }
                    } else if ($this->input->post('FS_CARA_PULANG') == '7') {
                        $this->Rawat_jalan_model->delete_skdp(array($this->input->post('FS_KD_REG')));
                        $this->Rawat_jalan_model->delete_rujuk_rs(array($this->input->post('FS_KD_REG')));
                        if ($cek_prb >= '1') {
                            $prb = array(
                                $this->input->post('FS_TGL_PRB'),
                                $this->input->post('FS_TUJUAN'),
                                $this->input->post('FS_KD_REG'),
                            );
                            $this->Rawat_jalan_model->update_rujuk_ke_faskes_primer($prb); 
                        } 
                            else {
                                $prb = array(
                                    $this->input->post('FS_KD_TRS'),
                                    $this->input->post('FS_KD_REG'),
                                    $this->input->post('FS_TGL_PRB'),
                                    $this->input->post('FS_TUJUAN'),
                                    $this->session->userdata('user_name'),
                                    date('Y-m-d'),
                                    date('H:i:s')
                                );
                 
                                $this->Rawat_jalan_model->insert_rujuk_ke_faskes_primer($prb);

                            }
                        // batas if input cara pulang
                    } 
                    else if ($this->input->post('FS_CARA_PULANG') == '8') {
                        //proses prb
                    }else {


                        echo $this->session->set_flashdata('warning', 'Pastikan Isian Sudah benar');
                        redirect('poliklinik/periksa/edit/' . $this->input->post('FS_KD_REG') . '/' . $this->session->userdata('user_name'));
                    }

                    $this->db->trans_commit();
                    echo $this->session->set_flashdata('success', 'Detail Pemeriksaan Berhasil Disimpan');
                    redirect('poliklinik/daftar-pasien');
                }
            } catch (\Throwable $th) {
                //throw $th;
                $this->db->trans_rollback();
                echo $this->session->set_flashdata('warning', 'Pastikan Isian Sudah benar');
                redirect('poliklinik/periksa/edit/' . $this->input->post('FS_KD_REG') . '/' . $this->session->userdata('user_name'));
            }
        } else {
            // handle error

            echo $this->session->set_flashdata('warning', 'Pastikan Isian Sudah benar');
            redirect('poliklinik/periksa/edit/' . $this->input->post('FS_KD_REG') . '/' . $this->session->userdata('user_name'));
        }
    }
}
