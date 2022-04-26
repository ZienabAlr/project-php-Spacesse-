<?php

include_once("bootstrap.php");

function validateEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        if (empty(preg_match("/@student.thomasmore.be|thomasmore.be$/", $email))) {
            return false;
        } else {
            //valid//
            return true;
        }
    }
}



if (!empty($_POST)) {
    if (validateEmail($_POST["email"])) {
        try {

            $user = new Student();
            $user->setUsername($_POST["username"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);

            $user->can_signup($_POST["username"], $_POST["email"], $_POST["password"]);


            session_start();
            $_SESSION['user'] = $_POST["email"];
            header('location:index.php');
            die();
        } catch (Throwable $e) {
            // echo $e->getMessage('mysql:host=localhost;dbname=test', 'root', 'root');
            //echo $e->getMessage();
            //return false;
            $error = $e->getMessage();
        }
    } else {
        $error = "Email is not valid";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="signupForm">
        <div class="wrapper">
            <form action="" method="post" class="form">
                <h1 class="title">Sign up</h1>
                <?php if (isset($error)) : ?>
                    <div class="warning">
                        <p>
                            <?php echo $error ?>
                        </p>
                    </div>
                <?php endif; ?>
                <div id="inputContainer">
                    <input type="text" class="input" name="username" placeholder="a">
                    <label for="" class="label">Username</label>
                </div>

                <div id="inputContainer">
                    <input type="text" class="input" name="email" placeholder="a">
                    <label for="" class="label">Email</label>
                </div>

                <div id="inputContainer">
                    <input type="password" class="input" name="password" placeholder="a">
                    <label for="" class="label">Password</label>
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