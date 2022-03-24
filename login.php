<?php
// include_once(__DIR__ . "/classes/User.php"); // Ik heb deze omgewissled met include_once("bootstarp.php"); ik heb een bootstrap.php map gemaakt en de DIR daar geplaatst zo maken we ons code korter!s (Zienab) 
include_once("bootstarp.php"); // voor wat is die dir ? 

if (!empty($_POST)) {
  //email en password opvragen
  $email = htmlspecialchars($_POST['email']);
  $password = $_POST['password'];
  $user = $_POST['user'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Spacesse</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- CSS Files -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<!--<?php //include_once(__DIR__ . "/includes/header.inc.php"); ?> !-->

<!-- Ik heb de img voorlopig in commentaar gezet "Zienab" -->
<!-- <img class="logo1" src="./images/buddy-logo.svg"> -->
  <div class="container">

    <form class="form" method="post" action="">

      <h4>Login</h4>

        <!-- Error -->
        <div class="header">
        
          <?php if (isset($error)) : ?>
            <div class="form alert-danger">
              <p>
                Sorry, we can't log you in with that email address and password. Can you try again?
              </p>
            </div>
          <?php endif; ?>

        </div>

      <div class="login-body">

        <div class="form-group">
          <input type="text" name="email" id="email" class="form-control" placeholder="Email...">
        </div>

        <div class="form-group">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password...">
        </div>

      </div>


      <input class="btn btn-primary" type="submit" value="Login" class="submit">

      <a href="register.php">Not an account yet? Sign up here!</a>
    
    </form>

    

  </div>
</body>

</html>