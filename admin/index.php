<?php
include("includes/header.php");

stock_upload_form();


?>

<div id="layoutSidenav_content">

    <main>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">YOU HAVE <?php

                                                $review_query = "SELECT * FROM subscribers";
                                                $reviews_result = mysqli_query($connection, $review_query);                                                                        //counting the rows
                                                $count = mysqli_num_rows($reviews_result);
                                                if ($count > 0) {
                                                    echo $count;
                                                } else {
                                                    echo NULL;
                                                }
                                                ?> SUBSCRIBERS</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="subscribers.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <?php
            if (!empty($Smessage)) {
                echo "<p class='alert alert-success'> $Smessage </p>";
            }
            if (!empty($Emessage)) {
                echo "<p class='alert alert-danger'> $Emessage </p>";
            }
            if (!empty($Emmessage)) {
                echo "<p class='alert alert-danger'> $Emmessage </p>";
            }
            if (!empty($double_code_message)) {
                echo "<p class='alert alert-danger'> $double_code_message </p>";
            }

            ?>

            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>STOCK TABLE</div>
                <div class="card-body">

                    <form method="POST" action="index.php">

                        <div class="form-group">
                            <b>Category:
                                <input type="text" class="form-control" name="category" placeholder="stock category" />

                            </b>
                        </div>
                        <div class="form-group">
                            <b>Sub-Category:
                                <input type="text" class="form-control" name="subcategory" placeholder="stock sub-category" />

                            </b>
                        </div>
                        <div class="form-group">
                            <b>Quantity:
                                <input type="number" class="form-control" name="quantity" placeholder="Quantity" />

                            </b>
                        </div>
                        <div class="form-group">
                            <b>PRODUCT CODE:
                                <input type="text" class="form-control" name="p_code" placeholder="Product Code" required />

                            </b>
                        </div>
                        <div class="form-group">

                            <b>DATE:
                                <input type="date" class="form-control " name="date" placeholder="format-:27 november,2007" />
                            </b>
                        </div>


                        <button type="submit" id="upload" name="upload" class="btn btn-primary">Upload Post</button>
                        <a href="allstock.php" class="btn btn-info">View all stock</a>

                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include("includes/footer.php"); ?>