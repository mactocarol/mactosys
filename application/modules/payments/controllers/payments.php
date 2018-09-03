<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payments extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('payments_model');            
            $this->load->helper('ht_helper');
            if( $this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
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
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->payments_model->SelectSingleRecord('admin','*',$udata,$orderby=array());                                               
            
            $data->results = $this->payments_model->SelectRecord('user_payment','*',array(),$orderby=array());            
            //print_r($data->pending); die;
            $data->title = 'All Payments';
            $data->field = 'Datatable';
            $data->page = 'payments';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('payments_view',$data);
            $this->load->view('admin/includes/footer',$data);
           
        }
	
}
?>