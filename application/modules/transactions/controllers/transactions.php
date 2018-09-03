<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Transactions extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('transactions_model');            
            $this->load->helper('ht_helper');
            if( $this->session->userdata('user_group_id') != 2){
                redirect('user');
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
            $data->result = $this->transactions_model->SelectSingleRecord('users','*',$udata,$orderby=array());                                               
            
            
            $data->transactions = $this->transactions_model->SelectRecord('transactions','*',array("user_id"=>$this->session->userdata('user_id')),'id desc');                                        
            
            //print_r($data->pending); die;
            $data->title = 'All Transactions';
            $data->field = 'Datatable';
            $data->page = 'transactions';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('transactions_view',$data);
            $this->load->view('user/includes/footer',$data);
           
        }
	
}
?>