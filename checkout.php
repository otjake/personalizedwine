<?php
include("includes/db.php");
include('includes/cart/empty_cart.php');
//error_reporting(0);
$order_id = (isset($_SESSION["order_id"]) ? $_SESSION["order_id"] : "");
$_ENV["delivery_charge"] = (isset($_ENV["set_delivery_charge"]) ? $_ENV["set_delivery_charge"] : (isset($_ENV["default_delivery_charge"]) ? $_ENV["default_delivery_charge"] : 1000));
$delivery_charge = $_ENV["delivery_charge"];
$amount = (isset($_SESSION["order_amount"]) ? doubleval($_SESSION["order_amount"]) : 0);
$order_deadline = (isset($_SESSION["order_deadline"]) ? $_SESSION["order_deadline"] : "");
$customer_name = (isset($_SESSION["customer_name"]) ? $_SESSION["customer_name"] : "");
$customer_phone = (isset($_SESSION["customer_phone"]) ? $_SESSION["customer_phone"] : "");
$customer_address = (isset($_SESSION["customer_address"]) ? $_SESSION["customer_address"] : "");
$customer_email = (isset($_SESSION["customer_email"]) ? $_SESSION["customer_email"] : "");
$payment_reference = (isset($_SESSION["order_reference"]) ? $_SESSION["order_reference"] : "");
 if(isset($_GET["checkout"]) && $_GET["checkout"] == true){

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <link rel="stylesheet" href="styles/styles.css"/>
        <link rel="stylesheet" href="includes/cart/style/style.css"/>
        <title>PERSONALIZED WINE</title>

        <!-- fontawesome online -->
        <link href="https://fonts.googleapis.com/css?family=Abel|Bellota+Text|Montserrat|Raleway&display=swap"
              rel="stylesheet">
        <script src="https://kit.fontawesome.com/760c3d66bf.js" crossorigin="anonymous"></script>
        <!--    <script src="includes/jquery-3.4.1.js"></script>-->
        <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous"/>
        <!-- fontawesome online -->

        <!-- fontawesome from local -->

        <script src="includes/jquery-3.4.1.js"></script>
        <!-- fontawesome from local -->
    </head>

<body>

<?php include("includes/modal.php"); ?>

    <nav class="menu1">
        <ul class="menu">
            <li><a href="#home" data-toggle="modal" data-target="#exampleModal" id="cart_page_home">Client service</a>
            </li>
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
                            <button type="submit" name="search" value="Search"
                                    style="background: transparent;border:none;"><i
                                        class="fas fa-search "> </i></button>
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
    <a href="index.php"><i class="fas fa-shopping-cart"></i> CART PAGE</a>
</div>
    <!-- end of navbar -->

<div class="container m-t-30">
    <div class="row m-t-30">
    <!-- BEGIN ORDER SUMMARY -->
    <div class="col-xs-12 col-md-12 col-lg-12 m-t-30">
    <div class="grid invoice">
    <div class="grid-body">
        <div class="invoice-title order_process_complete_fade">
               <div class="row m-t-30">
                <div class="col-12"
                     style="background: url('admin/product_image/banner5.jpg') center/cover no-repeat;display: flex;width: 100%;height: 100px;">
                    <div style="text-align:center;background: rgb(27, 27, 27);width:100%;opacity: 0.5; height: 100px;">
                        <h3 style="padding-top: 20px;color: white;opacity: 1;margin: auto;">PERSONALIZED WINE</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-t-30"></div>
        <br>
            <div class="col-xs-12 col-md-12 col-lg-12 m-t-30 text-center order_process_complete_fade"><h3 class="text-center">ORDER INFORMATION</h3></div>
            <br>
            <div class="m-t-30">
                <div class="container row col">
                    <div style="left: 0; right: 0; margin: auto" class="order_process_msg m-t-30 col-md-6 col-lg-6 col-xs-12 text-center"></div>
                </div>
            </div><br>
        <div class="row m-t-30">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 order_process_complete_fade" style="width: 50%;">
                <h4>ORDER ID<br>
                    <span class="small"><?php echo $order_id; ?></span></h4>
            </div>
        </div>
    </div>
    <hr class="order_process_complete_fade">
    <div class="row order_process_complete_fade">
        <div class="col-xs-4 col-md-4 col-lg-4 text-left" style="width: 50%">
            <address>
                <strong>FULL NAME</strong><br>
                <?php echo $customer_name; ?>
            </address>
        </div>
        <div class="col-xs-4 col-md-4 col-lg-4 text-right" style="width: 50%">
            <address>
                <strong>PHONE NUMBER</strong><br>
                <abbr title="Phone"><i class="fas fa-phone"></i></abbr> <?php echo $customer_phone; ?>
            </address>
        </div>
        <div class="col-xs-4 col-md-4 col-lg-4" style="width: 100%">
            <address>
                <strong>DELIVERY ADDRESS</strong><br>
                <?php echo $customer_address; ?>
            </address>
        </div>
    </div>
    <div class="row m-t-30 order_process_complete_fade">
        <div class="col-xs-6 col-md-6 col-lg-6 text-left" style="width: 50%;">
            <address>
                <strong>EMAIL ADDRESS</strong><br>
                <?php echo $customer_email; ?>
            </address>
        </div>
        <div class="col-xs-6 col-md-6 col-lg-6 text-right" style="width: 50%; padding: 1px;">
            <address>
                <strong>ORDER DEADLINE</strong><br>
                <?php echo $order_deadline; ?>
            </address>
        </div>
    </div>
    <div class="row m-t-30 order_process_complete_fade">
    <div class="col-md-12" style="width: 100%; overflow: scroll">
    <h4 class="text-center align-center center">ORDER SUMMARY</h4>
    <table class="table table-striped col-md-pull-8 col-xs-pull-12 col-sm-pull-12 col-lg-pull-8"  style="margin-top: -50px; width:100%; -ms-overflow: scroll; overflow: scroll;">
    <thead>
    <tr class="linecrow" style="width: 100%; overflow-x: scroll; margin-top: -50px;">
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
         <tr>
                                    <td><?php echo $sn; ?></td>
                                    <td class=" col-xs-6 col-md-6 col-lg-6">
                                        <strong><?php echo $item_name; ?></strong>
                                    </td><br>
                                    <td class="text-center col-xs-1 col-md-1 col-lg-1"><?php echo $item_qty; ?></td>
                                    <td class="text-right col-xs-2 col-md-2 col-lg-2"><?php echo $currency . number_format($item_price); ?></td>
                                    <td class="text-right col-xs-2 col-md-2 col-lg-2"><?php echo $currency . $subtotal; ?></td>
                                </tr>
    <?php }
} ?>
                        <tr>
                            <td colspan="2"></td>
                            <td class="text-right" colspan="2"><strong>Delivery Charge</strong></td>
                            <td class="text-right">
                                <strong><?php echo $currency . number_format($delivery_charge); ?></strong></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td class="text-right" colspan="2"><strong>Total Amount</strong></td>
                            <td class="text-right">
                                <strong class="place_order_total"><?php echo $currency . number_format($amount); ?></strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div><br>
        <div style="text-align: left; margin-bottom: 30px; margin-top: 30px; margin-left: 30px;">
            <form id="placedorder_empty_cart_link" method="post" action="" style="display: none">
                <button type="submit" id="empty_cart_link" name="checkout_empty_cart" style="padding: 4px; color: blue" class=" text-decoration-none"
                ><i class="fas fa-backward"></i> Return
                </button>
            </form>
        </div>
        </div>
    </div>
    </div>
    <!-- END INVOICE -->
    </div>
    </div>
    <div class="container row col" style="padding-left: 40px;">
        <div id="order_process_msg" class="m-t-30 col-md-6 col-lg-6 col-xs-12"></div>
    </div>

