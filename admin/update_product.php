<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php") ?>
<!-- <?php include("includes/functions.php")
        ?> -->
<?php
//select and echo previous value query
if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];
    $psql = "SELECT product.* ,stock.category, stock.sub_category FROM product JOIN stock ON product.product_code=stock.product_code WHERE product_id='{$id}'";
    $result_psql = mysqli_query($connection, $psql);
    if ($result_psql->num_rows > 0) {
        while ($rows = mysqli_fetch_assoc($result_psql)) {
            $id_for_update = $rows['product_id'];
            $product_name = $rows['product_name'];
            $product_desc = $rows['product_desc'];
            $product_price = $rows['product_price'];
            $product_image = $rows['product_image'];
            $category = $rows['category'];
            $sub_category = $rows['sub_category'];
            $product_code = $rows['product_code'];
            $keyword = $rows['keyword'];
        }
    }
}

//update query
if (isset($_POST['update'])) {
    $update_id = ($_POST['id']);
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name']; //geting name of the image;
    $product_image_tmp = $_FILES['product_image']['tmp_name']; //getting image temporary name on the server
    move_uploaded_file($product_image_tmp, "product_image/$product_image"); //the function move_uploaded_file moves image from tmp storage to folder
    $product_code = $_POST['product_code'];
    $keyword = $_POST['keyword'];
    $date = date('Y-m-d H:i:s');


    $usql = "UPDATE product SET product_name='{$product_name}',product_desc='{$product_desc}',product_price='{$product_price}',product_image='{$product_image}',product_code='{$product_code}',keyword='{$keyword}',date_updated='{$date}' WHERE product_id='$update_id' ";
    $result_usql = mysqli_query($connection, $usql);
    if ($result_usql) {
        echo "<script>alert('Stock updated')</script>";
        header('Location:allproduct.php');
    } else {

        $Emessage = " Unable to Update";
    }
}


?>

<div class="blog-header">

    <br>
    <h1 class="blog-title"> UPDATE STOCK</h1>
</div>
<div class="new_blog">

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

    ?>



    <form method="POST" action="update_product.php" enctype="multipart/form-data">


        <div class="form-group">

            <input type="hidden" class="form-control" name="id" value="<?php echo $id_for_update; ?>" />


        </div>
        <div class="form-group">
            <b>Product Name:
                <input type="text" class="form-control" name="product_name" value="<?php echo $product_name; ?>" />

            </b>
        </div>

        <div class="form-group">
            <b>Product Description:
                <input type="text" class="form-control" name="product_desc" value="<?php echo $product_desc; ?>" />

            </b>
        </div>
        <div class="form-group">
            <b>Price:
                <input type="number" class="form-control" name="product_price" value="<?php echo $product_price; ?>" />

            </b>
        </div>
        <div class="form-group">
            <b>Image:
                <input type="file" name="product_image" placeholder="front" /><img src="product_image/<?php echo $product_image; ?>" height="150px" width="60px" />

            </b>
        </div>
        <div class="form-group">
            <b>Category:
                <input type="text" class="form-control" name="category" value="<?php echo $category; ?>" readonly />

            </b>
        </div>
        <div class="form-group">
            <b>Sub-Category:
                <input type="text" class="form-control" name="subcategory" value="<?php echo $sub_category; ?>" readonly />

            </b>
        </div>

        <div class="form-group">
            <b>Product Code:
                <input type="text" class="form-control" name="product_code" value="<?php echo $product_code; ?>" />

            </b>

        </div>

        <div class="form-group">
            <b>Keyword:
                <input type="text" class="form-control" name="keyword" value="<?php echo $keyword; ?>" />
            </b>


        </div>


        <button type="submit" id="upload" name="update" class="btn btn-primary">Update Product</button>
        <a href="allproduct.php" class="btn btn-danger">Cancel</a>


    </form>


</div>
<br>
<br>
<br>
<!--        NEW BLOG FORM-->

<!--BLOGS-->

<div>

    <?php


    ?>
</div>
<!--BLOGS-->
<br>
<br>





</div><!-- /.blog-main -->
<script>
    $(document).ready(function() {
        //jquery function to show alert using the submit button
        $('#upload').click(function() {
            $('#ealert').show('fade');

            //jquery function to close alert within 2 seconds
            setTimeout(function() {
                $('#ealert').hide('fade');
            }, 2000);
        });
        //jquery function to close alert using the cross button
        $('#linkClose').click(function() {
            $('#ealert').hide('fade');
        });
    });


    $(document).ready(function() {
        //jquery function to show alert using the submit button
        $('#upload').click(function() {
            $('#alert').show('fade');

            //jquery function to close alert within 2 seconds
            setTimeout(function() {
                $('#salert').hide('fade');
            }, 2000);
        });
        //jquery function to close alert using the cross button
        $('#linkClose').click(function() {
            $('#salert').hide('fade');
        });
    });
</script>
<?php include("includes/footer.php"); ?>