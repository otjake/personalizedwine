<?php
include("includes/header.php");


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


    $usql = "UPDATE stock SET category='{$category}',sub_category='{$sub_category}', quantity='{$quantity}',date_created='{$date}' WHERE stock_id='$update_id' ";
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

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>

            <?php
            //ALERT MESSAGES USING URL STRPOS
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($fullUrl, "dmessage=error") == TRUE) {

                echo "  <div id=\"ealert\" class=\"alert alert-danger \">
                 <a  id=\"linkClose\" href=\"allstock.php\" class=\"close\" >&times;</a>
                        <strong>Error!</strong> Something went wrong
                    </div>";
            } elseif (strpos($fullUrl, "dmessage=correct") == TRUE) {

                echo "<div id='salert' class='alert alert-success' >
    <a  id='linkClose' href='allstock.php' class='close'>&times;</a>DELETED</div>";
            }




            // Admin_post_view();
            ?>

            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>STOCK TABLE</div>
                <div class="card-body">

                    <?php
                    if (!empty($Smessage)) {
                        echo "<p class='alert alert-success'> $Smessage  <a  id=\"linkClose\" href=\"allstock.php\" class=\"close\" >&times;</a>
</p>";
                    }
                    if (!empty($Emessage)) {
                        echo "<p class='alert alert-danger'> $Emessage <a  id=\"linkClose\" href=\"allstock.php\" class=\"close\" >&times;</a> </p>";
                    }
                    if (!empty($Emmessage)) {
                        echo "<p class='alert alert-danger'> $Emmessage <a  id=\"linkClose\" href=\"allstock.php\" class=\"close\" >&times;</a></p>";
                    }

                    ?>




                    <form method="POST" action="update.php">


                        <div class="form-group">

                            <input type="number" class="form-control" name="id" value="<?php echo $id_for_update; ?>" />


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
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>