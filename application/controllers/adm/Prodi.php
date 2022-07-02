<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends My_Controller {

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
        $prodi = $this->db->query("SELECT*FROM prodi LEFT JOIN fakultas On prodi.id_fakultas = fakultas.id_fakultas WHERE prodi.deleted=0");

         $data=array(
            "prodiku"=>$prodi->result(),
            "fakultasku"=>$fakultas->result(),
        );
		 $this->Mypage('isi/adm/prodi',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_prodi', 'nm_prodi', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/prodi');
        }else{
            $data=array(
                "nm_prodi"=>$_POST['nm_prodi'],
                "kode_prodi"=>$_POST['kode_prodi'],
                "id_fakultas"=>$_POST['id_fakultas'],
                "jenjang"=>$_POST['jenjang'],
                "deleted" => 0
            );
            $this->db->insert('prodi',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/prodi');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nm_prodi', 'nm_prodi', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/prodi');
        }else{
            $data=array(
                "nm_prodi"=>$_POST['nm_prodi'],
                "kode_prodi"=>$_POST['kode_prodi'],
                "id_fakultas"=>$_POST['id_fakultas'],
                "jenjang"=>$_POST['jenjang']
            );
            $this->db->where('id_prodi', $_POST['id_prodi'] );
            $this->db->update('prodi',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/prodi');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/prodi');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_prodi', $id);
            $this->db->update('prodi',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/prodi');
        }
    }


	
}
