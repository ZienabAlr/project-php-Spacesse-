<?php 

class Student extends User{

    public static function inlogedStudents(){
        $conn=DB::getConnection();
        $statement = $conn->prepare("select email, password from userSignup");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }
    public function is_member($email) {
        $conn = new PDO("mysql:host=localhost;dbname=Website", "root", "root");
        $statement = $conn->prepare("SELECT * FROM user WHERE email='$email'");
        $statement->execute();
        $response = $statement->fetch(PDO::FETCH_ASSOC);

        $results = (is_array($response) && count($response) > 0);
        return $results;
    }

    public function can_signup($username, $email, $password)
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=Website", "root", "root");
            $statement = $conn->prepare("INSERT INTO user (username, email, password) VALUES (:username, :email, :password)");
            $statement->bindValue("username", $username);
            $statement->bindValue("email", $email);
            $options = [
                'cost' => 12,
            ];
            $hash = password_hash($password, PASSWORD_DEFAULT,  $options);
            $statement->bindValue("password", $hash);
            return  $statement->execute();
        } catch (Throwable $e) {

            echo $e->getMessage();
        }
    }
    public static function get_student_info($email)
    {
        $conn = new PDO("mysql:host=localhost;dbname=Website", "root", "root");
        $statement = $conn->prepare("SELECT * FROM user WHERE email='$email'");
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        return $user;
    }
    
}