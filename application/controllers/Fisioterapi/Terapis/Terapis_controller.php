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
        $this->load->model('Rekam_medis_model');
        $this->load->model('Tanda_tangan_model');
    }

    public function index()
    {

        $kodeDokter = $this->session->userdata('user_name');
        $datenow = date('Y-m-d');

        $data = [
            'title' => 'Cppt Fisioterapi',
            'content' => 'fisioterapi/list_pasien_fisioterapi',
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

        redirect('fisioterapi/transaksi_fisio/' . $this->input->post('pasien'));

    }

    public function create($mr)
    {

        $data = [
            'title' => 'Cppt Fisioterapi',
            'content' => 'fisioterapi/create_transaksi',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'biodata' => $this->Pasien_model->get_biodata_pasien_by_mr(array($mr)),
            'transaksis' => $this->Fisioterapi_model->get_transaksi_fisioterapi_by_mr(array($mr)),
            // 'tr_fisio' => $this->Fisioterapi_model->get_transaksi_fisioterapi_by_mr(array($mr)),
            // 'tr_fisio' => $this->Fisioterapi_model->count_fisio_by_kode_transaksi(array('FISIO-24-00003')),
        ];
        // var_dump($data['tr_fisio']);
        // die;
        $this->load->view('layouts/dashboard', $data);
    }
    public function informed_concent()
    {

        $datenow=date('Y-m-d');
        $data = [
            'title' => 'Informed Concent Fisioterapi',
            'content' => 'fisioterapi/informed_concent/surat_informed_concent',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'pasiens' => $this->Fisioterapi_model->get_pasien_rajal_fisioterapi(array($datenow,$datenow)),
            
        ];
        // var_dump($data['tr_fisio']);
        // die;
        $this->load->view('layouts/dashboard', $data);
    }

    // add proses informed concent
    public function store_informed_concent(){

        // var_dump($kd);
        // die;
        
        $inform_concent = array(
            $this->input->post('KODE_REGISTER'),
            date('Y-m-d'),
            $this->session->userdata('user_name'),
            $this->input->post('IDENTIFIKASI'),
            $this->input->post('RUANGAN'),
            date('G:i:s')
         
        );

        // var_dump($cppt_fisio);
        // die;

        $this->Fisioterapi_model->insert_inform_concent_fisioterapi($inform_concent);
        echo $this->session->set_flashdata('success', 'Data telah berhasil di simpan');
        redirect ('fisioterapi/informed_concent');
    }


    public function create_cppt($mr,$kode_transaksi)
    {

        $data = [
            'kode_transaksi' => $kode_transaksi,
            'title' => 'Cppt Fisioterapi',
            'content' => 'fisioterapi/create_cppt',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'biodata' => $this->Pasien_model->get_biodata_pasien_by_mr(array($mr)),
            'fisioterapis' => $this->Fisioterapi_model->get_medis_fisioterapi_by_mr(array($mr)),
            'dokter' => $this->Fisioterapi_model->get_dokter_by_mr_transaksi_fisio(array($kode_transaksi)),
            

        ];
   
        $this->load->view('layouts/dashboard', $data);
    }

    public function ttd_pasien($mr,$kode_transaksi)
    {

  
        $data = [
            'mr' => $mr,
            'kode_transaksi' => $kode_transaksi,
            'title' => 'Tanda Tangan pasien',
            'content' => 'tanda_tangan/pasien/index',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
     
            

        ];
   
        $this->load->view('layouts/dashboard', $data);
    }
    
    public function edit_cppt($mr,$kode_transaksi,$id_cppt)
    {
         // Memecah string menjadi array
         $jenis_terapi_fisio =  $this->Fisioterapi_model->get_medis_fisioterapi_by_id(array($id_cppt));
         $data = array();
         $string = $jenis_terapi_fisio['JENIS_FISIO'];
         $string = trim($string, ','); // Menghapus koma di awal dan akhir string (jika ada)
 
         if (!empty($string)) {
             $jenis_fisio = explode(', ', $string);
         }
   

        $data = [
            'jenis_fisio'=>$jenis_fisio,
            'kode_transaksi' => $kode_transaksi,
            'title' => 'Edit Cppt Fisioterapi',
            'content' => 'fisioterapi/edit_cppt',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'biodata' => $this->Pasien_model->get_biodata_pasien_by_mr(array($mr)),
            'edit_fisioterapi' => $this->Fisioterapi_model->get_medis_fisioterapi_by_id(array($id_cppt)),
       
            

        ];
   
        $this->load->view('layouts/dashboard', $data);
    }

    public function store_ttd_pasien(){
        $folderPath = "assets/images/ttd/pasien/";
        
        if(empty($this->input->post('signed'))){
            echo $this->session->set_flashdata('warning', 'Tanda tangan harus di isi');
            redirect ('fisioterapi/ttd_pasien/'.$this->input->post('NO_MR'));
        }else{
        $image_parts = explode(";base64,", $this->input->post('signed')); 
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . $this->input->post('NO_MR').'-' .date('Y-m-d'). '.'.$image_type;
    
        file_put_contents($file, $image_base64);
     
        $ttd=array(
            'NO_MR'=>$this->input->post('NO_MR'),
            'CREATE_AT' => date('Y-m-d'),
            'IMAGE' => $file
        );
        $this->Tanda_tangan_model->insert_ttd_pasien($ttd);
        echo $this->session->set_flashdata('success', 'Tanda tangan berhasil ditambahkan');
  
        redirect ('fisioterapi/cppt/'.$this->input->post('NO_MR').'/'.$this->input->post('KODE_TRANSAKSI'));

        }
    }


    public function store(){

     

        $kode_transaksi = $this->Fisioterapi_model->generate_kode_transaksi_fisio();

        // var_dump($this->session->userdata('user_name'));
        // die;
        $this->form_validation->set_rules('JUMLAH_TOTAL_FISIO', 'JUMLAH_TOTAL_FISIO', 'required');
        if ($this->form_validation->run() !== false) {

            if($this->input->post('JUMLAH_TOTAL_FISIO')>'8'){
                echo $this->session->set_flashdata('warning', 'Pastikan jumlah maksimal fisioterapi adalah 8 kali');
                redirect ('fisioterapi/transaksi_fisio/' . $this->input->post('NO_MR_PASIEN'));
            }else {
                $transaksi_fisio = array(
                    $kode_transaksi,
                    $this->input->post('NO_MR_PASIEN'),
                    $this->input->post('JUMLAH_TOTAL_FISIO'),
                    date('Y-m-d'),
                    $this->session->userdata('user_name')
                );
        
                $this->Fisioterapi_model->insert_transaksi_fisioterapi($transaksi_fisio);
                echo $this->session->set_flashdata('success', 'Data telah berhasil di tambahkan');
                redirect ('fisioterapi/transaksi_fisio/' . $this->input->post('NO_MR_PASIEN'));
            }
 
        }
        else {
            echo $this->session->set_flashdata('warning', 'Jumlah fisioterapi harus di isi');
            redirect ('fisioterapi/transaksi_fisio/' . $this->input->post('NO_MR_PASIEN'));
        }
    }

    public function update_transaksi_cppt(){

        $this->form_validation->set_rules('JUMLAH_TOTAL_FISIO', 'JUMLAH_TOTAL_FISIO', 'max_length[1]');
        if ($this->form_validation->run() !== false) {

            if($this->input->post('JUMLAH_TOTAL_FISIO')>'8'){
                echo $this->session->set_flashdata('warning', 'Pastikan jumlah maksimal fisioterapi adalah 8 kali');
                redirect ('fisioterapi/transaksi_fisio/' . $this->input->post('NO_MR_PASIEN'));
            }else {
                $transaksi_fisio = array(

                    $this->input->post('JUMLAH_TOTAL_FISIO'),
                    $this->input->post('ID_TRANSAKSI')
                );
        
                $this->Fisioterapi_model->update_total_cppt_fisioterapi($transaksi_fisio);
                echo $this->session->set_flashdata('success', 'Data telah berhasil di update');
                redirect ('fisioterapi/transaksi_fisio/' . $this->input->post('NO_MR_PASIEN'));
            }
    } else {
        echo $this->session->set_flashdata('warning', 'Pastikan jumlah maksimal fisioterapi adalah 8 kali');
        redirect ('fisioterapi/transaksi_fisio/' . $this->input->post('NO_MR_PASIEN'));
    }
}

    public function store_cppt(){

        $jenis_terapi = $this->input->post('JENIS_TERAPI');
        $terapi='';
        if (!empty($jenis_terapi)) {
            foreach ($jenis_terapi as  $value) {
                $terapi=$value.', '.$terapi;
            }
        }

        // var_dump($kd);
        // die;
        
        $cppt_fisio = array(
            $this->input->post('KD_TRANSAKSI_FISIO'),
            $this->input->post('NO_MR'),
            $this->input->post('TEKANAN_DARAH'),
            $this->input->post('NADI'),
            $this->input->post('SUHU'),
            $terapi,
            $this->input->post('TANGGAL_FISIO'),
            $this->input->post('JAM_FISIO'),
            $this->input->post('CARA_PULANG'),
            date('Y-m-d'),
            $this->session->userdata('user_name'),
            $this->input->post('ANAMNESA')
        );

        // var_dump($cppt_fisio);
        // die;

        $this->Fisioterapi_model->insert_cppt_fisioterapi($cppt_fisio);
        $cek_ttd_pasien = $this->Tanda_tangan_model->cek_ttd_pasien(array($this->input->post('NO_MR')));
        if($cek_ttd_pasien<'1'){
       
            redirect('fisioterapi/ttd_pasien/'.$this->input->post('NO_MR').'/'.$this->input->post('KD_TRANSAKSI_FISIO'));
        }
        else {
            echo $this->session->set_flashdata('success', 'Data telah berhasil di simpan');
            redirect ('fisioterapi/cppt/' . $this->input->post('NO_MR').'/'. $this->input->post('KD_TRANSAKSI_FISIO'));
        }
    }


    public function update_cppt(){

        $jenis_terapi = $this->input->post('JENIS_TERAPI');
        $terapi='';
        if (!empty($jenis_terapi)) {
            foreach ($jenis_terapi as  $value) {
                $terapi=$value.', '.$terapi;
            }
        }

        // var_dump($kd);
        // die;
        
        $cppt_fisio = array(
            $this->input->post('KD_TRANSAKSI_FISIO'),
            $this->input->post('NO_MR'),
            $this->input->post('TEKANAN_DARAH'),
            $this->input->post('NADI'),
            $this->input->post('SUHU'),
            $terapi,
            $this->input->post('TANGGAL_FISIO'),
            $this->input->post('JAM_FISIO'),
            $this->input->post('CARA_PULANG'),
            date('Y-m-d'),
            $this->session->userdata('user_name'),
            $this->input->post('ANAMNESA'),
            $this->input->post('ID_CPPT_FISIO')

        );

        // var_dump($cppt_fisio);
        // die;

        $this->Fisioterapi_model->update_cppt_fisioterapi($cppt_fisio);
        echo $this->session->set_flashdata('success', 'Data telah berhasil di simpan');
        redirect ('fisioterapi/cppt/' . $this->input->post('NO_MR').'/'. $this->input->post('KD_TRANSAKSI_FISIO'));
    }

    public function delete($id_cppt_fisio,$no_mr){


        $this->Fisioterapi_model->delete_transaksi_fisio($id_cppt_fisio);
        echo $this->session->set_flashdata('success', 'Data telah berhasil di hapus');

        redirect ('fisioterapi/transaksi_fisio/' . $no_mr);
    }

    public function delete_cppt($no_mr,$kode_transaksi,$id_cppt_fisio){


        $this->Fisioterapi_model->delete_cppt_fisio($id_cppt_fisio);
        echo $this->session->set_flashdata('success', 'Data telah berhasil di hapus');
        redirect ('fisioterapi/cppt/' . $no_mr.'/'.$kode_transaksi);
    }

    public function cetak_bukti_pelayanan($kode_transaksi,$no_mr)
    {
        $this->load->library('pdfgenerator');

       $date=date('Y-m-d');
        $data = [
            'title' => 'Cetak',
            'biodata' => $this->Pasien_model->get_biodata_pasien_by_mr_datenow(array($no_mr,$date)),
            'medis_fisio' => $this->Fisioterapi_model->get_medis_fisioterapi_by_kode_transaksi(array($kode_transaksi)),
            'create_at_fisio' => $this->Fisioterapi_model->get_medis_fisioterapi_by_kode_transaksi_max(array($kode_transaksi)),
            'medis_cppt_fisio' => $this->Fisioterapi_model->get_medis_cppt_fisioterapi_by_kode_transaksi(array($kode_transaksi)),
            'dokter' => $this->Fisioterapi_model->get_dokter_by_mr_transaksi_fisio(array($kode_transaksi)),
            // 'ttd' => $this->Fisioterapi_model->get_ttd(array($this->session->userdata('user_name'))),
            'alamat' => $this->Rekam_medis_model->get_alamat(),
        ];

        // filename dari pdf ketika didownload
        $file_pdf = 'Cetak';

        $paper = 'F4';
        $orientation = "portait";
        $html = $this->load->view('report_rekam_medis/fisioterapi/bukti_pelayanan', $data, true);

        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function cetak_cppt($kode_transaksi,$no_mr)
    {
        $this->load->library('pdfgenerator');

       $date=date('Y-m-d');
        $data = [
            'title' => 'Cetak',
            'biodata' => $this->Pasien_model->get_biodata_pasien_by_mr_datenow(array($no_mr,$date)),
            'medis_fisio' => $this->Fisioterapi_model->get_medis_fisioterapi_by_kode_transaksi(array($kode_transaksi)),
            'create_at_fisio' => $this->Fisioterapi_model->get_medis_fisioterapi_by_kode_transaksi_max(array($kode_transaksi)),
            'medis_cppt_fisio' => $this->Fisioterapi_model->get_medis_cppt_fisioterapi_by_kode_transaksi_cppt(array($kode_transaksi)),
            'dokter' => $this->Fisioterapi_model->get_dokter_by_mr_transaksi_fisio(array($kode_transaksi)),
            'alamat' => $this->Rekam_medis_model->get_alamat(),
        ];

        // filename dari pdf ketika didownload
        $file_pdf = 'Cetak';

        $paper = 'A4';
        $orientation = "portait";
        $html = $this->load->view('report_rekam_medis/fisioterapi/cppt', $data, true);

        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function cetak_informed_concent($kode_register)
    {
        $this->load->library('pdfgenerator');

       $date=date('Y-m-d');
        $data = [
            'title' => 'Cetak',
            'biodata' => $this->Pasien_model->get_biodata_pasien_by_noreg_dokter(array($kode_register)),
            'informed_concent' => $this->Fisioterapi_model->get_data_informed_concent_by_noreg(array($kode_register)),
            'alamat' => $this->Rekam_medis_model->get_alamat(),
        ];

        // filename dari pdf ketika didownload
        $file_pdf = 'Cetak';

        $paper = 'A4';
        $orientation = "portait";
        $html = $this->load->view('report_rekam_medis/fisioterapi/informed_consent', $data, true);

        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
