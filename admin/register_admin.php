<?php
include("includes/header.php");




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
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>