<?php 
session_start();
$email = $_SESSION["user"];
$conn = new PDO("mysql:host=localhost;dbname=Website", "root", "root");
$statement = $conn->prepare("SELECT * FROM user WHERE email='$email'");
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);


    $username = $user['username'];
    $email = $user['email'];
    $photo = $user['photo'];
    $secondEmail = $user['secondEmail'];
    $bio = $user['bio'];
    $socialLinks = $user['socialLinks'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="background-color: white;">
    <div id="signupForm">

        <form action="" method="post" class="form" enctype="multipart/form-data">
            <h1 class="p_title">
                <?= $username; ?>
            </h1>

            <div class="form-group">
                <img src="images/profile1.png" id="profileDisplay">
                <label for="profileImage">Profile Image</label>
                <input type="file" id="profileImage" name="profileImage" class="form-control" value="<?php echo $photo; ?>">
            </div>
            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea type="file" id="bio" name="bio" class="form-control" value="<?php echo $bio; ?>"></textarea>
            </div>
            <div class="form-group">
                <label for="email" id="email">Email</label>
                <input type="text" id="bio" name="email" placeholder="a" value="<?= $email; ?>">
            </div>
            <div class="form-group">
                <label for="second email" id="email">Add second Email</label>
                <?php echo $secondEmail; ?>
                <input type="text" id="bio" name="email" placeholder="a">
            </div>

            <input type="submit" id="UpBtn" value="Update profile" name="update_profile">
            <input type="submit" id="C_Btn" value="Cancel">

        </form>
    </div>
</body>

</html>