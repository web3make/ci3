<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{
    public function index($id = 0){
        $id = intval($id);
        $this->load->library('pagination');
        
        $data = $this->base_model->default_user();
        $data['articles'] = $this->base_model->pagination($id,$data['settings'][2]->value);
		
        $this->load->view('user/home',$data);
	}
}