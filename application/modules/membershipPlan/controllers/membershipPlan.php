<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class membershipPlan extends HT_Controller 
{
	//private $connection;
        public function __construct(){ 
            parent::__construct();
            $this->load->model('membership_model'); 
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
            $data->results = $this->membership_model->SelectRecord('membership_plan','*',array(),'id asc');
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->membership_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'List membershipPlan';
            $data->field = 'Datatable';
            $data->page = 'list_membershipPlan';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('list_plan_view',$data);
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
               $udata['title'] = $this->input->post('title');
               $udata['amount'] = $this->input->post('amount');
               $udata['validity'] = $this->input->post('validity');
               $udata['pic_limit'] = $this->input->post('pic_limit');
               $udata['audio_limit'] = $this->input->post('audio_limit');
               $udata['video_limit'] = $this->input->post('video_limit');
               $udata['sell_limit'] = $this->input->post('sell_limit');             
               if($this->membership_model->InsertRecord('membership_plan',$udata)){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Plan Added Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('membershipPlan/add');
            }
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->membership_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'membership_plan';
            $data->field = 'membership_plan';
            $data->page = 'add_membershipPlan';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('add_plan_view',$data);
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
               $udata['title'] = $this->input->post('title');
               $udata['amount'] = $this->input->post('amount');
               $udata['validity'] = $this->input->post('validity');
               $udata['pic_limit'] = $this->input->post('pic_limit');
               $udata['audio_limit'] = $this->input->post('audio_limit');
               $udata['video_limit'] = $this->input->post('video_limit');
               $udata['sell_limit'] = $this->input->post('sell_limit');
               if($this->membership_model->UpdateRecord('membership_plan',$udata,array("id"=>$id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Plan Updated Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('membershipPlan/edit/'.$id);
            }
            
            $data->reslt = $this->membership_model->SelectSingleRecord('membership_plan','*',array('id'=>$id),$orderby=array());
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->membership_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'membership_plan';
            $data->field = 'membership_plan';
            $data->page = 'edit_membershipPlan';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('edit_plan_view',$data);
            $this->load->view('admin/includes/footer',$data);                                        
        }                        
        
        public function delete($id){
            $data=new stdClass();
            if($id != 1){
                if($this->membership_model->delete_record('membership_plan',array("id"=>$id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Plan Deleted Successfully";
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
                }
                $this->session->set_flashdata('item',$data);
            }
            redirect('membershipPlan');
        }
                		        	
}
?>