jQuery(document).ready(function(){
jQuery(".form-class").validate({
rules: {
         first_name_: "required", 
         last_name: "required", 
         email: {       
        required: true,
            email: true
         },
        amount: {
        required: true
        },
        zipcode: "required",
        phone_number: {
        required: true,
        number: true
        }, 
     },
    messages: {
        first_name: "Enter your first name",
        last_name: "Enter your last name",
        email: "Enter a valid email address",
        amount: "Please enter amount in numbers only",
        zipcode: "Enter zip code",
        phone_number: "Enter your mobile number",
     },
     submitHandler: function(form) {
        // event.preventDefault();

    var first_name = jQuery(".first-name-class").val();
    var last_name =  jQuery(".last-name-class").val();
    var email =   jQuery(".email-class").val();
    var amount = jQuery(".amount-class").val();
    var zipcode = jQuery(".zipcode-class").val();
    var phone_number = jQuery(".phone-number-class").val(); 

  // var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
        
      jQuery.ajax({
      type: "POST",      
      url:customform.ajaxurl,
        data: {
            action: 'form_submit_ajax',
            first_name:first_name,
            last_name:last_name,
            email:email,
            amount:amount,
            zipcode:zipcode,
            phone_number:phone_number,
        },
        success:  function(response){        
         console.log("---"+response);
    }
       });
 }
});
});
