<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Wallet extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('wallet_model');            
            $this->load->helper('ht_helper');
            $this->load->library('paypal_lib');
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
            $data->result = $this->wallet_model->SelectSingleRecord('users','*',$udata,$orderby=array());                                               
            
            $data->wallet = $this->wallet_model->SelectSingleRecord('wallet','*',array('user_id'=>$this->session->userdata('user_id')),$orderby=array());                                                                                        
            //print_r($data->pending); die;
            $data->title = 'Wallet';
            $data->field = 'Datatable';
            $data->page = 'wallet';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('wallet_view',$data);
            $this->load->view('user/includes/footer',$data);
           
        }
        
          public function add_money(){
            if( $this->session->userdata('user_group_id') != 2){
                    redirect('user');
                }            
            $price = $this->input->post('amount');
            //Set variables for paypal form
            $returnURL = base_url().'wallet/success'; //payment success url
            $cancelURL = base_url().'wallet/cancel'; //payment cancel url
            $notifyURL = base_url().'wallet/ipn'; //ipn url
            //get particular product data
            //$product = $this->product->getRows($id);
            $item_number = time();
            $amt = $price;        
            $booking_key = 'ORDER'.time(); 
            $userID = $this->session->userdata('user_id'); //current user id
            $logo = base_url().'assets/images/codexworld-logo.png';
            
            $this->paypal_lib->add_field('return', $returnURL);
            $this->paypal_lib->add_field('cancel_return', $cancelURL);
            $this->paypal_lib->add_field('notify_url', $notifyURL);
            $this->paypal_lib->add_field('item_name', 'wallet');
            $this->paypal_lib->add_field('custom', $booking_key);
            $this->paypal_lib->add_field('item_number',  $userID);
            //$this->paypal_lib->add_field('handling',  $booking_key);
            $this->paypal_lib->add_field('amount',  $amt);		
            $this->paypal_lib->image($logo);
            
            $this->paypal_lib->paypal_auto_form();
        }
        
        public function success(){
            $data=new stdClass();
            $paypalInfo = $this->input->get();
                //print_r($paypalInfo); die;
                $data->user_id = $paypalInfo['item_number']; 
                $data->txn_id = $paypalInfo["tx"];
                $data->payment_amt = $paypalInfo["amt"];
                $data->currency_code = $paypalInfo["cc"];
                $data->status = $paypalInfo["st"];                    
                $data->cm = $paypalInfo["cm"];
                
                $is_txn = $this->wallet_model->SelectSingleRecord('transactions','*',array('txn_id'=>$data->txn_id),'id desc');
                if(empty($is_txn)){
                    $udata['user_id'] = $data->user_id;            
                    $udata['txn_id'] = $data->txn_id;
                    $udata['order_id'] = $data->cm;
                    $udata['payment_amt'] = $data->payment_amt;
                    $udata['currency_code'] = $data->currency_code;
                    $udata['status'] = $data->status;
                    $udata['payment_type'] = '4';
                    $udata['payment_mode'] = 'Paypal';
                    if($this->wallet_model->InsertRecord('transactions',$udata)){
                        $udata = array("user_id"=>$this->session->userdata('user_id'));                
                        $amount = $this->wallet_model->SelectSingleRecord('wallet','*',$udata,$orderby=array());
                        $new_amt = $amount->amount + $data->payment_amt;
                        $this->wallet_model->UpdateRecord('wallet',array("amount"=>$new_amt),array("user_id"=>$data->user_id));
                        $data->error=0;
                        $data->success=1;
                        $data->message= "Money has been added successfully to your wallet";
                        $this->session->set_flashdata('item',$data);
                        redirect('wallet');
                    }
                }
        }
        
        public function cancel(){
                $data=new stdClass();
                    $data->error=1;
                    $data->success=0;
                    $data->message= "Payment Failed , Plese Try Again.";
                    $this->session->set_flashdata('item',$data);
                    redirect('wallet');
        }
	
}
?>