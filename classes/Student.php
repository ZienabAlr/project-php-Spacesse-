<?php 

class Student extends User{

    public static function inlogedStudents(){
        $conn=DB::getConnection();
        // $statement = $conn->prepare("select email, password from userSignup");
        $statement = $conn->prepare("select email from userSignup");
        $statement->bindValue("email", $this->email);
        $statement->execute();
        // return $statement->fetchAll(PDO::FETCH_ASSOC);
        $passWord= $statement->fetchAll(PDO::FETCH_ASSOC);
        $hash= $passWord['password'];

		if(password_verify($password, $hash) ){
			return true; 
		}else{
			return false;
		}
       
    }
    
}