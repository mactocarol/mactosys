<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('welcome_model');        
    }
    
	public function index()
	{
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
                //print_r($data); die;
                $data->msg = 1;
            }
        
        $udata = array("id"=>$this->session->userdata('user_id'));                
        $data->result = $this->welcome_model->SelectSingleRecord('users','*',$udata,$orderby=array());
        //***********Popular Categories******************************
        $category = $this->welcome_model->SelectRecord('category',array('*'),array(),$orderby=NULL);
        $total = 0;
        foreach($category as $key => $c){            
            $jobs = $this->welcome_model->SelectRecord('jobs',array('*'),array("category"=>$c['id']),$orderby=NULL);
            $category[$key]['total_jobs'] = count($jobs);
            $total += count($jobs);
        }
        $data->total_jobs_available = $total;
        //************Recent Jobs********************************
        $data->recent_jobs = $this->welcome_model->SelectRecord('jobs',array('*'),array(),'id desc LIMIT 2');
        //************Featured Jobs********************************
        $data->featured_jobs = $this->welcome_model->SelectRecord('jobs',array('*'),array(),'rand()  LIMIT 5');
		//************Featured Recordings********************************
        $data->featured_products = $this->welcome_model->SelectRecord('featured_products',array('*'),array(),'rand()  LIMIT 6');
        //echo "<pre>"; print_r($data->featured_products); die;
        $data->category = $category;
        $data->title = "Home";
        $data->page = "home";
		$this->load->view('welcome_message',$data);
        $this->load->view('footer',$data);
	}
    
    public function about_us()
	{
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
                //print_r($data); die;
                $data->msg = 1;
            }
        $udata = array("id"=>$this->session->userdata('user_id'));                
        $data->result = $this->welcome_model->SelectSingleRecord('users','*',$udata,$orderby=array());
        $data->pages = $this->welcome_model->SelectSingleRecord('pages','*',array('title'=>'about-us'),$orderby=array());
        
        $data->title = 'About Us';
        $data->field = 'Products';
        $data->page = 'about_us';            
        
        $this->load->view('user/includes/header',$data);		
        $this->load->view('user/about_us',$data);
        $this->load->view('user/includes/footer',$data);
	}
    
    public function contact_us()
	{
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
                //print_r($data); die;
                $data->msg = 1;
            }
        $udata = array("id"=>$this->session->userdata('user_id'));                
        $data->result = $this->welcome_model->SelectSingleRecord('users','*',$udata,$orderby=array());
        
        $data->pages = $this->welcome_model->SelectSingleRecord('pages','*',array('title'=>'contact-us'),$orderby=array());
        
        $data->title = 'Contact Us';
        $data->field = 'Products';
        $data->page = 'contact_us';            
        
        $this->load->view('user/includes/header',$data);		
        $this->load->view('user/contact_us',$data);
        $this->load->view('user/includes/footer',$data);
	}
    
    public function faq()
	{
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
                //print_r($data); die;
                $data->msg = 1;
            }
        $udata = array("id"=>$this->session->userdata('user_id'));                
        $data->result = $this->welcome_model->SelectSingleRecord('users','*',$udata,$orderby=array());
        
        $data->pages = $this->welcome_model->SelectRecord('pages','*',array('title'=>'faq'),$orderby=array());
        
        $data->title = 'Frequently Asked Questions';
        $data->field = 'Products';
        $data->page = 'faq';            
        
        $this->load->view('user/includes/header',$data);		
        $this->load->view('user/faq',$data);
        $this->load->view('user/includes/footer',$data);
	}
    
    public function terms()
	{
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
                //print_r($data); die;
                $data->msg = 1;
            }
        $udata = array("id"=>$this->session->userdata('user_id'));                
        $data->result = $this->welcome_model->SelectSingleRecord('users','*',$udata,$orderby=array());
        $data->pages = $this->welcome_model->SelectSingleRecord('pages','*',array('title'=>'terms'),$orderby=array());
        
        $data->title = 'Terms And Conditions';
        $data->field = 'Products';
        $data->page = 'terms';            
        
        $this->load->view('user/includes/header',$data);		
        $this->load->view('user/terms',$data);
        $this->load->view('user/includes/footer',$data);
	}
    
    
    public function blogs()
	{
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
                //print_r($data); die;
                $data->msg = 1;
            }
        $udata = array("id"=>$this->session->userdata('user_id'));                
        $data->result = $this->welcome_model->SelectSingleRecord('users','*',$udata,$orderby=array());
        
        $data->blogs = $this->welcome_model->SelectRecord('blogs','*',array('status'=>1),'id desc');
        
        $data->title = 'Our Blogs';
        $data->field = 'Products';
        $data->page = 'blogs';            
        
        $this->load->view('user/includes/header',$data);		
        $this->load->view('user/blogs',$data);
        $this->load->view('user/includes/footer',$data);
	}
    
    public function blog_detail($id=null)
	{
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
                //print_r($data); die;
                $data->msg = 1;
            }
        $udata = array("id"=>$this->session->userdata('user_id'));                
        $data->result = $this->welcome_model->SelectSingleRecord('users','*',$udata,$orderby=array());
        if($id){
            $data->blog = $this->welcome_model->SelectSingleRecord('blogs','*',array('id'=>$id),$orderby=array());
            $data->blogs = $this->welcome_model->SelectRecord('blogs','*',array('status'=>1,'id !='=>$id),'id desc');
        }else{
            redirect('Blogs');
        }
        
        
        $data->title = 'Blog Detail';
        $data->field = 'Products';
        $data->page = 'blogs';            
        
        $this->load->view('user/includes/header',$data);		
        $this->load->view('user/blog_detail',$data);
        $this->load->view('user/includes/footer',$data);
	}
    
    
    public function contact(){
           
            $pages = $this->welcome_model->SelectSingleRecord('pages','*',array('title'=>'contact-us'),$orderby=array());
                        $to = $pages->email;    
                        $sub = $this->input->post('subject');
                        $message  = "<p>Name - ".$this->input->post('name')."</p>";
                        $message .= "<p>Email - ".$this->input->post('email')."</p>";
                        $message .= "<p>Message - ".$this->input->post('message')."</p>";
                        
                        $this->load->helper('ht_helper');
                        phpmailer($to,$sub,$message);
               
                    $data->error=0;
                    $data->success=1;
                    $data->message="Thanks for contact, we will get in touch you soon.";
               
               $this->session->set_flashdata('item',$data);
               redirect('Contact-us');
        }
        
    public function ask(){
           
            $pages = $this->welcome_model->SelectSingleRecord('pages','*',array('title'=>'contact-us'),$orderby=array());
                        $to = $pages->email;    
                        $sub = $this->input->post('subject');
                        $message  = "<p>Name - ".$this->input->post('name')."</p>";
                        $message .= "<p>Email - ".$this->input->post('email')."</p>";
                        $message .= "<p>Question - ".$this->input->post('message')."</p>";
                        
                        $this->load->helper('ht_helper');
                        phpmailer($to,$sub,$message);
               
                    $data->error=0;
                    $data->success=1;
                    $data->message="Thanks you, we will get back to you soon.";
               
               $this->session->set_flashdata('item',$data);
               redirect('frequently-asked-questions');
        }
    public function ipn(){
        $this->load->model('welcome_model');
        
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
       
       /*
        * Inspect IPN validation result and act accordingly
        * Split response headers and payload, a better way for strcmp
        */ 
       $tokens = explode("\r\n\r\n", trim($res));
       $res = trim(end($tokens));
       if (strcmp($res, "VERIFIED") == 0 || strcasecmp($res, "VERIFIED") == 0) {
           //Include DB configuration file
           include 'dbConfig.php';
           
           $unitPrice = 25;
           
           //Payment data
           $subscr_id = $_POST['subscr_id'];
           $payer_email = $_POST['payer_email'];
           $item_number = $_POST['item_number'];
           $txn_id = $_POST['txn_id'];
           $payment_gross = $_POST['mc_gross'];
           $currency_code = $_POST['mc_currency'];
           $payment_status = $_POST['payment_status'];
           $custom = $_POST['custom'];
           $subscr_month = ($payment_gross/$unitPrice);
           $subscr_days = ($subscr_month*30);
           $subscr_date_from = date("Y-m-d H:i:s");
           $subscr_date_to = date("Y-m-d H:i:s", strtotime($subscr_date_from. ' + '.$subscr_days.' days'));
           
           if(!empty($txn_id)){
               //Check if subscription data exists with the same TXN ID.
               $prevPayment = $this->welcome_model->SelectSingleRecord('user_subscriptions','*',array("txn_id"=>$txn_id),$orderby=array());
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
                   
                   $insert = $this->welcome_model->InsertRecord('user_subscriptions',$udata);                   
                   
                   //Update subscription id in users table
                   if($insert){
                      $userdata['id'] = $udata['user_id'];
                       $this->welcome_model->UpdateRecord('users',array("account_type"=>"pro","subscription_id"=>$insert),$userdata);                                                                       
                   }
               }
           }
       }
       die;
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */