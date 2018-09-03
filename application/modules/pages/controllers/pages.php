<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends HT_Controller 
{
	//private $connection;
        public function __construct(){            
            parent::__construct();
            $this->load->model('pages_model');           
        }                                                                        
        
        public function about_us(){
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
            }
            $data=new stdClass();
			
            //print_r($result); die;
			if($_POST){                                   
                        $udata=array(
                            'description'=>$this->input->post('desc')                            
                        );
                        $this->pages_model->UpdateRecord('pages',$udata,array("title"=>"about-us"));                                       
				
                    $data->error=0;
                    $data->success=1;
                    $data->message='Updated Sucessfully.';
                     									
                //print_r($data); die;
            $this->session->set_flashdata('item',$data);
            redirect('pages/about_us/');
			//print_r($this->session->flashdata('item')); die;	
			}
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->pages_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
                        
            $data->reslt = $this->pages_model->SelectSingleRecord('pages','*',array("title"=>"about-us"),$orderby=array());
            //echo "<pre>"; print_r($data->reslt); die;
            $data->title = 'Set About us Page';
            $data->field = 'About us';
            $data->page = 'about_us';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('about_us_view',$data);
            $this->load->view('admin/includes/footer',$data);			
		}
        
        public function contact_us(){
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
            }
            $data=new stdClass();
			
            //print_r($result); die;
			if($_POST){                
                        $udata=array(
                            'description'=>$this->input->post('desc'),
                            'email'=>$this->input->post('email'),
                            'phone'=>$this->input->post('phone')
                        );
                        $this->pages_model->UpdateRecord('pages',$udata,array("title"=>"contact-us"));                    
				
                    $data->error=0;
                    $data->success=1;
                    $data->message='Updated Sucessfully.';
                     									
                //print_r($data); die;
            $this->session->set_flashdata('item',$data);
            redirect('pages/contact_us/');
			//print_r($this->session->flashdata('item')); die;	
			}
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->pages_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
                        
            $data->reslt = $this->pages_model->SelectSingleRecord('pages','*',array("title"=>"contact-us"),$orderby=array());
            //echo "<pre>"; print_r($data->reslt); die;
            $data->title = 'Set Contact us Page';
            $data->field = 'Contact us';
            $data->page = 'contact_us';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('contact_us_view',$data);
            $this->load->view('admin/includes/footer',$data);			
		}
        
        public function terms_and_conditions(){
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
            }
            $data=new stdClass();
			
            //print_r($result); die;
			if($_POST){                                   
                        $udata=array(
                            'description'=>$this->input->post('desc')                            
                        );
                        $this->pages_model->UpdateRecord('pages',$udata,array("title"=>"terms"));                                       
				
                    $data->error=0;
                    $data->success=1;
                    $data->message='Updated Sucessfully.';
                     									
                //print_r($data); die;
            $this->session->set_flashdata('item',$data);
            redirect('pages/terms_and_conditions/');
			//print_r($this->session->flashdata('item')); die;	
			}
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->pages_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
                        
            $data->reslt = $this->pages_model->SelectSingleRecord('pages','*',array("title"=>"terms"),$orderby=array());
            //echo "<pre>"; print_r($data->reslt); die;
            $data->title = 'Set Terms & Conditions';
            $data->field = 'terms & conditions';
            $data->page = 'terms & conditions';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('terms_view',$data);
            $this->load->view('admin/includes/footer',$data);			
		}
        
        
        public function faq(){
            if($this->session->userdata('user_group_id') != 1){
                redirect('admin');
            }
            if(!$this->session->userdata('logged_in')){
                redirect('admin');
            }
            $data=new stdClass();
			
            //print_r($result); die;
			if($_POST){                
                        $udata=array(
                            'description'=>$this->input->post('question'),
                            'email'=>$this->input->post('answer')                            
                        );
                        $this->pages_model->UpdateRecord('pages',$udata,array("id"=>$this->input->post('id')));                    
				
                    $data->error=0;
                    $data->success=1;
                    $data->message='Updated Sucessfully.';
                     									
                //print_r($data); die;
            $this->session->set_flashdata('item',$data);
            redirect('pages/faq/');
			//print_r($this->session->flashdata('item')); die;	
			}
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->pages_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
                        
            $data->reslt = $this->pages_model->SelectRecord('pages','*',array("title"=>"faq"),$orderby=array());
            //echo "<pre>"; print_r($data->reslt); die;
            $data->title = 'Set Faq Page';
            $data->field = 'faq';
            $data->page = 'faq';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('faq_view',$data);
            $this->load->view('admin/includes/footer',$data);			
		}
        
        public function addfaq(){
            
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
               $udata['title'] = 'faq'; 
               $udata['question'] = $this->input->post('question');
               $udata['answer'] = $this->input->post('answer');               
               if($this->pages_model->InsertRecord('pages',$udata)){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Question Added Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('pages/faq');
            }
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->pages_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'add question';
            $data->field = 'faq';
            $data->page = 'faq';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('addfaq_view',$data);
            $this->load->view('admin/includes/footer',$data);                                        
        }
        
        public function updatefaq($id){
            
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
               $udata['question'] = $this->input->post('question');
               $udata['answer'] = $this->input->post('answer'); 
               if($this->pages_model->UpdateRecord('pages',$udata,array("id"=>$id))){
                    $data->error=0;
                    $data->success=1;
                    $data->message="Question Updated Successfully";
               }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message="Network Error";
               }
               $this->session->set_flashdata('item',$data);
               redirect('pages/updatefaq/'.$id);
            }
            
            $data->reslt = $this->pages_model->SelectSingleRecord('pages','*',array('id'=>$id),$orderby=array());
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->pages_model->SelectSingleRecord('admin','*',$udata,$orderby=array());
            $data->title = 'update question';
            $data->field = 'faq';
            $data->page = 'faq';
            $this->load->view('admin/includes/header',$data);		
            $this->load->view('updatefaq_view',$data);
            $this->load->view('admin/includes/footer',$data);                                        
        }                        
        
        public function deletefaq($id){
            $data=new stdClass();
            if($this->pages_model->delete_record('pages',array("id"=>$id))){
                $data->error=0;
                $data->success=1;
                $data->message="Question Deleted Successfully";
            }else{
                $data->error=1;
                $data->success=0;
                $data->message="Network Error";
            }
            $this->session->set_flashdata('item',$data);
            redirect('pages/faq');
        }
                
}
?>