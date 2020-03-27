<?php include("includes/header.php") ?>
<!-- <?php include("includes/functions.php")
        ?> -->
<?php
//select and echo previous value query
if (isset($_GET['up_id'])) {
    $id = $_GET['up_id'];
    $psql = "SELECT stock.* FROM stock WHERE stock.stock_id={$id}";
    $result_psql = mysqli_query($connection, $psql);
    if ($result_psql->num_rows > 0) {
        while ($rows = mysqli_fetch_assoc($result_psql)) {
            $id_for_update = $rows['stock_id'];
            $category = $rows['category'];
            $sub_category = $rows['sub_category'];
            $quantity = $rows['quantity'];
            $product_code = $rows['product_code'];
        }
    }
}

//update query
if (isset($_POST['update'])) {
    $update_id = ($_POST['id']);
    $category = ($_POST['category']);
    $sub_category = ($_POST["subcategory"]);
    $quantity = ($_POST["quantity"]);
    $p_code = ($_POST["p_code"]);
    $date = date('Y-m-d H:i:s');


    $usql = "UPDATE stock SET category='{$category}',sub_category='{$sub_category}', quantity='{$quantity}',date_updated='{$date}' WHERE stock_id='$update_id' ";
    $result_usql = mysqli_query($connection, $usql);
    if ($result_usql) {
        $Smessage = "Successfully Updated";
        echo "<script>alert('Stock updated')</script>";
        echo "<script>window.open('allstock.php,'_self')</script>";
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



    <form method="POST" action="update.php">


        <div class="form-group">

            <input type="hidden" class="form-control" name="id" value="<?php echo $id_for_update; ?>" />


        </div>

        <div class="form-group">
            <b>Category:
                <input type="text" class="form-control" name="category" value="<?php echo $category; ?>" />

            </b>
        </div>
        <div class="form-group">
            <b>Sub-Category:
                <input type="text" class="form-control" name="subcategory" value="<?php echo $sub_category; ?>" />

            </b>
        </div>
        <div class="form-group">
            <b>Quantity:
                <input type="number" class="form-control" name="quantity" value="<?php echo $quantity; ?>" />

            </b>
        </div>
        <div class="form-group">

            <input type="hidden" class="form-control" name="p_code" value="<?php echo $product_code; ?>" />


        </div>
        <!-- <div class="form-group">
            <b>DATE:
                <input type="date" class="form-control" name="date" placeholder="format-:27 november,2007" />
            </b>
        </div> -->


        <button type="submit" id="upload" name="update" class="btn btn-primary">Update Stock</button>
        <a href="allstock.php" class="btn btn-danger">Cancel</a>


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