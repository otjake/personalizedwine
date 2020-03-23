<?php include("includes/functions.php"); ?>
<?php require_once("includes/db.php"); ?>
<?php subscribe_reg(); ?>

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

    <!-- NAVBAR -->

    <nav class="menu1">
        <ul class="menu">
            <li><a href="#home" data-toggle="modal" data-target="#exampleModal">Client service</a></li>
        </ul>
        <div class="utility">
            <span>
                <i class="fas fa-search " onclick="opensearch()"> </i>
            </span>
            &nbsp;&nbsp;&nbsp;
            <a href="emptycart.php">
                <span>
                    <i class="fas fa-cart-plus "></i>
                </span>
            </a>
            <div class="cart-items">0</div>

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

    <!-- end of navbar -->


    <div class="cart-top" style="background: #f8f8f8;">
        <a href="index.php"><i class="fas fa-home"></i>HOME</a>
    </div>

    <!-- end hero -->

    <div class="col-md-12 p-0 feature">
        <div id="horizontal-line_terms"></div>
        <div class="feature-inner">
            <h2>TERMS AND CONDITIONS</h2>

        </div>
        <!-- </div> -->
    </div>


    <!-- ==== footer section end ==== -->
    <?php include("includes/footer.php"); ?>