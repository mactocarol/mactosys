<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Products extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('products_model');
            $this->load->library('cart');
            $this->load->library('paypal_lib');
            
        }
        public function index($type = NULL){
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
                //print_r($items->message); die;
            }
            
            if($type){
                if($type == 3){                    
                    $data->products = $this->products_model->SelectRecord('products','*',array("user_id"=>$this->session->userdata('user_id'),'file_type'=>$type),$orderby=array());
                }else{
                    $data->products = $this->products_model->joindataResult('p.genre','g.id',array("p.user_id"=>$this->session->userdata('user_id'),'p.file_type'=>$type),'p.*,g.name','products as p','genre as g','p.id desc');   
                }                
            }else{
                $data->products = $this->products_model->joindataResult('p.genre','g.id',array("p.user_id"=>$this->session->userdata('user_id')),'p.*,g.name','products as p','genre as g','p.id desc');
            }
            
            //echo "<pre>"; print_r($data->products); die;
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->products_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            if($type == 1)   { $data->title = 'List Videos'; }
            else if($type == 2)   { $data->title = 'List Audios'; }
            else if($type == 3)   { $data->title = 'List Images'; }
            else { $data->title = 'List Products'; }
            //echo "<pre>"; print_r($data->products); die;
            $data->message = ($items->message) ? $items->message : '';
            $data->field = 'Datatable';
            $data->page = 'list_products/'.$type;
            $data->type = $type;
            $this->load->view('user/includes/header',$data);		
            $this->load->view('list_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        public function detail($id = NULL){
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
            
            if($id){                
                $data->products = $this->products_model->joindataResult('p.genre','g.id',array("p.user_id"=>$this->session->userdata('user_id'),'p.id'=>$id),'p.*,g.name','products as p','genre as g','p.id desc');
                $data->products = $this->products_model->SelectRecord('products','*',array("id"=>$id),$orderby=array());
            }else{
                redirect('products/index');
            }
            
            //echo "<pre>"; print_r($data->products[0]['file_type']); die;
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->products_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            if($data->products[0]['file_type'] == 1)   { $data->title = 'Video Detail'; }
            else if($data->products[0]['file_type'] == 2)   { $data->title = 'Audio Detail'; }
            else if($data->products[0]['file_type'] == 3)   { $data->title = 'Image Detail'; }
            else { $data->title = 'Product Detail'; }
            //echo "<pre>"; print_r($data->products); die;
            
            $data->field = 'Datatable';
            $data->page = 'list_products/'.$data->products[0]['file_type'];
            $data->type = $data->products[0]['file_type'];
            $this->load->view('user/includes/header',$data);		
            $this->load->view('product_detail_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        public function add($type=NULL){            
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
            
            $userdata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->products_model->SelectSingleRecord('users','*',$userdata,$orderby=array());
            
            $newdate = strtotime ( '-30 day' , strtotime ( $data->result->account_valid ) ) ;
            $valid_from = date ( 'Y-m-d h:i:s' , $newdate );
            
            //$data->no_of_products = $this->products_model->SelectRecord('products','*',array("user_id"=>$this->session->userdata('user_id'),"created_at <="=>$data->result->account_valid,"created_at >"=>$valid_from),$orderby=array());
            
            $data->no_of_pictures = $this->products_model->SelectRecord('products','*',array("file_type"=>3,"user_id"=>$this->session->userdata('user_id'),"created_at <="=>$data->result->account_valid,"created_at >"=>$valid_from),$orderby=array());
            $data->no_of_audios = $this->products_model->SelectRecord('products','*',array("file_type"=>2,"user_id"=>$this->session->userdata('user_id'),"created_at <="=>$data->result->account_valid,"created_at >"=>$valid_from),$orderby=array());
            $data->no_of_videos = $this->products_model->SelectRecord('products','*',array("file_type"=>1,"user_id"=>$this->session->userdata('user_id'),"created_at <="=>$data->result->account_valid,"created_at >"=>$valid_from),$orderby=array());            
            
            //echo "<pre>"; print_r($data->no_of_videos); die;
            
            if($data->result->subscription_id){
                $data->subscr = $this->products_model->SelectSingleRecord('user_subscriptions','*',array("id"=>$data->result->subscription_id),$orderby=array());
                //$data->no_of_products = $this->products_model->SelectRecord('products','*',array("user_id"=>$this->session->userdata('user_id'),"created_at <="=>$data->subscr->valid_to,"created_at >"=>$data->subscr->valid_from),$orderby=array());
                $data->no_of_pictures = $this->products_model->SelectRecord('products','*',array("file_type"=>3,"user_id"=>$this->session->userdata('user_id'),"created_at <="=>$data->subscr->valid_to,"created_at >"=>$data->subscr->valid_from),$orderby=array());
                $data->no_of_audios = $this->products_model->SelectRecord('products','*',array("file_type"=>2,"user_id"=>$this->session->userdata('user_id'),"created_at <="=>$data->subscr->valid_to,"created_at >"=>$data->subscr->valid_from),$orderby=array());
                $data->no_of_videos = $this->products_model->SelectRecord('products','*',array("file_type"=>1,"user_id"=>$this->session->userdata('user_id'),"created_at <="=>$data->subscr->valid_to,"created_at >"=>$data->subscr->valid_from),$orderby=array());   
            }
            if($data->result->account_type == '' || $data->result->account_type == 'free'){                
                //$data->no_of_products = $this->products_model->SelectRecord('products','*',array("user_id"=>$this->session->userdata('user_id')),$orderby=array());
                $data->no_of_products = $this->products_model->SelectRecord('products','*',array("file_type"=>3,"user_id"=>$this->session->userdata('user_id')),$orderby=array());
                $data->no_of_audios = $this->products_model->SelectRecord('products','*',array("file_type"=>2,"user_id"=>$this->session->userdata('user_id')),$orderby=array());
                $data->no_of_videos = $this->products_model->SelectRecord('products','*',array("file_type"=>1,"user_id"=>$this->session->userdata('user_id')),$orderby=array());   
            }
                        
            $data->current_plan = $this->products_model->joindata('m.plan_id','mp.id',array('m.user_id'=>$this->session->userdata('user_id')),array('mp.*'),'membership as m','membership_plan as mp','m.id desc');
            //echo "<pre>"; print_r($data->current_plan); die;
            $now = time(); // or your date as well
            $your_date = strtotime($data->result->account_valid);
            $datediff = $your_date - $now ;
            $day_left = round($datediff / (60 * 60 * 24));
            $data->day_left = $day_left;
            
            $data->genres = $this->products_model->SelectRecord('genre','*',array(),'id desc');           
                if(!empty($_POST)){                    
                       // print_r($_FILES);die;
                       if($_FILES['file']['name'] != ''){                               
                                
                                $upload_path = './upload/products/';
                                $config['upload_path'] = $upload_path;
                                
                                if($type == 1){
                                    $config['allowed_types'] = 'mp4|avi|mov';                                
                                    $config['max_size'] = '0';                                
                                    $config['max_filename'] = '500';                                
                                    $config['encrypt_name'] = FALSE;
                                }
                                if($type == 2){
                                    $config['allowed_types'] = 'mp3|';                                                                    
                                }
                                if($type == 3){
                                    $config['allowed_types'] = 'jpg|jpeg|gif|png';                                                                    
                                }
                                $config['overwrite'] = false;
                                //print_r($config);
                                $this->load->library ('upload',$config);
                                

                                
                                if ($this->upload->do_upload('file'))
                                {                                    
                                    $uploaddata = $this->upload->data();
                                    //print_r($udata); die;
                                    $udata['file'] = $uploaddata['file_name'];
                                    
                                    if($type == 3){
                                        $conf['image_library'] = 'gd2';
                                        $conf['source_image'] = './upload/products/'.$uploaddata['file_name'];
                                        $conf['new_image'] = './upload/products/image_thumb/'.$uploaddata['file_name'];
                                        $conf['create_thumb'] = False;
                                        $conf['maintain_ratio'] = False;
                                        $conf['width']         = 800;
                                        $conf['height']       = 600;
                                        
                                        $this->load->library('image_lib', $conf);
                                        
                                        $this->image_lib->resize();                                                                
                                    }
                                }
                                else
                                {
                                    //print_r("Products Added Failed"); die;
                                    print_r('<font class="red"><h3>'.$this->upload->display_errors().'</h3></font>'); die;
                                    $data->error=1;
                                    $data->success=0;
                                    $data->message=$this->upload->display_errors(); 
                                    $this->session->set_flashdata('item', $data);
                                    redirect('products/add/'.$type);	
                                }
                       
                       }
                       if($_FILES['image_thumb']['name'] != ''){                               
                                
                                $upload_path = './upload/products/audio_thumb/';
                                $thumb_name = uniqid().'.png';

                                if (move_uploaded_file($_FILES['image_thumb']['tmp_name'],$upload_path.$thumb_name))
                                {                                                                        
                                    //print_r($udata); die;
                                    $udata['thumb'] = $thumb_name;                                    
                                }
                                else
                                {
                                    
                                    $data->error=1;
                                    $data->success=0;
                                    $data->message='image not uploaded'; 
                                    $this->session->set_flashdata('item', $data);
                                    print_r('<font class="red"><h3>Image not uploaded</h3></font>'); die;
                                    redirect('products/add/'.$type);	
                                }
                       
                       }
                       
                       
                       if($_POST['thumb']){
                        define('UPLOAD_DIR', './upload/products/video_thumb/');
                        $img = $_POST['thumb'];
                        $img = str_replace('data:image/png;base64,', '', $img);
                        $img = str_replace(' ', '+', $img);
                        $dta = base64_decode($img);
                        $thumbfile = uniqid() . '.png';
                        $file = UPLOAD_DIR . $thumbfile;
                        $success = file_put_contents($file, $dta);
                        if($success){
                            $udata['thumb'] = $thumbfile;    
                        }                        
                       }
                       
                        $udata['title'] = $this->input->post('title');
                        $udata['description'] = $this->input->post('description');
                        $udata['file_type'] = $type;
                        $udata['genre'] = $this->input->post('genre');
                        $udata['user_id'] = $this->session->userdata('user_id');
                        $udata['price'] = $this->input->post('price');
                        $udata['tags'] = $this->input->post('tags');
                        //print_r($udata); die;
                        if($this->products_model->InsertRecord('products',$udata)){
                             $data->error=0;
                             $data->success=1;
                             $data->message="Products Added Successfully";
                        }else{
                             $data->error=1;
                             $data->success=0;
                             $data->message="Network Error";
                        }
                       
                    
                    $this->session->set_flashdata('item',$data);
                    print_r(site_url('products/index/'.$type)); die;
                    //print_r("<font color='green'>Products Added successfully</font>"); die;
                    redirect('products/add/'.$type);
                }
                        
            if($type == 1)   { $data->title = 'Add Videos'; }
            else if($type == 2)   { $data->title = 'Add Audios'; }
            else if($type == 3)   { $data->title = 'Add Images'; }
            else { $data->title = 'Add Products'; }
            $data->field = 'Products';
            $data->page = 'list_products/'.$type;
            $data->type = $type;
            
            $this->load->view('user/includes/header',$data);		
            $this->load->view('add_view',$data);
            $this->load->view('user/includes/footer',$data);                                        
        }
        
        public function add_to_cart($id){
            //echo "<pre>"; print_r($_POST); die;
            $uri = $this->input->get('return_uri');
            $result = $this->products_model->SelectSingleRecord('products','*',array("id"=>$id),$orderby=array());
            
            $data->artist = $this->products_model->SelectSingleRecord('users','*',array('id'=>$result->user_id),$orderby=array());                        
            $newdate = strtotime ( '-30 day' , strtotime ( $data->artist->account_valid ) ) ;
            $valid_from = date ( 'Y-m-d h:i:s' , $newdate );            
            $no_of_products = $this->products_model->SelectRecord('order','*',array("user_id"=>$result->user_id,"payment_status"=>2,"created_at <="=>$data->artist->account_valid,"created_at >"=>$valid_from),$orderby=array());                        
            if($data->artist->subscription_id){
                $subscr = $this->products_model->SelectSingleRecord('user_subscriptions','*',array("id"=>$data->artist->subscription_id),$orderby=array());
                $no_of_products = $this->products_model->SelectRecord('order','*',array("user_id"=>$result->user_id,"payment_status"=>2,"created_at <="=>$subscr->valid_to,"created_at >"=>$subscr->valid_from),$orderby=array());                
            }
            if($data->artist->account_type == '' || $data->artist->account_type == 'free'){                
                $no_of_products = $this->products_model->SelectRecord('order','*',array("user_id"=>$result->user_id,"payment_status"=>2),$orderby=array());                
            }                        
            $current_plan = $this->products_model->joindata('m.plan_id','mp.id',array('m.user_id'=>$result->user_id),array('mp.*'),'membership as m','membership_plan as mp','m.id desc');            
            $product_count  = count($no_of_products) + count($this->cart->contents());
            $limit          = ($current_plan['sell_limit']);
            $flag           = 0;
            $valid_to = (isset($subscr)) ? $subscr->valid_to : $artist->account_valid;                      
            if(($product_count < $limit ) || $limit == '-1'){                        
                if((($artist->account_type == 'pro') && ($valid_to >= date('Y-m-d h:i:s'))) ||  $artist->account_type == '' || $artist->account_type == 'free'){
                   $flag = 1;
                }
            }  
            
            $data=new stdClass();
            $cdata = array(
                    'id'      => $id,
                    'qty'     => 1,
                    'price'   => $result->price,
                    'name'    => trim($result->title)                    
            );
            //echo "<pre>"; print_r($cdata);  die;
            if($flag){
            $this->cart->insert($cdata);
            //$data->postitems = $_POST;        
            //echo "<pre>"; print_r($data); die;
            $data->error=0;
            $data->success=1;
            $data->message="Item Successfully Added to your cart";
            $this->session->set_flashdata('item',$data);
            }
            redirect($uri,$data);
            
        }
        
        public function remove_cart($rowid){
            //print_r(($_POST['session_id'])); die;
            $data=new stdClass();
            $cdata = array(
                'rowid'   => $rowid,
                'price'   => 0,
                'qty'     => 0,
                'name'   => ''
                );
                
            if($this->cart->update($cdata)){
                    $data->error=0;
                    $data->success=1;
                    $data->message='Item successfully removed from your cart.';
                    $this->session->set_flashdata('item',$data);
            }
                        
            redirect('products/cart_view',$data); 
        }
        
        public function cart_view(){
            $data=new stdClass();
            
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
            $data->result = $this->products_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            $data->title = 'View Cart';
            $data->field = 'Products';
            $data->page = 'cart_view';            
            
            $this->load->view('user/includes/header',$data);		
            $this->load->view('cart_view',$data);
            $this->load->view('user/includes/footer',$data);
        }
        
        public function checkout(){
            $data=new stdClass();
            
            if(!$this->session->userdata('logged_in')){
                $url = site_url('products/cart_view');
                redirect('user/index/?return='.urlencode($url));
            }
            
            if(!count($this->cart->contents())){
                $data->error=1;
                $data->success=0;
                $data->message='Cart is empty';
                 $this->session->set_flashdata('item',$data);
                redirect('products/cart_view',$data);
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
            $data->result = $this->products_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            $data->title = 'Checkout';
            $data->field = 'Products';
            $data->page = 'checkout';            
            
            $this->load->view('user/includes/header',$data);		
            $this->load->view('checkout_view',$data);
            $this->load->view('user/includes/footer',$data);
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
            
            $data->reslt = $this->products_model->SelectSingleRecord('products','*',array('id'=>$id),$orderby=array());
            ///print_r($data); die;
            if(!empty($_POST)){
               // print_r($_POST);die;
               if($_FILES['file']['name'] != ''){                               
                                
                                $upload_path = './upload/products/';
                                $config['upload_path'] = $upload_path;
                                if($data->reslt->file_type == 1){
                                    $config['allowed_types'] = 'mp4|avi|mov';                                
                                    $config['max_size'] = '0';                                
                                    $config['max_filename'] = '500';                                
                                    $config['encrypt_name'] = FALSE;
                                }
                                if($data->reslt->file_type == 2){
                                    $config['allowed_types'] = 'mp3|';                                                                    
                                }
                                if($data->reslt->file_type == 3){
                                    $config['allowed_types'] = 'jpg|jpeg|gif|png';                                                                    
                                }
                                
                                //print_r($config);die;
                                $this->load->library ('upload',$config);
                                                                
                                if ($this->upload->do_upload('file'))
                                {                                    
                                    $uploaddata = $this->upload->data();                                    
                                    $udata['file'] = $uploaddata['file_name'];
                                    if($data->reslt->file_type == 3){
                                        $conf['image_library'] = 'gd2';
                                        $conf['source_image'] = './upload/products/'.$uploaddata['file_name'];
                                        $conf['new_image'] = './upload/products/image_thumb/'.$uploaddata['file_name'];
                                        $conf['create_thumb'] = False;
                                        $conf['maintain_ratio'] = False;
                                        $conf['width']         = 800;
                                        $conf['height']       = 600;
                                        
                                        $this->load->library('image_lib', $conf);
                                        
                                        $this->image_lib->resize();                                                                
                                    }
                                }
                                else
                                {
                                    //print_r($this->upload->display_errors()); die;
                                    $data->error=1;
                                    $data->success=0;
                                    $data->message=$this->upload->display_errors(); 
                                    $this->session->set_flashdata('item', $data);
                                    redirect('products/edit/'.$id);	
                                }
                       
                       }
                       
                       if($_FILES['image_thumb']['name'] != ''){                               
                                
                                $upload_path = './upload/products/audio_thumb/';
                                $thumb_name = uniqid().'.png';

                                if (move_uploaded_file($_FILES['image_thumb']['tmp_name'],$upload_path.$thumb_name))
                                {                                                                        
                                    //print_r($udata); die;
                                    $udata['thumb'] = $thumb_name;                                    
                                }
                                else
                                {
                                    
                                    $data->error=1;
                                    $data->success=0;
                                    $data->message='image not uploaded'; 
                                    $this->session->set_flashdata('item', $data);
                                    print_r('<font class="red">image not uploaded</font>'); die;
                                    redirect('products/edit/'.$id);	
                                }
                       
                       }
                       
                if($_POST['thumb']){                        
                        $img = $_POST['thumb'];
                        $img = str_replace('data:image/png;base64,', '', $img);
                        $img = str_replace(' ', '+', $img);
                        $dta = base64_decode($img);
                        $thumbfile = uniqid() . '.png';
                        $file = './upload/products/video_thumb/' . $thumbfile;
                        $success = file_put_contents($file, $dta);
                        if($success){
                            $udata['thumb'] = $thumbfile;    
                        }                        
                       }
                       
               $udata['title'] = $this->input->post('title');
               $udata['description'] = $this->input->post('description');
               $udata['genre'] = $this->input->post('genre');
               $udata['tags'] = $this->input->post('tags');
               $udata['price'] = $this->input->post('price');
               if($this->products_model->UpdateRecord('products',$udata,array("id"=>$id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Products Updated Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               print_r(site_url('products/index/'.$data->reslt->file_type)); die;
               //print_r("<font color='green'>Products Updated successfully</font>"); die;
               redirect('products/edit/'.$id);
            }
                        
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->genres = $this->products_model->SelectRecord('genre','*',array(),'id desc');           
            $data->result = $this->products_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            if($data->reslt->file_type == 1)   { $data->title = 'Edit Videos'; }
            else if($data->reslt->file_type == 2)   { $data->title = 'Edit Audios'; }
            else if($data->reslt->file_type == 3)   { $data->title = 'Edit Images'; }
            else { $data->title = 'Edit Products'; }
            $data->field = 'Products';
            $data->page = 'list_products';
            $data->type = $data->reslt->file_type;
            $this->load->view('user/includes/header',$data);		
            $this->load->view('edit_view',$data);
            $this->load->view('user/includes/footer',$data);                                        
        }
        
        public function delete($id,$type=Null){
            $products = $this->products_model->SelectSingleRecord('products','*',array('id'=>$id),$orderby=array());
            if(isset($products->products)){
                unlink('./upload/products/'.$products->products);    
            }
            
            $data=new stdClass();
            if($this->products_model->delete_record('products',array("id"=>$id))){
                $data->error=0;
                $data->success=1;
                $data->message="Products Deleted Successfully";
            }else{
                $data->error=1;
                $data->success=0;
                $data->message="Network Error";
            }
            $this->session->set_flashdata('item',$data);
            redirect('products/index/'.$type);
        }
        
        public function buy(){
            $data=new stdClass();            
            $charge = $this->get_Charge();
            
            $order_no = $this->create_order_no();//"ORDER_".uniqid();
            $amt = $this->input->post('amount');
            $amt = $amt;
            
            $udata['order_no'] = $order_no;
            $udata['amount'] = $amt;
            $udata['payment_type'] = $this->input->post('payment_method');
            $udata['user_id'] = $this->session->userdata('user_id');
            
            if($this->input->post('payment_method') == 'paypal'){
                    if($lastid = $this->products_model->InsertRecord('order',$udata)){
                        foreach($this->cart->contents() as $item){
                            $odata['product_id'] = $item['id'];
                            $odata['order_id'] = $order_no;
                            $odata['amount'] = $item['price'];
                            $odata['qty'] = $item['qty'];
                            
                            $product = $this->products_model->SelectSingleRecord('products','user_id,price',array("id"=>$item['id']),'id desc');
                            $odata['seller_id'] = $product->user_id;
                            $odata['seller_commission'] = $product->price - ($product->price * ($charge/100));
                            $this->products_model->InsertRecord('order_detail',$odata);
                        }
                    }
                    //Set variables for paypal form
                    $returnURL = base_url().'products/success'; //payment success url
                    $cancelURL = base_url().'products/cancel'; //payment cancel url
                    $notifyURL = base_url().'products/ipn'; //ipn url
                    //get particular product data
                    //$product = $this->product->getRows($id);
                    
                    $userID = $this->session->userdata('user_id'); //current user id
                    $logo = base_url().'assets/images/codexworld-logo.png';
                    
                    $this->paypal_lib->add_field('return', $returnURL);
                    $this->paypal_lib->add_field('cancel_return', $cancelURL);
                    $this->paypal_lib->add_field('notify_url', $notifyURL);
                    $this->paypal_lib->add_field('item_name', '');
                    $this->paypal_lib->add_field('custom', $order_no);
                    $this->paypal_lib->add_field('item_number',  $userID);            
                    $this->paypal_lib->add_field('amount',  $amt);		
                    $this->paypal_lib->image($logo);
                    
                    $this->paypal_lib->paypal_auto_form();
            }else if($this->input->post('payment_method') == 'wallet'){                
                    $userid = $this->session->userdata('user_id');
                    $wallet_amt = get_wallet($userid);
                    //echo $wallet_amt->amount.'/'.$amt; die;
                    if(floatval($wallet_amt->amount) <= floatval($amt)){ 
                        $data->error = 1;
                        $data->success = 0;
                        $data->message = "You don't have enough balance to make this payment";
                        $this->session->set_flashdata('item',$data);
                        redirect('products/checkout');
                    }else{
                        $udata['payment_status'] = '2';                        
                        if($lastid = $this->products_model->InsertRecord('order',$udata)){
                            foreach($this->cart->contents() as $item){
                                $odata['product_id'] = $item['id'];
                                $odata['order_id'] = $order_no;
                                $odata['amount'] = $item['price'];
                                $odata['qty'] = $item['qty'];
                                
                                $product = $this->products_model->SelectSingleRecord('products','user_id,price',array("id"=>$item['id']),'id desc');
                                $odata['seller_id'] = $product->user_id;
                                $odata['seller_commission'] = $product->price - ($product->price * ($charge/100));
                                $this->products_model->InsertRecord('order_detail',$odata);
                            }
                            deduct_wallet($userid,$amt);
                            $charge = $this->get_Charge();
                            $data->payment_amt = $amt;
                            $amt = ($amt*($charge/100));
                                                                                    
                                $tdata['user_id'] = $userid;            
                                $tdata['txn_id'] = '';
                                $tdata['order_id'] = $order_no;
                                $tdata['payment_amt'] = $data->payment_amt;
                                $tdata['currency_code'] = 'USD';
                                $tdata['status'] = 'Completed';
                                $tdata['payment_type'] = '2';
                                $tdata['payment_mode'] = 'Wallet';
                                if($this->products_model->InsertRecord('transactions',$tdata)){                                    
                                        $orders = $this->products_model->SelectRecord('order_detail','*',array("order_id"=>$order_no),'id desc');
                                        foreach($orders as $row){
                                            $product = $this->products_model->SelectSingleRecord('products','*',array("id"=>$row['product_id']),'id desc');
                                            $price = $product->price - ($product->price * ($charge/100));
                                            added_wallet($product->user_id,$price);
                                        }
                                    
                                    added_wallet(0,$amt);
                                    $this->cart->destroy();
                                    $data->error=0;
                                    $data->success=1;
                                    $data->message= "Payment has been made successfully, You can download Link from my orders.";
                                    $this->session->set_flashdata('item',$data);
                                    redirect('products/cart_view');
                                }
                            
                            
                        }
                    }
                        
            }
            
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
                
                $charge = $this->get_Charge();
                $amt = $data->payment_amt;
                $amt = ($amt*($charge/100));
                
                $is_txn = $this->products_model->SelectSingleRecord('transactions','*',array('txn_id'=>$data->txn_id),'id desc');
                if(empty($is_txn)){
                    $udata['user_id'] = $data->user_id;            
                    $udata['txn_id'] = $data->txn_id;
                    $udata['order_id'] = $data->order_id;
                    $udata['payment_amt'] = $data->payment_amt;
                    $udata['currency_code'] = $data->currency_code;
                    $udata['status'] = $data->status;
                    $udata['payment_type'] = '2';
                    $udata['payment_mode'] = 'Paypal';
                    if($this->products_model->InsertRecord('transactions',$udata)){
                        $this->products_model->UpdateRecord('order',array("transaction_id"=>$data->txn_id,"payment_status"=>"2"),array("order_no"=>$data->order_id));
                            $orders = $this->products_model->SelectRecord('order_detail','*',array("order_id"=>$data->order_id),'id desc');
                            foreach($orders as $row){
                                $product = $this->products_model->SelectSingleRecord('products','*',array("id"=>$row['product_id']),'id desc');
                                $price = $product->price - ($product->price * ($charge/100));
                                added_wallet($product->user_id,$price);
                            }
                        
                        added_wallet(0,$amt);
                        $this->cart->destroy();
                        $data->error=0;
                        $data->success=1;
                        $data->message= "Payment has been made successfully, You can download Link from my orders.";
                        $this->session->set_flashdata('item',$data);
                        redirect('products/cart_view');
                    }
                }
        }
        
        public function cancel(){
                $data=new stdClass();                                
                
                    $data->error=1;
                    $data->success=0;
                    $data->message= "Payment Failed , Plese Try Again.";
                    $this->session->set_flashdata('item',$data);
                    redirect('products/cart_view');
        }
        
        public function create_order_no(){
            $order = "ORDER_".uniqid();                   
            if($this->products_model->SelectRecord('order','*',array("order_no"=>$order),$orderby=array())){
                $this->create_order_no();
            }
            return $order;
        }
        
        public function view($id = NULL){            
            
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
            
            if($id){                
                $data->products = $this->products_model->joindataResult('p.genre','g.id',array("p.user_id"=>$this->session->userdata('user_id'),'p.id'=>$id),'p.*,g.name','products as p','genre as g','p.id desc');
                $data->products = $this->products_model->SelectRecord('products','*',array("id"=>$id),$orderby=array());
            }else{
                redirect('products/index');
            }
            
            //echo "<pre>"; print_r($data->products); die;
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->products_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            if($data->products[0]['file_type'] == 1)   { $data->title = 'Video Detail'; }
            else if($data->products[0]['file_type'] == 2)   { $data->title = 'Audio Detail'; }
            else if($data->products[0]['file_type'] == 3)   { $data->title = 'Image Detail'; }
            else { $data->title = 'Product Detail'; }
            //echo "<pre>"; print_r($data->products); die;
            
            $fdata['product_id'] = $id;
            $fdata['follower_id'] = $this->session->userdata('user_id');
            
            $data->is_cool_products = $this->products_model->SelectSingleRecord('cool_products','*',$fdata,$orderby=array());
            $data->is_likes = $this->products_model->SelectSingleRecord('likes','*',$fdata,$orderby=array());
            
            $data->field = 'Datatable';
            $data->page = 'list_products/'.$data->products[0]['file_type'];
            $data->type = $data->products[0]['file_type'];
            $this->load->view('user/includes/header',$data);		
            $this->load->view('product_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        public function album($id = NULL){            
            
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
            
            if($id){                
                $data->products = $this->products_model->joindataResult('p.genre','g.id',array("p.user_id"=>$this->session->userdata('user_id'),'p.id'=>$id),'p.*,g.name','products as p','genre as g','p.id desc');
                $data->products = $this->products_model->SelectRecord('products','*',array("id"=>$id),$orderby=array());
            }else{
                redirect('products/index');
            }
            
            //echo "<pre>"; print_r($data->products); die;
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->products_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            if($data->products[0]['file_type'] == 1)   { $data->title = 'Video Detail'; }
            else if($data->products[0]['file_type'] == 2)   { $data->title = 'Audio Detail'; }
            else if($data->products[0]['file_type'] == 3)   { $data->title = 'Image Detail'; }
            else { $data->title = 'Product Detail'; }
            //echo "<pre>"; print_r($data->products); die;
            
            $fdata['product_id'] = $id;
            $fdata['follower_id'] = $this->session->userdata('user_id');
            
            $data->is_cool_products = $this->products_model->SelectSingleRecord('cool_products','*',$fdata,$orderby=array());
            $data->is_likes = $this->products_model->SelectSingleRecord('likes','*',$fdata,$orderby=array());
            
            $data->field = 'Datatable';
            $data->page = 'list_products/'.$data->products[0]['file_type'];
            $data->type = $data->products[0]['file_type'];
            $this->load->view('user/includes/header',$data);		
            $this->load->view('product_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        public function upload_frame(){
            $data=new stdClass();
            $this->load->view('upload_frame',$data);
        }
        
        public function comments(){
            $data=new stdClass();
            $udata['product_id'] = $this->input->post('product_id');
            $udata['message_from'] = $this->session->userdata('user_id');
            $udata['message'] = $this->input->post('comment');
            if(!$this->session->userdata('user_id')){
                $data->error=1;
                $data->success=0;
                $data->message= "Please Login to comment.";
                $this->session->set_flashdata('item',$data);
                redirect('products/view/'.$this->input->post('product_id').'#comment-box');
            }
            if($this->products_model->InsertRecord('product_comments',$udata)){
                $data->error=0;
                $data->success=1;
                $data->message="Your Comment has been submitted successfully";
            }else{
                $data->error=1;
                $data->success=0;
                $data->message= "Network Error";
            }
            $this->session->set_flashdata('item',$data);
            redirect('products/view/'.$this->input->post('product_id'));
        }
        
        public function orders(){
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
            $data->result = $this->products_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            $data->orders = $this->products_model->SelectRecord('order','*',array("user_id"=>$this->session->userdata('user_id')),'id desc');
            
            //echo "<pre>"; print_r($data); die;
            $data->title = 'My Orders';
            $data->field = 'orders';
            $data->page = 'my_order';            
            
            $this->load->view('user/includes/header',$data);		
            $this->load->view('order_view',$data);
            $this->load->view('user/includes/footer',$data);
        }
        
        public function download(){
            if(isset($_REQUEST["file"])){
                // Get parameters
                $file = urldecode($_REQUEST["file"]); // Decode URL-encoded string
                $filepath = "upload/products/" . $file;
                
                // Process download
                if(file_exists($filepath)) {
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($filepath));
                    flush(); // Flush system output buffer
                    readfile($filepath);
                    exit;
                }
            }
        }
        
        public function add_thumb(){
            define('UPLOAD_DIR', './upload/products/video_thumb/');
            $img = $_POST['image'];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file = UPLOAD_DIR . uniqid() . '.png';
            $success = file_put_contents($file, $data);
            print $success ? $file : 'Unable to save the file.'; die;
        }
}
?>