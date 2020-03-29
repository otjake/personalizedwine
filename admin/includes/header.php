<?php require_once("includes/db.php"); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BlogCMS</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




</head>

<body>




    <div class="blog-masthead">
        <div class="container">
            <nav>
                <ul>
                    <li class="<?php if ($category == 'stocks') {
                                    echo 'active';
                                } ?>"><a href="index.php">STOCKS</a></li>
                    <li class="<?php if ($category == 'products') {
                                    echo 'active';
                                } ?>"><a href="product.php">PRODUCTS</a></li>
                    <li class="<?php if ($category == 'register_admin') {
                                    echo 'active';
                                } ?>"><a href="register_admin.php">ADD&nbspADMIN</a></li>
                    <li class="<?php if ($category == 'customers') {
                                    echo 'active';
                                } ?>"><a href="customer.php">CUSTOMERS</a></li>
                    <li class=" <?php if ($category == 'notifications') {
                                    echo 'active';
                                } ?> dropdown" style="margin-left: 50%;">
                        <a href="#" role="button" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            NOTIFICATIONS <span class="badge badge-danger"><?php
                                                                            // getting all posts
                                                                            $review_query = "SELECT * FROM reviews order by id desc ";
                                                                            $reviews_result = mysqli_query($connection, $review_query);                                                                        //counting the rows
                                                                            $count = mysqli_num_rows($reviews_result);
                                                                            if ($count > 0) {
                                                                                echo $count;
                                                                            } else {
                                                                                echo NULL;
                                                                            }
                                                                            ?></span>
                        </a>


                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
                            <?php
                            $reviews_query = "SELECT * FROM reviews order by id desc ";
                            $reviews_result = mysqli_query($connection, $reviews_query);
                            // $reviews = get_reviews();
                            if ($reviews_result->num_rows > 0) {
                                while ($rows = mysqli_fetch_assoc($reviews_result)) {

                            ?>
                                    <a class="dropdown-item" href="customer.php">
                                        <small><?php echo $rows['date_created']; ?></small>
                                        <p><?php echo $rows['name']; ?> left a review</p>
                                    </a>
                                    <div class="dropdown-divider"></div>

                            <?php
                                }
                            } else {
                                echo "No New Reviews";
                            }
                            ?>
                        </div>
                    </li>
                    <ul>
        </div>
    </div>
    </nav>

    <div class="container">



        <div class="row">

            <div class="col-sm-12 blog-main">