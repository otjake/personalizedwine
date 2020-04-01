<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php") ?>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Register'])) {
        $username = $fullname = $email = "";
        $nameErr = $fnameErr = $emailErr = "";

        $password = $_POST['password'];
        $hashed_password = md5($password);
        if (empty($_POST["user_name"])) {
            $nameErr = "Name is Required";
        } else {
            $username = inputtype($_POST["user_name"]);
            // check if name is valid
            if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
                $nameErr = "Only letters and white space allowed";
            } else {
                $cusername = $username;
            }
        }
        if (empty($_POST["email"])) {
            $emailErr = "enter a valid email address";
        } else {
            $email = inputtype($_POST["email"]);
            // check if email syntax is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "enter a valid email address";
            } else {
                $cemail = $email;
            }
        }

        if (empty($_POST["fullname"])) {
            $fnameErr = "Fullname is Required";
        } else {
            $fullname = inputtype($_POST["fullname"]);
            // check if name is valid
            if (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
                $fnameErr = "Only letters and white space allowed";
            } else {
                $cfullname = $fullname;
            }
        }
        if ($nameErr != "" || $emailErr != "" || $fnameErr != "") {
            $Emessage = "Registration failed! Some inputs were filled wrong ";
        } else {
            $check_sql = "SELECT * FROM admins WHERE user_email='{$cemail}'";
            $check_sql_result = mysqli_query($connection, $check_sql);
            if ($check_sql_result->num_rows > 0) {
                $Double_user_error = "This email already exist";
            } else {
                $rsql = "INSERT INTO admins (user_fullname,user_email,user_name,hashed_password,date_created) VALUES ('{$cfullname}','{$cemail}','{$cusername}','{$hashed_password}',NOW())";

                $rsql_result = $connection->query($rsql);

                if ($rsql) {
                    $Smessage = "successfully created";
                } else {
                    $unreg = "Unable to register";
                }
            }
        }
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
                        ?> </h3>
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


    <!-- top row -->
    <div class="row">
        <div class="col-xs-12 connectedSortable">


            <?php
            if (!empty($Smessage)) {
                echo "<p class='alert alert-success'> $Smessage <a  id=\"linkClose\" href=\"register_admin.php\" class=\"close\" >&times;</a></p>";
            }
            if (!empty($Emessage)) {
                echo "<p class='alert alert-danger'> $Emessage<a  id=\"linkClose\" href=\"register_admin.php\" class=\"close\" >&times;</a> </p>";
            }
            if (!empty($Double_user_error)) {
                echo "<p class='alert alert-danger'> $Double_user_error<a  id=\"linkClose\" href=\"register_admin.php\" class=\"close\" >&times;</a> </p>";
            }
            if (!empty($unreg)) {
                echo "<p class='alert alert-danger'> $unreg<a  id=\"linkClose\" href=\"register_admin.php\" class=\"close\" >&times;</a> </p>";
            }


            ?>



            <form method="POST" action="register_admin.php">
                <div class="form-group">
                    <b>FULL NAME
                        <input type="text" class="form-control" required name="fullname" placeholder="FULL NAME" />
                    </b>
                    <?php
                    if (!empty($fnameErr)) {
                        echo "<p class='alert alert-danger'>" . $fnameErr . "</p>";
                    } ?>
                </div>

                <div class="form-group">
                    <b>E-MAIL
                        <input type="email" class="form-control" required name="email" placeholder="E-MAIL" />
                    </b>
                    <?php
                    if (!empty($emailErr)) {
                        echo "<p class='alert alert-danger'>" . $emailErr . "</p>";
                    } ?>
                </div>
                <!--        NEW BLOG FORM-->


                <div class="form-group">
                    <b>USER NAME:
                        <input type="text" class="form-control" required name="user_name" placeholder="USER NAME" />
                    </b>
                    <?php
                    if (!empty($nameErr)) {
                        echo "<p class='alert alert-danger'>" . $nameErr . "</p>";
                    } ?>
                </div>

                <div class="form-group">
                    <b>Password:
                        <input type="password" class="form-control" name="password" placeholder="Prefered Password " />
                    </b>
                </div>
                <!--        <div class="form-group">-->
                <!--            <b>DATE:-->
                <!--                <input type="date" class="form-control"  name="date" placeholder="USER NAME" />-->
                <!--            </b>-->
                <!--        </div>-->
                <button type="submit" id="Register" name="Register" class="btn btn-primary">Register Admin</button>

                <a href="login.php" class="btn btn-primary">Login</a>

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