<?php
class settings extends CI_Controller 
{
	public function __construct(){
        parent::__construct();
        if(!($this->session->userdata('role')=='admin')){
            redirect('/auth/index');
            die;
        }
    }

    public function index(){
        if(!$this->session->userdata('id_user')){
            redirect('/admin/auth/index');
            die;
        }
        
        $temp = $this->db->get('settings')->result();
        
        $new = array();
        foreach ($temp as $key => $i){
            $new[$i->title] = $i->value;
        }
        $new['login'] = $this->db->get('users')->row('user_name');
        
        $data = array(
            'category'  => $this->db->get('categories')->result(),
            'settings'  => $new
        );

        $this->load->view('admin/settings',$data);
	}
    
    public function save(){
        $this->load->helper('validate');
        $post = validate($_POST);
        
        foreach ($post as $key => $i) {
            
            if ($key == 'login'){
                $this->db->where('id_user',1)->update('users',array('user_name'=>$i));
            }elseif ($key == 'password'){
                $this->db->where('id_user',1)->update('users',array('password'=>md5($i)));
            } 
            else 
                $this->db->where('title',$key)->update('settings',array('value'=>$i));
        }
        
        redirect('/admin');
	}
}