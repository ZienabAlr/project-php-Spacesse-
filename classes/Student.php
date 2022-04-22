<?php 

class Student extends User{

    /*public static function can_signup(){
        
        
        
            // validatePassword => See validateEmail
        
            try {
                $conn=DB::getConnection();
                $statemant = $conn->prepare("INSERT INTO userSignup (username, email, password) VALUES (:username, :email, :password)");
                $statemant->bindValue("username", $this->username);
                $statemant->bindValue("email", $this->email);
                $statemant->bindValue("password", $this->password);
                return $statemant->execute();
            } 
            catch (Throwable $e) {
        
                echo $e->getMessage('mysql:host=localhost;dbname=Spacesse', 'root', 'root');
            }
    }*/
       
        public static function inlogedStudents(){
            
            try{
                $conn=DB::getConnection();
                // $statement = $conn->prepare("select email from userSignup");
                $statement = $conn->prepare("SELECT * FROM userSignup WHERE email=:email");
                // $statement->bindValue("email", $this->email);
                $statement->bindValue("email", $email);
                $statement->execute();
                // return $statement->fetchAll(PDO::FETCH_ASSOC);
                $user= $statement->fetchAll(PDO::FETCH_ASSOC);
                return $user; 
                 $hash= $user['password'];
    
                if(password_verify($password, $hash) ){
                    return true; 
                }else{
                    return false;
                }
            }
            catch(Throwable $e){
                echo $e->getMessage();
                 return false;
             }

        }
    
    
}