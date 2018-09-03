<?php
class Musician_model extends HT_Model 
{
	function __construct() {
		parent::__construct();		
	}
    
    function search_by_genre($genre,$type){
        $this->db->select('*');
        $this->db->from('products');
        if($genre){
            $this->db->where('genre',$genre);
        }
        if($type){
            $this->db->like('file_type',$type);
        }
        $this->db->where('user_id !=',$this->session->userdata('user_id'));                
        $query = $this->db->get();
        //echo $this->db->last_query(); die;
        //print_r($query->result()); die;
        return $query->result_array();
    }
    
    function search_by_role($role){
        $this->db->select('u.*,c.name as role');
        $this->db->from('users as u');
        $this->db->join('category as c','u.user_type = c.id','left');
        if($role){
            $this->db->where('u.user_type',$role);
        }            
        $query = $this->db->get();        
        return $query->result_array();
    }
    
    function get_my_investors($userid){
        $this->db->select('u.username,u.email,v.*,vs.amount,vs.status,vs.created_at,vs.id as shareid');
        $this->db->from('video_share as vs');
        $this->db->join('video as v' , 'vs.video_id = v.id','left');
        $this->db->join('users as u' , 'vs.receiver_id = u.id','left');
        $this->db->order_by('vs.id','desc');
        $this->db->where('vs.sender_id',$userid);
        $query = $this->db->get();
        //echo $this->db->last_query(); die;
        return $query->result();
    }
    
    function get_my_job($userid){
        $this->db->select('u.companyname,u.email,v.*,vs.amount,vs.status,vs.created_at,vs.id as shareid');
        $this->db->from('video_share as vs');
        $this->db->join('video as v' , 'vs.video_id = v.id','left');
        $this->db->join('users as u' , 'vs.sender_id = u.id','left');
        $this->db->order_by('vs.id','desc');
        $this->db->where('vs.receiver_id',$userid);
        $query = $this->db->get();
        //echo $this->db->last_query(); die;
        return $query->result();
    }
}