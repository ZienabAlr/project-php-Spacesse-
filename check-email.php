<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include_once("bootstrap.php");

if (isset($_POST['send_link'])){
  
  $conn = Db::getConnection();
  $reset= new ResetPassword();

  $email= $reset->setEmail($_POST["email"]); 

    // if (!empty($email)){
        $token = bin2hex(random_bytes(50));
        $setTok= $reset->setToken($token);

        $expFormat = mktime(
        date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
        );

        $expDate = date("Y-m-d H:i:s",$expFormat);
        $setExpDate= $reset->setExpire($expDate);

        $mail = new PHPMailer(true);

        $link='href="http://localhost:8888/project-php-Spacesse-/new_pass.php?email='.$email.'&token='. $setTok.'"';
        //$link='href="http://localhost:8888/project-php-Spacesse-/new_pass.php?token='. $setTok.'"';
        $link2 = '<span style="width:100%;"><a style="padding:10px 100px;border-radius:30px;background:#a8edbc;" '.$link.' > Link </a></span>';

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'ispacesse@gmail.com';                     //SMTP username
            $mail->Password   = ' sp-Project2 ';                               //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('from@example.com', 'Spacesse');
           // $mail->addAddress($email);     //Add a recipient
           $mail->addAddress($email); 
            $mail->addReplyTo('no-reply@spacesse.com', 'No reply');


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Reset your password';
            // $mail->Body    = ' <p>Dear '.$email.',</p>
            $mail->Body    = ' <p>Dear '.$email.',</p>
  
            <p>Please click on this link to reset your password:</p> 
            <p>'.$link2.'</p>

            Best wishes,
            <br>
            <span>Spacesse</span>
            ';
            $mail->send();
            $msg = '<h4 class="text-success">Please check your email (including spam) to see the password reset link.</h4>';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        $reset->checkEmail();

    }else {
        $error = "Email does not exist!";
    }

  
       

    // }
//}


?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password </title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="signupForm">
        <div class="wrapper">
            <form action=""  method = "post" class="form">

              <h1 class="title">Reset Password</h1>
                 
              <?php if(isset($msg)){echo $msg;}?>
              <?php if(isset($error)){echo $error;}?>

              <p>Enter the email associated with your account and we'll send an email with instructions to reset your password. </p>

                <div id="inputContainer">
                    <input type="text" class="input" placeholder="Enter your school email adress" name="email" required="">
                    <label for="" class="label">Email</label>
                </div>

                <input type="submit" id="submitBtn" name="send_link" value="Send link">

            </form>
        </div>
    </div>
</body>

</html>
