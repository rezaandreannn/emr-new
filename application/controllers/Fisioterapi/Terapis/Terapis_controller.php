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
            

        ];
   
        $this->load->view('layouts/dashboard', $data);
    }


    public function store(){

     

        $kode_transaksi = $this->Fisioterapi_model->generate_kode_transaksi_fisio();

        // var_dump($this->session->userdata('user_name'));
        // die;
        
        $transaksi_fisio = array(
            $kode_transaksi,
            $this->input->post('NO_MR_PASIEN'),
            $this->input->post('JUMLAH_TOTAL_FISIO'),
            date('Y-m-d'),
            $this->session->userdata('user_name')
        );

        $this->Fisioterapi_model->insert_transaksi_fisioterapi($transaksi_fisio);

        redirect ('fisioterapi/transaksi_fisio/' . $this->input->post('NO_MR_PASIEN'));
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

        redirect ('fisioterapi/cppt/' . $this->input->post('NO_MR').'/'. $this->input->post('KD_TRANSAKSI_FISIO'));
    }

    public function delete($id_cppt_fisio,$no_mr){


        $this->Fisioterapi_model->delete_transaksi_fisio($id_cppt_fisio);

        redirect ('fisioterapi/transaksi_fisio/' . $no_mr);
    }

    public function delete_cppt($no_mr,$kode_transaksi,$id_cppt_fisio){


        $this->Fisioterapi_model->delete_cppt_fisio($id_cppt_fisio);

        redirect ('fisioterapi/cppt/' . $no_mr.'/'.$kode_transaksi);
    }

}
