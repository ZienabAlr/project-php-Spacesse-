<?php

$email = 'email@student.thomasmore.be';

$domains = array('thomasmore.be', 'student.thomasmore.be');

$pattern = "/^[a-z0-9._%+-]+@[a-z0-9.-]*(" . implode('|', $domains) . ")$/i";

if (preg_match($pattern, $email)) {
    echo '<script>
           window.location = "http://localhost:8888/project-php-Spacesse-/login.php"
      </script>';
} else {
    echo 'This is not a valid Company email address. Please go back and try again.';
}
?>

<?php
$email = $_POST["email"];
$timestamp = date('l jS \of F Y h:i:s A');
$text = "Email: " . $email . " At: " . $timestamp . "\n";
$file = fopen("./users.txt", "a+ \n");
fwrite($file, $text);
fclose($file);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form -Test-</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="signupForm">
        <div class="wrapper">
            <form action="signup.php" class="form">

                <h1 class="title">Sign up</h1>

                <div id="inputContainer">
                    <input type="text" class="input" placeholder="Enter your school email adress" name="email" required="">
                    <label for="" class="label">Email</label>
                </div>

                <div id="inputContainer">
                    <input type="text" class="input" placeholder="a">
                    <label for="" class="label">Firstname</label>
                </div>
                <div id="inputContainer">
                    <input type="text" class="input" placeholder="a">
                    <label for="" class="label">Lastname</label>
                </div>

                <div id="inputContainer">
                    <input type="text" class="input" placeholder="a">
                    <label for="" class="label">Password</label>
                </div>

                <div id="inputContainer">
                    <input type="text" class="input" placeholder="a">
                    <label for="" class="label">Confirm Password</label>
                </div>
                <div id="inputContainer">
                    <h4>Already have an account?
                        <a href="#" class="login">Click here</a></h4>
                </div>


                <input type="submit" id="submitBtn" value="Sign up">
            </form>
        </div>
    </div>
</body>

</html>