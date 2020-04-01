<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php") ?>
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

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        150
                    </h3>
                    <p>
                        New Orders
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        44
                    </h3>
                    <p>
                        User Registrations
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="subscribers.php" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- ./col -->
    </div>
    <!-- /.row -->

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

    <!-- top row -->
    <div class="row">
        <div class="col-xs-12 connectedSortable">
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
    </div>



    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->

    <!-- /.box -->
</section>
<!-- right col -->
</div>
<!-- /.row (main row) -->
</section>
<!-- /.content -->
</aside>
<!-- /.right-side -->
</div>
<!-- ./wrapper -->

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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>
</body>

</html>