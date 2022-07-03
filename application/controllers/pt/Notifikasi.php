<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends My_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        $this->load->library('session');
        if($this->session->userdata('level')!="Perguruan Tinggi"){
            $this->session->set_flashdata('pesan', 'Silahkan LOGIN Terlebih Dahulu Untuk Mengakses Halaman Tersebut !!');
            redirect(site_url('login/'));
        }
	}

	public function index()
	{
        $idPt = $this->session->userdata('id_pt');
        $notif = $this->db->query("SELECT*FROM notifikasi
                                              
                                              INNER JOIN request_dosen ON request_dosen.id_request=notifikasi.id_request
                                              INNER JOIN perguruan_tinggi ON perguruan_tinggi.id_pt=request_dosen.id_pt
                                              INNER JOIN user ON request_dosen.id_pt=user.id_pt
                                              WHERE notifikasi.id_pt='$idPt' ORDER BY notifikasi.tgl_notifikasi DESC");

         $data=array(
            "listNotif"=>$notif->result(),
        );
		 $this->Mypage('isi/pt/notifikasi',$data);
	}
	
}
