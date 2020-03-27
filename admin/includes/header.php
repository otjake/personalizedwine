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
            <ul>
                <li class="<?php if ($category == 'posts') {
                                echo 'active';
                            } ?>"><a href="index.php">STOCKS</a></li>
                <li class="<?php if ($category == 'visitors') {
                                echo 'active';
                            } ?>"><a href="product.php">PRODUCTS</a></li>
                <li class="<?php if ($category == 'register_admin') {
                                echo 'active';
                            } ?>"><a href="register_admin.php">ADD&nbspADMIN</a></li>
                <li class="<?php if ($category == 'customers') {
                                echo 'active';
                            } ?>"><a href="customer.php">CUSTOMERS</a></li>

                <ul>
        </div>
    </div>


    <div class="container">



        <div class="row">

            <div class="col-sm-12 blog-main">