<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Controller 
{
    public function add($id = 0){
        if(!($id_user=$this->session->userdata('id_user'))){
            redirect('/auth/index');
            die;
        }
		
        $id = intval($id);
        $data = array(
            'id_user' =>$id_user,
            'text' => mysql_real_escape_string(trim($_POST['text'])),
            'id_article' => $id,
        );
        $this->db->insert('comments',$data);
        redirect('/article/'.$id);
	}
}