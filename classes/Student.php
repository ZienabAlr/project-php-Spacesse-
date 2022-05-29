<?php

class Student extends User
{

    public function can_signup($username, $email, $password)
    {
        try {
            //$conn = new PDO("mysql:host=localhost;dbname=Website", "root", "root");
            $conn = Db::getConnection();
            $statement = $conn->prepare("INSERT INTO test (username, email, password) VALUES (:username, :email, :password)");
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

    public function can_login()
    {
        //12345
       // $conn = new PDO("mysql:host=localhost;dbname=Website", "root", "root");
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT * FROM test WHERE email= :email");
        $statement->bindValue("email", $this->email);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $hashPassword = $user['password'];
        if (password_verify($this->password, $hashPassword)) {
            return true;
        } else {
            return false;
        }
    }
}
