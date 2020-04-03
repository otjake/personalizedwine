<?php
include("includes/header.php");

product_upload_form();
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>STOCK TABLE</div>
                <div class="card-body">

                    <?php
                    if (!empty($Smessage)) {
                        echo "<p class='alert alert-success'> $Smessage <a  id=\"linkClose\" href=\"product.php\" class=\"close\" >&times;</a></p>";
                    }
                    if (!empty($Emessage)) {
                        echo "<p class='alert alert-danger'> $Emessage<a  id=\"linkClose\" href=\"product.php\" class=\"close\" >&times;</a> </p>";
                    }


                    ?>



                    <form method="POST" action="product.php" enctype="multipart/form-data">

                        <div class=" form-group">
                            <b>Product Name:
                                <input type="text" class="form-control" name="product_name" placeholder="product name" />

                            </b>
                        </div>
                        <div class="form-group">
                            <b>Product Description:
                                <textarea name="product_desc" col="20" row="10" placeholder="describe product"></textarea>
                            </b>
                        </div>
                        <div class="form-group">
                            <b>Product price:
                                <input type="number" class="form-control" name="product_price" placeholder="price" />

                            </b>
                        </div>
                        <div class="form-group">
                            <b>Product Image:
                                <input type="file" class="form_control" name="product_image" placeholder="front" />
                            </b>
                        </div>
                        <div class="form-group">
                            <b>PRODUCT CODE:
                                <input type="text" class="form-control" name="product_code" placeholder="Product Code" required />
                                <span style="color: red">*Make sure your code is in your stock database</span>

                            </b>
                        </div>
                        <div class="form-group">
                            <b>DATE:
                                <input type="date" class="form-control" name="date" placeholder="format-:27 november,2007" />
                            </b>
                        </div>
                        <div class="form-group">
                            <b>KEY WORD:
                                <input type="text" class="form-control" name="keyword" placeholder="Enter a key word to aid search" required />

                            </b>
                        </div>

                        <button type="submit" id="uploadp" name="uploadp" class="btn btn-primary">Upload Product</button>
                        <a href="allproduct.php" class="btn btn-info">View all Product</a>

                    </form>

                </div>
            </div>
        </div>
    </main>

    <?php include("includes/footer.php"); ?>