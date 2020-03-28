<?php require_once("includes/db.php"); ?>
<?php
$cquery = "SELECT * FROM categories";
$result = mysqli_query($connection, $cquery);


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BlogCMS</title>

    <!-- Bootstrap core CSS -->
    <!-- fontawesome online -->
    <link href="https://fonts.googleapis.com/css?family=Abel|Bellota+Text|Montserrat|Raleway&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/760c3d66bf.js" crossorigin="anonymous"></script>
    <script src="includes/jquery-3.4.1.js"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <!-- fontawesome online -->
    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">
    <link href="css/fontawesome.min.css" type="text/css" rel="stylesheet">


</head>

<body>

    <div class="blog-masthead">
        <div class="container">
            <nav class="blog-nav">
                <?php
                if (isset($_GET['category'])) { //active page indication
                    echo "<a class='blog-nav-item' href='index.php'>Home</a>";
                } else {
                    echo "<a class='blog-nav-item active ' href='index.php'>Home</a>";
                }
                //getting nav ctegories dynamically.
                if ($result->num_rows > 0) {
                    while ($rows = mysqli_fetch_array($result)) {
                        if (isset($_GET['category']) && $rows['id'] == $_GET['category']) { //active page indication
                            echo "<a class='blog-nav-item active' href='index.php?category=" . urlencode($rows['id']) . "' >" . $rows['cat_title'] . "</a>";
                        } else {
                            echo "<a class='blog-nav-item' href='index.php?category=" . urlencode($rows['id']) . "' >" . $rows['cat_title'] . "</a>";
                        }
                    }
                    echo "<a class='blog-nav-item' href='subscribe.php' style='float: right;'>Subscribe</a>";
                }
                ?>


            </nav>
        </div>
    </div>

    <div class="container">



        <div class="row">

            <div class="col-sm-8 blog-main">