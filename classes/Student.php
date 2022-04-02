<?php 

class Student extends User{

    public static function inlogedStudents(){
        $conn=DB::getConnection();
        $statement = $conn->prepare("select email, password from userSignup");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }
    
}