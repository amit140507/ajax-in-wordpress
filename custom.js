jQuery(document).ready(function(){

jQuery(".field-all-form").validate({
rules: {
         first_name_user: "required", 
         last_name_user: "required", 
         email_forpay: {       
             required: true,
             email: true
         },
        ammount_forpay: {
        required: true
        },
        pin_code_forpay: "required",
        phone_num_forpay: {
        required: true,
        number: true
        }, 

     },

    messages: {
        first_name_user: "Enter your first name",
        last_name_user: "Enter your last name",
        email_forpay: "Enter a valid email address",
        ammount_forpay: "Please enter amount in numbers only",
        pin_code_forpay: "Enter zip code",
        phone_num_forpay: "Enter your mobile number",
     },
     submitHandler: function(form) {
		// event.preventDefault();
        var formData = { 
        first_name_user: jQuery(".field-name-pay").val(),
        last_name_user:  jQuery(".field-last-pay").val(),
        email_forpay:   jQuery(".field-email-pay").val(),
        ammount_forpay: jQuery(".field-ammount-pay").val(),
        pin_code_forpay: jQuery(".field-pin-pay").val(),
        phone_num_forpay: jQuery(".field-phone-pay").val(),
     }
		
	var first_name_user = jQuery(".field-name-pay").val();
    var last_name_user =  jQuery(".field-last-pay").val();
    var email_forpay =   jQuery(".field-email-pay").val();
    var ammount_forpay = jQuery(".field-ammount-pay").val();
    var pin_code_forpay = jQuery(".field-pin-pay").val();
    var phone_num_forpay = jQuery(".field-phone-pay").val();	
//	var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
		
      $.ajax({
      type: "POST",		 
	  url:ajaxurl,
        data: {
            action: 'payment_processing_data',
			first_name_user:first_name_user,
			last_name_user:last_name_user,
			email_forpay:email_forpay,
			ammount_forpay:ammount_forpay,
			pin_code_forpay:pin_code_forpay,
			phone_num_forpay:phone_num_forpay,
        },
        success:  function(response){
		
         console.log("---"+response);
		window.location.href = response;
// var removespace = response.replace(/&/g, '&');
// location.replace (removespace);
    }
       });
 }
});
});
