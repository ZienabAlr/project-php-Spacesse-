<?php


include_once("bootstrap.php");
$conn = Db::getConnection();

if(!empty($_POST)){

        $user= new Student(); 
        $email= $user->setEmail($_POST["email"]); 
        $password= $user->setPassword($_POST["password"]); 

        if(!empty($email) && !empty($password)){
            
            if($user->can_login()){
           
                session_start();
                $_SESSION['user'] = $auth;
                header('location:index.php');
                die ();
                 
            }
            else{

                $error = true; 
            }
               
        }  
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login </title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="signupForm">
        <div class="wrapper">
            <form action=""  method = "post" class="form">

              <h1 class="title">Login</h1>
                 
              <!-- Error -->
              <?php if (isset($error)) : ?>
                <div class="error">
                  <p>
                    Sorry, we can't log you in with that email address and password. Can you try again?
                  </p>
                </div>
              <?php endif; ?>

                <div id="inputContainer">
                    <input type="text" class="input" placeholder="Enter your school email adress" name="email" required="">
                    <label for="" class="label">Email</label>
                </div>

                <div id="inputContainer">
                    <input type="password" class="input" placeholder="a" name= "password">
                    <label for="" class="label">Password</label>
                </div>

                <div id="inputContainer">
                    <!-- <h4>Already have an account? -->
                    <a href="check-email.php" class="login">Forgot your password?</a>
                </div>


                <input type="submit" id="submitBtn" value="Login">

                <div id= "noAccount">
                  <h4>Don't have an account? <a href="signup.php">Sign up</a></h4>

                  <!-- <input type="submit" id="submitBtn" value="Signup"> -->
                </div>
            </form>
        </div>
    </div>
</body>

</html>
