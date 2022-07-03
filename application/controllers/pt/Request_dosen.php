<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_dosen extends My_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        $this->load->library('session');
        if($this->session->userdata('level')!="Perguruan Tinggi"){
            $this->session->set_flashdata('pesan', 'Silahkan LOGIN Terlebih Dahulu Untuk Mengakses Halaman Tersebut !!');
            redirect(site_url('login/'));
        }
    }

    public function index(){

        $idPt = $this->session->userdata('id_pt');
        $request_dosen = $this->db->query("SELECT*FROM request_dosen WHERE id_pt='$idPt' AND status NOT IN('Accept', 'Reject', 'Request-Reject')");
        $prodi = $this->db->query("SELECT*FROM prodi WHERE deleted=0");

        $data=array(
            "request_dosenList"=>$request_dosen->result(),
            "prodiList"=>$prodi->result()
        );

        $this->Mypage('isi/pt/request_dosen',$data);
    }


    public function history(){

        $idPt = $this->session->userdata('id_pt');
        $request_dosen = $this->db->query("SELECT*FROM request_dosen WHERE id_pt='$idPt' AND status IN('Accept', 'Reject', 'Request-Reject')");
        $prodi = $this->db->query("SELECT*FROM prodi WHERE deleted=0");

        $data=array(
            "request_dosenList"=>$request_dosen->result(),
            "prodiList"=>$prodi->result()
        );

        $this->Mypage('isi/pt/history',$data);
    }



    public function add()
    {
        $this->form_validation->set_rules('nm_request', 'nm_request', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('pt/request_dosen');
        }else{

            $id = uniqid();
            $config['upload_path']          = './assets/images/request/';
            $config['allowed_types']        = 'pdf';
            $config['file_name']            = $id;
            $config['overwrite']            = true;
            $config['max_size']             = 2024;

            $this->load->library('upload', $config);

            $upload_ = $_FILES['file']['name'];

            if($upload_){
              if ($this->upload->do_upload('file')) {
               $fileNamePdf = $this->upload->data('file_name');
           }else{
            $this->session->set_flashdata('sukses',"gagal");
            redirect('pt/request_dosen');
        }

    }else{
        $fileNamePdf = 'default.png';
    }

    $data=array(
        "id_request"=>$id,
        "nm_request"=>$_POST['nm_request'],
        "id_pt"=>$this->session->userdata('id_pt'),
        "id_dosen"=>0,
        "dosen_specialist_id"=>$_POST['dosen_specialist_id'],
        "tgl_request"=>date('Y-m-d'),
        "keterangan"=>$_POST['keterangan'],
        "file"=>$fileNamePdf,
        "status"=>"New",
        "tgl_dibuat"=> date('Y-m-d H:i:s')
    );

    $this->db->insert('request_dosen',$data);

    $notifikasi=array(
      "id_request"=>$id,
      "id_pt"=>0,
      "notif_to"=>'admin',
      "is_read"=> 0,
      "tgl_notifikasi"=>date('Y-m-d H:i:s'),
      "status_request"=>"New"

    );
    $this->db->insert('notifikasi', $notifikasi);

    $this->session->set_flashdata('sukses',"berhasil");
    redirect('pt/request_dosen');
}
}

public function detail($id=null, $action=null){

    $request_dosen = $this->db->query("SELECT*FROM request_dosen
        LEFT JOIN perguruan_tinggi ON perguruan_tinggi.id_pt=request_dosen.id_pt
        LEFT JOIN user ON user.id_pt=request_dosen.id_pt
        LEFT JOIN prodi ON prodi.id_prodi=request_dosen.dosen_specialist_id
        LEFT JOIN dosen ON dosen.id_dosen=request_dosen.id_dosen
        WHERE request_dosen.id_request='$id'")->row();

    $data=array(
        "requestDetail"=>$request_dosen,
    );

    if ($action != null) {
        $notif = array(
       "is_read"=>1
        );
   $this->db->where('id_notifikasi', $action);
   $this->db->update('notifikasi',$notif);

   }

    $this->Mypage('isi/pt/detail_request',$data);
}


public function tolakDosen()
{
    $data=array(
        "status"=>"Reject",
        "note"=>$_POST['note']
    );
    $this->db->where('id_request', $_POST['id_request'] );
    $this->db->update('request_dosen',$data);

    $notifikasi=array(
                   "id_request"=>$_POST['id_request'],
                   "id_pt"=>0,
                   "notif_to"=>'admin',
                   "is_read"=> 0,
                   "tgl_notifikasi"=>date('Y-m-d H:i:s'),
                   "status_request"=>"Reject"

            );

           $this->db->insert('notifikasi', $notifikasi);

    $this->session->set_flashdata('sukses',"berhasil");

    $link='pt/request_dosen/detail/'.$_POST['id_request']; 
    redirect($link);
}


public function terimaDosen($id)
{
    if($id==""){
        $this->session->set_flashdata('error',"Data Gagal Di Hapus");
        redirect('pt/request_dosen');
    }else{
        $data=array(
            "status"=> "Accept"
        );
        $this->db->where('id_request', $id);
        $this->db->update('request_dosen',$data);

        $notifikasi=array(
                   "id_request"=>$id,
                   "id_pt"=>0,
                   "notif_to"=>'admin',
                   "is_read"=> 0,
                   "tgl_notifikasi"=>date('Y-m-d H:i:s'),
                   "status_request"=>"Accept"

            );

           $this->db->insert('notifikasi', $notifikasi);

        $this->session->set_flashdata('sukses',"berhasil");

        $link='pt/request_dosen/detail/'.$id; 
        redirect($link);
    }
}

public function edit()
{
    $data=array(
        "status"=>$_POST['status'],
        "created_at"=>$_POST['created_at']
    );
    $this->db->where('id_request', $_POST['id_request'] );
    $this->db->update('request_dosen',$data);
    $this->session->set_flashdata('sukses',"berhasil");
    redirect('pt/request_dosen');
}

public function revisiBerkas()
{
    $id = rand();
    $config['upload_path']          = './assets/images/request/';
    $config['allowed_types']        = 'pdf';
    $config['file_name']            = $id;
    $config['overwrite']            = true;
    $config['max_size']             = 2024;

    $this->load->library('upload', $config);

    $upload_ = $_FILES['file']['name'];
    if($upload_){

       if ($this->upload->do_upload('file')) {

           $pdfFile = $this->upload->data('file_name');
           // var_dump($_POST['old_file']);die;

           if($_POST['old_file'] != 'default.png'){
                $path = './assets/images/request/'.$_POST['old_file'];
                chmod($path, 0777);
                unlink($path);
            }

    }else{
        $this->session->set_flashdata('sukses',"gagal");
        $link='pt/request_dosen/detail/'.$_POST['id_request']; 
        redirect($link);
    }

}else{
    $pdfFile = $_POST['old_file'];
}

$data=array(
    "file" => $pdfFile,
    "status" => "RevisiDone"
);
$this->db->where('id_request', $_POST['id_request'] );
$this->db->update('request_dosen',$data);

 $notifikasi=array(
                   "id_request"=>$_POST['id_request'],
                   "id_pt"=>0,
                   "notif_to"=>'admin',
                   "is_read"=> 0,
                   "tgl_notifikasi"=>date('Y-m-d H:i:s'),
                   "status_request"=>"RevisiDone"

            );

           $this->db->insert('notifikasi', $notifikasi);

$this->session->set_flashdata('sukses',"berhasil");
$link='pt/request_dosen/detail/'.$_POST['id_request']; 
redirect($link);
}


}
