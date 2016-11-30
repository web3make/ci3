<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller 
{
    public function index($id = 0)
	{
        $id = intval($id);
        
        $data = $this->base_model->default_user();
        
        $data['article'] = $this->base_model->get_article($id);
        $data['comments'] = $this->base_model->get_comments($id);
        $this->load->view('user/article',$data);
	}
}