<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('category_model');
            if( $this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
        }
        public function index(){
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
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
            $data->results = $this->category_model->SelectRecord('category','*',array(),'id desc');
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->category_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'List Category';
            $data->field = 'Datatable';
            $data->page = 'list_category';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('list_category_view',$data);
            $this->load->view('admin/includes/footer',$data);		
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
            
            ///print_r($data); die;
            if(!empty($_POST)){
               // print_r($_POST);die;
               $udata['name'] = $this->input->post('name');               
               if($this->category_model->InsertRecord('category',$udata)){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Category Added Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('category/add');
            }
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->category_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'Category';
            $data->field = 'Category';
            $data->page = 'add_category';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('add_category_view',$data);
            $this->load->view('admin/includes/footer',$data);                                        
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
               $udata['name'] = implode('-',explode(' ',$this->input->post('name')));                        
               if($this->category_model->UpdateRecord('category',$udata,array("id"=>$id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Category Updated Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('category/edit/'.$id);
            }
            
            $data->reslt = $this->category_model->SelectSingleRecord('category','*',array('id'=>$id),$orderby=array());
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->category_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'Category';
            $data->field = 'Category';
            $data->page = 'edit_category';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('edit_category_view',$data);
            $this->load->view('admin/includes/footer',$data);                                        
        }                        
        
        public function delete($id){
            $data=new stdClass();
            if($this->category_model->delete_record('category',array("id"=>$id))){
                $data->error=0;
                $data->success=1;
                $data->message="Category Deleted Successfully";
            }else{
                $data->error=1;
                $data->success=0;
                $data->message="Network Error";
            }
            $this->session->set_flashdata('item',$data);
            redirect('category');
        }
                		        	
}
?>