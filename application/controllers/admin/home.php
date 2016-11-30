<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        if(!($this->session->userdata('role')=='admin')){
            redirect('/auth/index');
            die;
        }
    }

	
    public function index($id = 0){
        if(!$this->session->userdata('id_user')){
            redirect('/admin/auth/index');
            die;
        }
            
        $id = intval($id);
        $this->load->library('pagination');
        
        $data = $this->base_model->default_admin();

		$config = array(
            'base_url'    => base_url().'admin/', 
    		'total_rows'  => $this->db->count_all('articles'),
    		'first_link'  => 'first',
    		'last_link'   => 'last',
    		'next_link'   => '>',
    		'prev_link'   => '<',
    		'num_links'   => 3,
    		'per_page'    => $data['settings'][2]->value,
    		'uri_segment' => 2,
        );
                        
		$this->pagination->initialize($config);
            
        $data['pages'] = $this->pagination->create_links();
        $data['articles'] = $this->base_model->pagination($id,$data['settings'][2]->value);
        
        $this->load->view('admin/home',$data);
	}
}