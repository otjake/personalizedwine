<?php

//error_reporting(0);
include("./../../db.php");
include("../../cart/empty_cart.php");

$order_id = (isset($_SESSION["order_id"]) ? $_SESSION["order_id"] : "");
$_ENV["delivery_charge"] = (isset($_ENV["set_delivery_charge"]) ? $_ENV["set_delivery_charge"] : (isset($_ENV["default_delivery_charge"]) ? $_ENV["default_delivery_charge"] : 1000));
$delivery_charge = $_ENV["delivery_charge"];
$amount = (isset($_SESSION["order_amount"]) ? doubleval($_SESSION["order_amount"]) : 0);
$order_deadline = (isset($_SESSION["order_deadline"]) ? $_SESSION["order_deadline"] : "");
$customer_name = (isset($_SESSION["customer_name"]) ? $_SESSION["customer_name"] : "");
$customer_phone = (isset($_SESSION["customer_phone"]) ? $_SESSION["customer_phone"] : "");
$customer_address = (isset($_SESSION["customer_address"]) ? $_SESSION["customer_address"] : "");
$customer_email = (isset($_SESSION["customer_email"]) ? $_SESSION["customer_email"] : "");

if(isset($_POST['reference']) && isset($order_id)) {
    $_SESSION["order_reference"] = $_POST["reference"];
    $payment_reference = (isset($_SESSION["order_reference"]) ? $_SESSION["order_reference"] : $_POST['reference']);

    require 'PHPMailerAutoload.php';
    date_default_timezone_set('UTC');
//Admin email configuration
    $admin_mail = new PHPMailer;

//sumbission data
    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $date = date('d/m/Y');
    $time = date('H:i:s');


    $emailfrom = "service@mainstride.com";


//$admin_mail->SMTPDebug = 3;                               // Enable verbose debug output

    $admin_mail->isSMTP();                                      // Set mailer to use SMTP
    $admin_mail->Host = 'server270.web-hosting.com';  // Specify main and backup SMTP servers
    $admin_mail->SMTPAuth = true;                               // Enable SMTP authentication
    $admin_mail->Username = 'service@mainstride.com';                 // SMTP username
    $admin_mail->Password = 'gstankovic@';                           // SMTP password
    $admin_mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $admin_mail->Port = 465;                                    // TCP port to connect to
    try {
        $admin_mail->setFrom($emailfrom);
    } catch (phpmailerException $e) {
    }
    $admin_mail->addAddress($customer_email, 'Personalized Wine');     // Add a recipient
// $admin_mail->addAddress('ellen@example.com');               // Name is optional
    $admin_mail->addCC('gabrielilochi@gmail.com', 'Personalized Wine');

    $admin_mail->isHTML(true); // Set email format to HTML


//Customers email configuration
    $customers_email = new PHPMailer;

//sumbission data
    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $date = date('d/m/Y');
    $time = date('H:i:s');


    $emailfrom = "service@mainstride.com";


//$admin_mail->SMTPDebug = 3;                               // Enable verbose debug output

    $customers_email->isSMTP();                                      // Set mailer to use SMTP
    $customers_email->Host = 'server270.web-hosting.com';  // Specify main and backup SMTP servers
    $customers_email->SMTPAuth = true;                               // Enable SMTP authentication
    $customers_email->Username = 'service@mainstride.com';                 // SMTP username
    $customers_email->Password = 'gstankovic@';                           // SMTP password
    $customers_email->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $customers_email->Port = 465;                                    // TCP port to connect to
    try {
        $customers_email->setFrom($emailfrom);
    } catch (phpmailerException $e) {
    }
    $customers_email->addAddress($customer_email, 'Personalized Wine');     // Add a recipient
// $customers_email->addAddress('ellen@example.com');               // Name is optional
    $customers_email->addCC($customer_email, 'Personalized Wine');

    $customers_email->isHTML(true);

   ' <link rel="stylesheet" href="../../../styles/styles.css"/>
    <link rel="stylesheet" href="../style/style.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <script src="https://kit.fontawesome.com/760c3d66bf.js" crossorigin="anonymous"></script>';


//Admin email content
    $admin_mail->Subject = 'New Email From Personalizedwine';
    $admin_mail->Body .= '<h3>You have received a new order message from your website.</h3><br>
<div class="container m-t-30">
    <div class="row m-t-30">
    <!-- BEGIN ORDER SUMMARY -->
    <div class="col-xs-12 col-md-12 col-lg-12 m-t-30">
    <div class="grid invoice">
    <div class="grid-body">
        <div class="invoice-title">
            <div class="row" style="background-color: black;">
                <div class="row m-t-30" style="width: 100%">
                    <div class="col-12"
                         style="text-align:center;padding-top: 20px;width: 100%;height: 110px;">
                        <h3 style="padding-left:3px; padding-top: 20px; padding-right: 3px; color: white;opacity: 1;margin: auto;">PERSONALIZED WINE</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-t-30"></div>
        <br>
            <div class="col-xs-12 col-md-12 col-lg-12 m-t-30 text-center"><h2 class="text-center" style="text-align: center">PAID ORDER INFORMATION</h2></div>
            <br>
            <div class="m-t-30"></div><br>
        <div class="row m-t-30">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left" style="width: 50%;">
                <h4>REFERENCE NO:<br>
                    <span class="small">
                            ' . $payment_reference . '</span></h4>
                            
            </div><br>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right" style="width: 50%;">
                <h4>ORDER ID:<br>
                    <span class="small">' . $order_id . '</span></h4>
            </div>
        </div>
    </div>
    <hr><br>
    <div class="row">
        <div class="col-xs-4 col-md-4 col-lg-4 text-left" style="width: 50%">
            <address>
                <strong>CUSTOMER NAME</strong><br>
                ' . $customer_name . '
            </address>
        </div><br>
        <div class="col-xs-4 col-md-4 col-lg-4 text-right" style="width: 50%">
            <address>
                <strong>PHONE NUMBER</strong><br>
                <abbr title="Phone"><i class="fas fa-phone"></i></abbr> ' . $customer_phone . '
            </address>
        </div><br>
        <div class="col-xs-4 col-md-4 col-lg-4" style="width: 100%">
            <address>
                <strong>DELIVERY ADDRESS</strong><br>
                ' . $customer_address . '
            </address>
        </div>
    </div><br>
    <div class="row m-t-30">
        <div class="col-xs-6 col-md-6 col-lg-6 text-left" style="width: 50%; mso-style-update: 1px;">
            <address>
                <strong>EMAIL ADDRESS</strong><br>
                ' . $customer_email . '
            </address>
        </div><br>
        <div class="col-xs-6 col-md-6 col-lg-6 text-right" style="width: 50%; padding: 1px;">
            <address>
                <strong>ORDER DEADLINE</strong><br>
                ' . $order_deadline . '
            </address>
        </div><br>
    </div><br>
    <div class="row m-t-30">
    <div class="col-md-12" style="width: 100%; overflow: scroll">
    <h3 class="text-center m-t-5 align-center center" style="text-align: center">ORDER SUMMARY</h3><br>
   <table class="table table-striped m-t-30"  style=" width:100%; -ms-overflow: scroll; overflow: scroll;">
    <thead>
    <tr class="linecrow" style="width: 100%; overflow-x: scroll">
        <td><strong>S/N</strong></td>
        <td class=" col-xs-6 col-md-6 col-lg-6"><strong>PRODUCT DETAIL</strong></td>
        <td class="text-center col-xs-1 col-md-1 col-lg-1"><strong>QTY</strong></td>
        <td class="text-right col-xs-2 col-md-2 col-lg-2"><strong>RATE</strong></td>
        <td class="text-right col-xs-2 col-md-2 col-lg-2"><strong>SUBTOTAL</strong></td>
    </tr>
    </thead>
    <tbody>'; ?>
    <?php
    if (isset($_SESSION["products"]) && count($_SESSION["products"]) > 0) {

        $sn = 0;
        foreach ($_SESSION["products"] as $product) { //loop through items and prepare html content

            //set variables to use them in HTML content below
            $item_name = $product["product_name"];
            $item_desc = $product["product_desc"];
            $item_price = $product["product_price"];
            $item_code = $product["product_code"];
//                                            $product_image = $product["product_image"];
            $item_qty = $product["product_qty"];

            $subtotal_dec = ($item_price * $item_qty);
            $subtotal = number_format($subtotal_dec);

            $sn++;
            ?>
            <?php
            $admin_mail->Body .=
                ' <tr>
                                    <td>' . $sn . '</td>
                                    <td class=" col-xs-6 col-md-6 col-lg-6">
                                        <strong>' . $item_name . '</strong><br>' . $item_desc . "(" . $item_code . ")" . '
                                    </td>
                                    <td class="text-center col-xs-1 col-md-1 col-lg-1">' . $item_qty . '</td>
                                    <td class="text-right col-xs-2 col-md-2 col-lg-2">' . $currency . number_format($item_price) . '</td>
                                    <td class="text-right col-xs-2 col-md-2 col-lg-2">' . $currency . $subtotal . '</td>
                                </tr>';
            ?>
        <?php }
    } ?>
    <?php $admin_mail->Body .= '
                        <tr>
                            <td colspan="2"></td>
                            <td class="text-right" colspan="2"><strong>Delivery Charge</strong></td>
                            <td class="text-right">
                                <strong>' . $currency . number_format($delivery_charge) . '</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td class="text-right" colspan="2"><strong>Total Amount</strong></td>
                            <td class="text-right">
                                <strong>' . $currency . number_format($amount + $delivery_charge) . '</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div><br>
            <div class="row col-12 m-t-30">
                <p>This message was sent from the IP
                    Address: ' . $ipaddress . " on " . $date . " at " . $time . '</p>
            </div><br>
            <div class="row m-t-30">
                <div class="col-12"
                     style="background: url(' . "image_path" . ') center/cover no-repeat;display: flex;width: 100%;height: 100px;">
                    <div style="text-align:center;background: rgb(27, 27, 27);width:100%;opacity: 0.5; height: 100px;">
                        <h3 style="padding-top: 20px;color: white;opacity: 1;margin: auto;">PERSONALIZED WINE</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="width: 100%">
        <div class="col-12" style="text-align: center; width: 100%">
 &copy; <a href="' . ucfirst($_SERVER["HTTP_HOST"]) . '" class="text-decoration-none">' . ucfirst($_SERVER["HTTP_HOST"]) . '</a> All rights reserved. Made with <span class="human-heart heart">&hearts;</span> ' . date("Y") . '
</div>
    </div>
    </div>
    <!-- END INVOICE -->
    </div>
    </div>'; ?>
    <?php try {
        if (!$admin_mail->send()) {
//            echo '
//   Order email was not sent.';
//            exit();
        } else {
//            echo '
//    Order email was sent.';
//            exit();
        }
    } catch (phpmailerException $e) {
    }

//    Customers email content
    $customers_email->Subject = 'Order Receipt From Personalizedwine';
    $customers_email->Body .= '<div class="container m-t-30">
    <div class="row m-t-30">
    <!-- BEGIN ORDER SUMMARY -->
    <div class="col-xs-12 col-md-12 col-lg-12 m-t-30">
    <div class="grid invoice">
    <div class="grid-body">
        <div class="invoice-title">
            <div class="row" style="background-color: black;">
                <div class="row m-t-30" style="width: 100%">
                    <div class="col-12"
                         style="text-align:center;padding-top: 20px;width: 100%;height: 90px;">
                        <h3 style="padding-left:3px; padding-top: 20px; padding-right: 3px; color: white;opacity: 1;margin: auto;">PERSONALIZED WINE</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-t-30"></div>
        <br>
            <div class="col-xs-12 col-md-12 col-lg-12 m-t-30 text-center"><h2 class="text-center" style="text-align: center">ORDER RECEIPT</h2></div>
            <br>
            <div class="m-t-30"></div><br>
        <div class="row m-t-30">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left" style="width: 50%;">
                <h4>REFERENCE NO:<br>
                    <span class="small">
                            ' . $payment_reference . '</span></h4>
                            
            </div><br>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right" style="width: 50%;">
                <h4>ORDER ID:<br>
                    <span class="small">' . $order_id . '</span></h4>
            </div><br>
        </div>
    </div>
    <hr><br>
    <div class="row">
        <div class="col-xs-4 col-md-4 col-lg-4 text-left" style="width: 50%">
            <address>
                <strong>NAME</strong><br>
                ' . $customer_name . '
            </address>
        </div><br>
        <div class="col-xs-4 col-md-4 col-lg-4 text-right" style="width: 50%">
            <address>
                <strong>PHONE NUMBER</strong><br>
                <abbr title="Phone"><i class="fas fa-phone"></i></abbr> ' . $customer_phone . '
            </address>
        </div><br>
        <div class="col-xs-4 col-md-4 col-lg-4" style="width: 100%">
            <address>
                <strong>DELIVERY ADDRESS</strong><br>
                ' . $customer_address . '
            </address>
        </div><br>
    </div>
    <div class="row m-t-30">
        <div class="col-xs-6 col-md-6 col-lg-6 text-left" style="width: 50%; mso-style-update: 1px;">
            <address>
                <strong>EMAIL ADDRESS</strong><br>
                ' . $customer_email . '
            </address>
        </div><br>
        <div class="col-xs-6 col-md-6 col-lg-6 text-right" style="width: 50%; padding: 1px;">
            <address>
                <strong>ORDER DEADLINE</strong><br>
                ' . $order_deadline . '
            </address>
        </div><br>
    </div><br>
    <div class="row m-t-30">
    <div class="col-md-12" style="width: 100%; overflow: scroll">
    <h3 class="text-center m-t-5 align-center center" style="text-align: center">ORDER SUMMARY</h3><br>
    <table class="table table-striped m-t-30"  style=" width:100%; -ms-overflow: scroll; overflow: scroll;">
    <thead>
    <tr class="linecrow" style="width: 100%; overflow-x: scroll">
        <td><strong>S/N</strong></td>
        <td class=" col-xs-6 col-md-6 col-lg-6"><strong>PRODUCT DETAIL</strong></td>
        <td class="text-center col-xs-1 col-md-1 col-lg-1"><strong>QTY</strong></td>
        <td class="text-right col-xs-2 col-md-2 col-lg-2"><strong>RATE</strong></td>
        <td class="text-right col-xs-2 col-md-2 col-lg-2"><strong>SUBTOTAL</strong></td>
    </tr>
    </thead>
    <tbody>'; ?>
    <?php
    if (isset($_SESSION["products"]) && count($_SESSION["products"]) > 0) {

        $sn = 0;
        foreach ($_SESSION["products"] as $product) { //loop through items and prepare html content

            //set variables to use them in HTML content below
            $item_name = $product["product_name"];
            $item_desc = $product["product_desc"];
            $item_price = $product["product_price"];
            $item_code = $product["product_code"];
//                                            $product_image = $product["product_image"];
            $item_qty = $product["product_qty"];

            $subtotal_dec = ($item_price * $item_qty);
            $subtotal = number_format($subtotal_dec);

            $sn++;
            ?>
            <?php
            $customers_email->Body .=
                ' <tr>
                                    <td>' . $sn . '</td>
                                    <td class=" col-xs-6 col-md-6 col-lg-6">
                                        <strong>' . $item_name . '</strong><br>' . $item_desc . " (" . $item_code . ")" . '
                                    </td>
                                    <td class="text-center col-xs-1 col-md-1 col-lg-1">' . $item_qty . '</td>
                                    <td class="text-right col-xs-2 col-md-2 col-lg-2">' . $currency . number_format($item_price) . '</td>
                                    <td class="text-right col-xs-2 col-md-2 col-lg-2">' . $currency . $subtotal . '</td>
                                </tr>';
            ?>
        <?php }
    } ?>
    <?php $customers_email->Body .= '
                        <tr>
                            <td colspan="2"></td>
                            <td class="text-right" colspan="2"><strong>Delivery Charge</strong></td>
                            <td class="text-right">
                                <strong>' . $currency . number_format($delivery_charge) . '</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td class="text-right" colspan="2"><strong>Amount Paid</strong></td>
                            <td class="text-right">
                                <strong>' . $currency . number_format($amount + $delivery_charge) . '</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div><br>
            <div class="row m-t-30">
        <div class="col-12" style="text-align: center">
  <h6>You have received this email because you performed a transaction on <a href="' . ucfirst($_SERVER["HTTP_HOST"]) . '" class="text-decoration-none">' . ucfirst($_SERVER["HTTP_HOST"]) . '</a><br>
    This email is intended for ( <a href="#">' . $customer_name . '</a> ). Kindly ignore if you believe this email was sent in error.
</h6></div><br>
                <div class="col-12"
                     style="background: url(' . "image_path" . ') center/cover no-repeat;display: flex;width: 100%;height: 100px;">
                    <div style="text-align:center;background: rgb(27, 27, 27);width:100%;opacity: 0.5; height: 90px;">
                        <h3 style="padding-top: 20px;color: white;opacity: 1;margin: auto;">PERSONALIZED WINE</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="width: 100%">
        <div class="col-12" style="text-align: center; width: 100%">
 &copy; <a href="' . ucfirst($_SERVER["HTTP_HOST"]) . '" class="text-decoration-none">' . ucfirst($_SERVER["HTTP_HOST"]) . '</a> All rights reserved. With <span class="human-heart heart">&hearts;</span> ' . date("Y") . '
</div>
</div>
    </div>
    </div>
    <!-- END INVOICE -->
    </div>
    </div>'; ?>
    <?php try {
        if (!$customers_email->send()) {
            http_response_code(404);
            echo "Your order email was not delivered.<br>
Please note your <strong>REFERENCE NO: $payment_reference and ORDER ID: $order_id</strong>";
            exit();
        } else {
            http_response_code(200);
            echo "Thanks for placing an order with us. We'll be in touch.<br>
Please note your <strong>REFERENCE NO: $payment_reference and ORDER ID: $order_id</strong>
<br>Check your email for your transaction receipt.";
            exit();
        }
    } catch (phpmailerException $e) {
    }
} else {
    http_response_code(404);
    echo "No transaction reference supplied<br>
Your order with <strong>ORDER ID: $order_id</strong> failed.";
    exit();
}?>
