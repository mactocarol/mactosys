<?php	
if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	
    function phpmailer($to,$sub,$msg){        
        require("./PHPMailer/class.phpmailer.php");

            $email = 'mss.parvezkhan@gmail.com';
            $password = 'mact@123';
            $to_id = $to;
            $message = $msg;
            $subject = $sub;
            $mail = new PHPMailer;
            $mail->isSMTP();
            //$mail->SMTPDebug = 2;
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            $mail->From = "mss.parvezkhan@gmail.com";
            $mail->FromName = "allAboutTheMusic";
            $mail->SMTPAuth = true;
            $mail->Username = $email;
            $mail->Password = $password;
            $mail->addAddress($to_id);
            $mail->Subject = $subject;
            $mail->msgHTML($message);
            $mail->send();
    }
            
    
    function get_user($userid){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('id'=>$userid));
            $query = $CI->db->get('users');            
            $reslt = $query->row();
            //print_r($userid); die;
            return $reslt;
    }
    
    function get_product($pid){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('id'=>$pid));
            $query = $CI->db->get('products');            
            $reslt = $query->row();
            //print_r($userid); die;
            return $reslt;
    }
    
    function get_wallet($userid){        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('user_id'=>$userid));            
            $query = $CI->db->get('wallet');            
            $reslt = $query->row();
            //print_r($userid); die;
            return $reslt;
    }
	
	function get_all_jobs(){        
            $CI =& get_instance();
            $CI->db->select('*');                       
            $query = $CI->db->get('jobs');            
            $reslt = $query->result();            
            return $reslt;
    }
	
	function get_all_videos(){        
            $CI =& get_instance();
            $CI->db->select('*');                       
			$CI->db->where(array('file_type'=>1));            
            $query = $CI->db->get('products');            
            $reslt = $query->result();            
            return $reslt;
    }
	function get_all_audios(){        
            $CI =& get_instance();
            $CI->db->select('*');                       
			$CI->db->where(array('file_type'=>2));            
            $query = $CI->db->get('products');            
            $reslt = $query->result();            
            return $reslt;
    }
	function get_all_pictures(){        
            $CI =& get_instance();
            $CI->db->select('*');                       
			$CI->db->where(array('file_type'=>3));            
            $query = $CI->db->get('products');            
            $reslt = $query->result();            
            return $reslt;
    }
	function get_all_orders(){        
            $CI =& get_instance();
            $CI->db->select('*');                       			           
            $query = $CI->db->get('order');            
            $reslt = $query->result();            
            return $reslt;
    }
	function get_total_transactions(){        
            $CI =& get_instance();
            $CI->db->select_sum('payment_amt');                       			          
            $query = $CI->db->get('transactions');            
            $reslt = $query->row();            
            return $reslt;
    }
    
    function get_packages(){        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('id !='=>1));      
            $query = $CI->db->get('membership_plan');            
            $reslt = $query->result();
            //print_r($reslt); die;
            return $reslt;
    }
    
    function get_charge_amount($userid){        
            
            return 5;
    }
    
    function deduct_wallet($userid,$amount){                        
            $wallet = get_wallet($userid);
            //echo $userid; die;
            $data['amount'] = ($wallet->amount - $amount );
            $CI =& get_instance();            
            $CI->db->where(array('user_id'=>$userid));            
            $reslt = $CI->db->update('wallet',$data);                                    
            
            return $reslt;
    }
    
    function added_wallet($userid,$amount){
        
            $wallet = get_wallet($userid);
            //echo $userid; die;
            $data['amount'] = ($wallet->amount + $amount );
            $CI =& get_instance();            
            $CI->db->where(array('user_id'=>$userid));            
            $reslt = $CI->db->update('wallet',$data);                                    
            
            return $reslt;
    }
    
    function get_category($catid){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('id'=>$catid));
            $query = $CI->db->get('category');            
            $reslt = $query->row();
            //print_r($userid); die;
            return $reslt;
    }
    
    function get_job_type($type){
        
            if($type == 1) return "Full Time";
            else if($type == 2) return "Part Time";
            else if($type == 3) return "Hourly Time";
            else if($type == 4) return "Freelancer";
            else return 'N/A';
    }
    
    function get_time_ago( $time )
    {
        $time_difference = time() - $time;
    
        if( $time_difference < 1 ) { return 'less than 1 second ago'; }
        $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                    30 * 24 * 60 * 60       =>  'month',
                    24 * 60 * 60            =>  'day',
                    60 * 60                 =>  'hour',
                    60                      =>  'minute',
                    1                       =>  'second'
        );
    
        foreach( $condition as $secs => $str )
        {
            $d = $time_difference / $secs;
    
            if( $d >= 1 )
            {
                $t = round( $d );
                return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
            }
        }
    }
    
    function get_genre($id){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('id'=>$id));
            $query = $CI->db->get('genre');            
            $reslt = $query->row();
            //print_r($userid); die;
            return $reslt;
    }
    
    function get_follow_list($artist_id){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('artist_id'=>$artist_id));
            $query = $CI->db->get('follow');            
            $reslt = $query->result();
            //print_r($userid); die;
            return $reslt;
    }
    
    function get_cool_list($artist_id){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('artist_id'=>$artist_id));
            $query = $CI->db->get('cool');            
            $reslt = $query->result();
            //print_r($userid); die;
            return $reslt;
    }
    
    function get_cool_product_list($product_id){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('product_id'=>$product_id));
            $query = $CI->db->get('cool_products');            
            $reslt = $query->result();
            //print_r($userid); die;
            return $reslt;
    }
    
    function get_likes_list($product_id){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('product_id'=>$product_id));
            $query = $CI->db->get('likes');            
            $reslt = $query->result();
            //print_r($userid); die;
            return $reslt;
    }
    
    function get_cool_album_list($product_id){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('product_id'=>$product_id));
            $query = $CI->db->get('cool_album');            
            $reslt = $query->result();
            //print_r($userid); die;
            return $reslt;
    }
    
    function get_likes_album_list($product_id){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('product_id'=>$product_id));
            $query = $CI->db->get('likes_album');            
            $reslt = $query->result();
            //print_r($userid); die;
            return $reslt;
    }
    
    function get_comments_list($product_id){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('product_id'=>$product_id));
            $query = $CI->db->get('product_comments');            
            $reslt = $query->result();
            //print_r($this->db->last_query()); die;
            return $reslt;
    }
    
    function get_album_comments_list($product_id){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('product_id'=>$product_id));
            $query = $CI->db->get('album_comments');            
            $reslt = $query->result();
            //print_r($this->db->last_query()); die;
            return $reslt;
    }
    
    function get_product_rating($product_id){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('product_id'=>$product_id));
            $query = $CI->db->get('product_rating');            
            $reslt = $query->result();
            //print_r($reslt); die;
            $rating = 0;
            foreach($reslt as $row){
                $rating += $row->rating;
            }
            $final_rating = $rating/count($reslt);
            //print_r($final_rating); die;
            return round($final_rating);
    }
    
    function get_job_rating($job_id){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('job_id'=>$job_id));
            $query = $CI->db->get('job_rating');            
            $reslt = $query->result();
            //print_r($reslt); die;
            $rating = 0;
            foreach($reslt as $row){
                $rating += $row->rating;
            }
            $final_rating = $rating/count($reslt);
            //print_r($final_rating); die;
            return round($final_rating);
    }
    
    function get_cards($user_id){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('user_id'=>$user_id));
            $query = $CI->db->get('cards');            
            $reslt = $query->result();
            //print_r($reslt); die;
            $bronze = 0; $silver = 0; $gold = 0;
            foreach($reslt as $row){
                if($row->card_type == 1){
                    $bronze++;    
                }
                if($row->card_type == 2){
                    $silver++;    
                }
                if($row->card_type == 3){
                    $gold++;    
                }
            }
            $cards = array($bronze,$silver,$gold);
            //print_r($final_rating); die;
            return $cards;
    }
    
    function get_follower_list($user_id){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('artist_id'=>$user_id));
            $query = $CI->db->get('follow');            
            $reslt = $query->result();
            //print_r($this->db->last_query()); die;
            return $reslt;
    }
    
    function get_following_list($user_id){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('follower_id'=>$user_id));
            $query = $CI->db->get('follow');            
            $reslt = $query->result();
            //print_r($this->db->last_query()); die;
            return $reslt;
    }
    
    function get_favorite_products($user_id){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('follower_id'=>$user_id));
            $query = $CI->db->get('likes');            
            $reslt = $query->result();
            //print_r($this->db->last_query()); die;
            $images = ''; $audio = ''; $video = ''; $album = '';
            foreach($reslt as $row){
                
                $CI->db->select('*');
                $CI->db->where(array('id'=>$row->product_id));
                $query = $CI->db->get('products');            
                $rslt = $query->row();
                
                if($rslt->file_type == 1){
                    $video[] = ["thumb"=>$rslt->thumb,"file"=>$rslt->file,"id"=>$rslt->id,"title"=>$rslt->title];    
                }
                if($rslt->file_type == 2){
                    $audio[] = ["thumb"=>$rslt->thumb,"file"=>$rslt->file,"id"=>$rslt->id,"title"=>$rslt->title];    
                }
                if($rslt->file_type == 3){
                    $images[] = ["thumb"=>$rslt->thumb,"file"=>$rslt->file,"id"=>$rslt->id,"title"=>$rslt->title];    
                }
            }
            return array($video,$audio,$images);
    }
    
    function get_favorite_album($user_id){        
            $CI =& get_instance();
            $CI->db->select('a.*');
            $CI->db->from('likes_album as la');
            $CI->db->join('album as a', 'la.product_id = a.id' ,'left');
            $CI->db->where(array('la.follower_id'=>$user_id));
            $query = $CI->db->get();            
            $reslt = $query->result();
            //print_r($reslt); die;            
            return $reslt;
    }
    
    function get_favorite_jobs($user_id){
        
            $CI =& get_instance();
            $CI->db->select('j.*');
            $CI->db->from('likes_job as lj');
            $CI->db->join('jobs as j', 'lj.job_id = j.id' ,'left');
            $CI->db->where(array('lj.follower_id'=>$user_id));
            $query = $CI->db->get();            
            $reslt = $query->result();
            
            return $reslt;
    }
    
    function get_membership($user_id){
        
            $CI =& get_instance();
            $CI->db->select('mp.*');
            $CI->db->from('membership as m');
            $CI->db->join('membership_plan as mp', 'm.plan_id = mp.id' ,'left');
            $CI->db->where(array('m.user_id'=>$user_id));
            $query = $CI->db->get();            
            $reslt = $query->row();
            
            return $reslt;
    }
    
    function get_order_detail($order_id){
        
            $CI =& get_instance();
            $CI->db->select('p.*');
            $CI->db->from('order_detail as od');
            $CI->db->join('products as p', 'od.product_id = p.id' ,'left');
            $CI->db->where(array('od.order_id'=>$order_id));
            $CI->db->where(array('od.product_id !='=>0));
            $query = $CI->db->get();            
            $reslt = $query->result();
            
            return $reslt;
    }
    
    function get_offer_money($offer_id){
        
            $CI =& get_instance();
            $CI->db->select('od.amount');
            $CI->db->from('order_detail as od');
            $CI->db->join('order as o', 'od.order_id = o.order_no' ,'left');
            $CI->db->where(array('od.offer_id'=>$offer_id,'o.payment_status'=>2));
            $query = $CI->db->get();            
            $reslt = $query->result();
            $total = 0;
            foreach($reslt as $r){
                $total += $r->amount;
            }
            //print_r($reslt); die;
            return $total;
    }
        
?>