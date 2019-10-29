<?php
session_start();
$strip_info = json_decode($_SESSION['strip'],true);
$price =$strip_info['amount']* 100;
$description = "Customer Id: ".$strip_info['user'].", Order Id: ".$strip_info['order_id'];

require_once('vendor/autoload.php');

\Stripe\Stripe::setApiKey("sk_test_l7ultIB31KPQuOoWaVH4FQvv00oNTiyU76");


// $endpoint = \Stripe\WebhookEndpoint::create([
//   "url" => "http://test.hiddenlogics.com/cabs/stripe/hook.php",
//   "enabled_events" => ["charge.failed", "charge.succeeded"]
// ]);



$desc = "User Id is".$strip_info['user_id']." Order Id is".$strip_info['order_id'];
$token = $_POST['stripeToken'];
$charge = \Stripe\Charge::create([
    'amount' => $price,
    'currency' => 'usd',
    'description' => $description,
    'source' => $token,
]);
//echo $charge;
$chrage_res=json_decode($charge);
if($charge['status']=='succeeded'){
    header('location:http://test.hiddenlogics.com/cabs/thankyou.php');
}

?>