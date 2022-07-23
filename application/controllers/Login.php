  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
         $this->form_validation->set_rules('username', 'Username','trim|required');
         $this->form_validation->set_rules('password', 'Password','trim|required');

         if($this->form_validation->run() == false){
          
          $this->load->view('pages-logi');
         
         }else{

            $this-> _auth();

         }
         
    }

    private function _auth(){

        $userku = $this->input->post('username');
        $passku = $this->input->post('password');
        $levelku = 'Administrator';

        $array = array('username' => $userku);
        $user_auth = $this->db->get_where('user', $array)->row_array();
        
        if($user_auth){
               if($passku === $user_auth['password']){

                $data = [
                'id_user' => $user_auth['id_user'],
                'username' => $user_auth['username'],
                'level' => $user_auth['level'],
                'nm_user' => $user_auth['nm_user'],
                'id_pt' => $user_auth['id_pt']
                ];

                $this->session->set_userdata($data);

                 if($this->session->userdata('level')=="Administrator"){
                        redirect('adm/dashboard');
                    }else if($this->session->userdata('level')=="Perguruan Tinggi"){
                        redirect('pt/dashboard');
                    }

               }else{

                $this->session->set_flashdata('pesan', 'Password yang Anda Masukan Salah !!');
                redirect('login/');

               }


        }else{
            $this->session->set_flashdata('pesan', 'Username yang Anda Masukan Salah !!');
            redirect('login/');
        }

    }
    
    
        
    public function logout()
    {
         $this->session->sess_destroy();
         redirect('login/');
    }

}
