  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller {

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

      $request_dosen = $this->db->query("SELECT COUNT(*) as jumlah, status FROM request_dosen GROUP BY status")->result();

         $data=array(
            "request_dosenList"=>$request_dosen,
        );
   
		 $this->Mypage('isi/adm/dashboard', $data);
	}

    
	
}
