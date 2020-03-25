<?php
//error_reporting(0);
include("includes/functions.php"); ?>
<?php require_once("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="styles/styles.css" />
    <title>PERSONALIZED WINE</title>

    <!-- fontawesome online -->
    <!-- JQuery -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css" /> -->
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
        </ul>
        <div class="utility">

            <span class="search">
                <i class="fas fa-search " onclick="opensearch()"> </i>
            </span>
            &nbsp;&nbsp;&nbsp
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
    <!-- <div class="cart-top">
        <a href="index.php"><i class="fas fa-home"></i>HOME</a>
    </div> -->
    <!-- end of navbar -->
    <div class="ecart-content">
        <div class="container">
            <!-- cart-item -->
            <div class="row cartPage">
                <?php include("includes/cart/review_cart.php"); ?>
            </div>



            <!-- cart item end -->


        </div>
        <?php if(isset($_SESSION["products"]) && !empty($_SESSION["products"])) { ?>
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
            <form>
                <div class="form-group">
                    <label for="InputUserName">Name</label>
                    <input class="form-control" type="text" id="inputUserName" />
                </div>



                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <input class="form-control" type="email" id="InputEmail" />
                </div>

                <div class="form-group">
                    <label for="InputExperience">Phone Number</label>
                    <input class="form-control" type="number" id="Inputnumber" />
                </div>




                <label for="gender">Type </label>
                <br>
                <span style="color: red">Check the box below to indicate your order type</span><br>
                <label>
                    <input type="checkbox" value="Label" />
                    Label
                </label>
                &nbsp; &nbsp; &nbsp; &nbsp;
                <label>
                    <input type="checkbox" value="engraving" />
                    Engraving
                </label>


                <!-- <div class="form-group">
                        <label for="InputQuantity">Quantity</label>
                        <h5>Input your product quantity</h5>

                        <br>
                        <input class="form-control" id="basic" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="12" />
                    </div> -->
                <div class="form-group">
                    <label for="InputUrl">Delivery Address</label>
                    <h5>*must be an address(home or office) where signature can be obtained</h5>
                    <input class="form-control" type="text" id="InputPassword" />
                </div>

                <div class="form-group">
                    <label for="InputUrl">Date</label>
                    <h5>*We cannot accept orders required in less than 12 week</h5>
                    <input class="form-control" type="date" id="InputPassword" />
                </div>

                <label>
                    <input type="checkbox" value="terms" />
                    I have read and agreed to terms of service
                </label>
                <div class="sub-total">
                    Sub Total
                    <hr>
                    <div class="vals">Delivery Cost-&nbsp; N<span class="cart-total">1,000</span></div>
                    <div class="vals">Order Cost-&nbsp; N<span class="cart-total">420,000</span></div>
                    <a href="payment.php"><button class="btn btn-primary"> CHECKOUT</button></a>
                </div>





            </form>

        </div>
    </div>
    <!-- </div> -->

    <!-- End cart -->


    <!-- ==== footer section end ==== -->
    <?php include("includes/footer.php");
    include('includes/cart/add_cart_item-overview_cart.php'); ?>
