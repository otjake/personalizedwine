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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <!-- fontawesome online -->

    <!-- fontawesome from local -->

    <script src="includes/jquery-3.4.1.js"></script>
    <!-- fontawesome from local -->
</head>

<body>

    <?php include("includes/modal.php"); ?>

    <nav class="menu1">
        <ul class="menu">s
            <li><a href="#home" data-toggle="modal" data-target="#exampleModal">Client service</a></li>
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

    <div class="cart-top">
        <a href="index.php"><i class="fas fa-home"></i>HOME</a>
    </div>
    <!-- end of navbar -->
    <div class="payment-content">
        <div class="board">
            <div class="fboard">
                <div class="display-td" style="float:right">
                    <img class="img-responsive pull-right" src="images/cards.png">
                </div>
                <br>
                <div class="payment-form">
                    <form>
                        <div class="row">
                            <div class="col-xs-6 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Cardholder Name</label>
                                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your details with anyone else.</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="form-group">
                                    <label for="number">Card Number</label>
                                    <input type="number" class="form-control" id="Inputnumber" placeholder="Card Number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">CV CODE</label>
                                    <input type="tel" class="form-control" name="cardCVC" placeholder="CVC" autocomplete="cc-csc" required />
                                </div>
                            </div>
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input type="tel" class="form-control" name="cardExpiry" placeholder="MM / YY" autocomplete="cc-exp" required />
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button class="btn btn-success btn-lg btn-block" type="submit">Make Payment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- ==== footer section end ==== -->
    <?php include("includes/footer.php");
    include("includes/cart/add_cart_item-overview_cart.php"); ?>