<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php") ?>
<?php include("includes/functions.php") ?>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>
<div class="blog-header">

    <!-- <strong>
        <h1 class="blog-title">WELCOME <?php //echo $_SESSION['fullname']; 
                                        ?></h1>
    </strong> -->

    <h1 class="blog-title"> CLIENT RESOURCES</h1>
</div>
<div class="new_blog">


    <ul>
        <li><a href="index.php">Review Management</a></li>
        <li><a href="newsletter.php">Newsletter</a></li>

    </ul>
    <hr>
    <div>

        <?php
        //ALERT MESSAGES USING URL STRPOS
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if (strpos($fullUrl, "dmessage=error") == TRUE) {

            echo "  <div id=\"ealert\" class=\"alert alert-danger \">
                 <a  id=\"linkClose\" href=\"#\" onclick='myFunction()'class=\"close\" >&times;</a>
                        <strong>Error!</strong> Something went wrong
                    </div>";
        } elseif (strpos($fullUrl, "dmessage=correct") == TRUE) {

            echo "<div id='salert' class='alert alert-success' >
    <a  id='linkClose' href='#' onclick='myFunction()' class='close'>&times;</a>DELETED</div>";
        }


        //ALERT MESSAGES USING URL STRPOS
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if (strpos($fullUrl, "Amessage=error") == TRUE) {

            echo "  <div id=\"ealert\" class=\"alert alert-danger \">
                 <a  id=\"linkClose\" href=\"#\" onclick='myFunction()' class=\"close\" >&times;</a>
                        <strong>Error!</strong> Something went wrong
                    </div>";
        } elseif (strpos($fullUrl, "Amessage=correct") == TRUE) {

            echo "<div id='salert' class='alert alert-success' >
    <a  id='linkClose' href='#' onclick='myFunction()' class='close'>&times;</a>Updated</div>";
        }


        ?>
        <?php
        //index.php

        $error = '';
        $name = '';
        $email = '';
        $subject = '';
        $message = '';

        function clean_text($string)
        {
            $string = trim($string);
            $string = stripslashes($string);
            $string = htmlspecialchars($string);
            return $string;
        }

        if (isset($_POST["submit"])) {
            if (empty($_POST["name"])) {
                $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
            } else {
                $name = clean_text($_POST["name"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                    $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
                }
            }

            if (empty($_POST["subject"])) {
                $error .= '<p><label class="text-danger">Subject is required</label></p>';
            } else {
                $subject = clean_text($_POST["subject"]);
            }
            if (empty($_POST["message"])) {
                $error .= '<p><label class="text-danger">Message is required</label></p>';
            } else {
                $message = clean_text($_POST["message"]);
            }
            if ($error == '') {
                $mail_sql = "SELECT * FROM subscribers";
                $result_mail_sql = mysqli_query($connection, $mail_sql);
                if ($result_mail_sql->num_rows > 0) {
                    while ($rows = mysqli_fetch_assoc($result_mail_sql)) {
                        $sub_email = $rows['email'];

                        require_once 'PHPMailerAutoload.php';

                        $mail = new PHPMailer;
                        $mail->isSMTP();

                        /*
             * Server Configuration
             */

                        $mail->Host = 'smtp.gmail.com'; // Which SMTP server to use.
                        $mail->Port = 587; // Which port to use, 587 is the default port for TLS security.
                        $mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
                        $mail->SMTPAuth = true; // Whether you need to login. This is almost always required.
                        $mail->Username = "jaketuriacada@gmail.com"; // Your Gmail address.
                        $mail->Password = "Ryokaobodo35"; // Your Gmail login password or App Specific Password.
                        $mail->From = "jaketuriacada@gmail.com";     //Sets the From email address for the message
                        $mail->FromName = $_POST["name"];    //Sets the From name of the message
                        $mail->AddAddress($sub_email, ''); //Adds a "To" address
                        // $mail->AddCC($_POST["email"], $_POST["name"]); //Adds a "Cc" address
                        $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
                        $mail->IsHTML(true);       //Sets message type to HTML    
                        $mail->Subject = $_POST["subject"];    //Sets the Subject of the message
                        $message1 = $_POST["message"];
                        $mail->Body = "<html> 
                        
<div>
    <p>
      
              <div style='text-align:center;background:rgb(255, 255, 255);width:100%;line-height:26px; height:60%;margin:auto;border-radius:1rem;margin-top:50px;margin-bottom:57px;'>

      <div style='text-align:center;background: rgb(27, 27, 27); width:100%; height:60px;margin-top:3rem; '>
        <h2 style='padding-top:2%;color:rgb(255, 255, 255)  ;'>PERSONALIZED WINE</h2>
      </div>
          <div style='background:rgb(255, 255, 255) ;width:80%;margin:auto;margin-top:2px;border-radius:2rem;'>
<div style='text-align: left;'>
      Hi there,   
       <br>
       As promised our preferential update for you from our website
      https://ecommerse-stage.000webhostapp.com
          <br>
          <p style='text-align: center;'>
         $message1
          
          </p>
          </div>
      </div>
    </p>
    <div style='background: url('product_image/banner5.jpg') center/cover no-repeat;display: flex;width: 100%;height: 20%;'>
      <div style='text-align:center;background: rgb(27, 27, 27);width:100%; height:70px;opacity: 0.5; height: 100%;'>
<h2 style='color: white;opacity: 1;margin: 54px;'>PERSONALIZED WINE</h2>      </div>
    </div>
    </div>
<div>
  <h6>You have received this email because you are registered at 000webhost.com<br>
    000webhost.com All rights reserved. 2020 pixel
</h6>
</div>
  </div>
 </html>

";
                        //An HTML or plain text message body
                        if ($mail->Send())        //Send an Email. Return true on success or false on error
                        {
                            $error = '<label class="text-success">Thank you for contacting us</label>';
                        } else {
                            $error = '<label class="text-danger">There is an Error</label>';
                        }
                        $name = '';
                        $email = '';
                        $subject = '';
                        $message = '';
                    }
                }
            }
        }

        ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="margin:0 auto; float:none;">
                <br />
                <?php echo $error; ?>
                <form method="post">

                    <div class="form-group">
                        <label>Enter Name</label>
                        <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
                    </div>

                    <div class="form-group">
                        <label>Enter Subject</label>
                        <input type="text" name="subject" class="form-control" placeholder="Enter Subject" value="<?php echo $subject; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Enter Message</label>
                        <textarea name="message" class="form-control" placeholder="Enter Message"><?php echo $message; ?></textarea>
                    </div>
                    <div class="form-group" align="center">
                        <input type="submit" name="submit" value="Submit" class="btn btn-info" />
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>
<br>
<br>
<br>
<!--        NEW BLOG FORM-->

<!--BLOGS-->


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
<script>
    function myFunction() {
        location.replace("customer.php");
    }
</script>

<script type='text/javascript'>
    // confirm record deletion
    function delete_review(post_id) {

        var answer = confirm('Are you sure?');
        if (answer) {

            window.location = 'delete_review.php?posts=' + post_id;
        }
    }
</script>
<?php include("includes/footer.php"); ?>