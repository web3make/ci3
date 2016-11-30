<?php

class Base_model extends CI_Model
{

    public function default_admin(){
        $data = array(
            'category'  => $this->db->get('categories')->result(),
            'settings'  => $this->db->get('settings')->result()
        );
        
        return $data;
    }
    
    public function default_user(){
        $data = array(
            'category'  => $this->db->get('categories')->result(),
            'settings'  => $this->db->get('settings')->result()
        );
        
        return $data;
    }


    public function people_pagination($id = 0, $num = 0, $role='', $control=''){
        $str = "SELECT 
                	u.id_user,
					u.user_name,
					u.role,
					u.control
                    
                FROM users AS u
				
                GROUP BY u.id_user
                ORDER BY u.id_user DESC
                LIMIT $id,$num";
        return $this->db->query($str)->result();
    }

    public function people_role_pagination($id = 0, $num = 0, $role='')
    {
        $str = "SELECT 
                	u.id_user,
					u.user_name,
					u.role,
					u.control
                    
                FROM users AS u

				WHERE u.role = $role
				
                GROUP BY u.id_user
                ORDER BY u.id_user DESC
                LIMIT $id,$num";
        return $this->db->query($str)->result();
    }
/*--------------------------------------------------------------------------------------*/   
    public function get_user($id = 0)
    {
		$array = array('id_user' => $id);
		return $this->db->get_where('users',$array)->row();
    }
/*--------------------------------------------------------------------------------------*/   
    public function pagination($id = 0, $num = 0)
    {
        $str = "SELECT 
                	a.id_article,
                	a.title,
                	a.text,
                    a.id_category,
                	DATE(a.date) AS `date`,
                	COUNT(c.id_comment) AS `comments`,
                    cat.title as `category`
                    
                FROM articles AS a
                
                	LEFT JOIN comments AS c
                	ON c.id_article = a.id_article
                    
                    LEFT JOIN categories AS cat
                	ON cat.id_category = a.id_category
                    
                GROUP BY a.id_article
                ORDER BY a.id_article DESC
                LIMIT $id,$num";
        return $this->db->query($str)->result();
    }

    public function get_article($id = 0)
    {
        $str = "SELECT
                	a.id_article,
                	a.title,
                	a.text,
                    a.id_category,
                	DATE(a.date) AS `date`,
                	COUNT(c.id_comment) AS `comments`,
                    cat.title as `category`
                    
                FROM articles AS a
                
                	LEFT JOIN comments AS c
                	ON c.id_article = a.id_article
                    
                    LEFT JOIN categories AS cat
                	ON cat.id_category = a.id_category
                    
                WHERE a.id_article = $id
                GROUP BY a.id_article
                ORDER BY a.id_article DESC";
        return $this->db->query($str)->row();
    }
/*---------------------------------------------*/    
	public function get_comments($id){
        $str = "SELECT 
                	cm.id_comment,
					cm.text,
					cm.id_article,
					cm.id_user,
					u.user_name 
                    
                FROM comments AS cm
                
                	LEFT JOIN users AS u
                	ON u.id_user = cm.id_user
                    
                WHERE cm.id_article = $id";
        return $this->db->query($str)->result();		
	}
/*---------------------------------------------*/    

    public function get_category($id = 0, $num=0, $count=3) 
    {
        $str = "SELECT 
                	a.id_article,
                	a.title,
                	a.text,
                    a.id_category,
                	DATE(a.date) AS `date`,
                	COUNT(c.id_comment) AS `comments`,
                    cat.title as `category`
                    
                FROM articles AS a
                
                	LEFT JOIN comments AS c
                	ON c.id_article = a.id_article
                    
                    LEFT JOIN categories AS cat
                	ON cat.id_category = a.id_category
                    
                WHERE a.id_category = $id
                GROUP BY a.id_article
                ORDER BY a.id_article DESC
				 LIMIT $num,$count";
        return $this->db->query($str)->result();
    }
}