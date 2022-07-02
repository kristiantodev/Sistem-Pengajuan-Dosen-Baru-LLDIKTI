<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pt extends My_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        $this->load->library('session');
        if($this->session->userdata('level')!="Administrator"){
            $this->session->set_flashdata('pesan', 'Silahkan LOGIN Terlebih Dahulu Untuk Mengakses Halaman Tersebut !!');
            redirect(site_url('login/'));
        }
	}

	public function index()
	{

        $pt = $this->db->query("SELECT*FROM perguruan_tinggi WHERE deleted=0");
        $jenis = $this->db->query("SELECT*FROM jenis_pt");

         $data=array(
            "ptku"=>$pt->result(),
            "jenisPT"=>$jenis->result(),
        );
		 $this->Mypage('isi/adm/pt',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_pt', 'nm_pt', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/pt');
        }else{
            $data=array(
                "nm_pt"=>$_POST['nm_pt'],
                "kode_pt"=>$_POST['kode_pt'],
                "jenis_pt"=>$_POST['jenis_pt'],
                "status_pt"=>$_POST['status_pt'],
                "lokasi"=>$_POST['lokasi'],
                "deleted" => 0
            );
            $this->db->insert('perguruan_tinggi',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/pt');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nm_pt', 'nm_pt', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/pt');
        }else{
            $data=array(
                "nm_pt"=>$_POST['nm_pt'],
                "kode_pt"=>$_POST['kode_pt'],
                "jenis_pt"=>$_POST['jenis_pt'],
                "status_pt"=>$_POST['status_pt'],
                "lokasi"=>$_POST['lokasi']
            );
            $this->db->where('id_pt', $_POST['id_pt'] );
            $this->db->update('perguruan_tinggi',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/pt');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/pt');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_pt', $id);
            $this->db->update('perguruan_tinggi',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/pt');
        }
    }


	
}
