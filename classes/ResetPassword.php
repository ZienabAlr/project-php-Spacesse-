<?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
    class ResetPassword extends User{
       
    public function checkEmail(){
       
    include_once("bootstrap.php");
        $conn = Db::getConnection();
    
        $query= $conn->prepare("SELECT * FROM test WHERE email= :email");
        $email = $query->bindValue("email", $this->email);
        $email1= $query->execute();
        $query->fetch(PDO::FETCH_ASSOC);
        $row= $query->rowCount();
              
        if($row==1){

            $query_exist= $conn->prepare("SELECT * FROM reset_password WHERE email= :email");
            $query_exist->bindValue("email", $this->email);
            $query_exist->execute();
            $from_reset= $query_exist->fetch(PDO::FETCH_ASSOC);

                $query_insert = $conn->prepare("INSERT INTO reset_password(email, token, expDate) VALUES (:email, :token, :expDate)");
                 $query_insert->bindValue("email", $this->email);
                $token= $query_insert->bindValue("token", $this->token);
                $query_insert->bindValue("expDate", $this->expire);
                return $query_insert->execute();
            if(!empty($from_reset)){    
                // Already exist reseting attempt, switch to UPDATE the reset table instead
                $query_insert = $conn->prepare("UPDATE reset_passwordt SET token = ? AND expDate =?  WHERE email = ?");
                $query_insert->bindValue("email", $this->email);
                $token= $query_insert->bindValue("token", $this->token);
                $query_insert->bindValue("expDate", $this->expire);
                return  $query_insert->execute();
            }

            $mail = new PHPMailer(true);

            $link='href="http://localhost:8888/test 2/new_pass.php?email='.$email.'&token='.$token.'"';
            $link2 = '<span style="width:100%;"><a style="padding:10px 100px;border-radius:30px;background:#a8edbc;" '.$link.' > Link </a></span>';

            try {
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'ispacesse@gmail.com';                     //SMTP username
                $mail->Password   = ' sp-Project2 ';                               //SMTP password
                $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('from@example.com', 'Spacesse');
                $mail->addAddress($email1);     //Add a recipient
               //$mail->addAddress($this->email); 
               //$mail->addAddress('r0784494@student.thomasmore.be');
                $mail->addReplyTo('no-reply@spacesse.com', 'No reply');


                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Reset your password';
                 //$mail->Body    = ' <p>Dear '.$this->email.',</p>
                $mail->Body    = ' <p>Dear '.$email.',</p>
               

                <p>Please click on this link to reset your password:</p> 
                <p>'.$link2.'</p>
    
                Best wishes,
                <br>
                <span>Spacesse</span>
                ';
                $mail->send();
                $msg = '<h4 class="text-success">Please check your email (including spam) to see the password reset link.</h4>';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

       
   
        }else {
            $error = "Email does not exist!";
        }

    }

    public function checkLink(){

        $statement = $conn->prepare("SELECT * FROM reset_password WHERE email= :email");
        $statement->bindValue("email", $this->email);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        //$expireDate= $user['expDate'];
        

    }

    public function newPassword(){

       /* include_once("bootstrap.php");

        $conn = Db::getConnection();
        session_start();
        $error="";
        if(isset($_GET['email']) && isset($_GET['token'])){
            $_SESSION['email'] = $_GET['email'];
            $token = $_GET['token'];

         $curDate = date("Y-m-d H:i:s");
        // Check in de database of de link correct is
        $stat = $conn ->prepare("SELECT * FROM reset_password WHERE email = ?");
        $stat->execute([$_SESSION['email']]);
        $from_reset = $stat->fetch();
        $expireDate= $from_reset['expDate'];

            if ( $expireDate >= $curDate){
                $valid = true; 
                
            }else{
            
                $error .= "<h2>Link Expired</h2>
                <p>The link is expired. You are trying to use the expired link which 
                as valid only 24 hours (1 days after request).<br /><br /></p>";
            }if($error!=""){
                echo "<div class='error'>".$error."</div><br />";
                }			
        }*/
        
        /*if(isset($_POST['reset'])){
        $newPassword = $_POST['new_pass'];
        $confirmPassword = $_POST['new_pass_conf'];

        if($newPassword == $confirmPassword){

            $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
        
        } else {
            $error = 'Passwords do not match!';
        }
        
        $email = $_SESSION['email'];

        // Update password
        if(empty($error)){
            $statement = $conn->prepare("UPDATE test SET password = ? WHERE email = ?");
            $statement->execute([$hashed_password, $email]);

            $msg = 'Successfully updated your password! <a class="btn btn-success" href="http://localhost:8888/test 2/login.php"> >>Log In</a>';

            session_destroy();
            //   var_dump($statement($hashed_password, $email));
        }

         }


    }*/

        $updatedPassword= new ResetPassword;
        $newPassword =  $updatedPassword->getNewPassword();
        $confirmPassword = $updatedPassword->getConfPassword();
        if( $newPassword ==  $confirmPassword){
            $statement = $conn->prepare("UPDATE test SET password = ? WHERE email = ?");
            $statement->execute([$hashed_password, $email]);

            $msg = 'Successfully updated your password! <a class="btn btn-success" href="http://localhost:8888/test 2/login.php"> >>Log In</a>';

            session_destroy();
            //   var_dump($statement($hashed_password, $email));
        }



}
    }