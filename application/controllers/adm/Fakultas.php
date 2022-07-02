<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends My_Controller {

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

        $fakultas = $this->db->query("SELECT*FROM fakultas WHERE deleted=0");

         $data=array(
            "fakultasku"=>$fakultas->result(),
        );
		 $this->Mypage('isi/adm/fakultas',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_fakultas', 'nm_fakultas', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/fakultas');
        }else{
            $data=array(
                "nm_fakultas"=>$_POST['nm_fakultas'],
                "kode_fakultas"=>$_POST['kode_fakultas'],
                "deleted" => 0
            );
            $this->db->insert('fakultas',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/fakultas');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nm_fakultas', 'nm_fakultas', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/fakultas');
        }else{
            $data=array(
                "nm_fakultas"=>$_POST['nm_fakultas'],
                "kode_fakultas"=>$_POST['kode_fakultas']
            );
            $this->db->where('id_fakultas', $_POST['id_fakultas'] );
            $this->db->update('fakultas',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/fakultas');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/fakultas');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_fakultas', $id);
            $this->db->update('fakultas',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/fakultas');
        }
    }


	
}
