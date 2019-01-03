function setNumberPersonMobile(ctrl){
	var number_person_id=jQuery(ctrl).val();
	var data_item={
		"action"    : "show_number_of_person",		
		"number_customer_id"     : number_person_id		
	}	
	jQuery.ajax({
		url         : ajaxurl,
		type        : "POST",
		data 		: data_item,
		dataType 	: "json", 		
		success     : function(data, status, jsXHR){				
			jQuery('.number_of_person_txt').text(data.number_person);
		},
		beforeSend  : function(jqXHR,setting){
			
		},
	});
}
function setNumberPerson(ctrl){
	var number_person_id=jQuery(ctrl).val();
	var data_item={
		"action"    : "show_number_of_person",		
		"number_customer_id"     : number_person_id		
	}	
	jQuery.ajax({
		url         : ajaxurl,
		type        : "POST",
		data 		: data_item,
		dataType 	: "json", 		
		success     : function(data, status, jsXHR){				
			jQuery('.number_of_person_txt').text(data.number_person);
		},
		beforeSend  : function(jqXHR,setting){
			
		},
	});
}
function bookNowHomepage() {
	var p_checkin_date=jQuery('input[name="p_checkin_date"]').val();
	var p_checkout_date=jQuery('input[name="p_checkout_date"]').val();	
	var number_person_id=jQuery('select[name="number_person_id"]').val();
	var p_link=jQuery('input[name="p_link"]').val();		
	var obj = {
					checkin_date: p_checkin_date,
					checkout_date: p_checkout_date,
					number_person_id:number_person_id
			}		
	var str = jQuery.param(obj);
	var url = p_link+"?"+ str;
	window.location.href = url;                   
}
function bookNowHomepageMobile() {
	var p_checkin_date=jQuery('input[name="mb_checkin_date"]').val();
	var p_checkout_date=jQuery('input[name="mb_checkout_date"]').val();	
	var number_person_id=jQuery('select[name="mb_number_person_id"]').val();	
	var p_link=jQuery('input[name="mb_p_link"]').val();		
	var acf_pr=jQuery('input[name="mb_acf_pr"]').val();	
	var data_item={
		"action"    : "booking_now_hp",
		"customer_checkin_date"     : p_checkin_date,                    
		"customer_checkout_date"     : p_checkout_date,           
		"acf_pr" : acf_pr
	}	
	jQuery.ajax({
		url         : ajaxurl,
		type        : "POST",
		data 		: data_item,
		dataType 	: "json", 		
		success     : function(data, status, jsXHR){	
			console.log(data);			
			jQuery('.note').empty();
			jQuery('.note').removeClass('note-success');
			jQuery('.note').removeClass('note-danger');
			if(parseInt(data.checked)  == 1){
				jQuery('form[name="frm_booking_hp_mobile"]').find('input').val('');
				jQuery('form[name="frm_booking_hp_mobile"]').find('textarea').val('');
				jQuery('.note').addClass('note-success');				
			}else{
				jQuery('.note').addClass('note-danger');
			}	
			var data_msg=data.msg;			
			jQuery.each(data_msg,function(index,val){
				jQuery('.note').append('<div>'+val+'</div>');				
			});			
			setTimeout(function(){ jQuery('.note').fadeOut(); }, 60000);			
			jQuery('.note').fadeIn();			
			jQuery('.ajax_loader_contact').hide();
			if(data.checked==1){
				var obj = {
					checkin_date: p_checkin_date,
					checkout_date: p_checkout_date,
					number_person_id:number_person_id
				}		
				var str = jQuery.param(obj);
				var url = p_link+"?"+ str;
				window.location.href = url;  
			}			
		},
		beforeSend  : function(jqXHR,setting){
			jQuery('.ajax_loader_contact').show();
		},
	});                  
}
function bookNow() {
	var customer_name=jQuery('input[name="customer_name"]').val();
	var customer_phone=jQuery('input[name="customer_phone"]').val();
	var customer_email=jQuery('input[name="customer_email"]').val();
	var branch_id=jQuery('select[name="branch_id"]').val();
	var customer_checkin_date=jQuery('input[name="customer_checkin_date"]').val();
	var customer_checkout_date=jQuery('input[name="customer_checkout_date"]').val();
	var number_customer_id=jQuery('select[name="number_customer_id"]').val();	
	var acf_pr=jQuery('input[name="acf_pr"]').val();	
	var data_item={
		"action"    : "insert_booking",
		"customer_name"     : customer_name,                    
		"customer_phone"     : customer_phone,                    
		"customer_email"     : customer_email,                    
		"branch_id"     : branch_id,                    
		"customer_checkin_date"     : customer_checkin_date,                    
		"customer_checkout_date"     : customer_checkout_date,                    
		"number_customer_id"     : number_customer_id,                    		
		"acf_pr" : acf_pr
	}	
	jQuery.ajax({
		url         : ajaxurl,
		type        : "POST",
		data 		: data_item,
		dataType 	: "json", 		
		success     : function(data, status, jsXHR){				
			jQuery('.note').empty();
			jQuery('.note').removeClass('note-success');
			jQuery('.note').removeClass('note-danger');
			if(parseInt(data.checked)  == 1){
				jQuery('form[name="frm_booking"]').find('input').val('');
				jQuery('form[name="frm_booking"]').find('select').val(0);
				jQuery('.note').addClass('note-success');				
			}else{
				jQuery('.note').addClass('note-danger');
			}	
			var data_msg=data.msg;			
			jQuery.each(data_msg,function(index,val){
				jQuery('.note').append('<div>'+val+'</div>');				
			});			
			setTimeout(function(){ jQuery('.note').fadeOut(); }, 60000);			
			jQuery('.note').fadeIn();			
			jQuery('.ajax_loader').hide();
		},
		beforeSend  : function(jqXHR,setting){
			jQuery('.ajax_loader').show();
		},
	});
}


function contactNow() {
	var fullname=jQuery('input[name="fullname"]').val();
	var phone=jQuery('input[name="phone"]').val();
	var email=jQuery('input[name="email"]').val();	
	var title=jQuery('input[name="title"]').val();
	var message=jQuery('textarea[name="message"]').val();	
	var acf_pr=jQuery('input[name="acf_pr"]').val();	
	var data_item={
		"action"    : "insert_contact",
		"fullname"     : fullname,                    
		"phone"     : phone,                    
		"email"     : email,                    
		"title"     : title,                    
		"message"     : message,                    		  
		"acf_pr" : acf_pr
	}	
	jQuery.ajax({
		url         : ajaxurl,
		type        : "POST",
		data 		: data_item,
		dataType 	: "json", 		
		success     : function(data, status, jsXHR){				
			jQuery('.note').empty();
			jQuery('.note').removeClass('note-success');
			jQuery('.note').removeClass('note-danger');
			if(parseInt(data.checked)  == 1){
				jQuery('form[name="frm_contact"]').find('input').val('');
				jQuery('form[name="frm_contact"]').find('textarea').val('');
				jQuery('.note').addClass('note-success');				
			}else{
				jQuery('.note').addClass('note-danger');
			}	
			var data_msg=data.msg;			
			jQuery.each(data_msg,function(index,val){
				jQuery('.note').append('<div>'+val+'</div>');				
			});			
			setTimeout(function(){ jQuery('.note').fadeOut(); }, 60000);			
			jQuery('.note').fadeIn();			
			jQuery('.ajax_loader_contact').hide();
		},
		beforeSend  : function(jqXHR,setting){
			jQuery('.ajax_loader_contact').show();
		},
	});
}