<?php
//error_reporting(0);
require("includes/db.php");
include("includes/functions.php");
include("includes/cart/empty_cart.php"); ?>
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

    <!-- JQuery -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

    <!-- fontawesome online -->
    <link href="https://fonts.googleapis.com/css?family=Abel|Bellota+Text|Montserrat|Raleway&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/760c3d66bf.js" crossorigin="anonymous"></script>
    <script src="includes/jquery-3.4.1.js"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" /> -->
    <!-- fontawesome online -->
</head>

<body>
    <!-- modal -->

    <?php include("includes/modal.php"); ?>
    <!-- modal -->

    <nav class="menu1">
        <ul class="menu">
            <li><a href="index.php" id="cart_page_home">Home</a></li>
        </ul><br>
        <div class="utility m-t-30">

            <span class="search">
                <i class="fas fa-search " onclick="opensearch()"> </i>
            </span>
            &nbsp;&nbsp;
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
    <!-- end of navbar -->
    <div class="ecart-content">
        <div class="cart-top text-left" style="background: #f8f8f8;">
            <a href="allproducts.php"><i class="fas fa-chevron-left"></i>PRODUCTS</a>
        </div>
        <div class="container cartPage">
            <!-- cart-item -->
            <!-- <div class="row cartPage"> -->
            <?php include("includes/cart/review_cart.php"); ?>
            <!-- </div> -->
            <!-- cart item end -->
        </div>
        <?php if (isset($_SESSION["products"]) && !empty($_SESSION["products"])) { ?>
            <button class="btn btn-md btn-primary " id="checkout" onclick="openNav()">PROCEED TO CHECKOUT</button>
        <?php } ?>
    </div>
    <!-- CART -->
    <!-- <div class="cart-overlay"> -->
    <div class="cart">
        <span class="close-cart">
            <i class="fa fa-window-close " onclick="closeNav()" aria-hidden="true"></i>
        </span>
        <h2>PERSONALIZED CHECKOUT FORM</h2>
        <h2>Fill out form</h2>
        <div class="cart-content">
            <!-- cart item -->
            <!-- div was recreated in js file -->
            <form id="form_checkout" method="post" action="includes/cart/cart_process.php">
                <div class="form-group">
                    <label for="inputUserName">Full Name</label><input name="customer_name" class="form-control" type="text" id="inputUserName" value="<?php if (isset($_SESSION["customer_name"])) {
                                                                                                                                                            echo $_SESSION["customer_name"];
                                                                                                                                                        } ?>" />
                </div>


                <div class="form-group">
                    <label for="InputEmail">Email</label><input name="customer_email" class="form-control" type="email" id="inputEmail" value="<?php if (isset($_SESSION["customer_email"])) {
                                                                                                                                                    echo $_SESSION["customer_email"];
                                                                                                                                                } ?>" />
                </div>

                <div class="form-group">
                    <label for="InputExperience">Phone Number</label><input name="customer_phone" class="form-control" type="number" id="Inputnumber" value="<?php if (isset($_SESSION["customer_phone"])) {
                                                                                                                                                                    echo $_SESSION["customer_phone"];
                                                                                                                                                                } ?>" />
                </div>
                <div class="form-group">
                    <label for="InputUrl">Delivery Address</label>
                    <h5 style="font-size:16px;color:red"><sup style="color:red">*</sup>must be an address(home or office) where signature can be obtained</h5>
                    <textarea name="customer_address" class="form-control" id="InputPassword" cols="20" rows="3"><?php if (isset($_SESSION["customer_address"])) {
                                                                                                                        echo $_SESSION["customer_address"];
                                                                                                                    } ?></textarea>
                </div>

                <div class="form-group">
                    <label for="InputUrl">Date</label>
                    <h5 style="font-size:16px;color:red"><sup style="color:red">*</sup>We do not accept orders required in less than 12 weeks</h5>
                    <input name="order_deadline" class="form-control" type="date" id="InputPassword" />
                </div>

                <label>
                    <input id="terms_checkbox" type="checkbox" value="terms" />
                    <sup style="color: red">*</sup>I have read and agreed to terms of service
                    <br><a href="termsofuse.php" id="terms_link" class="text-decoration-none">Terms of use</a>
                </label>
                <div id="form_error_messages" class=""></div>
                <div class="sub-total">
                    <?php
                      // TODO: send total amount value to checkout_form, as changes made without refreshing the page and proceeding to checkout will not reflect on the total amount to be paid
                    ?>
                    <div class="vals">Delivery Cost-&nbsp; <span class="cart-total"><?php if(isset($_ENV["set_delivery_charge"])){
                        echo $currency.number_format($_ENV["set_delivery_charge"]);
                            } else if(isset($_ENV["default_delivery_charge"])){ echo $currency.$_ENV["default_delivery_charge"];  } ?></span></div>
                    <div class="vals">Order Cost-&nbsp; <span class="cart-total update_checkout_amount"><?php if(isset($_SESSION["pre_total_amount"])) {
                        echo $currency.number_format(doubleval($_SESSION["pre_total_amount"]));
                            } ?></span></div>
                    Total Amount
                    <hr>
                    <span class="total_checkout_amount">
                        <?php if (isset($_SESSION["order_amount"])) {
                            echo $currency . number_format($_SESSION["order_amount"]);
                        }  ?>
                    </span>
                    <hr><br>
                    <input type="hidden" value="order_checkout" name="order_checkout">
                    <button id="order_checkout" type="submit" class="btn btn-primary styled-btn"> CHECKOUT</button>
                </div>
            </form>

        </div>
    </div>
    <!-- </div> -->

    <!-- End cart -->

    <!-- ==== footer section end ==== -->
    <?php include("includes/footer.php");
    include("includes/cart/pay/pay_inline/pay.php"); ?>
    <?php include('includes/cart/add_cart_item-overview_cart.php');
