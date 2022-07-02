  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller {

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
  
      
         $dataArray=array(
            "profilPT" => $this->db->get_where("perguruan_tinggi", ["id_pt" => $this->session->userdata('id_pt')])->row(),
                  );
		 $this->Mypage('isi/pt/dashboard', $dataArray);
	}

    
	
}
