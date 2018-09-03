<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Album extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('album_model');
            if( $this->session->userdata('user_group_id') != 2){
                redirect('user');
            }
        }
        public function index($type = NULL){
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
            
            
            $data->album = $this->album_model->SelectRecord('album','*',array("user_id"=>$this->session->userdata('user_id')),$orderby=array());
            foreach($data->album as $key=>$value){
                $list = $this->album_model->SelectRecord('album_list','*',['album_id'=>$value['id']],$orderby=array());
                    foreach($list as $k=>$v){                        
                        $pro_detail = $this->album_model->SelectRecord('products','*',['id'=>$v['product_id']],$orderby=array());
                        if($pro_detail)
                        $product[] = $pro_detail[0];
                    }
                $data->album[$key]['list'] = $product;
            }
            //echo "<pre>"; print_r($data); die;
                        
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->album_model->SelectSingleRecord('users','*',$udata,$orderby=array());
                        
            //echo "<pre>"; print_r($data->products); die;
            $data->title = 'List Album';
            $data->field = 'Datatable';
            $data->page = 'list_album';
            $data->type = $type;
            $this->load->view('user/includes/header',$data);		
            $this->load->view('list_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        public function add(){
            
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
            $data->result = $this->album_model->SelectSingleRecord('users','*',$userdata,$orderby=array());                        
            
            $data->video = $this->album_model->joindataResult('p.genre','g.id',array("p.user_id"=>$this->session->userdata('user_id'),'p.file_type'=>1),'p.*,g.name','products as p','genre as g','p.id desc');
            $data->audio = $this->album_model->joindataResult('p.genre','g.id',array("p.user_id"=>$this->session->userdata('user_id'),'p.file_type'=>2),'p.*,g.name','products as p','genre as g','p.id desc');            
            $data->picture = $this->album_model->SelectRecord('products','*',array("user_id"=>$this->session->userdata('user_id'),'file_type'=>3),'id desc');         
                if(!empty($_POST)){                    
                        //print_r($_POST);die;
                        if($_FILES['file']['name'] != ''){                               
                                
                                $upload_path1 = './upload/products/album_thumb/';
                                $config1['upload_path'] = $upload_path1;                
                                $config1['allowed_types'] = 'jpg|jpeg|gif|png';                                                                    
                                //print_r($config);                                
                                $this->load->library ('upload',$config1);
                                                            
                                if ($this->upload->do_upload('file'))
                                {                                    
                                    $uploaddata1 = $this->upload->data();
                                    //print_r($udata); die;
                                    $udata['thumb'] = $uploaddata1['file_name'];                                    
                                }
                                else
                                {
                                    print_r('<font class="red">'.$this->upload->display_errors().'</font>');
                                    $data->error=1;
                                    $data->success=0;
                                    $data->message=$this->upload->display_errors(); 
                                    $this->session->set_flashdata('item', $data); die;
                                    redirect('album/add/');	
                                }
                       
                        }
                       
                        $udata['title'] = $this->input->post('title');
                        $product = $this->input->post('product');      
                        $udata['user_id'] = $this->session->userdata('user_id');
                        $udata['description'] = $this->input->post('description');                                                                        
                        $udata['price'] = $this->input->post('price');
                        $udata['tags'] = $this->input->post('tags');
                        $udata['status'] = 1;
                        //print_r($udata); die;
                        if($lastid = $this->album_model->InsertRecord('album',$udata)){
                                foreach($product as $p){
                                    $this->album_model->InsertRecord('album_list',["product_id"=>$p,"album_id"=>$lastid]);
                                }
                                
                             $data->error=0;
                             $data->success=1;
                             $data->message="Album Added Successfully";
                        }else{
                             $data->error=1;
                             $data->success=0;
                             $data->message="Network Error";
                        }
                       
                    
                    $this->session->set_flashdata('item',$data);
                    redirect('album');
                }
            
            
            $data->title = 'Create Album';
            $data->field = 'Datatable';
            $data->page = 'create_album';            
            
            $this->load->view('user/includes/header',$data);		
            $this->load->view('add_view',$data);
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
            
            $data->album = $this->album_model->SelectRecord('album','*',array("id"=>$id),$orderby=array());
            foreach($data->album as $key=>$value){
                $list = $this->album_model->SelectRecord('album_list','*',['album_id'=>$value['id']],$orderby=array());
                    foreach($list as $k=>$v){                        
                        $pro_detail = $this->album_model->SelectRecord('products','*',['id'=>$v['product_id']],$orderby=array());
                        $pro_detail[0]['track_no'] = $v['id'];
                        $product[] = $pro_detail;
                        
                    }
                $data->album[$key]['list'] = $product;
            }
            //echo "<pre>"; print_r($data->album); die;
            if(!empty($_POST)){
               // print_r($_POST);die;                                      
               $product = $this->input->post('product');
                foreach($product as $p){
                    $this->album_model->InsertRecord('album_list',["product_id"=>$p,"album_id"=>$id]);
                }
               
                    $data->error=0;
                    $data->success=1;
                    $data->message="Added Successfully";
               
               $this->session->set_flashdata('item',$data);
               redirect('album/edit/'.$id);
            }
            $data->video = $this->album_model->joindataResult('p.genre','g.id',array("p.user_id"=>$this->session->userdata('user_id'),'p.file_type'=>1),'p.*,g.name','products as p','genre as g','p.id desc');
            $data->audio = $this->album_model->joindataResult('p.genre','g.id',array("p.user_id"=>$this->session->userdata('user_id'),'p.file_type'=>2),'p.*,g.name','products as p','genre as g','p.id desc');
            $data->picture = $this->album_model->SelectRecord('products','*',array("user_id"=>$this->session->userdata('user_id'),'file_type'=>3),'id desc');         
                        
            $udata = array("id"=>$this->session->userdata('user_id'));                    
            $data->result = $this->album_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            $data->title = 'Edit Album';
            $data->field = 'Edit Album';
            $data->page = 'album';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('edit_view',$data);
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
            
            $data->album = $this->album_model->SelectRecord('album','*',array("id"=>$id),$orderby=array());
            foreach($data->album as $key=>$value){
                $list = $this->album_model->SelectRecord('album_list','*',['album_id'=>$value['id']],$orderby=array());
                    foreach($list as $k=>$v){                        
                        $pro_detail = $this->album_model->SelectRecord('products','*',['id'=>$v['product_id']],$orderby=array());
                        $pro_detail[0]['track_no'] = $v['id'];
                        $product[] = $pro_detail;
                        
                    }
                $data->album[$key]['list'] = $product;
            }
            //echo "<pre>"; print_r($data->album); die;
            $fdata['product_id'] = $id;
            $fdata['follower_id'] = $this->session->userdata('user_id');
            
            $data->is_cool_products = $this->album_model->SelectSingleRecord('cool_album','*',$fdata,$orderby=array());
            $data->is_likes = $this->album_model->SelectSingleRecord('likes_album','*',$fdata,$orderby=array());
            //$data->video = $this->album_model->joindataResult('p.genre','g.id',array("p.user_id"=>$this->session->userdata('user_id'),'p.file_type'=>1),'p.*,g.name','products as p','genre as g','p.id desc');
            //$data->audio = $this->album_model->joindataResult('p.genre','g.id',array("p.user_id"=>$this->session->userdata('user_id'),'p.file_type'=>2),'p.*,g.name','products as p','genre as g','p.id desc');
            //$data->picture = $this->album_model->joindataResult('p.genre','g.id',array("p.user_id"=>$this->session->userdata('user_id'),'p.file_type'=>3),'p.*,g.name','products as p','genre as g','p.id desc');         
                        
            $udata = array("id"=>$this->session->userdata('user_id'));                    
            $data->result = $this->album_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            $data->title = 'Album';
            $data->field = 'Album';
            $data->page = 'album';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('album_view',$data);
            $this->load->view('user/includes/footer',$data);                                        
        }
        
        public function delete($id,$type=Null){
            
            $data=new stdClass();
            if($this->album_model->delete_record('album',array("id"=>$id))){
                $data->error=0;
                $data->success=1;
                $data->message="Album Deleted Successfully";
            }else{
                $data->error=1;
                $data->success=0;
                $data->message="Network Error";
            }
            $this->session->set_flashdata('item',$data);
            redirect('album');
        }
        
        public function track_delete($id,$albumid=Null){
            
            $data=new stdClass();
            if($this->album_model->delete_record('album_list',array("id"=>$id))){
                $data->error=0;
                $data->success=1;
                $data->message="Track Deleted Successfully";
            }else{
                $data->error=1;
                $data->success=0;
                $data->message="Network Error";
            }
            $this->session->set_flashdata('item',$data);
            redirect('album/edit/'.$albumid);
        }
        
        public function comments(){
            $data=new stdClass();
            $udata['product_id'] = $this->input->post('product_id');
            $udata['message_from'] = $this->session->userdata('user_id');
            $udata['message'] = $this->input->post('comment');
            if(!$this->session->userdata('user_id')){
                $data->error=1;
                $data->success=0;
                $data->message= "Please Login to comment.";
                $this->session->set_flashdata('item',$data);
                redirect('album/view/'.$this->input->post('product_id').'#comment-box');
            }
            if($this->album_model->InsertRecord('album_comments',$udata)){
                $data->error=0;
                $data->success=1;
                $data->message="Your Comment has been submitted successfully";
            }else{
                $data->error=1;
                $data->success=0;
                $data->message= "Network Error";
            }
            $this->session->set_flashdata('item',$data);
            redirect('album/view/'.$this->input->post('product_id'));
        }
                
}
?>