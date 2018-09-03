<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Offer extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('offer_model');            
            $this->load->library('paypal_lib');
            $this->load->helper('ht_helper');            
        }
        
        
        public function index($type=Null){
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
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->offer_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            if($type == 'sent'){
                $data->offer = $this->offer_model->SelectRecord('offer','*',["offer_from"=>$this->session->userdata('user_id')],'id desc');
                $data->page = 'sent_offer';
                $data->title = 'Sent Offer';
            }else{
                $data->offer = $this->offer_model->SelectRecord('offer','*',["offer_to"=>$this->session->userdata('user_id')],'id desc');
                $data->page = 'recieved_offer';
                $data->title = 'Recieved Offer';
            }                        
            
            //echo "<pre>"; print_r($data->offer); die;                        
            $data->field = 'Datatable';
            $data->type = $type;
            $data->page = 'offer';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('my_offer_view',$data);
            $this->load->view('user/includes/footer',$data);           
        }
        
        public function send($id=0){            
            $data=new stdClass();
            
            if(!$this->session->userdata('logged_in')){
                $url = site_url('offer/send/'.$id);
                redirect('user/index/?return='.urlencode($url));
            }
            
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
            $data->result = $this->offer_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            if($_POST){
                //echo ""; print_r($_POST); die;
                    $odata['requirement'] = $this->input->post('editor1');
                    $odata['offer'] = $this->input->post('editor2');
                    $odata['offer_amount'] = $this->input->post('amount');
                    $odata['days'] = $this->input->post('days');
                    $odata['task'] = $this->input->post('task');
                    $odata['offer_to'] = $this->input->post('offer_to');
                    $odata['offer_from'] = $this->session->userdata('user_id');
                    if($this->input->post('milestone_amt')){
                        $odata['milestone_amt'] = json_encode($this->input->post('milestone_amt'));
                        $odata['milestone_days'] = json_encode($this->input->post('milestone_day'));
                    }
                    
                    //print_r($udata); die;
                    if($this->offer_model->InsertRecord('offer',$odata)){
                         $data->error=0;
                         $data->success=1;
                         $data->message="Offer has been submitted Successfully";
                    }else{
                         $data->error=1;
                         $data->success=0;
                         $data->message="Network Error";
                    }
                       
                    
                    $this->session->set_flashdata('item',$data);
                    redirect('offer/send/'.$odata['offer_to']);
            }
            //print_r($data->pending); die;
            $data->title = 'Make Offer';
            $data->field = 'Datatable';
            $data->page = 'make_offer';
            $data->offer_to = $id;
            
            $this->load->view('user/includes/header',$data);		
            $this->load->view('offer_view',$data);
            $this->load->view('user/includes/footer',$data);
        }
        
        public function detail($id=NULL){
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
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->offer_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            if($id > 0 && is_numeric($id)){
                $data->offer = $this->offer_model->SelectSingleRecord('offer','*',['id'=>$id],$orderby=array());
                if(empty($data->offer)) redirect('offer');
            }else{
                redirect('offer');
            }
            
            $data->comments = $this->offer_model->SelectRecord('comments','*',['offer_id'=>$id],'id asc');            
            //print_r($data->pending); die;
            $data->title = 'Offer';
            $data->field = 'Datatable';
            $data->page = 'offer';            
            
            $this->load->view('user/includes/header',$data);		
            $this->load->view('offer_detail_view',$data);
            $this->load->view('user/includes/footer',$data);
        }
        
        public function action($id,$status){
            if(!$this->session->userdata('logged_in')){                
                redirect('user');
            }
            $data=new stdClass();
            
                if($status == 2){
                    $this->offer_model->UpdateRecord('offer',array("status"=>$status), array("id"=>$id));
                    $data->error=0;
                    $data->success=1;
                    $data->message="Offer has been Accepted Successfully";
                }
                if($status == 3){
                    $this->offer_model->UpdateRecord('offer',array("status"=>$status), array("id"=>$id));
                    $data->error=0;
                    $data->success=1;
                    $data->message="Offer has been Negotiated Successfully";
                }
                if($status == 4){
                    $this->offer_model->UpdateRecord('offer',array("status"=>$status), array("id"=>$id));
                    $data->error=0;
                    $data->success=1;
                    $data->message="Offer has been Declined Successfully";
                }
            //print_r($data); die;
            $this->session->set_flashdata('item',$data);
            redirect('offer/index/');
            
        }
        
        public function contract($id=0){
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
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->offer_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            if($id > 0 && is_numeric($id)){
                $data->offer = $this->offer_model->SelectSingleRecord('offer','*',['id'=>$id],$orderby=array());    
            }else{
                redirect('offer');
            }
            if($_POST){
                    
                    //print_r($_POST); die;
                    if($this->offer_model->UpdateRecord('offer',array("is_contract_signed"=>'1'),array("id"=>$id))){
                         $data->error=0;
                         $data->success=1;
                         $data->message="Contract has been created Successfully";
                    }else{
                         $data->error=1;
                         $data->success=0;
                         $data->message="Network Error";
                    }
                       
                    
                    $this->session->set_flashdata('item',$data);
                    redirect('offer/contract/'.$id);
            }
            
            $data->comments = $this->offer_model->SelectRecord('comments','*',['offer_id'=>$id],'id asc');    
            //print_r($data->pending); die;
            $data->title = 'Sign Contract';
            $data->field = 'Datatable';
            $data->page = 'sign_contract';
            $data->offer_id = $id;
            
            $this->load->view('user/includes/header',$data);		
            $this->load->view('contract_view',$data);
            $this->load->view('user/includes/footer',$data);
        }
        
        
        public function send_comments(){            
            $data=new stdClass();
                        
            if($_POST){                
                $attachment = '';
                if(($_FILES['attachment']['name']) != ''){                                        
                    $filename= $_FILES["attachment"]["name"];
                    $file_ext = pathinfo($filename,PATHINFO_EXTENSION);

                    $config['upload_path']          = './upload/comments/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg|txt|doc|docx|pdf';
                    $config['max_size']             = 4000;
                    $config['file_name']            = uniqid().time().'.'.$file_ext;  
    
                    $this->load->library('upload', $config);
    
                    if ( ! $this->upload->do_upload('attachment'))
                    {                            
                            $data->error=1;
                            $data->success=0;
                            $data->message=$this->upload->display_errors();
                            
                    }
                    else
                    {
                            $updata = array('upload_data' => $this->upload->data());
                            $attachment = $config['file_name']; //$this->upload->data()['file_name'];                            
                    }
                }
                
                if($this->input->post('message') != '' && ($data->error != 1))
                {                
                    $odata['message_to'] = $this->input->post('message_to');
                    $odata['message_from'] = $this->input->post('message_from');
                    $odata['message'] = $this->input->post('message');
                    $odata['file'] = $attachment;
                    $odata['offer_id'] = $this->input->post('offer_id');
                    //print_r($odata); die;
                    
                    if($this->offer_model->InsertRecord('comments',$odata)){
                         $data->error=0;
                         $data->success=1;
                         $data->message="Message has been submitted Successfully";
                    }else{
                         $data->error=1;
                         $data->success=0;
                         $data->message="Network Error";
                    }
                }
            }
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->offer_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            $data->comments = $this->offer_model->SelectRecord('comments','*',['offer_id'=>$this->input->post('offer_id')],'id asc');
            //print_r($data); die;
            if($data->error == 1){
                echo 'Error: '.$data->message;
            }else{
                echo $this->load->view('comments_view',$data);
            }
            //print_r(json_encode($data)); die;
            
        }
        
        public function show_comments(){            
            $data=new stdClass();
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->offer_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            $data->comments = $this->offer_model->SelectRecord('comments','*',['offer_id'=>$this->input->post('offer_id')],'id asc');
            //print_r($data); die;
            echo $this->load->view('comments_view',$data);
            //print_r(json_encode($data)); die;
            
        }
        
        public function download($fileName = NULL) {   
            if ($fileName) {
             $file = realpath ( "upload/comments/" ) . "/" . $fileName;             
             // check file exists    
             if (file_exists ( $file )) {                
              // get file content
              $data = file_get_contents ( $file );
              //print_r($data); die;
              $this->load->helper('download');
              //force download
              force_download($fileName,$data);
             } else {
              // Redirect to base url
              //redirect ( base_url () );
             }
            }
        }
        
        
        public function pay($offerid = null){
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
                $price = $this->input->post('amount'); 
                $seller_id = $this->input->post('seller_id');
                
                $payment_method = $this->input->post('payment_method');
                
                if($payment_method == 'paypal'){
                    //Set variables for paypal form
                    $returnURL = base_url().'offer/success'; //payment success url
                    $cancelURL = base_url().'offer/cancel'; //payment cancel url
                    $notifyURL = base_url().'offer/ipn'; //ipn url
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
                    $this->paypal_lib->add_field('item_name', $seller_id);
                    $this->paypal_lib->add_field('custom', $booking_key);
                    $this->paypal_lib->add_field('item_number',  $offerid);
                    //$this->paypal_lib->add_field('handling',  $booking_key);
                    $this->paypal_lib->add_field('amount',  $amt);		
                    $this->paypal_lib->image($logo);
                    //echo $returnURL; die;
                    $this->paypal_lib->paypal_auto_form(); 
                    
                }else if($payment_method == 'wallet'){
                    $userid = $this->session->userdata('user_id');
                    $wallet_amt = get_wallet($userid);
                    
                    if(($wallet_amt->amount) <= $price){
                        //echo $wallet_amt->amount.'/'.$price; die;
                        $data->error = 1;
                        $data->success = 0;
                        $data->message = "You don't have enough balance to make this payment";
                        $this->session->set_flashdata('item',$data);
                        redirect('offer/pay/'.$offerid);
                    }else{
                        
                        deduct_wallet($userid,$price);
                        
                        $udata['user_id'] = $userid;            
                        $udata['txn_id'] = '';
                        $udata['order_id'] = 'ORDER'.time();
                        $udata['payment_amt'] = $price;
                        $udata['currency_code'] = 'USD';
                        $udata['status'] = 'Completed';
                        $udata['payment_type'] = '3';
                        $udata['payment_mode'] = 'Wallet';
                        $udata['seller_id'] = $seller_id;
                        
                        if($this->offer_model->InsertRecord('transactions',$udata)){
                            if($data->payment_amt > 100){
                                $cardtype = $this->offer_model->SelectRecord('card_type','*',array('limit <='=>$price),'id desc');
                                $odata['user_id'] = $userid;
                                $odata['card_type'] = $cardtype[0]['id'];
                                $this->offer_model->InsertRecord('cards',$odata);
                                    $odata1['user_id'] = $seller_id;
                                    $odata1['card_type'] = $cardtype[0]['id'];
                                    $this->offer_model->InsertRecord('cards',$odata1);
                            }
                            
                            $charge = $this->get_Charge();
                            $amt = $price;
                            $selleramt = ($amt*((100-$charge)/100));
                            $adminamt = ($amt*(($charge)/100));
                            
                            
                            $order_no = $this->create_order_no();//"ORDER_".uniqid();                        
                            $udata1['order_no'] = $order_no;
                            $udata1['amount'] = $amt;
                            $udata1['payment_type'] = 'Wallet';
                            $udata1['user_id'] = $this->session->userdata('user_id');
                            $udata1['payment_status'] = 2; 
                                        
                            $lastid = $this->offer_model->InsertRecord('order',$udata1);
                                if($lastid){
                                    $odata2['product_id'] = 0;
                                    $odata2['order_id'] = $order_no;
                                    $odata2['amount'] = $amt;
                                    $odata2['qty'] = 1;                                                            
                                    $odata2['seller_id'] = $seller_id;
                                    $odata2['offer_id'] = $offerid;
                                    $odata2['seller_commission'] = $selleramt;
                                    $this->offer_model->InsertRecord('order_detail',$odata2);                                                        
                                }
                            
                            
                           
                            added_wallet($seller_id,$selleramt);
                            added_wallet(0,$adminamt);
                            $data->error=0;
                            $data->success=1;
                            $data->message= "Money has been transferred successfully to wallet";
                            $this->session->set_flashdata('item',$data);
                            redirect('transactions');
                        }
                    }
                }                
            }
                //print_r($items->message); die;
                $udata = array("id"=>$this->session->userdata('user_id'));                
                $data->result = $this->offer_model->SelectSingleRecord('users','*',$udata,$orderby=array());                                               
                
                $data->wallet = $this->offer_model->SelectSingleRecord('wallet','*',array('user_id'=>$this->session->userdata('user_id')),$orderby=array());
                if($offerid){
                    $data->offer = $this->offer_model->SelectSingleRecord('offer','*',array('id'=>$offerid),$orderby=array()); 
                }            
                //print_r($data->pending); die;
                $data->title = 'Transfer Money';
                $data->field = 'Datatable';
                $data->page = 'transfer_money';
                $this->load->view('user/includes/header',$data);		
                $this->load->view('transfer_money_view',$data);
                $this->load->view('user/includes/footer',$data);
            
        }
        
        public function success(){
            $data=new stdClass();
            $paypalInfo = $this->input->get();
                //print_r($paypalInfo); die;
                $data->user_id = $this->session->userdata('user_id');
                $data->offer_id = $paypalInfo['item_number'];
                $data->seller_id = $paypalInfo['item_name'];
                $data->txn_id = $paypalInfo["tx"];
                $data->payment_amt = $paypalInfo["amt"];
                $data->currency_code = $paypalInfo["cc"];
                $data->status = $paypalInfo["st"];                    
                $data->cm = $paypalInfo["cm"];
                
                $is_txn = $this->offer_model->SelectSingleRecord('transactions','*',array('txn_id'=>$data->txn_id),'id desc');
                //print_r($is_txn); die;
                if(empty($is_txn)){
                    $udata['user_id'] = $data->user_id;            
                    $udata['txn_id'] = $data->txn_id;
                    $udata['order_id'] = $data->cm;
                    $udata['payment_amt'] = $data->payment_amt;
                    $udata['currency_code'] = $data->currency_code;
                    $udata['status'] = $data->status;
                    $udata['payment_type'] = '3';
                    $udata['payment_mode'] = 'Paypal';
                    $udata['seller_id'] = $data->seller_id;
                    
                    if($this->offer_model->InsertRecord('transactions',$udata)){
                        if($data->payment_amt > 100){
                            $cardtype = $this->offer_model->SelectRecord('card_type','*',array('limit <='=>$data->payment_amt),'id desc');
                            $odata['user_id'] = $data->user_id;
                            $odata['card_type'] = $cardtype[0]['id'];
                            $this->offer_model->InsertRecord('cards',$odata);
                                $odata1['user_id'] = $data->seller_id;
                                $odata1['card_type'] = $cardtype[0]['id'];
                                $this->offer_model->InsertRecord('cards',$odata1);
                        }
                        
                        $charge = $this->get_Charge();
                        $amt = $data->payment_amt;
                        $selleramt = ($amt*((100-$charge)/100));
                        $adminamt = ($amt*(($charge)/100));
                        
                        
                        $order_no = $this->create_order_no();//"ORDER_".uniqid();                        
                        $udata1['order_no'] = $order_no;
                        $udata1['amount'] = $amt;
                        $udata1['payment_type'] = 'Paypal';
                        $udata1['user_id'] = $this->session->userdata('user_id');                        
                                    
                        $lastid = $this->offer_model->InsertRecord('order',$udata1);
                            if($lastid){
                                $odata2['product_id'] = 0;
                                $odata2['order_id'] = $order_no;
                                $odata2['amount'] = $amt;
                                $odata2['qty'] = 1;                                                            
                                $odata2['seller_id'] = $data->seller_id;
                                $odata2['offer_id'] = $data->offer_id;
                                $odata2['seller_commission'] = $selleramt;
                                $this->offer_model->InsertRecord('order_detail',$odata2);                                                        
                            }
                        
                        
                       
                        added_wallet($data->seller_id,$selleramt);
                        added_wallet(0,$adminamt);
                        $data->error=0;
                        $data->success=1;
                        $data->message= "Money has been transferred successfully to wallet";
                        $this->session->set_flashdata('item',$data);
                        redirect('transactions');
                    }
                }
        }
        
        public function cancel(){
                $data=new stdClass();
                    $data->error=1;
                    $data->success=0;
                    $data->message= "Payment Failed , Plese Try Again.";
                    $this->session->set_flashdata('item',$data);
                    redirect('transactions');
        }
        
        public function create_order_no(){
            $order = "ORDER_".uniqid();                   
            if($this->offer_model->SelectRecord('order','*',array("order_no"=>$order),$orderby=array())){
                $this->create_order_no();
            }
            return $order;
        }
        
}
?>