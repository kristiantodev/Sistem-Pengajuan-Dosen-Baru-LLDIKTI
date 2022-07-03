<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends My_Controller {

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

        if(isset($_POST['date_start']) )
        {
            $dateStart = $_POST['date_start'];
			$dateEnd = $_POST['date_end'];
        }else{
            $dateStart = date('Y-m-d');
			$dateEnd = date('Y-m-d');
        }

		$laporan = $this->db->query("SELECT * FROM request_dosen
        LEFT JOIN perguruan_tinggi ON perguruan_tinggi.id_pt=request_dosen.id_pt
        LEFT JOIN user ON user.id_pt=request_dosen.id_pt
        LEFT JOIN prodi ON prodi.id_prodi=request_dosen.dosen_specialist_id
        LEFT JOIN dosen ON dosen.id_dosen=request_dosen.id_dosen
        WHERE request_dosen.tgl_request BETWEEN '$dateStart' AND '$dateEnd'");

         $data=array(
            "laporanList"=>$laporan->result(),
			"tgl_mulai" => $dateStart,
            "tgl_sampai" => $dateEnd,
        );
		 $this->Mypage('isi/adm/laporan',$data);

	}
	
}
