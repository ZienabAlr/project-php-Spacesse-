<?php

if (isset($_POST["reset-request-submit"])){

    $selector= bin2hex(random_bytes(8)); // zoek op wat dat precies is!!  
    $token= random_bytes (32); // we gaan de token hier niet hexadecimals veranderen om later te kunnen hasen 

    $url = "www.spacesse.be/forgottonpwd/creat-new-password.php?selector=" . $selector. "&validator=" .bin2hex($token); // in de link veranderen we token naar hexadecimals door bin2hex te gebruiken 

    $expires = date ("U") + 1800; //contains just the current timestamp (the actual time when the function is called) U= todays dat in seconds since 1970
    
    $conn = new PDO('mysql:host=localhost;dbname=Spacesse', 'root', 'root');

    $userEmail = $_POST["email"]; 

    $statemant = $conn->prepare("DELETE FROM pwdReset WHERE pwdResetEmail=?");

    if (!$statemant){

        echo "There was an error "
        exit(); 

    }else{
        $statemant->bindParam('s',$userEmail );
        return $statemant->execute();
    }
    
    $statemant = $conn->prepare("INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector,pwdResetToken, pwdResetExpires ) VALUES(?,?,?,?);");
    if (!$statemant){

        echo "There was an error "
        exit(); 

    }else{
        $hashedToken= password_hash( $token, PASSWORD_DEFAULT );
        $statemant->bindParam('ssss',$userEmail , $selector, $hashedToken, $expires ); // vier "?" in de statement daarboven daarom vier 's'
        return $statemant->execute();
    }
    $statemant->close(); 

    // naar wie wil ik een link sturen? --> naar een bestaande email adres in de dtatbase 

    $to= $userEmail; 
    //onderwerp wanneer een de link via mail zal gestuurd worden 
    $subject = 'Reset your password for Spacesse'; 
    $message = '<p> We recieved a password reset request. THe link to reset your password is bellow. <br> if you did not 
    make this request, you can ignore this email
    <br> Here is your password reset link: <br>
    <a herf = "' . $url .'"> '. $url . '</a> </p> ';

    // van wie krijgt de user deze email? --> hieronder 

    $headers = "From spacesse <spacesse@gmail.com>\r\n";
    $headers. = "Reply-To: <spacesse@gmail.com>\r\n "; // hier geven we naar wie mogen de gebruikers antwoorden 
    $headers. = "Content-type: text/html\r\n"; // deze zorgt ervoor dat de html werkt in wat we hierbiven hebben ingegeven 

    // hier gaan we de mail doorsturen naar de gebruiker

   mail ($to, $subject, $message, $headers);

   header("location../reset-password.php?reset=success"); 
}else{
    header("location:../login.php");
}