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
        $this->load->model('Rawat_jalan_model');
        $this->load->model('Pasien_model');
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
            'pasiens' => $this->Pasien_model->get_pasien_rajal_by_kode_dokter(array($datenow, $kodeDokter, $datenow, $kodeDokter))
        ];
        // var_dump($data['dokters']);
        // die;
        $this->load->view('layouts/dashboard', $data);
    }

    public function create($no_register,$kode_dokter)

    {

        $get_mr_pasien = $this->Pasien_model->find_pasien_by_register($no_register);

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
            'kode_dokter'=>$kode_dokter,
            'no_reg'=>$no_register,
            'list_masalah_keperawatan' => $this->Perawat_model->list_masalah_keperawatan(),
            'list_rencana_keperawatan' => $this->Perawat_model->rencana_keperawatan(),
            'list_icd' => $this->Perawat_model->get_icd(),
            'histories' => $this->Pasien_model->get_history_by_mr(array($mr)),
            'biodata' => $this->Pasien_model->get_biodata_pasien_by_mr(array($mr))
        ];
        $this->load->view('layouts/dashboard', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('FS_ANAMNESA', 'FS_ANAMNESA', 'required|max_length[64]');
        $this->form_validation->set_rules('FS_EDUKASI', 'FS_EDUKASI', 'max_length[64]');
        $this->form_validation->set_rules('FS_SUHU', 'FS_SUHU', 'required|max_length[64]');
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
        $this->form_validation->set_rules('FS_ALERGI', 'FS_ALERGI', 'required|max_length[64]');
        $this->form_validation->set_rules('FS_REAK_ALERGI', 'FS_REAK_ALERGI', 'required|max_length[64]');
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
        $this->form_validation->set_rules('FS_NILAI_KHUSUS', 'FS_NILAI_KHUSUS', 'required|max_length[64]');
        $this->form_validation->set_rules('FS_NILAI_KHUSUS2', 'FS_NILAI_KHUSUS2', 'max_length[64]');
        // $this->form_validation->set_rules('tujuan', 'tujuan', );
        // $this->form_validation->set_rules('tembusan', 'tembusan', 'max_length[64]');
        $this->form_validation->set_rules('FS_SKDP_FASKES', 'FS_SKDP_FASKES', 'max_length[64]');
        $this->form_validation->set_rules('kode_icd_x', 'kode_icd_x', 'max_length[64]');
        if ($this->form_validation->run() !== false) {

            $cek_status = $this->Rawat_jalan_model->cek_status_asasmen($this->input->post('FS_KD_REG'));
            if($cek_status->num_rows() > 0){
                echo $this->session->set_flashdata('warning', 'Pasien sudah di asasmen');
                redirect('prwt/rajal/create/'.$this->input->post('FS_KD_REG').'/'.$this->input->post('FS_KD_MEDIS'));;
            }
            else{
                try {
                    // query add proses
                    // insert status rj
                    $status_rj = array(
                       $this->input->post('FS_KD_REG'),
                       '1',
                       '1',
                       'A',
                       $this->session->userdata('user_id'), 
                       date('Y-m-d')
                   );
          
                   $this->Rawat_jalan_model->insert_status_rj($status_rj);
                   
                   // end input status rj
                   // insert vital sign rj
                   $vital_sign = array(
                       $this->input->post('FS_KD_REG'),
                       $this->input->post('FS_SUHU'),
                       $this->input->post('FS_NADI'),
                       $this->input->post('FS_R'),
                       $this->input->post('FS_TD'),
                       $this->input->post('FS_TB'),
                       $this->input->post('FS_BB'),
                       $this->input->post('FS_KD_MEDIS'),
                       $this->session->userdata('user_id'),
                       date('Y-m-d'),
                       date('H:i:s')
                   );
                   $this->Rawat_jalan_model->insert_vital_sign($vital_sign);
                   // end insert vital sign
                   //insert nyeri
                   $nyeri = array(
                       $this->input->post('FS_KD_REG'),
                       $this->input->post('FS_NYERIP'),
                       $this->input->post('FS_NYERIQ'),
                       $this->input->post('FS_NYERIR'),
                       $this->input->post('FS_NYERIS'),
                       $this->input->post('FS_NYERIT'),
                       $this->session->userdata('user_id'),
                       date('Y-m-d'),
                       $this->input->post('FS_NYERI')
                   );
                   $this->Rawat_jalan_model->insert_nyeri($nyeri);
                   //end insert nyeri
                   //resiko jatuh
                   $resiko_jatuh = array(
                       $this->input->post('FS_KD_REG'),
                       $this->input->post('FS_CARA_BERJALAN1'),
                       $this->input->post('FS_CARA_BERJALAN2'),
                       $this->input->post('FS_CARA_DUDUK'),
                       $this->input->post('intervensi1')? 'Ya' : 'Tidak',
                       $this->input->post('intervensi2')? 'Ya' : 'Tidak',
                       $this->session->userdata('user_id'),
                       date('Y-m-d')
                   ); 
                   $this->Rawat_jalan_model->insert_resiko_jatuh($resiko_jatuh);
   
                   //asasmen perawat
                   $asasmen_perawat = array(
                       $this->input->post('FS_KD_REG'),
                       $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                       $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                       '',
                       '',
                       $this->input->post('FS_STATUS_PSIK'),
                       $this->input->post('FS_STATUS_PSIK2'),
                       $this->input->post('FS_HUB_KELUARGA'),
                       $this->input->post('FS_ST_FUNGSIONAL'),
                       $this->input->post('FS_AGAMA'),
                       $this->input->post('FS_NILAI_KHUSUS'),
                       $this->input->post('FS_NILAI_KHUSUS'),
                       $this->input->post('FS_ANAMNESA'),
                       $this->input->post('FS_PENGELIHATAN'),
                       $this->input->post('FS_PENCIUMAN'),
                       $this->input->post('FS_PENDENGARAN'),
                       $this->input->post('FS_RIW_IMUNISASI') ? $this->input->post('FS_RIW_IMUNISASI') : '0',
                       $this->input->post('FS_RIW_IMUNISASI_KET') ? $this->input->post('FS_RIW_IMUNISASI_KET') : '0',
                       $this->input->post('FS_RIW_TUMBUH') ? $this->input->post('FS_RIW_TUMBUH') : '0',
                       $this->input->post('FS_RIW_TUMBUH_KET') ? $this->input->post('FS_RIW_TUMBUH_KET') : '0',
                       '',
                       $this->input->post('FS_EDUKASI'),
                       $this->input->post('FS_SKDP_FASKES'),
                       $this->session->userdata('user_id'),
                       date('Y-m-d')
                   );
                   $this->Rawat_jalan_model->insert_asesmen_perawat($asasmen_perawat);
   
                   //insert alergi
                   $alergi = array(
                       $this->input->post('FS_ALERGI'),
                       $this->input->post('FS_REAK_ALERGI'),
                       $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                       $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                       $this->input->post('FS_MR')
                   );
                   $this->Rawat_jalan_model->insert_alergi($alergi);
   
                   //insert nutrisi
                   $nutrisi = array(
                       $this->input->post('FS_KD_REG'),
                       $this->input->post('FS_NUTRISI1'),
                       $this->input->post('FS_NUTRISI2'),
                       $this->input->post('FS_NUTRISI_ANAK1') ? $this->input->post('FS_NUTRISI_ANAK1') : '',
                       $this->input->post('FS_NUTRISI_ANAK2') ? $this->input->post('FS_NUTRISI_ANAK2') : '',
                       $this->input->post('FS_NUTRISI_ANAK3') ? $this->input->post('FS_NUTRISI_ANAK3') : '',
                       $this->input->post('FS_NUTRISI_ANAK4') ? $this->input->post('FS_NUTRISI_ANAK4') : '',
                       $this->session->userdata('user_id'),
                       date('Y-m-d')
                   );
                   $this->Rawat_jalan_model->insert_nutrisi($nutrisi);
   
                   $masalah_kep = $this->input->post('tujuan');
                   if (!empty($masalah_kep)) {
                       foreach ($masalah_kep as $value) {
                           $this->Rawat_jalan_model->insert_masalah_kep(array($this->input->post('FS_KD_REG'), $value));
                       }
                   }
                   $rencana_kep = $this->input->post('tembusan');
                   if (!empty($rencana_kep)) {
                       foreach ($rencana_kep as $value) {
                           $this->Rawat_jalan_model->insert_rencana_kep(array($this->input->post('FS_KD_REG'), $value));
                       }
                   }
   
                   $this->db->trans_commit();
                   // echo $this->session->set_flashdata('warning', 'Username atau Password tidak boleh kosong');
                   redirect('prwt/rajal/create/'.$this->input->post('FS_KD_REG').'/'.$this->input->post('FS_KD_MEDIS'));;
                   
                    } 
                catch (\Throwable $th) {
                    //throw $th;
                    $this->db->trans_rollback();
                    redirect('prwt/rajal/create/'.$this->input->post('FS_KD_REG').'/'.$this->input->post('FS_KD_MEDIS'));;
                    }
            }
            
        } else {
            // handle error
            echo $this->session->set_flashdata('warning', 'Pastikan Isian Sudah benar');      
            redirect('prwt/rajal/create/'.$this->input->post('FS_KD_REG').'/'.$this->input->post('FS_KD_MEDIS'));;
        }
    }


    public function edit($no_register,$kode_dokter)
    {
        $get_mr_pasien = $this->Pasien_model->find_pasien_by_register($no_register);

        foreach ($get_mr_pasien as $get_mr) {
            $mr = $get_mr['No_MR'];
        }
        // var_dump($mr);
        // die;

        $data = [
            'title' => 'Form edit Rawat Jalan',
            'content' => 'nurse/rajal/edit',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'kode_dokter'=>$kode_dokter,
            'no_reg'=>$no_register,
            'asesmen_perawat' => $this->Rawat_jalan_model->get_asesmen_perawat_by_no_reg(array($no_register)),
            'vs' => $this->Rawat_jalan_model->get_vital_sign_by_no_reg(array($no_register)),
            'asesmen_nyeri' => $this->Rawat_jalan_model->get_asesmen_nyeri_by_no_reg(array($no_register)),
            'asesmen_jatuh' => $this->Rawat_jalan_model->get_asesmen_jatuh_by_no_reg(array($no_register)),
            'nutrisi' => $this->Rawat_jalan_model->get_nutrisi_by_no_reg(array($no_register)),
            'masalah_keperawatan' => $this->Rawat_jalan_model->masalah_keperawatan_by_no_reg(array($no_register)),
            'rencana_keperawatan' => $this->Rawat_jalan_model->rencana_keperawatan_by_no_reg(array($no_register)),
            'riw_kesehatan' => $this->Pasien_model->get_riwayat_kesehatan_pasien_by_no_reg(array($no_register)),
            'list_masalah_keperawatan' => $this->Perawat_model->list_masalah_keperawatan(),
            'list_rencana_keperawatan' => $this->Perawat_model->rencana_keperawatan(),
            'list_icd' => $this->Perawat_model->get_icd(),
            'histories' => $this->Pasien_model->get_history_by_mr(array($mr)),
            'biodata' => $this->Pasien_model->get_biodata_pasien_by_mr(array($mr))
        ];
        // var_dump($data['rencana_keperawatan']);
        // die;
        $this->load->view('layouts/dashboard', $data);
    }

    public function update()
    {
    }
}
