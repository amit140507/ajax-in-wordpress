# ajax-in-wordpress
Proper Way to use ajax in wordpress

## Step 1

Create A New Page Called **`form.php`**.

```
<?php 
    /* Template Name: Form Template */
    get_header();
?>
<div class="container">
    <div class="title-div">
        <p>Custom Form</p>
    </div>
    <div class="inner-section">
        <form method="post" action="" class="form-class" id="form-id">
            <div class="first-name-field">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="first-name-class"/>
            </div>
            <div class="last-name-field">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" class="last-name-class"/>
            </div>
            <div class="email-field">
                <label for="email">Email</label>
                <input type="email" name="email" class="email-class"/>
            </div>
            <div class="amount-field">
                <label for="amount">Amount (In USD)</label>
                <input type="text" name="amount" class="amount-class"/>
            </div>
            <div class="zipcode-field">
                <label for="zipcode">Zip Code</label>
                <input type="text" name="zipcode" class="zipcode-class"/>
            </div>
            <div class="phone-number-field">
                <label for="phone_number">Phone number</label>
                <input type="text" name="phone_number" class="phone-number-class"/>
            </div>
            <input type="submit" value="Submit" name="button_submit" class="submit-class"/>
        </form>
    </div>
</div>
    
 
<?php
    get_footer();
?>
```

## Step 2
Put this code inside `<head></head>` in **`header.php`**(By Default I am using this).**

```
<script type="text/javascript">
var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>
```
### OR

Put this code in **`functions.php`**.
```
add_action('wp_head', 'custom_ajaxurl');
function custom_ajaxurl() {

   echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}
```

### OR

Add this code in **`custom.js`**.
```
var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
```

## Step 3
Create a file called **`custom.js`** in asset folder.
```
jQuery(document).ready(function(){
jQuery(".form-class").validate({
rules: {
         first_name: "required", 
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
            post_first_name:first_name,
            post_last_name:last_name,
            post_email:email,
            post_amount:amount,
            post_zipcode:zipcode,
            post_phone_number:phone_number,
        },
        success:  function(response){        
         console.log("---"+response);
    }
       });
 }
});
});
```
## Step 4 
Put this code in **`functions.php`**
```
function custom_enqueue_script() {

	wp_enqueue_script('jquery');   // Use this if wanna use build in Jquery Version.
	wp_register_script('jquery_validate', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js', array(), '1.19.5', true );
	wp_register_script( 'custom-script', get_template_directory_uri() . '/assets/js/custom.js', array(), '1.0.0', true ); 

	wp_enqueue_script('jquery_validate');
	wp_enqueue_script( 'custom-script');

	wp_localize_script( 'custom-script', 'customform', array(    'ajaxurl' => admin_url( 'admin-ajax.php' )));
	
}
add_action( 'wp_enqueue_scripts', 'custom_enqueue_script' );


// add_action('wp_head', 'custom_ajaxurl');
// function custom_ajaxurl() {
//    echo '<script type="text/javascript">
//            var ajaxurl = "' . admin_url('admin-ajax.php') . '";
//          </script>';
// }


//AJAX CODE

add_action('wp_ajax_form_submit_ajax', 'form_submit_ajax_function');
add_action('wp_ajax_nopriv_form_submit_ajax', 'form_submit_ajax_function');
function form_submit_ajax_function()
{
   
$first_name = $_POST['post_first_name'];
$last_name = $_POST['post_last_name'];
$email = $_POST['post_email'];
$amount = $_POST['post_amount'];
$zipcode = $_POST['post_zipcode'];
$phone_number = $_POST['post_phone_number'];

print_r($first_name);
// CUSTOM CODE START HERE
//CUSTOM CODE END HERE	

wp_die();
}
```


## References
1) [WP Docs](https://codex.wordpress.org/AJAX_in_Plugins)
2) [StakeOverflow](https://stackoverflow.com/a/17713643/20058739)
3) [StakeOverflow](https://stackoverflow.com/a/18614588)

## Clarification
### #1 
***form_submit_ajax*** in **`functions.php`**

```
add_action('wp_ajax_form_submit_ajax', 'form_submit_ajax_function');
add_action('wp_ajax_nopriv_form_submit_ajax', 'form_submit_ajax_function');
```

and **`custom.js`** need to be same.

``` 
      jQuery.ajax({
      type: "POST",      
      url:customform.ajaxurl,
        data: {
            action: 'form_submit_ajax',
            post_first_name:first_name,
            post_last_name:last_name,
            post_email:email,
            post_amount:amount,
            post_zipcode:zipcode,
            post_phone_number:phone_number,
        },
        success:  function(response){        
         console.log("---"+response);
    }
       });
```

### #2
***customform.ajaxurl*** here is 
```
      jQuery.ajax({
      type: "POST",      
      url:customform.ajaxurl,
        data: {
            action: 'form_submit_ajax',
            post_first_name:first_name,
            post_last_name:last_name,
            post_email:email,
            post_amount:amount,
            post_zipcode:zipcode,
            post_phone_number:phone_number,
        },
        success:  function(response){        
         console.log("---"+response);
    }
       });
```
coming from this code from **`functions.php`**

```
wp_localize_script( 'custom-script', 'customform', array(    'ajaxurl' => admin_url( 'admin-ajax.php' )));
```
and this code from **`header.php`**
```
<script type="text/javascript">
	var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>
```
