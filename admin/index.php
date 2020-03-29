<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php") ?>
<?php
stock_upload_form();
$category = 'stocks';

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
            <?php
            // getting all reviews
            $review_query = "SELECT * FROM subscribers";
            $reviews_result = mysqli_query($connection, $review_query);                                                                        //counting the rows
            $count = mysqli_num_rows($reviews_result);
            if ($count > 0) {
              echo $count;
            } else {
              echo NULL;
            }
            ?>
          </h3>
          <p>
            User Registrations
          </p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">
          More info <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>

    <!-- ./col -->
  </div>
  <!-- /.row -->

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

  <!-- top row -->
  <div class="row">
    <div class="col-xs-12 connectedSortable">


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
<?php
//ALERT MESSAGES USING URL STRPOS
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($fullUrl, "dmessage=error") == TRUE) {

  echo "  <div id=\"ealert\" class=\"alert alert-danger \">
                 <a  id=\"linkClose\" href=\"#\" class=\"close\" >&times;</a>
                        <strong>Error!</strong> Something went wrong
                    </div>";
} elseif (strpos($fullUrl, "dmessage=correct") == TRUE) {

  echo "<div id='salert' class='alert alert-success' >
    <a  id='linkClose' href='#' class='close'>&times;</a>DELETED</div>";
}




// Admin_post_view();
?>
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
<!-- jQuery 2.0.2 -->
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