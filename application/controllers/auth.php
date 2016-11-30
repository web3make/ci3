<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function index(){
        if($this->session->userdata('role')=='admin'){
			redirect('/admin');
		}else{
			redirect('');
		}
	}

    public function reg(){
        $session_id = @$this->session->userdata('id_user');
        if($session_id) redirect('/admin');
        
        if (isset($_POST['password']) && isset($_POST['login'])){
            $array = array( 
                'user_name' => mysql_real_escape_string(strip_tags(trim($_POST['login']))),
                'password' => md5(trim($_POST['password'])),
                'control' => 'a',
            );
			$this->db->insert('users', $array);            
            $auth = $this->db->get_where('users',$array)->row();

            if (isset($auth) && !empty($auth)){
				$this->session->set_userdata(array('role'=>$auth->role, 'id_user'=>$auth->id_user));
					redirect('');
            } else
                $this->load->view('reg');
        } else
            $this->load->view('reg');
    }

    public function login()
    {
        $session_id = @$this->session->userdata('id_user');
        if($session_id) redirect('/admin');
        
        if (isset($_POST['password']) && isset($_POST['login'])){
            $array = array( 
                'user_name' => mysql_real_escape_string(strip_tags(trim($_POST['login']))),
                'password' => md5(trim($_POST['password'])),
                'control' => 'a',
            );

            $auth = $this->db->get_where('users',$array)->row();
            if (isset($auth) && !empty($auth)){
                $this->session->set_userdata(array('role'=>$auth->role, 'id_user'=>$auth->id_user));
				if($auth->role =="admin"){
					redirect('/admin');
				}else{
					redirect('');
				}
            } else
                $this->load->view('login');
        } else
            $this->load->view('login');
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('/auth/login');
    }
}