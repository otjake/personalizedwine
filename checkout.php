<?php
include("includes/db.php");
include("includes/cart/empty_cart.php");
//error_reporting(0);
$order_id = (isset($_SESSION["order_id"]) ? $_SESSION["order_id"] : "");
$_SESSION["delivery_charge"] = (isset($_SESSION["set_delivery_charge"]) ? $_SESSION["set_delivery_charge"] : (isset($_SESSION["default_delivery_charge"]) ? $_SESSION["default_delivery_charge"] : 1000 ));
$delivery_charge = $_SESSION["delivery_charge"];
$amount = (isset($_SESSION["order_amount"]) ? doubleval($_SESSION["order_amount"]) : 0);
$order_deadline = (isset($_SESSION["order_deadline"]) ? $_SESSION["order_deadline"] : "");
$customer_name = (isset($_SESSION["customer_name"]) ? $_SESSION["customer_name"] : "");
$customer_phone = (isset($_SESSION["customer_phone"]) ? $_SESSION["customer_phone"] : "");
$customer_address = (isset($_SESSION["customer_address"]) ? $_SESSION["customer_address"] : "");
$customer_email = (isset($_SESSION["customer_email"]) ? $_SESSION["customer_email"] : "");
$payment_reference = (isset($_SESSION["order_reference"]) ? $_SESSION["order_reference"] : "");

// TODO: fetch payment secret_key and public_key status from db table and set as session variables ($_SESSION["public_key"]), ($_SESSION["secret_key"]) in e.g db.php
// TODO: if session payment key is not set, place order without payment option will be used

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="stylesheet" href="includes/cart/style/style.css" />
    <title>PERSONALIZED WINE</title>

    <!-- fontawesome online -->
    <link href="https://fonts.googleapis.com/css?family=Abel|Bellota+Text|Montserrat|Raleway&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/760c3d66bf.js" crossorigin="anonymous"></script>
<!--    <script src="includes/jquery-3.4.1.js"></script>-->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <!-- fontawesome online -->

    <!-- fontawesome from local -->

    <script src="includes/jquery-3.4.1.js"></script>
    <!-- fontawesome from local -->
</head>

<body>

    <?php include("includes/modal.php"); ?>

    <nav class="menu1">
        <ul class="menu">
            <li><a href="#home" data-toggle="modal" data-target="#exampleModal" id="cart_page_home">Client service</a></li>
        </ul>
        <div class="utility">

            <span class="search">
                <i class="fas fa-search " onclick="opensearch()"> </i>
            </span>
            &nbsp;&nbsp;&nbsp;
            <?php include('includes/cart/cart_menu_icon.php'); ?>

        </div>
        <div class="search_overlay">
            <form method="GET" action="result.php">
                <div class="input-group">
                    <span class="input-group-addon btn btn-primary"> <span>
                            <button type="submit" name="search" value="Search" style="background: transparent;border:none;"><i class="fas fa-search "> </i></button>
                        </span>
                    </span>
                    <input type="text" class="form-control" name="user_search" placeholder="Search">
                    <span class="input-group-addon btn btn-primary" onclick="closesearch()"><i class="fas fa-times"></i></span>

                </div>
            </form>
        </div>
    </nav>
    <?php include('includes/cart/cart_content_modal.php'); ?>

    <div class="cart-top">
        <a href="index.php"><i class="fas fa-home"></i>HOME</a>
    </div>
    <!-- end of navbar -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 m-t-30"><h2 class="text-center">ORDER CONFIRMATION</h2></div>
            <!-- BEGIN ORDER SUMMARY -->
            <div class="col-xs-12 col-md-12 col-lg-12 m-t-30">
                <div class="grid invoice">
                    <div class="grid-body">
                        <div class="invoice-title">
                            <div class="row">
                                <div class="col-xs-12">
                                    <img src="" alt="Business Logo" height="35">
                                </div>
                            </div>
                            <br>
                            <div class="row">
