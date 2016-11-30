<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class People extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        if(!($this->session->userdata('role')=='admin')){
            redirect('/auth/index');
            die;
        }
    }
    public function index($id = 0)
	{
        if(!$this->session->userdata('id_user'))
        {
            redirect('/admin/auth/index');
            die;
        }
            
        $id = intval($id);
        $this->load->library('pagination');
        
        $data = $this->base_model->default_admin();
        /**/
		$config = array(
            'base_url'    => base_url().'admin/people', 
    		'total_rows'  => $this->db->count_all('users'),
    		'first_link'  => 'first',
    		'last_link'   => 'last',
    		'next_link'   => '>',
    		'prev_link'   => '<',
    		'num_links'   => 3,
    		'per_page'    => $data['settings'][2]->value,
    		'uri_segment' => 3,
        );
                        
		$this->pagination->initialize($config);
            
        $data['pages'] = $this->pagination->create_links();/**/
        $data['people'] = $this->base_model->people_pagination($id,$data['settings'][2]->value);

        $this->load->view('admin/people',$data);
	}

    public function user($id = 0)
	{
        if(!$this->session->userdata('id_user'))
        {
            redirect('/admin/auth/index');
            die;
        }
            
        $id = intval($id);
        $this->load->library('pagination');
        
        $data = $this->base_model->default_admin();
		$role="'user'";

		$config = array(
            'base_url'    => base_url().'admin/people/user', 
    		'total_rows'  => count($this->db->get_where('users',array('role'=>'user'))->result()),
    		'first_link'  => 'first',
    		'last_link'   => 'last',
    		'next_link'   => '>',
    		'prev_link'   => '<',
    		'num_links'   => 3,
    		'per_page'    => $data['settings'][2]->value,
    		'uri_segment' => 3,
        );
                        
		$this->pagination->initialize($config);
            
        $data['pages'] = $this->pagination->create_links();
		
        $data['people'] = $this->base_model->people_role_pagination($id,$data['settings'][2]->value, $role);
        
        $this->load->view('admin/people',$data);
	}


    public function admin($id = 0)
	{
        if(!$this->session->userdata('id_user'))
        {
            redirect('/admin/auth/index');
            die;
        }
            
        $id = intval($id);
        $this->load->library('pagination');
        
        $data = $this->base_model->default_admin();
		$role="'admin'";
        /**/
		$config = array(
            'base_url'    => base_url().'admin/people/admin', 
    		'total_rows'  => count($this->db->get_where('users',array('role'=>'admin'))->result()),
    		'first_link'  => 'first',
    		'last_link'   => 'last',
    		'next_link'   => '>',
    		'prev_link'   => '<',
    		'num_links'   => 3,
    		'per_page'    => $data['settings'][2]->value,
    		'uri_segment' => 3,
        );
                        
		$this->pagination->initialize($config);
            
        $data['pages'] = $this->pagination->create_links();/* */
        $data['people'] = $this->base_model->people_role_pagination($id,$data['settings'][2]->value, $role);
        
        // Подключение отображения
        $this->load->view('admin/people',$data);
	}
    public function save($id = 0)
	{
		$id = intval($id);
        $data = array(
            'role' => mysql_real_escape_string(trim($_POST['role'])),
            'control' => mysql_real_escape_string(trim($_POST['control'])),
        );
        $this->db->where('id_user',$id)
                    ->update('users',$data);
        redirect('/admin/u/'.$id);
	}

}