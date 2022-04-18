<!DOCTYPE html>
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
            <form action="includes/reset-request.inc.php"  method = "post" class="form">

              <h1 class="title">Reset password</h1>
                 
              <p>Enter the email associated with your account and we'll send an email with instructions to reset your password. </p>

                <div id="inputContainer">
                <input type="text" name ="email" placeholder ="Enter your e-mail adress...">
                    <label for="" class="label">Email</label>
                </div>

                <input type="submit" id="submitBtn" name = "reset-request-submit" value="Send link"> 
            </form>
            <?php

                if (isset($_GET["reset"])){ // hier gaat get de url checken voor de reset statement 
                    if ($_GET["reset"]== "success"){ // als de link hierboven bestaat en is gelijkaan "success" dan gaat de gebruiker het bericht hieronder krijgen  
                        echo '<p class="signupsuccess">Check your e-mail!</p>'; 
                    }
                }
            ?>
        </div>
    </div>
</body>

</html>
