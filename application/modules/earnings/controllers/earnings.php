<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Earnings extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('earnings_model');            
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
            $data->result = $this->earnings_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            $data->charge = $this->get_Charge();
            
            $data->wallet = $this->earnings_model->SelectSingleRecord('wallet','*',array('user_id'=>$this->session->userdata('user_id')),$orderby=array());                                                                             
            //$data->earnings1 = $this->earnings_model->joindataResult('o.product_id','p.id',array("o.seller_id"=>$this->session->userdata('user_id'),'product_id !='=>0),'p.title,p.id as product_id,o.*','order_detail as o','products as p','o.id desc');
            //$data->earnings = $this->earnings_model->SelectRecord('order_detail','*',array('seller_id'=>$this->session->userdata('user_id')),'id desc');
            $data->earnings = $this->earnings_model->joindataResult('od.order_id','o.order_no',array('od.seller_id'=>$this->session->userdata('user_id')),'od.*,o.user_id','order_detail as od','order as o','od.id desc');
            
            //echo "<pre>"; print_r($data->charge); die;
            $data->title = 'All Earnings';
            $data->field = 'Datatable';
            $data->page = 'earnings';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('earnings_view',$data);
            $this->load->view('user/includes/footer',$data);
           
        }
	
}
?>