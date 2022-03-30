<?php
// include_once(__DIR__ . "/classes/User.php"); // Ik heb deze omgewissled met include_once("bootstarp.php"); ik heb een bootstrap.php map gemaakt en de DIR daar geplaatst zo maken we ons code korter!s (Zienab) 
include_once("bootstrap.php");

if (!empty($_POST)) {
  //email en password opvragen
  $email = htmlspecialchars($_POST['email']);
  $password = $_POST['password'];
  $user = $_POST['user'];
}
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Spacesse</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
  <!-- CSS Files -->
  <!-- <link rel="stylesheet" href="css/style.css"> 
</head>

<body>-->
<!--<?php //include_once(__DIR__ . "/includes/header.inc.php"); ?> !-->


  <!-- <div class="container"> 

    <form class="form" method="post" action="">

      <h4>Login</h4>-->

        <!-- Error -->
        <!-- <div class="header">
        
          <?php //if (isset($error)) : ?>
            <div>
              <p>
                Sorry, we can't log you in with that email address and password. Can you try again?
              </p>
            </div>
          <?php //endif; ?>

        </div>

      <div>

        <div class="form-group"> -->
          <!-- <input type="text" name="email" id="email" class="form-control" placeholder="Email..."> - placeholder: Een Placeholder is een tijdelijk type content dat later vervangen zal worden met de definitieve media, dit is dus enkel zichtbaar indien de officiele tekst nog niet beschikbaar is -charlotte - 
        </div>

        <div class="form-group">
          <input type="password" id="password" name="password" placeholder="Password...">
        </div>

      </div>


      <input class="" type="submit" value="Login" class="submit">

      <a href="register.php">Not an account yet? Sign up here!</a>
    
    </form>

    

  </div>
</body>

</html>-->

<!DOCTYPE html>
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
                    <input type="text" class="input" placeholder="a">
                    <label for="" class="label">Password</label>
                </div>

                <div id="inputContainer">
                    <!-- <h4>Already have an account? -->
                        <a href="#" class="login">Forgot your password?</a></h4>
                </div>


                <input type="submit" id="submitBtn" value="Login">

                <div id= "noAccount">
                  <h4>Don't have an account?</h4>

                  <input type="submit" id="submitBtn" value="Signup">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
