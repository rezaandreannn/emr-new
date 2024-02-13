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

    public function create($no_register, $kode_dokter)
    {
        $data = [
            'title' => 'Tambah Data',
            'content' => 'poliklinik/dokter/assesmen_pasien',
            'kode_dokter' => $kode_dokter,
            'no_reg' => $no_register,
            'biodata' => $this->Pasien_model->get_biodata_pasien_by_mr_dokter(array($no_register)),
            'labs' => $this->Laboratorium_model->list_pemeriksaan_lab(),
            'radiologis' => $this->Radiologi_model->list_pemeriksaan_rad(),
            'obats' => $this->Obat_model->list_nama_obat(),
            'dokters' => $this->Dokter_model->list_nama_dokter_spesialis(),
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
                    $this->sesion->userdata('user_id'),
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
                        $no_antrian_far['ANTRIAN'] = '0';
                    }
                    $antrian_sekarang = $no_antrian_far['ANTRIAN'] + 1;

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
                    echo $this->session->set_flashdata('success', 'Detail data pemeriksaan berhasil disimpan');

                    // // if cara pulang belum fix
                    // if(){

                    // }
                    // elseif(){

                    // }
                    // batas if input cara pulang
                } else {

                    //redirect back belum fix jika gagal input

                }

                $this->db->trans_commit();
            } catch (\Throwable $th) {
                //throw $th;
                $this->db->trans_rollback();
                echo $this->session->set_flashdata('warning', 'Pastikan Isian Sudah benar');

                // redirect belum fix
                // redirect('prwt/rajal/edit/' . $this->input->post('FS_KD_REG') . '/' . $this->input->post('FS_KD_MEDIS'));
            }
        } else {
            // handle error
            echo $this->session->set_flashdata('warning', 'Pastikan Isian Sudah benar');
            // redirect belum fix
            // redirect('prwt/rajal/create/' . $this->input->post('FS_KD_REG') . '/' . $this->input->post('FS_KD_MEDIS'));;
        }
    }
    //end pemeriksaan dokter


}
