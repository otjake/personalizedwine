<?php
ob_start();
session_start();
include("includes/db.php");
include("includes/functions.php");

if (!isset($_SESSION['username']) && !isset($_SESSION["user_email"])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">PERSONALIZED WINE</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->

        <!-- <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form> -->
        <!-- Navbar-->

        <ul class="navbar-nav ml-auto ml-md-0">
            <li class=" <?php if ($category == 'notifications') {
                            echo 'active';
                        } ?> dropdown" style="margin-left: 50%;">
                <a href="review.php" class="nav-link dropdown-toggle" role="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <i class="fa fa-envelope"></i> <span class="badge badge-danger"><?php
                                                                                    $review_query = "SELECT * FROM reviews WHERE display=0 order by id desc ";
                                                                                    $reviews_result = mysqli_query($connection, $review_query);                                                                        //counting the rows
                                                                                    $count = mysqli_num_rows($reviews_result);
                                                                                    if ($count > 0) {
                                                                                        echo $count;
                                                                                    } else {
                                                                                        echo NULL;
                                                                                    }
                                                                                    ?></span>
                </a>


                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <?php
                    $reviews_query = "SELECT * FROM reviews WHERE display=0 order by id desc ";
                    $reviews_result = mysqli_query($connection, $reviews_query);
                    // $reviews = get_reviews();
                    if ($reviews_result->num_rows > 0) {
                        while ($rows = mysqli_fetch_assoc($reviews_result)) {

                    ?>
                            <a class="dropdown-item" href="review.php">
                                <small><?php echo $rows['date_created']; ?></small>
                                <p><?php echo $rows['name']; ?> left a comment</p>
                            </a>
                            <div class="dropdown-divider"></div>

                    <?php
                        }
                    } else {
                        echo "No New Comments";
                    }
                    ?>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="Admin_logout.php">Logout</a>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            STOCK
                        </a>
                        <a class="nav-link" href="product.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            PRODUCT
                        </a>
                        <a class="nav-link" href="register_admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            ADD ADMIN
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            CUSTOMER
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="review.php">REVIEW MANAGEMENT</a><a class="nav-link" href="newsletter.php"> NEWSLETTER</a></nav>
                        </div>
                        <a class="nav-link collapsed" href="transaction_details.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            TRANSACTION DETAILS
                        </a>


                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:<?php echo $_SESSION['username']; ?>
                    </div>

                </div>
            </nav>
        </div>