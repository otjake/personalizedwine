<?php
ob_start();
session_start();
include("includes/db.php");
include("includes/functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {

        $username = $password =  "";
        $hashed_password = "";
        $nameErr = $passErr = "";


        if (empty($_POST["user_name"])) {
            $nameErr = "Name is Required";
            echo $nameErr;
        } else {
            $username = ($_POST["user_name"]);
            // check if name is valid
            if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
                $nameErr1 = "Only letters and white space allowed";
                echo $nameErr1;
            } else {
                $cusername = $username;
            }

            if (empty($_POST["password"])) {
                $passErr = "password is Required";
                echo $passErr;
            } else {
                $password = ($_POST["password"]);
                $hashed_password = md5($password);
            }

            if ($nameErr != "" || $passErr != "") {
                $Emessage = "Invalid Details";
            } else {
                $rsql = "SELECT * FROM admins WHERE  user_name='{$cusername}' AND hashed_password='{$hashed_password}'";
                $result = mysqli_query($connection, $rsql);
                $row = mysqli_num_rows($result);
                if ($row > 0) {
                    $data = mysqli_fetch_assoc($result);
                    $_SESSION["username"] = $data["user_name"];
                    $_SESSION["user_email"] = $data["user_email"];

                    header('Location: index.php');
                } else {
                    echo "Login failed";
                    header('Location: login.php');
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Page Title - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-group"><label class="small mb-1" for="inputEmailAddress">USER NAME</label><input class="form-control py-4" type="text" name="user_name" placeholder="Enter UserName" /></div>
                                        <div class="form-group"><label class="small mb-1" for="inputPassword">PASSWORD</label><input class="form-control py-4" name="password" type="password" placeholder="Enter password" /></div>

                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><button type="submit" class="btn btn-primary" value="login" name="login">Login</button></div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2019</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>