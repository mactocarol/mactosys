<?php
class Jobs_model extends HT_Model 
{
	function __construct() {
		parent::__construct();		
	}
    
    function filter_jobs($category,$time,$job_type,$job_for,$location,$specialization,$title,$salary='',$experience=''){
        $this->db->select('j.*,c.name');
        $this->db->from('jobs as j');
        $this->db->join('category as c','j.category=c.id','Left');
        $this->db->where('j.status','1');
        if($category != ''){            
            $this->db->where_in('j.category',$category);    
        }
        
        if($time != '' ){
            $today = date('Y-m-d h:i:s');            
            if($time == 1) { $start = date('Y-m-d h:i:s', strtotime('-1 day', strtotime($today))); }
            if($time == 2) { $start = date('Y-m-d h:i:s', strtotime('-2 day', strtotime($today))); }
            if($time == 3) { $start = date('Y-m-d h:i:s', strtotime('-15 day', strtotime($today))); }
            if($time == 4) { $start = date('Y-m-d h:i:s', strtotime('-30 day', strtotime($today))); }
            if($time == 5) { $start = date('Y-m-d h:i:s', strtotime('-60 day', strtotime($today))); }
            //echo $start; die;
            $this->db->where('j.created_at >=',$start);    
        }
        
        if($job_type != '' && !in_array(0,$job_type)){
            $this->db->where_in('j.job_type',$job_type);    
        }
        
        if($job_for != '' && !in_array('both',$job_for)){
            $this->db->where_in('j.gender',$job_for);    
        }
        if($location != ''){
            $this->db->like('j.location',$location,'both');    
        }
        if($specialization != ''){
            $this->db->like('j.specialization',$specialization,'after');    
        }
        if($title != ''){
            $this->db->like('j.title',$title,'both');    
        }
        if($salary != ''){
            $this->db->where('j.salary >=',intval($salary));    
        }
        if($experience != ''){
            if($experience){
                $this->db->where('j.experience >=',intval($experience));       
            }else{
                $this->db->where('j.experience',intval($experience));    
            }            
        }
        $this->db->order_by('j.id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    
}