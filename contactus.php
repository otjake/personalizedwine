<?php require_once("includes/db.php"); ?>
<?php include("includes/functions.php"); ?>
<?php reviews(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="styles/styles.css" />
    <title>PERSONALIZED WINE</title>

    <!-- fontawesome online -->
    <link href="https://fonts.googleapis.com/css?family=Abel|Bellota+Text|Montserrat|Raleway&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/760c3d66bf.js" crossorigin="anonymous"></script>
    <script src="includes/jquery-3.4.1.js"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> <!-- fontawesome online -->

    <!-- fontawesome from local -->

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="includes/jquery-3.4.1.js"></script>
    <!-- fontawesome from local -->
</head>

<body class="contactus-body">
    <?php include("includes/modal.php"); ?>

    <nav class="menu1">
        <ul class="menu">
            <li><a href="#home" data-toggle="modal" data-target="#exampleModal" id="cart_page_home">Client service</a></li>
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

    <div class="cart-top" style="background: transparent;">
        <a href="index.php"><i class="fas fa-home"></i>HOME</a>
    </div>

    <div class="contact-us">
        <div class="jumbotron text-center contactus-jumbotron" style="background: transparent">
            <div class="top-content">
                <h1>Get in touch</h1>
                <h5>Want to get in touch ? We'd love to hear from you,Here's how you can reach us..</h5>
            </div>

            <!-- <div class="box-area">
                <div class="box1">

                </div>
            </div> -->
            <!-- <div class="container"> -->
            <div class="row  chck">
                <div class="column box1" style="background-color:#aaa;">
                    <h2>Talk To Sales</h2>
                    <div id="horizontal-line" style="background:black;"></div>
                    <h3>Want to inquire? just pick up the phone</h3>
                    <h3> tochat us</h3>
                    <br>
                    <h3>+234801 1 22 6644</h3>


                </div>
                <div class="column box2" style="background-color:#bbb;">
                    <h2>Contact Customer Support</h2>
                    <div id="horizontal-line" style="background:black;"></div>
                    <h3>Sometimes you need a little help from</h3>
                    <h3>your friends</h3>
                    <h3>Or a cuji support rep</h3>
                    <h3>Don't worry...we're here for you</h3>

                    <button class="btn btn-large"><a href="mailto:support@personalizedwines@ng.com">Contact Support</a></button>
                    <h6 style="color: black">support@personalizedwines@ng.com</h6>

                </div>
            </div>





            <h3 class="feedback">FEEDBACKS & REVIEW</h3>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 review-box">
                        <div>
                            <form method="post" action="">
                                <?php
                                if (!empty($Emessage)) {
                                    echo "<p class='alert alert-danger'>" . $Emessage . "</p>";
                                } ?>
                                <?php
                                if (!empty($Smessage)) {
                                    echo "<p class='alert alert-success'>" . $Smessage . "</p>";
                                } ?>

                                <?php
                                if (!empty($nameErr)) {
                                    echo "<p class='alert alert-danger'>" . $nameErr . "</p>";
                                } ?>

                                <?php
                                if (!empty($emailErr)) {
                                    echo "<p class='alert alert-danger'>" . $emailErr . "</p>";
                                } ?>

                                <div class="form-group">
                                    <label for="InputUserName">Name</label>
                                    <input class="form-control ninput" type="text" name="name" id="inputUserName" placeholder="Enter Your name" />
                                </div>
                                <br>
                                <div class="form-group">
                                    <textarea class="form-control" name="comment" rows="10" placeholder="Share your reviews"></textarea>
                                </div>
                                <button type="submit" name="review" class="btn btn-large">SEND</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="b-image">
        <img src="images/care-lady.png" />
    </div>

    <!-- ==== footer section end ==== -->
    <?php include("includes/footer.php");
    include("includes/cart/add_cart_item-overview_cart.php"); ?>