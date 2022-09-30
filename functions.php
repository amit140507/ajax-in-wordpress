	function new_enqueue_style_scripts()
{
$style_ver = filemtime( get_stylesheet_directory() . '/assets/js/custom.js' );
wp_register_script('new_custom_js', get_stylesheet_directory_uri().'/assets/js/custom.js', array(), $style_ver);
wp_enqueue_script('new_custom_js');
}
add_action('wp_enqueue_scripts', 'new_enqueue_style_scripts');



// AJAX CODE 

wp_localize_script( 'new_custom_js', 'ajax', array(
    'url' => admin_url( 'admin-ajax.php' )
) );

add_action('wp_ajax_payment_processing_data', 'payment_processing_data');
add_action('wp_ajax_nopriv_payment_processing_data', 'payment_processing_data');

function payment_processing_data()
{
	
 $first_name_user = $_POST['first_name_user'];
 $last_name_user = $_POST['last_name_user'];
 $email_forpay = $_POST['email_forpay'];
 $ammount_forpay = $_POST['ammount_forpay'];
 $pin_code_forpay = $_POST['pin_code_forpay'];
 $phone_num_forpay = $_POST['phone_num_forpay'];

// CUSTOM CODE START HERE

//CUSTOM CODE END HERE
}	
exit;	
}
