<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->library('cart');
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
            //echo "<pre>"; print_r($data->categories); die;
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
            
            $fdata['artist_id'] = $id;
            $fdata['follower_id'] = $this->session->userdata('user_id');
            
            $data->is_follow = $this->musician_model->SelectSingleRecord('follow','*',$fdata,$orderby=array());
            
            $data->is_cool = $this->musician_model->SelectSingleRecord('cool','*',$fdata,$orderby=array());
            
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
            //print_r($data->message); die;    
            }
            
            $data->artist = $this->musician_model->SelectSingleRecord('users','*',array('id'=>$id),$orderby=array());
            
            
            $newdate = strtotime ( '-30 day' , strtotime ( $data->artist->account_valid ) ) ;
            $valid_from = date ( 'Y-m-d h:i:s' , $newdate );            
            $data->no_of_products = $this->musician_model->SelectRecord('order','*',array("user_id"=>$id,"payment_status"=>2,"created_at <="=>$data->artist->account_valid,"created_at >"=>$valid_from),$orderby=array());                        
            if($data->artist->subscription_id){
                $data->subscr = $this->musician_model->SelectSingleRecord('user_subscriptions','*',array("id"=>$data->artist->subscription_id),$orderby=array());
                $data->no_of_products = $this->musician_model->SelectRecord('order','*',array("user_id"=>$id,"payment_status"=>2,"created_at <="=>$data->subscr->valid_to,"created_at >"=>$data->subscr->valid_from),$orderby=array());                
            }
            if($data->artist->account_type == '' || $data->artist->account_type == 'free'){                
                $data->no_of_products = $this->musician_model->SelectRecord('order','*',array("user_id"=>$id,"payment_status"=>2),$orderby=array());                
            }                        
            $data->current_plan = $this->musician_model->joindata('m.plan_id','mp.id',array('m.user_id'=>$id),array('mp.*'),'membership as m','membership_plan as mp','m.id desc');            
            
            $data->products = $this->musician_model->SelectRecord('products','*',array("user_id"=>$id),'rand()');
            $data->albums = $this->musician_model->SelectRecord('album','*',array("user_id"=>$id),'rand()');
            $data->categories = $this->musician_model->SelectRecord('category','*',array(),'id asc');
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->musician_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            $data->title = 'Artist Detail';
            $data->field = 'Musician';
            $data->page = 'artist_detail';
            $data->message = ($data->message) ? $data->message : '';
            //print_r($data->message); die;
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
        
        public function filter(){
            
            $data=new stdClass();            
            
                if(isset($_POST['content']) && !in_array('0',$_POST['content'])){
                    $genre = $this->input->post('genre');
                    $type = $this->input->post('content');              
                    $data->results = $this->musician_model->search_by_genre($genre,$type);              
                }else{
                   $role = $this->input->post('role');
                   $gender = $this->input->post('gender');
                   $location = $this->input->post('location');  
                   $data->results1 = $this->musician_model->search_by_role($role,$gender,$location);
                }
            
            		
            $this->load->view('filter_search_musician_view',$data);            
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
        
        public function follow(){
            $data=new stdClass();
            $udata['artist_id'] = $this->input->post('artist_id');
            $udata['follower_id'] = $this->session->userdata('user_id');
            
            $result = $this->musician_model->SelectSingleRecord('follow','*',$udata,$orderby=array());
            if($this->session->userdata('user_id')){
                if($result){
                    //print_r($result); die;
                    $this->musician_model->delete_record('follow',$udata);
                    echo 0;
                }else{
                    $this->musician_model->InsertRecord('follow',$udata);
                    echo 1;
                }
            }else{
                echo 2;
            }
        }
        
        public function cool(){
            $data=new stdClass();
            $udata['artist_id'] = $this->input->post('artist_id');
            $udata['follower_id'] = $this->session->userdata('user_id');
            
            $result = $this->musician_model->SelectSingleRecord('cool','*',$udata,$orderby=array());
            if($this->session->userdata('user_id')){
                if($result){
                    //print_r($result); die;
                    $this->musician_model->delete_record('cool',$udata);
                    echo 0;
                }else{
                    $this->musician_model->InsertRecord('cool',$udata);
                    echo 1;
                }
            }else{
                echo 2;
            }
        }
        
        public function cool_products(){
            $data=new stdClass();
            $udata['product_id'] = $this->input->post('product_id');
            $udata['follower_id'] = $this->session->userdata('user_id');
            
            $result = $this->musician_model->SelectSingleRecord('cool_products','*',$udata,$orderby=array());
            if($this->session->userdata('user_id')){
                if($result){
                    //print_r($result); die;
                    $this->musician_model->delete_record('cool_products',$udata);
                    echo 0;
                }else{
                    $this->musician_model->InsertRecord('cool_products',$udata);
                    echo 1;
                }
            }else{
                echo 2;
            }
        }
        
        public function likes(){
            $data=new stdClass();
            $udata['product_id'] = $this->input->post('product_id');
            $udata['follower_id'] = $this->session->userdata('user_id');
            
            $result = $this->musician_model->SelectSingleRecord('likes','*',$udata,$orderby=array());
            if($this->session->userdata('user_id')){
                if($result){
                    //print_r($result); die;
                    $this->musician_model->delete_record('likes',$udata);
                    echo 0;
                }else{
                    $this->musician_model->InsertRecord('likes',$udata);
                    echo 1;
                }
            }else{
                echo 2;
            }
        }
        
        public function cool_album(){
            $data=new stdClass();
            $udata['product_id'] = $this->input->post('product_id');
            $udata['follower_id'] = $this->session->userdata('user_id');
            
            $result = $this->musician_model->SelectSingleRecord('cool_album','*',$udata,$orderby=array());
            if($this->session->userdata('user_id')){
                if($result){
                    //print_r($result); die;
                    $this->musician_model->delete_record('cool_album',$udata);
                    echo 0;
                }else{
                    $this->musician_model->InsertRecord('cool_album',$udata);
                    echo 1;
                }
            }else{
                echo 2;
            }
        }
        
        public function likes_album(){
            $data=new stdClass();
            $udata['product_id'] = $this->input->post('product_id');
            $udata['follower_id'] = $this->session->userdata('user_id');
            
            $result = $this->musician_model->SelectSingleRecord('likes_album','*',$udata,$orderby=array());
            if($this->session->userdata('user_id')){
                if($result){
                    //print_r($result); die;
                    $this->musician_model->delete_record('likes_album',$udata);
                    echo 0;
                }else{
                    $this->musician_model->InsertRecord('likes_album',$udata);
                    echo 1;
                }
            }else{
                echo 2;
            }
        }
        
        public function product_rating(){
            $data=new stdClass();
            $udata['product_id'] = $this->input->post('product_id');
            $udata['user_id'] = $this->session->userdata('user_id');
            $udata['rating'] = $this->input->post('rating');
            
            $result = $this->musician_model->SelectSingleRecord('product_rating','*',['product_id'=>$this->input->post('product_id'),'user_id'=>$this->session->userdata('user_id')],$orderby=array());
            if($this->session->userdata('user_id')){
                if($result){
                    //print_r($result); die;
                    $this->musician_model->UpdateRecord('product_rating',array('rating'=>$this->input->post('rating')),['product_id'=>$this->input->post('product_id'),'user_id'=>$this->session->userdata('user_id')]);
                    echo 0;
                }else{
                    $this->musician_model->InsertRecord('product_rating',$udata);
                    echo 1;
                }
            }else{
                echo 2;
            }
        }
        
        public function job_rating(){
            $data=new stdClass();
            $udata['job_id'] = $this->input->post('job_id');
            $udata['user_id'] = $this->session->userdata('user_id');
            $udata['rating'] = $this->input->post('rating');
            
            $result = $this->musician_model->SelectSingleRecord('job_rating','*',['job_id'=>$this->input->post('job_id'),'user_id'=>$this->session->userdata('user_id')],$orderby=array());
            if($this->session->userdata('user_id')){
                if($result){
                    //print_r($result); die;
                    $this->musician_model->UpdateRecord('job_rating',array('rating'=>$this->input->post('rating')),['job_id'=>$this->input->post('job_id'),'user_id'=>$this->session->userdata('user_id')]);
                    echo 0;
                }else{
                    $this->musician_model->InsertRecord('job_rating',$udata);
                    echo 1;
                }
            }else{
                echo 2;
            }
        }
        
        public function likes_job(){
            $data=new stdClass();
            $udata['job_id'] = $this->input->post('job_id');
            $udata['follower_id'] = $this->session->userdata('user_id');
            
            $result = $this->musician_model->SelectSingleRecord('likes_job','*',$udata,$orderby=array());
            if($this->session->userdata('user_id')){
                if($result){
                    //print_r($result); die;
                    $this->musician_model->delete_record('likes_job',$udata);
                    echo 0;
                }else{
                    $this->musician_model->InsertRecord('likes_job',$udata);
                    echo 1;
                }
            }else{
                echo 2;
            }
        }
        
                		        	
}
?>