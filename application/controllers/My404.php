  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My404 extends  My_Controller {

    public function __construct() 
    {
        parent::__construct(); 
    } 

    public function index() 
    { 
        $this->output->set_status_header('404'); 
        $data['content'] = 'error_404'; // View name 
        $this->load->view('error_404',$data);//loading in my template 
    } 
    } 
    ?>