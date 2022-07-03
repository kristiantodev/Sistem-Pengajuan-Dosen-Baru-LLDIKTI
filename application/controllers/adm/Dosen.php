<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dosen extends My_Controller {

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

        $dosen = $this->db->query("SELECT*FROM dosen
         LEFT JOIN prodi ON prodi.id_prodi=dosen.id_prodi
         LEFT JOIN perguruan_tinggi ON perguruan_tinggi.id_pt=dosen.id_pt
         WHERE dosen.deleted=0");

        $prodi = $this->db->query("SELECT*FROM prodi WHERE deleted=0");
        $pt = $this->db->query("SELECT*FROM perguruan_tinggi WHERE deleted=0");
        $jabatan = $this->db->query("SELECT*FROM jabatan");
        $ikatan = $this->db->query("SELECT*FROM jenis_ikatan");

         $data=array(
            "dosenList"=>$dosen->result(),
            "prodiList"=>$prodi->result(),
            "jabatanList"=>$jabatan->result(),
            "ikatanList"=>$ikatan->result(),
            "ptList"=>$pt->result(),
        );
		 $this->Mypage('isi/adm/dosen',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_dosen', 'nm_dosen', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/dosen');
        }else{

            $id = rand();
            $config['upload_path']          = './assets/images/dosen/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $id;
            $config['overwrite']            = true;
            $config['max_size']             = 2024;

            $this->load->library('upload', $config);

            $upload_image = $_FILES['foto']['name'];

            if($upload_image){
                 if ($this->upload->do_upload('foto')) {
                     $img = $this->upload->data('file_name');
                  }else{
                    $this->session->set_flashdata('sukses',"gagal");
                    redirect('adm/dosen');
                  }

              }else{
                $img = 'default.png';
              }

            $data=array(
                "nm_dosen"=>$_POST['nm_dosen'], //done
                "nip"=>$_POST['nip'], //done
                "foto"=>$img, //done
                "no_registrasi"=>$_POST['no_registrasi'], //done
                "tempat_lahir"=>$_POST['tempat_lahir'], //done
                "tgl_lahir"=>$_POST['tgl_lahir'], //done
                "tmp_dosen"=>$_POST['tmp_dosen'], // with angka kredit
                "jenis_ikatan"=>$_POST['jenis_ikatan'],
                "status_dosen"=>$_POST['status_dosen'], //done
                "jabatan"=>$_POST['jabatan'],
                "angka_kredit"=>$_POST['angka_kredit'], // with tmp_dosen
                "id_prodi"=>$_POST['id_prodi'],
                "id_pt"=>$_POST['id_pt'],
                "last_edu"=>$_POST['last_edu'],
                "tahun_lulus"=>$_POST['tahun_lulus'],
                "deleted" => 0
            );
            $this->db->insert('dosen',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/dosen');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nm_dosen', 'nm_dosen', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/dosen');
        }else{

            $id = rand();
            $config['upload_path']          = './assets/images/dosen/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $id;
            $config['overwrite']            = true;
            $config['max_size']             = 2024;

            $this->load->library('upload', $config);

            $upload_image = $_FILES['foto']['name'];

            if($upload_image){
                 if ($this->upload->do_upload('foto')) {

                 $img = $this->upload->data('file_name');

                 if($_POST['old_image'] != 'default.png'){
                    $path = './assets/images/dosen/'.$_POST['old_image'];
                    chmod($path, 0777);
                    unlink($path);
                 }

                  }else{
                    $this->session->set_flashdata('sukses',"gagal");
                    redirect('adm/dosen');
                  }

              }else{
                $img = $_POST['old_image'];
              }


             $data=array(
                "nm_dosen"=>$_POST['nm_dosen'],
                "nip"=>$_POST['nip'],
                "foto"=>$img,
                "no_registrasi"=>$_POST['no_registrasi'],
                "tempat_lahir"=>$_POST['tempat_lahir'],
                "tgl_lahir"=>$_POST['tgl_lahir'],
                "tmp_dosen"=>$_POST['tmp_dosen'],
                "jenis_ikatan"=>$_POST['jenis_ikatan'],
                "status_dosen"=>$_POST['status_dosen'],
                "jabatan"=>$_POST['jabatan'],
                "angka_kredit"=>$_POST['angka_kredit'],
                "id_prodi"=>$_POST['id_prodi'],
                "id_pt"=>$_POST['id_pt'],
                "last_edu"=>$_POST['last_edu'],
                "tahun_lulus"=>$_POST['tahun_lulus'],
                "deleted" => 0
            );
            $this->db->where('id_dosen', $_POST['id_dosen'] );
            $this->db->update('dosen',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/dosen');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/dosen');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_dosen', $id);
            $this->db->update('dosen',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/dosen');
        }
    }


	
}
