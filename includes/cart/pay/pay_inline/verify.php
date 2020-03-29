<?php
session_start();
require '../vendor/autoload.php';
// Confirm that payment reference has not already gotten value
$payment_reference = isset($_GET['reference']) ? $_GET['reference'] : '';
$_SESSION["order_reference"] = (isset($reference) ? $reference : "");
if(!$payment_reference || empty($payment_reference) || $payment_reference == ""){
    die('No reference supplied');
}

// initiate the Library's Paystack Object
$paystack = new Yabacon\Paystack('sk_test_a91f37f8fb5f44ebcad860b3e7f95a6fa69c26ce');
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
       perform_success();
       give_value($payment_reference);
   }
}

// functions
function give_value($payment_reference)
{
    // Be sure to log the reference as having gotten value
    // write code to give value
    if(!empty($payment_reference) && ($_SESSION["order_reference"] == $payment_reference)) {
        //send admin email
    }
}

function perform_success()
{
    echo json_encode(['verified' => true]);
    exit();
}

