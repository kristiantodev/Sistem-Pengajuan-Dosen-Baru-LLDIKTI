<?php
defined('BASEPATH') OR exit('No direct scriadm access allowed');

class Request_dosen extends My_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        $this->load->library('session');
        if($this->session->userdata('level')!="Administrator"){
            $this->session->set_flashdata('pesan', 'Silahkan LOGIN Terlebih Dahulu Untuk Mengakses Halaman Tersebut !!');
            redirect(site_url('login/'));
        }
	}

	public function index(){

        $request_dosen = $this->db->query("SELECT*FROM request_dosen
            LEFT JOIN perguruan_tinggi ON perguruan_tinggi.id_pt=request_dosen.id_pt
            LEFT JOIN user ON user.id_pt=request_dosen.id_pt
            LEFT JOIN prodi ON prodi.id_prodi=request_dosen.dosen_specialist_id
            LEFT JOIN dosen ON dosen.id_dosen=request_dosen.id_dosen
            WHERE request_dosen.status='New'");

         $data=array(
            "request_dosenList"=>$request_dosen->result(),
        );

		 $this->Mypage('isi/adm/request_dosen',$data);
	}

    public function inprogress(){

        $request_dosen = $this->db->query("SELECT*FROM request_dosen
            LEFT JOIN perguruan_tinggi ON perguruan_tinggi.id_pt=request_dosen.id_pt
            LEFT JOIN user ON user.id_pt=request_dosen.id_pt
            LEFT JOIN prodi ON prodi.id_prodi=request_dosen.dosen_specialist_id
            LEFT JOIN dosen ON dosen.id_dosen=request_dosen.id_dosen
            WHERE request_dosen.status NOT IN('Accept', 'Reject', 'Request-Reject', 'New')");

         $data=array(
            "request_dosenList"=>$request_dosen->result(),
        );

         $this->Mypage('isi/adm/request_dosen_inprogress',$data);
    }

    public function close(){

        $request_dosen = $this->db->query("SELECT*FROM request_dosen
            LEFT JOIN perguruan_tinggi ON perguruan_tinggi.id_pt=request_dosen.id_pt
            LEFT JOIN user ON user.id_pt=request_dosen.id_pt
            LEFT JOIN prodi ON prodi.id_prodi=request_dosen.dosen_specialist_id
            LEFT JOIN dosen ON dosen.id_dosen=request_dosen.id_dosen
            WHERE request_dosen.status IN('Accept', 'Reject', 'Request-Reject')");

         $data=array(
            "request_dosenList"=>$request_dosen->result(),
        );

         $this->Mypage('isi/adm/request_dosen_close',$data);
    }

    public function detail($id=null, $action=null){

        $request_dosen = $this->db->query("SELECT * FROM request_dosen
            LEFT JOIN perguruan_tinggi ON perguruan_tinggi.id_pt=request_dosen.id_pt
            LEFT JOIN user ON user.id_pt=request_dosen.id_pt
            LEFT JOIN prodi ON prodi.id_prodi=request_dosen.dosen_specialist_id
            LEFT JOIN dosen ON dosen.id_dosen=request_dosen.id_dosen
            WHERE request_dosen.id_request='$id'")->row();

         $request_dosen2 = $this->db->query("SELECT * FROM request_dosen WHERE
           request_dosen.id_request='$id'")->row();

       $data=array(
            "requestDetail"=>$request_dosen,
            "requestDetail2"=>$request_dosen2,
        );

    if ($action != null) {
         $notif=array(
        "is_read"=>1
    );
    $this->db->where('id_notifikasi', $action);
    $this->db->update('notifikasi',$notif);

    }

         $this->Mypage('isi/adm/detail_request',$data);
    }

    public function revisi()
    {
            $data=array(
                "status"=>"Revisi",
                "note"=>$_POST['note']
            );
            $this->db->where('id_request', $_POST['id_request'] );
            $this->db->update('request_dosen',$data);
            $this->session->set_flashdata('sukses',"berhasil");

            $notifikasi=array(
                   "id_request"=>$_POST['id_request'],
                   "id_pt"=>$_POST['id_pt'],
                   "notif_to"=>'',
                   "is_read"=> 0,
                   "tgl_notifikasi"=>date('Y-m-d H:i:s'),
                   "status_request"=>"Revisi"

            );

           $this->db->insert('notifikasi', $notifikasi);

            $link='adm/request_dosen/detail/'.$_POST['id_request']; 
            redirect($link);
    }

    public function tolak()
    {
            $data=array(
                "status"=>"Request-Reject"
            );
            $this->db->where('id_request', $_POST['id_request'] );
            $this->db->update('request_dosen',$data);
            
            $notifikasi=array(
                   "id_request"=>$_POST['id_request'],
                   "id_pt"=>$_POST['id_pt'],
                   "notif_to"=>'',
                   "is_read"=> 0,
                   "tgl_notifikasi"=>date('Y-m-d H:i:s'),
                   "status_request"=>"Request-Reject"

            );

           $this->db->insert('notifikasi', $notifikasi);

            $this->session->set_flashdata('sukses',"berhasil");

            $link='adm/request_dosen/detail/'.$_POST['id_request']; 
            redirect($link);
    }

     public function verifikasi()
    {
            $data=array(
                "status"=>"Request-Accept",
                "id_dosen"=>$_POST['id_dosen']
            );
            $this->db->where('id_request', $_POST['id_request'] );
            $this->db->update('request_dosen',$data);

            $notifikasi=array(
                   "id_request"=>$_POST['id_request'],
                   "id_pt"=>$_POST['id_pt'],
                   "notif_to"=>'',
                   "is_read"=> 0,
                   "tgl_notifikasi"=>date('Y-m-d H:i:s'),
                   "status_request"=>"Request-Accept"

            );

           $this->db->insert('notifikasi', $notifikasi);

            $this->session->set_flashdata('sukses',"berhasil");

            $link='adm/request_dosen/detail/'.$_POST['id_request']; 
            redirect($link);
    }

	
}
