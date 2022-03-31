<?php


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

    $email = $_POST['email'];
    $firstname = $_POST['username'];
    $options = [
        'cost' => 12,
    ];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);
    if (validateEmail($email)) {
        // email is good => logic
    } else {
        $error = "Email is not valid";
    }

    if (empty($username)) {
        $error = "Empty username!";
    }

    // validatePassword => See validateEmail
    try {
        $conn = new PDO('mysql:host=localhost;dbname=Spacesse', 'root', 'root');

        $statemant = $conn->prepare("INSERT INTO userSignup (email, username, password) VALUES (:email, :firstname, :lastname, :password)");
        $statemant->bindValue("email", $email);
        $statemant->bindValue("username", $username);
        $statemant->bindValue("password", $password);
        $result = $statemant->execute();
    } catch (Throwable $e) {

        echo $e->getMessage('mysql:host=localhost;dbname=Spacesse', 'root', 'root');
    }
}
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
            <form action="" class="form" method="post">
                <h1 class="title">Sign up</h1>
                <?php if (isset($error)) : ?>
                    <div class="warning">
                        <p>
                            <?php echo $error ?>
                        </p>
                    </div>
                <?php endif; ?>
                <div id="inputContainer">
                    <input type="text" class="input" name="email" placeholder="a">
                    <label for="" class="label">Email</label>
                </div>

                <div id="inputContainer">
                    <input type="text" class="input" name="username" placeholder="a">
                    <label for="" class="label">username</label>
                </div>

                <div id="inputContainer">
                    <input type="password" class="input" name="password" placeholder="a">
                    <label for="" class="label">Password</label>
                </div>

                <div id="inputContainer">
                    <input type="password" class="input" placeholder="a">
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