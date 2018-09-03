<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jobs extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('jobs_model');
            
        }
        public function index(){            
            
            $data=new stdClass();
            if($this->session->flashdata('item')) {
                $items = $this->session->flashdata('item');
                if($items->success){
                    $data->error=0;
                    $data->success=1;
                    $data->message=$items->message;
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message=$items->message;
                }                
            }
            
            $data->posted_jobs = $this->jobs_model->joindataResult('j.category','c.id',array('j.user_id'=>$this->session->userdata('user_id')),'j.*,c.name','jobs as j','category as c','j.id desc');
            foreach($data->posted_jobs as $key=>$value){
                $total_application = $this->jobs_model->SelectSingleRecord('jobs_applied','*',array('job_id'=>$value['id']),$orderby=array());
                $data->posted_jobs[$key]['total_app'] = count($total_application);
            }
            
            //echo "<pre>"; print_r($data); die;
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->jobs_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            //echo "<pre>"; print_r($data); die;
            $data->title = 'My Posted Jobs';
            $data->field = 'Datatable';
            $data->page = 'posted_jobs';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('posted_jobs_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        public function post(){
            if(!$this->session->userdata('logged_in')){
                $url = site_url('jobs/post/');
                redirect('user/index/?return='.urlencode($url));
            }
            $data=new stdClass();
            if($this->session->flashdata('item')) {
                $items = $this->session->flashdata('item');
                if($items->success){
                    $data->error=0;
                    $data->success=1;
                    $data->message=$items->message;
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message=$items->message;
                }
                
            }
            
            $userdata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->jobs_model->SelectSingleRecord('users','*',$userdata,$orderby=array());
            
                if(!empty($_POST)){                    
                        //print_r($_POST);die;
                       
                        $udata['title'] = $this->input->post('title');
                        $udata['description'] = $this->input->post('editor1');
                        $udata['category'] = $this->input->post('category');
                        $udata['job_type'] = $this->input->post('job_type');
                        $udata['salary'] = $this->input->post('salary');
                        $udata['experience'] = $this->input->post('experience');
                        $udata['gender'] = $this->input->post('gender');
                        $udata['location'] = $this->input->post('location');
                        $udata['specialization'] = $this->input->post('specialization');
                        $udata['user_id'] = $this->session->userdata('user_id');
                        $udata['status'] = 1;
                        //print_r($udata); die;
                        if($this->jobs_model->InsertRecord('jobs',$udata)){                                                                                 
                             $data->error=0;
                             $data->success=1;
                             $data->message="Job Posted Successfully.";
                        }else{
                             $data->error=1;
                             $data->success=0;
                             $data->message="Network Error";
                        }
                       
                    
                    $this->session->set_flashdata('item',$data);
                    redirect('jobs/post');
                }
            $data->categories = $this->jobs_model->SelectRecord('category','*',array(),'id asc');    
            $data->title = 'Post Job';
            $data->field = '';
            $data->page = 'post_job';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('job_post_view',$data);
            $this->load->view('user/includes/footer',$data);    
                
        }                        
        
        public function edit($id){
            
            $data=new stdClass();
            if($this->session->flashdata('item')) {
                $items = $this->session->flashdata('item');
                if($items->success){
                    $data->error=0;
                    $data->success=1;
                    $data->message=$items->message;
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message=$items->message;
                }
                
            }
            
            ///print_r($data); die;
            if(!empty($_POST)){
               // print_r($_POST);die;              
                $udata['title'] = $this->input->post('title');               
                $udata['description'] = $this->input->post('editor1');
                $udata['category'] = $this->input->post('category');
                $udata['job_type'] = $this->input->post('job_type');
                $udata['salary'] = $this->input->post('salary');
                $udata['gender'] = $this->input->post('gender');
                $udata['location'] = $this->input->post('location');
                $udata['specialization'] = $this->input->post('specialization');                
                $udata['status'] = $this->input->post('status');
               //$udata['link'] = $this->input->post('link');              
               if($this->jobs_model->UpdateRecord('jobs',$udata,array("id"=>$id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Job Updated Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('jobs/edit/'.$id);
            }
            
            $data->reslt = $this->jobs_model->SelectSingleRecord('jobs','*',array('id'=>$id),$orderby=array());
            $data->categories = $this->jobs_model->SelectRecord('category','*',array(),'id asc');
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->jobs_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            $data->title = 'Posted Job';
            $data->field = 'Video';
            $data->page = 'jobs';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('edit_job_view',$data);
            $this->load->view('user/includes/footer',$data);                                        
        }
        
        public function search(){
           
            
            $data=new stdClass();
            if($this->session->flashdata('item')) {
                $items = $this->session->flashdata('item');
                if($items->success){
                    $data->error=0;
                    $data->success=1;
                    $data->message=$items->message;
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message=$items->message;
                }                
            }
                                    
            
            if($_POST){
                $category = $this->input->post('category');
                //$time = $this->input->post('time');
                //$job_type = $this->input->post('job_type');
                //$job_for = $this->input->post('gender');
                $location = $this->input->post('location');
                $title = $this->input->post('title');
                
                $data->posted_jobs = $this->jobs_model->filter_jobs($category,$time='',$job_type='',$job_for='',$location,$specialization,$title);               
                //echo $this->db->last_query(); die;
            }else{
                $data->posted_jobs = $this->jobs_model->joindataResult('j.category','c.id',array('j.status'=>1),'j.*,c.name','jobs as j','category as c','j.id desc');               
            }
            
            $data->categories = $this->jobs_model->SelectRecord('category','*',array(),'id asc');
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->jobs_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            //echo "<pre>"; print_r($data); die;
            $data->title = 'Search Jobs';
            $data->field = 'Datatable';
            $data->page = 'job_search';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('search_jobs_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        public function filter(){
           
            
            $data=new stdClass();
            //echo "<pre>"; print_r($_POST); die;
            if($_POST){
                $category = $this->input->post('category');
                $time = $this->input->post('ago');
                $job_type = $this->input->post('type');
                $job_for = $this->input->post('gender');
                $location = $this->input->post('location');
                $title = $this->input->post('title');
                $salary = $this->input->post('salary');
                $experience = $this->input->post('experience');
                $specialization = $this->input->post('specialization');
                
                $data->posted_jobs = $this->jobs_model->filter_jobs($category,$time,$job_type,$job_for,$location,$specialization,$title,$salary,$experience);                               
            }else{
                $data->posted_jobs = $this->jobs_model->joindataResult('j.category','c.id',array('j.status'=>1),'j.*,c.name','jobs as j','category as c','j.id desc');               
            }
            //echo $this->db->last_query(); die;
            $this->load->view('filter_search_jobs_view',$data);            
        }
        
        
        public function view($id){
            
            $data=new stdClass();
            if($this->session->flashdata('item')) {
                $items = $this->session->flashdata('item');
                if($items->success){
                    $data->error=0;
                    $data->success=1;
                    $data->message=$items->message;
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message=$items->message;
                }
                
            }
                        
            
            $data->reslt = $this->jobs_model->joindata('j.category','c.id',array('j.id'=>$id),'j.*,c.name','jobs as j','category as c','j.id desc');
            
            $data->categories = $this->jobs_model->SelectRecord('category','*',array(),'id asc');
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->jobs_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            $data->is_apply = $this->jobs_model->SelectSingleRecord('jobs_applied','*',array('job_id'=>$id,'apply_by'=>$this->session->userdata('user_id')),$orderby=array());
            
            //$data->similar_jobs = $this->jobs_model->joindataResult('j.category','c.id',array('c.name'=>$data->reslt['name'],'j.id !='=>$data->reslt['id']),'j.*,c.name','jobs as j','category as c','rand() LIMIT 5');
            $data->similar_jobs = $this->jobs_model->joindataResult('j.category','c.id',array('j.id !='=>$data->reslt['id']),'j.*,c.name','jobs as j','category as c','rand() LIMIT 5');
            //echo "<pre>"; print_r($data->similar_jobs); die;
            $fdata['job_id'] = $id;
            $fdata['follower_id'] = $this->session->userdata('user_id');            
            $data->is_likes_job = $this->jobs_model->SelectSingleRecord('likes_job','*',$fdata,$orderby=array());
            
            $data->title = 'Job Detail';
            $data->field = 'Video';
            $data->page = 'jobs';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('job_detail_view',$data);
            $this->load->view('user/includes/footer',$data);                                        
        }
        
        
        public function apply($id){
            if(!$this->session->userdata('logged_in')){
                $url = site_url('jobs/view/'.$id);
                redirect('user/index/?return='.urlencode($url));
            }
            $data=new stdClass();
            if($this->session->flashdata('item')) {
                $items = $this->session->flashdata('item');
                if($items->success){
                    $data->error=0;
                    $data->success=1;
                    $data->message=$items->message;
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message=$items->message;
                }
                
            }
            
            $is_apply = $this->jobs_model->SelectSingleRecord('jobs_applied','*',array('job_id'=>$id,'apply_by'=>$this->session->userdata('user_id')),$orderby=array());
            if(!empty($is_apply)){
                redirect('jobs/view/'.$id);
            }
            ///print_r($data); die;
            if(!empty($_POST) && isset($_POST['apply'])){
               // print_r($_POST);die;
                        
                        if($_FILES['resume']['name'] != ''){                               
                                $config1 = [];
                                $upload_path = './upload/jobs/';
                                $config1['upload_path'] = $upload_path;                                                                
                                $config1['allowed_types'] = 'txt|dox|docx';                                                                                                
                                $this->load->library ('upload',$config1);                                                                
                                if ($this->upload->do_upload('resume'))
                                {                                    
                                    $uploaddata = $this->upload->data();                                 
                                    $udata['resume'] = $uploaddata['file_name'];                                    
                                }
                                else
                                {
                                    //print_r($this->upload->display_errors()); die;
                                    $data->error=1;
                                    $data->success=0;
                                    $data->message=$this->upload->display_errors(); 
                                    $this->session->set_flashdata('item', $data);
                                    redirect('jobs/apply/'.$id);
                                }                       
                        }
                        
                        if($_FILES['file']['name'] != ''){                               
                                
                                $upload_path = './upload/jobs/';
                                $config['upload_path'] = $upload_path;                                                                
                                $config['allowed_types'] = 'mp4|avi|mov|mp3';                                                                                                
                                $this->upload->initialize($config);
                                                                
                                if ($this->upload->do_upload('file'))
                                {                                    
                                    $uploaddata = $this->upload->data();                                 
                                    $udata['file'] = $uploaddata['file_name'];                                    
                                }
                                else
                                {
                                    //print_r($this->upload->display_errors()); die;
                                    $data->error=1;
                                    $data->success=0;
                                    $data->message=$this->upload->display_errors(); 
                                    $this->session->set_flashdata('item', $data);
                                    redirect('jobs/apply/'.$id);	
                                }                       
                        }
                $udata['proposal'] = $this->input->post('editor1');               
                $udata['job_id'] = $id;
                $udata['apply_by'] = $this->session->userdata('user_id');               
                $udata['status'] = 1;
               //$udata['link'] = $this->input->post('link');              
               if($this->jobs_model->InsertRecord('jobs_applied',$udata)){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Job Applied Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('jobs/view/'.$id);
            }
            
            $data->reslt = $this->jobs_model->joindata('j.category','c.id',array('j.id'=>$id),'j.*,c.name','jobs as j','category as c','j.id desc');
            
            $data->categories = $this->jobs_model->SelectRecord('category','*',array(),'id asc');
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->jobs_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            $data->title = 'Job Apply';
            $data->field = 'Video';
            $data->page = 'jobs';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('apply_job_view',$data);
            $this->load->view('user/includes/footer',$data);                                        
        }
        
        public function saved(){
            if(!$this->session->userdata('logged_in')){
                redirect('user');
            }
            
            $data=new stdClass();
            if($this->session->flashdata('item')) {
                $items = $this->session->flashdata('item');
                if($items->success){
                    $data->error=0;
                    $data->success=1;
                    $data->message=$items->message;
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message=$items->message;
                }                
            }
            
            $data->saved_jobs = $this->jobs_model->joindataResult('j.job_id','c.id',array('j.apply_by'=>$this->session->userdata('user_id')),'j.*,c.title,c.description','jobs_applied as j','jobs as c','j.id desc');
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->jobs_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            //echo "<pre>"; print_r($data->saved_jobs); die;
            $data->title = 'My Saved Jobs';
            $data->field = 'Datatable';
            $data->page = 'saved';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('saved_jobs_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        public function applied($id){
            if(!$this->session->userdata('logged_in')){
                redirect('user');
            }
            
            $data=new stdClass();
            if($this->session->flashdata('item')) {
                $items = $this->session->flashdata('item');
                if($items->success){
                    $data->error=0;
                    $data->success=1;
                    $data->message=$items->message;
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message=$items->message;
                }                
            }
            
            $data->applied_jobs = $this->jobs_model->joindataResult('j.job_id','c.id',array('j.job_id'=>$id),'j.apply_by,j.resume,j.file,j.proposal,c.*','jobs_applied as j','jobs as c','j.id desc');
            foreach($data->applied_jobs as $key=>$value){
                $apply_by = $this->jobs_model->SelectSingleRecord('users','*',array('id'=>$value['apply_by']),$orderby=array());
                $data->applied_jobs[$key]['apply_by'] = $apply_by;
            }
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->jobs_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            //echo "<pre>"; print_r($data->saved_jobs); die;
            $data->title = 'Job Applicants';
            $data->field = 'Datatable';
            $data->page = 'posted_jobs';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('applied_jobs_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        
        public function download(){
            if(isset($_REQUEST["file"])){
                // Get parameters
                $file = urldecode($_REQUEST["file"]); // Decode URL-encoded string
                $filepath = "upload/jobs/" . $file;
                
                // Process download
                if(file_exists($filepath)) {
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($filepath));
                    flush(); // Flush system output buffer
                    readfile($filepath);
                    exit;
                }
            }
        }
        
        public function delete($id){
            
            $data=new stdClass();
            if($this->jobs_model->delete_record('jobs',array("id"=>$id))){
                $data->error=0;
                $data->success=1;
                $data->message="Job Deleted Successfully";
            }else{
                $data->error=1;
                $data->success=0;
                $data->message="Network Error";
            }
            $this->session->set_flashdata('item',$data);
            redirect('jobs');
        }
        
        
			
	
}
?>