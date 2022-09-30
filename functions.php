	function allyearcooling_enqueue_style_scripts()
{
$style_ver = filemtime( get_stylesheet_directory() . '/assets/js/custom.js' );
wp_register_script('allyearcooling_custom_js', get_stylesheet_directory_uri().'/assets/js/custom.js', array(), $style_ver);
wp_enqueue_script('allyearcooling_custom_js');
}
add_action('wp_enqueue_scripts', 'allyearcooling_enqueue_style_scripts');



// AJAX CODE 

wp_localize_script( 'FrontEndAjax', 'ajax', array(
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

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.commerce.coinbase.com/charges",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
//     CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"local_price\":{\"amount\":$ammount_forpay,\"currency\":\"USD\"},\"metadata\":{\"customer_email\":\"$email_forpay\",\"customer_name\":\"$first_name_user $last_name_user\"},\"logo_url\":\"https://res.cloudinary.com/commerce/image/upload/v1663929779/nvtdikqlpdtfxw6nf5sw.png\",\"name\":\"All Year Cooling\",\"description\":\"South Florida's #1 Choice For Same Day AC Service & Installation\",\"pricing_type\":\"fixed_price\",\"redirect_url\":\"https://allyearcooling.com/thank-you/\",\"cancel_url\":\"https://allyearcooling.com/\"}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/json",
    "X-CC-Api-Key: c57344fd-b2f1-4540-be74-77a52f8f6188",
    "X-CC-Version: 2018-03-22"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
//  echo $response;
  $array = (json_decode($response,true));

 $redirect= $array['data']['hosted_url'];

 echo $redirect= $array['data']['hosted_url'];
}	
exit;	
}
