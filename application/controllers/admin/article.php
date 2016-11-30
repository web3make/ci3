<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller 
{

    public function __construct(){
        parent::__construct();
        if(!($this->session->userdata('role')=='admin')){
            redirect('/auth/index');
            die;
        }
    }
    
    public function index($id = 0){
        $id = intval($id);
        
        $data = $this->base_model->default_admin();
        
        $data['article'] = $this->base_model->get_article($id);
        $data['comments'] = $this->db->get_where('comments',array('id_article'=>$id))->result();
        $this->load->view('admin/article',$data);
	}
    
    public function create(){
        $data = $this->base_model->default_admin();
        $this->load->view('admin/article_create',$data);
	}

    public function add(){
        $data = array(
            'title' => mysql_real_escape_string(trim($_POST['title'])),
            'text' => mysql_real_escape_string(trim($_POST['text'])),
            'date' => date('Y-m-d H:i:s'),
            'id_category' => $_POST['category'],
        );
        $this->db->insert('articles',$data);
        redirect('/admin');
	}

    public function save($id = 0, $cat = 1){
		$id = intval($id);
        $cat = intval($cat);
        $data = array(
            'title' => mysql_real_escape_string(trim($_POST['title'])),
            'text' => mysql_real_escape_string(trim($_POST['text'])),
            'id_category' => $cat,
        );
        $this->db->where('id_article',$id)
                    ->update('articles',$data);
        redirect('/admin/article/'.$id);
	}

    public function delete($id = 0){
		$id = intval($id);
        $this->db->where('id_article',$id)
                    ->delete('articles');
        redirect('/admin');
	}
}