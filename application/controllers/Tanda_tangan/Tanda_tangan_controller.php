<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tanda_tangan_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('Berkas_model');
        $this->load->model('Dokter_model');
        $this->load->model('Tanda_tangan_model');
    }

    public function index()
    {

        $data = [
            'title' => 'Tanda Tangan Petugas',
            'content' => 'tanda_tangan/index',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'tanda_tangan' => $this->Tanda_tangan_model->get_data_ttd()
           
           
        ];
        $this->load->view('layouts/dashboard', $data);
    }


    public function proses_ttd()
    {
        $folderPath = "assets/images/ttd/";
        
        if(empty($this->input->post('signed'))){
            echo $this->session->set_flashdata('warning', 'Tanda tangan harus di isi');
            redirect ('ttd/list-ttd');
        }else{
        $image_parts = explode(";base64,", $this->input->post('signed')); 
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . $this->session->userdata('user_name') .date('Y-m-d'). '.'.$image_type;
    
        file_put_contents($file, $image_base64);
     
        $ttd=array(
            'username'=>$this->session->userdata('user_name'),
            'status' => $this->session->userdata('role_nm'),
            'image' => $file
        );
        $this->Tanda_tangan_model->insert_ttd($ttd);
        echo $this->session->set_flashdata('success', 'Tanda tangan berhasil ditambahkan');
        redirect ('ttd/list-ttd');

        }
    }

    public function edit_ttd($id_ttd)
    {

        $data = [
            'title' => 'Tanda Tangan Petugas',
            'content' => 'tanda_tangan/edit_ttd',
            'header' => datatable_header(),
            'footer' => datatable_footer(),
            'tanda_tangan' => $this->Tanda_tangan_model->get_data_ttd(),
            'detail' => $this->Tanda_tangan_model->get_detail($id_ttd)
           
           
        ];
        $this->load->view('layouts/dashboard', $data);
    }

    public function proses_edit_ttd()
    {
        $folderPath = "assets/images/ttd/";
        
        if(empty($this->input->post('signed'))){
            echo $this->session->set_flashdata('warning', 'Tanda tangan harus di isi');
            redirect ('ttd/list-ttd');
        }else{
            $gambar = $this->Tanda_tangan_model->get_detail($this->input->post('ID_TTD'));
        
            if($gambar['IMAGE']!=''){
                unlink($gambar['IMAGE']);
            }

        $image_parts = explode(";base64,", $this->input->post('signed')); 
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . $this->session->userdata('user_name') .date('Y-m-d'). '.'.$image_type;
      
        file_put_contents($file, $image_base64);

    
        

        $ttd=array(
            'username'=>$this->session->userdata('user_name'),
            'status' => $this->session->userdata('role_nm'),
            'image' => $file,
            'id_ttd' =>$this->input->post('ID_TTD')
        );
   

        $this->Tanda_tangan_model->edit_ttd($ttd);
        echo $this->session->set_flashdata('success', 'Tanda tangan berhasil ditambahkan');
        redirect ('ttd/list-ttd');

        }
    }

    public function delete_ttd($id_ttd){
        $gambar = $this->Tanda_tangan_model->get_detail($id_ttd);
        
        if($gambar['IMAGE']!=''){
            unlink($gambar['IMAGE']);
        }
        $this->Tanda_tangan_model->delete_ttd($id_ttd);
        echo $this->session->set_flashdata('success', 'Tanda tangan berhasil dihapus');
        redirect ('ttd/list-ttd');
    }
}
