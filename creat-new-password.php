<?php

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>resetPassword </title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="signupForm">
        <div class="wrapper">
            <!-- <form action="includes/reset-request.inc.php"  method = "post" class="form"> -->

              <!-- <h1 class="title">Reset password</h1> 
                 
              <p>Enter the email associated with your account and we'll send an email with instructions to reset your password. </p>

                <div id="inputContainer">
                <input type="text" name ="email" placeholder ="Enter your e-mail adress...">
                    <label for="" class="label">Email</label>
                </div>

                <input type="submit" id="submitBtn" name = "reset-request-submit" value="Send link"> 


                <div id="inputContainer">
                    <input type="text" class="input" placeholder="a" name= "password">
                    <label for="" class="label">Password</label>
                </div>
            </form>-->
            <?php

               $selector = $_GET["selector "]; 
               $validator = $_GET["validator "]; 

               if (empty($selector)|| empty($validator)){
                   echo "Could not validate your request!"
               }else {
                   if(ctype_xdigit($selector) == true && ctype_xdigit($selector) == true ){

                    ?>
                     <form action="includes/reset-password.inc.php"  method = "post" class="form">

                        <input type="hidden" name= "selector" value= "<?php echo $selector; ?>" >
                        <input type="hidden" name= "vlidator" value= "<?php echo $validator; ?>" >
                        <input type="password" name= "pwd" placeholder= "Enter a new password... " >
                        <input type="password" name= "pwd-repeat" placeholder= "Repeat a new password... " >
                        <input type="submit" id="submitBtn" name = "reset-password-submit" value="Reset password"> 

                     </form>


                    <?php

                   }
               }
            ?>
        </div>
    </div>
</body>

</html>
