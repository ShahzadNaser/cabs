<?php 
 header("Access-Control-Allow-Origin: *");
require_once('vendor/autoload.php');
$payload = @file_get_contents('php://input');
$event = null;


function wh_log($log_msg) {
         $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        $txt = $log_msg;
        fwrite($myfile, $txt);
        fclose($myfile);
}



try {
    $event = \Stripe\Event::constructFrom(
        json_decode($payload, true)
    );
} catch(\UnexpectedValueException $e) {
    // Invalid payload
    http_response_code(400);
    exit();
}


// Handle the event
switch ($event->type) {
    case 'payment_intent.succeeded':
        $paymentIntent = $event->data->object; // contains a \Stripe\PaymentIntent
        handlePaymentIntentSucceeded($paymentIntent);
        //wh_log($event->type.' '.$paymentIntent);
        break;
    case 'payment_method.attached':
        $paymentMethod = $event->data->object; // contains a \Stripe\PaymentMethod
        handlePaymentMethodAttached($paymentMethod);
        wh_log($event->type.' '.$paymentMethod);
        break;
    // ... handle other event types
    default:
        // Unexpected event type
        wh_log($event->type.' '.'default condition');
}

http_response_code(200);
?>