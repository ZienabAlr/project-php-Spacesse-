<?php
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
  
        $reset->checkEmail();

    // }
}


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
