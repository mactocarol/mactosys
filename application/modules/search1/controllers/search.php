<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('musician_model');            
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
            $data->results = $this->musician_model->SelectRecord('products','*',array(),'rand() LIMIT 10');            
            $data->categories = $this->musician_model->SelectRecord('category','*',array(),'id asc');
            $data->genres = $this->musician_model->SelectRecord('genre','*',array(),'id asc');
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->musician_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            $data->results1 = $this->musician_model->SelectRecord('users','*',array(),'rand() LIMIT 10'); 
            //echo "<pre>"; print_r($data->result); die;
            $data->title = 'Search';
            $data->field = 'Datatable';
            $data->page = 'search';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('search_musician_view',$data);
            $this->load->view('user/includes/footer',$data);		
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
            
            $data->artist = $this->musician_model->SelectSingleRecord('users','*',array('id'=>$id),$orderby=array());
            $data->featured_artist = $this->musician_model->SelectRecord('users','*',array('id !='=>$id),'rand() LIMIT 5');
            $data->categories = $this->musician_model->SelectRecord('category','*',array(),'id asc');
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->musician_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            $data->title = 'Artist';
            $data->field = 'Musician';
            $data->page = 'artist';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('artist_page_view',$data);
            $this->load->view('user/includes/footer',$data);                                        
        }
        
        public function ArtistDetail($id){
            
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
            
            $data->artist = $this->musician_model->SelectSingleRecord('users','*',array('id'=>$id),$orderby=array());
            $data->products = $this->musician_model->SelectRecord('products','*',array("user_id"=>$id),'rand()');
            $data->categories = $this->musician_model->SelectRecord('category','*',array(),'id asc');
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->musician_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            $data->title = 'Artist Detail';
            $data->field = 'Musician';
            $data->page = 'artist_detail';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('artist_detail_view',$data);
            $this->load->view('user/includes/footer',$data);                                        
        }
        
        public function search_by_genre(){
            
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
              $genre = $this->input->post('genre');
              $type = $this->input->post('type');              
              $data->results = $this->musician_model->search_by_genre($genre,$type);
              $data->genre = $genre;
              $data->type = $type;
            }else{
              $data->results = $this->musician_model->SelectRecord('products','*',array("user_id !="=>$this->session->userdata('user_id')),'rand()'); 
            }
                        
            $data->categories = $this->musician_model->SelectRecord('category','*',array(),'id asc');
            $data->genres = $this->musician_model->SelectRecord('genre','*',array(),'id asc');
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->musician_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            //echo "<pre>"; print_r($data); die;
            $data->title = 'List Musician';
            $data->field = 'Datatable';
            $data->page = 'musician';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('search_musician_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        
        public function search_by_role(){
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
            
            
            if($_POST){
              $role = $this->input->post('role');                        
              $data->results1 = $this->musician_model->search_by_role($role);
              $data->role = $role;              
            }else{
              $data->results1 = $this->musician_model->SelectRecord('users','*',array("id !="=>$this->session->userdata('user_id')),'rand()'); 
            }
            //echo "<pre>"; print_r($data); die;
            $data->categories = $this->musician_model->SelectRecord('category','*',array(),'id asc');
            $data->genres = $this->musician_model->SelectRecord('genre','*',array(),'id asc');
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->musician_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            //echo "<pre>"; print_r($data); die;
            $data->title = 'List Musician';
            $data->field = 'Datatable';
            $data->page = 'musician';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('search_musician_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        
        public function my_musician(){
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
           
            $data->results = $this->musician_model->get_my_musician($this->session->userdata('user_id'));
                        
            $data->categories = $this->musician_model->SelectRecord('category','*',array(),'id asc');
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->musician_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            //echo "<pre>"; print_r($data); die;
            $data->title = 'List Musician';
            $data->field = 'Datatable';
            $data->page = 'my_musician';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('my_musician_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        public function my_job(){
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
           
            $data->results = $this->musician_model->get_my_job($this->session->userdata('user_id'));

            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->musician_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            //echo "<pre>"; print_r($data); die;
            $data->title = 'My Job';
            $data->field = 'Datatable';
            $data->page = 'my_job';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('my_job_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
                		        	
}
?>