<!--                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-left">-->
<!--                                        <h2>Reference No.<br>-->
<!--                                            <span class="small">--><?php //echo $payment_reference; ?><!--</span></h2>-->
<!--                                    </div>-->
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right">
                                        <h2>Order ID<br>
                                            <span class="small"><?php echo $order_id; ?></span></h2>
                                    </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-12 col-md-4 col-lg-4 text-left">
                                <address>
                                    <strong>Customer Name</strong><br>
                                     <?php echo $customer_name; ?>
                                </address>
                            </div>
                            <div class="col-xs-12 col-md-4 col-lg-4 text-right">
                                <address>
                                    <strong>Phone Number</strong><br>
                                    <abbr title="Phone"><i class="fas fa-phone"></i></abbr> <?php echo $customer_phone; ?>
                                </address>
                            </div>
                            <div class="col-xs-12 col-md-4 col-lg-4 text-right">
                                <address>
                                    <strong>Email Address</strong><br>
                                    <?php echo $customer_email; ?>
                                </address>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-xs-12 col-md-6 col-lg-6 text-left">
                                <address>
                                    <strong>Delivery Address</strong><br>
                                    <?php echo $customer_address; ?>
                                </address>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-6 text-right">
                                <address>
                                    <strong>Order Deadline Date:</strong><br>
                                    <?php echo $order_deadline; ?>
                                </address>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <h3 class="text-center m-t-5">ORDER SUMMARY</h3>
                                <table class="table table-striped m-t-30">
                                    <thead>
                                    <tr class="linecrow">
                                        <td><strong>S/N</strong></td>
                                        <td class=" col-xs-6 col-md-6 col-lg-6"><strong>PRODUCT DETAIL</strong></td>
                                        <td class="text-center col-xs-1 col-md-1 col-lg-1"><strong>QTY</strong></td>
                                        <td class="text-right col-xs-2 col-md-2 col-lg-2"><strong>RATE</strong></td>
                                        <td class="text-right col-xs-2 col-md-2 col-lg-2"><strong>SUBTOTAL</strong></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (isset($_SESSION["products"]) && count($_SESSION["products"]) > 0) {

                                        $sn = 1;
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

                                            $sn ++;
                                    ?>
                                    <tr>
                                        <td><?php echo $sn; ?></td>
                                        <td class=" col-xs-6 col-md-6 col-lg-6"><strong><?php echo $item_name; ?></strong><br><?php echo $item_desc." (".$item_code.")"; ?></td>
                                        <td class="text-center col-xs-1 col-md-1 col-lg-1"><?php echo $item_qty; ?></td>
                                        <td class="text-right col-xs-2 col-md-2 col-lg-2"><?php echo $currency.number_format($item_price); ?></td>
                                        <td class="text-right col-xs-2 col-md-2 col-lg-2"><?php echo $currency.$subtotal; ?></td>
                                    </tr>
                                            <?php
                                        }
                                    }?> <hr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td class="text-right" colspan="2"><strong>Delivery Charge</strong></td>
                                        <td class="text-right"><strong><?php echo $currency.number_format($delivery_charge); ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td class="text-right" colspan="2"><strong>Total Amount</strong></td>
                                        <td class="text-right"><strong><?php echo $currency.number_format($amount + $delivery_charge); ?></strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END INVOICE -->
        </div>
    </div>

    <div class="payment-content m-t-30">
        <div class="board">
            <div class="fboard">
                <div class="payment-form">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-30">
                            <button class="btn styled-btn btn-block" type="submit">Place Order</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="payment-content">
        <div class="board">
            <div class="fboard">
                <div class="payment-form">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-30">
                            <?php include("includes/cart/pay/pay_inline/pay_form.php"); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div style="text-align: left;">
        <form method="post" action="" hidden="hidden">
            <button type="submit" id="empty_cart_link" name="empty_cart" class="styled-btn text-decoration-none"
            >
            </button>
        </form>
    </div>
<!---->
<!--    <div class="paymentnow-content">-->
<!--        <div class="board_paynow">-->
<!--            <div class="fboard_paynow">-->
<!--                <div class="paymentnow-form">-->
<!--                        <div class="row">-->
<!--                            <div class="col-xs-12 col-sm-12 col-md-12">-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!-- ==== footer section end ==== -->
    <?php include("includes/footer.php");
    include("includes/cart/pay/pay_inline/pay.php");
    include("includes/cart/add_cart_item-overview_cart.php"); ?>