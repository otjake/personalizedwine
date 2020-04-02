<?php
session_start();
require '../vendor/autoload.php';

// Confirm that payment reference has not already gotten value
$payment_reference = isset($_GET['reference']) ? $_GET['reference'] : '';
$_SESSION["order_reference"] = (isset($payment_reference) ? $payment_reference : "");
if(!$payment_reference || empty($payment_reference) || $payment_reference == ""){
    echo json_encode(['null_reference' => 'OOps! No payment reference supplied. Try again']);
    exit();
}

// initiate the Library's Paystack Object
// TODO: change to live secret key in production
$paystack = new Yabacon\Paystack('');

// the code below throws an exception if there was a problem completing the request,
// else returns an object created from the json response
try
{
    // verify using the library
    $trx = $paystack->transaction->verify(
        [
            'reference' => $payment_reference
        ]
    );
} catch(\Yabacon\Paystack\Exception\ApiException $e){
    print_r($e->getResponseObject());
    die($e->getMessage());
}
// status should be true if there was a successful call
if (!$trx->status) {
    exit($trx->message);
}

if ('success' === $trx->data->status) {
    // use trx info including metadata and session info to confirm that cartid
    // matches the one for which we accepted payment
   if(($_SESSION["order_reference"] == $trx->data->reference) && ($_SESSION["order_id"] == $trx->data->metadata->order_id)) {

//Perform success and give value
    echo json_encode(['verified' => $trx->data->amount]);
    exit();
   }
}


