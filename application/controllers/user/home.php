<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{
    public function index($id = 0){
        $id = intval($id);
        $this->load->library('pagination');
        
        $data = $this->base_model->default_user();

		$config = array(
            'base_url'    => base_url(), 
    		'total_rows'  => $this->db->count_all('articles'),
    		'first_link'  => 'first',
    		'last_link'   => 'last',
    		'next_link'   => '>',
    		'prev_link'   => '<',
    		'num_links'   => 3,
    		'per_page'    => $data['settings'][2]->value,
    		'uri_segment' => 1,
        );
                        
		$this->pagination->initialize($config);
            
        $data['pages'] = $this->pagination->create_links();
        $data['articles'] = $this->base_model->pagination($id,$data['settings'][2]->value);
		
        $this->load->view('user/home',$data);
	}
}
