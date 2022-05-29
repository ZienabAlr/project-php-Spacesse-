<?php
include_once("bootstrap.php");
$conn = Db::getConnection();

$newPass= new ResetPassword(); 
$newPass->newPassword();

/*include_once("bootstrap.php");
$conn = Db::getConnection();
session_start();
$error="";
if(isset($_GET['email']) && isset($_GET['token'])){
    $_SESSION['email'] = $_GET['email'];
    $token = $_GET['token'];
    $curDate = date("Y-m-d H:i:s");
    $stat = $conn ->prepare("SELECT * FROM reset_password WHERE email = ?");
    $stat->execute([$_SESSION['email']]);
    $from_reset = $stat->fetch();
    $expireDate= $from_reset['expDate'];

    if ( $expireDate >= $curDate){
        $valid = true; 
        
    }else{
       
        $error .= "<h2>Link Expired</h2>
        <p>The link is expired. You are trying to use the expired link which 
        as valid only 24 hours (1 days after request).<br /><br /></p>";
    }if($error!=""){
        echo "<div class='error'>".$error."</div><br />";
        }			
}
   
if(isset($_POST['reset'])){
  $newPassword = $_POST['new_pass'];
  $confirmPassword = $_POST['new_pass_conf'];

  if($newPassword == $confirmPassword){

    $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
  
  } else {
      $error = 'Passwords do not match!';
  }
  
   $email = $_SESSION['email'];

  // Update password
  if(empty($error)){
      $statement = $conn->prepare("UPDATE test SET password = ? WHERE email = ?");
      $statement->execute([$hashed_password, $email]);

      $msg = 'Successfully updated your password! <a class="btn btn-success" href="http://localhost:8888/test 2/login.php"> >>Log In</a>';

      session_destroy();
  }

}*/

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php if (isset($valid)):?>
    <div id="signupForm">
        <div class="wrapper">
            <form action=""  method = "post" class="form">

              <h1 class="title">New Password</h1>

              <?php  if(isset($error)){echo $error;} ?>
              <?php if(isset($msg)){echo '<p class="alert-success rounded p-3">'.$msg.'</p>';}?>

              <div id="inputContainer">
                  <input type="password" class="input" placeholder="password" name="new_pass" required="">
                  <label for="" class="label">New Password</label>
              </div>

              <div id="inputContainer">
                  <input type="password" class="input" placeholder="a" name= "new_pass_conf">
                  <label for="" class="label">Confirm Password</label>
              </div>

              <input type="submit" id="submitBtn" name ="reset" value="Submit">

            </form>
        </div>
    </div>
    <?php endif; ?>
</body>

</html>
