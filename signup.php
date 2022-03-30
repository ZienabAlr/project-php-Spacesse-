<?php

$email = "TestEmail@student.thomasmore.be" && "TestEmail@thomasmore.be";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Not a valid e-mail address!");
} else {
    if (empty(preg_match("/@student.thomasmore.be$/" && "/@thomasmore.be$/", $email))) {
        die("E-mail must end with @student.thomasmore.be OR @thomasmore.be!");
    } else {
        //valid//
    }
}

if (!empty($_POST)) {

    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $options = [
        'cost' => 12,
    ];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);

    try {
        $conn = new PDO('mysql:host=localhost;dbname=Spacesse', 'root', 'root');

        $statemant = $conn->prepare("INSERT INTO userSignup (email, firstname, lastname, password) VALUES (:email, :firstname, :lastname, :password)");
        $statemant->bindValue("email", $email);
        $statemant->bindValue("firstname", $firstname);
        $statemant->bindValue("lastname", $lastname);
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
            <form action="" class="form" method="$_POST">
                <h1 class="title">Sign up</h1>
                <?php if (isset($error)) : ?>
                    <div class="form__error">
                        <p>
                            Sorry, we can't Sign you up with that email address and password. Can you try again?
                        </p>
                    </div>
                <?php endif; ?>
                <div id="inputContainer">
                    <input type="text" class="input" name="email" placeholder="a">
                    <label for="" class="label">Email</label>
                </div>

                <div id="inputContainer">
                    <input type="text" class="input" name="firstname" placeholder="a">
                    <label for="" class="label">Firstname</label>
                </div>
                <div id="inputContainer">
                    <input type="text" class="input" name="lastname" placeholder="a">
                    <label for="" class="label">Lastname</label>
                </div>

                <div id="inputContainer">
                    <input type="text" class="input" name="password" placeholder="a">
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