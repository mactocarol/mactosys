<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Send_video extends HT_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('video_model');
            if( $this->session->userdata('user_group_id') != 2){
                redirect('user');
            }
        }
        public function index($reciever_id = NULL){
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
            $data->results = $this->video_model->SelectRecord('video','*',array("user_id"=>$this->session->userdata('user_id')),'id desc');
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->video_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            $data->reciever = $this->video_model->SelectSingleRecord('users','*',array('id'=>$reciever_id),$orderby=array());
            if($data->result->user_type == 2){
              redirect('user');
            }
            
            $data->title = 'List Video';
            $data->field = 'Datatable';
            $data->page = 'list_video';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('list_video_view',$data);
            $this->load->view('user/includes/footer',$data);		
        }
        
        public function submit(){
            
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
            $data->result = $this->video_model->SelectSingleRecord('users','*',$userdata,$orderby=array());
            
            if($data->result->user_type == 2){
              redirect('user');
            }
            $wallet = get_wallet($this->session->userdata('user_id'),$data->result->user_type)->amount;
            $charges = get_charge_amount($this->session->userdata('user_id'));
                if(!empty($_POST) && $wallet >= $charges){                    
                        //print_r($_POST);die;
                       
                        $udata['video_id'] = $this->input->post('video');
                        $udata['receiver_id'] = $this->input->post('receiver');
                        $udata['sender_id'] = $this->session->userdata('user_id');
                        $udata['amount'] = $charges;
                        //print_r($udata); die;
                        if($lastid = $this->video_model->InsertRecord('video_share',$udata)){
                             deduct_wallet($data->result->id,$data->result->user_type);
                             $tdata['paid_from'] = $data->result->id;
                             $tdata['paid_to'] = 1;
                             $tdata['amount'] = $charges;
                             $tdata['video_share_id'] = $lastid;
                             $this->video_model->InsertRecord('transactions',$tdata);
                                $pdata['paid_from'] = $data->result->id;
                                $pdata['paid_to'] = $this->input->post('receiver');
                                $pdata['amount'] = $charges;
                                $pdata['video_share_id'] = $lastid;
                                $this->video_model->InsertRecord('user_payment',$pdata);
                             
                             $data->error=0;
                             $data->success=1;
                             $data->message="Video Send Successfully and $ ".$charges." has been deducted from your wallet.";
                        }else{
                             $data->error=1;
                             $data->success=0;
                             $data->message="Network Error";
                        }
                       
                    
                    $this->session->set_flashdata('item',$data);
                    redirect('investors/my_investors');
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Not enough balance in your wallet";
                    $this->session->set_flashdata('item',$data);
                    redirect('send_video/index/'.$this->input->post('receiver'));
                }                                                
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
               if($_FILES['video']['name'] != ''){                               
                                
                                $upload_path = './upload/video/';
                                $config['upload_path'] = $upload_path;
                                //allowed file types. * means all types
                                $config['allowed_types'] = 'mp4|avi|mov';
                                //allowed max file size. 0 means unlimited file size
                                $config['max_size'] = '0';
                                //max file name size
                                $config['max_filename'] = '255';
                                //whether file name should be encrypted or not
                                $config['encrypt_name'] = FALSE;
                                
                                //print_r($config);
                                $this->load->library ('upload',$config);
                                

                                
                                if ($this->upload->do_upload('video'))
                                {                                    
                                    $uploaddata = $this->upload->data();
                                    //print_r($udata); die;
                                    $udata['video'] = $uploaddata['file_name'];                                    
                                }
                                else
                                {
                                    //print_r($this->upload->display_errors()); die;
                                    $data->error=1;
                                    $data->success=0;
                                    $data->message=$this->upload->display_errors().' Only mp4|avi|mov allowed!'; 
                                    $this->session->set_flashdata('item', $data);
                                    redirect('video/add');	
                                }
                       
                       }
                       
               $udata['title'] = $this->input->post('title');
               //$udata['link'] = $this->input->post('link');              
               if($this->video_model->UpdateRecord('video',$udata,array("id"=>$id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Video Updated Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('video/edit/'.$id);
            }
            
            $data->reslt = $this->video_model->SelectSingleRecord('video','*',array('id'=>$id),$orderby=array());
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->video_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            if($data->result->user_type == 2){
              redirect('user');
            }
            $data->title = 'Video';
            $data->field = 'Video';
            $data->page = 'video';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('edit_video_view',$data);
            $this->load->view('user/includes/footer',$data);                                        
        }
        
        public function delete($id){
            $video = $this->video_model->SelectSingleRecord('video','*',array('id'=>$id),$orderby=array());
            if(isset($video->video)){
                unlink('./upload/video/'.$video->video);    
            }
            
            $data=new stdClass();
            if($this->video_model->delete_record('video',array("id"=>$id))){
                $data->error=0;
                $data->success=1;
                $data->message="Video Deleted Successfully";
            }else{
                $data->error=1;
                $data->success=0;
                $data->message="Network Error";
            }
            $this->session->set_flashdata('item',$data);
            redirect('video');
        }
        
        public function reorder(){
            
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
                foreach($_POST['page'] as $key => $value){
                    $udata['order_id'] = $key;                        
                    $this->video_model->UpdateRecord('video',$udata,array("id"=>$value));
                }
                              
                    $data->error=0;
                    $data->success=1;
                    $data->message="Video Reordered Successfully";
               
               $this->session->set_flashdata('item',$data);
               redirect('video/reorder');
            }
            
            $data->results = $this->video_model->SelectRecord('video','*',array("user_id"=>$this->session->userdata('user_id')),'order_id asc');
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->video_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            $data->title = 'Reorder Video';
            $data->field = 'Reorder Video';
            $data->page = 'reorder_video';
            $this->load->view('user/includes/header',$data);		
            $this->load->view('reorder_video_view',$data);
            $this->load->view('user/includes/footer',$data);                                        
        }
			
	
}
?>