<?php

if(isset($_ENV["set_secret_key"]) && isset($_ENV["set_public_key"]) && !empty($_ENV["set_secret_key"]) && !empty($_ENV["set_public_key"])) { ?>
    <div class=" row col payment-content order_process_complete_fade m-t-30">
        <div class="board col-sm-12 col-md-6 col-lg-6">
            <div class="fboard">
                <div class="payment-form col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-sm-12 col-md-12 col-lg-12 m-t-30">
                            <?php include("includes/cart/pay/pay_inline/pay_form.php"); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php } else {?>

    <div class="row col payment-content m-t-30 order_process_complete_fade">
        <div class="board col-sm-12 col-md-6 col-lg-6">
            <div class="fboard">
                <div class="payment-form col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <form class="place_order_form" action="includes/cart/mail/placed_order_mail.php" method="post">
                            <input type="hidden" name="order_id_value" value="<?php if(isset($order_id)) {
                                echo $order_id;
                            } ?>">
                            <div class="col-xs-12 col-sm-12 col-sm-12 col-md-12 col-lg-12 m-t-30">
                                <button id="place_order_btn" class="btn styled-btn btn-block" type="submit">Place Order</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <!-- ==== footer section end ==== -->
<?php include("includes/footer.php");
include("includes/cart/pay/pay_inline/pay.php");
include("includes/cart/add_cart_item-overview_cart.php"); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $.post("includes/cart/cart_process.php", {"checkout_amount": "1"}, function (total) {
            $(".place_order_total").html(total);
        }); //Make ajax request using jQuery post() & update checkout final amount

    //Prevent back button click on browser
    (function (global) {

        if(typeof (global) === "undefined")
        {
            throw new Error("window is undefined");
        }

        var _hash = "!";
        var noBackPlease = function () {
            global.location.href += "#";

            // 50 milliseconds for just once do not cost much (^__^)
            global.setTimeout(function () {
                global.location.href += "!";
            }, 50);
        };

        // Earlier we had setInerval here....
        global.onhashchange = function () {
            if (global.location.hash !== _hash) {
                global.location.hash = _hash;
            }
        };

        global.onload = function () {

            noBackPlease();

            // disables backspace on page except on input fields and textarea..
            document.body.onkeydown = function (e) {
                var elm = e.target.nodeName.toLowerCase();
                if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                    e.preventDefault();
                }
                // stopping event bubbling up the DOM tree..
                e.stopPropagation();
            };

        };

    })(window);

    //Alert user to confirm page refresh
        window.addEventListener('beforeunload', function (e) {
            // Cancel the event
            e.preventDefault(); // If you prevent default behavior in Mozilla Firefox prompt will always be shown
            // Chrome requires returnValue to be set
            e.returnValue = "Please do not reload this page while transaction is in progress";
        });

    });
</script>
<?php } else{
     header("location:cartpage.php");
 } ?>