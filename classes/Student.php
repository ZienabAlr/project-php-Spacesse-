<?php 

class Student extends User{

    public static function inlogedStudents(){
        $conn=DB::getConnection();
        // $statement = $conn->prepare("select email, password from userSignup");
        $statement = $conn->prepare("select email from userSignup");
        $statement->bindValue("email", $this->email);
        $statement->execute();
        // return $statement->fetchAll(PDO::FETCH_ASSOC);
        $user= $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $user; 
        /* $hash= $passWord['password'];

		if(password_verify($password, $hash) ){
			return true; 
		}else{
			return false;
		}*/
       
    }
    
}