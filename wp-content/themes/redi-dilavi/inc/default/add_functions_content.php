<?php
//begin show_weekday
add_action( 'wp_ajax_show_weekday', 'func_ajax_show_weekday' );
add_action( 'wp_ajax_nopriv_show_weekday', 'func_ajax_show_weekday' );
function func_ajax_show_weekday(){
	$checked=1;
	$msg=array();        
	$data=array();   
	$year=trim($_POST["year"]);
	$month=trim($_POST["month"]);
	$day=trim($_POST["day"]);
	$date=$year."-".$month."-".$day;
	$arr_date=date_parse_from_format('Y-m-d',$date) ;
	$ts		= mktime($arr_date['hour'], $arr_date['minute'], $arr_date['second'], $arr_date['month'], $arr_date['day'], $arr_date['year']);		
	$weekday_en=date('l', $ts);
	$arr_en	= array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
	$arr_vi	= array('Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy', 'Chủ nhật');
	$weekday_vi	= str_replace($arr_en, $arr_vi, $weekday_en);
	$result=array(
					"weekday_vi"=>$weekday_vi,
					"weekday_en"=>$weekday_en					
				);
	echo json_encode($result);	
	die();
}
//end show_weekday
//begin show_number_of_person
add_action( 'wp_ajax_show_number_of_person', 'func_ajax_show_number_of_person' );
add_action( 'wp_ajax_nopriv_show_number_of_person', 'func_ajax_show_number_of_person' );
function func_ajax_show_number_of_person(){
	$checked=1;
	$msg=array();        
	$data=array();   
	$k=0;    
	$number_customer_id = (int)$_POST['number_customer_id'];
	$term= get_term_by( 'id', $number_customer_id, 'za_booking_number_customer');
	$result=array("number_person"=>$term->name);
	echo json_encode($result);	
	die();
}
//end show_number_of_person
// begin insert booking
add_action( 'wp_ajax_booking_now_hp', 'func_ajax_booking_now_hp' );
add_action( 'wp_ajax_nopriv_booking_now_hp', 'func_ajax_booking_now_hp' );
function func_ajax_booking_now_hp(){	

	$checked=1;
	$msg=array();        
	$data=array();   
	$k=0;    

	$customer_checkin_date = trim( $_POST['customer_checkin_date'] );
	$customer_checkout_date = trim( $_POST['customer_checkout_date'] );
	$acf_pr = trim( $_POST['acf_pr'] );	


	$checkin_date=$customer_checkin_date;
	$checkout_date=$customer_checkout_date;

	if(empty($customer_checkin_date)){		
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Please choose checkin date';  
		}else{
			$msg[$k] = 'Vui lòng chọn ngày đặt phòng';    
		}			
		$data["customer_checkin_date"]='';        
		$checked = 0;
		$k++;
	}else{
		if(strcmp($acf_pr, "_en") ==0 ){
			$arrDate    = date_parse_from_format('m/d/Y', $customer_checkin_date) ;
			$ts         = mktime($arrDate["hour"],$arrDate["minute"],$arrDate["second"],$arrDate['month'],$arrDate['day'],$arrDate['year']);
			$checkin_date     = date('d/m/Y', $ts);
		}
		if(!empty($customer_checkout_date)){
			if(strcmp($acf_pr, "_en") ==0 ){				
				$arrDate    = date_parse_from_format('m/d/Y', $customer_checkout_date) ;
				$ts         = mktime($arrDate["hour"],$arrDate["minute"],$arrDate["second"],$arrDate['month'],$arrDate['day'],$arrDate['year']);
				$checkout_date     = date('d/m/Y', $ts);
			}
			$arr_checkin_date    = date_parse_from_format('d/m/Y', $checkin_date) ;
			$arr_checkout_date    = date_parse_from_format('d/m/Y', $checkout_date) ;
			$ts_checkin_date         = mktime($arr_checkin_date["hour"],$arr_checkin_date["minute"],$arr_checkin_date["second"],$arr_checkin_date['month'],$arr_checkin_date['day'],$arr_checkin_date['year']);
			$ts_checkout_date         = mktime($arr_checkout_date["hour"],$arr_checkout_date["minute"],$arr_checkout_date["second"],$arr_checkout_date['month'],$arr_checkout_date['day'],$arr_checkout_date['year']);
			if($ts_checkin_date > $ts_checkout_date){
				if(strcmp($acf_pr, '_en') == 0){
					$msg[$k]='Please choose checkout date than checkin date';  
				}else{
					$msg[$k] = 'Vui lòng chọn ngày trả phòng lớn hơn ngày đặt phòng';   
				}			
				$data["customer_checkout_date"]='';        
				$data["customer_checkin_date"]='';        
				$checked = 0;
				$k++;
			}
		}
	}


	if($checked==1){		
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Save successfully';  
		}else{
			$msg[$k]='Gửi thông tin thành công';  
		}		
	}
	$result=array(
		"checked"       => 	$checked,       
		"msg"			=>	$msg,
		"dulieu"		=>	$data,		
	);
	echo json_encode($result);	
	die();
}
// end insert booking
// begin insert booking
add_action( 'wp_ajax_insert_booking', 'func_ajax_insert_booking' );
add_action( 'wp_ajax_nopriv_insert_booking', 'func_ajax_insert_booking' );
function func_ajax_insert_booking(){	

	$checked=1;
	$msg=array();        
	$data=array();   
	$k=0;    

	$customer_name = trim( $_POST['customer_name'] );	
	$customer_phone = trim( $_POST['customer_phone'] );
	$customer_email = trim( $_POST['customer_email'] );
	$branch_id = (int)$_POST['branch_id'];
	$customer_checkin_date = trim( $_POST['customer_checkin_date'] );
	$customer_checkout_date = trim( $_POST['customer_checkout_date'] );
	$number_customer_id = (int)$_POST['number_customer_id'];
	$acf_pr = trim( $_POST['acf_pr'] );	

	if(mb_strlen($customer_name) < 5){		
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Fullname must have at least 5 characters';  
		}else{
			$msg[$k] = 'Họ tên phải từ 5 ký tự trở lên'; 
		}	   
		$data["customer_name"]='';        
		$checked = 0;
		$k++;
	}

	if(mb_strlen($customer_phone) < 10){
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Phone must have at least 10 characters';  
		}else{
			$msg[$k] = 'Điện thoại phải từ 10 ký tự trở lên'; 
		}		  
		$data["customer_phone"]='';        
		$checked = 0;
		$k++;
	}
	
	if(!preg_match("#^[a-z][a-z0-9_\.]{4,31}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$#", mb_strtolower($customer_email,'UTF-8')   )){
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Email is invalid';  
		}else{
			$msg[$k] = 'Email không hợp lệ'; 
		}			
		$data["customer_email"]='';           
		$checked = 0;
		$k++;
	}

	if((int)@$branch_id == 0){
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Please choose branch';  
		}else{
			$msg[$k] = 'Xin vui lòng chọn chi nhánh'; 
		}			
		$data["branch_id"]='';           
		$checked = 0;
		$k++;
	}

	$checkin_date=$customer_checkin_date;
	$checkout_date=$customer_checkout_date;

	if(empty($customer_checkin_date)){		
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Please choose checkin date';  
		}else{
			$msg[$k] = 'Vui lòng chọn ngày đặt phòng';    
		}			
		$data["customer_checkin_date"]='';        
		$checked = 0;
		$k++;
	}else{
		if(strcmp($acf_pr, "_en") ==0 ){
			$arrDate    = date_parse_from_format('m/d/Y', $customer_checkin_date) ;
			$ts         = mktime($arrDate["hour"],$arrDate["minute"],$arrDate["second"],$arrDate['month'],$arrDate['day'],$arrDate['year']);
			$checkin_date     = date('d/m/Y', $ts);
		}
		if(!empty($customer_checkout_date)){
			if(strcmp($acf_pr, "_en") ==0 ){				
				$arrDate    = date_parse_from_format('m/d/Y', $customer_checkout_date) ;
				$ts         = mktime($arrDate["hour"],$arrDate["minute"],$arrDate["second"],$arrDate['month'],$arrDate['day'],$arrDate['year']);
				$checkout_date     = date('d/m/Y', $ts);
			}
			$arr_checkin_date    = date_parse_from_format('d/m/Y', $checkin_date) ;
			$arr_checkout_date    = date_parse_from_format('d/m/Y', $checkout_date) ;
			$ts_checkin_date         = mktime($arr_checkin_date["hour"],$arr_checkin_date["minute"],$arr_checkin_date["second"],$arr_checkin_date['month'],$arr_checkin_date['day'],$arr_checkin_date['year']);
			$ts_checkout_date         = mktime($arr_checkout_date["hour"],$arr_checkout_date["minute"],$arr_checkout_date["second"],$arr_checkout_date['month'],$arr_checkout_date['day'],$arr_checkout_date['year']);
			if($ts_checkin_date > $ts_checkout_date){
				if(strcmp($acf_pr, '_en') == 0){
					$msg[$k]='Please choose checkout date than checkin date';  
				}else{
					$msg[$k] = 'Vui lòng chọn ngày trả phòng lớn hơn ngày đặt phòng';   
				}			
				$data["customer_checkout_date"]='';        
				$data["customer_checkin_date"]='';        
				$checked = 0;
				$k++;
			}
		}
	}

	

	if((int)@$number_customer_id == 0){
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Please choose number of person';  
		}else{
			$msg["number_customer_id"] = 'Xin vui lòng chọn số lượng người'; 
		}			
		$data["number_customer_id"]='';           
		$checked = 0;
		$k++;
	}

	if($checked==1){
		$date_submit=getDateTime(date("Y-m-d H:i:s"));	
		$post_title = "Khách hàng ".$customer_name." đặt phòng ngày ".$date_submit;
		$post_name = p_clear_slug( $post_title );
		$term_branch =get_term_by( 'id',$branch_id,'za_booking_branch');
		$term_number_customer =get_term_by( 'id',$number_customer_id,'za_booking_number_customer');
		
		$insert = array(
			'post_type' => 'zabooking',
			'post_title' => $post_title ,
			'post_name' =>  $post_name  ,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_content' => '',
		);
		$post_id = wp_insert_post($insert);
		update_post_meta( $post_id, 'op_booking_name', $customer_name );
		update_post_meta( $post_id, 'op_booking_phone', $customer_phone );
		update_post_meta( $post_id, 'op_booking_email', $customer_email );
		update_post_meta( $post_id, 'op_booking_checkin_date', $checkin_date );
		update_post_meta( $post_id, 'op_booking_checkout_date', $checkout_date );    
		wp_set_post_terms( $post_id, $branch_id, 'za_booking_branch');
		wp_set_post_terms( $post_id, $number_customer_id, 'za_booking_number_customer' );
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Save successfully';  
		}else{
			$msg[$k]='Gửi thông tin thành công';  
		}		
	}
	$result=array(
		"checked"       => 	$checked,       
		"msg"			=>	$msg,
		"dulieu"		=>	$data,		
	);
	echo json_encode($result);	
	die();
}
// end insert booking
// start insert contact
add_action( 'wp_ajax_insert_contact', 'func_ajax_insert_contact' );
add_action( 'wp_ajax_nopriv_insert_contact', 'func_ajax_insert_contact' );
function func_ajax_insert_contact(){	

	$checked=1;
	$msg=array();        
	$data=array();   
	$k=0;    

	$fullname = trim( $_POST['fullname'] );	
	$phone = trim( $_POST['phone'] );
	$email = trim( $_POST['email'] );	
	$title = trim( $_POST['title'] );
	$message = trim( $_POST['message'] );	
	$acf_pr = trim( $_POST['acf_pr'] );	

	if(mb_strlen($fullname) < 5){		
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Fullname must have at least 5 characters';  
		}else{
			$msg[$k] = 'Họ tên phải từ 5 ký tự trở lên'; 
		}	   
		$data["fullname"]='';        
		$checked = 0;
		$k++;
	}

	if(mb_strlen($phone) < 10){
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Phone must have at least 10 characters';  
		}else{
			$msg[$k] = 'Điện thoại phải từ 10 ký tự trở lên'; 
		}		  
		$data["phone"]='';        
		$checked = 0;
		$k++;
	}
	
	if(!preg_match("#^[a-z][a-z0-9_\.]{4,31}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$#", mb_strtolower($email,'UTF-8')   )){
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Email is invalid';  
		}else{
			$msg[$k] = 'Email không hợp lệ'; 
		}			
		$data["email"]='';           
		$checked = 0;
		$k++;
	}

	if(mb_strlen($title) < 5){		
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Title must have at least 5 characters';  
		}else{
			$msg[$k] = 'Tiêu đề phải từ 5 ký tự trở lên'; 
		}	   
		$data["title"]='';        
		$checked = 0;
		$k++;
	}

	if(mb_strlen($message) < 5){		
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Message must have at least 5 characters';  
		}else{
			$msg[$k] = 'Nội dung liên hệ phải từ 5 ký tự trở lên'; 
		}	   
		$data["message"]='';        
		$checked = 0;
		$k++;
	}


	if($checked==1){
		$date_submit=datetimeConverter(date("Y-m-d"),"d/m/Y");	
		$post_title = "Thông tin liên hệ từ ".$fullname." ngày ".$date_submit;
		$post_name = p_clear_slug( $post_title );
		
		
		$insert = array(
			'post_type' => 'zacontact',
			'post_title' => $post_title ,
			'post_name' =>  $post_name  ,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_content' => '',
		);
		$post_id = wp_insert_post($insert);
		update_post_meta( $post_id, 'op_contacted_name', $fullname);
		update_post_meta( $post_id, 'op_contacted_phone', $phone );
		update_post_meta( $post_id, 'op_contacted_email', $email );
		update_post_meta( $post_id, 'op_contacted_title', $title );
		update_post_meta( $post_id, 'op_contacted_message', $message );    
		
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Save successfully';  
		}else{
			$msg[$k]='Gửi thông tin thành công';  
		}		
	}
	$result=array(
		"checked"       => 	$checked,       
		"msg"			=>	$msg,
		"dulieu"		=>	$data,		
	);
	echo json_encode($result);	
	die();
}
// end insert contact