<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class U extends CI_Controller 
{
    public function __construct(){
        parent::__construct();
        if(!($this->session->userdata('role')=='admin')){
            redirect('/admin/auth/index');
            die;
        }
    }
    
    public function index($id = 0){
        $id = intval($id);
        
        $data = $this->base_model->default_admin();
        $data['user'] = $this->base_model->get_user($id);
        $this->load->view('admin/user',$data);
	}

}