<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller 
{

    public function __construct(){
        parent::__construct();
        if(!($this->session->userdata('role')=='admin')){
            redirect('/auth/index');
            die;
        }
    }
    
    public function index($id = 0, $order = 0){        
        $id = intval($id);
        $order = intval($order);
        $this->load->library('pagination');
      
        $data = array();
		$data = $this->base_model->default_admin();
        
		$config = array(
            'base_url' =>  base_url().'/admin/category/'.$id.'/',
    		'total_rows' =>count($this->db->get_where('articles',array('id_category'=>$id))->result()),
    		'first_link' => 'first',
    		'last_link' => 'last',
    		'next_link' => '>',
    		'prev_link' => '<',
    		'num_links' => 3,
    		'per_page' => $data['settings'][2]->value,
    		'uri_segment' => 4,
        );
               
		$this->pagination->initialize($config);
        
        
        $data['pages'] = $this->pagination->create_links();
        $data['articles'] = $this->base_model->get_category($id,$order,$data['settings'][2]->value);

        $this->load->view('admin/category',$data);
	}

    public function create(){
        $data = $this->base_model->default_admin();
        $this->load->view('admin/category_new',$data);
	}
    
    public function edit($id = 0){
        $id = intval($id);
        $data = $this->base_model->default_admin();
        $data['category_item'] = $this->db->get_where('categories',array('id_category'=>$id))->row();
        $this->load->view('admin/category_edit',$data);
	}
    
    public function add($id = 0){
		$id = intval($id);
        $data = array(
            'title' => mysql_real_escape_string(trim($_POST['title'])),
        );
        $this->db->where('id_category',$id)
                    ->update('categories',$data);
        redirect('/admin/');
	}

    public function save(){
        $data = array(
            'title' => mysql_real_escape_string(trim($_POST['title'])),
        );
        $this->db->insert('categories',$data);
        redirect('/admin');
	}
    
    public function delete($id = 0)
	{
		$id = intval($id);
        $this->db->where('id_category',$id)->delete('categories');
        redirect('/admin');
	}
}