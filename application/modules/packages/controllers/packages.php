<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Packages extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('pro_model');
            $this->load->library('paypal_lib');
           
        }
        public function index(){
            
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
            $data->result = $this->pro_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            if($data->result->subscription_id){
                $data->subscr = $this->pro_model->SelectSingleRecord('user_subscriptions','*',array("id"=>$data->result->subscription_id),$orderby=array());   
            }
            //print_r($data->subscr); die;
            
            $data->current_plan = $this->pro_model->joindata('m.plan_id','mp.id',array('m.user_id'=>$this->session->userdata('user_id')),array('mp.*'),'membership as m','membership_plan as mp','m.id desc');
            $data->plans = $this->pro_model->SelectRecord('membership_plan','*',array("id !="=>1),$orderby=array());            
            //print_r($data->plans[0]['amount']); die;
            
            $now = time(); // or your date as well
                            $your_date = strtotime($data->result->account_valid);
                            $datediff = $your_date - $now ;
                            $day_left = round($datediff / (60 * 60 * 24));
                            $data->day_left = $day_left;
                            if($day_left == 0){
                                $this->pro_model->UpdateRecord('users',array("account_type"=>"free"),$udata);    
                            }
            
            if($_POST){
                 $data->flag = 1;
                 $data->package = $this->pro_model->SelectSingleRecord('membership_plan','*',array("id"=>$this->input->post('package')),$orderby=array());
                 //print_r($data->package); die;
            }
            $data->title = 'Upgrade Membership';
            $data->field = 'pro';
            $data->page = 'packages';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('add_money_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        public function buy(){
        if( $this->session->userdata('user_group_id') != 2){
                redirect('user');
            }            
        $price = $this->pro_model->SelectSingleRecord('admin','*',array(),$orderby=array());
		//Set variables for paypal form
		$returnURL = base_url().'packages/success'; //payment success url
		$cancelURL = base_url().'packages/cancel'; //payment cancel url
		$notifyURL = base_url().'packages/ipn'; //ipn url
		//get particular product data
		//$product = $this->product->getRows($id);
        $item_number = time();
        $amt = $this->input->post('amount');
        $plan = $this->input->post('plan');  
        $booking_key = "ORDER_".time(); 
		$userID = $this->session->userdata('user_id'); //current user id
		$logo = base_url().'assets/images/codexworld-logo.png';
		
		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', $plan);
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
            $data->plan_id = $paypalInfo['item_name']; 
            $data->txn_id = $paypalInfo["tx"];
            $data->payment_amt = $paypalInfo["amt"];
            $data->currency_code = $paypalInfo["cc"];
            $data->order_id = $paypalInfo["cm"];
            $data->status = $paypalInfo["st"];                    
            
            $udata['user_id'] = $data->user_id;            
            $udata['txn_id'] = $data->txn_id;
            $udata['order_id'] = $data->order_id;
            $udata['payment_amt'] = $data->payment_amt;
            $udata['currency_code'] = $data->currency_code;
            $udata['status'] = $data->status;            
            if($this->pro_model->InsertRecord('transactions',$udata)){
                $this->pro_model->UpdateRecord('users',array("account_type"=>'pro',"payment_type"=>"one time","subscription_id"=>"0","account_valid"=>date('Y-m-d h:i:s', strtotime("+30 days"))),array("id"=>$data->user_id));
                $current_plan = $this->pro_model->SelectSingleRecord('membership','*',array('user_id'=>$data->user_id),$orderby=array());
                    if(!empty($current_plan)){
                        $this->pro_model->UpdateRecord('membership',array("plan_id"=>$data->plan_id),array("user_id"=>$data->user_id));
                    }else{
                        $this->pro_model->InsertRecord('membership',array("plan_id"=>$data->plan_id,"user_id"=>$data->user_id));
                    }
                $data->error=0;
                $data->success=1;
                $data->message= "Your account has been upgraded successfully";
                $this->session->set_flashdata('item',$data);
                redirect('packages');
            }
    }
    
    public function cancel(){
            $data=new stdClass();
                $data->error=1;
                $data->success=0;
                $data->message= "Payment Failed , Plese Try Again.";
                $this->session->set_flashdata('item',$data);
                redirect('packages');
    }
    
    public function success1(){
        $data=new stdClass();
        $paypalInfo = $this->input->get();
            //print_r($paypalInfo); die;
            
            if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && $_GET['st'] == 'Completed'){
            //get transaction information from query string
            $item_number = $_GET['item_number'];
            $txn_id = $_GET['tx'];
            $payment_gross = $_GET['amt'];
            $currency_code = $_GET['cc'];
            $payment_status = $_GET['st'];
            $custom = $_GET['cm'];
            
            //Check if subscription data exists with the TXN ID
            $paymentRow = $this->pro_model->SelectSingleRecord('user_subscriptions','*',array("txn_id"=>$txn_id),$orderby=array());
            //$prevPaymentResult = $db->query("SELECT * FROM user_subscriptions WHERE txn_id = '".$txn_id."'");
            
            $udata['user_id'] = $this->session->userdata('user_id');            
            $udata['txn_id'] = $txn_id;
            $udata['payment_amt'] = $payment_gross;
            $udata['currency_code'] = $currency_code;
            $udata['status'] = $payment_status;            
            if($this->pro_model->InsertRecord('transactions',$udata)){
                //$this->pro_model->UpdateRecord('users',array("account_type"=>'pro',"account_valid"=>date('Y-m-d h:i:s', strtotime("+30 days"))),array("id"=>$data->user_id));
                $data->error=0;
                $data->success=1;
                $data->message= "Your account has been upgraded successfully. It may take few minutes to upgrade, please come back after few minutes";
                $this->session->set_flashdata('item',$data);
                redirect('packages');
            }
                        
        }elseif(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && $_GET['st'] != 'Completed'){
                $data->error=1;
                $data->success=0;
                $data->message= "Your payment was unsuccessful, please try again.";
                $this->session->set_flashdata('item',$data);
                redirect('packages');            
        }
        
       // print_r($paymentRow); die;
    }
    
    public function ipn1(){
       $raw_post_data = "amount3=50.00&address_status=unconfirmed&subscr_date=04:20:28 Mar 15, 2018 PDT&payer_id=PL674DPEAXGQL&address_street=Flat no. 507 Wing A Raheja Residency Film City Road, Goregaon East&mc_amount3=50.00&charset=windows-1252&address_zip=400097&first_name=test&reattempt=1&address_country_code=IN&address_name=test buyer&notify_version=3.8&subscr_id=I-4ARH5PYEKF5G&custom=4&payer_status=verified&business=parvez@mactosys.com&address_country=India&address_city=Mumbai&verify_sign=AFd.erwt7VoeoUMr85yut0RloHozA.JiAR6HBB3O0K6pzb.YMEKi8aeh&payer_email=mss.parvezkhan-buyer@gmail.com&last_name=buyer&address_state=Maharashtra&receiver_email=parvez@mactosys.com&recurring=1&txn_type=subscr_cancel&item_name=Member Subscriptions&mc_currency=USD&item_number=MS&residence_country=IN&test_ipn=1&period3=1 M&ipn_track_id=3055e69fa1c78";
       $raw_post_array = explode('&', $raw_post_data);
       
       $raw_post_data1 = "mc_gross=50.00&protection_eligibility=Eligible&address_status=unconfirmed&payer_id=PL674DPEAXGQL&address_street=Flat no. 507 Wing A Raheja Residency Film City Road, Goregaon East&payment_date=04:15:53 Mar 15, 2018 PDT&payment_status=Completed&charset=windows-1252&address_zip=400097&first_name=test&mc_fee=2.25&address_country_code=IN&address_name=test buyer&notify_version=3.9&subscr_id=I-4ARH5PYEKF5G&custom=4&payer_status=verified&business=parvez@mactosys.com&address_country=India&address_city=Mumbai&verify_sign=AXlv5viNs2yT2MDR7RbOqxhYiFHrA096PDXBBtxOQWpVmKEbmovmS.-X&payer_email=mss.parvezkhan-buyer@gmail.com&txn_id=2E83985894832133Y&payment_type=instant&last_name=buyer&address_state=Maharashtra&receiver_email=parvez@mactosys.com&payment_fee=2.25&receiver_id=QR6D67WGWH9SE&txn_type=subscr_payment&item_name=Member Subscriptions&mc_currency=USD&item_number=MS&residence_country=IN&test_ipn=1&transaction_subject=Member Subscriptions&payment_gross=50.00&ipn_track_id=7f7a33c95ab04";
       $raw_post_array1 = explode('&', $raw_post_data1);
       echo "<pre>"; print_r($raw_post_array); print_r($raw_post_array1); die;
    }
    
    public function ipn(){
     
        /*
        * Read POST data
        * reading posted data directly from $_POST causes serialization
        * issues with array data in POST.
        * Reading raw POST data from input stream instead.
        */        
       $raw_post_data = file_get_contents('php://input');
       
       $raw_post_array = explode('&', $raw_post_data);
       
       $myPost = array();
       foreach ($raw_post_array as $keyval) {
           $keyval = explode ('=', $keyval);
           if (count($keyval) == 2)
               $myPost[$keyval[0]] = urldecode($keyval[1]);
       }
       
       // Read the post from PayPal system and add 'cmd'
       $req = 'cmd=_notify-validate';
       if(function_exists('get_magic_quotes_gpc')) {
           $get_magic_quotes_exists = true;
       }
       foreach ($myPost as $key => $value) {
           if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
               $value = urlencode(stripslashes($value));
           } else {
               $value = urlencode($value);
           }
           $req .= "&$key=$value";
       }
       
       /*
        * Post IPN data back to PayPal to validate the IPN data is genuine
        * Without this step anyone can fake IPN data
        */
       $paypalURL = "https://www.sandbox.paypal.com/cgi-bin/webscr";
       $ch = curl_init($paypalURL);
       if ($ch == FALSE) {
           return FALSE;
       }
       curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
       curl_setopt($ch, CURLOPT_POST, 1);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
       curl_setopt($ch, CURLOPT_SSLVERSION, 6);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
       curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
       
       // Set TCP timeout to 30 seconds
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
       curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name'));
       $res = curl_exec($ch);
       //print_r($res); die;
       /*
        * Inspect IPN validation result and act accordingly
        * Split response headers and payload, a better way for strcmp
        */ 
       $tokens = explode("\r\n\r\n", trim($res));
       $res = trim(end($tokens));
       
       if (strcmp($res, "VERIFIED") == 0 || strcasecmp($res, "VERIFIED") == 0) {
           //Include DB configuration file
          
           
           //Payment data
           $subscr_id = $_POST['subscr_id'];
           $payer_email = $_POST['payer_email'];
           $item_number = $_POST['item_number'];
           $txn_id = $_POST['txn_id'];
           $payment_gross = $_POST['mc_gross'];
           $currency_code = $_POST['mc_currency'];
           $payment_status = $_POST['payment_status'];
           $custom = $_POST['custom'];
           $subscr_month = 1;//($payment_gross/$unitPrice);
           $subscr_days = ($subscr_month*30);
           $subscr_date_from = date("Y-m-d H:i:s");
           $subscr_date_to = date("Y-m-d H:i:s", strtotime($subscr_date_from. ' + '.$subscr_days.' days'));
           
           if(!empty($txn_id)){
               //Check if subscription data exists with the same TXN ID.
               $prevPayment = $this->pro_model->SelectSingleRecord('user_subscriptions','*',array("txn_id"=>$txn_id),$orderby=array());
               //$prevPayment = $db->query("SELECT id FROM user_subscriptions WHERE txn_id = '".$txn_id."'");
               if(!empty($prevPayment)){
                   exit();
               }else{
                   //Insert tansaction data into the database
                   $udata['user_id'] = $custom;
                   $udata['validity'] = $subscr_month;
                   $udata['valid_from'] = $subscr_date_from;
                   $udata['valid_to'] = $subscr_date_to;
                   $udata['item_number'] = $item_number;
                   $udata['txn_id'] = $txn_id;
                   
                   $udata['payment_gross'] = $payment_gross;
                   $udata['currency_code'] = $currency_code;
                   $udata['subscr_id'] = $subscr_id;
                   $udata['payment_status'] = $payment_status;
                   $udata['payer_email'] = $payer_email;                   
                   
                   $insert = $this->pro_model->InsertRecord('user_subscriptions',$udata);                   
                   
                   //Update subscription id in users table
                   if($insert){
                       $userdata['id'] = $udata['user_id'];
                       $this->pro_model->UpdateRecord('users',array("account_type"=>"pro","account_valid"=>$subscr_date_to,"payment_type"=>"recurring","subscription_id"=>$insert),$userdata);
                       $current_plan = $this->pro_model->SelectSingleRecord('membership','*',array('user_id'=>$udata['user_id']),$orderby=array());
                            if(!empty($current_plan)){
                                $this->pro_model->UpdateRecord('membership',array("plan_id"=>$_POST['item_name']),array("user_id"=>$udata['user_id']));
                            }else{
                                $this->pro_model->InsertRecord('membership',array("plan_id"=>$_POST['item_name'],"user_id"=>$udata['user_id']));
                            }
                   }
               }
           }
       }
       die;
    }
	
}
?>