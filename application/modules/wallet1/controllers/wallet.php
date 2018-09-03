<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Wallet extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('wallet_model');            
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
            $data->result = $this->wallet_model->SelectSingleRecord('admin','*',$udata,$orderby=array());                                               
            
            $data->results = $this->wallet_model->SelectRecord('transactions','*',array(),'id desc');            
            //print_r($data->pending); die;
            $data->title = 'Wallet';
            $data->field = 'Datatable';
            $data->page = 'wallet';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('wallet_view',$data);
            $this->load->view('admin/includes/footer',$data);
           
        }
	
}
?>