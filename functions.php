function custom_enqueue_script() {
	wp_enqueue_script('jquery');   // Use this if wanna use build in Jquery Version.
	wp_register_script('jquery_validate', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js', array(), '1.19.5', false );
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


// AJAX CODE 

add_action('wp_ajax_form_submit_ajax', 'form_submit_ajax_function');
add_action('wp_ajax_nopriv_form_submit_ajax', 'form_submit_ajax_function');
function form_submit_ajax_function()
{
   
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$amount_forpay = $_POST['amount'];
$zipcode = $_POST['zipcode'];
$phone_number = $_POST['phone_number'];

print_r($first_name);
// CUSTOM CODE START HERE
//CUSTOM CODE END HERE	

wp_die();
}
