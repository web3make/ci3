<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller 
{
    public function index($id = 0){
		$id = intval($id);
        $data = $this->base_model->default_user();
        $data['articles'] = $this->base_model->get_category($id);
        $this->load->view('user/category',$data);
	}
}