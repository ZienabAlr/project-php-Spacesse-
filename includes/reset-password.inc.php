<?php

    if (isset($_POST["reset-password-submit"])){

        $selector = $_POST["selector"]; 
        $validator = $_POST["validator"]; 
        $password = $_POST["pwd"]; 
        $passwordRepeat = $_POST["pwd-repeat"]; 

        if (empty($password)|| empty($passwordRepeat)){
            
            header("location:../creat-new-password.php?newpwd=empty");
            exit(); 
        } else if ($password != $passwordRepeat){
            header("location:../creat-new-password.php?newpwd=pwdnotsame");
            exit(); 
        }

        $currentDate = date("U"); 
        $conn = new PDO('mysql:host=localhost;dbname=Spacesse', 'root', 'root');
        $statemant = $conn->prepare("SELECT *  FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?");
        if (!$statemant){

            echo "There was an error "
            exit(); 
    
        }else{
            $statemant->bindParam('s',$selector, $currentDate );
           $result = $statemant->execute();

           if (!$row= $result->fetchAll(PDO::FETCH_ASSOC)){
            echo "You need to re-submit your reset request."; 
            exit(); 
           }else {

            $tokenBin = hex2bin( $validator); 
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]); 
            
            if ( $tokenCheck === false){

                echo "You need to re-submit your reset request."; 
                exit(); 
               }elseif( $tokenCheck === true) {

                    $tokenEmail= $row ['pwdResetEmail']
                    $statement = $conn->prepare("SELECT * FROM userSignup WHERE email=?");
                    if (!$statemant){

                        echo "There was an error "
                        exit(); 
            
                    }else{
                    
                        bindParam ($statemant, "s", $tokenEmail); 
                        $statemant->execute();

                        $result = $statemant->execute();

                        if (!$row= $result->fetchAll(PDO::FETCH_ASSOC)){
                         echo "There was an error!"; 
                         exit(); 
                        }else {
                            $statement = $conn->prepare("UPDATE userSignup SET password =? WHERE email=?");
                            if (!$statemant){

                                echo "There was an error "
                                exit(); 
                    
                            }else{
                            
                                $newpwdHash = password_hash($password, PASSWORD_DEFAULT); 
                                bindParam ($statemant, "ss", $newpwdHash); 
                                $statemant->execute();
                                $statemant = $conn->prepare("DELETE FROM pwdReset WHERE pwdResetEmail=?");

                                if (!$statemant){

                                    echo "There was an error "
                                    exit();
                                }else{
                                    bindParam ($statemant, "s", $tokenEmail); 
                                    $statemant->execute();
                                    header("location: ../signup.php?newpwd=passwordupdated"); 
                                }
                            }
                            

                        }
                    }
               }


            }

           }

        }
              

       
    }else{

        header("location:../login.php");
    }