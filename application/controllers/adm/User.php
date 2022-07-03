  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends My_Controller {

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
         $query = $this->db->query("SELECT*FROM user LEFT JOIN perguruan_tinggi ON user.id_pt = perguruan_tinggi.id_pt");
         $ptQuery = $this->db->query("SELECT*FROM perguruan_tinggi WHERE deleted=0");
         $data=array(
            "userku"=>$query->result(),
            "ptku"=>$ptQuery->result(),
        );
		 $this->Mypage('isi/adm/user',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_user', 'nm_user', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/user');
        }else{
            $userPost = $_POST['username'];
            $cekQuery = $this->db->query("SELECT * FROM user WHERE username = '$userPost'")->result_array();
            if(count($cekQuery) <= 0){
            $idku = uniqid();

            if ($_POST['level'] == "Administrator") {
                $pt = 0;
            }else{
                $pt = $_POST['id_pt'];   
                $cekQount = $this->db->query("SELECT COUNT(*) as jumlah FROM user WHERE id_pt = '$pt'")->row();
                if($cekQount->jumlah != 0){
                    $this->session->set_flashdata('sukses',"gagalDuplikat");
                    redirect('adm/user');
                }
            
            }
            $pass = password_hash ($_POST['password'], PASSWORD_DEFAULT);
            $data=array(
                "id_user" => $idku,
                "username"=>$_POST['username'],
                "password"=>$pass,
                "nm_user"=>$_POST['nm_user'],
                "level"=>$_POST['level'],
                "foto"=>"1.jpg",
                "id_pt"=>$pt
            );
            $this->db->insert('user',$data);

            $this->session->set_flashdata('sukses',"berhasil");
        }else{
            $this->session->set_flashdata('sukses',"gagal");
        }
            redirect('adm/user');
        }
    }
    

    public function edit()
    {
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/user');
        }else{
            $data=array(
                "nm_user"=>$_POST['nm_user'],
                "alamat"=>$_POST['alamat']
            );
            $this->db->where('id_user', $_POST['id_user'] );
            $this->db->update('user',$data);
            $this->session->set_flashdata('sukses',"Data Berhasil Diedit");
            redirect('adm/user');
        }
    }


public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/alumni');
        }else{
            $cekQount = $this->db->query("SELECT COUNT(*) as jumlah FROM request_dosen
            LEFT JOIN user ON request_dosen.id_pt=user.id_pt WHERE user.id_user = '$id'")->row();
                if($cekQount->jumlah != 0){
                    $this->session->set_flashdata('sukses',"gagalHapus");
                    redirect('adm/user');
                }
            $this->db->where('id_user', $id);
            $this->db->delete('user');
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/user');
        }
    }


	
}
