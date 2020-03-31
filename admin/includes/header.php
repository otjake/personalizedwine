<?php require_once("includes/db.php"); ?>
<?php include("includes/functions.php") ?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>AdminLTE | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <!-- bootstrap 3.0.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-black">
    <!-- header logo: style can be found in header.less -->
    <header class="header">
        <a href="index.php" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            PERSONALIZED WINE
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope"></i>
                            <span class="label label-success"><?php
                                                                // getting all posts
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
                        <ul class="dropdown-menu">
                            <li class="header">You have <?php echo $count; ?> messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <?php
                                    $reviews_query = "SELECT * FROM reviews WHERE display=0 order by id desc ";
                                    $reviews_result = mysqli_query($connection, $reviews_query);
                                    // $reviews = get_reviews();
                                    if ($reviews_result->num_rows > 0) {
                                        while ($rows = mysqli_fetch_assoc($reviews_result)) {

                                    ?>
                                            <li>
                                                <!-- start message -->
                                                <a href="review.php">

                                                    <h4>
                                                        <?php echo $rows['name']; ?>

                                                        <small><i class="fa fa-clock-o"></i><?php echo $rows['date_created']; ?></small>
                                                    </h4>

                                                </a>
                                            </li>
                                    <?php
                                        }
                                    } else {
                                        echo "No New Reviews";
                                    }
                                    ?>
                                    <!-- end message -->
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span> <?php echo  $_SESSION['username']; ?>
                                <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <p>
                                    <?php echo  $_SESSION['username']; ?>
                                    <small>Member since <?php echo $_SESSION['date'];
                                                        ?></small>

                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="Admin_logout.php" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left info">
                        <p>Hello, Jane</p>

                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="active">
                        <a href="index.php">
                            <i class="fa fa-dashboard"></i> <span>STOCKS</span>
                        </a>
                    </li>
                    <li>
                        <a href="product.php">
                            <i class="fa fa-th"></i> <span>PRODUCTS</span>
                            <small class="badge pull-right bg-green">new</small>
                        </a>
                    </li>
                    <li>
                        <a href="register_admin.php">
                            <i class="fa fa-bar-chart-o"></i>
                            <span>ADD ADMIN</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>CUSTOMERS</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="review.php"><i class="fa fa-angle-double-right"></i> REVIEWS
                                    MANAGEMENT</a>
                            </li>
                            <li>
                                <a href="newsletter.php"><i class="fa fa-angle-double-right"></i> NEWSLETTER</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="review.php">
                            <i class="fa fa-envelope"></i> <span>Mailbox</span>
                            <small class="badge pull-right bg-yellow"><?php
                                                                        // getting all reviews
                                                                        $review_query = "SELECT * FROM reviews order by id desc ";
                                                                        $reviews_result = mysqli_query($connection, $review_query);                                                                        //counting the rows
                                                                        $count = mysqli_num_rows($reviews_result);
                                                                        if ($count > 0) {
                                                                            echo $count;
                                                                        } else {
                                                                            echo NULL;
                                                                        }
                                                                        ?></small>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>