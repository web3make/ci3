<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Controller 
{
    public function __construct(){
        parent::__construct();
        if(!($this->session->userdata('role')=='admin')){
            redirect('/admin/auth/index');
            die;
        }
    }
    

    public function index($id = 0){
        $id = intval($id);
        
        $data = $this->base_model->default_admin();
        
        $data['article'] = $this->db->select('title,id_article')
                                    ->get_where('articles',array('id_article'=>$id))
                                    ->row();
        $data['comments'] = $this->db->get_where('comments',array('id_article'=>$id))->result();
        
        $this->load->view('admin/comments',$data);
	}

    public function edit($id = 0)
	{
		$id = intval($id);
        
        $data = $this->base_model->default_admin();
        
        $data['comment'] = $this->db->get_where('comments',array('id_comment'=>$id))->row();
        
        $this->load->view('admin/comment_edit',$data);
	}
    
    public function save($id = 0, $id_article = 0)
	{
		$id = intval($id);
        $id_article = intval($id_article);
        $data = array(
            'user_name' => mysql_real_escape_string(trim($_POST['user_name'])),
            'text' => mysql_real_escape_string(trim($_POST['text'])),
        );
        $this->db->where('id_comment',$id)
                    ->update('comments',$data);
        redirect('/admin/comments/'.$id_article);
	}
    

    public function delete($id = 0, $id_article = 0)
	{
		$id = intval($id);
        $id_article = intval($id_article);
        $this->db->where('id_comment',$id)
                    ->delete('comments');
        redirect('/admin/comments/'.$id_article);
	}
}