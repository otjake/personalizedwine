<?php
include("includes/header.php");
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

                require 'mail/PHPMailerAutoload.php';
                date_default_timezone_set('UTC');
                //Admin email configuration
                $admin_mail = new PHPMailer;

                //sumbission data
                $ipaddress = $_SERVER['REMOTE_ADDR'];
                $date = date('d/m/Y');
                $time = date('H:i:s');

                // TODO: set email server host email address
                $emailfrom = "service@personalizedwineng.com";


                //$admin_mail->SMTPDebug = 3;                               // Enable verbose debug output

                $admin_mail->isSMTP();                                      // Set mailer to use SMTP
                $admin_mail->Host = 'server270.web-hosting.com';  // Specify main and backup SMTP servers
                $admin_mail->SMTPAuth = true;                               // Enable SMTP authentication
                $admin_mail->Username = 'service@personalizedwineng.com';                 // SMTP username
                $admin_mail->Password = 'PersonalizedWine123*';                           // SMTP password
                $admin_mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                $admin_mail->Port = 465;                                    // TCP port to connect to
                try {
                    $admin_mail->setFrom($emailfrom);
                } catch (phpmailerException $e) {
                }
                $admin_mail->addAddress($sub_email);     // Add a recipient
                // $admin_mail->addAddress('ellen@example.com');               // Name is optional
                $admin_mail->addCC('jaketuriacada@gmail.com');

                $admin_mail->isHTML(true); // Set email format to HTML

                $admin_mail->Subject = '$_POST["subject"]';
                $message1 = $_POST["message"];


                $admin_mail->Body = "<html> 
                        
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
     <a href='https://personalizedwineng.com'>PersonalizedWine</a>
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
  <h6>You have received this email because you are registered at <a href='https://personalizedwineng.com'>PersonalizedWineng.com</a>
<br>
  <a href='https://personalizedwineng.com'>PersonalizedWineng.com</a> All rights reserved. 2020
</h6>
</div>
  </div>
 </html>

";
                if ($admin_mail->Send())        //Send an Email. Return true on success or false on error
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
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">MESSAGE</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Drop emails</li>
            </ol>


            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>NEWS LETTER</div>
                <div class="card-body">

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
    </main>
    <?php include("includes/footer.php"); ?>