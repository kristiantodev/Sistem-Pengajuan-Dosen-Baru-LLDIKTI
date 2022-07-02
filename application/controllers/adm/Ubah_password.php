  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah_password extends My_Controller {

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
         $data["passwordku"] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
         $this->form_validation->set_rules('current_password', 'Password Lama','trim|required',
            [
             'required' => "Password Harus diisi..."
            ]);
         $this->form_validation->set_rules('pass_baru', 'Password Baru','trim|required|min_length[7]|max_length[10]|matches[pass_baru2]',
            [
             'required' => "Password Baru Harus diisi...",
             'min_length' => "Panjang Password Min. 7 Karakter...",
             'max_length' => "Panjang Password Max. 10 Karakter ...",
             'matches' => "Password Baru harus sama dengan Ulangi Password Baru..."
            ]);
         $this->form_validation->set_rules('pass_baru2', 'Password Baru Ulangi','trim|required|min_length[7]|max_length[10]|matches[pass_baru]',
            [
             'required' => "Password Baru Harus diisi...",
             'min_length' => "Panjang Password Min. 7 Karakter...",
             'max_length' => "Panjang Password Max. 10 Karakter ...",
             'matches' => "Ulangi Password Baru harus sama dengan Password Baru..."
            ]);

         if($this->form_validation->run() == false){
          $this->Mypage('isi/adm/ubahpassword',$data);
         }else{
            $lama = $this->input->post('current_password');
            $baru = $this->input->post('pass_baru');
            $baru2 = $this->input->post('pass_baru2');
        if(!password_verify($lama, $data['passwordku']['password'])){
              $this->session->set_flashdata('success', 'Password lama yang anda Masukan salah !! ');
              redirect(site_url('adm/ubah_password'));
            }else{
               if($lama == $baru) {
                $this->session->set_flashdata('success', 'Password Baru sama dengan Password Lama !! ');
                redirect(site_url('adm/ubah_password'));
               }else{
                $password_hash =password_hash($baru, PASSWORD_DEFAULT);
                $this->db->set('password', $password_hash);
                $this->db->where('id_user', $this->session->userdata('id_user'));
                $this->db->update('user');
                $this->session->set_flashdata('successs', 'Password berhasil dirubah !! ');
                redirect(site_url('adm/ubah_password'));

               }
            }
         }            
    }


    
    
}
