<?php 

class Student extends User{

       

    public function can_signup(){
       try{
               $conn = new PDO ("mysql:host=localhost;dbname=OOP", "root", "root");
               $statement = $conn->prepare ("INSERT INTO test (username, email, password) VALUES (:username, :email, :password)");
               $statement->bindValue("username", $this->username);
               $statement->bindValue("email", $this->email);
               $options=[
                   'cost'=> 12, 
               ];
               $hash = password_hash($this->password, PASSWORD_DEFAULT,  $options);
               $statement->bindValue("password", $hash);
               return  $statement->execute();
               
       }
       catch(Throwable $e){
       
           echo $e->getMessage('mysql:host=localhost;dbname=OOP', 'root', 'root');
          
          
       }
       
       
   }

   public function can_login(){
           
           $conn = new PDO ("mysql:host=localhost;dbname=Website", "root", "root");
           $statement = $conn->prepare("SELECT * FROM user WHERE email= :email");
           $statement->bindValue("email", $this->email);
           $statement->execute();
           $user= $statement->fetch(PDO::FETCH_ASSOC);
           $hashPassword= $user['password'];
           if(password_verify($this->password, $hashPassword) ){
               return true; 
           }else{
               return false;
           }