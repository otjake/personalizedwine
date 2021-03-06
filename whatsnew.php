<?php include("includes/functions.php"); ?>
<?php require_once("includes/db.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="styles/styles.css" />
    <title>PERSONALIZED WINE</title>

    <!-- offline -->
    <!-- Bootstrap -->
    <!-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <!-- offline -->
    <!-- fontawesome online -->
    <link href="https://fonts.googleapis.com/css?family=Abel|Bellota+Text|Montserrat|Raleway&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/760c3d66bf.js" crossorigin="anonymous"></script>
    <script src="includes/jquery-3.4.1.js"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <!-- fontawesome online -->

    <!-- fontawesome from local -->

    <script src="includes/jquery-3.4.1.js"></script>
    <!-- fontawesome from local -->
</head>


<body class="whatsnew-body">
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
    <br>
    <br>
    <div class="cart-top" style="background:#f3f3f3;">
        <a href="index.php"><i class="fas fa-home"></i>HOME</a>
    </div>

    <!-- end of navbar -->
    <div class="whatsnew">
        <div class="board">
            <h1>WHAT'S NEW</h1>
            <div id="horizontal-line"></div>
            <h2>Discover the new set of wine labels and engravings.</h2>
        </div>
        <span>
            <!-- <i class="fas fa-angle-down fa-5x"></i>  -->
            <img src="images/down-arrows.png" height="50px" />

        </span>
    </div>

    <div class="jumbotron text-center" id="whatsnew_">
        <div>
            <h1>NEW PRODUCTS</h1>
            <div id="horizontal-line" style="z-index: 2"></div>
        </div>

        <div class="container">
            <div class="row">
                <?php whatsnew_labelling(); ?>
                <?php whatsnew_engraving(); ?>

            </div>
        </div>
        <div>
            <a href="allproducts.php"> <button class="btn btn-large">DISCOVER MORE</button></a>
        </div>
    </div>
    <!-- ==== footer section end ==== -->
    <?php include("includes/footer.php");
    include("includes/cart/add_cart_item-overview_cart.php"); ?>